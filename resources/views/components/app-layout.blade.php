<nav class="bg-white shadow-md p-4 flex justify-between items-center">
    <div class="text-blue-900 font-bold text-lg">PocketWallet</div>

    <div class="space-x-4">
        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-900">Dashboard</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
        </form>
    </div>
</nav>
