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
            background: linear-gradient(to right, lightpink 40%, black 5%, lightblue 41%);
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
                left: 19%;
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
                background: linear-gradient(to bottom, lightpink 42%, black 43%, lightblue 25%);
                left: 14%;
                flex-direction: column;
            }
            .form {
                padding-left: 5px;
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
                <img class="log_logo" src="images/logo.png">
            </div>
        </div>

        <div class="form">
            <!-- php code -->

            

            <form action="process-signup.php" method="post">
                <input type="text" id="fullname" name="name" placeholder="Username"><br><br>
                <input type="text" id="email" name="email" placeholder="E-mail"><br><br>
                <input type="text" id="phonenumber" name="phoneno" placeholder="Phone Number"><br><br>
                <input type="password" id="password" name="password" placeholder="Password"><br><br><br><br>
                <input style="margin-top: -35px;" id="signup" class=" btn btn-lg btn-secondary  size" name="submit" type="submit" value="REGISTER"><br><br>
                <label>Already an user ?</label>
                <a style="position: relative;top: -7px;" href="login.html ">Login now !</a>
            </form>
        </div>
    </div>
</body>



</html>