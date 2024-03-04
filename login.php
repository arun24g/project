<?php

$is_invalid = false;

echo "Processing POST request...<br>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Received POST data...<br>";

    // Establish database connection
    echo "Establishing database connection...<br>";
    $mysqli = require __DIR__ . "/database.php";

    // Sanitize and retrieve email
    $email = $mysqli->real_escape_string($_POST["email"]);
    echo "Email: $email<br>";

    // Construct and execute SQL query
    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $email);
    echo "SQL Query: $sql<br>";
    $result = $mysqli->query($sql);
    echo "SQL Query executed...<br>";

    // Fetch user data
    $user = $result->fetch_assoc();
    echo "User found...<br>";

    if ($user) {
        // Verify password
        $password = $_POST["password"];
        echo "Password: $password<br>";

        // Verify if the entered password matches the one stored in the database
        if ($password === $user["password"]) {
            echo "Password verified...<br>";

            // Start session
            session_start();
            echo "Session started...<br>";

            echo "Login successful...<br>";
            exit;
        } else {
            echo "Password verification failed...<br>";
        }
    } else {
        echo "User not found...<br>";
    }

    // Set login as invalid
    $is_invalid = true;
    echo "Setting login as invalid...<br>";
}

echo "Rendering HTML...<br>";
?>



<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOON WALK</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <style>
        body {
            overflow: hidden;
        }
        
        .outer {
            background: linear-gradient(to right, lightpink 35%, black 5%, lightblue 36%);
            padding: 25px 30px;
            line-height: 22px;
            text-align: justify;
            border: 2px solid #2076c7;
            border-radius: 20px;
            box-shadow: 0 0 8px #2076c7;
            margin-top: 80px;
            width: max-content;
            left: 30%;
            display: flex;
            justify-content: center;
            position: relative;
            align-items: center;
            height: max-content;
        }
        
        .log_main {
            padding-right: 50px;
        }
        
        .title {
            font-size: xx-large;
            overflow: hidden;
        }
        
        .log_logo {
            border-radius: 100%;
            height: 150px;
            width: 150px;
            animation: rotate infinite 8s;
            overflow: hidden;
        }
        
        @keyframes rotate {
            0%,
            100% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(180deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        
        .form {
            padding-left: 30px;
            align-items: center;
            display: flex;
            justify-content: center;
            text-align: center;
        }
        
        input {
            position: relative;
            right: 0px;
        }
        
        a {
            text-decoration: none;
            color: aliceblue;
        }
        
        @media(max-width:950px) {
            .outer {
                left: 16%;
            }
        }
        
        @media(max-width:500px) {
            .log_main {
                align-items: center;
                justify-content: center;
                flex-direction: column;
                display: flex;
                padding-right: 0px;
            }
            .outer {
                background: linear-gradient(to bottom, lightpink 44%, black 44%, lightblue 45%);
                left: 8%;
                flex-direction: column;
            }
            .form {
                padding-left: 0px;
            }
        }
    </style>
</head>

<body class="text-center">
    <div class="outer">
        <div class="log_main">
            <p class="title">MoonWalk</p>
            <div style="height: 190px;
            margin-top: 35px;">
                <img class="log_logo" src="logo.png">
            </div>
        </div>

        <div class="form">
            <!-- php code -->
 

<?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    

            <form action="login.php" method="post">

                <input type="email" id="email" name="email" placeholder="EMAIL"
                value="<?= htmlspecialchars($_POST["email"] ?? "") ?>"> <br> <br>
        
                <input type="password" id="password" name="password" placeholder="PASSWORD"><br><br><br>
                <p>Forgot Password ? <a href="#">Reset Password !</a></p>
                <br><br>
                <input style="margin-top: -22px;" class=" btn btn-lg btn-secondary size" id="login" type="submit" value="LOGIN"><br><br>
                <label>New user ?</label>
                <a style="position: relative;top: -7px;" href="signup.html">Signup now !</a>
            </form>
        </div>
    </div>
</body>



</html>
