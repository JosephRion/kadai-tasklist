@extends('layouts.app')

@section('content')
    {{--L15 C7.3 にてこのパートはコメントアウト
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the Tasklist 2022.07.05 2022.07.05でL15C5.3</h1>
             L15 C6.3 ユーザ登録ページへのリンク 
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    --}}
    
     {{--L15 C7.3 にて直下の内容に入れ替え さらにこのパーツを下の内容に書き換え
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasklist</h1>
                ユーザ登録ページへのリンク 
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
   @とendif
     --}}
    
     {{--L15 C9.3 にて 直下の内容に書き換え --}}

@if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    {{--Grabatar 不要
                    <div class="card-body">
                        認証済みユーザのメールアドレスをもとにGravatarを取得して表示 
                        <img class="rounded img-fluid" src="{{ Gravatar::get(Auth::user()->email, ['size' => 500]) }}" alt="">
                    </div>
                    --}}
                </div>
            </aside>
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('tasks.tasks')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection