<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\StudentPayment;

class StudentPaymentController extends Controller
{
    public function index()
    {
        return view('pages.admin.StudentPayments.index', [
            'items'=> StudentPayment::all(),
            'payment' => Payment::all(),
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->all();
        StudentPayment::create($data);
        return redirect()->back()->with('success', 'Kelas berhasil ditambah');
    }


    public function update(Request $request, $id)
    {
        $data = $request->all();
        StudentPayment::create($data);
        return redirect()->back()->with('success', 'Kelas berhasil ditambah');
    }

    public function destroy($id)
    {
        StudentPayment::fileOrFail($id)->delete();
        return redirect()->back()->with('success', 'Kelas berhasil ditambah');
    }
}
