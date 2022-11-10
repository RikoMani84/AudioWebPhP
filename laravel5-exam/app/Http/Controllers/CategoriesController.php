<?php

namespace App\Http\Controllers;

use App\CategoriesModel;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show()
    {
        $categories_arr = CategoriesModel::all();

        return view('music', ['categories_arr' => $categories_arr]);
    }

    public function create(Request $request)
    {
        $categories_arr = CategoriesModel::all();
        $action = $request->input('action') ?? 'show';
        $name = $request->input('name') ?? '';
        $id = $request->input('id') ?? 0;

        if ($action == 'insert') {
            $categories = new CategoriesModel;
            $categories->name = $name;
            $categories->save();
        }

        if ($action == 'delete') {
            $categories = CategoriesModel::find($id);
            $categories->delete();
        }
        return view('admin_panel', ['categories_arr' => $categories_arr]);
    }
}
