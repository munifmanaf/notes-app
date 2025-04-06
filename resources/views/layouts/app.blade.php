<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Notes App</title>
    <link rel="stylesheet" href="{{ asset('css/app.js') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
        }
        th, td {
            background-color: #96D4D4;
        }

        .welcome-banner {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-left: 5px solid #4e73df;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Example in your layout file (resources/views/layouts/app.blade.php) -->
    
    <div class="container py-4">

        @if(session()->has('user'))
        <div class="text-center mb-5 p-4 bg-light rounded">
            <h1 class="display-4">Welcome, {{ session('user.name') }}!</h1>
            <p class="lead">You're logged in as {{ session('user.email') }}</p>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#notesTable').DataTable();
        });
    </script>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>