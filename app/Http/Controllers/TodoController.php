<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\PseudoTypes\True_;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        // $todos = auth()->user()->todos()->orderBy('completed')->get();
        $todos = auth()->user()->todos->sortBy('completed');
        // $todos = Todo::orderBy('completed')->get();
        // return $todos;
        return view('todos.index', compact('todos'));
        // return view('todos.index')->with(['todos' => $todos]);
    }
    public function create()
    {
        return view('todos.create');
    }
    public function store(TodoCreateRequest $request)
    {
        // dd($request->all());
        //dd(auth()->id());
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step)
        {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        //$todo->steps()->create();
        // dd($todo);
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message','Todo Created Successfully');
    }
    public function edit(Todo $todo)
    {
        // dd($todo->title);
        // $todo = Todo::find($id);
        return view('todos.edit', compact('todo'));
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        // dd($request->all());
        $todo->update(['title' => $request->title, 'description' => $request->description]);
        if($request->stepName)
        {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if($id){
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
                else
                {
                    $todo->steps()->create(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message','updated!');
        // update todo
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed'=> true]);
        return redirect(route('todo.index'))->with('message','Task Marked as Completed!');
    }
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed'=> false]);
        return redirect(route('todo.index'))->with('message','Task Marked as Incompleted!');
    }
    public function destroy(Todo $todo)
    {
        // $todo->steps()->delete();
        $todo->steps->each->delete();
        $todo->delete();
        return redirect(route('todo.index'))->with('message','Task Deleted!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        // return ($todo->steps);
        return view('todos.show', compact('todo'));
    }
}
