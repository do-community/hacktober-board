<h1>Hacktober-Board</h1>

<ul class="list">
    @foreach ($issues as $issue)
        <li><h2><a href="/issue/{{ $issue->number }}" title="Visit Issue"> {{ $issue->title }} </a></h2><br>
        {{ $issue->body }}</li>
    @endforeach
</ul>