<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Auth::user()->admin)
        {
            return view('admin.posts.index')->with('posts',Post::where('user_id',Auth::id())->get());
        }else{
            return view('admin.posts.index')->with('posts',Post::all());
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count()==0 || $tags->count()==0)
        {
            Session::flash('info','You must have some categories and tags before attempting to create a post');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',Category::all())->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required",
            "featured" => "required|image",
            "content" => "required",
            "category_id" => "required",
            "tags" => "required",
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts',$featured_new_name);

        $posts = Post::create([
            'title' => $request->title,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => Auth::id()
        ]);

        $posts->tags()->attach($request->tags);

        Session::flash('success','Post Successfully Created');

        return redirect()->route('posts');
        
        //dd($featured_new_name);
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
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $old_image = $post->featured;
            //dd(parse_url($old_path));
            $old_path = parse_url($old_image);
            if ($old_path) {
                unlink(substr($old_path['path'],1));
            }
            

            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = 'uploads/posts/' . $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post Successfully Updated');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);

        $posts->delete();

        Session::flash('success','The Post was just Trashed');
        
        return redirect()->back();
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();

        $old_image = $posts->featured;
        //dd(parse_url($old_path));
        $old_path = parse_url($old_image);

        if ($old_path) {
            unlink(substr($old_path['path'],1));
        }
        
        $posts->forceDelete();

        Session::flash('success','Post deleted Permanently');

        return redirect()->back();
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id',$id)->first();
        
        $posts->restore();

        Session::flash('success','Post Successfully Restored');

        return redirect()->route('posts');
    }
}
