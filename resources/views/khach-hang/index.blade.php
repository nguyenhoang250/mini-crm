@extends('layouts.app')

@section('tieu_de', 'Danh sách khách hàng')

@section('noi_dung')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Khách hàng</h1>
        <a href="{{ route('khach-hang.create') }}" class="rounded bg-blue-700 text-white px-4 py-2 hover:bg-blue-800">+ Thêm khách hàng</a>
    </div>

    <form method="GET" action="{{ route('khach-hang.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="q" value="{{ $tuKhoa }}" placeholder="Tìm theo tên, email, số điện thoại..."
               class="flex-1 rounded border border-gray-300 px-3 py-2">
        <button type="submit" class="rounded bg-gray-700 text-white px-4 py-2 hover:bg-gray-800">Tìm</button>
    </form>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="px-4 py-3">Tên</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Số điện thoại</th>
                    <th class="px-4 py-3 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dsKhachHang as $kh)
                    <tr class="border-b last:border-0">
                        <td class="px-4 py-3">
                            <a href="{{ route('khach-hang.show', $kh) }}" class="text-blue-700 hover:underline">{{ $kh->ten }}</a>
                        </td>
                        <td class="px-4 py-3">{{ $kh->email ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $kh->so_dien_thoai ?? '—' }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('khach-hang.edit', $kh) }}" class="rounded bg-yellow-500 text-white px-3 py-1 text-sm hover:bg-yellow-600">Sửa</a>
                                <form method="POST" action="{{ route('khach-hang.destroy', $kh) }}"
                                      onsubmit="return confirm('Bạn chắc chắn muốn xóa khách hàng này?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded bg-red-600 text-white px-3 py-1 text-sm hover:bg-red-700">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">Chưa có khách hàng nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $dsKhachHang->links() }}
    </div>
@endsection