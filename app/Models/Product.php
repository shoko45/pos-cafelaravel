<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'harga',
        'foto'
    ];


    /**
     * Relasi banyak ke satu dengan Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Relasi satu ke banyak dengan OrderDetail
     */
    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}