<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Perks — Campus Coin</title>

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

        .perk-card {
            transition: all .3s ease;
        }

        .perk-card:hover {
            transform: translateY(-8px);
            border-color: rgba(0,245,155,.45);
            box-shadow: 0 20px 55px rgba(0,0,0,.35);
        }

        .icon-box {
            transition: all .3s ease;
        }

        .perk-card:hover .icon-box {
            transform: scale(1.08);
            box-shadow: 0 0 25px rgba(0,245,155,.15);
        }

        .featured-perk {
            background:
                radial-gradient(circle at top right, rgba(0,245,155,.12), transparent 35%),
                #12231B;
        }

        @media (max-width: 768px) {
            .mobile-hide {
                display: none;
            }
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
                       class="text-neon font-semibold">
                        Campus Perks
                    </a>

                    <a href="{{ route('leaderboard') }}"
                       class="text-gray-300 hover:text-neon transition">
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
                       class="py-2 text-neon font-semibold">
                        Campus Perks
                    </a>

                    <a href="{{ route('leaderboard') }}"
                       class="py-2 text-gray-300">
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
                        border
                        border-neon/20
                        bg-neon/5
                        text-neon
                        text-xs
                        font-mono
                        mb-7">

                <span class="w-2 h-2 rounded-full bg-neon"></span>

                CAMPUS BENEFITS

            </div>


            <h1 class="text-4xl
                       md:text-6xl
                       lg:text-7xl
                       font-extrabold
                       leading-tight
                       tracking-tight">

                Unlock Your
                <span class="text-neon">Campus Perks</span>

            </h1>


            <p class="mt-7
                      max-w-2xl
                      mx-auto
                      text-gray-400
                      text-lg
                      md:text-xl
                      leading-relaxed">

                Discover the benefits available through Campus Coin and
                make your everyday campus experience more rewarding.

            </p>

        </div>

    </section>


    <!-- ================= PERKS GRID ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 pb-24">

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">


            <!-- PERK 1 -->
            <div class="perk-card
                        featured-perk
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="icon-box
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/25
                            flex items-center justify-center
                            text-2xl
                            mb-7">

                    🍔

                </div>

                <div class="flex items-center justify-between mb-3">

                    <h3 class="text-xl font-bold">
                        Campus Dining
                    </h3>

                    <span class="text-[10px]
                                 font-mono
                                 text-neon
                                 border
                                 border-neon/20
                                 px-2 py-1
                                 rounded-full">
                        FOOD
                    </span>

                </div>

                <p class="text-gray-400 text-sm leading-7">
                    Use Campus Coins at supported campus cafés,
                    food counters and participating dining locations.
                </p>

                <div class="mt-6 pt-5 border-t border-border">

                    <span class="text-xs text-gray-500">
                        Benefit
                    </span>

                    <p class="text-sm font-semibold text-neon mt-1">
                        Convenient campus payments
                    </p>

                </div>

            </div>


            <!-- PERK 2 -->
            <div class="perk-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="icon-box
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/25
                            flex items-center justify-center
                            text-2xl
                            mb-7">

                    📚

                </div>

                <div class="flex items-center justify-between mb-3">

                    <h3 class="text-xl font-bold">
                        Academic Rewards
                    </h3>

                    <span class="text-[10px]
                                 font-mono
                                 text-neon
                                 border
                                 border-neon/20
                                 px-2 py-1
                                 rounded-full">
                        STUDY
                    </span>

                </div>

                <p class="text-gray-400 text-sm leading-7">
                    Eligible academic activities can help students
                    collect Campus Coin rewards.
                </p>

                <div class="mt-6 pt-5 border-t border-border">

                    <span class="text-xs text-gray-500">
                        Benefit
                    </span>

                    <p class="text-sm font-semibold text-neon mt-1">
                        Reward your progress
                    </p>

                </div>

            </div>


            <!-- PERK 3 -->
            <div class="perk-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="icon-box
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/25
                            flex items-center justify-center
                            text-2xl
                            mb-7">

                    🎓

                </div>

                <div class="flex items-center justify-between mb-3">

                    <h3 class="text-xl font-bold">
                        Student Activities
                    </h3>

                    <span class="text-[10px]
                                 font-mono
                                 text-neon
                                 border
                                 border-neon/20
                                 px-2 py-1
                                 rounded-full">
                        CAMPUS
                    </span>

                </div>

                <p class="text-gray-400 text-sm leading-7">
                    Participate in eligible campus activities and
                    keep track of your rewards through your account.
                </p>

                <div class="mt-6 pt-5 border-t border-border">

                    <span class="text-xs text-gray-500">
                        Benefit
                    </span>

                    <p class="text-sm font-semibold text-neon mt-1">
                        More ways to engage
                    </p>

                </div>

            </div>


            <!-- PERK 4 -->
            <div class="perk-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="icon-box
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/25
                            flex items-center justify-center
                            text-2xl
                            mb-7">

                    🚌

                </div>

                <div class="flex items-center justify-between mb-3">

                    <h3 class="text-xl font-bold">
                        Campus Services
                    </h3>

                    <span class="text-[10px]
                                 font-mono
                                 text-neon
                                 border
                                 border-neon/20
                                 px-2 py-1
                                 rounded-full">
                        SERVICES
                    </span>

                </div>

                <p class="text-gray-400 text-sm leading-7">
                    Manage eligible campus service payments using
                    your digital Campus Coin balance.
                </p>

                <div class="mt-6 pt-5 border-t border-border">

                    <span class="text-xs text-gray-500">
                        Benefit
                    </span>

                    <p class="text-sm font-semibold text-neon mt-1">
                        One digital balance
                    </p>

                </div>

            </div>


            <!-- PERK 5 -->
            <div class="perk-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="icon-box
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/25
                            flex items-center justify-center
                            text-2xl
                            mb-7">

                    🛍️

                </div>

                <div class="flex items-center justify-between mb-3">

                    <h3 class="text-xl font-bold">
                        Student Marketplace
                    </h3>

                    <span class="text-[10px]
                                 font-mono
                                 text-neon
                                 border
                                 border-neon/20
                                 px-2 py-1
                                 rounded-full">
                        SHOP
                    </span>

                </div>

                <p class="text-gray-400 text-sm leading-7">
                    Access participating student-focused shops and
                    campus vendors where Campus Coin is supported.
                </p>

                <div class="mt-6 pt-5 border-t border-border">

                    <span class="text-xs text-gray-500">
                        Benefit
                    </span>

                    <p class="text-sm font-semibold text-neon mt-1">
                        Simple digital checkout
                    </p>

                </div>

            </div>


            <!-- PERK 6 -->
            <div class="perk-card
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="icon-box
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/25
                            flex items-center justify-center
                            text-2xl
                            mb-7">

                    🏆

                </div>

                <div class="flex items-center justify-between mb-3">

                    <h3 class="text-xl font-bold">
                        Leaderboard
                    </h3>

                    <span class="text-[10px]
                                 font-mono
                                 text-neon
                                 border
                                 border-neon/20
                                 px-2 py-1
                                 rounded-full">
                        REWARDS
                    </span>

                </div>

                <p class="text-gray-400 text-sm leading-7">
                    Track eligible achievements and see how your
                    campus activity compares within the platform.
                </p>

                <div class="mt-6 pt-5 border-t border-border">

                    <span class="text-xs text-gray-500">
                        Benefit
                    </span>

                    <p class="text-sm font-semibold text-neon mt-1">
                        Track your achievements
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= BENEFIT HIGHLIGHT ================= -->
    <section class="border-y border-border bg-surface/70">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-24">

            <div class="grid lg:grid-cols-2 gap-14 items-center">


                <!-- LEFT -->
                <div>

                    <span class="text-neon
                                 font-mono
                                 text-xs
                                 tracking-[.25em]">

                        MORE VALUE

                    </span>


                    <h2 class="text-3xl
                               md:text-5xl
                               font-extrabold
                               mt-5
                               leading-tight">

                        One platform,
                        <span class="text-neon">
                            multiple perks.
                        </span>

                    </h2>


                    <p class="text-gray-400
                              mt-6
                              leading-8
                              max-w-xl">

                        Campus Coin brings useful campus benefits together
                        so students can easily discover, use and track
                        available perks.

                    </p>


                    <div class="mt-8 space-y-5">


                        <div class="flex gap-4">

                            <div class="w-11 h-11
                                        shrink-0
                                        rounded-xl
                                        bg-neon/10
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold">
                                    Easy to Discover
                                </h4>

                                <p class="text-sm
                                          text-gray-500
                                          mt-1">

                                    Find supported campus benefits from
                                    one central platform.

                                </p>

                            </div>

                        </div>


                        <div class="flex gap-4">

                            <div class="w-11 h-11
                                        shrink-0
                                        rounded-xl
                                        bg-neon/10
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold">
                                    Digital & Convenient
                                </h4>

                                <p class="text-sm
                                          text-gray-500
                                          mt-1">

                                    Use your digital balance where Campus
                                    Coin is supported.

                                </p>

                            </div>

                        </div>


                        <div class="flex gap-4">

                            <div class="w-11 h-11
                                        shrink-0
                                        rounded-xl
                                        bg-neon/10
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold">
                                    Track Your Activity
                                </h4>

                                <p class="text-sm
                                          text-gray-500
                                          mt-1">

                                    Keep an eye on eligible rewards and
                                    campus activity.

                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->
                <div class="relative">

                    <div class="absolute
                                -inset-10
                                bg-neon/10
                                blur-[90px]
                                rounded-full">
                    </div>


                    <div class="relative
                                bg-card
                                border border-border
                                rounded-[2rem]
                                p-7
                                shadow-neon-lg">


                        <div class="flex items-center justify-between mb-8">

                            <div>

                                <p class="text-xs
                                          text-gray-500
                                          font-mono">

                                    CAMPUS PERKS

                                </p>

                                <h3 class="text-xl
                                           font-bold
                                           mt-1">

                                    Available Benefits

                                </h3>

                            </div>


                            <div class="w-11 h-11
                                        rounded-xl
                                        bg-neon/10
                                        border border-neon/20
                                        flex items-center justify-center
                                        text-neon">

                                ✦

                            </div>

                        </div>


                        <!-- Mini Perk -->
                        <div class="flex items-center
                                    justify-between
                                    p-4
                                    rounded-2xl
                                    bg-dark
                                    border border-border
                                    mb-4">

                            <div class="flex items-center gap-4">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-neon/10
                                            flex items-center justify-center
                                            text-xl">

                                    🍔

                                </div>

                                <div>

                                    <p class="font-semibold">
                                        Campus Dining
                                    </p>

                                    <p class="text-xs
                                              text-gray-500
                                              mt-1">

                                        Food & cafés

                                    </p>

                                </div>

                            </div>


                            <span class="text-neon text-sm">
                                Active
                            </span>

                        </div>


                        <!-- Mini Perk -->
                        <div class="flex items-center
                                    justify-between
                                    p-4
                                    rounded-2xl
                                    bg-dark
                                    border border-border
                                    mb-4">

                            <div class="flex items-center gap-4">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-neon/10
                                            flex items-center justify-center
                                            text-xl">

                                    📚

                                </div>

                                <div>

                                    <p class="font-semibold">
                                        Academic Rewards
                                    </p>

                                    <p class="text-xs
                                              text-gray-500
                                              mt-1">

                                        Student activities

                                    </p>

                                </div>

                            </div>


                            <span class="text-neon text-sm">
                                Active
                            </span>

                        </div>


                        <!-- Mini Perk -->
                        <div class="flex items-center
                                    justify-between
                                    p-4
                                    rounded-2xl
                                    bg-dark
                                    border border-border">

                            <div class="flex items-center gap-4">

                                <div class="w-11 h-11
                                            rounded-xl
                                            bg-neon/10
                                            flex items-center justify-center
                                            text-xl">

                                    🏆

                                </div>

                                <div>

                                    <p class="font-semibold">
                                        Student Rewards
                                    </p>

                                    <p class="text-xs
                                              text-gray-500
                                              mt-1">

                                        Achievements

                                    </p>

                                </div>

                            </div>


                            <span class="text-neon text-sm">
                                Active
                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================= CTA ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-24">

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

                    CAMPUS BENEFITS AWAIT

                </span>


                <h2 class="text-3xl
                           md:text-5xl
                           font-extrabold
                           mt-5">

                    Make More From
                    <span class="text-neon">
                        Campus Life
                    </span>

                </h2>


                <p class="text-gray-400
                          max-w-xl
                          mx-auto
                          mt-5">

                    Join Campus Coin and discover a smarter way to
                    access eligible campus benefits and rewards.

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


                    <a href="{{ route('how-it-works') }}"
                       class="px-7
                              py-3.5
                              rounded-xl
                              border border-border
                              text-white
                              font-semibold
                              hover:border-neon/40
                              transition">

                        How It Works

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

