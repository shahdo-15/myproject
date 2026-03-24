<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // عرض صفحة تسجيل الدخول
    public function show()
    {
        return view('login');
    }

    // معالجة تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->withErrors(['email'=>'المستخدم غير موجود']);
        }

        // دعم المستخدمين القدامى
        if(!Hash::check($request->password, $user->password)){
            if($request->password === $user->password){
                $user->password = Hash::make($request->password);
                $user->save();
            } else {
                return back()->withErrors(['password'=>'كلمة المرور غير صحيحة']);
            }
        }

        Auth::login($user);

        return redirect()->intended('/welcome');
    }

    // تسجيل الخروج
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function __construct()
{
    $this->middleware('guest')->except('logout'); // منع الدخول للـ login/register إذا المستخدم مسجل الدخول
}
}
