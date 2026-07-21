<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>{{ $title }} | SmartStock UMKM</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#10b981" />

    <link rel="icon" href="{{ asset('icon.png') }}" type="image/x-icon" />

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Tabler CSS -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />

    <!-- Plugin -->
    <link href="{{ asset('dist/libs/selectize/dist/css/selectize.css') }}"
        rel="stylesheet" />

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f1f5f9;
        }

        .navbar-vertical {
            background: linear-gradient(
                180deg,
                #0f172a 0%,
                #1e293b 100%
            ) !important;
        }

        .navbar-brand h3 {
            color: white;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .nav-link {
            border-radius: 10px;
            margin: 4px 8px;
            transition: 0.3s;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.08);
        }

        .nav-link.active {
            background: #10b981 !important;
            color: white !important;
        }

        .page-wrapper,
        .content {
            background: #f8fafc;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.06);
        }

        .btn-primary {
            background: #10b981 !important;
            border: none !important;
        }

        .btn-primary:hover {
            background: #059669 !important;
        }

        .table thead {
            background: #e2e8f0;
        }

        .table {
            border-radius: 12px;
            overflow: hidden;
        }

        .content {
            padding-bottom: 40px;
        }

        .hr-text {
            color: #94a3b8 !important;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
    </style>

    @stack('css')
</head>

<body class="antialiased">

    <!-- Sidebar -->
    @include('layouts._sidebar')

    <div class="page">

        <!-- Navbar -->
        @include('layouts._navbar')

        <div class="content">

            <!-- Main Content -->
            @yield('content')

            <!-- Footer -->
            @include('layouts._footer')

            <!-- Alert -->
            @include('sweetalert::alert')

        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/libs/jquery/dist/jquery.slim.min.js') }}"></script>

    <script src="{{ asset('dist/libs/selectize/dist/js/standalone/selectize.min.js') }}"></script>

    <script src="{{ asset('dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <script src="{{ asset('backend/dist/js/tabler.min.js') }}"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Delete Confirmation -->
    <script>
        function deleteData(id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: true
            })

            swalWithBootstrapButtons.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Data yang dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true

            }).then((result) => {

                if (result.value) {

                    event.preventDefault();

                    document.getElementById(
                        'delete-form-' + id
                    ).submit();

                }
            })
        }
    </script>

    <!-- Selectize -->
    <script>
        $(document).ready(function() {

            $('#select-tags-advanced').selectize({
                maxItems: 15,
                plugins: ['remove_button'],
            });

        });
    </script>

    @stack('js')

</body>

</html>
