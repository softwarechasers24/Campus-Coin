@extends('layouts.student')

@section('title', 'Saving Tips')

@section('content')

<style>

    .saving-page {
        max-width: 1400px;
        margin: 0 auto;
    }

    /* =========================
       TOP HEADER
    ========================= */

    .saving-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .saving-title h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -.6px;
    }

    .saving-title h1 span {
        color: #00F59B;
        text-shadow: 0 0 18px rgba(0,245,155,.25);
    }

    .saving-title p {
        margin: 7px 0 0;
        color: #718E81;
        font-size: 14px;
    }

    .saving-date {
        padding: 11px 16px;
        border-radius: 11px;
        border: 1px solid #1A3326;
        background: #0D1813;
        color: #B8CCC2;
        font-size: 12px;
        white-space: nowrap;
    }

    .saving-date i {
        color: #00F59B;
        margin-right: 7px;
    }


    /* =========================
       HERO
    ========================= */

    .saving-hero {
        position: relative;
        overflow: hidden;

        min-height: 270px;

        padding: 32px;

        display: flex;
        align-items: center;

        border-radius: 22px;

        background:
            radial-gradient(
                circle at 80% 40%,
                rgba(0,245,155,.18),
                transparent 35%
            ),
            linear-gradient(
                135deg,
                #123B27,
                #0B1711 75%
            );

        border: 1px solid #1F4A35;

        box-shadow:
            0 20px 50px rgba(0,0,0,.28);
    }

    .saving-hero-content {
        max-width: 62%;
        position: relative;
        z-index: 2;
    }

    .saving-hero-icon {
        width: 58px;
        height: 58px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 16px;

        background:
            linear-gradient(
                145deg,
                #B8FFD0,
                #00F59B,
                #08743F
            );

        color: #06100B;

        font-size: 26px;

        box-shadow:
            0 12px 30px rgba(0,245,155,.20);
    }

    .saving-hero h2 {
        margin: 17px 0 9px;

        font-size: 32px;
        font-weight: 900;
    }

    .saving-hero p {
        max-width: 620px;

        margin: 0;

        color: #9CB5A8;

        line-height: 1.7;

        font-size: 14px;
    }


    /* =========================
       PIGGY BANK
    ========================= */

    .piggy-bank {
        position: absolute;

        right: 45px;
        bottom: 8px;

        width: 270px;

        filter:
            drop-shadow(
                0 20px 18px rgba(0,0,0,.65)
            );

        animation:
            floatingPig 4s ease-in-out infinite;
    }

    @keyframes floatingPig {

        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-9px);
        }

    }


    /* =========================
       TIP CARDS
    ========================= */

    .tips-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 18px;

        margin-top: 22px;
    }

    .tip-card {
        min-height: 225px;

        padding: 23px;

        border-radius: 17px;

        background:
            linear-gradient(
                145deg,
                #12231B,
                #0C1712
            );

        border: 1px solid #1A3326;

        transition: .25s ease;
    }

    .tip-card:hover {
        transform: translateY(-5px);

        border-color:
            rgba(0,245,155,.35);

        box-shadow:
            0 18px 35px rgba(0,0,0,.25),
            0 0 22px rgba(0,245,155,.05);
    }

    .tip-icon {
        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        background:
            rgba(0,245,155,.10);

        border:
            1px solid rgba(0,245,155,.18);

        color: #00F59B;

        font-size: 22px;
    }

    .tip-card h3 {
        margin: 17px 0 8px;

        color: #E8F5EF;

        font-size: 16px;
        font-weight: 800;
    }

    .tip-card p {
        margin: 0;

        color: #789487;

        font-size: 13px;

        line-height: 1.7;
    }


    /* =========================
       BOTTOM SECTION
    ========================= */

    .saving-bottom {
        display: grid;

        grid-template-columns:
            1.4fr 1fr;

        gap: 18px;

        margin-top: 22px;
    }

    .saving-card {
        padding: 24px;

        border-radius: 17px;

        background:
            linear-gradient(
                145deg,
                #12231B,
                #0C1712
            );

        border: 1px solid #1A3326;
    }

    .saving-card-header {
        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 17px;
    }

    .saving-card-header h3 {
        margin: 0;

        font-size: 16px;
        font-weight: 800;
    }

    .percentage {
        color: #00F59B;

        font-size: 15px;

        font-weight: 800;
    }

    .progress-container {
        width: 100%;
        height: 12px;

        background: #0A120E;

        border-radius: 20px;

        overflow: hidden;
    }

    .progress-bar-custom {
        width: 65%;
        height: 100%;

        border-radius: 20px;

        background:
            linear-gradient(
                90deg,
                #08743F,
                #00F59B
            );

        box-shadow:
            0 0 15px rgba(0,245,155,.25);
    }

    .saving-stats {
        display: flex;

        justify-content: space-between;

        margin-top: 10px;

        color: #718E81;

        font-size: 12px;
    }


    /* SMART TIP */

    .smart-tip {
        position: relative;
        overflow: hidden;
    }

    .smart-tip::after {
        content: "";

        position: absolute;

        width: 150px;
        height: 150px;

        right: -60px;
        top: -60px;

        border-radius: 50%;

        background:
            rgba(0,245,155,.07);
    }

    .smart-icon {
        color: #00F59B;

        font-size: 27px;

        margin-bottom: 12px;
    }

    .smart-tip h3 {
        margin: 0 0 9px;

        font-size: 17px;
        font-weight: 800;
    }

    .smart-tip p {
        margin: 0;

        color: #789487;

        font-size: 13px;

        line-height: 1.7;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 1050px) {

        .tips-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

        .saving-bottom {
            grid-template-columns: 1fr;
        }

    }


    @media(max-width: 700px) {

        .saving-topbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .saving-hero {
            min-height: 300px;
            padding: 25px;
        }

        .saving-hero-content {
            max-width: 100%;
        }

        .saving-hero h2 {
            font-size: 26px;
        }

        .piggy-bank {
            right: -45px;
            opacity: .16;
        }

        .tips-grid {
            grid-template-columns: 1fr;
        }

    }

