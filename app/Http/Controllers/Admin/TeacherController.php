<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index() {
        return view('pages.admin.teachers.index', [
            'teachers' => Teacher::all(),
            'title' => 'Guru'
        ]);

    }

    public function create() {
        return view('pages.admin.teachers.create', [
            'title' => 'Tambah Guru'
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function store(Request $request) {
        $data = $request->all();

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $data['photo'] = $request->file('photo')->store('guru-photo', 'public');
        } else {
            $data['photo'] = null;
        }

        Teacher::create($data);


        return redirect()->route(route: 'guru.index')->with(key:'success', value:'Guru berhasil ditambah');
    }

    public function edit($id) {

        return view('pages.admin.teachers.edit', [
        'item' => Teacher::findOrFail($id),
        'title' => 'Edit guru'
        ]);
    }

    public function update(Request $request) {

        $data = $request->all();
        if(!empty($data['photo'])) {
            $data['photo'] = $request->file('photo')->store('guru-photo', 'public');
        }else{
            unset($data['photo']);
        }
        Teacher::create($data);

        return redirect()->route('guru.idex')->with('success', 'Guru berhasil diedit');
    }

    public function destroy($id) {

        Teacher::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Guru berhasil dihapus');
    }
}
