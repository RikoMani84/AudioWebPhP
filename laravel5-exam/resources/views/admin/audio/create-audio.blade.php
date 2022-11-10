@extends('layouts.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <h4>
                    <div class="card-header">Create audio</div>
                </h4>
                <div class="card-body" style="font-size:  1.25rem;">
                    <form action="/audio-upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input type="text" name="title" class="form-control" id="recipient-name">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">File:</label>
                            <input type="file" name="file" class="form-control" id="recipient-name">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Categories</label>
                            <select name="categories" id="country-dropdown" class="form-control" style="margin-bottom: 1rem;">
                                @foreach (App\CategoriesModel::all() as $categories)
                                <option value="{{$categories->id}}">{{$categories->name}}</option>
                                @endforeach
                            </select>
                            @error('categories')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
