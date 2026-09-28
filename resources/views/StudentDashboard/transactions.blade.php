@extends('layouts.student')

@section('title', 'Transactions')

@section('content')

<div style="
    padding:20px;
    color:#E8F5EF;
">

    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div style="
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
        gap:15px;
        flex-wrap:wrap;
    ">

        <div>

            <h1 style="
                margin:0;
                font-size:30px;
                font-weight:800;
            ">
                Transactions
            </h1>

            <p style="
                color:#718E81;
                margin-top:7px;
            ">
                Manage your Campus Coin transactions.
            </p>

        </div>

        <button
            onclick="openAddModal()"
            type="button"
            style="
                border:0;
                background:#00F59B;
                color:#06100B;
                padding:12px 20px;
                border-radius:9px;
                font-weight:800;
                cursor:pointer;
            "
        >
            + Add Transaction
        </button>

    </div>


    <!-- =====================================================
         SUCCESS MESSAGE
    ====================================================== -->

    @if(session('success'))

        <div style="
            background:rgba(0,245,155,.08);
            border:1px solid rgba(0,245,155,.25);
            color:#00F59B;
            padding:14px;
            border-radius:10px;
            margin-bottom:20px;
        ">
            {{ session('success') }}
        </div>

    @endif


    <!-- =====================================================
         ERROR MESSAGE
    ====================================================== -->

    @if($errors->any())

        <div style="
            background:rgba(255,80,80,.08);
            border:1px solid rgba(255,80,80,.25);
            color:#ff7777;
            padding:14px;
            border-radius:10px;
            margin-bottom:20px;
        ">

            @foreach($errors->all() as $error)

                <div>
                    {{ $error }}
                </div>

            @endforeach

        </div>

    @endif


    <!-- =====================================================
         TRANSACTIONS TABLE
    ====================================================== -->

    <div style="
        background:#12231B;
        border:1px solid #1A3326;
        border-radius:15px;
        overflow:hidden;
    ">

        <div style="
            padding:20px;
            border-bottom:1px solid #1A3326;
        ">

            <h2 style="
                margin:0;
                font-size:18px;
            ">
                Recent Transactions
            </h2>

            <p style="
                margin:7px 0 0;
                color:#718E81;
                font-size:13px;
            ">
                {{ $transactions->count() }} transaction(s)
            </p>

        </div>


        @if($transactions->count() > 0)

            <div style="overflow-x:auto;">

                <table style="
                    width:100%;
                    border-collapse:collapse;
                    min-width:900px;
                ">

                    <thead>

                        <tr style="
                            background:#0D1813;
                        ">

                            <th style="
                                padding:15px;
                                text-align:left;
                                color:#718E81;
                            ">
                                Category
                            </th>

                            <th style="
                                padding:15px;
                                text-align:left;
                                color:#718E81;
                            ">
                                Description
                            </th>

                            <th style="
                                padding:15px;
                                text-align:left;
                                color:#718E81;
                            ">
                                Type
                            </th>

                            <th style="
                                padding:15px;
                                text-align:left;
                                color:#718E81;
                            ">
                                Amount
                            </th>

                            <th style="
                                padding:15px;
                                text-align:left;
                                color:#718E81;
                            ">
                                Date
                            </th>

                            <th style="
                                padding:15px;
                                text-align:left;
                                color:#718E81;
                            ">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($transactions as $transaction)

                            <tr style="
                                border-top:1px solid #1A3326;
                            ">

                                <!-- CATEGORY -->

                                <td style="padding:15px;">

                                    <span style="
                                        background:rgba(0,245,155,.08);
                                        color:#00F59B;
                                        padding:6px 10px;
                                        border-radius:7px;
                                        font-size:12px;
                                    ">
                                        {{ $transaction->category->name ?? 'Uncategorized' }}
                                    </span>

                                </td>


                                <!-- DESCRIPTION -->

                                <td style="
                                    padding:15px;
                                    color:#CFE2D8;
                                ">

                                    {{ $transaction->description ?? 'No description' }}

                                </td>


                                <!-- TYPE -->

                                <td style="padding:15px;">

                                    @if($transaction->type === 'income')

                                        <span style="
                                            color:#00F59B;
                                            font-weight:800;
                                        ">
                                            INCOME
                                        </span>

                                    @else

                                        <span style="
                                            color:#ff7777;
                                            font-weight:800;
                                        ">
                                            EXPENSE
                                        </span>

                                    @endif

                                </td>


                                <!-- AMOUNT -->

                                <td style="
                                    padding:15px;
                                    font-weight:800;
                                    color:{{ $transaction->type === 'income' ? '#00F59B' : '#ff7777' }};
                                ">

                                    {{ $transaction->type === 'income' ? '+' : '-' }}

                                    {{ number_format($transaction->amount, 2) }}

                                    CC

                                </td>


                                <!-- DATE -->

                                <td style="
                                    padding:15px;
                                    color:#AFC8BC;
                                    white-space:nowrap;
                                ">

                                    @if($transaction->transaction_date)

                                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}

                                    @elseif($transaction->created_at)

                                        {{ $transaction->created_at->format('d M Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                <!-- ACTION -->

                                <td style="
                                    padding:15px;
                                    white-space:nowrap;
                                ">

                                    <div style="
                                        display:flex;
                                        align-items:center;
                                        gap:12px;
                                    ">

                                        <!-- EDIT -->

                                        <button
                                            type="button"
                                            onclick="openEditModal(
                                                '{{ $transaction->id }}',
                                                '{{ $transaction->category_id }}',
                                                '{{ $transaction->type }}',
                                                '{{ $transaction->amount }}',
                                                '{{ $transaction->transaction_date ? \Carbon\Carbon::parse($transaction->transaction_date)->format('Y-m-d') : '' }}',
                                                @js($transaction->description ?? '')
                                            )"
                                            style="
                                                border:0;
                                                background:none;
                                                color:#00F59B;
                                                cursor:pointer;
                                                font-weight:700;
                                            "
                                        >
                                            Edit
                                        </button>


                                        <!-- DELETE -->

                                        <form
                                            action="{{ route('dashboard.transactions.destroy', $transaction->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Delete this transaction?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                style="
                                                    border:0;
                                                    background:none;
                                                    color:#ff7777;
                                                    cursor:pointer;
                                                    font-weight:700;
                                                "
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div style="
                text-align:center;
                padding:70px 20px;
            ">

                <div style="
                    font-size:45px;
                    margin-bottom:15px;
                ">
                    💰
                </div>

                <h3 style="margin-bottom:8px;">
                    No Transactions Yet
                </h3>

                <p style="color:#718E81;">
                    Add your first Campus Coin transaction.
                </p>

                <button
                    type="button"
                    onclick="openAddModal()"
                    style="
                        margin-top:15px;
                        border:0;
                        background:#00F59B;
                        color:#06100B;
                        padding:11px 18px;
                        border-radius:8px;
                        font-weight:800;
                        cursor:pointer;
                    "
                >
                    + Add Transaction
                </button>

            </div>

        @endif

    </div>

</div>


<!-- =========================================================
     ADD TRANSACTION MODAL
========================================================= -->

<div
    id="transactionModal"
    style="
        display:none;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.75);
        z-index:9999;
        align-items:center;
        justify-content:center;
        padding:20px;
    "
>

    <div style="
        width:100%;
        max-width:500px;
        max-height:90vh;
        overflow-y:auto;
        background:#0D1813;
        border:1px solid #1A3326;
        border-radius:16px;
        padding:25px;
        box-sizing:border-box;
    ">

        <!-- HEADER -->

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        ">

            <h2 style="
                margin:0;
                color:#E8F5EF;
            ">
                Add Transaction
            </h2>

            <button
                onclick="closeAddModal()"
                type="button"
                style="
                    border:0;
                    background:#12231B;
                    color:#fff;
                    font-size:20px;
                    width:35px;
                    height:35px;
                    border-radius:8px;
                    cursor:pointer;
                "
            >
                ×
            </button>

        </div>


        <!-- ADD FORM -->

        <form
            action="{{ route('dashboard.transactions.store') }}"
            method="POST"
        >

            @csrf


            <!-- CATEGORY -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Category
            </label>

            <select
                name="category_id"
                required
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                "
            >

                <option value="">
                    Select Category
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>


            <!-- TYPE -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Type
            </label>

            <select
                name="type"
                required
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                "
            >

                <option value="">
                    Select Type
                </option>

                <option
                    value="income"
                    {{ old('type') == 'income' ? 'selected' : '' }}
                >
                    Income
                </option>

                <option
                    value="expense"
                    {{ old('type') == 'expense' ? 'selected' : '' }}
                >
                    Expense
                </option>

            </select>


            <!-- AMOUNT -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Amount
            </label>

            <input
                type="number"
                name="amount"
                step="0.01"
                min="0.01"
                required
                value="{{ old('amount') }}"
                placeholder="Enter amount"
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                "
            >


            <!-- DATE -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Transaction Date
            </label>

            <input
                type="date"
                name="transaction_date"
                required
                value="{{ old('transaction_date', now()->format('Y-m-d')) }}"
                max="{{ now()->format('Y-m-d') }}"
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                    color-scheme:dark;
                "
            >


            <!-- DESCRIPTION -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Description
            </label>

            <textarea
                name="description"
                rows="3"
                placeholder="Enter description"
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                    resize:none;
                "
            >{{ old('description') }}</textarea>


            <!-- SUBMIT -->

            <button
                type="submit"
                style="
                    width:100%;
                    border:0;
                    background:#00F59B;
                    color:#06100B;
                    padding:13px;
                    border-radius:8px;
                    font-weight:800;
                    cursor:pointer;
                "
            >
                Add Transaction
            </button>

        </form>

    </div>

</div>


<!-- =========================================================
     EDIT TRANSACTION MODAL
========================================================= -->

<div
    id="editTransactionModal"
    style="
        display:none;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.75);
        z-index:10000;
        align-items:center;
        justify-content:center;
        padding:20px;
    "
