@extends('layouts.admin')

@section('content')

{{-- =========================================================
     BOOTSTRAP CSS
========================================================= --}}
<link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

{{-- =========================================================
     BOOTSTRAP ICONS
========================================================= --}}
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<style>

    /* =========================================================
       CAMPUS COIN — CATEGORIES
       DARK GREEN + NEON MINT
    ========================================================= */

    .categories-page {
        width: 100%;
        max-width: 100%;
        min-height: calc(100vh - 20px);
        padding: 28px;
        box-sizing: border-box;
        overflow-x: hidden;

        color: #E8F5EF;

        background:
            radial-gradient(
                circle at 8% 8%,
                rgba(0,245,155,.07),
                transparent 28%
            ),
            radial-gradient(
                circle at 92% 85%,
                rgba(16,185,129,.05),
                transparent 30%
            ),
            #080E0B;
    }


    /* =========================================================
       PAGE HEADER
    ========================================================= */

    .categories-page .page-header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 26px;
    }

    .categories-page .page-title {
        margin: 0;
        color: #E8F5EF;
        font-size: 28px;
        line-height: 1.2;
        font-weight: 800;
        letter-spacing: -.6px;
    }

    .categories-page .page-subtitle {
        margin: 7px 0 0;
        color: #718E81;
        font-size: 13px;
    }


    /* =========================================================
       ADD CATEGORY BUTTON
    ========================================================= */

    .categories-page .btn-add {
        min-height: 42px;

        background: #00F59B;
        color: #06100B;

        border: 1px solid #00F59B;
        border-radius: 10px;

        padding: 10px 18px;

        font-size: 13px;
        font-weight: 800;

        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;

        cursor: pointer;

        transition: .25s ease;

        box-shadow:
            0 8px 25px rgba(0,245,155,.12);
    }

    .categories-page .btn-add:hover {
        background: #39FFB5;
        border-color: #39FFB5;
        color: #06100B;

        transform: translateY(-2px);

        box-shadow:
            0 12px 30px rgba(0,245,155,.22);
    }


    /* =========================================================
       ALERTS
    ========================================================= */

    .categories-page .alert {
        border-radius: 11px;
        border: 1px solid;
        background: #0D1813;
        color: #E8F5EF;
        margin-bottom: 18px;
    }

    .categories-page .alert-success {
        border-color: rgba(0,245,155,.28);
        color: #B9FFE4;
    }

    .categories-page .alert-danger {
        border-color: rgba(239,68,68,.30);
        color: #FFB5B5;
    }

    .categories-page .alert .btn-close {
        filter: invert(1);
        opacity: .7;
    }

    .categories-page .alert ul {
        padding-left: 20px;
    }


    /* =========================================================
       CATEGORY GRID
    ========================================================= */

    .categories-grid {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px;

        box-sizing: border-box;
    }


    /* =========================================================
       CATEGORY CARD
    ========================================================= */

    .categories-page .category-card {
        width: 100%;
        min-width: 0;

        background:
            linear-gradient(
                145deg,
                rgba(18,35,27,.98),
                rgba(13,24,19,.98)
            );

        border: 1px solid #1A3326;
        border-radius: 16px;

        overflow: hidden;

        box-shadow:
            0 14px 38px rgba(0,0,0,.18);

        transition: .25s ease;
    }

    .categories-page .category-card:hover {
        border-color: rgba(0,245,155,.22);

        box-shadow:
            0 18px 45px rgba(0,0,0,.22),
            0 0 25px rgba(0,245,155,.035);
    }


    /* =========================================================
       CARD HEADER
    ========================================================= */

    .categories-page .card-header-custom {
        min-height: 80px;

        padding: 18px 20px;

        border-bottom: 1px solid #1A3326;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        background: rgba(13,24,19,.55);
    }

    .categories-page .card-heading {
        display: flex;
        align-items: center;
        gap: 12px;

        min-width: 0;
    }

    .categories-page .heading-icon {
        width: 42px;
        height: 42px;

        flex: 0 0 42px;

        border-radius: 11px;

        background: rgba(0,245,155,.09);

        border: 1px solid rgba(0,245,155,.16);

        color: #00F59B;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 18px;

        box-shadow:
            inset 0 0 18px rgba(0,245,155,.025);
    }

    .categories-page .card-title {
        margin: 0;

        color: #E8F5EF;

        font-size: 15px;
        font-weight: 750;
    }

    .categories-page .card-description {
        margin: 4px 0 0;

        color: #718E81;

        font-size: 11px;
    }

    .categories-page .category-count {
        flex-shrink: 0;

        background: rgba(0,245,155,.08);

        border: 1px solid rgba(0,245,155,.16);

        color: #00F59B;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 10px;
        font-weight: 800;

        white-space: nowrap;
    }


    /* =========================================================
       CATEGORY LIST
    ========================================================= */

    .categories-page .category-list {
        padding: 4px 20px 14px;
    }

    .categories-page .category-item {
        width: 100%;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        padding: 14px 0;

        border-bottom: 1px solid #1A3326;

        transition: .2s ease;

        box-sizing: border-box;
    }

    .categories-page .category-item:last-child {
        border-bottom: none;
    }

    .categories-page .category-item:hover {
        padding-left: 5px;
        padding-right: 5px;
    }

    .categories-page .category-left {
        display: flex;
        align-items: center;

        gap: 12px;

        min-width: 0;
        flex: 1;
    }


    /* =========================================================
       CATEGORY ICON
    ========================================================= */

    .categories-page .category-icon {
        width: 39px;
        height: 39px;

        flex: 0 0 39px;

        background: rgba(0,245,155,.07);

        border: 1px solid rgba(0,245,155,.13);

        color: #00F59B;

        border-radius: 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 15px;

        transition: .2s ease;
    }

    .categories-page .category-item:hover .category-icon {
        background: rgba(0,245,155,.12);

        box-shadow:
            0 0 16px rgba(0,245,155,.08);
    }


    /* =========================================================
       CATEGORY TEXT
    ========================================================= */

    .categories-page .category-name {
        color: #DDEEE6;

        font-size: 13px;
        font-weight: 700;

        word-break: break-word;
    }

    .categories-page .category-type {
        margin-top: 3px;

        color: #718E81;

        font-size: 10px;

        text-transform: uppercase;

        letter-spacing: .5px;
    }


    /* =========================================================
       ACTION BUTTONS
    ========================================================= */

    .categories-page .action-buttons {
        display: flex;
        align-items: center;
        gap: 7px;

        flex-shrink: 0;
    }

    .categories-page .action-buttons form {
        margin: 0;
        padding: 0;
    }

    .categories-page .btn-action {
        width: 33px;
        height: 33px;

        padding: 0;

        border-radius: 8px;

        display: flex;
        align-items: center;
        justify-content: center;

        border: 1px solid;

        background: #0D1813;

        cursor: pointer;

        transition: .2s ease;
    }


    /* EDIT */

    .categories-page .btn-edit {
        color: #00F59B;
        border-color: rgba(0,245,155,.22);
    }

    .categories-page .btn-edit:hover {
        background: #00F59B;
        border-color: #00F59B;

        color: #06100B;

        transform: translateY(-2px);

        box-shadow:
            0 5px 15px rgba(0,245,155,.16);
    }


    /* DELETE */

    .categories-page .btn-delete {
        color: #FF6B75;
        border-color: rgba(239,68,68,.25);
    }

    .categories-page .btn-delete:hover {
        background: #EF4444;
        border-color: #EF4444;

        color: #fff;

        transform: translateY(-2px);

        box-shadow:
            0 5px 15px rgba(239,68,68,.15);
    }


    /* =========================================================
       EMPTY
    ========================================================= */

    .categories-page .empty-category {
        text-align: center;

        padding: 32px 10px;

        color: #718E81;

        font-size: 13px;
    }

    .categories-page .empty-category i {
        color: #00F59B;
        opacity: .65;
    }


    /* =========================================================
       MODAL
    ========================================================= */

    .categories-page .modal-content {
        background: #0D1813;

        border: 1px solid #1A3326;

        border-radius: 16px;

        overflow: hidden;

        color: #E8F5EF;

        box-shadow:
            0 25px 70px rgba(0,0,0,.55);
    }

    .categories-page .modal-header {
        background:
            linear-gradient(
                135deg,
                #0D1813,
                #12231B
            );

        color: #E8F5EF;

        border-bottom: 1px solid #1A3326;

        padding: 18px 21px;
    }

    .categories-page .modal-title {
        font-size: 16px;
        font-weight: 800;
    }

    .categories-page .modal-title i {
        color: #00F59B;
    }

    .categories-page .modal .btn-close {
        filter: invert(1);
        opacity: .75;
    }

    .categories-page .modal .btn-close:hover {
        opacity: 1;
    }

    .categories-page .modal-body {
        padding: 24px;
        background: #0D1813;
    }

    .categories-page .modal-footer {
        background: #0D1813;

        border-top: 1px solid #1A3326;

        padding: 15px 20px;
    }


    /* =========================================================
       FORM
    ========================================================= */

    .categories-page .form-label {
        font-size: 12px;
        font-weight: 700;

        color: #CFE2D8;

        margin-bottom: 7px;
    }

    .categories-page .form-control,
    .categories-page .form-select {
        width: 100%;

        border: 1px solid #1A3326;

        border-radius: 9px;

        padding: 11px 12px;

        font-size: 13px;

        background: #080E0B;
        color: #E8F5EF;

        box-shadow: none;
    }

    .categories-page .form-control::placeholder {
        color: #536C60;
    }

    .categories-page .form-control:focus,
    .categories-page .form-select:focus {
        background: #080E0B;

        color: #E8F5EF;

        border-color: #00F59B;

        box-shadow:
            0 0 0 3px rgba(0,245,155,.08);
    }

    .categories-page .form-select option {
        background: #0D1813;
        color: #E8F5EF;
    }


    /* =========================================================
       SAVE
    ========================================================= */

    .categories-page .btn-save {
        background: #00F59B;

        color: #06100B;

        border: 1px solid #00F59B;

        border-radius: 9px;

        padding: 10px 17px;

        font-size: 13px;
        font-weight: 800;

        transition: .2s ease;
    }

    .categories-page .btn-save:hover {
        background: #39FFB5;
        border-color: #39FFB5;

        color: #06100B;

        transform: translateY(-1px);

        box-shadow:
            0 7px 20px rgba(0,245,155,.15);
    }


    /* =========================================================
       CANCEL
    ========================================================= */

    .categories-page .btn-cancel {
        background: #12231B;

        color: #A8BDB2;

        border: 1px solid #1A3326;

        border-radius: 9px;

        padding: 10px 17px;

        font-size: 13px;
        font-weight: 700;
    }

    .categories-page .btn-cancel:hover {
        background: #1A3326;

        color: #E8F5EF;

        border-color: #28513D;
    }


    /* =========================================================
       SCROLLBAR
    ========================================================= */

    .categories-page::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .categories-page::-webkit-scrollbar-track {
        background: #080E0B;
    }

    .categories-page::-webkit-scrollbar-thumb {
        background: #1A3326;
        border-radius: 10px;
    }

    .categories-page::-webkit-scrollbar-thumb:hover {
        background: #28513D;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1100px) {

        .categories-grid {
            grid-template-columns: 1fr;
        }

    }


    @media (max-width: 768px) {

        .categories-page {
            padding: 20px 15px;
        }

        .categories-page .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .categories-page .page-title {
            font-size: 24px;
        }

        .categories-page .btn-add {
            width: 100%;
        }

        .categories-page .card-header-custom {
            align-items: flex-start;
        }

        .categories-page .category-item {
            gap: 10px;
        }

        .categories-page .category-name {
            font-size: 12px;
        }

        .categories-page .category-icon {
            width: 36px;
            height: 36px;
            flex-basis: 36px;
        }

        .categories-page .action-buttons {
            gap: 5px;
        }

        .categories-page .btn-action {
            width: 31px;
            height: 31px;
        }

    }


    @media (max-width: 480px) {

        .categories-page .card-header-custom {
            flex-direction: column;
            align-items: flex-start;
        }

        .categories-page .category-count {
            align-self: flex-start;
        }

        .categories-page .category-left {
            max-width: 65%;
        }

        .categories-page .modal-body {
            padding: 18px;
        }

    }

