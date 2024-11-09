@extends('system.layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-2xl font-bold mb-4">Laporan Aduan {{ $data['aduan']->id_aduan }}</h2>
        <div class="overflow-x-auto">

            <div id="gallery" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    @foreach ($images as $index => $image)
                        <div class="{{ $index == 0 ? 'block' : 'hidden' }} duration-700 ease-in-out"
                            data-carousel-item="{{ $index == 0 ? 'active' : '' }}">
                            @if ($image->id_file)
                                <x-cld-image public-id="{{ $image->id_file }}" width="300" height="300"
                                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Image {{ $index + 1 }}" />
                            @else
                                <img src="{{ $image->url_file }}"
                                    class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="Carousel Image {{ $index + 1 }}">
                            @endif
                        </div>
                    @endforeach
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="mt-4">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr class="border-b border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Kategori
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data['aduan']->kategori->nama_kategori }}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Lokasi
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data['aduan']->lokasi_kejadian }}
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Status
                                </th>
                                <td class="px-6 py-4">
                                    @if ($data['aduan']->status_aduan == '0')
                                        <span
                                            class="px-2 py-1 rounded-full bg-yellow-400 text-yellow-900 text-xs font-semibold">Belum
                                            Selesai</span>
                                    @else
                                        <span
                                            class="px-2 py-1 rounded-full bg-green-400 text-green-900 text-xs font-semibold">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            <tr class="border-b border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                    Deskripsi
                                </th>
                                <td class="px-6 py-4">
                                    {{ $data['aduan']->deskripsi_pengaduan }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="m-4">
                        @if (!empty($data['PermissionEdit']) && $data['status'] === 0)
                            <form action="{{ route('tickets.update', $data['aduan']->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <div class="mb-4">
                                    <label class="block text-xl font-semibold text-black mb-2">Verifikasi</label>
                                    <div class="flex items-center space-x-6">

                                        <div class="flex items-center">
                                            <input type="checkbox" name="status" value="1" id="tanggapi"
                                                class="mr-2 checked:bg-pink-500" onclick="onlyOne(this)">
                                            <label for="tanggapi" class="text-lg text-gray-700">Ditanggapi</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="checkbox" name="status" value="2" id="tidak-tanggapi"
                                                class="mr-2 checked:bg-pink-500" onclick="onlyOne(this)">
                                            <label for="tidak-tanggapi" class="text-lg text-gray-700">Tidak
                                                Ditanggapi</label>
                                        </div>

                                    </div>

                                    @error('status')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="flex justify-between mt-5">
                                    <button type="button" onclick="history.back()"
                                        class="p-2 bg-gray-400 text-white rounded">Kembali</button>
                                    <button class="p-2 bg-pink-500 text-white rounded" id="submitButton"
                                        type="submit">Verifikasi</button>
                                </div>
                            </form>
                        @else
                            <div class="flex justify-between mt-5">
                                <button type="button" onclick="history.back()"
                                    class="p-2 bg-gray-400 text-white rounded">Kembali</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function onlyOne(checkbox) {
            var checkboxes = document.getElementsByName('status');
            checkboxes.forEach((item) => {
                if (item !== checkbox) {
                    item.checked = false
                }
            })
        }
    </script>
@endsection
