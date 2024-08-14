<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/category_with_blog.css') }}">
    <link rel="stylesheet" href="{{ asset('css/heade.css') }}">

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    @yield('cssAndJs')

</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light  navbar-fixed" style="background-color: rgba(195, 190, 189, 0.511)">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/YEP-logo/vector/default.svg') }}" style="width: 80px" alt="شعار" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">

                @foreach ($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link" id="category-{{ $category->id }}"
                            href="{{ route('category.post', $category->id) }}">{{ $category->name }}</a>
                    </li>
                    @endforeach
                    <li class="nav-item">
                        {{ __('auth.password');}}
                    </li>

            </ul>
        </div>

        <form class="d-flex">
            <div class="search-container" style="position: relative;">
                <input type="search" class="form-control me-4" id="search" style="width: 300px;"
                    placeholder="بحث...">
                <div id="searchResults" style="width: 300px"></div>
            </div>

        </form>
    </nav>



    <div class="p-2">
        @yield('main')
    </div>


    <div class="footer_section"  style="background-color: rgba(195, 190, 189, 0.511)">
        <div class="container">
            <div class="row">
                <div class="col-4 left-col">
                    <img src="{{ asset('images/Web Development.jpg') }}" alt="Site Image" class="site-image"
                        style="height: 300px; width:300px">
                    <p class="site-description">Lorem ipsum dolor sit ametx.</p>
                </div>
                <div class="col-4 middle-col"><span>Oldest Blog</span>
                    <hr style="width: 80%">
                    @foreach ($oldest_blog as $item)
                        <div class="article">
                            <div class="image-container">
                                <img src="{{ url('/storage/media/blogs/' . $item->image) }}" alt="Article Image"
                                    class="article-image">
                            </div>
                            <div class="text">
                                <a href="{{ url('news/' . $item->id) }}">
                                    <h4 style="color: rgb(42, 110, 204)">{{ $item->title }}</h4>
                                </a>
                                <p class="date"> {{ $item->created_at }}</p>
                                <p class="author">
                                    {{-- <img src="{{ url('/storage/media/authors/' . $item->authors->image) }}" alt="Author Image"
                                        class="author-avatar"> --}}
                                    <span>{{ $item->authors->name }}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-4 right-col"><span>Latest Blog</span>
                    <hr style="width: 80%">
                    @foreach ($lateast_blog as $item)
                        <div class="article">
                            <div class="image-container">
                                <img src="{{ url('/storage/media/blogs/' . $item->image) }}" alt="Article Image"
                                    class="article-image">
                            </div>
                            <div class="text">
                                <a href="{{ url('news/' . $item->id) }}">
                                    <h4 style="color: rgb(42, 110, 204)">{{ $item->title }}</h4>
                                </a>
                                <p class="date">Published on: {{ $item->created_at }}</p>
                                <p class="author">
                                    {{-- <img src="{{ url('/storage/media/authors/' . $item->authors->image) }}" alt="Author Image"
                                        class="author-avatar"> --}}
                                    <span>{{ $item->authors->name }}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    <div class="footer-content "  style="background-color: rgba(195, 190, 189, 0.995)">
        <div class="row">
            <div class="col-12 col-md-6 footer-left">
                <p>&copy; 2023 YTP. جميع الحقوق محفوظة.</p>
            </div>
            <div class="col-12 col-md-6 footer-right text-right"  >
                <a href="https://www.facebook.com/yourprofile" target="_blank">
                    <i class="fab fa-facebook-square mx-2" aria-hidden="true"></i> 
                </a>
                <a href="https://twitter.com/yourprofile" target="_blank">
                    <i class="fab fa-twitter-square mx-2" aria-hidden="true"></i> 
                </a>
                <a href="https://www.instagram.com/yourprofile" target="_blank" style="text-decoration: none">
                    <i class="fab fa-instagram-square mx-2" aria-hidden="true" style="background-color: rgb(243, 173, 61)"></i>
                </a>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            // تحديد الرابط النشط بناءً على عنوان URL الحالي  
            const currentUrl = window.location.href;
            $('.nav-link').each(function() {
                const linkUrl = $(this).attr('href');
                if (currentUrl.includes(linkUrl)) {
                    $(this).addClass('active'); // إضافة فئة active للرابط النشط  
                }
            });



            $('#search').on('input', function() {
                const query = $(this).val();
                if (query) {
                    $.ajax({
                        url: '/api/submit-value',
                        type: 'POST',
                        data: {
                            query: query,
                            _token: '{{ csrf_token() }}' // تأكد من وضع الـ CSRF token  
                        },
                        success: function(data) {
                            let resultsHtml = '<ul>';
                            if (data.length > 0) {
                                data.forEach(item => {
                                    // تأكد من أن مسار الصورة صحيح  
                                    const imageUrl = item.image ?
                                        `/storage/media/blogs/${item.image}` :
                                        '/images/defultImage.jpg'; //  مسار الصورة الافتراضية   
                                    const detailsUrl = `{{ route('details', ':id') }}`
                                        .replace(':id', item
                                            .id); // تكوين الرابط للديناميكية 
                                    resultsHtml += `  
                            <li class="result"> 
                                <img src="${imageUrl}" alt="${item.title} Image" class="result-image" style="margin-top: 15px">  
                                 <a href="${detailsUrl}" class="result-title " >${item.title}</a> 
                            </li>  
                        `;
                                });
                            } else {
                                resultsHtml += '<li>لا توجد نتائج.</li>';
                            }
                            resultsHtml += '</ul>';
                            $('#searchResults').html(resultsHtml).addClass(
                                'show'); // استخدم الكلاس show  
                        },
                        error: function() {
                            $('#searchResults').html('<p>حدث خطأ.</p>').addClass(
                                'show'); // استخدم الكلاس show  
                        }
                    });
                } else {
                    $('#searchResults').removeClass('show'); // إخفاء النتائج إذا كان الحقل فارغًا  
                }
            });
        });
    </script>



</body>

</html>


</body>

</html>