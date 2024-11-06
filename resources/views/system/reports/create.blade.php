@extends('system.layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2 class="text-4xl font-semibold mb-5">Form Tambah Laporan</h2>
            <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">Pilih Kategori Laporan</label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500"
                        name="kategori_aduan">
                        <option value="" hidden>Pilih</option>
                        @foreach ($kategoris as $option)
                            <option value="{{ $option->id }}">{{ $option->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                @error('kategori_aduan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">Prioritas</label>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="prioritas_aduan" value="urgent" id="urgent" class="mr-2 checked:bg-pink-500"
                        onclick="onlyOne(this)">
                    <label for="urgent" class="text-lg text-gray-700">Urgent</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="prioritas_aduan" value="non-urgent" id="non-urgent"
                        class="mr-2 checked:bg-pink-500" onclick="onlyOne(this)">
                    <label for="non-urgent" class="text-lg text-gray-700">Non Urgent</label>
                </div>

                @error('prioritas_aduan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">Lokasi Kejadian</label>
                <input type="text"
                    class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded focus:outline-none focus:border-blue-500"
                    name="tautan_konten" placeholder="Masukkan lokasi kejadian">

                @error('tautan_konten')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">Deskripsi Laporan</label>
                <textarea
                    class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded focus:outline-none focus:border-blue-500"
                    name="deskripsi_pengaduan" rows="4" placeholder="Deskripsikan laporan Anda"></textarea>
                <p class="text-gray-500 text-sm">Deskripsikan secara lengkap terkait laporan yang anda sampaikan.</p>

                @error('deskripsi_pengaduan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">File Pendukung</label>
                <input type="file" name="file"
                    class="block w-full text-gray-500 border border-gray-300 py-2 px-4 rounded focus:outline-none focus:border-blue-500">
                <p class="text-gray-500 text-sm">Tambahkan file pendukung untuk menguatkan laporan.</p>

                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-between mt-5">
                <button type="button" onclick="history.back()" class="p-2 bg-gray-400 text-white rounded">Kembali</button>
                <button class="p-2 bg-pink-500 text-white rounded" type="submit">Kirim</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        function onlyOne(checkbox) {
            const checkboxes = document.getElementsByName('priority');
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false;
            });
        }
    </script>
@endsection
