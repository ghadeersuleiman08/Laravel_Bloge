@extends('admin.layout')

@section('main')
    <div class="card">
        <div class="card-header text-center">اضافة شركة</div>
        <div class="card-body">
            <a class="btn btn-secondary" href="{{ url('/dashboard/authors/create') }}">اضافة  الشركة </a>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>اسم الشركة</th>
                        <th>الوصف</th>
                        <th>Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td><img src="{{ url('/storage/media/authors/' . $author->image) }}"  style="width: 95px"></td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->description }}</td>
                            <td>
                                <form action="{{ route('dashboard.authors.destroy', [$author]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ url('dashboard/authors/' . $author->id . '/edit') }}"
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
            // config options
        });
    </script>
@endsection
