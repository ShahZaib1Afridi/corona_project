<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
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

        if ($categories->count() == 0) {
            Session::flash('info','You must have some category before attempting to create a post');
            return redirect()->back();
        }
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'featured' => 'required|image',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required'
        ]);

        $featured = $request->featured;
        $featued_new_name = time(). $featured->getClientOriginalName();
        $featured->move('uploads/posts', $featued_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured' => 'uploads/posts/' . $featued_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success', 'Post Successfully created');
        return redirect()->back();

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
        $posts = Post::findOrFail($id);
         $categories = Category::all();
         $tags = Tag::all();
        return view('admin.posts.edit', compact('posts','categories','tags'));
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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        // agar user image karna chahta hai tou change krskhta hai agr nhi krna chahta tou na karey dont worry
           $posts = Post::findOrFail($id);
        if($request->hasFile('featured')) {
            $featured = $request->featured;
            $featued_new_name = time(). $featured->getClientOriginalName();
            $featured->move('uploads/posts/', $featued_new_name);

            $posts->featured = 'uploads/posts/'.$featued_new_name;
        }

        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
        $posts->save();

        $posts->tags()->sync($request->tags);
        
        Session::flash('success','The Successfully updated');
        return redirect('admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
            $post->delete();
            Session::flash('success', 'Post Successfully Deleted');
            return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();

       return view('admin.posts.trashed', compact('posts'));
    }

    public function kill($id){
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->forceDelete();

        Session::flash('success','Post permanently deleted');
        return redirect()->back();
    }

    public function restore($id){
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->restore();

        Session::flash('success','Post Successfully restore');
        return redirect('admin/post');
    }
}
