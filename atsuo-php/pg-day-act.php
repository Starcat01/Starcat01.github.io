<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days of the Week Activity</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqk1w2/knoG80k332kE5+1xeyOGnQzR9TqiHh7rQ+10W+QfxQKuqXRBk/3wT6o8NpF9WXb1g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Days of the Week Activity</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <button class="btn btn-primary btn-lg btn-block" onclick="displayDay('Monday')">Monday</button>
                <button class="btn btn-primary btn-lg btn-block mt-3" onclick="displayDay('Tuesday')">Tuesday</button>
                <button class="btn btn-primary btn-lg btn-block mt-3" onclick="displayDay('Wednesday')">Wednesday</button>
                <button class="btn btn-primary btn-lg btn-block mt-3" onclick="displayDay('Thursday')">Thursday</button>
                <button class="btn btn-primary btn-lg btn-block mt-3" onclick="displayDay('Friday')">Friday</button>
             <div class="mt-4">
              <p id="selectedDay" class="text-center"></p>
             </div>
            </div>
        </div>
    </div>

    <script>
        function displayDay(day) {
            document.getElementById('selectedDay').innerHTML = day;
        }
    </script>
</body>
</html>
