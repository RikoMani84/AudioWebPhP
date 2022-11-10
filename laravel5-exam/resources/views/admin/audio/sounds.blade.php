@extends('layouts.index')
@section('title')
Audio
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style=" flex: none; max-width: 1074px;">
            <div class="card">
                <h4>
                    <div class="card-header">Audio
                        <a href="/create-audio" class="btn btn-info" style="float: inline-end;">Add</a>
                    </div>
                </h4>
                <div class="card-body">
                    <h5>Category</h5>
                    <select name="categories" id="country-dropdown" class="form-control" style="margin-bottom: 1rem;">
                        @foreach (App\CategoriesModel::all() as $categories)
                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                        @endforeach
                    </select>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Name</th>
                                <th scope="col">Play</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audio_arr as $audio)
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$audio->title}}</td>
                                <td>
                                    <audio controls>
                                        <source src="/audio/{{$audio->file}}" type="audio/mp3">
                                    </audio>
                                </td>
                                <td>
                                    <form action="/delete/{{ $audio->id}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="/edit/{{$audio->id}}" class=" btn btn-success">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
