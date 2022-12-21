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
        <div class="column">
            @foreach($reviews as $review)
            <div class="border border-dark  m-1">
                <div class="h4 m-2">
                    <p><strong>作品名 {{ $review['title'] }}</strong></p>
                </div>
                
            
                <div class="col border border-dark rounded p-1">

                    <div class="d-inline">
                        <p class="h4"><strong>レビュー内容</strong></p>
                        <h4 class="p-2"><strong>{{ $review['review']}}</strong></h4>                              
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
