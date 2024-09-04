
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

    <style>
     body, html {
        height: 100%;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .dotlottie-player {
        width: 300px;
        height: 300px;
    }

    .success-message {
        padding: 20px;
        background-color: ;
        color: black;
        text-align: center;
        position: absolute;
        top: 25px; 
        left: 50%; 
        transform: translateX(-50%);
        width: 80%;
        max-width: 400px; 
        height: 50px; 
        font-size :30px
    }
</style>

</head>

<body>
<dotlottie-player  src="https://lottie.host/d00553d6-f6a0-40a7-a304-b911fc784c43/K7ztbO2nlA.json" background="transparent" speed="1" style="width: 300px; height: 300px" direction="1" playMode="normal" loop  autoplay></dotlottie-player>



<?php
session_start(); // Start session to access session variables

// Check if success message exists in session
if (isset($_SESSION['success_message'])) {
    // Display success message and then unset it from session
    echo "
    <style>
        .success-message {
           
        }
    </style>
    <div class='success-message'>
        <p><strong>Success!</strong> " . $_SESSION['success_message'] . "</p>
    </div>
    ";
    unset($_SESSION['success_message']);
}
?>
</body>
</html>