@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav class="card mt-5">
                <div class="card">
                    <div class="card-header">{{ __('新規登録') }}</div>
                    
                    <div class="card-body">
                        <p class="text-danger">※は必須項目になります。</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>{{ __('ニックネーム') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>{{ __('性別') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control select select-default" data-toggle="select" id="gender" name="gender">
                                        <option value="0">男性</option>
                                        <option value="1">女性</option>
                                        <option value="2">その他</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>{{ __('年代') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control select select-default" data-toggle="select" id="age" name="age">
                                        <option value="0">10代</option>
                                        <option value="1">20代</option>
                                        <option value="2">30代</option>
                                        <option value="3">40代</option>
                                        <option value="4">50代</option>
                                        <option value="5">60代</option>
                                        <option value="6">70代</option>
                                        <option value="7">80代</option>
                                        <option value="8">90代</option>
                                        <option value="9">100代</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>{{ __('メールアドレス') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>{{ __('パスワード') }}</label>
                                
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><span class="text-danger">※</span>{{ __('パスワード確認') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation">

                                    @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('新規登録') }}
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
    