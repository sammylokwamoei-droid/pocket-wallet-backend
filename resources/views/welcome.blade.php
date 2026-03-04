<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PocketWallet</title>
<style>
*{ box-sizing:border-box; font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif; margin:0; padding:0;}
body{
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:16px;
    background: linear-gradient(160deg,#0f172a,#1e40af);
    position:relative;
    overflow:hidden;
}

/* Lamp background */
body::before{
    content:"";
    position:absolute;
    top:0;
    left:50%;
    transform:translateX(-50%);
    width:100%;
    height:100%;
    background: url('{{ asset("images/lamp.png") }}') no-repeat center bottom;
    background-size: contain;
    opacity:0.08; /* subtle behind content */
    pointer-events:none;
}

.card{
    position:relative; /* above background */
    background:#ffffff;
    border-radius:18px;
    max-width:500px;
    width:100%;
    padding:40px 30px;
    text-align:center;
    box-shadow:0 20px 40px rgba(0,0,0,.25);
    z-index:1;
}

.card h1{
    font-size:36px;
    color:#1e3a8a;
    margin-bottom:10px;
}
.card p{
    font-size:16px;
    color:#64748b;
    margin-bottom:24px;
}
.actions{
    display:flex;
    gap:12px;
    justify-content:center;
}
.btn{
    padding:12px 20px;
    border-radius:999px;
    text-decoration:none;
    font-weight:600;
    font-size:15px;
    color:white;
    text-align:center;
    flex:1;
}
.login{background:#1e40af;}
.register{background:#16a34a;}
@media(max-width:480px){
    .card{padding:30px 20px;}
    .actions{flex-direction:column;}
}
</style>
</head>
<body>

<div class="card">
    <h1>PocketWallet</h1>
    <p>Your secure pocket bank system</p>
    <div class="actions">
        <a href="{{ route('login') }}" class="btn login">Login</a>
        <a href="{{ route('register') }}" class="btn register">Create Account</a>
    </div>
</div>

</body>
</html>
