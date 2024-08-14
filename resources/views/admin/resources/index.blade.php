@extends('admin.layout')

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
    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center">اضافة منتجات </div>
        <div class="card-body">
            <a class="btn btn-secondary" href="{{ url('/dashboard/blogs/create') }}">اضافة منتجات </a>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>المنتج </th>
                        <th>الشركة المنتجة</th>
                        <th>Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($Requests_with_authors as $Request_with_author)
                        <tr>
                            {{-- <td></td> --}}
                            <td>
                                @if ($blog_with_author->image == null)
                                    No Image
                                @else
                                    <img src="{{ url('/storage/media/blogs/' . $Request_with_author->image) }}" style="width: 150px">
                                @endif

                            </td>
                            <td>{{ $Request_with_author->title }}</td>
                            <td>
                                    {{ $Request_with_author->authors->name }}
                            </td>
                            <td>
                                <form action="{{ route('dashboard.blogs.destroy', [$Request_with_author->id]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ route('dashboard.blogs.show', $Request_with_author->id) }}" class="btn btn-success mx-2">
                                        <i class="fa-solid fa-eye mx-2"></i>
                                    </a>

                                    <a href="{{ url('dashboard//' . $Request_with_author->id . '/edit') }}"
                                        class="btn btn-primary mx-2">
                                        <i class="fa-solid fa-edit mx-2"></i>
                                    </a>


                                    <button type="submit" class="btn btn-danger mx-2"><i
                                            class="fa-solid fa-trash mx-2"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>

        </div>
    </div>



    <script>
        let table = new DataTable('#myTable', {
            "pageLength": 4
        });
    </script>
@endsection

