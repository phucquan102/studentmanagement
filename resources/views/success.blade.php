<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <!-- Thêm Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iK7l5L70O8KuWIoI9uqF+cSxFnL2wo/s6nFf4E5hFZBau8pCz1N5yIbJ" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Success!</h4>
        <p>You have successfully logged in as {{ auth()->user()->name }}</p>
        @if(auth()->user()->role === 'admin')
            <a class="btn btn-primary" href="/students" role="button">Home</a>
        @elseif(auth()->user()->role === 'student')
            <a class="btn btn-primary" href="/home" role="button">Home</a>
        @endif
    </div>
</div>

<!-- Thêm Bootstrap JS và Popper.js (cần thiết cho Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eUBoSLEeR3A4bPQF1uPR1S9/sr+VX92Ug5I06eTNF5N/6eg1W5zF6qO5tIm1gHo" crossorigin="anonymous"></script>

</body>
</html>
