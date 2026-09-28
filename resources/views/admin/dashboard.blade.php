@extends('layouts.admin')

@section('content')

<style>

/* =========================================================
   CAMPUS COIN DASHBOARD
========================================================= */

.dashboard-page {
    width: 100%;
    min-height: 100vh;
    color: #E8F5EF;
    font-family: 'Plus Jakarta Sans', Arial, sans-serif;
}


/* =========================================================
   TOP BAR
========================================================= */

.dashboard-topbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;

    padding: 15px 20px;
    margin-bottom: 28px;

    background:
        linear-gradient(
            145deg,
            rgba(18,35,27,.96),
            rgba(13,24,19,.96)
        );

    border: 1px solid #1A3326;
    border-radius: 14px;

    box-shadow:
        0 12px 35px rgba(0,0,0,.20);
}


.dashboard-search {
    width: 320px;
    max-width: 100%;

    padding: 11px 15px;

    background: #0D1813 !important;
    color: #E8F5EF !important;

    border: 1px solid #1A3326 !important;
    border-radius: 9px;

    outline: none;

    font-size: 12px;
}


.dashboard-search::placeholder {
    color: #526B60;
}


.dashboard-search:focus {
    border-color: rgba(0,245,155,.55) !important;

    box-shadow:
        0 0 0 3px rgba(0,245,155,.08) !important;
}


/* =========================================================
   PROFILE
========================================================= */

.dashboard-profile {
    display: flex;
    align-items: center;
    gap: 11px;

    color: #C5D8CF;

    font-size: 12px;
    font-weight: 600;
}


.dashboard-profile-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #00F59B;

    box-shadow:
        0 0 10px #00F59B;
}


.dashboard-avatar {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background:
        linear-gradient(
            135deg,
            #00F59B,
            #10B981
        );

    color: #06120C;

    font-weight: 800;

    box-shadow:
        0 0 18px rgba(0,245,155,.16);
}


/* =========================================================
   HEADING
========================================================= */

.dashboard-heading {
    margin-bottom: 23px;
}


.dashboard-heading h1 {
    margin: 0 0 7px;

    font-size: 28px;
    font-weight: 800;

    letter-spacing: -.7px;

    color: #FFFFFF;
}


.dashboard-heading h1 span {
    color: #00F59B;
}


.dashboard-heading p {
    margin: 0;

    color: #718E81;

    font-size: 12px;
}


/* =========================================================
   STATISTICS
========================================================= */

.dashboard-stats {
    display: grid;

    grid-template-columns:
        repeat(4, minmax(0,1fr));

    gap: 16px;

    margin-bottom: 20px;
}


.dashboard-card {
    position: relative;

    background:
        linear-gradient(
            145deg,
            rgba(18,35,27,.97),
            rgba(13,24,19,.97)
        );

    border: 1px solid #1A3326;

    border-radius: 14px;

    padding: 20px;

    box-shadow:
        0 12px 35px rgba(0,0,0,.16);

    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}


.dashboard-card:hover {
    transform: translateY(-3px);

    border-color:
        rgba(0,245,155,.24);

    box-shadow:
        0 15px 38px rgba(0,0,0,.24),
        0 0 22px rgba(0,245,155,.045);
}


.stat-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}


.stat-title {
    color: #718E81;

    font-size: 11px;
    font-weight: 600;
}


.stat-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background:
        rgba(0,245,155,.08);

    border:
        1px solid rgba(0,245,155,.14);

    color: #00F59B;

    font-size: 15px;
}


.stat-number {
    margin: 14px 0 6px;

    color: #FFFFFF;

    font-size: 25px;
    font-weight: 800;

    letter-spacing: -.5px;
}


.stat-desc {
    color: #526B60;

    font-size: 10px;
}


/* =========================================================
   CONTENT GRID
========================================================= */

