<x-guest-layout>

<style>
    /* =========================================================
       CAMPUS COIN LOGIN — DARK EMERALD THEME
       Matching the CampusCoin homepage
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

    .campus-login-page {
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

    .campus-login-page::before {
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

    .campus-login-page::after {
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
       LOGIN CARD
    ========================================================= */

    .campus-login-card {

        position: relative;
        z-index: 5;

        width: 100%;
        max-width: 1080px;

        min-height: 620px;

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

    .campus-login-left {

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
       LOGO
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

    .campus-login-left h1 {

        margin: 0 0 22px;

        max-width: 470px;

        color: #ffffff;

        font-size: 48px;
        line-height: 1.05;

        font-weight: 800;

        letter-spacing: -2px;
    }


    .campus-login-left h1 span {
        color: #00e89a;
    }


    .campus-login-left p {

        max-width: 455px;

        margin: 0;

        color: #8ba39a;

        font-size: 15px;
        line-height: 1.8;
    }


    /* =========================================================
       MINI FEATURES
    ========================================================= */

    .login-features {

        display: flex;
        gap: 12px;

        margin-top: 34px;
    }


    .login-feature {

        padding: 11px 15px;

        border: 1px solid rgba(0, 232, 154, 0.12);

        background: rgba(255, 255, 255, 0.025);

        border-radius: 10px;

        color: #91a79f;

        font-size: 11px;
        font-weight: 500;
    }


    .login-feature strong {
        color: #00e89a;
        font-weight: 700;
    }


    /* =========================================================
       RIGHT LOGIN SIDE
    ========================================================= */

    .campus-login-right {

        position: relative;

        padding: 65px;

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
       FORM TOP
    ========================================================= */

    .login-top-icon {

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

        margin-bottom: 22px;
    }


    .campus-login-right h2 {

        margin: 0 0 8px;

        color: #ffffff;

        font-size: 34px;

        line-height: 1.2;

        font-weight: 800;

        letter-spacing: -1px;
    }


    .login-subtitle {

        margin: 0 0 32px;

        color: #71877f;

        font-size: 14px;

        line-height: 1.6;
    }


    /* =========================================================
       LABEL
    ========================================================= */

    .campus-label {

        display: block;

        margin-bottom: 9px;

        color: #c1d0ca;

        font-size: 13px;

        font-weight: 600;
    }


    /* =========================================================
       INPUT
    ========================================================= */

    .campus-input {

        width: 100%;

        height: 53px;

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
   PASSWORD SHOW / HIDE
========================================================= */

.password-wrapper {
    position: relative;
}

.password-wrapper .campus-input {
    padding-right: 50px;
}

.password-toggle {
    position: absolute;
    top: 50%;
    right: 16px;
    transform: translateY(-50%);

    border: none;
    background: transparent;

    color: #71877f;

    cursor: pointer;

    padding: 5px;

    display: flex;
    align-items: center;
    justify-content: center;

    transition: color .2s ease;
}

.password-toggle:hover {
    color: #00e89a;
}

.password-toggle svg {
    width: 20px;
    height: 20px;
}


    /* =========================================================
       CHECKBOX
    ========================================================= */

    .remember-text {

        color: #71877f;

        font-size: 13px;
    }


    input[type="checkbox"] {

        width: 15px;
        height: 15px;

        accent-color: #00e89a;

        cursor: pointer;
    }


    /* =========================================================
       FORGOT PASSWORD
    ========================================================= */

    .forgot-link {

        color: #00e89a;

        text-decoration: none;

        font-size: 13px;

        font-weight: 600;

        transition: .2s ease;
    }


    .forgot-link:hover {

        color: #62ffc8;

        text-decoration: none;
    }


    /* =========================================================
       LOGIN BUTTON
    ========================================================= */

    .campus-login-btn {

        width: 100%;

        min-height: 53px;

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


    .campus-login-btn:hover {

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


    .campus-login-btn:active {
        transform: translateY(0);
    }


    /* =========================================================
       REGISTER
    ========================================================= */

    .register-text {

        margin-top: 25px;

        padding-top: 23px;

        border-top: 1px solid rgba(255,255,255,0.06);

        text-align: center;

        color: #61756d;

        font-size: 13px;
    }


    .register-text a {

        color: #00e89a;

        font-weight: 700;

        text-decoration: none;

        margin-left: 4px;
    }


    .register-text a:hover {

        color: #62ffc8;

        text-decoration: none;
    }


    /* =========================================================
       ERROR MESSAGES
    ========================================================= */

    .campus-login-right .text-red-600,
    .campus-login-right .text-red-500,
    .campus-login-right [class*="text-red"] {

        color: #ff7777 !important;

        font-size: 12px;
    }


    /* =========================================================
       SESSION MESSAGE
    ========================================================= */

    .campus-login-right [role="alert"] {

        color: #00e89a;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 900px) {

        .campus-login-page {
            padding: 20px;
        }

        .campus-login-card {
            max-width: 620px;
            grid-template-columns: 1fr;
        }

        .campus-login-left {
            padding: 45px 40px;
            min-height: 390px;
            border-right: none;
            border-bottom: 1px solid rgba(0, 232, 154, 0.10);
        }

        .campus-login-right {
            padding: 45px 40px;
        }

        .campus-login-left h1 {
            font-size: 40px;
        }
    }


    @media (max-width: 600px) {

        .campus-login-page {
            position: relative;
            min-height: 100vh;
            height: auto;
            padding: 15px;
        }

        .campus-login-card {
            margin: 20px auto;
            border-radius: 22px;
        }

        .campus-login-left {
            padding: 38px 28px;
            min-height: 350px;
        }

        .campus-login-right {
            padding: 38px 28px;
        }

        .campus-login-left h1 {
            font-size: 34px;
            letter-spacing: -1.2px;
        }

        .campus-login-right h2 {
            font-size: 29px;
        }

        .login-features {
            flex-wrap: wrap;
        }
    }


    @media (max-width: 400px) {

        .campus-login-left {
            padding: 32px 22px;
        }

        .campus-login-right {
            padding: 32px 22px;
        }

        .campus-login-left h1 {
            font-size: 30px;
        }

        .campus-login-left p {
            font-size: 14px;
        }
    }

</style>


<!-- =========================================================
     CAMPUS COIN LOGIN PAGE
========================================================= -->

<div class="campus-login-page">

    <div class="campus-grid"></div>


    <!-- =====================================================
         LOGIN CARD
    ====================================================== -->

    <div class="campus-login-card">


        <!-- =================================================
             LEFT BRANDING
        ================================================== -->

        <div class="campus-login-left">

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

                    Your Campus.
                    <br>

                    Your <span>Coin.</span>
                    <br>

                    Your Community.

                </h1>


                <!-- DESCRIPTION -->

                <p>

                    Welcome back to CampusCoin — the smart
                    digital currency designed for everyday
                    university life.

                </p>


                <!-- FEATURES -->

                <div class="login-features">

                    <div class="login-feature">
                        <strong>0%</strong> Fees
                    </div>

                    <div class="login-feature">
                        <strong>QR</strong> Pay
                    </div>

                    <div class="login-feature">
                        <strong>CC</strong> Rewards
                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             RIGHT LOGIN FORM
        ================================================== -->

        <div class="campus-login-right">


            <!-- ICON -->

            <div class="login-top-icon">
                C
            </div>


            <!-- TITLE -->

            <h2>
                Welcome Back
            </h2>


            <p class="login-subtitle">
                Login to your CampusCoin account
                and continue your campus journey.
            </p>


            <!-- SESSION STATUS -->

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />


            <!-- LOGIN FORM -->

            <form method="POST" action="{{ route('login') }}">

                @csrf


                <!-- EMAIL -->

                <div>

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
                        autofocus
                        autocomplete="username"
                        placeholder="Enter your university email"
                    >

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>


                <!-- PASSWORD -->

                <div class="mt-4">

                    <label
                        for="password"
                        class="campus-label"
                    >
                        Password
                    </label>

                    <!-- <input
                        id="password"
                        class="campus-input"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    > -->
                    <div class="password-wrapper">

    <input
        id="password"
        class="campus-input"
        type="password"
        name="password"
        required
        autocomplete="current-password"
        placeholder="Enter your password"
    >

    <button
        type="button"
        class="password-toggle"
        onclick="togglePassword()"
        aria-label="Show password"
    >
        <svg
            id="eyeIcon"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="1.8"
                d="M2.25 12s3.5-6.75 9.75-6.75S21.75 12 21.75 12 18.25 18.75 12 18.75 2.25 12 2.25 12Z"
            />

            <circle
                cx="12"
                cy="12"
                r="3"
                stroke-width="1.8"
            />
        </svg>
    </button>

</div>

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                <!-- REMEMBER / FORGOT -->

                <div
                    class="d-flex justify-content-between align-items-center mt-4"
                >

                    <label
                        for="remember_me"
                        class="d-flex align-items-center"
                    >

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                        >

                        <span class="ms-2 remember-text">
                            Remember me
                        </span>

                    </label>


                    @if (Route::has('password.request'))

                        <a
                            href="{{ route('password.request') }}"
                            class="forgot-link"
                        >
                            Forgot password?
                        </a>

                    @endif

                </div>


                <!-- LOGIN BUTTON -->

                <div class="mt-4">

                    <button
                        type="submit"
                        class="campus-login-btn"
                    >

                        Login to CampusCoin →

                    </button>

                </div>

            </form>


            <!-- REGISTER -->

            <div class="register-text">

                Don't have a CampusCoin account?

                <a href="{{ route('register') }}">
                    Create Account
                </a>

            </div>


        </div>

    </div>

</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (password.type === 'password') {
            password.type = 'text';

            eyeIcon.innerHTML = `
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M3 3l18 18"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M10.58 10.58a2 2 0 002.84 2.84"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M9.88 5.08A10.6 10.6 0 0112 4.75c6.25 0 9.75 7.25 9.75 7.25a17.2 17.2 0 01-3.16 4.18"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M6.61 6.61C3.9 8.4 2.25 12 2.25 12s3.5 7.25 9.75 7.25c1.55 0 2.93-.37 4.13-.92"
                />
            `;

            document.querySelector('.password-toggle')
                .setAttribute('aria-label', 'Hide password');

        } else {
            password.type = 'password';

            eyeIcon.innerHTML = `
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M2.25 12s3.5-6.75 9.75-6.75S21.75 12 21.75 12 18.25 18.75 12 18.75 2.25 12 2.25 12Z"
                />

                <circle
                    cx="12"
                    cy="12"
                    r="3"
                    stroke-width="1.8"
                />
            `;

            document.querySelector('.password-toggle')
                .setAttribute('aria-label', 'Show password');
        }
    }
</script>

</x-guest-layout>