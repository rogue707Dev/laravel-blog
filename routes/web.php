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


Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index'
]);

Route::get('/search', function(){

    //dd($request);
    
    $results = \App\Post::where('title','like','%' . request('query') . '%')->get();

    return view('result')->with('results',$results)
                        ->with('title',request('query'))
                        ->with('categories',\App\Category::take(5)->get())
                        ->with('setting',\App\Setting::first())
                        ->with('tags',\App\Tag::all());
});

Route::get('/subscribe',function(){
    Session::flash('success','Subscribed Successfully');
    return redirect()->back();
});

Route::get('/results',[
    'uses' => 'FrontEndController@results',
    'as' => 'results'
]);

Route::get('/post/{slug}',[
    'uses' => 'FrontEndController@single_post',
    'as' => 'single.post'
]);

Route::get('/category/{id}',[
    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}',[
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);



Route::get('/test', function () {
    return App\Profile::find(1)->user;
    //return App\Post::find(5)->tags;
});

Auth::routes();



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    
    Route::get('/dashboard', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::get('/post/create',[
        'uses' => 'PostsController@create',
        'as' => 'post.create'
        ]);
    
    Route::post('/post/store',[
        'uses' => 'PostsController@store',
        'as' => 'post.store'
        ]);

    Route::get('/posts',[
        'uses' => 'PostsController@index',
        'as' => 'posts'
    ]);

    Route::get('/posts/trashed',[
        'uses' => 'PostsController@trashed',
        'as' => 'posts.trashed'
    ]);

    Route::get('/post/delete/{id}',[
        'uses' => 'PostsController@destroy',
        'as' => 'post.delete'
    ]);

    Route::get('/post/kill/{id}',[
        'uses' => 'PostsController@kill',
        'as' => 'post.kill'
    ]);

    Route::get('/post/restore/{id}',[
        'uses' => 'PostsController@restore',
        'as' => 'post.restore'
    ]);

    Route::get('/post/edit/{id}',[
        'uses' => 'PostsController@edit',
        'as' => 'post.edit'
    ]);

    Route::post('/post/update/{id}',[
        'uses' => 'PostsController@update',
        'as' => 'post.update'
    ]);
    
    Route::get('/category/create',[
        'uses' => 'CategoriesController@create',
        'as' => 'category.create'
        ]);
    
    Route::post('/category/store',[
        'uses' => 'CategoriesController@store',
        'as' => 'category.store'
        ]);
    Route::get('/categories',[
        'uses' => 'CategoriesController@index',
        'as' => 'categories'
    ]);

    Route::get('/category/edit/{id}',[
        'uses' => 'CategoriesController@edit',
        'as' => 'category.edit'
    ]);

    Route::get('/category/delete/{id}',[
        'uses' => 'CategoriesController@destroy',
        'as' => 'category.delete'
    ]);

    Route::post('/category/update/{id}',[
        'uses' => 'CategoriesController@update',
        'as' => 'category.update'
    ]);

    Route::get('/tag/create',[
        'uses' => 'TagsController@create',
        'as' => 'tag.create'
        ]);
    
    Route::post('/tag/store',[
        'uses' => 'TagsController@store',
        'as' => 'tag.store'
        ]);
    Route::get('/tags',[
        'uses' => 'TagsController@index',
        'as' => 'tags'
    ]);

    Route::get('/tag/edit/{id}',[
        'uses' => 'TagsController@edit',
        'as' => 'tag.edit'
    ]);

    Route::get('/tag/delete/{id}',[
        'uses' => 'TagsController@destroy',
        'as' => 'tag.delete'
    ]);

    Route::post('/tag/update/{id}',[
        'uses' => 'TagsController@update',
        'as' => 'tag.update'
    ]);

    Route::get('/users',[
        'uses' => 'UsersController@index',
        'as' => 'users'
    ]);

    Route::get('/user/create',[
        'uses' => 'UsersController@create',
        'as' => 'user.create'
    ]);

    Route::post('/user/store',[
        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ]);

    Route::get('/user/admin/{id}',[
        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ]);

    Route::get('/user/not-admin/{id}',[
        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ]);

    Route::get('/user/profiles',[
        'uses' => 'ProfilesController@index',
        'as' => 'user.profiles'
    ]);

    Route::post('/user/profile/update',[
        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/user/delete/{id}',[
        'uses' => 'UsersController@destroy',
        'as' => 'user.delete'
    ]);

    Route::get('/settings',[
        'uses' => 'SettingsController@index',
        'as' => 'settings'
    ]);

    Route::post('/setting/update/{id}',[
        'uses' => 'SettingsController@update',
        'as' => 'setting.update'
    ]);

});


