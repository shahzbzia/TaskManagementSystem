<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Themes;
use App\HighColors;
use App\MediumColors;
use App\LowColors;
use Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/todos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {

        $themes = Themes::all();
        $highColors = HighColors::all();
        $mediumColors = MediumColors::all();
        $lowColors = LowColors::all();

        return view('auth.register')
            ->with('themes', $themes)
            ->with('highColors', $highColors)
            ->with('mediumColors', $mediumColors)
            ->with('lowColors', $lowColors);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'countryCode' => ['required', 'string'],
            'number' => ['required'],
            'theme_id' => ['required'],
            'highcolors_id' => ['required'],
            'mediumcolors_id' => ['required'],
            'lowcolors_id' => ['required'],
            'image' => ['image'],
            'coverImage' => ['image'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $image = $data['image']->store('profile', 'public');

        $coverImage = $data['coverImage']->store('profile', 'public');

        return User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'email' => $data['email'],
            'countryCode' => $data['countryCode'],
            'number' => $data['number'],
            'isStudent' => 0,
            'image' => $image,
            'coverImage' => $coverImage,
            'theme_id' => $data['theme_id'],
            'highcolors_id' => $data['highcolors_id'],
            'mediumcolors_id' => $data['mediumcolors_id'],
            'lowcolors_id' => $data['lowcolors_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
