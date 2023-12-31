<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {

        // dd($_GET, request()->query(), $request->query());
        // dd($request->query('status'));
        if ($request->query('status') == 'deleted') {
            $todos = Todo::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        } elseif ($request->query('status') == 'completed') {
            $todos = Todo::where('completed', 1)->latest()->get();
        } else {
            // dd('here');
            // $todos = Todo::orderBy('created_at', 'desc')->get();
            $todos = Todo::where('completed', 0)->latest()->get();
            // dd($todos);

        }

        return view('todos.index', [
            'status' => $request->query('status') ?? 'active',
            'todos' => $todos,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('todos.create', [
        'todos' => Todo::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'description' => [
                'required',
                'min:3',
                'string',
                Rule::unique('todos', 'description')->whereNull('deleted_at')
            ]
            // 'description' => ['required', 'min:3', 'string', 'unique:todos,description']
        ]);

        $todo = new Todo();
        $todo->description =  $request->description;
        $todo->user_id = $request->user()->id;
        $todo->save();

        return  redirect()->route('todos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $todoId): View
    {
        $todo = Todo::find($todoId);

        return view('todos.edit', [
            'todo' => $todo
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $todoId): RedirectResponse
    {

        $todo = Todo::find($todoId);

        $todo->description = $request->description;
        // $todo->description = $request->input('description');
        $todo->save();

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $todoId)
    {
        Todo::where('id', $todoId)->delete();   // $todo = Todo::find($todo);

        return  redirect()->back();

    }

    /**
     * Restore the specified resource in storage.
     */
    public function restore(string $todoId)
    {

        Todo::where('id', $todoId)->restore();
        // $todo = Todo::onlyTrashed()->find($todo)->restore();

        return  redirect()->route('todos.index');

    }

    public function markAsCompleted(Request $request, $todoId)
    {
        $todo = Todo::find($todoId);

        if ($request->completed == 'on') {
            $isCompleted = true;
            $sessionKey = 'todo_completed';
            $message = 'The Todo has been successfully completed!';
        } else {
            $isCompleted = false;
            $sessionKey = 'todo_incompleted';
            $message = 'The Todo has been successfully marked incomplete';
        }

        $todo->completed = $isCompleted;

        $todo->save();

        return  redirect()->back()->with($sessionKey, $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPermanently(string $todoId)
    {
        Todo::withTrashed()->where('id', $todoId)->forceDelete();

        return  redirect()->back()->with('todo_deleted_permanent', 'The Todo has been deleted permanently');

    }

}
