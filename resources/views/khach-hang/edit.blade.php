@extends('layouts.app')

@section('tieu_de', 'Sửa khách hàng')

@section('noi_dung')
    <h1 class="text-2xl font-bold mb-4">Sửa khách hàng</h1>

    <form method="POST" action="{{ route('khach-hang.update', $khachHang) }}" class="bg-white rounded shadow p-6">
        @method('PUT')
        @include('khach-hang._form')
    </form>
@endsection