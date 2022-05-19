@extends('layouts.app')

@section ('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="card">
          <div class="card-header">
            post: {{ $post->title }}
          </div>
          <div class="card-body">
              <table id="table-posts" class="table table-hover">
                <tbody>
                  <tr class="align-top">
                    <td class="fw-bold">Title</td>
                    <td class="ps-2">{{ $post->title }}</td>
                  </tr>
                  <tr class="align-top">
                    <td class="fw-bold">Description</td>
                    <td class="ps-2">{{ $post->description }}</td>
                  </tr>
                  <tr class="align-top">
                    <td class="fw-bold">Artist(s)</td>
                    <td class="ps-2">{{ $post->artists }}</td>
                  </tr>
                  <tr class="align-top">
                    <td class="fw-bold">Tracks</td>
                    <td class="ps-2">{{ $post->tracks }}</td>
                  </tr>
                  <tr class="align-top">
                    <td class="fw-bold">Release Date</td>
                    <td class="ps-2">{{ $post->release_date }}</td>
                  </tr>
                  <tr class="align-top">
                    <td class="fw-bold">Price</td>
                    <td class="ps-2">{{ $post->price }}</td>
                  </tr>
                  <tr class="align-top">
                        <td class="fw-bold">Contact info</td>
                            <td class="ps-2">
                                 <ul class="list-unstyled">
                                     <li>{{ $post->contact_name }}</li>
                                     <li>{{ $post->contact_email }}</li>
                                     <li>{{ $post->contact_phone }}</li>
                                </ul>
                        </td>
                    </tr>
                </tbody>
              </table>

              <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection