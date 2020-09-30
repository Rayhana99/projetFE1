<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Enseignant;
use App\Etudiant;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void*/
    public function __construct()
    {
       /* $this->middleware('guest');
        $this->middleware('guest:enseignant')->except('logout');
        $this->middleware('guest:etudiant')->except('logout');*/
       $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:etudiant');
        $this->middleware('guest:enseignant');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEnseignantRegisterForm()
    {
        return view('auth.enseignant-register');
    }
     /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showEtudiantRegisterForm()
    {
        return view('auth.etudiant-register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createEnseignant(Request $request)
    {
        // dd($request->all());
        
        // $this->validator($request->all())->validate();
        $enseigant = Enseignant::create([
            'prenom' => $request['prenom'],
            'nom' => $request['nom'],
            'genre' => $request['genre'],
            'pays' => $request['pays'],
            'date_de_naissance' => $request['date_de_naissance'],
            'email' => $request['email'],
            'password' => bcrypt($request->password)
            
        ]);
        return redirect()->intended(route('enseignant.login.showform'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createEtudiant(Request $request)
    {
        /*$this->validator($request->all())->validate();*/
        $etudiant = Etudiant::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'prenom' => $request['prenom'],
            'genre' => $request['genre'],
            'date_de_naissance' => $request['date_de_naissance'],
            'pays' => $request['pays'],
            'password' => bcrypt($request->password)
        ]);
        return redirect()->intended(route('etudiant.login'));
    }
}

