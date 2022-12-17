@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">管理者HOME画面</h2>
            </div>
        </section>
        <div class="column col-lg-9">
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="50%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">表紙写真</text></svg>
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ url('/review')}}">
                                <button type="button" class="btn btn-sm btn-outline-secondary">レビューを見る</button>
                            </a>
                        </div>
                        <p><strong>「すずめの戸締り」　新海誠</strong></p>
                  </div>
                </div>
              </div>
            </div>
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
                <p class="text-center">
                    <a href="{{ url('application')}}" class="btn btn-secondary my-2">申請一覧</a>
                </p>
            </div>
    </div>
</div>
@endsection
