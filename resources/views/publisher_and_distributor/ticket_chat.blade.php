
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('publisher_and_distributor/images/fevi.svg') }}">
    <?php
        include "publisher_and_distributor/plugin/plugin_css.php";
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
        @include("publisher_and_distributor.navigation")
        <!--************
            Sidebar end
        *************-->
        <!--************
            Content body start
        *************-->
        <div class="content-body">
            <div class="card ">
                <div class="container clearfix mt-1">
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <div class="people-list card bg-black" id="people-list">
                                <div class="search">
                                    <input type="text" class="text-white" placeholder="search" />
                                    <i class="fa fa-search text-white"></i>
                                </div>
                                <ul class="list">
                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Vincent Porter</div>
                                            <div class="status">
                                                <i class="fa fa-circle online"></i> online
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_02.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Aiden Chavez</div>
                                            <div class="status">
                                                <i class="fa fa-circle offline"></i> left 7 mins ago
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_03.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Mike Thomas</div>
                                            <div class="status">
                                                <i class="fa fa-circle online"></i> online
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_04.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Erica Hughes</div>
                                            <div class="status">
                                                <i class="fa fa-circle online"></i> online
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_05.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Ginger Johnston</div>
                                            <div class="status">
                                                <i class="fa fa-circle online"></i> online
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_06.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Tracy Carpenter</div>
                                            <div class="status">
                                                <i class="fa fa-circle offline"></i> left 30 mins ago
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_07.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Christian Kelly</div>
                                            <div class="status">
                                                <i class="fa fa-circle offline"></i> left 10 hours ago
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_08.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Monica Ward</div>
                                            <div class="status">
                                                <i class="fa fa-circle online"></i> online
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_09.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Dean Henry</div>
                                            <div class="status">
                                                <i class="fa fa-circle offline"></i> offline since Oct 28
                                            </div>
                                        </div>
                                    </li>

                                    <li class="clearfix">
                                        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_10.jpg"
                                            alt="avatar" />
                                        <div class="about">
                                            <div class="name">Peyton Mckinney</div>
                                            <div class="status">
                                                <i class="fa fa-circle online"></i> online
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="col-md-12">

                            <div class="chat">

                            <div class="chat-header clearfix d-flex">
                                @foreach($data as $value)
                                    @if($value->status=='2')
                                        <div class="profile-picture">
                                            <img src="{{asset("sub_admin/SubAdminImage/".$value->subadminImage)}}" alt="" class="rounded-image">
                                        </div>
                                        <div class="chat-about">
                                            <div class="chat-with">Chat with {{$value->name}}</div>
                                            <div class="chat-num-messages">online</div>
                                        </div>

                                    @endif
                                @endforeach

                            </div>
                                <div class="chat-history">
                                    <ul name="record">
                                    @foreach($data as $value)
                                     @if($value->status=='0')
                                        <li class="clearfix">
                                            <div class="message-data align-right">
                                                <span class="message-data-time">{{$value->date}}</span> &nbsp; &nbsp;
                                                <span class="message-data-name">{{$value->name}}</span> <i
                                                    class="fa fa-circle me"></i>

                                            </div>
                                            <div class="message other-message float-right">
                                            {{$value->message}}
                                            </div>
                                        </li>
                                        @endif
                                         @if($value->status=='1')
                                        <li>
                                            <div class="message-data">
                                                <span class="message-data-name"><i class="fa fa-circle online"></i>
                                                {{$value->name}}</span>
                                                <span class="message-data-time">{{$value->date}}</span>
                                            </div>
                                            <div class="message my-message">
                                            {{$value->message}}
                                            </div>
                                        </li>
                                        @endif
                                            @endforeach

                                    </ul>

                                </div> <!-- end chat-history -->
                                @foreach($data as $value)
                                @if($value->status=='4')
                                <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                                 <div class="input-group mb-0">
                                    <input type="text" class="form-control" placeholder="Type message"
                                       aria-label="Recipient's username" id ="datas"  ria-describedby="button-addon2" />
                                  <button class="btn btn-warning button-addon2" type="button" data-id="{{$value->ticketid}}" style="padding-top: .55rem;">
                                       Send Neaaage
                                  </button>
                                 </div>
                                   </div>
                                   @endif
                                   @endforeach
                            </div> <!-- end chat -->
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
        @include("publisher_and_distributor.footer")
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
    include "publisher_and_distributor/plugin/plugin_js.php";
?>

