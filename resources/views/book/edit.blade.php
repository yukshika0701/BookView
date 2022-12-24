@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">編集フォーム</h2>
            </div>
        </section>
        <div class="column col-lg-4">
            <div class="col">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/app/'.$book['photo']) }}" height="300" width="260">                               
                    <div class="card-body">
                        <div class="d-inline justify-content-between align-items-center">
                            <p><strong>作品名　{{ $book['title'] }}</strong></p>
                            <p><strong>作者名　{{ $book['author'] }}</strong></p>
                            <p><strong>出版社　{{ $book['publisher'] }}</strong></p>
                            <p><strong>ジャンル　@if($book['genre'] == 1) ファンタジー
                                                @elseif($book['genre'] == 2) ラブストーリー
                                                @elseif($book['genre'] == 3) ミステリー
                                                @elseif($book['genre'] == 4) サスペンス
                                                @elseif($book['genre'] == 5) コメディ
                                                @elseif($book['genre'] == 6) アクション
                                                @elseif($book['genre'] == 7) SF
                                                @elseif($book['genre'] == 8) ホラー
                                                @elseif($book['genre'] == 9) 古典
                                                @elseif($book['genre'] == 10) 児童文学
                                                @endif</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>                    
        <div class="side col-lg-7">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
                @endforeach
            </div>
            @endif
            <div class="border border-dark rounded">
                <form action="/reviews/{{$review->id}}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 border border-dark rounded">
                        <label for="exampleFormControlTextarea1" class="form-label">レビュー内容</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="review">{{ ($review['review']) }}</textarea>
                    </div>
                    <p class="text-right m-2">
                        <button type='submit' class="btn btn-primary">編集</button>
                    </p>
                </form>     
            </div>
    </div>
</div>

@endsection
