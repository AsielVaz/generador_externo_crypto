<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Generador de Crypto Efectivo' }}</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f6f7f9;
            --panel: #ffffff;
            --text: #18202f;
            --muted: #667085;
            --line: #d9dee7;
            --primary: #107c5f;
            --primary-dark: #0b5f49;
            --danger: #c2413f;
            --warning: #aa6a00;
            --shadow: 0 16px 40px rgba(18, 30, 50, .08);
        }

        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            background: var(--bg);
            color: var(--text);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }
        a { color: inherit; text-decoration: none; }
        .shell { min-height: 100vh; display: flex; flex-direction: column; }
        .topbar {
            background: var(--panel);
            border-bottom: 1px solid var(--line);
        }
        .topbar-inner, .content {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
        }
        .topbar-inner {
            min-height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }
        .brand { display: grid; gap: 2px; }
        .brand strong { font-size: 18px; }
        .brand span { color: var(--muted); font-size: 13px; }
        .content { padding: 32px 0 48px; flex: 1; }
        .page-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 18px;
            margin-bottom: 24px;
        }
        h1 { margin: 0; font-size: clamp(26px, 4vw, 38px); line-height: 1.1; letter-spacing: 0; }
        h2 { margin: 0 0 16px; font-size: 20px; }
        p { color: var(--muted); line-height: 1.55; }
        .panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 8px;
            box-shadow: var(--shadow);
        }
        .panel-pad { padding: 24px; }
        .grid { display: grid; gap: 16px; }
        .stats { grid-template-columns: repeat(3, minmax(0, 1fr)); margin-bottom: 22px; }
        .stat { padding: 18px; }
        .stat span { color: var(--muted); font-size: 13px; }
        .stat strong { display: block; margin-top: 8px; font-size: 28px; }
        .form-grid { display: grid; gap: 18px; }
        .field { display: grid; gap: 7px; }
        label { color: #344054; font-weight: 700; font-size: 14px; }
        input, select {
            width: 100%;
            min-height: 44px;
            border: 1px solid #cbd3df;
            border-radius: 8px;
            padding: 10px 12px;
            font: inherit;
            background: #fff;
            color: var(--text);
        }
        input:focus, select:focus {
            outline: 3px solid rgba(16, 124, 95, .18);
            border-color: var(--primary);
        }
        .actions { display: flex; flex-wrap: wrap; align-items: center; gap: 10px; }
        .button {
            border: 0;
            border-radius: 8px;
            min-height: 42px;
            padding: 10px 16px;
            font: inherit;
            font-weight: 800;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .button-primary { color: #fff; background: var(--primary); }
        .button-primary:hover { background: var(--primary-dark); }
        .button-secondary { color: var(--text); background: #eef2f6; }
        .button-danger { color: #fff; background: var(--danger); }
        .button-link { background: transparent; color: var(--muted); padding-inline: 8px; }
        .alert {
            border-radius: 8px;
            padding: 12px 14px;
            margin-bottom: 16px;
            background: #e9f8f2;
            border: 1px solid #b8e5d5;
            color: #07533d;
        }
        .errors {
            border-radius: 8px;
            padding: 12px 14px;
            margin-bottom: 16px;
            background: #fff0f0;
            border: 1px solid #f3c5c5;
            color: #8a1f1d;
        }
        .errors ul { margin: 0; padding-left: 20px; }
        .filters {
            display: grid;
            grid-template-columns: minmax(180px, 1fr) 180px auto;
            gap: 10px;
            margin-bottom: 16px;
        }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--line);
            text-align: left;
            vertical-align: middle;
        }
        th { color: var(--muted); font-size: 12px; text-transform: uppercase; letter-spacing: .04em; }
        .key-code {
            font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
            font-size: 13px;
            word-break: break-word;
        }
        .badge {
            display: inline-flex;
            align-items: center;
            min-height: 26px;
            border-radius: 999px;
            padding: 3px 10px;
            font-size: 12px;
            font-weight: 800;
        }
        .badge-active { color: #07533d; background: #dff7ed; }
        .badge-revoked { color: #7b2d00; background: #ffe4c0; }
        .detail-list { display: grid; grid-template-columns: 160px 1fr; gap: 12px 18px; }
        .detail-list dt { color: var(--muted); font-weight: 700; }
        .detail-list dd { margin: 0; }
        .evidence {
            width: 100%;
            max-height: 520px;
            object-fit: contain;
            border-radius: 8px;
            border: 1px solid var(--line);
            background: #f8fafc;
        }
        .empty {
            padding: 36px 20px;
            text-align: center;
            color: var(--muted);
        }
        .pagination { margin-top: 16px; }
        .auth-page {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 28px 16px;
            background: #f1f4f7;
        }
        .auth-card { width: min(420px, 100%); }
        .auth-card h1 { font-size: 30px; margin-bottom: 8px; }
        .muted { color: var(--muted); }
        @media (max-width: 760px) {
            .page-head, .topbar-inner { flex-direction: column; align-items: stretch; }
            .stats { grid-template-columns: 1fr; }
            .filters { grid-template-columns: 1fr; }
            table, thead, tbody, th, td, tr { display: block; }
            thead { display: none; }
            tr { border-bottom: 1px solid var(--line); padding: 10px 0; }
            td { border: 0; padding: 8px 16px; }
            td::before {
                content: attr(data-label);
                display: block;
                color: var(--muted);
                font-size: 12px;
                font-weight: 800;
                text-transform: uppercase;
                margin-bottom: 4px;
            }
            .detail-list { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="shell">
        @if (session('admin_authenticated'))
            <header class="topbar">
                <div class="topbar-inner">
                    <a class="brand" href="{{ route('keys.index') }}">
                        <strong>Generador de Crypto Efectivo</strong>
                        <span>Panel de administración de keys</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="button button-link" type="submit">Cerrar sesión</button>
                    </form>
                </div>
            </header>
        @endif

        <main class="{{ session('admin_authenticated') ? 'content' : '' }}">
            @if (session('status'))
                <div class="alert">{{ session('status') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
</body>
</html>
