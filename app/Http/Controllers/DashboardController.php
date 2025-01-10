<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    // data dump
    protected function allData()
    {
        return [
            [
                "invoice_id" => 1,
                "customer_name" => "Alice Walker",
                "invoice_date" => "2025-01-01",
                "due_date" => "2025-01-10",
                "total_amount" => 500.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 101, "date" => "2025-01-02", "amount" => 500.00, "method" => "Credit Card"]
                ]
            ],
            [
                "invoice_id" => 2,
                "customer_name" => "Bob Miller",
                "invoice_date" => "2025-01-03",
                "due_date" => "2025-01-13",
                "total_amount" => 750.00,
                "status" => "Partial",
                "transactions" => [
                    ["transaction_id" => 102, "date" => "2025-01-05", "amount" => 400.00, "method" => "Bank Transfer"],
                    ["transaction_id" => 103, "date" => "2025-01-07", "amount" => 350.00, "method" => "Cash"]
                ]
            ],
            [
                "invoice_id" => 3,
                "customer_name" => "Catherine Jones",
                "invoice_date" => "2025-01-05",
                "due_date" => "2025-01-15",
                "total_amount" => 300.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 104, "date" => "2025-01-06", "amount" => 300.00, "method" => "PayPal"]
                ]
            ],
            [
                "invoice_id" => 4,
                "customer_name" => "David Brown",
                "invoice_date" => "2025-01-08",
                "due_date" => "2025-01-18",
                "total_amount" => 450.00,
                "status" => "Unpaid",
                "transactions" => []
            ],
            [
                "invoice_id" => 5,
                "customer_name" => "Evelyn Smith",
                "invoice_date" => "2025-01-10",
                "due_date" => "2025-01-20",
                "total_amount" => 10000.00,
                "status" => "Partial",
                "transactions" => array_map(function ($index) {
                    return [
                        "transaction_id" => 200 + $index,
                        "date" => date("Y-m-d", strtotime("+" . ($index % 20) . " days")),
                        "amount" => 200.00,
                        "method" => $index % 2 === 0 ? "Credit Card" : "Bank Transfer"
                    ];
                }, range(1, 55)) // 55 transactions
            ],
            [
                "invoice_id" => 6,
                "customer_name" => "Franklin Davis",
                "invoice_date" => "2025-01-12",
                "due_date" => "2025-01-22",
                "total_amount" => 1000.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 301, "date" => "2025-01-15", "amount" => 1000.00, "method" => "Cash"]
                ]
            ],
            [
                "invoice_id" => 7,
                "customer_name" => "Grace Lee",
                "invoice_date" => "2025-01-14",
                "due_date" => "2025-01-24",
                "total_amount" => 250.00,
                "status" => "Unpaid",
                "transactions" => []
            ],
            [
                "invoice_id" => 8,
                "customer_name" => "Hannah Wilson",
                "invoice_date" => "2025-01-16",
                "due_date" => "2025-01-26",
                "total_amount" => 850.00,
                "status" => "Partial",
                "transactions" => [
                    ["transaction_id" => 401, "date" => "2025-01-18", "amount" => 400.00, "method" => "Credit Card"],
                    ["transaction_id" => 402, "date" => "2025-01-20", "amount" => 450.00, "method" => "Bank Transfer"]
                ]
            ],
            [
                "invoice_id" => 9,
                "customer_name" => "Isaac Martin",
                "invoice_date" => "2025-01-18",
                "due_date" => "2025-01-28",
                "total_amount" => 670.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 501, "date" => "2025-01-20", "amount" => 670.00, "method" => "PayPal"]
                ]
            ],
            [
                "invoice_id" => 10,
                "customer_name" => "Jack Turner",
                "invoice_date" => "2025-01-20",
                "due_date" => "2025-01-30",
                "total_amount" => 500.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 601, "date" => "2025-01-25", "amount" => 500.00, "method" => "Credit Card"]
                ]
            ],
            [
                "invoice_id" => 11,
                "customer_name" => "Karen Foster",
                "invoice_date" => "2025-01-22",
                "due_date" => "2025-01-31",
                "total_amount" => 420.00,
                "status" => "Partial",
                "transactions" => [
                    ["transaction_id" => 701, "date" => "2025-01-25", "amount" => 200.00, "method" => "Cash"],
                    ["transaction_id" => 702, "date" => "2025-01-27", "amount" => 220.00, "method" => "Bank Transfer"]
                ]
            ],
            [
                "invoice_id" => 12,
                "customer_name" => "Laura Bell",
                "invoice_date" => "2025-01-23",
                "due_date" => "2025-02-02",
                "total_amount" => 950.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 801, "date" => "2025-01-28", "amount" => 950.00, "method" => "PayPal"]
                ]
            ],
            [
                "invoice_id" => 13,
                "customer_name" => "Michael Young",
                "invoice_date" => "2025-01-24",
                "due_date" => "2025-02-04",
                "total_amount" => 370.00,
                "status" => "Unpaid",
                "transactions" => []
            ],
            [
                "invoice_id" => 14,
                "customer_name" => "Nancy Green",
                "invoice_date" => "2025-01-25",
                "due_date" => "2025-02-05",
                "total_amount" => 600.00,
                "status" => "Partial",
                "transactions" => [
                    ["transaction_id" => 901, "date" => "2025-01-30", "amount" => 300.00, "method" => "Credit Card"],
                    ["transaction_id" => 902, "date" => "2025-01-31", "amount" => 300.00, "method" => "Bank Transfer"]
                ]
            ],
            [
                "invoice_id" => 15,
                "customer_name" => "Oliver Baker",
                "invoice_date" => "2025-01-26",
                "due_date" => "2025-02-06",
                "total_amount" => 800.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 1001, "date" => "2025-02-01", "amount" => 800.00, "method" => "Cash"]
                ]
            ],
            [
                "invoice_id" => 16,
                "customer_name" => "Paula Reed",
                "invoice_date" => "2025-01-27",
                "due_date" => "2025-02-07",
                "total_amount" => 150.00,
                "status" => "Unpaid",
                "transactions" => []
            ],
            [
                "invoice_id" => 17,
                "customer_name" => "Quincy Adams",
                "invoice_date" => "2025-01-28",
                "due_date" => "2025-02-08",
                "total_amount" => 990.00,
                "status" => "Partial",
                "transactions" => [
                    ["transaction_id" => 1101, "date" => "2025-01-30", "amount" => 500.00, "method" => "Credit Card"],
                    ["transaction_id" => 1102, "date" => "2025-02-01", "amount" => 490.00, "method" => "PayPal"]
                ]
            ],
            [
                "invoice_id" => 18,
                "customer_name" => "Rachel Clarke",
                "invoice_date" => "2025-01-29",
                "due_date" => "2025-02-09",
                "total_amount" => 720.00,
                "status" => "Paid",
                "transactions" => [
                    ["transaction_id" => 1201, "date" => "2025-02-05", "amount" => 720.00, "method" => "Cash"]
                ]
            ],
            [
                "invoice_id" => 19,
                "customer_name" => "Samuel Cooper",
                "invoice_date" => "2025-01-30",
                "due_date" => "2025-02-10",
                "total_amount" => 330.00,
                "status" => "Unpaid",
                "transactions" => []
            ],
            [
                "invoice_id" => 20,
                "customer_name" => "Tina Hall",
                "invoice_date" => "2025-01-31",
                "due_date" => "2025-02-11",
                "total_amount" => 640.00,
                "status" => "Partial",
                "transactions" => [
                    ["transaction_id" => 1301, "date" => "2025-02-03", "amount" => 320.00, "method" => "Credit Card"],
                    ["transaction_id" => 1302, "date" => "2025-02-05", "amount" => 320.00, "method" => "Bank Transfer"]
                ]
            ]
        ];
    }

    public function index()
    {
        return view('dashboard');
    }

    public function invoice()
    {
        return view('invoice', ['invoices' => json_encode($this->allData())]);
    }

    public function transaction()
    {
        return view('transaction', ['invoices' => json_encode($this->allData())]);
    }

    public function viewTransaction($invoice_id)
    {
        return view('transaction', ['view_invoice_id' => $invoice_id, 'invoices' => json_encode($this->allData())]);
    }

    public function download($type, $id = null)
    {

        if ($type === 'invoices') {
            // return pdf()
            //     ->view("pdf.invoices", ['invoices' => json_encode($this->allData())])
            //     ->footerView('pdf.footer')
            //     ->margins(10, 0, 10, 0)
            //     ->landscape()
            //     ->name('All Invoices.pdf')
            //     ->download();
        }

        if ($type === 'transactions') {
            // return pdf()
            //     ->view("pdf.transactions", ['invoices' => json_encode($this->allData())])
            //     ->footerView('pdf.footer')
            //     ->margins(10, 0, 10, 0)
            //     ->landscape()
            //     ->name('All Transactions.pdf')
            //     ->download();
        }

        if ($type === 'invoice') {
            // return pdf()
            //     ->view("pdf.invoice", ['invoices' => json_encode($this->allData()), 'invoice_id' => $id])
            //     ->footerView('pdf.footer')
            //     ->margins(10, 0, 10, 0)
            //     ->landscape()
            //     ->name("Invoice#$id.pdf")
            //     ->download();
        }
    }
}
