<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PocketWallet Registration</title>

<style>
*{
    box-sizing:border-box;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
}
body{
    margin:0;
    background:linear-gradient(160deg,#0f172a,#1e40af);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:16px;
}
.card{
    width:100%;
    max-width:380px;
    background:#ffffff;
    border-radius:18px;
    padding:22px 18px 20px 18px;
    box-shadow:0 20px 40px rgba(0,0,0,.25);
}
.title{
    text-align:center;
    margin-bottom:18px;
}
.title h1{
    margin:0;
    font-size:26px;
    color:#1e3a8a;
}
.title p{
    margin-top:6px;
    font-size:14px;
    color:#64748b;
}
.form-group{
    display:flex;
    flex-direction:column;
    margin-bottom:12px;
}
input[type="text"], input[type="email"], input[type="password"]{
    padding:12px;
    border-radius:12px;
    border:1px solid #cbd5e1;
    font-size:14px;
}
.btn{
    width:100%;
    text-align:center;
    padding:13px 0;
    border-radius:999px;
    font-weight:600;
    font-size:15px;
    border:none;
    cursor:pointer;
}
.register-btn{
    background:#16a34a;
    color:white;
    margin-top:8px;
}
.login-link{
    display:block;
    text-align:center;
    margin-top:14px;
    font-size:13px;
    color:#1e40af;
    text-decoration:none;
}
.footer{
    text-align:center;
    font-size:12px;
    margin-top:16px;
    color:#64748b;
}
</style>
</head>
<body>

<div class="card">

    <div class="title">
        <h1>PocketWallet</h1>
        <p>Create your secure wallet account</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <input type="text" name="name" placeholder="Full Name" required autofocus>
        </div>

        <div class="form-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <button class="btn register-btn" type="submit">Create Account</button>
    </form>

    <a class="login-link" href="{{ route('login') }}">Already have an account? Login</a>

    <div class="footer">
        PocketWallet © {{ date('Y') }}
    </div>

</div>

</body>
</html>
