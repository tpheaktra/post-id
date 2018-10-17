<script>
    var phoneRegExp = new RegExp(/^(?=.*[0-9])[+0-9]+$/);
    $('.telephone').change(function() {
        var val = $(this).val();
        if ( !phoneRegExp.test( val ) ) {
            // Replace anything that isn't a number or a plus sign
            // $(this).val( val.replace(/([^+0-9]+)/gi, '') );
            var num = this.value;
            var result = '';
            // console.log(num.length);
            for (n = 0; n < num.length; n++) {
                if (num[n] == '០') result += 0;
                if (num[n] == '១') result += 1;
                if (num[n] == '២') result += 2;
                if (num[n] == '៣') result += 3;
                if (num[n] == '៤') result += 4;
                if (num[n] == '៥') result += 5;
                if (num[n] == '៦') result += 6;
                if (num[n] == '៧') result += 7;
                if (num[n] == '៨') result += 8;
                if (num[n] == '៩') result += 9;

                //if (num[n] == '.') result += '.';
                if (num[n] == 0) result += 0;
                if (num[n] == 1) result += 1;
                if (num[n] == 2) result += 2;
                if (num[n] == 3) result += 3;
                if (num[n] == 4) result += 4;
                if (num[n] == 5) result += 5;
                if (num[n] == 6) result += 6;
                if (num[n] == 7) result += 7;
                if (num[n] == 8) result += 8;
                if (num[n] == 9) result += 9;
            }
            $(this).val(result);
        }
    });
    function AllowNumber() {
        // $(".allowNumber").keydown(function (e) {
        $(".allowNumber").change(function (event) {
            var num = this.value;
            var result = '';
            // console.log(num.length);
            for (n = 0; n < num.length; n++) {
                if (num[n] == '០') result += 0;
                if (num[n] == '១') result += 1;
                if (num[n] == '២') result += 2;
                if (num[n] == '៣') result += 3;
                if (num[n] == '៤') result += 4;
                if (num[n] == '៥') result += 5;
                if (num[n] == '៦') result += 6;
                if (num[n] == '៧') result += 7;
                if (num[n] == '៨') result += 8;
                if (num[n] == '៩') result += 9;

                //if (num[n] == '.') result += '.';
                if (num[n] == 0) result += 0;
                if (num[n] == 1) result += 1;
                if (num[n] == 2) result += 2;
                if (num[n] == 3) result += 3;
                if (num[n] == 4) result += 4;
                if (num[n] == 5) result += 5;
                if (num[n] == 6) result += 6;
                if (num[n] == 7) result += 7;
                if (num[n] == 8) result += 8;
                if (num[n] == 9) result += 9;
            }
            $(this).val(result);
//                $(this).val($(this).val().replace(/[^\d].+/, ""));
//                if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which > 57)) {
//                    event.preventDefault();
//                }
        });
        //});
    }

    $(".allowNumber").change(function (event) {
        // $(this).val($(this).val().replace(/[^\d].+/, ""));
        var num = this.value;
        var result = '';
        // console.log(num.length);
        for (n = 0; n < num.length; n++) {
            if (num[n] == '០') result += 0;
            if (num[n] == '១') result += 1;
            if (num[n] == '២') result += 2;
            if (num[n] == '៣') result += 3;
            if (num[n] == '៤') result += 4;
            if (num[n] == '៥') result += 5;
            if (num[n] == '៦') result += 6;
            if (num[n] == '៧') result += 7;
            if (num[n] == '៨') result += 8;
            if (num[n] == '៩') result += 9;

            // if (num[n] == '.') result += '.';
            if (num[n] == 0) result += 0;
            if (num[n] == 1) result += 1;
            if (num[n] == 2) result += 2;
            if (num[n] == 3) result += 3;
            if (num[n] == 4) result += 4;
            if (num[n] == 5) result += 5;
            if (num[n] == 6) result += 6;
            if (num[n] == 7) result += 7;
            if (num[n] == 8) result += 8;
            if (num[n] == 9) result += 9;
        }
        $(this).val(result);
//        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which > 57)) {
//            event.preventDefault();
//        }
    });

    function AllowFlot() {
        $(".allowFlot").change(function (event) {
            var num = this.value;
            var result = '';
            // console.log(num.length);
            for (n = 0; n < num.length; n++) {
                if (num[n] == '០') result += 0;
                if (num[n] == '១') result += 1;
                if (num[n] == '២') result += 2;
                if (num[n] == '៣') result += 3;
                if (num[n] == '៤') result += 4;
                if (num[n] == '៥') result += 5;
                if (num[n] == '៦') result += 6;
                if (num[n] == '៧') result += 7;
                if (num[n] == '៨') result += 8;
                if (num[n] == '៩') result += 9;

                if (num[n] == '.') result += '.';
                if (num[n] == 0) result += 0;
                if (num[n] == 1) result += 1;
                if (num[n] == 2) result += 2;
                if (num[n] == 3) result += 3;
                if (num[n] == 4) result += 4;
                if (num[n] == 5) result += 5;
                if (num[n] == 6) result += 6;
                if (num[n] == 7) result += 7;
                if (num[n] == 8) result += 8;
                if (num[n] == 9) result += 9;
            }
            $(this).val(result);

            //this.value = this.value.replace(/[^0-9\.]/g,'');
//            $(this).val($(this).val().replace(/[^0-9\.]/g,''));
//            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
//                event.preventDefault();
//            }
        });
    }

    $(".allowFlot").change(function (event) {
        var num = this.value;
        var result = '';
        // console.log(num.length);
        for (n = 0; n < num.length; n++) {
            if (num[n] == '០') result += 0;
            if (num[n] == '១') result += 1;
            if (num[n] == '២') result += 2;
            if (num[n] == '៣') result += 3;
            if (num[n] == '៤') result += 4;
            if (num[n] == '៥') result += 5;
            if (num[n] == '៦') result += 6;
            if (num[n] == '៧') result += 7;
            if (num[n] == '៨') result += 8;
            if (num[n] == '៩') result += 9;

            if (num[n] == '.') result += '.';
            if (num[n] == 0) result += 0;
            if (num[n] == 1) result += 1;
            if (num[n] == 2) result += 2;
            if (num[n] == 3) result += 3;
            if (num[n] == 4) result += 4;
            if (num[n] == 5) result += 5;
            if (num[n] == 6) result += 6;
            if (num[n] == 7) result += 7;
            if (num[n] == 8) result += 8;
            if (num[n] == 9) result += 9;
        }
        $(this).val(result);
        //this.value = this.value.replace(/[^0-9\.]/g,'');
//        $(this).val($(this).val().replace(/[^0-9\.]/g,''));
//        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
//            event.preventDefault();
//        }
    });
</script>