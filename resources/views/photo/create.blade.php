@extends('base_layout.app')

@section('content')

    <h3>Upload Photo Page</h3>
    <form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$album_id}}" name="album_id">
        <div class="form-group">
            <label for="title">Title :</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description"  class="form-control"></textarea>

        </div>
        <div class="form-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="fileInput" name="photo">
                <label class="custom-file-label" for="fileInput">Choose file</label>
            </div>
        </div>

        <div class="form-action">
            <input type="submit" value="Submit" class="btn btn-primary">
            <input type="reset" value="Cancel" class="btn btn-default">
        </div>

    </form>



@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#fileInput').change(function (e) {
                e.preventDefault();
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
                // alert(fileName);
            });
        });
    </script>
@endsection