
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Add Account</title>

    <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="add.php" method="post">
        <h2 class="form-signin-heading">Add Account</h2>
        <label for="inputEmail" class="sr-only">Enter Name</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Add Name" required autofocus>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Account</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>