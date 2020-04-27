<?php

namespace App\Http\Controllers\redrammer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Post;
use App\Follow;


class ProfileController extends Controller
{  
   
      public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {   
        return view('redrammer.profile.profile')
        ->with('posts',Post::where('user_id','=' , Auth()->user()->id)->latest()->get());
    }
    public function index()
    {
        return view('redrammer.profile.edit_profile');
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
        //  $private= Input::has('private') ? true :false;
         $profile= User::find($id);
         $profile->name=$request->name;
         $profile->email=$request->email;
         $profile->bio=$request->bio;
         $profile->private=$request->private;
         $profile->gender=$request->gender;
         if ($request->hasFile('image')) {
             if(!Auth()->user()->image)
             {
                $images=$request->image->store('image');
                $profile->image=$images;
             }
             else{
                        $image=$request->image->store('image');
                        
                        Storage::delete($profile->image);
                        $profile['image']=$image;
                 }
              
         }
         if ($request->hasFile('bgimage')) {
            if(!Auth()->user()->bgimage)
            {
               $bgimage=$request->bgimage->store('bgimage');
               $profile->bgimage=$bgimage;
            }
            else{
                       $bgimage=$request->bgimage->store('bgimage');
                       
                       Storage::delete($profile->bgimage);
                       $profile['bgimage']=$bgimage;
                }
             
        }
         $private= $request->private ? true : false;
         $profile=$private; 
         //dd($private);
         $profile->update();
         return back();

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
    
    public function profile_destroy($id)
    {  $post = Post::find($id);
        Storage::delete($post->image);
        $post->Delete();
       return redirect()->back()
       ->with('sucssucsMsg',"Your Data for Delete");

    }
}
