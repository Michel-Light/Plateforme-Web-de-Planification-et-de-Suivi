@extends('dashboard')

@section('content')
    <!-- Formulaire d'édition -->
    <form action="{{ route('seances.update', $seance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Inclure les champs de formulaire pour éditer une séance -->
    </form>
@endsection
