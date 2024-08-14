@extends('site.layouts.layout')

@section('main')  
    <div style="margin-top: 120px; " class="mx-5">  
        <div class="container">  
            <div class="row">  
                @foreach ($cats as $cat)  
                    <div class="col-12 col-md-4 mb-4"> <!-- تغيير حجم العمود -->  
                        <div class="card"> <!-- بطاقة جديدة -->  
                            <div class="card-header text-center">  
                                <h5 class="card-title">{{ $cat->post->title }}</h5>  
                            </div>  
                            <div class="card-body">  
                                <div class="image-container mb-3">  
                                    <img src="{{ url('/storage/media/blogs/' . $cat->post->image) }}" alt="Article Image" class="card-img-top" style="width: 300px">  
                                </div>  
                                <p class="date">{{ $cat->post->created_at }}</p>  
                                <p class="author">  
                                    <img src="{{ url('/storage/media/authors/' . $cat->post->authors->image) }}" alt="Author Image" class="author-avatar" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 5px;">  
                                    <span>{{ $cat->post->authors->name }}</span>  
                                </p>  
                                <a href="{{ route('details', $cat->post->id) }}" class="btn btn-primary">قراءة المزيد</a>  
                            </div>  
                        </div>  
                    </div>  
                @endforeach  
            </div>  
        </div>  
    </div>  
@endsection  


