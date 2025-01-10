<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'payment_amount',
        'remaining_balance',
        'payment_date',
        'payment_method',
    ];

    // Relationship with the invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
