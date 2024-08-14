{{-- @foreach ($blog->categories as $item)
    {{ $item->category_id }}
@endforeach --}}

{{-- @foreach ($categories as $category)
    @foreach ($blog->categories as $item)
        @if ($item->category_id == $category->id)
            aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
            {{ $item->category_id }}
            <option value="{{ $category->id }}"> {{ $category->name }} </option>
        @else
        @endif
    @endforeach
@endforeach --}}
@extends('admin.layout')

@section('cssAndJs')
    <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="{{ asset('filepond/filepond.min.js') }}"></script>
@endsection

@section('main')
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red;font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.blogs.update', [$blog]) }}" method="post" enctype="multipart/form-data" id="form_post">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header text-center bg-secondary text-white">
                <h5>Update Blog</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Blog Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $blog->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Blog Content</label>
                    <input class="form-control" name="content" id="content" type="hidden">
                </div>
                <div id="editor">{!! $blog->content !!}
                    </div> <!-- عرض المحتوى بالتنسيق -->
                <div class="mb-3">
                    <label for="resoureceName" class="form-label">Blog Author is :</label>
                    <select class="form-select" name="resoureceName">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $blog->author_id == $author->id ? 'selected' : '' }}>
                                {{ $author->name }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="resoureceName" class="form-label">In Slider?</label>
                    <select class="form-select" name="slider">

                        <option value="0" @if ($blog->slider) selected @endif>No</option>
                        <option value="1" @if ($blog->slider) selected @endif>Yes</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="resoureceName" class="form-label">Categories</label>
                    <select id="categories" name="categories[]" multiple autocomplete="on">
                        @foreach ($categories as $category)
                            @foreach ($blog->categories as $item)
                                @if ($item->category_id == $category->id)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $item->category_id ? 'selected' : '' }}> {{ $category->name }}
                                    </option>
                                @else
                                    <option value="{{ $category->id }}"> {{ $category->name }}
                                    </option>
                                @endif
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Current Image</p>

                        @if ($blog->image == null)
                            No Image
                        @else
                            <img src="{{ url('/storage/media/blogs/' . $blog->image) }}" style="width: 150px">
                        @endif

                        {{-- <img src="{{ url('/storage/media/blogs/' . $blog->image) }}" style="width: 150px"> --}}
                    </div>

                    <div class="col-10">
                        <div class="mb-3">
                            <label for="name" class="form-label">Update Blog Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>

                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-secondary w-50">Update</button>
                </div>
            </div>
        </div>
        </div>
    </form>

    <script>
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '{{ route('dashboard.upload.blogs') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }

        });

        new TomSelect("#categories", {
            maxItems: 6
        });


        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        quill.on('text-change', function() {
            var content = quill.root.innerHTML;
            document.querySelector('#content').value = content;
        });
        
        // عندما يتم تقديم النموذج  
        document.querySelector('form_post').onsubmit = function() {
            // تأكد من تحديث الحقل المخفي بمحتوى محرر Quill  
            var content = quill.root.innerHTML;
            document.querySelector('#content').value = content;
        };
    </script>
@endsection
