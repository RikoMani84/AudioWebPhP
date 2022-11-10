@extends('layouts.app')

@section('content')
<div class="container">
    <div class="block" style="margin-left: 12rem;">
        <form class="row g-3">
            @csrf
            <div class="col-auto">
                <input type="text" class="form-control" name="find_text" id="inputPassword2">
            </div>
            <div class="col-auto">
                <input type="hidden" name="action" value="find">
                <input type="submit" value="Search" class="btn btn-primary mb-3">
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                </div>
                <div class="card">
                    <h5>Category</h5>
                    <select name="categories" id="country-dropdown" class="form-control" style="margin-bottom: 1rem;">
                        @foreach (App\CategoriesModel::all() as $categories)
                        <option value="{{$categories->id}}">{{$categories->name}}</option>
                        @endforeach
                    </select>
                    <table class="table table-striped table-hover" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">№</th>
                                <th scope="col">Name</th>
                                <th scope="col">Play</th>
                                <th scope="col">Download</th>
                                <th scope="col">Complaint</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audio_arr as $audio)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$audio->title}}</td>
                                <td>
                                    <audio controls onplay="pauseOthers(this);" style="background: #c7eed8;border-radius: 41px;">
                                        <source src="/audio/{{$audio->file}}" type="audio/mp3">
                                    </audio>
                                </td>
                                <td>
                                    <a href="/download/{{$audio->id}}" class="btn btn-primary">download</button>
                                </td>
                                <td>
                                    <a href="/complaint/{{$audio->id}}" style="color: red;font-size: 1.5rem; font-weight: 900;">!</a>
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
