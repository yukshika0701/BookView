@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">過去のいいね</h2>
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
