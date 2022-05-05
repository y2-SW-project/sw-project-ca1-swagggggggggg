@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h5>Albums</h5>
                </div>
                <div class="card-body">
                    @if (count($albums)=== 0)
                    <p class="text-muted">There's nothing being sold right now. Check back soon!</p>
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
