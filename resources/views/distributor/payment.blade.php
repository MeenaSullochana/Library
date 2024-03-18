
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('distributor/images/fevi.svg') }}">
    <?php
        include "distributor/plugin/plugin_css.php";
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
        @include ('distributor.navigation')
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
        <div class="content-body">
            <div class="container-fluid">
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #16123222</h2>
  </div>

  <!-- Main content -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4 h-auto">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <span class="me-3">22-11-2021</span>
              <span class="me-3">#16123222</span>
              <span class="me-3">Visa -1234</span>
              <span class="badge rounded-pill bg-info">SHIPPING</span>
            </div>
            <div class="d-flex">
              <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Invoice</span></button>
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                </ul>
              </div>
            </div>
          </div>
          <table class="table table-borderless">
            <tbody>
            @php
    $data = Session::get('bookitem');
@endphp

@foreach($data as $val)

    <tr>
        <td>
            <div class="d-flex mb-2">
                <div class="flex-shrink-0">
                    <img src="{{ asset("Books/front/" . $val->front_img) }}" alt="" width="35" class="img-fluid">
                </div>
                <div class="flex-lg-grow-1 ms-3">
                    <h6 class="small mb-0"><a href="#" class="text-reset">{{$val->book_title}}</a></h6>
                    <span class="small">Color: {{$val->author_name}}</span>
                </div>
            </div>
        </td>
        <td></td>
        <td class="text-end">₹ 1000</td>
    </tr>
