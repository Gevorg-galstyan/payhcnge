// $(document).on('click','.sh',function (target) {
//     if($('.first-field').hasClass('active')){
//         $('.first-field').removeClass('active');
//     }else{
//         $(this).parents('.form-row').find('.first-field').toggleClass('active');
//     }
// });

$('#first-drop').on('hidden.bs.dropdown', function () {

});
this_choose_1 = '';
this_choose_2 = '';
$('.money-dropdown li').click(function () {
    this_img = $(this).find('img').attr('src');
    this_text = $(this).find('.this_text').text();

    if ($(this).hasClass('choose-1')) {
        $(this).siblings('input[type="hidden"]').val($(this).data('choose'));
        this_choose_1 = $(this).siblings('input[type="hidden"]').val()
    } else if ($(this).hasClass('choose-2')) {
        $(this).siblings('input[type="hidden"]').val($(this).data('inner'));
        this_choose_2 = $(this).siblings('input[type="hidden"]').val();
    }



    // alert('1'+ this_choose_1+ "," + "2"+ this_choose_2)

    // if (this_choose_2 == '' && this_choose_1 != '') {
    //     $('.choose-1-block').css('display', 'block');
    //     $('.choose-2-block').css('display', 'none');
    // }
    // else if (this_choose_2 != '' && this_choose_1 == '') {
    //     $('.choose-2-block').css('display', 'block');
    //     $('.choose-1-block').css('display', 'none');
    // }
    // else if (this_choose_2 != '' && this_choose_1 != '' && this_choose_2 != this_choose_1) {
    //     $('.choose-2-block').css('display', 'block');
    //     $('.choose-1-block').css('display', 'block');
    //
    // }
    // else if (this_choose_2 != '' && this_choose_1 != '' && this_choose_2 == this_choose_1) {
    //     $('.choose-2-block').css('display', 'none');
    //     $('.choose-1-block').css('display', 'block');
    // }


    $(this).parents('.dropdown').find('.sh').text(this_text);
    $(this).parents('.dropdown').find('.sh').prepend("<img src='" + this_img + "' alt='" + this_text + "' class='choosed_img' height='20px'  />");
    $(this).addClass('active_li')

});

    // $('#money1').keyup(function () {
    //     if (this_choose_2 != '' && this_choose_1 != '' && this_choose_2 != this_choose_1){
    //         this_parents_data_choose = $(this).parents('.form-row').find('.active_li').data('choose');
    //         this_parents_data_inner = $('#money2').parents('.form-row').find('.active_li').data('inner');
    //         // if(this_parents_data_choose == 'a1' && this_parents_data_inner == 'a2' ){
    //         //
    //         // }
    //     }else{
    //         $('#money1').val('');
    //         $('#money2').val('')
    //     }
    //
    //
    // });