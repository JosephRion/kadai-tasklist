<!--あっとextends('layouts.app')このviewファイルにあると混乱しやすいので、つけるべきではない。-->

@section('content')

<!-- ここにページ毎のコンテンツを書く -->

<h1>タスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}
    
    
    {{-- メッセージ作成ページへのリンクLesson 13Chapter 12.2 MessagesControllerindexの修正 --}}
    
    {!! link_to_route('tasks.create', '新規タスクを登録してみる', [], ['class' => 'btn btn-primary']) !!}
    

@endsection