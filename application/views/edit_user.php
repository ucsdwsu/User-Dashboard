<html>
<head>
	<meta charset="UTF-8">
	<title>Edit User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <style></style>
 <link rel="stylesheet" type="text/css" href="/assets/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Test App</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="/main">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="/main/logoff">Log off</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div><!--/.container -->
  </nav>
  <div class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
      <form class="form-horizontal" roll='form' action='/edit_user_action' method='post'>
        <div class="form-group">
          <label>Email Address: </label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
          <label>First Name: </label>
          <input type="text" class="form-control" name="first_name" required>
        </div>
        <div class="form-group">
          <label>Last Name: </label>
          <input type="text" class="form-control" name="last_name" required>
        </div>
        <div class="form-group">
          <label>User Level</label>
          <select class="form-control" name="user_level" required>
            <option>Normal</option>
            <option>Admin</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary">Save</button>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <form class="form-horizontal" roll='form' action='/change_password' method='post'>
        <div class="form-group">
          <label>Password: </label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <div class="form-group">
          <label>Password Confirmation: </label>
          <input type="password" class="form-control" name="passwordconf" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
        </div>
      </form>
    </div>
      </div>
    </div> <!-- /container -->
  </div>

</body>
</html>