<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>If Greatest Activity</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
   
</head>
<body>
    <div class="card mt-5 mx-auto w-25">
        <div class="card-header">
            <h5>Which number is greater?</h5>
        </div>

        <div class="card-body">
            <form action="" method="post">
                <input type="number" name="num1" class="form-control my-1"
                placeholder="First Number">
                <input type="number" name="num2" class="form-control my-1"
                placeholder="Second Number">

                <button type="submit" class="btn btn-primary w-100 my-3"
                name="btn_submit">Submit</button>
            </form>
        </div>

        <?php
        if(isset($_POST['btn_submit'])){
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            // Condition 1: First number is greater than the second
            // Condition 2: Second number is greater than the first 
            // Condition 3: Both numbers are equal

            echo "<div class='card-footer'>";
            if($num1 > $num2){
                echo "<div class='float-start h2'> $num1</div>
                <div class='float-end h5'>$num2</div>";
            }else{
                echo "<div class='float-start h2'> $num2</div>
                <div class='float-end h5'> $num1</div>";
            }
        }
        
        ?>
    </div>
</body>
</html>