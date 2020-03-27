@extends('layout.app')

@section('content')

<!-- Create Post Form -->
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-header">
            <h4 class="card-title">
                editTodo
            </h4>
        </div>
        <div class="card-body">

        <form action="{{route('editTodo',$todo->id)}}" method="post">
            @csrf
            <div class="form-group">
              <label for="title">Title Todo</label>
            <input type="hidden" name="id" value="{{$todo->id}}">
            <input type="text" name="title" value="{{old('title')  ?? $todo->title}}" id="title" class="form-control" placeholder="title todo..." aria-describedby="title">
              <small id="title" class="text-muted">title todo</small>
            </div>

            <div class="form-group">
              <label for="description">Description Todo</label>
              <textarea class="form-control" name="description" id="description" rows="3">{{old('description')  ?? $todo->description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">save todo</button>
        </form>
        </div>
      </div>
@endsection


