@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <section class="text-center container">
            <div class="row">
                <div class="mx-auto">
                <h4 class="fw-light">レビュー一覧</h2>
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
                            <p><strong>出版社　{{ $book['publisher'] }}</strong></p>
                            <p><strong>ジャンル　@if($book['genre'] == 1) ファンタジー
                                                @elseif($book['genre'] == 2) ラブストーリー
                                                @elseif($book['genre'] == 3) ミステリー
                                                @elseif($book['genre'] == 4) サスペンス
                                                @elseif($book['genre'] == 5) コメディ
                                                @elseif($book['genre'] == 6) アクション
                                                @elseif($book['genre'] == 7) SF
                                                @elseif($book['genre'] == 8) ホラー
                                                @elseif($book['genre'] == 9) 古典
                                                @elseif($book['genre'] == 10) 児童文学
                                                @endif
                            </strong></p>
                        </div>
                        <a href="{{ route('reviews.create', ['book'=> $book['id']]) }}">
                            <button type="button" class="btn btn-sm btn-outline-secondary">この作品をレビューする</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="side col-lg-7">
            <div>
                @foreach($reviews as $review)
                <div class="border border-dark rounded m-3">
                    <form action="" method="post">
                        <div>
                            <label for="exampleInputEmail1" class="form-label m-3"><strong>レビュー内容</strong></label>
                            <div class="d-flex float-right">

                                @if($nice_model->nice_exist(Auth::user()->id,$review->id))
                                <p class="favorite-marke m-2">
                                    <a class="js-nice-toggle loved btn example4" href="" data-reviewid="{{ $review->id }}"><i class="bi bi-heart"></i>いいね</a>
                                    <span class="nicesCount bg-danger text-white rounded p-2">いいね数{{$review->nice_count}}</span>
                                </p>
                                @else
                                <p class="favorite-marke m-2">
                                <a class="js-nice-toggle btn example4" href="" data-reviewid="{{ $review->id }}"><i class="bi bi-heart"></i>いいね</a>
                                    <span class="nicesCount bg-danger text-white rounded p-2">いいね数{{$review->nice_count}}</span>
                                </p>
                                @endif
                                
                            </div>
                            <h6 class="p-2">{{ $review['review']}}</h6>
                        </div>
                        
                    </form>                
                </div>
                @endforeach
            </div>

    </div>
</div>
<style>
.loved  {
  background-color: red !important;
  color: white;
}
</style> 
<script>
$(function () {
    var nice = $('.js-nice-toggle');
    var niceReviewId;
    var page_url = location.href;
    nice.on('click', function () {
        // console.log('あああ');
        var $this = $(this);
        niceReviewId = $this.data('reviewid');
        // console.log(niceReviewId);
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxnice',  //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                'reviewid': niceReviewId //コントローラーに渡すパラメーター
            },
            dataType: 'json',
        })
        
        // Ajaxリクエストが成功した場合
        .done(function (data) {
            console.log(data);
            //lovedクラスを追加
            $this.toggleClass('loved'); 
            
            //.nicesCountの次の要素のhtmlを「data.postnicesCount」の値に書き換える
            $this.next('.nicesCount').html('いいね数' + data.reviewnicesCount); 
            
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
            });
        
        return false;
    });
    });
    
</script>
@endsection
