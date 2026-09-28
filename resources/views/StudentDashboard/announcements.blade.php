@extends('layouts.student')

@section('title', 'Announcements')

@section('content')

<style>

    /* =========================================
       CAMPUS COIN — ANNOUNCEMENTS
    ========================================= */

    .ann-page {
        min-height: 100%;
        padding: 10px 0 40px;
        color: #e8f5ef;
    }

    /* HEADER */

    .ann-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }

    .ann-header-left h1 {
        margin: 0 0 8px;
        font-size: 32px;
        font-weight: 800;
        letter-spacing: -0.7px;
    }

    .ann-header-left p {
        margin: 0;
        color: #718e81;
        font-size: 14px;
    }

    .ann-header-icon {
        width: 52px;
        height: 52px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        background: rgba(0, 245, 155, 0.08);
        border: 1px solid rgba(0, 245, 155, 0.20);
        box-shadow: 0 0 25px rgba(0, 245, 155, 0.06);
    }


    /* =========================================
       SUMMARY CARDS
    ========================================= */

    .ann-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 28px;
    }

    .ann-stat {
        position: relative;
        overflow: hidden;
        padding: 21px;
        border-radius: 18px;
        background: linear-gradient(
            145deg,
            rgba(18, 35, 27, 0.98),
            rgba(13, 24, 19, 0.98)
        );
        border: 1px solid #1a3326;
        transition: 0.3s ease;
    }

    .ann-stat:hover {
        transform: translateY(-3px);
        border-color: rgba(0, 245, 155, 0.35);
        box-shadow: 0 10px 30px rgba(0, 245, 155, 0.05);
    }

    .ann-stat::after {
        content: "";
        position: absolute;
        width: 80px;
        height: 80px;
        right: -30px;
        top: -30px;
        border-radius: 50%;
        background: rgba(0, 245, 155, 0.05);
    }

    .ann-stat-label {
        color: #718e81;
        font-size: 12px;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.7px;
    }

    .ann-stat-value {
        font-size: 26px;
        font-weight: 800;
        color: #e8f5ef;
    }

    .ann-stat-value.green {
        color: #00f59b;
    }

    .ann-stat-value.yellow {
        color: #facc15;
    }


    /* =========================================
       MAIN LAYOUT
    ========================================= */

    .ann-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 310px;
        gap: 22px;
        align-items: start;
    }


    /* =========================================
       MAIN ANNOUNCEMENT CARD
    ========================================= */

    .ann-main-card {
        background: rgba(13, 24, 19, 0.96);
        border: 1px solid #1a3326;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .ann-card-header {
        padding: 21px 23px;
        border-bottom: 1px solid #1a3326;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .ann-card-title {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .ann-card-title-icon {
        width: 37px;
        height: 37px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 245, 155, 0.09);
        color: #00f59b;
    }

    .ann-card-title h2 {
        margin: 0;
        font-size: 17px;
        font-weight: 750;
    }

    .ann-filter {
        padding: 8px 12px;
        background: #101d16;
        border: 1px solid #1a3326;
        color: #a8bdb3;
        border-radius: 9px;
        outline: none;
        font-size: 12px;
    }

    .ann-filter:focus {
        border-color: rgba(0, 245, 155, 0.45);
    }


    /* =========================================
       ANNOUNCEMENT ITEM
    ========================================= */

    .announcement {
        position: relative;
        padding: 23px;
        border-bottom: 1px solid rgba(26, 51, 38, 0.75);
        transition: 0.25s ease;
    }

    .announcement:last-child {
        border-bottom: none;
    }

    .announcement:hover {
        background: rgba(0, 245, 155, 0.025);
    }

    .announcement-top {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 15px;
    }

    .announcement-left {
        display: flex;
        gap: 14px;
        min-width: 0;
    }

    .announcement-icon {
        width: 45px;
        min-width: 45px;
        height: 45px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 245, 155, 0.09);
        border: 1px solid rgba(0, 245, 155, 0.14);
        font-size: 20px;
    }

    .announcement-content {
        min-width: 0;
    }

    .announcement-title-row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 9px;
        margin-bottom: 7px;
    }

    .announcement-title {
        margin: 0;
        color: #e8f5ef;
        font-size: 16px;
        font-weight: 750;
    }

    .new-badge {
        padding: 4px 8px;
        border-radius: 20px;
        background: rgba(0, 245, 155, 0.11);
        color: #00f59b;
        border: 1px solid rgba(0, 245, 155, 0.20);
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.6px;
    }

    .announcement-text {
        margin: 0;
        color: #8ba398;
        font-size: 13px;
        line-height: 1.7;
        max-width: 720px;
    }

    .announcement-meta {
        margin-top: 13px;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        color: #60796d;
        font-size: 11px;
    }

    .announcement-meta span {
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }

    .announcement-date {
        white-space: nowrap;
        color: #60796d;
        font-size: 11px;
    }


    /* =========================================
       RIGHT SIDE
    ========================================= */

    .ann-side {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .side-card {
        background: rgba(13, 24, 19, 0.96);
        border: 1px solid #1a3326;
        border-radius: 20px;
        padding: 20px;
    }

    .side-card h3 {
        margin: 0 0 17px;
        font-size: 15px;
        font-weight: 750;
    }


    /* =========================================
       INFO CARD
    ========================================= */

    .notify-box {
        padding: 16px;
        border-radius: 14px;
        background:
            linear-gradient(
                135deg,
                rgba(0, 245, 155, 0.09),
                rgba(0, 245, 155, 0.02)
            );
        border: 1px solid rgba(0, 245, 155, 0.14);
    }

    .notify-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 245, 155, 0.10);
        margin-bottom: 12px;
    }

    .notify-box h4 {
        margin: 0 0 6px;
        font-size: 13px;
    }

    .notify-box p {
        margin: 0;
        color: #718e81;
        font-size: 11px;
        line-height: 1.6;
    }


    /* =========================================
       EMPTY STATE
    ========================================= */

    .empty-announcements {
        text-align: center;
        padding: 70px 25px;
        color: #718e81;
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 245, 155, 0.06);
        border: 1px solid #1a3326;
        font-size: 29px;
    }

    .empty-announcements h3 {
        color: #a8bdb3;
        margin: 0 0 7px;
        font-size: 16px;
    }

    .empty-announcements p {
        margin: 0;
        font-size: 12px;
    }


    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 1050px) {

        .ann-layout {
            grid-template-columns: 1fr;
        }

        .ann-side {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

    }


    @media (max-width: 750px) {

        .ann-stats {
            grid-template-columns: 1fr;
        }

        .ann-header {
            align-items: center;
        }

        .ann-header-left h1 {
            font-size: 27px;
        }

        .ann-side {
            grid-template-columns: 1fr;
        }

        .ann-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .ann-filter {
            width: 100%;
        }

        .announcement-top {
            flex-direction: column;
        }

        .announcement-date {
            margin-left: 59px;
        }

    }


    @media (max-width: 500px) {

        .ann-page {
            padding-top: 0;
        }

        .ann-header-icon {
            width: 44px;
            height: 44px;
        }

        .announcement {
            padding: 18px 16px;
        }

        .ann-card-header {
            padding: 18px 16px;
        }

        .announcement-left {
            gap: 10px;
        }

        .announcement-icon {
            width: 40px;
            min-width: 40px;
            height: 40px;
        }

        .announcement-date {
            margin-left: 50px;
        }

    }

</style>


<div class="ann-page">


    <!-- =========================================
         HEADER
    ========================================== -->

    <div class="ann-header">

        <div class="ann-header-left">

            <h1>
                Announcements
            </h1>

            <p>
                Stay updated with the latest campus news and important updates.
            </p>

        </div>

        <div class="ann-header-icon">
            📢
        </div>

    </div>


    <!-- =========================================
         STATISTICS
    ========================================== -->

    @php

        $totalAnnouncements = $announcements->count();

        $newAnnouncements = $announcements
            ->filter(function ($announcement) {
                return $announcement->created_at &&
                       $announcement->created_at->gte(now()->subDays(7));
            })
            ->count();

        $thisMonth = $announcements
            ->filter(function ($announcement) {
                return $announcement->created_at &&
                       $announcement->created_at->month == now()->month &&
                       $announcement->created_at->year == now()->year;
            })
            ->count();

    @endphp


    <div class="ann-stats">


        <!-- TOTAL -->

        <div class="ann-stat">

            <div class="ann-stat-label">
                Total Announcements
            </div>

            <div class="ann-stat-value">
                {{ $totalAnnouncements }}
            </div>

        </div>


        <!-- NEW -->

        <div class="ann-stat">

            <div class="ann-stat-label">
                New Updates
            </div>

            <div class="ann-stat-value green">
                {{ $newAnnouncements }}
            </div>

        </div>


        <!-- THIS MONTH -->

        <div class="ann-stat">

            <div class="ann-stat-label">
                This Month
            </div>

            <div class="ann-stat-value yellow">
                {{ $thisMonth }}
            </div>

        </div>


    </div>


    <!-- =========================================
         MAIN LAYOUT
    ========================================== -->

    <div class="ann-layout">


        <!-- =====================================
             ANNOUNCEMENT LIST
        ====================================== -->

        <div class="ann-main-card">


            <div class="ann-card-header">

                <div class="ann-card-title">

                    <div class="ann-card-title-icon">
                        🔔
                    </div>

                    <h2>
                        Latest Announcements
                    </h2>

                </div>


                <select
                    class="ann-filter"
                    id="announcementFilter"
                >

                    <option value="all">
                        All Announcements
                    </option>

                    <option value="new">
                        New Updates
                    </option>

                    <option value="month">
                        This Month
                    </option>

                </select>

            </div>


            <!-- =================================
                 DYNAMIC ANNOUNCEMENTS
            ================================== -->

            @if($announcements->count() > 0)

                @foreach($announcements as $announcement)

                    @php

                        $isNew = $announcement->created_at &&
                                 $announcement->created_at->gte(now()->subDays(7));

                        $isThisMonth = $announcement->created_at &&
                                       $announcement->created_at->month == now()->month &&
                                       $announcement->created_at->year == now()->year;

                    @endphp


                    <div
                        class="announcement {{ $isNew ? 'unread' : '' }}"
                        data-new="{{ $isNew ? 'yes' : 'no' }}"
                        data-month="{{ $isThisMonth ? 'yes' : 'no' }}"
                    >


                        <div class="announcement-top">


                            <div class="announcement-left">


                                <div class="announcement-icon">
                                    📢
                                </div>


                                <div class="announcement-content">


                                    <div class="announcement-title-row">

                                        <h3 class="announcement-title">

                                            {{ $announcement->title }}

                                        </h3>


                                        @if($isNew)

                                            <span class="new-badge">
                                                New
                                            </span>

                                        @endif

                                    </div>


                                    <p class="announcement-text">

                                        {{ $announcement->message }}

                                    </p>


                                    <div class="announcement-meta">


                                        <span>
                                            👤 Campus Administration
                                        </span>


                                        @if($announcement->created_at)

                                            <span>

                                                📅

                                                {{ $announcement->created_at->format('d M Y') }}

                                            </span>

                                        @endif


                                    </div>


                                </div>

                            </div>


                            <div class="announcement-date">

                                @if($announcement->created_at)

                                    {{ $announcement->created_at->diffForHumans() }}

                                @else

                                    Recently

                                @endif

                            </div>


                        </div>

                    </div>

                @endforeach


            @else


                <!-- EMPTY -->

                <div class="empty-announcements">

                    <div class="empty-icon">
                        🔔
                    </div>

                    <h3>
                        No Announcements Yet
                    </h3>

                    <p>
                        There are no announcements from the administration right now.
                    </p>

                </div>


            @endif


        </div>


        <!-- =====================================
             RIGHT SIDEBAR
        ====================================== -->

        <div class="ann-side">


            <!-- STAY UPDATED -->

            <div class="side-card">

                <h3>
                    Stay Updated
                </h3>


                <div class="notify-box">

                    <div class="notify-icon">
                        🔔
                    </div>

                    <h4>
                        Never miss an update
                    </h4>

                    <p>
                        Important announcements from campus administration
                        will appear here automatically.
                    </p>

                </div>

            </div>


            <!-- CAMPUS COIN -->

            <div class="side-card">

                <h3>
                    Campus Coin
                </h3>


                <div class="notify-box">

                    <div class="notify-icon">
                        🌿
                    </div>

                    <h4>
                        Manage your money smartly
                    </h4>

                    <p>
                        Check your budget, track transactions and follow
                        saving tips to make your Campus Coin count.
                    </p>

                </div>

            </div>


            <!-- QUICK INFO -->

            <div class="side-card">

                <h3>
                    Announcement Info
                </h3>


                <div class="notify-box">

                    <div class="notify-icon">
                        ✨
                    </div>

                    <h4>
                        Admin Updates
                    </h4>

                    <p>
                        New announcements published by the administrator
                        will automatically appear on this page.
                    </p>

                </div>

            </div>


        </div>


    </div>

</div>


<script>

    const filter = document.getElementById('announcementFilter');

    const announcements =
        document.querySelectorAll('.announcement');


    filter.addEventListener('change', function () {

        const selected = this.value;


        announcements.forEach(function (item) {


            if (selected === 'all') {

                item.style.display = '';

            }


            else if (selected === 'new') {

                if (item.dataset.new === 'yes') {

                    item.style.display = '';

                } else {

                    item.style.display = 'none';

                }

            }


            else if (selected === 'month') {

                if (item.dataset.month === 'yes') {

                    item.style.display = '';

                } else {

                    item.style.display = 'none';

                }

            }

        });

    });

</script>

@endsection