<html>
<head>
    <link rel="stylesheet" type="text/css" href="/styles/global.css">
    <link href="https://fonts.googleapis.com/css?family=Space+Mono&display=swap" rel="stylesheet">
</head>
<body>
<header>
			<span class="logo">
				<img src="/img/hacktoberfest-logo.svg" width="475" />
			</span>
    <span class="board-title">Issues Board</span>
</header>
<section class="content">
    <div class="box">
        <div class="title">PHP</div>
        <ul>
            @foreach ($php_issues as $issue)
            <li>
                <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                <span class="issue-number">#{{ $issue->number }}</span>
                <div class="issue-descrip">{{ $issue->body }}</div>
                <div class="tags">
                    @foreach ($issue->labels as $label)
                    <span class="tag">{{ $label->name }}</span>
                    @endforeach
                </div>
                <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="box">
        <div class="title">Javascript</div>
        <ul>
            @foreach ($js_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="box">
        <div class="title">Python</div>
        <ul>
            @foreach ($python_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="box">
        <div class="title">TypeScript</div>
        <ul>
            @foreach ($ts_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>


    <div class="box">
        <div class="title">Ruby</div>
        <ul>
            @foreach ($ruby_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="box">
        <div class="title">Go</div>
        <ul>
            @foreach ($go_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>


    <div class="box">
        <div class="title">C++</div>
        <ul>
            @foreach ($cplus_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>


    <div class="box">
        <div class="title">CSS</div>
        <ul>
            @foreach ($css_issues as $issue)
                <li>
                    <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                    <span class="issue-number">#{{ $issue->number }}</span>
                    <div class="issue-descrip">{{ $issue->body }}</div>
                    <div class="tags">
                        @foreach ($issue->labels as $label)
                            <span class="tag">{{ $label->name }}</span>
                        @endforeach
                    </div>
                    <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                </li>
            @endforeach
        </ul>
    </div>

</section>
</body>
</html>