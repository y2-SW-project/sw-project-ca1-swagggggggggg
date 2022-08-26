<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;


class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::all();
        return view('admin.albums.index', [
            // the view can see the albums (the green one)
            'albums' => $albums
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('admin.albums.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the album will be stored in the DB
        $request->validate([
            'post_text' => 'required|min:20|max:250'
        ]);

        // if validation passes create the new book
        $album = new Album();
        $album->post_text = $request->input('post_text');
        $album->location = $request->input('location');
        
        $album->save();

        return redirect()->route('admin.albums.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::findOrFail($id);

        return view('admin.albums.show', [
            'album' => $album
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);

        // get the album above, and then the edit view
        // will display the album, and allow the admin
        // to edit the album.
        return view('admin.albums.edit', [
            'album' => $album
        ]);
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

        //When user clicks on submit on the Edit View
        // this function will be called.

        // first get the existing album that the user is update
        $album = Album::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:500',
        ]);

        // if validation passes then update existing album
        $album->title = $request->input('title');
        $album->description = $request->input('description');
        $album->artists = $request->input('artists');
        $album->tracks = $request->input('tracks');
        $album->release_date = $request->input('release_date');
        $album->price = $request->input('price');
        $album->contact_name = $request->input('contact_name');
        $album->contact_email = $request->input('contact_email');
        $album->contact_phone = $request->input('contact_phone');
        $album->save();

        return redirect()->route('admin.albums.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('admin.albums.index');
    }
}