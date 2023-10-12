<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Image;


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
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => ['required', 'string', 'max:255','unique:users'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = app('request');        
    // if ($request->hasfile('image')) {
    //     $avatar = $request->file('image');
    //     $filename = time() . '.' . $avatar->getClientOriginalExtension();

    //     //Implement check here to create directory if not exist already 

    //    //   Image::make($avatar)->resize(300, 300)->save(public_path('uploads/images/' . $filename));
    //    // $imageName = time().'.'.$request->image->extension();  
     
    //     $image=$request->image->move(public_path('images'), $filename);
    // }
    if($request->hasFile('image'))
    {
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
       $image= $file->move('images',$filename);
        // $data['image']=$filename;
    }
    
       
        return User::create([
            'name' => $data['name'],
            // 'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'image'  => $filename,

            // file($data['image'])->store('images'),
            
        ]);
    }
}
