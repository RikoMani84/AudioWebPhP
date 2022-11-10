@extends('layouts.index')
@section('title')
Message
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Message</div>
                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif
                    Not new message
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
@endsection

