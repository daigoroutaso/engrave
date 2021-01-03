@extends('layouts.app')
@section('content')

{{-- キャッチコピー、サービス概要、登録画面遷移ボタン--}}
<div class="jumbotron">
    <h1>あなたの人生の名言を偉人風に彩ろう</h1>
    <h2>キーワードと名前を入力すると偉人の名言風カードが作れるサービスです</h2>
    TODO:イラストが欲しい
    <a class="btn btn-primary btn-block" href="/entry" role="button">作成する</a>
</div>        

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
{{--
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
--}}
        {{--
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
        --}}
        </div>
    </div>
</div>

@endsection
