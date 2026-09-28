@extends('layouts.student')

@section('title', 'My Profile')

@section('content')

<style>
    .profile-page {
        color: #e8f5ef;
        padding: 5px 0 40px;
    }

    .profile-header {
        margin-bottom: 25px;
    }

    .profile-header h1 {
        margin: 0 0 7px;
        font-size: 32px;
        font-weight: 800;
    }

    .profile-header p {
        margin: 0;
        color: #718e81;
        font-size: 14px;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 300px minmax(0, 1fr);
        gap: 22px;
    }

    .profile-card {
        background: #0d1813;
        border: 1px solid #1a3326;
        border-radius: 22px;
        overflow: hidden;
    }

    /* LEFT PROFILE */
    .profile-overview {
        padding: 28px 22px;
        text-align: center;
    }

    .profile-avatar-wrap {
        position: relative;
        width: 105px;
        height: 105px;
        margin: 0 auto 18px;
    }

    .profile-avatar {
        width: 105px;
        height: 105px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(
            145deg,
            #123c2a,
            #0a2117
        );
        border: 2px solid #00f59b;
        box-shadow: 0 0 25px rgba(0,245,155,.12);
        font-size: 39px;
        font-weight: 800;
        color: #00f59b;
    }

    .online-dot {
        position: absolute;
        right: 4px;
        bottom: 7px;
        width: 17px;
        height: 17px;
        background: #00f59b;
        border: 3px solid #0d1813;
        border-radius: 50%;
    }

    .profile-name {
        margin: 0 0 6px;
        font-size: 20px;
        font-weight: 800;
    }

    .profile-role {
        margin: 0;
        color: #718e81;
        font-size: 12px;
    }

    .profile-divider {
        height: 1px;
        background: #1a3326;
        margin: 24px 0;
    }

    .profile-mini-info {
        display: flex;
        flex-direction: column;
        gap: 14px;
        text-align: left;
    }

    .mini-item {
        display: flex;
        align-items: center;
        gap: 11px;
    }

    .mini-icon {
        width: 35px;
        height: 35px;
        min-width: 35px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,245,155,.07);
        border: 1px solid rgba(0,245,155,.12);
    }

    .mini-text small {
        display: block;
        color: #5e766b;
        font-size: 9px;
        margin-bottom: 3px;
        text-transform: uppercase;
        letter-spacing: .5px;
    }

    .mini-text span {
        display: block;
        color: #a8bdb3;
        font-size: 12px;
    }

    /* RIGHT */
    .profile-content {
        padding: 25px;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 11px;
        margin-bottom: 23px;
    }

    .section-heading-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,245,155,.08);
        color: #00f59b;
    }

    .section-heading h2 {
        margin: 0;
        font-size: 17px;
        font-weight: 750;
    }

    .section-heading p {
        margin: 3px 0 0;
        color: #637c70;
        font-size: 11px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 7px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-group label {
        color: #9bb1a6;
        font-size: 11px;
        font-weight: 650;
    }

    .form-control {
        width: 100%;
        box-sizing: border-box;
        padding: 12px 14px;
        border-radius: 11px;
        outline: none;
        border: 1px solid #1a3326;
        background: #101d16;
        color: #e8f5ef;
        font-size: 12px;
        transition: .2s ease;
    }

    .form-control::placeholder {
        color: #526b60;
    }

    .form-control:focus {
        border-color: rgba(0,245,155,.55);
        box-shadow: 0 0 0 3px rgba(0,245,155,.06);
    }

    textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .profile-actions {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #1a3326;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn {
        border: none;
        border-radius: 10px;
        padding: 11px 18px;
        cursor: pointer;
        font-size: 12px;
        font-weight: 700;
        transition: .2s ease;
    }

    .btn-cancel {
        background: #14231c;
        color: #91a89c;
        border: 1px solid #1a3326;
    }

    .btn-save {
        background: #00f59b;
        color: #06120c;
        box-shadow: 0 5px 18px rgba(0,245,155,.12);
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    /* PASSWORD */
    .password-section {
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #1a3326;
    }

    .password-box {
        padding: 18px;
        border-radius: 15px;
        background: #101d16;
        border: 1px solid #1a3326;
    }

    .password-box-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 17px;
    }

    .password-icon {
        width: 38px;
        height: 38px;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0,245,155,.08);
    }

    .password-box-header h3 {
        margin: 0;
        font-size: 14px;
    }

    .password-box-header p {
        margin: 3px 0 0;
        color: #60796d;
        font-size: 10px;
    }

    /* SECURITY */
    .security-box {
        margin-top: 18px;
        padding: 16px;
        border-radius: 14px;
        background: rgba(0,245,155,.035);
        border: 1px solid rgba(0,245,155,.10);
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .security-icon {
        width: 38px;
        height: 38px;
        min-width: 38px;
        border-radius: 11px;
        background: rgba(0,245,155,.08);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .security-box strong {
        display: block;
        color: #c6d9d0;
        font-size: 12px;
        margin-bottom: 3px;
    }

    .security-box span {
        color: #60796d;
        font-size: 10px;
    }

    @media (max-width: 950px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }

        .profile-overview {
            display: grid;
            grid-template-columns: auto 1fr;
            column-gap: 20px;
            text-align: left;
            align-items: center;
        }

        .profile-avatar-wrap {
            grid-row: span 2;
            margin: 0;
        }

        .profile-divider,
        .profile-mini-info {
            grid-column: 1 / -1;
        }
    }

    @media (max-width: 650px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .profile-content {
            padding: 18px;
        }

        .profile-overview {
            display: block;
            text-align: center;
        }

        .profile-avatar-wrap {
            margin: 0 auto 18px;
        }

        .profile-mini-info {
            text-align: left;
        }

        .profile-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }
    }
