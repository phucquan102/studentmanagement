@extends('layouts.app')
@section('title', 'Create Subject')
@section('content')
<div class="container">
    <h2>Create Subject</h2>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="create-subject-form" action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Subject Name</label>
            <input type="text" class="form-control" id="subject_name" name="name" value="{{ old('name') }}">
        </div>
        <button type="button" id="create-subject-button" class="btn btn-primary">Create</button>
    </form>
</div>
<script type="text/javascript">
    $('#create-subject-button').click(function() {
        var subjectName = $('#subject_name').val();

        if (subjectName == '') {
            alert('Subject Name không được bỏ trống');
        } else {
            $.ajax({
                url: "{{ route('subjects.store') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: subjectName
                },
                success: function(response) {
                    // Xử lý phản hồi từ máy chủ nếu cần
                    alert('Môn học đã được tạo thành công');
                    // Nếu bạn muốn làm gì đó sau khi tạo thành công, bạn có thể thực hiện ở đây.
                },
                error: function(xhr) {
                    // Xử lý lỗi nếu có
                    alert('Có lỗi xảy ra khi tạo môn học: ' + xhr.responseText);
                }
            });
        }
    });
</script>
@endsection
