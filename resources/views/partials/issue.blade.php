<li>
    <div class="issue-author">
        <a href="https://github.com/{{ $issue->user->username }}" title="Visit {{ $issue->user->username }}'s profile on Github" target="_blank"><img src="{{ $issue->user->avatar }}" alt="user avatar"></a>
        <p>{{ $issue->user->username }}</p>
    </div>

    <div class="issue-body">

            <div class="issue-number">#{{ $issue->number }}</div>
            <div class="issue-title">
                <a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info" target="_blank">{{ $issue->title }}</a>
            </div>

        @if ($issue->project_language) <div class="issue-language"><a href="{{ route('board.list', urlencode($issue->project_language)) }}">{{ $issue->project_language }}</a></div> @endif

            <div class="repo-name"><a href="{{ $issue->project->html_url }}" title="Visit the project page on Github" target="_blank">{{ $issue->project->full_name }}</a> {{ $issue->created_at->diffForHumans() }}</div>

            <div class="issue-descrip">{{ $issue->body }}</div>
    </div>

    <div class="tags">
        @foreach ($issue->labels as $label)
            <span class="tag"><a href="{{ route('label.list', urlencode($label->name)) }}" title="See more Issues with this Label">{{ $label->name }}</a></span>
        @endforeach
    </div>

</li>
