# Laravel Invoice Application

This is a very minimal Laravel-based Invoice Application designed for managing invoices and transactions. The app supports multi-language functionality (English and Japanese) and provides features such as viewing, correlating invoices with transactions, and exporting data to PDF with multilingual support.

## Features

-   **Dashboard**: A sample page with displaying key metrics like Total Income, Customers, Reviews, and Pending Refunds in a clear and organized layout.
-   **Invoices**:
    -   View a list of all invoices.
    -   Each invoice includes multiple associated transactions.
    -   Preview individual invoice detail in a modal window for a quick look without leaving the page.
    -   Download individual invoices or all invoices as PDF.
-   **Transactions**:
    -   View a list of all transactions.
    -   Download all transactions as PDF.
-   **Multi-language Support**: Invoices and their associated transactions can be exported as PDF documents in the selected language, powered by the **Spatie Laravel PDF** library.

## Technical Details

-   **Laravel Framework**: Obviously!
-   **No Database**: Data is statically dumped and used within the application.
-   **PDF Export**: Invoices and transactions can be exported as PDF documents in the selected language.
-   **JavaScript Interactivity `app.js`**:
    -   Invoice previews in modals are handled using JavaScript, which receives invoice data passed from the controller.
    -   Dropdown toggling for UI components is also managed with JavaScript such as Language Switcher.

## Installation

1. Clone the repository:
    ```bash
    git clone <repository_url>
    cd <project_directory>
    ```
2. Install dependencies:
    ```
    composer install
    npm install
    ```
3. Run server:
    ```
    php artisan serve
    npm run dev
    ```
