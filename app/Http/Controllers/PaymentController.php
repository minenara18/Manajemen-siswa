<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('pages.admin.payment.index', [
            'items' => Payment::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Payment::create($data);
        return redirect()->back()->with('success', 'SPP Berhasil Ditambah');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Payment::findOrFail($id)->update($data);
        return redirect()->back()->with('success', 'SPP Berhasil Ditedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Payment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'SPP Berhasil Dihapus');
    }
}
