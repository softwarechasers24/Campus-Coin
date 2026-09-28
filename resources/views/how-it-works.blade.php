<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>How It Works — Campus Coin</title>

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
            background: rgba(13, 24, 19, 0.75);
            border: 1px solid #1A3326;
            backdrop-filter: blur(14px);
        }

        .glow {
            box-shadow: 0 0 35px rgba(0,245,155,.15);
        }

        .step-card {
            transition: all .3s ease;
        }

        .step-card:hover {
            transform: translateY(-7px);
            border-color: rgba(0,245,155,.45);
            box-shadow: 0 20px 50px rgba(0,0,0,.35);
        }

        .step-number {
            box-shadow: 0 0 25px rgba(0,245,155,.22);
        }

        .line {
            height: 2px;
            background: linear-gradient(
                90deg,
                rgba(0,245,155,.55),
                rgba(0,245,155,.08)
            );
        }

        @media (max-width: 768px) {
            .desktop-line {
                display: none;
            }
        }
    </style>
</head>

<body class="grid-bg">

    <!-- NAVBAR -->
    <nav class="sticky top-0 z-50 glass">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="h-20 flex items-center justify-between">

                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-xl bg-neon/10 border border-neon/30 flex items-center justify-center shadow-neon">
                        <svg class="w-6 h-6 text-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" stroke-width="1.8"/>
                            <path d="M12 7v10M9 10h5a2 2 0 010 4H9" stroke-width="1.8" stroke-linecap="round"/>
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

                <!-- Desktop Nav -->
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
                       class="text-neon font-semibold">
                        How It Works
                    </a>

                    <a href="{{ route('perks') }}"
                       class="text-gray-300 hover:text-neon transition">
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

                <!-- Auth -->
                <div class="hidden md:flex items-center gap-3">

                    <a href="{{ route('login') }}"
                       class="px-5 py-2.5 rounded-xl text-sm font-semibold text-gray-300 hover:text-white transition">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-5 py-2.5 rounded-xl bg-neon text-dark font-bold text-sm hover:shadow-neon transition">
                        Get Started
                    </a>

                </div>

                <!-- Mobile button -->
                <button id="mobileMenuBtn"
                        class="md:hidden text-gray-300"
                        type="button">

                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                       class="py-2 text-neon font-semibold">
                        How It Works
                    </a>

                    <a href="{{ route('perks') }}"
                       class="py-2 text-gray-300">
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
                           class="flex-1 text-center py-3 rounded-xl border border-border">
                            Login
                        </a>

                        <a href="{{ route('register') }}"
                           class="flex-1 text-center py-3 rounded-xl bg-neon text-dark font-bold">
                            Get Started
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </nav>


    <!-- HERO -->
    <section class="relative overflow-hidden">

        <div class="absolute -top-40 left-1/2 -translate-x-1/2
                    w-[600px] h-[600px]
                    bg-neon/10 rounded-full blur-[140px]">
        </div>

        <div class="relative max-w-5xl mx-auto px-6 py-24 lg:py-32 text-center">

            <div class="inline-flex items-center gap-2
                        px-4 py-2 rounded-full
                        border border-neon/20
                        bg-neon/5
                        text-neon text-xs
                        font-mono mb-7">

                <span class="w-2 h-2 rounded-full bg-neon"></span>

                SIMPLE • FAST • DIGITAL

            </div>

            <h1 class="text-4xl md:text-6xl lg:text-7xl
                       font-extrabold leading-tight tracking-tight">

                How
                <span class="text-neon">Campus Coin</span>
                Works

            </h1>

            <p class="mt-7 max-w-2xl mx-auto
                      text-gray-400 text-lg md:text-xl leading-relaxed">

                From creating your account to making payments and earning
                rewards, Campus Coin makes everyday campus transactions
                simple and digital.

            </p>

        </div>
    </section>


    <!-- STEPS -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 pb-24">

        <div class="grid md:grid-cols-4 gap-6">

            <!-- STEP 1 -->
            <div class="step-card relative
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="step-number
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/30
                            flex items-center justify-center
                            text-neon
                            font-mono
                            text-xl
                            font-bold
                            mb-7">

                    01

                </div>

                <div class="text-3xl mb-5">👤</div>

                <h3 class="text-xl font-bold mb-3">
                    Create Account
                </h3>

                <p class="text-gray-400 text-sm leading-7">
                    Register your student account and create your secure
                    Campus Coin profile.
                </p>

            </div>


            <!-- STEP 2 -->
            <div class="step-card relative
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="step-number
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/30
                            flex items-center justify-center
                            text-neon
                            font-mono
                            text-xl
                            font-bold
                            mb-7">

                    02

                </div>

                <div class="text-3xl mb-5">💳</div>

                <h3 class="text-xl font-bold mb-3">
                    Add Campus Coins
                </h3>

                <p class="text-gray-400 text-sm leading-7">
                    Add Campus Coins to your digital wallet and keep track
                    of your available balance.
                </p>

            </div>


            <!-- STEP 3 -->
            <div class="step-card relative
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="step-number
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/30
                            flex items-center justify-center
                            text-neon
                            font-mono
                            text-xl
                            font-bold
                            mb-7">

                    03

                </div>

                <div class="text-3xl mb-5">📱</div>

                <h3 class="text-xl font-bold mb-3">
                    Pay on Campus
                </h3>

                <p class="text-gray-400 text-sm leading-7">
                    Use your Campus Coins for supported campus purchases,
                    services and student activities.
                </p>

            </div>


            <!-- STEP 4 -->
            <div class="step-card relative
                        bg-card
                        border border-border
                        rounded-3xl
                        p-7">

                <div class="step-number
                            w-14 h-14
                            rounded-2xl
                            bg-neon/10
                            border border-neon/30
                            flex items-center justify-center
                            text-neon
                            font-mono
                            text-xl
                            font-bold
                            mb-7">

                    04

                </div>

                <div class="text-3xl mb-5">🏆</div>

                <h3 class="text-xl font-bold mb-3">
                    Earn Rewards
                </h3>

                <p class="text-gray-400 text-sm leading-7">
                    Complete eligible campus activities and earn rewards
                    that can be tracked from your account.
                </p>

            </div>

        </div>

    </section>


    <!-- PROCESS VISUAL -->
    <section class="border-y border-border bg-surface/70">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-24">

            <div class="text-center mb-16">

                <span class="text-neon font-mono text-xs tracking-[.25em]">
                    THE PROCESS
                </span>

                <h2 class="text-3xl md:text-5xl font-extrabold mt-4">
                    Your Campus Journey
                </h2>

                <p class="text-gray-400 max-w-2xl mx-auto mt-5">
                    Everything stays organized in one simple digital
                    campus ecosystem.
                </p>

            </div>


            <div class="relative">

                <!-- Desktop connecting line -->
                <div class="desktop-line absolute
                            top-16 left-[12%] right-[12%]
                            line">
                </div>

                <div class="grid md:grid-cols-4 gap-10 relative">

                    <!-- Item -->
                    <div class="text-center">

                        <div class="mx-auto w-20 h-20 rounded-full
                                    bg-dark
                                    border border-neon/40
                                    flex items-center justify-center
                                    text-neon
                                    text-2xl
                                    font-bold
                                    step-number">

                            1

                        </div>

                        <h3 class="font-bold text-lg mt-6">
                            Sign Up
                        </h3>

                        <p class="text-sm text-gray-400 mt-3 leading-6">
                            Create your student account in a few simple steps.
                        </p>

                    </div>


                    <!-- Item -->
                    <div class="text-center">

                        <div class="mx-auto w-20 h-20 rounded-full
                                    bg-dark
                                    border border-neon/40
                                    flex items-center justify-center
                                    text-neon
                                    text-2xl
                                    font-bold
                                    step-number">

                            2

                        </div>

                        <h3 class="font-bold text-lg mt-6">
                            Add Coins
                        </h3>

                        <p class="text-sm text-gray-400 mt-3 leading-6">
                            Manage your Campus Coin balance through your wallet.
                        </p>

                    </div>


                    <!-- Item -->
                    <div class="text-center">

                        <div class="mx-auto w-20 h-20 rounded-full
                                    bg-dark
                                    border border-neon/40
                                    flex items-center justify-center
                                    text-neon
                                    text-2xl
                                    font-bold
                                    step-number">

                            3

                        </div>

                        <h3 class="font-bold text-lg mt-6">
                            Make Transactions
                        </h3>

                        <p class="text-sm text-gray-400 mt-3 leading-6">
                            Pay for supported campus services digitally.
                        </p>

                    </div>


                    <!-- Item -->
                    <div class="text-center">

                        <div class="mx-auto w-20 h-20 rounded-full
                                    bg-dark
                                    border border-neon/40
                                    flex items-center justify-center
                                    text-neon
                                    text-2xl
                                    font-bold
                                    step-number">

                            4

                        </div>

                        <h3 class="font-bold text-lg mt-6">
                            Get Rewards
                        </h3>

                        <p class="text-sm text-gray-400 mt-3 leading-6">
                            Track eligible rewards and campus achievements.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- WALLET DEMO -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 py-24">

        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <!-- Text -->
            <div>

                <span class="text-neon font-mono text-xs tracking-[.25em]">
                    ONE DIGITAL WALLET
                </span>

                <h2 class="text-3xl md:text-5xl font-extrabold mt-5 leading-tight">
                    Keep your campus
                    <span class="text-neon">money organized.</span>
                </h2>

                <p class="text-gray-400 mt-6 leading-8 max-w-xl">
                    Campus Coin gives students a central place to manage
                    balances, transactions and eligible rewards without
                    having to keep track of everything separately.
                </p>

                <div class="mt-8 space-y-5">

                    <div class="flex gap-4">

                        <div class="w-10 h-10 shrink-0 rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon">
                            ✓
                        </div>

                        <div>
                            <h4 class="font-bold">
                                Easy Balance Tracking
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                Quickly see your available Campus Coins.
                            </p>
                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 shrink-0 rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon">
                            ✓
                        </div>

                        <div>
                            <h4 class="font-bold">
                                Simple Transactions
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                Keep supported campus payments in one place.
                            </p>
                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 shrink-0 rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon">
                            ✓
                        </div>

                        <div>
                            <h4 class="font-bold">
                                Reward Tracking
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                Monitor rewards earned through eligible activities.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Wallet Card -->
            <div class="relative">

                <div class="absolute -inset-10
                            bg-neon/10
                            blur-[80px]
                            rounded-full">
                </div>

                <div class="relative
                            bg-card
                            border border-border
                            rounded-[2rem]
                            p-7
                            shadow-neon-lg">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-xs text-gray-500 font-mono">
                                CAMPUS WALLET
                            </p>

                            <p class="text-lg font-bold mt-1">
                                Student Account
                            </p>
                        </div>

                        <div class="w-11 h-11 rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon">

                            ₵

                        </div>

                    </div>


                    <div class="mt-10">

                        <p class="text-xs text-gray-500">
                            AVAILABLE BALANCE
                        </p>

                        <div class="flex items-end gap-2 mt-2">

                            <span class="text-4xl font-extrabold">
                                2,450
                            </span>

                            <span class="text-neon font-mono mb-1">
                                CC
                            </span>

                        </div>

                    </div>


                    <div class="mt-8 grid grid-cols-2 gap-4">

                        <div class="bg-dark border border-border rounded-2xl p-4">

                            <p class="text-xs text-gray-500">
                                Payments
                            </p>

                            <p class="font-bold mt-2">
                                18
                            </p>

                        </div>

                        <div class="bg-dark border border-border rounded-2xl p-4">

                            <p class="text-xs text-gray-500">
                                Rewards
                            </p>

                            <p class="font-bold mt-2 text-neon">
                                +320 CC
                            </p>

                        </div>

                    </div>


                    <div class="mt-5 p-4
                                bg-neon/5
                                border border-neon/10
                                rounded-2xl">

                        <div class="flex justify-between items-center">

                            <div class="flex items-center gap-3">

                                <div class="w-9 h-9 rounded-lg
                                            bg-neon/10
                                            flex items-center justify-center">
                                    💳
                                </div>

                                <div>
                                    <p class="text-sm font-semibold">
                                        Campus Café
                                    </p>

                                    <p class="text-xs text-gray-500">
                                        Today's purchase
                                    </p>
                                </div>

                            </div>

                            <span class="text-sm text-red-400">
                                -120 CC
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- CTA -->
    <section class="max-w-7xl mx-auto px-6 lg:px-8 pb-24">

        <div class="relative overflow-hidden
                    rounded-[2rem]
                    border border-neon/20
                    bg-gradient-to-br from-neon/10 to-transparent
                    p-10 md:p-16 text-center">

            <div class="absolute -top-32 left-1/2 -translate-x-1/2
                        w-96 h-96
                        bg-neon/10
                        blur-[100px]
                        rounded-full">
            </div>

            <div class="relative">

                <span class="text-neon font-mono text-xs tracking-[.25em]">
                    READY TO GET STARTED?
                </span>

                <h2 class="text-3xl md:text-5xl font-extrabold mt-5">
                    Start Your Campus Coin Journey
                </h2>

                <p class="text-gray-400 max-w-xl mx-auto mt-5">
                    Create your account and experience a simpler way
                    to manage your campus transactions.
                </p>

                <div class="flex flex-col sm:flex-row
                            justify-center
                            gap-4 mt-8">

                    <a href="{{ route('register') }}"
                       class="px-7 py-3.5 rounded-xl
                              bg-neon
                              text-dark
                              font-bold
                              hover:shadow-neon
                              transition">

                        Create Account

                    </a>

                    <a href="{{ route('features') }}"
                       class="px-7 py-3.5 rounded-xl
                              border border-border
                              text-white
                              font-semibold
                              hover:border-neon/40
                              transition">

                        Explore Features

                    </a>

                </div>

            </div>

        </div>

    </section>


    <!-- FOOTER -->
    <footer class="border-t border-border bg-surface">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">

            <div class="grid md:grid-cols-4 gap-10">

                <!-- Brand -->
                <div class="md:col-span-2">

                    <a href="{{ route('home') }}"
                       class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-neon/10
                                    border border-neon/30
                                    flex items-center justify-center
                                    text-neon
                                    font-bold">

                            ₵

                        </div>

                        <div class="text-xl font-extrabold">
                            Campus<span class="text-neon">Coin</span>
                        </div>

                    </a>

                    <p class="text-gray-500 text-sm leading-7 max-w-md mt-5">
                        A smart digital campus payment and rewards
                        platform designed to make student life easier.
                    </p>

                </div>


                <!-- Platform -->
                <div>

                    <h4 class="font-bold mb-5">
                        Platform
                    </h4>

                    <div class="space-y-3 text-sm text-gray-500">

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


                <!-- Explore -->
                <div>

                    <h4 class="font-bold mb-5">
                        Explore
                    </h4>

                    <div class="space-y-3 text-sm text-gray-500">

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


            <div class="border-t border-border mt-10 pt-7
                        flex flex-col md:flex-row
                        justify-between
                        gap-4
                        text-xs text-gray-600">

                <p>
                    © {{ date('Y') }} Campus Coin. All rights reserved.
                </p>

                <p class="font-mono">
                    BUILT FOR CAMPUS LIFE
                </p>

            </div>

        </div>

    </footer>


    <!-- MOBILE MENU SCRIPT -->
    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

</body>
</html>

