@extends('layouts.index')

@section('Landing-Pages')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Create New KPI</h1>

        <form action="{{ route('kpi.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- User Selection -->
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Pilih User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Jabatan Selection -->
            <div>
                <label for="jabatan_id" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}" {{ old('jabatan_id') == $jabatan->id ? 'selected' : '' }}>
                            {{ $jabatan->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="desc" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <select name="desc" id="desc" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">-- Pilih Description --</option>
                    @foreach ($desc as $deskripsi)
                        <option value="{{ $deskripsi->desc }}" {{ old('desc') == $deskripsi->desc ? 'selected' : '' }}>
                            {{ $deskripsi->desc }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bobot Input -->
            <div>
                <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                <input type="number" name="bobot" id="bobot" required placeholder="Input bobot"
                    class="placeholder:text-gray-500 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Target -->
            <div>
                <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
                <input type="number" name="target" id="target" required placeholder="Input target"
                    class="placeholder:text-gray-500 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Realisasi -->
            <div>
                <label for="realisasi" class="block text-sm font-medium text-gray-700">Realisasi</label>
                <input type="number" name="realisasi" id="realisasi" required placeholder="Input realisasi"
                    class="placeholder:text-gray-500 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200 ease-in-out">
                    Create KPI
                </button>
            </div>
        </form>
    </div>
@endsection
