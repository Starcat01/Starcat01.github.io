<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leap Year Checker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqk1w27TLinL98e7h40sdmMz+My6NwxlLrgM5H5kiK+tCxrv+1O8/sW/KLPbfYsABrYMl1j+a9p/djw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Leap Year Checker</h3>
                </div>
                <div class="card-body">
                    <form id="leapYearForm">
                        <div class="form-group">
                            <label for="yearInput">Enter a year:</label>
                            <input type="number" class="form-control" id="yearInput" placeholder="Enter year" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Check</button>
                    </form>
                    <div id="result" class="mt-3 text-center"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const form = document.getElementById('leapYearForm');
    const result = document.getElementById('result');

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const year = document.getElementById('yearInput').value;

        if (isLeapYear(year)) {
            result.innerHTML = `<i class="fas fa-check-circle text-success"></i>&nbsp; It's a Leap Year!`;
        } else {
            result.innerHTML = `<i class="fas fa-times-circle text-danger"></i>&nbsp; It's not a Leap Year!`;
        }
    });

    function isLeapYear(year) {
        if ((year % 4 === 0 && year % 100 !== 0) || year % 400 === 0) {
            return true;
        } else {
            return false;
        }
    }
</script>
</body>
</html>
