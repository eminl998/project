<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $todos = Todo::where('title', 'like', '%' . $query . '%')->get();
        return view('todos.search', ['todos' => $todos, 'query' => $query]);
    }

}

