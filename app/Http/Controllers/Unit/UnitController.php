<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Unit\StoreUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the units.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::with('kepalaUnit')->latest()->paginate(10);
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new unit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
    }

    /**
     * Store a newly created unit in storage.
     *
     * @param  \App\Http\Requests\Unit\StoreUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRequest $request)
    {
        Unit::create($request->validated());
        return redirect()->route('units.index')->with('success', 'Unit berhasil ditambahkan.');
    }

    /**
     * Display the specified unit.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('units.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified unit.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified unit in storage.
     *
     * @param  \App\Http\Requests\Unit\UpdateUnitRequest  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $unit->update($request->validated());
        return redirect()->route('units.index')->with('success', 'Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified unit from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        // Sebelum menghapus unit, pastikan tidak ada surat yang terkait
        if ($unit->suratKeluar()->count() > 0 || $unit->suratMasuk()->count() > 0 || $unit->users()->count() > 0 || $unit->kepalaUnit) {
            return redirect()->route('units.index')->with('error', 'Unit tidak dapat dihapus karena masih memiliki relasi dengan data lain.');
        }

        $unit->delete();
        return redirect()->route('units.index')->with('success', 'Unit berhasil dihapus.');
    }
}