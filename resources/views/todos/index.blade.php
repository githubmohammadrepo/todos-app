@extends('layout.app')

@section('content')
    @foreach ($todos as $todo)
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">
              <a href="{{ route('todo',$todo->id)}}">
                {{$todo->title}}
              </a>
          </h4>
          <p class="card-text">{{$todo->description}}</p>
        </div>
      </div>
    @endforeach
@endsection


