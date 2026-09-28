<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>Campus Coin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">


    <style>

        /* =========================================================
           CAMPUS COIN — HOME THEME
        ========================================================= */

        :root {

            --dark: #080E0B;

            --surface: #0D1813;

            --card: #12231B;

            --border: #1A3326;

            --neon: #00F59B;

            --emerald: #10B981;

            --muted: #718E81;

            --text: #E8F5EF;

            --white: #ffffff;

            --danger: #ff5c67;

            --shadow-neon:
                0 0 20px rgba(0,245,155,.12);

            --shadow-neon-lg:
                0 0 35px rgba(0,245,155,.18);

        }


        /* =========================================================
           RESET
        ========================================================= */

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }


        html {

            scroll-behavior: smooth;

        }


        body {

            min-height: 100vh;

            font-family:
                'Plus Jakarta Sans',
                Arial,
                Helvetica,
                sans-serif;

            background:

                radial-gradient(
                    circle at 15% 10%,
                    rgba(0,245,155,.07),
                    transparent 30%
                ),

                radial-gradient(
                    circle at 85% 90%,
                    rgba(16,185,129,.05),
                    transparent 30%
                ),

                var(--dark);

            color: var(--text);

        }


        a {

            text-decoration: none;

        }


        button,
        input,
        select,
        textarea {

            font-family: inherit;

        }


        /* =========================================================
           SIDEBAR
        ========================================================= */

        .campus-sidebar {

            position: fixed;

            top: 0;
            left: 0;

            width: 245px;

            height: 100vh;

            background:

                linear-gradient(
                    180deg,
                    #0A1711 0%,
                    #080E0B 100%
                );

            border-right: 1px solid var(--border);

            color: var(--white);

            padding: 25px 12px 18px;

            display: flex;

            flex-direction: column;

            z-index: 9999;

            box-shadow:
                10px 0 40px rgba(0,0,0,.22);

        }


        /* =========================================================
           BRAND
        ========================================================= */

        .sidebar-brand {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 5px 14px 25px;

            margin-bottom: 8px;

            border-bottom: 1px solid
                rgba(0,245,155,.08);

        }


        .sidebar-brand-icon {

            width: 39px;

            height: 39px;

            display: flex;

            align-items: center;

            justify-content: center;

            border-radius: 11px;

            background:

                rgba(0,245,155,.10);

            border: 1px solid
                rgba(0,245,155,.25);

            color: var(--neon);

            font-size: 20px;

            box-shadow:
                0 0 18px
                rgba(0,245,155,.10);

        }


        .sidebar-brand-name {

            font-size: 17px;

            font-weight: 800;

            letter-spacing: -.4px;

            color: var(--white);

        }


        .sidebar-brand-name span {

            color: var(--neon);

        }


        /* =========================================================
           MENU TITLE
        ========================================================= */

        .sidebar-menu-title {

            padding: 18px 15px 9px;

            font-size: 9px;

            font-weight: 700;

            letter-spacing: 1.8px;

            text-transform: uppercase;

            color: #4D695B;

        }


        /* =========================================================
           NAVIGATION
        ========================================================= */

        .sidebar-navigation {

            display: flex;

            flex-direction: column;

            gap: 5px;

        }


        .sidebar-navigation a {

            position: relative;

            height: 44px;

            display: flex;

            align-items: center;

            gap: 14px;

            padding: 0 14px;

            border-radius: 10px;

            color: #8FA99C;

            font-size: 12px;

            font-weight: 600;

            transition:
                background .2s ease,
                color .2s ease,
                transform .2s ease,
                box-shadow .2s ease;

            border: 1px solid transparent;

        }


        .sidebar-navigation a:hover {

            background:
                rgba(0,245,155,.055);

            color: #DDFCEF;

            border-color:
                rgba(0,245,155,.08);

            transform:
                translateX(2px);

        }


        .sidebar-navigation a.active {

            background:

                linear-gradient(
                    90deg,
                    rgba(0,245,155,.14),
                    rgba(0,245,155,.055)
                );

            color: var(--neon);

            border-color:
                rgba(0,245,155,.15);

            box-shadow:
                inset 3px 0 0 var(--neon),
                0 0 18px rgba(0,245,155,.06);

        }


        .sidebar-navigation a.active::after {

            content: "";

            position: absolute;

            right: 12px;

            width: 5px;

            height: 5px;

            border-radius: 50%;

            background: var(--neon);

            box-shadow:
                0 0 9px var(--neon);

        }


        .sidebar-icon {

            width: 22px;

            min-width: 22px;

            height: 22px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: inherit;

            font-size: 14px;

            font-family:
                'JetBrains Mono',
                monospace;

        }


        /* =========================================================
           LOGOUT
        ========================================================= */

        .sidebar-logout {

            margin-top: auto;

            padding-top: 14px;

            border-top:
                1px solid
                rgba(0,245,155,.08);

        }


        .sidebar-logout button {

            width: 100%;

            height: 44px;

            display: flex;

            align-items: center;

            gap: 14px;

            padding: 0 14px;

            border: 1px solid transparent;

            border-radius: 10px;

            background: transparent;

            color: #8FA99C;

            font-size: 12px;

            font-weight: 600;

            cursor: pointer;

            text-align: left;

            transition: .2s ease;

        }


        .sidebar-logout button:hover {

            color: #ff858c;

            background:
                rgba(255,92,103,.07);

            border-color:
                rgba(255,92,103,.12);

        }


        .sidebar-logout button .sidebar-icon {

            color: inherit;

        }


        /* =========================================================
           MAIN CONTENT
        ========================================================= */

        .admin-main {

            margin-left: 245px;

            min-height: 100vh;

            padding: 30px;

            position: relative;

            background:

                radial-gradient(
                    circle at 70% 0%,
                    rgba(0,245,155,.045),
                    transparent 28%
                ),

                var(--dark);

        }


        /* =========================================================
           TOP GLOW
        ========================================================= */

        .admin-main::before {

            content: "";

            position: fixed;

            top: -180px;

            right: -150px;

            width: 420px;

            height: 420px;

            border-radius: 50%;

            background:
                rgba(0,245,155,.035);

            filter: blur(80px);

            pointer-events: none;

            z-index: 0;

        }


        /* =========================================================
           CONTENT WRAPPER SUPPORT
        ========================================================= */

        .admin-main > * {

            position: relative;

            z-index: 1;

        }


        /* =========================================================
           GLOBAL CARDS
           
           Existing admin pages ke cards bhi automatically
           Home theme ke saath match karenge.
        ========================================================= */

        .card,
        .admin-card,
        .glass-card {

            background:
                linear-gradient(
                    145deg,
                    rgba(18,35,27,.96),
                    rgba(13,24,19,.96)
                ) !important;

            border:
                1px solid var(--border) !important;

            color: var(--text);

            border-radius: 14px;

            box-shadow:
                0 12px 35px
                rgba(0,0,0,.18);

        }


        /* =========================================================
           GLOBAL HEADINGS
        ========================================================= */

        .admin-main h1,
        .admin-main h2,
        .admin-main h3,
        .admin-main h4 {

            color: var(--white);

        }


        /* =========================================================
           TABLES
        ========================================================= */

        .admin-main table {

            color: var(--text);

            border-color: var(--border);

        }


        .admin-main table thead th {

            background:
                rgba(0,245,155,.055);

            color: var(--neon);

            border-color: var(--border);

        }


        .admin-main table tbody td {

            background:
                rgba(13,24,19,.75);

            color: #C5D8CF;

            border-color: var(--border);

        }


        .admin-main table tbody tr:hover td {

            background:
                rgba(0,245,155,.035);

        }


        /* =========================================================
           INPUTS
        ========================================================= */

        .admin-main input,
        .admin-main select,
        .admin-main textarea {

            background:
                #0D1813 !important;

            color:
                #E8F5EF !important;

            border:
                1px solid #1A3326 !important;

            border-radius: 9px;

            outline: none;

        }


        .admin-main input:focus,
        .admin-main select:focus,
        .admin-main textarea:focus {

            border-color:
                rgba(0,245,155,.55) !important;

            box-shadow:
                0 0 0 3px
                rgba(0,245,155,.08) !important;

        }


        .admin-main input::placeholder,
        .admin-main textarea::placeholder {

            color: #526B60;

        }


        /* =========================================================
           BUTTONS
        ========================================================= */

        .admin-main .btn-primary {

            background:
                var(--neon) !important;

            border-color:
                var(--neon) !important;

            color:
                #06120C !important;

            font-weight: 700;

            border-radius: 9px;

            box-shadow:
                0 0 18px
                rgba(0,245,155,.15);

        }


        .admin-main .btn-primary:hover {

            background:
                #39FFB5 !important;

            border-color:
                #39FFB5 !important;

            box-shadow:
                0 0 25px
                rgba(0,245,155,.25);

        }


        /* =========================================================
           BADGES
        ========================================================= */

        .admin-main .badge {

            border-radius: 999px;

        }


        /* =========================================================
           SCROLLBAR
        ========================================================= */

        ::-webkit-scrollbar {

            width: 8px;

        }


        ::-webkit-scrollbar-track {

            background:
                #080E0B;

        }


        ::-webkit-scrollbar-thumb {

            background:
                #1A3326;

            border-radius: 20px;

        }


        ::-webkit-scrollbar-thumb:hover {

            background:
                #27533D;

        }


        /* =========================================================
           MOBILE
        ========================================================= */

        @media(max-width: 900px) {

            .campus-sidebar {

                width: 76px;

                padding:
                    20px 9px 15px;

            }


            .sidebar-brand {

                justify-content: center;

                padding:
                    5px 0 20px;

            }


            .sidebar-brand-name {

                display: none;

            }


            .sidebar-menu-title {

                display: none;

            }


            .sidebar-navigation a {

                justify-content: center;

                padding: 0;

                gap: 0;

            }


            .sidebar-navigation a span:not(.sidebar-icon) {

                display: none;

            }


            .sidebar-navigation a.active::after {

                right: 5px;

            }


            .sidebar-logout button {

                justify-content: center;

                padding: 0;

                gap: 0;

            }


            .sidebar-logout button span:not(.sidebar-icon) {

                display: none;

            }


            .admin-main {

                margin-left: 76px;

                padding: 22px;

            }

        }


        @media(max-width: 500px) {

            .campus-sidebar {

                width: 62px;

            }


            .sidebar-brand-icon {

                width: 35px;

                height: 35px;

                font-size: 17px;

            }


            .admin-main {

                margin-left: 62px;

                padding: 15px;

            }

        }

    </style>


    @stack('styles')

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<aside class="campus-sidebar">


    <!-- BRAND -->

    <div class="sidebar-brand">

        <div class="sidebar-brand-icon">
            🌿
        </div>

        <div class="sidebar-brand-name">
            Campus <span>Coin</span>
        </div>

    </div>


    <!-- MENU LABEL -->

    <div class="sidebar-menu-title">
        Main Menu
    </div>


    <!-- NAVIGATION -->

    <nav class="sidebar-navigation">


        <!-- DASHBOARD -->

        <a href="{{ url('/admin/dashboard') }}"
           class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">

            <span class="sidebar-icon">
                ▣
            </span>

            <span>
                Dashboard
            </span>

        </a>


        <!-- USERS -->

        <a href="{{ url('/admin/users') }}"
           class="{{ request()->is('admin/users*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                ♟
            </span>

            <span>
                Users
            </span>

        </a>


        <!-- CATEGORIES -->

        <a href="{{ url('/admin/categories') }}"
           class="{{ request()->is('admin/categories*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                ▦
            </span>

            <span>
                Categories
            </span>

        </a>


        <!-- TRANSACTIONS -->

        <a href="{{ url('/admin/transactions') }}"
           class="{{ request()->is('admin/transactions*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                ↔
            </span>

            <span>
                Transactions
            </span>

        </a>


        <!-- INSIGHTS -->

        <a href="{{ url('/admin/insights') }}"
           class="{{ request()->is('admin/insights*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                i
            </span>

            <span>
                Insights
            </span>

        </a>


        <!-- REPORTS -->

        <a href="{{ url('/admin/reports') }}"
           class="{{ request()->is('admin/reports*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                ▤
            </span>

            <span>
                Reports
            </span>

        </a>


        <!-- BUDGET -->

        <a href="{{ url('/admin/budget') }}"
           class="{{ request()->is('admin/budget*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                Rs
            </span>

            <span>
                Budget
            </span>

        </a>


        <!-- ANNOUNCEMENTS -->

        <a href="{{ url('/admin/announcements') }}"
           class="{{ request()->is('admin/announcements*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                !
            </span>

            <span>
                Announcements
            </span>

        </a>


        <!-- SETTINGS -->

        <a href="{{ url('/admin/settings') }}"
           class="{{ request()->is('admin/settings*') ? 'active' : '' }}">

            <span class="sidebar-icon">
                ⚙
            </span>

            <span>
                Settings
            </span>

        </a>


    </nav>


    <!-- =====================================================
         LOGOUT
    ====================================================== -->

    <div class="sidebar-logout">

        <form action="{{ url('/logout') }}"
              method="POST">

            @csrf

            <button type="submit">

                <span class="sidebar-icon">
                    ↪
                </span>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>


</aside>


<!-- =========================================================
     MAIN CONTENT
========================================================= -->

<main class="admin-main">

    @yield('content')

</main>


@stack('scripts')


</body>

</html>