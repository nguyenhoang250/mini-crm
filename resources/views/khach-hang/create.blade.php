@extends('layouts.app')

@section('tieu_de', 'Thêm khách hàng')

@section('noi_dung')
    <h1 class="text-2xl font-bold mb-4">Thêm khách hàng</h1>

    <form method="POST" action="{{ route('khach-hang.store') }}" class="bg-white rounded shadow p-6">
        @include('khach-hang._form')
    </form>
@endsection