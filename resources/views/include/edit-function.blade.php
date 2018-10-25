<script>

    $('.g_age').on('change', function (e) {
        var InterAge = $('.g_age').val();
        if(InterAge <= 1){$('.g_age').val('');}
        if(InterAge >= 150){$('.g_age').val('');}
    });

    $('.inter_age').on('change', function (e) {
        var InterAge = $('.inter_age').val();
        if(InterAge < 16){$('.inter_age').val('');}
        if(InterAge >= 150){$('.inter_age').val('');}
    });

    $('.fa_age').on('change', function (e) {
        var InterAge = $('.fa_age').val();
        if(InterAge < 16){$('.fa_age').val('');}
        if(InterAge >= 150){$('.fa_age').val('');}
    });

    //validation alert
    $('.nextBtn').click(function(){
        setTimeout(function() {
            $(".add_hide").addClass("autho-hide");
            $('.autho-hide').fadeOut();
        },9000);
    });
    $('#step2Next').click(function(){
        setTimeout(function() {
            $(".add_hide").addClass("autho-hide");
            $('.autho-hide').fadeOut();
        },9000);
        //step2Row = 5;
    });

</script>