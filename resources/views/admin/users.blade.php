@extends('layouts.admin')

@section('content')

<style>
    /* =========================================================
       CAMPUS COIN USERS PAGE
       HOME THEME: DARK GREEN + NEON MINT
    ========================================================= */

    .users-page {
        width: 100%;
        min-height: calc(100vh - 40px);
        padding: 0;
        background: #080E0B;
        color: #e8fff5;
    }

    /* ================= TOP BAR ================= */

    .users-topbar {
        width: 100%;
        background: #0D1813;
        padding: 18px 25px;
        border-radius: 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        border: 1px solid #1A3326;
        box-shadow: 0 8px 30px rgba(0, 245, 155, .05);
    }

    .users-topbar h2 {
        margin: 0;
        color: #00F59B;
        font-size: 22px;
        font-weight: 700;
        letter-spacing: .2px;
    }

    .users-admin {
        color: #718E81;
        font-size: 13px;
    }

    /* ================= PAGE HEADER ================= */

    .users-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .users-page-header h1 {
        margin: 0;
        color: #f1fff9;
        font-size: 30px;
        font-weight: 700;
    }

    .users-page-header p {
        margin: 7px 0 0;
        color: #718E81;
        font-size: 13px;
    }

    .users-count {
        background: rgba(0,245,155,.10);
        color: #00F59B;
        padding: 9px 17px;
        border-radius: 20px;
        border: 1px solid rgba(0,245,155,.20);
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* ================= STAT CARDS ================= */

    .users-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 25px;
    }

    .users-stat-card {
        background: #0D1813;
        border-radius: 14px;
        padding: 22px;
        border: 1px solid #1A3326;
        box-shadow: 0 8px 30px rgba(0,0,0,.25);
        transition: .25s ease;
        position: relative;
        overflow: hidden;
    }

    .users-stat-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(
            90deg,
            transparent,
            #00F59B,
            transparent
        );
        opacity: .45;
    }

    .users-stat-card:hover {
        transform: translateY(-3px);
        border-color: rgba(0,245,155,.30);
        box-shadow: 0 12px 35px rgba(0,245,155,.08);
    }

    .users-stat-title {
        color: #718E81;
        font-size: 12px;
        margin-bottom: 12px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .users-stat-number {
        font-size: 29px;
        font-weight: 800;
        color: #00F59B;
    }

    /* ================= TABLE CARD ================= */

    .users-table-card {
        background: #0D1813;
        border-radius: 14px;
        padding: 25px;
        border: 1px solid #1A3326;
        box-shadow: 0 8px 30px rgba(0,0,0,.25);
    }

    .users-table-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .users-table-top h3 {
        margin: 0;
        color: #f1fff9;
        font-size: 18px;
        font-weight: 700;
    }

    /* ================= SEARCH ================= */

    .users-search {
        padding: 11px 15px;
        border: 1px solid #1A3326;
        border-radius: 9px;
        outline: none;
        width: 250px;
        font-size: 13px;
        background: #080E0B;
        color: #e8fff5;
        transition: .2s ease;
    }

    .users-search::placeholder {
        color: #718E81;
    }

    .users-search:focus {
        border-color: #00F59B;
        box-shadow: 0 0 0 3px rgba(0,245,155,.08);
    }

    /* ================= TABLE ================= */

    .users-table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    .users-table {
        width: 100%;
        border-collapse: collapse;
    }

    .users-table th {
        text-align: left;
        background: #12231B;
        color: #8FAEA0;
        padding: 14px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
        border-bottom: 1px solid #1A3326;
    }

    .users-table th:first-child {
        border-radius: 8px 0 0 8px;
    }

    .users-table th:last-child {
        border-radius: 0 8px 8px 0;
    }

    .users-table td {
        padding: 15px 14px;
        border-bottom: 1px solid rgba(26,51,38,.75);
        font-size: 13px;
        color: #b7cfc4;
        white-space: nowrap;
    }

    .users-table tbody tr {
        transition: .2s ease;
    }

    .users-table tbody tr:hover {
        background: rgba(0,245,155,.025);
    }

    /* ================= USER INFO ================= */

    .users-user-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .users-avatar {
        width: 39px;
        height: 39px;
        min-width: 39px;
        border-radius: 50%;
        background: linear-gradient(
            135deg,
            #123D2D,
            #0E2A20
        );
        border: 1px solid rgba(0,245,155,.25);
        color: #00F59B;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 13px;
        box-shadow: 0 0 15px rgba(0,245,155,.05);
    }

    .users-user-name {
        font-weight: 700;
        color: #effff8;
    }

    .users-email {
        color: #718E81 !important;
    }

    /* ================= STATUS ================= */

    .users-status {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 11px;
        border-radius: 20px;
        background: rgba(0,245,155,.08);
        border: 1px solid rgba(0,245,155,.18);
        color: #00F59B;
        font-size: 10px;
        font-weight: 700;
    }

    .users-status::before {
        content: "";
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #00F59B;
        box-shadow: 0 0 7px #00F59B;
    }

    /* ================= DELETE ================= */

    .users-delete-btn {
        border: 1px solid rgba(255,80,80,.20);
        background: rgba(255,70,70,.08);
        color: #ff8585;
        padding: 7px 12px;
        border-radius: 7px;
        cursor: pointer;
        font-size: 11px;
        transition: .2s ease;
    }

    .users-delete-btn:hover {
        background: rgba(255,70,70,.15);
        border-color: rgba(255,80,80,.35);
        transform: translateY(-1px);
    }

    /* ================= ALERT ================= */

    .users-alert {
        background: rgba(0,245,155,.08);
        color: #00F59B;
        padding: 13px 16px;
        border-radius: 9px;
        margin-bottom: 20px;
        font-size: 13px;
        border: 1px solid rgba(0,245,155,.20);
        box-shadow: 0 5px 20px rgba(0,245,155,.04);
    }

    /* ================= EMPTY ================= */

    .users-empty {
        text-align: center !important;
        padding: 55px !important;
        color: #718E81 !important;
    }

    /* ================= TABLE SCROLLBAR ================= */

    .users-table-wrapper::-webkit-scrollbar {
        height: 7px;
    }

    .users-table-wrapper::-webkit-scrollbar-track {
        background: #080E0B;
    }

    .users-table-wrapper::-webkit-scrollbar-thumb {
        background: #1A3326;
        border-radius: 20px;
    }

    .users-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #00F59B;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1000px) {

        .users-stats {
            grid-template-columns: 1fr;
        }

    }

    @media (max-width: 700px) {

        .users-page {
            padding: 0;
        }

        .users-topbar {
            padding: 16px 18px;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        .users-page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .users-table-top {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .users-search {
            width: 100%;
        }

        .users-table-card {
            padding: 18px;
        }

    }

    @media (max-width: 450px) {

        .users-page-header h1 {
            font-size: 25px;
        }

        .users-topbar h2 {
            font-size: 19px;
        }

        .users-stat-card {
            padding: 18px;
        }

        .users-table-card {
            padding: 14px;
        }

    }
</style>


<div class="users-page">

    <!-- =====================================================
         TOP BAR
    ====================================================== -->

    <div class="users-topbar">

        <h2>
            Campus Coin
        </h2>

        <div class="users-admin">
            Admin Panel
        </div>

    </div>


    <!-- =====================================================
         SUCCESS MESSAGE
    ====================================================== -->

    @if(session('success'))

        <div class="users-alert">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="users-page-header">

        <div>

            <h1>
                Users
            </h1>

            <p>
                Manage all registered Campus Coin users.
            </p>

        </div>


        <div class="users-count">
            {{ $users->count() }} Users
        </div>

    </div>


    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="users-stats">

        <!-- TOTAL USERS -->

        <div class="users-stat-card">

            <div class="users-stat-title">
                Total Users
            </div>

            <div class="users-stat-number">
                {{ $users->count() }}
            </div>

        </div>


        <!-- ACTIVE USERS -->

        <div class="users-stat-card">

            <div class="users-stat-title">
                Active Users
            </div>

            <div class="users-stat-number">
                {{ $users->count() }}
            </div>

        </div>


        <!-- NEW USERS -->

        <div class="users-stat-card">

            <div class="users-stat-title">
                New Users This Month
            </div>

            <div class="users-stat-number">

                {{
                    $users->filter(function ($user) {

                        return $user->created_at &&
                               $user->created_at->isCurrentMonth();

                    })->count()
                }}

            </div>

        </div>

    </div>


    <!-- =====================================================
         USERS TABLE
    ====================================================== -->

    <div class="users-table-card">

        <div class="users-table-top">

            <h3>
                Registered Users
            </h3>


            <input
                type="text"
                id="userSearch"
                class="users-search"
                placeholder="Search users..."
                autocomplete="off"
            >

        </div>


        <div class="users-table-wrapper">

            <table class="users-table">

                <thead>

                    <tr>

                        <th>
                            User
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Registered
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody id="usersTable">

                    @forelse($users as $user)

                        <tr>

                            <!-- USER -->

                            <td>

                                <div class="users-user-info">

                                    <div class="users-avatar">

                                        {{
                                            strtoupper(
                                                substr(
                                                    $user->name ?? 'U',
                                                    0,
                                                    1
                                                )
                                            )
                                        }}

                                    </div>


                                    <div class="users-user-name">

                                        {{ $user->name ?? 'Unknown User' }}

                                    </div>

                                </div>

                            </td>


                            <!-- EMAIL -->

                            <td class="users-email">

                                {{ $user->email }}

                            </td>


                            <!-- REGISTERED -->

                            <td>

                                {{
                                    $user->created_at
                                    ? $user->created_at->format('d M Y')
                                    : 'N/A'
                                }}

                            </td>


                            <!-- STATUS -->

                            <td>

                                <span class="users-status">
                                    Active
                                </span>

                            </td>


                            <!-- DELETE -->

                            <td>

                                <form
                                    method="POST"
                                    action="{{ route('admin.users.delete', $user->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="users-delete-btn"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="users-empty"
                            >

                                <div style="font-size:32px; margin-bottom:10px;">
                                    👥
                                </div>

                                No users registered yet.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('userSearch');

    const table =
        document.getElementById('usersTable');


    if (!searchInput || !table) {
        return;
    }


    searchInput.addEventListener('keyup', function () {

        const search =
            this.value.toLowerCase().trim();


        const rows =
            table.querySelectorAll('tr');


        rows.forEach(function (row) {

            const text =
                row.innerText.toLowerCase();


            row.style.display =
                text.includes(search)
                    ? ''
                    : 'none';

        });

    });

});

</script>

@endsection