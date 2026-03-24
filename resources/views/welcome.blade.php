<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>مرحبا بك</title>
<style>
body { font-family: Arial; background: #f0f2f5; display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh; }
.container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); text-align: center; }
button { padding: 10px 20px; border: none; border-radius: 5px; background: #dc3545; color: white; cursor: pointer; margin-top: 15px; }
button:hover { background: #c82333; }
</style>
</head>
<body>
<div class="container">
    <h2>مرحباً {{ $user->name }}!</h2>
    <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
    <p><strong>العنوان:</strong> {{ $user->address }}</p>
    <p><strong>كلمة المرور مشفرة:</strong> {{ $user->password }}</p>
    <form action="/logout" method="GET">
        <button type="submit">تسجيل الخروج</button>
    </form>
</div>
</body>
</html>