@extends('base_layout.app')



@section('content')

    <a href="{{route('album.show',['id'=>$photo->Album->id])}}" class="btn btn-primary">Go Back</a>
    <a href="{{route('photo.destroy',['id'=>$photo->id])}}" class="btn btn-danger">Delete Photo</a><br><br>

    <div class="row">
        <div class="col-md-4">
            <img src="{{$photo->getImage()}}" alt="{{$photo->title}}" class="card-img">
        </div>

        <div class="col-md-4">
            <h2>Title :{{$photo->title}}</h2>
            <p>Description :{{$photo->description}}</p>
        </div>

    </div>
@endsection