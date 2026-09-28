<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leaderboard — Campus Coin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: '#080E0B',
                        surface: '#0D1813',
                        card: '#12231B',
                        border: '#1A3326',
                        neon: '#00F59B',
                        emerald: '#10B981',
                        muted: '#718E81'
                    },
                    fontFamily: {
                        jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                        mono: ['JetBrains Mono', 'monospace']
                    },
                    boxShadow: {
                        neon: '0 0 25px rgba(0,245,155,0.25)',
                        'neon-lg': '0 0 50px rgba(0,245,155,0.18)',
                        'neon-card': '0 10px 40px rgba(0,0,0,0.35)'
                    }
                }
            }
        }
    </script>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: #080E0B;
            color: #e8f5ef;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(0,245,155,.035) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,245,155,.035) 1px, transparent 1px);
            background-size: 45px 45px;
        }

        .glass {
            background: rgba(13, 24, 19, 0.78);
            border: 1px solid #1A3326;
            backdrop-filter: blur(14px);
        }

        .rank-card {
            transition: all .3s ease;
        }

        .rank-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0,245,155,.4);
            box-shadow: 0 18px 45px rgba(0,0,0,.35);
        }

        .podium-card {
            transition: all .3s ease;
        }

        .podium-card:hover {
            transform: translateY(-8px);
        }

        .podium-glow {
            box-shadow: 0 0 45px rgba(0,245,155,.12);
        }

        .avatar {
            background:
                linear-gradient(
                    135deg,
                    rgba(0,245,155,.18),
                    rgba(16,185,129,.04)
                );
        }

        .scroll-table {
            overflow-x: auto;
        }
    </style>
</head>

