@extends('main')

@section('content')
    <div class="header">
        <h2>Projects By <strong class="highlight">Stars</strong></h2>

    </div>

    {{ $projects->links() }}
    @foreach ($projects as $project)
        <div class="box">
            <div class="title">
                <span class="project-stars"><svg aria-label="star" class="octicon octicon-star" viewBox="0 0 14 16" version="1.1" width="14" height="16" role="img"><path fill-rule="evenodd" d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74L14 6z"></path></svg>{{ $project->stars }}</span>
                <a href="{{ $project->html_url }}">{{ $project->full_name }}</a>
            </div>
            <ul>
                @each('partials/issue.grouped', $project['issues'], 'issue')
            </ul>
        </div>
    @endforeach

    {{ $projects->links() }}

@endsection
