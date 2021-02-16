@extends('layout')

@section('content')
<div class="container border border-dark my-2 py-4 px-2" style="background-color:#ccffff">
    <div class="container mb-4 p-0">
        <a href="applist" class="lnk">
            < Back to Admin Home </a>
    </div>
    <div class="container">
        <h2>Register Admin</h2>
        <form method="POST" action="/createadmin" name="form1">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput1" required
                    placeholder="Max....">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input type="email" id="email" name="email" class="form-control" id="exampleFormControlInput1" required
                    placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" required
                    placeholder="xyz#123">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleFormControlInput1" required
                    placeholder="xyz#123">
            </div>
            <button type="submit" class="btn btn-success"
                onclick="ValidateEmail(document.form1.email)">Register</button>
        </form>
    </div>
    <br>
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block border border-danger mt-4">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block border border-success mt-4">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
</div>

<script>
function ValidateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (inputText.value.match(mailformat)) {
        document.form1.text1.focus();
        return true;
    } else {
        alert("You have entered an invalid email address!");
        document.form1.text1.focus();
        return false;
    }
}
</script>


@endsection