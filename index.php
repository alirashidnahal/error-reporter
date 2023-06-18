<!Doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Error Reporter</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="HandheldFriendly" content="true"/>
    <meta name="MobileOptimized" content="320"/>
    <meta name="language" content="fa"/>
    <meta name="document-type" content="Public"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="#148fff">
    <meta name="msapplication-navbutton-color" content="#148fff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="bug-reporter">
        <form action="reporter.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="user-ip" class="col-sm-3 col-form-label">Your IP Address:</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" name="user-ip" id="user-ip"
                           value="<?php if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                               $ip_address = $_SERVER['HTTP_CLIENT_IP'];
                           } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                               $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
                           } else {
                               $ip_address = $_SERVER['REMOTE_ADDR'];
                           }
                           echo $ip_address; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="user-browser" class="col-sm-3 col-form-label">Your Browser version:</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" name="user-browser" id="user-browser"
                           value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="user-http-code" class="col-sm-3 col-form-label">Http response code:</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" name="user-http-code"
                           id="user-http-code" value="<?php echo http_response_code(); ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="user-page-url" class="col-sm-3 col-form-label">Your current url:</label>
                <div class="col-sm-9">
                    <input type="text" readonly class="form-control-plaintext" name="user-page-url"
                           id="user-page-url" value="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="user-protocol" class="col-sm-3 col-form-label">Your Protocol:</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" name="user-protocol"
                           id="user-protocol" value="<?php echo $_SERVER['SERVER_PROTOCOL']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="user-request-method" class="col-sm-3 col-form-label">Your request method:</label>
                <div class="col-sm-8">
                    <input type="text" readonly class="form-control-plaintext" name="user-request-method"
                           id="user-request-method" value="<?php echo $_SERVER['REQUEST_METHOD']; ?>">
                </div>
            </div>
            <div class="message row g-3">
                <div class="col-10 form-floating">
                    <textarea class="form-control rounded-3" name="user-message" id="user-message" placeholder="Describe the error..."></textarea>
                    <label for="user-message">Your message:</label>
                </div>
                <div class="col-auto d-flex align-items-stretch">
                    <button type="submit" class="btn btn-primary btn-lg" name="send-error">Send Report</button>
                </div>
            </div>
        </form>
    </div>
    <!--End of .bug-reporter -->
</div>


<footer>
    <!-- Copyright -->
    <div class="badge-light fixed-bottom footer-copyright py-3 text-center">
        <span>© <?php echo date("Y"); ?> Copyright:</span>
        <a href="https://alirashidnahal.com/" title="علی رشیدنهال – طراح و توسعه‌دهنده وب و علاقه‌مند به دنیای متن‌باز">
            Ali Rashidnahal</a>
    </div>
    <!-- Copyright -->

</footer><!-- Footer -->

<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>

</body>
</html>