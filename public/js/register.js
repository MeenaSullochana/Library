$(document).ready(function () {

   //***************************************************** */
   //###################Book Publisher#######################
   //***************************************************** */
//Publisher-username check
$('#pub_state').on('change', function() {
   // alert('asfasd');
   var stateId = $(this).val();
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type: "post",
      dataType: "json",
      url: '/getdistrict',
      data: {'state_id':stateId},
       success: function(response) {
           var districts = response.districts;
           $('#pub_district').empty();
 $('#pub_district').append('<option value="">Select District</option>');
           $.each(districts, function(key, value) {
               $('#pub_district').append('<option value="' + value.name + '">' + value.name + '</option>');
           });
       },
       error: function(xhr, status, error) {
           console.error(error);
       }
   });
});

$('#con_state').on('change', function() {
   // alert('asfasd');
   var stateId = $(this).val();
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
   $.ajax({
      type: "post",
      dataType: "json",
      url: '/getdistrict',
      data: {'state_id':stateId},
       success: function(response) {
           var districts = response.districts;
           $('#con_district').empty();
  $('#con_district').append('<option value="">Select District</option>');
           $.each(districts, function(key, value) {
               $('#con_district').append('<option value="' + value.name + '">' + value.name + '</option>');
           });
       },
       error: function(xhr, status, error) {
           console.error(error);
       }
   });
});
var typingTimer;
var doneTypingInterval = 1000;
$('#user_name').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#user_name').val) {
        typingTimer = setTimeout(function(){
             var v = $("#user_name").val();
             if(v.length == 0){
               $("#checkusername").html("Username required");
               toastr.error('Username required!');
             }else{
  //ajax
  $.ajaxSetup({
   headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
   }
});
$.ajax({
  type: "post",
  dataType: "json",
  url: '/check/username',
  data: {'userName':v},
  success: function(response) {
     if(response.success){
      var username = document.getElementById("usernameval");
      username.value = 1;
      $("#checkusername").html("");
     }else{
      var username = document.getElementById("usernameval");
      username.value = 0;
      $("#checkusername").html("Username already taken");
      toastr.error('Username already taken!');
     }

  }
});
             }
          


        }, doneTypingInterval);
    }

});
//email check
var typingTimer;
var doneTypingInterval = 1000;
$('#pub_email_id').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#pub_email_id').val) {
        typingTimer = setTimeout(function(){
             var v = $("#pub_email_id").val();
             if(v.length == 0){
               $("#checkemail").html("Email Required!!");
               toastr.error('Email Required!');
             }else{
               var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

               if (reg.test(v) == false)
               {
                 var email = document.getElementById("emailval");
                    email.value = 2;
                 $("#checkemail").html("Invalid Email!!");
                 toastr.error('Invalid Email!');
               }else{
                    $("#checkemail").html("");
                       $.ajaxSetup({
                          headers:{
                             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                          }
                       });
                    $.ajax({
                       type: "post",
                       dataType: "json",
                       url: '/check/email',
                       data: {'email':v},
                       success: function(response) {
                          if(response.success){
                             var email = document.getElementById("emailval");
                             email.value = 1;
                             $("#checkemail").html("");
                          }else{
                             var email = document.getElementById("emailval");
                             email.value = 0;
                             $("#checkemail").html("Email already taken");
                             toastr.error('Email already taken!');
                          }
  
                       }
                    });
             }
           
             }
        }, doneTypingInterval);
    }

});

//Password Check
   function checkPasswordMatch() {
      var password = $("#password").val();
      var confirmPassword = $("#password_confirmation").val();
    if(password.length == 0){
      $("#divCheckPasswordMatch").html("Password is required!");
      toastr.error('Passwords required!');
    }else{
      if (password != confirmPassword){
         $("#divCheckPasswordMatch").html("Passwords does not match!");
         toastr.error('Passwords does not match!');
         }
         else {
         $("#divCheckPasswordMatch").html("");
         }
    }
    
  }

     $('#password_confirmation').keyup( function() {
      if( this.value.length < 8 ) return;
      checkPasswordMatch();
   });

   var i = 1;

    function showLoading() {
        // Show loading bar
        document.getElementById('loadingBar').style.display = 'block';
        // Add 'loading' class to the form to make it semi-transparent
        document.getElementById('form_publisher').classList.add('loading');
    }

    function hideLoadingBar() {
      document.getElementById('loadingBar').style.display = 'none';
      document.getElementById('form_publisher').classList.remove('loading');
  }

/*************
   // Awarded Titles in The Publication
   *************/
   $('#member_in_publishers_new_old_asr').css('display', 'none');
   var sramy = 3;
   
   $('input[type=radio][name=member_in_publishers_yes_old_asr]').on('change', function () {
      switch ($(this).val()) {
         case 'yes':
            $('#member_in_publishers_yes_old_asr').prop('required', true);
   
           
   
            $('#member_in_publishers_new_old_asr').css('display', 'block');
            $('#pub_state_awarded').prop('required', true);
            $('#pub_central').prop('required', true);
            $('#translated_pub_asr').click(function () {
               sramy++;
               $('#trans_book_pub_asr').
                  append('<tr id="row' + sramy +
                  '"><td><input type="text" name="trs_state_awarded[]" placeholder="Enter the award name*" class="form-control name_list" required/></td><td><input type="text" name="trs_central_awarded[]" placeholder="Enter the title *" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                  sramy + '" class="btn btn-danger btn_remove_best_five_my">X</button></td></tr>');
   
            });
            break;
         case 'No':
            // alert($(this).val());
            sramy=0;
            $('div#member_in_publishers_new_old_asr').css('display','none')
            $('#pub_state_awarded').prop('required', false);
            $('#pub_central').prop('required', false);
   
            $('#member_in_publishers_yes_old_asr').prop('required', false);
   
   
            $('.removecl').remove();
            // alert('off')
            break;
      }
   });
   $(document).on('click', '.btn_remove_best_five_my', function () {
       var button_id = $(this).attr("id");
       $('#row' + button_id + '').remove();
       if (pubtrsfivecounter <= 4) {
          $('#translated_pub_asr').prop('disabled', false);
       }
       pubtrsfivecounter--;
    });
   
   /*************
   // End Awarded Titles in The Publication
   *************/

//Publisher final form submit
   $('#submitBtnPublisher').on('click', function () {
      $("#form_publisher").submit(function (e) {
         showLoading();
         //username
        var uname =  $("#user_name").val();
        if(uname.length == 0){
         hideLoadingBar();
         toastr.error("Username required!!!");
         e.preventDefault();
        }else{
         var username1 = $("#usernameval").val();
        if(username1 && username1 == 0){
           hideLoadingBar();
           toastr.error("Username already taken!!!");
           e.preventDefault();
        }
      }
      
   //password
      var password = $("#password").val();
      var confirmPassword = $("#password_confirmation").val();
      if(password.length == 0){
         hideLoadingBar();
         toastr.error("Password is required!!");
        e.preventDefault();
      }else if(confirmPassword.length == 0){
         hideLoadingBar();
         toastr.error("Confirm Password is required!!");
        e.preventDefault();
      }else{
         if(password != confirmPassword){
            hideLoadingBar();
             toastr.error("Password and confirm password doesn't match!!");
            e.preventDefault();
         }
      }
    

   //email
   var uemail =  $("#pub_email_id").val();
   if (uemail.length === 0){
      hideLoadingBar();
      toastr.error('Email Required!!');
      e.preventDefault();
   }else{
      var email = $("#emailval").val();
      if(email == 0){
         hideLoadingBar();
         toastr.error('Email already taken!!');
         e.preventDefault();
      }
      else if(email == 2){
         hideLoadingBar();
         toastr.error('Invalid Email!!');
         e.preventDefault();
      }
   }
//category check 
  var ctg_book = $("[name='category_of_books_published[]']:checked").length; // count the checked rows
         var s_ctg_book = $("[name='specialized_category_books[]']:checked").length; // count the checked rows
         var p_lan_book = $("[name='primary_language_of_publication[]']:checked").length; // count the checked rows
         // var bapasi_id_name = $("[name='member_in_publisher_Association_depart_pub_book_pub[]']:checked").length; // count the checked rows
         if (ctg_book != 0) {
            if (s_ctg_book != 0) {
               if (p_lan_book != 0) {

               } else {
                 
                  // alert("Please select any primary Category of Books Published");
                  hideLoadingBar();
                     toastr.error('Please select primary language of publication');
                  e.preventDefault();
               }
            } else {
               
               hideLoadingBar();
              toastr.error('Please select any Special Category of Books Published');
               // alert("Please select any Special Category of Books Published");
               e.preventDefault();
            }
         } else {
           
            // alert("Please select any Category of Books Published");
            hideLoadingBar();
              toastr.error('Please select any Category of Books Published');
            e.preventDefault();

         }



//LatestCatalogue-latest_book_categories
function isValidExcelFile(fileName) {
   return /\.(xls|xlsx)$/i.test(fileName);
}
var fileInput = document.getElementById('latest_book_categories1');
var fileName = fileInput.value;

if (!isValidExcelFile(fileName)) {
   toastr.error('Latest book catalogue must be a excel file . Download sample file update and upload your file');
    fileInput.value = '';
    hideLoadingBar();
     e.preventDefault();
}

//Pubownership proof
var ownership = $("#pub_ownership").val();

if (ownership == 'Partnership') {
    var gst = $("[name='gst']").prop('files')[0];
    var udayam = $("[name='udayam']").prop('files')[0];
    var pan_deed = $("[name='pan_deed']").prop('files')[0];
    var pan_tan = $("[name='pan_tan']").prop('files')[0];
         if (udayam.type !== 'application/pdf') {
            toastr.error('Udyam Certificate must be a PDF file.');
            hideLoadingBar();
            e.preventDefault();

            }
         if (pan_deed.type !== 'application/pdf') {
         toastr.error('Partnership Deed must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();
            }
         if (gst.type !== 'application/pdf') {
            toastr.error('GST Certificate must be a PDF file.');
            hideLoadingBar();
            e.preventDefault();

         }
         if (pan_tan.type !== 'application/pdf') {
            toastr.error('PAN / TAN must be a PDF file.');
            hideLoadingBar();
            e.preventDefault();

         }
}
else if (ownership == 'Private') {
   var certification_incon = $("[name='certification_incon']").prop('files')[0];
   var moa = $("[name='moa']").prop('files')[0];
   var aoa = $("[name='aoa']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];

        if (certification_incon.type !== 'application/pdf') {
           toastr.error('Certificate of incorporation must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (moa.type !== 'application/pdf') {
         toastr.error('MOA must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();

         }
      if (aoa.type !== 'application/pdf') {
      toastr.error('AOA must be a PDF file.');
      hideLoadingBar();
      e.preventDefault();
         }
        if (gst.type !== 'application/pdf') {
         toastr.error('GST Certificate must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();

      }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
        }
}
else if (ownership == 'Publication') {
   var certification_incon = $("[name='certification_incon']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
        if (certification_incon.type !== 'application/pdf') {
           toastr.error('Certificate of incorporation must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (gst.type !== 'application/pdf') {
         toastr.error('GST Certificate must be a PDF file.');
         hideLoadingBar();
         e.preventDefault();

      }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();
        }
}
else if (ownership == 'oneperson') {

   var udayam = $("[name='udayam']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
        if (udayam.type !== 'application/pdf') {
           toastr.error('Udyam Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

           }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN / TAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }


}
else if (ownership == 'limited') {
   var llp = $("[name='llp_agre']").prop('files')[0];
   var udayam = $("[name='udayam']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];

           if (llp.type !== 'application/pdf') {
              toastr.error('LLP Agreement must be a PDF file.');
              hideLoadingBar();
              e.preventDefault();
      }
        if (udayam.type !== 'application/pdf') {
           toastr.error('Udyam Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

           }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN / TAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }

}
else if (ownership == 'trust') {
   var society = $("[name='private_trust']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Private Trust Registration Certificate must be a PDF file.');
              hideLoadingBar();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }


}
else if (ownership == 'society') {
   var society = $("[name='private_society']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];

           if (society.type !== 'application/pdf') {
              toastr.error('Private Society Registration Certificate must be a PDF file.');
              hideLoadingBar();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }


}
else if (ownership == 'institutional') {
   var society = $("[name='institution']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Government Institutional Publication Registration Certificate must be a PDF file.');
              hideLoadingBar();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }


}
else if (ownership == 'trust-foundation') {
   var society = $("[name='trust_foundation']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Government Trust/Foundation Publication Registration Certificate must be a PDF file.');
              hideLoadingBar();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
}
else if (ownership == 'government-society') {
   var society = $("[name='society']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];

           if (society.type !== 'application/pdf') {
              toastr.error('Government Society Publication Registration Certificate must be a PDF file.');
              hideLoadingBar();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar();
           e.preventDefault();

        }

}
//Sub-Doc
var doc = document.getElementById('subsidiary_publications');
var doc_name = doc.value;
var docstatus = "true";
var arr = [];
if (doc_name === "yes") {
    var documents = $("[name='subsidiary_doc[]']");
    documents.each(function (index, element) {
        var file = element.files[0];
        if (file.type !== 'application/pdf') {
            arr.push(file);
        }
    });
}
if (arr.length !== 0) {
    toastr.error('Subsidiary Document must be a PDF file.');
    hideLoadingBar();
    e.preventDefault();
    return false;
}
       


         // if (bapasi_id_name != 0) {
         // } else {
         //    alert("Please select member in publisher's association");
         //    e.preventDefault();
         // }

      });
   });


   /* ************************************
   // Best 10 Titles In Your Publications
   ***************************************/
   var pubaddtencounter = 0;
   $('#add').click(function () {
      if (pubaddtencounter < 9) {
         i++;
         pubaddtencounter++;
         $('#dynamic_field').
            append('<tr id="row' + i +
               '"><td><input type="text" name="publications_shope_book_title[]" placeholder=" Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="publications_shope_book_author[]" placeholder=" Enter the author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_best_ten">X</button></td></tr>');
      } else {
         $('#add').prop('disabled', true);
         return toastr.error('Allowed 10  inputs only');

         // alert('Allowed 10 input only ');
      }
   });

   $(document).on('click', '.btn_remove_best_ten', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (pubaddtencounter <= 9) {
         $('#add').prop('disabled', false);
      }
      pubaddtencounter--;
   });

   /* ************************************
   // End Best 10 Titles In Your Publications
   ***************************************/

/*************
// Best 5 Translated Books
*************/

// Initially hide the element
$('#member_in_publishers_new_old').css('display', 'none');

var sra = 1;

// Event listener for radio button changes
$('input[type=radio][name=member_in_publishers_yes_old]').on('change', function () {
    switch ($(this).val()) {
        case 'yes':
            // Show the element and set required properties
            $('#member_in_publishers_yes_old').prop('required', true);
            $('#trans_title1').prop('required', true);
            $('#trans_author1').prop('required', true);
            $('#trans_from1').prop('required', true);
            $('#trans_to1').prop('required', true);
            $('#member_in_publishers_new_old').css('display', 'block');
            break;
        case 'No':
            // Hide the element and clear some form fields
            sra = 0;
            $('#member_in_publishers_new_old').css('display', 'none');
            $('#member_in_publishers_yes_old').prop('required', false);
            $('.removecl').remove();
            break;
    }
});

   var trs_pub_sit1 = 0;
   $('#translated_pub').click(function () {

      if (trs_pub_sit1 < 4) {
         i++;
         trs_pub_sit1++;
         // console.log("inside",trs_pub_sit1);
         $('#trans_book_pub').
            append('<tr id="row' + i +
               '"><td><input type="text" name="trans_title[]" placeholder="Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="trans_author[]" placeholder="Enter the author*" class="form-control name_list" required/></td><td><input type="text" name="trans_from[]" placeholder="Enter the language from*" class="form-control name_list" required/></td><td><input type="text" name="trans_to[]" placeholder="Enter the language to*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_pub_dst_five">X</button></td></tr>');
      } else {
        
         $('#translated_pub').prop('disabled', true);
         return toastr.error('Allowed 5 inputs only');
         dd('');

      }
   });

   $(document).on('click', '.btn_remove_pub_dst_five', function () {
  
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (trs_pub_sit1 <= 6) {
         $('#translated_pub').prop('disabled', false);
      }
   
      trs_pub_sit1--;
   });

/*************
// End Best 5 Translated Books
*************/

   


   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      addcounter--;
      alert(addcounter);
   });

   $('.specialized_category_other').css('display', 'none');
   $('.other_indian_lang').css('display', 'none');
   $('.other_foreign_lang').css('display', 'none');
   $('.subsidiaryEnable').css('display', 'none');

   $("#specialized_category_check").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.specialized_category_other').css('display', 'block');
         $('#specialized_category_books_no').prop('required', true);
      } else if (checkValue == false) {
         $('.specialized_category_other').css('display', 'none');
         $('#specialized_category_books_no').prop('required', false);
      }
   });

   $("#other_indian_lag").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_indian_lang').css('display', 'block');
         $('#other_indian_lang').prop('required', true);
      } else if (checkValue == false) {
         $('.other_indian_lang').css('display', 'none');
         $('#other_indian_lang').prop('required', false);
      }
   });

   $("#other_forign_lag").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_foreign_lang').css('display', 'block');
         $('#other_foreign_lang').prop('required', true);
      } else if (checkValue == false) {
         $('.other_foreign_lang').css('display', 'none');
         $('#other_foreign_lang').prop('required', false);
      }
   });

   $('#subsidiary_publishcation_no').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   var w = 0;
   $('#name_of_the_subsidiary_publication').attr('required', false);
   $('input[type=radio][name=subsidiary_publications]').on('change', function () {
      // alert('Good');
      switch ($(this).val()) {
         case 'yes':

            $('#subsidiary_publications').prop('required', true);

            $('#name_of_the_subsidiary_publication').prop('required', true);
            $('#content_of_the_subsidiary_publication').prop('required', true);
            $('#content_of_the_subsidiary_publication_stack').prop('required', true);
            $('#content_of_the_subsidiary_publication_file').prop('required', true);

            $('.subsidiary_pub_name').css('display', 'block');
            $('#sub_pub_add').click(function () {
               w++;
               $('#subsidiary_publishcation_no_tbl').
                  append('<tr id="row' + w +
                     '" class="removecl"><td><input type="text" name="name_of_the_subsidiary_publication[]" placeholder="Enter name of the subsidiary publication *" class="form-control name_list" required/></td><td><input type="text" name="name_of_the_subsidiary_publisher[]" placeholder="Enter name of the subsidiary publisher*" class="form-control name_list" required/></td><td><input type="number" id="content_of_the_subsidiary_publication" name="stack_holder_percentage[]" placeholder="Enter Stock Holder Percentage" class="form-control name_list" required/></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_doc[]" placeholder="Enter Document"type="file" accept="application/pdf,application/vnd.ms-excel" multiple required> <span class="text-danger"><small> Please Ensure All File Are PDF Format Only</small></span> </td><td><button type="button" name="remove" id="' +
                     w + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            $('#subsidiary_publications').prop('required', false);
            $('#name_of_the_subsidiary_publication').prop('required', false);
            $('#content_of_the_subsidiary_publication').prop('required', false);
           $('#content_of_the_subsidiary_publication_stack').prop('required', false);

            $('#content_of_the_subsidiary_publication_file').prop('required', false);
            $('.subsidiary_pub_name').css('display', 'none');

            $('.removecl').remove();
            // alert('off');
            break;
      }
   });

   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });

   // $('#subsidiary_publishcation_no').css('display', 'none');
   // // $('#subsidiary_publications').css('display', 'none');

   // var w = 1;
   // $('#name_of_the_subsidiary_publication').attr('required', false);
   // $('input[type=radio][name=subsidiary_publications]').on('change', function () {
   //    // alert('Good');
   //    switch ($(this).val()) {
   //       case 'yes':

   //          $('#subsidiary_publications').prop('required', true);

   //          $('#name_of_the_subsidiary_publication').prop('required', true);
   //          $('#content_of_the_subsidiary_publication').prop('required', true);

   //          $('.subsidiary_pub_name').css('display', 'block');
   //          $('#sub_pub_add').click(function () {
   //             w++;
   //             $('#subsidiary_publishcation_no_tbl').
   //                append('<tr id="row' + w +
   //                   '" class="removecl"><td><input type="text" id="name_of_the_subsidiary_publication" name="subsidiary_no_publications_content[]" placeholder="Enter name of the subsidiary publication " class="form-control name_list" /></td> <td><input type="text" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter name of the subsidiary publisher" class="form-control name_list" /></td> <td><input type="text" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter Stack Holder Percentage" class="form-control name_list" /></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter Document"type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td> <td><button type="button" name="remove" id="' +
   //                   c + '" class="btn btn-danger btn_remove_subsidiary">X</button></td></tr>');

   //                   // '<tr> <td><input type="text" id="name_of_the_subsidiary_publication" name="subsidiary_no_publications_content[]" placeholder="Enter name of the subsidiary publication " class="form-control name_list" /></td> <td><input type="text" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter name of the subsidiary publisher" class="form-control name_list" /></td> <td><input type="text" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter Stack Holder Percentage" class="form-control name_list" /></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter Document"type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td> <td><button type="button" name="sub_pub_add" id="sub_pub_add" class="btn btn-success">+</button> </td> </tr>';

   //          });
   //          break;
   //       case 'No':
   //          $('#subsidiary_publications').prop('required', false);
   //          $('#name_of_the_subsidiary_publication').prop('required', false);
   //          $('#content_of_the_subsidiary_publication').prop('required', false);
   //          $('.subsidiary_pub_name').css('display', 'none');

   //          $('.removecl').remove();
   //          // alert('off');
   //          break;
   //    }
   // });

   // $(document).on('click', '.btn_remove_subsidiary', function () {
   //    var button_id = $(this).attr("id");
   //    $('#row' + button_id + '').remove();
   // });

// =============================================================================
// =============================================================================

   // bapasi
   // $('.bapasi_en').css('display', 'none');
   // $('.tamil_pathipu_thurai_en').css('display', 'none');

   // $("#bapasi_member").click(function () {
   //    var checkValue = $(this).is(":checked");
   //    // alert(checkValue);
   //    if (checkValue == true) {
   //       $('.bapasi_en').css('display', 'block');
   //       $('#bapasi').prop('required', true);
   //    } else if (checkValue == false) {
   //       $('.bapasi_en').css('display', 'none');
   //       $('#bapasi').prop('required', false);
   //    }
   // });

   $("#tamil_pathipu_thurai_new").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.tamil_pathipu_thurai_en').css('display', 'block');
         $('#tamil_pathipu_thurai').prop('required', true);
      } else if (checkValue == false) {
         $('.tamil_pathipu_thurai_en').css('display', 'none');
         $('#tamil_pathipu_thurai').prop('required', false);
      }
   });

   // bapasi other add

   $('.other_name_id_en').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   $("#others_new_pub").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_name_id_en').css('display', 'block');
         $('#member_id_new').prop('required', true);
      } else if (checkValue == false) {
         $('.other_name_id_en').css('display', 'none');
         $('#member_id_new').prop('required', false);
      }
   });
   var c = 1;
   var pubtrsfivecounter = 0;
   $('#member_name_new_id').click(function () {
      if (pubtrsfivecounter < 100) {
         c++;
         pubtrsfivecounter++;
         $('#tbl_pub_member_no').
            append('<tr id="row' + c +
               '"><td><input type="text" name="member_name_new_up[]" placeholder="Enter member name*" class="form-control name_list" required/></td><td><input type="text" name="member_id_new_up[]" placeholder="Enter member id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               c + '" class="btn btn-danger btn_remove_best_five">X</button></td></tr>');
      } else {
         $('#member_name_new_id').prop('disabled', true);
         return toastr.error('Allowed 5 inputs only');

      }
   });

   $(document).on('click', '.btn_remove_best_five', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (pubtrsfivecounter <= 4) {
         $('#member_name_new_id').prop('disabled', false);
      }
      pubtrsfivecounter--;
   });

   // $("#others_new").click(function () {
   //    var checkValue = $(this).is(":checked");
   //    // alert(checkValue);
   //    if (checkValue == true) {
   //       $('.other_name_id_en').css('display', 'block');
   //       $('#association_name').prop('required', true);
   //       $('#association_id_value').prop('required', true);
   //    } else if (checkValue == false) {
   //       $('.other_name_id_en').css('display', 'none');
   //       $('#association_name').prop('required', false);
   //       $('#association_id_value').prop('required', false);
   //    }
   // });

   // Specialized Category Books
