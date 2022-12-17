@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
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
            <select class="form-control select select-default" data-toggle="select" id="genre" name="genre">
                <option value="1">ファンタジー</option>
                <option value="2">ラブストーリー</option>
                <option value="3">ミステリー</option>
                <option value="4">サスペンス</option>
                <option value="5">コメディ</option>
                <option value="6">アクション</option>
            </select>                
            <span class="input-group-btn">
                <button type="button" class="btn btn-default">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </span>
        </div>
        <section class=" text-center container">
            <div class="row py-lg-4">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h4 class="fw-light">検索結果</h4>
            </div>
        </section>
        <div class="column col-lg-4">
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" height="300" xmlns="http://www.w3.org/2000/svg" ><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">表紙写真</text></svg>
                <div class="card-body">
                    <div class="d-inline justify-content-between align-items-center">
                        <p><strong>作品名　「すずめの戸締り」</strong></p>
                        <p><strong>作者名　新海誠</strong></p>
                        <p><strong>出版社　角川文庫</strong></p>
                        <p><strong>ジャンル　ファンタジー</strong></p>
                    </div>
                    <a href="{{ url('/contribution')}}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">この作品をレビューする</button>
                    </a>
                </div>
              </div>
            </div>
        </div>
        <div class="column col-lg-4">
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" height="300" xmlns="http://www.w3.org/2000/svg" ><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">表紙写真</text></svg>
                <div class="card-body">
                    <div class="d-inline justify-content-between align-items-center">
                        <p><strong>作品名　「君の膵臓を食べたい」</strong></p>
                        <p><strong>作者名　住野よる</strong></p>
                        <p><strong>出版社　双葉社</strong></p>
                        <p><strong>ジャンル　学園</strong></p>
                    </div>
                    <a href="{{ url('/contribution')}}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">この作品をレビューする</button>
                    </a>
                </div>
              </div>
            </div>
        </div>
        <div class="column col-lg-4">
            <div class="col">
              <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" height="300" xmlns="http://www.w3.org/2000/svg" ><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">表紙写真</text></svg>
                <div class="card-body">
                    <div class="d-inline justify-content-between align-items-center">
                        <p><strong>作品名　「真夏の方程式」</strong></p>
                        <p><strong>作者名　東野圭吾</strong></p>
                        <p><strong>出版社　文春文庫</strong></p>
                        <p><strong>ジャンル　ミステリー</strong></p>
                    </div>
                    <a href="{{ url('/contribution')}}">
                        <button type="button" class="btn btn-sm btn-outline-secondary">この作品をレビューする</button>
                    </a>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
