@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-4">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h4 class="fw-light">検索結果</h4>
            </div>
        </section>
        @if(!empty($keyword))
        <div class="column album  d-flex justify-content-around">
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
        @else()
        <section class=" text-center container">
            <div class="row py-lg-4">
                <h2 class="fw-light">該当するキーワードはありません。</h2>
            </div>
        </section>
        @endif               
    </div>
</div>
@endsection
