@extends('layouts.app')

@section('content')
<div class="container">

    @foreach ($todos as $todo)

        <div class="align-middle mx-auto mt-3 shadow-lg w-4/5 justify-between" >

                <div class="@if ($todo->priorities_id == 1) bg-{{Auth::user()->highColor->value}}-500 @elseif ($todo->priorities_id == 2) bg-{{Auth::user()->mediumColor->value}}-500 @else bg-{{Auth::user()->lowColor->value}}-500  @endif text-white font-bold rounded-t px-4 py-2 flex justify-between">
                    
                    <div>
                        {{ $todo->name }}
                    </div>

                    <div>
                        {{ $todo->category['name'] }}
                    </div>

                </div>

            <div class="border border-t-0 border-red-400 rounded bg-white px-4 py-3 text-black mb-5">

                <span class="uppercase font-bold">Description: </span> {{ $todo->description }}

                <div class="flex">
                    
                    <span class="uppercase font-bold">Deadline: </span>  

                    <div class="ml-3 flex font-sm">
                        <div>
                            <span class="underline font-semibold">Date</span>: {{ $todo->date }}
                        </div>

                        <div class="ml-4">
                            <span class="underline font-semibold">Time</span>: {{ $todo->end_time }}
                        </div>
                    </div>
                    
                </div>


                <div class="flex">
                    <span class="uppercase font-bold">Reminder: </span>  

                    <div class="ml-3 flex font-sm">
                        <div>
                            <span class="underline font-semibold">Date</span>: {{ $todo->date_reminder }}
                        </div>

                        <div class="ml-4">
                            <span class="underline font-semibold">Time</span>: {{ $todo->time_reminder }}
                        </div>
                    </div>
                </div>

                <span class="uppercase font-bold">Priority: </span> <span class="@if ($todo->priorities_id == 1) text-{{ Auth::user()->highColor->value }}-500 @elseif ($todo->priorities_id == 2) text-{{ Auth::user()->mediumColor->value }}-500 @else text-{{ Auth::user()->lowColor->value }}-500  @endif font-semibold">{{ $todo->priority->name }}</span>


                <div class="mt-6">
                
                    <div class="flex justify-between">
                        @if (Route::currentRouteName() == 'todos.index' || Route::currentRouteName() == 'todos.showHomeTodos' || Route::currentRouteName() == 'todos.showWorkTodos' || Route::currentRouteName() == 'todos.showPersonalTodos' || Route::currentRouteName() == 'todos.showTodayTodos')
                            <a class="hover:no-underline bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('todos.edit', $todo->id) }}">
                                Edit
                            </a>

                            <a href="{{ route('todos.markCompleted', $todo->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:no-underline">
                                Mark as Completed!
                            </a>
                            

                            <form action="{{  route('todos.destroy', $todo->id) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                <button class="hover:no-underline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Trash
                                </button>

                            </form>
                            
                        @endif
                    </div>

                    <div class="flex justify-around">
                        @if (Route::currentRouteName() == 'todos.showCompleted')
                            <a href="{{ route('todos.markNotCompleted', $todo->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:no-underline">
                                Mark as Not-Completed!
                            </a>

                            <form action="{{  route('todos.destroy', $todo->id) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                <button class="hover:no-underline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Trash
                                </button>

                            </form>
                        @endif
                    </div>

                    <div class="flex justify-around">
                        @if (Route::currentRouteName() == 'todos.showTrashed')
                            <form action="{{  route('todos.restore', $todo->id) }}" method="POST">

                                @csrf

                                @method('PUT')

                                <button class="hover:no-underline bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Restore
                                </button>

                            </form>

                            <form action="{{  route('todos.destroy', $todo->id) }}" method="POST">

                                @csrf

                                @method('DELETE')

                                <button class="hover:no-underline bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Delete Permanently!
                                </button>

                            </form>
                        @endif
                    </div>

                </div>


            </div>


        </div>


    @endforeach

</div>
@endsection
