<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Features — Campus Coin</title>

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

        .glass-card {
            background: rgba(13, 24, 19, .72);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(0, 245, 155, .15);
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .feature-card {
            transition: all .3s ease;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 0 30px rgba(0, 245, 155, .12);
        }
    </style>
</head>


<body class="text-slate-100 font-sans overflow-x-hidden">

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
                    class="hover:text-[#00F59B] transition">
                    Home
                </a>

                <a href="{{ route('features') }}"
                    class="text-[#00F59B] hover:text-white transition">
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


            <!-- AUTH -->

            <div class="flex items-center gap-2 sm:gap-3">

                <a href="{{ route('login') }}"
                    class="hidden sm:inline-flex px-4 py-2.5 rounded-xl text-sm font-bold text-slate-200 hover:text-[#00F59B] hover:bg-[#00F59B]/10 transition">

                    Student Login

                </a>

                <a href="{{ route('register') }}"
                    class="hidden sm:inline-flex px-4 py-2.5 rounded-xl text-sm font-bold text-[#00F59B] border border-[#00F59B]/40 hover:bg-[#00F59B] hover:text-[#080E0B] transition">

                    Register

                </a>

                <a href="{{ route('login') }}"
                    class="lg:hidden px-4 py-2 rounded-full bg-[#00F59B] text-[#080E0B] text-xs font-extrabold">

                    Login

                </a>

            </div>

        </div>

    </header>


    <!-- ================================================= -->
    <!-- PAGE HERO -->
    <!-- ================================================= -->

    <section class="relative py-20 sm:py-28">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <span
                class="inline-flex text-xs uppercase font-mono font-bold tracking-widest text-[#00F59B] bg-[#00F59B]/10 border border-[#00F59B]/20 px-4 py-2 rounded-full">

                Campus Coin Features

            </span>


            <h1
                class="text-4xl sm:text-5xl lg:text-6xl font-black text-white mt-6 leading-tight">

                Everything You Need for

                <br>

                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-[#00F59B] via-[#34D399] to-[#059669]">

                    Campus Payments

                </span>

            </h1>


            <p class="max-w-2xl mx-auto text-[#718E81] text-base sm:text-lg mt-6 leading-relaxed">

                Campus Coin brings payments, transfers, rewards and
                student benefits together in one simple digital platform.

            </p>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- FEATURES -->
    <!-- ================================================= -->

    <section class="pb-24">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


                <!-- FEATURE 1 -->

                <div
                    class="feature-card bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-7">

                    <div
                        class="w-14 h-14 rounded-2xl bg-[#00F59B]/10 border border-[#00F59B]/20 flex items-center justify-center text-[#00F59B] text-3xl mb-6">

                        ⌁

                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        Instant QR Pay
                    </h3>

                    <p class="text-sm text-[#718E81] leading-relaxed">

                        Scan participating merchant QR codes and make
                        campus payments quickly without carrying cash.

                    </p>

                    <div class="mt-6 pt-5 border-t border-[#1A3326]">

                        <span class="text-xs font-bold text-[#00F59B]">
                            FAST & SIMPLE
                        </span>

                    </div>

                </div>


                <!-- FEATURE 2 -->

                <div
                    class="feature-card bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-7">

                    <div
                        class="w-14 h-14 rounded-2xl bg-[#00F59B]/10 border border-[#00F59B]/20 flex items-center justify-center text-[#00F59B] text-3xl mb-6">

                        ⇄

                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        Peer Transfers
                    </h3>

                    <p class="text-sm text-[#718E81] leading-relaxed">

                        Send Campus Coins to classmates for food,
                        projects, shared expenses and other eligible uses.

                    </p>

                    <div class="mt-6 pt-5 border-t border-[#1A3326]">

                        <span class="text-xs font-bold text-[#00F59B]">
                            STUDENT TO STUDENT
                        </span>

                    </div>

                </div>


                <!-- FEATURE 3 -->

                <div
                    class="feature-card bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-7">

                    <div
                        class="w-14 h-14 rounded-2xl bg-[#00F59B]/10 border border-[#00F59B]/20 flex items-center justify-center text-[#00F59B] text-3xl mb-6">

                        ★

                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        Academic Rewards
                    </h3>

                    <p class="text-sm text-[#718E81] leading-relaxed">

                        Earn coins through eligible competitions,
                        academic activities and approved university programs.

                    </p>

                    <div class="mt-6 pt-5 border-t border-[#1A3326]">

                        <span class="text-xs font-bold text-[#00F59B]">
                            EARN & REWARD
                        </span>

                    </div>

                </div>


                <!-- FEATURE 4 -->

                <div
                    class="feature-card bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-7">

                    <div
                        class="w-14 h-14 rounded-2xl bg-[#00F59B]/10 border border-[#00F59B]/20 flex items-center justify-center text-[#00F59B] text-3xl mb-6">

                        💳

                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        Digital Student Wallet
                    </h3>

                    <p class="text-sm text-[#718E81] leading-relaxed">

                        Keep your Campus Coin balance available
                        digitally and manage your campus spending from one place.

                    </p>

                    <div class="mt-6 pt-5 border-t border-[#1A3326]">

                        <span class="text-xs font-bold text-[#00F59B]">
                            ONE DIGITAL WALLET
                        </span>

                    </div>

                </div>


                <!-- FEATURE 5 -->

                <div
                    class="feature-card bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-7">

                    <div
                        class="w-14 h-14 rounded-2xl bg-[#00F59B]/10 border border-[#00F59B]/20 flex items-center justify-center text-[#00F59B] text-3xl mb-6">

                        🔐

                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        Secure Student Access
                    </h3>

                    <p class="text-sm text-[#718E81] leading-relaxed">

                        Access your account through your registered
                        student credentials and keep your wallet protected.

                    </p>

                    <div class="mt-6 pt-5 border-t border-[#1A3326]">

                        <span class="text-xs font-bold text-[#00F59B]">
                            ACCOUNT SECURITY
                        </span>

                    </div>

                </div>


                <!-- FEATURE 6 -->

                <div
                    class="feature-card bg-[#0D1813] border border-[#1A3326] hover:border-[#00F59B]/50 rounded-2xl p-7">

                    <div
                        class="w-14 h-14 rounded-2xl bg-[#00F59B]/10 border border-[#00F59B]/20 flex items-center justify-center text-[#00F59B] text-3xl mb-6">

                        📊

                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        Activity Tracking
                    </h3>

                    <p class="text-sm text-[#718E81] leading-relaxed">

                        Keep track of your Campus Coin activity,
                        eligible rewards and wallet transactions.

                    </p>

                    <div class="mt-6 pt-5 border-t border-[#1A3326]">

                        <span class="text-xs font-bold text-[#00F59B]">
                            TRACK YOUR ACTIVITY
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- FEATURE HIGHLIGHT -->
    <!-- ================================================= -->

    <section class="py-24 bg-[#0A130F] border-y border-[#1A3326]">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- LEFT -->

                <div>

                    <span
                        class="text-xs uppercase font-mono font-bold tracking-widest text-[#00F59B]">

                        Built For Students

                    </span>


                    <h2 class="text-3xl sm:text-4xl font-black text-white mt-4 leading-tight">

                        One Platform.

                        <br>

                        <span class="text-[#00F59B]">
                            Multiple Campus Benefits.
                        </span>

                    </h2>


                    <p class="text-[#718E81] text-sm leading-relaxed mt-5">

                        Campus Coin is designed around everyday
                        university activities. Students can manage
                        payments, transfers and eligible rewards
                        from one digital experience.

                    </p>


                    <div class="space-y-4 mt-7">

                        <div class="flex gap-4">

                            <div
                                class="w-9 h-9 shrink-0 rounded-lg bg-[#00F59B]/10 text-[#00F59B] flex items-center justify-center font-bold">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold text-white">
                                    Simple Payments
                                </h4>

                                <p class="text-xs text-[#718E81] mt-1">
                                    Make eligible campus purchases digitally.
                                </p>

                            </div>

                        </div>


                        <div class="flex gap-4">

                            <div
                                class="w-9 h-9 shrink-0 rounded-lg bg-[#00F59B]/10 text-[#00F59B] flex items-center justify-center font-bold">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold text-white">
                                    Student Rewards
                                </h4>

                                <p class="text-xs text-[#718E81] mt-1">
                                    Receive coins through eligible activities.
                                </p>

                            </div>

                        </div>


                        <div class="flex gap-4">

                            <div
                                class="w-9 h-9 shrink-0 rounded-lg bg-[#00F59B]/10 text-[#00F59B] flex items-center justify-center font-bold">

                                ✓

                            </div>

                            <div>

                                <h4 class="font-bold text-white">
                                    Connected Campus Experience
                                </h4>

                                <p class="text-xs text-[#718E81] mt-1">
                                    Access participating campus services through one platform.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT CARD -->

                <div class="relative flex justify-center">

                    <div
                        class="absolute w-64 h-64 bg-[#00F59B]/20 rounded-full blur-[90px]">
                    </div>


                    <div
                        class="relative w-full max-w-md bg-gradient-to-br from-[#12291F] to-[#0D1813] border border-[#00F59B]/40 rounded-3xl p-7 shadow-neon-card animate-float">

                        <div class="flex items-center justify-between mb-7">

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-11 h-11 rounded-xl bg-[#00F59B] flex items-center justify-center">

                                    <span class="text-xl font-black text-[#080E0B]">
                                        ¢
                                    </span>

                                </div>

                                <div>

                                    <p class="font-black text-white">
                                        Campus Wallet
                                    </p>

                                    <p class="text-[10px] text-[#718E81]">
                                        STUDENT ACCOUNT
                                    </p>

                                </div>

                            </div>


                            <span
                                class="px-2.5 py-1 rounded-full bg-[#00F59B]/10 border border-[#00F59B]/20 text-[#00F59B] text-[9px] font-bold">

                                ACTIVE

                            </span>

                        </div>


                        <p class="text-[10px] uppercase tracking-widest text-[#718E81]">
                            Available Balance
                        </p>


                        <div class="flex items-end gap-2 mt-1">

                            <span class="text-4xl font-black text-[#00F59B]">
                                3,450
                            </span>

                            <span class="text-sm font-bold text-emerald-400 mb-1">
                                CC
                            </span>

                        </div>


                        <div class="grid grid-cols-2 gap-3 mt-7">

                            <div
                                class="bg-[#080E0B]/70 border border-[#1A3326] rounded-xl p-4">

                                <p class="text-[9px] text-[#718E81] uppercase font-bold">
                                    QR Payments
                                </p>

                                <p class="text-white font-bold text-sm mt-1">
                                    Enabled
                                </p>

                            </div>


                            <div
                                class="bg-[#080E0B]/70 border border-[#1A3326] rounded-xl p-4">

                                <p class="text-[9px] text-[#718E81] uppercase font-bold">
                                    Transfers
                                </p>

                                <p class="text-white font-bold text-sm mt-1">
                                    Enabled
                                </p>

                            </div>


                            <div
                                class="bg-[#080E0B]/70 border border-[#1A3326] rounded-xl p-4">

                                <p class="text-[9px] text-[#718E81] uppercase font-bold">
                                    Rewards
                                </p>

                                <p class="text-white font-bold text-sm mt-1">
                                    Active
                                </p>

                            </div>


                            <div
                                class="bg-[#080E0B]/70 border border-[#1A3326] rounded-xl p-4">

                                <p class="text-[9px] text-[#718E81] uppercase font-bold">
                                    Security
                                </p>

                                <p class="text-white font-bold text-sm mt-1">
                                    Protected
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- ================================================= -->
    <!-- CTA -->
    <!-- ================================================= -->

    <section class="py-20">

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

                        Ready to Use

                        <span class="text-[#00F59B]">
                            Campus Coin?
                        </span>

                    </h2>


                    <p class="text-sm text-[#718E81] max-w-xl mx-auto mt-4">

                        Create your student account and start exploring
                        the Campus Coin experience.

                    </p>


                    <div class="flex flex-col sm:flex-row justify-center gap-3 mt-7">

                        <a href="{{ route('register') }}"
                            class="inline-flex justify-center px-8 py-3.5 bg-[#00F59B] hover:bg-[#00e08d] text-[#080E0B] font-extrabold text-sm rounded-xl shadow-neon transition hover:scale-105">

                            Create Account →

                        </a>

                        <a href="{{ route('home') }}"
                            class="inline-flex justify-center px-8 py-3.5 border border-[#00F59B]/40 text-[#00F59B] hover:bg-[#00F59B]/10 font-extrabold text-sm rounded-xl transition">

                            Back to Home

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
