<?php
  require_once('Employee.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Net Income Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Net Income Calculator</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" id="position" name="position" required>
            </div>
            <div class="form-group">
                <label for="civilStatus">Civil Status:</label>
                <select class="form-control" id="civilStatus" name="civilStatus" required>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Widowed">Widowed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="employmentStatus">Employment Status:</label>
                <select class="form-control" id="employmentStatus" name="employmentStatus" required>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Contract">Contract</option>
                </select>
            </div>
            <div class="form-group">
                <label for="hoursWorked">Hours Worked:</label>
                <input type="number" class="form-control" id="hoursWorked" name="hoursWorked" required>
            </div>
            <div class="form-group">
                <label for="regularPay">Regular Pay:</label>
                <input type="number" class="form-control" id="regularPay" name="regularPay" required>
            </div>
            <div class="form-group">
                <label for="overtimePay">Overtime Pay:</label>
                <input type="number" class="form-control" id="overtimePay" name="overtimePay" required>
            </div>
            <div class="form-group">
                <label for="deductions">Deductions:</label>
                <input type="number" class="form-control" id="deductions" name="deductions" required>
            </div>
            <button type="submit" class="btn btn-primary">Calculate</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $position = $_POST["position"];
            $civilStatus = $_POST["civilStatus"];
            $employmentStatus = $_POST["employmentStatus"];
            $hoursWorked = $_POST["hoursWorked"];
            $regularPay = $_POST["regularPay"];
            $overtimePay = $_POST["overtimePay"];
            $deductions = $_POST["deductions"];

            $employee = new Employee($position, $civilStatus, $employmentStatus, $hoursWorked, $regularPay, $overtimePay, $deductions);

            echo "<div class='mt-4'>";
            $employee->displayEmployeeInfo();
            echo "</div>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
