<?php

namespace App\Http\Controllers;

use App\posts;
use App\tags;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct (){

        $this->middleware('auth')->except(['index','show']);       
    }

    public function index()
    {
      
       $posts=posts::latest()->filter(request(['month','year']))->get();

        return view('posts.index',compact('posts'));
    }

public function userindex($id)
    {
       $posts=posts::userposts($id);
       return view('posts.index',compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $messages=[
            'regex'=>'you must :attribute use this syntax a-zA-Z0-9_.& ',
        ];



        $this->validate($request,[
            'title'=>'required|unique:posts,title|regex:/^[a-zA-Z0-9_.& ]*$/',
            'body'=>['required','min:6','active_url'],
            // 'tag'=>'required|unique:tags,name'
            'tag'=>'required|string',
            'image'=>'image|mimes:jpeg,ipg,png|max:2000'
        ], $messages);
die();
        $posts= new posts;
        $posts->title=Request('title');
        $posts->body=Request('body');
        $posts->body=Request('body');
        


if( $request->hasFile('image')){
     
        $file_name_EXT = $request->image->getClientoriginalName();// not needed as wee check with validation method 
        $file_name = pathinfo($request->image->getClientoriginalName(),PATHINFO_FILENAME); // not needed as wee check with validation method 
        $file_size = $request->image->getSize(); // not needed as wee check with validation method 
        $file_EXT = $request->image->getClientoriginalExtension(); // not needed as wee check with validation method 
//======================================================================================================================================
        $file_name_new = uniqid('',true).time().".".$file_EXT;
        // $request->image->storeAs('public/images',$file_name_new); or 
        $request->image->move(public_path().'/images/',$file_name_new);
        $posts->image= $file_name_new ;
        $posts->image_title= $file_name ;
}

 $posts->user_id=\Auth::user()->id ;
 $posts->save(); 
       // $post = posts::create([ 'title'=>Request('title'),'body'=>Request('body'),'user_id'=>\Auth::user()->id ]);
       // posts::create(Request(['title','body']));  or
       // posts::create(Request()->all());
        $tag=tags::updateOrCreate([
            'name'=>Request('tag'),
            'user_id'=>\Auth::user()->id ]);

        $posts->tags()->attach($tag);
        return redirect('/posts')->with('msg','post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $posts=posts::find($post);
          return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($posts)
    {
        $post=posts::find($posts);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $posts)
    {
        $post=posts::find($posts);
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'tag'=>'required'
        ]);

        $post->fill($request->input())->save();

        $tags=explode(',',str_replace(' ','',Request('tag')));

        foreach($tags as $tag){
            
            if($tag !== ''){

             $test[]=tags::updateOrCreate(['name' => $tag,
                    'user_id'=>\Auth::user()->id ])->id;
             
             }
              }

             
        $post->tags()->sync($test);

        session()->flash('msg','updated');
        session()->flash('alert','alert-success');
        return redirect('posts/'.$post->id.'/edit')->with(compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($posts)
    {
        $post=posts::find($posts);
        $post->comments->each->delete();
        $post->delete();
        return redirect('/posts')->with(['msg'=>'post deleted successfully',
                                          'alert'=>'alert-success'  ]);

    }
}
