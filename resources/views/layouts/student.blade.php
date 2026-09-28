<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Student Dashboard') | Campus Coin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
          rel="stylesheet">

    <style>

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
        }

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
            font-family: 'Plus Jakarta Sans', Arial, sans-serif;

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


        /* ==========================================
           STUDENT SIDEBAR
        ========================================== */

        .student-sidebar {
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

            padding: 25px 12px 18px;

            display: flex;
            flex-direction: column;

            z-index: 9999;

            box-shadow:
                10px 0 40px rgba(0,0,0,.22);

            overflow-y: auto;
            overflow-x: hidden;
        }


        /* ==========================================
           BRAND
        ========================================== */

        .student-brand {
            display: flex;
            align-items: center;
            gap: 12px;

            padding: 5px 14px 25px;
            margin-bottom: 8px;

            border-bottom:
                1px solid rgba(0,245,155,.08);
        }

        .student-brand-icon {
            width: 40px;
            height: 40px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 11px;

            background:
                rgba(0,245,155,.10);

            border:
                1px solid rgba(0,245,155,.25);

            color: var(--neon);

            font-size: 20px;

            box-shadow:
                0 0 18px rgba(0,245,155,.10);
        }

        .student-brand-name {
            font-size: 17px;
            font-weight: 800;
            letter-spacing: -.4px;
            color: var(--white);
        }

        .student-brand-name span {
            color: var(--neon);
        }


        /* ==========================================
           STUDENT PROFILE
        ========================================== */

        .student-profile {
            display: flex;
            align-items: center;
            gap: 11px;

            padding: 15px 13px;

            margin: 8px 0 5px;

            background:
                rgba(0,245,155,.035);

            border:
                1px solid rgba(0,245,155,.08);

            border-radius: 11px;
        }

        .student-avatar {
            width: 38px;
            height: 38px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                rgba(0,245,155,.10);

            border:
                1px solid rgba(0,245,155,.22);

            color: var(--neon);

            font-family:
                'JetBrains Mono',
                monospace;

            font-weight: 700;

            flex-shrink: 0;
        }

        .student-profile-name {
            color: var(--white);
            font-size: 11px;
            font-weight: 700;

            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .student-profile-role {
            color: var(--muted);
            font-size: 9px;
            margin-top: 3px;
        }


        /* ==========================================
           MENU
        ========================================== */

        .student-menu-title {
            padding: 18px 15px 9px;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 1.8px;

            text-transform: uppercase;

            color: #4D695B;
        }

        .student-navigation {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .student-navigation a {
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

            border: 1px solid transparent;

            transition: .2s ease;
        }

        .student-navigation a:hover {
            background:
                rgba(0,245,155,.055);

            color: #DDFCEF;

            border-color:
                rgba(0,245,155,.08);

            transform:
                translateX(2px);
        }

        .student-navigation a.active {
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

        .student-navigation a.active::after {
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

        .student-icon {
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


        /* ==========================================
           MORE DROPDOWN
        ========================================== */

        .more-dropdown {
            width: 100%;
        }

        .more-toggle {
            position: relative;

            width: 100%;
            height: 44px;

            display: flex;
            align-items: center;

            gap: 14px;

            padding: 0 14px;

            border-radius: 10px;

            color: #8FA99C;

            font-size: 12px;
            font-weight: 600;

            border: 1px solid transparent;

            background: transparent;

            cursor: pointer;

            text-align: left;

            transition: .2s ease;
        }

        .more-toggle:hover {
            background:
                rgba(0,245,155,.055);

            color: #DDFCEF;

            border-color:
                rgba(0,245,155,.08);

            transform:
                translateX(2px);
        }

        .more-toggle .more-arrow {
            margin-left: auto;

            font-size: 14px;

            color: #718E81;

            transition: .25s ease;
        }

        .more-toggle.open .more-arrow {
            transform: rotate(180deg);
            color: var(--neon);
        }


        /* ==========================================
           MORE SUB MENU
        ========================================== */

        .more-submenu {
            display: none;

            margin: 4px 0 3px 14px;

            padding-left: 10px;

            border-left:
                1px solid rgba(0,245,155,.16);

            animation:
                moreSlide .2s ease;
        }

        .more-submenu.show {
            display: block;
        }

        @keyframes moreSlide {

            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .more-submenu a {
            height: 40px;

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 0 12px;

            margin-bottom: 3px;

            border-radius: 8px;

            color: #789487;

            font-size: 11px;
            font-weight: 600;

            border: 1px solid transparent;

            transition: .2s ease;
        }

        .more-submenu a:hover {
            background:
                rgba(0,245,155,.055);

            color: var(--neon);

            border-color:
                rgba(0,245,155,.08);
        }

        .more-submenu a.active {
            background:
                rgba(0,245,155,.10);

            color: var(--neon);

            border-color:
                rgba(0,245,155,.13);

            box-shadow:
                inset 2px 0 0 var(--neon);
        }

        .more-sub-icon {
            width: 22px;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 14px;
        }


        /* ==========================================
           LOGOUT
        ========================================== */

        .student-logout {
            margin-top: auto;

            padding-top: 14px;

            border-top:
                1px solid rgba(0,245,155,.08);
        }

        .student-logout button {
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

        .student-logout button:hover {
            color: #ff858c;

            background:
                rgba(255,92,103,.07);

            border-color:
                rgba(255,92,103,.12);
        }


        /* ==========================================
           MAIN
        ========================================== */

        .student-main {
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

        .student-main::before {
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

        .student-main > * {
            position: relative;
            z-index: 1;
        }


        /* ==========================================
           MOBILE
        ========================================== */

        @media(max-width: 900px) {

            .student-sidebar {
                width: 76px;

                padding:
                    20px 9px 15px;
            }

            .student-brand {
                justify-content: center;

                padding:
                    5px 0 20px;
            }

            .student-brand-name {
                display: none;
            }

            .student-profile {
                justify-content: center;

                padding: 10px 0;
            }

            .student-profile > div:last-child {
                display: none;
            }

            .student-menu-title {
                display: none;
            }

            .student-navigation a {
                justify-content: center;

                padding: 0;

                gap: 0;
            }

            .student-navigation a span:not(.student-icon) {
                display: none;
            }

            .student-navigation a.active::after {
                right: 5px;
            }


            /* MORE MOBILE */

            .more-toggle {
                justify-content: center;

                padding: 0;

                gap: 0;
            }

            .more-toggle .more-arrow {
                display: none;
            }

            .more-toggle > span:not(.student-icon) {
                display: none;
            }

            .more-submenu {
                margin-left: 0;
                padding-left: 0;

                border-left: none;
            }

            .more-submenu a {
                justify-content: center;

                padding: 0;
            }

            .more-submenu a span:not(.more-sub-icon) {
                display: none;
            }

            .more-sub-icon {
                width: 22px;
            }


            .student-logout button {
                justify-content: center;

                padding: 0;

                gap: 0;
            }

            .student-logout button span:not(.student-icon) {
                display: none;
            }

            .student-main {
                margin-left: 76px;

                padding: 22px;
            }
        }


        @media(max-width: 500px) {

            .student-sidebar {
                width: 62px;
            }

            .student-brand-icon {
                width: 35px;
                height: 35px;

                font-size: 17px;
            }

            .student-main {
                margin-left: 62px;

                padding: 15px;
            }
        }

    </style>

    @stack('styles')

</head>


<body>


<!-- ==========================================
     STUDENT SIDEBAR
========================================== -->

<aside class="student-sidebar">


    <!-- BRAND -->

    <div class="student-brand">

        <div class="student-brand-icon">
            🌿
        </div>

        <div class="student-brand-name">
            Campus <span>Coin</span>
        </div>

    </div>


    <!-- PROFILE -->



    <!-- MENU -->

    <div class="student-menu-title">
        Student Menu
    </div>


    <nav class="student-navigation">


        <!-- DASHBOARD -->

        <a href="{{ url('/dashboard') }}"
           class="{{ request()->is('dashboard') ? 'active' : '' }}">

            <span class="student-icon">
                ▣
            </span>

            <span>
                Dashboard
            </span>

   <a href="/dashboard/category">
    <span class="student-icon">🏷️</span>
    <span>Category</span>
</a>

        <!-- TRANSACTIONS -->

        <a href="{{ url('/dashboard/transactions') }}"
           class="{{ request()->is('dashboard/transactions*') ? 'active' : '' }}">

            <span class="student-icon">
                ↔
            </span>

            <span>
                Transactions
            </span>

        </a>


        {{--  <!-- BUDGET -->

        <a href="{{ url('/dashboard/budgets') }}"
           {{--  class="{{ request()->is('dashboard/budgets*') ? 'active' : '' }}">

            <span class="student-icon">
                Rs
            </span>

            <span>
                My Budget
            </span>

        </a>  --}}  

        {{--  <a href="{{ url('/dashboard/budgets') }}"
   class="{{ request()->is('dashboard/budgets*') ? 'active' : '' }}">
    <span class="student-icon">Rs</span>
    <span>My Budget</span>
</a>  --}}
        <a href="{{ route('dashboard.reports') }}"
   class="{{ request()->is('dashboard/reports*') ? 'active' : '' }}">
    <span class="student-icon">📊</span>
    <span>Reports</span>
</a>


<a href="{{ url('/dashboard/insights') }}"
class="{{ request()->is('dashboard/insights*') ? 'active' : '' }}">

<span class="student-icon">
    □
</span>

<span>
    AI insights
</span>

</a>

<!-- CALENDAR -->

<a href="{{ url('/dashboard/calendar') }}"
   class="{{ request()->is('dashboard/calendar*') ? 'active' : '' }}">

    <span class="student-icon">
        □
    </span>

    <span>
        Calendar
    </span>

</a>

        <!-- ANNOUNCEMENTS -->

        <a href="{{ url('/dashboard/announcements') }}"
           class="{{ request()->is('dashboard/announcements*') ? 'active' : '' }}">

            <span class="student-icon">
                !
            </span>

            <span>
                Announcements
            </span>

        </a>


        <!-- PROFILE -->

        <a href="{{ url('/dashboard/profile') }}"
           class="{{ request()->is('dashboard/profile*') ? 'active' : '' }}">

            <span class="student-icon">
                ♟
            </span>

            <span>
                Settings
            </span>

        </a>


        <!-- ======================================
             MORE DROPDOWN
        ======================================= -->

        <div class="more-dropdown">


            <button
                type="button"
                class="more-toggle"
                id="moreToggle"
                onclick="toggleMoreMenu()"
            >

                <span class="student-icon">
                    ⋯
                </span>

                <span>
                    More
                </span>

                <span class="more-arrow">
                   ⌄
                </span>

            </button>


            <!-- MORE ITEMS -->

            <div
                class="more-submenu"
                id="moreSubmenu"
            >

                <!-- SAVING TIPS -->

                <a
                    href="{{ route('dashboard.saving-tips') }}"
                    class="{{ request()->routeIs('dashboard.saving-tips') ? 'active' : '' }}"
                >

                    <span class="more-sub-icon">
                        💡
                    </span>

                    <span>
                        Saving Tips
                    </span>

                </a>

            </div>

        </div>


    </nav>


    <!-- LOGOUT -->

    <div class="student-logout">

        <form action="{{ url('/logout') }}"
              method="POST">

            @csrf

            <button type="submit">

                <span class="student-icon">
                    ↪
                </span>

                <span>
                    Logout
                </span>

            </button>

        </form>

    </div>


</aside>


<!-- ==========================================
     MAIN CONTENT
========================================== -->

<main class="student-main">

    @yield('content')

</main>


<script>

/*
|--------------------------------------------------------------------------
| MORE DROPDOWN
|--------------------------------------------------------------------------
*/

function toggleMoreMenu()
{
    const menu = document.getElementById('moreSubmenu');
    const button = document.getElementById('moreToggle');

    menu.classList.toggle('show');

    button.classList.toggle('open');
}


/*
|--------------------------------------------------------------------------
| AUTO OPEN MORE IF SAVING TIPS IS ACTIVE
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', function () {

    const savingTips =
        document.querySelector(
            '.more-submenu a.active'
        );

    if (savingTips) {

        document
            .getElementById('moreSubmenu')
            .classList.add('show');

        document
            .getElementById('moreToggle')
            .classList.add('open');
    }

});

</script>


@stack('scripts')

</body>

</html>
