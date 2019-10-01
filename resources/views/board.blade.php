@extends('main')

@section('content')
    <div class="header">
        <h2>Featured Issues in the <strong class="highlight">{{ $name }}</strong> Board</h2>
    </div>


            @foreach ($issues as $issue)
        <div class="box">
            <div class="title">
                <span class="issue-number">#{{ $issue->number }}</span>
                <a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
            <ul>
            <li>
                <div class="issue-author">
                    <a href="https://github.com/{{ $issue->user->username }}" title="Visit {{ $issue->user->username }}'s profile on Github" target="_blank"><img src="{{ $issue->user->avatar }}" alt="user avatar"></a>
                    <p>{{ $issue->user->username }}</p>
                </div>

                <div class="issue-body">
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                     <div class="issue-descrip">{{ $issue->body }}</div>
                </div>

                <div class="tags">
                    @foreach ($issue->labels as $label)
                    <span class="tag">{{ $label->name }}</span>
                    @endforeach
                </div>
                <div class="repo-name"></div>
            </li>
            </ul>
        </div>
            @endforeach
    

    {{ $issues->links() }}

@endsection