.dashboard-content-grid {
    display: grid;

    grid-template-columns: 2fr 1fr;

    gap: 18px;

    margin-bottom: 20px;
}


.dashboard-card-header {
    display: flex;

    align-items: center;
    justify-content: space-between;

    margin-bottom: 20px;
}


.dashboard-card-header h3 {
    margin: 0;

    color: #FFFFFF;

    font-size: 14px;
    font-weight: 700;
}


.dashboard-card-header span,
.dashboard-card-header a {
    color: #526B60;

    font-size: 10px;

    text-decoration: none;
}


.dashboard-card-header a:hover {
    color: #00F59B;
}


/* =========================================================
   CHARTS
========================================================= */

.chart-container {
    height: 275px;

    position: relative;
}


.category-container {
    height: 275px;

    display: flex;

    align-items: center;
    justify-content: center;
}


.category-chart {
    width: 100%;
    max-width: 250px;

    height: 250px;
}


.empty-state {
    height: 100%;

    display: flex;

    flex-direction: column;

    align-items: center;
    justify-content: center;

    text-align: center;

    gap: 9px;

    color: #718E81;

    font-size: 12px;
}


.empty-state strong {
    color: #C5D8CF;

    font-size: 12px;
}


.empty-state p {
    margin: 0;

    color: #526B60;

    font-size: 10px;
}


.empty-icon {
    font-size: 28px;

    color: #00F59B;

    opacity: .55;
}


/* =========================================================
   GREEN BUTTON
========================================================= */

.dashboard-btn {
    display: inline-block;

    margin-top: 12px;

    padding: 9px 13px;

    border-radius: 8px;

    background: #00F59B;

    color: #06120C !important;

    font-size: 10px;
    font-weight: 800;

    text-decoration: none;

    transition: .25s ease;

    box-shadow:
        0 0 15px rgba(0,245,155,.10);
}


.dashboard-btn:hover {
    background: #39FFB5;

    color: #06120C !important;

    transform: translateY(-2px);

    box-shadow:
        0 0 22px rgba(0,245,155,.22);
}


/* =========================================================
   INSIGHTS
========================================================= */

.insights-grid {
    display: grid;

    grid-template-columns:
        repeat(3, minmax(0,1fr));

    gap: 18px;

    margin-bottom: 20px;
}


.insight-icon {
    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 14px;

    border-radius: 11px;

    background:
        rgba(0,245,155,.08);

    border:
        1px solid rgba(0,245,155,.13);

    color: #00F59B;

    font-weight: 800;
}


.insight-card h3 {
    margin: 0 0 9px;

    color: #FFFFFF;

    font-size: 14px;
}


.insight-card p {
    margin: 0;

    color: #718E81;

    font-size: 11px;

    line-height: 1.6;
}


.insight-value {
    margin-top: 14px;

    color: #00F59B;

    font-size: 20px;
    font-weight: 800;
}


/* =========================================================
   FINANCIAL
========================================================= */

.financial-section {
    margin-bottom: 20px;
}


.budget-grid {
    display: grid;

    grid-template-columns:
        repeat(2,minmax(0,1fr));

    gap: 18px;
}


.budget-title {
    color: #718E81;

    font-size: 11px;
}


.budget-big {
    margin: 14px 0 7px;

    color: #FFFFFF;

    font-size: 25px;
    font-weight: 800;
}


.budget-note {
    color: #526B60;

    font-size: 10px;
}


/* =========================================================
   REPORTS
========================================================= */

.reports-section {
    margin-bottom: 20px;
}


.reports-grid {
    display: grid;

    grid-template-columns:
        repeat(4,minmax(0,1fr));

    gap: 13px;
}


.report-card {
    padding: 16px;

    background:
        rgba(13,24,19,.85);

    border:
        1px solid #1A3326;

    border-radius: 11px;

    transition: .25s ease;
}


.report-card:hover {
    border-color:
        rgba(0,245,155,.20);

    background:
        rgba(18,35,27,.95);

    transform: translateY(-2px);
}


