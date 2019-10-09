@extends('main')

@section('content')
    <div class="header">
        <h2>Projects By <strong class="highlight">Stars</strong></h2>

    </div>

    {{ $projects->links() }}
    @foreach ($projects as $project)
        <div class="box">
            <div class="title">
                <span class="project-stars">{{ $project->stars }}*</span>
                <a href="{{ $project->html_url }}">{{ $project->full_name }}</a> {{ $project->updated_at->diffForHumans() }}
            </div>
            <ul>
                @each('issue', $project['issues'], 'issue')
            </ul>
        </div>
    @endforeach

    {{ $projects->links() }}

@endsection
