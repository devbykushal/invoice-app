<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number', 'customer_id', 'issue_date', 'due_date', 'total_amount', 'paid_amount', 'status'];

    // Relationship with the customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relationship with invoice items
    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    // Relationship with transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
