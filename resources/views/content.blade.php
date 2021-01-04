@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <h4>{{$users[0]->name}}さんの名言</h4>
                </div>
                <div class="card-body">
                    <img class="card-img-top" src="/storage/upload/{{$posts[0]->post_id}}.png">
                </div>
                <div class="card-footer sns-area">
                    <like-button-component :post-id="{{ json_encode($posts[0]->post_id) }}" :like-cnt="{{$posts[0]->like_cnt}}"></like-button-component>
                </div>
            <div>            
        </div>
    </div>
</div>
@endsection
