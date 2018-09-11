@extends('base_layout.app')

@section('content')
    @if(count($albums) > 0)
        @php
            $colcount = count($albums);
            $i = 1;
        @endphp
        <div id="albums">
            <div class="card text-center">
                <h1> Albums</h1>
            </div><br>
            <div class="row text-center">
                @foreach($albums as $album)
                    @if($i == $colcount)
                        <div class='col-sm-4 end'>
                            <a href="/album/{{$album->id}}">
                                <img src="{{$album->getImage()}}" class="img-thumbnail" style="height: 300px;width: 400px">
                            </a>
                            <br>
                            <h4>{{$album->name}}</h4>
                            @else
                                <div class='col-sm-4 columns'>
                                    <a href="/album/{{$album->id}}">
                                        <img src="{{$album->getImage()}}" class="img-thumbnail" style="height: 300px;width: 400px" >
                                    </a>
                                    <br>
                                    <h4>{{$album->name}}</h4>
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
        <p>No Albums To Display</p>
    @endif

@endsection
