<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="{{ URL::asset('/images/icon.png') }}" type="image/x-icon"/>
</head>




<body lang="en">
    <div class="container border border-success py-4 px-2 shadow p-3 mb-5 rounded"
        style="background-color:#ccffff;margin-top: 13rem;">
        <a href="./" class="btn btn-info mb-4">Back</a>
        <h4>OTP has been sent to your Email Address i.e. {{Session::get('txt')}} (Don't Refresh this Page.)</h4>
        <form method="POST" action="user/passwordreset2">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Enter OTP</label>
                    <input type="text" class="form-control" id="inputEmail4" maxlength="5" placeholder="OTP" name="otp"
                        required>
                    <small class="text-muted">
                        OTP will expires in 10 minutes.
                    </small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password" required
                        placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Confirm Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="cpassword" required
                        placeholder="Confirm Password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Reset</button>
        </form>
        @if ($message = Session::get('error'))
        <div id="alert" class="alert alert-danger border border-danger alert-block my-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
        @if ($message = Session::get('warning'))
        <div id="alert" class="alert alert-warning alert-block border border-warning my-3">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif
    </div>

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

</html>