@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                <h5>Albums</h5>

<!-- this modal unfortunately has a problem with the submit button -->
<!--                           HAD* -> hierarchy error: form was in modal body, so submit had no link -->

                <button type="button" class="ms-auto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add listing
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
                  <input type="text" class="form-control" id="post_text" name="post_text" value="{{ old('post_text') }}" />
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
                <div class="card-body">
                    @if (count($albums)=== 0)
                    <p class="text-muted">Start the conversation!</p>
                    @else
                    <table id="table-albums" class="table table-hover">
                        <thead>
                            <!-- includes album info -->
                            <th>Title</th>
                            <th>Description</th>
                            <th>Artist(s)</th>
                            <th>Tracks</th>
                            <th>Release Date</th>
                        </thead>

                        <tbody>
                          <!-- v debug v -->
                         @foreach ($albums as $album)
                            <tr data-id="{{ $album->id }}">
                                <td>{{ $album->users->name}}</td>
                                <td>{{ $album->location}}</td>
                                <td>{{ $album->post_text }}</td>
                                <td>{{ $album->updated_at }}</td>

                                <!-- dropdown? -->
                                <td class="d-flex">
                                    <!-- <a href="{{ route('user.albums.show', $album->id) }}" class="btn btn-dark mx-1 mb-1">View</a> -->
                                    <a href="{{ route('user.albums.edit', $album->id) }}" class="btn btn-warning mx-1 mb-1">Edit</a>
                                    <form method="POST" action="{{ route('user.albums.destroy', $album->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                    <button type="submit" class="form-control btn btn-danger mx-1 mb-1">Delete</a>
                                    </form>
                                  </form>
                                </td>

                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
