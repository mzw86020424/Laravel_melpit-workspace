@extends('layouts.app_only_content')

@section('title')
    パスワードリセットリクエスト
@endsection

@section('content')
    <div class="container">
        <div class="card" style="width: 500px">
            <div class="card-body">
                <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 24px">パスワードをお忘れの方</div>
                <form method="POST" action="{{ route('password.email')  }}" class="p-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @csrf

                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="email" name="email" id="eamil" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="melpit@example.com">

                        @error('email')
                            <span class="ivalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-block btn-secondary">
                            送信する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection