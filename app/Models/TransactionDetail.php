<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi melalui mass-assignment
    protected $fillable = [
        'transaksi_id',
        'product_id',
        'qty',
        'harga',
    ];

    /**
     * Relasi banyak ke satu dengan Transaction
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaksi_id');
    }

    /**
     * Relasi banyak ke satu dengan Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
