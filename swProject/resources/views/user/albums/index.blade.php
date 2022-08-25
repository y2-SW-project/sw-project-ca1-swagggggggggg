@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
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
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" />
                </div>
                <div class="form-group">
                  <label for="artists">Artist(s)</label>
                  <input type="text" class="form-control" id="artists" name="artists" value="{{ old('artists') }}" />
                </div>
                <div class="form-group">
                  <label for="tracks">Tracks</label>
                  <input type="text" class="form-control" id="tracks" name="tracks" value="{{ old('tracks') }}" />
                </div>
                <div class="form-group">
                  <label for="release_date">Release Date</label>
                  <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date') }}" />
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="decimal" class="form-control" id="price" name="price" value="{{ old('price') }}" />
                </div>
                <div class="form-group">
                  <label for="contact_name">Contact Name</label>
                  <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ old('contact_name') }}" />
                </div>
                <div class="form-group">
                  <label for="contact_email">Contact Email</label>
                  <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email') }}" />
                </div>
                <div class="form-group">
                  <label for="contact_phone">Contact Phone</label>
                  <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}" />
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
                            @foreach ($albums as $album)
                            <tr data-id="{{ $album->id }}">
                                <td>{{ $album->title }}</td>
                                <td>{{ $album->description }}</td>
                                <td>{{ $album->artists }}</td>
                                <td>{{ $album->tracks }}</td>
                                <td>{{ $album->release_date }}</td>

                                <td>
                                    <a href="{{ route('user.albums.show', $album->id) }}" class="btn btn-dark">View</a>
                                    <a href="{{ route('user.albums.edit', $album->id) }}" class="mb-2 btn btn-warning">Edit</a>
                                    <form method="POST" action="{{ route('user.albums.destroy', $album->id) }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                                    <button type="submit" class="form-cotrol mb-2 btn btn-danger">Delete</a>
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
