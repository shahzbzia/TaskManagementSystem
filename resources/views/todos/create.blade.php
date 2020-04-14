@extends('layouts.app')

@section('content')
<div class="container">

    <div class="align-middle mt-2">

        <h2 class="text-2xl text-{{ Auth::user()->theme->value }}-500 font-bold tracking-widest uppercase font-mono mb-4 leading-relaxed">{{ isset($todo) ? 'Edit A Task' : 'Create A Task' }}</h2>

        <form class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4" method="POST" action="{{ isset ($todo) ? route('todos.update', $todo->id) : route('todos.store') }}">

            @csrf

            @if(isset($todo))
				@method('PUT')
			@endif

            <h5 class="text-base font-bold">General Informaton</h5>

            <hr class="mt-2 mb-3">

            <div class="mb-4">
				
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="name">

                    Title
                

                	<input id="name" type="name" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') bg-red-200 @enderror" name="name" value="{{ isset ($todo) ? $todo->name : old('name') }}" required autocomplete="name" autofocus>

                </label>

                @error('name')
                    <span class="text-red-500 text-xs italic" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <div class="mb-4">

                <label class="block text-gray-700 text-sm font-semibold mb-2" for="description">

                    Description
                

                	<textarea name="description" rows="4" cols="50" id="description" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('description') bg-red-200 @enderror" > {{ isset ($todo) ? $todo->description : old('description') }} </textarea>

				</label>

                @error('description')
                    <span class="text-red-500 text-xs italic" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>

            <h5 class="text-base font-bold">Deadline</h5>

            <hr class="mt-2 mb-3">

            <div class="flex justify-between">
            	<div class="mb-4 w-5/12">
				
	                <label class="block text-gray-700 text-sm font-semibold mb-2" for="date">

	                    Date
	                

	                	<input id="date" type="date" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date') bg-red-200 @enderror" name="date" value="{{ isset ($todo) ? $todo->date : old('date') }}" required autofocus>

	                </label>

	                @error('date')
	                    <span class="text-red-500 text-xs italic" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror

	            </div>

	            <div class="mb-4 w-5/12">
				
	                <label class="block text-gray-700 text-sm font-semibold mb-2" for="end_time">

	                    Time
	                

	                	<input id="end_time" type="time" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('end_time') bg-red-200 @enderror" name="end_time" value="{{ isset ($todo) ? $todo->end_time : old('end_time') }}" required autofocus>

	                </label>

	                @error('end_time')
	                    <span class="text-red-500 text-xs italic" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror

	            </div>
            </div>

            <h5 class="text-base font-bold">Reminder Setup</h5>

            <hr class="mt-2 mb-3">

            <div class="flex justify-between">
            	<div class="mb-4 w-5/12">
				
	                <label class="block text-gray-700 text-sm font-semibold mb-2" for="date_reminder">

	                    Date
	                

	                	<input id="date_reminder" type="date" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('date_reminder') bg-red-200 @enderror" name="date_reminder" value="{{ isset ($todo) ? $todo->date_reminder : old('date_reminder') }}" required autofocus>

	                </label>

	                @error('date_reminder')
	                    <span class="text-red-500 text-xs italic" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror

	            </div>

	            <div class="mb-4 w-5/12">
				
	                <label class="block text-gray-700 text-sm font-semibold mb-2" for="time_reminder">

	                    Time

	                	<input id="time_reminder" type="time" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('time_reminder') bg-red-200 @enderror" name="time_reminder" value="{{ isset ($todo) ? $todo->time_reminder : old('time_reminder') }}" required autofocus>

	                </label>

	                @error('time_reminder')
	                    <span class="text-red-500 text-xs italic" role="alert">
	                        <strong>{{ $message }}</strong>
	                    </span>
	                @enderror

	            </div>
            </div>

            <h5 class="text-base font-bold">Priority</h5>

            <hr class="mt-2 mb-3">

            <label class="w-full text-gray-700 text-sm font-semibold mb-6" for="priorities_id">

            	Select Priority

	            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('priorities_id') bg-red-200 @enderror" name="priorities_id" id="priorities_id" required autofocus>
				    @foreach ($priorities as $p)
				    	<option value="{{ $p->id }}"
				    		
				    		@if (isset($todo))

				    			@if ($p->id === $todo->priorities_id)

				    				selected

				    			@endif

				    		@endif

				    		>

				    		{{ $p->name }}

				    	</option>

				    @endforeach

				</select>

			</label>

			<h5 class="text-base font-bold">Category</h5>

            <hr class="mt-2 mb-3">

            <label class="w-full text-gray-700 text-sm font-semibold mb-6" for="categories_id">

            	Select Category

	            <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline @error('categories_id') bg-red-200 @enderror" name="categories_id" id="categories_id" required autofocus>
				    @foreach ($categories as $c)
				    	<option value="{{ $c->id }}"
				    		
				    		@if (isset($todo))

				    			@if ($c->id === $todo->categories_id)

				    				selected

				    			@endif

				    		@endif

				    		>

				    		{{ $c->name }}

				    	</option>

				    @endforeach

				</select>

			</label>

            <div class="flex items-center justify-between">

                <button class="bg-{{ Auth::user()->theme->value }}-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ isset($todo) ? 'Save' : 'Create Task!' }}
                </button>

            </div>

        </form>

    </div>

</div>
@endsection