<body class="grid-bg">

    <!-- ================= NAVBAR ================= -->
    <nav class="sticky top-0 z-50 glass">

        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="h-20 flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-neon/10
                                border border-neon/30
                                flex items-center justify-center
                                shadow-neon">

                        <svg class="w-6 h-6 text-neon"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <circle cx="12" cy="12" r="9" stroke-width="1.8"/>

                            <path d="M12 7v10M9 10h5a2 2 0 010 4H9"
                                  stroke-width="1.8"
                                  stroke-linecap="round"/>

                        </svg>

                    </div>

                    <div>

                        <div class="text-lg font-extrabold tracking-tight">
                            Campus<span class="text-neon">Coin</span>
                        </div>

                        <div class="text-[10px] text-muted font-mono tracking-widest">
                            SMART CAMPUS PAYMENTS
                        </div>

                    </div>

                </a>


                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-7 text-sm">

                    <a href="{{ route('home') }}"
                       class="text-gray-300 hover:text-neon transition">
                        Home
                    </a>

                    <a href="{{ route('features') }}"
                       class="text-gray-300 hover:text-neon transition">
                        Features
                    </a>

                    <a href="{{ route('how-it-works') }}"
                       class="text-gray-300 hover:text-neon transition">
                        How It Works
                    </a>

                    <a href="{{ route('perks') }}"
                       class="text-gray-300 hover:text-neon transition">
                        Campus Perks
                    </a>

                    <a href="{{ route('leaderboard') }}"
                       class="text-neon font-semibold">
                        Leaderboard
                    </a>

                    <a href="{{ route('faq') }}"
                       class="text-gray-300 hover:text-neon transition">
                        FAQ
                    </a>

                </div>


                <!-- Auth Buttons -->
                <div class="hidden md:flex items-center gap-3">

                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 rounded-xl
                              text-sm font-semibold
                              text-gray-300
                              hover:text-white
                              transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2.5 rounded-xl
                              bg-neon
                              text-dark
                              font-bold
                              text-sm
                              hover:shadow-neon
                              transition">

                        Get Started

                    </a>

                </div>


                <!-- Mobile Button -->
                <button id="mobileMenuBtn"
                        type="button"
                        class="md:hidden text-gray-300">

                    <svg class="w-7 h-7"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>

                    </svg>

                </button>

            </div>


            <!-- Mobile Menu -->
            <div id="mobileMenu" class="hidden md:hidden pb-5">

                <div class="flex flex-col gap-3 pt-3 border-t border-border">

                    <a href="{{ route('home') }}"
                       class="py-2 text-gray-300">
                        Home
                    </a>

                    <a href="{{ route('features') }}"
                       class="py-2 text-gray-300">
                        Features
                    </a>

                    <a href="{{ route('how-it-works') }}"
                       class="py-2 text-gray-300">
                        How It Works
                    </a>

                    <a href="{{ route('perks') }}"
                       class="py-2 text-gray-300">
                        Campus Perks
                    </a>

                    <a href="{{ route('leaderboard') }}"
                       class="py-2 text-neon font-semibold">
                        Leaderboard
                    </a>

                    <a href="{{ route('faq') }}"
                       class="py-2 text-gray-300">
                        FAQ
                    </a>


                    <div class="flex gap-3 pt-3">

                        <a href="{{ route('login') }}"
                           class="flex-1 text-center
                                  py-3 rounded-xl
                                  border border-border">

                            Login

                        </a>

                        <a href="{{ route('register') }}"
                           class="flex-1 text-center
                                  py-3 rounded-xl
                                  bg-neon
                                  text-dark
                                  font-bold">

                            Get Started

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </nav>


    <!-- ================= HERO ================= -->
    <section class="relative overflow-hidden">

        <div class="absolute
                    -top-40
                    left-1/2
                    -translate-x-1/2
                    w-[650px]
                    h-[650px]
                    bg-neon/10
                    rounded-full
                    blur-[150px]">
        </div>


        <div class="relative
                    max-w-5xl
                    mx-auto
                    px-6
                    py-24
                    lg:py-32
                    text-center">

            <div class="inline-flex
                        items-center
                        gap-2
                        px-4
                        py-2
                        rounded-full
                        border border-neon/20
                        bg-neon/5
                        text-neon
                        text-xs
                        font-mono
                        mb-7">

                <span class="w-2 h-2 rounded-full bg-neon"></span>

                CAMPUS ACHIEVEMENTS

            </div>


            <h1 class="text-4xl
                       md:text-6xl
                       lg:text-7xl
                       font-extrabold
                       leading-tight
                       tracking-tight">

                Campus
                <span class="text-neon">Leaderboard</span>

            </h1>


            <p class="mt-7
                      max-w-2xl
                      mx-auto
                      text-gray-400
                      text-lg
                      md:text-xl
                      leading-relaxed">

                Track eligible campus activity and achievements
                in one place.

            </p>

        </div>

    </section>


    <!-- ================= STATS ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 pb-16">

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">


            <!-- Stat -->
            <div class="bg-card
                        border border-border
                        rounded-2xl
                        p-6">

                <p class="text-xs text-gray-500 font-mono">
                    ACTIVE STUDENTS
                </p>

                <div class="flex items-end gap-2 mt-3">

                    <span class="text-3xl font-extrabold">
                        1,248
                    </span>

                    <span class="text-neon text-sm mb-1">
                        Students
                    </span>

                </div>

            </div>


            <!-- Stat -->
            <div class="bg-card
                        border border-border
                        rounded-2xl
                        p-6">

                <p class="text-xs text-gray-500 font-mono">
                    COINS EARNED
                </p>

                <div class="flex items-end gap-2 mt-3">

                    <span class="text-3xl font-extrabold">
                        84.6K
                    </span>

                    <span class="text-neon text-sm mb-1">
                        CC
                    </span>

                </div>

            </div>


            <!-- Stat -->
            <div class="bg-card
                        border border-border
                        rounded-2xl
                        p-6">

                <p class="text-xs text-gray-500 font-mono">
                    ACTIVITIES
                </p>

                <div class="flex items-end gap-2 mt-3">

                    <span class="text-3xl font-extrabold">
                        6,420
                    </span>

                    <span class="text-neon text-sm mb-1">
                        Done
                    </span>

                </div>

            </div>


            <!-- Stat -->
            <div class="bg-card
                        border border-border
                        rounded-2xl
                        p-6">

                <p class="text-xs text-gray-500 font-mono">
                    REWARDS
                </p>

                <div class="flex items-end gap-2 mt-3">

                    <span class="text-3xl font-extrabold">
                        3,780
                    </span>

                    <span class="text-neon text-sm mb-1">
                        Earned
                    </span>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= TOP THREE ================= -->
    <section class="max-w-6xl mx-auto px-6 lg:px-8 pb-20">

        <div class="text-center mb-12">

            <span class="text-neon
                         font-mono
                         text-xs
                         tracking-[.25em]">

                TOP STUDENTS

            </span>

            <h2 class="text-3xl
                       md:text-4xl
                       font-extrabold
                       mt-4">

                This Month's Highlights

            </h2>

            <p class="text-gray-400 mt-4">
                Sample leaderboard showing campus activity and rewards.
            </p>

        </div>


        <div class="grid md:grid-cols-3 gap-6 items-end">


            <!-- SECOND -->
            <div class="podium-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7
                        text-center
                        md:order-1">

                <div class="text-4xl mb-5">
                    🥈
                </div>

                <div class="avatar
                            w-20 h-20
                            mx-auto
                            rounded-full
                            border border-neon/20
                            flex items-center justify-center
                            text-2xl
                            font-bold
                            text-neon">

                    AM

                </div>

                <h3 class="font-bold text-xl mt-5">
                    Ayesha Malik
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Computer Science
                </p>

                <div class="mt-6
                            py-4
                            rounded-2xl
                            bg-dark
                            border border-border">

                    <p class="text-xs text-gray-500">
                        CAMPUS COINS
                    </p>

                    <p class="text-2xl
                              font-extrabold
                              text-neon
                              mt-1">

                        2,840 CC

                    </p>

                </div>

                <div class="mt-4 text-xs text-gray-500">
                    42 eligible activities
                </div>

            </div>


            <!-- FIRST -->
            <div class="podium-card
                        podium-glow
                        bg-card
                        border border-neon/30
                        rounded-3xl
                        p-8
                        text-center
                        md:order-2
                        md:-translate-y-6">

                <div class="inline-flex
                            px-3 py-1
                            rounded-full
                            bg-neon/10
                            border border-neon/20
                            text-neon
                            text-[10px]
                            font-mono
                            mb-5">

                    TOP 1

                </div>

                <div class="text-5xl mb-5">
                    🥇
                </div>

                <div class="avatar
                            w-24 h-24
                            mx-auto
                            rounded-full
                            border border-neon/40
                            flex items-center justify-center
                            text-3xl
                            font-bold
                            text-neon
                            shadow-neon">

                    HM

                </div>

                <h3 class="font-bold text-2xl mt-5">
                    Hamza Ahmed
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Business Administration
                </p>

                <div class="mt-6
                            py-5
                            rounded-2xl
                            bg-neon/5
                            border border-neon/15">

                    <p class="text-xs text-gray-500">
                        CAMPUS COINS
                    </p>

                    <p class="text-3xl
                              font-extrabold
                              text-neon
                              mt-1">

                        3,620 CC

                    </p>

                </div>

                <div class="mt-4 text-xs text-gray-500">
                    57 eligible activities
                </div>

            </div>


            <!-- THIRD -->
            <div class="podium-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7
                        text-center
                        md:order-3">

                <div class="text-4xl mb-5">
                    🥉
                </div>

                <div class="avatar
                            w-20 h-20
                            mx-auto
                            rounded-full
                            border border-neon/20
                            flex items-center justify-center
                            text-2xl
                            font-bold
                            text-neon">

                    ZA

                </div>

                <h3 class="font-bold text-xl mt-5">
                    Zain Ali
                </h3>

                <p class="text-gray-500 text-sm mt-1">
                    Engineering
                </p>

                <div class="mt-6
                            py-4
                            rounded-2xl
                            bg-dark
                            border border-border">

                    <p class="text-xs text-gray-500">
                        CAMPUS COINS
                    </p>

                    <p class="text-2xl
                              font-extrabold
                              text-neon
                              mt-1">

                        2,590 CC

                    </p>

                </div>

                <div class="mt-4 text-xs text-gray-500">
                    39 eligible activities
                </div>

            </div>

        </div>

    </section>


    <!-- ================= FULL LEADERBOARD ================= -->
    <section class="border-y border-border bg-surface/70">

        <div class="max-w-6xl mx-auto px-6 lg:px-8 py-24">

            <div class="flex flex-col
                        md:flex-row
                        md:items-end
                        md:justify-between
                        gap-5
                        mb-10">

                <div>

                    <span class="text-neon
                                 font-mono
                                 text-xs
                                 tracking-[.25em]">

                        RANKINGS

                    </span>

                    <h2 class="text-3xl
                               md:text-4xl
                               font-extrabold
                               mt-4">

                        Student Rankings

                    </h2>

                </div>


                <div class="px-4
                            py-2
                            rounded-xl
                            border border-border
                            bg-card
                            text-xs
                            text-gray-400
                            font-mono">

                    MONTHLY BOARD

                </div>

            </div>


            <div class="scroll-table">

                <div class="min-w-[700px]">

                    <!-- TABLE HEADER -->
                    <div class="grid
                                grid-cols-12
                                gap-4
                                px-6
                                py-4
                                text-xs
                                font-mono
                                text-gray-500
                                border-b border-border">

                        <div class="col-span-1">
                            #
                        </div>

                        <div class="col-span-5">
                            STUDENT
                        </div>

                        <div class="col-span-2">
                            ACTIVITIES
                        </div>

                        <div class="col-span-2">
                            REWARDS
                        </div>

                        <div class="col-span-2 text-right">
                            COINS
                        </div>

                    </div>


                    <!-- ROW 1 -->
                    <div class="rank-card
                                grid
                                grid-cols-12
                                gap-4
                                items-center
                                px-6
                                py-5
                                bg-card
                                border-b border-border">

                        <div class="col-span-1
                                    font-mono
                                    text-neon
                                    font-bold">

                            01

                        </div>

                        <div class="col-span-5 flex items-center gap-4">

                            <div class="w-11 h-11
                                        rounded-xl
                                        avatar
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon
                                        font-bold">

                                HM

                            </div>

                            <div>

                                <p class="font-semibold">
                                    Hamza Ahmed
                                </p>

                                <p class="text-xs text-gray-500">
                                    Business Administration
                                </p>

                            </div>

                        </div>

                        <div class="col-span-2 text-gray-400">
                            57
                        </div>

                        <div class="col-span-2 text-gray-400">
                            18
                        </div>

                        <div class="col-span-2 text-right
                                    font-bold
                                    text-neon">

                            3,620 CC

                        </div>

                    </div>


                    <!-- ROW 2 -->
                    <div class="rank-card
                                grid
                                grid-cols-12
                                gap-4
                                items-center
                                px-6
                                py-5
                                bg-card
                                border-b border-border">

                        <div class="col-span-1
                                    font-mono
                                    text-gray-400
                                    font-bold">

                            02

                        </div>

                        <div class="col-span-5 flex items-center gap-4">

                            <div class="w-11 h-11
                                        rounded-xl
                                        avatar
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon
                                        font-bold">

                                AM

                            </div>

                            <div>

                                <p class="font-semibold">
                                    Ayesha Malik
                                </p>

                                <p class="text-xs text-gray-500">
                                    Computer Science
                                </p>

                            </div>

                        </div>

                        <div class="col-span-2 text-gray-400">
                            42
                        </div>

                        <div class="col-span-2 text-gray-400">
                            15
                        </div>

                        <div class="col-span-2 text-right
                                    font-bold
                                    text-neon">

                            2,840 CC

                        </div>

                    </div>


                    <!-- ROW 3 -->
                    <div class="rank-card
                                grid
                                grid-cols-12
                                gap-4
                                items-center
                                px-6
                                py-5
                                bg-card
                                border-b border-border">

                        <div class="col-span-1
                                    font-mono
                                    text-gray-400
                                    font-bold">

                            03

                        </div>

                        <div class="col-span-5 flex items-center gap-4">

                            <div class="w-11 h-11
                                        rounded-xl
                                        avatar
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon
                                        font-bold">

                                ZA

                            </div>

                            <div>

                                <p class="font-semibold">
                                    Zain Ali
                                </p>

                                <p class="text-xs text-gray-500">
                                    Engineering
                                </p>

                            </div>

                        </div>

                        <div class="col-span-2 text-gray-400">
                            39
                        </div>

                        <div class="col-span-2 text-gray-400">
                            13
                        </div>

                        <div class="col-span-2 text-right
                                    font-bold
                                    text-neon">

                            2,590 CC

                        </div>

                    </div>


                    <!-- ROW 4 -->
                    <div class="rank-card
                                grid
                                grid-cols-12
                                gap-4
                                items-center
                                px-6
                                py-5
                                bg-card
                                border-b border-border">

                        <div class="col-span-1
                                    font-mono
                                    text-gray-400
                                    font-bold">

                            04

                        </div>

                        <div class="col-span-5 flex items-center gap-4">

                            <div class="w-11 h-11
                                        rounded-xl
                                        avatar
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon
                                        font-bold">

                                SR

                            </div>

                            <div>

                                <p class="font-semibold">
                                    Sara Raza
                                </p>

                                <p class="text-xs text-gray-500">
                                    Media Studies
                                </p>

                            </div>

                        </div>

                        <div class="col-span-2 text-gray-400">
                            35
                        </div>

                        <div class="col-span-2 text-gray-400">
                            12
                        </div>

                        <div class="col-span-2 text-right
                                    font-bold
                                    text-neon">

                            2,310 CC

                        </div>

                    </div>


                    <!-- ROW 5 -->
                    <div class="rank-card
                                grid
                                grid-cols-12
                                gap-4
                                items-center
                                px-6
                                py-5
                                bg-card">

                        <div class="col-span-1
                                    font-mono
                                    text-gray-400
                                    font-bold">

                            05

                        </div>

                        <div class="col-span-5 flex items-center gap-4">

                            <div class="w-11 h-11
                                        rounded-xl
                                        avatar
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon
                                        font-bold">

                                UA

                            </div>

                            <div>

                                <p class="font-semibold">
                                    Usman Ahmed
                                </p>

                                <p class="text-xs text-gray-500">
                                    Information Technology
                                </p>

                            </div>

                        </div>

                        <div class="col-span-2 text-gray-400">
                            31
                        </div>

                        <div class="col-span-2 text-gray-400">
                            10
                        </div>

                        <div class="col-span-2 text-right
                                    font-bold
                                    text-neon">

                            2,080 CC

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= HOW POINTS WORK ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-24">

        <div class="text-center mb-14">

            <span class="text-neon
                         font-mono
                         text-xs
                         tracking-[.25em]">

                EARN & TRACK

            </span>

            <h2 class="text-3xl
                       md:text-5xl
                       font-extrabold
                       mt-4">

                How Leaderboard Activity Works

            </h2>

            <p class="text-gray-400
                      max-w-2xl
                      mx-auto
                      mt-5">

                Eligible activities can contribute to your Campus Coin
                progress and rewards according to your campus rules.

            </p>

        </div>


        <div class="grid md:grid-cols-3 gap-6">


            <!-- CARD -->
            <div class="bg-card
                        border border-border
                        rounded-3xl
                        p-7
                        rank-card">

                <div class="w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/20
                            flex items-center justify-center
                            text-2xl
                            mb-6">

                    🎯

                </div>

                <h3 class="text-xl font-bold">
                    Complete Activities
                </h3>

                <p class="text-gray-400
                          text-sm
                          leading-7
                          mt-3">

                    Take part in eligible academic, campus or
                    community activities.

                </p>

            </div>


            <!-- CARD -->
            <div class="bg-card
                        border border-border
                        rounded-3xl
                        p-7
                        rank-card">

                <div class="w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/20
                            flex items-center justify-center
                            text-2xl
                            mb-6">

                    💎

                </div>

                <h3 class="text-xl font-bold">
                    Earn Rewards
                </h3>

                <p class="text-gray-400
                          text-sm
                          leading-7
                          mt-3">

                    Eligible activities can add rewards or Campus
                    Coins to your account.

                </p>

            </div>


            <!-- CARD -->
            <div class="bg-card
                        border border-border
                        rounded-3xl
                        p-7
                        rank-card">

                <div class="w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/20
                            flex items-center justify-center
                            text-2xl
                            mb-6">

                    📊

                </div>

                <h3 class="text-xl font-bold">
                    Track Progress
                </h3>

                <p class="text-gray-400
                          text-sm
                          leading-7
                          mt-3">

                    Monitor your activity and eligible rewards from
                    your Campus Coin account.

                </p>

            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 pb-24">

        <div class="relative
                    overflow-hidden
                    rounded-[2rem]
                    border border-neon/20
                    bg-gradient-to-br
                    from-neon/10
                    to-transparent
                    p-10
                    md:p-16
                    text-center">

            <div class="absolute
                        -top-32
                        left-1/2
                        -translate-x-1/2
                        w-96
                        h-96
                        bg-neon/10
                        blur-[100px]
                        rounded-full">
            </div>


            <div class="relative">

                <span class="text-neon
                             font-mono
                             text-xs
                             tracking-[.25em]">

                    JOIN THE CAMPUS COMMUNITY

                </span>


                <h2 class="text-3xl
                           md:text-5xl
                           font-extrabold
                           mt-5">

                    Start Building Your
                    <span class="text-neon">
                        Campus Journey
                    </span>

                </h2>


                <p class="text-gray-400
                          max-w-xl
                          mx-auto
                          mt-5">

                    Create your Campus Coin account and start tracking
                    your eligible campus activities and rewards.

                </p>


                <div class="flex flex-col
                            sm:flex-row
                            justify-center
                            gap-4
                            mt-8">

                    <a href="{{ route('register') }}"
                       class="px-7
                              py-3.5
                              rounded-xl
                              bg-neon
                              text-dark
                              font-bold
                              hover:shadow-neon
                              transition">

                        Get Started

                    </a>


                    <a href="{{ route('perks') }}"
                       class="px-7
                              py-3.5
                              rounded-xl
                              border border-border
                              text-white
                              font-semibold
                              hover:border-neon/40
                              transition">

                        View Campus Perks

                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= FOOTER ================= -->
    <footer class="border-t border-border bg-surface">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

            <div class="grid md:grid-cols-4 gap-10">


                <!-- BRAND -->
                <div class="md:col-span-2">

                    <a href="{{ route('home') }}"
                       class="flex items-center gap-3">

                        <div class="w-10 h-10
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/30
                                    flex items-center justify-center
                                    text-neon
                                    font-bold">

                            ₵

                        </div>

                        <div class="text-xl font-extrabold">

                            Campus<span class="text-neon">
                                Coin
                            </span>

                        </div>

                    </a>


                    <p class="text-gray-500
                              text-sm
                              leading-7
                              max-w-md
                              mt-5">

                        A smart digital campus payment and rewards
                        platform designed to make student life easier.

                    </p>

                </div>


                <!-- PLATFORM -->
                <div>

                    <h4 class="font-bold mb-5">
                        Platform
                    </h4>

                    <div class="space-y-3
                                text-sm
                                text-gray-500">

                        <a href="{{ route('features') }}"
                           class="block hover:text-neon transition">
                            Features
                        </a>

                        <a href="{{ route('how-it-works') }}"
                           class="block hover:text-neon transition">
                            How It Works
                        </a>

                        <a href="{{ route('perks') }}"
                           class="block hover:text-neon transition">
                            Campus Perks
                        </a>

                    </div>

                </div>


                <!-- EXPLORE -->
                <div>

                    <h4 class="font-bold mb-5">
                        Explore
                    </h4>

                    <div class="space-y-3
                                text-sm
                                text-gray-500">

                        <a href="{{ route('leaderboard') }}"
                           class="block hover:text-neon transition">
                            Leaderboard
                        </a>

                        <a href="{{ route('faq') }}"
                           class="block hover:text-neon transition">
                            FAQ
                        </a>

                        <a href="{{ route('login') }}"
                           class="block hover:text-neon transition">
                            Login
                        </a>

                    </div>

                </div>

            </div>


            <div class="border-t
                        border-border
                        mt-10
                        pt-7
                        flex
                        flex-col
                        md:flex-row
                        justify-between
                        gap-4
                        text-xs
                        text-gray-600">

                <p>
                    © {{ date('Y') }} Campus Coin. All rights reserved.
                </p>

                <p class="font-mono">
                    BUILT FOR CAMPUS LIFE
                </p>

            </div>

        </div>

    </footer>


    <!-- ================= MOBILE MENU SCRIPT ================= -->
    <script>

        const mobileMenuBtn =
            document.getElementById('mobileMenuBtn');

        const mobileMenu =
            document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

    </script>

</body>
</html>
