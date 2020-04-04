@extends('layout.app')

@section('content')
    @foreach ($posts as $post)
    <div class="card text-left mt-1 ">
            <h4 class="card-title px-3 pt-2 mb-0">
             {{$post->title}}
            </h4>
        <div class="card-body">
          <span class="float-right d-flex">
              <button class="btn btn-info btn-sm">edit</button>
              <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                @csrf
                @method('delete')
                <input type="submit" value="delete" class="btn btn-danger btn-sm">
              </form>
          </span>

          <div class="d-flex">
            <img src="{{asset('storage/'.$post->image)}}" width="100px" height="80px">
            <p class="ml-3">{!! $post->description !!}</p>
          </div>
        </div>
      </div>
    @endforeach
@endsection