>

    <div style="
        width:100%;
        max-width:500px;
        max-height:90vh;
        overflow-y:auto;
        background:#0D1813;
        border:1px solid #1A3326;
        border-radius:16px;
        padding:25px;
        box-sizing:border-box;
    ">

        <!-- EDIT HEADER -->

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        ">

            <h2 style="
                margin:0;
                color:#E8F5EF;
            ">
                Edit Transaction
            </h2>

            <button
                onclick="closeEditModal()"
                type="button"
                style="
                    border:0;
                    background:#12231B;
                    color:#fff;
                    font-size:20px;
                    width:35px;
                    height:35px;
                    border-radius:8px;
                    cursor:pointer;
                "
            >
                ×
            </button>

        </div>


        <!-- EDIT FORM -->

        <form
            id="editTransactionForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <!-- CATEGORY -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Category
            </label>

            <select
                id="edit_category_id"
                name="category_id"
                required
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                "
            >

                <option value="">
                    Select Category
                </option>

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>


            <!-- TYPE -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Type
            </label>

            <select
                id="edit_type"
                name="type"
                required
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                "
            >

                <option value="income">
                    Income
                </option>

                <option value="expense">
                    Expense
                </option>

            </select>


            <!-- AMOUNT -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Amount
            </label>

            <input
                id="edit_amount"
                type="number"
                name="amount"
                step="0.01"
                min="0.01"
                required
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                "
            >


            <!-- DATE -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Transaction Date
            </label>

            <input
                id="edit_transaction_date"
                type="date"
                name="transaction_date"
                required
                max="{{ now()->format('Y-m-d') }}"
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                    color-scheme:dark;
                "
            >


            <!-- DESCRIPTION -->

            <label style="
                display:block;
                margin-bottom:7px;
                color:#AFC8BC;
            ">
                Description
            </label>

            <textarea
                id="edit_description"
                name="description"
                rows="3"
                placeholder="Enter description"
                style="
                    width:100%;
                    box-sizing:border-box;
                    padding:12px;
                    margin-bottom:17px;
                    background:#12231B;
                    border:1px solid #1A3326;
                    color:#fff;
                    border-radius:8px;
                    resize:none;
                "
            ></textarea>


            <!-- UPDATE BUTTON -->

            <button
                type="submit"
                style="
                    width:100%;
                    border:0;
                    background:#00F59B;
                    color:#06100B;
                    padding:13px;
                    border-radius:8px;
                    font-weight:800;
                    cursor:pointer;
                "
            >
                Update Transaction
            </button>

        </form>

    </div>

