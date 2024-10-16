<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Elgram</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #cacaca, #ffb900);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }
        .welcome-container {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .welcome-container h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-out;
        }
        .btn-custom {
            font-size: 1.2rem;
            padding: 10px 25px;
            margin: 10px;
            border: none;
            border-radius: 50px;
            background-color: #fff;
            color: #0078ff;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #0078ff;
            color: #fff;
            transform: scale(1.05);
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Elgram</h1>

        <div class="mt-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/profile') }}" class="btn btn-custom">Go to Profile</a>
                @else
                <a href="{{ route('login') }}" class="btn btn-custom">Login</a>
                <a href="{{ route('register') }}" class="btn btn-custom">Register</a>
                @endauth
            @endif
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
