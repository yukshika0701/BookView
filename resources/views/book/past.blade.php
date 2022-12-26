@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="text-center container">
            <div class="row py-lg-3">
                <div class="mx-auto">
                    <h4 class="fw-light">レビュー一覧</h4>
                </div>
        </section>
        <div class="column">
            @foreach($reviews as $review)
            <div class="border border-dark  m-1">
                <div class="h4 m-2">
                    <p><strong>作品名 {{ $review->book['title'] }}</strong></p>
                </div>
                
                <div class="d-flex">
                @if($id == 1)
                    <p class="m-2">
                        <form action="{{route('reviews.destroy', $review->id)}}" method="post" class="">
                            @csrf
                            @method('delete')
                            <input type="submit" value="削除" class="btn btn-success" onclick='return confirm("削除しますか？");'>
                        </form>
                    </p>
                    
                    <div class="m-2">
                        <span class="nicesCount bg-danger text-white rounded  p-2">いいね数{{$review->nice_count}}</span>                  
                    </div>
                @else

                    <p class="m-2">
                        <a href="{{ route('reviews.edit', [$review->id]) }}" class="btn btn-success">編集</a>
                    </p>
                    <p class="">
                    <form action="{{route('reviews.destroy', $review->id)}}" method="post" class="float-right m-2">
                        @csrf
                        @method('delete')
                        <input type="submit" value="削除" class="btn btn-success" onclick='return confirm("削除しますか？");'>
                    </form>
                    </p>
                    <div class="m-2">
                        <p class="nicesCount bg-danger text-white rounded p-2">いいね数{{$review->nice_count}}</p>
                    </div>
                    
                @endif
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
