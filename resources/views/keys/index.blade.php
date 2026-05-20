@extends('layouts.app', ['title' => 'Archivos .10hf'])

@section('content')
    <div class="page-head">
        <div>
            <h1>Archivos .10hf generados</h1>
            <p>Consulta, filtra y administra todos los archivos emitidos por el sistema.</p>
        </div>
        <a class="button button-primary" href="{{ route('keys.create') }}">Generar .10hf</a>
    </div>

    <section class="grid stats">
        <div class="panel stat"><span>Total</span><strong>{{ $totalKeys }}</strong></div>
        <div class="panel stat"><span>Activas</span><strong>{{ $activeKeys }}</strong></div>
        <div class="panel stat"><span>Revocadas</span><strong>{{ $revokedKeys }}</strong></div>
    </section>

    <section class="panel panel-pad">
        <form method="GET" action="{{ route('keys.index') }}" class="filters">
            <input name="search" value="{{ request('search') }}" placeholder="Buscar por correo, key o archivo">
            <select name="status">
                <option value="">Todos los estados</option>
                <option value="active" @selected(request('status') === 'active')>Activas</option>
                <option value="revoked" @selected(request('status') === 'revoked')>Revocadas</option>
            </select>
            <button class="button button-secondary" type="submit">Filtrar</button>
        </form>

        @if ($keys->isEmpty())
            <div class="empty">Todavia no hay archivos registrados.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Key</th>
                        <th>Archivo</th>
                        <th>Correo</th>
                        <th>Monto</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keys as $key)
                        <tr>
                            <td data-label="Key"><span class="key-code">{{ $key->key_code }}</span></td>
                            <td data-label="Archivo"><span class="key-code">{{ $key->key_filename ?? 'N/D' }}</span></td>
                            <td data-label="Correo">{{ $key->email }}</td>
                            <td data-label="Monto">${{ number_format((float) $key->amount, 2) }}</td>
                            <td data-label="Estado">
                                <span class="badge {{ $key->status === 'active' ? 'badge-active' : 'badge-revoked' }}">
                                    {{ $key->status === 'active' ? 'Activa' : 'Revocada' }}
                                </span>
                            </td>
                            <td data-label="Fecha">{{ \Illuminate\Support\Carbon::parse($key->created_at)->format('d/m/Y H:i') }}</td>
                            <td data-label="Acciones">
                                <div class="actions">
                                    <a class="button button-secondary" href="{{ route('keys.show', $key->id) }}">Ver</a>
                                    @if (! empty($key->key_filename))
                                        <a class="button button-secondary" href="{{ route('keys.download', $key->id) }}">Descargar</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination">{{ $keys->links() }}</div>
        @endif
    </section>
@endsection
