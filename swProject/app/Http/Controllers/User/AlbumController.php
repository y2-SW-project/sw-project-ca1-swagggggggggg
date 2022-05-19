<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:user, admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all from albums table
        $albums = Album::all();
        return view('user.albums.index', [
            //$albums goes into 'album' so the view can see it
            'albums' => $albums
        ]);
    }

    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('admin.albums.create');
        }

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
                'title' => 'required',
                'description' =>'required|max:500',
            ]);

            // if validation passes create the new book
            $album = new Album();
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

            return redirect()->route('user.albums.index');
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

                return view('user.albums.show', [
                    'album' => $album
                ]);
            }
    }