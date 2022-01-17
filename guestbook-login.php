<?php
  require('config/config.php');
  require('config/db.php');
  
  session_start();

  if(isset($_POST['submit'])){
    $usn= $_POST['username'];
    $pass= $_POST['password'];

    $result= $conn->query("SELECT * FROM USERACCOUNT WHERE username='$usn' AND password='$pass'");

    $row= $result ->Fetch_array();
    $numrows= $result-> num_rows;

    if($numrows> 0){
      $_SESSION['aid']= $row['id'];
      header("location: guestbook-list.php"); 
    }
    else
    {
      echo "User credentials does not exist <br> Please try again. ";
    }  
  }
?>
<?php include('inc/header.php'); ?>
  <br/>
  <div style="width:30%; margin: auto; text-align: center;">
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
      <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
      <br/><label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

    </form>
  </div>
<?php include('inc/footer.php'); ?>