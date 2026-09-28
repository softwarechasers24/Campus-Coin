@extends('layouts.student')

@section('title', 'Reports')

@section('content')

<style>
/* =========================================================
   MAIN CAMPUS COIN SECTION
========================================================= */

.campus-chat-section {
    width: 100%;
    min-height: 100vh;

    margin-right: 0;
    margin-left: 0;

    padding: 60px 5%;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 45px;

    background:
        radial-gradient(
            circle at 10% 20%,
            rgba(34,197,94,.12),
            transparent 30%
        ),
        linear-gradient(
            135deg,
            #f4faf5,
            #ffffff
        );

    box-sizing: border-box;
}


/* =========================================================
   RIGHT SIDEBAR
========================================================= */

/* Sidebar is already provided by layouts.admin */


/* =========================================================
   LEFT SIDE
========================================================= */

.campus-chat-left {
    flex: 1;

    max-width: 650px;
}


/* =========================================================
   BADGE
========================================================= */

.chat-badge {
    display: inline-flex;

    align-items: center;

    gap: 8px;

    padding: 8px 15px;

    background: #dcfce7;

    border: 1px solid #bbf7d0;

    border-radius: 30px;

    color: #166534;

    font-size: 13px;

    font-weight: 700;

    margin-bottom: 18px;
}

.chat-badge span {
    width: 8px;
    height: 8px;

    border-radius: 50%;

    background: #22c55e;

    box-shadow:
        0 0 0 4px rgba(34,197,94,.12);
}


/* =========================================================
   HEADING
========================================================= */

.campus-chat-left h1 {
    margin: 0;

    font-size: clamp(36px, 5vw, 58px);

    line-height: 1.08;

    font-weight: 800;

    color: #0b2e1d;

    letter-spacing: -1.5px;
}

.campus-chat-left h1 span {
    color: #15803d;
}


/* =========================================================
   DESCRIPTION
========================================================= */

.campus-chat-description {
    margin-top: 20px;

    max-width: 570px;

    font-size: 17px;

    line-height: 1.7;

    color: #64756a;
}


/* =========================================================
   FEATURES
========================================================= */

.chat-features {
    display: grid;

    grid-template-columns:
        repeat(2, minmax(0, 1fr));

    gap: 14px;

    margin-top: 30px;

    max-width: 580px;
}

.chat-feature {
    display: flex;

    align-items: center;

    gap: 13px;

    padding: 15px;

    background: rgba(255,255,255,.8);

    border: 1px solid #dce8df;

    border-radius: 15px;

    box-shadow:
        0 5px 18px rgba(20,83,45,.05);

    transition: all .25s ease;
}

.chat-feature:hover {
    transform: translateY(-3px);

    border-color: #86efac;

    box-shadow:
        0 10px 25px rgba(20,83,45,.10);
}

.chat-feature-icon {
    width: 43px;
    height: 43px;

    flex-shrink: 0;

    border-radius: 12px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #dcfce7;

    font-size: 20px;
}

.chat-feature h4 {
    margin: 0 0 3px;

    color: #163222;

    font-size: 14px;
}

.chat-feature p {
    margin: 0;

    color: #789084;

    font-size: 11px;
}


/* =========================================================
   CTA
========================================================= */

.chat-cta {
    display: flex;

    align-items: center;

    gap: 12px;

    margin-top: 28px;

    color: #52665a;

    font-size: 13px;
}

.chat-cta-icon {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #14532d;

    color: white;

    font-size: 17px;
}


/* =========================================================
   CHAT RIGHT AREA
========================================================= */

.campus-chat-right {
    width: 410px;

    flex-shrink: 0;

    display: flex;

    justify-content: center;
}


/* =========================================================
   CHAT BOX
========================================================= */

.campus-chat-box {
    width: 100%;

    height: 570px;

    background: white;

    border-radius: 25px;

    overflow: hidden;

    border: 1px solid #dce8df;

    box-shadow:
        0 25px 65px rgba(11,46,29,.18),
        0 8px 25px rgba(0,0,0,.06);

    display: flex;

    flex-direction: column;
}