.report-icon {
    margin-bottom: 11px;

    color: #00F59B;

    font-size: 19px;
}


.report-card h4 {
    margin: 0 0 7px;

    color: #FFFFFF;

    font-size: 12px;
}


.report-card p {
    min-height: 45px;

    margin: 0;

    color: #718E81;

    font-size: 10px;

    line-height: 1.55;
}


/* =========================================================
   BOTTOM GRID
========================================================= */

.bottom-grid {
    display: grid;

    grid-template-columns: 2fr 1fr;

    gap: 18px;

    align-items: start;
}


/* =========================================================
   TABLE
========================================================= */

.table-wrapper {
    overflow-x: auto;
}


.dashboard-table {
    width: 100%;

    border-collapse: collapse;
}


.dashboard-table th,
.dashboard-table td {
    padding: 13px 9px;

    text-align: left;

    border-bottom:
        1px solid #1A3326;

    font-size: 11px;
}


.dashboard-table th {
    color: #526B60;

    font-size: 9px;

    text-transform: uppercase;

    letter-spacing: .5px;
}


.dashboard-table td {
    color: #B7CEC3;
}


.dashboard-table tbody tr {
    transition: .2s ease;
}


.dashboard-table tbody tr:hover {
    background:
        rgba(0,245,155,.025);
}


/* =========================================================
   BADGES
========================================================= */

.dashboard-badge {
    display: inline-block;

    padding: 5px 9px;

    border-radius: 999px;

    font-size: 9px;
    font-weight: 700;
}


.dashboard-income {
    background:
        rgba(0,245,155,.09);

    color: #00F59B;

    border:
        1px solid rgba(0,245,155,.14);
}


.dashboard-expense {
    background:
        rgba(255,92,103,.08);

    color: #FF858C;

    border:
        1px solid rgba(255,92,103,.12);
}


/* =========================================================
   ANNOUNCEMENTS
========================================================= */

.announcement-list {
    width: 100%;
}


.announcement {
    padding: 14px 0;

    border-bottom:
        1px solid #1A3326;

    transition: .2s ease;
}


.announcement:first-child {
    padding-top: 0;
}


.announcement:last-child {
    border-bottom: none;
}


.announcement:hover {
    padding-left: 5px;
}


.announcement h4 {
    margin: 0 0 7px;

    color: #FFFFFF;

    font-size: 12px;

    font-weight: 700;
}


.announcement p {
    margin: 0;

    color: #718E81;

    font-size: 10px;

    line-height: 1.6;
}


.announcement small {
    display: block;

    margin-top: 8px;

    color: #526B60;

    font-size: 9px;
}


/* =========================================================
   QUICK ACTIONS
========================================================= */

.quick-actions {
    display: grid;

    grid-template-columns:
        repeat(3,1fr);

    gap: 8px;

    margin-top: 18px;
}


.quick-action {
    padding: 12px 5px;

    text-align: center;

    color: #718E81;

    background:
        rgba(0,245,155,.035);

    border:
        1px solid #1A3326;

    border-radius: 9px;

    text-decoration: none;

    font-size: 9px;

    transition: .25s ease;
}


.quick-action:hover {
    background:
        rgba(0,245,155,.09);

    border-color:
        rgba(0,245,155,.20);

    color: #00F59B;

    transform: translateY(-2px);
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width:1100px) {

    .dashboard-stats,
    .reports-grid {
        grid-template-columns:
            repeat(2,minmax(0,1fr));
    }

    .dashboard-content-grid,
    .bottom-grid {
        grid-template-columns: 1fr;
    }

}


@media(max-width:800px) {

    .insights-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-topbar {
        flex-wrap: wrap;
    }

    .dashboard-search {
        width: 100%;
    }

}


