@extends('admin.layout')

@section('main')
    <div class="card">
        <div class="card-header text-center">Add Category</div>
        <div class="card-body">
            <a class="btn btn-secondary" href="{{ url('/dashboard/categories/create') }}">اضافة تصنيف</a>
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>التصنيف</th>
                        <th>Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><img src="{{ url('/storage/media/categories/' . $category->image) }}" style="width: 150px"></td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <form action="{{ route('dashboard.categories.destroy', [$category]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ url('dashboard/categories/' . $category->id . '/edit') }}"
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
