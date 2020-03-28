@extends('layout.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Create Post Form -->
    <div class="card text-left">
        <img class="card-img-top" src="holder.js/100px180/" alt="">
        <div class="card-header">
            <h4 class="card-title">
                newTodo
            </h4>
        </div>
        <div class="card-body">

        <form action="{{route('storeTodo')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="title">Title Todo</label>
            <input type="text" name="title" value="{{old('title')}}" id="title" class="form-control" placeholder="title todo..." aria-describedby="title">
              <small id="title" class="text-muted">title todo</small>
            </div>

            <div class="form-group">
              <label for="description">Description Todo</label>
              <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
              <label for="date">Select Date</label>
              <input type="datetime"
                class="form-control" name="created_at" id="date" value="{{now()}}" aria-describedby="date" placeholder="date">
              <small id="date" class="form-text text-muted">date</small>
            </div>
            <button type="submit" class="btn btn-primary">save todo</button>
        </form>
        </div>
      </div>
@endsection


