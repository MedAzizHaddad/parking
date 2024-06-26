<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminParkingController extends Controller
{
    public function index()
    {
        return view('admin.addParking');
    }


    public function reservation()
    {
        return view('admin.reservation');
    }
}