@endforeach

            </tbody>
            <tfoot>
              <!-- <tr>
                <td colspan="2">Subtotal</td>
                <td class="text-end">$159,98</td>
              </tr>
              <tr>
                <td colspan="2">Shipping</td>
                <td class="text-end">$20.00</td>
              </tr>
              <tr>
                <td colspan="2">Discount (Code: NEWYEAR)</td>
                <td class="text-danger text-end">-$10.00</td>
              </tr> -->
              <tr class="fw-bold">
                <td colspan="2">TOTAL</td>
                <td class="text-end">₹ {{count($data)  *1000}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <!-- Payment -->
      <div class="card mb-4 h-auto">
        <div class="card-body">
          <div class="row">
            <h3>Select the Payment Method</h3>
          <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
						<div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 512 204"><path fill="#5F6368" d="M362.927 55.057c14.075 0 24.952 3.839 33.27 11.517c8.317 7.677 12.155 17.914 12.155 30.71v61.42h-17.914V144.63h-.64c-7.677 11.517-18.554 17.275-31.35 17.275c-10.877 0-20.474-3.2-28.151-9.597c-7.038-6.398-11.517-15.355-11.517-24.952c0-10.237 3.84-18.555 11.517-24.953s18.554-8.957 31.35-8.957c11.516 0 20.474 1.92 27.511 6.398v-4.478c0-5.972-2.229-11.943-6.688-15.834l-.99-.801c-5.118-4.479-11.516-7.038-18.553-7.038c-10.877 0-19.194 4.479-24.953 13.436L321.34 74.89c10.236-13.436 23.672-19.834 41.587-19.834M272.715 11.55c11.48 0 22.39 3.995 31.113 11.445l1.517 1.35c8.957 7.678 13.435 19.195 13.435 31.351c0 12.156-4.478 23.033-13.435 31.35c-8.958 8.318-19.834 12.796-32.63 12.796l-30.71-.64v59.502H222.81V11.55zm92.77 97.25c-7.677 0-14.075 1.919-19.193 5.758c-5.119 3.199-7.678 7.677-7.678 13.435c0 5.119 2.56 9.597 6.398 12.157c4.479 3.199 9.597 5.118 14.716 5.118c7.165 0 14.331-2.787 19.936-7.84l1.177-1.117c6.398-5.758 9.597-12.796 9.597-20.474c-5.758-4.478-14.076-7.038-24.952-7.038m-91.49-79.336h-31.99V80.65h31.99c7.037 0 14.075-2.559 18.554-7.677c10.236-9.597 10.236-25.592.64-35.19l-.64-.64c-5.119-5.118-11.517-8.317-18.555-7.677M512 58.256l-63.34 145.235h-19.194l23.672-50.544l-41.587-94.051h20.474l30.07 72.297h.64l29.431-72.297H512z"/><path fill="#4285F4" d="M165.868 86.407c0-5.758-.64-11.516-1.28-17.274H84.615v32.63h45.425c-1.919 10.236-7.677 19.833-16.634 25.592v21.113h27.511c15.995-14.715 24.952-36.469 24.952-62.06"/><path fill="#34A853" d="M84.614 168.942c23.032 0 42.226-7.678 56.302-20.474l-27.511-21.113c-7.678 5.118-17.275 8.317-28.791 8.317c-21.754 0-40.948-14.715-47.346-35.189H9.118v21.753c14.715 28.791 43.506 46.706 75.496 46.706"/><path fill="#FBBC04" d="M37.268 100.483c-3.838-10.237-3.838-21.753 0-32.63V46.1H9.118c-12.157 23.673-12.157 51.824 0 76.136z"/><path fill="#EA4335" d="M84.614 33.304c12.156 0 23.672 4.479 32.63 12.796l24.312-24.312C126.2 7.712 105.727-.605 85.253.034c-31.99 0-61.42 17.915-75.496 46.706l28.151 21.753c5.758-20.474 24.952-35.189 46.706-35.189"/></svg>
								<h4 class="my-2">Google Pay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4" id="GooglePay"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div>
                    <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4" id="Phonepay"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div>
                    <!-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div> -->
                    <!-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div> -->
                    <!-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div> -->
                    <!-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div> -->
                    <!-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div> -->
                    <!-- <div class="col-xl-4 col-lg-12 col-xxl-4 col-sm-12">
                        <div class="card">
                            <div class="card-body text-center ai-icon  text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="6.51em" height="6em" viewBox="0 0 24 24"><path fill="currentColor" d="M10.206 9.941h2.949v4.692c-.402.201-.938.268-1.34.268c-1.072 0-1.609-.536-1.609-1.743zm13.47 4.816c-1.523 6.449-7.985 10.442-14.433 8.919C2.794 22.154-1.199 15.691.324 9.243C1.847 2.794 8.309-1.199 14.757.324c6.449 1.523 10.442 7.985 8.919 14.433m-6.231-5.888a.887.887 0 0 0-.871-.871h-1.609l-3.686-4.222c-.335-.402-.871-.536-1.407-.402l-1.274.401c-.201.067-.268.335-.134.469l4.021 3.82H6.386c-.201 0-.335.134-.335.335v.67c0 .469.402.871.871.871h.938v3.217c0 2.413 1.273 3.82 3.418 3.82c.67 0 1.206-.067 1.877-.335v2.145c0 .603.469 1.072 1.072 1.072h.938a.432.432 0 0 0 .402-.402V9.874h1.542c.201 0 .335-.134.335-.335z"/></svg>
								<h4 class="my-2">Phonepay</h4>
								<a href="javascript:void();;" class="btn my-2 btn-primary btn-lg px-4"><i class="fa fa-usd"></i> Pay Now</a>
							</div>
						</div>
					</div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- Customer Notes -->
      <div class="card mb-4 h-auto">
        <div class="card-body">
          <h3 class="h6">Customer Notes</h3>
          <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
        </div>
      </div>
      <div class="card mb-4 h-auto">
        <!-- Shipping information -->
        <div class="card-body">
          <h3 class="h6">Shipping Information</h3>
          <strong>FedEx</strong>
          <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i class="bi bi-box-arrow-up-right"></i> </span>
          <hr>
          <h3 class="h6">Address</h3>
          <address>
            <strong>John Doe</strong><br>
            1355 Market St, Suite 900<br>
            San Francisco, CA 94103<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>
        </div>
      </div>
    </div>
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
        @include ("distributor.footer")

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
        include "distributor/plugin/plugin_js.php";
        ?>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function () {

    $('#GooglePay').click(function () {
      $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
        $.ajax({
            url: '/distributor/pay-endpoint',
            method: 'POST',
            data: { paymentMethod: 'Google Pay' },
            success: function (response) {

              if(response.success){
                    setTimeout(function() {
                        window.location.href = "/distributor/procurement";
                    }, 3000);
                    toastr.success(response.success, { timeout: 45000 });
                } else {
                    toastr.error(response.error, { timeout: 45000 });
                }            },
            error: function (error) {

                console.error('Ajax request failed:', error);
            }
        });
    });


    $('#Phonepay').click(function () {
      $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
      $.ajax({
            url: '/distributor/pay-endpoint',
            method: 'POST',
            data: { paymentMethod: 'Google Pay' },
            success: function (response) {

              if(response.success){
                    setTimeout(function() {
                        window.location.href = "/distributor/procurement";
                    }, 3000);
                    toastr.success(response.success, { timeout: 45000 });
                } else {
                    toastr.error(response.error, { timeout: 45000 });
                }            },
            error: function (error) {

                console.error('Ajax request failed:', error);
            }
        });

    });
});
</script>

</html>
