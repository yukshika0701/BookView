@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="card mt-5">
                <div class="card">
                    <div class="card-header">申請フォーム</div>
                    
                    <div class="card-body">
                        <form action="/books/{{$book->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">作品名</label>
                                <div class="col-md-6">
                                    <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $book['title'] }} ">
                                    
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">作者名</label>
                                <div class="col-md-6">
                                    <input id="author" type="author" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $book['author'] }}">
                                    
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="publisher" class="col-md-4 col-form-label text-md-right">出版社</label>
                                
                                <div class="col-md-6">
                                    <input id="publisher" type="publisher" class="form-control @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher') }}" required>
                                    
                                    @error('publisher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="genre" class="col-md-4 col-form-label text-md-right">ジャンル</label>
                                <div class="col-md-6">
                                    <select class="form-control select select-default" data-toggle="select" id="genre" name="genre">
                                        <option value="1">ファンタジー</option>
                                        <option value="2">ラブストーリー</option>
                                        <option value="3">ミステリー</option>
                                        <option value="4">サスペンス</option>
                                        <option value="5">コメディ</option>
                                        <option value="6">アクション</option>
                                        <option value="7">SF</option>
                                        <option value="8">ホラー</option>
                                        <option value="9">古典</option>
                                        <option value="10">児童文学</option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">画像</label>
                                
                                <div class="col-md-6">
                                <input id="image" type="file" name="photo" required>
                                    
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 text-right">
                                    <button type="submit" class="btn btn-success">
                                        承認
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

@endsection
