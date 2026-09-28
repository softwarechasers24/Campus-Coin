@extends('layouts.student')

@section('title', 'Reports')

@section('content')

<style>
    /* =========================================================
       CAMPUS COIN REPORTS
       DARK GREEN + NEON MINT THEME
    ========================================================= */

    .reports-page {
        width: 100%;
        min-height: calc(100vh - 20px);
        padding: 28px;
        color: #E8F5EF;
        background:
            radial-gradient(circle at 8% 8%, rgba(0,245,155,.07), transparent 28%),
            radial-gradient(circle at 92% 85%, rgba(16,185,129,.05), transparent 30%),
            #080E0B;
    }

    /* =========================================================
       TOPBAR
    ========================================================= */

    .reports-page .topbar {
        height: 48px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        width: 100%;
    }

    .reports-page .search-top {
        width: 280px;
        background: #0D1813;
        color: #E8F5EF;
        border: 1px solid #1A3326;
        border-radius: 9px;
        padding: 10px 14px;
        outline: none;
        font-size: 12px;
        transition: .2s ease;
    }

    .reports-page .search-top::placeholder {
        color: #536C60;
    }

    .reports-page .search-top:focus {
        border-color: #00F59B;
        box-shadow: 0 0 0 3px rgba(0,245,155,.07);
    }

    .reports-page .top-right {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .reports-page .notification {
        font-size: 17px;
        color: #00F59B;
        opacity: .85;
    }

    .reports-page .profile {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        font-weight: 700;
        color: #CFE2D8;
    }

    .reports-page .profile-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: rgba(0,245,155,.10);
        border: 1px solid rgba(0,245,155,.20);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #00F59B;
        font-weight: 800;
        box-shadow: 0 0 15px rgba(0,245,155,.05);
    }

    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .reports-page .page-header {
        margin-bottom: 22px;
    }

    .reports-page .page-header h1 {
        font-size: 28px;
        font-weight: 800;
        color: #E8F5EF;
        margin-bottom: 6px;
        letter-spacing: -.5px;
    }

    .reports-page .page-header p {
        color: #718E81;
        font-size: 13px;
    }

    /* =========================================================
       FILTER CARD
    ========================================================= */

    .reports-page .filter-card {
        width: 100%;
        background: linear-gradient(
            145deg,
            rgba(18,35,27,.98),
            rgba(13,24,19,.98)
        );
        border: 1px solid #1A3326;
        border-radius: 14px;
        padding: 19px;
        margin-bottom: 20px;
        box-shadow: 0 12px 35px rgba(0,0,0,.15);
    }

    .reports-page .filters {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr auto;
        gap: 13px;
        align-items: end;
    }

    .reports-page .filter-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .reports-page .filter-group label {
        font-size: 11px;
        color: #8EA69A;
        font-weight: 700;
    }

    .reports-page .filter-group select {
        width: 100%;
        height: 39px;
        border: 1px solid #1A3326;
        border-radius: 8px;
        padding: 0 11px;
        font-size: 12px;
        color: #D8EAE1;
        background: #080E0B;
        outline: none;
        transition: .2s ease;
    }

    .reports-page .filter-group select:focus {
        border-color: #00F59B;
        box-shadow: 0 0 0 3px rgba(0,245,155,.07);
    }

    .reports-page .filter-group select option {
        background: #0D1813;
        color: #E8F5EF;
    }

    .reports-page .filter-buttons {
        display: flex;
        gap: 8px;
    }

    .reports-page .apply-btn {
        height: 39px;
        padding: 0 22px;
        border: 1px solid #00F59B;
        border-radius: 8px;
        background: #00F59B;
        color: #06100B;
        cursor: pointer;
        font-size: 12px;
        font-weight: 800;
        transition: .2s ease;
    }

    .reports-page .apply-btn:hover {
        background: #39FFB5;
        border-color: #39FFB5;
        transform: translateY(-1px);
        box-shadow: 0 7px 20px rgba(0,245,155,.14);
    }

    .reports-page .clear-btn {
        height: 39px;
        padding: 0 18px;
        border: 1px solid #28513D;
        border-radius: 8px;
        background: #12231B;
        color: #A9C0B4;
        cursor: pointer;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .2s ease;
    }

    .reports-page .clear-btn:hover {
        background: #1A3326;
        color: #E8F5EF;
        border-color: #00F59B;
    }

    /* =========================================================
       REPORT CARDS
    ========================================================= */

    .reports-page .report-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
        margin-bottom: 20px;
    }

    .reports-page .report-card {
        width: 100%;
        min-width: 0;
        background: linear-gradient(
            145deg,
            rgba(18,35,27,.98),
            rgba(13,24,19,.98)
        );
        border: 1px solid #1A3326;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 12px 35px rgba(0,0,0,.15);
        transition: .25s ease;
    }

    .reports-page .report-card:hover {
        transform: translateY(-3px);
        border-color: rgba(0,245,155,.25);
        box-shadow:
            0 17px 42px rgba(0,0,0,.22),
            0 0 25px rgba(0,245,155,.035);
    }

    .reports-page .report-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 18px;
    }

    .reports-page .report-icon {
        width: 43px;
        height: 43px;
        background: rgba(0,245,155,.08);
        border: 1px solid rgba(0,245,155,.15);
        color: #00F59B;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
    }

    .reports-page .report-card h2 {
        font-size: 15px;
        color: #E8F5EF;
        margin-bottom: 7px;
        font-weight: 750;
    }

    .reports-page .report-card p {
        font-size: 11px;
        line-height: 1.7;
        color: #718E81;
    }

    /* =========================================================
       COMMON CARD
    ========================================================= */

    .reports-page .overview-card,
    .reports-page .chart-card {
        width: 100%;
        min-width: 0;
        background: linear-gradient(
            145deg,
            rgba(18,35,27,.98),
            rgba(13,24,19,.98)
        );
        border: 1px solid #1A3326;
        border-radius: 14px;
        padding: 20px;
        box-shadow: 0 12px 35px rgba(0,0,0,.15);
    }

    .reports-page .overview-card {
        margin-bottom: 20px;
    }

    .reports-page .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .reports-page .card-header h2 {
        font-size: 15px;
        color: #E8F5EF;
        font-weight: 750;
        margin: 0;
    }

    .reports-page .card-header span {
        font-size: 10px;
        color: #718E81;
    }

    /* =========================================================
       STATS
    ========================================================= */

    .reports-page .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
        width: 100%;
    }

    .reports-page .stat {
        background: rgba(8,14,11,.75);
        border: 1px solid #1A3326;
        border-radius: 11px;
        padding: 16px;
        min-width: 0;
        transition: .2s ease;
    }

    .reports-page .stat:hover {
        border-color: rgba(0,245,155,.18);
        transform: translateY(-2px);
    }

    .reports-page .stat-title {
        color: #718E81;
        font-size: 10px;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .reports-page .stat-value {
        font-size: 19px;
        color: #E8F5EF;
        font-weight: 800;
        word-break: break-word;
    }

    .reports-page .income-value {
        color: #00F59B;
    }

    .reports-page .expense-value {
        color: #FF7777;
    }

    .reports-page .balance-value {
        color: #E8F5EF;
    }

    .reports-page .saving-value {
        color: #7DE8B9;
    }

    .reports-page .stat-change {
        font-size: 9px;
        margin-top: 6px;
        color: #789A89;
    }

    /* =========================================================
       CHART AREA
    ========================================================= */

    .reports-page .charts {
        width: 100%;
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 18px;
        margin-bottom: 20px;
    }

    .reports-page .chart {
        min-height: 230px;
        display: flex;
        align-items: flex-end;
        justify-content: space-around;
        gap: 15px;
        padding: 20px 10px 5px;
        border-bottom: 1px solid #1A3326;
        overflow-x: auto;
        background:
            linear-gradient(
                to top,
                rgba(0,245,155,.025),
                transparent 45%
            );
        border-radius: 8px;
    }

    .reports-page .bar-group {
        height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        gap: 6px;
        flex: 1;
        position: relative;
        min-width: 40px;
    }

    .reports-page .bars {
        width: 100%;
        height: 170px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        gap: 5px;
    }

    .reports-page .bar {
        width: 18px;
        border-radius: 5px 5px 0 0;
        min-height: 2px;
        transition: .25s ease;
    }

    .reports-page .bar:hover {
        filter: brightness(1.2);
    }

    .reports-page .income-bar {
        background: linear-gradient(
            to top,
            #059669,
            #00F59B
        );
        box-shadow: 0 0 12px rgba(0,245,155,.08);
    }

    .reports-page .expense-bar {
        background: linear-gradient(
            to top,
            #8F3E3E,
            #FF7777
        );
    }

    .reports-page .bar-label {
        font-size: 9px;
        color: #718E81;
    }

    .reports-page .bar-legend {
        display: flex;
        justify-content: center;
        gap: 18px;
        margin-top: 15px;
    }

    .reports-page .legend-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        color: #849A90;
    }

    .reports-page .legend-dot {
        width: 9px;
        height: 9px;
        border-radius: 50%;
    }

    .reports-page .income-dot {
        background: #00F59B;
        box-shadow: 0 0 7px rgba(0,245,155,.25);
    }

    .reports-page .expense-dot {
        background: #FF7777;
    }

    /* =========================================================
       CATEGORY EXPENSE
    ========================================================= */

    .reports-page .category-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .reports-page .category-row {
        display: grid;
        grid-template-columns: 95px 1fr 45px;
        gap: 10px;
        align-items: center;
    }

    .reports-page .category-name {
        font-size: 10px;
        color: #B8CCC2;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .reports-page .progress {
        height: 8px;
        background: #1A3326;
        border-radius: 20px;
        overflow: hidden;
    }

    .reports-page .progress span {
        display: block;
        height: 100%;
        background: linear-gradient(
            90deg,
            #059669,
            #00F59B
        );
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0,245,155,.12);
    }

    .reports-page .percentage {
        text-align: right;
        font-size: 9px;
        color: #8EA69A;
    }

    .reports-page .category-amount {
        font-size: 9px;
        color: #61786C;
        margin-top: 3px;
    }

    /* =========================================================
       DOWNLOAD SECTION
    ========================================================= */

    .reports-page .download-section {
        width: 100%;
        background:
            radial-gradient(
                circle at 90% 50%,
                rgba(0,245,155,.08),
                transparent 35%
            ),
            #0D1813;
        border: 1px solid #1A3326;
        border-radius: 14px;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .reports-page .download-section h2 {
        font-size: 15px;
        color: #E8F5EF;
        margin-bottom: 5px;
        font-weight: 750;
    }

    .reports-page .download-section p {
        font-size: 10px;
        color: #718E81;
    }

    .reports-page .download-btn {
        background: #00F59B;
        color: #06100B;
        border: 1px solid #00F59B;
        padding: 10px 18px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 11px;
        font-weight: 800;
        transition: .2s ease;
    }

    .reports-page .download-btn:hover {
        background: #39FFB5;
        border-color: #39FFB5;
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(0,245,155,.16);
    }

    /* =========================================================
       EMPTY
    ========================================================= */

    .reports-page .empty-box {
        width: 100%;
        padding: 35px 20px;
        text-align: center;
        color: #718E81;
        font-size: 12px;
    }

    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .reports-page ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .reports-page ::-webkit-scrollbar-track {
        background: #080E0B;
    }

    .reports-page ::-webkit-scrollbar-thumb {
        background: #1A3326;
        border-radius: 10px;
    }

    .reports-page ::-webkit-scrollbar-thumb:hover {
        background: #28513D;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1100px) {

        .reports-page .stats-grid {
            grid-template-columns: 1fr 1fr;
        }

        .reports-page .filters {
            grid-template-columns: 1fr 1fr;
        }

        .reports-page .filter-buttons {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 950px) {

        .reports-page .report-grid {
            grid-template-columns: 1fr;
        }

        .reports-page .charts {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 650px) {

        .reports-page {
            padding: 20px 15px;
        }

        .reports-page .stats-grid {
            grid-template-columns: 1fr;
        }

        .reports-page .filters {
            grid-template-columns: 1fr;
        }

        .reports-page .filter-buttons {
            grid-column: auto;
        }

        .reports-page .download-section {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .reports-page .download-btn {
            width: 100%;
        }

        .reports-page .topbar {
            flex-direction: column;
            height: auto;
            align-items: stretch;
            gap: 15px;
        }

        .reports-page .search-top {
            width: 100%;
        }

        .reports-page .top-right {
            justify-content: flex-end;
        }

        .reports-page .category-row {
            grid-template-columns: 80px 1fr 40px;
        }

        .reports-page .page-header h1 {
            font-size: 24px;
        }
    }

    /* =========================================================
       PRINT
    ========================================================= */

    @media print {

        .sidebar,
        .topbar,
        .filter-card,
        .download-section {
            display: none !important;
        }

        .reports-page {
            background: white !important;
            color: #111 !important;
            padding: 0;
        }

        .reports-page .report-card,
        .reports-page .overview-card,
        .reports-page .chart-card {
            box-shadow: none;
            break-inside: avoid;
            background: white !important;
            border: 1px solid #ddd !important;
            color: #111 !important;
        }

        .reports-page .page-header h1,
        .reports-page .card-header h2,
        .reports-page .report-card h2,
        .reports-page .stat-value {
            color: #111 !important;
        }

        .reports-page .page-header p,
        .reports-page .report-card p,
        .reports-page .card-header span,
        .reports-page .stat-title,
        .reports-page .stat-change {
            color: #555 !important;
        }
    }
</style>


<div class="reports-page">

    <!-- =====================================================
         MAIN
    ====================================================== -->

    <main class="main">

        <!-- =================================================
             TOPBAR
        ================================================== -->

        <div class="topbar">

            <input
                type="text"
                class="search-top"
                placeholder="Search reports..."
            >

            <div class="top-right">

                <span class="notification">
                    ♧
                </span>

                <div class="profile">

                    <div class="profile-circle">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    <span>
                        {{ auth()->user()->name ?? 'User' }}
                    </span>

                    <span>⌄</span>

                </div>

            </div>

        </div>


        <!-- =================================================
             HEADER
        ================================================== -->

        <div class="page-header">

            <h1>
                Reports
            </h1>

            <p>
                View financial reports and understand student spending activity.
            </p>

        </div>


        <!-- =================================================
             FILTERS
        ================================================== -->

        <div class="filter-card">

            <form
                method="GET"
                action="{{ route('admin.reports') }}"
            >

                <div class="filters">

                    <!-- MONTH -->

                    <div class="filter-group">

                        <label>
                            Report Period
                        </label>

                        <select name="month">

                            <option value="">
                                All Months
                            </option>

                            @if(isset($months))

                                @foreach($months as $month)

                                    <option
                                        value="{{ $month }}"
                                        {{ request('month') == $month ? 'selected' : '' }}
                                    >

                                        {{ \Carbon\Carbon::createFromFormat('Y-m', $month)->format('F Y') }}

                                    </option>

                                @endforeach

                            @endif

                        </select>

                    </div>


                    <!-- CATEGORY -->

                    <div class="filter-group">

                        <label>
                            Category
                        </label>

                        <select name="category">

                            <option value="">
                                All Categories
                            </option>

                            @if(isset($categories))

                                @foreach($categories as $category)

                                    <option
                                        value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}
                                    >

                                        {{ $category->name }}

                                    </option>

                                @endforeach

                            @endif

                        </select>

                    </div>


                    <!-- RANGE -->

                    <div class="filter-group">

                        <label>
                            Time Range
                        </label>

                        <select name="range">

                            <option value="">
                                All Time
                            </option>

                            <option
                                value="1"
                                {{ request('range') == '1' ? 'selected' : '' }}
                            >
                                This Month
                            </option>

                            <option
                                value="6"
                                {{ request('range') == '6' ? 'selected' : '' }}
                            >
                                Last 6 Months
                            </option>

                            <option
                                value="12"
                                {{ request('range') == '12' ? 'selected' : '' }}
                            >
                                This Year
                            </option>

                        </select>

                    </div>


                    <!-- BUTTONS -->

                    <div class="filter-buttons">

                        <button
                            class="apply-btn"
                            type="submit"
                        >
                            Apply
                        </button>

                        <a
                            href="{{ route('admin.reports') }}"
                            class="clear-btn"
                        >
                            Clear
                        </a>

                    </div>

                </div>

            </form>

        </div>


        <!-- =================================================
             REPORT CARDS
        ================================================== -->

        <div class="report-grid">

            @forelse($reports ?? [] as $report)

                <div class="report-card">

                    <div class="report-top">

                        <div class="report-icon">
                            {{ $report->icon ?? '▤' }}
                        </div>

                    </div>

                    <h2>
                        {{ $report->title }}
                    </h2>

                    <p>
                        {{ $report->description }}
                    </p>

                </div>

            @empty

                <div class="report-card">

                    <h2>
                        No reports available
                    </h2>

                    <p>
                        Reports will appear here after transactions are added.
                    </p>

                </div>

            @endforelse

        </div>


        <!-- =================================================
             FINANCIAL OVERVIEW
        ================================================== -->

        <div class="overview-card">

            <div class="card-header">

                <h2>
                    Financial Overview
                </h2>

                <span>
                    {{ $financialReport->month ?? 'All Time' }}
                </span>

            </div>


            <div class="stats-grid">

                <!-- TOTAL INCOME -->

                <div class="stat">

                    <div class="stat-title">
                        Total Income
                    </div>

                    <div class="stat-value income-value">

                        Rs.
                        {{ number_format((float)($financialReport->total_income ?? 0), 2) }}

                    </div>

                    <div class="stat-change">

                        {{ $financialReport->income_change ?? 'No income data' }}

                    </div>

                </div>


                <!-- TOTAL EXPENSE -->

                <div class="stat">

                    <div class="stat-title">
                        Total Expenses
                    </div>

                    <div class="stat-value expense-value">

                        Rs.
                        {{ number_format((float)($financialReport->total_expenses ?? 0), 2) }}

                    </div>

                    <div class="stat-change">

                        {{ $financialReport->expense_change ?? 'No expense data' }}

                    </div>

                </div>


                <!-- BALANCE -->

                <div class="stat">

                    <div class="stat-title">
                        Balance
                    </div>

                    <div class="stat-value balance-value">

                        Rs.
                        {{ number_format((float)($financialReport->balance ?? 0), 2) }}

                    </div>

                    <div class="stat-change">

                        {{ $financialReport->balance_note ?? 'No balance data' }}

                    </div>

                </div>


                <!-- SAVING GOAL -->

                <div class="stat">

                    <div class="stat-title">
                        Saving Goal
                    </div>

                    <div class="stat-value saving-value">

                        Rs.
                        {{ number_format((float)($financialReport->saving_goal ?? 0), 2) }}

                    </div>

                    <div class="stat-change">

                        {{ $financialReport->saving_percentage ?? 0 }}%
                        completed

                    </div>

                </div>

            </div>

        </div>


        <!-- =================================================
             CHARTS
        ================================================== -->

        <div class="charts">

            <!-- MONTHLY INCOME VS EXPENSE -->

            <div class="chart-card">

                <div class="card-header">

                    <h2>
                        Income vs Expense
                    </h2>

                    <span>

                        {{ request('range') == '1'
                            ? 'This Month'
                            : (request('range') == '12'
                                ? 'This Year'
                                : 'Financial Data') }}

                    </span>

                </div>


                @if(isset($monthlyFinancials) && $monthlyFinancials->count() > 0)

                    <div class="chart">

                        @foreach($monthlyFinancials as $monthly)

                            @php

                                $incomeHeight =
                                    $maxChartAmount ?? 0;

                                if ($incomeHeight > 0) {

                                    $incomeHeight =
                                        (($monthly->income ?? 0) / $incomeHeight) * 100;

                                } else {

                                    $incomeHeight = 0;

                                }

                                $expenseHeight =
                                    $maxChartAmount ?? 0;

                                if ($expenseHeight > 0) {

                                    $expenseHeight =
                                        (($monthly->expense ?? 0) / $expenseHeight) * 100;

                                } else {

                                    $expenseHeight = 0;

                                }

                            @endphp


                            <div class="bar-group">

                                <div class="bars">

                                    <div
                                        class="bar income-bar"
                                        style="height: {{ max(2, $incomeHeight) }}%;"
                                        title="Income: Rs. {{ number_format($monthly->income ?? 0, 2) }}"
                                    ></div>

                                    <div
                                        class="bar expense-bar"
                                        style="height: {{ max(2, $expenseHeight) }}%;"
                                        title="Expense: Rs. {{ number_format($monthly->expense ?? 0, 2) }}"
                                    ></div>

                                </div>

                                <span class="bar-label">
                                    {{ $monthly->month }}
                                </span>

                            </div>

                        @endforeach

                    </div>


                    <div class="bar-legend">

                        <div class="legend-item">

                            <span class="legend-dot income-dot"></span>

                            Income

                        </div>

                        <div class="legend-item">

                            <span class="legend-dot expense-dot"></span>

                            Expense

                        </div>

                    </div>

                @else

                    <div class="empty-box">
                        No monthly financial data available.
                    </div>

                @endif

            </div>


            <!-- EXPENSE BY CATEGORY -->

            <div class="chart-card">

                <div class="card-header">

                    <h2>
                        Expense by Category
                    </h2>

                    <span>
                        Current
                    </span>

                </div>


                <div class="category-list">

                    @forelse($categoryExpenses ?? [] as $category)

                        <div class="category-row">

                            <div>

                                <div class="category-name">
                                    {{ $category->category_name }}
                                </div>

                                <div class="category-amount">

                                    Rs.
                                    {{ number_format((float)$category->total, 2) }}

                                </div>

                            </div>


                            <div class="progress">

                                <span
                                    style="
                                        width:
                                        {{ min(100, max(0, $category->percentage ?? 0)) }}%;
                                    "
                                ></span>

                            </div>


                            <span class="percentage">

                                {{ $category->percentage ?? 0 }}%

                            </span>

                        </div>

                    @empty

                        <div class="empty-box">

                            No category expense data available.

                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        <!-- =================================================
             DOWNLOAD
        ================================================== -->

        <div class="download-section">

            <div>

                <h2>
                    Download Financial Report
                </h2>

                <p>
                    Generate a printable financial report for the selected period.
                </p>

            </div>

            <button
                class="download-btn"
                type="button"
                onclick="window.print()"
            >
                ↓ Download PDF
            </button>

        </div>


    </main>

</div>

</div>


<script>

const searchInput =
    document.querySelector('.reports-page .search-top');

if (searchInput) {

    searchInput.addEventListener('input', function () {

        const searchText =
            this.value.toLowerCase().trim();

        const cards =
            document.querySelectorAll('.reports-page .report-card');

        cards.forEach(function (card) {

            const text =
                card.innerText.toLowerCase();

            if (text.includes(searchText)) {

                card.style.display = '';

            } else {

                card.style.display = 'none';

            }

        });

    });

}

</script>


@endsection
