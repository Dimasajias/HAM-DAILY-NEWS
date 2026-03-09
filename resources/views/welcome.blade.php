<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAM DAILY NEWS (HAMDANS) — Portal Kegiatan Harian Kemenham</title>
    <meta name="description" content="Portal agregasi kegiatan harian Kementerian Hak Asasi Manusia dari seluruh Kantor Wilayah di Indonesia.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            /* 🎨 Navy + Golden Yellow — Unified Palette */
            --primary: #0A2B6B;
            --primary-dark: #071E4A;
            --primary-light: #1a4494;
            --primary-50: #EDF1F8;
            --primary-100: #D4DEEF;
            --accent: #C8A951;
            --accent-dark: #A68B2E;
            --accent-light: #E0C46A;
            --accent-50: #FBF7EA;
            --white: #FFFFFF;
            --gray-50: #F8FAFC;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-300: #CBD5E1;
            --gray-400: #94A3B8;
            --gray-500: #64748B;
            --gray-700: #334155;
            --gray-800: #1E293B;
            --gray-900: #0F172A;
            --radius: 16px;
            --shadow-sm: 0 1px 3px rgba(10, 43, 107, 0.04), 0 1px 2px rgba(0,0,0,0.02);
            --shadow-md: 0 4px 16px rgba(10, 43, 107, 0.07), 0 2px 4px rgba(0,0,0,0.03);
            --shadow-lg: 0 12px 40px rgba(10, 43, 107, 0.1), 0 4px 12px rgba(0,0,0,0.04);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, public_sans_6a10ae;
            background: #FFFFFF;
            color: var(--gray-900);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* ──── Navbar ──── */
        .navbar {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            height: 64px;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 0.5px solid rgba(10,43,107,0.06);
            transition: all 0.4s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 24px rgba(10,43,107,0.06);
            background: rgba(255,255,255,0.97);
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .navbar-logo {
            width: 36px;
            height: 36px;
            object-fit: contain;
        }

        .navbar-title {
            font-size: 1.15rem;
            font-weight: 500;
            color: var(--primary);
        }

        .navbar-title .highlight {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-login {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 9px 22px;
            border-radius: 10px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            border: none;
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(10, 43, 107, 0.35);
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .lang-toggle {
            display: inline-flex;
            align-items: center;
            height: 36px;
            border-radius: 10px;
            overflow: hidden;
            border: 1.5px solid var(--gray-200);
            background: var(--white);
            cursor: pointer;
            font-family: inherit;
            padding: 0;
        }

        .lang-toggle .lang-opt {
            padding: 0 12px;
            height: 100%;
            display: flex;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--gray-400);
            transition: all 0.2s ease;
            border: none;
            background: transparent;
            cursor: pointer;
            letter-spacing: 0.03em;
        }

        .lang-toggle .lang-opt.active {
            background: var(--primary);
            color: var(--white);
        }

        /* ──── Hero ──── */
        /* ════════ HERO ════════ */
        .hero {
            padding: 180px 2rem 180px;
            text-align: center;
            position: relative;
            overflow: hidden;
            background: #060E1F;
            min-height: 540px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: 0;
            transform: translate(-50%, -50%);
            object-fit: cover;
            pointer-events: none;
            opacity: 0.2;
        }

        .hero-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(180deg, 
                rgba(6, 14, 31, 0.6) 0%, 
                rgba(10, 27, 58, 0.75) 40%,
                rgba(10, 43, 107, 0.5) 80%,
                rgba(6, 14, 31, 0.95) 100%);
            z-index: 1;
        }

        .hero-glow {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
            z-index: 1;
        }

        .hero-glow-1 {
            top: -100px;
            right: -100px;
            background: rgba(10, 43, 107, 0.25);
        }

        .hero-glow-2 {
            bottom: -150px;
            left: -100px;
            background: rgba(200, 169, 81, 0.1);
        }

        .hero-inner {
            max-width: 760px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 18px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: rgba(255, 255, 255, 0.8);
            border-radius: 50px;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 1.75rem;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .hero-badge .dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--accent-light);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.4); }
        }

        .hero-logo {
            height: 200px;
            max-width: 100%;
            width: auto;
            margin: 0 auto 1.5rem auto;
            display: block;
            filter: brightness(0) invert(1);
            opacity: 0.95;
            animation: heroFadeIn 0.8s ease both;
        }

        @keyframes heroFadeIn {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 0.95; transform: translateY(0); }
        }

        .hero-tagline {
            font-size: clamp(0.85rem, 2vw, 1rem);
            font-weight: 400;
            color: rgba(255, 255, 255, 0.55);
            max-width: 560px;
            margin: 0 auto;
            line-height: 1.85;
            animation: heroFadeIn 0.8s ease 0.15s both;
        }

        .hero-accent-line {
            width: 48px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
            margin: 1.5rem auto;
            border-radius: 2px;
            opacity: 0.6;
        }

        /* Stats */
        .stats-row {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 4.5rem;
            max-width: 520px;
            margin-left: auto;
            margin-right: auto;
            animation: heroFadeIn 0.8s ease 0.3s both;
        }

        .stat {
            flex: 1;
            padding: 1.25rem 1rem 1rem;
            text-align: center;
            background: rgba(255, 255, 255, 0.04);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            cursor: default;
        }

        .stat::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .stat:hover {
            transform: translateY(-4px);
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(200, 169, 81, 0.2);
            box-shadow: 0 16px 40px rgba(0,0,0,0.3);
        }

        .stat:hover::before {
            opacity: 1;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.7rem;
            position: relative;
        }

        .stat-icon svg {
            width: 18px;
            height: 18px;
            position: relative;
            z-index: 1;
        }

        .stat:nth-child(1) .stat-icon {
            background: linear-gradient(135deg, #0A2B6B, #1a4494);
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(10, 43, 107, 0.4);
        }

        .stat:nth-child(2) .stat-icon {
            background: linear-gradient(135deg, #C8A951, #e0c46a);
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(200, 169, 81, 0.4);
        }

        .stat:nth-child(3) .stat-icon {
            background: linear-gradient(135deg, #10b981, #34d399);
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
        }

        .stat:hover .stat-icon {
            transform: scale(1.08);
            transition: transform 0.3s ease;
        }

        .stat:hover {
            transform: translateY(-3px);
            transition: transform 0.3s ease;
        }

        a.stat-link {
            text-decoration: none;
            color: inherit;
            display: contents;
        }

        .stat-num {
            font-size: 1.85rem;
            font-weight: 800;
            color: #ffffff;
            -webkit-text-fill-color: #ffffff;
            background: none;
            line-height: 1.1;
            margin-bottom: 0.15rem;
        }

        .stat-label {
            font-size: 0.63rem;
            color: rgba(255, 255, 255, 0.4);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-top: 2px;
        }

        .stat + .stat {
            border-left: none;
        }

        /* Hero bottom fade */
        .hero-fade {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(
                to bottom,
                transparent 0%,
                rgba(248, 250, 252, 0.08) 15%,
                rgba(248, 250, 252, 0.22) 30%,
                rgba(248, 250, 252, 0.42) 45%,
                rgba(248, 250, 252, 0.64) 60%,
                rgba(248, 250, 252, 0.84) 75%,
                rgba(248, 250, 252, 0.95) 88%,
                #F8FAFC 100%
            );
            z-index: 2;
            pointer-events: none;
        }

        /* ──── Filters ──── */
        .filter-section {
            max-width: 1200px;
            margin: 40px auto 0;
            padding: 0 2rem;
            position: relative;
            z-index: 10;
        }

        .filter-bar {
            background: var(--white);
            border: 0.5px solid rgba(10, 43, 107, 0.08);
            border-radius: var(--radius);
            padding: 1.25rem;
            box-shadow: 0 4px 20px rgba(10, 43, 107, 0.05), 0 1px 4px rgba(0,0,0,0.02);
            transition: box-shadow 0.3s ease;
        }

        .filter-bar:hover {
            box-shadow: 0 8px 30px rgba(10, 43, 107, 0.08), 0 2px 8px rgba(0,0,0,0.03);
        }

        .filter-search-row {
            display: flex;
            gap: 10px;
            align-items: stretch;
        }

        .filter-search-input {
            flex: 1;
            position: relative;
        }

        .filter-search-input input {
            width: 100%;
            height: 46px;
            padding: 0 16px 0 44px;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            font-size: 0.88rem;
            font-family: inherit;
            color: var(--gray-900);
            background: var(--gray-50);
            outline: none;
            transition: all 0.25s ease;
        }

        .filter-search-input input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(10,43,107,0.06);
        }

        .filter-search-input .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            pointer-events: none;
        }

        .btn-toggle-filter {
            height: 46px;
            padding: 0 18px;
            border-radius: 12px;
            font-size: 0.82rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: 1px solid var(--gray-200);
            background: var(--white);
            color: var(--gray-700);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .btn-toggle-filter:hover {
            border-color: var(--primary-light);
            color: var(--primary);
            background: var(--primary-50);
        }

        .btn-toggle-filter.active {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--primary-50);
        }

        .btn-toggle-filter .chevron {
            transition: transform 0.3s ease;
        }

        .btn-toggle-filter.active .chevron {
            transform: rotate(180deg);
        }

        .filter-count-badge {
            background: var(--primary);
            color: var(--white);
            font-size: 0.65rem;
            font-weight: 700;
            min-width: 18px;
            height: 18px;
            border-radius: 50px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
        }

        .btn-search {
            height: 46px;
            padding: 0 22px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
            font-family: inherit;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.25s ease;
            white-space: nowrap;
        }

        .btn-search:hover {
            box-shadow: 0 4px 16px rgba(10, 43, 107, 0.3);
            transform: translateY(-1px);
        }

        .btn-reset {
            height: 46px;
            padding: 0 18px;
            border-radius: 12px;
            font-size: 0.82rem;
            font-weight: 600;
            font-family: inherit;
            border: 1.5px solid var(--gray-200);
            background: var(--white);
            color: var(--gray-600);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .btn-reset:hover {
            border-color: var(--gray-300);
            background: var(--gray-50);
        }

        .filter-dropdown {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.25s ease, margin 0.3s ease;
            opacity: 0;
            margin-top: 0;
        }

        .filter-dropdown.open {
            max-height: 300px;
            opacity: 1;
            margin-top: 14px;
        }

        .filter-dropdown-inner {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            padding: 20px;
            background: var(--gray-50);
            border-radius: 12px;
            border: 1px solid var(--gray-100);
        }

        .filter-dropdown-inner .fd-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter-dropdown-inner .fd-group label {
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--gray-400);
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .filter-dropdown-inner select,
        .filter-dropdown-inner input[type="date"] {
            height: 40px;
            padding: 0 12px;
            border: 1.5px solid var(--gray-200);
            border-radius: 10px;
            font-size: 0.84rem;
            font-family: inherit;
            color: var(--gray-900);
            background: var(--white);
            outline: none;
            transition: all 0.2s ease;
            width: 100%;
        }

        .filter-dropdown-inner select:focus,
        .filter-dropdown-inner input[type="date"]:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(10,43,107,0.08);
        }

        .active-filters {
            margin-top: 14px;
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            align-items: center;
        }

        .active-filters .label {
            font-size: 0.72rem;
            color: var(--gray-400);
            font-weight: 600;
        }

        .filter-chip {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 5px 14px;
            background: var(--primary-50);
            color: var(--primary-dark);
            border: 1px solid var(--primary-100);
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* ──── Section ──── */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.75rem 2rem 2rem;
        }

        /* ════════ SECTION HEADER ════════ */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding: 1.25rem 1.5rem;
            background: var(--white);
            border-radius: 16px;
            border: 0.5px solid rgba(10, 43, 107, 0.06);
            box-shadow: 0 2px 12px rgba(10, 43, 107, 0.04);
            position: relative;
            overflow: hidden;
        }

        .section-header::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, var(--primary), var(--accent));
            border-radius: 4px 0 0 4px;
        }

        .section-header h2 {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--gray-900);
            letter-spacing: -0.01em;
            padding-left: 4px;
        }

        .section-header .count-badge {
            font-size: 0.72rem;
            font-weight: 600;
            color: var(--white);
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 5px 14px;
            border-radius: 50px;
            margin-left: 12px;
            box-shadow: 0 2px 8px rgba(10,43,107,0.2);
        }

        .view-modes {
            display: flex;
            align-items: center;
            background: var(--gray-50);
            padding: 4px;
            border-radius: 10px;
            gap: 4px;
            border: 0.5px solid var(--gray-200);
        }

        .view-btn {
            background: transparent;
            border: none;
            color: var(--gray-400);
            padding: 7px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .view-btn:hover {
            color: var(--gray-700);
            background: rgba(10,43,107,0.04);
        }

        .view-btn.active {
            background: var(--white);
            color: var(--primary);
            box-shadow: 0 2px 8px rgba(10,43,107,0.08);
        }

        /* ════════ CARDS ════════ */
        .card-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem;
        }

        .card-grid.list-view {
            grid-template-columns: 1fr;
        }

        .activity-card {
            background: var(--white);
            border-radius: 16px;
            border: 0.5px solid rgba(10, 43, 107, 0.06);
            overflow: hidden;
            text-decoration: none;
            color: inherit;
            display: flex;
            flex-direction: row;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            box-shadow: 0 2px 8px rgba(10, 43, 107, 0.03);
            height: 100%;
            position: relative;
        }

        .activity-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            width: 0;
            background: linear-gradient(180deg, var(--primary), var(--accent));
            transition: width 0.3s ease;
            z-index: 2;
            border-radius: 16px 0 0 16px;
        }

        .activity-card:hover {
            border-color: rgba(10, 43, 107, 0.12);
            box-shadow: 0 12px 40px rgba(10, 43, 107, 0.1), 0 4px 12px rgba(0,0,0,0.02);
            transform: translateY(-4px);
        }

        .activity-card:hover::before {
            width: 4px;
        }

        .card-thumb {
            position: relative;
            width: 35%;
            overflow: hidden;
            background: var(--gray-50);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-grid.list-view .card-thumb {
            display: none;
        }

        .card-thumb img {
            width: 100%;
            height: auto;
            max-height: 280px;
            object-fit: contain;
            transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .activity-card:hover .card-thumb img {
            transform: scale(1.05);
        }

        /* No Image Card Styling */
        .activity-card.no-image-card {
            flex-direction: column;
            padding: 1.5rem;
            background: linear-gradient(160deg, #ffffff 0%, #fafbff 100%);
        }

        .activity-card.no-image-card .card-body {
            padding: 0;
            margin-top: 0.75rem;
        }

        .no-img-label {
            display: flex;
            align-items: center;
        }

        .platform-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 0.66rem;
            font-weight: 700;
            background: transparent;
            border: none;
            letter-spacing: 0.03em;
        }
        .platform-instagram { color: #e1306c; background: rgba(225,48,108,0.07); }
        .platform-tiktok { color: #111; background: rgba(0,0,0,0.04); }
        .platform-twitter { color: #111; background: rgba(0,0,0,0.04); }
        .platform-facebook { color: #1877F2; background: rgba(24,119,242,0.07); }
        .platform-youtube { color: #FF0000; background: rgba(255,0,0,0.07); }
        .platform-other { color: var(--gray-600); background: var(--gray-100); }

        .card-body {
            padding: 1.25rem 1.5rem 1.15rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-body h3 {
            font-size: 0.88rem;
            font-weight: 700;
            line-height: 1.7;
            color: var(--gray-800);
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s;
        }

        .activity-card:hover .card-body h3 {
            color: var(--primary);
        }

        .card-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 0.75rem;
            border-top: 1px solid rgba(10, 43, 107, 0.05);
            font-size: 0.68rem;
            color: var(--gray-400);
            margin-top: auto;
            gap: 8px;
        }

        .office-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: 600;
            color: var(--gray-500);
            font-size: 0.68rem;
        }

        .office-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--accent), var(--accent-light));
            box-shadow: 0 0 8px rgba(200, 169, 81, 0.35);
        }

        /* No image */
        .no-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(160deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
        }

        /* ──── Pagination ──── */
        .pagination-wrapper {
            margin-top: 2.5rem;
            display: flex;
            justify-content: center;
        }

        .pagination-wrapper nav { display: flex; gap: 4px; }

        .pagination-wrapper a,
        .pagination-wrapper span {
            padding: 8px 14px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .pagination-wrapper a {
            background: var(--white);
            color: var(--gray-700);
            border: 1px solid var(--gray-200);
        }

        .pagination-wrapper a:hover {
            background: var(--primary);
            color: var(--white);
            border-color: var(--primary);
        }

        .pagination-wrapper span[aria-current="page"] span,
        .pagination-wrapper .active span {
            background: var(--primary);
            color: var(--white);
            border: 1px solid var(--primary);
            border-radius: 8px;
        }

        /* ──── Empty ──── */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            border: 2px dashed var(--gray-200);
            border-radius: var(--radius);
            background: var(--white);
        }
        .empty-state .icon { font-size: 3.5rem; margin-bottom: 1rem; }
        .empty-state h3 { font-size: 1.2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .empty-state p { color: var(--gray-500); font-size: 0.9rem; }

        /* ════════ FOOTER ════════ */
        .footer {
            margin-top: 4rem;
            position: relative;
            background: linear-gradient(160deg, #060E1F 0%, #0A1A3A 40%, #0E2348 100%);
            color: rgba(255,255,255,0.6);
            font-size: 0.84rem;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--accent), var(--accent-light), var(--accent), transparent);
        }

        .footer-main {
            max-width: 1100px;
            margin: 0 auto;
            padding: 3.5rem 2rem 2.5rem;
            display: grid;
            grid-template-columns: 1.4fr 1fr 1.2fr;
            gap: 3rem;
        }

        .footer-brand {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .footer-brand-logo {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-brand-logo img {
            height: 48px;
            width: auto;
            filter: brightness(0) invert(1);
            opacity: 0.9;
        }

        .footer-brand-desc {
            font-size: 0.8rem;
            line-height: 1.75;
            color: rgba(255,255,255,0.45);
            max-width: 320px;
        }

        .footer-social {
            display: flex;
            gap: 10px;
            margin-top: 0.5rem;
        }

        .footer-social a {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.5);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .footer-social a:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: #0A1A3A;
            transform: translateY(-2px);
            box-shadow: 0 4px 16px rgba(200,169,81,0.3);
        }

        .footer-col {
            display: flex;
            flex-direction: column;
        }

        .footer-col-title {
            font-size: 0.68rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: var(--accent);
            margin-bottom: 1.25rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-col-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 24px;
            height: 2px;
            background: var(--accent);
            border-radius: 2px;
            opacity: 0.4;
        }

        .footer-link-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-link-list li a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 400;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .footer-link-list li a:hover {
            color: #ffffff;
            transform: translateX(3px);
        }

        .footer-link-list li a svg {
            width: 14px;
            height: 14px;
            opacity: 0.4;
            flex-shrink: 0;
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 1rem;
        }

        .footer-contact-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: rgba(200,169,81,0.08);
            border: 1px solid rgba(200,169,81,0.12);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            flex-shrink: 0;
            margin-top: 2px;
        }

        .footer-contact-icon svg {
            width: 16px;
            height: 16px;
        }

        .footer-contact-text {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .footer-contact-label {
            font-size: 0.68rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: rgba(255,255,255,0.35);
        }

        .footer-contact-value {
            font-size: 0.84rem;
            color: rgba(255,255,255,0.7);
            line-height: 1.5;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.05);
            padding: 1.25rem 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            background: rgba(0,0,0,0.15);
        }

        .footer-bottom p {
            font-size: 0.72rem;
            color: rgba(255,255,255,0.3);
            letter-spacing: 0.04em;
            margin: 0;
        }

        .footer-bottom .footer-accent {
            color: var(--accent);
            font-weight: 600;
        }

        /* ──── Responsive ──── */
        @media (max-width: 1024px) {
            .card-grid { grid-template-columns: 1fr; }
            .filter-dropdown-inner { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .navbar { padding: 0 1rem; }
            .hero { padding: 90px 1.25rem 60px; min-height: 420px; }
            .hero-logo { height: 140px; }
            .stats-row { flex-direction: row; max-width: 100%; gap: 0.6rem; padding: 0 0.25rem; }
            .stat { padding: 1rem 0.5rem 0.85rem; border-radius: 14px; }
            .stat-icon { width: 38px; height: 38px; border-radius: 10px; margin-bottom: 0.6rem; }
            .stat-icon svg { width: 18px; height: 18px; }
            .stat-num { font-size: 1.5rem; }
            .stat-label { font-size: 0.6rem; letter-spacing: 0.06em; }
            .stat + .stat { border-left: none; border-top: none; }
            .card-grid { grid-template-columns: 1fr; }
            .activity-card { flex-direction: column; }
            .card-thumb { width: 100%; aspect-ratio: 16 / 9; }
            .main-content { padding: 1.5rem 1rem; }
            .filter-section { padding: 0.75rem; margin-top: 0; }
            .filter-bar { overflow: hidden; padding: 0.85rem; border-width: 1.5px; }
            .filter-search-row { flex-wrap: wrap; gap: 8px; }
            .filter-search-input { min-width: 100%; }
            .btn-toggle-filter { flex: 1; justify-content: center; }
            .btn-search { flex: 1; justify-content: center; }
            .btn-reset { flex: 1; justify-content: center; }
            .filter-dropdown-inner { grid-template-columns: 1fr; }
            .section-header { flex-direction: column; gap: 0.5rem; align-items: flex-start; }
            .navbar-actions { gap: 6px; }
            .btn-login { padding: 8px 14px; font-size: 0.75rem; }
            .footer-main { grid-template-columns: 1fr; text-align: center; }
            .footer-brand { align-items: center; }
            .footer-col-title::after { left: 50%; transform: translateX(-50%); }
            .footer-social { justify-content: center; }
            .footer-contact-item { justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- ═══════ NAVBAR ═══════ -->
    <nav class="navbar" id="navbar">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('images/logo_header.png') }}" alt="Logo Kemenham" style="height: 55px; width: auto;">
        </a>
        <div class="navbar-actions">
            <div class="lang-toggle" id="langToggle">
                <button class="lang-opt active" data-lang="id" onclick="setLang('id')">ID</button>
                <button class="lang-opt" data-lang="en" onclick="setLang('en')">EN</button>
            </div>
            <a href="{{ url('/admin') }}" class="btn-login">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                <span data-i18n="login">Login Staff</span>
            </a>
        </div>
    </nav>

    <!-- ═══════ HERO ═══════ -->
    <section class="hero">
        <video class="hero-video" autoplay loop muted playsinline id="heroBgVideo">
            <source src="{{ asset('videos/video.mp4') }}" type="video/mp4">
        </video>
        <div class="hero-overlay"></div>
        <div class="hero-glow hero-glow-1"></div>
        <div class="hero-glow hero-glow-2"></div>

        <div class="hero-inner">
            <img src="{{ asset('images/logo_center.png') }}" alt="Center Logo" class="hero-logo">
            <div class="hero-accent-line"></div>
            <p class="hero-tagline" data-i18n="hero_desc">Portal agregasi kegiatan harian dari seluruh Kantor Wilayah Kementerian Hak Asasi Manusia di Indonesia. Konten dikurasi langsung dari media sosial resmi.</p>

            <div class="stats-row">
                <a href="#activities" class="stat-link">
                <div class="stat">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"/><rect x="9" y="3" width="6" height="4" rx="1"/><path d="M9 14l2 2 4-4"/></svg>
                    </div>
                    <div class="stat-num" data-count="{{ $activities->total() }}">0</div>
                    <div class="stat-label" data-i18n="activities">Kegiatan</div>
                </div>
                </a>
                <a href="{{ route('public.offices') }}" class="stat-link">
                <div class="stat">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18"/><path d="M5 21V7l8-4v18"/><path d="M19 21V11l-6-4"/><path d="M9 9h1"/><path d="M9 13h1"/><path d="M9 17h1"/></svg>
                    </div>
                    <div class="stat-num" data-count="{{ \App\Models\Office::count() }}">0</div>
                    <div class="stat-label" data-i18n="regional_offices">Kanwil dan Wilker</div>
                </div>
                </a>
                <a href="/?hari_ini=1#activities" class="stat-link">
                <div class="stat">
                    <div class="stat-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/><path d="M12 14h.01"/></svg>
                    </div>
                    <div class="stat-num" data-count="{{ \App\Models\Activity::published()->whereDate('approved_at', today())->count() }}">0</div>
                    <div class="stat-label" data-i18n="today">Hari Ini</div>
                </div>
                </a>
            </div>
        </div>
        <div class="hero-fade"></div>
    </section>

    <!-- ═══════ FILTERS ═══════ -->
    <div class="filter-section">
        <div class="filter-bar">
            <form method="GET" action="{{ url('/') }}" id="filterForm">
                <div class="filter-search-row">
                    <div class="filter-search-input">
                        <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        <input type="text" name="cari" placeholder="Cari kegiatan..." value="{{ request('cari') }}">
                    </div>

                    @php
                        $activeFilterCount = collect(['kanwil', 'unit', 'dari', 'sampai', 'hari_ini'])->filter(fn($f) => request()->filled($f))->count();
                    @endphp

                    <button type="button" class="btn-toggle-filter {{ $activeFilterCount > 0 ? 'active' : '' }}" onclick="toggleFilter()" id="btnToggleFilter">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                        <span data-i18n="filter">Filter</span>
                        @if($activeFilterCount > 0)
                            <span class="filter-count-badge">{{ $activeFilterCount }}</span>
                        @endif
                        <svg class="chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>

                    <button type="submit" class="btn-search">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                        <span data-i18n="search_btn">Cari</span>
                    </button>

                    @if(request()->hasAny(['cari', 'kanwil', 'unit', 'dari', 'sampai', 'hari_ini']))
                        <a href="{{ url('/') }}" class="btn-reset" data-i18n="reset">Reset</a>
                    @endif
                </div>

                <div class="filter-dropdown {{ $activeFilterCount > 0 ? 'open' : '' }}" id="filterDropdown">
                    <div class="filter-dropdown-inner">
                        <div class="fd-group">
                            <label for="kanwil" data-i18n="kanwil_label">Kantor Wilayah</label>
                            <select name="kanwil" id="kanwil">
                                <option value="">Semua Kanwil</option>
                                @foreach($offices as $office)
                                    <option value="{{ $office->id }}" {{ request('kanwil') == $office->id ? 'selected' : '' }}>
                                        {{ $office->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fd-group">
                            <label for="unit" data-i18n="unit_label">Unit Kerja</label>
                            <select name="unit" id="unit">
                                <option value="">Semua Unit</option>
                                @foreach($units as $u)
                                    <option value="{{ $u->value }}" {{ request('unit') == $u->value ? 'selected' : '' }}>
                                        {{ $u->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fd-group">
                            <label for="dari" data-i18n="from_date">Dari Tanggal</label>
                            <input type="date" name="dari" id="dari" value="{{ request('dari') }}">
                        </div>

                        <div class="fd-group">
                            <label for="sampai" data-i18n="to_date">Sampai Tanggal</label>
                            <input type="date" name="sampai" id="sampai" value="{{ request('sampai') }}">
                        </div>
                    </div>
                </div>
            </form>

            @if(request()->hasAny(['cari', 'kanwil', 'unit', 'dari', 'sampai', 'hari_ini']))
                <div class="active-filters">
                    <span class="label" data-i18n="active_filters">Filter aktif:</span>
                    @if(request('hari_ini'))
                        <span class="filter-chip" style="background: rgba(200,169,81,0.12); color: #A68B2E; font-weight: 700;">📅 <span data-i18n="today">Hari Ini</span></span>
                    @endif
                    @if(request('cari'))
                        <span class="filter-chip">"{{ request('cari') }}"</span>
                    @endif
                    @if(request('kanwil'))
                        <span class="filter-chip">{{ $offices->firstWhere('id', request('kanwil'))?->name }}</span>
                    @endif
                    @if(request('unit'))
                        <span class="filter-chip"><span data-i18n="chip_unit">Unit</span>: {{ request('unit') }}</span>
                    @endif
                    @if(request('dari'))
                        <span class="filter-chip"><span data-i18n="chip_from">Dari</span>: {{ request('dari') }}</span>
                    @endif
                    @if(request('sampai'))
                        <span class="filter-chip"><span data-i18n="chip_to">Sampai</span>: {{ request('sampai') }}</span>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <script>
        function toggleFilter() {
            const dropdown = document.getElementById('filterDropdown');
            const btn = document.getElementById('btnToggleFilter');
            dropdown.classList.toggle('open');
            btn.classList.toggle('active');
        }

        function setViewMode(mode) {
            localStorage.setItem('hamdans_view', mode);
            const grid = document.querySelector('.card-grid');
            if(grid) {
                if(mode === 'list') {
                    grid.classList.add('list-view');
                } else {
                    grid.classList.remove('list-view');
                }
            }

            // Update buttons
            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.view === mode);
            });
        }
    </script>

    <!-- ═══════ MAIN ═══════ -->
    <main class="main-content" id="activities">
        <div class="section-header">
            <div>
                <h2 data-i18n="latest_activities">Kegiatan Terbaru</h2>
                <span class="count-badge"><span>{{ $activities->total() }}</span> <span data-i18n="published">dipublikasikan</span></span>
            </div>
            <div class="view-modes">
                <button type="button" class="view-btn active" data-view="grid" onclick="setViewMode('grid')" data-title-id="grid_view" data-title-en="Grid View (With Images)" title="Mode Ikon (Dengan Gambar)">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                </button>
                <button type="button" class="view-btn" data-view="list" onclick="setViewMode('list')" data-title-id="Daftar (Tanpa Gambar)" data-title-en="List View (No Images)" title="Mode Daftar (Tanpa Gambar)">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" width="20" height="20"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>

        @if($activities->count())
            <div class="card-grid">
                @foreach($activities as $activity)
                    @php
                        $hasImage = $activity->foto_dokumentasi || $activity->extracted_image;
                    @endphp
                    <a href="{{ route('public.show', $activity) }}" class="activity-card {{ !$hasImage ? 'no-image-card' : '' }}">
                        @if($hasImage)
                            <div class="card-thumb">
                                @if($activity->foto_dokumentasi)
                                    <img src="{{ asset('storage/' . $activity->foto_dokumentasi) }}" alt="{{ Str::limit($activity->extracted_title, 80) }}" loading="lazy">
                                @else
                                    <img src="{{ $activity->extracted_image }}" alt="{{ Str::limit($activity->extracted_title, 80) }}" loading="lazy">
                                @endif
                            </div>
                        @else
                           <!-- Removed no-img-label platform tag as it will be in the footer -->
                        @endif

                        <div class="card-body">
                            <h3>{{ $activity->extracted_title ?? 'Kegiatan dari ' . ($activity->office?->name ?? 'Kemenham') }}</h3>
                            <div class="card-bottom">
                                <span class="platform-badge platform-{{ strtolower($activity->platform?->value ?? 'other') }}">
                                    {{ $activity->platform?->icon() }} {{ $activity->platform?->label() }}
                                </span>
                                <div class="office-label">
                                    <span class="office-dot"></span>
                                    {{ $activity->office?->name ?? '-' }}
                                </div>
                                <span class="relative-time" data-time="{{ ($activity->approved_at ?? $activity->created_at)->toIso8601String() }}">{{ $activity->approved_at?->diffForHumans() ?? $activity->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="pagination-wrapper">
                {{ $activities->links() }}
            </div>
        @else
            <div class="empty-state">
                <div class="icon">📭</div>
                <h3 data-i18n="no_results">Tidak Ada Kegiatan Ditemukan</h3>
                <p data-i18n="no_results_desc">Coba ubah filter pencarian atau <a href="{{ url('/') }}" style="color: var(--blue); font-weight: 600;">reset semua filter</a>.</p>
            </div>
        @endif
    </main>

    <!-- ═══════ FOOTER ═══════ -->
    <footer class="footer">
        <div class="footer-main">
            <!-- Brand Column -->
            <div class="footer-brand">
                <div class="footer-brand-logo">
                    <img src="{{ asset('images/logo_header.png') }}" alt="Logo">
                </div>
                <p class="footer-brand-desc" data-i18n="footer_desc">
                    Portal Kegiatan Harian Kementerian Hak Asasi Manusia Republik Indonesia. Menampilkan kegiatan dan publikasi resmi dari seluruh Kantor Wilayah.
                </p>
                <div class="footer-social">
                    <a href="https://www.instagram.com/kemenham/" target="_blank" title="Instagram">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="https://www.youtube.com/@kementerian_ham" target="_blank" title="YouTube">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="https://x.com/kemenham" target="_blank" title="X / Twitter">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://www.tiktok.com/@kementerianhm" target="_blank" title="TikTok">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="footer-col">
                <h4 class="footer-col-title" data-i18n="footer_links">Tautan</h4>
                <ul class="footer-link-list">
                    <li><a href="{{ url('/') }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0h4"/></svg> <span data-i18n="nav_home">Beranda</span></a></li>
                    <li><a href="https://kemenham.go.id" target="_blank"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/></svg> <span data-i18n="official_website">Website Resmi</span></a></li>

                    <li><a href="{{ route('login') }}"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg> <span data-i18n="nav_login">Login Admin</span></a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="footer-col">
                <h4 class="footer-col-title" data-i18n="contact_us">Hubungi Kami</h4>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </div>
                    <div class="footer-contact-text">
                        <span class="footer-contact-label" data-i18n="phone">Telepon</span>
                        <span class="footer-contact-value">021 - 2526153</span>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    </div>
                    <div class="footer-contact-text">
                        <span class="footer-contact-label">Email</span>
                        <span class="footer-contact-value"> info@kemenham.go.id</span>
                    </div>
                </div>
                <div class="footer-contact-item">
                    <div class="footer-contact-icon">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    </div>
                    <div class="footer-contact-text">
                        <span class="footer-contact-label" data-i18n="our_address">Alamat</span>
                        <span class="footer-contact-value">Jl. HR. Rasuna Said Kav 4-5<br>Kuningan, Jakarta Selatan</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} <span class="footer-accent">HAMDANS</span> — <span data-i18n="footer">Kementerian Hak Asasi Manusia Republik Indonesia</span></p>
        </div>
    </footer>

    <script>
        const heroVideo = document.getElementById('heroBgVideo');
        if (heroVideo) {
            heroVideo.addEventListener('timeupdate', function() {
                // To avoid loop stutter, reset to start slightly before it ends
                if (this.currentTime >= this.duration - 0.15) {
                    this.currentTime = 0;
                    this.play();
                }
            });
        }

        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 60);
        });

        // ──── Language Switcher ────
        const translations = {
            id: {
                login: 'Login Staff',
                ministry: 'Kementerian Hak Asasi Manusia RI',
                hero_desc: 'Portal agregasi kegiatan harian dari seluruh Kantor Wilayah Kementerian Hak Asasi Manusia di Indonesia. Konten dikurasi langsung dari media sosial resmi.',
                activities: 'Kegiatan',
                regional_offices: 'Kanwil dan Wilker',
                today: 'Hari Ini',
                search_placeholder: 'Cari kegiatan...',
                filter: 'Filter',
                search_btn: 'Cari',
                reset: 'Reset',
                kanwil_label: 'KANTOR WILAYAH',
                unit_label: 'UNIT KERJA',
                from_date: 'DARI TANGGAL',
                to_date: 'SAMPAI TANGGAL',
                all_kanwil: 'Semua Kanwil',
                all_unit: 'Semua Unit',
                active_filters: 'Filter aktif:',
                latest_activities: 'Kegiatan Terbaru',
                published: 'dipublikasikan',
                no_results: 'Tidak Ada Kegiatan Ditemukan',
                no_results_desc: 'Coba ubah filter pencarian atau <a href="/" style="color: var(--blue); font-weight: 600;">reset semua filter</a>.',
                footer: 'Kementerian Hak Asasi Manusia Republik Indonesia',
                footer_desc: 'Portal Kegiatan Harian Kementerian Hak Asasi Manusia Republik Indonesia. Menampilkan kegiatan dan publikasi resmi dari seluruh Kantor Wilayah.',
                footer_links: 'Tautan',
                nav_home: 'Beranda',
                official_website: 'Website Resmi',
                nav_login: 'Login Admin',
                contact_us: 'Hubungi Kami',
                phone: 'Telepon',
                our_address: 'Alamat',
                about: 'Tentang',
                grid_title: 'Mode Ikon (Dengan Gambar)',
                list_title: 'Mode Daftar (Tanpa Gambar)',
                chip_unit: 'Unit',
                chip_from: 'Dari',
                chip_to: 'Sampai',
            },
            en: {
                login: 'Staff Login',
                ministry: 'Ministry of Human Rights Republic of Indonesia',
                hero_desc: 'Daily activity aggregation portal from all Regional Offices of the Ministry of Human Rights in Indonesia. Content curated directly from official social media.',
                activities: 'Activities',
                regional_offices: 'Regional Offices',
                today: 'Today',
                search_placeholder: 'Search activities...',
                filter: 'Filter',
                search_btn: 'Search',
                reset: 'Reset',
                kanwil_label: 'REGIONAL OFFICE',
                unit_label: 'WORK UNIT',
                from_date: 'FROM DATE',
                to_date: 'TO DATE',
                all_kanwil: 'All Offices',
                all_unit: 'All Units',
                active_filters: 'Active filters:',
                latest_activities: 'Latest Activities',
                published: 'published',
                no_results: 'No Activities Found',
                no_results_desc: 'Try changing your search filters or <a href="/" style="color: var(--blue); font-weight: 600;">reset all filters</a>.',
                footer: 'Ministry of Human Rights Republic of Indonesia',
                footer_desc: 'Daily Activity Portal of the Ministry of Human Rights of the Republic of Indonesia. Showcasing official activities and publications from all Regional Offices.',
                footer_links: 'Links',
                nav_home: 'Home',
                official_website: 'Official Website',
                nav_login: 'Admin Login',
                contact_us: 'Contact Us',
                phone: 'Phone',
                our_address: 'Address',
                about: 'About',
                grid_title: 'Grid View (With Images)',
                list_title: 'List View (No Images)',
                chip_unit: 'Unit',
                chip_from: 'From',
                chip_to: 'To',
            }
        };

        function setLang(lang) {
            localStorage.setItem('hamdans_lang', lang);

            // Update toggle buttons
            document.querySelectorAll('.lang-opt').forEach(btn => {
                btn.classList.toggle('active', btn.dataset.lang === lang);
            });

            // Update all data-i18n elements
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.dataset.i18n;
                if (translations[lang][key]) {
                    el.innerHTML = translations[lang][key];
                }
            });

            // Update placeholders
            const searchInput = document.querySelector('.filter-search-input input');
            if (searchInput) searchInput.placeholder = translations[lang].search_placeholder;

            // Update select first options
            const kanwilSelect = document.getElementById('kanwil');
            const unitSelect = document.getElementById('unit');
            if (kanwilSelect && kanwilSelect.options[0]) kanwilSelect.options[0].text = translations[lang].all_kanwil;
            if (unitSelect && unitSelect.options[0]) unitSelect.options[0].text = translations[lang].all_unit;

            // Update filter dropdown labels
            const fdLabels = document.querySelectorAll('.fd-group label');
            const labelKeys = ['kanwil_label', 'unit_label', 'from_date', 'to_date'];
            fdLabels.forEach((label, i) => {
                if (labelKeys[i] && translations[lang][labelKeys[i]]) {
                    label.textContent = translations[lang][labelKeys[i]];
                }
            });

            // Update active filters label
            const afLabel = document.querySelector('.active-filters .label');
            if (afLabel) afLabel.textContent = translations[lang].active_filters;

            // Update view mode button tooltips
            document.querySelectorAll('.view-btn[data-view="grid"]').forEach(btn => {
                btn.title = translations[lang].grid_title;
            });
            document.querySelectorAll('.view-btn[data-view="list"]').forEach(btn => {
                btn.title = translations[lang].list_title;
            });

            // Update relative timestamps
            updateRelativeTimes(lang);

            // Update pagination text (Showing X to Y of Z results)
            document.querySelectorAll('.pagination-wrapper p, [role="navigation"] p, .text-sm').forEach(el => {
                const text = el.textContent.trim();
                const match = text.match(/(?:Showing|Menampilkan)\s+(\d+)\s+(?:to|sampai)\s+(\d+)\s+(?:of|dari)\s+(\d+)\s+(?:results|hasil)/i);
                if (match) {
                    const [, from, to, total] = match;
                    el.textContent = lang === 'en'
                        ? `Showing ${from} to ${to} of ${total} results`
                        : `Menampilkan ${from} sampai ${to} dari ${total} hasil`;
                }
            });
        }

        // ──── Relative Time in ID/EN ────
        function relativeTime(isoString, lang) {
            const now = new Date();
            const date = new Date(isoString);
            const diffMs = now - date;
            const seconds = Math.floor(diffMs / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);
            const weeks = Math.floor(days / 7);
            const months = Math.floor(days / 30);
            const years = Math.floor(days / 365);

            const labels = {
                id: {
                    just_now: 'baru saja',
                    seconds: s => `${s} detik yang lalu`,
                    minutes: m => `${m} menit yang lalu`,
                    hours: h => `${h} jam yang lalu`,
                    days: d => `${d} hari yang lalu`,
                    weeks: w => `${w} minggu yang lalu`,
                    months: m => `${m} bulan yang lalu`,
                    years: y => `${y} tahun yang lalu`,
                },
                en: {
                    just_now: 'just now',
                    seconds: s => `${s} second${s > 1 ? 's' : ''} ago`,
                    minutes: m => `${m} minute${m > 1 ? 's' : ''} ago`,
                    hours: h => `${h} hour${h > 1 ? 's' : ''} ago`,
                    days: d => `${d} day${d > 1 ? 's' : ''} ago`,
                    weeks: w => `${w} week${w > 1 ? 's' : ''} ago`,
                    months: m => `${m} month${m > 1 ? 's' : ''} ago`,
                    years: y => `${y} year${y > 1 ? 's' : ''} ago`,
                }
            };

            const l = labels[lang] || labels.id;

            if (seconds < 10) return l.just_now;
            if (seconds < 60) return l.seconds(seconds);
            if (minutes < 60) return l.minutes(minutes);
            if (hours < 24) return l.hours(hours);
            if (days < 7) return l.days(days);
            if (weeks < 5) return l.weeks(weeks);
            if (months < 12) return l.months(months);
            return l.years(years);
        }

        function updateRelativeTimes(lang) {
            document.querySelectorAll('.relative-time[data-time]').forEach(el => {
                el.textContent = relativeTime(el.dataset.time, lang);
            });
        }

        // ──── Animated Count-Up ────
        function animateCountUp(el) {
            const target = parseInt(el.getAttribute('data-count')) || 0;
            const duration = 1800;
            const start = performance.now();

            function easeOutExpo(t) {
                return t === 1 ? 1 : 1 - Math.pow(2, -10 * t);
            }

            function tick(now) {
                const elapsed = now - start;
                const progress = Math.min(elapsed / duration, 1);
                const eased = easeOutExpo(progress);
                el.textContent = Math.round(eased * target);
                if (progress < 1) requestAnimationFrame(tick);
            }

            requestAnimationFrame(tick);
        }

        // Trigger count-up when stats are visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.stat-num[data-count]').forEach(el => {
                        animateCountUp(el);
                    });
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        // Initialize language on page load
        document.addEventListener('DOMContentLoaded', () => {
            const savedLang = localStorage.getItem('hamdans_lang') || 'id';
            setLang(savedLang);

            const savedView = localStorage.getItem('hamdans_view') || 'grid';
            setViewMode(savedView);

            // Start observing the stats row
            const statsRow = document.querySelector('.stats-row');
            if (statsRow) statsObserver.observe(statsRow);
        });
    </script>

</body>
</html>
