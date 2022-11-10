<?php

namespace App\Http\Controllers;

use App\AudioModel;
use App\CategoriesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
{
    public function show(Request $request)
    {
        $audio_arr = AudioModel::all();
        $find_text = $request->input('find_text') ?? '';
        $title = $request->input('title');
        $action = $request->input('action') ?? 'show';
        
        if ($action == 'find') {
            $audio = AudioModel::where('title', 'LIKE', "%$find_text%")->get();;
        }
        return view('user_audio', ['audio_arr' => $audio_arr]);
    }
    public function download(Request $request, $id)
    {
        $audio = AudioModel::find($id);
        return response()->download(public_path('/audio/' . $audio->file));
    }
    public function complaint(Request $request, $id)
    {
        $audio = AudioModel::find($id);
        return view('complaint')->with('audio', $audio);
    }
    public function complaint_send(Request $request, $id)
    {
        $other = $request->input('other');
        return redirect('/message')->with('message', $other);
    }
}
