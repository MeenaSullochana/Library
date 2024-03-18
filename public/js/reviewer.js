$(document).ready(function () {

   // *******************  Best 10 titles of your publication   *********************** //

   var i = 1;
   // alert('good');
   $('#review_add').click(function () {
      i++;
      $('#review_dynamic_field').
         append('<tr id="row' + i +
            '"><td><input type="text" name="skill[]" placeholder="Enter title" class="form-control name_list" /></td><td><input type="text" name="skill[]" placeholder="Enter authors" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
   });


      // *******************  5 best translated titles   *********************** //

   $('#review_pract').click(function () {
      i++;
      $('#tbl_subsidiary_publ_no_review').
         append('<tr id="row' + i +
            '"><td><input type="text" name="skill[]" placeholder="Enter title" class="form-control name_list" /></td><td><input type="text" name="skill[]" placeholder="Enter authors" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
            i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
   });
   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });


   // *******************  primary language   *********************** //


   $('.other_indian_lang_review').css('display', 'none');
   $('.other_foreign_lang_review').css('display', 'none');


   $("#other_indian_lag_review").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_indian_lang_review').css('display', 'block');
         $('#other_indian_lang_review').prop('required', true);
      } else if (checkValue == false) {
         $('.other_indian_lang_review').css('display', 'none');
         $('#other_indian_lang_review').prop('required', false);
      }
   });

   $("#other_forign_lag_review").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.other_foreign_lang_review').css('display', 'block');
         $('#other_foreign_lang_review').prop('required', true);
      } else if (checkValue == false) {
         $('.other_foreign_lang_review').css('display', 'none');
         $('#other_foreign_lang_review').prop('required', false);
      }
   });

      // singal select lag
      $('input[name="primary_language_of_publication_review[]"]').on('change', function() {
         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
     });



   // *******************  subsidiary   *********************** //


   $('#tbl_sub_pub_name_os_review').css('display', 'none');

   var z = 1;

   $('input[type=radio][name=sub_pub_yes_review]').on('change', function () {
      switch ($(this).val()) {
         case 'yes':

            $('#tbl_sub_pub_name_os_review').css('display', 'block');
            // alert('sub_pub_name_os');
            $('#pub_dis_sub_publ_name_review').prop('required', true);
            $('#pub_dis_sub_publ_review').prop('required', true);
            $('#sub_pub_name_op_review').click(function () {
               z++;
               $('#tbl_subsidiary_publ_new_review').
                  append('<tr id="row' + z +
                     '" class="removecl"><td><input type="text" name="subsidiary_name_publ_content_review[]" placeholder="Enter if yes, enter the total number of subsidiary publications*" class="form-control name_list" required/></td><td><input type="text" name="subsidiary_name_publ_content_review[]" placeholder="Enter the names of it*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                     z + '" class="btn btn-danger btn_remove">X</button></td></tr>');

            });
            break;
         case 'No':
            $('#pub_dis_sub_publ_name_review').prop('required', false);
            $('#pub_dis_sub_publ_review').prop('required', false);

            $('#sub_publ_no_yes_review').prop('required', false);
            $('.subsidiary_pub_name_bg_review').css('display', 'none');

            $('.removecl').remove();
            // alert('off')
            break;
      }
   });


   $(document).on('click', '.btn_remove', function () {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
   });



// *******************  Subject of the Book   *********************** //



   $('.rev_sub_book_other_option').css('display', 'none');

   $(".sub_book_rev_other").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_sub_book_other_option').css('display', 'block');
         $('#rev_sub_book_other_no').prop('required', true);
      }
   });
   $(".sub_book_rev_main").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_sub_book_other_option').css('display', 'none');
      }
   });

