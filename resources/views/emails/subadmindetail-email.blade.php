<meta name="viewport" content="width=device-width, initial-scale=1.0">

<div class="container">
    <blockquote style=" padding: 20px;
    box-shadow:
      inset 0 -3em 3em rgba(0, 200, 0, 0.3),
      0 0 0 2px white,
      0.3em 0.3em 1em rgba(200, 0, 0, 0.6);">
    <div class="top_title" style="
    text-align: center;
    padding: 10px;
    color: red;
    font-family: serif;">
        <h1>SubAdmin Details</h1>
    </div>
    <div class="top_image" style="text-align: center;">
        <img class="imf-width" style="width:18%" src="https://th.bing.com/th/id/R.12d97b5845e41e70c25541e8be3ba5b0?rik=fZzi8WZzDImSLw&riu=http%3a%2f%2fclipart-library.com%2fimage_gallery2%2fClick-Here-Free-Download-PNG.png&ehk=i88wZx8gEfRwJRlXRZbPq5FDydpPt9WNRCnzK9nYPPU%3d&risl=&pid=ImgRaw&r=0">
    </div>
    <div class="content_layer">
        <!-- <div class="heading" style="
        text-align: center;
        padding: 10px;
        color: red;
        font-family: serif;">
            <h1>Unlayer</h1>
        </div> -->
       
        <p style="
        text-align: center;"><b>name </b> : {{$record->name}}</p>
         <p style="
        text-align: center;"><b>User name </b> : {{$record->userName}}</p>
          <p style="
        text-align: center;"><b>Email </b> : {{$record->email}}</p>
        <p style="
        text-align: center;"><b>Password </b> : {{$password}}</p>
        <p style="
        text-align: center;"><b>District </b> :{{$record->district}}</p>
        <div class="button" style="text-align: center;">
            <a href="{{$url}}" style="color: #FFFFFF;
            background-color: #f35900;
            border-radius: 4px;
            line-height: 120%;
            display: inline-block;
            text-decoration: none;
            text-align: center;
            padding: 10px 20px;
            width: auto;
            max-width: 100%;
            word-wrap: break-word;
            font-size: 14px;">Click Here to Login</a>
        </div>
    </div>
    <div class="term_layer">
        <div class="distruption text-center"style=";">
            <p class="distruption-new">if you have any questions, please email us at customer.success@unlayer.com or visit our FAQS, you can also chat with a reel live human during our operating hours. They can answer questions about your account</p>
        </div>
    </div>

   
    <div class="copyright" style="text-align: center;">
        <p>Copyright @ 2o23 Directorate of Public Libraries. All Rights reserved. Design by <a href="#">Gladindia.</a></p>
    </div>
</blockquote>
</div>

<style>
    .container{
        width: 80%;  margin: auto;
        padding: 10px;
    }
    .distruption{
        text-align: center; 
        padding: 0px 25px 0px 25px;
    }
.distruption-new{
    text-align: center; 
    padding: 0px 50px 0px 50px;
}
@media (max-width: 768px) {
    .container{
        width: 100%;  margin: auto;
        padding: 10px;
    }
    .imf-width {
    width: 100%;
}
.distruption-new{
    text-align: center; 
    padding: 0px;
}
.distruption{
        text-align: center; 
        padding: 0px;
    }
}
/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    .imf-width {
    width: 25%;
}
}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {
    .imf-width {
    width: 25%;
}
}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {
    .imf-width {
    width: 25%;
}
}
</style>