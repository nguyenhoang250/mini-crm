@extends('layouts.app')

@section('tieu_de', 'Chi tiết khách hàng')

@section('noi_dung')
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">{{ $khachHang->ten }}</h1>
        <div class="flex gap-2">
            <a href="{{ route('khach-hang.edit', $khachHang) }}" class="rounded bg-yellow-500 text-white px-3 py-1.5 hover:bg-yellow-600">Sửa</a>
            <a href="{{ route('khach-hang.index') }}" class="rounded border border-gray-300 px-3 py-1.5 hover:bg-gray-50">Quay lại</a>
        </div>
    </div>

    <div class="bg-white rounded shadow p-6">
        <dl class="grid grid-cols-1 sm:grid-cols-3 gap-y-3">
            <dt class="font-medium text-gray-500">Email</dt>
            <dd class="sm:col-span-2">{{ $khachHang->email ?? '—' }}</dd>

            <dt class="font-medium text-gray-500">Số điện thoại</dt>
            <dd class="sm:col-span-2">{{ $khachHang->so_dien_thoai ?? '—' }}</dd>

            <dt class="font-medium text-gray-500">Địa chỉ</dt>
            <dd class="sm:col-span-2">{{ $khachHang->dia_chi ?? '—' }}</dd>

            <dt class="font-medium text-gray-500">Ghi chú</dt>
            <dd class="sm:col-span-2 whitespace-pre-line">{{ $khachHang->ghi_chu ?? '—' }}</dd>

            <dt class="font-medium text-gray-500">Ngày tạo</dt>
            <dd class="sm:col-span-2">{{ $khachHang->created_at->format('d/m/Y H:i') }}</dd>
        </dl>
    </div>
@endsection