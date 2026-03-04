<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Verify Deposit - PocketWallet</title>
<style>
*{box-sizing:border-box;font-family:system-ui,sans-serif;}
body{margin:0;background:linear-gradient(160deg,#0f172a,#1e40af);min-height:100vh;display:flex;justify-content:center;align-items:center;padding:16px;}
.container{width:100%;max-width:400px;}
.card{background:#fff;border-radius:18px;padding:20px 18px;box-shadow:0 20px 40px rgba(0,0,0,.25);}
h1{text-align:center;color:#1e3a8a;margin-bottom:16px;}
label{display:block;margin-bottom:4px;color:#1e3a8a;font-weight:600;}
input{width:100%;padding:10px;margin-bottom:12px;border-radius:8px;border:1px solid #ccc;}
button{width:100%;padding:12px;background:#16a34a;color:white;font-weight:600;border:none;border-radius:999px;cursor:pointer;}
.error{color:red;margin-bottom:8px;text-align:center;}
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <h1>Verify Deposit</h1>
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('deposit.confirm') }}">
            @csrf
            <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
            <label for="verification_code">Verification Code</label>
            <input type="text" name="verification_code" id="verification_code" required maxlength="6">
            <button type="submit">Confirm Deposit</button>
        </form>
    </div>
</div>
</body>
</html>
