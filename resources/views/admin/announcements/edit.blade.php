@extends('layouts.admin')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    body {
        background: #f4f8f5;
        font-family: Arial, sans-serif;
        color: #12372a;
        width: 100%;
        overflow-x: hidden;
    }

    .main {
        margin: 0;
        padding: 10px;
        min-height: 100vh;
        width: 100%;
        max-width: 100%;
    }

    .page-title {
        font-size: 30px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .page-subtitle {
        color: #6c7b73;
        margin-bottom: 25px;
    }

    .card-box {
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        width: 100%;
        max-width: 900px;
    }

    .card-title {
        color: #12372a;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #12372a;
        margin-bottom: 7px;
    }

    .form-control {
        border-radius: 8px;
        padding: 11px 13px;
        border: 1px solid #d5dfd9;
    }

    .form-control:focus {
        border-color: #176b4d;
        box-shadow: 0 0 0 0.15rem rgba(23, 107, 77, 0.15);
    }

    .btn-green {
        background: #176b4d;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        transition: 0.2s ease;
    }

    .btn-green:hover {
        background: #0f5139;
        color: white;
        transform: translateY(-1px);
    }

    .btn-secondary-custom {
        background: #e9efeb;
        color: #12372a;
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        text-decoration: none;
        display: inline-block;
        margin-left: 8px;
        transition: 0.2s ease;
    }

    .btn-secondary-custom:hover {
        background: #dce7e0;
        color: #12372a;
    }

    .announcement-preview {
        margin-top: 25px;
        padding: 20px;
        border-radius: 12px;
        background: #fbfdfc;
        border: 1px solid #e1e9e4;
    }

    .preview-label {
        font-size: 12px;
        font-weight: bold;
        color: #176b4d;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .preview-title {
        font-size: 19px;
        font-weight: bold;
        color: #12372a;
        margin-bottom: 8px;
    }

    .preview-message {
        color: #56645d;
        line-height: 1.6;
        white-space: pre-line;
    }

    @media (max-width: 768px) {

        .main {
            padding: 20px;
        }

        .page-title {
            font-size: 26px;
        }

        .card-box {
            padding: 20px;
        }
    }

    @media (max-width: 480px) {

        .main {
            padding: 15px;
        }

        .page-title {
            font-size: 23px;
        }

        .page-subtitle {
            font-size: 14px;
        }

        .card-box {
            padding: 16px;
        }

        .btn-secondary-custom {
            margin-left: 0;
            margin-top: 8px;
        }
    }
</style>


<div class="main">

    <!-- PAGE TITLE -->

    <div class="page-title">
        Edit Announcement
    </div>

    <div class="page-subtitle">
        Update your Campus Coin announcement.
    </div>


    <!-- ERROR MESSAGE -->

    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Please fix the following:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- EDIT CARD -->

    <div class="card-box">

        <h4 class="card-title">
            Update Announcement
        </h4>


        <form
            method="POST"
            action="{{ route('admin.announcements.update', $announcement->id) }}"
        >

            @csrf

            @method('PUT')


            <!-- TITLE -->

            <div class="mb-3">

                <label class="form-label">
                    Title
                </label>

                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $announcement->title) }}"
                    placeholder="Enter announcement title"
                    required
                >

            </div>


            <!-- MESSAGE -->

            <div class="mb-3">

                <label class="form-label">
                    Message
                </label>

                <textarea
                    name="message"
                    class="form-control"
                    rows="6"
                    placeholder="Write announcement message..."
                    required
                >{{ old('message', $announcement->message) }}</textarea>

            </div>


            <!-- BUTTONS -->

            <button
                type="submit"
                class="btn btn-green"
            >
                Update Announcement
            </button>


            <a
                href="{{ route('admin.announcements') }}"
                class="btn-secondary-custom"
            >
                Cancel
            </a>

        </form>


        <!-- PREVIEW -->

        <div class="announcement-preview">

            <div class="preview-label">
                Campus Coin Preview
            </div>

            <div class="preview-title">
                {{ $announcement->title }}
            </div>

            <div class="preview-message">
                {{ $announcement->message }}
            </div>

        </div>

    </div>

</div>

@endsection