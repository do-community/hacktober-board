@extends('main')

@section('content')
    <div class="header_project">
        <h2><strong class="highlight">{{ $project->full_name }}</strong></h2>
        <ul>
            @if($project->language) <li>Language: <strong>{{ $project->language }}</strong></li> @endif
        <li>Stars: <strong>{{ $project->stars }}</strong></li>
        <li>Repository: <a href="{{ $project->html_url }}" title="Visit this project page on Github">{{ $project->html_url }}</a> </li>
        </ul>
    </div>


    {{ $issues->links()}}

    @each('partials/issue.single', $issues, 'issue')

    {{ $issues->links()}}

@endsection
