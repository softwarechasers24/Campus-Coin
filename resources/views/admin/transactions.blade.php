@extends('layouts.admin')

@section('content')

<style>

/* =========================================================
   CAMPUS COIN TRANSACTIONS PAGE
   DARK GREEN + NEON MINT HOME THEME
========================================================= */

.transactions-page {
    width: 100%;
    min-height: 100vh;
    color: #E8F5EF;
    font-family: 'Plus Jakarta Sans', Arial, sans-serif;
}


/* =========================================================
   HEADER
========================================================= */

.transactions-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 25px;
    padding: 22px 24px;

    background:
        linear-gradient(
            145deg,
            rgba(18,35,27,.97),
            rgba(13,24,19,.97)
        );

    border: 1px solid #1A3326;
    border-radius: 14px;

    box-shadow:
        0 12px 35px rgba(0,0,0,.20);
}

.transactions-header h1 {
    margin: 0;
    color: #FFFFFF;
    font-size: 27px;
    font-weight: 800;
    letter-spacing: -.5px;
}

.transactions-header p {
    margin: 7px 0 0;
    color: #718E81;
    font-size: 12px;
}


/* =========================================================
   BUTTONS
========================================================= */

.add-btn,
.save-btn,
.filter-btn {

    border: none;
    background: #00F59B;
    color: #06120C;

    padding: 11px 18px;

    border-radius: 8px;

    cursor: pointer;

    font-size: 11px;
    font-weight: 800;

    transition: .25s ease;

    box-shadow:
        0 0 18px rgba(0,245,155,.08);
}

.add-btn:hover,
.save-btn:hover,
.filter-btn:hover {

    background: #39FFB5;

    color: #06120C;

    transform: translateY(-2px);

    box-shadow:
        0 0 25px rgba(0,245,155,.20);
}


/* =========================================================
   ALERT
========================================================= */

.success {

    background: rgba(0,245,155,.08);

    color: #00F59B;

    padding: 13px 16px;

    border-radius: 9px;

    margin-bottom: 20px;

    border: 1px solid rgba(0,245,155,.20);

    font-size: 12px;

    box-shadow:
        0 5px 20px rgba(0,245,155,.04);
}


/* =========================================================
   ERROR CARD
========================================================= */

.transaction-error-card {

    background: rgba(255,70,70,.06);

    border: 1px solid rgba(255,80,80,.20);

    border-radius: 12px;

    padding: 17px 20px;

    margin-bottom: 20px;
}

.error {

    color: #FF858C;

    font-size: 12px;

    margin: 5px 0;
}


/* =========================================================
   SUMMARY
========================================================= */

.summary {

    display: grid;

    grid-template-columns:
        repeat(3, minmax(0,1fr));

    gap: 18px;

    width: 100%;

    margin-bottom: 20px;
}


.summary-box {

    position: relative;

    overflow: hidden;

    background:
        linear-gradient(
            145deg,
            rgba(18,35,27,.97),
            rgba(13,24,19,.97)
        );

    padding: 21px;

    border-radius: 14px;

    border: 1px solid #0c2016;

    box-shadow:
        0 10px 30px rgba(0,0,0,.18);

    transition: .25s ease;
}

.summary-box:hover {

    transform: translateY(-3px);

    border-color:
        rgba(0,245,155,.25);

    box-shadow:
        0 14px 35px rgba(0,0,0,.25),
        0 0 20px rgba(0,245,155,.04);
}

.summary-box::before {

    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 2px;

    background:
        linear-gradient(
            90deg,
            transparent,
            #00F59B,
            transparent
        );

    opacity: .4;
}

.summary-box h3 {

    font-size: 10px;

    color: #718E81;

    margin-bottom: 10px;

    text-transform: uppercase;

    letter-spacing: .7px;
}

.summary-box strong {

    font-size: 23px;

    font-weight: 800;
}


/* INCOME */

.income-text {

    color: #00F59B;
}


/* EXPENSE */

.expense-text {

    color: #FF858C;
}


/* BALANCE */

.balance-text {

    color: #10B981;
}


/* =========================================================
   GENERAL CARD
========================================================= */

.transaction-card {

    background:
        linear-gradient(
            145deg,
            rgba(18,35,27,.97),
            rgba(13,24,19,.97)
        );

    border: 1px solid #1A3326;

    border-radius: 14px;

    padding: 23px;

    margin-bottom: 20px;

    width: 100%;

    box-shadow:
        0 10px 30px rgba(0,0,0,.18);
}


/* =========================================================
   CARD HEADINGS
========================================================= */

.transaction-card h2 {

    margin: 0 0 20px;

    color: #FFFFFF;

    font-size: 17px;

    font-weight: 700;
}

.transaction-card-header {

    display: flex;

    justify-content: space-between;

    align-items: center;

    gap: 15px;

    margin-bottom: 20px;
}

