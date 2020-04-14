@extends('layouts.app')

@section('content')
<div class="container">

    <div class="align-middle mx-auto mt-12 @guest w-3/5 @else w-4/5 @endif ">

        <h2 class="text-2xl @auth text-{{$user->theme->value}}-500 @else text-black @endauth font-bold tracking-widest uppercase font-mono mb-2 ml-4">{{ isset($user) ? 'Edit Profile' : 'Sign Up' }}</h2>

        <form class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4" method="POST" action="{{ isset($user) ? route('user.update', $user->id) : route('register') }}" enctype="multipart/form-data">

            @csrf

            @if(isset($user))
                @method('PUT')
            @endif

            <div class="flex justify-between">
                <h5 class="text-base font-bold">Personal Informaton</h5>

                @guest
                    <p class="text-sm"><span class="text-red-500">*</span> required fields</p>
                @endguest
            </div>

            <hr class="mt-2 mb-3">

            <div class="flex justify-between">
                <div class="mb-4 w-2/5">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="firstName">
                        First Name @guest <span class="text-red-500">*</span> @endguest
                    </label>

                    <input id="firstName" type="text" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('firstName') bg-red-200 @enderror" name="firstName" value="{{ isset($user) ? $user->firstName : old('firstName') }}" required autocomplete="firstName" placeholder="Ben" autofocus>

                    @error('firstName')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-4 w-2/5">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lastName">
                        Last Name @guest <span class="text-red-500">*</span> @endguest
                    </label>

                    <input id="lastName" type="text" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('lastName') bg-red-200 @enderror" name="lastName" value="{{ isset($user) ? $user->lastName : old('lastName') }}" required autocomplete="lastName" placeholder="Dover" autofocus>

                    @error('lastName')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
            
            @guest
                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email  <span class="text-red-500">*</span> 
                    </label>

                    <input id="email" type="email" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') bg-red-200 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com" autofocus>

                    @error('email')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            @endguest

            <div class="flex justify-between">
                <div class="mb-4 w-1/6">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="countryCode">
                        Country Code @guest <span class="text-red-500">*</span> @endguest
                    </label>

                    <input id="countryCode" type="text" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('countryCode') bg-red-200 @enderror" name="countryCode" value="{{ isset($user) ? $user->countryCode : old('countryCode') }}" required autocomplete="countryCode" placeholder="+32" autofocus>

                    @error('countryCode')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <p class="mt-8">-</p>
                    
                <div class="mb-4 w-9/12">

                    <div class="flex">

                        <label class="block text-gray-700 text-sm font-bold mb-2" for="number">
                            Phone Number @guest <span class="text-red-500">*</span> @endguest
                        </label>

                        <p class="text-gray-500 ml-1 text-xs mt-1">(without the first 0)</p>

                    </div>

                    <input id="number" type="number" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('number') bg-red-200 @enderror" name="number" value="{{ isset($user) ? $user->number : old('number') }}" required autocomplete="number" placeholder="487944118" autofocus>

                    @error('number')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>

            <h5 class="text-base font-bold">Photos</h5>

            <hr class="mt-2 mb-3">

            @auth
                <div class="flex">

                    <div>
                        @if ($user->image)
                            <img class="mb-3" width="100" height="100" src="{{ asset("storage/".$user->image) }}" alt="">
                        @else
                            <img class="mb-3" width="100" height="100" src="{{ asset('/images/blank-profile.png') }}">
                        @endif
                    </div>
                    
                    <div style="margin-left: 328px">
                        @if ($user->coverImage)
                            <img class="mb-3" width="100" height="100" src="{{ asset("storage/".$user->coverImage) }}" alt="">
                        @else
                            <img class="mb-3" width="100" height="100" src="{{ asset('/images/plain-cover.jpg') }}">
                        @endif
                    </div>
                </div>
            @endauth

            <div class="flex justify-between">
                <div class="mb-4 w-2/5">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="image">
                        Profile Picture
                    </label>

                    <input id="image" type="file" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('image') bg-red-200 @enderror" name="image" value="{{ old('image') }}" autocomplete="image" autofocus>

                    @error('image')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-4 w-2/5">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="coverImage">
                        Cover Picture
                    </label>

                    <input id="coverImage" type="file" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('coverImage') bg-red-200 @enderror" name="coverImage" value="{{ old('coverImage') }}" autocomplete="coverImage" autofocus>

                    @error('coverImage')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>

            <h5 class="text-base font-bold">Priority Colors for tasks</h5>

            <hr class="mt-2 mb-3">

            <div class="flex justify-between">
                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="highcolors_id">
                        High Priority
                    </label>

                    <div class="relative">
                        
                        <select class=" bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="highcolors_id" name="highcolors_id">
                            @foreach ($highColors as $h)
                                <option value="{{ $h->id }}" 

                                    @if (isset($user))

                                        @if ($h->id === $user->highcolors_id)

                                            selected

                                        @endif

                                    @endif

                                >
                                    {{ $h->name }}

                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                    
                </div>

                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="mediumcolors_id">
                        Medium Priority
                    </label>

                    <div class="relative">
                        <select class=" bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="mediumcolors_id" name="mediumcolors_id">
                            @foreach ($mediumColors as $m)
                                <option value="{{ $m->id }}"
                                    @if (isset($user))

                                        @if ($m->id === $user->mediumcolors_id)

                                            selected

                                        @endif

                                    @endif    
                                >
                                
                                    {{ $m->name }}

                                </option>

                            @endforeach
                        </select>
                    </div>
                    
                </div>

                <div class="mb-4">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lowcolors_id">
                        Low Priority
                    </label>

                    <div class="relative">
                        <select class=" bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="lowcolors_id" name="lowcolors_id">
                            @foreach ($lowColors as $l)
                                <option value="{{ $l->id }}"
                                    @if (isset($user))

                                        @if ($l->id === $user->lowcolors_id)

                                            selected

                                        @endif

                                    @endif    
                                >
                                
                                    {{ $l->name }}

                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
            </div>

            <h5 class="text-base font-bold">Themes</h5>

            <hr class="mt-2 mb-3">

            <div class="mb-4">

                <label class="block text-gray-700 text-sm font-bold mb-2" for="theme_id">
                    Select Theme
                </label>

                <div class="relative">
                    <select class=" bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="theme_id" name="theme_id">
                        @foreach ($themes as $t)
                            <option value="{{ $t->id }}"
                                    @if (isset($user))

                                        @if ($t->id === $user->theme_id)

                                            selected

                                        @endif

                                    @endif    
                                >
                                
                                    {{ $t->name }}

                                </option>
                        @endforeach
                    </select>
                </div>

            </div>
            @guest    
            <div class="flex justify-between">
                <h5 class="text-base font-bold">Password</h5>

                <p class="text-sm"><span class="text-red-500">*</span> required fields</p>
            </div>

            <hr class="mt-2 mb-3">

            
            <div class="flex justify-between">
                <div class="mb-4 w-2/5">

                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password <span class="text-red-500">*</span>
                    </label>

                    <input id="password" type="password" class="shadow-md appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') bg-red-200 @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" placeholder="minimum 8 letters" autofocus>

                    @error('password')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>

                <div class="mb-6 w-2/5">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password-confirm">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>

                    <input id="password-confirm" type="password" class="shadow-md appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password-confirm ') bg-red-200 @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="minimum 8 letters">

                    @error('password')
                        <span class="text-red-500 text-xs italic" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
            @endguest

            <div class="flex items-center justify-between">

                <button class="@auth bg-{{$user->theme->value}}-500 hover:bg-{{$user->theme->value}}-700 @else bg-black hover:bg-gray-700 @endauth  text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ isset($user) ? 'Save' : 'Lets GO!' }}
                </button>

            </div>

        </form>

    </div>

</div>
@endsection
