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
            url: '/',  //routeの記述
            type: 'GET', //受け取り方法の記述（GETもある）
            data: {
                'reviewid': niceReviewId //コントローラーに渡すパラメーター
            },
            dataType: 'json',
        })
        
        // Ajaxリクエストが成功した場合
        .done(function (data) {
            //lovedクラスを追加
            $this.toggleClass('loved'); 
            
            //.nicesCountの次の要素のhtmlを「data.postnicesCount」の値に書き換える
            $this.next('.nicesCount').html(data.reviewnicesCount); 
            
        })
        // Ajaxリクエストが失敗した場合
        .fail(function (data, xhr, err) {
            //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
            //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });
    