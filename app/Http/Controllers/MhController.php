<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kpi;
use App\Models\Jabatan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class MhController extends Controller
{
    function index()
    {
        return view('layouts.index');
    }

    public function kpi()
    {
        $kpis = Kpi::with(['user', 'jabatan'])->paginate(10);
        return view('mh.kpi.index', compact('kpis'));
    }

    public function create()
    {
        $users = User::where('role', 'hrd')->get();
        $jabatans = Jabatan::select('id', 'name')->distinct()->get()->unique('name');
        $desc = Jabatan::all();
        return view('mh.kpi.create', compact('users', 'jabatans', 'desc'));
    }
    public function getDescriptions($jabatan_id)
    {
        $descriptions = Jabatan::findOrFail($jabatan_id)->descriptions;

        // Debug
        if ($descriptions->isEmpty()) {
            return response()->json(['message' => 'No descriptions found for this Jabatan.'], 404);
        }

        return response()->json($descriptions);
    }

    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'desc' => 'required|string',
            'bobot' => 'required|numeric|min:0|max:100',
            'target' => 'required|numeric|min:0',
            'realisasi' => 'required|numeric|min:0',
        ]);

        // Calculate Skor (Realisasi / Target * 100)
        $skor = ($validatedData['realisasi'] / $validatedData['target']) * 100;

        // Calculate Skor Akhir (Skor * Bobot / 100)
        $final_skor = $skor * ($validatedData['bobot'] / 100);

        // Store the data in the database
        $validatedData['skor'] = $skor;
        $validatedData['final_skor'] = $final_skor;

        // Create a new KPI entry
        Kpi::create($validatedData);

        return redirect()->route('kpi.index')->with('success', 'KPI created successfully.');
    }

    public function show(Kpi $kpi)
    {
        return view('mh.kpi.show', compact('kpi'));
    }

    public function edit(Kpi $kpi)
    {
        // Fetch users with role 'hrd'
        $users = User::where('role', 'hrd')->get();

        // Fetch distinct jabatans and descriptions
        $jabatans = Jabatan::select('id', 'name')->distinct()->get()->unique('name');
        $desc = Jabatan::select('id', 'desc')->distinct()->get();

        // Pass necessary data to the view
        return view('mh.kpi.edit', compact('kpi', 'users', 'jabatans', 'desc'));
    }

    public function update(Request $request, Kpi $kpi)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'desc' => 'required|string',
            'bobot' => 'required|numeric|min:0|max:100',
            'target' => 'required|numeric|min:0',
            'realisasi' => 'required|numeric|min:0',
        ]);

        // Calculate Skor (Realisasi / Target * 100)
        $skor = ($validatedData['realisasi'] / $validatedData['target']) * 100;

        // Calculate Skor Akhir (Skor * Bobot / 100)
        $final_skor = $skor * ($validatedData['bobot'] / 100);

        // Add the calculated scores to the validated data
        $validatedData['skor'] = $skor;
        $validatedData['final_skor'] = $final_skor;

        // Update the KPI record in the database
        $kpi->update($validatedData);

        // Redirect back to the KPI index with a success message
        return redirect()->route('kpi.index')->with('success', 'KPI updated successfully.');
    }


    public function destroy(Kpi $kpi)
    {
        $kpi->delete();

        return redirect()->route('kpi.index')->with('success', 'KPI deleted successfully.');
    }
}
