<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="card shadow p-4 text-center" style="width: 350px;">
        <h2 class="mb-4 fw-bold">Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger p-1">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success p-1">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">Username (Email)</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3 text-start">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ url('/') }}" class="text-decoration-none">Kembali</a>
                <button type="submit" class="btn btn-outline-dark fw-bold px-4">Login</button>
            </div>
        </form>
    </div>

</body>
</html>
