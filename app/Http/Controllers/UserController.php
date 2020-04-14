<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Themes;
use App\HighColors;
use App\MediumColors;
use App\LowColors;
use App\Http\Requests\UpdateProfileRequest;
use Storage;
use App\ToDos;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $totalTasksCreated = ToDos::where('users_id', $user->id)->count();
        $totalTasksCompleted = ToDos::where('users_id', $user->id)->whereNotNull('completed_at')->count();
        $totalTasksOpen = ToDos::where('users_id', $user->id)->where('completed_at', null)->count();

        $totalTasksHigh = ToDos::where('users_id', $user->id)->where('priorities_id', 1)->count();
        $totalTasksMedium = ToDos::where('users_id', $user->id)->where('priorities_id', 2)->count();
        $totalTasksLow = ToDos::where('users_id', $user->id)->where('priorities_id', 3)->count();

        $totalTasksWork = ToDos::where('users_id', $user->id)->where('categories_id', 1)->count();
        $totalTasksPersonal = ToDos::where('users_id', $user->id)->where('categories_id', 2)->count();
        $totalTasksHome = ToDos::where('users_id', $user->id)->where('categories_id', 3)->count();


        //dd($totalTasksWork, $totalTasksPersonal, $totalTasksHome);

        return view('profile')
            ->with('user', $user)
            ->with('totalTasksCreated', $totalTasksCreated)
            ->with('totalTasksCompleted', $totalTasksCompleted)
            ->with('totalTasksOpen', $totalTasksOpen)
            ->with('totalTasksHigh', $totalTasksHigh)
            ->with('totalTasksMedium', $totalTasksMedium)
            ->with('totalTasksLow', $totalTasksLow)
            ->with('totalTasksWork', $totalTasksWork)
            ->with('totalTasksPersonal', $totalTasksPersonal)
            ->with('totalTasksHome', $totalTasksHome);
    }

    public function showUserEditForm()
    {

        $user = Auth::user();

        $themes = Themes::all();
        $highColors = HighColors::all();
        $mediumColors = MediumColors::all();
        $lowColors = LowColors::all();


        return view('auth.register')
            ->with('user', $user)
            ->with('themes', $themes)
            ->with('highColors', $highColors)
            ->with('mediumColors', $mediumColors)
            ->with('lowColors', $lowColors);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        //check if new image

        //$data = $request->only(['name', 'descriptionEN', 'descriptionNL', 'location']);
        $user = Auth::user();

        $hasImage = false;
        $hasCoverImage = false;

        if ($request->hasFile('image')) 
        {
            
            //upload it
            $image = $request->image->store('profile', 'public');

            //delete old image
            Storage::delete($user->image);

            $data['image'] = $image;

            $hasImage = true;

        }

        if ($request->hasFile('coverImage')) 
        {
            
            //upload it
            $coverImage = $request->coverImage->store('profile', 'public');

            //delete old image
            Storage::delete($user->image);

            $data['coverImage'] = $coverImage;

            $hasCoverImage = true;

        }
        

        //update attributes
        $user->update([

            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'countryCode' => $request->countryCode,
            'number' => $request->number,
            'theme_id' => $request->theme_id,
            'highcolors_id' => $request->highcolors_id,
            'mediumcolors_id' => $request->mediumcolors_id,
            'lowcolors_id' => $request->lowcolors_id,

        ]);

        if ($hasImage) 
        {
            
            $user->update([
                'image' => $image,
            ]);
            
        }

        if ($hasCoverImage) 
        {
            
            $user->update([
                'coverImage' => $coverImage,
            ]);
            
        }

        // flash message
        session()->flash('success', 'Profile updated successfully.');

        // redirect user
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
        //
    }

    // public function showProfile()
    // {
    //     $user = Auth::user();
    //     $TotalTasksCreated = ToDos::where('user_id', $user->id)->count();

    //     dd($TotalTasksCreated);

    //     return view('profile')->with('user', $user);
    // }
}
