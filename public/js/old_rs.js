$(document).ready(function() {

    //***************************************************** */
    //###################Book Publisher#######################
    //***************************************************** */
        var i = 1;
        // alert('good');
        // specialized_category_check
        $('#title_book_ten').change(function() {
            const numInput = $(this).val()
            if(numInput<10){
                for(m=0;m<numInput;m++){
                    i++;
                    $('#dynamic_field').
                append('<tr id="row' + i +
                    '"><td><input type="text" name="publications_shope_book_title[]" placeholder="Enter titles*" class="form-control name_list" required/></td><td><input type="text" name="publications_shope_book_author[]" placeholder="Enter Author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                }
            }else{
                alert('Please Enter 10 Blow Number');
            }
           
        });
        $('#trs_book').change(function() {
            const numInput = $(this).val()
                if(numInput<10){
                for(j=0;j<numInput;j++){
                    i++;
                    $('#practical_mark').
                    append('<tr id="row' + i +
                        '"><td><input type="text" name="trs_book_title[]" placeholder="Enter Title*" class="form-control name_list" required/></td><td><input type="text" name="trs_book_author[]" placeholder="Enter Author*" class="form-control name_list" required/></td><td><input type="text" name="trs_book_lan_one[]" placeholder="Enter From*" class="form-control name_list" required/></td><td><input type="text" name="trs_book_lan_two[]" placeholder="Enter To*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                        i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                }
            }else{
                alert('Please Enter 10 Blow Number');
            }
        });
        
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    
        $('.specialized_category_other').css('display','none');
        $('.other_indian_lang').css('display','none');
        $('.other_foreign_lang').css('display','none');
        $('.subsidiaryEnable').css('display','none');
    
        $("#specialized_category_check").click(function() {
            var checkValue = $(this).is(":checked");
            // alert(checkValue);
            if(checkValue == true) {
                $('.specialized_category_other').css('display','block');
                $('#specialized_category_books_no').prop('required', true);
            } else if(checkValue == false) {
                $('.specialized_category_other').css('display','none');
                $('#specialized_category_books_no').prop('required', false);
            }
        });
    
        $("#other_indian_lag").click(function() {
            var checkValue = $(this).is(":checked");
            // alert(checkValue);
            if(checkValue == true) {
                $('.other_indian_lang').css('display','block');
                $('#other_indian_lang').prop('required', true);
            } else if(checkValue == false) {
                $('.other_indian_lang').css('display','none');
                $('#other_indian_lang').prop('required', false);
            }
        });
    
        $("#other_forign_lag").click(function() {
            var checkValue = $(this).is(":checked");
            // alert(checkValue);
            if(checkValue == true) {
                $('.other_foreign_lang').css('display','block');
                $('#other_foreign_lang').prop('required', true);
            } else if(checkValue == false) {
                $('.other_foreign_lang').css('display','none');
                $('#other_foreign_lang').prop('required', false);
            }
        });
    
        $('input[type=radio][name=subsidiary_publications]').on('change', function() {
            switch ($(this).val()) {
                case 'yes':
                    $('#subsidiary').prop('required', true);
                    $('.subsidiaryEnable').css('display','block');
                break;
                case 'No':
                    $('#subsidiary').prop('required', false);
                    $('.subsidiaryEnable').css('display','none');
                break;
            }
            });
    
        //***************************************************** */
        //###################End Book Publisher#######################
        //***************************************************** */
    
        //***************************************************** */
        //################### Book Distributor#######################
        //***************************************************** */
    
        $('#pub_title').change(function() {
            const numInput = $(this).val()
            if(numInput<10){
                i++;
                for(m=0;m<numInput;m++){
                    $('#distribution').
                    append('<tr id="row' + i +
                        '"><td><input type="text" name="publisher_name[]" placeholder="Enter Publisher Name" class="form-control name_list" /></td><td><input type="text" name="publisher_place[]" placeholder="Enter Place" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                        i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                }
            }else{
                alert('Please Enter 10 Blow Number');
            }
           
        });
    
        // Language
    
        $('.other_indian_lang2').css('display','none');
        $('.other_foreign_lang2').css('display','none');
    
        $("#other_indian_lag2").click(function() {
            var checkValue = $(this).is(":checked");
            // alert(checkValue);
            if(checkValue == true) {
                $('.other_indian_lang2').css('display','block');
                $('#other_indian_lang2').prop('required', true);
            } else if(checkValue == false) {
                $('.other_indian_lang2').css('display','none');
                $('#other_indian_lang2').prop('required', false);
            }
        });
    
        $("#other_forign_lag2").click(function() {
            var checkValue = $(this).is(":checked");
            // alert(checkValue);
            if(checkValue == true) {
                $('.other_foreign_lang2').css('display','block');
                $('#other_foreign_lang2').prop('required', true);
            } else if(checkValue == false) {
                $('.other_foreign_lang2').css('display','none');
                $('#other_foreign_lang2').prop('required', false);
            }
        });
    
        //***************************************************** */
        //################### End Book Distributor#######################
        //***************************************************** */
    
        //***************************************************** */
        //###################     Book Publisher And Distributor #######################
        //***************************************************** */
    
        var s=0;
        var r=0;
        
            $('#title_book_ten_pub').change(function() {
                // alert('GOOD');
                const numInput = $(this).val()
                if(numInput<10){
                    for(m=0;m<numInput;m++){
                        s++;
                        $('#public_titles').
                    append('<tr id="row' + s +
                        '"><td><input type="text" name="publication_title[]" placeholder="Enter titles*" class="form-control name_list" required/></td><td><input type="text" name="publication_author[]" placeholder="Enter Author*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                        s + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    }
                }else{
                    alert('Please Enter 10 Blow Number');
                }
               
            });
            $('#translated_book_title').change(function() {
                const numInput = $(this).val()
                    if(numInput<10){
                    
                    for(j=0;j<numInput;j++){
                        r++;
                        $('#trans_book_title').
                        append('<tr id="row' + r +
                            '"><td><input type="text" name="trans_title[]" placeholder="Enter Title*" class="form-control name_list" required/></td><td><input type="text" name="trans_author[]" placeholder="Enter Author*" class="form-control name_list" required/></td><td><input type="text" name="trans_from[]" placeholder="Enter From*" class="form-control name_list" required/></td><td><input type="text" name="trans_to[]" placeholder="Enter To*" class="form-control name_list" required/></td><td><button type="button" name="remove" id="' +
                            r + '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    }
                }else{
                    alert('Please Enter 10 Blow Number');
                }
            });
            
            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });
        
            $('.specialized_category_other2').css('display','none');
            $('.other_indian_lang3').css('display','none');
            $('.other_foreign_lang3').css('display','none');
            $('.subsidiaryEnable2').css('display','none');
        
            $("#specialized_category_check2").click(function() {
                var checkValue = $(this).is(":checked");
                // alert(checkValue);
                if(checkValue == true) {
                    $('.specialized_category_other2').css('display','block');
                    $('#specialized_category_books_no2').prop('required', true);
                } else if(checkValue == false) {
                    $('.specialized_category_other2').css('display','none');
                    $('#specialized_category_books_no2').prop('required', false);
                }
            });
        
            $("#other_indian_lag3").click(function() {
                var checkValue = $(this).is(":checked");
                // alert(checkValue);
                if(checkValue == true) {
                    $('.other_indian_lang3').css('display','block');
                    $('#other_indian_lag3').prop('required', true);
                } else if(checkValue == false) {
                    $('.other_indian_lang3').css('display','none');
                    $('#other_indian_lag3').prop('required', false);
                }
            });
        
            $("#other_forign_lag3").click(function() {
                var checkValue = $(this).is(":checked");
                // alert(checkValue);
                if(checkValue == true) {
                    $('.other_foreign_lang3').css('display','block');
                    $('#other_forign_lag3').prop('required', true);
                } else if(checkValue == false) {
                    $('.other_foreign_lang3').css('display','none');
                    $('#other_forign_lag3').prop('required', false);
                }
            });
        
            $('input[type=radio][name=sub_publications]').on('change', function() {
                switch ($(this).val()) {
                    case 'yes':
                        $('#subsidiary_pub').prop('required', true);
                        $('.subsidiaryEnable2').css('display','block');
                    break;
                    case 'No':
                        $('#subsidiary_pub').prop('required', false);
                        $('.subsidiaryEnable2').css('display','none');
                    break;
                }
                });
    
    
    });
    
    
    