@extends('layouts.app', ['title' => 'Detalle de archivo'])

@section('content')
    <div class="page-head">
        <div>
            <h1>Detalle de archivo</h1>
            <p class="key-code">{{ $key->key_code }}</p>
        </div>
        <div class="actions">
            <a class="button button-secondary" href="{{ route('keys.index') }}">Volver</a>
            @if (! empty($key->key_filename))
                <a class="button button-secondary" href="{{ route('keys.download', $key->id) }}">Descargar .10hf</a>
            @endif
            <a class="button button-primary" href="{{ route('keys.create') }}">Generar otro</a>
        </div>
    </div>

    <section class="panel panel-pad grid" style="gap: 26px;">
        <dl class="detail-list">
            <dt>Key</dt>
            <dd class="key-code">{{ $key->key_code }}</dd>
            <dt>Archivo</dt>
            <dd class="key-code">{{ $key->key_filename ?? 'N/D' }}</dd>
            <dt>Correo</dt>
            <dd>{{ $key->email }}</dd>
            <dt>Monto</dt>
            <dd>${{ number_format((float) $key->amount, 2) }}</dd>
            <dt>Metodo</dt>
            <dd>{{ $key->method ?? 'Credito' }}</dd>
            <dt>Referencia</dt>
            <dd>{{ $key->reference ?? 'N/D' }}</dd>
            <dt>Estado</dt>
            <dd>
                <span class="badge {{ $key->status === 'active' ? 'badge-active' : 'badge-revoked' }}">
                    {{ $key->status === 'active' ? 'Activa' : 'Revocada' }}
                </span>
            </dd>
            <dt>Creada</dt>
            <dd>{{ \Illuminate\Support\Carbon::parse($key->created_at)->format('d/m/Y H:i') }}</dd>
        </dl>

        <div class="actions">
            <form method="POST" action="{{ route('keys.status', $key->id) }}">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="{{ $key->status === 'active' ? 'revoked' : 'active' }}">
                <button class="button button-secondary" type="submit">
                    {{ $key->status === 'active' ? 'Revocar' : 'Reactivar' }}
                </button>
            </form>

            <form method="POST" action="{{ route('keys.destroy', $key->id) }}" onsubmit="return confirm('Eliminar esta key?');">
                @csrf
                @method('DELETE')
                <button class="button button-danger" type="submit">Eliminar</button>
            </form>
        </div>

        <div>
            <h2>Evidencia</h2>
            <img class="evidence" src="{{ asset('storage/'.$key->evidence_path) }}" alt="Evidencia de {{ $key->email }}">
        </div>
    </section>
@endsection
