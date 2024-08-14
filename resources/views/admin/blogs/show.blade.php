<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Post - Start Bootstrap Template</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">Welcome to Blog {{ $blog->title }}</h1>
                        <div class="text-muted fst-italic mb-2">Posted on {{ $blog->created_at }}</div>
                    </header>

                    <div class="text-muted fst-italic mb-2">Image Of Blog </div>
                    <figure class="mb-4"><img src="{{ url('/storage/media/blogs/' . $blog->image) }}"
                            style="width: 600px"></figure>
                    <div class="card mb-4">
                        <div class="card-header">Blog Content</div>
                        <div class="card-body">
                            <li><a>{{ $blog->content }}</a></li>
                        </div>
                </article>

            </div>


            <!-- Author Bio-->
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Author Bio</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                @if (isset($author_data->description))
                                    <li><a>{{ $author_data->description }}</a></li>
                                @else
                                    <li><a>No Description</a></li>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Author Image-->
                <div class="card mb-4">
                    <div class="card-header">Author Image</div>
                    <div class="card-body">
                        <div class="row">
                            @if (isset($author_data->description))
                                <div class="card-body"><img
                                        src="{{ url('/storage/media/authors/' . $author_data->image) }}"
                                        style="width: 300px"></div>
                            @else
                                <li><a>No Author Image</a></li>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Author Name-->
                <div class="card mb-4">
                    <div class="card-header">Author Name</div>
                    <div class="card-body">
                        <div class="row">
                            @if (isset($author_data->name))
                                <div class="card-body">{{ $author_data->name }}</div>
                            @else
                                <li><a>No Author Name</a></li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



</body>

</html>
