<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    // Danh sách + tìm kiếm + phân trang
    public function index(Request $request)
    {
        $tuKhoa = $request->input('q');

        $dsKhachHang = KhachHang::query()
            ->when($tuKhoa, function ($query, $tuKhoa) {
                $query->where(function ($q) use ($tuKhoa) {
                    $q->where('ten', 'like', "%{$tuKhoa}%")
                      ->orWhere('email', 'like', "%{$tuKhoa}%")
                      ->orWhere('so_dien_thoai', 'like', "%{$tuKhoa}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('khach-hang.index', compact('dsKhachHang', 'tuKhoa'));
    }

    // Hiện form thêm mới
    public function create()
    {
        return view('khach-hang.create', ['khachHang' => new KhachHang()]);
    }

    // Lưu khách hàng mới
    public function store(Request $request)
    {
        $duLieu = $this->kiemTraDuLieu($request);

        KhachHang::create($duLieu);

        return redirect()->route('khach-hang.index')
            ->with('thanh_cong', 'Đã thêm khách hàng mới.');
    }

    // Xem chi tiết
    public function show(KhachHang $khachHang)
    {
        return view('khach-hang.show', compact('khachHang'));
    }

    // Hiện form sửa
    public function edit(KhachHang $khachHang)
    {
        return view('khach-hang.edit', compact('khachHang'));
    }

    // Cập nhật
    public function update(Request $request, KhachHang $khachHang)
    {
        $duLieu = $this->kiemTraDuLieu($request);

        $khachHang->update($duLieu);

        return redirect()->route('khach-hang.index')
            ->with('thanh_cong', 'Đã cập nhật khách hàng.');
    }

    // Xóa
    public function destroy(KhachHang $khachHang)
    {
        $khachHang->delete();

        return redirect()->route('khach-hang.index')
            ->with('thanh_cong', 'Đã xóa khách hàng.');
    }

    // Kiểm tra dữ liệu form (dùng chung cho thêm và sửa)
    private function kiemTraDuLieu(Request $request): array
    {
        return $request->validate([
            'ten'           => ['required', 'string', 'max:255'],
            'email'         => ['nullable', 'email', 'max:255'],
            'so_dien_thoai' => ['nullable', 'string', 'max:20'],
            'dia_chi'       => ['nullable', 'string', 'max:500'],
            'ghi_chu'       => ['nullable', 'string'],
        ], [
            'ten.required'  => 'Vui lòng nhập tên khách hàng.',
            'ten.max'       => 'Tên không được quá 255 ký tự.',
            'email.email'   => 'Email không đúng định dạng.',
            'so_dien_thoai.max' => 'Số điện thoại không được quá 20 ký tự.',
        ]);
    }
}