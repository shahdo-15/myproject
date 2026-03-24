<?php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // عرض صفحة التسجيل
    public function showRegister() {
        return view('register');
    }

    // تنفيذ التسجيل
    public function register(Request $request) {

        // ✅ Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/login')->with('success', 'تم إنشاء الحساب');
    }

    // عرض صفحة تسجيل الدخول
    public function showLogin() {
        return view('login');
    }

    // تنفيذ تسجيل الدخول
    public function login(Request $request) {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->with('error', 'بيانات غير صحيحة');
        }

        Session::put('user', $user);

        return redirect('/home');
    }

    // الصفحة الرئيسية
    public function home() {

        $user = Session::get('user');

        return view('home', compact('user'));
    }

    // تسجيل الخروج
    public function logout() {

        Session::forget('user');

        return redirect('/login');
    }
}

