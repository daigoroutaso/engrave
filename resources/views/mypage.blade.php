@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">受験</div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-md">
                                <span>Q1.あなたの好きな食べ物は？</span>
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">リロード</button>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <input id="question-1" type="text" class="form-control @error('question-1') is-invalid @enderror" name="question-1"  autofocus>
                                @error('question-1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">次へ</button>
                            </div>

                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <span>Q1.あなたの好きな食べ物は？</span>
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">リロード</button>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <input id="question-1" type="text" class="form-control @error('question-1') is-invalid @enderror" name="question-1"  autofocus>
                                @error('question-1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">次へ</button>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <span>Q1.あなたの好きな食べ物は？</span>
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">リロード</button>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                                <input id="question-1" type="text" class="form-control @error('question-1') is-invalid @enderror" name="question-1"  autofocus>
                                @error('question-1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">次へ</button>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md">
                            <a class="btn btn-primary" href="/exam_result" role="button">確認画面</a>
                            </div>
                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
