@extends('layouts.app')
@section('content')

{{-- キャッチコピー、サービス概要、登録画面遷移ボタン--}}
<div class="jumbotron">
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="main-title">あなたの人生の名言を偉人風に刻もう</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="{{ asset('slide1.png') }}" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('slide2.png') }}" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="{{ asset('slide3.png') }}" alt="Third slide">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <h4 class="sub-title">キーワードと名前を入力すると偉人の名言風にカードが作成できるサービスです</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a class="btn btn-primary btn-lg btn-block " href="/entry" role="button">名言を刻む</a>
            </div>
        </div>
    </div>
</div>        

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row justify-content-center my-4">
                <p class="h3">最近の名言</p>
            </div>
            
            @foreach ($posts as $post)
                @if ( $loop->first )
                    <div class="row justify-content-center">
                @elseif( $loop->last)
                @elseif ( $loop->index % 4 === 0)
                    </div>
                    <div class="row justify-content-center">
                @endif
                <div class="col-md-12 mb-5">
                    <a href="/content/{{$post->post_id}}">
                        <div class="card">
                            <img class="card-img-top" src="/storage/upload/{{$post->post_id}}.png" alt="Card image cap">
                            <div class="card-body">
                                <p>{{Common::JpnElapsedTime($post->created_at)}}</p>
                                <p>{{$post->like_cnt}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @if ($loop->last)
                    </div>
                @endif
            @endforeach

            <div class="row justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>
--}}

@endsection
