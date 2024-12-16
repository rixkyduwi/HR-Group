@extends('layouts.index')

@section('Landing-Pages')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-6">KPI List</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Create Button -->
        <div class="mb-4">
            <a href="{{ route('kpi.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Create New KPI
            </a>
        </div>

        <!-- KPI Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-200 text-sm text-left">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">No.</th>
                        <th class="border border-gray-300 px-4 py-2">User</th>
                        <th class="border border-gray-300 px-4 py-2">Jabatan</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Bobot</th>
                        <th class="border border-gray-300 px-4 py-2">Target</th>
                        <th class="border border-gray-300 px-4 py-2">Realisasi</th>
                        <th class="border border-gray-300 px-4 py-2">Skor</th>
                        <th class="border border-gray-300 px-4 py-2">Final Skor</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($kpis as $kpi)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->user->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->jabatan->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ Str::limit($kpi->desc, 30) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->bobot }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->target }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->realisasi }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->skor }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $kpi->final_skor }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    {{-- <a href="{{ route('kpi.show', $kpi) }}"
                                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">View</a> --}}
                                    <a href="{{ route('kpi.edit', $kpi) }}"
                                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition">Edit</a>
                                    <form action="{{ route('kpi.destroy', $kpi) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $kpis->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
