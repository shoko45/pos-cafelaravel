<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi (mass assignment)
    protected $fillable = ['nama'];

    /**
     * Relasi satu ke banyak dengan produk
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
