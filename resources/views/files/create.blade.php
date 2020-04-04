@extends('layout.app')

@section('css')
@trixassets

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
@endsection
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
        <div class="card-header">
            <h4 class="card-title">
                newTodo
            </h4>
        </div>
        <div class="card-body">

        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="title">Title Todo</label>
            <input type="text" name="title" value="{{old('title')}}" id="title" class="form-control" placeholder="title todo..." aria-describedby="title">
              <small id="title" class="text-muted">title todo</small>
            </div>

            <div class="form-group">
              <label for="description">description Todo</label>
            <input type="text" name="description" value="{{old('description')}}" id="description" class="form-control" placeholder="description todo..." aria-describedby="description">
            <trix-editor input="description"></trix-editor>
              <small id="description" class="text-muted">description todo</small>
            </div>
            <div class="form-group">
              <label for="image">image Todo</label>
              <input type="file" name="image" value="{{old('image')}}" id="image" class="form-control" placeholder="image todo..." aria-describedby="image">
            </div>


            <button type="submit" class="btn btn-primary">save posts</button>


        </form>
        </div>
      </div>




@endsection


@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>

@endsection

