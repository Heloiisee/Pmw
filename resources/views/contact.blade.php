@extends('layouts.public')

@section('title', 'Contact')

@section('content')
<div class="container py-5" id="contact">
    <h1 class="mb-4 fw-bold text-center reveal">Contactez-moi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        <div class="mb-3 reveal-1">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required value="{{ old('nom') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail</label>
            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}" >
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-contact fw-bold text-white">
            <i class="fa-solid fa-paper-plane"></i>
            Envoyer le message
        </button>
    </form>
</div>
@endsection
