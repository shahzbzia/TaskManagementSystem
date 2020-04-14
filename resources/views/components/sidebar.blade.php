<aside class="w-1/5 mt-3 leading-none">
                        
    <section class="mb-8">
        <h5 class="uppercase mb-4 font-bold">To Do's</h5>

        <ul class="list-none">
            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.index') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.index') }}">All ToDo's</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.create') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.create') }}">Create To Do's</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.showTodayTodos') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.showTodayTodos') }}">Today's Todos</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.showWorkTodos') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif text-black hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.showWorkTodos') }}">Work/School ToDo's</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.showHomeTodos') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif text-black hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.showHomeTodos') }}">Home ToDo's</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.showPersonalTodos') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif text-black hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.showPersonalTodos') }}">Personal ToDo's</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.showCompleted') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif text-black hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.showCompleted') }}">Completed ToDo's</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.showTrashed') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif text-black hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.showTrashed') }}">Trashed ToDo's</a>
            </li>

            
{{--             <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'todos.index') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('todos.index') }}" href="">Long Term Assignments (coming Soon)</a>
            </li> --}}

        </ul>


    </section>

    <section class="mb-8">
        
        <h5 class="uppercase mb-4 font-bold">User's Domain</h5>

        <ul class="list-none">

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == 'user.showUserEditForm') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="{{ route('user.showUserEditForm') }}">Edit Profile</a>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == '') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="">Personal Diary</a>
                <p class="text-xs font-thin">coming soon</p>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == '') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="">Change Password</a>
                <p class="text-xs font-thin">coming soon</p>
            </li>

            <li class="text-sm pb-4">
                <a class="@if (Route::currentRouteName() == '') text-{{Auth::user()->theme->value}}-500 font-bold @else text-black @endif hover:no-underline hover:text-{{Auth::user()->theme->value}}-500" href="">Refer to a Friend (via SMS)</a>
                <p class="text-xs font-thin">coming soon</p>
            </li>
        </ul>


    </section>

</aside>