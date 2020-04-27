<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Auth;
use App\Message;
use Pusher\Pusher;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  
        //$users= User::where('id','!=', Auth()->user()->id)->get();

        $users=DB::select("select users.id, users.name, users.avatar,users.email,count(is_read) as unread
        from users LEFT JOIN messages ON users.id=messages.from and is_read = 0 and messages.to =". Auth()->user()->id ."
        where users.id !=".Auth()->user()->id."
        group by users.id, users.name, users.avatar,users.email");
        return view('home',['users'=>$users]);
    }

    public function getmessage($user_id){
        $my_id=Auth()->user()->id;
        //when click to see message selected user's message will 
        Message::where(['from'=>$user_id,'to'=>$my_id])->update(['is_read'=>1]);
        
       
        $messages=Message::where(function ($query)use($user_id,$my_id){
            $query->where('from','=',$my_id)->where('to','=',$user_id);
        })->orWhere(function($query) use($user_id,$my_id){
            $query->where('from','=',$user_id)->where('to','=',$my_id);
        })->get();
     
      
        return view('message.index')
        ->with('loged_id',$my_id)
        ->with('messages',$messages);
    }

    public function sendmessage(Request $request){
        $from=Auth()->user()->id;
        $to=$request->receiver_id;
        $message=$request->message;

        $data = new Message();
        $data->from=$from;
        $data->to=$to;
        $data->message=$message;
        $data->is_read=0;
        $data->save();

 
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true);

        $pusher= new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data = ['from'=> $from,'to'=>$to];
        $pusher->trigger('my-channel','my-event',$data);
    }
}
