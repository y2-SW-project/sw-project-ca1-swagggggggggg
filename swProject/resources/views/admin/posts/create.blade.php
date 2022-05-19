@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            Add new post
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
            <form method="POST" action="{{ route('admin.posts.store')  }}">
              <input type="hidden" name="_token" value="{{  csrf_token()  }}">
              <div class="form-group">
                <label class="d-block" for="post_text">Post Text</label>
                <input class="mb-3 w-100 post-input" type="text" class="form-control" id="post_text" name="post_text" value="{{ old('post_text') }}" />
              </div>

              <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date') }}" />
              </div>

              <a href="{{ route('admin.posts.index') }}" class="btn btn-outline">Cancel</a>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection