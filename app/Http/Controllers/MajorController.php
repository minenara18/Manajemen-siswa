<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Major;
use App\Models\Teacher;

class MajorController extends Controller
{
    public function index() {
        return view('pages.admin.majors.index', [
            'items'=> Major::all()
        ]);
    }

    public function store(Request $request) {
        $data = $request->all();
        Major::create($data);
        return redirect()->back()->with('success', 'jurusan berhasil ditambah');
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        Major::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'jurusan berhasil diedit');
    }


    public function destroy($id) {
        Major::fileOrFail($id)->delete();
        return redirect()->back()->with('success', 'jurusan berhasil dihapus');
    }
}
