<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $albums = Album::with('users')->get();

        return view('user.albums.index', [
            //$albums goes into 'album' so the view can see it
            'albums' => $albums
        ]);
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
                'post_text' => 'required|min:20|max:250'
            ]);

            $id= Auth::id();

            // if validation passes create the new book
            $album = new Album();
            $album->user_id = $id;
            $album->post_text = $request->input('post_text');
            $album->location = $request->input('location');

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

            public function destroy($id)
            {
                // $request->validate([
                //     'user_id' => 'required',

                //     function get_current_user_id() {
                //         if ( ! function_exists( 'wp_get_current_user' ) ) {
                //             return 0;
                //         }
                //         $user = wp_get_current_user();
                //         return ( isset( $user->ID ) ? (int) $user->ID : 0 );
                //     }
                // ]);


                $album = Album::findOrFail($id);
                $album->delete();

                return redirect()->route('user.albums.index');
            }
    }