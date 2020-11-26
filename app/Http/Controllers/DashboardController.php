<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.dashboard');
    }

    public function show() {

        $data = User::paginate(5);
        return view('dashboard.user', compact('data'));
    }

    public function create()
    {
        return view ('dashboard.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function validator(array $data) 
    {
        // validator cara kedua
        return Validator::make($data, [
            'name' => ['required'],
            'email' => ['email', 'unique:users'],
            'password' => ['required',],
            'image' => ['mimes:png,jpg,jpeg,gif']
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        if ($request->file('image')){
            $image = $request->file('image')->store('image' , 'public');
        } else {
            $image = null;
        }
        // validator cara pertama
        // Validator::make($request->all(), [
        //     'nama' => ['required'],
        //     'email' => ['email', 'unique:users'],
        //     'password' => ['required',]
        // ])->validate();

        // cara kedua dengan eloquent
        // $data = new User();
        // $data->name = $request->get('nama');
        // $data->email = $request->get('email');
        // $data->password = Hash::make($request->get('password'));
        // $data->save();

        // cara pertama
        // DB::table('users')->insert([
        //     'name' => $request ->get('nama'),
        //     'email' => $request ->get('email'),
        //     'password' => Hash::make($request->get('password'))
        // ]);

        // cara ke tiga
        User::insert([
            'name' => $request ->get('name'),
            'email' => $request ->get('email'),
            'password' => Hash::make($request->get('password')),
            'image' => $image
        ]);
        return redirect()->route('create')->with('success','Data Berhasil diTambahkan');
    }
}
