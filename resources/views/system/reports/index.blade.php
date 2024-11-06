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
            <a href="{{ route('tickets.create') }}" class="px-4 py-2 bg-pink-500 text-white rounded shadow">Tambah
                Laporan</a>
        </div>
        <div class="overflow-x-auto">
            <table id="dataTable" class="table table-bordered table-hover table-stripped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Kode Laporan</th>
                        <th>Prioritas</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Terakhir Update</th>
                        <th>Agen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['aduans'] as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $row->id_aduan }}</td>
                            @if ($row->prioritas_aduan == 'urgent')
                                <td class="text-center text-pink-500">Urgent</td>
                            @else
                                <td class="text-center text-green-500">Non Urgent</td>
                            @endif
                            <td>{{ Str::limit(strip_tags($row->deskripsi_pengaduan), 100, '...') }}</td>
                            @if ($row->status_aduan == '0')
                                <td class="text-center text-orange-500">Dalam Proses</td>
                            @else
                                <td class="text-center text-green-500">Selesai</td>
                            @endif
                            <td>{{ $row->updated_at }}</td>
                            <td>{{ $row->id_agen ?? 'Agen21' }}</td>
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
