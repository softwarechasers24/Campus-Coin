<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Campus Coin — Smart Digital Currency for Campus Life</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@500;700&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    },

                    colors: {
                        brand: {
                            dark: '#080E0B',
                            surface: '#0D1813',
                            card: '#12231B',
                            border: '#1A3326',
                            neon: '#00F59B',
                            emerald: '#10B981',
                            muted: '#718E81',
                        }
                    },

                    boxShadow: {
                        neon: '0 0 25px rgba(0, 245, 155, 0.35)',
                        'neon-lg': '0 0 50px rgba(0, 245, 155, 0.45)',
                        'neon-card':
                            '0 0 35px rgba(0, 245, 155, 0.25), inset 0 0 20px rgba(0, 245, 155, 0.1)',
                    }
                }
            }
        }
    </script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background: #080E0B;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-10px) rotate(1deg);
            }
        }

        @keyframes pulseGlow {
            0%, 100% {
                opacity: .3;
                transform: scale(1);
            }

            50% {
                opacity: .6;
                transform: scale(1.08);
            }
        }

        .animate-float {
            animation: float 5s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulseGlow 4s ease-in-out infinite;
        }

        .glass-card {
            background: rgba(13, 24, 19, .72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 245, 155, .15);
        }
    </style>
</head>

