<?php


$message = "";


if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['xml'])) {
    try {
        $result = base64_decode($_POST['xml']);

        $xml = simplexml_load_string($result);

        $msg = $xml->message;
        $message = "Thanks for your message: '$msg'";
    } catch (Exception $e) {
        $message = "Issue with the message: $e";
    }

    die($message);
}

?>

<!DOCTYPE html>
<html>

<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

    <!-- // include_once('flag.php'); -->
    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo">Legacy or Legacy ?</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            </ul>
        </div>
    </nav>

    <div class="general-container">
        <div class="container">
            <div class="row">
                <div class="message collection">
                    <a href="#" class="collection-item">Send a message :)</a>
                    <a href="#" class="collection-item" id="error"></a>
                </div>
            </div>
            <div class="row">
                <form action="index.php" method="POST" class="col s12" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s12">
                            <input placeholder="Message" name="message" id="message" type="text" class="validate">
                            <label for="message">Message</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn waves-effect waves-light" type="submit" name="action">
                            Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>

</html>