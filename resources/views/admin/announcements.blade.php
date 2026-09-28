@extends('layouts.admin')

@section('content')

<style>
    /* =========================================================
       CAMPUS COIN - ANNOUNCEMENTS
       DARK ADMIN THEME
    ========================================================= */

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        background: #061b13 !important;
        color: #f4fff9;
        font-family: Arial, Helvetica, sans-serif;
        overflow-x: hidden;
    }

    .announcement-page {
        min-height: 100vh;
        width: 100%;
        padding: 28px 30px 50px;
        background:
            radial-gradient(circle at 80% 0%, rgba(0, 255, 170, 0.08), transparent 28%),
            #061b13;
    }

    /* =========================================================
       HEADER
    ========================================================= */

    .announcement-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 28px;
    }

    .header-left {
        min-width: 0;
    }

    .page-title {
        margin: 0;
        font-size: 32px;
        line-height: 1.2;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: -0.5px;
    }

    .page-title span {
        color: #00f5a0;
    }

    .page-subtitle {
        margin: 8px 0 0;
        color: #719287;
        font-size: 14px;
    }

    .header-badge {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 10px 15px;
        border: 1px solid #164936;
        border-radius: 12px;
        background: #09251b;
        color: #8ca99e;
        font-size: 13px;
        white-space: nowrap;
    }

    .header-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #00f5a0;
        box-shadow: 0 0 12px rgba(0, 245, 160, 0.8);
    }

    /* =========================================================
       ALERTS
    ========================================================= */

    .custom-alert {
        border-radius: 12px;
        padding: 14px 17px;
        margin-bottom: 20px;
        border: 1px solid;
        font-size: 14px;
    }

    .custom-alert.success {
        background: rgba(0, 245, 160, 0.08);
        border-color: rgba(0, 245, 160, 0.25);
        color: #8dffd3;
    }

    .custom-alert.error {
        background: rgba(255, 75, 75, 0.08);
        border-color: rgba(255, 75, 75, 0.25);
        color: #ff9d9d;
    }

    .custom-alert ul {
        padding-left: 20px;
        margin-bottom: 0;
    }

    /* =========================================================
       TOP STAT CARDS
    ========================================================= */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 16px;
        margin-bottom: 22px;
    }

    .stat-card {
        position: relative;
        overflow: hidden;
        min-height: 125px;
        padding: 20px;
        border-radius: 16px;
        border: 1px solid #164936;
        background: linear-gradient(
            145deg,
            #0b261c,
            #081f17
        );
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .stat-card::after {
        content: "";
        position: absolute;
        width: 90px;
        height: 90px;
        right: -35px;
        top: -35px;
        border-radius: 50%;
        background: rgba(0, 245, 160, 0.06);
    }

    .stat-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 245, 160, 0.08);
        border: 1px solid rgba(0, 245, 160, 0.25);
        color: #00f5a0;
        font-size: 18px;
        margin-bottom: 15px;
    }

    .stat-label {
        color: #6e8b80;
        font-size: 12px;
        margin-bottom: 5px;
    }

    .stat-value {
        color: #ffffff;
        font-size: 26px;
        font-weight: 800;
    }

    /* =========================================================
       MAIN GRID
    ========================================================= */

    .content-grid {
        display: grid;
        grid-template-columns: minmax(280px, 0.75fr) minmax(0, 1.55fr);
        gap: 20px;
        align-items: start;
    }

    /* =========================================================
       PANELS
    ========================================================= */

    .panel {
        background: #09231a;
        border: 1px solid #164936;
        border-radius: 16px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.16);
        overflow: hidden;
    }

    .panel-header {
        padding: 21px 22px;
        border-bottom: 1px solid #123d2d;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .panel-title {
        margin: 0;
        color: #ffffff;
        font-size: 17px;
        font-weight: 750;
    }

    .panel-title span {
        color: #00f5a0;
    }

    .panel-subtitle {
        color: #638177;
        font-size: 12px;
        margin-top: 5px;
    }

    .panel-body {
        padding: 22px;
    }

    /* =========================================================
       FORM
    ========================================================= */

    .form-group {
        margin-bottom: 17px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #8ca79d;
        font-size: 12px;
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        background: #071c14 !important;
        border: 1px solid #1a4937 !important;
        color: #ecfff7 !important;
        border-radius: 10px;
        padding: 12px 13px;
        outline: none;
        font-size: 13px;
        transition: 0.2s ease;
    }

    .form-control::placeholder {
        color: #46665a;
    }

    .form-control:focus {
        border-color: #00d991 !important;
        box-shadow: 0 0 0 3px rgba(0, 245, 160, 0.08) !important;
    }

    textarea.form-control {
        min-height: 145px;
        resize: vertical;
    }

    .btn-add {
        width: 100%;
        border: none;
        border-radius: 10px;
        padding: 12px 18px;
        background: #00e89a;
        color: #032016;
        font-size: 13px;
        font-weight: 800;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-add:hover {
        background: #00ffab;
        transform: translateY(-1px);
        box-shadow: 0 8px 22px rgba(0, 245, 160, 0.15);
    }

    /* =========================================================
       ANNOUNCEMENTS
    ========================================================= */

    .announcement-list {
        display: flex;
        flex-direction: column;
        gap: 13px;
    }

    .announcement-card {
        position: relative;
        padding: 18px;
        border-radius: 13px;
        background: #071d15;
        border: 1px solid #153f30;
        transition: 0.2s ease;
    }

    .announcement-card:hover {
        border-color: #206148;
        transform: translateY(-1px);
        background: #082219;
    }

    .announcement-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 15px;
        margin-bottom: 10px;
    }

    .announcement-heading {
        display: flex;
        align-items: flex-start;
        gap: 11px;
        min-width: 0;
    }

    .announcement-icon {
        flex: 0 0 35px;
        width: 35px;
        height: 35px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        background: rgba(0, 245, 160, 0.08);
        border: 1px solid rgba(0, 245, 160, 0.22);
        color: #00f5a0;
        font-size: 15px;
    }

    .announcement-title {
        margin: 0;
        color: #f5fff9;
        font-size: 15px;
        font-weight: 750;
        line-height: 1.4;
        word-break: break-word;
    }

    .announcement-date {
        color: #55746a;
        font-size: 11px;
        white-space: nowrap;
    }

    .announcement-message {
        margin: 0 0 15px 46px;
        color: #78948a;
        font-size: 13px;
        line-height: 1.65;
        white-space: pre-line;
    }

    .announcement-actions {
        margin-left: 46px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        padding: 8px 13px;
        font-size: 11px;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition: 0.2s ease;
    }

    .btn-edit {
        background: rgba(0, 245, 160, 0.08);
        border: 1px solid rgba(0, 245, 160, 0.2);
        color: #00f5a0;
    }

    .btn-edit:hover {
        background: rgba(0, 245, 160, 0.14);
        color: #42ffc0;
    }

    .btn-delete {
        background: rgba(255, 76, 76, 0.07);
        border: 1px solid rgba(255, 76, 76, 0.2);
        color: #ff8585;
    }

    .btn-delete:hover {
        background: rgba(255, 76, 76, 0.13);
        color: #ffaaaa;
    }

    /* =========================================================
       EMPTY STATE
    ========================================================= */

    .empty-state {
        text-align: center;
        padding: 55px 20px;
        border: 1px dashed #1b4938;
        border-radius: 12px;
        background: #071d15;
    }

    .empty-icon {
        width: 52px;
        height: 52px;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        background: rgba(0, 245, 160, 0.07);
        border: 1px solid rgba(0, 245, 160, 0.18);
        color: #00e89a;
        font-size: 22px;
    }

    .empty-title {
        color: #d8eee5;
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 6px;
    }

    .empty-text {
        color: #58766b;
        font-size: 12px;
    }

    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media (max-width: 1100px) {
        .content-grid {
            grid-template-columns: 1fr;
        }

        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 800px) {
        .announcement-page {
            padding: 22px 18px 40px;
        }

        .announcement-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 550px) {
        .announcement-page {
            padding: 18px 13px 35px;
        }

        .page-title {
            font-size: 26px;
        }

        .panel-header,
        .panel-body {
            padding: 17px;
        }

        .announcement-card {
            padding: 15px;
        }

        .announcement-top {
            flex-direction: column;
        }

        .announcement-date {
            margin-left: 46px;
        }

        .announcement-message,
        .announcement-actions {
            margin-left: 0;
        }

        .announcement-heading {
            width: 100%;
        }
    }
