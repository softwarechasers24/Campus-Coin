@extends('layouts.student')

@section('title', 'Calendar')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .calendar-page {
        padding: 10px 0 35px;
        color: #e8f5ef;
    }

    /* HEADER */
    .calendar-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
    }

    .calendar-heading h1 {
        margin: 0;
        font-size: 30px;
        font-weight: 800;
        letter-spacing: -0.5px;
    }

    .calendar-heading p {
        margin: 7px 0 0;
        color: #789487;
        font-size: 14px;
    }

    .today-btn {
        border: none;
        background: #00f59b;
        color: #06100b;
        padding: 11px 20px;
        border-radius: 10px;
        font-weight: 800;
        cursor: pointer;
        transition: .2s;
    }

    .today-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,245,155,.20);
    }

    /* MAIN LAYOUT */
    .calendar-layout {
        display: grid;
        grid-template-columns: minmax(0, 1fr) 300px;
        gap: 20px;
    }

    /* CALENDAR CARD */
    .calendar-card {
        background: #101d17;
        border: 1px solid #1d3529;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,.18);
    }

    .calendar-toolbar {
        padding: 20px 22px;
        border-bottom: 1px solid #1d3529;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .month-title {
        font-size: 21px;
        font-weight: 800;
    }

    .month-controls {
        display: flex;
        gap: 8px;
    }

    .month-btn {
        width: 38px;
        height: 38px;
        border-radius: 9px;
        border: 1px solid #284535;
        background: #0b1510;
        color: #00f59b;
        cursor: pointer;
        font-size: 20px;
        transition: .2s;
    }

    .month-btn:hover {
        background: #00f59b;
        color: #06100b;
    }

    /* WEEK DAYS */
    .weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        background: #0b1510;
        border-bottom: 1px solid #1d3529;
    }

    .weekday {
        text-align: center;
        padding: 13px 5px;
        color: #718b7d;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
    }

    /* DAYS */
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
    }

    .calendar-day {
        min-height: 105px;
        padding: 10px;
        border-right: 1px solid #1d3529;
        border-bottom: 1px solid #1d3529;
        position: relative;
        cursor: pointer;
        transition: .2s;
    }

    .calendar-day:hover {
        background: rgba(0,245,155,.045);
    }

    .calendar-day.empty {
        background: #0d1813;
        cursor: default;
    }

    .date-number {
        width: 29px;
        height: 29px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #b6cfc2;
        font-size: 13px;
        border-radius: 50%;
        margin-bottom: 8px;
    }

    .calendar-day.today .date-number {
        background: #00f59b;
        color: #06100b;
        font-weight: 900;
        box-shadow: 0 0 15px rgba(0,245,155,.25);
    }

    .calendar-day.selected {
        background: rgba(0,245,155,.08);
    }

    .calendar-day.selected::after {
        content: "";
        position: absolute;
        inset: 0;
        border: 1px solid #00f59b;
        pointer-events: none;
    }

    /* EVENTS */
    .event {
        padding: 6px 8px;
        margin-top: 5px;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 700;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .event.green {
        background: rgba(0,245,155,.12);
        color: #00f59b;
        border-left: 3px solid #00f59b;
    }

    .event.blue {
        background: rgba(80,160,255,.12);
        color: #70b5ff;
        border-left: 3px solid #70b5ff;
    }

    .event.yellow {
        background: rgba(255,193,7,.12);
        color: #ffd45a;
        border-left: 3px solid #ffd45a;
    }

    /* SIDE PANEL */
    .side-card {
        background: #101d17;
        border: 1px solid #1d3529;
        border-radius: 18px;
        padding: 20px;
    }

    .side-title {
        font-size: 17px;
        font-weight: 800;
        margin-bottom: 18px;
    }

    .selected-date {
        background: #0b1510;
        border: 1px solid #1d3529;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 20px;
    }

    .selected-date small {
        color: #718b7d;
        font-size: 11px;
    }

    .selected-date strong {
        display: block;
        margin-top: 5px;
        font-size: 18px;
    }

    .side-event {
        display: flex;
        gap: 12px;
        padding: 13px 0;
        border-bottom: 1px solid #1d3529;
    }

    .event-dot {
        width: 9px;
        height: 9px;
        background: #00f59b;
        border-radius: 50%;
        margin-top: 5px;
        flex-shrink: 0;
    }

    .event-info strong {
        display: block;
        font-size: 13px;
    }

    .event-info span {
        display: block;
        color: #718b7d;
        font-size: 11px;
        margin-top: 3px;
    }

    .add-event {
        width: 100%;
        margin-top: 20px;
        padding: 12px;
        border: 1px dashed #00f59b;
        background: rgba(0,245,155,.05);
        color: #00f59b;
        border-radius: 10px;
        font-weight: 800;
        cursor: pointer;
    }

    /* LEGEND */
    .legend {
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #1d3529;
    }

    .legend-title {
        color: #718b7d;
        font-size: 11px;
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: 800;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: #9bb3a7;
        margin-bottom: 9px;
    }

    .legend-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    .green-dot {
        background: #00f59b;
    }

    .blue-dot {
        background: #70b5ff;
    }

    .yellow-dot {
        background: #ffd45a;
    }

    /* RESPONSIVE */
    @media(max-width: 1000px) {
        .calendar-layout {
            grid-template-columns: 1fr;
        }

        .side-card {
            order: 2;
        }
    }

    @media(max-width: 650px) {
        .calendar-top {
            flex-direction: column;
            align-items: flex-start;
        }

        .calendar-card {
            overflow-x: auto;
        }

        .weekdays,
        .calendar-grid {
            min-width: 650px;
        }
    }
</style>


<div class="calendar-page">

    <!-- HEADER -->
    <div class="calendar-top">

        <div class="calendar-heading">
            <h1>Calendar</h1>
            <p>Manage your campus activities and important dates.</p>
        </div>

        <button class="today-btn" onclick="goToday()">
            Today
        </button>

    </div>


    <div class="calendar-layout">

        <!-- CALENDAR -->
        <div class="calendar-card">

            <div class="calendar-toolbar">

                <div class="month-title" id="monthTitle">
                    September 2026
                </div>

                <div class="month-controls">

                    <button class="month-btn" onclick="previousMonth()">
                        ‹
                    </button>

                    <button class="month-btn" onclick="nextMonth()">
                        ›
                    </button>

                </div>

            </div>


            <div class="weekdays">

                <div class="weekday">Sun</div>
                <div class="weekday">Mon</div>
                <div class="weekday">Tue</div>
                <div class="weekday">Wed</div>
                <div class="weekday">Thu</div>
                <div class="weekday">Fri</div>
                <div class="weekday">Sat</div>

            </div>


            <div class="calendar-grid" id="calendarGrid"></div>

        </div>


        <!-- RIGHT PANEL -->
        <div class="side-card">

            <div class="side-title">
                Selected Date
            </div>

            <div class="selected-date">

                <small>DATE</small>

                <strong id="selectedDate">
                    Today
                </strong>

            </div>


            <div class="side-title">
                Upcoming Events
            </div>


            <div class="side-event">

                <div class="event-dot"></div>

                <div class="event-info">
                    <strong>Assignment Due</strong>
                    <span>10:00 AM</span>
                </div>

            </div>


            <div class="side-event">

                <div class="event-dot" style="background:#70b5ff;"></div>

                <div class="event-info">
                    <strong>Campus Activity</strong>
                    <span>02:00 PM</span>
                </div>

            </div>


            <div class="side-event">

                <div class="event-dot" style="background:#ffd45a;"></div>

                <div class="event-info">
                    <strong>Budget Review</strong>
                    <span>04:30 PM</span>
                </div>

            </div>


            <button class="add-event" onclick="showEventMessage()">
                + Add Event
            </button>


            <div class="legend">

                <div class="legend-title">
                    Calendar Legend
                </div>

                <div class="legend-item">
                    <span class="legend-dot green-dot"></span>
                    Academic
                </div>

                <div class="legend-item">
                    <span class="legend-dot blue-dot"></span>
                    Campus
                </div>

                <div class="legend-item">
                    <span class="legend-dot yellow-dot"></span>
                    Finance
                </div>

            </div>

        </div>

    </div>

</div>


<script>

let currentDate = new Date();
let selectedDate = new Date();

const monthNames = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];


