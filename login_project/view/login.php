<!-- view/login.ph -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login NIXON</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            background: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -30%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(59,130,246,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -20%;
            left: -15%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(16,185,129,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 48px 44px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.04), 0 20px 60px rgba(59,130,246,0.08);
            animation: slideUp 0.5s cubic-bezier(0.22,1,0.36,1) both;
            position: relative;
            z-index: 1;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .logo {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 14px;
            margin-bottom: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
            font-weight: 600;
        }

        h1 {
            font-size: 26px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 6px;
            letter-spacing: -0.5px;
        }

        .subtitle {
            font-size: 14px;
            color: #94a3b8;
            margin-bottom: 36px;
        }

        .form-group {
            margin-bottom: 18px;
            animation: slideUp 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }
        .form-group:nth-child(1) { animation-delay: 0.08s; }
        .form-group:nth-child(2) { animation-delay: 0.14s; }

        label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: #475569;
            margin-bottom: 7px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 11px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            color: #0f172a;
            background: #f8fafc;
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #3b82f6;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(59,130,246,0.1);
        }

        .btn-primary {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 14px;
            font-size: 15px;
            font-weight: 500;
            font-family: inherit;
            cursor: pointer;
            margin-top: 10px;
            transition: transform 0.15s, box-shadow 0.2s;
            box-shadow: 0 4px 14px rgba(59,130,246,0.35);
            letter-spacing: 0.2px;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(59,130,246,0.45);
        }

        .btn-primary:active {
            transform: translateY(0px);
            box-shadow: 0 2px 8px rgba(59,130,246,0.3);
        }

        .error-msg {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            font-size: 13px;
            padding: 10px 14px;
            border-radius: 10px;
            margin-bottom: 16px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 24px 0 20px;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }
        .divider span { font-size: 12px; color: #cbd5e1; }

        .link-register {
            display: block;
            text-align: center;
            font-size: 14px;
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            padding: 10px;
            border-radius: 12px;
            border: 1.5px solid #dbeafe;
            transition: background 0.2s, border-color 0.2s;
        }
        .link-register:hover {
            background: #eff6ff;
            border-color: #3b82f6;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="logo">NIXON</div>
        <h1>Iniciar sesión</h1>
        <p class="subtitle">Bienvenido de nuevo</p>

        <?php if (!empty($error)) echo "<div class='error-msg'>$error</div>"; ?>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" placeholder="Tu nombre de usuario" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-primary">Iniciar Sesión</button>
        </form>

        <div class="divider"><span>o</span></div>
        <a href="view/register.php" class="link-register">Crear una cuenta</a>
    </div>
    <script>
    // Si el usuario llega aquí con el botón atrás, forzar recarga
    window.addEventListener('pageshow', function(event) {
        if (event.persisted) {
            window.location.reload();
        }
    });

    // Limpiar historial para que no pueda volver atrás
    history.pushState(null, null, window.location.href);
    window.addEventListener('popstate', function() {
        history.pushState(null, null, window.location.href);
    });
</script>
</body>
</html>