@media(max-width:600px) {

    .dashboard-stats,
    .reports-grid,
    .budget-grid {
        grid-template-columns: 1fr;
    }

    .dashboard-topbar {
        padding: 13px;
    }

    .dashboard-heading h1 {
        font-size: 23px;
    }

    .profile-name {
        display: none;
    }

    .quick-actions {
        grid-template-columns: 1fr;
    }

}

</style>


<div class="dashboard-page">


    <!-- =====================================================
         TOP BAR
    ====================================================== -->

    <div class="dashboard-topbar">

        <input
            type="text"
            class="dashboard-search"
            id="dashboardSearch"
            placeholder="Search transactions..."
        >

        <div class="dashboard-profile">

            <span class="dashboard-profile-dot"></span>

            <div class="dashboard-avatar">

                {{
                    strtoupper(
                        substr(
                            auth()->user()->name ?? 'A',
                            0,
                            1
                        )
                    )
                }}

            </div>

            <span class="profile-name">
                {{ auth()->user()->name ?? 'Admin' }}
            </span>

        </div>

    </div>


    <!-- =====================================================
         HEADING
    ====================================================== -->

    <div class="dashboard-heading">

        <h1>
            Welcome to <span>Campus Coin</span>
        </h1>

        <p>
            Monitor transactions, spending and campus finances.
        </p>

    </div>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <section class="dashboard-stats">


        <!-- TOTAL STUDENTS -->

        <div class="dashboard-card">

            <div class="stat-top">

                <span class="stat-title">
                    Total Students
                </span>

                <span class="stat-icon">
                    👥
                </span>

            </div>

            <div class="stat-number">
                {{ number_format($totalUsers ?? 0) }}
            </div>

            <div class="stat-desc">
                Registered students
            </div>

        </div>


        <!-- TOTAL TRANSACTIONS -->

        <div class="dashboard-card">

            <div class="stat-top">

                <span class="stat-title">
                    Total Transactions
                </span>

                <span class="stat-icon">
                    ↔
                </span>

            </div>

            <div class="stat-number">
                {{ number_format($totalTransactions ?? 0) }}
            </div>

            <div class="stat-desc">
                Transactions recorded
            </div>

        </div>


        <!-- ACTIVE STUDENTS -->

        <div class="dashboard-card">

            <div class="stat-top">

                <span class="stat-title">
                    Active Students
                </span>

                <span class="stat-icon">
                    ✓
                </span>

            </div>

            <div class="stat-number">
                {{ number_format($activeUsers ?? 0) }}
            </div>

            <div class="stat-desc">
                Students with transactions
            </div>

        </div>


        <!-- TOP CATEGORY -->

        <div class="dashboard-card">

            <div class="stat-top">

                <span class="stat-title">
                    Top Category
                </span>

                <span class="stat-icon">
                    ▦
                </span>

            </div>

            @if(isset($topCategory) && $topCategory)

                <div
                    class="stat-number"
                    style="font-size:19px;"
                >
                    {{ $topCategory->name }}
                </div>

                <div class="stat-desc">
                    {{ $topCategory->transactions_count }}
                    transactions
                </div>

            @else

                <div
                    class="stat-number"
                    style="font-size:19px;"
                >
                    No category
                </div>

                <div class="stat-desc">
                    0 transactions
                </div>

            @endif

        </div>

    </section>


    <!-- =====================================================
         CHARTS
    ====================================================== -->

    <section class="dashboard-content-grid">


        <!-- STUDENT REGISTRATION -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <h3>
                    Student Registration
                </h3>

                <span>
                    Last 6 Months
                </span>

            </div>

            <div class="chart-container">

                @if(
                    isset($monthlyUsers)
                    &&
                    array_sum($monthlyUsers) > 0
                )

                    <canvas id="usersChart"></canvas>

                @else

                    <div class="empty-state">

                        <span class="empty-icon">
                            —
                        </span>

                        <strong>
                            No student data yet
                        </strong>

                        <p>
                            Registration activity will appear here.
                        </p>

                    </div>

                @endif

            </div>

        </div>


        <!-- SPENDING CATEGORIES -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <h3>
                    Spending Categories
                </h3>

                <span>
                    Current
                </span>

            </div>

            <div class="category-container">

                @if(
                    isset($categoryLabels)
                    &&
                    count($categoryLabels) > 0
                )

                    <div class="category-chart">

                        <canvas
                            id="categoryChart"
                        ></canvas>

                    </div>

                @else

                    <div class="empty-state">

                        <span class="empty-icon">
                            —
                        </span>

                        <strong>
                            No category data yet
                        </strong>

                        <p>
                            Category activity will appear after transactions.
                        </p>

                        <a
                            href="{{ route('admin.categories') }}"
                            class="dashboard-btn"
                        >
                            Manage Categories
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </section>


    <!-- =====================================================
         INSIGHTS
    ====================================================== -->

    <section class="insights-grid">


        <!-- SPENDING OVERVIEW -->

        <div class="dashboard-card insight-card">

            <div class="insight-icon">
                i
            </div>

            <h3>
                Spending Overview
            </h3>

            @if(
                isset($topCategory)
                &&
                $topCategory
            )

                <p>
                    Most frequently used transaction category.
                </p>

                <div class="insight-value">

                    {{ $topCategory->name }}

                    —

                    {{ $topCategoryPercentage ?? 0 }}%

                </div>

            @else

                <p>
                    Spending information will appear after transactions.
                </p>

                <div class="insight-value">
                    —
                </div>

            @endif

        </div>


        <!-- TRANSACTION ACTIVITY -->

        <div class="dashboard-card insight-card">

            <div class="insight-icon">
                ↔
            </div>

            <h3>
                Transaction Activity
            </h3>

            <p>
                Total income and expense transactions recorded.
            </p>

            <div class="insight-value">

                {{ number_format($totalTransactions ?? 0) }}

            </div>

        </div>


        <!-- STUDENT ACTIVITY -->

        <div class="dashboard-card insight-card">

            <div class="insight-icon">
                U
            </div>

            <h3>
                Student Activity
            </h3>

            <p>
                Students who have recorded transactions.
            </p>

            <div class="insight-value">

                {{ number_format($activeUsers ?? 0) }}
                Active

            </div>

        </div>

    </section>


    <!-- =====================================================
         FINANCIAL OVERVIEW
    ====================================================== -->

    <section class="financial-section">

        <div class="dashboard-card-header">

            <h3>
                Financial Overview
            </h3>

            <span>
                {{ now()->format('F Y') }}
            </span>

        </div>


        <div class="budget-grid">


            <!-- MONTHLY INCOME -->

            <div class="dashboard-card">

                <div class="budget-title">
                    Monthly Income
                </div>

                <div class="budget-big">

                    Rs.
                    {{ number_format(
                        $monthlyIncome ?? 0,
                        2
                    ) }}

                </div>

                <div class="budget-note">
                    Total income recorded this month
                </div>

            </div>


            <!-- MONTHLY EXPENSE -->

            <div class="dashboard-card">

                <div class="budget-title">
                    Monthly Expenses
                </div>

                <div class="budget-big">

                    Rs.
                    {{ number_format(
                        $monthlyExpenses ?? 0,
                        2
                    ) }}

                </div>

                <div class="budget-note">
                    Total expenses recorded this month
                </div>

            </div>

        </div>

    </section>


    <!-- =====================================================
         REPORTS
    ====================================================== -->

    <section class="dashboard-card reports-section">

        <div class="dashboard-card-header">

            <h3>
                Reports
            </h3>

            <span>
                Campus Financial Reports
            </span>

        </div>


        <div class="reports-grid">


            <!-- TRANSACTION REPORT -->

            <div class="report-card">

                <div class="report-icon">
                    ▤
                </div>

                <h4>
                    Transaction Report
                </h4>

                <p>
                    Review income and expense transactions.
                </p>

                <a
                    href="{{ url('/admin/reports/transactions') }}"
                    class="dashboard-btn"
                >
                    View Report
                </a>

            </div>


            <!-- BUDGET REPORT -->

            <div class="report-card">

                <div class="report-icon">
                    ₨
                </div>

                <h4>
                    Budget Report
                </h4>

                <p>
                    Review income, expenses and financial activity.
                </p>

                <a
                    href="{{ url('/admin/reports/budget') }}"
                    class="dashboard-btn"
                >
                    View Report
                </a>

            </div>


            <!-- STUDENT REPORT -->

            <div class="report-card">

                <div class="report-icon">
                    U
                </div>

                <h4>
                    Student Report
                </h4>

                <p>
                    View registered student financial activity.
                </p>

                <a
                    href="{{ url('/admin/reports/students') }}"
                    class="dashboard-btn"
                >
                    View Report
                </a>

            </div>


            <!-- MONTHLY REPORT -->

            <div class="report-card">

                <div class="report-icon">
                    ▣
                </div>

                <h4>
                    Monthly Report
                </h4>

                <p>
                    Review monthly campus activity.
                </p>

                <a
                    href="{{ url('/admin/reports/monthly') }}"
                    class="dashboard-btn"
                >
                    View Report
                </a>

            </div>

        </div>

    </section>


    <!-- =====================================================
         BOTTOM GRID
    ====================================================== -->

    <section class="bottom-grid">


        <!-- =================================================
             RECENT TRANSACTIONS
        ================================================== -->

        <div class="dashboard-card">

            <div class="dashboard-card-header">

                <h3>
                    Recent Transactions
                </h3>

                <a
                    href="{{ route('admin.transactions') }}"
                >
                    View All
                </a>

            </div>


            <div class="table-wrapper">

                <table class="dashboard-table">

                    <thead>

                        <tr>

                            <th>
                                Student
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Type
                            </th>

                            <th>
                                Amount
                            </th>

                            <th>
                                Date
                            </th>

                        </tr>

                    </thead>


                    <tbody id="activityRows">

                        @forelse(
                            ($recentTransactions ?? [])
                            as $transaction
                        )

                            <tr>

                                <td>
                                    {{ $transaction->user->name ?? 'Unknown' }}
                                </td>

                                <td>
                                    {{ $transaction->category->name ?? 'Uncategorized' }}
                                </td>

                                <td>

                                    @if(
                                        $transaction->type === 'income'
                                    )

                                        <span class="dashboard-badge dashboard-income">
                                            Income
                                        </span>

                                    @else

                                        <span class="dashboard-badge dashboard-expense">
                                            Expense
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    Rs.
                                    {{ number_format(
                                        $transaction->amount,
                                        2
                                    ) }}

                                </td>

                                <td>

                                    {{
                                        $transaction->transaction_date
                                        ? $transaction->transaction_date->format('d M Y')
                                        : $transaction->created_at->format('d M Y')
                                    }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    style="
                                        text-align:center;
                                        padding:35px;
                                        color:#526B60;
                                    "
                                >
                                    No transactions recorded yet.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- =================================================
             ANNOUNCEMENTS
        ================================================== -->

        <div class="dashboard-card">

            <!-- HEADER -->

            <div class="dashboard-card-header">

                <h3>
                    Announcements
                </h3>

                <a
                    href="{{ url('/admin/announcements') }}"
                >
                    Manage
                </a>

            </div>


            <!-- ANNOUNCEMENT LIST -->

            <div class="announcement-list">

                @forelse(
                    ($announcements ?? [])
                    as $announcement
                )

                    <div class="announcement">

                        <h4>
                            {{ $announcement->title }}
                        </h4>

                        <p>
                            {{ $announcement->message }}
                        </p>

                        <small>

                            {{
                                $announcement->created_at
                                ? $announcement->created_at->format('d M Y')
                                : ''
                            }}

                        </small>

                    </div>

                @empty

                    <div
                        class="empty-state"
                        style="min-height:140px;"
                    >

                        <span class="empty-icon">
                            !
                        </span>

                        <strong>
                            No announcements yet
                        </strong>

                        <p>
                            Campus announcements will appear here.
                        </p>

                    </div>

                @endforelse

            </div>


            <!-- QUICK ACTIONS -->

            <div class="quick-actions">


                <a
                    href="{{ route('admin.users') }}"
                    class="quick-action"
                >

                    👥

                    <br><br>

                    Manage Users

                </a>


                <a
                    href="{{ route('admin.transactions') }}"
                    class="quick-action"
                >

                    ↔

                    <br><br>

                    Transactions

                </a>


                <a
                    href="{{ url('/admin/announcements/create') }}"
                    class="quick-action"
                >

                    +

                    <br><br>

                    New Announcement

                </a>


            </div>

        </div>

    </section>

</div>


<!-- =========================================================
     CHART.JS
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

/* =========================================================
   STUDENT REGISTRATION CHART
========================================================= */

const monthLabels =
    @json($monthLabels ?? []);

const monthlyUsers =
    @json($monthlyUsers ?? []);

const usersCanvas =
    document.getElementById('usersChart');


if (
    usersCanvas &&
    monthlyUsers.some(
        value => Number(value) > 0
    )
) {

    new Chart(
        usersCanvas,
        {

            type: 'bar',

            data: {

                labels: monthLabels,

                datasets: [

                    {

                        label: 'New Students',

                        data: monthlyUsers,

                        backgroundColor: '#00F59B',

                        borderColor: '#00F59B',

                        borderWidth: 1,

                        borderRadius: 6

                    }

                ]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,


                plugins: {

                    legend: {
                        display: false
                    }

                },


                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0,
                            color: '#718E81'
                        },

                        grid: {
                            color: 'rgba(113,142,129,.10)'
                        }

                    },


                    x: {

                        ticks: {
                            color: '#718E81'
                        },

                        grid: {
                            display: false
                        }

                    }

                }

            }

        }
    );

}


