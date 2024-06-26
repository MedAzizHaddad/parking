<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserParkingController extends Controller
{
    public function index()
    {
        return view('user.park');
    }


    public function history()
    {
        return view('user.history');
    }
}
