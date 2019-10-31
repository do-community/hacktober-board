@extends('main')

@section('content')
    <div class="header">
        <h2>Issues Labeled as <strong class="highlight">{{ $label->name }}</strong> </h2>
    </div>

    {{ $issues->links()}}

    @each('partials/issue.single', $issues, 'issue')

    {{ $issues->links()}}

@endsection
