<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
$post=\App\posts::find(1);
// dd($post->tags->first()->user->posts->count());
dd(auth()->user()->comments->count());

});

Route::get('/', function () {
    // return view('welcome2',[ 'name'=>'amr']); or 
    // return view('welcome2')->with('name','tamer'); or 
    $name=['hany','tamer','samir'];
  
    // return $name;

   return view('welcome',compact('name'));
});

Route::get('/home', function () {
 

   return view('welcome3');
});


// use App\tasks;
// Route::get('/tasks', function () {
//     // $tasks=DB::table('tasks')->get(); or
//     // $tasks=App\tasks::all();or 
//     // $tasks=tasks::where('id','>=',2)->get();
// 	$tasks=tasks::all();
//    return view('tasks.index',compact('tasks'));
// });  or 

		Route::get('/tasks','TasksController@index');


// Route::get('/tasks/{id}', function ($id) {
//     $tasks=DB::table('tasks')->find($id);
    
//    return view('tasks.show',compact('tasks'));
// });
	

	// route::post('/posts','PostsController@store');
	// route::get('/posts/create','PostsController@create');
	// route::get('/posts','PostsController@index');
	// route::get('/posts/{posts}','PostsController@show');
	
	route::resource('/posts','PostsController');
 	route::get('/posts/{posts}/user','PostsController@userindex');
	route::post('/posts/{posts}/comments','CommentsController@store');
	
	
	route::get('/tasks/{tasks}','Taskscontroller@show');
	route::get('/comments/{id}','CommentsController@index');


	
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home',function(){
return redirect('/posts');
});

Route::get('login/{site}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{site}/callback', 'Auth\LoginController@handleProviderCallback');