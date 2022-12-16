@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <section class="text-center container">
            <div class="row py-lg-1">
                <div class="col-lg-4 col-md-5 mx-auto">
                <h2 class="fw-light">HOME画面</h2>
            </div>
        </section>
        <div class="container">
            <p>
                <a href="{{ url('/past')}}" class="btn btn-secondary my-2">過去の投稿一覧</a>
                <a href="{{ url('/nice') }}" class="btn btn-secondary my-2">過去のいいね一覧</a>
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
            <!-- <img src="{{ asset('img/322203001170.png') }}" alt=""> -->
        </div>

        <div class="side col-lg-3">
            <div class="border border-dark rounded my-4">
                <p class="text-center">
                    <a href="{{ url('/search')}}" class="btn btn-secondary my-2">検索</a>
                </p>
                <div class="input-group p-2">
                    <input type="text" class="form-control" placeholder="キーワード入力欄">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </span>
                </div> 
                <div class="input-group p-2">  
                    <input type="text" class="form-control" placeholder="ジャンル">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg>
                            </button>
                        </span>
                </div>
            </div>
            <div class="border border-dark rounded mb-4">
                <p class="text-center">
                    <a href="#" class="btn btn-secondary my-2">作品申請</a>
                </p>
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">作品名</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">作者名</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <p class="text-right m-2">
                    <a href="{{ url('/')}}" class="btn btn-success"  onClick="return confirm('申請しますか？')">申請する</a>
                    </p>
                    <p class="text-right m-2">
                    <a href="{{ url('/admin')}}" class="btn btn-danger">ログアウト</a>
                    </p>
                </form>                
            </div>
    </div>
</div>
@endsection
