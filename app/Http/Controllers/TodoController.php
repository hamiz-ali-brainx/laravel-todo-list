<?php

namespace App\Http\Controllers;


use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    // return todo view
    public function index()
    {
        $todo = Todo::where('user_id', Auth::user()->id)->get();
        return view('index')->with('todos', $todo)->with("user", Auth::user()->name);
    }


    // store the todo view in database
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        $data = $request->all();
        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];

        //associate with each user
        $todo->user()->associate(Auth::user());
        $todo->save();
        session()->flash("success", 'Todo Created Successfully');
        return redirect('/');
    }


    //return create view
    public function create()
    {
        return view('create');
    }

    //return details view
    public function details(Todo $todo)
    {
        return view('details')->with('todos', $todo);
    }

    //edit todo view
    public function edit(Todo $todo)
    {
        return view('edit')->with('todos', $todo);
    }

    //update todo on database
    public function update(Request $request, Todo $todo)
    {

        $request->validate([
            'name' => ['required'],
            'description' => ['required']
        ]);

        $data = $request->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->save();
        session()->flash('success', 'Todo Updated Successfully');

        return redirect('/');
    }

    //delete todo
    public function delete(Todo $todo)
    {
        $todo->delete();
        session()->flash('success', 'Todo Deleted Successfully');
        return redirect('/');
    }
}
