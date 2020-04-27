<?php

namespace App\Http\Controllers\redrammer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Auth;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }   


    public function index()
    {
        return view('redrammer.index')
        ->with('posts',Post::latest()->get());
    }

   public function explore(){
     $search = request()->query('search');
     if($search){
        $user= User::where('name','like',"%{$search}%")->get();
     } else{
         $user=User::where('id','!=', Auth()->id())->latest()->get();
     }
        
     
       return view('redrammer.explore')
                                  ->with('users',$user);
   }

     public function chat(){
        return view('redrammer.chat');
     }
     public function notification(){
        return view('redrammer.Notification.notification');
     }
     public function setting(){
        return view('redrammer.setting');
     }
    
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post_create()
    { 
        return view('redrammer.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post_store(Request $request)
    {  
        
        $user_id=Auth()->user()->id;
        $posts= new post;
        $posts->title      =$request->title;
        $posts->content    =$request->content;
        if ($request->hasFile('image')) {
            $image=$request->image->store('posts');
            $posts->image=$image;
         }

        
        $posts->user_id=$user_id;
        $posts->published_at=$request->published_at;

        $posts->save();
        
       return redirect(route('home'))->with('sucssucsMsg',"Your Post Succesfully insert");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
