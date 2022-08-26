@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                <h5>Dashboard</h5>

<!-- this modal unfortunately has a problem with the submit button -->
<!--                           HAD* -> hierarchy error: form was in modal body, so submit had no link -->

                <button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add post
          </button>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add a listing</h5>

                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


              <form method="POST" action="{{ route('user.albums.store')  }}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">

              <div class="modal-body">
                <div class="form-group">
                  <label for="post_text">Post Text</label>
                  <input title="please use the correct amount of characters" pattern="{20, 500}" type="text" class="form-control" id="post_text" name="post_text" value="{{ old('post_text') }}" />
                  <p class="text-muted m-1">Minimum of 20 characters, maximum of 500</p>
                </div>
                <div class="form-group">
                  <label for="location">Location (optional)</label>
                  <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}" />
                </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
              </div>

              </form>

              </div>
            </div>
          </div>
        </div>                          


                <div class="card border border-2 border-secondary rounded">
                  <div class="card-body">
                    
                  @if (count($albums)=== 0)
                  <p class="text-muted">Start the conversation!</p>
                  @else

                  @foreach ($albums as $album)
                      <div data-id="{{ $album->id }}">

                        <div class="d-flex mb-0 align-items-top">
                          <h2 class="text-decoration-underline fs-5">{{ $album->users->name}}</h2>

                          @if (auth()->id() == $album->user_id)

                          <div class="dropdown ms-auto">
                            <button class="btn btn-sm btn-dark fs-5 rounded-5 py-0 dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>

                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                              <li>
                                <a href="{{ route('user.albums.edit', $album->id) }}" class="form-control btn btn-warning my-1">Edit</a>
                              </li>

                              <li>
                                <form method="POST" action="{{ route('user.albums.destroy', $album->id) }}">
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                  <button type="submit" class="form-control btn btn-danger mb-1">Delete</a>
                                </form>
                              </li>
                            </ul>
                            
                          </div>
                          @endif
                        </div>

                          <div class="d-block text-capitalize fs-6 mb-1">{{ $album->location}}</div>
                          <div class="d-flex mb-4">
                            <div class="pe-4 text-break">{{ $album->post_text }}</div>
                            <div class="text-muted text-nowrap ms-auto">{{ $album->updated_at }}</div>
                          </div>
                      </div>
                  @endforeach
                  </div>
                </div>


                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
