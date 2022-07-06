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
    
     {{--L15 C7.3 にて直下の内容に入れ替え--}}
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasklist</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
    
    
@endsection