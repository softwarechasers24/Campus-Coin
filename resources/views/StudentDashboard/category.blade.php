
@extends('layouts.student')

@section('title', 'Category')

@section('content')

<style>

    .category-page {
        color: #e8f5ef;
        padding: 5px 0 40px;
    }

    /* HEADER */
    .category-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }

    .category-header h1 {
        margin: 0 0 7px;
        font-size: 32px;
        font-weight: 800;
        letter-spacing: -0.6px;
    }

    .category-header p {
        margin: 0;
        color: #718e81;
        font-size: 14px;
    }

    .add-category-btn {
        border: 0;
        padding: 12px 18px;
        border-radius: 11px;
        background: #00f59b;
        color: #06120c;
        font-size: 12px;
        font-weight: 800;
        cursor: pointer;
        box-shadow: 0 7px 20px rgba(0,245,155,.12);
        transition: .2s ease;
    }

    .add-category-btn:hover {
        transform: translateY(-2px);
    }

    /* ALERT */
    .success-message {
        padding: 13px 17px;
        margin-bottom: 20px;
        border-radius: 12px;
        background: rgba(0,245,155,.08);
        border: 1px solid rgba(0,245,155,.18);
        color: #00f59b;
        font-size: 12px;
        font-weight: 700;
    }

    .error-message {
        padding: 13px 17px;
        margin-bottom: 20px;
        border-radius: 12px;
        background: rgba(255,80,90,.08);
        border: 1px solid rgba(255,80,90,.18);
        color: #ff6973;
        font-size: 12px;
    }

    /* SUMMARY */
    .category-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 17px;
        margin-bottom: 25px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        padding: 20px;
        border-radius: 18px;
        background: linear-gradient(
            145deg,
            #12231b,
            #0d1813
        );
        border: 1px solid #1a3326;
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 75px;
        height: 75px;
        right: -30px;
        top: -30px;
        border-radius: 50%;
        background: rgba(0,245,155,.045);
    }

    .stat-label {
        color: #718e81;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: .7px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 25px;
        font-weight: 800;
    }

    .stat-value.green {
        color: #00f59b;
    }

    .stat-value.yellow {
        color: #facc15;
    }

    .stat-value.red {
        color: #ff6973;
    }

    /* MAIN GRID */
    .category-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 310px;
        gap: 22px;
        align-items: start;
    }

    .category-card {
        background: #0d1813;
        border: 1px solid #1a3326;
        border-radius: 21px;
        overflow: hidden;
    }

    .card-header {
        padding: 20px 22px;
        border-bottom: 1px solid #1a3326;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .card-header h2 {
        margin: 0;
        font-size: 17px;
        font-weight: 750;
    }

    .card-header p {
        margin: 4px 0 0;
        color: #60796d;
        font-size: 10px;
    }

    .category-search {
        width: 180px;
        padding: 9px 12px;
        border-radius: 9px;
        outline: none;
        background: #101d16;
        border: 1px solid #1a3326;
        color: #e8f5ef;
        font-size: 11px;
    }

    .category-search:focus {
        border-color: rgba(0,245,155,.45);
    }

    /* CATEGORY LIST */
    .category-list {
        padding: 6px 0;
    }

    .category-item {
        padding: 19px 22px;
        border-bottom: 1px solid rgba(26,51,38,.7);
        transition: .25s ease;
    }

    .category-item:last-child {
        border-bottom: none;
    }

    .category-item:hover {
        background: rgba(0,245,155,.025);
    }

    .category-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .category-info {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 0;
    }

    .category-icon {
        width: 45px;
        height: 45px;
        min-width: 45px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        background: rgba(0,245,155,.07);
        border: 1px solid rgba(0,245,155,.12);
    }

    .category-name {
        margin: 0 0 5px;
        font-size: 14px;
        font-weight: 750;
    }

    .category-description {
        margin: 0;
        color: #60796d;
        font-size: 10px;
    }

    .category-amount {
        text-align: right;
        white-space: nowrap;
    }

    .type-badge {
        display: inline-block;
        padding: 5px 9px;
        border-radius: 20px;
        font-size: 9px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .type-income {
        color: #00f59b;
        background: rgba(0,245,155,.08);
        border: 1px solid rgba(0,245,155,.15);
    }

    .type-expense {
        color: #ff6973;
        background: rgba(255,105,115,.08);
        border: 1px solid rgba(255,105,115,.15);
    }

    .spent {
        display: block;
        margin-top: 7px;
        font-size: 12px;
        font-weight: 800;
        color: #dcebe4;
    }

    .limit {
        display: block;
        margin-top: 3px;
        color: #60796d;
        font-size: 10px;
    }

    /* PROGRESS */
    .progress-area {
        margin-top: 15px;
    }

    .progress-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 7px;
        color: #718e81;
        font-size: 9px;
    }

    .progress-bar {
        width: 100%;
        height: 7px;
        border-radius: 20px;
        overflow: hidden;
        background: #17261e;
    }

    .progress-fill {
        height: 100%;
        border-radius: inherit;
        background: #00f59b;
    }

    .progress-fill.warning {
        background: #facc15;
    }

    .progress-fill.danger {
        background: #ff6973;
    }

    /* EMPTY */
    .empty-category {
        padding: 45px 25px;
        text-align: center;
        color: #60796d;
        font-size: 12px;
    }

    .empty-category-icon {
        font-size: 35px;
        margin-bottom: 12px;
    }

    /* RIGHT SIDE */
    .side-column {
        display: flex;
        flex-direction: column;
        gap: 18px;
    }

    .side-card {
        background: #0d1813;
        border: 1px solid #1a3326;
        border-radius: 20px;
        padding: 20px;
    }

    .side-card h3 {
        margin: 0 0 17px;
        font-size: 15px;
        font-weight: 750;
    }

    /* PIE */
    .spending-circle {
        width: 145px;
        height: 145px;
        margin: 5px auto 20px;
        border-radius: 50%;
        background:
            conic-gradient(
                #00f59b 0deg 135deg,
                #3b82f6 135deg 225deg,
                #a855f7 225deg 280deg,
                #facc15 280deg 325deg,
                #33483d 325deg 360deg
            );
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .circle-inner {
        width: 102px;
        height: 102px;
        border-radius: 50%;
        background: #0d1813;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .circle-inner strong {
        font-size: 19px;
    }

    .circle-inner span {
        color: #60796d;
        font-size: 9px;
        margin-top: 3px;
    }

    .legend {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .legend-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 11px;
    }

    .legend-left {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #8fa59a;
    }

    .legend-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .legend-value {
        color: #a8bdb3;
        font-weight: 700;
    }

    /* HEALTH */
    .health-box {
        padding: 16px;
        border-radius: 14px;
        background: rgba(0,245,155,.035);
        border: 1px solid rgba(0,245,155,.11);
    }

    .health-top {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 12px;
    }

    .health-icon {
        width: 37px;
        height: 37px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,245,155,.08);
    }

    .health-top strong {
        display: block;
        font-size: 12px;
    }

    .health-top span {
        display: block;
        margin-top: 3px;
        color: #00f59b;
        font-size: 10px;
    }

    .health-text {
        color: #718e81;
        font-size: 10px;
        line-height: 1.6;
    }

    /* ADD MODAL */
    .category-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(0,0,0,.72);
        backdrop-filter: blur(5px);
    }

    .category-modal.show {
        display: flex;
    }

    .modal-box {
        width: 100%;
        max-width: 430px;
        background: #0d1813;
        border: 1px solid #1a3326;
        border-radius: 21px;
        padding: 25px;
        box-shadow: 0 25px 70px rgba(0,0,0,.45);
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 18px;
    }

    .close-modal {
        width: 32px;
        height: 32px;
        border-radius: 9px;
        border: 1px solid #1a3326;
        background: #101d16;
        color: #8fa59a;
        cursor: pointer;
    }

    .modal-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .modal-form label {
        color: #9bb1a6;
        font-size: 11px;
        margin-bottom: 6px;
        display: block;
    }

    .modal-input,
    .modal-select {
        width: 100%;
        box-sizing: border-box;
        padding: 12px;
        border-radius: 10px;
        background: #101d16;
        border: 1px solid #1a3326;
        color: #e8f5ef;
        outline: none;
        font-size: 12px;
    }

    .modal-input:focus,
    .modal-select:focus {
        border-color: rgba(0,245,155,.45);
    }

    .modal-select option {
        background: #101d16;
        color: #e8f5ef;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 9px;
        margin-top: 5px;
    }

    .modal-btn {
        padding: 10px 16px;
        border-radius: 9px;
        border: none;
        cursor: pointer;
        font-size: 11px;
        font-weight: 700;
    }

    .modal-cancel {
        background: #17261e;
        color: #8fa59a;
    }

    .modal-save {
        background: #00f59b;
        color: #06120c;
    }

    /* RESPONSIVE */
    @media (max-width: 1050px) {

        .category-layout {
            grid-template-columns: 1fr;
        }

        .side-column {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 800px) {

        .category-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .category-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .add-category-btn {
            width: 100%;
        }
    }

    @media (max-width: 650px) {

        .category-stats {
            grid-template-columns: 1fr;
        }

        .side-column {
            grid-template-columns: 1fr;
        }

        .card-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .category-search {
            width: 100%;
        }

        .category-top {
            align-items: flex-start;
        }

        .category-amount {
            text-align: left;
        }

        .category-info {
            align-items: flex-start;
        }
    }

</style>


<div class="category-page">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="success-message">
            ✓ {{ session('success') }}
        </div>
    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="error-message">

            @foreach($errors->all() as $error)
                <div>• {{ $error }}</div>
            @endforeach

        </div>
    @endif


    <!-- HEADER -->

    <div class="category-header">

        <div>

            <h1>Category</h1>

            <p>
                Organize and understand where your Campus Coins are being spent.
            </p>

        </div>

        <button
            type="button"
            class="add-category-btn"
            onclick="openCategoryModal()"
        >
            + Add Category
        </button>

    </div>


    <!-- SUMMARY -->

    <div class="category-stats">

        <div class="stat-card">

            <div class="stat-label">
                Total Categories
            </div>

            <div class="stat-value">
                {{ $categories->count() }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-label">
                Income Categories
            </div>

            <div class="stat-value green">
                {{ $incomeCategories->count() }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-label">
                Expense Categories
            </div>

            <div class="stat-value red">
                {{ $expenseCategories->count() }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-label">
                Category Types
            </div>

            <div class="stat-value yellow">
                2
            </div>

        </div>

    </div>


    <!-- MAIN -->

    <div class="category-layout">


        <!-- CATEGORY LIST -->

        <div class="category-card">

            <div class="card-header">

                <div>

                    <h2>My Categories</h2>

                    <p>
                        Your Income and Expense categories
                    </p>

                </div>


                <input
                    type="text"
                    class="category-search"
                    id="categorySearch"
                    placeholder="Search category..."
                >

            </div>


            <div class="category-list" id="categoryList">


                @forelse($categories as $category)

                    <div
                        class="category-item"
                        data-name="{{ strtolower($category->name) }}"
                    >

                        <div class="category-top">

                            <div class="category-info">

                                <div class="category-icon">

                                    @if($category->type === 'income')
                                        💰
                                    @else
                                        💸
                                    @endif

                                </div>


                                <div>

                                    <h3 class="category-name">
                                        {{ $category->name }}
                                    </h3>

                                    <p class="category-description">

                                        @if($category->type === 'income')
                                            Money received, earned or added
                                        @else
                                            Money spent or paid
                                        @endif

                                    </p>

                                </div>

                            </div>


                            <div class="category-amount">

                                @if($category->type === 'income')

                                    <span class="type-badge type-income">
                                        Income
                                    </span>

                                @else

                                    <span class="type-badge type-expense">
                                        Expense
                                    </span>

                                @endif

                            </div>

                        </div>


                        <div class="progress-area">

                            <div class="progress-info">

                                <span>
                                    {{ ucfirst($category->type) }} Category
                                </span>

                                <span>
                                    Campus Coin
                                </span>

                            </div>


                            <div class="progress-bar">

                                <div
                                    class="progress-fill
                                    {{ $category->type === 'expense' ? 'danger' : '' }}"
                                    style="width: {{ $category->type === 'income' ? '65' : '45' }}%"
                                ></div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="empty-category">

                        <div class="empty-category-icon">
                            📂
                        </div>

                        <div>
                            No categories found.
                        </div>

                        <div style="margin-top:6px;">
                            Click "+ Add Category" to create your first category.
                        </div>

                    </div>

                @endforelse


            </div>

        </div>


        <!-- RIGHT COLUMN -->

        <div class="side-column">


            <!-- CATEGORY BREAKDOWN -->

            <div class="side-card">

                <h3>
                    Category Breakdown
                </h3>


                <div class="spending-circle">

                    <div class="circle-inner">

                        <strong>
                            {{ $categories->count() }}
                        </strong>

                        <span>
                            Categories
                        </span>

                    </div>

                </div>


                <div class="legend">


                    <div class="legend-item">

                        <div class="legend-left">

                            <span
                                class="legend-dot"
                                style="background:#00f59b"
                            ></span>

                            Income

                        </div>

                        <span class="legend-value">
                            {{ $incomeCategories->count() }}
                        </span>

                    </div>


                    <div class="legend-item">

                        <div class="legend-left">

                            <span
                                class="legend-dot"
                                style="background:#ff6973"
                            ></span>

                            Expense

                        </div>

                        <span class="legend-value">
                            {{ $expenseCategories->count() }}
                        </span>

                    </div>


                </div>

            </div>


            <!-- CATEGORY HEALTH -->

            <div class="side-card">

                <h3>
                    Category Health
                </h3>


                <div class="health-box">

                    <div class="health-top">

                        <div class="health-icon">
                            🌿
                        </div>

                        <div>

                            <strong>
                                Good Progress
                            </strong>

                            <span>
                                Categories are organized
                            </span>

                        </div>

                    </div>


                    <div class="health-text">

                        Keep your income and expense categories
                        separate so your Campus Coin reports remain
                        clear and accurate.

                    </div>

                </div>

            </div>


            <!-- TIP -->

            <div class="side-card">

                <h3>
                    Smart Tip
                </h3>


                <div class="health-box">

                    <div class="health-top">

                        <div class="health-icon">
                            💡
                        </div>

                        <div>

                            <strong>
                                Track Smartly
                            </strong>

                        </div>

                    </div>


                    <div class="health-text">

                        Use Expense categories for money you spend
                        and Income categories for money you receive.

                    </div>

                </div>

            </div>


        </div>

    </div>

</div>


<!-- ADD CATEGORY MODAL -->

<div class="category-modal" id="categoryModal">

    <div class="modal-box">


        <div class="modal-header">

            <h2>
                Add Category
            </h2>

            <button
                type="button"
                class="close-modal"
                onclick="closeCategoryModal()"
            >
                ✕
            </button>

        </div>


        {{-- REAL LARAVEL FORM --}}

        <form
            action="{{ route('dashboard.categories.store') }}"
            method="POST"
            class="modal-form"
        >

            @csrf


            <!-- CATEGORY NAME -->

            <div>

                <label>
                    Category Name
                </label>

                <input
                    type="text"
                    name="name"
                    class="modal-input"
                    placeholder="e.g. Food, Freelancing, Scholarship"
                    required
                >

            </div>


            <!-- CATEGORY TYPE -->

            <div>

                <label>
                    Category Type
                </label>

                <select
                    name="type"
                    class="modal-select"
                    required
                >

                    <option value="">
                        Select Category Type
                    </option>

                    <option value="income">
                        Income
                    </option>

                    <option value="expense">
                        Expense
                    </option>

                </select>

            </div>


            <!-- MONTHLY BUDGET -->

            <div>

                <label>
                    Monthly Budget
                </label>

                <input
                    type="number"
                    name="budget"
                    class="modal-input"
                    placeholder="Enter budget amount"
                    min="0"
                >

                <small style="
                    display:block;
                    margin-top:6px;
                    color:#60796d;
                    font-size:9px;
                ">
                    Budget saving will be connected separately.
                </small>

            </div>


            <!-- BUTTONS -->

            <div class="modal-actions">

                <button
                    type="button"
                    class="modal-btn modal-cancel"
                    onclick="closeCategoryModal()"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="modal-btn modal-save"
                >
                    Add Category
                </button>

            </div>

        </form>

    </div>

</div>


<script>

    function openCategoryModal() {

        document
            .getElementById('categoryModal')
            .classList.add('show');

    }


    function closeCategoryModal() {

        document
            .getElementById('categoryModal')
            .classList.remove('show');

    }


    /* SEARCH */

    const searchInput = document.getElementById('categorySearch');

    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const searchValue = this.value.toLowerCase();

            const items = document.querySelectorAll(
                '.category-item'
            );

            items.forEach(function (item) {

                const name =
                    item
                    .querySelector('.category-name')
                    .textContent
                    .toLowerCase();

                if (name.includes(searchValue)) {

                    item.style.display = '';

                } else {

                    item.style.display = 'none';

                }

            });

        });

    }


    /* CLOSE MODAL ON OUTSIDE CLICK */

    const categoryModal =
        document.getElementById('categoryModal');

    if (categoryModal) {

        categoryModal.addEventListener('click', function (event) {

            if (event.target === this) {

                closeCategoryModal();

            }

        });

    }

</script>

@endsection

