@extends('layouts.app')

@section('content')
    <div class="container">

        <form method="GET" action="{{ route('home.index') }}">
            @csrf
            <div class="d-flex align-items-center justify-content-center">
                <div class="d-flex flex-column bd-highlight mx-3 w-25">
                    <label for="description" class="form-label fw-bold">Job Description</label>
                    <div class="d-flex">
                        <div class="input-group mb-3">
                            <span class="input-group-text">@</span>
                            <input type="text" name="description" id="description"
                                class="form-control  @error('description') is-invalid @enderror""
                                placeholder="Filter by title, companies" aria-label="Description" autocomplete="description"
                                aria-describedby="description">
                        </div>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="d-flex flex-column bd-highlight w-25">
                    <label for="location" class="form-label fw-bold">Location</label>
                    <div class="d-flex">
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-compass"></i></span>
                            <input type="text" name="location" id="location"
                                class="form-control @error('location') is-invalid @enderror""
                                placeholder="Filter by city,state,zip code or country" aria-label="Description"
                                autocomplete="location" aria-describedby="location">
                        </div>

                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-check mx-3">
                    <input class="form-check-input" type="checkbox" onchange=onChangeType(this) name="type"
                        id="type">
                    <label class="form-check-label fw-bold" for="flexCheckDefault">
                        Full Time Only
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">
                    Search
                </button>
            </div>
        </form>
        @include('pages.components.filter')
        @include('pages.components.list_jobs')
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        function onChangeType(e) {
            e.value = e.checked;

        }
    </script>
@endsection
