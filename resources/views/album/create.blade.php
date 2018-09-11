@extends('base_layout.app')

@section('content')

<h3>Create Album Page</h3>
        <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description"  class="form-control"></textarea>

            </div>
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="fileInput" name="cover_image">
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