<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days of the Week Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom styles for border and background colors for each day */
        .day-monday {
            border: 3px solid blue;
            background-color: blue; /* Inline background color same as border */
            color: white; /* Text color for visibility */
        }
        .day-tuesday {
            border: 3px solid green;
            background-color: green;
            color: white;
        }
        .day-wednesday {
            border: 3px solid lightblue;
            background-color: lightblue;
            color: black;
        }
        .day-thursday {
            border: 3px solid yellow;
            background-color: yellow;
            color: black;
        }
        .day-friday {
            border: 3px solid red;
            background-color: red;
            color: white;
        }
        /* Style adjustments for hover effect */
        button:hover {
            opacity: 0.8; /* Slightly change opacity on hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 id="dayHeader" class="text-center mb-4">Days of the Week Activity</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <button class="btn btn-lg btn-block day-monday" onclick="displayDay('Monday')">Monday</button>
                <button class="btn btn-lg btn-block day-tuesday mt-3" onclick="displayDay('Tuesday')">Tuesday</button>
                <button class="btn btn-lg btn-block day-wednesday mt-3" onclick="displayDay('Wednesday')">Wednesday</button>
                <button class="btn btn-lg btn-block day-thursday mt-3" onclick="displayDay('Thursday')">Thursday</button>
                <button class="btn btn-lg btn-block day-friday mt-3" onclick="displayDay('Friday')">Friday</button>

                <p id="selectedDay" class="text-center mt-4"></p>
            </div>
        </div>
    </div>

    <script>
        function displayDay(day) {
            const dayHeader = document.getElementById('dayHeader');
            const selectedDay = document.getElementById('selectedDay');

            dayHeader.innerHTML = "Clicked: " + day; // Update the header
            selectedDay.innerHTML = ""; // Clear the selected day message

            // Set font color based on the day
            switch(day) {
                case 'Monday':
                    dayHeader.style.color = "blue"; // Set header text color
                    break;
                case 'Tuesday':
                    dayHeader.style.color = "green"; // Set header text color
                    break;
                case 'Wednesday':
                    dayHeader.style.color = "lightblue"; // Set header text color
                    break;
                case 'Thursday':
                    dayHeader.style.color = "yellow"; // Set header text color
                    break;
                case 'Friday':
                    dayHeader.style.color = "red"; // Set header text color
                    break;
            }
        }
    </script>
</body>
</html>

