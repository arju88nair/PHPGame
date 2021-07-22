<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Dice Roll</title>
    <style>* {
            margin: 0;
            padding: 0;
            vertical-align: baseline;
        }

        html {
            font-family: system-ui, sans-serif;
        }

        body {
            background: linear-gradient(#545454, #454545, #676767);
            display: grid;
            grid-template-columns: 1fr;
            height: 100vh;
            overflow: hidden;
            width: 100%;
        }

        .dice {
            align-items: center;
            display: grid;
            grid-gap: 2rem;
            grid-template-columns: repeat(auto-fit, minmax(8rem, 1fr));
            grid-template-rows: auto;
            justify-items: center;
            padding: 2rem;
            perspective: 600px;
        }

        .die-list {
            display: grid;
            grid-template-columns: 1fr;
            grid-template-rows: 1fr;
            height: 6rem;
            list-style-type: none;
            transform-style: preserve-3d;
            width: 6rem;
        }

        .even-roll {
            transition: transform 1.5s ease-out;
        }

        .odd-roll {
            transition: transform 1.25s ease-out;
        }

        .die-item {
            background-color: #fefefe;
            box-shadow: inset -0.35rem 0.35rem 0.75rem rgba(0, 0, 0, 0.3),
            inset 0.5rem -0.25rem 0.5rem rgba(0, 0, 0, 0.15);
            display: grid;
            grid-column: 1;
            grid-row: 1;
            grid-template-areas:
    "one two three"
    "four five six"
    "seven eight nine";
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            height: 100%;
            padding: 1rem;
            width: 100%;
        }

        .dot {
            align-self: center;
            background-color: #676767;
            border-radius: 50%;
            box-shadow: inset -0.15rem 0.15rem 0.25rem rgba(0, 0, 0, 0.5);
            display: block;
            height: 1.25rem;
            justify-self: center;
            width: 1.25rem;
        }

        .even-roll[data-roll="1"] {
            transform: rotateX(360deg) rotateY(720deg) rotateZ(360deg);
        }

        .even-roll[data-roll="2"] {
            transform: rotateX(450deg) rotateY(720deg) rotateZ(360deg);
        }

        .even-roll[data-roll="3"] {
            transform: rotateX(360deg) rotateY(630deg) rotateZ(360deg);
        }

        .even-roll[data-roll="4"] {
            transform: rotateX(360deg) rotateY(810deg) rotateZ(360deg);
        }

        .even-roll[data-roll="5"] {
            transform: rotateX(270deg) rotateY(720deg) rotateZ(360deg);
        }

        .even-roll[data-roll="6"] {
            transform: rotateX(360deg) rotateY(900deg) rotateZ(360deg);
        }

        .odd-roll[data-roll="1"] {
            transform: rotateX(-360deg) rotateY(-720deg) rotateZ(-360deg);
        }

        .odd-roll[data-roll="2"] {
            transform: rotateX(-270deg) rotateY(-720deg) rotateZ(-360deg);
        }

        .odd-roll[data-roll="3"] {
            transform: rotateX(-360deg) rotateY(-810deg) rotateZ(-360deg);
        }

        .odd-roll[data-roll="4"] {
            transform: rotateX(-360deg) rotateY(-630deg) rotateZ(-360deg);
        }

        .odd-roll[data-roll="5"] {
            transform: rotateX(-450deg) rotateY(-720deg) rotateZ(-360deg);
        }

        .odd-roll[data-roll="6"] {
            transform: rotateX(-360deg) rotateY(-900deg) rotateZ(-360deg);
        }

        [data-side="1"] {
            transform: rotate3d(0, 0, 0, 90deg) translateZ(4rem);
        }

        [data-side="2"] {
            transform: rotate3d(-1, 0, 0, 90deg) translateZ(4rem);
        }

        [data-side="3"] {
            transform: rotate3d(0, 1, 0, 90deg) translateZ(4rem);
        }

        [data-side="4"] {
            transform: rotate3d(0, -1, 0, 90deg) translateZ(4rem);
        }

        [data-side="5"] {
            transform: rotate3d(1, 0, 0, 90deg) translateZ(4rem);
        }

        [data-side="6"] {
            transform: rotate3d(1, 0, 0, 180deg) translateZ(4rem);
        }

        [data-side="1"] .dot:nth-of-type(1) {
            grid-area: five;
        }

        [data-side="2"] .dot:nth-of-type(1) {
            grid-area: one;
        }

        [data-side="2"] .dot:nth-of-type(2) {
            grid-area: nine;
        }

        [data-side="3"] .dot:nth-of-type(1) {
            grid-area: one;
        }

        [data-side="3"] .dot:nth-of-type(2) {
            grid-area: five;
        }

        [data-side="3"] .dot:nth-of-type(3) {
            grid-area: nine;
        }

        [data-side="4"] .dot:nth-of-type(1) {
            grid-area: one;
        }

        [data-side="4"] .dot:nth-of-type(2) {
            grid-area: three;
        }

        [data-side="4"] .dot:nth-of-type(3) {
            grid-area: seven;
        }

        [data-side="4"] .dot:nth-of-type(4) {
            grid-area: nine;
        }

        [data-side="5"] .dot:nth-of-type(1) {
            grid-area: one;
        }

        [data-side="5"] .dot:nth-of-type(2) {
            grid-area: three;
        }

        [data-side="5"] .dot:nth-of-type(3) {
            grid-area: five;
        }

        [data-side="5"] .dot:nth-of-type(4) {
            grid-area: seven;
        }

        [data-side="5"] .dot:nth-of-type(5) {
            grid-area: nine;
        }

        [data-side="6"] .dot:nth-of-type(1) {
            grid-area: one;
        }

        [data-side="6"] .dot:nth-of-type(2) {
            grid-area: three;
        }

        [data-side="6"] .dot:nth-of-type(3) {
            grid-area: four;
        }

        [data-side="6"] .dot:nth-of-type(4) {
            grid-area: six;
        }

        [data-side="6"] .dot:nth-of-type(5) {
            grid-area: seven;
        }

        [data-side="6"] .dot:nth-of-type(6) {
            grid-area: nine;
        }

        button {
            align-self: center;
            background-color: #efefef;
            border: none;
            color: #333;
            font-size: 1.25rem;
            font-weight: 700;
            justify-self: center;
            padding: 0.5rem 1rem;
        }

        button:hover {
            cursor: pointer;
        }

        @media (min-width: 900px) {
            .dice {
                perspective: 1300px;
            }
        }
    </style>
</head>
<body>
<div class="dice">
    <ol class="die-list even-roll" data-roll="1" id="die-1">
        <li class="die-item" data-side="1">
            <span class="dot"></span>
        </li>
        <li class="die-item" data-side="2">
            <span class="dot"></span>
            <span class="dot"></span>
        </li>
        <li class="die-item" data-side="3">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </li>
        <li class="die-item" data-side="4">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </li>
        <li class="die-item" data-side="5">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </li>
        <li class="die-item" data-side="6">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </li>
    </ol>
</div>
<div style="margin: auto">
    <button type="button" id="roll-button">Roll Dice</button>
    <button type="button" id="logout">Log out</button>
</div>
<script>
    let count = 0;
    let values = [];
    let request;


    function rollDice() {
        count += 1
        const dice = [...document.querySelectorAll(".die-list")];
        dice.forEach((die) => {
            toggleClasses(die);
            die.dataset.roll = getRandomNumber(1, 6);
        });
        if (count >= 3) {
            document.getElementById("roll-button").disabled = true;
            alert("Thank you for playing.If you wish to play again, please refresh the page")
            sendData();
        }
    }

    function toggleClasses(die) {
        die.classList.toggle("odd-roll");
        die.classList.toggle("even-roll");
    }

    function getRandomNumber(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        let rolled = Math.floor(Math.random() * (max - min + 1)) + min;
        values.push(rolled)
        return rolled;
    }

    function sendData() {

        let data = {'score': values.reduce((a, b) => a + b, 0), 'mode': 'games'}
        request = $.ajax({
            url: "/saveDice",
            type: "post",
            data: data
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            // Log a message to the console
            console.log("Hooray, it worked!");
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });

        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
        });

    }

    function logout() {
        window.location.href = "logout"

    }

    document.getElementById("roll-button").addEventListener("click", rollDice);
    document.getElementById("logout").addEventListener("click", logout);

</script>
</body>
</html>
