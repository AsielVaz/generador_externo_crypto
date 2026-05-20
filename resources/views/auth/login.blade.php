@extends('layouts.app', ['title' => 'Login'])

@section('content')
    <div class="auth-page">
        <section class="panel panel-pad auth-card">
            <h1>Iniciar sesión</h1>
            <p>Accede al panel para generar y administrar keys.</p>

            @if ($errors->any())
                <div class="errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.store') }}" class="form-grid">
                @csrf
                <div class="field">
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" value="{{ old('email', 'admin@admin') }}" required autofocus>
                </div>

                <div class="field">
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password" required>
                </div>

                <label class="actions" style="font-weight: 600;">
                    <input name="remember" type="checkbox" value="1" style="width: 18px; min-height: 18px;">
                    Recordar sesión
                </label>

                <button class="button button-primary" type="submit">Entrar</button>
            </form>
        </section>
    </div>
@endsection
