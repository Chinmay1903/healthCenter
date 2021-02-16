<!-- <!DOCTYPE html>
<html>

<head>
    <title>Real Programmer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Thank you</p>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<body class="bg-dark">
    <div class="container bg-white py-2 px-0 col-3 my-5">
        <div class="container p-5 row m-0">
            <div class="col"></div>
            <div class="col" style="text-align: center;">
                <img decoding="async" alt="" class="rounded mx-auto d-blocks" style="max-height:200px; max-width:200px"
                    src="https://eaxmbl.stripocdn.email/content/guids/CABINET_dd354a98a803b60e2f0411e893c82f56/images/23891556799905703.png">
            </div>
            <div class="col"></div>

        </div>
        <div class="container" style="text-align: center;">
            <h4 style="font-size: 20px; font-family: arial, 'helvetica neue', helvetica, sans-serif;"><strong>FORGOT
                    YOUR <br>PASSWORD?</strong></h4>
            <p style="font-size: 16px;font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">Hi,
                {{ $details['title'] }}<br>There was a request to change your password!<br>If did not make this request,
                just
                ignore this email.<br>Otherwise, please enter the OTP:</p>
        </div>
        <div class="container p-1 "
            style=" color: #ffffff; background-color:#a5c422; width:95%; text-align: center; font-size: 28px; font-family: roboto, 'helvetica neue', helvetica, arial, sans-serif;">
            <strong>OTP For Password Reset</strong>
        </div>
        <div class="container p-1"
            style="text-align: center;font-size: 22px;font-family: 'comic sans ms', 'marker felt-thin', arial, sans-serif;">
            <strong>{{ $details['body'] }}</strong>
        </div>
        <div class="container p-1"
            style="text-align: center;font-size: 12px;font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">
            Contact us:
            <a target="_blank" style="color: #666666;" href="tel:123456789">123456789</a>
            |
            <a target="_blank" href="mailto:your@mail.com" style="color: #666666;">your@mail.com</a>
        </div>
        <div class="container p-2 "
            style=" color: #ffffff; background-color:#a5c422; text-align: left; font-size: 12px; font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">
            <strong>Have quastions?
            </strong><br>
            We are here to help, learn more about us here<br>

            or contact us
        </div>
        <div class="container p-1"
            style="text-align: center;font-size: 12px;font-family: helvetica, 'helvetica neue', arial, verdana, sans-serif;">

            <p style="color: #a5c422;margin:0rem">About us<p>
                    <p style="margin-top:0rem">
                        This daily newsletter was sent to info@name.com from company name because you subscribed. If you
                        would not like to receive this email
                        <a target="_blank" href="mailto:your@mail.com" style="color: #666666;">unsubscribe here</a>
                    </p>
        </div>
    </div>

</body>

</html>