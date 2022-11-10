@extends('layouts.app')

@section('content')
<div class="container">
    <h5>Complaint</h5>
    <form action="/complaint_send/{{$audio->id}}" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">message</label>
            <textarea class="form-control" name="other" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection
