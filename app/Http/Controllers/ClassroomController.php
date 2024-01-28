<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\Teacher;

class ClassroomController extends Controller
{
    public function index() {
        return view('pages.admin.classrooms.index', [
            'items'=> Classroom::all(),
            'teachers' => Teacher::all(),
            'majors' => Major::all(),
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();
        Classroom::create($data);
        return redirect()->back()->with('success', 'Kelas berhasil ditambah');
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        Classroom::fileOrFail($id)->update($data);
        return redirect()->back()->with('success', 'Kelas berhasil diedit');
    }

    public function destroy($id) {
        Classroom::fileOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kelas berhasil dihapus');
    }
}
