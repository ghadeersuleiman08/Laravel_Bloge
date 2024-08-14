{{-- @extends('site.layouts.layout')
@section('main')
    <div class="container" style="padding-bottom: 40px;">
        <div class="row">
            <div class="col-md-12">
                <img src="{{ url('/storage/media/blogs/' . $blog[0]->image) }}" class="img-fluid mt-3" alt="Blog Image">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories:</h5>
                        @foreach ($blog[0]['categories'] as $cat)
                            <span style="background-color: #87CEEB; padding: 5px; border-radius: 10px; margin:5px">
                                <i style="color: red; font-style: italic; font-size: 18px;">
                                    {{ $cat->category->name }}
                                </i>
                            </span>
                        @endforeach
                        <div class="mt-3">
                            <h5 class="card-title">Content:</h5>
                            {!! $blog[0]->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ url('/storage/media/authors/' . $blog[0]['authors']->image) }}"
                            class="img-fluid rounded-circle author-image" alt="Author Image">
                        <h5>{{ $blog[0]['authors']->name }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}



@extends('site.layouts.layout')  
@section('main')  
<div class="container" style="padding-bottom: 40px;">  
  <div class="row">  
   <div class="col-md-12 text-center">  
    <img src="{{ url('/storage/media/blogs/' . $blog[0]->image) }}" class="img-fluid mx-auto d-block" alt="Blog Image" style="width: 100%; height: auto;">  
   </div>  
  </div>  
  <div class="row mt-3">  
   <div class="col-md-4">  
    <div class="card">  
      <div class="card-body text-center">  
       <img src="{{ url('/storage/media/authors/' . $blog[0]['authors']->image) }}" class="img-fluid rounded-circle author-image" alt="Author Image">  
       <h5>{{ $blog[0]['authors']->name }}</h5>  
      </div>  
    </div>  
   </div>  
   <div class="col-md-8">  
    <div class="card">  
      <div class="card-body">  
       <h5 class="card-title">Categories:</h5>  
       @foreach ($blog[0]['categories'] as $cat)  
        <span style="background-color: #87CEEB; padding: 5px; border-radius: 5px; margin:5px">  
          <i style="color: red; font-style: italic; font-size: 18px;"> {{ $cat->category->name }} </i>  
        </span>  
       @endforeach  
       <div class="mt-3">  
        <h5 class="card-title">Content:</h5>  
        {!! $blog[0]->content!!}  
       </div>  
      </div>  
    </div>  
   </div>  
  </div>  
</div>  
@endsection