@extends('layouts.index')

@section('Landing-Pages')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">Edit KPI</h1>

        <form action="{{ route('kpi.update', $kpi) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') <!-- To specify this as a PUT request for updating -->

            <!-- User Selection -->
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('user_id') border-red-500 @enderror">
                    <option value="">Pilih User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}"
                            {{ old('user_id', $kpi->user_id) == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('user_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Jabatan Selection -->
            <div>
                <label for="jabatan_id" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <select name="jabatan_id" id="jabatan_id" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('jabatan_id') border-red-500 @enderror">
                    <option value="">-- Pilih Jabatan --</option>
                    @foreach ($jabatans as $jabatan)
                        <option value="{{ $jabatan->id }}"
                            {{ old('jabatan_id', $kpi->jabatan_id) == $jabatan->id ? 'selected' : '' }}>
                            {{ $jabatan->name }}
                        </option>
                    @endforeach
                </select>
                @error('jabatan_id')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="desc" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <select name="desc" id="desc" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('desc') border-red-500 @enderror">
                    <option value="">-- Pilih Description --</option>
                    @foreach ($desc as $deskripsi)
                        <option value="{{ $deskripsi->desc }}"
                            {{ old('desc', $deskripsi->desc) == $deskripsi->desc ? 'selected' : '' }}>
                            {{ $deskripsi->desc }}
                        </option>
                    @endforeach
                </select>
                @error('desc')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Bobot -->
            <div>
                <label for="bobot" class="block text-sm font-medium text-gray-700">Bobot</label>
                <input type="number" name="bobot" id="bobot" required step="0.01" min="0" max="100"
                    placeholder="Input bobot"
                    class="placeholder:text-gray-500 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('bobot') border-red-500 @enderror"
                    value="{{ old('bobot', $kpi->bobot) }}">
                @error('bobot')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Target -->
            <div>
                <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
                <input type="number" name="target" id="target" required step="0.01" min="0"
                    placeholder="Input target"
                    class="placeholder:text-gray-500 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('target') border-red-500 @enderror"
                    value="{{ old('target', $kpi->target) }}">
                @error('target')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Realisasi -->
            <div>
                <label for="realisasi" class="block text-sm font-medium text-gray-700">Realisasi</label>
                <input type="number" name="realisasi" id="realisasi" required step="0.01" min="0"
                    placeholder="Input realisasi"
                    class="placeholder:text-gray-500 mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('realisasi') border-red-500 @enderror"
                    value="{{ old('realisasi', $kpi->realisasi) }}">
                @error('realisasi')
                    <p class="text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200 ease-in-out">
                    Update KPI
                </button>
            </div>
        </form>
    </div>
@endsection