.transaction-card-header h2 {

    margin: 0;
}

.transaction-count {

    color: #718E81;

    font-size: 10px;

    padding: 7px 11px;

    border-radius: 20px;

    background: rgba(0,245,155,.06);

    border: 1px solid rgba(0,245,155,.12);
}


/* =========================================================
   FORM
========================================================= */

.form-grid {

    display: grid;

    grid-template-columns:
        1fr 1fr;

    gap: 17px;
}


.form-group {

    display: flex;

    flex-direction: column;

    gap: 7px;
}


.full {

    grid-column: 1 / -1;
}


.form-group label {

    font-size: 10px;

    font-weight: 700;

    color: #9BB2A7;

    text-transform: uppercase;

    letter-spacing: .4px;
}


.form-group input,
.form-group select,
.form-group textarea {

    width: 100%;

    padding: 11px 13px;

    background: #080E0B;

    color: #E8F5EF;

    border: 1px solid #1A3326;

    border-radius: 8px;

    outline: none;

    font-size: 12px;

    transition: .2s ease;
}


.form-group input::placeholder,
.form-group textarea::placeholder {

    color: #526B60;
}


.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {

    border-color: rgba(0,245,155,.55);

    box-shadow:
        0 0 0 3px rgba(0,245,155,.07);
}


.form-group select option {

    background: #0D1813;

    color: #E8F5EF;
}


.form-group textarea {

    min-height: 90px;

    resize: vertical;
}


/* =========================================================
   FILTERS
========================================================= */

.filters {

    display: grid;

    grid-template-columns:
        1fr 1fr 1fr auto;

    gap: 13px;

    align-items: end;
}


/* =========================================================
   TABLE
========================================================= */

.table-wrapper {

    overflow-x: auto;

    width: 100%;
}


.table-wrapper::-webkit-scrollbar {

    height: 7px;
}

.table-wrapper::-webkit-scrollbar-track {

    background: #080E0B;
}

.table-wrapper::-webkit-scrollbar-thumb {

    background: #1A3326;

    border-radius: 20px;
}

.table-wrapper::-webkit-scrollbar-thumb:hover {

    background: #00F59B;
}


.transactions-table {

    width: 100%;

    border-collapse: collapse;

    min-width: 760px;
}


.transactions-table th {

    background: #12231B;

    color: #8FAEA0;

    padding: 13px;

    text-align: left;

    font-size: 9px;

    font-weight: 700;

    text-transform: uppercase;

    letter-spacing: .6px;

    border-bottom: 1px solid #1A3326;

    white-space: nowrap;
}


.transactions-table td {

    padding: 14px 13px;

    border-bottom:
        1px solid rgba(26,51,38,.75);

    text-align: left;

    font-size: 11px;

    color: #B7CEC3;

    white-space: nowrap;
}


.transactions-table tbody tr {

    transition: .2s ease;
}


.transactions-table tbody tr:hover {

    background:
        rgba(0,245,155,.025);
}


/* =========================================================
   TYPE
========================================================= */

.income {

    color: #00F59B !important;

    font-weight: 700;
}


.expense {

    color: #FF858C !important;

    font-weight: 700;
}


/* =========================================================
   TYPE BADGES
========================================================= */

.transaction-type {

    display: inline-flex;

    align-items: center;

    padding: 5px 9px;

    border-radius: 20px;

    font-size: 9px;

    font-weight: 700;
}


.transaction-income {

    color: #00F59B;

    background:
        rgba(0,245,155,.08);

    border:
        1px solid rgba(0,245,155,.15);
}


.transaction-expense {

    color: #FF858C;

    background:
        rgba(255,80,90,.08);

    border:
        1px solid rgba(255,80,90,.14);
}


/* =========================================================
   ACTIONS
========================================================= */

.action {

    display: inline-block;

    padding: 6px 10px;

    border-radius: 6px;

    text-decoration: none;

    font-size: 10px;

    font-weight: 700;

    margin-right: 4px;

    transition: .2s ease;
}


.edit {

    background:
        rgba(0,245,155,.08);

    color: #00F59B;

    border:
        1px solid rgba(0,245,155,.14);
}


.edit:hover {

    background:
        rgba(0,245,155,.14);

    color: #39FFB5;

    transform: translateY(-1px);
}


.delete {

    background:
        rgba(255,70,70,.08);

    color: #FF858C;

    border:
        1px solid rgba(255,80,80,.15);

    cursor: pointer;
}


.delete:hover {

    background:
        rgba(255,70,70,.15);

    border-color:
        rgba(255,80,80,.30);

    transform: translateY(-1px);
}


/* =========================================================
   EMPTY STATE
========================================================= */

.transaction-empty {

    text-align: center !important;

    padding: 45px !important;

    color: #718E81 !important;
}


