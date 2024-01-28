<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ortu;
use App\Models\Student;

class OrtuController extends Controller
{
    public function index() {
        return view ('pages.admin.ortus.index', [
            'ortus' => Ortu::all(),
            'students' => Student::all(),
            'title' => 'Wali Murid'
        ]);
    }

    public function orang_tua($id) {
        return view ('pages.admin.ortus.index', [
            'ortus' => Ortu::where('id_student', $id)->get(),
            'students' => Student::findOrFail($id),
            'title' => 'Wali Murid'
        ]);
    }

    public function create($id) {
        return view ('pages.admin.ortus.create', [
            'ortus' => Ortu::findOrFail($id),
            'title' => 'Tambah Wali Murid'
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();

        Ortu::create($data);
        return redirect()->route('orang-tua.index', $request->id_student)->with('success', 'wali murid berhasil ditambahkan');
    }

    public function edit($id) {

        return view('pages.admin.ortus.edit', [
        'item' => Student::findOrFail($id),
        'title' => 'Edit Wali murid'
        ]);
    }

    public function update(Request $request) {

        $data = $request->all();
        Student::create($data);

        return redirect()->route('ortu.idex')->with('success', 'Orang tua berhasil diedit');
    }

    public function destroy($id) {

        Ortu::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Orang tua berhasil dihapus');
    }
}
