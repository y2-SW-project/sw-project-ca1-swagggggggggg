@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h5>Albums</h5>
            <a href="{{ route('admin.albums.create') }}" class="ms-auto btn btn-primary">Add</a>
          </div>
          <div class="card-body">
            @if (count($albums)=== 0)
            <p class="text-muted">There's nothing being sold right now. Check back soon!</p>
            @else
            <table id="table-albums" class="table table-hover">
                <thead>
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
                        <a href="{{ route('admin.albums.show', $album->id) }}" class="mb-2 btn btn-dark">View</a>
                        <a href="{{ route('admin.albums.edit', $album->id) }}" class="mb-2 btn btn-warning">Edit</a>
                        <form style="display:inline-block" method="POST" action="{{ route('admin.albums.destroy', $album->id) }}">
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