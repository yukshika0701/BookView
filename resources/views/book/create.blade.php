@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">レビュー一覧</h2>
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
                        <p><strong>出版社　{{ $book['publiaher'] }}</strong></p>
                        <p><strong>ジャンル　{{ $book['genre'] }}</strong></p>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="side col-lg-7">
            <p class="text-danger">※は必須項目になります。</p>
            <div>
                <form action="/books" method="POST">
                    @csrf
                    <div class="mb-3 border border-dark rounded">
                        <label for="exampleFormControlTextarea1" class="form-label"><span class="text-danger">※</span>レビュー内容</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="review"></textarea>
                        <input type="hidden" name="book_id" id="book_id" value="{{ $book['id'] }}">
                    </div>
                    <p class="text-right m-2">
                        <button type='submit' class="btn btn-primary">投稿</button>
                    </p>
                </form>                
            </div>
        </div>
    </div>
</div>

@endsection
