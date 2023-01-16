@extends('layouts.app')
@section('content')
    <div class="container">
        <span><i class="bi bi-arrow-left-circle"></i></span>
        <a href="{{ route('home.index') }}" class="link-primary text-decoration-none fw-bold fs-5">Back</a>
        <div class="card mt-3">
            <div class="card-header bg-transparent fw-bold fs-3">
                <span class="text-muted fs-6">{{ $job->type }}</span>
                <span class="text-muted fs-6"> / {{ $job->location }}</span>
                <div>{{ $job->title }}</div>
            </div>
            <div class="card-body">
                {{ Str::of($job->description)->toHtmlString() }}
            </div>
        </div>
    @endsection
