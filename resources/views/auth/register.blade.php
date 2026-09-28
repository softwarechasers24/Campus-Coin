<x-guest-layout>

<style>
    /* =========================================================
       CAMPUS COIN REGISTER — DARK EMERALD THEME
    ========================================================= */

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    * {
        box-sizing: border-box;
    }

    html,
    body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100%;
        min-height: 100%;
        font-family: 'Inter', sans-serif;
        background: #06100d !important;
    }

    body {
        overflow-x: hidden;
    }


    /* =========================================================
       MAIN PAGE
    ========================================================= */

    .campus-register-page {
        position: fixed;
        inset: 0;

        width: 100vw;
        height: 100vh;

        display: flex;
        align-items: center;
        justify-content: center;

        padding: 25px;

        background:
            radial-gradient(
                circle at 15% 20%,
                rgba(0, 232, 154, 0.10),
                transparent 30%
            ),
            radial-gradient(
                circle at 85% 75%,
                rgba(0, 232, 154, 0.08),
                transparent 32%
            ),
            linear-gradient(
                135deg,
                #030806 0%,
                #06140f 48%,
                #071b14 100%
            );

        overflow-y: auto;
        overflow-x: hidden;
    }


    /* =========================================================
       BACKGROUND GLOW
    ========================================================= */

    .campus-register-page::before {
        content: "";

        position: absolute;

        width: 600px;
        height: 600px;

        top: -280px;
        right: -180px;

        background: rgba(0, 232, 154, 0.08);

        filter: blur(100px);

        border-radius: 50%;

        pointer-events: none;
    }


    .campus-register-page::after {
        content: "";

        position: absolute;

        width: 500px;
        height: 500px;

        bottom: -250px;
        left: -150px;

        background: rgba(0, 190, 130, 0.06);

        filter: blur(100px);

        border-radius: 50%;

        pointer-events: none;
    }


    /* =========================================================
       GRID BACKGROUND
    ========================================================= */

    .campus-grid {
        position: absolute;

        inset: 0;

        background-image:
            linear-gradient(
                rgba(0, 232, 154, 0.025) 1px,
                transparent 1px
            ),
            linear-gradient(
                90deg,
                rgba(0, 232, 154, 0.025) 1px,
                transparent 1px
            );

        background-size: 55px 55px;

        pointer-events: none;
    }


    /* =========================================================
       REGISTER CARD
    ========================================================= */

    .campus-register-card {

        position: relative;

        z-index: 5;

        width: 100%;

        max-width: 1080px;

        min-height: 650px;

        display: grid;

        grid-template-columns: 1fr 1fr;

        background:
            linear-gradient(
                145deg,
                rgba(14, 31, 25, 0.98),
                rgba(7, 18, 14, 0.98)
            );

        border: 1px solid rgba(0, 232, 154, 0.18);

        border-radius: 28px;

        overflow: hidden;

        box-shadow:
            0 35px 100px rgba(0, 0, 0, 0.60),
            0 0 70px rgba(0, 232, 154, 0.05);
    }


    /* =========================================================
       LEFT SIDE
    ========================================================= */

    .campus-register-left {

        position: relative;

        padding: 60px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        color: white;

        background:
            radial-gradient(
                circle at 20% 30%,
                rgba(0, 232, 154, 0.12),
                transparent 40%
            ),
            linear-gradient(
                145deg,
                #071c15,
                #06130f
            );

        border-right: 1px solid rgba(0, 232, 154, 0.10);
    }


    .left-content {
        position: relative;
        z-index: 2;
    }


    /* =========================================================
       BRAND
    ========================================================= */

    .campus-brand {

        display: flex;

        align-items: center;

        margin-bottom: 42px;
    }


    .campus-logo {

        width: 58px;
        height: 58px;

        border-radius: 16px;

        display: flex;

        align-items: center;

        justify-content: center;

        background:
            linear-gradient(
                135deg,
                #00f0a3,
                #00c987
            );

        color: #03120c;

        font-size: 27px;

        font-weight: 800;

        box-shadow:
            0 12px 30px rgba(0, 232, 154, 0.25);

        margin-right: 14px;
    }


    .brand-text {

        display: flex;

        flex-direction: column;
    }


    .brand-name {

        font-size: 20px;

        font-weight: 800;

        color: #ffffff;

        line-height: 1.1;

        letter-spacing: -0.5px;
    }


    .brand-name span {
        color: #00e89a;
    }


    .brand-tagline {

        font-size: 8px;

        letter-spacing: 2px;

        color: #718c82;

        margin-top: 4px;
    }


    /* =========================================================
       BADGE
    ========================================================= */

    .campus-badge {

        display: inline-flex;

        align-items: center;

        width: fit-content;

        padding: 8px 13px;

        border-radius: 30px;

        border: 1px solid rgba(0, 232, 154, 0.28);

        background: rgba(0, 232, 154, 0.055);

        color: #00e89a;

        font-size: 11px;

        font-weight: 600;

        margin-bottom: 24px;
    }


    .campus-badge-dot {

        width: 8px;
        height: 8px;

        background: #00e89a;

        border-radius: 50%;

        margin-right: 8px;

        box-shadow:
            0 0 12px rgba(0, 232, 154, 0.7);
    }


    /* =========================================================
       LEFT HEADING
    ========================================================= */

    .campus-register-left h1 {

        margin: 0 0 22px;

        max-width: 470px;

        color: #ffffff;

        font-size: 48px;

        line-height: 1.05;

        font-weight: 800;

        letter-spacing: -2px;
    }


    .campus-register-left h1 span {
        color: #00e89a;
    }


    .campus-register-left p {

        max-width: 455px;

        margin: 0;

        color: #8ba39a;

        font-size: 15px;

        line-height: 1.8;
    }


    /* =========================================================
       BENEFITS
    ========================================================= */

    .register-features {

        display: flex;

        gap: 12px;

        margin-top: 34px;

        flex-wrap: wrap;
    }


    .register-feature {

        padding: 11px 15px;

        border: 1px solid rgba(0, 232, 154, 0.12);

        background: rgba(255, 255, 255, 0.025);

        border-radius: 10px;

        color: #91a79f;

        font-size: 11px;

        font-weight: 500;
    }


    .register-feature strong {
        color: #00e89a;
        font-weight: 700;
    }


    /* =========================================================
       RIGHT REGISTER SIDE
    ========================================================= */

    .campus-register-right {

        position: relative;

        padding: 50px 65px;

        display: flex;

        flex-direction: column;

        justify-content: center;

        background:
            linear-gradient(
                145deg,
                rgba(10, 24, 19, 0.98),
                rgba(5, 13, 10, 0.98)
            );
    }


    /* =========================================================
       TOP ICON
    ========================================================= */

    .register-top-icon {

        width: 48px;

        height: 48px;

        border-radius: 14px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: rgba(0, 232, 154, 0.08);

        border: 1px solid rgba(0, 232, 154, 0.18);

        color: #00e89a;

        font-size: 20px;

        font-weight: 800;

        margin-bottom: 20px;
    }


    /* =========================================================
       TITLE
    ========================================================= */

    .campus-register-right h2 {

        margin: 0 0 8px;

        color: #ffffff;

        font-size: 34px;

        line-height: 1.2;

        font-weight: 800;

        letter-spacing: -1px;
    }


    .register-subtitle {

        margin: 0 0 27px;

        color: #71877f;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .campus-label {

        display: block;

        margin-bottom: 8px;

        color: #c1d0ca;

        font-size: 13px;

        font-weight: 600;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .campus-input {

        width: 100%;

        height: 49px;

        padding: 0 16px;

        border-radius: 11px;

        border: 1px solid #1c342b;

        background: #091611;

        color: #ffffff;

        font-family: 'Inter', sans-serif;

        font-size: 14px;

        outline: none;

        transition: all .2s ease;
    }


    .campus-input::placeholder {
        color: #52665f;
    }


    .campus-input:hover {
        border-color: #285043;
    }


    .campus-input:focus {

        border-color: #00e89a;

        background: #0a1914;

        box-shadow:
            0 0 0 3px rgba(0, 232, 154, 0.09),
            0 0 20px rgba(0, 232, 154, 0.04);
    }


    /* =========================================================
       ERROR
    ========================================================= */

    .campus-register-right .text-red-600,
    .campus-register-right .text-red-500,
    .campus-register-right [class*="text-red"] {

        color: #ff7777 !important;

        font-size: 12px;
    }


    /* =========================================================
       REGISTER BUTTON
    ========================================================= */

    .campus-register-btn {

        width: 100%;

        min-height: 52px;

        border: none;

        border-radius: 11px;

        background:
            linear-gradient(
                135deg,
                #00ef9f,
                #00c987
            );

        color: #03130d;

        font-family: 'Inter', sans-serif;

        font-size: 14px;

        font-weight: 800;

        cursor: pointer;

        box-shadow:
            0 12px 30px rgba(0, 232, 154, 0.17);

        transition: all .2s ease;
    }


    .campus-register-btn:hover {

        transform: translateY(-2px);

        background:
            linear-gradient(
                135deg,
                #25ffb3,
                #00d895
            );

        box-shadow:
            0 16px 35px rgba(0, 232, 154, 0.25);
    }


    .campus-register-btn:active {
        transform: translateY(0);
    }


    /* =========================================================
       LOGIN LINK
    ========================================================= */

    .login-text {

        margin-top: 20px;

        padding-top: 20px;

        border-top: 1px solid rgba(255,255,255,0.06);

        text-align: center;

        color: #61756d;

        font-size: 13px;
    }


    .login-text a {

        color: #00e89a;

        font-weight: 700;

        text-decoration: none;

        margin-left: 4px;
    }


    .login-text a:hover {

        color: #62ffc8;

        text-decoration: none;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .campus-register-page {
            padding: 20px;
        }

        .campus-register-card {

            max-width: 620px;

            grid-template-columns: 1fr;
        }

        .campus-register-left {

            padding: 45px 40px;

            min-height: 380px;

            border-right: none;

            border-bottom:
                1px solid rgba(0, 232, 154, 0.10);
        }

        .campus-register-right {

            padding: 45px 40px;
        }

        .campus-register-left h1 {
            font-size: 40px;
        }
    }


    @media (max-width: 600px) {

        .campus-register-page {

            position: relative;

            min-height: 100vh;

            height: auto;

            padding: 15px;
        }

        .campus-register-card {

            margin: 20px auto;

            border-radius: 22px;
        }

        .campus-register-left {

            padding: 38px 28px;

            min-height: 350px;
        }

        .campus-register-right {

            padding: 38px 28px;
        }

        .campus-register-left h1 {

            font-size: 34px;

            letter-spacing: -1.2px;
        }

        .campus-register-right h2 {
            font-size: 29px;
        }
    }


    @media (max-width: 400px) {

        .campus-register-left {
            padding: 32px 22px;
        }

        .campus-register-right {
            padding: 32px 22px;
        }

        .campus-register-left h1 {
            font-size: 30px;
        }

        .campus-register-left p {
            font-size: 14px;
        }
    }

</style>


<!-- =========================================================
     CAMPUS COIN REGISTER PAGE
========================================================= -->

<div class="campus-register-page">

    <div class="campus-grid"></div>


    <!-- =====================================================
         REGISTER CARD
    ====================================================== -->

    <div class="campus-register-card">


        <!-- =================================================
             LEFT BRANDING
        ================================================== -->

        <div class="campus-register-left">

            <div class="left-content">


                <!-- BRAND -->

                <div class="campus-brand">

                    <div class="campus-logo">
                        C
                    </div>

                    <div class="brand-text">

                        <div class="brand-name">
                            Campus<span>Coin</span>
                        </div>

                        <div class="brand-tagline">
                            UNIVERSITY PAY
                        </div>

                    </div>

                </div>


                <!-- BADGE -->

                <div class="campus-badge">

                    <span class="campus-badge-dot"></span>

                    CAMPUS MICRO-ECONOMY

                </div>


                <!-- HEADING -->

                <h1>

                    Join the
                    <br>

                    Campus<span>Coin</span>
                    <br>

                    Community.

                </h1>


                <!-- DESCRIPTION -->

                <p>

                    Create your account and become part of
                    a smarter campus economy. Pay, earn,
                    connect and enjoy your university life.

                </p>


                <!-- FEATURES -->

                <div class="register-features">

                    <div class="register-feature">
                        <strong>0%</strong> Fees
                    </div>

                    <div class="register-feature">
                        <strong>QR</strong> Pay
                    </div>

                    <div class="register-feature">
                        <strong>CC</strong> Rewards
                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             RIGHT REGISTER FORM
        ================================================== -->

        <div class="campus-register-right">


            <!-- ICON -->

            <div class="register-top-icon">
                C
            </div>


            <!-- TITLE -->

            <h2>
                Create Account
            </h2>


            <p class="register-subtitle">
                Register your CampusCoin account
                and get started today.
            </p>


            <!-- REGISTER FORM -->

            <form method="POST" action="{{ route('register') }}">

                @csrf


                <!-- NAME -->

                <div>

                    <label
                        for="name"
                        class="campus-label"
                    >
                        Full Name
                    </label>

                    <input
                        id="name"
                        class="campus-input"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter your full name"
                    >

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2"
                    />

                </div>


                <!-- EMAIL -->

                <div class="mt-3">

                    <label
                        for="email"
                        class="campus-label"
                    >
                        Email Address
                    </label>

                    <input
                        id="email"
                        class="campus-input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        placeholder="Enter your email"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>


                <!-- PASSWORD -->

                <div class="mt-3">

                    <label
                        for="password"
                        class="campus-label"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        class="campus-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        placeholder="Create a password"
                    >

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                <!-- CONFIRM PASSWORD -->

                <div class="mt-3">

                    <label
                        for="password_confirmation"
                        class="campus-label"
                    >
                        Confirm Password
                    </label>

                    <input
                        id="password_confirmation"
                        class="campus-input"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your password"
                    >

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>


                <!-- REGISTER BUTTON -->

                <div class="mt-4">

                    <button
                        type="submit"
                        class="campus-register-btn"
                    >
                        Create My Account →
                    </button>

                </div>

            </form>


            <!-- LOGIN -->

            <div class="login-text">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

    </div>

</div>


</x-guest-layout>