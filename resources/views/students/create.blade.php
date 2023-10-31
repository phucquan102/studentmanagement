@extends('layouts.app')
@section('title', 'Create Student')
@section('content')
<div class="container">
    <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data" id="student-form">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="">
        </div>
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="text" class="form-control" name="student_id" id="student_id" placeholder="">
        </div>
        <div class="mb-3">
            <label for="room_id" class="form-label">Room</label>
            <select class="form-select form-select-lg" name="room_id" id="room_id">
                @foreach ($rooms as $room)
                <option value="{{ $room->id }}">{{ $room->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image" accept="image/*">
            </div>
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="subjects" class="form-label">Subjects</label>
                <div>
                    @foreach ($subjects as $subject)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="subject_{{ $subject->id }}" name="subjects[]" value="{{ $subject->id }}" {{ in_array($subject->id, old('subjects', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="subject_{{ $subject->id }}">{{ $subject->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" name="note" id="note" rows="3"></textarea>
        </div>

        <button type="button" class="btn btn-primary" id="button_insert">Submit</button>
    </form>
</div>
<script type="text/javascript">
$('#button_insert').click(function() {
    var name = $('#name').val();
    var student_id = $('#student_id').val();
    var room_id = $('#room_id').val();
    var note = $('#note').val();
    var image = $('#image')[0].files[0]; // Lấy dữ liệu từ input type="file"

    // Xử lý danh sách môn học đã chọn
    var selectedSubjects = [];
    $("input[name='subjects[]']:checked").each(function() {
        selectedSubjects.push($(this).val());
    });

    if (name == '' || student_id == '' || room_id == '' || note == '' || !image || selectedSubjects.length === 0) {
        alert('Không được bỏ trống');
    } else {
        var formData = new FormData();
        formData.append('_token', "{{ csrf_token() }}");
        formData.append('name', name);
        formData.append('student_id', student_id);
        formData.append('room_id', room_id);
        formData.append('note', note);
        formData.append('image', image);

        // Thêm danh sách môn học đã chọn vào formData
        $.each(selectedSubjects, function(index, value) {
            formData.append('subjects[]', value);
        });

        $.ajax({
            url: "{{ route('students.store') }}",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false, // Đảm bảo không xử lý dữ liệu trình duyệt
            success: function(response) {
                // Xử lý phản hồi từ máy chủ nếu cần
                alert('Dữ liệu đã được gửi lên máy chủ');
                // Nếu bạn muốn làm gì đó sau khi gửi thành công, bạn có thể thực hiện ở đây.
            },
            error: function(xhr) {
                // Xử lý lỗi nếu có
                alert('Có lỗi xảy ra khi gửi dữ liệu: ' + xhr.responseText);
            }
        });
    }
});

</script>




@endsection
