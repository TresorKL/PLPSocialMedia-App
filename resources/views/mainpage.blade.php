<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Main page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


    <style>
        /* html,
        body {

            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
        } */
    </style>

</head>

<body>
    {{-- <x-nav /> --}}

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/main">PLP Social Media App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active m-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPostModal">New
                        Post</button>
                </li>
                <li class="nav-item active m-2">
                    <form action="/myposts" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary" data-toggle="modal">My
                            Posts</button>
                    </form>
                </li>
                <li class="nav-item active m-2">
                    <form action="/logout" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>

                </li>
            </ul>
        </div>
    </nav>

    <!-- New Post Modal -->
    <div class="modal fade" id="newPostModal" tabindex="-1" role="dialog" aria-labelledby="newPostModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPostModalLabel">New Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addpost" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            {{-- <input type="text" class="form-control" id="caption" placeholder="Enter caption"> --}}
                            <textarea name="caption" type="text" class="form-control" id="caption" placeholder="Say something" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- @if (Session::has('posts'))
        <p>{{ Session::get('posts') }}</p>
    @endif --}}



    <div class="container align-items-center ">


        @foreach (Session::get('posts') as $post)
            @if ($post->image != null)
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            <h4 class="card-title text-primary">Posted by {{ $post->posted_by }}</h4>
                            <p class="card-title">{{ $post->caption }}</p>
                            <img src="{{ URL::to('/') }}/storage/images/{{ $post->image }}" class="card-img-top"
                                alt="{{ $post->image }}">
                            <div class="card-body">
                                <div class="row">
                                    <form action="/comments/{{ $post->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary m-2">
                                            Comment {{ $post->comment()->count() }}
                                        </button>
                                    </form>
                                    <form action="/like/{{ $post->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary m-2">
                                            Like {{ $post->likes }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-8 ">
                        <div class="card mb-4 ">
                            <h4 class="card-title text-primary">Posted by {{ $post->posted_by }}</h4>
                            <p class="card-title">{{ $post->caption }}</p>
                            {{-- <img src="https://picsum.photos/id/3/600/400" class="card-img-top" alt="..."> --}}
                            <div class="card-body">
                                <div class="row">
                                    <form action="/comments/{{ $post->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary m-2">
                                            Comment {{ $post->comment()->count() }}
                                        </button>
                                    </form>
                                    <form action="/like/{{ $post->id }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary m-2">
                                            Like {{ $post->likes }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach



    </div>
</body>

</html>
