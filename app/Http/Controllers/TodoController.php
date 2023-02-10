<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;



class TodoController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $todos = Todo::where('user_id', auth()->user()->id)->get();

        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(TodoRequest $request)
    {

        $user = auth()->user();
        $todo = new Todo();
        $todo->user_id = $user->id;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->task_level = $request->task_level;
        $user->todos()->save($todo);

        $request->session()->flash('alert-success', 'Todo Created Successfully');

        return redirect()->route('todos.index');



    }

    public function show($id)
    {
        if (!auth()->check()) {
            abort(404);
        }

        $user = auth()->user();
        $todo = $user->todos()->where('id', $id)->firstOrFail();
        return view('todos.show', ['todo' => $todo]);
    }



    public function edit($id)
    {
        $user = auth()->user();
        $todo = $user->todos()->findOrFail($id);
        return view('todos.edit', compact('todo'));
    }


    public function update(TodoRequest $request, $id)
    {
        $user = auth()->user();
        $todo = $user->todos()->findOrFail($id);
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->is_completed = $request->is_completed;
        $todo->task_level = $request->task_level;
        $todo->save();

        $request->session()->flash('alert-success', 'Todo Updated Successfully');

        return redirect()->route('todos.index');
    }


    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();


        return redirect()->route('todos.index')->with('success', 'Todo task has been deleted successfully.');
    }
}