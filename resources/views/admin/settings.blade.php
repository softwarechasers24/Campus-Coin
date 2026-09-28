@extends('layouts.admin')

@section('content')

<style>
    /* =====================================================
       CAMPUS COIN — SETTINGS PAGE
       DARK GREEN + NEON MINT THEME
    ===================================================== */

    .settings-page {
        width: 100%;
        min-height: calc(100vh - 30px);
        padding: 28px;
        color: #E8F5EF;

        background:
            radial-gradient(
                circle at 8% 5%,
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


    /* =====================================================
       TOPBAR
    ===================================================== */

    .settings-topbar {
        min-height: 48px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;
        margin-bottom: 28px;
    }

    .settings-page .search-top {
        width: 280px;

        background: #0D1813;
        border: 1px solid #1A3326;

        border-radius: 10px;

        padding: 11px 14px;

        outline: none;

        font-size: 12px;

        color: #E8F5EF;

        transition: .2s ease;
    }

    .settings-page .search-top::placeholder {
        color: #536C60;
    }

    .settings-page .search-top:focus {
        border-color: #00F59B;

        box-shadow:
            0 0 0 3px rgba(0,245,155,.08),
            0 0 20px rgba(0,245,155,.04);
    }

    .top-right {
        display: flex;
        align-items: center;
        gap: 18px;
    }

    .notification {
        width: 34px;
        height: 34px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 9px;

        color: #00F59B;

        background: rgba(0,245,155,.06);
        border: 1px solid #1A3326;

        font-size: 15px;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 8px;

        font-size: 12px;
        font-weight: 700;

        color: #E8F5EF;
    }

    .profile-circle {
        width: 32px;
        height: 32px;

        border-radius: 50%;

        background:
            linear-gradient(
                135deg,
                rgba(0,245,155,.20),
                rgba(16,185,129,.08)
            );

        border: 1px solid rgba(0,245,155,.25);

        display: flex;
        align-items: center;
        justify-content: center;

        color: #00F59B;

        font-weight: 800;

        box-shadow: 0 0 15px rgba(0,245,155,.06);
    }


    /* =====================================================
       PAGE HEADER
    ===================================================== */

    .page-header {
        margin-bottom: 24px;
    }

    .page-header h1 {
        font-size: 28px;

        font-weight: 800;

        letter-spacing: -.5px;

        color: #E8F5EF;

        margin: 0 0 7px;
    }

    .page-header p {
        color: #718E81;

        font-size: 13px;

        margin: 0;
    }


    /* =====================================================
       SETTINGS LAYOUT
    ===================================================== */

    .settings-layout {
        display: grid;

        grid-template-columns: 215px minmax(0, 720px);

        gap: 20px;

        align-items: start;
    }


    /* =====================================================
       SETTINGS MENU
    ===================================================== */

    .settings-menu {
        background:
            linear-gradient(
                145deg,
                rgba(18,35,27,.98),
                rgba(13,24,19,.98)
            );

        border: 1px solid #1A3326;

        border-radius: 15px;

        padding: 10px;

        width: 215px;

        box-shadow: 0 14px 38px rgba(0,0,0,.18);
    }

    .settings-menu button {
        width: 100%;

        border: 1px solid transparent;

        background: transparent;

        text-align: left;

        padding: 12px 13px;

        border-radius: 9px;

        color: #718E81;

        font-size: 11px;

        cursor: pointer;

        margin-bottom: 5px;

        transition: .22s ease;
    }

    .settings-menu button:last-child {
        margin-bottom: 0;
    }

    .settings-menu button:hover {
        background: rgba(0,245,155,.06);

        color: #B9FFE4;

        border-color: rgba(0,245,155,.10);

        transform: translateX(2px);
    }

    .settings-menu button.active {
        background:
            linear-gradient(
                90deg,
                rgba(0,245,155,.13),
                rgba(0,245,155,.05)
            );

        color: #00F59B;

        border-color: rgba(0,245,155,.20);

        font-weight: 800;

        box-shadow:
            inset 3px 0 0 #00F59B,
            0 0 18px rgba(0,245,155,.035);
    }


    /* =====================================================
       SETTINGS CONTENT
    ===================================================== */

    .settings-content {
        width: 100%;

        background:
            linear-gradient(
                145deg,
                rgba(18,35,27,.98),
                rgba(13,24,19,.98)
            );

        border: 1px solid #1A3326;

        border-radius: 16px;

        padding: 25px;

        box-shadow: 0 14px 38px rgba(0,0,0,.18);
    }

    .setting-section {
        display: none;
    }

    .setting-section.active {
        display: block;
    }


    /* =====================================================
       SECTION HEADING
    ===================================================== */

    .section-heading {
        padding-bottom: 17px;

        border-bottom: 1px solid #1A3326;

        margin-bottom: 20px;
    }

    .section-heading h2 {
        font-size: 17px;

        font-weight: 800;

        color: #E8F5EF;

        margin: 0 0 6px;
    }

    .section-heading p {
        font-size: 10px;

        color: #718E81;

        margin: 0;
    }


    /* =====================================================
       FORM
    ===================================================== */

    .form-grid {
        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 16px;
    }

    .form-group {
        margin-bottom: 16px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        display: block;

        font-size: 10px;

        font-weight: 800;

        color: #B9CCC2;

        margin-bottom: 7px;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;

        border: 1px solid #1A3326;

        border-radius: 9px;

        padding: 11px 12px;

        font-size: 11px;

        outline: none;

        color: #E8F5EF;

        background: #080E0B;

        transition: .2s ease;
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #536C60;
    }

    .form-group input:hover,
    .form-group select:hover,
    .form-group textarea:hover {
        border-color: #28513D;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
        border-color: #00F59B;

        background: #080E0B;

        color: #E8F5EF;

        box-shadow:
            0 0 0 3px rgba(0,245,155,.08),
            0 0 18px rgba(0,245,155,.03);
    }

    .form-group select option {
        background: #0D1813;
        color: #E8F5EF;
    }

    .form-group textarea {
        height: 95px;

        resize: vertical;
    }


    /* =====================================================
       PROFILE
    ===================================================== */

    .profile-box {
        display: flex;

        align-items: center;

        gap: 15px;

        background:
            linear-gradient(
                135deg,
                rgba(0,245,155,.07),
                rgba(13,24,19,.65)
            );

        border: 1px solid #1A3326;

        border-radius: 12px;

        padding: 16px;

        margin-bottom: 20px;

        box-shadow:
            inset 0 0 25px rgba(0,245,155,.018);
    }

    .large-profile {
        width: 56px;
        height: 56px;

        flex-shrink: 0;

        border-radius: 50%;

        background:
            linear-gradient(
                135deg,
                rgba(0,245,155,.20),
                rgba(16,185,129,.08)
            );

        border: 1px solid rgba(0,245,155,.25);

        color: #00F59B;

        display: flex;

        align-items: center;

        justify-content: center;

        font-size: 20px;

        font-weight: 800;

        box-shadow: 0 0 20px rgba(0,245,155,.06);
    }

    .profile-info h3 {
        font-size: 14px;

        font-weight: 800;

        color: #E8F5EF;

        margin: 0 0 4px;
    }

    .profile-info p {
        font-size: 9px;

        color: #718E81;

        margin: 0;
    }


    /* =====================================================
       TOGGLE
    ===================================================== */

    .toggle-row {
        display: flex;

        justify-content: space-between;

        align-items: center;

        padding: 15px 0;

        border-bottom: 1px solid #1A3326;

        gap: 20px;
    }

    .toggle-row:last-child {
        border-bottom: none;
    }

    .toggle-text h3 {
        font-size: 11px;

        color: #DDEEE6;

        font-weight: 700;

        margin: 0 0 4px;
    }

    .toggle-text p {
        font-size: 9px;

        color: #718E81;

        margin: 0;

        line-height: 1.5;
    }

    .switch {
        position: relative;

        width: 40px;

        height: 21px;

        flex-shrink: 0;
    }

    .switch input {
        display: none;
    }

    .slider {
        position: absolute;

        inset: 0;

        background: #1A3326;

        border: 1px solid #28513D;

        border-radius: 20px;

        cursor: pointer;

        transition: .25s ease;
    }

    .slider:before {
        content: "";

        position: absolute;

        width: 15px;

        height: 15px;

        left: 2px;

        top: 2px;

        background: #718E81;

        border-radius: 50%;

        transition: .25s ease;
    }

    input:checked + .slider {
        background: rgba(0,245,155,.20);

        border-color: #00F59B;

        box-shadow: 0 0 12px rgba(0,245,155,.08);
    }

    input:checked + .slider:before {
        transform: translateX(18px);

        background: #00F59B;

        box-shadow: 0 0 10px rgba(0,245,155,.35);
    }


    /* =====================================================
       SECURITY
    ===================================================== */

    .security-card {
        background:
            linear-gradient(
                135deg,
                rgba(0,245,155,.05),
                rgba(13,24,19,.8)
            );

        border: 1px solid #1A3326;

        border-radius: 10px;

        padding: 15px;

        margin-bottom: 15px;
    }

    .security-card h3 {
        font-size: 12px;

        font-weight: 800;

        color: #E8F5EF;

        margin: 0 0 6px;
    }

    .security-card p {
        font-size: 9px;

        color: #718E81;

        line-height: 1.6;

        margin: 0;
    }


    /* =====================================================
       BUTTONS
    ===================================================== */

    .save-area {
        display: flex;

        justify-content: flex-end;

        gap: 9px;

        margin-top: 20px;

        padding-top: 17px;

        border-top: 1px solid #1A3326;
    }

    .cancel-btn {
        border: 1px solid #1A3326;

        background: #12231B;

        color: #9FB4A8;

        padding: 10px 19px;

        border-radius: 9px;

        cursor: pointer;

        font-size: 10px;

        font-weight: 700;

        transition: .2s ease;
    }

    .cancel-btn:hover {
        background: #1A3326;

        color: #E8F5EF;

        border-color: #28513D;
    }

    .save-btn {
        border: 1px solid #00F59B;

        background: #00F59B;

        color: #06100B;

        padding: 10px 20px;

        border-radius: 9px;

        cursor: pointer;

        font-size: 10px;

        font-weight: 800;

        transition: .2s ease;

        box-shadow: 0 7px 20px rgba(0,245,155,.10);
    }

    .save-btn:hover {
        background: #39FFB5;

        border-color: #39FFB5;

        transform: translateY(-1px);

        box-shadow: 0 10px 25px rgba(0,245,155,.18);
    }


    /* =====================================================
       SCROLLBAR
    ===================================================== */

    .settings-page ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    .settings-page ::-webkit-scrollbar-track {
        background: #080E0B;
    }

    .settings-page ::-webkit-scrollbar-thumb {
        background: #1A3326;
        border-radius: 10px;
    }

    .settings-page ::-webkit-scrollbar-thumb:hover {
        background: #28513D;
    }


    /* =====================================================
       RESPONSIVE
    ===================================================== */

    @media (max-width: 1000px) {

        .settings-layout {
            grid-template-columns: 190px minmax(0, 1fr);
        }

        .settings-menu {
            width: 190px;
        }

    }


    @media (max-width: 800px) {

        .settings-page {
            padding: 22px 18px;
        }

        .settings-layout {
            grid-template-columns: 1fr;
        }

        .settings-menu {
            width: 100%;

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 5px;
        }

        .settings-menu button {
            margin-bottom: 0;
        }

        .settings-content {
            width: 100%;
        }

    }


    @media (max-width: 650px) {

        .settings-page {
            padding: 18px 14px;
        }

        .settings-topbar {
            height: auto;

            flex-direction: column;

            align-items: stretch;

            gap: 12px;
        }

        .search-top {
            width: 100%;
        }

        .top-right {
            justify-content: flex-end;
        }

        .settings-layout {
            grid-template-columns: 1fr;
        }

        .settings-menu {
            grid-template-columns: 1fr 1fr;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .settings-content {
            padding: 18px;
        }

        .page-header h1 {
            font-size: 23px;
        }

        .page-header p {
            font-size: 12px;
        }

    }


    @media (max-width: 420px) {

        .settings-menu {
            grid-template-columns: 1fr;
        }

        .settings-menu button {
            padding: 11px;
        }

        .profile-box {
            align-items: flex-start;
        }

        .save-area {
            flex-direction: column;
        }

        .cancel-btn,
        .save-btn {
            width: 100%;
        }

    }

</style>


<div class="settings-page">


    <!-- =================================================
         TOPBAR
    ================================================= -->

    <div class="settings-topbar">

        <input
            type="text"
            class="search-top"
            placeholder="Search settings..."
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

                <span>
                    ⌄
                </span>

            </div>

        </div>

    </div>


    <!-- =================================================
         PAGE HEADER
    ================================================= -->

    <div class="page-header">

        <h1>
            Settings
        </h1>

        <p>
            Manage your Campus Coin admin account and application settings.
        </p>

    </div>


    <!-- =================================================
         SETTINGS
    ================================================= -->

    <div class="settings-layout">


        <!-- =============================================
             SETTINGS MENU
        ============================================== -->

        <div class="settings-menu">

            <button
                type="button"
                class="settings-tab active"
                onclick="showSetting('profile', this)"
            >
                👤 &nbsp; Profile
            </button>


            <button
                type="button"
                class="settings-tab"
                onclick="showSetting('general', this)"
            >
                ⚙ &nbsp; General
            </button>


            <button
                type="button"
                class="settings-tab"
                onclick="showSetting('notifications', this)"
            >
                🔔 &nbsp; Notifications
            </button>


            <button
                type="button"
                class="settings-tab"
                onclick="showSetting('security', this)"
            >
                🔒 &nbsp; Security
            </button>

        </div>


        <!-- =============================================
             SETTINGS CONTENT
        ============================================== -->

        <div class="settings-content">


            <!-- =========================================
                 PROFILE
            ========================================== -->

            <div
                class="setting-section active"
                id="profile"
            >

                <div class="section-heading">

                    <h2>
                        Profile Settings
                    </h2>

                    <p>
                        Update your administrator account information.
                    </p>

                </div>


                <div class="profile-box">

                    <div class="large-profile">
                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                    </div>

                    <div class="profile-info">

                        <h3>
                            {{ auth()->user()->name ?? 'User' }}
                        </h3>

                        <p>
                            Administrator Account
                        </p>

                    </div>

                </div>


                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            Full Name
                        </label>

                        <input
                            type="text"
                            value="{{ auth()->user()->name ?? 'User' }}"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Email Address
                        </label>

                        <input
                            type="email"
                            value="{{ auth()->user()->email ?? '' }}"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Phone Number
                        </label>

                        <input
                            type="text"
                            placeholder="Enter phone number"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Role
                        </label>

                        <input
                            type="text"
                            value="Administrator"
                            readonly
                        >

                    </div>


                </div>


                <div class="save-area">

                    <button
                        type="button"
                        class="cancel-btn"
                    >
                        Cancel
                    </button>

                    <button
                        type="button"
                        class="save-btn"
                        onclick="saveSettings()"
                    >
                        Save Changes
                    </button>

                </div>


            </div>


            <!-- =========================================
                 GENERAL
            ========================================== -->

            <div
                class="setting-section"
                id="general"
            >

                <div class="section-heading">

                    <h2>
                        General Settings
                    </h2>

                    <p>
                        Configure basic Campus Coin application preferences.
                    </p>

                </div>


                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            Application Name
                        </label>

                        <input
                            type="text"
                            value="Campus Coin"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Currency
                        </label>

                        <select>

                            <option selected>
                                Pakistani Rupee (₨)
                            </option>

                            <option>
                                US Dollar ($)
                            </option>

                            <option>
                                Euro (€)
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Time Zone
                        </label>

                        <select>

                            <option selected>
                                Asia/Karachi
                            </option>

                            <option>
                                UTC
                            </option>

                            <option>
                                Asia/Dubai
                            </option>

                        </select>

                    </div>


                    <div class="form-group">

                        <label>
                            Date Format
                        </label>

                        <select>

                            <option selected>
                                DD-MM-YYYY
                            </option>

                            <option>
                                MM-DD-YYYY
                            </option>

                            <option>
                                YYYY-MM-DD
                            </option>

                        </select>

                    </div>


                    <div class="form-group full">

                        <label>
                            Application Description
                        </label>

                        <textarea>Campus Coin is a student financial management platform for tracking income, expenses, budgets and financial activities.</textarea>

                    </div>


                </div>


                <div class="save-area">

                    <button
                        type="button"
                        class="cancel-btn"
                    >
                        Cancel
                    </button>

                    <button
                        type="button"
                        class="save-btn"
                        onclick="saveSettings()"
                    >
                        Save Changes
                    </button>

                </div>


            </div>


            <!-- =========================================
                 NOTIFICATIONS
            ========================================== -->

            <div
                class="setting-section"
                id="notifications"
            >

                <div class="section-heading">

                    <h2>
                        Notification Settings
                    </h2>

                    <p>
                        Choose which notifications you want to receive.
                    </p>

                </div>


                <div class="toggle-row">

                    <div class="toggle-text">

                        <h3>
                            New User Registration
                        </h3>

                        <p>
                            Get notified when a new student creates an account.
                        </p>

                    </div>

                    <label class="switch">

                        <input
                            type="checkbox"
                            checked
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <div class="toggle-row">

                    <div class="toggle-text">

                        <h3>
                            New Transactions
                        </h3>

                        <p>
                            Receive notifications about new transactions.
                        </p>

                    </div>

                    <label class="switch">

                        <input
                            type="checkbox"
                            checked
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <div class="toggle-row">

                    <div class="toggle-text">

                        <h3>
                            Budget Alerts
                        </h3>

                        <p>
                            Get alerts when students approach their budget limit.
                        </p>

                    </div>

                    <label class="switch">

                        <input
                            type="checkbox"
                            checked
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <div class="toggle-row">

                    <div class="toggle-text">

                        <h3>
                            Weekly Reports
                        </h3>

                        <p>
                            Receive weekly financial activity summaries.
                        </p>

                    </div>

                    <label class="switch">

                        <input
                            type="checkbox"
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <div class="toggle-row">

                    <div class="toggle-text">

                        <h3>
                            Announcement Notifications
                        </h3>

                        <p>
                            Get notified when important announcements are published.
                        </p>

                    </div>

                    <label class="switch">

                        <input
                            type="checkbox"
                            checked
                        >

                        <span class="slider"></span>

                    </label>

                </div>


                <div class="save-area">

                    <button
                        type="button"
                        class="save-btn"
                        onclick="saveSettings()"
                    >
                        Save Notification Settings
                    </button>

                </div>


            </div>


            <!-- =========================================
                 SECURITY
            ========================================== -->

            <div
                class="setting-section"
                id="security"
            >

                <div class="section-heading">

                    <h2>
                        Security Settings
                    </h2>

                    <p>
                        Manage your password and account security.
                    </p>

                </div>


                <div class="security-card">

                    <h3>
                        Change Password
                    </h3>

                    <p>
                        Update your administrator password regularly
                        to keep your Campus Coin account secure.
                    </p>

                </div>


                <div class="form-group">

                    <label>
                        Current Password
                    </label>

                    <input
                        type="password"
                        placeholder="Enter current password"
                    >

                </div>


                <div class="form-grid">

                    <div class="form-group">

                        <label>
                            New Password
                        </label>

                        <input
                            type="password"
                            placeholder="Enter new password"
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            Confirm New Password
                        </label>

                        <input
                            type="password"
                            placeholder="Confirm new password"
                        >

                    </div>

                </div>


                <div class="security-card">

                    <h3>
                        Account Protection
                    </h3>

                    <p>
                        Keep your login details private and use a strong
                        password for administrator access.
                    </p>

                </div>


                <div class="save-area">

                    <button
                        type="button"
                        class="cancel-btn"
                    >
                        Cancel
                    </button>

                    <button
                        type="button"
                        class="save-btn"
                        onclick="saveSettings()"
                    >
                        Update Password
                    </button>

                </div>


            </div>


        </div>

    </div>

</div>


<script>

    /* =====================================================
       SETTINGS TABS
    ===================================================== */

    function showSetting(sectionId, button) {

        const sections =
            document.querySelectorAll('.settings-page .setting-section');

        const tabs =
            document.querySelectorAll('.settings-page .settings-tab');


        sections.forEach(function(section) {

            section.classList.remove('active');

        });


        tabs.forEach(function(tab) {

            tab.classList.remove('active');

        });


        const selectedSection =
            document.getElementById(sectionId);


        if (selectedSection) {

            selectedSection.classList.add('active');

        }


        if (button) {

            button.classList.add('active');

        }

    }


    /* =====================================================
       SAVE MESSAGE
    ===================================================== */

    function saveSettings() {

        alert('Settings saved successfully!');

    }

</script>

@endsection