//    $('input[name="specialized_category_books[]"]').on('change', function () {
//       $('input[name="' + this.name + '"]').not(this).prop('checked', false);
//    });

   $('#ownership_doc').css('display','none');

   $('#pub_ownership').on('change',function(){
      var value = $(this).val();
    //   alert(value);
      if(value == 'Proprietorship'){
         //  $('#ownership_doc').css('display','block');
          $('.user_file_input').append('<div id="proprietorship_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file" name="udayam" accept="application/pdf,application/vnd.ms-excel" placeholder="Enter Udayam" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" placeholder="Enter GST" class="form-control name_list"/></div>');

          $("#partnership_input").remove();
          $("#private_input").remove();
          $("#publication_input").remove();
          $("#oneperson_input").remove();
          $('#limited_input').remove();
          $('#society_input').remove();
          $('#trust_input').remove();
          $('#institutional_input').remove();
          $('#trust-foundation_input').remove();
          $('#government-society_input').remove();

      }
      else if(value == 'Partnership'){
         // $('#ownership_doc').css('display','block');
         $('.user_file_input').append('<div id="partnership_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file" name="udayam" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list"/><label for="formFileSm" class="form-label">Partnership Deed <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input accept="application/pdf,application/vnd.ms-excel" type="file" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input accept="application/pdf,application/vnd.ms-excel" type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#private_input").remove();
         $("#publication_input").remove();
         $("#oneperson_input").remove();
         $('#limited_input').remove();
         $('#society_input').remove();
         $('#trust_input').remove();
         $('#institutional_input').remove();
         $('#trust-foundation_input').remove();
         $('#government-society_input').remove();

     }
     else if(value == 'Private'){
      $('.user_file_input').append('<div id="private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA <span class="mt-056"></span><span class="text-danger "></span></label><input type="file" name="moa" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list"/><label for="formFileSm" class="form-label">AOA  <span class="mt-056"></span><span class="text-danger"></span></label><input type="file" name="aoa"accept="application/pdf,application/vnd.ms-excel" class="form-control name_list" /><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

      $("#proprietorship_input").remove();
      $("#partnership_input").remove();
      $("#publication_input").remove();
      $("#oneperson_input").remove();
      $('#limited_input').remove();
      $('#society_input').remove();
      $('#trust_input').remove();
      $('#institutional_input').remove();
      $('#trust-foundation_input').remove();
      $('#government-society_input').remove();

     }
      else if(value == 'Publication'){
         //  $('#ownership_doc').css('display','block');
         $('.user_file_input').append('<div id="publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="certification_incon" placeholder="Enter the Award Author*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" placeholder="Enter the Award Author*" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" placeholder="Enter the Award Author*" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $("#oneperson_input").remove();
         $('#limited_input').remove();
         $('#society_input').remove();
         $('#trust_input').remove();
         $('#institutional_input').remove();
         $('#trust-foundation_input').remove();
         $('#government-society_input').remove();

      }else if(value == 'oneperson'){
         //  $('#ownership_doc').css('display','block');
         $('.user_file_input').append('<div id="oneperson_input"><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span></label><input type="file" name="udayam" accept="application/pdf,application/vnd.ms-excel" class="form-control name_list" /><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        //  $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $('#limited_input').remove();
         $('#partnership_input').remove();
         $('#proprietorship_input').remove();
         $('#publication_input').remove();
         $('#society_input').remove();
         $('#trust_input').remove();
         $('#institutional_input').remove();
         $('#trust-foundation_input').remove();
         $('#government-society_input').remove();


      }else if(value == 'limited'){

         $('.user_file_input').append('<div id="limited_input"><label for="formFileSm" class="form-label">LLP Agreement  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $('#partnership_input').remove();
         $('#society_input').remove();
         $('#publication_input').remove();
         $('#oneperson_input').remove();
         $('#trust_input').remove();
         $('#institutional_input').remove();
         $('#trust-foundation_input').remove();
         $('#government-society_input').remove();



      }else if(value == 'trust'){

         $('.user_file_input').append('<div id="trust_input"><label for="formFileSm" class="form-label">Private Trust Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_trust" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $('#partnership_input').remove();
         $('#limited_input').remove();
         $('#oneperson_input').remove();
         $('#publication_input').remove();
         $('#society_input').remove();
         $('#institutional_input').remove();
         $('#trust-foundation_input').remove();
         $('#government-society_input').remove();

      }else if(value == 'society'){

        $('.user_file_input').append('<div id="society_input"><label for="formFileSm" class="form-label">Private Society Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#proprietorship_input").remove();
        $("#user_file_input").remove();
        $("#private_input").remove();
        $('#partnership_input').remove();
        $('#limited_input').remove();
        $('#oneperson_input').remove();
        $('#publication_input').remove();
        $('#trust_input').remove();
        $('#institutional_input').remove();
        $('#trust-foundation_input').remove();
        $('#government-society_input').remove();

     }else if(value == 'institutional'){

        $('.user_file_input').append('<div id="institutional_input"><label for="formFileSm" class="form-label">Government Institutional Publication Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="institution" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#proprietorship_input").remove();
        $("#user_file_input").remove();
        $("#private_input").remove();
        $('#partnership_input').remove();
        $('#limited_input').remove();
        $('#oneperson_input').remove();
        $('#publication_input').remove();
        $('#trust_input').remove();
        $('#society_input').remove();
        $('#trust-foundation_input').remove();
        $('#government-society_input').remove();

     }else if(value == 'trust-foundation'){

        $('.user_file_input').append('<div id="trust-foundation_input"><label for="formFileSm" class="form-label">Government Trust/Foundation Publication Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="trust_foundation" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#proprietorship_input").remove();
        $("#user_file_input").remove();
        $("#private_input").remove();
        $('#partnership_input').remove();
        $('#limited_input').remove();
        $('#oneperson_input').remove();
        $('#publication_input').remove();
        $('#trust_input').remove();
        $('#society_input').remove();
        $('#institutional_input').remove();
        $('#government-society_input').remove();

     }else if(value == 'government-society'){

        $('.user_file_input').append('<div id="government-society_input"><label for="formFileSm" class="form-label">Government Society Publication Registration Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#proprietorship_input").remove();
        $("#user_file_input").remove();
        $("#private_input").remove();
        $('#partnership_input').remove();
        $('#limited_input').remove();
        $('#oneperson_input').remove();
        $('#publication_input').remove();
        $('#trust_input').remove();
        $('#society_input').remove();
        $('#institutional_input').remove();
        $('#trust-foundation_input').remove();

     }else{
         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $("#publication_input").remove();
         $("#oneperson_input").remove();
         $('#limited_input').remove();
         $('#society_input').remove();
         $('#trust_input').remove();
         $('#institutional_input').remove();
         $('#trust-foundation_input').remove();
         $('#government-society_input').remove();
      }
  });



   //***************************************************** */
   //###################End Book Publisher#######################
   //***************************************************** */
   //---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
   //**********************************************************/
   //################### Book Distributor #######################
   //**********************************************************/

   //Distributor-username check
   $('#distn_state').on('change', function() {
      // alert('asfasd');
      var stateId = $(this).val();
      $.ajaxSetup({
         headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         type: "post",
         dataType: "json",
         url: '/getdistrict',
         data: {'state_id':stateId},
          success: function(response) {
              var districts = response.districts;
              $('#distn_district').empty();
   $('#distn_district').append('<option value="">Select District</option>');

              $.each(districts, function(key, value) {
                  $('#distn_district').append('<option value="' + value.name + '">' + value.name + '</option>');
              });
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
   });
   
   $('#cont_per_state').on('change', function() {
      // alert('asfasd');
      var stateId = $(this).val();
      $.ajaxSetup({
         headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         type: "post",
         dataType: "json",
         url: '/getdistrict',
         data: {'state_id':stateId},
          success: function(response) {
              var districts = response.districts;
              $('#cont_per_district').empty();
  $('#cont_per_district').append('<option value="">Select District</option>');
              $.each(districts, function(key, value) {
                  $('#cont_per_district').append('<option value="' + value.name + '">' + value.name + '</option>');
              });
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
   });
var typingTimer;
var doneTypingInterval = 1000;
$('#dis_user_name').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#dis_user_name').val) {
        typingTimer = setTimeout(function(){
             var v = $("#dis_user_name").val();
             if(v.length == 0){
               $("#discheckusername").html("Username required");
               toastr.error('Username required!!');
             }else{
   //ajax
   $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
 $.ajax({
     type: "post",
     dataType: "json",
     url: '/check/dis_username',
     data: {'userName':v},
     success: function(response) {
        if(response.success){
         var username = document.getElementById("disusernameval");
         username.value = 1;
         $("#discheckusername").html("");
        }else{
         var username = document.getElementById("disusernameval");
         username.value = 0;
         $("#discheckusername").html("Username already taken");
         toastr.error('Username already taken!!');
        }

     }
 });
             }
         


        }, doneTypingInterval);
    }

});



//email check
var typingTimer;
var doneTypingInterval = 1000;
$('#distn_email_id').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#distn_email_id').val) {
        typingTimer = setTimeout(function(){
             var v = $("#distn_email_id").val();
             if(v.length == 0){
               $("#discheckemail").html("Email required");
               toastr.error('Email required!!');
             }else{
               var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

               if (reg.test(v) == false)
               {
                 var email = document.getElementById("disemailval");
                    email.value = 2;
                 $("#discheckemail").html("Invalid Email!!");
                 toastr.error('Invalid Email!!');
               }else{
                    $("#discheckemail").html("");
                       $.ajaxSetup({
                          headers:{
                             'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                          }
                       });
                    $.ajax({
                       type: "post",
                       dataType: "json",
                       url: '/check/dis_email',
                       data: {'email':v},
                       success: function(response) {
                          if(response.success){
                             var email = document.getElementById("disemailval");
                             email.value = 1;
                             $("#discheckemail").html("");
                          }else{
                             var email = document.getElementById("disemailval");
                             email.value = 0;
                             $("#discheckemail").html("Email already taken");
                             toastr.error('Email already taken!!');
                          }
  
                       }
                    });
             }
             
             }
        }, doneTypingInterval);
    }

});

//Password Check
   function discheckPasswordMatch() {
      var password = $("#dis_password").val();
      var confirmPassword = $("#dis_conform_password").val();
if(password.length == 0){
   $("#disdivCheckPasswordMatch").html("Password required!");
   toastr.error('Password required!');
}else{
   if (password != confirmPassword){
      $("#disdivCheckPasswordMatch").html("Passwords does not match!");
       toastr.error('Passwords does not match!');

      }
      else {
      $("#disdivCheckPasswordMatch").html("");
      }
}
   
  }

     $('#dis_conform_password').keyup( function() {
      if( this.value.length < 8 ) return;
      discheckPasswordMatch();
   });

   function showLoading1() {
      // Show loading bar
      document.getElementById('loadingBar1').style.display = 'block';
      // Add 'loading' class to the form to make it semi-transparent
      document.getElementById('form_distriputor').classList.add('loading1');
  }

  function hideLoadingBar1() {
    document.getElementById('loadingBar1').style.display = 'none';
    document.getElementById('form_distriputor').classList.remove('loading1');
}
   $('#submitbtn_book_distributor').on('click', function () {

      $("#form_distriputor").submit(function (e) {
         showLoading1();
           //password
      var password = $("#dis_password").val();
      var confirmPassword = $("#dis_conform_password").val();
      if(password.length == 0){
         hideLoadingBar1();
         toastr.error("Password required!!");
         e.preventDefault();
      }else if(confirmPassword.length == 0){
         hideLoadingBar1();
         toastr.error("Confirm password required!!");
         e.preventDefault();
      }else{
         if(password != confirmPassword){
            hideLoadingBar1();
            toastr.error("Password and confirm password doesn't match!!");
            e.preventDefault();
         }
      }
     
   //username
   var uname1 = $("#dis_user_name").val();
   if(uname1.length == 0){
      hideLoadingBar1();
      toastr.error("Username required!!!");
     e.preventDefault();
   }else{
      var username1 = $("#disusernameval").val();
      if(username1 && username1 == 0){
           hideLoadingBar1();
            toastr.error("Username already taken!!!");
           e.preventDefault();
        }
   }
     
   //email
   var uemail1 = $("#distn_email_id").val();
   if(uemail1.length == 0){
      hideLoadingBar1();
      toastr.error('Email required!!');
     e.preventDefault();
   }else{
      var email = $("#disemailval").val();
      if(email == 0){
         hideLoadingBar1();
          toastr.error('Email already taken!!');
         e.preventDefault();
      }
      else if(email == 2){
         hideLoadingBar1();
          toastr.error('Invalid Email!!');
         e.preventDefault();
      }
   }
     
//Language
 var ctg_book = $("[name='language_of_books_you_dealing_with[]']:checked").length; // count the checked rows
         if (ctg_book != 0) {

         } else {
            // alert("Language Of Books You Dealing With");
             hideLoadingBar1();
             toastr.error('Select primary language of publication');

            e.preventDefault();
         }
      //LatestCatalogue-latest_book_categories
         function isValidExcelFile1(fileName) {
            return /\.(xls|xlsx)$/i.test(fileName);
         }
         var fileInput = document.getElementById('latest_book_categories2');
         var fileName = fileInput.value;
         if (!isValidExcelFile1(fileName)) {
            toastr.error('Latest book catalogue must be a excel file . Download sample file update and upload your file');
            fileInput.value = '';
            hideLoadingBar1();
             e.preventDefault();
         }

         //Authorization Letter
         var documents1 = $("[name='authorization_letter[]']");
         var errorOccurred = false; // Flag to track if an error occurred

         documents1.each(function (index, element) {
             var file = element.files[0];
             if (file && file.type !== 'application/pdf') {
                 toastr.error('Authorization letter must be a PDF file.');
                 errorOccurred = true; // Set the flag to true if an error occurs
                 return false; // Exit the loop early
             }
         });

         if (errorOccurred) {
             hideLoadingBar1();
             e.preventDefault(); // Prevent form submission if an error occurred
         }




//Pubownership proof
var ownership = $("#dis_ownership").val();

if (ownership == 'Partnership') {
    var gst = $("[name='gst']").prop('files')[0];
    var udayam = $("[name='udayam']").prop('files')[0];
    var pan_deed = $("[name='pan_deed']").prop('files')[0];
    var pan_tan = $("[name='pan_tan']").prop('files')[0];
         if (udayam.type !== 'application/pdf') {
            hideLoadingBar1();
             toastr.error('Udyam Certificate must be a PDF file.');
            e.preventDefault();

            }
         if (pan_deed.type !== 'application/pdf') {
            hideLoadingBar1();
          toastr.error('Partnership Deed must be a PDF file.');
         e.preventDefault();
            }
         if (gst.type !== 'application/pdf') {
            hideLoadingBar1();
             toastr.error('GST Certificate must be a PDF file.');
            e.preventDefault();

         }
         if (pan_tan.type !== 'application/pdf') {
            hideLoadingBar1();
             toastr.error('PAN / TAN must be a PDF file.');
            e.preventDefault();

         }
}
else if (ownership == 'Private') {
   var certification_incon = $("[name='certification_incon']").prop('files')[0];
   var moa = $("[name='moa']").prop('files')[0];
   var aoa = $("[name='aoa']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];

        if (certification_incon.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('Certificate of incorporation must be a PDF file.');
           e.preventDefault();

        }
        if (moa.type !== 'application/pdf') {
         hideLoadingBar1();
          toastr.error('MOA must be a PDF file.');
         e.preventDefault();

         }
      if (aoa.type !== 'application/pdf') {
         hideLoadingBar1();
       toastr.error('AOA must be a PDF file.')
      e.preventDefault();
         }
        if (gst.type !== 'application/pdf') {
         hideLoadingBar1();
          toastr.error('GST Certificate must be a PDF file.');
         e.preventDefault();

      }
        if (pan_tan.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('PAN must be a PDF file.');
           e.preventDefault();
        }
}
else if (ownership == 'Publication') {
   var certification_incon = $("[name='certification_incon']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];

        if (certification_incon.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('Certificate of incorporation must be a PDF file.');
           e.preventDefault();

        }
        if (gst.type !== 'application/pdf') {
         hideLoadingBar1();
          toastr.error('GST Certificate must be a PDF file.');
         e.preventDefault();

      }
        if (pan_tan.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('PAN must be a PDF file.');
           e.preventDefault();
        }
}
else if (ownership == 'oneperson') {

   var udayam = $("[name='udayam']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
        if (udayam.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('Udyam Certificate must be a PDF file.');
           e.preventDefault();

           }
        if (gst.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('GST Certificate must be a PDF file.');
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('PAN / TAN must be a PDF file.');
           e.preventDefault();

        }
}
else if (ownership == 'limited') {
   var llp = $("[name='llp_agre']").prop('files')[0];
   var udayam = $("[name='udayam']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (llp.type !== 'application/pdf') {
            hideLoadingBar1();
               toastr.error('LLP Agreement must be a PDF file.');
              e.preventDefault();
      }
        if (udayam.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('Udyam Certificate must be a PDF file.');
           e.preventDefault();

           }
        if (gst.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('GST Certificate must be a PDF file.');
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
         hideLoadingBar1();
            toastr.error('PAN / TAN must be a PDF file.');
           e.preventDefault();

        }
}
else if (ownership == 'trust') {
   var society = $("[name='private_trust']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Private Trust Registration Certificate must be a PDF file.');
              hideLoadingBar1();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
           hideLoadingBar1();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
           hideLoadingBar1();
           e.preventDefault();

        }
}
else if (ownership == 'society') {
   var society = $("[name='private_society']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Private Society Registration Certificate must be a PDF file.');
             hideLoadingBar1();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
          hideLoadingBar1();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
          hideLoadingBar1();
           e.preventDefault();

        }
}
else if (ownership == 'institutional') {
   var society = $("[name='institution']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Government Institutional Publication Registration Certificate must be a PDF file.');
           hideLoadingBar1();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
        hideLoadingBar1();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
        hideLoadingBar1();
           e.preventDefault();

        }
}
else if (ownership == 'trust-foundation') {
   var society = $("[name='trust_foundation']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Government Trust/Foundation Publication Registration Certificate must be a PDF file.');
             hideLoadingBar1();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
          hideLoadingBar1();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
          hideLoadingBar1();
           e.preventDefault();

        }
}
else if (ownership == 'government-society') {
   var society = $("[name='society']").prop('files')[0];
   var gst = $("[name='gst']").prop('files')[0];
   var pan_tan = $("[name='pan_tan']").prop('files')[0];
           if (society.type !== 'application/pdf') {
              toastr.error('Government Society Publication Registration Certificate must be a PDF file.');
             hideLoadingBar1();
              e.preventDefault();
      }
        if (gst.type !== 'application/pdf') {
           toastr.error('GST Certificate must be a PDF file.');
          hideLoadingBar1();
           e.preventDefault();

        }
        if (pan_tan.type !== 'application/pdf') {
           toastr.error('PAN must be a PDF file.');
          hideLoadingBar1();
           e.preventDefault();

        }
}


//Sub-Doc
var doc = document.getElementById('subsidiary_distributor_dis');
var doc_name = doc.value;
var docstatus = "true";
var arr = [];
if (doc_name === "yes") {
    var documents = $("[name='subsidiary_name_distributor_file[]']");
    documents.each(function (index, element) {
        var file = element.files[0];
        if (file.type !== 'application/pdf') {
            arr.push(file);
        }
    });
}
if (arr.length !== 0) {
   hideLoadingBar1();
     toastr.error('Subsidiary Document must be a PDF file.');
    e.preventDefault();
}

      });
   });

   var p = 1;
   var m = 0;

   /*************************************
   // Best 5 Translated Books
   ***************************************/
   var dstcounter = 0;
   $('#distribution_book').click(function () {
      m++;
      dstcounter++;
      if (dstcounter < 10) {
         $('#distribution_table').
            append('<tr id="row' + m +
               '"><td><input type="text" name="publisher_name[]" placeholder="Enter the publisher name*" class="form-control name_list" /></td><td><input type="text" name="publisher_place[]" placeholder="Enter the place*" class="form-control name_list" /></td><td><input type="file" name="authorization_letter[]" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               m + '" class="btn btn-danger btn_remove_dist">X</button></td></tr>');
      } else {
         $('#distribution_book').prop('disabled', true);
         return  toastr.error('Only 10 input only Allowed');

         // alert('Only 10 input only Allowed');
      }
   });

   $(document).on('click', '.btn_remove_dist', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (dstcounter <= 10) {
         $('#distribution_book').prop('disabled', false);
      }
      dstcounter--;
   });
   /*************************************
   // End Best 5 Translated Books
   ***************************************/

   // Language

   $('.other_indian_lang2').css('display', 'none');
   $('.other_foreign_lang2').css('display', 'none');

   $("#other_indian_lang3").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_indian_lang2').css('display', 'block');
         $('#other_indian_lang2').prop('required', true);
      } else if (checkValue == false) {
         $('.other_indian_lang2').css('display', 'none');
         $('#other_indian_lang2').prop('required', false);
      }
   });

   $("#other_forign_lag2").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_foreign_lang2').css('display', 'block');
         $('#other_foreign_lang2').prop('required', true);
      } else if (checkValue == false) {
         $('.other_foreign_lang2').css('display', 'none');
         $('#other_foreign_lang2').prop('required', false);
      }
   });

   $('#dis_ownership').on('change',function(){
      var value = $(this).val();
      if(value == 'Proprietorship'){
         //  $('#ownership_doc').css('display','block');
          $('.dis_user_file_input').append('<div id="dis_proprietorship_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel" name="udayam" placeholder="Enter Udayam*" class="form-control name_list"required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" placeholder="Enter GST*" class="form-control name_list" /></div>');

          $("#dis_partnership_input").remove();
          $("#dis_private_input").remove();
          $("#dis_publication_input").remove();
          $("#dis_oneperson_input").remove();
          $('#dis_limited_input').remove();
          $('#dis_society_input').remove();
          $('#dis_trust_input').remove();
          $('#dis_institutional_input').remove();
          $('#dis_trust-foundation_input').remove();
          $('#dis_government-society_input').remove();
      }
      else if(value == 'Partnership'){
         // $('#ownership_doc').css('display','block');
         $('.dis_user_file_input').append('<div id="dis_partnership_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list" /><label for="formFileSm" class="form-label">Partnership Deed <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN / TAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_private_input").remove();
         $("#dis_publication_input").remove();
         $("#dis_oneperson_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();
         $('#dis_trust_input').remove();
         $('#dis_institutional_input').remove();
         $('#dis_trust-foundation_input').remove();
         $('#dis_government-society_input').remove();

     }
     else if(value == 'Private'){
      $('.dis_user_file_input').append('<div id="dis_private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="moa" class="form-control name_list"/><label for="formFileSm" class="form-label">AOA </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="aoa" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

      $("#dis_proprietorship_input").remove();
      $("#dis_partnership_input").remove();
      $("#dis_publication_input").remove();
      $("#dis_oneperson_input").remove();
      $('#dis_limited_input').remove();
      $('#dis_society_input').remove();
      $('#dis_trust_input').remove();
      $('#dis_institutional_input').remove();
      $('#dis_trust-foundation_input').remove();
      $('#dis_government-society_input').remove();

     }
      else if(value == 'Publication'){
         //  $('#ownership_doc').css('display','block');
         $('.dis_user_file_input').append('<div id="dis_publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $("#dis_oneperson_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();
         $('#dis_trust_input').remove();
         $('#dis_institutional_input').remove();
         $('#dis_trust-foundation_input').remove();
         $('#dis_government-society_input').remove();


      }else if(value == 'oneperson'){
         //  $('#ownership_doc').css('display','block');
         $('.dis_user_file_input').append('<div id="dis_oneperson_input"><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel"name="udayam" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN / TAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel"name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();
         $('#dis_partnership_input').remove();
         $('#dis_proprietorship_input').remove();
         $('#dis_trust_input').remove();
         $('#dis_institutional_input').remove();
         $('#dis_trust-foundation_input').remove();
         $('#dis_government-society_input').remove();

      }else if(value == 'limited'){

         $('.dis_user_file_input').append('<div id="dis_limited_input"><label for="formFileSm" class="form-label">LLP Agreement  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list"/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $('#dis_partnership_input').remove();
         $('#dis_society_input').remove();
         $('#dis_publication_input').remove();
         $('#dis_oneperson_input').remove();
         $('#dis_trust_input').remove();
         $('#dis_institutional_input').remove();
         $('#dis_trust-foundation_input').remove();
         $('#dis_government-society_input').remove();


      }else if(value == 'society'){

         $('.dis_user_file_input').append('<div id="dis_society_input"><label for="formFileSm" class="form-label">Private Society Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $('#dis_partnership_input').remove();
         $('#dis_limited_input').remove();
         $('#dis_oneperson_input').remove();
         $('#dis_publication_input').remove();
         $('#dis_trust_input').remove();
         $('#dis_institutional_input').remove();
         $('#dis_trust-foundation_input').remove();
         $('#dis_government-society_input').remove();

      }else if(value == 'trust'){

        $('.dis_user_file_input').append('<div id="dis_trust_input"><label for="formFileSm" class="form-label">Private Trust Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_trust" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#dis_proprietorship_input").remove();
        $("#dis_user_file_input").remove();
        $("#dis_private_input").remove();
        $('#dis_partnership_input').remove();
        $('#dis_limited_input').remove();
        $('#dis_oneperson_input').remove();
        $('#dis_society_input').remove();
        $('#dis_publication_input').remove();
        $('#dis_institutional_input').remove();
        $('#dis_trust-foundation_input').remove();
        $('#dis_government-society_input').remove();

     }else if(value == 'institutional'){

        $('.dis_user_file_input').append('<div id="dis_institutional_input"><label for="formFileSm" class="form-label">Government Institutional Publication Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel"name="institution" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file"  accept="application/pdf,application/vnd.ms-excel"name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#dis_proprietorship_input").remove();
        $("#dis_user_file_input").remove();
        $("#dis_private_input").remove();
        $('#dis_partnership_input').remove();
        $('#dis_limited_input').remove();
        $('#dis_oneperson_input').remove();
        $('#dis_society_input').remove();
        $('#dis_publication_input').remove();
        $('#dis_trust_input').remove();
        $('#dis_trust-foundation_input').remove();
        $('#dis_government-society_input').remove();

     }else if(value == 'trust-foundation'){

        $('.dis_user_file_input').append('<div id="dis_trust-foundation_input"><label for="formFileSm" class="form-label">Government Trust/Foundation Publication Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="trust_foundation" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#dis_proprietorship_input").remove();
        $("#dis_user_file_input").remove();
        $("#dis_private_input").remove();
        $('#dis_partnership_input').remove();
        $('#dis_limited_input').remove();
        $('#dis_oneperson_input').remove();
        $('#dis_society_input').remove();
        $('#dis_publication_input').remove();
        $('#dis_trust_input').remove();
        $('#dis_institutional_input').remove();
        $('#dis_government-society_input').remove();

     }else if(value == 'government-society'){

        $('.dis_user_file_input').append('<div id="dis_government-society_input"><label for="formFileSm" class="form-label">Government Trust/Foundation Publication Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#dis_proprietorship_input").remove();
        $("#dis_user_file_input").remove();
        $("#dis_private_input").remove();
        $('#dis_partnership_input').remove();
        $('#dis_limited_input').remove();
        $('#dis_oneperson_input').remove();
        $('#dis_society_input').remove();
        $('#dis_publication_input').remove();
        $('#dis_trust_input').remove();
        $('#dis_institutional_input').remove();
        $('#dis_trust-foundation_input').remove();

     }else{
         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $("#dis_publication_input").remove();
         $("#dis_oneperson_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();
         $('#dis_trust_input').remove();
         $('#dis_institutional_input').remove();
         $('#dis_trust-foundation_input').remove();
         $('#dis_government-society_input').remove();
      }
  });


   //***************************************************** */
   //################### End Book Distributor#######################
   //***************************************************** */

// __________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
   //***************************************************** */
   //###################     Book Publisher And Distributor #######################
   //***************************************************** */

   //Distributor-username check
   $('#dst_publication_state').on('change', function() {
      // alert('asfasd');
      var stateId = $(this).val();
      $.ajaxSetup({
         headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         type: "post",
         dataType: "json",
         url: '/getdistrict',
         data: {'state_id':stateId},
          success: function(response) {
              var districts = response.districts;
              $('#dst_publication_district').empty();
 $('#dst_publication_district').append('<option value="">Select District</option>');

              $.each(districts, function(key, value) {
                  $('#dst_publication_district').append('<option value="' + value.name + '">' + value.name + '</option>');
              });
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
   });
   
   $('#publication_contact_person_state').on('change', function() {
      // alert('asfasd');
      var stateId = $(this).val();
      $.ajaxSetup({
         headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
         type: "post",
         dataType: "json",
         url: '/getdistrict',
         data: {'state_id':stateId},
          success: function(response) {
              var districts = response.districts;
              $('#publication_contact_person_district').empty();
  $('#publication_contact_person_district').append('<option value="">Select District</option>');

              $.each(districts, function(key, value) {
                  $('#publication_contact_person_district').append('<option value="' + value.name + '">' + value.name + '</option>');
              });
          },
          error: function(xhr, status, error) {
              console.error(error);
          }
      });
   });
   var typingTimer;
   var doneTypingInterval = 1000;
   $('#pub_dis_user_name').keyup(function(){
       clearTimeout(typingTimer);
       if ($('#pub_dis_user_name').val) {
           typingTimer = setTimeout(function(){
                var v = $("#pub_dis_user_name").val();
               if(v.length == 0){
                  $("#bothcheckusername").html("Username required");
                  toastr.error('Username required!!');
               }else{
     //ajax
     $.ajaxSetup({
      headers:{
         'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
   });
 $.ajax({
     type: "post",
     dataType: "json",
     url: '/check/both_username',
     data: {'userName':v},
     success: function(response) {
        if(response.success){
         var username = document.getElementById("bothusernameval");
         username.value = 1;
         $("#bothcheckusername").html("");
        }else{
         var username = document.getElementById("bothusernameval");
         username.value = 0;
         $("#bothcheckusername").html("Username already taken");
         toastr.error('Username already taken!!');
        }

     }
 });
               }
          


           }, doneTypingInterval);
       }

   });



   //email check
   var typingTimer;
   var doneTypingInterval = 1000;
   $('#dis_publication_email_id').keyup(function(){
       clearTimeout(typingTimer);
       if ($('#dis_publication_email_id').val) {
           typingTimer = setTimeout(function(){
                var v = $("#dis_publication_email_id").val();
   if(v.length == 0){
      $("#bothcheckemail").html("Email required");
      toastr.error('Email required!!');
   }else{
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

      if (reg.test(v) == false)
      {
        var email = document.getElementById("bothemailval");
           email.value = 2;
        $("#bothcheckemail").html("Invalid Email!!");
        toastr.error('Invalid Email!!');
      }else{
           $("#bothcheckemail").html("");
              $.ajaxSetup({
                 headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                 }
              });
           $.ajax({
              type: "post",
              dataType: "json",
              url: '/check/both_email',
              data: {'email':v},
              success: function(response) {
                 if(response.success){
                    var email = document.getElementById("bothemailval");
                    email.value = 1;
                    $("#bothcheckemail").html("");
                 }else{
                    var email = document.getElementById("bothemailval");
                    email.value = 0;
                    $("#bothcheckemail").html("Email already taken");
                    toastr.error('Email already required!!');
                 }

              }
           });
   }
              
                }
           }, doneTypingInterval);
       }

   });

   //Password Check
      function bothcheckPasswordMatch() {
         var password = $("#pub_dis_password").val();
         var confirmPassword = $("#pub_dis_conform_password").val();
if(password.length == 0){
   $("#bothdivCheckPasswordMatch").html("Password required!");
   toastr.error('Password required!');
}else{
   if (password != confirmPassword){
      $("#bothdivCheckPasswordMatch").html("Passwords does not match!");
      toastr.error('Passwords does not match!');
      }
      else {
      $("#bothdivCheckPasswordMatch").html("");
      }
}
    
     }

        $('#pub_dis_conform_password').keyup( function() {
         if( this.value.length < 8 ) return;
         bothcheckPasswordMatch();
      });

      function showLoading2() {
         // Show loading bar
         document.getElementById('loadingBar2').style.display = 'block';
         // Add 'loading' class to the form to make it semi-transparent
         document.getElementById('reg_publisher_and_distributor_form').classList.add('loading2');
     }

     function hideLoadingBar2() {
       document.getElementById('loadingBar2').style.display = 'none';
       document.getElementById('reg_publisher_and_distributor_form').classList.remove('loading2');
   }
// new_code
$(document).ready(function () {
   $('#reg_publisher_and_distributor').on('click', function () {
       $("#reg_publisher_and_distributor_form").submit(function (e) {
           showLoading2();
           // Password
           var password = $("#pub_dis_password").val();
           var confirmPassword = $("#pub_dis_conform_password").val();
           if(password.length == 0){
            hideLoadingBar2();
            toastr.error("Password required!!");
            e.preventDefault();
           }else if(confirmPassword.length == 0){
            hideLoadingBar2();
            toastr.error("Confirm password required!!");
            e.preventDefault();
           }else{
            if (password != confirmPassword) {
               hideLoadingBar2();
               toastr.error("Password and confirm password don't match!!");
               e.preventDefault();
           }
           }
        

           // Username
           var uname2 = $("#pub_dis_user_name").val();
           if(uname2.length == 0){
            hideLoadingBar2();
            toastr.error("Username required!!!");
            e.preventDefault();
           }else{
            var username1 = $("#bothusernameval").val();
            if (username1 && username1 == 0) {
                hideLoadingBar2();
                toastr.error("Username already taken!!!");
                e.preventDefault();
            }
           }
          

           // Email
           var uemail2 = $("#dis_publication_email_id").val();
           if(uemail2.length == 0){
            hideLoadingBar2();
            toastr.error('Email required!!');
            e.preventDefault();
           }else{
            var email = $("#bothemailval").val();
            if (email == 0) {
                hideLoadingBar2();
                toastr.error('Email already taken!!');
                e.preventDefault();
            } else if (email == 2) {
                hideLoadingBar2();
                toastr.error('Invalid Email!!');
                e.preventDefault();
            }
           }
          
//Category check
          var pd_ctg_book = $("[name='pub_dis_category_of_books_published[]']:checked").length; // count the checked rows
          var pd_s_ctg_book = $("[name='pub_dis_specialized_category_books[]']:checked").length; // count the checked rows
         var pd_p_lan_book = $("[name='pub_dis_primary_language_of_publication[]']:checked").length; // count the checked rows

         if (pd_ctg_book != 0) {
           if (pd_s_ctg_book != 0) {
                if (pd_p_lan_book != 0) {

                } else {
                    hideLoadingBar2();

                   toastr.error('Please select primary language of publication');
                     e.preventDefault();
                 }
              } else {
               hideLoadingBar2();

                toastr.error('Please select any One Special Category of Books Published');
                  e.preventDefault();
             }
           } else {
             hideLoadingBar2();

             toastr.error('Please select any One Category of Books Published');
            e.preventDefault();
      }

           // LatestCatalogue-latest_book_categories
           function isValidExcelFile3(fileName) {
               return /\.(xls|xlsx)$/i.test(fileName);
           }
           var fileInput = document.getElementById('latest_book_categories3');
           var fileName = fileInput.value;

           if (!isValidExcelFile3(fileName)) {
               hideLoadingBar2();
               toastr.error('Latest book catalogue must be an excel file. Download sample file, update and upload your file');
               fileInput.value = '';
               e.preventDefault();
           }

           // Authorization Letter
           var documents1 = $("[name='authorization_letter[]']");
           var errorOccurred = false;

           documents1.each(function (index, element) {
               var file = element.files[0];
               if (file && file.type !== 'application/pdf') {
                   toastr.error('Authorization letter must be a PDF file.');
                   errorOccurred = true;
                   return false;
               }
           });

           if (errorOccurred) {
               hideLoadingBar2();
               e.preventDefault(); // Prevent form submission if an error occurred
           }

           // Pubownership proof
           var ownership = $("#pub_dis_ownership").val();
           if (ownership == 'Partnership') {
            var gst = $("[name='gst']").prop('files')[0];
            var udayam = $("[name='udayam']").prop('files')[0];
            var pan_deed = $("[name='pan_deed']").prop('files')[0];
            var pan_tan = $("[name='pan_tan']").prop('files')[0];
                 if (udayam.type !== 'application/pdf') {
                    hideLoadingBar2();
                     toastr.error('Udyam Certificate must be a PDF file.');
                    e.preventDefault();

                    }
                 if (pan_deed.type !== 'application/pdf') {
                    hideLoadingBar2();
                  toastr.error('Partnership Deed must be a PDF file.');
                 e.preventDefault();
                    }
                 if (gst.type !== 'application/pdf') {
                    hideLoadingBar2();
                     toastr.error('GST Certificate must be a PDF file.');
                    e.preventDefault();

                 }
                 if (pan_tan.type !== 'application/pdf') {
                    hideLoadingBar2();
                     toastr.error('PAN / TAN must be a PDF file.');
                    e.preventDefault();

                 }
        }
        else if (ownership == 'Private') {
           var certification_incon = $("[name='certification_incon']").prop('files')[0];
           var moa = $("[name='moa']").prop('files')[0];
           var aoa = $("[name='aoa']").prop('files')[0];
           var pan_tan = $("[name='pan_tan']").prop('files')[0];
           var gst = $("[name='gst']").prop('files')[0];

                if (certification_incon.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('Certificate of incorporation must be a PDF file.');
                   e.preventDefault();

                }
                if (moa.type !== 'application/pdf') {
                 hideLoadingBar2();
                  toastr.error('MOA must be a PDF file.');
                 e.preventDefault();

                 }
              if (aoa.type !== 'application/pdf') {
                 hideLoadingBar2();
               toastr.error('AOA must be a PDF file.')
              e.preventDefault();
                 }
                if (gst.type !== 'application/pdf') {
                 hideLoadingBar2();
                  toastr.error('GST Certificate must be a PDF file.');
                 e.preventDefault();

              }
                if (pan_tan.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('PAN must be a PDF file.');
                   e.preventDefault();
                }
        }
        else if (ownership == 'Publication') {
           var certification_incon = $("[name='certification_incon']").prop('files')[0];
           var pan_tan = $("[name='pan_tan']").prop('files')[0];
           var gst = $("[name='gst']").prop('files')[0];

                if (certification_incon.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('Certificate of incorporation must be a PDF file.');
                   e.preventDefault();

                }
                if (gst.type !== 'application/pdf') {
                 hideLoadingBar2();
                  toastr.error('GST Certificate must be a PDF file.');
                 e.preventDefault();

              }
                if (pan_tan.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('PAN must be a PDF file.');
                   e.preventDefault();
                }
        }
        else if (ownership == 'oneperson') {

           var udayam = $("[name='udayam']").prop('files')[0];
           var gst = $("[name='gst']").prop('files')[0];
           var pan_tan = $("[name='pan_tan']").prop('files')[0];
                if (udayam.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('Udyam Certificate must be a PDF file.');
                   e.preventDefault();

                   }
                if (gst.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('GST Certificate must be a PDF file.');
                   e.preventDefault();

                }
                if (pan_tan.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('PAN / TAN must be a PDF file.');
                   e.preventDefault();

                }
        }
        else if (ownership == 'limited') {
           var llp = $("[name='llp_agre']").prop('files')[0];
           var udayam = $("[name='udayam']").prop('files')[0];
           var gst = $("[name='gst']").prop('files')[0];
           var pan_tan = $("[name='pan_tan']").prop('files')[0];
                   if (llp.type !== 'application/pdf') {
                    hideLoadingBar2();
                       toastr.error('LLP Agreement must be a PDF file.');
                      e.preventDefault();
              }
                if (udayam.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('Udyam Certificate must be a PDF file.');
                   e.preventDefault();

                   }
                if (gst.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('GST Certificate must be a PDF file.');
                   e.preventDefault();

                }
                if (pan_tan.type !== 'application/pdf') {
                 hideLoadingBar2();
                    toastr.error('PAN / TAN must be a PDF file.');
                   e.preventDefault();

                }
        }else if (ownership == 'trust') {
         var society = $("[name='private_trust']").prop('files')[0];
         var gst = $("[name='gst']").prop('files')[0];
         var pan_tan = $("[name='pan_tan']").prop('files')[0];
                 if (society.type !== 'application/pdf') {
                    toastr.error('Private Trust Registration Certificate must be a PDF file.');
                    hideLoadingBar2();
                    e.preventDefault();
            }
              if (gst.type !== 'application/pdf') {
                 toastr.error('GST Certificate must be a PDF file.');
                 hideLoadingBar2();
                 e.preventDefault();
      
              }
              if (pan_tan.type !== 'application/pdf') {
                 toastr.error('PAN must be a PDF file.');
                 hideLoadingBar2();
                 e.preventDefault();
      
              }
      }
      else if (ownership == 'society') {
         var society = $("[name='private_society']").prop('files')[0];
         var gst = $("[name='gst']").prop('files')[0];
         var pan_tan = $("[name='pan_tan']").prop('files')[0];
                 if (society.type !== 'application/pdf') {
                    toastr.error('Private Society Registration Certificate must be a PDF file.');
                   hideLoadingBar2();
                    e.preventDefault();
            }
              if (gst.type !== 'application/pdf') {
                 toastr.error('GST Certificate must be a PDF file.');
                hideLoadingBar2();
                 e.preventDefault();
      
              }
              if (pan_tan.type !== 'application/pdf') {
                 toastr.error('PAN must be a PDF file.');
                hideLoadingBar2();
                 e.preventDefault();
      
              }
      }
      else if (ownership == 'institutional') {
         var society = $("[name='institution']").prop('files')[0];
         var gst = $("[name='gst']").prop('files')[0];
         var pan_tan = $("[name='pan_tan']").prop('files')[0];
                 if (society.type !== 'application/pdf') {
                    toastr.error('Government Institutional Publication Registration Certificate must be a PDF file.');
                   hideLoadingBar2();
                    e.preventDefault();
            }
              if (gst.type !== 'application/pdf') {
                 toastr.error('GST Certificate must be a PDF file.');
                hideLoadingBar2();
                 e.preventDefault();
      
              }
              if (pan_tan.type !== 'application/pdf') {
                 toastr.error('PAN must be a PDF file.');
                hideLoadingBar2();
                 e.preventDefault();
      
              }
      }
      else if (ownership == 'trust-foundation') {
         var society = $("[name='trust_foundation']").prop('files')[0];
         var gst = $("[name='gst']").prop('files')[0];
         var pan_tan = $("[name='pan_tan']").prop('files')[0];
                 if (society.type !== 'application/pdf') {
                    toastr.error('Government Trust/Foundation Publication Registration Certificate must be a PDF file.');
                   hideLoadingBar2();
                    e.preventDefault();
            }
              if (gst.type !== 'application/pdf') {
                 toastr.error('GST Certificate must be a PDF file.');
                hideLoadingBar2();
                 e.preventDefault();
      
              }
              if (pan_tan.type !== 'application/pdf') {
                 toastr.error('PAN must be a PDF file.');
                hideLoadingBar2();
                 e.preventDefault();
      
              }
      }
      else if (ownership == 'government-society') {
         var society = $("[name='society']").prop('files')[0];
         var gst = $("[name='gst']").prop('files')[0];
         var pan_tan = $("[name='pan_tan']").prop('files')[0];
                 if (society.type !== 'application/pdf') {
                    toastr.error('Government Society Publication Registration Certificate must be a PDF file.');
                 hideLoadingBar2();
                    e.preventDefault();
            }
              if (gst.type !== 'application/pdf') {
                 toastr.error('GST Certificate must be a PDF file.');
              hideLoadingBar2();
                 e.preventDefault();
      
              }
              if (pan_tan.type !== 'application/pdf') {
                 toastr.error('PAN must be a PDF file.');
              hideLoadingBar2();
                 e.preventDefault();
      
              }
      }
       

           // Sub-Doc
           var doc = document.getElementById('subsidiary_pub_yes');
           var doc_name = doc.value;
           var arr = [];

           if (doc_name === "yes") {
               var documents = $("[name='subsidiary_publication_distribution_file[]']");
               documents.each(function (index, element) {
                   var file = element.files[0];
                   if (file.type !== 'application/pdf') {
                       arr.push(file);
                   }
               });
           }

           if (arr.length !== 0) {
               hideLoadingBar2();
               toastr.error('Subsidiary Document must be a PDF file.');
               e.preventDefault();
           }
   
       });
   });
});


   // subsidiary

   $('#subsidiary_distributor_distribution_no').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   var H = 1;
   $('#subsidiary_distributor_dis').attr('required', false);
   $('input[type=radio][name=subsidiary_distributor_dis]').on('change', function () {
      // alert('Good');
      switch ($(this).val()) {
         case 'yes':

            $('#subsidiary_distributor_dis').prop('required', true);

            $('#name_of_the_subsidiary_distributor').prop('required', true);
            $('#content_of_the_subsidiary_account_transaction').prop('required', true);
 $('#content_of_the_subsidiary_distributor').prop('required', true);
 $('#file_of_the_subsidiary_distributor').prop('required', true);

            $('.subsidiary_pub_name_new').css('display', 'block');
            $('#sub_dis_add_newdis').click(function () {
               w++;
               $('#subsidiary_subsidiary_distributor_no_tbl').
                  append('<tr id="row' + H +
                     '" class="removecl"><td><input type="text" name="substidiary_name_account_transaction_content_distributor[]" placeholder="Enter the name of the subsidiary distributor*" class="form-control name_list" required/></td><td><input type="text" name="substidiary_name_account_transaction_content_distribution[]" placeholder="Enter the name of the subsidiary distribution*" class="form-control name_list" required/></td> <td><input type="number" id="content_of_the_subsidiary_distributor" name="subsidiary_name_distributor_content[]" placeholder="Enter the stock holder percentage" class="form-control name_list" required/></td> <td> <input class="form-control" id="file_of_the_subsidiary_distributor" name="subsidiary_name_distributor_file[]" placeholder="Enter the document "type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td><td><button type="button" name="remove" id="' +
                     H + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            $('#subsidiary_distributor_dis').prop('required', false);
            $('#name_of_the_subsidiary_distributor').prop('required', false);
            $('#content_of_the_subsidiary_account_transaction').prop('required', false);
$('#content_of_the_subsidiary_distributor').prop('required', false);
 $('#file_of_the_subsidiary_distributor').prop('required', false);
            $('.subsidiary_pub_name_new').css('display', 'none');

            $('.removecl').remove();
            // alert('off');
            break;
      }
   });

   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });

   //Name of Publisher's In Your Distribution
   /*************************************
   // Name of Publisher's In Your Distribution
   ***************************************/
   var dst_pub_counter = 0;
   var pdv = 0;

   $('#publisher_distribution_add').click(function () {
      pdv++;
      dst_pub_counter++;
      if (dst_pub_counter < 10) {
         $('#distribution_dis_pub').
            append('<tr id="row' + pdv +
               '"><td><input type="text" name="publisher_name[]" placeholder="Enter the publisher name *" class="form-control name_list" required/></td><td><input type="text" name="publisher_place[]" placeholder="Enter the place *" class="form-control name_list" required/></td><td><input type="file" name="authorization_letter[]" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               pdv + '" class="btn btn-danger btn_remove_dis_pub_de">X</button></td></tr>');
      } else {
         $('#publisher_distribution_add').prop('disabled', true);
         return toastr.error('Only 10 input only Allowed');

         // alert('Only 10 input only Allowed');

      }
   });

   $(document).on('click', '.btn_remove_dis_pub_de', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (dst_pub_counter <= 10) {
         $('#publisher_distribution_add').prop('disabled', false);
      }
      dst_pub_counter--;
   });
   /*************************************
   // End Name of Publisher's In Your Distribution
   ***************************************/

   //Best 10 Titles In Your Publications?
   $('#book_ten_pub_and_dis').change(function () {
      // alert('good');
      const numInput = $(this).val()
      if (numInput < 10) {
         for (j = 0; j < numInput; j++) {
            i++;
            $('#pub_dis_publications').
               append('<tr id="row' + i +
                  '"><td><input type="text" name="publication_title[]" placeholder="Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="publication_author[]" placeholder="Enter the author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                  i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
         }
      } else {
         return toastr.error('Please Enter 10 Blow Number');
         // alert('Please Enter 10 Blow Number');
      }
   });

   /*******************************************
   // Best 10 Titles In Your Publications
   ********************************************/
   var psv = 0;
   $('#publisher_distribution_addb10').click(function () {
      i++;
      psv++;
      if (psv < 10) {
         $('#pub_dis_publications').
            append('<tr id="row' + i +
               '"><td><input type="text" name="publication_title[]" placeholder="Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="publication_author[]" placeholder="Enter the author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_dis_pub_de_ten">X</button></td></tr>');
      } else {
         $('#publisher_distribution_addb10').prop('disabled', true);
        return toastr.error('Only 10 input only Allowed');

         // alert('Only 10 input only Allowed');

      }
   });

   $(document).on('click', '.btn_remove_dis_pub_de_ten', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (psv <= 10) {
         $('#publisher_distribution_addb10').prop('disabled', false);
      }
      psv--;
   });
   /*******************************************
   // End Best 5Titles In Your Publications
   ********************************************/
// Initially hide the element
$('#member_in_publishers_new_old_lby').css('display', 'none');

var sra = 1;

// Event listener for radio button changes
$('input[type=radio][name=member_in_publishers_yes_old_lby]').on('change', function () {
    switch ($(this).val()) {
        case 'yes':
            // Show the element and set required properties
            $('#member_in_publishers_new_old_lby').prop('required', true);
            $('#trans_title2').prop('required', true);
            $('#trans_author2').prop('required', true);
            $('#trans_from2').prop('required', true);
            $('#trans_to2').prop('required', true);
            $('#member_in_publishers_new_old_lby').css('display', 'block');
            break;
        case 'No':
            // Hide the element and clear some form fields
            sra = 0;
            $('#member_in_publishers_new_old_lby').css('display', 'none');
            $('#member_in_publishers_yes_old_lby').prop('required', false);
            $('.removecl').remove();
            break;
    }
});
   var s = 0;
   var r = 0;
   var trs_pub_sit = 0;
   $('#translated_pub_dis_lby').click(function () {
      // alert('good');
      i++;
      trs_pub_sit++;
      if (trs_pub_sit < 10) {
         $('#trans_book_pub_dis_lby').
            append('<tr id="row' + i +
               '"><td><input type="text" name="trans_title[]" placeholder="Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="trans_author[]" placeholder="Enter the author*" class="form-control name_list" required/></td><td><input type="text" name="trans_from[]" placeholder="Enter the language from*" class="form-control name_list" required/></td><td><input type="text" name="trans_to[]" placeholder="Enter the language to*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_pub_dst_five">X</button></td></tr>');
      } else {
         $('#translated_pub_dis').prop('disabled', true);
         return toastr.error('Allowed 5 inputs only');


      }
   });

   $(document).on('click', '.btn_remove_pub_dst_five', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (trs_pub_sit <= 10) {
         $('#translated_pub_dis').prop('disabled', false);
      }
      trs_pub_sit--;
   });

   /*******************************************
   // Best 10 Titles In Your Publications
   ********************************************/

   var trs_pub_sit1 = 0;
   $('#translated_pub_dis').click(function () {

      if (trs_pub_sit1 < 4) {
         i++;
         trs_pub_sit1++;
         // console.log("inside",trs_pub_sit1);
         $('#trans_book_pub_dis').
            append('<tr id="row' + i +
               '"><td><input type="text" name="trans_title[]" placeholder="Enter the title*" class="form-control name_list" required/></td><td><input type="text" name="trans_author[]" placeholder="Enter the author*" class="form-control name_list" required/></td><td><input type="text" name="trans_from[]" placeholder="Enter the language from*" class="form-control name_list" required/></td><td><input type="text" name="trans_to[]" placeholder="Enter the language to*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_pub_dst_five">X</button></td></tr>');
      } else {
         // console.log("else",trs_pub_sit1);
         $('#translated_pub_dis').prop('disabled', true);
         return toastr.error('Allowed 5 inputs only');


      }
   });

   $(document).on('click', '.btn_remove_pub_dst_five', function () {
      // console.log("outside",trs_pub_sit1);
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (trs_pub_sit1 <= 6) {
         $('#translated_pub_dis').prop('disabled', false);
      }
      // console.log("remove",trs_pub_sit1);
      trs_pub_sit1--;
   });
   /*******************************************
   // End Best 10 Titles In Your Publications
   ********************************************/
   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });

   $('.specialized_category_other2').css('display', 'none');
   $('.other_indian_lang3').css('display', 'none');
   $('.other_foreign_lang3').css('display', 'none');
   $('.subsidiaryEnable2').css('display', 'none');

   $("#specialized_category_check2").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.specialized_category_other2').css('display', 'block');
         $('#specialized_category_books_no2').prop('required', true);
      } else if (checkValue == false) {
         $('.specialized_category_other2').css('display', 'none');
         $('#specialized_category_books_no2').prop('required', false);
      }
   });

   $("#other_indian_lag3").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_indian_lang3').css('display', 'block');
         $('#other_indian_lag3').prop('required', true);
      } else if (checkValue == false) {
         $('.other_indian_lang3').css('display', 'none');
         $('#other_indian_lag3').prop('required', false);
      }

   });


   $("#other_forign_lag3").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_foreign_lang3').css('display', 'block');
         $('#other_forign_lag3').prop('required', true);
      } else if (checkValue == false) {
         $('.other_foreign_lang3').css('display', 'none');
         $('#other_forign_lag3').prop('required', false);
      }
   });

   $('#member_in_publishers_new').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   var sra = 1;

   $('input[type=radio][name=member_in_publishers_yes]').on('change', function () {
      switch ($(this).val()) {
         case 'yes':
            $('#member_in_publishers_yes').prop('required', true);

            $('#member_in_publishers_new').css('display', 'block');
            // alert('sub_pub_name_os');
            $('#member_in_publishers_name').prop('required', true);
            $('#member_in_publishers_id').prop('required', true);
            $('#member_in_publishers_name_op').click(function () {
               sra++;
               $('#tbl_subsidiary_pub_name_bg_no').
                  append('<tr id="row' + sra +
                     '" class="removecl"><td><input type="text" name="member_in_publishers_name[]" placeholder="Enter the publishers association name*" class="form-control name_list" required/></td><td><input type="text" name="member_in_publishers_id[]" placeholder="Enter the publishers association id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                     sra + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            // alert($(this).val());
            sra=0;
            $('div#member_in_publishers_new').css('display','none')

            $('#member_in_publishers_name').prop('required', false);
            $('#member_in_publishers_name').prop('required', false);

            $('#member_in_publishers_yes').prop('required', false);


            $('.removecl').remove();
            // alert('off')
            break;
      }
   });

   $('#sub_pub_name_os').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   var g = 1;

   $('input[type=radio][name=subsidiary_pub_yes]').on('change', function () {
      switch ($(this).val()) {
         case 'yes':
            $('#subsidiary_pub_yes').prop('required', true);

            $('#sub_pub_name_os').css('display', 'block');
            // alert('sub_pub_name_os');
            $('#subsidiary_publisher_distributor').prop('required', true);
            $('#subsidiary_publication_distribution').prop('required', true);
 $('#subsidiary_stackpercentage').prop('required', true);
            $('#subsidiary_publication_distribution_file').prop('required', true);
            $('#sub_pub_name_op').click(function () {
               g++;
               $('#tbl_subsidiary_publishcation_no').
                  append('<tr id="row' + g +
                     '" class="removecl"><td><input type="text" name="subsidiary_publisher_distributor[]" placeholder="Enter the name of the subsidiary book publisher and distributor*" class="form-control name_list" required/></td><td><input type="text" name="subsidiary_publication_distribution[]" placeholder="Enter the name of the subsidiary book publication and distribution*" class="form-control name_list" required/></td><td><input type="number" id="content_of_the_subsidiary_publication" name="subsidiary_stackpercentage[]" placeholder="Enter the stock holder percentage" class="form-control name_list" required/></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_publication_distribution_file[]" placeholder="Enter the document" type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td><td><button type="button" name="remove" id="' +
                     g + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
             $('#subsidiary_publisher_distributor').prop('required', false);
            $('#subsidiary_publication_distribution').prop('required', false);
 $('#subsidiary_stackpercentage').prop('required', false);
            $('#subsidiary_publication_distribution_file').prop('required', false);

            $('#subsidiary_pub_yes').prop('required', false);
            $('.subsidiary_pub_name_bg').css('display', 'none');

            $('.removecl').remove();
            // alert('off')
            break;
      }
   });

   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });
});

// Nature
$('#nature_ownership_doc').css('display','none');

$('#nature_ownership').on('change',function(){
   var value = $(this).val();
   if(value == 'Proprietorship'){
      $('#nature_ownership_doc').css('display','block');
  }
  else if(value == 'Partnership'){
     $('#nature_ownership_doc').css('display','block');
 }
 else if(value == 'Private'){
      $('#nature_ownership_doc').css('display','block');
 }
  else if(value == 'Publication'){
      $('#nature_ownership_doc').css('display','block');
  }else{
      $('#nature_ownership_doc').css('display','none');
  }
});

// bapasi
// $('.bapasi_en_pub_dist').css('display', 'none');
// $('.tamil_pathipu_thurai_en_pub_dist').css('display', 'none');
// $('.other_name_id_en_pub_dist').css('display', 'none');

// $("#bapasi_member_pub_dist").click(function () {
//    var checkValue = $(this).is(":checked");
//    // alert(checkValue);
//    if (checkValue == true) {
//       $('.bapasi_en_pub_dist').css('display', 'block');
//       $('#bapasi_pub_dist').prop('required', true);
//    } else if (checkValue == false) {
//       $('.bapasi_en_pub_dist').css('display', 'none');
//       $('#bapasi_pub_dist').prop('required', false);
//    }
// });

// $("#tamil_pathipu_thurai_new_pub_dist").click(function () {
//    var checkValue = $(this).is(":checked");
//    // alert(checkValue);
//    if (checkValue == true) {
//       $('.tamil_pathipu_thurai_en_pub_dist').css('display', 'block');
//       $('#tamil_pathipu_thurai_pub_dist').prop('required', true);
//    } else if (checkValue == false) {
//       $('.tamil_pathipu_thurai_en_pub_dist').css('display', 'none');
//       $('#tamil_pathipu_thurai_pub_dist').prop('required', false);
//    }
// });
// $("#others_new_pub_dist").click(function () {
//    var checkValue = $(this).is(":checked");
//    // alert(checkValue);
//    if (checkValue == true) {
//       $('.other_name_id_en_pub_dist').css('display', 'block');
//       $('#other_id_pub_dist').prop('required', true);
//    } else if (checkValue == false) {
//       $('.other_name_id_en_pub_dist').css('display', 'none');
//       $('#other_id_pub_dist').prop('required', false);
//    }
// });


// bapasi other add

$('.other_name_id_en_dis_pub').css('display', 'none');
// $('#subsidiary_publications').css('display', 'none');

$("#others_new_pub_dist").click(function () {
   var checkValue = $(this).is(":checked");
   // alert(checkValue);
   if (checkValue == true) {
      $('.other_name_id_en_dis_pub').css('display', 'block');
      $('#member_id_new_dis_pub').prop('required', true);
   } else if (checkValue == false) {
      $('.other_name_id_en_dis_pub').css('display', 'none');
      $('#member_id_new_dis_pub').prop('required', false);
   }
});
var sp = 1;
var pubtrsfivecounter = 0;
$('#member_name_new_id_dis_pub').click(function () {
   if (pubtrsfivecounter < 100) {
      sp++;
      pubtrsfivecounter++;
      $('#tbl_pub_member_no_dis_pub').
         append('<tr id="row' + sp +
            '"><td><input type="text" name="member_id_new_up_dis_pub[]" placeholder="Enter member name*" class="form-control name_list" required/></td><td><input type="text" name="member_name_new_up[]" placeholder="Enter member id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
            sp + '" class="btn btn-danger btn_remove_best_five">X</button></td></tr>');
   } else {
      $('#member_name_new_id_dis_pub').prop('disabled', true);
      return toastr.error('Allowed 5 inputs only');

   }
});

$(document).on('click', '.btn_remove_best_five', function () {
   var button_id = $(this).attr("id");
   $('#row' + button_id + '').remove();
   if (pubtrsfivecounter <= 4) {
      $('#member_name_new_id_dis_pub').prop('disabled', false);
   }
   pubtrsfivecounter--;
});

// bapasi
$('#pub_association_name_dis_pub').css('display', 'none');
// $('#subsidiary_publications').css('display', 'none');

var sra = 1;

$('input[type=radio][name=member_in_publ_dis_yes]').on('change', function () {

   switch ($(this).val()) {
      case 'yes':
         $('#member_in_publ_dis_yes').prop('required', true);

         $('#pub_association_name_dis_pub').css('display', 'block');
         // alert('sub_pub_name_os');
         $('#member_in_publ_dis_name_op').prop('required', true);
         $('#member_in_publ_dis_id').prop('required', true);
         $('#member_in_publ_dis_name_op').click(function () {
            sra++;
            $('#tbl_subsidiary_publ_dis_name_bg_no').
               append('<tr id="row' + sra +
                  '" class="removecl"><td><input type="text" name="member_in_publ_dis_name[]" placeholder="Publishers Association Name*" class="form-control name_list" required/></td><td><input type="text" name="member_in_publ_dis_id []" placeholder="Publishers Association id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                  sra + '" class="btn btn-danger btn_remove_publ_dis">X</button></td></tr>');

         });
         break;
      case 'No':
         // alert($(this).val());
         sra=0;
         $('div#pub_association_name_dis_pub').css('display','none')

         $('#member_in_publ_dis_name').prop('required', false);
         $('#member_in_publ_dis_name').prop('required', false);

         $('#member_in_publ_dis_yes').prop('required', false);


         $('.removecl').remove();
         // alert('off')
         break;

   }
});

$(document).on('click', '.btn_remove_publ_dis', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });


// Specialized Category Books
// $('input[name="pub_dis_specialized_category_books[]"]').on('change', function () {
//    $('input[name="' + this.name + '"]').not(this).prop('checked', false);
// });

  /*************************************
   // Awarded Titles in The Publication
   ***************************************/
   // var pubtrsfivecounter = 0;
   // $('#awarded_titles_dis_pub').click(function () {
   //    // alert("fffff");
   //    if (pubtrsfivecounter < 5) {
   //       pubtrsfivecounter++;
   //       $('#awarded_titles_name_dis_pub').
   //          append('<tr id="row' + pubtrsfivecounter +
   //             '"><td><input type="text" name="trs_state_awarded_dis_pub[]" placeholder=" Award Author*" class="form-control name_list" required/></td><td><input type="text" name="trs_central_awarded_dis_pub[]" placeholder=" Award Title *" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
   //             pubtrsfivecounter + '" class="btn btn-danger btn_remove_best_five_dis_pub">X</button></td></tr>');
   //    } else {
   //       $('#awarded_titles_dis_pub').prop('disabled', true);
   //       return toastr.error('Allowed 5 inputs only');

   //    }
   // });

   // $(document).on('click', '.btn_remove_best_five_dis_pub', function () {
   //    var button_id = $(this).attr("id");
   //    $('#row' + button_id + '').remove();
   //    if (pubtrsfivecounter <= 4) {
   //       $('#awarded_titles_dis_pub').prop('disabled', false);
   //    }
   //    pubtrsfivecounter--;
   // });
   $('#member_in_publishers_new_old_asrmy').css('display', 'none');
var sramy = 3;

$('input[type=radio][name=member_in_publishers_yes_old_asrmy]').on('change', function () {
   switch ($(this).val()) {
      case 'yes':
         $('#member_in_publishers_yes_old_asrmy').prop('required', true);

         $('#pub_test').prop('required', true);
         $('#pub_testone').prop('required', true);

         $('#member_in_publishers_new_old_asrmy').css('display', 'block');
         // alert('sub_pub_name_os');
         $('#member_in_publishers_name_old_asrmy').prop('required', true);
         $('#member_in_publishers_id_old_asrmy').prop('required', true);
         $('#translated_pub_dis_asrmy').click(function () {
            sramy++;
            $('#trans_book_pub_dis_asrmy').
               append('<tr id="row' + sramy +
               '"><td><input type="text" name="trs_state_awarded_dis_pub[]" placeholder="Enter the award name*" class="form-control name_list" required/></td><td><input type="text" name="trs_central_awarded_dis_pub[]" placeholder="Enter the title *" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               sramy + '" class="btn btn-danger btn_remove_best_five_my">X</button></td></tr>');

         });
         break;
      case 'No':
         // alert($(this).val());
         sramy=0;
         $('div#member_in_publishers_new_old_asrmy').css('display','none')

         $('#member_in_publishers_name_old_asrmy').prop('required', false);
         $('#member_in_publishers_name_old_asrmy').prop('required', false);

         $('#member_in_publishers_yes_old_asrmy').prop('required', false);


         $('.removecl').remove();
         // alert('off')
         break;
   }
});
$(document).on('click', '.btn_remove_best_five_my', function () {
    var button_id = $(this).attr("id");
    $('#row' + button_id + '').remove();
    if (pubtrsfivecounter <= 4) {
       $('#awarded_titles_dis_pub').prop('disabled', false);
    }
    pubtrsfivecounter--;
 });
   $('#member_in_publishers_new_old_lby').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   var sra = 1;

   $('input[type=radio][name=member_in_publishers_yes_old_lby]').on('change', function () {
      switch ($(this).val()) {
         case 'yes':
            $('#member_in_publishers_yes_old_lby').prop('required', true);

            $('#member_in_publishers_new_old_lby').css('display', 'block');
            // alert('sub_pub_name_os');
            $('#member_in_publishers_name_old_lby').prop('required', true);
            $('#member_in_publishers_id_old_lby').prop('required', true);
            $('#member_in_publishers_name_op_old_lby').click(function () {
               sra++;
               $('#tbl_subsidiary_pub_name_bg_no_old_lby').
                  append('<tr id="row' + sra +
                     '" class="removecl"><td><input type="text" name="member_in_publishers_name_old[]" placeholder="Publishers Association Name*" class="form-control name_list" required/></td><td><input type="text" name="member_in_publishers_id_old[]" placeholder="Publishers Association id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                     sra + '" class="btn btn-danger btn_remove_old_lby">X</button></td></tr>');

            });
            break;
         case 'No':
            // alert($(this).val());
            sra=0;
            $('div#member_in_publishers_new_old_lby').css('display','none')

            $('#member_in_publishers_name_old_lby').prop('required', false);
            $('#member_in_publishers_name_old_lby').prop('required', false);

            $('#member_in_publishers_yes_old_lby').prop('required', false);


            $('.removecl').remove();
            // alert('off')
            break;
      }
   });

   /*************************************
   // End Awarded Titles in The Publication
   ***************************************/

   $('#pub_dis_ownership').on('change',function(){
      var value = $(this).val();
      if(value == 'Proprietorship'){
         //  $('#ownership_doc').css('display','block');
          $('.pub_dis_user_file_input').append('<div id="pub_dis_proprietorship_input"<label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" placeholder="Enter Udayam*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" placeholder="Enter GST*" class="form-control name_list"/></div>');

          $("#pub_dis_partnership_input").remove();
          $("#pub_dis_private_input").remove();
          $("#pub_dis_publication_input").remove();
          $("#pub_dis_oneperson_input").remove();
          $('#pub_dis_limited_input').remove();
          $('#pub_dis_society_input').remove();
          $('#pub_dis_trust_input').remove();
          $('#pub_dis_institutional_input').remove();
          $('#pub_dis_trust-foundation_input').remove();
          $('#pub_dis_government-society_input').remove();
      }
      else if(value == 'Partnership'){
         // $('#ownership_doc').css('display','block');
         $('.pub_dis_user_file_input').append('<div id="pub_dis_partnership_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list" required/><label for="formFileSm" class="form-label">Partnership Deed  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_private_input").remove();
         $("#pub_dis_publication_input").remove();
         $("#pub_dis_oneperson_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();
         $('#pub_dis_trust_input').remove();
         $('#pub_dis_institutional_input').remove();
         $('#pub_dis_trust-foundation_input').remove();
         $('#pub_dis_government-society_input').remove();

     }
     else if(value == 'Private'){
      $('.pub_dis_user_file_input').append('<div id="pub_dis_private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="moa" class="form-control name_list"/><label for="formFileSm" class="form-label">AOA  <span class="mt-056"></span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="aoa" class="form-control name_list" /><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

      $("#pub_dis_proprietorship_input").remove();
      $("#pub_dis_partnership_input").remove();
      $("#pub_dis_publication_input").remove();
      $("#pub_dis_oneperson_input").remove();
      $('#pub_dis_limited_input').remove();
      $('#pub_dis_society_input').remove();
      $('#pub_dis_trust_input').remove();
      $('#pub_dis_institutional_input').remove();
      $('#pub_dis_trust-foundation_input').remove();
      $('#pub_dis_government-society_input').remove();

     }
      else if(value == 'Publication'){
         //  $('#ownership_doc').css('display','block');
         $('.pub_dis_user_file_input').append('<div id="pub_dis_publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $("#pub_dis_oneperson_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();
         $('#pub_dis_trust_input').remove();
         $('#pub_dis_institutional_input').remove();
         $('#pub_dis_trust-foundation_input').remove();
         $('#pub_dis_government-society_input').remove();


      }else if(value == 'oneperson'){
         //  $('#ownership_doc').css('display','block');
         $('.pub_dis_user_file_input').append('<div id="pub_dis_oneperson_input"><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate  </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();
         $('#pub_dis_partnership_input').remove();
         $('#pub_dis_proprietorship_input').remove();
         $('#pub_dis_trust_input').remove();
         $('#pub_dis_institutional_input').remove();
         $('#pub_dis_trust-foundation_input').remove();
         $('#pub_dis_government-society_input').remove();

      }else if(value == 'limited'){

         $('.pub_dis_user_file_input').append('<div id="pub_dis_limited_input"><label for="formFileSm" class="form-label">LLP Agreement  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Udyam Certificate <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="udayam" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file"  accept="application/pdf,application/vnd.ms-excel"name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN / TAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $('#pub_dis_partnership_input').remove();
         $('#pub_dis_society_input').remove();
         $('#pub_dis_publication_input').remove();
         $('#pub_dis_oneperson_input').remove();
         $('#pub_dis_trust_input').remove();
         $('#pub_dis_institutional_input').remove();
         $('#pub_dis_trust-foundation_input').remove();
         $('#pub_dis_government-society_input').remove();


      }else if(value == 'trust'){

        $('.pub_dis_user_file_input').append('<div id="pub_dis_trust_input"><label for="formFileSm" class="form-label">Private Trust Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_trust" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#pub_dis_proprietorship_input").remove();
        $("#pub_dis_user_file_input").remove();
        $("#pub_dis_private_input").remove();
        $('#pub_dis_partnership_input').remove();
        $('#pub_dis_limited_input').remove();
        $('#pub_dis_society_input').remove();
        $('#pub_dis_oneperson_input').remove();
        $('#pub_dis_publication_input').remove();
        $('#pub_dis_institutional_input').remove();
        $('#pub_dis_trust-foundation_input').remove();
        $('#pub_dis_government-society_input').remove();

     }else if(value == 'society'){

         $('.pub_dis_user_file_input').append('<div id="pub_dis_society_input"><label for="formFileSm" class="form-label">Private Society Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="private_society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $('#pub_dis_partnership_input').remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_oneperson_input').remove();
         $('#pub_dis_publication_input').remove();
         $('#pub_dis_trust_input').remove();
         $('#pub_dis_institutional_input').remove();
         $('#pub_dis_trust-foundation_input').remove();
         $('#pub_dis_government-society_input').remove();

      }else if(value == 'institutional'){

        $('.pub_dis_user_file_input').append('<div id="pub_dis_institutional_input"><label for="formFileSm" class="form-label">Government Institutional Publication Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel" name="institution" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#pub_dis_proprietorship_input").remove();
        $("#pub_dis_user_file_input").remove();
        $("#pub_dis_private_input").remove();
        $('#pub_dis_partnership_input').remove();
        $('#pub_dis_limited_input').remove();
        $('#pub_dis_society_input').remove();
        $('#pub_dis_oneperson_input').remove();
        $('#pub_dis_publication_input').remove();
        $('#pub_dis_trust_input').remove();
        $('#pub_dis_trust-foundation_input').remove();
        $('#pub_dis_government-society_input').remove();

     }else if(value == 'trust-foundation'){

        $('.pub_dis_user_file_input').append('<div id="pub_dis_trust-foundation_input"><label for="formFileSm" class="form-label">Government Trust/Foundation Publication Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file"  accept="application/pdf,application/vnd.ms-excel"name="trust_foundation" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate </label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list"/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#pub_dis_proprietorship_input").remove();
        $("#pub_dis_user_file_input").remove();
        $("#pub_dis_private_input").remove();
        $('#pub_dis_partnership_input').remove();
        $('#pub_dis_limited_input').remove();
        $('#pub_dis_society_input').remove();
        $('#pub_dis_oneperson_input').remove();
        $('#pub_dis_publication_input').remove();
        $('#pub_dis_trust_input').remove();
        $('#pub_dis_institutional_input').remove();
        $('#pub_dis_government-society_input').remove();

     }else if(value == 'government-society'){

        $('.pub_dis_user_file_input').append('<div id="pub_dis_government-society_input"><label for="formFileSm" class="form-label">Government Society Publication Registration Certificate  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="society" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate<span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="gst" class="form-control name_list" /><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" accept="application/pdf,application/vnd.ms-excel" name="pan_tan" class="form-control name_list" required/></div>');

        $("#pub_dis_proprietorship_input").remove();
        $("#pub_dis_user_file_input").remove();
        $("#pub_dis_private_input").remove();
        $('#pub_dis_partnership_input').remove();
        $('#pub_dis_limited_input').remove();
        $('#pub_dis_society_input').remove();
        $('#pub_dis_oneperson_input').remove();
        $('#pub_dis_publication_input').remove();
        $('#pub_dis_trust_input').remove();
        $('#pub_dis_institutional_input').remove();
        $('#pub_dis_trust-foundation_input').remove();

     }else{
         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $("#pub_dis_publication_input").remove();
         $("#pub_dis_oneperson_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();
         $('#pub_dis_trust_input').remove();
         $('#pub_dis_institutional_input').remove();
         $('#pub_dis_trust-foundation_input').remove();
         $('#pub_dis_government-society_input').remove();
      }
  });
// Book Publisher
function myFunction() {
   var checkBox = document.getElementById("publication_check");
   var pub_ft_nm = document.getElementById("pub_first_name");
   var pub_el_id = document.getElementById("pub_email_id");
   var pub_con_no = document.getElementById("contact_number");
   var pub_add = document.getElementById("pub_address");
   var pub_ct = document.getElementById("pub_city");
   var pub_district = document.getElementById("pub_district");
   var pub_st = document.getElementById("pub_state");
   var pub_pn_cd = document.getElementById("pub_pin_code");
   var pub_cnty = document.getElementById("pub_country");

   var con_ft_nm = document.getElementById("contact_person_name");
   var con_el_id = document.getElementById("con_email_id");
   var con_con_no = document.getElementById("con_contact_number");
   var con_add = document.getElementById("con_publication_address");
   var con_ct = document.getElementById("con_city");
   var con_district= document.getElementById("con_district");
   var con_st = document.getElementById("con_state");
   var con_pn_cd = document.getElementById("con_pin_code");
   var con_cnty = document.getElementById("con_country");
   if (checkBox.checked == true) {
      con_ft_nm.value = pub_ft_nm.value;
      con_el_id.value = pub_el_id.value;
      con_con_no.value = pub_con_no.value;
      con_add.value = pub_add.value;
      con_ct.value = pub_ct.value;
      con_district.value = pub_district.value;
      con_st.value = pub_st.value;
      con_pn_cd.value = pub_pn_cd.value;
      con_cnty.value = pub_cnty.value;

   } else {
      con_ft_nm.value = "";
      con_el_id.value = "";
      con_con_no.value = "";
      con_add.value = "";
      con_ct.value = "";
      con_district.value="";
      con_st.value = "";
      con_pn_cd.value = "";
      con_cnty.value = "";
   }
}

// Book Distributor

function dustrubutir_details() {
   var checkBox_dist = document.getElementById("distributor_check");
   var dist_ft_nm = document.getElementById("distn_first_name");
   var dist_el_id = document.getElementById("distn_email_id");
   var dist_con_no = document.getElementById("distn_contact_number");
   var dist_add = document.getElementById("distn_address");
   var dist_ct = document.getElementById("distn_city");
   var dist_district = document.getElementById("distn_district");
   var dist_st = document.getElementById("distn_state");
   var dist_pn_cd = document.getElementById("distn_pincode");
   var dist_cnty = document.getElementById("distn_country");

   var con_dist_ft_nm = document.getElementById("con_contact_person_name");
   var con_dist_el_id = document.getElementById("cont_per_email_id");
   var con_dist_con_no = document.getElementById("cont_per_contact_no");
   var con_dist_add = document.getElementById("cont_per_address");
   var con_dist_ct = document.getElementById("cont_per_city");
   var con_dist_district = document.getElementById("cont_per_district");
   var con_dist_st = document.getElementById("cont_per_state");
   var con_dist_pn_cd = document.getElementById("cont_per_pincode");
   var con_dist_cnty = document.getElementById("cont_per_country");
   if (checkBox_dist.checked == true) {
      con_dist_ft_nm.value = dist_ft_nm.value;
      con_dist_el_id.value = dist_el_id.value;
      con_dist_con_no.value = dist_con_no.value;
      con_dist_add.value = dist_add.value;
      con_dist_ct.value = dist_ct.value;
      con_dist_district.value = dist_district.value;
      con_dist_st.value = dist_st.value;
      con_dist_pn_cd.value = dist_pn_cd.value;
      con_dist_cnty.value = dist_cnty.value;

   } else {
      con_dist_ft_nm.value = "";
      con_dist_el_id.value = "";
      con_dist_con_no.value = "";
      con_dist_add.value = "";
      con_dist_ct.value = "";
      con_dist_district.value ="";
      con_dist_st.value = "";
      con_dist_pn_cd.value = "";
      con_dist_cnty.value = "";
   }
}

//  Book Publisher And Distributor

function publisher_and_distributor_details() {
   var checkBox_pub_dist = document.getElementById("book_publisher_and_distributor_check");
   var pub_dist_ft_nm = document.getElementById("publication_first_name");
   var pub_dist_el_id = document.getElementById("dis_publication_email_id");
   var pub_dist_con_no = document.getElementById("publication_contact_no");
   var pub_dist_add = document.getElementById("publication_address");
   var pub_dist_ct = document.getElementById("dst_publication_city_pub");
   var pub_dist_dst = document.getElementById("dst_publication_district");
   var pub_dist_st = document.getElementById("dst_publication_state");
   var pub_dist_pn_cd = document.getElementById("dst_publication_pincode");
   var pub_dist_cnty = document.getElementById("dist_publication_country");

   var con_pub_dist_ft_nm = document.getElementById("publication_contact_person_name");
   var con_pub_dist_el_id = document.getElementById("dist_publication_person_email_id");
   var con_pub_dist_con_no = document.getElementById("publication_contact_person_number");
   var con_pub_dist_add = document.getElementById("publication_contact_person_address");
   var con_pub_dist_ct = document.getElementById("publication_contact_person_city");
   var con_pub_dist_dst = document.getElementById("publication_contact_person_district");
   var con_pub_dist_st = document.getElementById("publication_contact_person_state");
   var con_pub_dist_pn_cd = document.getElementById("publication_contact_person_pincode");
   var con_pub_dist_cnty = document.getElementById("publication_contact_person_country");
   // alert(pub_dist_ct);
   if (checkBox_pub_dist.checked == true) {
      con_pub_dist_ft_nm.value = pub_dist_ft_nm.value;
      con_pub_dist_el_id.value = pub_dist_el_id.value;
      con_pub_dist_con_no.value = pub_dist_con_no.value;
      con_pub_dist_add.value = pub_dist_add.value;
      con_pub_dist_ct.value = pub_dist_ct.value;
      con_pub_dist_st.value = pub_dist_st.value;
      con_pub_dist_dst.value = pub_dist_dst.value;
      con_pub_dist_pn_cd.value = pub_dist_pn_cd.value;
      con_pub_dist_cnty.value = pub_dist_cnty.value;

   } else {
      con_pub_dist_ft_nm.value = "";
      con_pub_dist_el_id.value = "";
      con_pub_dist_con_no.value = "";
      con_pub_dist_add.value = "";
      con_pub_dist_ct.value = "";
      con_pub_dist_st.value = "";
      con_pub_dist_dst.value = "";
      con_pub_dist_pn_cd.value = "";
      con_pub_dist_cnty.value = "";
   }
}

// year
function numberOnly(id) {
   var element = document.getElementById(id);
   element.value = element.value.replace(/[^0-9]/gi, "");
}


