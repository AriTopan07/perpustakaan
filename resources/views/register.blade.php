<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="shortcut icon" href="{{ asset('backend/static/umsida.jpg') }}" type="image/x-icon">
    <title>Register</title>
    <!-- CSS files -->
    <link href="{{ asset('backend/dist/css/tabler.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-flags.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-payments.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/tabler-vendors.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/css/demo.min.css?1684106062') }}" rel="stylesheet" />
    <link href="{{ asset('backend/dist/toastify-js/src/toastify.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">
    <link href="{{ asset('backend/dist/css/custom.css') }}" rel="stylesheet" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }

        .card {
            border-radius: 12px !important;
        }
    </style>
</head>

<body class="bg-{{ $sidebar->sidebar }}">
    <script src="{{ asset('backend/dist/js/demo-theme.min.js?1684106062') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <form class="card card-md card-borderless shadow-sm" action="" method="post" autocomplete="off"
                novalidate id="register">
                <div class="card-body">
                    <h1 class="h1 text-center mb-4">Register</h1>
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input type="email" class="form-control" placeholder="Enter phone number">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Password" autocomplete="off">
                    </div>
                    <div class="form-footer">
                        <button type="sumbit" class="btn btn-primary w-100">Create new
                            account</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-secondary mt-3">
                Sudah punya akun? <a href="login" tabindex="-1">Login</a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <script src="{{ asset('backend/dist/libs/apexcharts/dist/apexcharts.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('backend/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('backend/dist/libs/jsvectormap/dist/maps/world.js?1684106062') }}" defer></script>
    <script src="{{ asset('backend/dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062') }}" defer></script>
    <script src="{{ asset('backend/dist/toastify-js/src/toastify.js') }}"></script>
    <!-- Tabler Core -->
    <script src="{{ asset('backend/dist/js/tabler.min.js?1684106062') }}" defer></script>
    <script src="{{ asset('backend/dist/js/demo.min.js?1684106062') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
</body>

</html>
