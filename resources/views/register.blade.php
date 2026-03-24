<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>تسجيل مستخدم جديد</title>
<style>
body { font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f0f2f5; }
form { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; }
input, button { display: block; width: 100%; margin: 10px 0; padding: 10px; border-radius: 5px; border: 1px solid #ccc; }
button { background: #007BFF; color: white; border: none; cursor: pointer; }
button:hover { background: #0056b3; }
</style>
</head>
<body>
<form action="/register" method="POST">
    @csrf
    <h2>تسجيل مستخدم جديد</h2>
    @if(session('success')) <p style="color:green">{{ session('success') }}</p> @endif
    @if($errors->any())
        <div style="color:red">
            @foreach($errors->all() as $error) {{ $error }} <br> @endforeach
        </div>
    @endif
    <input type="text" name="name" placeholder="الاسم" required>
    <input type="email" name="email" placeholder="البريد الإلكتروني" required>
    <input type="text" name="address" placeholder="العنوان" required>
    <input type="password" name="password" placeholder="كلمة المرور" required>
    <button type="submit">تسجيل</button>
    <p>هل لديك حساب؟ <a href="/login">تسجيل الدخول</a></p>
</form>
</body>
</html>