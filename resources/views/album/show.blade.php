@extends('base_layout.app')


@section('content')

    <h2>{{$album->name}}</h2>
    <a href="{{route('album.index')}}" class="btn btn-secondary">Go Back</a>
    <a href="{{route('photo.create',['id'=>$album->id])}}" class="btn btn-primary">Upload Photo to Album</a>
    <a href="{{route('album.destroy',['id'=>$album->id])}}" class="btn btn-danger">Delete Album</a><hr>

    @if(count($album->photos) > 0)
        @php
            $colcount = count($album->photos);
            $i = 1;
        @endphp
        <div id="photos">
            <div class="card text-center">
                <h1> Photos</h1>
            </div><br>
            <div class="row text-center">
                @foreach($album->photos as $photo)
                    @if($i == $colcount)
                        <div class='col-sm-4 end'>
                            <a href="/photo/{{$photo->id}}">
                                <img src="{{$photo->getImage()}}" class="img-thumbnail" style="height: 300px;width: 400px">
                            </a>
                            <br>
                            <h4>{{$photo->title}}</h4>
                            @else
                                <div class='col-sm-4 columns'>
                                    <a href="/photo/{{$photo->id}}">
                                        <img src="{{$photo->getImage()}}" class="img-thumbnail" style="height: 300px;width: 400px" >
                                    </a>
                                    <br>
                                    <h4>{{$photo->title}}</h4>
                                    @endif
                                    @if($i % 3 == 0)
                                </div></div>
                        <div class="row text-center">
                            @else
                        </div>
                    @endif
                    @php $i++; @endphp
                @endforeach
            </div>
        </div>
    @else
        <p>No Photo To Display</p>
    @endif

@endsection