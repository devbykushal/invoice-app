<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Valid payment methods
        $validPaymentMethods = ['cash', 'credit_card', 'bank_transfer', 'paypal', 'stripe'];

        // Get all invoices
        $invoices = Invoice::all();

        foreach ($invoices as $invoice) {
            $transactions = [];
            $totalPaidAmount = 0;

            // Determine if this invoice is paid or pending
            $isPaid = $invoice->id % 4 <= 2; // Invoices 1, 2 (paid), 3, 4 (pending)

            // Generate transactions for the invoice
            while ($totalPaidAmount < $invoice->total_amount) {
                $maxPayment = $isPaid
                    ? min($invoice->total_amount - $totalPaidAmount, 50)
                    : min($invoice->total_amount / 2, $invoice->total_amount - $totalPaidAmount);

                // Ensure that maxPayment is greater than or equal to 10 before using range()
                $paymentAmount = 0;
                if ($maxPayment >= 10) {
                    // Random payment amount in the valid range with step size of 10
                    $paymentAmount = $faker->randomElement(range(10, $maxPayment));
                } else {
                    // If the max payment is less than 10, use it directly
                    $paymentAmount = $maxPayment;
                }

                // Add transaction
                $transactions[] = [
                    'invoice_id' => $invoice->id,
                    'payment_amount' => $paymentAmount,
                    'payment_date' => $faker->dateTimeThisYear(),
                    'payment_method' => $faker->randomElement($validPaymentMethods),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                $totalPaidAmount += $paymentAmount;

                // For pending invoices, ensure we don't fully pay
                if (!$isPaid && $totalPaidAmount >= $invoice->total_amount / 2) {
                    break;
                }
            }

            // Insert transactions
            Transaction::insert($transactions);

            // Update invoice
            $invoice->update([
                'paid_amount' => $totalPaidAmount,
                'status' => $totalPaidAmount >= $invoice->total_amount ? 'paid' : 'pending',
            ]);
        }
    }
}
