@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Edit Album
          </div>
          <div class="card-body">
          <!-- this block is ran if the validation code in the controller fails
          this code looks after displaying the correct error message to the user -->
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form method="POST" action="{{ route('admin.albums.update', $album->id)}}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <input type="hidden" name="_method" value="PUT">

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $album->title) }}" />
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $album->description) }}" />
              </div>
              <div class="form-group">
                <label for="artists">Artist(s)</label>
                <input type="text" class="form-control" id="artists" name="artists" value="{{ old('artists', $album->artists) }}" />
              </div>
              <div class="form-group">
                <label for="tracks">Tracks</label>
                <input type="text" class="form-control" id="tracks" name="tracks" value="{{ old('tracks', $album->tracks) }}" />
              </div>
              <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $album->release_date) }}" />
              </div>
              <div class="form-group">
                <label for="price">Price</label>
                <input type="decimal" class="form-control" id="price" name="price" value="{{ old('price', $album->price) }}" />
              </div>
              <div class="form-group">
                <label for="contact_name">Contact Name</label>
                <input type="text" class="form-control" id="contact_name" name="contact_name" value="{{ old('contact_name', $album->contact_name) }}" />
              </div>
              <div class="form-group">
                <label for="contact_email">Contact Email</label>
                <input type="email" class="form-control" id="contact_email" name="contact_email" value="{{ old('contact_email', $album->contact_email) }}" />
              </div>
              <div class="form-group">
                <label for="contact_phone">Contact Phone</label>
                <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ old('contact_phone', $album->contact_phone) }}" />
              </div>

              <a href="{{ route('admin.albums.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection