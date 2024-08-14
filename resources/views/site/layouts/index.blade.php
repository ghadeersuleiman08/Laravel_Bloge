@extends('site.layouts.layout')

@section('main')
    <div class="swiper">
        <div class="swiper-wrapper text-aligin">
            <!-- Slides -->
            @foreach ($slider_blogs as $slider)
                <div class="swiper-slide">
                    <img src="{{ url('/storage/media/blogs/' . $slider->image) }}" style="height: 100vh; width:100%">
                    <span>{{ $slider->title }}</span>
                    <button class="btn btn-success centered"><a class="btn btn-success" href="#">read
                            more</a></button>
                </div>
            @endforeach
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>

    </div>



    <div class="container">
        <div class="row">
            @foreach ($main_category as $item)
                <div class="col-4 right-col"><span
                        style="background-color: #87CEEB; padding: 5px; border-radius: 10px; margin:5px"><i
                            style="color: rgb(238, 25, 25); font-style: italic; font-size: 18px;"></i>{{ $item->name }}</span>
                    @php
                        $counter = 0;
                    @endphp
                    <hr>
                    @foreach ($item->categories as $result)
                        @if ($counter == 0)
                            <div class="article">
                                <div class="image-container">
                                    @if ($result->post->image)
                                        <img src="{{ url('/storage/media/blogs/' . $result->post->image) }}"
                                            alt="Article Image" class="article-imageee">
                                    {{-- @else
                                        <img src="{{ url('/storage/media/blogs/' . $result->post->image) }}"
                                            alt="Article Image" class="article-imageee"> --}}
                                    @endif
                                </div>
                                <div class="text">
                                    <a href="{{ url('news/' . $result->post->id) }}">
                                        <h4>{{ $result->post->title }}</h4>
                                    </a>
                                    <p class="date">{{ $result->post->created_at }}</p>
                                    <p class="author">
                                        <img src="{{ url('/storage/media/authors/' . $result->post->authors->image) }}"
                                            alt="Author Image" class="author-avatar">
                                        <span>{{ $result->post->authors->name }}</span>
                                    </p>
                                </div>
                            </div>
                        @else
                            <div class="article">
                                <div class="image-container">
                                    <img src="{{ url('/storage/media/blogs/' . $result->post->image) }}"
                                        alt="Article Image" class="article-image">
                                </div>
                                <div class="text">
                                    <h4>{{ $result->post->title }}</h4>
                                    <p class="date">Published on: {{ $result->post->created_at }}</p>
                                    <p class="author">
                                        <img src="{{ url('/storage/media/authors/' . $result->post->authors->image) }}"
                                            alt="Author Image" class="author-avatar">
                                        <span>{{ $result->post->authors->name }}</span>
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @php
                    $counter++;
                @endphp
            @endforeach
        </div>
    </div>



    <script>
        const swiper = new Swiper('.swiper', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

        });
    </script>
@endsection
