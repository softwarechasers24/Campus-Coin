@extends('layouts.admin')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .budget-page {
        min-height: 100vh;
        width: 100%;
        padding: 26px 30px 50px;
        color: #f2fff9;
        background:
            radial-gradient(
                circle at 85% 0%,
                rgba(0, 245, 160, 0.07),
                transparent 28%
            ),
            #061b13;
    }

    /* ================= TOP BAR ================= */

    .budget-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 30px;
    }

    .budget-search {
        width: 320px;
        max-width: 100%;
        padding: 12px 15px;
        border-radius: 10px;
        border: 1px solid #164936;
        background: #071f16;
        color: #eafff6;
        outline: none;
        font-size: 12px;
    }

    .budget-search::placeholder {
        color: #4f7164;
    }

    .budget-search:focus {
        border-color: #00e89a;
        box-shadow: 0 0 0 3px rgba(0, 245, 160, 0.07);
    }

    .budget-top-right {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .online-status {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #719287;
        font-size: 11px;
    }

    .online-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #00f5a0;
        box-shadow: 0 0 12px rgba(0, 245, 160, 0.8);
    }

    .admin-profile {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: #00e89a;
        color: #032016;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
    }

    /* ================= HEADER ================= */

    .budget-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 25px;
    }

    .budget-header h1 {
        margin: 0;
        font-size: 30px;
        line-height: 1.2;
        font-weight: 800;
        color: #ffffff;
    }

    .budget-header h1 span {
        color: #00f5a0;
    }

    .budget-header p {
        margin: 8px 0 0;
        color: #6f8c81;
        font-size: 13px;
    }

    .month-select {
        padding: 11px 13px;
        border-radius: 9px;
        border: 1px solid #164936;
        background: #09251b;
        color: #b8d1c7;
        outline: none;
        font-size: 11px;
    }

    .month-select:focus {
        border-color: #00e89a;
    }

    /* ================= ALERT ================= */

    .budget-alert {
        padding: 13px 16px;
        border-radius: 11px;
        margin-bottom: 20px;
        font-size: 12px;
        border: 1px solid;
    }

    .budget-alert.success {
        color: #8dffd3;
        background: rgba(0, 245, 160, 0.07);
        border-color: rgba(0, 245, 160, 0.22);
    }

    .budget-alert.error {
        color: #ff9b9b;
        background: rgba(255, 70, 70, 0.07);
        border-color: rgba(255, 70, 70, 0.22);
    }

    .budget-alert div {
        margin: 3px 0;
    }

    /* ================= SUMMARY ================= */

    .budget-summary {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }

    .summary-card {
        position: relative;
        overflow: hidden;
        min-height: 135px;
        padding: 20px;
        border-radius: 15px;
        border: 1px solid #164936;
        background: linear-gradient(
            145deg,
            #0b281e,
            #081f17
        );
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .summary-card::after {
        content: "";
        position: absolute;
        width: 100px;
        height: 100px;
        right: -40px;
        top: -40px;
        border-radius: 50%;
        background: rgba(0, 245, 160, 0.05);
    }

    .summary-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: rgba(0, 245, 160, 0.08);
        border: 1px solid rgba(0, 245, 160, 0.20);
        color: #00f5a0;
        font-size: 17px;
        margin-bottom: 13px;
    }

    .summary-title {
        color: #6f8d81;
        font-size: 11px;
        margin-bottom: 6px;
    }

    .summary-value {
        color: #ffffff;
        font-size: 25px;
        font-weight: 800;
    }

    .summary-value.positive {
        color: #00e89a;
    }

    .summary-value.warning {
        color: #ffad58;
    }

    .summary-sub {
        margin-top: 7px;
        color: #547268;
        font-size: 10px;
    }

    .summary-sub.positive {
        color: #00d991;
    }

    .summary-sub.warning {
        color: #f0a54b;
    }

    /* ================= CONTENT ================= */

    .budget-content {
        display: grid;
        grid-template-columns: minmax(0, 1.65fr) minmax(290px, 1fr);
        gap: 20px;
        align-items: start;
    }

    .budget-panel {
        background: #09231a;
        border: 1px solid #164936;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .panel-header {
        padding: 20px 21px;
        border-bottom: 1px solid #123d2d;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .panel-header-left h2 {
        margin: 0;
        color: #ffffff;
        font-size: 17px;
        font-weight: 750;
    }

    .panel-header-left h2 span {
        color: #00f5a0;
    }

    .panel-header-left p {
        margin: 5px 0 0;
        color: #58786c;
        font-size: 11px;
    }

    .panel-month {
        color: #638277;
        font-size: 11px;
        white-space: nowrap;
    }

    .panel-body {
        padding: 21px;
    }

    /* ================= BUDGET ITEM ================= */

    .budget-item {
        padding: 17px 0;
        border-bottom: 1px solid #12392c;
    }

    .budget-item:first-child {
        padding-top: 0;
    }

    .budget-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .budget-item-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 10px;
    }

    .category-info {
        display: flex;
        align-items: center;
        gap: 11px;
        min-width: 0;
    }

    .category-icon {
        width: 38px;
        height: 38px;
        flex: 0 0 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: rgba(0, 245, 160, 0.07);
        border: 1px solid rgba(0, 245, 160, 0.16);
        font-size: 16px;
    }

    .category-name {
        color: #e9fff6;
        font-size: 13px;
        font-weight: 700;
        word-break: break-word;
    }

    .category-status {
        margin-top: 3px;
        color: #56766a;
        font-size: 9px;
    }

    .budget-amount {
        text-align: right;
        white-space: nowrap;
        color: #617f73;
        font-size: 10px;
    }

    .budget-amount strong {
        color: #d9eee5;
        font-size: 11px;
    }

    /* ================= PROGRESS ================= */

    .progress-row {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .progress-track {
        flex: 1;
        height: 8px;
        border-radius: 20px;
        overflow: hidden;
        background: #102f24;
        border: 1px solid #143d2d;
    }

    .progress-fill {
        height: 100%;
        border-radius: 20px;
        background: #00e89a;
        box-shadow: 0 0 10px rgba(0, 245, 160, 0.15);
    }

    .progress-fill.warning {
        background: #f0a34c;
    }

    .progress-fill.danger {
        background: #f05d61;
    }

    .percentage {
        width: 38px;
        text-align: right;
        color: #77968a;
        font-size: 10px;
        font-weight: 700;
    }

    .remaining-row {
        margin-top: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        color: #547268;
        font-size: 10px;
    }

    .remaining-row strong {
        color: #00d991;
    }

    .remaining-row.over strong {
        color: #f46c6c;
    }

    /* ================= ACTIONS ================= */

    .budget-actions {
        display: flex;
        gap: 7px;
        margin-top: 11px;
    }

    .edit-btn,
    .delete-btn {
        border-radius: 7px;
        padding: 7px 11px;
        font-size: 10px;
        font-weight: 700;
        cursor: pointer;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .edit-btn {
        color: #00e89a;
        background: rgba(0, 245, 160, 0.07);
        border: 1px solid rgba(0, 245, 160, 0.17);
    }

    .edit-btn:hover {
        color: #57ffc6;
        background: rgba(0, 245, 160, 0.13);
    }

    .delete-btn {
        color: #ff8585;
        background: rgba(255, 75, 75, 0.06);
        border: 1px solid rgba(255, 75, 75, 0.18);
    }

    .delete-btn:hover {
        color: #ffaaaa;
        background: rgba(255, 75, 75, 0.12);
    }

    /* ================= EMPTY ================= */

    .empty-budget {
        text-align: center;
        padding: 55px 20px;
        border: 1px dashed #1a4938;
        border-radius: 12px;
        background: #071d15;
    }

    .empty-icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: rgba(0, 245, 160, 0.06);
        border: 1px solid rgba(0, 245, 160, 0.15);
        font-size: 21px;
    }

    .empty-budget h3 {
        margin: 0 0 6px;
        color: #d9eee5;
        font-size: 14px;
    }

    .empty-budget p {
        margin: 0;
        color: #58776b;
        font-size: 11px;
    }

    /* ================= INSIGHTS ================= */

    .insight-heading {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 19px;
    }

    .insight-icon {
        width: 39px;
        height: 39px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 11px;
        background: rgba(0, 245, 160, 0.08);
        border: 1px solid rgba(0, 245, 160, 0.19);
        color: #00f5a0;
        font-size: 17px;
        font-weight: 800;
    }

    .insight-heading h2 {
        margin: 0;
        color: #ffffff;
        font-size: 16px;
    }

    .insight-heading p {
        margin: 4px 0 0;
        color: #5d7b70;
        font-size: 10px;
    }

    .insight-message {
        padding: 14px;
        margin-bottom: 13px;
        border-radius: 11px;
        background: rgba(0, 245, 160, 0.055);
        border: 1px solid rgba(0, 245, 160, 0.14);
    }

    .insight-message strong {
        display: block;
        margin-bottom: 6px;
        color: #00e89a;
        font-size: 11px;
    }

    .insight-message p {
        margin: 0;
        color: #718e83;
        font-size: 10px;
        line-height: 1.6;
    }

    .insight-item {
        padding: 13px 0;
        border-bottom: 1px solid #12392c;
    }

    .insight-item:last-of-type {
        border-bottom: none;
    }

    .insight-item h4 {
        margin: 0 0 5px;
        color: #c9e2d8;
        font-size: 10px;
    }

    .insight-item p {
        margin: 0;
        color: #668277;
        font-size: 9px;
        line-height: 1.55;
    }

    .set-budget-btn {
        width: 100%;
        margin-top: 18px;
        padding: 12px;
        border: none;
        border-radius: 9px;
        background: #00e89a;
        color: #032016;
        font-size: 11px;
        font-weight: 800;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .set-budget-btn:hover {
        background: #00ffad;
        box-shadow: 0 8px 22px rgba(0, 245, 160, 0.12);
        transform: translateY(-1px);
    }

    /* ================= MODAL ================= */

    .budget-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(1, 15, 10, 0.78);
        backdrop-filter: blur(5px);
    }

    .budget-modal.show {
        display: flex;
    }

    .modal-box {
        width: 430px;
        max-width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        padding: 23px;
        border-radius: 16px;
        background: #09251b;
        border: 1px solid #1a503c;
        box-shadow: 0 25px 70px rgba(0, 0, 0, 0.4);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .modal-header h2 {
        margin: 0;
        color: #ffffff;
        font-size: 18px;
    }

    .modal-header h2 span {
        color: #00f5a0;
    }

    .modal-close {
        width: 32px;
        height: 32px;
        border: 1px solid #194936;
        border-radius: 8px;
        background: #071d15;
        color: #78988c;
        cursor: pointer;
        font-size: 19px;
    }

    .modal-close:hover {
        color: #ffffff;
        border-color: #00d991;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #8ca99e;
        font-size: 10px;
        font-weight: 700;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 11px 12px;
        border-radius: 9px;
        border: 1px solid #194936;
        background: #071d15;
        color: #ecfff7;
        outline: none;
        font-size: 11px;
    }

    .form-group input::placeholder {
        color: #4d6c60;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #00e89a;
        box-shadow: 0 0 0 3px rgba(0, 245, 160, 0.06);
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 20px;
    }

    .cancel-btn,
    .save-budget-btn {
        padding: 10px 18px;
        border-radius: 8px;
        font-size: 10px;
        font-weight: 700;
        cursor: pointer;
    }

    .cancel-btn {
        background: #071d15;
        border: 1px solid #1a4938;
        color: #769187;
    }

    .save-budget-btn {
        background: #00e89a;
        border: none;
        color: #032016;
    }

    .save-budget-btn:hover {
        background: #00ffad;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 1050px) {
        .budget-content {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 800px) {
        .budget-page {
            padding: 20px;
        }

        .budget-summary {
            grid-template-columns: 1fr;
        }

        .budget-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .budget-topbar {
            flex-wrap: wrap;
        }
    }

    @media (max-width: 550px) {
        .budget-page {
            padding: 15px;
        }

        .budget-header h1 {
            font-size: 25px;
        }

        .budget-search {
            width: 100%;
        }

        .budget-topbar {
            align-items: stretch;
            flex-direction: column;
        }

        .budget-top-right {
            justify-content: flex-end;
        }

        .panel-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .budget-item-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .budget-amount {
            text-align: left;
        }

        .remaining-row {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>


<div class="budget-page">

    <!-- TOP BAR -->
    <div class="budget-topbar">

        <input
            type="text"
            class="budget-search"
            placeholder="Search budget..."
        >

        <div class="budget-top-right">

            <div class="online-status">
                <span class="online-dot"></span>
                Admin
            </div>

            <div class="admin-profile">
                S
            </div>

        </div>

    </div>


    <!-- ALERTS -->

    @if(session('success'))

        <div class="budget-alert success">
            {{ session('success') }}
        </div>

    @endif


    @if($errors->any())

        <div class="budget-alert error">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    <!-- HEADER -->

    <div class="budget-header">

        <div>

            <h1>
                Monthly <span>Budget</span>
            </h1>

            <p>
                Track spending patterns and manage monthly budgets.
            </p>

        </div>


        <form
            method="GET"
            action="{{ route('admin.budget') }}"
        >

            <input
                type="month"
                name="month"
                class="month-select"
                value="{{ request('month', date('Y-m')) }}"
                onchange="this.form.submit()"
            >

        </form>

    </div>


    <!-- SUMMARY -->

    <div class="budget-summary">

        <div class="summary-card">

            <div class="summary-icon">
                ₨
            </div>

            <div class="summary-title">
                Total Budget
            </div>

            <div class="summary-value">
                Rs. {{ number_format($totalBudget ?? 0, 0) }}
            </div>

            <div class="summary-sub">
                Monthly spending limit
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon">
                ↗
            </div>

            <div class="summary-title">
                Total Spent
            </div>

            <div class="summary-value">
                Rs. {{ number_format($totalSpent ?? 0, 0) }}
            </div>

            <div class="summary-sub {{ ($percentage ?? 0) >= 80 ? 'warning' : 'positive' }}">
                {{ $percentage ?? 0 }}% of budget used
            </div>

        </div>


        <div class="summary-card">

            <div class="summary-icon">
                ✓
            </div>

            <div class="summary-title">
                Remaining
            </div>

            <div class="summary-value {{ ($remaining ?? 0) >= 0 ? 'positive' : 'warning' }}">
                Rs. {{ number_format(abs($remaining ?? 0), 0) }}
            </div>

            <div class="summary-sub {{ ($remaining ?? 0) >= 0 ? 'positive' : 'warning' }}">

                {{ ($remaining ?? 0) >= 0
                    ? 'Available for this month'
                    : 'Over total budget'
                }}

            </div>

        </div>

    </div>


    <!-- MAIN CONTENT -->

    <div class="budget-content">

        <!-- CATEGORY BUDGETS -->

        <div class="budget-panel">

            <div class="panel-header">

                <div class="panel-header-left">

                    <h2>
                        Budget by <span>Category</span>
                    </h2>

                    <p>
                        Monitor spending against each category
                    </p>

                </div>

                <div class="panel-month">

                    {{ \Carbon\Carbon::createFromFormat(
                        'Y-m',
                        request('month', date('Y-m'))
                    )->format('F Y') }}

                </div>

            </div>


            <div class="panel-body">

                @forelse(($budgets ?? collect()) as $budget)

                    @php

                        $amount = (float) $budget->amount;

                        $spent = (float) ($budget->spent ?? 0);

                        $percent = $amount > 0
                            ? round(($spent / $amount) * 100)
                            : 0;

                        $barWidth = min(max($percent, 0), 100);

                        $remainingCategory = $amount - $spent;

                        /*
                        |----------------------------------------------------------
                        | CATEGORY NAME
                        |----------------------------------------------------------
                        */

                        $categoryName = is_object($budget->category)
                            ? ($budget->category->name ?? 'Uncategorized')
                            : ($budget->category ?? 'Uncategorized');

                        /*
                        |----------------------------------------------------------
                        | ICON
                        |----------------------------------------------------------
                        */

                        $icon = match(strtolower(trim($categoryName))) {

                            'food' => '🍴',

                            'transport' => '🚌',

                            'hostel / rent',
                            'hostel',
                            'rent' => '🏠',

                            'academics',
                            'academic' => '📚',

                            'entertainment' => '🎮',

                            default => '•••',

                        };

                        $barClass = '';

                        if($percent >= 100) {

                            $barClass = 'danger';

                        } elseif($percent >= 80) {

                            $barClass = 'warning';

                        }

                    @endphp


                    <div class="budget-item">

                        <div class="budget-item-top">

                            <div class="category-info">

                                <div class="category-icon">
                                    {{ $icon }}
                                </div>

                                <div>

                                    <div class="category-name">
                                        {{ $categoryName }}
                                    </div>

                                    <div class="category-status">

                                        @if($percent >= 100)

                                            Over budget

                                        @elseif($percent >= 80)

                                            Almost at limit

                                        @else

                                            Within budget

                                        @endif

                                    </div>

                                </div>

                            </div>


                            <div class="budget-amount">

                                <strong>
                                    Rs. {{ number_format($spent, 0) }}
                                </strong>

                                /

                                Rs. {{ number_format($amount, 0) }}

                            </div>

                        </div>


                        <div class="progress-row">

                            <div class="progress-track">

                                <div
                                    class="progress-fill {{ $barClass }}"
                                    style="width: {{ $barWidth }}%;"
                                ></div>

                            </div>

                            <div class="percentage">
                                {{ $percent }}%
                            </div>

                        </div>


                        <div class="remaining-row {{ $remainingCategory < 0 ? 'over' : '' }}">

                            <span>

                                @if($remainingCategory >= 0)

                                    Remaining

                                @else

                                    Over budget

                                @endif

                            </span>

                            <strong>

                                Rs. {{ number_format(
                                    abs($remainingCategory),
                                    0
                                ) }}

                            </strong>

                        </div>


                        <div class="budget-actions">

                            <a
                                href="{{ route('admin.budget.edit', $budget->id) }}"
                                class="edit-btn"
                            >
                                ✎ Edit
                            </a>


                            <form
                                action="{{ route('admin.budget.delete', $budget->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this budget?');"
                                style="display:inline;"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="delete-btn"
                                >
                                    🗑 Delete
                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="empty-budget">

                        <div class="empty-icon">
                            ₨
                        </div>

                        <h3>
                            No budget added yet
                        </h3>

                        <p>
                            Add your first monthly budget to start tracking spending.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        <!-- INSIGHTS -->

        <div class="budget-panel">

            <div class="panel-body">

                <div class="insight-heading">

                    <div class="insight-icon">
                        i
                    </div>

                    <div>

                        <h2>
                            Budget Insights
                        </h2>

                        <p>
                            Smart suggestions from your spending
                        </p>

                    </div>

                </div>


                @if(($totalBudget ?? 0) > 0)

                    <div class="insight-message">

                        @if(($percentage ?? 0) < 80)

                            <strong>
                                ✓ Good progress
                            </strong>

                            <p>

                                You have used {{ $percentage }}%
                                of your monthly budget.

                                Rs. {{ number_format(
                                    max($remaining, 0),
                                    0
                                ) }}

                                is still available.

                            </p>

                        @elseif(($percentage ?? 0) < 100)

                            <strong>
                                ⚠ Budget is getting close
                            </strong>

                            <p>

                                You have used {{ $percentage }}%
                                of your monthly budget.

                                Rs. {{ number_format(
                                    max($remaining, 0),
                                    0
                                ) }}

                                remains.

                            </p>

                        @else

                            <strong>
                                ! Budget limit reached
                            </strong>

                            <p>
                                Your spending has reached or exceeded
                                the total monthly budget.
                            </p>

                        @endif

                    </div>


                    @foreach(($budgets ?? collect()) as $budget)

                        @php

                            $amount = (float) $budget->amount;

                            $spent = (float) ($budget->spent ?? 0);

                            $percent = $amount > 0
                                ? round(($spent / $amount) * 100)
                                : 0;

                            $remainingCategory = $amount - $spent;

                            $categoryName = is_object($budget->category)
                                ? ($budget->category->name ?? 'Uncategorized')
                                : ($budget->category ?? 'Uncategorized');

                        @endphp


                        @if($percent >= 100)

                            <div class="insight-item">

                                <h4>
                                    ! {{ $categoryName }} is over budget
                                </h4>

                                <p>

                                    Your
                                    {{ strtolower($categoryName) }}
                                    spending is

                                    Rs. {{ number_format(
                                        abs($remainingCategory),
                                        0
                                    ) }}

                                    above the planned limit.

                                </p>

                            </div>

                        @elseif($percent >= 80)

                            <div class="insight-item">

                                <h4>
                                    ⚠ {{ $categoryName }} is almost full
                                </h4>

                                <p>

                                    You have used {{ $percent }}%
                                    of your
                                    {{ strtolower($categoryName) }}
                                    budget.

                                    Rs. {{ number_format(
                                        max($remainingCategory, 0),
                                        0
                                    ) }}

                                    remains.

                                </p>

                            </div>

                        @endif

                    @endforeach


                    <div class="insight-item">

                        <h4>
                            ✓ Budget status
                        </h4>

                        <p>

                            Your current budget contains

                            {{ ($budgets ?? collect())->count() }}

                            {{ ($budgets ?? collect())->count() == 1
                                ? 'category'
                                : 'categories'
                            }}

                            for this month.

                        </p>

                    </div>

                @else

                    <div class="insight-message">

                        <strong>
                            No budget data yet
                        </strong>

                        <p>

                            Add your first monthly budget to see
                            spending insights here.

                        </p>

                    </div>

                @endif


                <button
                    type="button"
                    class="set-budget-btn"
                    onclick="openBudgetModal()"
                >
                    + Set New Budget
                </button>

            </div>

        </div>

    </div>

</div>


<!-- ================= NEW BUDGET MODAL ================= -->

<div
    class="budget-modal"
    id="budgetModal"
>

    <div class="modal-box">

        <div class="modal-header">

            <h2>
                Set New <span>Budget</span>
            </h2>

            <button
                type="button"
                class="modal-close"
                onclick="closeBudgetModal()"
            >
                ×
            </button>

        </div>


        <!-- STORE BUDGET -->

        <form
            method="POST"
            action="{{ route('admin.budget.store') }}"
        >

            @csrf


            <!-- CATEGORY -->

            <div class="form-group">

                <label>
                    Category
                </label>

                <input
                    type="text"
                    name="category"
                    placeholder="e.g. Food, Transport, Academics"
                    value="{{ old('category') }}"
                    required
                >

            </div>


            <!-- AMOUNT -->

            <div class="form-group">

                <label>
                    Monthly Budget (Rs.)
                </label>

                <input
                    type="number"
                    name="amount"
                    placeholder="Enter budget amount"
                    value="{{ old('amount') }}"
                    min="0.01"
                    step="0.01"
                    required
                >

            </div>


            <!-- SPENT -->

            <div class="form-group">

                <label>
                    Spent (Rs.)
                </label>

                <input
                    type="number"
                    name="spent"
                    placeholder="Enter spent amount"
                    value="{{ old('spent', 0) }}"
                    min="0"
                    step="0.01"
                >

            </div>


            <!-- MONTH -->

            <div class="form-group">

                <label>
                    Month
                </label>

                <input
                    type="month"
                    name="month"
                    value="{{ old('month', request('month', date('Y-m'))) }}"
                    required
                >

            </div>


            <div class="modal-actions">

                <button
                    type="button"
                    class="cancel-btn"
                    onclick="closeBudgetModal()"
                >
                    Cancel
                </button>


                <!-- IMPORTANT: MUST BE SUBMIT -->

                <button
                    type="submit"
                    class="save-budget-btn"
                >
                    Save Budget
                </button>

            </div>

        </form>

    </div>

</div>


<script>

    function openBudgetModal() {

        document
            .getElementById('budgetModal')
            .classList.add('show');

    }


    function closeBudgetModal() {

        document
            .getElementById('budgetModal')
            .classList.remove('show');

    }


    window.addEventListener('click', function(event) {

        const modal =
            document.getElementById('budgetModal');

        if (event.target === modal) {

            closeBudgetModal();

        }

    });


    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            closeBudgetModal();

        }

    });

</script>

@endsection