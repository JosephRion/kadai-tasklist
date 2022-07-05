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
                {{-- L14までメッセージ作成ページへのリンク 
                <li class="nav-item">{!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'nav-link']) !!}</li>
                L14まで--}}
                
                {{-- L15 ユーザ登録ページへのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link">Signup</a></li>
                {{-- L15 ログインページへのリンク --}}
                <li class="nav-item"><a href="#" class="nav-link">Login</a></li>
            </ul>
        </div>
    </nav>
</header>