.transaction-empty-icon {

    font-size: 28px;

    color: #00F59B;

    opacity: .45;

    margin-bottom: 8px;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 1000px) {

    .summary {

        grid-template-columns:
            repeat(2, minmax(0,1fr));
    }

    .filters {

        grid-template-columns:
            repeat(2, minmax(0,1fr));
    }

}


@media(max-width: 800px) {

    .transactions-header {

        flex-direction: column;

        align-items: flex-start;
    }

    .summary {

        grid-template-columns: 1fr;
    }

    .form-grid {

        grid-template-columns: 1fr;
    }

    .full {

        grid-column: auto;
    }

    .filters {

        grid-template-columns: 1fr;
    }

    .add-btn {

        width: 100%;
    }

}


@media(max-width: 550px) {

    .transactions-header {

        padding: 18px;
    }

    .transactions-header h1 {

        font-size: 23px;
    }

    .transaction-card {

        padding: 17px;
    }

    .transaction-card-header {

        flex-direction: column;

        align-items: flex-start;
    }

}

</style>


<div class="transactions-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="transactions-header">

        <div>

            <h1>
                Transactions
            </h1>

            <p>
                Manage student income and expenses.
            </p>

        </div>


        <button
            class="add-btn"
            onclick="document.getElementById('transactionForm').scrollIntoView({behavior:'smooth'})">

            + Add Transaction

        </button>

    </div>


    <!-- =====================================================
         SUCCESS
    ====================================================== -->

    @if(session('success'))

        <div class="success">

            ✓ {{ session('success') }}

        </div>

    @endif


    <!-- =====================================================
         ERRORS
    ====================================================== -->

    @if($errors->any())

        <div class="transaction-error-card">

            @foreach($errors->all() as $error)

                <div class="error">
                    • {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    <!-- =====================================================
         SUMMARY
    ====================================================== -->

    <div class="summary">


        <!-- TOTAL INCOME -->

        <div class="summary-box">

            <h3>
                Total Income
            </h3>

            <strong class="income-text">

                Rs.
                {{ number_format($totalIncome, 2) }}

            </strong>

        </div>


        <!-- TOTAL EXPENSE -->

        <div class="summary-box">

            <h3>
                Total Expense
            </h3>

            <strong class="expense-text">

                Rs.
                {{ number_format($totalExpense, 2) }}

            </strong>

        </div>


        <!-- BALANCE -->

        <div class="summary-box">

            <h3>
                Balance
            </h3>

            <strong class="balance-text">

                Rs.
                {{ number_format($balance, 2) }}

            </strong>

        </div>


    </div>


    <!-- =====================================================
         ADD / EDIT TRANSACTION
    ====================================================== -->

    <div class="transaction-card" id="transactionForm">


        @isset($transaction)


            <h2>
                Edit Transaction
            </h2>


            <form
                method="POST"
                action="{{ route('admin.transactions.update', $transaction->id) }}">

                @csrf

                @method('PUT')


        @else


            <h2>
                Add Transaction
            </h2>


            <form
                method="POST"
              action="{{ url('/admin/transactions/store') }}">

                @csrf


        @endisset


                <div class="form-grid">


                    <!-- AMOUNT -->

                    <div class="form-group">

                        <label>
                            Amount (Rs.)
                        </label>

                        <input
                            type="number"
                            name="amount"
                            step="0.01"
                            min="0.01"
                            required
                            value="{{ old('amount', isset($transaction) ? $transaction->amount : '') }}"
                            placeholder="Enter amount">

                    </div>


                    <!-- TYPE -->

                    <div class="form-group">

                        <label>
                            Type
                        </label>

                        <select
                            name="type"
                            required>

                            <option
                                value="income"
                                {{ old('type', isset($transaction) ? $transaction->type : '') == 'income' ? 'selected' : '' }}>

                                Income

                            </option>


                            <option
                                value="expense"
                                {{ old('type', isset($transaction) ? $transaction->type : '') == 'expense' ? 'selected' : '' }}>

                                Expense

                            </option>

                        </select>

                    </div>


                    <!-- CATEGORY -->

                    <div class="form-group">

                        <label>
                            Category
                        </label>


                        <select
                            name="category_id"
                            required>


                            <option value="">
                                Select Category
                            </option>


                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', isset($transaction) ? $transaction->category_id : '') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach


                        </select>

                    </div>


                    <!-- DATE -->

                    <div class="form-group">

                        <label>
                            Date
                        </label>


                        <input
                            type="date"
                            name="date"
                            required
                            value="{{ old('date', isset($transaction) && $transaction->transaction_date ? \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d') : date('Y-m-d')) }}">

                    </div>


                    <!-- RECURRING -->

                    <div class="form-group">

                        <label>
                            Recurring?
                        </label>


                        <select
                            name="is_recurring">

                            <option value="0">
                                No
                            </option>


                            <option
                                value="1"
                                {{ old('is_recurring', isset($transaction) ? $transaction->is_recurring : 0) ? 'selected' : '' }}>

                                Yes

                            </option>

                        </select>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="form-group full">

                        <label>
                            Description
                        </label>


                        <textarea
                            name="description"
                            placeholder="Enter transaction description">{{ old('description', isset($transaction) ? $transaction->description : '') }}</textarea>

                    </div>


                </div>


                <button
                    type="submit"
                    class="save-btn"
                    style="margin-top:20px;">

                    {{ isset($transaction) ? 'Update Transaction' : 'Save Transaction' }}

                </button>


            </form>


    </div>


    <!-- =====================================================
         FILTERS
    ====================================================== -->

    <div class="transaction-card">


        <form
            method="GET"
            action="{{ route('admin.transactions') }}">


            <div class="filters">


                <!-- DATE RANGE -->

                <div class="form-group">

                    <label>
                        Date Range
                    </label>


                    <select name="date_range">


                        <option value="">
                            All Dates
                        </option>


                        <option
                            value="today"
                            {{ request('date_range') == 'today' ? 'selected' : '' }}>

                            Today

                        </option>


                        <option
                            value="week"
                            {{ request('date_range') == 'week' ? 'selected' : '' }}>

                            This Week

                        </option>


                        <option
                            value="month"
                            {{ request('date_range') == 'month' ? 'selected' : '' }}>

                            This Month

                        </option>


                    </select>

                </div>


                <!-- CATEGORY -->

                <div class="form-group">

                    <label>
                        Category
                    </label>


                    <select name="category_id">


                        <option value="">
                            All Categories
                        </option>


                        @foreach($categories as $category)


                            <option
                                value="{{ $category->id }}"
                                {{ request('category_id') == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>


                        @endforeach


                    </select>

                </div>


                <!-- TYPE -->

                <div class="form-group">

                    <label>
                        Type
                    </label>


                    <select name="type">


                        <option value="">
                            All Types
                        </option>


                        <option
                            value="income"
                            {{ request('type') == 'income' ? 'selected' : '' }}>

                            Income

                        </option>


                        <option
                            value="expense"
                            {{ request('type') == 'expense' ? 'selected' : '' }}>

                            Expense

                        </option>


                    </select>

                </div>


                <!-- SEARCH -->

                <button
                    type="submit"
                    class="filter-btn">

                    Search

                </button>


            </div>


        </form>


    </div>


    <!-- =====================================================
         TRANSACTIONS TABLE
    ====================================================== -->

    <div class="transaction-card">


        <div class="transaction-card-header">

            <h2>
                Recent Transactions
            </h2>


            <span class="transaction-count">

                {{ $transactions->count() }}
                Transactions

            </span>

        </div>


        <div class="table-wrapper">


            <table class="transactions-table">


                <thead>

                    <tr>

                        <th>
                            Date
                        </th>

                        <th>
                            Description
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
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>


                @forelse($transactions as $item)


                    <tr>


                        <!-- DATE -->

                        <td>

                            {{
                                $item->transaction_date
                                ? \Carbon\Carbon::parse(
                                    $item->transaction_date
                                )->format('d M Y')
                                : '-'
                            }}

                        </td>


                        <!-- DESCRIPTION -->

                        <td>

                            {{ $item->description ?: 'No Description' }}

                        </td>


                        <!-- CATEGORY -->

                        <td>

                            {{ $item->category->name ?? 'No Category' }}

                        </td>


                        <!-- TYPE -->

                        <td>

                            @if($item->type === 'income')

                                <span class="transaction-type transaction-income">
                                    Income
                                </span>

                            @else

                                <span class="transaction-type transaction-expense">
                                    Expense
                                </span>

                            @endif

                        </td>


                        <!-- AMOUNT -->

                        <td
                            class="{{ $item->type }}">

                            @if($item->type === 'income')

                                + Rs.
                                {{ number_format($item->amount, 2) }}

                            @else

                                - Rs.
                                {{ number_format($item->amount, 2) }}

                            @endif

                        </td>


                        <!-- ACTION -->

                        <td>


                            <a
                                class="action edit"
                                href="{{ route('admin.transactions.edit', $item->id) }}">

                                Edit

                            </a>


                            <form
                                method="POST"
                                action="{{ route('admin.transactions.destroy', $item->id) }}"
                                style="display:inline;">

                                @csrf

                                @method('DELETE')


                                <button
                                    class="action delete"
                                    type="submit"
                                    onclick="return confirm('Delete this transaction?')">

                                    Delete

                                </button>

                            </form>


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="6"
                            class="transaction-empty">

                            <div class="transaction-empty-icon">
                                ↔
                            </div>

                            No transactions found.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>

@endsection
