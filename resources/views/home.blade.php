@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <section class="text-center container">
            <div class="row py-lg-3">
                <div class="col-lg-4 col-md-5 mx-auto">
                <h2 class="fw-light">HOME画面</h2>
            </div>
        </section>
        <div class="container">
            <p>
                <a href="{{ route('past')}}" class="btn btn-secondary my-2">過去の投稿一覧</a>
                <a href="{{ route('nicehistory') }}" class="btn btn-secondary my-2">過去のいいね一覧</a>
            </p>
        </div>
        <div class="column col-lg-9 album  d-flex justify-content-around">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                @foreach($books as $book)
                <div class="col">
                        <img src="{{ asset('storage/app/'.$book['photo']) }}" height="300" width="240">                               
                    <div class="btn-group">
                        <div class="d-flex justify-content-between  align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('books.show', ['book'=> $book['id']] ) }}">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">レビューを見る</button>
                                </a>
                            </div>
                            <p class="m-2"><strong>{{ $book['title']}}<br>{{ $book['author'] }}</strong></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="side col-lg-3">
            <div class="border border-dark rounded my-1 p-1">
                <p class="text-center">
                    <a href="{{ url('/search')}}" class="btn btn-secondary p-2">作品を検索する</a>
                </p>
                <div class="col-sm-4" style="padding:20px 0; padding-left:0px;">
                <form class="form-inline" action="{{url('search')}}">
                    <div class="form-group">
                    <input type="text" name="keyword" value="" class="form-control" placeholder="キーワード入力欄">
                    <input type="submit" value="検索" class="btn btn-info">
                    </div>
                    </form>
                </div>
            </div>
            <div class="border border-dark rounded mb-4">
                <p class="text-center">
                    <a href="#" class="btn btn-secondary my-2">作品申請</a>
                </p>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputText1" class="form-label">作品名</label>
                        <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">作者名</label>
                        <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp">
                    </div>
                    <p class="text-right m-2">
                    <a href="{{ url('/')}}" class="btn btn-success"  onClick="return confirm('申請しますか？')">申請する</a>
                    </p>
                </form>                
            </div>
    </div>
</div>
@endsection
