<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('tieu_de', 'Mini CRM')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-700 text-white">
        <div class="max-w-5xl mx-auto px-4 py-3 flex items-center gap-6">
            <a href="{{ route('khach-hang.index') }}" class="font-bold text-lg">Mini CRM</a>
            <a href="{{ route('khach-hang.index') }}" class="hover:underline">Khách hàng</a>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-6">
        @if (session('thanh_cong'))
            <div class="mb-4 rounded bg-green-100 border border-green-300 text-green-800 px-4 py-3">
                {{ session('thanh_cong') }}
            </div>
        @endif

        @yield('noi_dung')
    </main>
</body>
</html>