</style>


<div class="announcement-page">

    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="announcement-header">

        <div class="header-left">

            <h1 class="page-title">
                Announcements
                <span>Center</span>
            </h1>

            <p class="page-subtitle">
                Create, publish and manage Campus Coin announcements.
            </p>

        </div>

        <div class="header-badge">
            <span class="header-dot"></span>
            Campus Coin Admin
        </div>

    </div>


    <!-- =====================================================
         SUCCESS MESSAGE
    ====================================================== -->

    @if(session('success'))

        <div class="custom-alert success">
            {{ session('success') }}
        </div>

    @endif


    <!-- =====================================================
         ERROR MESSAGE
    ====================================================== -->

    @if($errors->any())

        <div class="custom-alert error">

            <strong>Please fix the following:</strong>

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <!-- =====================================================
         STAT CARDS
    ====================================================== -->

    <div class="stats-grid">

        <div class="stat-card">

            <div class="stat-icon">
                📢
            </div>

            <div class="stat-label">
                Total Announcements
            </div>

            <div class="stat-value">
                {{ $announcements->count() }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ✓
            </div>

            <div class="stat-label">
                Published
            </div>

            <div class="stat-value">
                {{ $announcements->count() }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                ◷
            </div>

            <div class="stat-label">
                Latest Update
            </div>

            <div class="stat-value" style="font-size: 18px; margin-top: 5px;">

                @if($announcements->count())
                    {{ $announcements->first()->created_at?->format('d M Y') }}
                @else
                    —
                @endif

            </div>

        </div>

    </div>


    <!-- =====================================================
         MAIN CONTENT
    ====================================================== -->

    <div class="content-grid">


        <!-- =================================================
             ADD ANNOUNCEMENT
        ================================================== -->

        <div class="panel">

            <div class="panel-header">

                <div>
                    <h2 class="panel-title">
                        Add <span>Announcement</span>
                    </h2>

                    <div class="panel-subtitle">
                        Share an update with students
                    </div>
                </div>

            </div>


            <div class="panel-body">

                <form
                    method="POST"
                    action="{{ route('admin.announcements.store') }}"
                >

                    @csrf


                    <!-- TITLE -->

                    <div class="form-group">

                        <label class="form-label">
                            Announcement Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="form-control"
                            value="{{ old('title') }}"
                            placeholder="e.g. New Campus Event"
                            required
                        >

                    </div>


                    <!-- MESSAGE -->

                    <div class="form-group">

                        <label class="form-label">
                            Message
                        </label>

                        <textarea
                            name="message"
                            class="form-control"
                            rows="6"
                            placeholder="Write your announcement here..."
                            required
                        >{{ old('message') }}</textarea>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="btn-add"
                    >
                        + Publish Announcement
                    </button>

                </form>

            </div>

        </div>


        <!-- =================================================
             ALL ANNOUNCEMENTS
        ================================================== -->

        <div class="panel">

            <div class="panel-header">

                <div>

                    <h2 class="panel-title">
                        Recent <span>Announcements</span>
                    </h2>

                    <div class="panel-subtitle">
                        Manage your latest Campus Coin updates
                    </div>

                </div>

                <div style="
                    color:#58786c;
                    font-size:12px;
                ">
                    {{ $announcements->count() }} total
                </div>

            </div>


            <div class="panel-body">

                @forelse($announcements as $announcement)

                    <div class="announcement-list">

                        <div class="announcement-card">

                            <!-- TOP -->

                            <div class="announcement-top">

                                <div class="announcement-heading">

                                    <div class="announcement-icon">
                                        📢
                                    </div>

                                    <div>

                                        <h3 class="announcement-title">
                                            {{ $announcement->title }}
                                        </h3>

                                    </div>

                                </div>


                                <div class="announcement-date">

                                    {{ $announcement->created_at?->format('d M Y, h:i A') }}

                                </div>

                            </div>


                            <!-- MESSAGE -->

                            <div class="announcement-message">

                                {{ $announcement->message }}

                            </div>


                            <!-- ACTIONS -->

                            <div class="announcement-actions">

                                <!-- EDIT -->

                                <a
                                    href="{{ route('admin.announcements.edit', $announcement->id) }}"
                                    class="btn-action btn-edit"
                                >
                                    ✎ Edit
                                </a>


                                <!-- DELETE -->

                                <form
                                    method="POST"
                                    action="{{ route('admin.announcements.delete', $announcement->id) }}"
                                    onsubmit="return confirm('Are you sure you want to delete this announcement?');"
                                    style="display:inline;"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn-action btn-delete"
                                    >
                                        🗑 Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="empty-state">

                        <div class="empty-icon">
                            📢
                        </div>

                        <div class="empty-title">
                            No announcements yet
                        </div>

                        <div class="empty-text">
                            Create your first Campus Coin announcement using the form.
                        </div>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection
