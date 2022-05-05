@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About Andrew's Albums</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="h1 px-1">Our Mission</div>
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque iure quibusdam ipsa earum esse unde delectus nemo dolores eum beatae.

                   <div class="h1 pt-2 pb-1">Our Goals</div>
                   <ol class="ps-3">
                       <li class="pb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores nam, perspiciatis iste deserunt aspernatur nemo.</li>
                       <li class="pb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                       <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nam numquam suscipit pariatur culpa odio adipisci sed!</li>
                   </ol>

                   <div class="h1 pt-2 pb-1">Our Origins</div>
                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime temporibus quae voluptatem, voluptates facilis fugit nemo sunt, distinctio, dolore excepturi praesentium! Ut labore quis consequuntur veritatis, pariatur sint voluptatum doloremque doloribus deserunt quibusdam odio necessitatibus error blanditiis magnam quaerat id quo inventore accusamus eos ullam sequi excepturi, culpa voluptatem. A ratione eveniet rem architecto harum hic suscipit voluptate eius cum, aliquam maxime earum nulla veniam deleniti.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
