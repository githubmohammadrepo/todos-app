@extends('layout.app')

@section('content')
    @foreach ($todos as $todo)

    <div class="card text-left" style="background-color:{{$todo->is_complete ? 'lightgreen' : 'darkturquoise;color:dark !important;'}};">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">
              <a href="{{ route('todo',$todo->id)}}" style="color:rgb(153, 124, 194)">
                {{$todo->title}}
              </a>
              <span class="float-right badge badge-primary">{{$todo->id}}</span>
          </h4>
          <p class="card-text">{{$todo->description}}</p>
        </div>
      </div>
    @endforeach
@endsection


