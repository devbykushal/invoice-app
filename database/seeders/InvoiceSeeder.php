<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Customer;
use App\Models\Medicine;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InvoiceSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $customers = Customer::all();

        foreach ($customers as $customer) {
            foreach (range(1, 10) as $index) {
                $invoice = Invoice::create([
                    'invoice_number' => 'INV-' . strtoupper($faker->lexify('??????')),
                    'customer_id' => $customer->id,
                    'issue_date' => $faker->date(),
                    'due_date' => $faker->date(),
                    'total_amount' => 0,
                    'paid_amount' => 0,
                    'status' => 'pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $medicines = Medicine::inRandomOrder()->take(rand(1, 5))->get();
                $totalAmount = 0;

                foreach ($medicines as $medicine) {
                    $quantity = rand(1, 10);
                    $medicineTotal = $medicine->price * $quantity;

                    InvoiceItem::create([
                        'invoice_id' => $invoice->id,
                        'medicine_id' => $medicine->id,
                        'quantity' => $quantity,
                        'price' => $medicine->price,
                        'total' => $medicineTotal,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $totalAmount += $medicineTotal;
                }

                $invoice->update([
                    'total_amount' => $totalAmount,
                ]);
            }
        }
    }
}
