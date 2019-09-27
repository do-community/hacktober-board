<h1>Hacktober-Board</h1>


@foreach ($issues as $issue)
    <div class="issue">
    <h2><a href="/issue/{{ $issue->number }}" title="Visit Issue"> {{ $issue->title }} </a></h2>
    {{ $issue->body }}
        <p class="labels">
        @foreach ($issue->labels as $label)
            <span>{{ $label->name }}</span>
        @endforeach
        </p>
    </div>
@endforeach