<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    // عرض صفحة التسجيل
    public function show()
    {
        return view('register');
    }

    // معالجة التسجيل
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'address'=>'required',
            'password'=>'required|min:6'
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'address'=>$request->address,
            'password'=>Hash::make($request->password)
        ]);

        return redirect('/login')->with('success','تم إنشاء الحساب بنجاح!');
    }
    public function __construct()
{
    $this->middleware('guest')->except('logout'); // منع الدخول للـ login/register إذا المستخدم مسجل الدخول
}
}



