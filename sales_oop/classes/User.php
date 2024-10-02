<?php
require_once "Database.php";

class User extends Database
{
  public function store($request)
  {
    $first_name = $request['first_name'];
    $last_name  = $request['last_name'];
    $username   = $request['username'];
    $password   = $request['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `password`) 
                VALUES ('$first_name', '$last_name', '$username', '$password')";

    if ($this->conn->query($sql)) {
      header('location: ../views');  // go to index.php
      exit;  // same as die
    } else {
      die('Error creating the user: ' . $this->conn->error);
    }
  }

  public function login($request)
  {
    $username = $request['username'];
    $password = $request['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $result = $this->conn->query($sql);

    # Check the username
    if ($result->num_rows == 1) {
      # Check if the password is correct
      $user = $result->fetch_assoc();
      // $user = ['id' => 1, 'username' => 'john', 'password' => '$2y$10$C9v...'];

      if (password_verify($password, $user['password'])) {
        # Create session variables for future use.
        session_start();
        $_SESSION['id']        = $user['id'];
        $_SESSION['username']  = $user['username'];
        $_SESSION['full_name'] = $user['first_name'] . " " . $user['last_name'];

        header('location: ../views/dashboard.php');
        exit;
      } else {
        die('Password is incorrect');
      }
    } else {
      die('Username not found.');
    }
  }

  public function logout()
  {
      session_start();
      session_unset();
      session_destroy();

      header('location: ../views');
      exit;
  }
}
