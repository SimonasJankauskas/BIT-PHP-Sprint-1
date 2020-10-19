<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login</title>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css'>
    <link rel="stylesheet" href="styles.css">
    <style type='text/css'>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div>
        <?php
        if (
            isset($_POST['login'])
            && !empty($_POST['username'])
            && !empty($_POST['password'])
        ) {
            if (
                $_POST['username'] == 'admin' &&
                $_POST['password'] == '1234'
            ) {
                $_SESSION['logged_in'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = 'admin';
                header('Location: welcome.php');
            } else {
               $err = 'Wrong username or password!';
            }
        }
        ?>
        <div class='wrapper'>
            <h2>Login</h2>
            <p>Please fill in your credentials to login.</p>
            <form action='./' method='POST'>
                <div class='form-group'>
                    <label>Username</label>
                    <input type='text' name='username' class='form-control'>

                </div>
                <div class='form-group'>
                    <label>Password</label>
                    <input type='password' name='password' class='form-control'>

                </div>
                <div class='form-group'>
                    <input type='submit' class='btn btn-primary' name='login'> <?php print($err); ?>
                </div>
            </form>
        </div>
        <p style="font-weight: bold; text-align: center;">Login credentials</p>
        <p style="text-align: center;">Username: admin</p>
        <p style="text-align: center;">Password: 1234</p>
</body>

</html>