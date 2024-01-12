<?php require_once(__DIR__ . "/php/loadpage.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Solar Monitoring Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Solar Farm Monitoring System Dashboard</h1>
                <div class="card border-primary mb-4">
                    <div class="card-body">
                        <h4>Location: <span id="lc"></span></h4>
                        <h4>Solar Panel No: <span id="sno"></span></h4>
                        <h4>Month: <?= $monval; ?>
                        </h4>
                        <h4>Day: <?= $day; ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col">
                <div class="card textwhite bg-primary text-white">
                    <div class="card-body">
                        <h4 class="card-title">Current (A)</h4>
                        <h6 class="text-text-muted card-subtitle mb-2" id="curval"></h6>
                    </div>
                </div>
                <div class="card textwhite bg-success text-white mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Temperature (°C)</h4>
                        <h6 class="text-text-muted card-subtitle mb-2" id="tempval"></h6>
                    </div>
                </div>
                <div class="card textwhite bg-secondary text-white mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Humidity (%)</h4>
                        <h6 class="text-text-muted card-subtitle mb-2" id="humval"></h6>
                    </div>
                </div>
                <samp class="fw-bold">Last Updated:</samp>
                <samp class="fw-bold" id="updatedate"></samp>
                <samp class="fw-bold"> - </samp>
                <samp class="fw-bold" id="updatedatewait"></samp>
            </div>
            <div class="col">
                <p class="fw-bold">Celestial Coordinates:</p>
                <div class="table-responsive" style="overflow-y: scroll; height: 50vh;">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Time<br></th>
                                <th>Azimuth<br></th>
                                <th>Altitude<br></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $tabledata; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {

            var remainingTime = 30;
            var timer = setInterval(countdown, 1000); //set the countdown to every second
            function countdown() {
                if (remainingTime == -1) {
                    clearInterval(timer);
                    doPoll();
                } else {
                    $("#updatedatewait").html("Refresh in " + remainingTime + "s");
                    remainingTime--; //we subtract the second each iteration
                }
            }

            var lop = true;

            function doPoll() {

                $.ajax({
                    url: "/php/loaddata.php",
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                    beforeSend: function (xhr) {

                    }
                })
                    .done(function (data, s, c) {

                        $.each(data, function (index, element) {
                            $("#curval").html(element.curv);
                            $("#tempval").html(element.temv);
                            $("#humval").html(element.humv);
                            $("#updatedate").html(element.lsdate);
                            $("#lc").html(element.lcdata);
                            $("#sno").html(element.sno);
                        });

                    })
                    .fail(function (jqXHR, statusmsg, errormsg) {
                        console.log(jqXHR.status);
                    })
                    .always(function () {
                        if (lop == true) {
                            clearInterval(timer);
                            remainingTime = 30;
                            timer = setInterval(countdown, 1000);
                            countdown();
                            //setTimeout( doPoll, 10000 );
                        }
                    });


            }

            doPoll();




        });

    </script>


</body>

</html>