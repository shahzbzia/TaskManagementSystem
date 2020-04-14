@extends('layouts.app')

@section('content')
<div class="container w-4/5 mt-3">

  <!-- Profile Card -->
  <div class="shadow-lg bg-gray-600 flex p-3 antialiased" style="
    @if ($user->coverImage)
      background-image: url({{ asset("storage/".$user->coverImage) }});
    @else
      background-image: url({{ asset('/images/plain-cover.jpg') }});
    @endif
    background-repeat: no-repat;
    background-size: cover;
    background-blend-mode: multiply;
  ">
    <div class="md:w-1/4 w-full">
      @if ($user->image)
        <img class="rounded-lg antialiased" src="{{ asset("storage/".$user->image) }}" alt="">
      @else
        <img class="rounded-lg antialiased" src="{{ asset('/images/blank-profile.png') }}">
      @endif
    </div>
  </div>
  <!-- End Profile Card -->

  <div class="bg-white border border-t-0 border-red-400 bg-white px-4 py-3 text-black mb-5 shadow-lg">
  
    <div class="mt-2">
      <span class="uppercase text-base font-semibold">Personal Information</span>
      <hr>
    </div>

    <div class="text-base mt-4">
      <div>
        <strong>First Name:</strong><span class="uppercase"> {{ $user->firstName }}</span>
        <strong class="ml-20">Last Name:</strong><span class="uppercase"> {{ $user->lastName }}</span>
      </div>
      <div class="mt-3">
        <strong>Email:</strong><span> {{ $user->email }}</span>
      </div>

      <div class="mt-3">
        <strong>Phone Number:</strong><span> {{ $user->countryCode }} {{ $user->number }}</span>
      </div>
    </div>

    <div class="mt-4">
      <span class="uppercase text-base font-semibold">Career Profile</span>
      <hr>
    </div>

    <div class="text-base mt-4">
      <div>
        <strong>Total tasks created:</strong><span class="uppercase"> {{ $totalTasksCreated }}</span>
        <strong class="ml-20">Tasks completed: </strong><span> {{ $totalTasksCreated }}</span>
        <strong class="ml-20">Open tasks:</strong><span> {{ $totalTasksOpen }}</span>
      </div>
      <div class="mt-3">
        <strong>High Priority:</strong><span class="uppercase"> {{ $totalTasksHigh }}</span>
        <strong class="ml125px">Medium Priority:</strong><span> {{ $totalTasksMedium }}</span>
        <strong class="ml85px">Low Priority:</strong><span> {{ $totalTasksLow }}</span>
      </div>
      <div class="mt-3">
        <strong>Work/School:</strong><span class="uppercase"> {{ $totalTasksWork }}</span>
        <strong class="ml123px">Personal:</strong><span> {{ $totalTasksPersonal }}</span>
        <strong class="ml137px">Home:</strong><span> {{ $totalTasksHome }}</span>
      </div>
    </div>

    <div class="mt-4">
      <span class="uppercase text-base font-semibold">Colors and Theme</span>
      <hr>
    </div>

    <div class="text-base mt-4">
      <div>
        <strong>High Priority:</strong><span class="uppercase"> {{ $user->highColor->name }}</span>
        <strong class="ml-20">Medium Priority:</strong><span class="uppercase"> {{ $user->mediumColor->name }}</span>
        <strong class="ml-20">Low Priority:</strong><span class="uppercase"> {{ $user->lowColor->name }}</span>
      </div>
      <div class="mt-3">
        <strong>Theme:</strong><span class="uppercase"> {{ $user->theme->name }}</span>
      </div>
    </div>

    <div class="mt-4 flex justify-between">
      <a class="hover:no-underline bg-{{ $user->theme->value }}-500 hover:bg-{{ $user->theme->value }}-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="{{ route('user.showUserEditForm') }}">
          Edit Profile
      </a>

      <a href="{{ route('todos.index') }}" class="bg-{{ $user->theme->value }}-500 hover:bg-{{ $user->theme->value }}-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:no-underline">
          Home
      </a>
    </div>

    {{-- <div class="text-base mt-4 flex">
      <label class="" for="grid-state">
        <strong>Theme</strong>
      </label>
      <div class="relative ml-20">
        <select class=" bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-2 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
          <option>New Mexico</option>
          <option>Missouri</option>
          <option>Texas</option>
        </select>
      </div>
    </div> --}}

  </div>

</div>
  
</div>
@endsection