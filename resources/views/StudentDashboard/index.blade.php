@extends('layouts.student')

@section('title', 'Dashboard')

@section('content')

<style>

    .student-dashboard {
        width: 100%;
    }

    /* =========================
       HEADER
    ========================= */

    .dashboard-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .welcome-label {
        color: #00F59B;
        font-family: 'JetBrains Mono', monospace;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    .dashboard-header h1 {
        margin: 7px 0 6px;
        color: #ffffff;
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -.8px;
    }

    .dashboard-header p {
        margin: 0;
        color: #718E81;
        font-size: 12px;
    }

    /* =========================
       BALANCE
    ========================= */

    .balance-card {
        min-width: 210px;
        padding: 18px 22px;
        border-radius: 15px;

        background:
            linear-gradient(
                145deg,
                rgba(0,245,155,.13),
                rgba(18,35,27,.96)
            );

        border: 1px solid rgba(0,245,155,.22);

        box-shadow:
            0 0 30px rgba(0,245,155,.07);
    }

    .balance-label {
        color: #718E81;
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: 1.4px;
    }

    .balance-value {
        margin-top: 5px;
        color: #00F59B;
        font-family: 'JetBrains Mono', monospace;
        font-size: 25px;
        font-weight: 800;
    }

    /* =========================
       STATISTICS
    ========================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 22px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;

        padding: 20px;

        border-radius: 14px;

        background:
            linear-gradient(
                145deg,
                rgba(18,35,27,.97),
                rgba(13,24,19,.97)
            );

        border: 1px solid #1A3326;

        transition: .25s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);

        border-color:
            rgba(0,245,155,.25);

        box-shadow:
            0 12px 30px rgba(0,0,0,.22);
    }

    .stat-card::after {
        content: "";

        position: absolute;

        width: 110px;
        height: 110px;

        right: -45px;
        top: -45px;

        border-radius: 50%;

        background:
            rgba(0,245,155,.035);
    }

    .stat-icon {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 15px;

        border-radius: 10px;

        background:
            rgba(0,245,155,.08);

        border:
            1px solid rgba(0,245,155,.13);

        color: #00F59B;

        font-family:
            'JetBrains Mono',
            monospace;

        font-size: 13px;
        font-weight: 700;
    }

    .stat-title {
        color: #718E81;
        font-size: 10px;
        margin-bottom: 5px;
    }

    .stat-value {
        color: #ffffff;
        font-size: 23px;
        font-weight: 800;
    }

    .stat-sub {
        color: #527565;
        font-size: 9px;
        margin-top: 5px;
    }

    /* =========================
       MAIN GRID
    ========================= */

    .dashboard-grid {
        display: grid;
        grid-template-columns: 1.45fr 1fr;
        gap: 20px;
    }

    .dashboard-card {
        overflow: hidden;

        background:
            linear-gradient(
                145deg,
                rgba(18,35,27,.97),
                rgba(13,24,19,.97)
            );

        border:
            1px solid #1A3326;

        border-radius: 14px;
    }

    .card-header {
        min-height: 58px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 0 20px;

        border-bottom:
            1px solid #1A3326;
    }

    .card-header h3 {
        margin: 0;

        color: #ffffff;

        font-size: 13px;
        font-weight: 700;
    }

    .card-header span {
        color: #00F59B;

        font-family:
            'JetBrains Mono',
            monospace;

        font-size: 8px;
        letter-spacing: 1px;
    }

    /* =========================
       TRANSACTIONS
    ========================= */

    .transaction {
        display: flex;
        align-items: center;
        justify-content: space-between;

        padding: 15px 20px;

        border-bottom:
            1px solid rgba(26,51,38,.65);
    }

    .transaction:last-child {
        border-bottom: none;
    }

    .transaction-left {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .transaction-icon {
        width: 36px;
        height: 36px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        background:
            rgba(0,245,155,.07);

        border:
            1px solid rgba(0,245,155,.10);

        color: #00F59B;

        font-family:
            'JetBrains Mono',
            monospace;
    }

    .transaction-name {
        color: #DCEBE4;

        font-size: 11px;
        font-weight: 600;
    }

    .transaction-date {
        color: #527565;

        font-size: 8px;

        margin-top: 3px;
    }

    .transaction-amount {
        color: #00F59B;

        font-family:
            'JetBrains Mono',
            monospace;

        font-size: 11px;
        font-weight: 700;
    }

    .transaction-amount.minus {
        color: #ff7180;
    }

    .empty-transactions {
        padding: 55px 20px;

        text-align: center;

        color: #527565;

        font-size: 11px;
    }

    .empty-icon {
        font-size: 25px;
        margin-bottom: 10px;
        opacity: .7;
    }

    /* =========================
       QUICK ACTIONS
    ========================= */

    .quick-actions {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 11px;

        padding: 18px;
    }

    .quick-action {
        min-height: 90px;

        display: flex;
        flex-direction: column;
        justify-content: space-between;

        padding: 15px;

        border-radius: 11px;

        background:
            rgba(0,245,155,.035);

        border:
            1px solid rgba(0,245,155,.09);

        color: #E8F5EF;

        transition: .2s ease;
    }

    .quick-action:hover {
        transform: translateY(-2px);

        background:
            rgba(0,245,155,.07);

        border-color:
            rgba(0,245,155,.22);

        color: #ffffff;
    }

    .quick-icon {
        color: #00F59B;

        font-family:
            'JetBrains Mono',
            monospace;

        font-size: 17px;
    }

    .quick-action strong {
        font-size: 10px;
    }

    .quick-action small {
        color: #527565;
        font-size: 8px;
        margin-top: 3px;
    }

    /* =========================
       MONTHLY PROGRESS
    ========================= */

    .progress-content {
        padding: 20px;
    }

    .progress-info {
        display: flex;
        justify-content: space-between;

        margin-bottom: 9px;
    }

    .progress-info span {
        color: #718E81;
        font-size: 9px;
    }

    .progress-info strong {
        color: #00F59B;
        font-family:
            'JetBrains Mono',
            monospace;
        font-size: 9px;
    }

    .progress-bar {
        width: 100%;
        height: 7px;

        overflow: hidden;

        border-radius: 20px;

        background: #09130E;

        border:
            1px solid #1A3326;
    }

    .progress-fill {
        width: 72%;
        height: 100%;

        background: #00F59B;

        border-radius: 20px;

        box-shadow:
            0 0 12px rgba(0,245,155,.3);
    }

    /* =========================
       ANNOUNCEMENT
    ========================= */

    .announcement {
        margin: 18px;

        padding: 16px;

        border-radius: 11px;

        background:
            rgba(0,245,155,.04);

        border:
            1px solid rgba(0,245,155,.10);
    }

    .announcement-label {
        color: #00F59B;

        font-size: 8px;
        font-weight: 700;

        letter-spacing: 1.2px;

        text-transform: uppercase;
    }

    .announcement h4 {
        margin: 7px 0 5px;

        color: #ffffff;

        font-size: 11px;
    }

    .announcement p {
        margin: 0;

        color: #718E81;

        font-size: 9px;

        line-height: 1.6;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media(max-width: 1100px) {

        .stats-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

        .dashboard-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 650px) {

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .balance-card {
            width: 100%;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            grid-template-columns:
                repeat(2, 1fr);
        }
    }

</style>


<div class="student-dashboard">


    <!-- ======================================
         HEADER
    ======================================= -->

    <div class="dashboard-header">

        <div>

            <div class="welcome-label">
                Student Portal
            </div>

            <h1>
                Welcome back,
                {{ auth()->user()->name ?? 'Student' }}
            </h1>

            <p>
                Manage your Campus Coin account and campus activities.
            </p>

        </div>


        <div class="balance-card">

            <div class="balance-label">
                Available Balance
            </div>

            <div class="balance-value">

                {{ number_format(auth()->user()->balance ?? 0) }}

                CC

            </div>

        </div>

    </div>



    <!-- ======================================
         STAT CARDS
    ======================================= -->

    <div class="stats-grid">


        <!-- BALANCE -->

        <div class="stat-card">

            <div class="stat-icon">
                CC
            </div>

            <div class="stat-title">
                Current Balance
            </div>

            <div class="stat-value">

                {{ number_format(auth()->user()->balance ?? 0) }}

            </div>

            <div class="stat-sub">
                Campus Coins
            </div>

        </div>


        <!-- RECEIVED -->

        <div class="stat-card">

            <div class="stat-icon">
                ↑
            </div>

            <div class="stat-title">
                Coins Received
            </div>

            <div class="stat-value">

                {{ number_format($totalReceived ?? 0) }}

            </div>

            <div class="stat-sub">
                Total received
            </div>

        </div>


        <!-- SPENT -->

        <div class="stat-card">

            <div class="stat-icon">
                ↓
            </div>

            <div class="stat-title">
                Coins Spent
            </div>

            <div class="stat-value">

                {{ number_format($totalSpent ?? 0) }}

            </div>

            <div class="stat-sub">
                Total spending
            </div>

        </div>


        <!-- TRANSACTIONS -->

        <div class="stat-card">

            <div class="stat-icon">
                #
            </div>

            <div class="stat-title">
                Transactions
            </div>

            <div class="stat-value">

                {{ $transactionCount ?? 0 }}

            </div>

            <div class="stat-sub">
                Activity recorded
            </div>

        </div>

    </div>



    <!-- ======================================
         MAIN DASHBOARD
    ======================================= -->

    <div class="dashboard-grid">


        <!-- ==================================
             RECENT TRANSACTIONS
        =================================== -->

        <div class="dashboard-card">

            <div class="card-header">

                <h3>
                    Recent Transactions
                </h3>

                <span>
                    ACTIVITY
                </span>

            </div>


            @if(isset($recentTransactions) &&
                $recentTransactions->count() > 0)


                @foreach($recentTransactions as $transaction)

                    <div class="transaction">


                        <div class="transaction-left">


                            <div class="transaction-icon">

                                @if(($transaction->amount ?? 0) >= 0)
                                    ↑
                                @else
                                    ↓
                                @endif

                            </div>


                            <div>

                                <div class="transaction-name">

                                    {{ $transaction->description ?? 'Campus Transaction' }}

                                </div>


                                <div class="transaction-date">

                                    {{ optional($transaction->created_at)->format('d M Y, h:i A') }}

                                </div>

                            </div>


                        </div>


                        <div class="transaction-amount
                            {{ ($transaction->amount ?? 0) < 0 ? 'minus' : '' }}">

                            {{ ($transaction->amount ?? 0) >= 0 ? '+' : '' }}

                            {{ number_format($transaction->amount ?? 0) }}

                            CC

                        </div>


                    </div>

                @endforeach


            @else


                <div class="empty-transactions">

                    <div class="empty-icon">
                        ↔
                    </div>

                    No transactions available yet.

                </div>


            @endif

        </div>



        <!-- ==================================
             RIGHT COLUMN
        =================================== -->

        <div>


            <!-- QUICK ACTIONS -->

            <div class="dashboard-card">

                <div class="card-header">

                    <h3>
                        Quick Actions
                    </h3>

                    <span>
                        SHORTCUTS
                    </span>

                </div>


                <div class="quick-actions">


                    <a href="{{ url('/dashboard/transactions') }}"
                       class="quick-action">

                        <div class="quick-icon">
                            ↔
                        </div>

                        <div>

                            <strong>
                                Transactions
                            </strong>

                            <small>
                                View activity
                            </small>

                        </div>

                    </a>


                    <a href="{{ url('/dashboard/budgets') }}"
                       class="quick-action">

                        <div class="quick-icon">
                            Rs
                        </div>

                        <div>

                            <strong>
                                My Budget
                            </strong>

                            <small>
                                Manage budget
                            </small>

                        </div>

                    </a>


                    <a href="{{ url('/dashboard/calendar') }}"
                       class="quick-action">

                        <div class="quick-icon">
                            □
                        </div>

                        <div>

                            <strong>
                                Calendar
                            </strong>

                            <small>
                                Campus events
                            </small>

                        </div>

                    </a>


                    <a href="{{ url('/dashboard/profile') }}"
                       class="quick-action">

                        <div class="quick-icon">
                            ♟
                        </div>

                        <div>

                            <strong>
                                My Profile
                            </strong>

                            <small>
                                Account settings
                            </small>

                        </div>

                    </a>


                </div>

            </div>



            <!-- MONTHLY SPENDING -->

            <div class="dashboard-card"
                 style="margin-top:20px;">

                <div class="card-header">

                    <h3>
                        Monthly Spending
                    </h3>

                    <span>
                        72%
                    </span>

                </div>


                <div class="progress-content">

                    <div class="progress-info">

                        <span>
                            Budget usage
                        </span>

                        <strong>
                            72%
                        </strong>

                    </div>


                    <div class="progress-bar">

                        <div class="progress-fill"></div>

                    </div>

                </div>

            </div>



            <!-- ======================================
     ANNOUNCEMENTS FROM ADMIN
======================================= -->

<div class="dashboard-card"
     style="margin-top:20px;">

    <div class="card-header">

        <h3>
            Campus Updates
        </h3>

        <span>
            NOTICE
        </span>

    </div>


    @if(isset($announcements) && $announcements->count() > 0)

        @foreach($announcements as $announcement)

            <div class="announcement">

                <div class="announcement-label">
                    CAMPUS COIN
                </div>


                <h4>
                    {{ $announcement->title }}
                </h4>


                <p>
                    {{ $announcement->message ?? $announcement->description ?? '' }}
                </p>


                <div style="
                    margin-top:10px;
                    color:#527565;
                    font-size:8px;
                ">
                    {{ optional($announcement->created_at)->format('d M Y, h:i A') }}
                </div>

            </div>

        @endforeach

    @else

        <div class="announcement">

            <div class="announcement-label">
                CAMPUS COIN
            </div>


            <h4>
                Welcome to your Student Portal
            </h4>


            <p>
                No new announcements from the admin right now.
            </p>

        </div>

    @endif

</div>
@endsection
