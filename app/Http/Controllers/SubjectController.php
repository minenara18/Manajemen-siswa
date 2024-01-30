<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(Request $request){
        $groupOfSubject = $request->input('group_of_subject');

        if ($groupOfSubject) {
            $subjects = Subject::where('group_of_subject', '=', $groupOfSubject)->get();
        } else{
            $subjects = Subject::all();
        }

        return view('pages.admin.subjects.index', [
            'subjects'=>$subjects,
            'datas'=>Subject::all(),
            'title'=> 'Daftar Mapel',
            'kelompok'=>'Semua Kelompok'
        ]);
    }

    public function filter(Request $request) {
        $groupOfSubject = $request->input('group_of_subject');
        $subjects = Subject::where('group_subject', $groupOfSubject)->get();

        return view('pages.admin.subjects.index', [
            'subjects'=>$subjects,
            'datas'=>Subject::all(),
            'title'=> 'Daftar Mapel',
            'kelompok'=>'Semua Kelompok'
        ]);
    }

    public function create() {
        return view('pages.admin.subjects.create', [
            'title' => 'Tambah mapel',
            'subjects' => Subject::all()
        ]);

        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function store(Request $request) {
        $data = $request->all();
        Subject::create($data);

        return redirect()->route(route: 'mapel.index')->with(key:'success', value:'Mapel berhasil ditambah');
    }

    public function edit($id) {

        return view('pages.admin.subjects.edit', [
        'item' => Subject::findOrFail($id),
        'title' => 'Edit mapel'
        ]);
    }

    public function update(Request $request, $id) {

        $data = $request->all();
        Subject::findOrFail($id)->update($data);

        return redirect()->route('mapel.index')->with('success', 'Mapel berhasil diedit');
    }

    public function destroy($id) {

        Subject::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Mapel berhasil dihapus');
    }
}
