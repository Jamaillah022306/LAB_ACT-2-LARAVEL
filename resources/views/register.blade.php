<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
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
            --red: #ef4444;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        body::before {
            content: '';
            position: fixed;
            top: -200px; right: -200px;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(13,148,136,0.1) 0%, transparent 70%);
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -150px; left: -150px;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(245,158,11,0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .accent-bar {
            height: 5px;
            background: linear-gradient(90deg, var(--teal-dark), var(--teal-light), var(--amber), var(--amber-light));
            flex-shrink: 0;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 3rem;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(13,148,136,0.1);
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .nav-icon {
            width: 38px; height: 38px;
            background: linear-gradient(135deg, var(--teal), var(--teal-dark));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-icon svg { width: 20px; height: 20px; fill: white; }

        .nav-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--slate);
            font-weight: 700;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--teal-dark);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            padding: 0.4rem 0.9rem;
            border: 1px solid rgba(13,148,136,0.25);
            border-radius: 8px;
            transition: all 0.2s;
        }

        .back-link:hover {
            background: rgba(13,148,136,0.06);
            border-color: var(--teal);
        }

        /* Main content */
        main {
            flex: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 3rem 1.5rem 4rem;
        }

        .form-wrapper {
            width: 100%;
            max-width: 540px;
            animation: fadeUp 0.6s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Form header */
        .form-header {
            margin-bottom: 2rem;
        }

        .form-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--teal-dark);
            margin-bottom: 0.7rem;
        }

        .form-eyebrow::before {
            content: '';
            width: 16px; height: 2px;
            background: var(--teal);
            border-radius: 1px;
        }

        .form-header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--slate);
            font-weight: 800;
            line-height: 1.2;
        }

        .form-header p {
            margin-top: 0.5rem;
            font-size: 0.88rem;
            color: #64748b;
        }

        /* Card */
        .form-card {
            background: white;
            border-radius: 20px;
            border: 1px solid rgba(13,148,136,0.1);
            box-shadow: 0 4px 32px rgba(0,0,0,0.06);
            padding: 2.2rem;
            position: relative;
            overflow: hidden;
        }

        .form-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, var(--teal), var(--amber));
        }

        /* Error box */
        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 1rem 1.2rem;
            margin-bottom: 1.5rem;
            display: none; /* hidden by default, shown via Blade conditionals */
        }

        .error-box-title {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--red);
            margin-bottom: 0.4rem;
        }

        .error-box ul {
            list-style: none;
            padding: 0;
        }

        .error-box li {
            font-size: 0.8rem;
            color: #b91c1c;
            padding: 0.15rem 0;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .error-box li::before { content: '•'; color: var(--red); }

        /* Form groups */
        .form-group {
            margin-bottom: 1.3rem;
        }

        label {
            display: block;
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--slate-mid);
            margin-bottom: 0.45rem;
            letter-spacing: 0.01em;
        }

        label .required {
            color: var(--red);
            margin-left: 2px;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.95rem;
            pointer-events: none;
            opacity: 0.5;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 0.72rem 1rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--slate);
            background: #f8fafc;
            transition: all 0.2s ease;
            outline: none;
            appearance: none;
        }

        input:focus,
        select:focus {
            border-color: var(--teal-light);
            background: white;
            box-shadow: 0 0 0 3px rgba(13,148,136,0.1);
        }

        input.is-invalid,
        select.is-invalid {
            border-color: var(--red);
            background: #fff8f8;
        }

        .field-error {
            font-size: 0.76rem;
            color: var(--red);
            margin-top: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* Select arrow */
        .select-wrap::after {
            content: '▾';
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            pointer-events: none;
            font-size: 0.85rem;
        }

        /* Divider */
        .form-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
            margin: 1.5rem 0;
        }

        /* Submit button */
        .btn-submit {
            width: 100%;
            padding: 0.9rem;
            background: linear-gradient(135deg, var(--teal), var(--teal-dark));
            color: white;
            border: none;
            border-radius: 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 16px rgba(13,148,136,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            letter-spacing: 0.02em;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0; left: -100%;
            width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.12), transparent);
            transition: left 0.4s;
        }

        .btn-submit:hover::before { left: 100%; }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(13,148,136,0.4);
        }

        .btn-submit:active { transform: translateY(0); }

        /* Progress dots */
        .progress-dots {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            margin-bottom: 2rem;
        }

        .dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: #e2e8f0;
        }

        .dot.active {
            width: 24px;
            border-radius: 4px;
            background: var(--teal);
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
        <a href="{{ route('home') }}" class="back-link">Back to Home</a>
    </nav>

    <main>
        <div class="form-wrapper">
            <div class="form-header">
                <h1>Student Registration Form</h1>
                <p>Fill in your details below to complete your registration.</p>
            </div>

            <div class="form-card">

                {{-- Laravel error bag --}}
                @if ($errors->any())
                <div class="error-box" style="display:block">
                    <div class="error-box-title">⚠ Please fix the following errors:</div>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('register.submit') }}">
                    @csrf

                    <div class="form-group">
                        <label for="full_name">Full Name <span class="required">*</span></label>
                        <div class="input-wrap">
                            <input type="text" id="full_name" name="full_name"
                                   value="{{ old('full_name') }}"
                                   class="{{ $errors->has('full_name') ? 'is-invalid' : '' }}">
                        </div>
                        @error('full_name')
                        <div class="field-error">⚠ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <div class="input-wrap">
                            <input type="text" id="email" name="email"
                                   value="{{ old('email') }}"
                                   class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                        </div>
                        @error('email')
                        <div class="field-error">⚠ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age">Age <span class="required">*</span></label>
                        <div class="input-wrap">
                            <input type="number" id="age" name="age"
                                   value="{{ old('age') }}"
                                   min="1" max="120"
                                   class="{{ $errors->has('age') ? 'is-invalid' : '' }}">
                        </div>
                        @error('age')
                        <div class="field-error">⚠ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="course">Course <span class="required">*</span></label>
                        <div class="input-wrap select-wrap">
                            <select id="course" name="course"
                                    class="{{ $errors->has('course') ? 'is-invalid' : '' }}">
                                <option value="">-- Select Course --</option>
                                <option value="BSIT" {{ old('course') == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                                <option value="BSCS" {{ old('course') == 'BSCS' ? 'selected' : '' }}>BSCS</option>
                                <option value="BSEMC" {{ old('course') == 'BSEMC' ? 'selected' : '' }}>BSEMC</option>
                                <option value="BSIS" {{ old('course') == 'BSIS' ? 'selected' : '' }}>BSIS</option>
                            </select>
                        </div>
                        @error('course')
                        <div class="field-error">⚠ {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-divider"></div>

                    <button type="submit" class="btn-submit">
                        Submit Registration
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>