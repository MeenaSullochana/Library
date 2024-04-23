
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement </title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <?php
    include "admin/plugin/plugin_css.php";
?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        @include ('admin.navigation')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="mb-0 bc-title">
                                <b>Mail Settings</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href="/admin/index">
                                <i class="fa fa-chevron-left"></i> Back To </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="alert bg-warning mb-3">
                        <h4>Your Application might show an error if you don't have setup SMTP</h4>
                        <hr class="my-2">
                        <h6 class="mb-0 bg-"> Setup SMTP to send all applications emails, such as <strong>Forget
                                Password</strong>, <strong>User Verification</strong>, <strong>Invoice</strong> &amp;
                            many more. <a class="text-white" href="#" target="_blank"> Test your SMTP credentials here
                            </a></h6>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="">Mail Settings</h3>
                        </div>
                        <div class="card-body">
                            <form action="/admin/smtp" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="_method" value="PUT"> <input type="hidden" name="_token"
                                    value="YOpPuoKJwqHBlhhYtLFZJijcLW5bvBnDMbz2oI28"> --}}
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="driver">
                                                Mail Driver
                                                <span class="form-label-required text-danger">*</span>
                                            </label>
                                            <input disabled="" type="text" class="form-control " id="driver"
                                                value="smtp" name="driver" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail Host

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <input type="text" class="form-control " id="mail_host"
                                                value="smtp.gmail.com" name="mail_host">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail Port

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <input type="number" class="form-control " id="mail_port" value="465"
                                                name="mail_port">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail Username

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <input type="text" class="form-control " id="mail_username"
                                                placeholder="Mail Username" name="mail_username"
                                                value="meenatest23@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail Password

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <input type="text" class="form-control " id="mail_password"
                                                placeholder="Mail Password" name="mail_password"
                                                value="yxqr zenc tkqg znqo">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail Encryption

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <select name="mail_encryption" id="mail_encryption" class="form-control ">
                                                <option value="tls">TLS</option>
                                                <option selected="" value="ssl">SSL</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail From Address

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <input type="email" class="form-control " id="mail_from_address"
                                                value="meenatest23@gmail.com" name="mail_from_address">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="mb-3">
                                            <label class="class" for="for">
                                                Mail From Name

                                                <span class="form-label-required text-danger">*</span>


                                            </label>
                                            <input type="text" class="form-control " id="mail_from_name" value="Laravel"
                                                name="mail_from_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mx-auto">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                            Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="">Send Test Mail</h3>
                        </div>
                        <div class="card-body">
                            <form class="form-inline" action="/admin/test-email" method="POST">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{-- <input type="hidden" name="_token"
                                                value="YOpPuoKJwqHBlhhYtLFZJijcLW5bvBnDMbz2oI28"> --}}
                                            <div class="form-group mb-2 text-end mt-1">
                                                <label class="class" for="test_email">
                                                    Email Address

                                                    <span class="form-label-required text-danger">*</span>


                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <input name="test_email" type="email"
                                                    class="form-control   mail-address-width" id="test_email"
                                                    placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary mb-2"><i
                                                    class="far fa-paper-plane"></i>
                                                Send Email</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->
    <!--**********************************
            Footer start
        ***********************************-->
        @include ("admin.footer")
    <!--**********************************
            Footer end
        ***********************************-->

    <!--**********************************
           Support ticket button start
        ***********************************-->

    <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php
        include "admin/plugin/plugin_js.php";
    ?>
</body>

</html>
<style>
label {
    color: black !important;
}
</style>