// *******************   Paper quality  *********************** //


   $('.rev_paper_quality_other_option').css('display', 'none');

   $("#rev_paper_qual_other_option").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_paper_quality_other_option').css('display', 'block');
         $('#rev_paper_quality_other_op').prop('required', true);
      }
   });
   $("#rev_paper_qual_other_option11").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_paper_quality_other_option').css('display', 'none');
      }
   });
   $("#rev_paper_qual_other_option12").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_paper_quality_other_option').css('display', 'none');
      }
   });
   $("#rev_paper_qual_other_option13").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_paper_quality_other_option').css('display', 'none');
      }
   });


      // *******************  Language of the book   *********************** //


      $('.other_indian_lang_review_bk').css('display', 'none');
      $('.other_foreign_lang_review_bk').css('display', 'none');
   
   
      $("#other_indian_lag_review_bk").click(function () {
         var checkValue = $(this).is(":checked");
         // alert(checkValue);
         if (checkValue == true) {
            $('.other_indian_lang_review_bk').css('display', 'block');
            $('#other_indian_lang_review_bk').prop('required', true);
         } else if (checkValue == false) {
            $('.other_indian_lang_review_bk').css('display', 'none');
            $('#other_indian_lang_review_bk').prop('required', false);
         }
      });
   
      $("#other_forign_lag_review_bk").click(function () {
         var checkValue = $(this).is(":checked");
         // alert(checkValue);
         if (checkValue == true) {
            $('.other_foreign_lang_review_bk').css('display', 'block');
            $('#other_foreign_lang_review_bk').prop('required', true);
         } else if (checkValue == false) {
            $('.other_foreign_lang_review_bk').css('display', 'none');
            $('#other_foreign_lang_review_bk').prop('required', false);
         }
      });

      $("#other_forign_lag_review_bk").click(function () {
         var checkValue = $(this).is(":checked");
         // alert(checkValue);
         if (checkValue == true) {
            $('.other_foreign_lang_review_bk').css('display', 'block');
            $('#other_foreign_lang_review_bk').prop('required', true);
         } else if (checkValue == false) {
            $('.other_foreign_lang_review_bk').css('display', 'none');
            $('#other_foreign_lang_review_bk').prop('required', false);
         }
      });


      // singal select lag
      $('input[name="language_of_publication_review_book[]"]').on('change', function() {
         $('input[name="' + this.name + '"]').not(this).prop('checked', false);
     });

// *******************   Interesting / Important pages of the book *********************** //

   $('.rev_sub_book_yes1_option').css('display', 'none');

   $(".sub_interesting_rev_new").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_sub_book_yes1_option').css('display', 'block');
         $('#sub_book_rev').prop('required', true);
      }
   });
   $(".sub_interesting_ino").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.rev_sub_book_yes1_option').css('display', 'none');
      }
   });


   // *******************   translated to any Indian or Foreign language  *********************** //


   $('.trans_indian_foreign_rev_lag_yes').css('display', 'none');

   $(".trans_indian_foreign_rev").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.trans_indian_foreign_rev_lag_yes').css('display', 'block');
         $('#trans_indian_foreign_rev_lag_op').prop('required', true);
      }
   });
   $(".trans_indian_foreign_rev_no").click(function () {
      var checkValue = $(this).is(":checked");
      // alert(checkValue);
      if (checkValue == true) {
         $('.trans_indian_foreign_rev_lag_yes').css('display', 'none');
      }
   });
   


  // *******************      Is this a translated book    *********************** //


  $('.this_translated_book_no').css('display', 'none');

  $(".this_translated_book").click(function () {
     var checkValue = $(this).is(":checked");
     // alert(checkValue);
     if (checkValue == true) {
        $('.this_translated_book_no').css('display', 'block');
        $('#this_translated_book_no_book').prop('required', true);
     }
  });
  $(".trans_indian_foreign_rev_no").click(function () {
     var checkValue = $(this).is(":checked");
     // alert(checkValue);
     if (checkValue == true) {
        $('.this_translated_book_no').css('display', 'none');
     }
  });

});

