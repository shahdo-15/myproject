<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect('/login');
        }

        $user = Auth::user();
        return view('welcome', compact('user'));
    }
    public function __construct()
{
    $this->middleware('auth'); // منع الوصول للترحيب بدون تسجيل دخول
}
}