<body class="text-slate-100 font-sans selection:bg-[#00F59B] selection:text-[#080E0B] overflow-x-hidden">

    <!-- BACKGROUND GLOW -->

    <div
        class="fixed top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-[#00F59B]/10 rounded-full blur-[140px] pointer-events-none -z-10">
    </div>

    <div
        class="fixed bottom-0 right-0 w-[500px] h-[500px] bg-[#10B981]/10 rounded-full blur-[160px] pointer-events-none -z-10">
    </div>


    <!-- ================================================= -->
    <!-- NAVBAR -->
    <!-- ================================================= -->

    <header class="sticky top-0 z-50 glass-card border-b border-[#1A3326]/80">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">

            <!-- LOGO -->

            <a href="{{ route('home') }}" class="flex items-center gap-3 group">

                <div
                    class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#059669] to-[#00F59B] flex items-center justify-center shadow-neon group-hover:scale-105 transition">

                    <span class="text-[#080E0B] font-black text-xl">
                        ¢
                    </span>

                </div>

                <div>

                    <span class="font-extrabold text-lg sm:text-xl tracking-tight text-white">
                        Campus<span class="text-[#00F59B]">Coin</span>
                    </span>

                    <span class="text-[10px] block font-mono text-[#718E81] tracking-wider -mt-1">
                        UNIVERSITY PAY
                    </span>

                </div>

            </a>


            <!-- NAVIGATION -->

            <nav class="hidden lg:flex items-center space-x-7 text-sm font-medium text-[#718E81]">

                <a href="{{ route('home') }}"
                    class="text-[#00F59B] hover:text-white transition">
                    Home
                </a>

                <a href="{{ route('features') }}"
                    class="hover:text-[#00F59B] transition">
                    Features
                </a>

                <a href="{{ route('how-it-works') }}"
                    class="hover:text-[#00F59B] transition">
                    How It Works
                </a>

                <a href="{{ route('perks') }}"
                    class="hover:text-[#00F59B] transition">
                    Campus Perks
                </a>

                <a href="{{ route('leaderboard') }}"
                    class="hover:text-[#00F59B] transition">
                    Leaderboard
                </a>

                <a href="{{ route('faq') }}"
                    class="hover:text-[#00F59B] transition">
                    FAQ
                </a>

            </nav>


            <!-- LOGIN REGISTER -->

            <div class="flex items-center gap-2 sm:gap-3">

                <!-- LOGIN -->

                <a href="{{ route('login') }}"
                    class="hidden sm:inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-bold text-slate-200 hover:text-[#00F59B] hover:bg-[#00F59B]/10 border border-transparent hover:border-[#00F59B]/20 transition">

                    Student Login

                </a>


                <!-- REGISTER -->

                <a href="{{ route('register') }}"
                    class="hidden sm:inline-flex items-center justify-center px-4 py-2.5 rounded-xl text-sm font-bold text-[#00F59B] border border-[#00F59B]/40 hover:bg-[#00F59B] hover:text-[#080E0B] transition">

                    Register

                </a>


                <!-- MOBILE LOGIN -->

                <a href="{{ route('login') }}"
                    class="lg:hidden relative overflow-hidden rounded-full px-4 py-2 bg-[#00F59B] text-[#080E0B] text-xs font-extrabold">

                    Login

                </a>

            </div>

        </div>

    </header>


    <!-- ================================================= -->
    <!-- HERO -->
    <!-- ================================================= -->

    <section class="relative pt-12 pb-20 sm:pt-20 sm:pb-28">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                <!-- LEFT -->

                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">

                    <div
                        class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-[#0D1813] border border-[#00F59B]/30 text-xs font-semibold text-[#00F59B]">

                        <span class="w-2 h-2 rounded-full bg-[#00F59B] animate-ping"></span>

                        Laravel 11 • Campus Micro-Economy Engine

                    </div>


                    <h1
                        class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.15]">

                        The Smart Digital Currency for

                        <br>

                        <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#00F59B] via-[#34D399] to-[#059669]">

                            Campus Life.

                        </span>

                    </h1>


                    <p
                        class="text-base sm:text-lg text-[#718E81] max-w-2xl mx-auto lg:mx-0 leading-relaxed">

                        Eliminate loose change forever. Pay cafeteria bills via QR,
                        split expenses with friends at

                        <span class="text-white font-semibold">
                            0% fees
                        </span>

                        and earn coins through eligible campus activities.

                    </p>


                    <!-- HERO BUTTONS -->

                    <div
                        class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-2">

                        <!-- REGISTER -->

                        <a href="{{ route('register') }}"
                            class="w-full sm:w-auto px-8 py-4 bg-[#00F59B] hover:bg-[#00e08d] text-[#080E0B] font-extrabold text-sm rounded-xl shadow-neon-lg transition hover:scale-105 text-center">

                            Get Started Free →

                        </a>


                        <!-- LOGIN -->

                        <a href="{{ route('login') }}"
                            class="w-full sm:w-auto px-7 py-4 glass-card hover:border-[#00F59B]/40 text-slate-200 hover:text-white font-bold text-sm rounded-xl transition text-center">

                            Student Login

                        </a>

                    </div>


                    <!-- USERS -->

                    <div
                        class="pt-6 border-t border-[#1A3326]/60 flex items-center justify-center lg:justify-start gap-4 text-xs text-[#718E81]">

                        <div class="flex -space-x-2">

                            <div
                                class="w-7 h-7 rounded-full bg-emerald-700 border-2 border-[#080E0B] flex items-center justify-center text-[10px] font-bold">
                                AK
                            </div>

                            <div
                                class="w-7 h-7 rounded-full bg-teal-600 border-2 border-[#080E0B] flex items-center justify-center text-[10px] font-bold">
                                MR
                            </div>

                            <div
                                class="w-7 h-7 rounded-full bg-[#00F59B] border-2 border-[#080E0B] flex items-center justify-center text-[10px] font-bold text-[#080E0B]">
                                SJ
                            </div>

                        </div>

                        <span>
                            <strong class="text-white">
                                10,000+
                            </strong>
                            students using Campus Coin
                        </span>

                    </div>

                </div>


                <!-- RIGHT CARD -->

                <div class="lg:col-span-5 relative flex justify-center items-center">

                    <div
                        class="absolute w-72 h-72 bg-[#00F59B]/25 rounded-full blur-[90px] animate-pulse-glow">
                    </div>


                    <div class="relative w-full max-w-sm animate-float">

                        <!-- CAMPUS CARD -->

                        <div
                            class="bg-gradient-to-br from-[#0F261B] via-[#0D1C14] to-[#080E0B] border-2 border-[#00F59B] rounded-3xl p-6 shadow-neon-card relative overflow-hidden">

                            <div class="flex items-center justify-between mb-6">

                                <div class="flex items-center gap-2">

                                    <div
                                        class="w-7 h-7 rounded-lg bg-[#00F59B] flex items-center justify-center">

                                        <span class="text-[#080E0B] font-black">
                                            ¢
                                        </span>

                                    </div>

                                    <span class="font-extrabold text-sm tracking-wider">
                                        CAMPUS COIN
                                    </span>

                                </div>

                                <span
                                    class="text-[10px] font-bold px-2 py-1 rounded-full bg-[#00F59B]/20 text-[#00F59B]">

                                    STUDENT PASS

                                </span>

                            </div>


                            <!-- CHIP -->

                            <div
                                class="w-11 h-8 rounded-md bg-gradient-to-r from-amber-300 via-yellow-500 to-amber-600 border border-yellow-200/50 mb-6">
                            </div>


                            <!-- BALANCE -->

                            <div class="space-y-1 mb-6">

                                <span
                                    class="text-[10px] uppercase font-bold text-[#718E81] tracking-widest">

                                    Available Coin Balance

                                </span>

                                <div class="flex items-baseline gap-2">

                                    <span
                                        class="text-3xl sm:text-4xl font-black text-[#00F59B]">

                                        3,450

                                    </span>

                                    <span class="text-sm font-bold text-emerald-400">
                                        CC
                                    </span>

                                </div>

                            </div>


                            <!-- CARD DETAILS -->

                            <div
                                class="flex items-end justify-between pt-4 border-t border-[#1A3326]">

                                <div>

                                    <p class="text-[9px] uppercase font-bold text-[#718E81]">
                                        Cardholder
                                    </p>

                                    <p class="text-xs font-bold text-white">
                                        ALEX JOHNSON
                                    </p>

                                </div>

                                <div class="text-right">

                                    <p class="text-[9px] uppercase font-bold text-[#718E81]">
                                        Student ID
                                    </p>

                                    <p class="text-xs font-mono font-bold text-[#00F59B]">
                                        CC-2026-8941
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- QR CARD -->

                        <div
                            class="absolute -bottom-5 -right-3 glass-card border border-[#00F59B]/50 rounded-2xl p-3.5 shadow-neon flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-xl bg-white p-1 flex items-center justify-center">

                                <svg
                                    class="w-full h-full text-[#080E0B]"
                                    viewBox="0 0 24 24"
                                    fill="currentColor">

                                    <path
                                        d="M2 2h8v8H2V2zm2 2v4h4V4H4zm10-2h8v8h-8V2zm2 2v4h4V4h-4zM2 14h8v8H2v-8zm2 2v4h4v-4H4zm14-2h4v4h-4v-4zm-4 0h2v2h-2v-2zm2 4h2v2h-2v-2zm2 2h2v2h-2v-2zm-6-2h2v4h-2v-4zm0-2h2v2h-2v-2z" />

                                </svg>

                            </div>

                            <div>

                                <p class="text-[10px] text-[#718E81] font-bold uppercase">
                                    Instant Checkout
                                </p>

                                <p class="text-xs font-black text-white">

                                    <span class="text-[#00F59B]">
                                        ●
                                    </span>

                                    Scan & Pay Active

                                </p>

                            </div>

                        </div>


                        <!-- REWARD BADGE -->

                        <div
                            class="absolute -top-4 -left-4 glass-card border border-[#00F59B]/30 rounded-xl px-3 py-2 shadow-lg">

                            <span class="text-[11px] text-slate-300">
                                Hackathon Reward:
                            </span>

                            <span class="font-bold text-[#00F59B]">
                                +250 CC
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- STATS -->
    <!-- ================================================= -->

    <section class="py-12 border-y border-[#1A3326] bg-[#0A130F]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

                <div>

                    <p class="text-3xl sm:text-4xl font-black text-white">
                        10K+
                    </p>

                    <p class="text-xs sm:text-sm text-[#718E81]">
                        Active Students
                    </p>

                </div>


                <div>

                    <p class="text-3xl sm:text-4xl font-black text-[#00F59B]">
                        0%
                    </p>

                    <p class="text-xs sm:text-sm text-[#718E81]">
                        P2P Transfer Fee
                    </p>

                </div>


                <div>

                    <p class="text-3xl sm:text-4xl font-black text-white">
                        45+
                    </p>

                    <p class="text-xs sm:text-sm text-[#718E81]">
                        Campus Cafes & Stores
                    </p>

                </div>


                <div>

                    <p class="text-3xl sm:text-4xl font-black text-[#00F59B]">
                        &lt; 0.2s
                    </p>

                    <p class="text-xs sm:text-sm text-[#718E81]">
                        Payment Speed
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- QUICK NAVIGATION -->
    <!-- ================================================= -->

    <section class="py-20">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-12">

                <span
                    class="text-xs uppercase font-mono font-bold tracking-widest text-[#00F59B] bg-[#00F59B]/10 px-3 py-1 rounded-full">

                    Explore Campus Coin

                </span>

                <h2 class="text-3xl sm:text-4xl font-black text-white mt-5">

                    Explore Our Platform

                </h2>

                <p class="text-sm text-[#718E81] mt-3 max-w-xl mx-auto">

                    Learn how Campus Coin works, discover student benefits,
                    view the campus leaderboard and get answers to common questions.

                </p>

            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">

                <!-- FEATURES -->

                <a href="{{ route('features') }}"
                    class="group bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-6 transition hover:-translate-y-2">

                    <div
                        class="w-12 h-12 rounded-xl bg-[#12231B] flex items-center justify-center text-[#00F59B] text-2xl mb-5">

                        ⌁

                    </div>

                    <h3 class="font-bold text-white mb-2">
                        Features
                    </h3>

                    <p class="text-xs text-[#718E81] leading-relaxed">
                        Explore the core features of Campus Coin.
                    </p>

                    <span
                        class="inline-block mt-4 text-xs font-bold text-[#00F59B] group-hover:translate-x-1 transition">

                        Explore →

                    </span>

                </a>


                <!-- HOW IT WORKS -->

                <a href="{{ route('how-it-works') }}"
                    class="group bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-6 transition hover:-translate-y-2">

                    <div
                        class="w-12 h-12 rounded-xl bg-[#12231B] flex items-center justify-center text-[#00F59B] text-2xl mb-5">

                        ⇄

                    </div>

                    <h3 class="font-bold text-white mb-2">
                        How It Works
                    </h3>

                    <p class="text-xs text-[#718E81] leading-relaxed">
                        Learn how students use Campus Coin.
                    </p>

                    <span
                        class="inline-block mt-4 text-xs font-bold text-[#00F59B] group-hover:translate-x-1 transition">

                        Learn More →

                    </span>

                </a>


                <!-- PERKS -->

                <a href="{{ route('perks') }}"
                    class="group bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-6 transition hover:-translate-y-2">

                    <div
                        class="w-12 h-12 rounded-xl bg-[#12231B] flex items-center justify-center text-[#00F59B] text-2xl mb-5">

                        ★

                    </div>

                    <h3 class="font-bold text-white mb-2">
                        Campus Perks
                    </h3>

                    <p class="text-xs text-[#718E81] leading-relaxed">
                        Discover student rewards and benefits.
                    </p>

                    <span
                        class="inline-block mt-4 text-xs font-bold text-[#00F59B] group-hover:translate-x-1 transition">

                        View Perks →

                    </span>

                </a>


                <!-- LEADERBOARD -->

                <a href="{{ route('leaderboard') }}"
                    class="group bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-6 transition hover:-translate-y-2">

                    <div
                        class="w-12 h-12 rounded-xl bg-[#12231B] flex items-center justify-center text-[#00F59B] text-2xl mb-5">

                        🏆

                    </div>

                    <h3 class="font-bold text-white mb-2">
                        Leaderboard
                    </h3>

                    <p class="text-xs text-[#718E81] leading-relaxed">
                        See the campus activity leaderboard.
                    </p>

                    <span
                        class="inline-block mt-4 text-xs font-bold text-[#00F59B] group-hover:translate-x-1 transition">

                        View Board →

                    </span>

                </a>


                <!-- FAQ -->

                <a href="{{ route('faq') }}"
                    class="group bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-6 transition hover:-translate-y-2">

                    <div
                        class="w-12 h-12 rounded-xl bg-[#12231B] flex items-center justify-center text-[#00F59B] text-2xl mb-5">

                        ?

                    </div>

                    <h3 class="font-bold text-white mb-2">
                        FAQ
                    </h3>

                    <p class="text-xs text-[#718E81] leading-relaxed">
                        Find answers to common questions.
                    </p>

                    <span
                        class="inline-block mt-4 text-xs font-bold text-[#00F59B] group-hover:translate-x-1 transition">

                        Read FAQ →

                    </span>

                </a>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- FINAL CTA -->
    <!-- ================================================= -->

    <section class="py-20 relative overflow-hidden">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div
                class="glass-card border border-[#00F59B]/40 rounded-3xl p-8 sm:p-12 text-center relative overflow-hidden shadow-neon-card">

                <div
                    class="absolute -top-24 -left-24 w-48 h-48 bg-[#00F59B]/20 rounded-full blur-3xl">
                </div>

                <div
                    class="absolute -bottom-24 -right-24 w-48 h-48 bg-[#10B981]/20 rounded-full blur-3xl">
                </div>


                <div class="relative z-10">

                    <h2 class="text-3xl sm:text-4xl font-black text-white">

                        Ready to Upgrade Your

                        <br>

                        <span class="text-[#00F59B]">
                            Campus Experience?
                        </span>

                    </h2>


                    <p class="text-sm text-[#718E81] max-w-xl mx-auto mt-4">

                        Create your student account and start exploring Campus Coin.

                    </p>


                    <div class="flex flex-col sm:flex-row justify-center gap-3 mt-7">

                        <!-- REGISTER -->

                        <a href="{{ route('register') }}"
                            class="inline-flex justify-center px-8 py-3.5 bg-[#00F59B] hover:bg-[#00e08d] text-[#080E0B] font-extrabold text-sm rounded-xl shadow-neon transition hover:scale-105">

                            Create Account →

                        </a>


                        <!-- LOGIN -->

                        <a href="{{ route('login') }}"
                            class="inline-flex justify-center px-8 py-3.5 border border-[#00F59B]/40 text-[#00F59B] hover:bg-[#00F59B]/10 font-extrabold text-sm rounded-xl transition">

                            Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- FOOTER -->
    <!-- ================================================= -->

    <footer class="border-t border-[#1A3326] bg-[#050A07] py-10 text-xs text-[#718E81]">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex flex-col md:flex-row items-center justify-between gap-6">

                <!-- BRAND -->

                <div class="flex items-center gap-2">

                    <div
                        class="w-7 h-7 rounded-lg bg-[#00F59B] flex items-center justify-center text-[#080E0B] font-black">

                        ¢

                    </div>

                    <span class="text-white font-bold">
                        Campus Coin
                    </span>

                    <span>
                        • University Micro-Economy Platform
                    </span>

                </div>


                <!-- FOOTER BUTTONS -->

                <div class="flex items-center gap-3">

                    <a href="{{ route('login') }}"
                        class="px-4 py-2 rounded-lg border border-[#1A3326] text-slate-300 hover:text-[#00F59B] hover:border-[#00F59B]/40 transition">

                        Login

                    </a>

                    <a href="{{ route('register') }}"
                        class="px-4 py-2 rounded-lg bg-[#00F59B] text-[#080E0B] font-bold hover:bg-[#00e08d] transition">

                        Register

                    </a>

                </div>


                <p>
                    © 2026 Campus Coin. Built with Laravel & Tailwind CSS.
                </p>

            </div>

        </div>

    </footer>

</body>

</html>