function renderCalendar()
{
    const year = currentDate.getFullYear();
    const month = currentDate.getMonth();

    document.getElementById("monthTitle").innerText =
        monthNames[month] + " " + year;

    const grid = document.getElementById("calendarGrid");

    grid.innerHTML = "";

    const firstDay =
        new Date(year, month, 1).getDay();

    const totalDays =
        new Date(year, month + 1, 0).getDate();


    // Empty cells before month
    for(let i = 0; i < firstDay; i++)
    {
        const empty = document.createElement("div");

        empty.className = "calendar-day empty";

        grid.appendChild(empty);
    }


    // Days
    for(let day = 1; day <= totalDays; day++)
    {
        const cell = document.createElement("div");

        cell.className = "calendar-day";


        const number = document.createElement("div");

        number.className = "date-number";

        number.innerText = day;

        cell.appendChild(number);


        // Today
        const today = new Date();

        if(
            day === today.getDate() &&
            month === today.getMonth() &&
            year === today.getFullYear()
        )
        {
            cell.classList.add("today");
        }


        // Sample events
        if(day === 5)
        {
            addEvent(cell, "Assignment Due", "green");
        }

        if(day === 12)
        {
            addEvent(cell, "Campus Activity", "blue");
        }

        if(day === 18)
        {
            addEvent(cell, "Budget Review", "yellow");
        }

        if(day === 24)
        {
            addEvent(cell, "Project Deadline", "green");
        }


        cell.onclick = function()
        {
            selectedDate =
                new Date(year, month, day);

            updateSelectedDate();

            document
                .querySelectorAll(".calendar-day")
                .forEach(el => el.classList.remove("selected"));

            cell.classList.add("selected");
        };


        grid.appendChild(cell);
    }
}


function addEvent(cell, text, type)
{
    const event = document.createElement("div");

    event.className =
        "event " + type;

    event.innerText = text;

    cell.appendChild(event);
}


function updateSelectedDate()
{
    const options = {
        weekday: "long",
        month: "long",
        day: "numeric",
        year: "numeric"
    };

    document.getElementById("selectedDate").innerText =
        selectedDate.toLocaleDateString("en-US", options);
}


function previousMonth()
{
    currentDate.setMonth(
        currentDate.getMonth() - 1
    );

    renderCalendar();
}


function nextMonth()
{
    currentDate.setMonth(
        currentDate.getMonth() + 1
    );

    renderCalendar();
}


function goToday()
{
    currentDate = new Date();
    selectedDate = new Date();

    renderCalendar();
    updateSelectedDate();
}


function showEventMessage()
{
    alert("Add Event UI is ready. Event saving can be connected later.");
}


renderCalendar();
updateSelectedDate();

</script>

@endsection