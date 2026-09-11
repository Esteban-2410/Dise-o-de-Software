<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            top: -20%;
            right: -10%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .card {
            background: #ffffff;
            border-radius: 24px;
            padding: 52px 48px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.04), 0 20px 60px rgba(59,130,246,0.08);
            animation: popIn 0.55s cubic-bezier(0.22,1,0.36,1) both;
            position: relative;
            z-index: 1;
            text-align: center;
        }

        @keyframes popIn {
            from { opacity: 0; transform: scale(0.95) translateY(20px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        .avatar {
            width: 72px;
            height: 72px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 50%;
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
            font-weight: 600;
            animation: popIn 0.6s cubic-bezier(0.22,1,0.36,1) 0.1s both;
        }

        .badge {
            display: inline-block;
            background: #eff6ff;
            color: #3b82f6;
            font-size: 12px;
            font-weight: 500;
            padding: 4px 12px;
            border-radius: 20px;
            margin-bottom: 16px;
            border: 1px solid #dbeafe;
        }

        h1 {
            font-size: 28px;
            font-weight: 600;
            color: #0f172a;
            margin-bottom: 8px;
            letter-spacing: -0.5px;
        }

        .username-highlight {
            color: #3b82f6;
        }

        p {
            font-size: 15px;
            color: #94a3b8;
            margin-bottom: 36px;
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 12px;
            margin-bottom: 36px;
        }

        .stat-card {
            background: #f8fafc;
            border-radius: 16px;
            padding: 18px 12px;
            border: 1.5px solid #e2e8f0;
            animation: slideUp 0.5s cubic-bezier(0.22,1,0.36,1) both;
        }
        .stat-card:nth-child(1) { animation-delay: 0.15s; }
        .stat-card:nth-child(2) { animation-delay: 0.22s; }
        .stat-card:nth-child(3) { animation-delay: 0.29s; }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .stat-icon { font-size: 20px; margin-bottom: 8px; }
        .stat-label { font-size: 11px; color: #94a3b8; font-weight: 500; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-value { font-size: 18px; font-weight: 600; color: #0f172a; margin-top: 2px; }

        .btn-logout {
            display: inline-block;
            padding: 12px 32px;
            background: #f8fafc;
            color: #64748b;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 500;
            font-family: inherit;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s, border-color 0.2s, color 0.2s, transform 0.15s;
        }

        .btn-logout:hover {
            background: #fef2f2;
            border-color: #fecaca;
            color: #dc2626;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="avatar">
            <?php echo strtoupper(substr($_SESSION["user"]["username"] ?? "U", 0, 1)); ?>
        </div>
        <span class="badge">Sesión activa</span>
        <h1>Bienvenido, <span class="username-highlight"><?php echo htmlspecialchars($_SESSION["user"]["username"]); ?></span></h1>
        <p>Has iniciado sesión correctamente.<br>Acceso al Panel Principal.</p>

        <div class="stats">
            <div class="stat-card">
                <div class="stat-icon">👤</div>
                <div class="stat-label">Usuario</div>
                <div class="stat-value">Activo</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🔐</div>
                <div class="stat-label">Sesión</div>
                <div class="stat-value">Segura</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">✅</div>
                <div class="stat-label">Estado</div>
                <div class="stat-value">OK</div>
            </div>
        </div>

        <a href="index.php?action=logout" class="btn-logout">Cerrar sesión</a>
    </div>
</body>
</html>