@extends('system.layouts.app')

@section('css')
    <!-- ======================== fontawesome ========================= -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <h2 class="text-2xl font-bold mb-4">Permission Roles</h2>
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('role.create') }}" class="px-4 py-2 bg-pink-500 text-white rounded shadow">Tambah</a>
        </div>
        <div class="overflow-x-auto">

            @include('_message')

            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border-b border-gray-300 text-left">No</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left">Nama</th>
                        <th class="px-4 py-2 border-b border-gray-300 text-left">Date</th>
                        @if (!empty($data['PermissionEdit']) || !empty($data['PermissionDelete']))
                            <th class="px-4 py-2 border-b border-gray-300 text-left">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['role'] as $row)
                        <tr>
                            <td class="px-4 py-2 border-b border-gray-300 text-left">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 text-left">{{ $row->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300 text-left">{{ $row->created_at }}</td>
                            <td class="flex py-2 space-x-1 items-center">
                                @if (!empty($data['PermissionEdit']))
                                    <a href="{{ route('role.edit', $row->id) }}"
                                        class="flex items-center justify-center bg-yellow-500 text-white p-1.5 rounded-md shadow hover:bg-yellow-600 transition duration-200 w-8 h-8">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>
                                @endif

                                @if (!empty($data['PermissionDelete']))
                                    <button type="button"
                                        class="flex items-center justify-center bg-red-500 text-white p-1.5 rounded-md shadow hover:bg-red-600 transition duration-200 w-8 h-8 disabled:opacity-50"
                                        @if (auth()->user()->role_id === $row->id) disabled @endif
                                        onclick="confirmDelete('{{ route('role.destroy', $row->id) }}', '{{ $row->name }}')">
                                        <i class="fas fa-fw fa-trash"></i>
                                    </button>

                                    <script>
                                        function confirmDelete(deleteUrl, name) {
                                            Swal.fire({
                                                title: "Are you sure?",
                                                text: `You won't be able to revert this! This will delete ${name}.`,
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#d33",
                                                cancelButtonColor: "#3085d6",
                                                confirmButtonText: "Yes, delete it!"
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    var form = document.createElement('form');
                                                    form.method = 'POST';
                                                    form.action = deleteUrl;

                                                    var csrfToken = document.createElement('input');
                                                    csrfToken.type = 'hidden';
                                                    csrfToken.name = '_token';
                                                    csrfToken.value = '{{ csrf_token() }}';
                                                    form.appendChild(csrfToken);

                                                    var methodField = document.createElement('input');
                                                    methodField.type = 'hidden';
                                                    methodField.name = '_method';
                                                    methodField.value = 'DELETE';
                                                    form.appendChild(methodField);

                                                    document.body.appendChild(form);
                                                    form.submit();
                                                }
                                            });
                                        }
                                    </script>
                                @endif
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