/* =========================================================
   CHAT HEADER
========================================================= */

.campus-chat-header {
    min-height: 82px;

    padding: 15px 17px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    color: white;

    background:
        linear-gradient(
            135deg,
            #0b2e1d,
            #14532d,
            #166534
        );

    position: relative;

    overflow: hidden;
}

.campus-chat-header::after {
    content: "";

    position: absolute;

    width: 150px;
    height: 150px;

    right: -70px;
    top: -80px;

    border-radius: 50%;

    background: rgba(74,222,128,.12);
}

.chat-profile {
    display: flex;

    align-items: center;

    gap: 12px;

    position: relative;

    z-index: 2;
}

.chat-avatar {
    width: 48px;
    height: 48px;

    border-radius: 15px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: rgba(255,255,255,.15);

    border: 1px solid rgba(255,255,255,.2);

    font-size: 23px;
}

.chat-title {
    margin: 0;

    font-size: 17px;

    font-weight: 700;
}

.chat-subtitle {
    margin-top: 4px;

    display: flex;

    align-items: center;

    gap: 6px;

    font-size: 11px;

    color: #bbf7d0;
}

.online-dot {
    width: 7px;
    height: 7px;

    border-radius: 50%;

    background: #4ade80;
}


/* =========================================================
   CHAT MESSAGES
========================================================= */

.campus-chat-messages {
    flex: 1;

    padding: 20px 17px;

    overflow-y: auto;

    background:
        radial-gradient(
            circle at top left,
            rgba(34,197,94,.07),
            transparent 35%
        ),
        #f4f9f5;
}

.campus-chat-messages::-webkit-scrollbar {
    width: 5px;
}

.campus-chat-messages::-webkit-scrollbar-thumb {
    background: #bbd8c5;

    border-radius: 10px;
}


/* =========================================================
   CHAT MESSAGE
========================================================= */

.cc-message {
    max-width: 82%;

    padding: 11px 14px;

    margin-bottom: 12px;

    border-radius: 17px;

    font-size: 13.5px;

    line-height: 1.5;

    word-wrap: break-word;
}

.cc-bot {
    background: white;

    color: #1f3025;

    border: 1px solid #dce8df;

    border-bottom-left-radius: 5px;

    margin-right: auto;
}

.cc-user {
    background:
        linear-gradient(
            135deg,
            #14532d,
            #15803d
        );

    color: white;

    margin-left: auto;

    border-bottom-right-radius: 5px;
}


/* =========================================================
   TYPING
========================================================= */

.chat-loading {
    opacity: .7;

    font-style: italic;
}


/* =========================================================
   INPUT
========================================================= */

.campus-chat-input {
    min-height: 76px;

    padding: 12px;

    display: flex;

    gap: 9px;

    align-items: center;

    background: white;

    border-top: 1px solid #dce8df;
}

.campus-chat-input input {
    flex: 1;

    height: 48px;

    border-radius: 15px;

    border: 1px solid #dbe8df;

    background: #f5faf6;

    padding: 0 15px;

    outline: none;

    font-size: 13px;
}

.campus-chat-input input:focus {
    background: white;

    border-color: #4ade80;

    box-shadow:
        0 0 0 3px rgba(34,197,94,.10);
}

.campus-send {
    width: 48px;
    height: 48px;

    border: none;

    border-radius: 15px;

    background:
        linear-gradient(
            135deg,
            #14532d,
            #16a34a
        );

    color: white;

    font-size: 18px;

    cursor: pointer;

    transition: .2s ease;
}

.campus-send:hover {
    transform: translateY(-2px);
}

.campus-send:disabled {
    opacity: .6;

    cursor: not-allowed;

    transform: none;
}


/* =========================================================
   RESPONSIVE
========================================================= */

@media(max-width: 1200px) {

    .campus-chat-section {
        width: 100%;

        margin-right: 0;
        margin-left: 0;

        gap: 25px;

        padding: 40px 30px;
    }

    .campus-chat-right {
        width: 370px;
    }
}


