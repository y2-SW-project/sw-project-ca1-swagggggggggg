@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    Album: {{ $album->title }}
                </div>
                <div class="card-body">
                    <table id="table-albums" class="table table-hover">
                        <tbody>
                            <!-- tr*8>td*2 -->
                            <tr class="align-top">
                                <td class="fw-bold">Title</td>
                                <td class="ps-2">{{ $album->title }}</td>
                            </tr>
                            <tr class="align-top">
                                <td class="fw-bold">Description</td>
                                <td class="ps-2">{{ $album->description }}</td>
                            </tr>
                            <tr class="align-top">
                                <td class="fw-bold">Artist(s)</td>
                                <td class="ps-2">{{ $album->artists }}</td>
                            </tr>
                            <tr class="align-top">
                                <td class="fw-bold">Tracks</td>
                                <td class="ps-2">{{ $album->tracks }}</td>
                            </tr>
                            <tr class="align-top">
                                <td class="fw-bold">Release date</td>
                                <td class="ps-2">{{ $album->release_date }}</td>
                            </tr>
                            <tr class="align-top">
                                <td class="fw-bold">Price</td>
                                <td class="ps-2">{{ $album->price }}</td>
                            </tr>
                            <tr class="align-top">
                                <td class="fw-bold">Contact info</td>
                                <td class="ps-2">
                                    <ul class="list-unstyled">
                                        <li>{{ $album->contact_name }}</li>
                                        <li>{{ $album->contact_email }}</li>
                                        <li>{{ $album->contact_phone }}</li>
                                    </ul>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('user.albums.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection