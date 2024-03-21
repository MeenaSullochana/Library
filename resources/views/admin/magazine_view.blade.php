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
    <title>Government of Tamil Nadu - Book Procurement - Book Add</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/fevi.svg') }}">
    <?php
    include 'admin/plugin/plugin_css.php';
    ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

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
                                <b>View Magazine</b>
                            </h3>
                            <a class="btn btn-primary  btn-sm" href=" {{ url('admin/magazine_list') }}">
                                <i class="fa fa-angle-double-left" aria-hidden="true"></i> List of Magazine </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo rounded" style="background-image: url('https://www.shutterstock.com/image-vector/set-brochure-design-cover-template-260nw-1793474104.jpg')"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">Food Network Magazine The Big, Fun Kids Cookbook Free 19-Recipe Sampler!</h4>
											{{-- <p>UX / UI Designer</p> --}}
										</div>
										{{-- <div class="dropdown ms-auto">
											<a href="#" class="btn btn-primary light sharp" data-bs-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-end">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary me-2"></i> View profile</li>
												<li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#addCloseFriendModal"><i class="fa fa-users text-primary me-2"></i> Add to close
														friends</a></li>
												<li class="dropdown-item"><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#createGroupModal"><i class="fa fa-plus text-primary me-2"></i> Create group</a>
												</li>
												<li class="dropdown-item"><a href="javascript:void(0);" class="text-danger sweet-confirm"><i class="fa fa-ban text-danger me-2"></i> Block</a></li>
											
											</ul>
										</div> --}}
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"
                                        aria-current="true" aria-label="First slide"></li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide">
                                    </li>
                                    <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img src="data:image/jpeg;base64,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"
                                            class="w-100 d-block" alt="First slide" />
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoGCBUTExcTFRUYFxcXGh8bGhoZGhkaGhoZGhoYHxkaGRoaHysjIxwoIBkcJDUlKCwuMjIyHCE3PDcxOysxMi4BCwsLDw4PHBERHDIfIR8xNDExLjExMTExLi4yMzMxMTExMTExMTExMTEuMTExMTExMTEuMTExMTExMTExMTExMf/AABEIAP4AxgMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAFAQIDBAYABwj/xABEEAACAQIEBAMEBwUFBwUAAAABAgMAEQQSITEFE0FRBiJhMnGBkQcUI0JSobFigsHR8CQzcpLhFRZTk7KzwjRDc6Lx/8QAGQEAAwEBAQAAAAAAAAAAAAAAAAECAwQF/8QAKhEAAgIBBAIBAwMFAAAAAAAAAAECERIDEyExUWFBcYHxocHwIiMykbH/2gAMAwEAAhEDEQA/AMt4awC4nFRQMxVZHykra4FidL6dKNz+FUGMjw6yPy5IOdeytIwCuSkdgAzHJYXA66aaiIsKEIZWZWGxViCD3BGop0kTF+YZJDJe+cuxe42OY63qs0TgwiPDCNiYIVeRUmh52V1XnqAshMeQaFzk0Om+2mro/DKNisNCHkRMTE0tpAqyxZUkID6WsTHvYaE6aULeEl+YZJC975y5L3GxzHW/rSlGL8wySGT8eds+1va32091GaDBl7/d+IY/6o0kgQICZMoPMJjDBkyghYmJ0Y5rDf0GYvhuTFPh2zIEkIbMVLKi3LMSvlJCAtpVz6nLGElzTILBY3zMtlsbKjbhbXsBpVYYaxLBnzG9zm1N97nfW+tJzQYt9EScOL4lMPHfMzpGb65XbKHGnRSSP3SaPYnwnGvEYcKJJDDOpZZPJn0WTMLgZbho+2xFBo8PlbOruHvfMGIa53OYa313p0cRXLleQZL5LORkze1kt7N7m9t6NxBgwnH4eg+vx4UySmOaNGR05ZIaRQw89srpa/mUam3Y0BEEbz5Iy4izbyZc6oovIzZdNAGOnarQiIKsHkBQAIQ5uijYKdwB0AqNMNlN1Zge4NjruKW4h7bEj4aXxKYZL5mdIzfXK7ZRJsBopLD929HcX4TRMfFhRI5jmjZ0fyFyVSQ5dBlJzx206MKCJCVbOHcPe+YMQ1ze5zDW+tcIiMvnccv2LMfJrfyfh110trRuoNuQQwnhsPiMLAWdDNhhPICo5gb7UtHGhtdiIxYHuT6U3gfCsPiMYMOwxMSuDkzCMSBljaRuYCtrEKbWHUVRdCz5zJIz3BzlyXuNjmOt6eyuX5hkkMn4y7Z9re1vtpvtpRuxDbkMOBjbCz4lDJaORERWy3KSBzd7D2vKNtN6K+I/DKYeGZ1eUtA0Sszqoil5q3vARqQvW99KEjD2UqGYKSCVzHKSL2JGxIufnTpkZlVGeRlX2VZyVX/Cp0Hwo3ogtOQZ8T+FEw8Ek8crSCMxJY5biSRS0ivYdFaJgez+lUPFXA0wyQyRtI6yKbu4C+ZQhKiMgOhGY6NfpY71WkRmBDSSEMQWBckMVFlLA7kDQX2FLiI2ktzJJHyiwzuWsOwzbD0pb0R7Uhw4XGYoWWUF5ZAmXzWe7AeUFVIy3sSdDfRr6UZn8ORobGNbnMVQSOWYBlYWGhJyG1tDvcrlLUGwPDA7aSJGRYhnfJrfTKbb0V4twWXDwhnxDlWITIskhUhlPewIstrW2tTU7VkONPF9sZg/DeqhkRgzyWIke2WOWKIreym6uxX2ddWFwArNxHAEjEucDNGjMUzsCLsiR2b2Tdklt6OCwFgKHsZDe8spva95G1y+zfXW3TtXEyFSvNlykEFeY9iG9oEXtY9e9TvxL2pBQ+HrMyctSSZQpDyrYq8MYBzXvld2XMLg672tVfjXBVjSWUKiIHVIyJJGIYSPHKDceYBo36dNL9ajNId5ZTtvIx9n2evTp2pJs7AhpJWDWzZpGIbL7NwTrbpfajfiG1Ig45go4eXlkz5kB+95r384stgptYLckW1sdB1J9RX1rqW9Dyx7UgrESpDAC4/EAw+IOhrR4QxthXnaCIugbaNQCRsSPiL0CK1oeEwF8FIgIBObUmwGg3PatNPtr0Z69Un7QAXHN/wsP/yVq3xedZcNEwjRGEhVggAFwhOnpYg0xOHX2lg/5q/wqDCTsmoCsPwuoZfflPX1GtTbXD+SsVLldofxDi8k0SxMFAW1yN2yiw91DstafxDlbDRMqKmdlJCgD7j3GnrTvCrByyPHGcgFiEUN28x69Nabg5SpsUdRRg5JfJl8lIEvRVcUYyREE0Ni5UMzkbnX2VJ2A6UTly4jCvKyKssYa7KLXKjN8iOlQtNPhPkt6jjTa4ZmMtMsO9HcPBHDhmxUqh7aIh9kktlGb94/IXoAPFEquDZJFvrFy48pFx5VAW4PbX33pYVVvsNy26V0SLjuR5ssbX6SKGB+e3wo94zxMWHgiljghBkP3okNlyFtBa19vzoJ9JPClgkSSMWSRWuvRWQrt6HMNPQ0V8c4DnYbCkvHGFtfmSLGCTGLAFtL6HStIxaTj4MpzUpRfwyj4S4tHiZxh5YYjnBysI1RgVBYi6AaWB27VV4kiwzywXJ5bWBPZgGUepswpfDHC/qpbFjLinjDcuPDMsoUsLFpGG2lxYBt6HeHeHy8QxjPISoJLykC1hoAi32Oyi+wHW1TKLcUn3ZUZKM21/il+peC9dKXLUHE/FXLxDRYdEjhjJS4VWdyuhcs4JIJGnpvvpoOByRY5HQhVlVcyuFCEjbzhdDrb4N6Vnt26T5Ndylk1wBstdlo3wfCRiF8RKuZUuAm12BsQf3vL771X/2hJe/kUfgEceQelit7fG9Q4Uk5cWUtTJtRV0CylaPj3/ocMPWP8onqPiODR8OMRGgQg2kQeze9rqOmtvgam48P7Hhven/aatYxcYv6GM5qUo+mZrJXZaO4eVII7SxRu5F0QoucA380jW0BvoDrp2oZiZC5uVRfSNQo/wBfjWEoJLvnwbwm5N8ceSoRSWo5io2w8MLRixlXM0lgTqAVQEg5dD7zalixueCVZchkyeRyqhzcgFbgC51B7709tXTdOhbratK1dAPJXVOENdWJtReKUZwo/sUo/wAX/jQ9EW/mJA7gXPyuKJxY2ERGG0pDA3NhfXrvXo6fycWtdJJXyASg7UgWrcyJfyliP2lykfmb10SLfzEgeguflcVnXJtfFl3i4/s2H94/6Gp3hQeeT/D/ABp+MxUMkaxfaLktlOUG1gRqL66E03huMigDE8xiQLnKAAB0Azeta8ZJ2ctS23Gnbf7gKGwUa9KLcMkH1PFH8Kvf/lXrO8RmiDrypJMh0N08yC9jpfzWGvTaivCuLYSGB4CZnEubO7IFvnXKbebTQVMElLlmms24pJMtcTxskPCo5YjqFjBbKrWBIVjZgRvpt3rJ/wC8eK0IlJO48kQ2v1yb0f4NihArYVkafDvGXA8iyhGvn+yL5mTrca6kgHpnp4uG3zR4qYr0jETFvcHcKvzqp20mn+pGmkm01fNlPjHGZZ1HNkLkLbWwtm1awUAdAPhWs+kZM2Gwgtpcf9qsrI+Cke0ueCNB5Qi8yWXMfM0kmgB0FlAsLm3W+i8TeJMBiYVi5ksRQgowizWsLWK5tRb16Cpiv6Xz2Od5RpcL0BfDEzx4nDlPaMiobdVY2cG3oSf3fdXo+FjVcZOFsGeKJz6ktOt/f5V+Qrz7gXEsFhCZw8mJlW+QCPlIpIOpLsehOutr7bUyHxNNHifrhyu0mjJqF5elkU+mhBsdb9zThJRST8i1Iym24+P9meitbUWIGt+nf43rYfRZd8W7D2ViIPa7PHl/6T8qC8YGBxEjSR4h4C5zNFJEzgMdWytGSLE62Pf4C5FxqLBwPh8LmkkkA5szjl+WxACLfMNCd7WzE+6EkpW30aTblDFLlmtxmKU8PEgPkMpNxtYzvb8yKGql9aCeGfEMccMmGmjLwSXuE0ZCdytztoD0sReiXD8Vho98UWjO14ZA499hlvbreo1alTXgrS/t3Fr5s0UXlwMl/vMbfEqv6g1LxDEPHhsOUIB8m6htoyeo9NxrVXEYpJQq+ZIU1ULZmY9zrbqe/wDKzjcbDJGseWRQtspAU2sLD72uhNWpqmk+lX3MXF5JtPl2/oJjsOuLj50YtKujL39P4g/D3AOXRHBztE+ZfdY6Zl7EdP4Va4nLh5Tm+0RzuQoIPvF9/WspVNZWlL59m8ctN1TcX169EeG4lJhwInRZFsCBexysLgXsQR6EfGrEMeHxN1ROVIBcaAD32HlIv7jUWNmhlVAS6uiKubJdTp7JF76Hr796rwzLFmMZLOQVDFSqqDuddS3bS1PKnUmmiMMllFNP70DojcbV1TLDYe7SurjO8vqLEEbg3+XpVlsa56Jvf2B0Nx8PT1pOXTTHXec3YoxTZs1lve/srbdjtta7HT3dqkbiEn7O1vZX57b1CVpClIKFmxTOuUhLeigH5/D41RxaXUg9RpV1UoRxfiCx+U79B/XSgZn5UNyOxP8AQrsFCcVPHhk8pckZtwAASTb3A6d/nStiCb3JBO3p61Xws7YedZ4iC0ZvY63uLMDboQSKaq+SJXTrstYmWOY5zK2HAtAmILP9pkUA5o418t0y3OYCxGh1tOeAtBHyJcKDq7yYq5ZBEE0ZG2QiwNiNctrEGqE3FIyrokUgjdxI0JkVos42/wDbD5dB5cw2teoWllmzK0krCRizJnYIWJuTkvl36W7VbkjJQl9CbiTtBhsGsRKGWNpJHU5Wds9grONbINLba33q1HmfCz4rLadpIYi4ADJHyVOdPwmTKLsLb6VY4PwqVkERytGGLKHVXsW9rLmBtfqBoe1bLhnAGBkLtdnAzXC2YKoC+UC2lhbTS1Rki8GedTKx4e0sjNzYp1EUlzzLMpLIH3IFsw10qTxq8kmMMS3JCxhR0GaKNnyqOpJJJrTeMuCyBYxpZSSEKqUv1JW2Un3g6aVjsZxTEGRmLguylGflQh8pGUqHEeYeXS4I0ozTVBg07+pY4niG/wBnYcEnWWUHXcIY8gP7IuSB007VZ8JyOI8XGzNFaENp7SszR2cC4sxVhrcHWgf+2JcqREpy4zdFMULWPU+dNz1J39aeOOzXkIcfa/3pMcTZ79DmTb9kaelO1dixdV7NPwuLmTB5CZVihlMecXMjxguA1yc1i+2umWheA4tIVJLGTVXOe7WKSIwOuwJAWwsLH3VUi4nKWifmZTFfl5FRMl99EUDXrcG+oNTnFMUZAFyuRmCRotwpBF8qjS/QWHpUOXBSXPRo+GcWZMNnkdzfEZc1zcAxFv8ALfpReLEB4XZWuDINvXOSPy2rHfW35RgZgEuDlyR6NawN8t81ut71b4Ni5YzHGD9nK/sZVJvr5g2W+m29S5f8Go+l3ZqcddXKqSqoFtbS91BLHvck/KnTPy5ZCoFgqkqR5bkJcW+J916kcHTXba4BsB6kbelRAEXsdW9okAk33uSDUZq7X4K23ST/ACNlQqrFCeW4Fj28y3U/tDUeopzDMpysVZY7NG17EBfMyna/XXW9IVNstzlJuRpa42Otc2Y3udxY6KDa1rXAvtpSzj/P2K25FXJXVaEdJWBuXCtcVpWNIK9E5RjpTclSE1xqaHZS4jII0LkDQdfyrE8QlMmrHe+uw3/QVq/FcbGEWBNmFwO2o2+VYyRA58wYW1Om2psDe2ptQkDJsHB5e1tjpr8betSYfDhzYC3fX+r0xHUAqt/e1goHWw1ot4cjRz7RYk9tL9gB/QpCFw/AFO+pPY/6VqOA+FVzAhT29/f4Vo+BcNUINNT6bVpcJAFGm9KgugTw/gKxAafPX4USjwK2tYVdBppaihWBeO8IWVDYWboRa4ryvi3hQq7+uuunvIr2XEMKGcRwocai5pNFJnz/AMU4O6k2W4X52oSqC511HTY16zx/BhHNhWSx/CFJzAChMGjMRz5SPT41bgmucxvp00FN4hgcuoHwqnC5U7U6EGY5vj6afK5rUeGcUCwWSwIvkv09AbVh4sSQdb60X4Pi15i5zcdCdbflUSRSZ6KRTbUkDXUHuKcawaNUxCtcFpKdek0UNK11PBrqmhkjGkJrm1qVFr0jjIKU0pXWlNIdkM8WdSvcfpqPzFYHjPMd5AATZiWA7jQX9K9CDUI4jGqo5IIPm1A0N72JPoOlAzztWvpe7E6k6DfvWv8AA8JMlgbjQEg6E63FrD+rVmXijGtieu+vp/V61vgVSzrl0Glx16/y/OkwR61w+MKoA7UTjNUuHr5QSbAddqc/EoVNmcA9L7fA0EMvBxTHbSqyTpbNzFt/iHyqnxDHhF/eUfMgUMaLuQmlmUAVWxPEESRUvqwPzHSq0k/MQsWAHc6CpGgH4hVG0Fr1lMbhrXP5Vqmw0eZjzEbXfONPfVHiEUbHKsiFh0B/TvUFo8340AL1n3BF7VpPE8BRmW3rWTV7NVITHO96OcEwbSjMtr3/AIVnkbU1vfo7wgeIyEey9vkP11pS6FHs0PATaBLjXW/vvarxpqi2grs1YtGyFApKW9dU0MUV1NFdSodk5FdeuIrstejRxiFq69IVpKmirONVuKRlonVfaI0/rvVmlpUOzy2RQls1/wBq3Qm+mul62X0VQFsQ1tlF7HfXb060I8ZYSONyQ+ZyfMBoAxtca7kVrvoXwVmme5Jso19Sf5UCNnjY+aeWSQF1Njbr+dYvxjxGDDqU54zgWyqxLDsTbatT4o4dPMjRwuI8/tPrcL1Atrc1gsf9HqZCrSHODfmZTcg7g3IFvlQNMxE/EGke+dmHckH9K2XhOeSeSJSzZQ6kgkkaEVTHhIKAiHOAfaRfcNWuf1rd+BvDhiZJGUqAOuhY9CQKTGSfSarRRLKps4PlNeQ8V49PKMjSEAdATavcPpFCtBkPwryDF8BsNm81zmUXO+2u1IF0AMCfMLvl94IrV4dFkUWkUsu2VuvuvehXEODxtGqgZXW+pUgttox/jVNeFMlgjgn0/QdqQBvH55VKPq6gi/UisPKuViD0NegcGhdh9oNdvfWQ8Q4QpKwt1/jSQ2CVNeseAMKFwad2LMfeTp+Vq8ugUEgEe/vavUPBjkptlQbC/S1tqJdBEOOtRstSmm2rNotMappbdqUCuqWihoFdSkV1ILJqVjTWrhXoUcSYjUwmn2pLUqKsbXE04rTbVNFJlLFeHFlfGO49nK6a2F3GYXPajP0TDLBJtfMAf8vrVzid2wAK+01lbT8PlH5Ung/D8hHU73GYdjagL4NVbrVTF4NJN1BP7QvVuOTapktRQrKuAwAXzHpsLWAq1LuKfI4AqLDvfU0gsy/0gv7K/GhvAcrDIwvpWg8WBHU3tqNzWO4PMUly+m/5VDRougxieGKD7IceoBPx71Sm4TGNQgX3ACtBzLih3EHA/wD2hoaAOMw4UHpWC8ZL9sp7jWtxxLF3uKwfiqNpJFy9FJPuuKQMCmIgqfxGwr1Lw1hAmGjzXuRtcW6+m1YXg0XOKJuUkUj4mx/WvS+XlAHbSlIIjy96beo7U6poocDSE0w0qipoaY/NXUzNXUqGXSnrb1PT191OdI7gA6ZjrfXLlU7EDW5I+FNBsQbXsb23vVjFSOLoy2uOrBmBuPaI6ixFjbcdq7pJnEmRIkf4zbvcXvY6W6dNe5tTXSO4833gCbj2cq3/ADLDa3cirDyuuYsvsMMxLrcEOgC3uTcmFtB3vsNa4xRClehZjfNZrsMunl31ve2/yqKkXaIZSoYgEEdDfcb7029WjjjocgG5FnsfNJc3Ou7IB0099VLaU1YWaLwwQ6PCQCL3sex6g9wRU+JwapKSt/Mtjf09etZ/huMMMmcC/QjuDRuTjccjJGt8zH8J0sCdT8KYFyBz3q/CdKpwrY1cjN6AHhS3urNcfkxWHmZ43DQtHYoRqrjqCK0oxABsN6o8WxMLBo3lQMRsSLikxo8g8VeKZ5V5SsFc7nU2q/8AR20kr/ag+RLX7knepuL+H8OJCwljP7y/wNXeE2gF9CN7qRb51BZqZFyis3xvEEXtf30VbHhl0NZ7iswN6TKQDnmJNCcQuZmFwCQACfz/AForKvahDSDnWOm1vX3d9dKVCC3hbhwjnAAY/eJNrADUAet7VrnIqhwfDlVzMLM2w6hegPr/AKVYY+tIaLkaRZPa82Uki4AzX03I6X6/O9IFjuPNvlJ8wFgwkuDe3s2S/XU1UXWiHCMn2mfJfKMufl75xe3MBW+W/SlQWQRrFoCeguc3XlqTpb8ZI+FOlSOxKvc2JAJtb2iBbqdAv57HS0EhWEgMha2b2kLMeRJcWK+T7Q5QNTop3pccMPZ1QqLGRkKuDoEiKA3FzmIYAE6HNSxDIF11NBrqmiggrEEW3DC3vBFvzq/K7x8y0Q+0DZyhZ1Gsqve40Aa/+Xe1DE9oW3uP10ojLzczWdZCZGX710lAYELnt912A3HxrvmjiixxxkvmflsFBDG+YCzPMR+chsehRTVduJyEWF10YaM17siIGJ6sAntd2bauxcszgl00ewubjzZmIbVrKSQw6DfSq8eFYlg3kykKbhiczXyqFQEkkAnToKmkVbLMvFSeYMgGdWUkE6B2kPboZfTYUPAqc4V7XClvLmNgR1cWs1iT5Cbb79jXT4Z1ubEhSAT2JAtcHUb2uRRSDkgNSYR8rq3YimWrr0qHZrI5BvvT558qFuwrO4LH2shPu9RRBZri3SgDI4t+LTNI+HVRGxsCzZWA/ZuNqzeK4BxBCWmjlI1JMbCS+m1lGa969a+sZUtt7vzrNcW8SSYdtAHHof1HepaLTPLcSknmuJAQbAGOQHTuLf1amYXiOJg2SQKdwQbH4Gt3jPHkjKVWLKfh/KgCcQaRtQNd/wCtqkaLfh/iLshZwVPY9qszT31qni5wqjQC9VhNpSKstPJ1rR8HgCwxkgXy5rkC4zXOnzrGTYpQPMbAmxtvqenrW+idWRWQgoQMpGxFtKBoQmiHDcVGsZSQkXLpsTaOUJnYW6gp7/MaHuKiYVPQ+wvJjYpbczQ3JvlclQ2IZstgbFeU39HSkXE4ZZEIVSM92uJGCry0vYG1xzMx1F/TahIqxFiAtvKScuU69RmsRbW/m79N6VhRMJcOFFwpYLsOaPPy5L5rn2TJky21A3trXTTQkSrcBQt4h59HYAvYerAC7HQKLXpfrJurck6ElRY2PMZvTYhrC2/rYWjeRgoAjYAIQCQTsEUvqNLZX2sBm73JPsFFJK6nIK6lQ7Js2tx3orDNOTzE5YzeYhRbzSsPMwte5IBvfYH1FCAa4V6Eo2cEZUFDNMGDXTMykjQ6rGZD20vzHsdOm2lQT4qRJXzZSzFSwKgrdQMjDsQDuO5qpnPc9ep6700VGBWRcPEZDqSPQ5Robv5l7N9ow+I7U6XiEjoyEjK2+nYqf/EVTApQNz0AufQdzSxRWRxpKgfEjltKoLxp/eFLFkH4sh1IvppRHDYW0YYuGZlcXUWW5ZIowFNzfPIde6UmME8RksM5NkQB2I3sxULY9rOrfvCjeBxHKk5Uh/wt0Yfz9Kz/AIqjzYSaxtmZ/gq4mFAP8qgfCizkYjDqT7QFm7h10J+YpUBqkwiPYm/zofxnwzC6FiGLdACAT89KAcH8RNhzyptvut/OiOM8TRldHBFJ0MB8T8GRoMysD31NwTQZ+ErFqQf4X7GiHFvEwHstWW4px9pN6hotEmNkXeqEuK6DWh02KZzXI9qQ7I+OubR23uT8rUZ8OeKpMMhjKcyM+dRexUH2wD261meK4i7rb7v8akg01AvkIe37Dbj3X/WgdnpvDvFmEm3cx7C76LfsGoymVxmQhh3BBH5V45jMDkff7P2vgRcW94/Q1f4Tj5kYNGSHcWjW5yog3dl2+dKh2ep5K4LWS4d4tctksJFQeeVjl23Nh07UWwviGNgCVZQxsmxzeqje1TRVh1cVIBlDaWVSLAiygADUbafHXvXSYuQ/e6MugA8rm7DT1qmmLjbUOLba6a/Gpd9aQ+BAK6lIrqVARqaepqESCwLaJmyFz7KPsFk/D8acc/Mkw5GTEABotiknXLr0Pf0NekzzEPkcKLkgDuabinKc0ZSzxRiRkG5jP3l72qMOjqxkumHxDBXBuWwuKXSxvsh+XzpMG7BxCHC4qFSIWAzLNGd42tuD0PT4VLZaJZJMrM5BbDSRjJKm6u40uR1BqHErJHIYQ4E/JV4J1JVZljuTG6k5bk31PeoMNj40uzqIsLigYpIs12w+IXZrWuATb41muLcUIiOHYuz4aQcp1Q2DNsp0BGa+mul6lspGl4Vh0xLS483WJYgzRroGmJ1RrG+UEXO24rRTWXlKBa31FPQEzSSNfX0BrP8AB8BJhMLjUdeWWiSRlJLZXmezLm6kiP4aUeWUOwJ3EmBa37pt8L6VmWAeMsWwbdzDipO3sYiJri/uofwriXKx0sBJyShZE95RcwHvH8aLrhXxCRRIhZmw+NS3QFpEygk6DXvQ3ifhDEnE4R+UFCpCsxWSMFSukh9u5Nu1DBBbiWDSRdR/XesdxjhzJcjavVZuCo6nKQhB/Fe4+dAuIeF7g3lGvYf60mhpnkuIcikwmCmmuY4pZQDYmON3APY5QbGttxPwbHuJT8hRf6L+FjDyYkBy2YRbi2xl/nWU5Yxs0irZ5tFw2cgsuHmZRcEiKQgFSQwJAsLEEHtY1QxYkWNZTG4jY2VyrBGOuisRY7HbtXsZhI4VjVNrn62dwfaklI29/wAKB8c4bPJwvDRNPCICYQH5bB8jZRGXu5UZQ1zbe2+94Uy8TyXNc3NFeHHKVv0YxsN/LIND8633Ffo3ggyvlxM0QH2hieMSqfxLGYiGS3QNm99YHiSos0iRMWiOYIzaEqlzGzaDzZbdBrfQVSkpdCfAaTg2IKZHw02hyaxSWYamOxtrrcafioZjA6NyQpVpPaLAqwXohB1AHUfzr2HGDNg8Bt/e4Q6kDYxnQkjX03PShfiXhMXE8cYVcxmGL7VgpDsWbyouYaqNy2oF1AvfSFqeSmjzWFktl1MMZ1HWWTsB1FXXxcivp/6iSw02iToidjbc1fwnBOZDipowUbBZgt3DxPlz8xkYIpzgIWvrfMNr3osnggwpAryMZ8U+R2DBFiUoXbKSrFm0y9Lm229U5IVMG8JhdwQkcsiIftZVjaUluscQsRfuelXExgXKSJFdz5IUYtKe3Nc+zf8ACoFbPwTwr6pJiIAymNDFktvYq5OcfjJv79D1rKzYGPDIJTzVxM3Mdpm0jhj5jjOGK2L5bWQEnY6C15UrdDot4fEyZmQh5JF9qKIKwjHTO7G2b9ka0tC4REI1aXmJA1zDEjESv3nlIN7t0B711XQWFpuLO6tI8aGTnrh5rMckqMLXdQLX10Ya0MxHE25WIUrZsGbwuSxkVc1sjNpcC2529adx18rY1QbL9jOoFhqMt/8ApqPjDrzsei6iWDmLfqQAxtXczz0X+LY1+Zi/Mt/q8efKoyys9/O4a4zL3Fj61UwKFjgC7u5KSkWbLYR3yDMpB0ve9xtVfFSKz4pwdJMJE4v19Ndtqs8NILcPA3MU4Py/nSKBTRgw4I/fld3kkv5zmkUC7b6DTvU3C4wcQxN+UmMRmG+fJawYnfXv3NRSECDh+9he+o/4q3sO+lWuA4mNZxnKgHFSFi57AZSdxobVJRpeMcUM8JbK5OKw+bTZWw0x306q+p9Ku4YHmFBoeZg4tN80SmaT/wCp3oFg8UsSopkiFoMSpOcf3jSgn5jUDtUOD46V5btNAzmUSn7TzNnTkcsRqL5lXznXXSpZSNhJwZRPBhs8nLCTSyHKcjM2iqWGmmdiAT91TVPH+BYY4YmM72wis98ikuFOezC/7NqwniDHqmIkBxFvq/KRL5jzXjy82y3Nr5mOp7Cu4lxGGUYlI8RmzyI8YGYEqy/aIACAANdKnnyV9hvGvHKvGixKy+cl19gFRkKqCnqDe/p2ofJ4xUkkxMPRZnpniHCL7SooHJiawB0zOVYi/XaqDcOXLe3vpOxqi5ifFKsxISRb9BISNz39/wCQrVfRZx+BDiHmmWMNywvMkW5K8wsQN7eZdf5GvOpcKOgohwPCwDOZ0ZwUYLlJFnLRhWuD91eY3W+gsazlHJUVGVcnpC8Zw3+zsVB9Zh5jnFZF5qa8x5Clje2oYdetMxvG8GOG4aKSSOUxLh+bEsiFiECBwLN5rW2B1tbrWRZOE3YhJALkhXElxeI2BZHIyCS3djrrbShWMGCOGQRq4xOVMxGfJmv5iMx2y3zae1ly6AkxtovM3uE8axpiRymiTACMAhmXMrDNrFEhLre6rky20J0uTWF41jWxGIlmijVY5ZCyg5bgHQk67nc+pNE/og04iq9DG+YdCQL6j316XFgo8RicbBKoaMLBlFvYLRvcp+E6A3HaobUGOskD8ZxGFsNhIlliLxSYZpBnTyiNkMh3sbWO1/SosTx/h8uN5sqgrEnKSZ0bIXLnMLEbDYMRbVvecpieBzwYc4mU2izEDIqs2TUK7guoGbSwF9xe1R/7vYh+ThUyus8Ymjl8wBTMGYyA6qQGW419oAXvTUF5C2a88XhGAxcJxEQdziVjUypaztJylBvZRlK2Glh2qpxXxBhccmDz5WAkDzQswQ25b2IzEB1D2NgTcDUb1L4T4CcPLiZhkxDRyCNlZRGVtGHZoyWYE+dRrl2bvqGxHh5sRNDjTlw8eJmVYYlXOQJFZlZ9VCg5SdL+0NOlJJWPmjS+GuN4JZsRKkiRRyMipnbLzHQMHZUJuouQLWF7E21qrNxPBtw14XlikdGdsjSJcuJndbm9tT66g2rN4LwbiGxf1ViicpmmL3JUxubIUG5JIIsbWyn0vFi/Dww8c6STFJQ2ZI5YQgmCm45UgkZWvfbca6UYxvsVsaxRvt8XIwEn93Gty2UfesNlGw99dQpMeySTTochLiOxVWsAtyBfQajpS1rQgxiJM5U3/vMGVJPdKXAyZ5sO5uRJAUN7bhSpBvVPPt6aD3U5Xtb029K7mcFjsPJdba3+plDfvG50+VXuAy64JjfyrMvzFx+lDQ1PD/lUsqxuJH9nwJF7hmuO32g3+VRYnBiY5PxYw3P7BXf3VMX/ACrg9S0UmAX4G2SVhqY3AA9CxF6MvwcYTGLIkZljheE2JF2JRSTf/wCQ/oKlL7jod71OuJNrX3BF/gLfmoqGkXkwJxrDNKpcR5TzZHLE6kOVsp7BQOv4vnVwfDHSVdrpIt9QfLvsKM8Rm+yk7ec/BmjNS4ZQqZ+r6/y/Kih5MvcTwrOjEC4GFyjNa/MD5gPyoQcLJqNNfUddf41HjOItsCaHT4pj1NJgFYuEPe5t8xVhsCFFsy394rLPKT1PzqFjSKQYxuEN/aW3vFImCsL5k/zChAelIvUlG0+idLcSvcMOW5JGoXS2p6b0e8a+KXwOLnjiSzzxxkSsbqmRGAKJl1IudSxFxt0ryWZLVyfrp/Os5QTlbKT4o9h4LDFJwvDgSHEtzIs6O5cJnlQSKYr2sqs3tA2GtaLi+Ojhx+Ez6LJHLCrAeUSM8DIpI2uIyBXgYw7ufKpsNri2nvNaLwrwhXYxSTLAJSoaQm32YzcyMNsGYlLX0OUg9jL0/lspSPUF4jHhV4hLKcoM7FAdDJfDwgBAfaJOmlD5+NJiMFgpYpLcuaIS5EWSSKyOrnIVYix2a2xuKTi3D8A9sHBHhlCIWebyXjAUiMLJu8rMASCToDfcVgEUEA2FTGCfIN0ehyYjDNxFpHxcpaOFRHlta7MxkjGRPtCLIchB1Zt7WVuN40mJwUq4uLluh+xzCxkk15bxqfMrAgZtwLnU6isGop6WFVtoVlabAu8ZQkAmQvf0tYCuq6Hrq0FZWz0oeq/NFODiuyzgRNnpeZUGcClEg7UiibNSmSoS4pDMO1IpFjPXB6hWWlLipZR2KGZSv4gV+e1Ox8+yLr0qF5qdHIN+tSxnYTh5bVqnm4attqcuNApZOI6dKCkDMVw8dBVCbCEUZkxl6rSYi/akxgV4jSC46VuJ8bgLMFjJvGEF1AOZExA5t7GxcmE6WIIJNwCrIMZgbvmjV7tIYykfLCRlCIldSt2YN1zb63apHZhsSNBRPg+At9o4/wAI/ia0/wBfwF9I0UlZNSlwrh0EJUFXAvGHLeU+Zum4m8OSQtCpaCWZ0lzMUid0OmVMOzJexYlW+NqQ0wxP4XiCRMplYtCZOWCA0rCCKQJFeLcl2HlEoslr5rqIsZ4ZiWDESBpS0TMFuVyjLHhnKSWjy5wZnQ+dSTH5VOoEImwisiJg5X+1iiYtE4fyMzNcBSTK8YDcsEXzHcCqnDWjVYhyHlu8Kl1hc5gHxEsuUNGSbwNCbLlJUXvYagyWHg0IwyYiRZlXJzGkUpkY/WWiaKMGO/N5a8weZtjcAEGncV8OZFl5IlleGVYXsAVJMbmR7Kt1XOAoJO2++kRRTGAIJM7QIqlYHLmZI/tcv2NiC4JY5iQBcMNUMeCaO0Sy4dhlVMxEDeZmxKlVuFuTJDG8a92zD8RBQBxvCMIkZOc2XIoR80RUziYwvGSosASFt1UyLmvYihqcHjb60E5xbDh7FiAhKPNcsyxsB5ESysUzHPZhoKrR4dMjF45FV4olzLh5CY5EQJMAWjyH7S5Ygg7WN7oz8fLFnm/s0kSGM5A0L8yKQx3yi6lbWiZ7nKQpkIYZTUjsC5jXVROJNdQBEL04OagzV2auqzjosFj3pAT3qC9dekOixn9aT41BelzUmxpE4PrS5qrZqcGpDFm2Ou4t8elSTuFAHWq8jVJCNbnU0mUSYeAtvT5MJU0b2pZJtNqCkDZobbVVlBFEJ5xbaqMsmakxlYyUonpj1GakqiWWW9qLeGuISQm6BbCSOXzAnzwsWQCxGl21/hQQDpRaDyiwoB8Gli8SyqLBY/aDk5TfmBUUSAg3DZYwLCy2JsNrI/iaUlmyx5mJN8rHKTDyCUUsVW66mw1IF9ABWfLUmagVh7B+IpIjmRIw9kDMQxL8uJoo8wLZfKjsNAL9b1MfFk1guWKy5ct1Y2KZeWdWN8rAsL31d972rOZqTNSCw7F4hlWQyqsYcu7khdC8hhZ2te1y0Cntq3pZY/EMiRNCiRpG0bR5AGICMJb2LMTe8rtcnf00oCHrs1BRNcV1Q566igP/2Q=="
                                            class="w-100 d-block" alt="Second slide" />
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="data:image/jpeg;base64,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"
                                            class="w-100 d-block" alt="Third slide" />
                                        <div class="carousel-caption d-none d-md-block">
                                            <h3>Title</h3>
                                            <p>Description</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="magazine-title h3 fw-bold w-100 mt-4 mb-4">Food Network Magazine The
                                        Big, Fun Kids Cookbook Free 19-Recipe Sampler!</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6 fw-bolder p-2">Frequency:</div>
                                        <div class="col-6">Monthly</div>

                                        <div class="col-6 fw-bolder p-2">Single Issue Rate:</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Annual Subscription:</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Discount %:</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Single Issue After Discount :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Annual Subscription After Discount :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Total Subscription Before Discount :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Total Subscription After Discount :</div>
                                        <div class="col-6">90</div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-6 fw-bolder p-2">Difference in Amount :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">RNI Details :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Paper Quality :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Type of Library :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Total Number of Pages :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Number of Multicolour pages :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Number of Monocolour Pages :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Size of the Magazine :</div>
                                        <div class="col-6">90</div>

                                        <div class="col-6 fw-bolder p-2">Size of the Magazine :</div>
                                        <div class="col-6">90</div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Read PDF</h4>
                                    orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s
                                </div>
                                <div class="col-md-4">
                                    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Read PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row card p-1">
                    <p class="h3 p-3 bg-main text-white">Contact Person Details with Address</p>
                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Person Name:</div>
                            <div class="col-6">Name</div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Email Id </div>
                            <div class="col-6">Email Id </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Number </div>
                            <div class="col-6">90089988790 </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Country </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">State </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">District </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">City </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Pincode </div>
                            <div class="col-6">india </div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bolder p-2">Contact Person Address </div>
                            <div class="col-6">india </div>
                        </div>
                    </div>
                    <p class="h2 bg-main text-white">Official Address</p>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            Official Address
                        </div>
                    </div>

                    <p class="h2 bg-main text-white">Bank Account Details</p>
                    <hr>
                    <div class="row">
                        <div class="col-6 fw-bolder p-2">IFSC Code </div>
                        <div class="col-6">IFSC7868 </div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Bank Account Number </div>
                        <div class="col-6">IFSC7868 </div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Bank Name </div>
                        <div class="col-6">IFSC7868 </div>
                    </div>

                    <div class="row">
                        <div class="col-6 fw-bolder p-2">Account Holder Name </div>
                        <div class="col-6">IFSC7868 </div>
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
    @include ('publisher.footer')
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
    include 'publisher/plugin/plugin_js.php';
    ?>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">
                    Read magazine Sample
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe
                    src="http://docs.google.com/gview?url=http://www.pdf995.com/samples/pdf.pdf&embedded=true"
                    style="width:100%; height:1000px;" frameborder="0"></iframe>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary"
                    data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                    Open second modal
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-main{
        background-color: #222B40;
    }
    </style>
