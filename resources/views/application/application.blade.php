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
                    <div class="d-inline justify-content-between align-items-center">
                        <p><strong>作品名　「すずめの戸締り」</strong></p>
                        <p><strong>作者名　新海誠</strong></p>
                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="side col-lg-7">
            <div>
                <div class="d-flex ">
                    <p class=" m-2">
                        <a href="{{ url('approval')}}" class="btn btn-secondary">申請フォームへ
                        </a>
                    </p>
                </div>
                
            </div>
    </div>
</div>

@endsection