</style>


<!-- =========================================================
     MAIN CATEGORIES PAGE
========================================================= -->

<div class="categories-page">

    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="page-header">

        <div>

            <h1 class="page-title">
                Manage Categories
            </h1>

            <p class="page-subtitle">
                Create and manage categories for your spending habits.
            </p>

        </div>


        <button
            type="button"
            class="btn-add"
            data-bs-toggle="modal"
            data-bs-target="#addCategoryModal">

            <i class="bi bi-plus-lg"></i>

            Add Category

        </button>

    </div>


    <!-- =====================================================
         SUCCESS
    ====================================================== -->

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- =====================================================
         ERROR
    ====================================================== -->

    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="bi bi-exclamation-circle me-2"></i>

            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    <!-- =====================================================
         VALIDATION ERRORS
    ====================================================== -->

    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- =====================================================
         CATEGORY GRID
    ====================================================== -->

    <div class="categories-grid">


        <!-- =================================================
             INCOME CATEGORIES
        ================================================== -->

        <div class="category-card">

            <div class="card-header-custom">

                <div class="card-heading">

                    <div class="heading-icon">

                        <i class="bi bi-cash-coin"></i>

                    </div>

                    <div>

                        <h5 class="card-title">
                            Income Categories
                        </h5>

                        <p class="card-description">
                            Money coming into your account
                        </p>

                    </div>

                </div>


                <span class="category-count">

                    {{ $incomeCategories->count() }}

                    {{ $incomeCategories->count() == 1 ? 'Category' : 'Categories' }}

                </span>

            </div>


            <div class="category-list">

                @forelse($incomeCategories as $category)

                    <div class="category-item">

                        <div class="category-left">

                            <span class="category-icon">

                                @if(strtolower($category->name) === 'salary')

                                    <i class="bi bi-cash-stack"></i>

                                @elseif(strtolower($category->name) === 'scholarship')

                                    <i class="bi bi-gift"></i>

                                @elseif(strtolower($category->name) === 'freelance')

                                    <i class="bi bi-laptop"></i>

                                @else

                                    <i class="bi bi-cash-coin"></i>

                                @endif

                            </span>


                            <div>

                                <div class="category-name">
                                    {{ $category->name }}
                                </div>

                                <div class="category-type">
                                    Income
                                </div>

                            </div>

                        </div>


                        <div class="action-buttons">

                            <!-- EDIT -->

                            <button
                                type="button"
                                class="btn-action btn-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editCategory{{ $category->id }}"
                                title="Edit Category">

                                <i class="bi bi-pencil"></i>

                            </button>


                            <!-- DELETE -->

                            <form
                                method="POST"
                                action="{{ route('admin.categories.delete', $category->id) }}">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-action btn-delete"
                                    title="Delete Category"
                                    onclick="return confirm('Are you sure you want to delete {{ $category->name }}?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="empty-category">

                        <i class="bi bi-folder2-open fs-3 d-block mb-2"></i>

                        No income categories found.

                    </div>

                @endforelse

            </div>

        </div>


        <!-- =================================================
             EXPENSE CATEGORIES
        ================================================== -->

        <div class="category-card">

            <div class="card-header-custom">

                <div class="card-heading">

                    <div class="heading-icon">

                        <i class="bi bi-credit-card-2-front"></i>

                    </div>

                    <div>

                        <h5 class="card-title">
                            Expense Categories
                        </h5>

                        <p class="card-description">
                            Money spent from your account
                        </p>

                    </div>

                </div>


                <span class="category-count">

                    {{ $expenseCategories->count() }}

                    {{ $expenseCategories->count() == 1 ? 'Category' : 'Categories' }}

                </span>

            </div>


            <div class="category-list">

                @forelse($expenseCategories as $category)

                    <div class="category-item">

                        <div class="category-left">

                            <span class="category-icon">

                                @if(strtolower($category->name) === 'food')

                                    <i class="bi bi-cart3"></i>

                                @elseif(strtolower($category->name) === 'transport')

                                    <i class="bi bi-bus-front"></i>

                                @elseif(strtolower($category->name) === 'education')

                                    <i class="bi bi-book"></i>

                                @else

                                    <i class="bi bi-credit-card"></i>

                                @endif

                            </span>


                            <div>

                                <div class="category-name">
                                    {{ $category->name }}
                                </div>

                                <div class="category-type">
                                    Expense
                                </div>

                            </div>

                        </div>


                        <div class="action-buttons">

                            <!-- EDIT -->

                            <button
                                type="button"
                                class="btn-action btn-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editCategory{{ $category->id }}"
                                title="Edit Category">

                                <i class="bi bi-pencil"></i>

                            </button>


                            <!-- DELETE -->

                            <form
                                method="POST"
                                action="{{ route('admin.categories.delete', $category->id) }}">

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-action btn-delete"
                                    title="Delete Category"
                                    onclick="return confirm('Are you sure you want to delete {{ $category->name }}?')">

                                    <i class="bi bi-trash"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="empty-category">

                        <i class="bi bi-folder2-open fs-3 d-block mb-2"></i>

                        No expense categories found.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     ADD CATEGORY MODAL
