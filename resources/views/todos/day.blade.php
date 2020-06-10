@extends('layout.app')

@section('content')
    @foreach ($todos as $key => $todo)
<div class="card text-left mt-1 text-info" style="background-color:{{$todo->is_complete ? 'darkslateblue' :  'lightgoldenrodyellow '}} !important;'">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-body">
          <h4 class="card-title">
              <span class="badge badge-success">{{$key+1}}</span>
              <a href="{{ route('todo',$todo->id)}}">
                {{$todo->title}}
              </a>
              <span class="float-right d-flex">
                <a href="{{route('completeTodo',$todo->id)}}" class="btn btn-sm {{$todo->is_complete ? 'bg-warning' :  'bg-primary text-light'}}" >
                    {{$todo->is_complete ? 'uncomplete' :  'complete'}}
                </a>
                  <a href="{{route('showEditTodo',$todo->id)}}" class="btn btn-sm btn-info" >edit</a>
                  <a href="{{route('todo-delete',$todo->id)}}" class="btn btn-sm btn-danger">delete</a>
              </span>
          </h4>
          <p class="card-text">{{$todo->description}}</p>
        </div>
        <div class="card-footer">
            <span class="float-left">created: {{$todo->created_at}}</span>
            <span class="float-right">updated: {{$todo->updated_at}}</span>
        </div>
      </div>
    @endforeach
@endsection


