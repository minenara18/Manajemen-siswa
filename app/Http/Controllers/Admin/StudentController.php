<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Student;

class StudentController extends Controller
{
    public function index() {
        return view('pages.admin.students.index', [
            'students' => Student::all(),
            'title' => 'Siswa'
        ]);
    }

    public function create() {
        return view('pages.admin.students.create', [
            'title' => 'Tambah Siswa'
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data Siswa berhasil ditambahkan');
    }

    public function store(Request $request) {
        $data = $request->all();

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $data['photo'] = $request->file('photo')->store('siswa-photo', 'public');
        } else {
            $data['photo'] = null;
        }

        Student::create($data);


        return redirect()->route(route: 'siswa.index')->with(key:'success', value:'Siswa berhasil ditambah');
    }

    public function edit($id) {

        return view('pages.admin.students.edit', [
        'item' => Student::findOrFail($id),
        'title' => 'Edit Siswa'
        ]);
    }

    public function update(Request $request) {

        $data = $request->all();
        if(!empty($data['photo'])) {
            $data['photo'] = $request->file('photo')->store('siswa-photo', 'public');
        }else{
            unset($data['photo']);
        }

        Student::create($data);

        return redirect()->route('siswa.idex')->with('success', 'Siswa berhasil diedit');
    }

    public function destroy($id) {

        Student::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus');
    }
}
