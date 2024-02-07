<?php
$login = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `registration` WHERE username = '$username' and password = '$password'";
  $result = mysqli_query($con, $sql);

  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      $login = 1;
      session_start();
      $_SESSION['username'] = $username;
      header("location:home.php");
    } else {
      $invalid = 1;
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>Login page</title>
</head>

<body>
  <?php
  if ($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sucess</strong> Your are successfully logged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>
  <?php
  if ($invalid) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erorr!</strong> invalid credentails.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>


  <div class="container mt-5">
    <h1 class='text-center'>Login to our website page</h1>
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" name="username">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
      </div>
      <button type="submit" class="btn btn-primary w-100">Submit</button>
      <a href="sign.php" class="btn btn-link">Sign Up</a>
    </form>
  </div>



</body>

</html>