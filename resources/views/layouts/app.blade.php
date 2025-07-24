<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/layout.css') }}">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <div class="wrapper">
        @include('layouts.sidebar')
        <!-- Main Content -->
        <div class="main-content">
            <div class="header">
                <div class="search-container">
                    <input type="text" placeholder="Search here">
                </div>

                <div class="header-icons">
                    <!-- bell icon -->
                    <div class="user-info">
                        <div class="greeting">
                            Hello, <span class="name">Sekar</span>
                        </div>
                        <!-- dropdown icon -->
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>


</body>
</html>
