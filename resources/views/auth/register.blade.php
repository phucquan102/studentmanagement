<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Sử dụng Bootstrap CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Register</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('register') }}" method="post">
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
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="register_email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="register_email" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="register_password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="register_password" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="cfpass" required>
                        </div>
                        <div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">Role</label>

    <div class="col-md-6">
        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
            <option value="admin">Admin</option>
            <option value="student">Student</option>
        </select>

        @error('role')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


                        <button type="submit" class="btn btn-success">Register</button>
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
