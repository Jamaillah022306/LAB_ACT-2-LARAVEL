<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --teal: #0d9488;
            --teal-light: #14b8a6;
            --teal-dark: #0f766e;
            --amber: #f59e0b;
            --amber-light: #fcd34d;
            --cream: #fefce8;
            --slate: #1e293b;
            --slate-mid: #334155;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: -200px;
            right: -200px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(13,148,136,0.12) 0%, transparent 70%);
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -150px;
            left: -150px;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(245,158,11,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        .accent-bar {
            height: 5px;
            background: linear-gradient(90deg, var(--teal-dark), var(--teal-light), var(--amber), var(--amber-light));
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 3rem;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(13,148,136,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--slate);
            font-weight: 700;
        }

        .hero {
            max-width: 900px;
            margin: 0 auto;
            padding: 5rem 2rem 3rem;
            text-align: center;
            animation: fadeUp 0.7s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(13,148,136,0.08);
            border: 1px solid rgba(13,148,136,0.2);
            color: var(--teal-dark);
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.4rem 1rem;
            border-radius: 30px;
            margin-bottom: 1.5rem;
        }

        .hero-eyebrow::before {
            content: '';
            width: 6px;
            height: 6px;
            background: var(--teal);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(1.4); }
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            color: var(--slate);
            line-height: 1.15;
            margin-bottom: 1.2rem;
            font-weight: 800;
        }

        h1 span {
            color: var(--teal);
            position: relative;
        }

        h1 span::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--teal), var(--amber));
            border-radius: 2px;
        }

        .hero-desc {
            font-size: 1.05rem;
            color: var(--slate-mid);
            line-height: 1.8;
            max-width: 560px;
            margin: 0 auto 2.5rem;
            font-weight: 300;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: linear-gradient(135deg, var(--teal), var(--teal-dark));
            color: white;
            text-decoration: none;
            padding: 0.9rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.02em;
            transition: all 0.25s ease;
            box-shadow: 0 4px 20px rgba(13,148,136,0.35);
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
            transition: left 0.4s ease;
        }

        .btn-primary:hover::before { left: 100%; }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 28px rgba(13,148,136,0.45);
        }

        .divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--teal), var(--amber));
            border-radius: 2px;
            margin: 3rem auto;
        }

        .features {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem 5rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.2rem;
            animation: fadeUp 0.7s 0.2s ease both;
        }

        .feature-card {
            background: white;
            border: 1px solid rgba(13,148,136,0.1);
            border-radius: 16px;
            padding: 1.6rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: all 0.25s ease;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }

        .feature-card:hover {
            border-color: var(--teal-light);
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(13,148,136,0.12);
        }

        .feature-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .feature-icon.teal { background: rgba(13,148,136,0.1); }
        .feature-icon.amber { background: rgba(245,158,11,0.1); }
        .feature-icon.blue { background: rgba(59,130,246,0.1); }

        .feature-text h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--slate);
            margin-bottom: 0.3rem;
        }

        .feature-text p {
            font-size: 0.82rem;
            color: #64748b;
            line-height: 1.5;
        }

        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.78rem;
            color: #94a3b8;
            border-top: 1px solid rgba(0,0,0,0.06);
        }
    </style>
</head>
<body>
    <div class="accent-bar"></div>

    <nav>
        <div class="nav-brand">
            <span class="nav-title">EduRegister</span>
        </div>
    </nav>

    <section class="hero">
        <h1><span>Student Registration System</span></h1>

        <div class="btn-group">
            <a href="{{ route('register.form') }}" class="btn-primary">
                Go to Registration Form
            </a>
            <a href="{{ route('registrations') }}" class="btn-primary">
                View Registered Students
            </a>
        </div>
    </section>
</body>
</html>