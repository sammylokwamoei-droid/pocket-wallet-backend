<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Profile - PocketWallet</title>
<style>
*{box-sizing:border-box;font-family:system-ui,sans-serif;}
body{margin:0;background:linear-gradient(160deg,#0f172a,#1e40af);min-height:100vh;display:flex;justify-content:center;padding:16px;}
.container{width:100%;max-width:480px;}
.card{background:#fff;border-radius:18px;padding:20px 18px;box-shadow:0 20px 40px rgba(0,0,0,.25);margin-bottom:20px;}
h1,h3{text-align:center;color:#1e3a8a;margin-bottom:16px;}
label{display:block;margin-bottom:4px;color:#1e3a8a;font-weight:600;}
input{width:100%;padding:10px;margin-bottom:12px;border-radius:8px;border:1px solid #ccc;}
button{width:100%;padding:12px;background:#1e40af;color:white;font-weight:600;border:none;border-radius:999px;cursor:pointer;}
.error{color:red;margin-bottom:8px;text-align:center;}
.success{color:green;margin-bottom:8px;text-align:center;}
</style>
</head>
<body>
<div class="container">

    <!-- User Info -->
    <div class="card">
        <h1>My Profile</h1>
        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p><strong>Balance:</strong> {{ auth()->user()->balance ?? 0 }} SSp</p>
    </div>

    <!-- Change PIN Form -->
    <div class="card">
        <h3>Change 4-Digit PIN</h3>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('profile.updatePin') }}">
            @csrf
            <label for="current_pin">Current PIN</label>
            <input type="password" name="current_pin" id="current_pin" required maxlength="4">

            <label for="new_pin">New PIN</label>
            <input type="password" name="new_pin" id="new_pin" required maxlength="4">

            <label for="confirm_pin">Confirm New PIN</label>
            <input type="password" name="confirm_pin" id="confirm_pin" required maxlength="4">

            <button type="submit">Update PIN</button>
        </form>
    </div>

</div>
</body>
</html>
