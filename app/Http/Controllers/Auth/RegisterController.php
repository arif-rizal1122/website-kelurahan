<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\Warga;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/email/verify'; // Redirect to email verification page

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request for Warga.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255', 'unique:wargas'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:wargas'], // Tambahkan validasi email
            'alamat' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new Warga instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Warga
     */
    protected function create(array $data)
    {
        return Warga::create([ // Kembalikan instance Warga yang dibuat
            'nama' => $data['nama'],
            'nik' => $data['nik'],
            'email' => $data['email'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request) 
    {
        $this->validator($request->all())->validate();

        $warga = $this->create($request->all());
        
        // Trigger event untuk mengirim email verifikasi
        event(new Registered($warga));
        
        // Login warga after registration
        Auth::guard('warga')->login($warga);
        
        // Redirect ke halaman verifikasi email
        return redirect()->route('verification.notice')->with('success', 'Pendaftaran berhasil! Silakan verifikasi email Anda sebelum melanjutkan.');
    }

    /**
     * Show the registration form
     * 
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }
}