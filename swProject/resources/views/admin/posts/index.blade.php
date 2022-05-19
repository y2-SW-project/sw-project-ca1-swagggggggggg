@extends('layouts.app')

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h5>Posts</h5>
            <a href="{{ route('admin.posts.create') }}" class="ms-auto btn btn-primary">Add</a>
          </div>
          <div class="card-body">
            @if (count($posts)=== 0)
            <p class="text-muted">There's nothing being sold right now. Check back soon!</p>
            @else
            <table id="table-posts" class="table table-hover">
                <thead>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Artist(s)</th>
                  <th>Tracks</th>
                  <th>Release Date</th>
                </thead>
                <tbody>
                  @foreach ($posts as $post)
                    <tr data-id="{{ $post->id }}">
                      <td>{{ $post->post_text }}</td>

                      <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}" class="mb-2 btn btn-dark">View</a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="mb-2 btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token"  value="{{ csrf_token() }}">
                          <button type="submit" class="form-cotrol mb-2 btn btn-danger">Delete</a>
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