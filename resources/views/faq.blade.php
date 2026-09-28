<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FAQ — Campus Coin</title>

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

        .faq-item {
            transition: all .3s ease;
        }

        .faq-item:hover {
            border-color: rgba(0,245,155,.35);
        }

        .faq-item.active {
            border-color: rgba(0,245,155,.4);
            box-shadow: 0 15px 45px rgba(0,0,0,.25);
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transition:
                max-height .35s ease,
                opacity .25s ease,
                padding .35s ease;
        }

        .faq-item.active .faq-answer {
            max-height: 300px;
            opacity: 1;
            padding-bottom: 22px;
        }

        .faq-icon {
            transition: transform .3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .search-box:focus-within {
            border-color: rgba(0,245,155,.5);
            box-shadow: 0 0 25px rgba(0,245,155,.08);
        }

        .category-btn {
            transition: all .25s ease;
        }

        .category-btn.active,
        .category-btn:hover {
            background: rgba(0,245,155,.1);
            color: #00F59B;
            border-color: rgba(0,245,155,.3);
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
                       class="text-gray-300 hover:text-neon transition">
                        Leaderboard
                    </a>

                    <a href="{{ route('faq') }}"
                       class="text-neon font-semibold">
                        FAQ
                    </a>

                </div>


                <!-- Auth -->
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
                       class="py-2 text-gray-300">
                        Leaderboard
                    </a>

                    <a href="{{ route('faq') }}"
                       class="py-2 text-neon font-semibold">
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

                HELP CENTER

            </div>


            <h1 class="text-4xl
                       md:text-6xl
                       lg:text-7xl
                       font-extrabold
                       leading-tight
                       tracking-tight">

                Frequently Asked
                <span class="text-neon">Questions</span>

            </h1>


            <p class="mt-7
                      max-w-2xl
                      mx-auto
                      text-gray-400
                      text-lg
                      md:text-xl
                      leading-relaxed">

                Find quick answers about Campus Coin, accounts,
                payments, rewards and campus perks.

            </p>


            <!-- Search -->
            <div class="search-box
                        max-w-2xl
                        mx-auto
                        mt-10
                        flex items-center
                        gap-3
                        bg-card
                        border border-border
                        rounded-2xl
                        px-5
                        py-4">

                <svg class="w-5 h-5 text-gray-500 shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="m21 21-4.35-4.35m2.1-5.4a7.5 7.5 0 11-15 0 7.5 7.5 0 0115 0z"/>

                </svg>

                <input
                    id="faqSearch"
                    type="text"
                    placeholder="Search your question..."
                    class="w-full
                           bg-transparent
                           outline-none
                           text-white
                           placeholder-gray-600">

            </div>

        </div>

    </section>


    <!-- ================= FAQ AREA ================= -->
    <section class="max-w-6xl mx-auto px-6 lg:px-8 pb-24">

        <!-- Categories -->
        <div class="flex flex-wrap
                    justify-center
                    gap-3
                    mb-12">

            <button type="button"
                    class="category-btn active
                           px-5 py-2.5
                           rounded-xl
                           border border-border
                           text-sm
                           font-semibold"
                    data-category="all">

                All Questions

            </button>

            <button type="button"
                    class="category-btn
                           px-5 py-2.5
                           rounded-xl
                           border border-border
                           text-gray-400
                           text-sm
                           font-semibold"
                    data-category="account">

                Account

            </button>

            <button type="button"
                    class="category-btn
                           px-5 py-2.5
                           rounded-xl
                           border border-border
                           text-gray-400
                           text-sm
                           font-semibold"
                    data-category="payment">

                Payments

            </button>

            <button type="button"
                    class="category-btn
                           px-5 py-2.5
                           rounded-xl
                           border border-border
                           text-gray-400
                           text-sm
                           font-semibold"
                    data-category="rewards">

                Rewards

            </button>

            <button type="button"
                    class="category-btn
                           px-5 py-2.5
                           rounded-xl
                           border border-border
                           text-gray-400
                           text-sm
                           font-semibold"
                    data-category="security">

                Security

            </button>

        </div>


        <!-- FAQ LIST -->
        <div id="faqList" class="space-y-4">


            <!-- FAQ 1 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="account"
                 data-search="what is campus coin campus coin">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            01

                        </div>

                        <span class="font-bold text-lg">
                            What is Campus Coin?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Campus Coin is a digital campus payment and
                        rewards platform designed to help students
                        manage eligible campus transactions and
                        rewards from one account.

                    </p>

                </div>

            </div>


            <!-- FAQ 2 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="account"
                 data-search="how create account register signup">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            02

                        </div>

                        <span class="font-bold text-lg">
                            How do I create a Campus Coin account?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Click the Get Started or Register button,
                        complete the registration form and create
                        your student account.

                    </p>

                </div>

            </div>


            <!-- FAQ 3 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="payment"
                 data-search="how payments campus coin pay transaction">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            03

                        </div>

                        <span class="font-bold text-lg">
                            How do Campus Coin payments work?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Where Campus Coin is supported, students can
                        use their available digital balance for eligible
                        campus purchases or services.

                    </p>

                </div>

            </div>


            <!-- FAQ 4 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="payment"
                 data-search="where use campus coin food cafe campus services">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            04

                        </div>

                        <span class="font-bold text-lg">
                            Where can I use Campus Coins?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Campus Coins can be used at participating
                        campus locations and services that support
                        the Campus Coin system.

                    </p>

                </div>

            </div>


            <!-- FAQ 5 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="rewards"
                 data-search="how earn rewards coins activities">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            05

                        </div>

                        <span class="font-bold text-lg">
                            How can I earn rewards?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Eligible campus activities, academic activities
                        and other reward programs can provide Campus
                        Coin rewards according to the rules of your
                        campus program.

                    </p>

                </div>

            </div>


            <!-- FAQ 6 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="rewards"
                 data-search="leaderboard ranking rewards coins">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            06

                        </div>

                        <span class="font-bold text-lg">
                            What is the Campus Coin leaderboard?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        The leaderboard displays eligible student
                        activity and achievement information based
                        on the Campus Coin program.

                    </p>

                </div>

            </div>


            <!-- FAQ 7 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="security"
                 data-search="secure safe account security password">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            07

                        </div>

                        <span class="font-bold text-lg">
                            Is my Campus Coin account secure?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Campus Coin should use secure authentication
                        practices and students should keep their login
                        credentials private and use a strong password.

                    </p>

                </div>

            </div>


            <!-- FAQ 8 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="account"
                 data-search="forgot password reset password login">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            08

                        </div>

                        <span class="font-bold text-lg">
                            What if I forget my password?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Use the password reset option on the login
                        page if it is available in your Campus Coin
                        installation.

                    </p>

                </div>

            </div>


            <!-- FAQ 9 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="payment"
                 data-search="balance check wallet campus coins balance">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            09

                        </div>

                        <span class="font-bold text-lg">
                            How can I check my Campus Coin balance?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Your available balance can be displayed in
                        your student wallet or dashboard after you
                        sign in to your account.

                    </p>

                </div>

            </div>


            <!-- FAQ 10 -->
            <div class="faq-item
                        bg-card
                        border border-border
                        rounded-2xl
                        px-6
                        faq-question"
                 data-category="security"
                 data-search="logout account safety login">

                <button type="button"
                        class="faq-toggle
                               w-full
                               flex items-center
                               justify-between
                               gap-5
                               py-6
                               text-left">

                    <div class="flex items-center gap-4">

                        <div class="w-10 h-10
                                    shrink-0
                                    rounded-xl
                                    bg-neon/10
                                    border border-neon/20
                                    flex items-center justify-center
                                    text-neon
                                    font-mono">

                            10

                        </div>

                        <span class="font-bold text-lg">
                            What should I do after using my account?
                        </span>

                    </div>

                    <span class="faq-icon
                                 w-8 h-8
                                 shrink-0
                                 rounded-lg
                                 bg-dark
                                 border border-border
                                 flex items-center justify-center
                                 text-neon
                                 text-xl">

                        +

                    </span>

                </button>


                <div class="faq-answer">

                    <p class="text-gray-400
                              leading-7
                              pl-14">

                        Always log out when using a shared or public
                        computer and never share your account password
                        with another person.

                    </p>

                </div>

            </div>


        </div>


        <!-- No Results -->
        <div id="noResults"
             class="hidden text-center py-16">

            <div class="w-16 h-16
                        mx-auto
                        rounded-2xl
                        bg-neon/10
                        border border-neon/20
                        flex items-center justify-center
                        text-2xl">

                🔍

            </div>

            <h3 class="text-xl font-bold mt-5">
                No questions found
            </h3>

            <p class="text-gray-500 mt-2">
                Try searching with a different keyword.
            </p>

        </div>

    </section>


    <!-- ================= QUICK HELP ================= -->
    <section class="border-y border-border bg-surface/70">

        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-24">

            <div class="text-center mb-12">

                <span class="text-neon
                             font-mono
                             text-xs
                             tracking-[.25em]">

                    NEED MORE HELP?

                </span>

                <h2 class="text-3xl
                           md:text-5xl
                           font-extrabold
                           mt-4">

                    Explore Campus Coin

                </h2>

            </div>


            <div class="grid md:grid-cols-3 gap-6">


                <!-- CARD -->
                <a href="{{ route('features') }}"
                   class="bg-card
                          border border-border
                          rounded-3xl
                          p-7
                          hover:border-neon/40
                          transition">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-neon/10
                                border border-neon/20
                                flex items-center justify-center
                                text-2xl
                                mb-6">

                        ⚡

                    </div>

                    <h3 class="text-xl font-bold">
                        Explore Features
                    </h3>

                    <p class="text-gray-400
                              text-sm
                              leading-7
                              mt-3">

                        See what Campus Coin can do for your campus
                        payments and rewards.

                    </p>

                    <div class="text-neon text-sm font-semibold mt-5">
                        View Features →
                    </div>

                </a>


                <!-- CARD -->
                <a href="{{ route('how-it-works') }}"
                   class="bg-card
                          border border-border
                          rounded-3xl
                          p-7
                          hover:border-neon/40
                          transition">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-neon/10
                                border border-neon/20
                                flex items-center justify-center
                                text-2xl
                                mb-6">

                        🔄

                    </div>

                    <h3 class="text-xl font-bold">
                        How It Works
                    </h3>

                    <p class="text-gray-400
                              text-sm
                              leading-7
                              mt-3">

                        Learn how to create an account, use Campus
                        Coins and earn eligible rewards.

                    </p>

                    <div class="text-neon text-sm font-semibold mt-5">
                        Learn More →
                    </div>

                </a>


                <!-- CARD -->
                <a href="{{ route('perks') }}"
                   class="bg-card
                          border border-border
                          rounded-3xl
                          p-7
                          hover:border-neon/40
                          transition">

                    <div class="w-14 h-14
                                rounded-2xl
                                bg-neon/10
                                border border-neon/20
                                flex items-center justify-center
                                text-2xl
                                mb-6">

                        🎁

                    </div>

                    <h3 class="text-xl font-bold">
                        Campus Perks
                    </h3>

                    <p class="text-gray-400
                              text-sm
                              leading-7
                              mt-3">

                        Discover the benefits and rewards available
                        through participating campus programs.

                    </p>

                    <div class="text-neon text-sm font-semibold mt-5">
                        View Perks →
                    </div>

                </a>

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

                    READY TO START?

                </span>


                <h2 class="text-3xl
                           md:text-5xl
                           font-extrabold
                           mt-5">

                    Join
                    <span class="text-neon">
                        Campus Coin
                    </span>

                </h2>


                <p class="text-gray-400
                          max-w-xl
                          mx-auto
                          mt-5">

                    Create your account and start exploring the
                    Campus Coin experience.

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


                    <a href="{{ route('login') }}"
                       class="px-7
                              py-3.5
                              rounded-xl
                              border border-border
                              text-white
                              font-semibold
                              hover:border-neon/40
                              transition">

                        Login

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


    <!-- ================= JAVASCRIPT ================= -->
    <script>

        /* ================= MOBILE MENU ================= */

        const mobileMenuBtn =
            document.getElementById('mobileMenuBtn');

        const mobileMenu =
            document.getElementById('mobileMenu');

        mobileMenuBtn.addEventListener('click', () => {

            mobileMenu.classList.toggle('hidden');

        });


        /* ================= FAQ ACCORDION ================= */

        const faqToggles =
            document.querySelectorAll('.faq-toggle');

        faqToggles.forEach(toggle => {

            toggle.addEventListener('click', () => {

                const item =
                    toggle.closest('.faq-item');

                const wasActive =
                    item.classList.contains('active');


                // Close all other questions
                document
                    .querySelectorAll('.faq-item.active')
                    .forEach(activeItem => {

                        if (activeItem !== item) {
                            activeItem.classList.remove('active');
                        }

                    });


                // Toggle current question
                if (wasActive) {
                    item.classList.remove('active');
                } else {
                    item.classList.add('active');
                }

            });

        });


        /* ================= SEARCH ================= */

        const searchInput =
            document.getElementById('faqSearch');

        const faqItems =
            document.querySelectorAll('.faq-question');

        const noResults =
            document.getElementById('noResults');


        searchInput.addEventListener('input', function () {

            const searchValue =
                this.value.toLowerCase().trim();

            let visibleCount = 0;


            faqItems.forEach(item => {

                const questionText =
                    item.innerText.toLowerCase();

                const searchData =
                    item.dataset.search.toLowerCase();


                if (
                    questionText.includes(searchValue) ||
                    searchData.includes(searchValue)
                ) {

                    item.style.display = '';

                    visibleCount++;

                } else {

                    item.style.display = 'none';
                    item.classList.remove('active');

                }

            });


            if (visibleCount === 0) {

                noResults.classList.remove('hidden');

            } else {

                noResults.classList.add('hidden');

            }

        });


        /* ================= CATEGORY FILTER ================= */

        const categoryButtons =
            document.querySelectorAll('.category-btn');


        categoryButtons.forEach(button => {

            button.addEventListener('click', () => {

                const selectedCategory =
                    button.dataset.category;


                // Active button
                categoryButtons.forEach(btn => {

                    btn.classList.remove('active');

                });

                button.classList.add('active');


                let visibleCount = 0;


                faqItems.forEach(item => {

                    const itemCategory =
                        item.dataset.category;


                    if (
                        selectedCategory === 'all' ||
                        itemCategory === selectedCategory
                    ) {

                        item.style.display = '';

                        visibleCount++;

                    } else {

                        item.style.display = 'none';

                        item.classList.remove('active');

                    }

                });


                if (visibleCount === 0) {

                    noResults.classList.remove('hidden');

                } else {

                    noResults.classList.add('hidden');

                }

            });

        });

    </script>

</body>
</html>
