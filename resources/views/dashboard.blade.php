<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PocketWallet Dashboard</title>
<style>
*{box-sizing:border-box;font-family:system-ui,sans-serif;margin:0;padding:0;}
body{background:linear-gradient(160deg,#0f172a,#1e40af);min-height:100vh;padding:16px;display:flex;justify-content:center;}
.container{width:100%;max-width:640px;}
.header{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;}
.header h1{color:#fff;font-size:28px;}
.profile{background:#1e40af;color:white;padding:6px 12px;border-radius:999px;text-decoration:none;font-weight:600;font-size:14px;}
.card{background:#fff;border-radius:18px;padding:20px 18px;box-shadow:0 20px 40px rgba(0,0,0,.25);margin-bottom:20px;}
.actions{display:flex;gap:12px;flex-wrap:wrap;justify-content:center;margin-top:16px;}
.btn{flex:1 1 calc(33% - 8px);text-align:center;padding:12px 0;border-radius:999px;font-weight:600;color:white;text-decoration:none;min-width:100px;font-size:14px;}
.deposit{background:#16a34a;}
.withdraw{background:#dc2626;}
.transfer{background:#1e40af;}
.wallet-summary{display:flex;justify-content:space-between;gap:12px;margin-top:16px;}
.wallet-summary .box{flex:1;background:#f1f5f9;border-radius:12px;padding:14px;text-align:center;box-shadow:0 4px 12px rgba(0,0,0,0.1);}
.wallet-summary .box h4{font-size:14px;color:#1e3a8a;margin-bottom:4px;}
.wallet-summary .box p{font-weight:bold;font-size:16px;color:#1e3a8a;}
.table-container{overflow-x:auto;margin-top:16px;}
table{width:100%;border-collapse:collapse;}
th,td{padding:8px;border-bottom:1px solid #ddd;text-align:center;}
th{color:#1e3a8a;}
td{color:#475569;}
.footer{text-align:center;font-size:12px;margin-top:20px;color:#64748b;}
@media(max-width:480px){
    .btn{flex:1 1 100%;}
    .header{flex-direction:column;align-items:flex-start;gap:8px;}
    .wallet-summary{flex-direction:column;gap:12px;}
}
</style>
</head>
<body>
<div class="container">

    <!-- Header with Profile -->
    <div class="header">
        <h1>PocketWallet</h1>
        <a href="{{ route('profile.show') }}" class="profile">My Profile</a>
    </div>

    <!-- Welcome -->
    <div class="card">
        <p style="text-align:center;">Hello, {{ auth()->user()->name }}! Welcome to your dashboard.</p>
    </div>

    <!-- Quick Actions -->
    <div class="card">
        <h3 style="text-align:center;">Quick Actions</h3>
        <div class="actions">
            <a href="{{ route('deposit.create') }}" class="btn deposit">Deposit</a>
            <a href="{{ route('withdraw.create') }}" class="btn withdraw">Withdraw</a>
            <a href="{{ route('transfer.create') }}" class="btn transfer">Transfer</a>
        </div>
    </div>

    <!-- Wallet Summary -->
    <div class="card wallet-summary">
        <div class="box">
            <h4>Balance</h4>
            <p>{{ auth()->user()->balance ?? 0 }} SSp</p>
        </div>
        <div class="box">
            <h4>Total Deposits</h4>
            <p>{{ auth()->user()->deposits ?? 0 }} SSp</p>
        </div>
        <div class="box">
            <h4>Total Withdrawals</h4>
            <p>{{ auth()->user()->withdrawals ?? 0 }} SSp</p>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="card table-container">
        <h3 style="text-align:center;">Recent Transactions</h3>
        @if(count($transactions ?? []) > 0)
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount (SSp)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $txn)
                    <tr>
                        <td>{{ $txn->date ?? '-' }}</td>
                        <td>{{ $txn->type ?? '-' }}</td>
                        <td>{{ $txn->amount ?? '-' }}</td>
                        <td>{{ $txn->status ?? '-' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p style="margin-top:8px;color:#64748b;">No transactions yet.</p>
        @endif
    </div>

    <div class="footer">
        PocketWallet © {{ date('Y') }}
    </div>
</div>
</body>
</html>
