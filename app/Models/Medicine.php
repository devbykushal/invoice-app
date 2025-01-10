<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'description', 'price', 'stock_quantity'];

    // Relationship with invoice items
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }
}
