<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/">TaskList 2022.06.28</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                
                
                {{-- L14までメッセージ作成ページへのリンク  L14までこれも要るのかな
                <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'nav-link']) !!}</li>
               --}}
                
                {{-- 要修正 L15 C5.3 トップページ ユーザ登録ページへのリンク 
                <li class="nav-item"><a href="#" class="nav-link">Signup</a></li>--}}
                {{-- L15 ログインページへのリンク 
                <li class="nav-item"><a href="#" class="nav-link">Login</a></li>--}}
                
                
                {{-- L15 C6.3 ユーザ登録ページへのリンク 
                <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>--}}
                {{-- ログインページへのリンク 
                <li class="nav-item"><a href="#" class="nav-link">Login</a></li> --}}
                
                {{-- L15 C7.3 2022.07.06..1350TKT--}}
                @if (Auth::check())
                    {{-- ユーザ一覧ページへのリンク 
                    <li class="nav-item"><a href="#" class="nav-link">Users</a></li>
                    <li class="nav-item dropdown">  不要 ユーザー一覧不要のため 2022.07.06 1407TKT--}}
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- ユーザ詳細ページへのリンク --}}
                            <li class="dropdown-item"><a href="#">My profile</a></li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
                
                
                
            </ul>
        </div>
    </nav>
</header>