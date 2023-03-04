@extends('layout')

@section('title', 'PHP TECHNICAL TASK')

@section('content')
    <div class="container my-4">
        <h4 class="text-center">Feedback Form</h4>
        <form action="{{ route('review.store') }}" method="post">
            @csrf
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <label for="message" class="form-label">Message</label>
            <textarea rows="3" name="message" id="message" class="form-control @error('message') is-invalid @enderror">
                {{ old('message') }}
            </textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button class="btn btn-primary my-2">Submit</button>
        </form>
        <div class="my-3">
            @if($reviews->isNotEmpty())
                <h4 class="text-center my-3">Recent Reviews</h4>
                @foreach($reviews as $review)
                    <div class="my-4">
                        <p class="m-1">Name: {{ $review->name }}</p>
                        <p class="m-1">Email: {{ $review->email }}</p>
                        <p class="m-1">Message: {{ $review->message }}</p>
                        <p class="text-muted m-1">{{ $review->created_at?->format('d M Y') }}</p>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
