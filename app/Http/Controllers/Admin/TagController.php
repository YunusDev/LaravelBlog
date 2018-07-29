<?php

namespace App\Http\Controllers\Admin;

use App\Model\User\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{

    //

    public function __construct()
    {
        $this->middleware('auth:admin');

    }


    public function index()
    {
        //
        $tags = Tag::all();

        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tag.create');

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
        $this->validate(request(), [
            'name' => 'required|unique:tags',

        ]);

        $input =  $request->all();

        $tag = new Tag;

        $tag->name = $request->name;

        $tag->slug = str_slug($request->name, '-');

        $tag->save();

        return redirect(route('tag.index'))->with('message', 'Your Tag has been created successfully');
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
        $tag = Tag::findOrFail($id);

        return view('admin.tag.edit', compact('tag'));

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
        $this->validate(request(), [
            'name' => 'required',


        ]);

        $input =  $request->all();

        $tag = Tag::findOrFail($id);

        $tag->name = $request->name;

        $tag->slug = str_slug($request->name, '-');


        $tag->save();

        return redirect(route('tag.index'))->with('message_updateb', 'Your Tag has been updated successfully');

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
        Tag::findOrFail($id)->delete();
        return redirect(route('tag.index'))->with('message_delete', 'Your Tag has been deleted successfully');

    }
}
