<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|numeric|min:1',
            'harga' => 'required|numeric|min:1',
        ]);

        // Hitung subtotal
        $subtotal = $request->qty * $request->harga;

        // Simpan ke database
        TransactionDetail::create([
            'transaction_id' => $request->transaction_id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'harga' => $request->harga,
            'subtotal' => $subtotal,
        ]);

        return redirect()
            ->route('transaction.show', $request->transaction_id)
            ->with('success', 'Transaction detail added successfully.');
    }

    public function destroy(TransactionDetail $TransactionDetail)
    {
        $transactionId = $TransactionDetail->transaction_id;
        $TransactionDetail->delete();

        return redirect()
            ->route('transaction.show', $transactionId)
            ->with('success', 'Transaction detail deleted successfully.');
    }
}
