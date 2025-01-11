<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title', __('messages.company'))</title>

    <style>
        @font-face {
            font-family: 'ipaexg';
            src: url('{{ storage_path('fonts/ipaexg.ttf') }}') format('truetype');
        }

        @page {
            margin: 50px 25px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .footer {
            position: fixed;
            bottom: -20px;
            right: 0;
            font-size: 16px;
            color: #555555;
            font-family: monospace !important;
        }

        .footer .page-number:after {
            content: counter(page);
        }
    </style>

    @php
        if (App::getLocale() == 'jp') {
            echo "
                <style>
                    * {
                        font-family: 'ipaexg' !important;
                    }
                </style>
            ";
        }
    @endphp

</head>

<body class="flex px-6 pb-8 flex-col">

    @yield('content')

    <div class="footer">
        Page <span class="page-number"></span> of [[total_pages]]
    </div>

</body>

</html>
