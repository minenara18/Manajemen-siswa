<?php

namespace App\Http\Controllers;

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
            'students' => Student::findOrFail($id),
            'title' => 'Wali Murid'
        ]);
    }

    public function create($id) {
        return view ('pages.admin.ortus.create', [
            'students' => Student::findOrFail($id),
            'title' => 'Tambah Wali Murid'
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();

        Ortu::create($data);
        return redirect()->route('orang-tua.index', $request->id_student)->with('success', 'wali murid berhasil ditambahkan');
    }

    public function edit($id, $id_ortu) {

        return view('pages.admin.ortus.edit', [
        'item' => Ortu::findOrFail($id_ortu),
        'students' => Student::findOrFail($id),
        'title' => 'Edit Wali murid'
        ]);
    }

    public function update(Request $request, $id) {

        $data = $request->all();
        Ortu::findOrFail($id)->create($data);

        return redirect()->route('ortu.index')->with('success', 'Orang tua berhasil diedit');
    }

    public function destroy($id) {

        Ortu::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Orang tua berhasil dihapus');
    }
}
