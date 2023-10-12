<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * 
     */
    public function home()
    {
        return view('home');
    }
    public function index()
    {
        $users=User::get();
        return view('welcome',compact('users'));
    }

    public function show($id)
    {
        $user=User::find($id);
        return view('show',compact('user'));
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('edit',compact('user'));
    }
        public function update(Request $request,$id)
        {
        $users=User::find($id);
        if($request->hasFile('image'))
        {
            $path="images/.$users->image";
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file=$request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/',$filename);
            $users->image=$filename;
        }

         $users->name =$request->input('name');
         $users->phone_number=$request->input('phone_number');
         $users->address =$request->input('address');
         $users->gender=$request->input('gender');
         $users->update();
          return redirect('/');
        }


     public function delete($id)
     {
          $user =User::where('id',$id)->delete();
          return redirect()->back();
     }
}
