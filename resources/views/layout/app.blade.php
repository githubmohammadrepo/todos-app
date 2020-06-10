<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
        @stack('css')
    <title>todos</title>
</head>
<body class="bg-dark">

    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('allTodos') }}">Todos</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                    <a class="nav-link" href="{{route('daysTodos')}}">daysTodo <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('newtodo')}}">newTodo <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('newtodo')}}">newDay</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('remainedTodos')}}">remainedTodo</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">file operation</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{route('posts.create')}}">new post</a>
                            <a class="dropdown-item" href="{{route('posts.index')}}">all posts</a>
                        </div>
                    </li>
                </ul>

            </div>
        </nav>

        @if (session()->has('success')) {
            <div class="alert alert-success" role="alert">
                <strong>{{ session()->get('success')}}</strong>
            </div>
        }
        @endif

        @if (session()->has('danger')) {
            <div class="alert alert-danger" role="alert">
                <strong>{{ session()->get('danger')}}</strong>
            </div>
        }
        @endif


        @yield('content')
    </div>

    <script src="/js/app.js"></script>
    @yield('script')
    <script>
            @stack('js')
    </script>
</body>
</html>
