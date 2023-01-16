<div class="row">
    <div class="card">
        <div class="card-header bg-transparent fw-bold fs-2">Job List</div>
        <div class="card-body">
            @foreach ($jobs as $job)
                <div class="d-flex justify-content-between">
                    <a href="{{ route('home.show', $job->id) }}" class="text-decoration-none link-primary fw-bold fs-5">
                        {{ $job->title }}
                    </a>
                    <span>{{ $job->location }}</span>
                </div>
                <div class="d-flex justify-content-between border-bottom mb-2">
                    <p class="card-text ">
                        {{ $job->company }}
                        <span class="text-success fw-bold"> - {{ $job->type }}</span>
                    </p>
                    <span>{{ $job->created_at }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