</style>


<div class="profile-page">

    <!-- HEADER -->
    <div class="profile-header">
        <h1>My Profile</h1>
        <p>Manage your personal information and account settings.</p>
    </div>


    <div class="profile-grid">

        <!-- LEFT PROFILE CARD -->
        <div class="profile-card">

            <div class="profile-overview">

                <div class="profile-avatar-wrap">

                    <div class="profile-avatar">
                        CC
                    </div>

                    <span class="online-dot"></span>

                </div>

                <div>
                    <h2 class="profile-name">
                        Campus Student
                    </h2>

                    <p class="profile-role">
                        Student Account
                    </p>
                </div>


                <div class="profile-divider"></div>


                <div class="profile-mini-info">

                    <div class="mini-item">

                        <div class="mini-icon">
                            🎓
                        </div>

                        <div class="mini-text">
                            <small>Student ID</small>
                            <span>CC-2026-001</span>
                        </div>

                    </div>


                    <div class="mini-item">

                        <div class="mini-icon">
                            📚
                        </div>

                        <div class="mini-text">
                            <small>Department</small>
                            <span>Computer Science</span>
                        </div>

                    </div>


                    <div class="mini-item">

                        <div class="mini-icon">
                            📅
                        </div>

                        <div class="mini-text">
                            <small>Semester</small>
                            <span>Semester 4</span>
                        </div>

                    </div>


                    <div class="mini-item">

                        <div class="mini-icon">
                            ✉️
                        </div>

                        <div class="mini-text">
                            <small>Email</small>
                            <span>student@campuscoin.com</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- RIGHT CONTENT -->
        <div class="profile-card">

            <div class="profile-content">

                <!-- PERSONAL INFORMATION -->

                <div class="section-heading">

                    <div class="section-heading-icon">
                        👤
                    </div>

                    <div>
                        <h2>Personal Information</h2>
                        <p>Update your personal details</p>
                    </div>

                </div>


                <form onsubmit="saveProfile(event)">

                    <div class="form-grid">

                        <div class="form-group">

                            <label>Full Name</label>

                            <input
                                type="text"
                                class="form-control"
                                value="Campus Student"
                                placeholder="Enter your full name"
                            >

                        </div>


                        <div class="form-group">

                            <label>Email Address</label>

                            <input
                                type="email"
                                class="form-control"
                                value="student@campuscoin.com"
                                placeholder="Enter your email"
                            >

                        </div>


                        <div class="form-group">

                            <label>Phone Number</label>

                            <input
                                type="text"
                                class="form-control"
                                value="+92 300 1234567"
                                placeholder="Enter phone number"
                            >

                        </div>


                        <div class="form-group">

                            <label>Student ID</label>

                            <input
                                type="text"
                                class="form-control"
                                value="CC-2026-001"
                                readonly
                            >

                        </div>


                        <div class="form-group">

                            <label>Department</label>

                            <select class="form-control">

                                <option>Computer Science</option>
                                <option>Business Administration</option>
                                <option>Software Engineering</option>
                                <option>Information Technology</option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label>Semester</label>

                            <select class="form-control">

                                <option>Semester 1</option>
                                <option>Semester 2</option>
                                <option>Semester 3</option>
                                <option selected>Semester 4</option>
                                <option>Semester 5</option>
                                <option>Semester 6</option>
                                <option>Semester 7</option>
                                <option>Semester 8</option>

                            </select>

                        </div>


                        <div class="form-group full">

                            <label>Bio</label>

                            <textarea
                                class="form-control"
                                placeholder="Write something about yourself..."
                            >Computer Science student using Campus Coin to manage my campus finances.</textarea>

                        </div>

                    </div>


                    <!-- ACTIONS -->

                    <div class="profile-actions">

                        <button
                            type="button"
                            class="btn btn-cancel"
                            onclick="location.reload()"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="btn btn-save"
                        >
                            ✓ Save Changes
                        </button>

                    </div>

                </form>


                <!-- PASSWORD -->

                <div class="password-section">

                    <div class="section-heading">

                        <div class="section-heading-icon">
                            🔐
                        </div>

                        <div>
                            <h2>Password & Security</h2>
                            <p>Keep your Campus Coin account secure</p>
                        </div>

                    </div>


                    <div class="password-box">

                        <div class="password-box-header">

                            <div class="password-icon">
                                🔑
                            </div>

                            <div>
                                <h3>Change Password</h3>
                                <p>
                                    Update your password regularly for better security.
                                </p>
                            </div>

                        </div>


                        <div class="form-grid">

                            <div class="form-group">

                                <label>Current Password</label>

                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Current password"
                                >

                            </div>


                            <div class="form-group">

                                <label>New Password</label>

                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="New password"
                                >

                            </div>

                        </div>


                        <div style="margin-top:15px;">

                            <button
                                type="button"
                                class="btn btn-save"
                                onclick="changePassword()"
                            >
                                Update Password
                            </button>

                        </div>

                    </div>


                    <div class="security-box">

                        <div class="security-icon">
                            🛡️
                        </div>

                        <div>
                            <strong>Your account is protected</strong>
                            <span>
                                Keep your login details private and secure.
                            </span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

    function saveProfile(event) {

        event.preventDefault();

        alert('Profile changes saved successfully!');

    }


    function changePassword() {

        alert('Password update section is ready. Backend will be connected later.');

    }

</script>

@endsection
