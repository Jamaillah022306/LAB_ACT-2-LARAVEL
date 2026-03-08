<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Fraunces:wght@700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --teal: #2a9d8f;
            --teal-dark: #21867a;
            --teal-light: #e8f7f5;
            --gold: #e9c46a;
            --text: #1a1a2e;
            --muted: #6b7280;
            --bg: #f7f9f4;
            --white: #ffffff;
            --border: #e5e7eb;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAV */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.2rem 2.5rem;
            background: var(--white);
            border-bottom: 1px solid var(--border);
        }

        .logo {
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            color: var(--teal);
            text-decoration: none;
        }

        .btn-outline {
            padding: 0.5rem 1.2rem;
            border: 1.5px solid var(--teal);
            border-radius: 8px;
            color: var(--teal);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            background: transparent;
        }

        .btn-outline:hover {
            background: var(--teal);
            color: var(--white);
        }

        /* MAIN */
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 3rem 1.5rem;
        }

        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.07);
            padding: 2.8rem 2.5rem;
            width: 100%;
            max-width: 520px;
            animation: fadeUp 0.5s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* SUCCESS ICON */
        .icon-wrap {
            width: 68px;
            height: 68px;
            background: var(--teal-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .icon-wrap svg {
            width: 34px;
            height: 34px;
            stroke: var(--teal);
            stroke-width: 2.5;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .card h1 {
            font-family: 'Fraunces', serif;
            font-size: 1.8rem;
            color: var(--text);
            text-align: center;
            margin-bottom: 0.4rem;
        }

        .card .subtitle {
            text-align: center;
            color: var(--muted);
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        /* DIVIDER */
        .divider {
            height: 3px;
            background: linear-gradient(90deg, var(--teal), var(--gold));
            border-radius: 2px;
            margin-bottom: 2rem;
        }

        /* INFO LIST */
        .info-label {
            font-size: 0.78rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--muted);
            margin-bottom: 1rem;
        }

        .info-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
            margin-bottom: 2rem;
        }

        .info-list li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.85rem 1rem;
            background: var(--bg);
            border-radius: 10px;
            border: 1px solid var(--border);
        }

        .info-list li .field {
            font-size: 0.88rem;
            color: var(--muted);
            font-weight: 500;
        }

        .info-list li .value {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text);
        }

        /* BUTTON */
        .btn-primary {
            display: block;
            width: 100%;
            padding: 0.95rem;
            background: var(--teal);
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.2s ease, transform 0.1s ease;
        }

        .btn-primary:hover {
            background: var(--teal-dark);
            transform: translateY(-1px);
        }

        /* FOOTER */
        footer {
            text-align: center;
            padding: 1.5rem;
            font-size: 0.82rem;
            color: var(--muted);
            border-top: 1px solid var(--border);
        }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}" class="logo">EduRegister</a>
        <a href="{{ route('home') }}" class="btn-outline">Back to Home</a>
    </nav>

    <main>
        <div class="card">

            <div class="icon-wrap">
                <svg viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>

            <h1>Registration Successful!</h1>
            <p class="subtitle">The student information has been submitted successfully.</p>

            <div class="divider"></div>

            <p class="info-label">Submitted Information</p>

            <ul class="info-list">
                <li>
                    <span class="field">Full Name</span>
                    <span class="value">{{ $full_name }}</span>
                </li>
                <li>
                    <span class="field">Email Address</span>
                    <span class="value">{{ $email }}</span>
                </li>
                <li>
                    <span class="field">Age</span>
                    <span class="value">{{ $age }}</span>
                </li>
                <li>
                    <span class="field">Course</span>
                    <span class="value">{{ $course }}</span>
                </li>
            </ul>

            <a href="{{ route('register.form') }}" class="btn-primary">Submit Another Response</a>

        </div>
    </main>

    <footer>
        © 2026 EduRegister · Built with Laravel &amp; Blade Templates
    </footer>

</body>
</html>