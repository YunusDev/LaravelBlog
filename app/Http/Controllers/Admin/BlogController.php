<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\User\Blog;
use App\Model\User\Photo;
use App\Model\User\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        //
        $blogs = Blog::latest()->get();

        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            $tags = Tag::all();

            $admins = Admin::all();

            return view('admin.blog.create', compact('tags', 'admins'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate(request(), [
            'title' => 'required|max:65|unique:blogs',
            'subtitle' => 'required',
            'body' => 'required',
            'admin_id' => 'required',
//            'status' => 'required',
//            'slug' => 'required',
//            'photo_id'=>'required',

        ]);


        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('blogImages', $name);

            $photo = Photo::create(['path'=>$name]);

        }

        $blog  = new Blog;

        $blog->title = $request->title;

        $blog->subtitle = $request->subtitle;

        $blog->slug = str_slug($request->title, '-');

        $blog->body = $request->body;

        $blog->status = $request->status ? $request->status : 0;

        $blog->admin_id = $request->admin_id;

        $blog->photo_id =  $photo->id;

        $blog->save();

        $blog->tags()->sync($request->tags);

        return redirect(route('blog.index'))->with('message', 'Your Blog has been created successfully.');
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
            $blog = Blog::with('tags')->where('id', $id)->first();

            $tags = Tag::all();

            $admins = Admin::all();

            return view('admin.blog.edit', compact('blog', 'tags', 'admins'));

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
//        return $request->all();
        $this->validate(request(), [
            'title' => 'required|max:65',
            'subtitle' => 'required',
            'body' => 'required',
//            'status' => 'required',
//            'slug' => 'required',
            // 'photo_id'=>'required'

        ]);

        $input =  $request->all();

        if ($file = $request->file('photo_id')){

            $name = time() . $file->getClientOriginalName();

            $file->move('blogImages', $name);

            $photo = Photo::create(['path'=>$name]);

//            $input['photo_id'] = $photo->id;
        }


        $blog = Blog::findOrFail($id);;

        $blog->title = $request->title;
        $blog->subtitle = $request->subtitle;
        $blog->slug = str_slug($request->title, '-');
        $blog->body = $request->body;
        $blog->status = $request->status;
        $blog->admin_id = $request->admin_id;


        if ($file = $request->file('photo_id')){
            $blog->photo_id =  $photo->id;

        }

        $blog->save();

        $blog->tags()->sync($request->tags);

        return redirect(route('blog.index'))->with('message_update', 'Your Blog has been updated successfully.');
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

        $blog = Blog::whereId($id)->first();

        unlink(public_path('/blogImages/') . $blog->photo->name);

        $blog->delete();

        return redirect(route('blog.index'))->with('message_delete', 'Your Blog has been deleted successfully.');
    }
    
}
