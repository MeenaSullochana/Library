
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
    <title>Government of Tamil Nadu - Book Procurement</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher/images/fevi.svg') }}">
    <?php
        include "publisher/plugin/plugin_css.php";
    ?>
</head>

<body>

    <!--*******
        Preloader start
    ********-->
    <div id="preloader">
        <div class="text-center">
            <img src="images/goverment_loader.gif" alt="" width="25%">
        </div>
    </div>
    <!--*******
        Preloader end
    ********-->

    <!--************
        Main wrapper start
    *************-->
    <div id="main-wrapper">
        <!--************
            Nav header start
        *************-->
        @include ('publisher.navigation')
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
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
                        <div class="card mt-2">
                            <div class="card-header">
                                <h4 class="modal-title">Create Ticket</h4>
                            </div>
                        </div>
                        <form id="emailreply1"  method="POST"  action="/publisher/ticketadd" >
                        @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-8 col-xxl-8 col-sm-6">
                                        <div class="row p-1">
                                            <div class="col-md-9">
                                                <div class="mb-3 ps-3">
                                                    <label class="form-label text-danger">Select list (select one):</label>
                                                    <div class="col-sm-12 m-b30">
                                                       <label for="inputState" class="form-label">District </label></label>
                                                        <select class="form-select" id="district" name="district"  required>
                                                         <option name=value="{{ old('district') }}" value=value="{{ old('addredistrictss') }}">{{ old('district') }}</option>
                                                            @foreach($district as $val)
                                                           <option name="{{$val->name}}" value="{{$val->name}}">{{$val->name}}</option>
                                                           @endforeach
                                                       </select>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group mb-2 ps-3">
                                                <label class="form-label">Subject:</label>
                                                    <textarea type="text" class="form-control" name="subject" value=""
                                                        placeholder="Subject" rows="3" autocomplete="off" required="">{{ old('subject') }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-xxl-4 col-sm-6">
                                        <div class="card text-white">
                                            <ul class="list-group list-group-flush" name="record">
                                                <li class="list-group-item d-flex justify-content-between p-3"><span class="mb-0 m-0" name="district"><strong>District Name :</strong></span></li>
                                                <li class="list-group-item d-flex justify-content-between p-3"><span class="mb-0 m-0"  name="name"><strong>Authority Person Name :</strong></span> </li>
                                                <li class="list-group-item d-flex justify-content-between p-3"><span class="mb-0 m-0"  name="phone"><strong>Phone  Number :</strong></span></li>
                                                <li class="list-group-item d-flex justify-content-between p-3"><span class="mb-0 m-0"  name="email"><strong>Email Id :</strong></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden"  value="RtlaiM8Qa3LykH7OsLHxdNOTt5Z2PdGjBmEfqL0f">
                            <div class="modal-body">


                                <div class="form-group">
                                    <label class="form-label">Description:</label>
                                    <textarea class="form-control" name="description" value="" placeholder="Your description"  required
                                        rows="10">{{ old('description') }}</textarea>
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
        <!--************
            Content body end
        *************-->
        <!--************
            Footer start
        *************-->
        @include ("publisher.footer")
        <!--************
            Footer end
        *************-->

        <!--************
           Support ticket button start
        *************-->

        <!--************
           Support ticket button end
        *************-->


    </div>
    <!--************
        Main wrapper end
    *************-->
    <?php
        include "publisher/plugin/plugin_js.php";
        ?>
</body>
@if (Session::has('success'))

<script>

toastr.success("{{ Session::get('success') }}",{timeout:15000});

</script>
@elseif (Session::has('error'))
<script>

toastr.error("{{ Session::get('error') }}",{timeout:15000});

</script>

@endif
<script>
           $(document).ready(function(){
            $('#district').on('change',function(){
                var district= document.getElementById("district").value;
                 $.ajax({
                  url: "/publisher/getdistric/"+district,
                  type: "GET",
                  dataType: "json",
                  success: function(response){
                    console.log(response);
                    if(response.success){
                       $('ul[name="record"]').empty();
                       $('ul[name="record"]').html(response.success);
               }else{
                   toastr.error(response.error,{timeout:25000});
                   $('ul[name="record"]').empty();
                       $('ul[name="record"]').html(response.value);
               }

                } });
             });
        });
      </script>
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
