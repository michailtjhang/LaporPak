@extends('system.layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow mb-6">
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            
            <h2 class="text-4xl font-semibold mb-5">Form Tambah Role & Permission Role</h2>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full p-2 border rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                    placeholder="Please Enter Name" value="{{ old('name') }}">

                @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="permission" class="mb-4 block text-sm font-medium text-gray-700">Permission</label>
        
                @foreach ($data as $row)
                    <div class="mb-2">
                        <p class="text-gray-700 font-medium">{{ $row['name'] }}</p>
                        <div class="grid grid-cols-4 gap-4">
        
                            @foreach ($row['group'] as $group)        
                                <div class="flex items-center">
                                    <input type="checkbox" value="{{ $group['id'] }}"
                                        name="permission_id[]" id="{{ $group['id'] }}"
                                        class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                    <label for="{{ $group['id'] }}" class="ml-2 text-sm text-gray-700">{{ $group['name'] }}</label>
                                </div>
                            @endforeach
        
                        </div>
                    </div>
                    <hr class="my-4 border-gray-300">
                @endforeach
            </div>

            <div class="flex justify-between mt-5">
                <button type="button" onclick="history.back()" class="p-2 bg-gray-400 text-white rounded">Kembali</button>
                <button class="p-2 bg-pink-500 text-white rounded" id="submitButton" type="submit">Kirim</button>
            </div>
        </form>
    </div>
@endsection
