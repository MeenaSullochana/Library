$(document).ready(function () {

   //***************************************************** */
   //###################Book Publisher#######################
   //***************************************************** */
//Publisher-username check

var typingTimer;                
var doneTypingInterval = 1000;
$('#user_name').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#user_name').val) {
        typingTimer = setTimeout(function(){
             var v = $("#user_name").val();
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
                 }
                  
              }
          });


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
             var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

             if (reg.test(v) == false) 
             {
               var email = document.getElementById("emailval");
                  email.value = 2;
               $("#checkemail").html("Invalid Email!!");
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
                        }
                           
                     }
                  });
             }
        }, doneTypingInterval);
    }
 
});

//Password Check
   function checkPasswordMatch() {
      var password = $("#password").val();
      var confirmPassword = $("#password_confirmation").val();
  
      if (password != confirmPassword){
         console.log("asdfasdf");
      $("#divCheckPasswordMatch").html("Passwords does not match!");
      }
      else {
      $("#divCheckPasswordMatch").html("");
      }
  }
  
     $('#password_confirmation').keyup( function() {
      if( this.value.length < 8 ) return;
      checkPasswordMatch();
   });

   var i = 1;
  
   // specialized_category_check
   $('#submitBtnPublisher').on('click', function () {         
      $("#form_publisher").submit(function (e) {
   //password
      var password = $("#password").val();
      var confirmPassword = $("#password_confirmation").val(); 
      if(password != confirmPassword){
         alert("Password and confirm password doesn't match!!");
                  e.preventDefault();
      }
   //username
      var username = $("#usernameval").val();
      if(username == 0){
         alert("Username already taken!!");
                  e.preventDefault();
      }
   //email
      var email = $("#emailval").val();
      if(email == 0){
         alert("Email already taken!!");
                  e.preventDefault();
      }
      else if(email == 2){
         alert("Invalid Email!!");
                  e.preventDefault();
      }
 
     
         var ctg_book = $("[name='category_of_books_published[]']:checked").length; // count the checked rows
         var s_ctg_book = $("[name='specialized_category_books[]']:checked").length; // count the checked rows
         var p_lan_book = $("[name='primary_language_of_publication[]']:checked").length; // count the checked rows
         // var bapasi_id_name = $("[name='member_in_publisher_Association_depart_pub_book_pub[]']:checked").length; // count the checked rows
         if (ctg_book != 0) {
            if (s_ctg_book != 0) {
               if (p_lan_book != 0) {
                  
               } else {
                  alert("Please select any primary Category of Books Published");
                  e.preventDefault();
               }
            } else {
               alert("Please select any Spacial Category of Books Published");
               e.preventDefault();
            }
         } else {
            alert("Please select any Category of Books Published");
            e.preventDefault();

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
               '"><td><input type="text" name="publications_shope_book_title[]" placeholder=" titles*" class="form-control name_list" required/></td><td><input type="text" name="publications_shope_book_author[]" placeholder=" author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_best_ten">X</button></td></tr>');
      } else {
         $('#add').prop('disabled', true);
         alert('Allowed 10 input only ');
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

   /*************************************
   // Best 5 Translated Books
   ***************************************/

   $('#member_in_publishers_new_old').css('display', 'none');
   // $('#subsidiary_publications').css('display', 'none');

   var sra = 1;

   $('input[type=radio][name=member_in_publishers_yes_old]').on('change', function () {
      switch ($(this).val()) {
         case 'yes':
            $('#member_in_publishers_yes_old').prop('required', true);

            $('#member_in_publishers_new_old').css('display', 'block');
            // alert('sub_pub_name_os');
            $('#member_in_publishers_name_old').prop('required', true);
            $('#member_in_publishers_id_old').prop('required', true);
            $('#member_in_publishers_name_op_old').click(function () {
               sra++;
               $('#tbl_subsidiary_pub_name_bg_no_old').
                  append('<tr id="row' + sra +
                     '" class="removecl"><td><input type="text" name="member_in_publishers_name_old[]" placeholder="Publishers Association Name*" class="form-control name_list" required/></td><td><input type="text" name="member_in_publishers_id_old[]" placeholder="Publishers Association id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                     sra + '" class="btn btn-danger btn_remove_old">X</button></td></tr>');

            });
            break;
         case 'No':
            // alert($(this).val());
            sra=0;
            $('div#member_in_publishers_new_old').css('display','none')
            
            $('#member_in_publishers_name_old').prop('required', false);
            $('#member_in_publishers_name_old').prop('required', false);

            $('#member_in_publishers_yes_old').prop('required', false);
            

            $('.removecl').remove();
            // alert('off')
            break;
      }
   });


   // var pubtrsfivecounter = 0;
   // $('#practical').click(function () {
   //    if (pubtrsfivecounter < 5) {
   //       i++;
   //       pubtrsfivecounter++;
   //       $('#practical_mark').
   //          append('<tr id="row' + i +
   //             '"><td><input type="text" name="trs_book_title[]" placeholder="Enter title*" class="form-control name_list" required/></td><td><input type="text" name="trs_book_author[]" placeholder="Enter author*" class="form-control name_list" required/></td><td><input type="text" name="trs_book_lan_one[]" placeholder="Enter language from*" class="form-control name_list" required/></td><td><input type="text" name="trs_book_lan_two[]" placeholder="Enter language to*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
   //             i + '" class="btn btn-danger btn_remove_best_five">X</button></td></tr>');
   //    } else {
   //       $('#practical').prop('disabled', true);
   //       alert('Allowed 5 input only ');
   //    }
   // });

   $(document).on('click', '.btn_remove_best_five', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (pubtrsfivecounter <= 4) {
         $('#practical').prop('disabled', false);
      }
      pubtrsfivecounter--;
   });
   /*************************************
   // End Best 5 Translated Books
   ***************************************/

   /*************************************
   // Awarded Titles in The Publication
   ***************************************/
   var pubtrsfivecounter = 0;
   $('#awarded_titles').click(function () {
      if (pubtrsfivecounter < 5) {
         i++;
         pubtrsfivecounter++;
         $('#awarded_titles_name').
            append('<tr id="row' + i +
               '"><td><input type="text" name="trs_state_awarded[]" placeholder="Award Name*" class="form-control name_list" required/></td><td><input type="text" name="trs_central_awarded[]" placeholder=" Title *" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_best_five">X</button></td></tr>');
      } else {
         $('#awarded_titles').prop('disabled', true);
         alert('Allowed 5 input only ');
      }
   });

   $(document).on('click', '.btn_remove_best_five', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
      if (pubtrsfivecounter <= 4) {
         $('#awarded_titles').prop('disabled', false);
      }
      pubtrsfivecounter--;
   });
   /*************************************
   // End Awarded Titles in The Publication
   ***************************************/


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

            $('.subsidiary_pub_name').css('display', 'block');
            $('#sub_pub_add').click(function () {
               w++;
               $('#subsidiary_publishcation_no_tbl').
                  append('<tr id="row' + w +
                     '" class="removecl"><td><input type="text" name="name_of_the_subsidiary_publication[]" placeholder="Enter name of the subsidiary publication *" class="form-control name_list" required/></td><td><input type="text" name="name_of_the_subsidiary_publisher[]" placeholder="Enter name of the subsidiary publisher*" class="form-control name_list" required/></td><td><input type="number" id="content_of_the_subsidiary_publication" name="stack_holder_percentage[]" placeholder="Enter Stock Holder Percentage" class="form-control name_list" /></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_doc[]" placeholder="Enter Document"type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td><td><button type="button" name="remove" id="' +
                     w + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            $('#subsidiary_publications').prop('required', false);
            $('#name_of_the_subsidiary_publication').prop('required', false);
            $('#content_of_the_subsidiary_publication').prop('required', false);
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
         alert('Allowed 5 input only ');
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
   $('input[name="specialized_category_books[]"]').on('change', function () {
      $('input[name="' + this.name + '"]').not(this).prop('checked', false);
   });

   $('#ownership_doc').css('display','none');

   $('#pub_ownership').on('change',function(){
      var value = $(this).val();
      if(value == 'Proprietorship'){
         //  $('#ownership_doc').css('display','block');
          $('.user_file_input').append('<div id="proprietorship_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="udayam" placeholder="Enter Udayam*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" placeholder="Enter GST*" class="form-control name_list" required/></div>');

          $("#partnership_input").remove();
          $("#private_input").remove();
          $("#publication_input").remove();
          $("#oneperson_input").remove();
          $('#limited_input').remove();
          $('#society_input').remove();
      }
      else if(value == 'Partnership'){
         // $('#ownership_doc').css('display','block');
         $('.user_file_input').append('<div id="partnership_input"><label for="formFileSm" class="form-label">Certificate of Registration<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="cgReg" class="form-control name_list" required/><label for="formFileSm" class="form-label">Partnership Deed - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#private_input").remove();
         $("#publication_input").remove();
         $("#oneperson_input").remove();
         $('#limited_input').remove();
         $('#society_input').remove();
     }
     else if(value == 'Private'){
      $('.user_file_input').append('<div id="private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="moa" class="form-control name_list" required/><label for="formFileSm" class="form-label">AOA  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="aoa" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

      $("#proprietorship_input").remove();
      $("#partnership_input").remove();
      $("#publication_input").remove();
      $("#oneperson_input").remove();
      $('#limited_input').remove();
      $('#society_input').remove();

     }
      else if(value == 'Publication'){
         //  $('#ownership_doc').css('display','block');
         $('.user_file_input').append('<div id="publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" placeholder="Enter Award Author*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" placeholder="Enter Award Author*" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" placeholder="Enter Award Author*" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $("#oneperson_input").remove();
         $('#limited_input').remove();
         $('#society_input').remove();

      }else if(value == 'oneperson'){
         //  $('#ownership_doc').css('display','block');
         $('.user_file_input').append('<div id="oneperson_input"><label for="formFileSm" class="form-label">Certificate of Incorporation - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $('#limited_input').remove();
         $('#partnership_input').remove();
         $('#proprietorship_input').remove();
         $('#publication_input').remove();


      }else if(value == 'limited'){

         $('.user_file_input').append('<div id="limited_input"><label for="formFileSm" class="form-label">LLP Agreement - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Certificate of Incorporation- <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $('#partnership_input').remove();
         $('#society_input').remove();
         $('#publication_input').remove();
         $('#oneperson_input').remove();
         


      }else if(value == 'society'){

         $('.user_file_input').append('<div id="society_input"><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $('#partnership_input').remove();
         $('#limited_input').remove();
         $('#oneperson_input').remove();
         $('#publication_input').remove();

      }else{
         $("#proprietorship_input").remove();
         $("#user_file_input").remove();
         $("#private_input").remove();
         $("#publication_input").remove();
         $("#oneperson_input").remove();
         $('#limited_input').remove();
         $('#society_input').remove();
      }
  });



   //***************************************************** */
   //###################End Book Publisher#######################
   //***************************************************** */

   //**********************************************************/
   //################### Book Distributor #######################
   //**********************************************************/

   //Distributor-username check

var typingTimer;                
var doneTypingInterval = 1000;
$('#dis_user_name').keyup(function(){
    clearTimeout(typingTimer);
    if ($('#dis_user_name').val) {
        typingTimer = setTimeout(function(){
             var v = $("#dis_user_name").val();
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
                 }
                  
              }
          });


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
             var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

             if (reg.test(v) == false) 
             {
               var email = document.getElementById("disemailval");
                  email.value = 2;
               $("#discheckemail").html("Invalid Email!!");
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
                        }
                           
                     }
                  });
             }
        }, doneTypingInterval);
    }
 
});

//Password Check
   function discheckPasswordMatch() {
      var password = $("#dis_password").val();
      var confirmPassword = $("#dis_conform_password").val();
  
      if (password != confirmPassword){
      $("#disdivCheckPasswordMatch").html("Passwords does not match!");
      }
      else {
      $("#disdivCheckPasswordMatch").html("");
      }
  }
  
     $('#dis_conform_password').keyup( function() {
      if( this.value.length < 8 ) return;
      discheckPasswordMatch();
   });

   $('#submitbtn_book_distributor').on('click', function () {
      $("#form_distriputor").submit(function (e) {
           //password
      var password = $("#dis_password").val();
      var confirmPassword = $("#dis_conform_password").val(); 
      if(password != confirmPassword){
         alert("Password and confirm password doesn't match!!");
                  e.preventDefault();
      }
   //username
      var username = $("#disusernameval").val();
      if(username == 0){
         alert("Username already taken!!");
                  e.preventDefault();
      }
   //email
      var email = $("#disemailval").val();
      if(email == 0){
         alert("Email already taken!!");
                  e.preventDefault();
      }
      else if(email == 2){
         alert("Invalid Email!!");
                  e.preventDefault();
      }
         var ctg_book = $("[name='language_of_books_you_dealing_with[]']:checked").length; // count the checked rows
         if (ctg_book != 0) {

         } else {
            alert("Language Of Books You Dealing With");
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
               '"><td><input type="text" name="publisher_name[]" placeholder="Enter publisher name*" class="form-control name_list" /></td><td><input type="text" name="publisher_place[]" placeholder="Enter place*" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
               m + '" class="btn btn-danger btn_remove_dist">X</button></td></tr>');
      } else {
         $('#distribution_book').prop('disabled', true);
         alert('Only 10 input only Allowed');
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
          $('.dis_user_file_input').append('<div id="dis_proprietorship_input"><label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="udayam" placeholder="Enter Udayam*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" placeholder="Enter GST*" class="form-control name_list" required/></div>');

          $("#dis_partnership_input").remove();
          $("#dis_private_input").remove();
          $("#dis_publication_input").remove();
          $("#dis_oneperson_input").remove();
          $('#dis_limited_input').remove();
          $('#dis_society_input').remove();
      }
      else if(value == 'Partnership'){
         // $('#ownership_doc').css('display','block');
         $('.dis_user_file_input').append('<div id="dis_partnership_input"><label for="formFileSm" class="form-label">Certificate of Registration<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="cgReg" class="form-control name_list" required/><label for="formFileSm" class="form-label">Partnership Deed - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_private_input").remove();
         $("#dis_publication_input").remove();
         $("#dis_oneperson_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();

     }
     else if(value == 'Private'){
      $('.dis_user_file_input').append('<div id="dis_private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="moa" class="form-control name_list" required/><label for="formFileSm" class="form-label">AOA  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="aoa" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

      $("#dis_proprietorship_input").remove();
      $("#dis_partnership_input").remove();
      $("#dis_publication_input").remove();
      $("#dis_oneperson_input").remove();
      $('#dis_limited_input').remove();
      $('#dis_society_input').remove();

     }
      else if(value == 'Publication'){
         //  $('#ownership_doc').css('display','block');
         $('.dis_user_file_input').append('<div id="dis_publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $("#dis_oneperson_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();


      }else if(value == 'oneperson'){
         //  $('#ownership_doc').css('display','block');
         $('.dis_user_file_input').append('<div id="dis_oneperson_input"><label for="formFileSm" class="form-label">Certificate of Incorporation - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_partnership_input').remove();
         $('#dis_proprietorship_input').remove();

      }else if(value == 'limited'){

         $('.dis_user_file_input').append('<div id="dis_limited_input"><label for="formFileSm" class="form-label">LLP Agreement - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Certificate of Incorporation- <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $('#dis_partnership_input').remove();
         $('#dis_society_input').remove();
         $('#dis_publication_input').remove();
         $('#dis_oneperson_input').remove();


      }else if(value == 'society'){

         $('.dis_user_file_input').append('<div id="dis_society_input"><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $('#dis_partnership_input').remove();
         $('#dis_limited_input').remove();
         $('#dis_oneperson_input').remove();
         $('#dis_publication_input').remove();

      }else{
         $("#dis_proprietorship_input").remove();
         $("#dis_user_file_input").remove();
         $("#dis_private_input").remove();
         $("#dis_publication_input").remove();
         $("#dis_oneperson_input").remove();
         $('#dis_limited_input').remove();
         $('#dis_society_input').remove();
      }
  });


   //***************************************************** */
   //################### End Book Distributor#######################
   //***************************************************** */


   //***************************************************** */
   //###################     Book Publisher And Distributor #######################
   //***************************************************** */

   //Distributor-username check

   var typingTimer;                
   var doneTypingInterval = 1000;
   $('#pub_dis_user_name').keyup(function(){
       clearTimeout(typingTimer);
       if ($('#pub_dis_user_name').val) {
           typingTimer = setTimeout(function(){
                var v = $("#pub_dis_user_name").val();
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
                    }
                     
                 }
             });
   
   
           }, doneTypingInterval);
       }
    
   });
   
   
   
   //email check
   var typingTimer;                
   var doneTypingInterval = 1000;
   $('#publication_email_id').keyup(function(){
       clearTimeout(typingTimer);
       if ($('#publication_email_id').val) {
           typingTimer = setTimeout(function(){
                var v = $("#publication_email_id").val();
                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
   
                if (reg.test(v) == false) 
                {
                  var email = document.getElementById("bothemailval");
                     email.value = 2;
                  $("#bothcheckemail").html("Invalid Email!!");
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
                           }
                              
                        }
                     });
                }
           }, doneTypingInterval);
       }
    
   });
   
   //Password Check
      function bothcheckPasswordMatch() {
         var password = $("#pub_dis_password").val();
         var confirmPassword = $("#pub_dis_conform_password").val();
     
         if (password != confirmPassword){
         $("#bothdivCheckPasswordMatch").html("Passwords does not match!");
         }
         else {
         $("#bothdivCheckPasswordMatch").html("");
         }
     }
     
        $('#pub_dis_conform_password').keyup( function() {
         if( this.value.length < 8 ) return;
         bothcheckPasswordMatch();
      });
  
   $('#reg_publisher_and_distributor').on('click', function () {
      $("#reg_publisher_and_distributor_form").submit(function (e) {
         var pd_ctg_book = $("[name='pub_dis_category_of_books_published[]']:checked").length; // count the checked rows
         var pd_s_ctg_book = $("[name='pub_dis_specialized_category_books[]']:checked").length; // count the checked rows
         var pd_p_lan_book = $("[name='pub_dis_primary_language_of_publication[]']:checked").length; // count the checked rows
         // var bapasi_id_name_other = $("[name='member_in_publisher_Association_depart_pub_dist_ckbox[]']:checked").length; // count the checked rows
         if (pd_ctg_book != 0) {
            if (pd_s_ctg_book != 0) {
               if (pd_p_lan_book != 0) {

               } else {
                  alert("Please select any One primary Category of Books Published");
                  e.preventDefault();
               }
            } else {
               alert("Please select any One Spacial Category of Books Published");
               e.preventDefault();
            }
         } else {
            alert("Please select any One Category of Books Published");
            e.preventDefault();

         }
         // if (bapasi_id_name_other != 0) {
         // } else {
         //    alert("Please select member in publisher's association");
         //    e.preventDefault();
         // }
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

            $('.subsidiary_pub_name_new').css('display', 'block');
            $('#sub_dis_add_newdis').click(function () {
               w++;
               $('#subsidiary_subsidiary_distributor_no_tbl').
                  append('<tr id="row' + H +
                     '" class="removecl"><td><input type="text" name="substidiary_name_account_transaction_content_distributor[]" placeholder="Enter name of the subsidiary distributor*" class="form-control name_list" required/></td><td><input type="text" name="substidiary_name_account_transaction_content_distribution[]" placeholder="Enter name of the subsidiary distribution*" class="form-control name_list" required/></td></td> <td><input type="number" id="content_of_the_subsidiary_distributor" name="subsidiary_name_distributor_content[]" placeholder="Enter Stock Holder Percentage" class="form-control name_list" /></td> <td> <input class="form-control" id="file_of_the_subsidiary_distributor" name="subsidiary_name_distributor_file[]" placeholder="Enter Document"type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td><td><button type="button" name="remove" id="' +
                     H + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            $('#subsidiary_distributor_dis').prop('required', false);
            $('#name_of_the_subsidiary_distributor').prop('required', false);
            $('#content_of_the_subsidiary_account_transaction').prop('required', false);
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
               '"><td><input type="text" name="publisher_name[]" placeholder="Enter title*" class="form-control name_list" required/></td><td><input type="text" name="publisher_place[]" placeholder="Enter author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               pdv + '" class="btn btn-danger btn_remove_dis_pub_de">X</button></td></tr>');
      } else {
         $('#publisher_distribution_add').prop('disabled', true);
         alert('Only 10 input only Allowed');

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
                  '"><td><input type="text" name="publication_title[]" placeholder="Enter title*" class="form-control name_list" required/></td><td><input type="text" name="publication_author[]" placeholder="Enter author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                  i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
         }
      } else {
         alert('Please Enter 10 Blow Number');
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
               '"><td><input type="text" name="publication_title[]" placeholder="Enter title*" class="form-control name_list" required/></td><td><input type="text" name="publication_author[]" placeholder="Enter author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_dis_pub_de_ten">X</button></td></tr>');
      } else {
         $('#publisher_distribution_addb10').prop('disabled', true);
         alert('Only 10 input only Allowed');

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
   // End Best 10 Titles In Your Publications
   ********************************************/
   var s = 0;
   var r = 0;

   /*******************************************
   // Best 10 Titles In Your Publications
   ********************************************/
   var trs_pub_sit = 0;
   $('#translated_pub_dis').click(function () {
      i++;
      trs_pub_sit++;
      if (trs_pub_sit < 5) {
         $('#trans_book_pub_dis').
            append('<tr id="row' + i +
               '"><td><input type="text" name="trans_title[]" placeholder="Enter title*" class="form-control name_list" required/></td><td><input type="text" name="trans_author[]" placeholder="Enter author*" class="form-control name_list" required/></td><td><input type="text" name="trans_from[]" placeholder="Enter language from*" class="form-control name_list" required/></td><td><input type="text" name="trans_to[]" placeholder="Enter language to*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               i + '" class="btn btn-danger btn_remove_pub_dst_five">X</button></td></tr>');
      } else {
         $('#translated_pub_dis').prop('disabled', true);
         alert('Allowed 5 input only ');

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
                     '" class="removecl"><td><input type="text" name="member_in_publishers_name[]" placeholder="Publishers Association Name*" class="form-control name_list" required/></td><td><input type="text" name="member_in_publishers_id[]" placeholder="Publishers Association id*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
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
            $('#pub_dis_subsidiary_publication_name').prop('required', true);
            $('#pub_dis_subsidiary_publication_conten').prop('required', true);
            $('#sub_pub_name_op').click(function () {
               g++;
               $('#tbl_subsidiary_publishcation_no').
                  append('<tr id="row' + g +
                     '" class="removecl"><td><input type="text" name="subsidiary_no_publications_content[]" placeholder="Enter name of the subsidiary book publisher and distributor*" class="form-control name_list" required/></td><td><input type="text" name="subsidiary_name_publications_content[]" placeholder="Enter name of the subsidiary book publication and distribution*" class="form-control name_list" required/></td><td><input type="number" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter Stock Holder Percentage" class="form-control name_list" /></td> <td> <input class="form-control" id="content_of_the_subsidiary_publication" name="subsidiary_name_publications_content[]" placeholder="Enter Document"type="file" multiple required> <span class="text-danger"><small>Doc, PDF other format</small></span> </td><td><button type="button" name="remove" id="' +
                     g + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            $('#pub_dis_subsidiary_publication_name').prop('required', false);
            $('#pub_dis_subsidiary_publication_conten').prop('required', false);

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
      alert('Allowed 5 input only');
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
$('input[name="pub_dis_specialized_category_books[]"]').on('change', function () {
   $('input[name="' + this.name + '"]').not(this).prop('checked', false);
});

  /*************************************
   // Awarded Titles in The Publication
   ***************************************/
   var pubtrsfivecounter = 0;
   $('#awarded_titles_dis_pub').click(function () {
      // alert("fffff");
      if (pubtrsfivecounter < 5) {
         pubtrsfivecounter++;
         $('#awarded_titles_name_dis_pub').
            append('<tr id="row' + pubtrsfivecounter +
               '"><td><input type="text" name="trs_state_awarded_dis_pub[]" placeholder=" Award Author*" class="form-control name_list" required/></td><td><input type="text" name="trs_central_awarded_dis_pub[]" placeholder=" Award Title *" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
               pubtrsfivecounter + '" class="btn btn-danger btn_remove_best_five_dis_pub">X</button></td></tr>');
      } else {
         $('#awarded_titles_dis_pub').prop('disabled', true);
         alert('Allowed 5 input only ');
      }
   });

   $(document).on('click', '.btn_remove_best_five_dis_pub', function () {
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
          $('.pub_dis_user_file_input').append('<div id="pub_dis_proprietorship_input"<label for="formFileSm" class="form-label">Udyam Certificate<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="udayam" placeholder="Enter Udayam*" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" placeholder="Enter GST*" class="form-control name_list" required/></div>');

          $("#pub_dis_partnership_input").remove();
          $("#pub_dis_private_input").remove();
          $("#pub_dis_publication_input").remove();
          $("#pub_dis_oneperson_input").remove();
          $('#pub_dis_limited_input').remove();
          $('#pub_dis_society_input').remove();
      }
      else if(value == 'Partnership'){
         // $('#ownership_doc').css('display','block');
         $('.pub_dis_user_file_input').append('<div id="pub_dis_partnership_input"><label for="formFileSm" class="form-label">Certificate of Registration<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="cgReg" class="form-control name_list" required/><label for="formFileSm" class="form-label">Partnership Deed - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_deed" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_private_input").remove();
         $("#pub_dis_publication_input").remove();
         $("#pub_dis_oneperson_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();

     }
     else if(value == 'Private'){
      $('.pub_dis_user_file_input').append('<div id="pub_dis_private_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">MOA <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="moa" class="form-control name_list" required/><label for="formFileSm" class="form-label">AOA  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="aoa"   class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

      $("#pub_dis_proprietorship_input").remove();
      $("#pub_dis_partnership_input").remove();
      $("#pub_dis_publication_input").remove();
      $("#pub_dis_oneperson_input").remove();
      $('#pub_dis_limited_input').remove();
      $('#pub_dis_society_input').remove();

     }
      else if(value == 'Publication'){
         //  $('#ownership_doc').css('display','block');
         $('.pub_dis_user_file_input').append('<div id="pub_dis_publication_input"><label for="formFileSm" class="form-label">Certificate of incorporation <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN  <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $("#pub_dis_oneperson_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();


      }else if(value == 'oneperson'){
         //  $('#ownership_doc').css('display','block');
         $('.pub_dis_user_file_input').append('<div id="pub_dis_oneperson_input"><label for="formFileSm" class="form-label">Certificate of Incorporation - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_partnership_input').remove();
         $('#pub_dis_proprietorship_input').remove();

      }else if(value == 'limited'){

         $('.pub_dis_user_file_input').append('<div id="pub_dis_limited_input"><label for="formFileSm" class="form-label">LLP Agreement - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="llp_agre" class="form-control name_list" required/><label for="formFileSm" class="form-label">Certificate of Incorporation- <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="certification_incon" class="form-control name_list" required/><label for="formFileSm" class="form-label">GST Certificate <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN / TAN - <span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $('#pub_dis_partnership_input').remove();
         $('#pub_dis_society_input').remove();
         $('#pub_dis_publication_input').remove();
         $('#pub_dis_oneperson_input').remove();


      }else if(value == 'society'){

         $('.pub_dis_user_file_input').append('<div id="pub_dis_society_input"><label for="formFileSm" class="form-label">GST Certificate - <span class="mt-056">தொடர்புடைய ஆவணங்கள் விவரங்கள்</span><span class="text-danger maditory">*</span></label><input type="file" name="gst" class="form-control name_list" required/><label for="formFileSm" class="form-label">PAN<span class="mt-056"></span><span class="text-danger maditory">*</span></label><input type="file" name="pan_tan" class="form-control name_list" required/></div>');

         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $('#pub_dis_partnership_input').remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_oneperson_input').remove();
         $('#pub_dis_publication_input').remove();

      }else{
         $("#pub_dis_proprietorship_input").remove();
         $("#pub_dis_user_file_input").remove();
         $("#pub_dis_private_input").remove();
         $("#pub_dis_publication_input").remove();
         $("#pub_dis_oneperson_input").remove();
         $('#pub_dis_limited_input').remove();
         $('#pub_dis_society_input').remove();
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