@media(max-width: 1000px) {

    .campus-chat-section {
        flex-direction: column;

        align-items: center;

        width: 100%;

        margin-right: 0;
        margin-left: 0;
    }

    .campus-chat-left {
        width: 100%;

        max-width: 700px;

        text-align: center;
    }

    .campus-chat-description {
        margin-left: auto;

        margin-right: auto;
    }

    .chat-features {
        margin-left: auto;

        margin-right: auto;

        text-align: left;
    }

    .chat-cta {
        justify-content: center;
    }

    .campus-chat-right {
        width: min(410px, 100%);
    }
}


@media(max-width: 650px) {

    .campus-chat-section {
        width: 100%;

        margin-right: 0;
        margin-left: 0;

        padding: 30px 15px;
    }

    .campus-chat-left h1 {
        font-size: 36px;
    }

    .campus-chat-description {
        font-size: 14px;
    }

    .chat-features {
        grid-template-columns: 1fr;
    }

    .campus-chat-box {
        height: 550px;

        border-radius: 21px;
    }
}
</style>


<!-- =========================================================
     CAMPUS COIN CHAT SECTION
========================================================= -->

<section class="campus-chat-section">


    <!-- =====================================================
         LEFT CONTENT
    ====================================================== -->

    <div class="campus-chat-left">

        <div class="chat-badge">

            <span></span>

            CAMPUS COIN ASSISTANT

        </div>


        <h1>

            Your Money.
            <br>

            <span>Your Goals.</span>

            <br>

            Your Future.

        </h1>


        <p class="campus-chat-description">

            Manage your student finances with confidence.
            Campus Coin helps you track transactions,
            manage your budget, monitor savings and
            understand your financial activity — all in
            one simple place.

        </p>


        <!-- FEATURES -->

        <div class="chat-features">


            <div class="chat-feature">

                <div class="chat-feature-icon">
                    💰
                </div>

                <div>

                    <h4>
                        Track Transactions
                    </h4>

                    <p>
                        Keep your income and expenses organized.
                    </p>

                </div>

            </div>


            <div class="chat-feature">

                <div class="chat-feature-icon">
                    📊
                </div>

                <div>

                    <h4>
                        Smart Dashboard
                    </h4>

                    <p>
                        See your financial activity at a glance.
                    </p>

                </div>

            </div>


            <div class="chat-feature">

                <div class="chat-feature-icon">
                    🎯
                </div>

                <div>

                    <h4>
                        Savings Goals
                    </h4>

                    <p>
                        Set goals and keep track of your progress.
                    </p>

                </div>

            </div>


            <div class="chat-feature">

                <div class="chat-feature-icon">
                    🌱
                </div>

                <div>

                    <h4>
                        Better Planning
                    </h4>

                    <p>
                        Build healthier financial habits.
                    </p>

                </div>

            </div>

        </div>


        <!-- CTA -->

        <div class="chat-cta">

            <div class="chat-cta-icon">
                💬
            </div>

            <span>
                Have a question? Ask our Campus Coin Assistant.
            </span>

        </div>

    </div>


    <!-- =====================================================
         CHATBOT
    ====================================================== -->

    <div class="campus-chat-right">

        <div class="campus-chat-box">


            <!-- CHAT HEADER -->

            <div class="campus-chat-header">

                <div class="chat-profile">

                    <div class="chat-avatar">
                        🤖
                    </div>

                    <div>

                        <h3 class="chat-title">
                            Campus Coin Assistant
                        </h3>

                        <div class="chat-subtitle">

                            <span class="online-dot"></span>

                            Online • Ready to help

                        </div>

                    </div>

                </div>

            </div>


            <!-- CHAT MESSAGES -->

            <div
                class="campus-chat-messages"
                id="chatMessages"
            >

                <div class="cc-message cc-bot">

                    Hello! 👋

                    <br>

                    I'm your Campus Coin Assistant.

                    <br><br>

                    Ask me about your dashboard,
                    transactions, budget, savings
                    or any Campus Coin feature.

                </div>

            </div>


            <!-- CHAT INPUT -->

            <div class="campus-chat-input">

                <input
                    type="text"
                    id="chatInput"
                    placeholder="Ask about Campus Coin..."
                    autocomplete="off"
                >

                <button
                    type="button"
                    class="campus-send"
                    id="sendButton"
                >
                    ➤
                </button>

            </div>

        </div>

    </div>

