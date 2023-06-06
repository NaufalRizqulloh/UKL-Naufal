<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tugass = Tugas::query();

        if($request->has('search')){
            $tugass->where('kegiatan', 'like', '%'.$request->search.'%')->orWhere('deskripsi', 'like', '%'.$request->search.'%')->orWhere('status', 'like', '%'.$request->search.'%')->orWhere('deadline', 'like', '%'.$request->search.'%');
        }

        return view('tugas.index',[
            'tugass' => $tugass->simplePaginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kegiatan'=>'required',
            'deskripsi'=>'required',
            'status'=>'required',
            'deadline'=>'required',
            'photo'=>'image',
        ]);

        $photoPath ='';

        if($request->hasFile('photo')){
            $photoPath = $request->file('photo')->store('/photos');
        }

        $tugass = new Tugas();

        $tugass ->kegiatan = $request->kegiatan;
        $tugass ->deskripsi = $request->deskripsi;
        $tugass ->status = $request->status;
        $tugass ->deadline = $request->deadline;
        $tugass ->photo = $photoPath;

        $tugass ->save();

        return redirect()->route('Tugas.index')->with('success', 'Tugas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tugas = Tugas::find($id);

        return view('tugas.edit', [
            'tugas' => $tugas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'kegiatan'=>'required',
            'deskripsi'=>'required',
            'status'=>'required',
            'deadline'=>'required',
        ]);

        $tugass = Tugas::find($id);

        $tugass ->kegiatan = $request->kegiatan;
        $tugass ->deskripsi = $request->deskripsi;
        $tugass ->status = $request->status;
        $tugass ->deadline = $request->deadline;

        $tugass ->save();

        return redirect()->route('Tugas.index')->with('success', 'Tugas berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tugass = Tugas::find($id)->delete();

        return redirect()->route('Tugas.index');
    }
}
