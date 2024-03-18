
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

    <!-- PAGE TITLE HERE -->
    <title>Government of Tamil Nadu - Book Procurement</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/fevi.svg">
    <?php
        include "plugin/plugin_css.php";
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
        <?php
			include "navigation.php";
		?>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body bg-white">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h3 class="mb-0 bc-title">
                            <b>Create Ticket</b>
                        </h3>
                        <a class="btn btn-primary  btn-sm" href="ticket_list.php">
                            <i class="fas fa-plus"></i> List of Ticket </a>
                    </div>
                </div>
                <div class="row">
                    <div class="container modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create Ticket</h4>

                        </div>

                        <form id="emailreply1">
                            <input type="hidden" name="_token" value="RtlaiM8Qa3LykH7OsLHxdNOTt5Z2PdGjBmEfqL0f">
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        autocomplete="off" required="">
                                </div>

                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Your Message"
                                        rows="10"></textarea>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" id="submit-btn" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
        <?php
            include "footer.php";
        ?>
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
        include "plugin/plugin_js.php";
        include 'error/error_handle.php';
    ?>
</body>

</html>
<style>
.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #f8fafc;
    background-clip: padding-box;
    border: 1px solid transparent;
    border-radius: 4px;
    outline: 0;
}
</style>
