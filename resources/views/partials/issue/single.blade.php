<div class="box">
    <div class="title">
        @if ($issue->project_language)
            <div class="issue-number">
                <a href="{{ route('issues.index', ['filter' => ['language' => $issue->project_language]]) }}"
                   class="highlight">{{ $issue->project_language }}</a>
            </div>
        @endif
        <a href="{{ route('projects.show', [$issue->project->full_name]) }}">{{ $issue->project->full_name }}</a> {{ $issue->created_at->diffForHumans() }}
    </div>
    <ul>
        <li>
            <div class="issue-author">
                <a href="https://github.com/{{ $issue->user->username }}"
                   title="Visit {{ $issue->user->username|'?' }}'s profile on Github" target="_blank"><img
                        src="{{ $issue->user->avatar }}" alt="user avatar"></a>
                <p>{{ $issue->user->username }}</p>
            </div>

            <div class="issue-body @if ($issue->closed) closed @endif">
                <div class="issue-number">#{{ $issue->number }}</div>
                <div class="issue-title">
                    <a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">
                        @if ($issue->closed)[CLOSED] @endif{{ $issue->title }}
                    </a>
                </div>
                <div class="issue-descrip">{{ $issue->body }}</div>
            </div>

            <div class="tags">
                @foreach ($issue->labels as $label)
                    <span class="tag"><a
                            href="{{ route('labels.show', [$label->slug]) }}"
                            title="See more Issues with this Label">{{ $label->name }}</a></span>
                @endforeach
            </div>
        </li>
    </ul>
</div>
