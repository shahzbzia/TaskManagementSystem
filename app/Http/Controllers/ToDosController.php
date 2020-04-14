<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\CreateToDosRequest;
use App\Http\Requests\UpdateToDosRequest;
use App\ToDos;
use App\Priorities;
use App\Categories;
use Carbon;

class ToDosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $todos = ToDos::where('completed_at', null)->where('users_id', $user->id)->where('deleted_at', null)->get();
        return view('home')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priorities = Priorities::all();
        $categories = Categories::all();
        return view('todos.create')->with('priorities', $priorities)->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateToDosRequest $request)
    {
        $user = Auth::user();

        //dd($request->description);

        ToDos::create([

            'users_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'date_reminder' => $request->date_reminder,
            'end_time' => $request->end_time,
            'time_reminder' => $request->time_reminder,
            'priorities_id' => $request->priorities_id,
            'categories_id' => $request->categories_id,

        ]);

        session()->flash('success', 'To Do Created Successfully!');

        return redirect(route('todos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priorities = Priorities::all();
        $categories = Categories::all();
        $todo = ToDos::where('id', $id)->firstOrFail();
        return view('todos.create')->with('priorities', $priorities)->with('todo', $todo)->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateToDosRequest $request, $id)
    {
        $todo = ToDos::where('id', $id)->firstOrFail();

        $todo->update([

            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'date_reminder' => $request->date_reminder,
            'end_time' => $request->end_time,
            'time_reminder' => $request->time_reminder,
            'priorities_id' => $request->priorities_id,
            'categories_id' => $request->categories_id,

        ]);

        session()->flash('success', 'To Do Update Successfully!');

        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $todo = ToDos::withTrashed()->where('id', $id)->firstOrFail();


        if ($todo->trashed()) {

            $todo->forceDelete();
            
            session()->flash('success', 'ToDo deleted successfully.');
        }
        else{

            $todo->delete();

            session()->flash('success', 'ToDo trashed successfully.');
        }

        return redirect()->back();

    }

    /**
     * Mark as complete.
     *
     */
    public function markCompleted($id)
    {

        date_default_timezone_set('Europe/Brussels');

        $now = now()->toDateTimeString();

        //dd($now);

        ToDos::where('id', $id)->update(
            ['completed_at' => $now]
        );

        session()->flash('success', 'ToDo marked completed successfully.');

        return redirect(route('todos.index'));
    }

    public function markNotCompleted($id)
    {

        ToDos::where('id', $id)->update(
            ['completed_at' => null]
        );

        return redirect(route('todos.showCompleted'));
    }

    public function showCompleted()
    {

        $user = Auth::user();

        $todos = ToDos::whereNotNull('completed_at')->where('users_id', $user->id)->where('deleted_at', null)->get();
        return view('home')->with('todos', $todos);

    }

    public function showTrashed()
    {

        $user = Auth::user();

        $todos = ToDos::onlyTrashed()->where('users_id', $user->id)->get();
        return view('home')->with('todos', $todos);

    }

    public function restore($id)
    {

        $todo = ToDos::withTrashed()->where('id', $id)->firstOrFail();

        $todo->restore();


        session()->flash('success', 'ToDo restored successfully.');

        return redirect()->back();
    }

    public function showHomeTodos()
    {

        $user = Auth::user();

        $todos = ToDos::where('completed_at', null)->where('users_id', $user->id)->where('deleted_at', null)->where('categories_id', '=' , 2)->get();
        
        return view('home')->with('todos', $todos);

    }

    public function showWorkTodos()
    {

        $user = Auth::user();

        $todos = ToDos::where('completed_at', null)->where('users_id', $user->id)->where('deleted_at', null)->where('categories_id', '=' , 1)->get();
        
        return view('home')->with('todos', $todos);

    }

    public function showPersonalTodos()
    {

        $user = Auth::user();

        $todos = ToDos::where('completed_at', null)->where('users_id', $user->id)->where('deleted_at', null)->where('categories_id', '=' , 3)->get();
        
        return view('home')->with('todos', $todos);

    }

    public function showTodayTodos()
    {

        date_default_timezone_set('Europe/Brussels');

        $user = Auth::user();

        $today = now()->format('Y-m-d');

        //dd($today);

        $todos = ToDos::where('completed_at', null)->where('users_id', $user->id)->where('deleted_at', null)->where('date', $today)->get();
        
        return view('home')->with('todos', $todos);

    }
}
