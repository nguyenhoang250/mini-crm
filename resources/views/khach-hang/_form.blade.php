@csrf

<div class="space-y-4">
    <div>
        <label class="block font-medium mb-1">Tên khách hàng <span class="text-red-600">*</span></label>
        <input type="text" name="ten" value="{{ old('ten', $khachHang->ten) }}"
               class="w-full rounded border border-gray-300 px-3 py-2">
        @error('ten') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Email</label>
        <input type="text" name="email" value="{{ old('email', $khachHang->email) }}"
               class="w-full rounded border border-gray-300 px-3 py-2">
        @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Số điện thoại</label>
        <input type="text" name="so_dien_thoai" value="{{ old('so_dien_thoai', $khachHang->so_dien_thoai) }}"
               class="w-full rounded border border-gray-300 px-3 py-2">
        @error('so_dien_thoai') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Địa chỉ</label>
        <input type="text" name="dia_chi" value="{{ old('dia_chi', $khachHang->dia_chi) }}"
               class="w-full rounded border border-gray-300 px-3 py-2">
        @error('dia_chi') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Ghi chú</label>
        <textarea name="ghi_chu" rows="4"
                  class="w-full rounded border border-gray-300 px-3 py-2">{{ old('ghi_chu', $khachHang->ghi_chu) }}</textarea>
        @error('ghi_chu') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>

<div class="mt-6 flex gap-3">
    <button type="submit" class="rounded bg-blue-700 text-white px-4 py-2 hover:bg-blue-800">Lưu</button>
    <a href="{{ route('khach-hang.index') }}" class="rounded border border-gray-300 px-4 py-2 hover:bg-gray-50">Hủy</a>
</div>