</div>


<!-- =========================================================
     JAVASCRIPT
========================================================= -->

<script>

/* =========================================================
   ADD MODAL
========================================================= */

function openAddModal()
{
    document.getElementById('transactionModal').style.display = 'flex';
}


function closeAddModal()
{
    document.getElementById('transactionModal').style.display = 'none';
}


/* =========================================================
   EDIT MODAL
========================================================= */

function openEditModal(
    id,
    categoryId,
    type,
    amount,
    transactionDate,
    description
)
{
    const modal =
        document.getElementById('editTransactionModal');

    const form =
        document.getElementById('editTransactionForm');

    /*
     * Laravel route:
     * /dashboard/transactions/{id}
     */

    form.action =
        "{{ url('/dashboard/transactions') }}/" + id;

    document.getElementById('edit_category_id').value =
        categoryId;

    document.getElementById('edit_type').value =
        type;

    document.getElementById('edit_amount').value =
        amount;

    document.getElementById('edit_transaction_date').value =
        transactionDate;

    document.getElementById('edit_description').value =
        description || '';

    modal.style.display = 'flex';
}


function closeEditModal()
{
    document.getElementById('editTransactionModal').style.display = 'none';
}


/* =========================================================
   CLOSE WHEN CLICKING OUTSIDE
========================================================= */

document.addEventListener('click', function(event) {

    const addModal =
        document.getElementById('transactionModal');

    const editModal =
        document.getElementById('editTransactionModal');


    if (event.target === addModal) {

        closeAddModal();

    }


    if (event.target === editModal) {

        closeEditModal();

    }

});


/* =========================================================
   VALIDATION ERROR -> OPEN ADD MODAL
========================================================= */

@if($errors->any())

    document.addEventListener('DOMContentLoaded', function() {

        openAddModal();

    });

@endif

</script>

@endsection