</section>


<!-- =========================================================
     CHATBOT JAVASCRIPT
========================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const chatInput =
        document.getElementById('chatInput');

    const sendButton =
        document.getElementById('sendButton');

    const chatMessages =
        document.getElementById('chatMessages');


    /* =====================================================
       ADD MESSAGE
    ===================================================== */

    function addMessage(message, type) {

        if (!chatMessages) {
            return;
        }

        const div =
            document.createElement('div');

        div.classList.add('cc-message');

        if (type === 'user') {

            div.classList.add('cc-user');

        } else {

            div.classList.add('cc-bot');

        }

        div.textContent = message;

        chatMessages.appendChild(div);

        chatMessages.scrollTop =
            chatMessages.scrollHeight;
    }


    /* =====================================================
       SEND MESSAGE
    ===================================================== */

    async function sendMessage() {

        if (!chatInput) {
            return;
        }

        const message =
            chatInput.value.trim();


        if (message === '') {
            return;
        }


        /* USER MESSAGE */

        addMessage(
            message,
            'user'
        );

        chatInput.value = '';

        sendButton.disabled = true;


        /* TYPING */

        const loading =
            document.createElement('div');

        loading.classList.add(
            'cc-message',
            'cc-bot',
            'chat-loading'
        );

        loading.textContent =
            'Typing...';

        chatMessages.appendChild(loading);

        chatMessages.scrollTop =
            chatMessages.scrollHeight;


        try {

            /* CSRF */

            const csrfMeta =
                document.querySelector(
                    'meta[name="csrf-token"]'
                );


            if (!csrfMeta) {

                throw new Error(
                    'CSRF token not found.'
                );

            }


            /* REQUEST */

            const response =
                await fetch(
                    "{{ route('chatbot.chat') }}",
                    {
                        method: 'POST',

                        headers: {

                            'Content-Type':
                                'application/json',

                            'Accept':
                                'application/json',

                            'X-CSRF-TOKEN':
                                csrfMeta.getAttribute(
                                    'content'
                                )
                        },

                        body: JSON.stringify({
                            message: message
                        })
                    }
                );


            /* JSON */

            const data =
                await response.json();


            /* REMOVE TYPING */

            loading.remove();


            /* SERVER ERROR */

            if (!response.ok) {

                console.error(
                    'Chatbot server error:',
                    data
                );

                addMessage(
                    data.message ||
                    'Chatbot server error. Please try again.',
                    'bot'
                );

                return;
            }


            /* BOT RESPONSE */

            if (data.reply) {

                addMessage(
                    data.reply,
                    'bot'
                );

            } else {

                addMessage(
                    'Sorry, no reply was received.',
                    'bot'
                );

            }


        } catch (error) {

            loading.remove();

            console.error(
                'Chatbot error:',
                error
            );

            addMessage(
                'Chatbot error: ' +
                error.message,
                'bot'
            );

        } finally {

            sendButton.disabled = false;

            chatInput.focus();

        }

    }


    /* =====================================================
       SEND BUTTON
    ===================================================== */

    if (sendButton) {

        sendButton.addEventListener(
            'click',
            sendMessage
        );

    }


    /* =====================================================
       ENTER KEY
    ===================================================== */

    if (chatInput) {

        chatInput.addEventListener(
            'keydown',
            function (event) {

                if (event.key === 'Enter') {

                    event.preventDefault();

                    sendMessage();

                }

            }
        );

    }

});

</script>

@endsection