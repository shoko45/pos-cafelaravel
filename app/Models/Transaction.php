<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi melalui mass-assignment
    protected $fillable = [
        'customer_id',
        'total_harga',
        'tanggal',
        'status',
    ];

    /**
     * Relasi banyak ke satu dengan Customer
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relasi satu ke banyak dengan OrderDetail
     */
    public function transactiondetails()
    {
        return $this->hasMany(TransactionDetail::class, 'transaksi_id');
    }
}
