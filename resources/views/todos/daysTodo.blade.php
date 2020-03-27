@extends('layout.app')

@section('content')
    @foreach ($dates as $date)
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">
              <a href="{{ route('day',$date['year'].'-'.$date['intmonth'].'-'.$date['day'])}}">
                {{$date['dayofweek']}}

              </a>
          </h4>
          <p class="card-text">
            {{$date['dayofweek']}}
            {{$date['month']}}
            {{$date['day']}}
            {{$date['year']}}</p>
        </div>
      </div>
    @endforeach
@endsection