</style>


<div class="saving-page">


    <!-- =========================================
         HEADER
    ========================================== -->

    <div class="saving-topbar">

        <div class="saving-title">

            <h1>
                Smart <span>Saving Tips</span>
            </h1>

            <p>
                Simple habits to help you manage your student budget.
            </p>

        </div>


        <div class="saving-date">

            <i>●</i>

            <span id="liveClock">
                Loading...
            </span>

        </div>

    </div>



    <!-- =========================================
         HERO
    ========================================== -->

    <div class="saving-hero">

        <div class="saving-hero-content">

            <div class="saving-hero-icon">
                💰
            </div>

            <h2>
                Save Small. Grow Big.
            </h2>

            <p>
                You don't need to make huge changes to manage
                your money better. Small daily decisions can
                help you build better financial habits.
            </p>

        </div>


        <!-- PIGGY -->

        <svg
            class="piggy-bank"
            viewBox="0 0 300 210"
            xmlns="http://www.w3.org/2000/svg">

            <ellipse
                cx="150"
                cy="190"
                rx="105"
                ry="14"
                fill="#000"
                opacity=".55"/>

            <ellipse
                cx="150"
                cy="120"
                rx="95"
                ry="62"
                fill="#087d34"/>

            <ellipse
                cx="150"
                cy="108"
                rx="95"
                ry="62"
                fill="#55e879"/>

            <ellipse
                cx="120"
                cy="75"
                rx="28"
                ry="12"
                fill="#c5ffd0"
                opacity=".35"/>

            <circle
                cx="115"
                cy="100"
                r="8"
                fill="#06240f"/>

            <circle
                cx="180"
                cy="100"
                r="8"
                fill="#06240f"/>

            <path
                d="M120 128 Q150 148 180 128"
                fill="none"
                stroke="#08702e"
                stroke-width="6"
                stroke-linecap="round"/>

            <ellipse
                cx="230"
                cy="115"
                rx="28"
                ry="20"
                fill="#55e879"/>

            <circle
                cx="240"
                cy="110"
                r="4"
                fill="#06240f"/>

            <rect
                x="137"
                y="45"
                width="26"
                height="9"
                rx="4"
                fill="#08702e"/>

            <circle
                cx="150"
                cy="35"
                r="25"
                fill="#ffd83d"
                stroke="#b57b00"
                stroke-width="3"/>

            <text
                x="150"
                y="43"
                text-anchor="middle"
                font-size="20"
                font-weight="900"
                fill="#674300">
                Rs
            </text>

            <rect
                x="85"
                y="165"
                width="28"
                height="22"
                rx="7"
                fill="#08702e"/>

            <rect
                x="187"
                y="165"
                width="28"
                height="22"
                rx="7"
                fill="#08702e"/>

        </svg>

    </div>



    <!-- =========================================
         TIPS
    ========================================== -->

    <div class="tips-grid">


        <div class="tip-card">

            <div class="tip-icon">
                🧾
            </div>

            <h3>
                Track Every Rupee
            </h3>

            <p>
                Keep track of your daily expenses so
                you know exactly where your money is going.
            </p>

        </div>


        <div class="tip-card">

            <div class="tip-icon">
                🎯
            </div>

            <h3>
                Set a Weekly Limit
            </h3>

            <p>
                Decide how much you can spend each week
                and try to stay within your planned limit.
            </p>

        </div>


        <div class="tip-card">

            <div class="tip-icon">
                ☕
            </div>

            <h3>
                Reduce Daily Extras
            </h3>

            <p>
                Small purchases can add up. Check whether
                an extra snack or drink is really necessary.
            </p>

        </div>


        <div class="tip-card">

            <div class="tip-icon">
                🛍️
            </div>

            <h3>
                Avoid Impulse Buying
            </h3>

            <p>
                Give yourself some time before making an
                unplanned purchase.
            </p>

        </div>


        <div class="tip-card">

            <div class="tip-icon">
                🎓
            </div>

            <h3>
                Use Student Discounts
            </h3>

            <p>
                Check for student discounts on food,
                transport, software and other services.
            </p>

        </div>


        <div class="tip-card">

            <div class="tip-icon">
                🐷
            </div>

            <h3>
                Save Before Spending
            </h3>

            <p>
                Set aside a small amount for your saving
                goal before planning your other spending.
            </p>

        </div>


    </div>



    <!-- =========================================
         BOTTOM
    ========================================== -->

    <div class="saving-bottom">


        <!-- GOAL -->

        <div class="saving-card">

            <div class="saving-card-header">

                <h3>
                    🏁 My Saving Goal
                </h3>

                <span class="percentage">
                    65%
                </span>

            </div>


            <div class="progress-container">

                <div class="progress-bar-custom"></div>

            </div>


            <div class="saving-stats">

                <span>
                    Rs. 6,500 saved
                </span>

                <span>
                    Goal: Rs. 10,000
                </span>

            </div>

        </div>


        <!-- SMART TIP -->

        <div class="saving-card smart-tip">

            <div class="smart-icon">
                💡
            </div>

            <h3>
                Today's Smart Tip
            </h3>

            <p>
                Try the 24-hour rule. Before making an
                unplanned purchase, wait a little and decide
                whether you really need it.
            </p>

        </div>

    </div>


</div>



<script>

function updateClock()
{
    const now = new Date();

    const date = now.toLocaleDateString(
        'en-US',
        {
            weekday: 'short',
            day: '2-digit',
            month: 'short',
            year: 'numeric'
        }
    );

    const time = now.toLocaleTimeString(
        'en-US',
        {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        }
    );

    document.getElementById('liveClock').innerText =
        time + ' • ' + date;
}

updateClock();

setInterval(updateClock, 1000);

</script>

@endsection
