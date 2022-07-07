@extends('layouts.app')
@section('content')
@if (Auth::check())

@include('tasks.index')

@else
    
    @section('content')
        <div class="center jumbotron">
            <div class="text-center">
                 {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    
@endif

@endsection