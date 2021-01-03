@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$users[0]->name}}さんの名言</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            @csrf
                            <img src="/storage/upload/{{$posts[0]->post_id}}.png">
                            <div class ="col-md">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <like-button-component :post-id="{{ json_encode($posts[0]->post_id) }}" :like-cnt="{{$posts[0]->like_cnt}}"></like-button-component>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
