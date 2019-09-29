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
    <div class="header">
        <h2>Featured Issues By Language</h2>
    </div>

    @foreach ($boards as $board)
    <div class="box">
        <div class="title">{{ $board['language'] }}</div>
        <ul>
            @foreach ($board['issues'] as $issue)
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
    @endforeach

    <div class="header">
        <h2>Featured Issues By Label</h2>
    </div>

    @foreach ($second_level_boards as $board)
        <div class="box">
            <div class="title">{{ $board['label'] }}</div>
            <ul>
                @foreach ($board['issues'] as $issue)
                    <li>
                        <div class="issue-title"><a href="{{ $issue->html_url }}" title="Visit the Issue Page for more Info">{{ $issue->title }}</a></div>
                        <span class="issue-number">#{{ $issue->number }}</span>
                        <div class="issue-descrip">{{ $issue->body }}</div>
                        <div class="tags">
                            <span class="tag">{{ $issue->project->language }}</span>
                        </div>
                        <div class="repo-name"><a href="{{ $issue->project->html_url }}">{{ $issue->project->full_name }}</a></div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</section>
</body>
</html>