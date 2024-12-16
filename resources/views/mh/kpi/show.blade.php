@extends('layouts.index')

@section('Landing-Pages')
    <div class="container">
        <h1>KPI Details</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">KPI for {{ $kpi->user->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Jabatan: {{ $kpi->jabatan->name }}</h6>
                <p class="card-text"><strong>Description:</strong> {{ $kpi->desc }}</p>
                <p class="card-text"><strong>Bobot:</strong> {{ $kpi->bobot }}</p>
                <p class="card-text"><strong>Target:</strong> {{ $kpi->target }}</p>
                <p class="card-text"><strong>Realisasi:</strong> {{ $kpi->realisasi }}</p>
                <p class="card-text"><strong>Skor:</strong> {{ $kpi->skor }}</p>
                <p class="card-text"><strong>Final Skor:</strong> {{ $kpi->final_skor }}</p>
                <a href="{{ route('kpis.edit', $kpi) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('kpis.destroy', $kpi) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('kpis.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
