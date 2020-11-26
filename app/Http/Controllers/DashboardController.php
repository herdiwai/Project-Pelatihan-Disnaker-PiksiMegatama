<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.dashboard');
    }

    public function show() {

        $data = User::paginate(5);
        return view('dashboard.user', compact('data'));
    }
}
