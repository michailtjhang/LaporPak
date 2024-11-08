@extends('system.layouts.app')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data" id="reportForm">
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
                <div class="flex items-center space-x-6">

                    <div class="flex items-center">
                        <input type="checkbox" name="prioritas_aduan" value="urgent" id="urgent"
                            class="mr-2 checked:bg-pink-500" onclick="onlyOne(this)">
                        <label for="urgent" class="text-lg text-gray-700">Urgent</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" name="prioritas_aduan" value="non-urgent" id="non-urgent"
                            class="mr-2 checked:bg-pink-500" onclick="onlyOne(this)">
                        <label for="non-urgent" class="text-lg text-gray-700">Non Urgent</label>
                    </div>

                </div>

                @error('prioritas_aduan')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">Lokasi Kejadian</label>
                <input type="text"
                    class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded focus:outline-none focus:border-blue-500"
                    name="lokasi_kejadian" placeholder="Masukkan lokasi kejadian">

                @error('lokasi_kejadian')
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
                <label class="block text-xl font-semibold text-black mb-2">File Pendukung (Maksimal 5 file)</label>
                <div id="file-dropzone" class="dropzone border border-gray-300 bg-white p-4 rounded"></div>
                <p class="text-gray-500 text-sm">Tambahkan file pendukung untuk menguatkan laporan.</p>
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between mt-5">
                <button type="button" onclick="history.back()" class="p-2 bg-gray-400 text-white rounded">Kembali</button>
                <button class="p-2 bg-pink-500 text-white rounded" id="submitButton" type="submit">Kirim</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    // JQuery
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    // Dropzone
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false;

        // Initialize Dropzone
        var fileDropzone = new Dropzone("#file-dropzone", {
            url: "{{ route('tickets.store') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}" // Tambahkan CSRF token di header
            },
            autoProcessQueue: false, // prevent auto upload
            uploadMultiple: true, // allows handling multiple files in one request
            parallelUploads: 5, // process up to 5 files at once
            maxFiles: 5,
            maxFilesize: 5, // in MB
            acceptedFiles: ".jpeg,.jpg,.png",
            addRemoveLinks: true,
            dictDefaultMessage: 'Drag & drop files here or click to select',

            init: function() {
                var myDropzone = this;

                document.getElementById("submitButton").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Ensure files are in the FormData manually
                    var formData = new FormData(document.getElementById("reportForm"));
                    myDropzone.getQueuedFiles().forEach((file, index) => {
                        formData.append('files[]', file); // Add each file to FormData
                    });

                    // Append other form fields to FormData
                    formData.append("kategori_aduan", document.querySelector("[name=kategori_aduan]")
                        .value);
                    formData.append("prioritas_aduan", document.querySelector(
                        "[name=prioritas_aduan]:checked") ? document.querySelector(
                        "[name=prioritas_aduan]:checked").value : '');
                    formData.append("tautan_konten", document.querySelector("[name=tautan_konten]")
                        .value);
                    formData.append("deskripsi_pengaduan", document.querySelector(
                        "[name=deskripsi_pengaduan]").value);

                    // Manually send the AJAX request with FormData
                    $.ajax({
                        url: "{{ route('tickets.store') }}",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            history.back();
                        },
                        error: function(xhr) {
                            history.back();
                        }
                    });
                });
            }
        });

        // Function to allow only one checkbox to be checked in the "Prioritas" section
        function onlyOne(checkbox) {
            const checkboxes = document.getElementsByName('prioritas_aduan');
            checkboxes.forEach((item) => {
                if (item !== checkbox) item.checked = false;
            });
        }
    </script>
@endsection
