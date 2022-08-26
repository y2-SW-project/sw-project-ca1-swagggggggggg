@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">REBOOTING REBOOT</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <div class="h1 px-1">POWERING UP...</div>
                   I did not like my old project, but I knew it was a great base to start from, and so it is REBOOTED.

                   <div class="h1 pt-2 pb-1">Report :)</div>
                   <ol class="ps-3">
                       <li class="pb-2">
                           Click <a href="https://iadt-my.sharepoint.com/:w:/g/personal/n00201066_iadt_ie/EXT5ww67c3hFicOCdILMslQBuXKseF6MwJeNqgAu-xG9aQ?e=9oFnGr">here</a>.
                       </li>
                       <li class="pb-2">Let me know if there is any issue at all via my email.</li>
                   </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
