<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days of the Week Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .day-monday {
            border: 3px solid blue;
            background-color: blue; 
            color: white;
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

        button:hover {
            opacity: 0.8;
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

            dayHeader.innerHTML = "Clicked: " + day;
            selectedDay.innerHTML = "";
            switch(day) {
                case 'Monday':
                    dayHeader.style.color = "blue";
                    break;
                case 'Tuesday':
                    dayHeader.style.color = "green";
                    break;
                case 'Wednesday':
                    dayHeader.style.color = "lightblue";
                    break;
                case 'Thursday':
                    dayHeader.style.color = "yellow";
                    break;
                case 'Friday':
                    dayHeader.style.color = "red";
                    break;
            }
        }
    </script>
</body>
</html>

