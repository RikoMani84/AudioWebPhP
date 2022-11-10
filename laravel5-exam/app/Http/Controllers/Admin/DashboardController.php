<?php

namespace App\Http\Controllers\Admin;

use App\AudioModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function registered()
    {
        $users_arr = User::all();
        return view('admin.user.register')->with('users_arr', $users_arr);
    }

    public function registerededit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.register-edit')->with('users', $users);
    }
    public function registeredupdate(Request $request, $id)
    {
        $users_arr = User::find($id);
        $users_arr->name = $request->input('username');
        $users_arr->usertype = $request->input('usertype');
        $users_arr->block = $request->input('block');
        $users_arr->update();
        return redirect('/role-register')->with('status', 'Your Data is Update');
    }
    public function registereddelete(Request $request, $id)
    {
        $users_arr = User::find($id);
        $users_arr->delete();
        return redirect('/role-register')->with('status', 'Your Data is Deleted');
    }



    public function audio()
    {
        $audio_arr = AudioModel::all();
        return view('admin.audio.sounds')->with('audio_arr', $audio_arr);
    }

    public function audiodelete(Request $request, $id)
    {
        $audio_arr = AudioModel::find($id);
        $audio_arr->delete();
        return redirect('/sounds')->with('status', 'Your Data is Deleted');
    }

    public function editAudio(Request $request, $id)
    {
        $audio = AudioModel::findOrFail($id);
        return view('admin.audio.edit')->with('audio', $audio);
    }

    public function audioUpdate(Request $request, $id)
    {
        $audio = AudioModel::find($id);
        $audio->title = $request->input('title');
        $audio->categories_id = $request->input('categories');
        $audio->update();
        return redirect('/sounds')->with('status', 'Your Data is Update');
    }

    public function create()
    {
        return view('admin.audio.create-audio');
    }

    public function audioupload(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required|mimes:mp3',
            'categories' => 'required'
        ]);

        $fileName = $request->file->hashName('');
        $request->file->move(public_path('audio'), $fileName);

        $audio = new AudioModel;
        $audio->title = $request->get('title');
        $audio->categories_id = $request->get('categories');
        $audio->file = $fileName;
        $audio->save();
        return redirect('/create-audio')->with('message', "Audio create successfully!");

    }
}
