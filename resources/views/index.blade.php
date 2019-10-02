@extends('main')

@section('content')

    <div class="header">
        <h2>Newest Issues</h2>
    </div>

    @foreach ($newest_issues as $issue)
        <div class="box">
            <div class="title">
               <div class="issue-number"><a href="{{ route('board.list', $issue->project->language) }}" class="highlight">{{ $issue->project->language }}</a></div>
                <a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a> {{ $issue->created_at->diffForHumans() }}</div>
            <ul>
                <li>
                    <div class="issue-author">
                        <a href="https://github.com/{{ $issue->user->username }}" title="Visit {{ $issue->user->username|'?' }}'s profile on Github" target="_blank"><img src="{{ $issue->user->avatar }}" alt="user avatar"></a>
                        <p>{{ $issue->user->username }}</p>
                    </div>

                    <div class="issue-body">
                        <div class="issue-number">#{{ $issue->number }}</div>
                        <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                        <div class="issue-descrip">{{ $issue->body }}</div>
                    </div>

                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag"><a href="{{ route('label.list', $label->name) }}" title="See more Issues with this Label">{{ $label->name }}</a></span>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    @endforeach

    <div class="header">
        <h2>Featured Issues By <a href="#" class="highlight">Language</a></h2>
    </div>

    @foreach ($boards as $board)
    <div class="box">
        <div class="title"><a href="{{ route('board.list', $board['language']) }}">{{ $board['language'] }}</a></div>
        <ul>
            @each('issue', $board['issues'], 'issue')
        </ul>
    </div>
    @endforeach

    <div class="header">
        <h2>Featured Issues For <a href="#" class="highlight">Beginners</a> </h2>
    </div>

    @foreach ($second_level_boards as $board)
        <div class="box">
            <div class="title"><a href="{{ route('label.list', $board['label']) }}" title="See more Issues with this Label">{{ $board['label'] }}</a></div>
            <ul>
                @each('issue', $board['issues'], 'issue')
            </ul>
        </div>
    @endforeach

@endsection