<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Expenses Tracker')</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: #4a5568;
            min-height: 100vh;
            position: relative;
        }

        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.2);
            padding: 2rem 0;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 0 2rem 2rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
        }

        .sidebar-header h1 {
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .sidebar-nav {
            padding: 0 1rem;
        }

        .nav-item {
            margin-bottom: 0.5rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .nav-link:hover::before {
            opacity: 1;
        }

        .nav-link:hover {
            color: white;
            transform: translateX(8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .nav-icon {
            margin-right: 12px;
            font-size: 1.2rem;
        }

        .main-content {
            margin-left: 280px;
            flex: 1;
            padding: 2rem;
            position: relative;
        }

        .header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 1.5rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .header h2 {
            color: white;
            font-size: 1.8rem;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .container {
            max-width: 1200px;
        }

        /* Button Alignment Fix */
        .btn-group {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-height: 44px;
            white-space: nowrap;
        }

        .btn-primary {
            background: #4299e1;
            color: white;
            box-shadow: 0 4px 15px rgba(66, 153, 225, 0.3);
        }

        .btn-success {
            background: #48bb78;
            color: white;
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.3);
        }

        .btn-danger {
            background: #f56565;
            color: white;
            box-shadow: 0 4px 15px rgba(245, 101, 101, 0.3);
        }

        .btn-secondary {
            background: #718096;
            color: white;
            box-shadow: 0 4px 15px rgba(113, 128, 150, 0.3);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            filter: brightness(1.1);
        }

        .btn:active {
            transform: translateY(0);
        }

        .alert {
            padding: 1rem 1.5rem;
            margin: 20px 0;
            border-radius: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .alert-success {
            background: rgba(72, 187, 120, 0.2);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(72, 187, 120, 0.2);
        }

        .alert-danger {
            background: rgba(245, 101, 101, 0.2);
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(245, 101, 101, 0.2);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: white;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            color: white;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            margin: 20px 0;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
            vertical-align: middle;
        }

        .table th {
            background: rgba(255, 255, 255, 0.1);
            font-weight: 600;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .table tr:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        /* Table button alignment */
        .table .btn-group {
            gap: 5px;
        }

        .table .btn {
            padding: 8px 12px;
            font-size: 12px;
            min-height: 32px;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-right {
            text-align: right;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mb-3 {
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                z-index: 1001;
                background: rgba(255, 255, 255, 0.2);
                color: white;
                border: none;
                padding: 10px;
                border-radius: 8px;
                cursor: pointer;
            }

            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                width: 100%;
                margin: 2px 0;
            }
        }

        .mobile-toggle {
            display: none;
        }
    </style>
</head>
<body>
    <div class="app-layout">
        <!-- Mobile Toggle Button -->
        <button class="mobile-toggle" onclick="toggleSidebar()">☰</button>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <h1>💰 Expenses Tracker</h1>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="{{ route('expenses.index') }}" class="nav-link">
                        <span>Expenses</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <span>Categories</span>
                    </a>
                </div>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                

                @yield('content')
            </div>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>