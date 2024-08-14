@extends('admin.layout')

@section('cssAndJs')
    <link rel="stylesheet" href="{{asset('filepond/filepond.min.css')}}">

    <script src="{{asset('filepond/filepond.min.js')}}"></script>
@endsection

@section('main')
    @if($errors->any())
        <ol>
            @foreach($errors->all() as $error)
                <li style="color: red;font-size: 28px">{{$error}}</li>
            @endforeach
        </ol>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <form action="{{route('dashboard.authors.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header text-center bg-secondary text-white">
                <h5>Add New Author</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">اسم الشركة </label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">تفاصيل</label>
                    <textarea class="form-control" name="des" id="des" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">صورة</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <div class="mb-3 text-center">
                <button type="submit" class="btn btn-secondary w-50">Send</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server: {
                url: '{{route('dashboard.upload')}}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }

        });
    </script>
@endsection
