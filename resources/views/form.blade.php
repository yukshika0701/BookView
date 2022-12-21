@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class=" text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                <h2 class="fw-light">申請フォーム</h2>
            </div>
        </section>
        <div class="column col-lg-4">
            <div class="col">
              <div class="card shadow-sm">
                  <div class="card-body">
                      <div class="d-inline justify-content-between align-items-center">
                          <p><strong>作品名　$book['title']</strong></p>
                          <p><strong>作者名　$book['author']</strong></p>
                            <form action="/books/{{$book->id}}" method="POST">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label"><strong>出版社</strong></label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label"><strong>ジャンル</strong></label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <img src="{{ asset('storage/app/'.$book['photo']) }}" height="300" width="240">                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="side col-lg-7">
            <div>
                <div class="row">
                    <p class=" m-2">
                    <form action="/books" method="POST">
                        <input type="submit" value="承認" class="btn btn-success">    
                    </form>
                    </p>
                </div>
                
            </div>
    </div>
</div>

@endsection
