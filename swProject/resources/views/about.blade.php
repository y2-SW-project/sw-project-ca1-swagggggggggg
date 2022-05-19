@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">About Vinny's Vinyls</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="h1 px-1">Who is Vinny?</div>
                   Vinny, full name Vincent Van Gogh, is our founder. Not to be confused with the Renaissance artist, our Vinny is an Italian-American who was sick of scouring eBay and other sites for rare vinyls. They were filled with ads and clutter, and so we were founded.

                   <div class="h1 pt-2 pb-1">Report :)</div>
                   <ol class="ps-3">
                       <li class="pb-2">
                           Click <a href="https://iadt-my.sharepoint.com/:w:/g/personal/n00201066_iadt_ie/EQo0F8sehjdApd_ZlnFxvEIBK3ELzrCZkbYCnGfppDLhwA?e=JcmOy5">here</a>.
                       </li>
                       <li class="pb-2">Let me know if there is any issue</li>
                   </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
