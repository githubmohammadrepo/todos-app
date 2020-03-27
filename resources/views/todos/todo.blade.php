@extends('layout.app')

@section('content')
    <div class="card text-left mt-5">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">
                {{$todo->title}}
          </h4>
          <p class="card-text">{{$todo->description}}</p>
        </div>
      </div>
@endsection


