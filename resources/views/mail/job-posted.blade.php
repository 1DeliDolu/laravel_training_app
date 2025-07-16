<h2>Job posted: {{ $job->title }}</h2>

<p>
    🎉 Congrats! Your job <strong>{{ $job->title }}</strong> is now live.
</p>

<p>
    👉 <a href="{{ route('jobs.show', $job->id) }}">Click here to view your listing</a>
</p>
