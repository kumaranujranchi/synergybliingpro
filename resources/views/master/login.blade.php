<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Login | Synergy Billing Pro</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@700;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #020617;
            color: white;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-box {
            background: #0F172A;
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        h2 { font-family: 'Outfit', sans-serif; color: #F97316; margin-bottom: 30px; }
        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            color: white;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 15px;
            background: #F97316;
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .error { color: #fca5a5; font-size: 0.9rem; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Synergy Master Arch</h2>
        <p style="color: #94A3B8; margin-bottom: 30px;">Enter your secure master password.</p>
        
        @if($errors->any())
            <div class="error">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('master.login.submit') }}" method="POST">
            @csrf
            <input type="password" name="password" placeholder="••••••••" required autofocus>
            <button type="submit">Unlock Dashboard</button>
        </form>
    </div>
</body>
</html>
