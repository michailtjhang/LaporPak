@extends('system.layouts.app')

@section('css')
    <!-- ======================== datatable ========================= -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.dataTables.css">
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-2xl font-bold mb-4">Laporan Saya</h2>
        <div class="flex justify-between items-center mb-4">
            <div class="flex space-x-4">
                <button class="px-4 py-2 border border-yellow-500 text-yellow-500 font-medium rounded">Laporan Aktif:
                    {{ $countPending }}</button>
                <button class="px-4 py-2 border border-green-500 text-green-500 font-medium rounded">Laporan Selesai:
                    {{ $countFinished }}</button>
            </div>
            @if (!empty($data['PermissionAdd']))
                <a href="{{ route('tickets.create') }}" class="px-4 py-2 bg-pink-500 text-white rounded shadow">Tambah
                    Laporan</a>
            @endif
        </div>
        <div class="overflow-x-auto">

            @include('_message')

            <table id="dataTable" class="table table-bordered table-hover table-stripped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kode Laporan</th>
                        <th class="text-center">Prioritas</th>
                        <th class="text-center">Subject</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Terakhir Update</th>
                        <th>Lampiran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['aduans'] as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $row->id_aduan }}</td>
                            @if ($row->prioritas_aduan == 'urgent')
                                <td>
                                    <span
                                        class="px-2 py-1 rounded-full bg-red-500 text-red-100 text-xs font-semibold">URGENT</span>
                                </td>
                            @else
                                <td>
                                    <span class="px-2 py-1 rounded-full bg-pink-100 text-pink-500 text-xs font-semibold">NON
                                        URGENT</span>
                                </td>
                            @endif
                            <td>{{ Str::limit(strip_tags($row->deskripsi_pengaduan), 100, '...') }}</td>
                            @if ($row->status_aduan == '0')
                                <td>
                                    <span
                                        class="px-2 py-1 rounded-full bg-yellow-400 text-yellow-900 text-xs font-semibold">Belum
                                        Selesai</span>
                                </td>
                            @elseif ($row->status_aduan == '1')
                                <td>
                                    <span
                                        class="px-2 py-1 rounded-full bg-green-400 text-green-900 text-xs font-semibold">Selesai</span>
                                </td>
                            @else
                                <td>
                                    <span
                                        class="px-2 py-1 rounded-full bg-gray-400 text-gray-900 text-xs font-semibold">Ditolak</span>
                                </td>
                            @endif
                            <td>{{ $row->updated_at->locale('in_id')->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('tickets.show', $row->id_aduan) }}"
                                    class="p-2 my-4 bg-blue-500 text-white rounded shadow w-8 h-8">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
