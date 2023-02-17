<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function userInfo()
    {
        return response()->json(['user' => Auth::user()], 200);
    }
}