</body>
<script>

       $(document).on('click','.button-addon2',function(e){
        e.preventDefault();
          var id = $(this).data('id');
           var  message=$('#datas').val();
           console.log(message);
          $.ajaxSetup({
             headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
             }
          });
          $.ajax({
             type:"post",
             dataType: "json",
             data:{'message': message,},
             url: "/publisher_and_distributor/chatmessage/" + id,
             success: function(response) {
                console.log(response);
                if(response.success){
                       $('ul[name="record"]').empty();
                       $('ul[name="record"]').html(response.success);
                       document.getElementById('datas').value = '';
               }else{
                     document.getElementById('datas').value = '';
                   toastr.error(response.error,{timeout:25000});

               }

            }
          })

       });

      </script>
</html>
<style>


.people-list {
    width: 260px;
    float: left;
}

.people-list .search {
    padding: 15px;
}

.people-list input {
    border-radius: 3px;
    border: none;
    padding: 9px;
    color: white;
    background: #c7c7c7;
    width: 90%;
    font-size: 14px;
}

.people-list .fa-search {
    position: relative;
    left: -25px;
}

.people-list ul {
    padding: 20px;
    height: 770px;
}

.people-list ul li {
    padding-bottom: 20px;
}

.people-list img {
    float: left;
}

.people-list .about {
    float: left;
    margin-top: 8px;
}

.people-list .about {
    padding-left: 8px;
}

.people-list .status {
    color: #92959e;
}

.chat {
    /* width: 490px; */
    width: 100%;
    float: left;
    background: #f2f5f8;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
    color: #434651;
}

.chat .chat-header {
    padding: 20px;
    border-bottom: 2px solid white;
}

.chat .chat-header img {
    float: left;
}

.chat .chat-header .chat-about {
    float: left;
    padding-left: 10px;
    margin-top: 6px;
}

.chat .chat-header .chat-with {
    font-weight: bold;
    font-size: 16px;
}

.chat .chat-header .chat-num-messages {
    color: #92959e;
}

.chat .chat-header .fa-star {
    float: right;
    color: #d8dadf;
    font-size: 20px;
    margin-top: 12px;
}

.chat .chat-history {
    padding: 30px 30px 20px;
    border-bottom: 2px solid white;
    overflow-y: scroll;
    height: 575px;
}

.chat .chat-history .message-data {
    margin-bottom: 15px;
}

.chat .chat-history .message-data-time {
    color: #a8aab1;
    padding-left: 6px;
}

.chat .chat-history .message {
    color: white;
    padding: 18px 20px;
    line-height: 26px;
    font-size: 16px;
    border-radius: 7px;
    margin-bottom: 30px;
    width: 90%;
    position: relative;
}

.chat .chat-history .message:after {
    bottom: 100%;
    left: 7%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-bottom-color: #86bb71;
    border-width: 10px;
    margin-left: -10px;
}

.chat .chat-history .my-message {
    background: #86bb71;
}

.chat .chat-history .other-message {
    background: #94c2ed;
}

.chat .chat-history .other-message:after {
    border-bottom-color: #94c2ed;
    left: 93%;
}

.chat .chat-message {
    padding: 30px;
}

.chat .chat-message textarea {
    width: 100%;
    border: none;
    padding: 10px 20px;
    font: 14px/22px "Lato", Arial, sans-serif;
    margin-bottom: 10px;
    border-radius: 5px;
    resize: none;
}

.chat .chat-message .fa-file-o,
.chat .chat-message .fa-file-image-o {
    font-size: 16px;
    color: gray;
    cursor: pointer;
}

.chat .chat-message button {
    float: right;
    color: #94c2ed;
    font-size: 16px;
    text-transform: uppercase;
    border: none;
    cursor: pointer;
    font-weight: bold;
    background: #f2f5f8;
}

.chat .chat-message button:hover {
    color: #75b1e8;
}

.online,
.offline,
.me {
    margin-right: 3px;
    font-size: 10px;
}

.online {
    color: #86bb71;
}

.offline {
    color: #e38968;
}

.me {
    color: #94c2ed;
}

.align-left {
    text-align: left;
}

.align-right {
    text-align: right;
}

.float-right {
    float: right;
}

.clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

.profile-picture {
    width: 50px; /* Set the desired width */
    height: 50px; /* Set the desired height */
    border-radius: 50%; /* Make it round */
    overflow: hidden; /* Hide any overflow */
    margin-right: 10px; /* Adjust margin as needed */
}

.rounded-image {
    width: 100%;
    height: auto;
    display: block;
}

</style>
