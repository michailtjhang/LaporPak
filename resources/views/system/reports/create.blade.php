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

            {{-- <div class="mb-4">
                <label class="block text-xl font-semibold text-black mb-2">File Pendukung (Maksimal 5 file)</label>
                <div id="file-dropzone" class="dropzone border border-gray-300 bg-white p-4 rounded"></div>
                <p class="text-gray-500 text-sm">Tambahkan file pendukung untuk menguatkan laporan.</p>
                @error('file')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="flex justify-between mt-5">
                <button type="button" onclick="history.back()" class="p-2 bg-gray-400 text-white rounded">Kembali</button>
                <button class="p-2 bg-pink-500 text-white rounded" type="submit">Kirim</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <script>
        Dropzone.autoDiscover = false; // Disable auto-discovery to avoid conflicts

        // Initialize Dropzone on the #file-dropzone element
        var fileDropzone = new Dropzone("#file-dropzone", {
            url: "{{ route('tickets.store') }}",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}" // Tambahkan CSRF token di header
            },
            paramName: "files[]", // Set file parameter as an array
            autoProcessQueue: false, // Disable automatic upload to control it manually
            parallelUploads: 5, // Upload all files in the queue at once
            maxFiles: 5, // Maximum of 5 files
            maxFilesize: 5, // Maximum file size of 5 MB per file
            acceptedFiles: ".jpeg,.jpg,.png,.pdf,.doc,.docx", // Allowed file types
            addRemoveLinks: true, // Show link to remove files
            dictDefaultMessage: 'Drag & drop files here or click to select',

            init: function() {
                var myDropzone = this;

                // Add extra form data to Dropzone before sending
                myDropzone.on("sendingmultiple", function(files, xhr, formData) {
                    // Append each form field to the Dropzone request
                    formData.append("kategori_aduan", document.querySelector("[name=kategori_aduan]")
                        .value);
                    formData.append("prioritas_aduan", document.querySelector(
                        "[name=prioritas_aduan]:checked") ? document.querySelector(
                        "[name=prioritas_aduan]:checked").value : '');
                    formData.append("tautan_konten", document.querySelector("[name=tautan_konten]")
                        .value);
                    formData.append("deskripsi_pengaduan", document.querySelector(
                        "[name=deskripsi_pengaduan]").value);
                });

                // Handle form submission manually
                document.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue(); // Manually process the Dropzone queue
                    } else {
                        document.getElementById("reportForm")
                            .submit(); // Submit form if no files are queued
                    }
                });

                // Alert if maximum file count is exceeded
                myDropzone.on("maxfilesexceeded", function(file) {
                    myDropzone.removeFile(file); // Remove excess file
                    alert("Anda hanya dapat mengupload hingga 5 file.");
                });

                // Handle file size validation
                myDropzone.on("addedfile", function(file) {
                    if (file.size / 1024 / 1024 > 5) { // Check if file exceeds 5 MB
                        myDropzone.removeFile(file); // Remove file if too large
                        alert("File terlalu besar. Maksimal 5 MB.");
                    }
                });

                // Success and error handling for file upload
                myDropzone.on("successmultiple", function(files, response) {
                    console.log("Files uploaded successfully:", response);
                });
                myDropzone.on("errormultiple", function(files, response) {
                    console.log("File upload error:", response);
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
