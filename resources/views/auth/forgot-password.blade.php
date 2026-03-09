<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Lupa Password — HAM DAILY NEWS (HAMDANS)</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }

            :root {
                --primary: #0A2B6B;
                --primary-dark: #071E4A;
                --accent: #C8A951;
                --accent-light: #FDB91F;
                --gray-50: #F8FAFC;
                --gray-100: #F1F5F9;
                --gray-200: #E2E8F0;
                --gray-400: #94A3B8;
                --gray-500: #64748B;
                --gray-700: #334155;
                --gray-900: #0F172A;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
                min-height: 100vh;
                display: flex;
                -webkit-font-smoothing: antialiased;
                background: var(--gray-900);
                overflow: hidden;
            }

            /* ──── Left Panel: Branding ──── */
            .login-brand {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
                overflow: hidden;
                background: linear-gradient(160deg, var(--primary-dark) 0%, var(--primary) 50%, #143d8a 100%);
            }

            .login-brand::before {
                content: '';
                position: absolute;
                top: -20%;
                right: -30%;
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(200,169,81,0.12) 0%, transparent 70%);
                border-radius: 50%;
            }

            .login-brand::after {
                content: '';
                position: absolute;
                bottom: -25%;
                left: -20%;
                width: 500px;
                height: 500px;
                background: radial-gradient(circle, rgba(255,255,255,0.04) 0%, transparent 70%);
                border-radius: 50%;
            }

            .brand-video {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
                opacity: 0.08;
                pointer-events: none;
            }

            .brand-content {
                position: relative;
                z-index: 1;
                text-align: center;
                padding: 3rem;
                max-width: 480px;
            }

            .brand-logo {
                height: 75px;
                width: auto;
                object-fit: contain;
                margin-bottom: 2rem;
                filter: brightness(0) invert(1);
                opacity: 0.95;
            }

            .brand-title {
                font-size: 2rem;
                font-weight: 800;
                color: #ffffff;
                letter-spacing: -0.02em;
                margin-bottom: 0.5rem;
                line-height: 1.2;
            }

            .brand-title .accent {
                background: linear-gradient(135deg, var(--accent-light), var(--accent));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .brand-subtitle {
                font-size: 0.88rem;
                color: rgba(255, 255, 255, 0.6);
                line-height: 1.7;
                margin-bottom: 3rem;
            }

            .brand-features {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                text-align: left;
            }

            .brand-feature {
                display: flex;
                align-items: center;
                gap: 14px;
            }

            .feature-icon {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                background: rgba(255, 255, 255, 0.08);
                border: 1px solid rgba(255, 255, 255, 0.1);
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                color: var(--accent);
            }

            .feature-icon svg {
                width: 18px;
                height: 18px;
            }

            .feature-text {
                font-size: 0.82rem;
                color: rgba(255, 255, 255, 0.75);
                font-weight: 500;
                line-height: 1.5;
            }

            .feature-text strong {
                color: #ffffff;
                font-weight: 600;
            }

            /* ──── Right Panel: Form ──── */
            .login-panel {
                width: 480px;
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 3rem;
                background: #ffffff;
                position: relative;
            }

            .login-panel::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                width: 3px;
                background: linear-gradient(180deg, var(--accent), var(--primary), var(--accent));
            }

            .login-form-wrapper {
                width: 100%;
                max-width: 340px;
            }

            .login-header {
                margin-bottom: 2rem;
            }

            .login-greeting {
                font-size: 0.78rem;
                color: var(--accent);
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.12em;
                margin-bottom: 0.6rem;
            }

            .login-title {
                font-size: 1.65rem;
                font-weight: 800;
                color: var(--gray-900);
                letter-spacing: -0.02em;
                margin-bottom: 0.5rem;
            }

            .login-desc {
                font-size: 0.84rem;
                color: var(--gray-500);
                line-height: 1.6;
            }

            /* ──── Lock Icon ──── */
            .lock-icon-wrapper {
                width: 64px;
                height: 64px;
                border-radius: 16px;
                background: linear-gradient(135deg, #EEF2F9, #E8F0FE);
                border: 1px solid #D4DEEF;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1.5rem;
            }

            .lock-icon-wrapper svg {
                width: 28px;
                height: 28px;
                color: var(--primary);
            }

            /* ──── Form ──── */
            .form-group {
                margin-bottom: 1.25rem;
            }

            .form-label {
                display: block;
                font-size: 0.75rem;
                font-weight: 600;
                color: var(--gray-700);
                margin-bottom: 0.4rem;
                letter-spacing: 0.02em;
            }

            .input-wrapper {
                position: relative;
            }

            .input-icon {
                position: absolute;
                left: 14px;
                top: 50%;
                transform: translateY(-50%);
                color: var(--gray-400);
                pointer-events: none;
                transition: color 0.2s;
            }

            .input-icon svg {
                width: 18px;
                height: 18px;
            }

            .form-input {
                width: 100%;
                height: 48px;
                padding: 0 14px 0 44px;
                border: 1.5px solid var(--gray-200);
                border-radius: 12px;
                font-size: 0.88rem;
                font-family: inherit;
                color: var(--gray-900);
                background: var(--gray-50);
                outline: none;
                transition: all 0.25s ease;
            }

            .form-input:focus {
                border-color: var(--primary);
                background: #fff;
                box-shadow: 0 0 0 3px rgba(10, 43, 107, 0.08);
            }

            .form-input:focus + .input-icon,
            .form-input:focus ~ .input-icon {
                color: var(--primary);
            }

            .form-input::placeholder {
                color: var(--gray-400);
                font-weight: 400;
            }

            .form-error {
                margin-top: 0.35rem;
                font-size: 0.75rem;
                color: #EF4444;
                display: flex;
                align-items: center;
                gap: 4px;
            }

            .btn-login {
                width: 100%;
                height: 50px;
                border: none;
                border-radius: 12px;
                font-size: 0.9rem;
                font-weight: 700;
                font-family: inherit;
                color: #fff;
                background: linear-gradient(135deg, var(--primary), var(--primary-dark));
                cursor: pointer;
                transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                position: relative;
                overflow: hidden;
                letter-spacing: 0.01em;
                margin-top: 0.5rem;
            }

            .btn-login::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
                transition: left 0.5s ease;
            }

            .btn-login:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 30px rgba(10, 43, 107, 0.35);
            }

            .btn-login:hover::before {
                left: 100%;
            }

            .btn-login:active {
                transform: translateY(0);
                box-shadow: 0 4px 12px rgba(10, 43, 107, 0.25);
            }

            /* ──── Session Status ──── */
            .session-status {
                padding: 0.85rem 1.1rem;
                background: linear-gradient(135deg, #ECFDF5, #D1FAE5);
                border: 1px solid #A7F3D0;
                border-radius: 12px;
                font-size: 0.82rem;
                color: #065F46;
                margin-bottom: 1.5rem;
                display: flex;
                align-items: center;
                gap: 10px;
                font-weight: 500;
                line-height: 1.5;
            }

            .session-status svg {
                width: 20px;
                height: 20px;
                flex-shrink: 0;
                color: #059669;
            }

            /* ──── Divider ──── */
            .login-divider {
                display: flex;
                align-items: center;
                gap: 1rem;
                margin: 1.75rem 0;
            }

            .login-divider::before,
            .login-divider::after {
                content: '';
                flex: 1;
                height: 1px;
                background: var(--gray-200);
            }

            .login-divider span {
                font-size: 0.72rem;
                color: var(--gray-400);
                font-weight: 500;
                text-transform: uppercase;
                letter-spacing: 0.08em;
            }

            /* ──── Footer ──── */
            .login-footer {
                text-align: center;
            }

            .login-footer a {
                font-size: 0.82rem;
                color: var(--gray-500);
                text-decoration: none;
                font-weight: 500;
                transition: all 0.2s;
                display: inline-flex;
                align-items: center;
                gap: 6px;
            }

            .login-footer a:hover {
                color: var(--primary);
            }

            .login-footer a svg {
                width: 16px;
                height: 16px;
                transition: transform 0.2s;
            }

            .login-footer a:hover svg {
                transform: translateX(-3px);
            }

            .copyright {
                position: absolute;
                bottom: 1.5rem;
                left: 0;
                right: 0;
                text-align: center;
                font-size: 0.68rem;
                color: var(--gray-400);
                letter-spacing: 0.02em;
            }

            /* ──── Responsive ──── */
            @media (max-width: 960px) {
                body {
                    flex-direction: column;
                }

                .login-brand {
                    display: none;
                }

                .login-panel {
                    width: 100%;
                    min-height: 100vh;
                    padding: 2rem 1.5rem;
                    background: linear-gradient(160deg, #EEF2F9 0%, #F5F7FB 30%, #FFF8E6 70%, #FFFDF5 100%);
                }

                .login-panel::before {
                    display: none;
                }

                .login-form-wrapper {
                    max-width: 380px;
                }

                .mobile-logo {
                    display: block;
                    text-align: center;
                    margin-bottom: 1.5rem;
                }

                .mobile-logo img {
                    height: 50px;
                    width: auto;
                }
            }

            @media (min-width: 961px) {
                .mobile-logo {
                    display: none;
                }
            }

            @media (max-width: 480px) {
                .login-panel { padding: 1.5rem 1rem; }
                .login-title { font-size: 1.4rem; }
                .btn-login { height: 46px; }
                .lock-icon-wrapper { width: 52px; height: 52px; border-radius: 14px; }
                .lock-icon-wrapper svg { width: 24px; height: 24px; }
            }

            /* ──── Animations ──── */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(16px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .lock-icon-wrapper { animation: fadeInUp 0.5s ease both; }
            .login-header { animation: fadeInUp 0.5s ease 0.05s both; }
            .form-group { animation: fadeInUp 0.5s ease 0.15s both; }
            .btn-login { animation: fadeInUp 0.5s ease 0.2s both; }
            .login-divider { animation: fadeInUp 0.5s ease 0.25s both; }
            .login-footer { animation: fadeInUp 0.5s ease 0.3s both; }
        </style>
    </head>
    <body>

        <!-- ═══════ LEFT BRANDING PANEL ═══════ -->
        <div class="login-brand">
            <video autoplay loop muted playsinline class="brand-video">
                <source src="{{ asset('videos/video.mp4') }}" type="video/mp4">
            </video>

            <div class="brand-content">
                <img src="{{ asset('images/logo_header.png') }}" alt="Logo" class="brand-logo">
                <h1 class="brand-title">HAM DAILY <span class="accent">NEWS</span></h1>
                <p class="brand-subtitle">Portal agregasi kegiatan harian dari seluruh Kantor Wilayah Kementerian Hak Asasi Manusia di Indonesia.</p>

                <div class="brand-features">
                    <div class="brand-feature">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 14l2 2 4-4"/></svg>
                        </div>
                        <div class="feature-text"><strong>Lapor kegiatan</strong> langsung dari media sosial resmi</div>
                    </div>
                    <div class="brand-feature">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/><path d="M9 9h1"/><path d="M9 13h1"/><path d="M9 17h1"/></svg>
                        </div>
                        <div class="feature-text"><strong>39 Kanwil dan Wilker</strong> terintegrasi di seluruh Indonesia</div>
                    </div>
                    <div class="brand-feature">
                        <div class="feature-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <div class="feature-text"><strong>Moderasi terpusat</strong> oleh admin pusat</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ═══════ RIGHT FORM PANEL ═══════ -->
        <div class="login-panel">
            <div class="login-form-wrapper">
                <div class="mobile-logo">
                    <img src="{{ asset('images/logo_header.png') }}" alt="Logo">
                </div>

                <!-- Lock Icon -->
                <div class="lock-icon-wrapper">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>

                <div class="login-header">
                    <div class="login-greeting">Reset Password</div>
                    <h2 class="login-title">Lupa password Anda?</h2>
                    <p class="login-desc">Tidak masalah. Masukkan alamat email Anda dan kami akan mengirimkan link untuk mengatur ulang password Anda.</p>
                </div>

                @if (session('status'))
                    <div class="session-status">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="email">Alamat Email</label>
                        <div class="input-wrapper">
                            <input
                                id="email"
                                class="form-input"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="nama@kemenham.go.id"
                                required
                                autofocus
                                autocomplete="username"
                            >
                            <span class="input-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </span>
                        </div>
                        @error('email')
                            <p class="form-error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-login">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        Kirim Link Reset Password
                    </button>
                </form>

                <div class="login-divider">
                    <span>atau</span>
                </div>

                <div class="login-footer">
                    <a href="{{ route('login') }}">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                        Kembali ke halaman login
                    </a>
                </div>
            </div>

            <div class="copyright">
                &copy; {{ date('Y') }} HAM Daily News — Kementerian HAM RI
            </div>
        </div>

    </body>
</html>
