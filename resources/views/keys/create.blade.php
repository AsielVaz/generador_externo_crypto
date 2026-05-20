@extends('layouts.app', ['title' => 'Generar .10hf'])

@section('content')
    <div class="page-head">
        <div>
            <h1>Generar archivo .10hf</h1>
            <p>Captura la evidencia en imagen, monto y correo electronico para emitir y descargar el archivo.</p>
        </div>
        <a class="button button-secondary" href="{{ route('keys.index') }}">Volver</a>
    </div>

    <section class="panel panel-pad">
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('keys.store') }}" enctype="multipart/form-data" class="form-grid">
            @csrf

            <div class="field">
                <label for="email">Correo electronico</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required>
            </div>

            <div class="field">
                <label for="amount">Monto</label>
                <input id="amount" name="amount" type="number" min="0" step="0.01" value="{{ old('amount') }}" required>
            </div>

            <div class="field">
                <label for="evidence">Evidencia en imagen</label>
                <input id="evidence" name="evidence" type="file" accept="image/*" required>
                <span class="muted">Formatos de imagen comunes, maximo 4 MB.</span>
            </div>

            <div class="actions">
                <button class="button button-primary" type="submit">Generar y descargar .10hf</button>
                <a class="button button-secondary" href="{{ route('keys.index') }}">Cancelar</a>
            </div>
        </form>
    </section>
@endsection
