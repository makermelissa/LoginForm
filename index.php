<?php
require("security.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form Code Sample</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Main Stylesheet -->
    <link href="main.css" rel="stylesheet">
</head>

<body>
<div class="container">
<?php if (isset($_SESSION['clientId']) && $_SESSION['clientId'] > 0) { ?>
    <form class="login-form" id="logout-form">
        <input type="hidden" name="<?php echo $fieldNames['csrfToken']; ?>" id="<?php echo $fieldNames['csrfToken']; ?>" value="<?php echo $csrfToken ?>" />
        <input type="hidden" name="<?php echo $fieldNames['action']; ?>" id="<?php echo $fieldNames['action']; ?>" value="logout" />
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" id="btn-login" type="submit"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Log out</button>
        </div>
    </form>
<?php } else { ?>
    <form class="login-form" id="login-form">
        <h2>Login Form Code Sample</h2>
        <input type="hidden" name="<?php echo $fieldNames['csrfToken']; ?>" id="<?php echo $fieldNames['csrfToken']; ?>" value="<?php echo $csrfToken ?>" />
        <input type="hidden" name="<?php echo $fieldNames['action']; ?>" id="<?php echo $fieldNames['action']; ?>" value="login" />
        <div class="form-group">
            <label for="<?php echo $fieldNames['username']; ?>" class="sr-only">Username</label>
            <input type="text" name="<?php echo $fieldNames['username']; ?>" id="<?php echo $fieldNames['username']; ?>" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="form-group">
            <label for="<?php echo $fieldNames['password']; ?>" class="sr-only">Password</label>
            <input type="password" name="<?php echo $fieldNames['password']; ?>" id="<?php echo $fieldNames['password']; ?>" class="form-control" placeholder="Password" required>
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" id="btn-login" type="submit"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Log in</button>
        </div>
    </form>
<?php } ?>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Message</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Javascript placed at the bottom of the page for optimization purposes (Google Page Insights) -->
<!-- Load jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Main JavaScript -->
<script async src="main.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script async src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>