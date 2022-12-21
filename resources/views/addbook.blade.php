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
        <div class="column col-lg-4">
            <div class="col">
              <div class="card shadow-sm">
                <div class="card-body">
                    @foreach($book as $book)
                    <div class="d-inline justify-content-between align-items-center">
                        <p><strong>作品名　$book['title']</strong></p>
                        <p><strong>作者名　$book['author']</strong></p>
                    </div>
                    @endforeach
                </div>
              </div>
            </div>
        </div>
        <div class="side col-lg-7">
            <div>
                <div class="d-flex ">
                    <p class=" m-2">
                    <form action="/books" method="POST">
                        <input type="submit" value="申請フォームへ" class="btn btn-success">    
                    </form>
                    </p>
                </div>
                
            </div>
    </div>
</div>

@endsection
