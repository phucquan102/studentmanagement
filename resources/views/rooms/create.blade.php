@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Room</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('rooms.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Room Name:</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" id="room_name" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-primary" id="create-room-button">Create Room</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>
<script type="text/javascript">
   $('#create-room-button').click(function() {
        var roomName = $('#room_name').val();

        if (roomName == '') {
            alert('Room Name không được bỏ trống');
        } else {
            $.ajax({
                url: "{{ route('rooms.store') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    name: roomName
                },
                success: function(response) {
                    // Xử lý phản hồi từ máy chủ nếu cần
                    alert('Phòng đã được tạo thành công');
                    // Nếu bạn muốn làm gì đó sau khi tạo thành công, bạn có thể thực hiện ở đây.
                },
                error: function(xhr) {
                    // Xử lý lỗi nếu có
                    alert('Có lỗi xảy ra khi tạo phòng: ' + xhr.responseText);
                }
            });
        }
    });
</script>
@endsection