/* =========================================================
   CATEGORY CHART
========================================================= */

const categoryLabels =
    @json($categoryLabels ?? []);

const categoryValues =
    @json($categoryValues ?? []);

const categoryCanvas =
    document.getElementById('categoryChart');


if (
    categoryCanvas &&
    categoryValues.length > 0
) {

    const colors = [

        '#00F59B',
        '#10B981',
        '#0D8F68',
        '#087654',
        '#1A6650',
        '#275F4C',
        '#3D8069',
        '#62A58D'

    ];


    new Chart(
        categoryCanvas,
        {

            type: 'doughnut',

            data: {

                labels: categoryLabels,

                datasets: [

                    {

                        data: categoryValues,

                        backgroundColor:
                            categoryValues.map(
                                (_, index) =>
                                    colors[
                                        index %
                                        colors.length
                                    ]
                            ),

                        borderColor: '#0D1813',

                        borderWidth: 3

                    }

                ]

            },


            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '65%',


                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            color: '#9BB2A7',

                            boxWidth: 10,

                            padding: 12,

                            font: {
                                size: 9
                            }

                        }

                    }

                }

            }

        }
    );

}


/* =========================================================
   DASHBOARD SEARCH
========================================================= */

const search =
    document.getElementById(
        'dashboardSearch'
    );


if (search) {

    search.addEventListener(
        'input',
        function () {

            const value =
                this.value.toLowerCase();


            document
                .querySelectorAll(
                    '#activityRows tr'
                )
                .forEach(
                    row => {

                        row.style.display =
                            row.textContent
                                .toLowerCase()
                                .includes(value)
                                ? ''
                                : 'none';

                    }
                );

        }
    );

}

</script>

@endsection