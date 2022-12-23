@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">申請一覧</h2>
            </div>
        </section>
        <div class="column">
            <div class="d-flex">
                @foreach($books as $book)
                    <div class="col border border-dark rounded text-center m-2">
                        <div class="card-body">
                            <div class="d-inline justify-content-between align-items-center">
                                <p><strong>作品名　{{ $book['title']}}</strong></p>
                                <p><strong>作者名　{{ $book['author']}}</strong></p>
                            </div>
                            <a href="{{ route('books.edit', ['book'=> $book['id']]) }}">
                                <button type="button" class="btn btn-success">申請フォームへ</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