========================================================= -->

<div
    class="modal fade"
    id="addCategoryModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">

            <form
                method="POST"
                action="{{ route('admin.categories.store') }}">

                @csrf

                <div class="modal-header">

                    <h5 class="modal-title">

                        <i class="bi bi-plus-circle me-2"></i>

                        Add New Category

                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            Category Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="e.g. Books"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            Category Type
                        </label>

                        <select
                            name="type"
                            class="form-select"
                            required>

                            <option value="">
                                Select type
                            </option>

                            <option
                                value="income"
                                {{ old('type') == 'income' ? 'selected' : '' }}>

                                Income

                            </option>

                            <option
                                value="expense"
                                {{ old('type') == 'expense' ? 'selected' : '' }}>

                                Expense

                            </option>

                        </select>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-cancel"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="btn-save">

                        <i class="bi bi-check-lg me-1"></i>

                        Save Category

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- =========================================================
     EDIT CATEGORY MODALS
========================================================= -->

@foreach($incomeCategories->merge($expenseCategories) as $category)

    <div
        class="modal fade"
        id="editCategory{{ $category->id }}"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <form
                    method="POST"
                    action="{{ route('admin.categories.update', $category->id) }}">

                    @csrf

                    @method('PUT')


                    <div class="modal-header">

                        <h5 class="modal-title">

                            <i class="bi bi-pencil-square me-2"></i>

                            Edit Category

                        </h5>


                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal">
                        </button>

                    </div>


                    <div class="modal-body">

                        <div class="mb-3">

                            <label class="form-label">
                                Category Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ $category->name }}"
                                required>

                        </div>


                        <div class="mb-3">

                            <label class="form-label">
                                Category Type
                            </label>

                            <select
                                name="type"
                                class="form-select"
                                required>

                                <option
                                    value="income"
                                    {{ $category->type === 'income' ? 'selected' : '' }}>

                                    Income

                                </option>

                                <option
                                    value="expense"
                                    {{ $category->type === 'expense' ? 'selected' : '' }}>

                                    Expense

                                </option>

                            </select>

                        </div>

                    </div>


                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn btn-cancel"
                            data-bs-dismiss="modal">

                            Cancel

                        </button>


                        <button
                            type="submit"
                            class="btn-save">

                            <i class="bi bi-check-lg me-1"></i>

                            Update Category

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

@endforeach


<!-- =========================================================
     BOOTSTRAP JS
========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection