@extends('layout')

@section('title')
Admin Home
@endsection

@section('content')

<div class="container-flex p-2">
    <h2>Here are All Appointments</h2>
    <div class="container-flex px-4 m-0 row">
        <h5>Total Appointments : <span id="total_records"></span></h5>
        <div class="container-flex col-8"></div>
        <div class="col-2 mx-sm-3 mb-2">
            <input type="text" class="form-control" id="search" name="search" placeholder="Search.....">
        </div>
    </div>
    <div class="table-responsive">
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="thead-dark">
                <tr>
                    <th scope="col th-sm">S No.</th>
                    <th scope="col th-sm">Name</th>
                    <th scope="col th-sm">Email</th>
                    <th scope="col th-sm">Date of Appointment</th>
                    <th scope="col th-sm">Department</th>
                    <th scope="col th-sm">Phone No</th>
                    <th scope="col th-sm">Message</th>
                    <th scope="col th-sm">Requested At</th>
                </tr>
            </thead>
            <tbody id="bodyData">

            </tbody>
        </table>
    </div>
</div>
<script>
$(document).ready(function() {

    fetch_data();

    function fetch_data(query = '') {
        // console.log('success');

        $.ajax({
            url: "{{ route('search.action') }}",
            method: 'GET',
            data: {
                query: query
            },
            // dataType: 'json', ye thi problem ki jard thi
            success: function(data) {
                // console.log(data);
                var dataResult = JSON.parse(data);
                // console.log(dataResult);
                var data = dataResult.data;
                console.log(data);
                var len = data.length;
                console.log(len);
                var bodyData = '';
                var i = 1;
                if (len === 0) {
                    bodyData +=
                        '<tr>' +
                        '<td colspan="8" style="text-align:center">' + "No data Found" +
                        '</td>' +
                        '</tr>';
                } else {
                    $.each(data, function(key, value) {
                        bodyData +=
                            '<tr>' +
                            '<td>' + i++ + '</td>' +
                            '<td>' + value.name + '</td>' +
                            '<td>' + value.email + '</td>' +
                            '<td>' + value.date + '</td>' +
                            '<td>' + value.department + '</td>' +
                            '<td>' + value.phoneno + '</td>' +
                            '<td>' + value.message + '</td>' +
                            '<td>' + value.created_at + '</td>' +
                            '</tr>';
                    });
                }
                // console.log(bodyData);
                $("#bodyData").html(bodyData);
                $("#total_records").html(len)
                // $('tbody').html(res);
                // $("#msg").html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        })
    }

    $(document).on('keyup', '#search', function() {
        var query = $(this).val();
        fetch_data(query);
    });
});
</script>

@endsection