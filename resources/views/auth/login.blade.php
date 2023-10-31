<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <!-- Sử dụng Bootstrap CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Form Đăng Nhập -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        @csrf <!-- Điều này làm cho Laravel hiểu rằng đây là một form POST và giúp bảo vệ chống CSRF -->

                        <!-- Hiển thị thông báo lỗi nếu có -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                        <!-- Nút chuyển đến trang đăng ký -->
                        <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sử dụng Bootstrap JS và Popper.js từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
