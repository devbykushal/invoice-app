<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $invoices = [
            [
                'invoice_number' => 'INV-1001',
                'date' => '2025-01-01',
                'customer' => [
                    'name' => 'John Doe',
                    'email' => 'johndoe@example.com',
                    'phone' => '123-456-7890',
                    'address' => '123 Main Street, Cityville, USA',
                ],
                'items' => [
                    [
                        'description' => 'Web Design Services',
                        'quantity' => 1,
                        'unit_price' => 1200.00,
                        'total' => 1200.00,
                    ],
                    [
                        'description' => 'Domain Registration',
                        'quantity' => 1,
                        'unit_price' => 15.00,
                        'total' => 15.00,
                    ],
                ],
                'subtotal' => 1215.00,
                'tax' => 121.50,
                'total' => 1336.50,
                'status' => 'Paid',
            ],
            [
                'invoice_number' => 'INV-1002',
                'date' => '2025-01-03',
                'customer' => [
                    'name' => 'Jane Smith',
                    'email' => 'janesmith@example.com',
                    'phone' => '987-654-3210',
                    'address' => '456 Elm Street, Townsville, USA',
                ],
                'items' => [
                    [
                        'description' => 'SEO Optimization',
                        'quantity' => 1,
                        'unit_price' => 800.00,
                        'total' => 800.00,
                    ],
                    [
                        'description' => 'Content Writing',
                        'quantity' => 5,
                        'unit_price' => 50.00,
                        'total' => 250.00,
                    ],
                ],
                'subtotal' => 1050.00,
                'tax' => 105.00,
                'total' => 1155.00,
                'status' => 'Unpaid',
            ],
            [
                'invoice_number' => 'INV-1003',
                'date' => '2025-01-05',
                'customer' => [
                    'name' => 'Acme Corp.',
                    'email' => 'contact@acmecorp.com',
                    'phone' => '555-123-4567',
                    'address' => '789 Corporate Blvd, Metropolis, USA',
                ],
                'items' => [
                    [
                        'description' => 'Software Development',
                        'quantity' => 1,
                        'unit_price' => 5000.00,
                        'total' => 5000.00,
                    ],
                    [
                        'description' => 'Maintenance Fee',
                        'quantity' => 12,
                        'unit_price' => 150.00,
                        'total' => 1800.00,
                    ],
                ],
                'subtotal' => 6800.00,
                'tax' => 680.00,
                'total' => 7480.00,
                'status' => 'Partially Paid',
            ],
            [
                'invoice_number' => 'INV-1004',
                'date' => '2025-01-10',
                'customer' => [
                    'name' => 'Michael Brown',
                    'email' => 'michael.brown@example.com',
                    'phone' => '444-555-6666',
                    'address' => '101 Maple Ave, Springfield, USA',
                ],
                'items' => [
                    [
                        'description' => 'Mobile App Development',
                        'quantity' => 1,
                        'unit_price' => 7500.00,
                        'total' => 7500.00,
                    ],
                ],
                'subtotal' => 7500.00,
                'tax' => 750.00,
                'total' => 8250.00,
                'status' => 'Paid',
            ],
            [
                'invoice_number' => 'INV-1005',
                'date' => '2025-01-12',
                'customer' => [
                    'name' => 'Sarah Connor',
                    'email' => 'sarah.connor@example.com',
                    'phone' => '333-777-8888',
                    'address' => '202 Oak Street, Centerville, USA',
                ],
                'items' => [
                    [
                        'description' => 'Graphic Design',
                        'quantity' => 2,
                        'unit_price' => 400.00,
                        'total' => 800.00,
                    ],
                ],
                'subtotal' => 800.00,
                'tax' => 80.00,
                'total' => 880.00,
                'status' => 'Unpaid',
            ],
            [
                'invoice_number' => 'INV-1006',
                'date' => '2025-01-15',
                'customer' => [
                    'name' => 'Tech World',
                    'email' => 'info@techworld.com',
                    'phone' => '222-333-4444',
                    'address' => '303 Tech Park, Innovate City, USA',
                ],
                'items' => [
                    [
                        'description' => 'Cloud Hosting',
                        'quantity' => 1,
                        'unit_price' => 2000.00,
                        'total' => 2000.00,
                    ],
                ],
                'subtotal' => 2000.00,
                'tax' => 200.00,
                'total' => 2200.00,
                'status' => 'Paid',
            ],
            [
                'invoice_number' => 'INV-1007',
                'date' => '2025-01-18',
                'customer' => [
                    'name' => 'Linda Carter',
                    'email' => 'linda.carter@example.com',
                    'phone' => '999-888-7777',
                    'address' => '404 Sunset Blvd, Beachside, USA',
                ],
                'items' => [
                    [
                        'description' => 'Social Media Management',
                        'quantity' => 3,
                        'unit_price' => 500.00,
                        'total' => 1500.00,
                    ],
                ],
                'subtotal' => 1500.00,
                'tax' => 150.00,
                'total' => 1650.00,
                'status' => 'Unpaid',
            ],
            [
                'invoice_number' => 'INV-1008',
                'date' => '2025-01-20',
                'customer' => [
                    'name' => 'Corporate Co.',
                    'email' => 'admin@corporateco.com',
                    'phone' => '123-000-4567',
                    'address' => '505 Business Rd, Commerce City, USA',
                ],
                'items' => [
                    [
                        'description' => 'Training Workshops',
                        'quantity' => 5,
                        'unit_price' => 300.00,
                        'total' => 1500.00,
                    ],
                ],
                'subtotal' => 1500.00,
                'tax' => 150.00,
                'total' => 1650.00,
                'status' => 'Paid',
            ],
            [
                'invoice_number' => 'INV-1009',
                'date' => '2025-01-25',
                'customer' => [
                    'name' => 'David Warner',
                    'email' => 'david.warner@example.com',
                    'phone' => '111-222-3333',
                    'address' => '606 Victory Ln, Champions City, USA',
                ],
                'items' => [
                    [
                        'description' => 'Custom Website Development',
                        'quantity' => 1,
                        'unit_price' => 10000.00,
                        'total' => 10000.00,
                    ],
                ],
                'subtotal' => 10000.00,
                'tax' => 1000.00,
                'total' => 11000.00,
                'status' => 'Partially Paid',
            ],
            [
                'invoice_number' => 'INV-1010',
                'date' => '2025-01-30',
                'customer' => [
                    'name' => 'Emily Johnson',
                    'email' => 'emily.johnson@example.com',
                    'phone' => '555-444-3333',
                    'address' => '707 Park Ave, Downtown, USA',
                ],
                'items' => [
                    [
                        'description' => 'Photography Services',
                        'quantity' => 1,
                        'unit_price' => 1500.00,
                        'total' => 1500.00,
                    ],
                ],
                'subtotal' => 1500.00,
                'tax' => 150.00,
                'total' => 1650.00,
                'status' => 'Unpaid',
            ],
        ];

        return view('dashboard', ['invoicesJson' => json_encode($invoices)]);
    }

    public function invoice()
    {
        return view('invoice');
    }

    public function transaction()
    {
        return view('transaction');
    }
}
