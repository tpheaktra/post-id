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









    /*==================================================================
    ===============================new_rows_4===========================
    ================================================================== */
    dataRow_other_income=step2Row;//dataRow;

    $(".new_rows_4").on('click','#add_rows_4',function(){
        dataRow_other_income=step2Row;
        var num_4 = step2Row-1;//$('.new_rows_4 tr').length;
        var otherIncome1 = '<tr class="myrow_4">' +
            '<td>'+step2Row+'</td>'+
            '<td>' +
            '<div class="form-group"><input id="income_name_'+num_4+'" name="income_name['+num_4+']" autocomplete="off" class="form-control income_name" type="text"  required="required"></div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group"><input id="income_age_'+num_4+'" name="income_age['+num_4+']" autocomplete="off" class="form-control income_age" type="text" required="required"></div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group add_income_occupation">' +
            '<select style="width: 100%" autocomplete="off" class="form-control income_occupation" id="income_occupation" name="income_occupation['+num_4+']" required="required">' +
            '<option></option>' +
            '@foreach($occupation as $keh => $value)' +
            '<option value="{{$value->id}}">{{$value->name_kh}}</option>' +
            '@endforeach' +
            '</select>'+
            '</div>' +
            '</td>' +
            '<td class="hidden">' +
            '<div class="form-group">' +
            '<input name="income_unit['+num_4+']" type="text" class="income_unit form-control" placeholder="ថ្ងៃ" value="day" autocomplete="off" required="required" readonly="readonly">' +
            '</div>' +
            '</td>'+

            '<td>'+
            '<div class="form-group input-group">'+
            '<input id="average_amount_'+num_4+'" name="average_amount['+num_4+']" type="text" class="cal_incom average_amount form-control allowNumber otherincome" required="required" autocomplete="off">'+
            '<span class="input-group-addon">រៀល</span>'+
            '</div>'+
            '</td>'+

            '<td>' +
            '<div class="form-group input-group">' +
            '<input id="unit_in_month_'+num_4+'" name="unit_in_month['+num_4+']" type="text" class="form-control allowNumber otherincome unit_in_month" required="required" autocomplete="off">'+
            '<span class="input-group-addon">ថ្ងៃ</span>' +
            '</div>' +
            '</td>'+

            '<td>' +
            '<div class="form-group input-group">' +
            '<input id="monthly_income_'+num_4+'" name="monthly_income['+num_4+']" type="text" class="cal_incom monthly_income form-control allowNumber monthly_income_total" readonly="readonly" autocomplete="off">'+
            '<span class="input-group-addon">រៀល</span>' +
            '</div>' +
            '</td>'+
            '<td><a id="other_income_'+num_4+'" class="btn btn-sm btn-danger remove_rows_4"><span class="glyphicon glyphicon-minus"></span></a></td>' +
            '</tr>';
        $('.new_rows_4').append(otherIncome1);
        AllowNumber();
        step2Row++;
        var num_4_1 = $('.new_rows_4 tr').length+1;
        $('.otherincome').change(function () {
            for(var ii=0; ii<num_4_1; ii++) {
                var sum = 0;
                var unit_in_month = $('#unit_in_month_'+ii).val();
                var average_amount = $('#average_amount_'+ii).val();
                if(unit_in_month > 31){$('#unit_in_month_'+ii).val('');}
                sum = Number(unit_in_month * average_amount);
                $("#other_income_"+ii).attr({"onclick": "remove_4("+sum+")"});
                $('#monthly_income_'+ii).val(sum);
            }
        });
        $(".income_occupation").select2({ allowClear:true, placeholder: "មុខរបររកចំណូល"});

        $('.otherincome').change(function () {
            var arr = document.getElementsByClassName('monthly_income_total');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            $('#total_monthly_income').val(tot);
            var totalperson = $('#total_people').val();
            if(totalperson == null || totalperson == ''){
                $('#total_inc_person').val((tot/1).toFixed(2));
            }else{
                $('#total_inc_person').val((tot/totalperson).toFixed(2));
            }
        });
        $('.cal_incom').change(function(){
            var total_per = $('#total_inc_person').val();
            var money_score = 0;
            if(total_per < 40000 ){
                money_score = 4;
            }else if(total_per>=40000 && total_per < 70000){
                money_score = 2;
            }else if(total_per>=70000 && total_per< 100000){
                money_score = 0;
            }else if(total_per>=100000 && total_per< 125000){
                money_score = -3;
            }else if(total_per>=125000 && total_per < 1500000){
                money_score = -9;
            }else if(total_per >200000){
                money_score = -12;
            }else{
                money_score = 0;
            }$('#income_out_farmer_score').val(money_score);
        });
    });

    function reOrder_other_income(){
        for(var n=0;n<(step2Row-1);n++){
            $('.new_rows_4  tr:eq(' + (n-1) +') td:first-child').html(n);
            $('.new_rows_4  tr:eq(' + (n-1) +') td .income_name').attr('name', 'income_name['+(n-1)+']');
            $('.new_rows_4  tr:eq(' + (n-1) +') td .income_name').attr('id', 'income_name_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .income_age').attr('name', 'income_age['+(n-1)+']');
            $('.new_rows_4  tr:eq(' + (n-1) +') td .income_age').attr('id', 'income_age_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .income_occupation').attr('name', 'income_occupation['+(n-1)+']');
            //$('.new_rows_4  tr:eq(' + (n-1) +') td .income_occupation ').attr('id', 'income_age_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .income_unit').attr('name', 'income_unit['+(n-1)+']');
            // $('.new_rows_4  tr:eq(' + (n-1) +') td .income_age').attr('id', 'income_age_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .unit_in_month').attr('name', 'unit_in_month['+(n-1)+']');
            $('.new_rows_4  tr:eq(' + (n-1) +') td .unit_in_month').attr('id', 'unit_in_month_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .average_amount').attr('name', 'average_amount['+(n-1)+']');
            $('.new_rows_4  tr:eq(' + (n-1) +') td .average_amount').attr('id', 'average_amount_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .monthly_income').attr('name', 'monthly_income['+(n-1)+']');
            $('.new_rows_4  tr:eq(' + (n-1) +') td .monthly_income').attr('id', 'monthly_income_'+(n-1));
            $('.new_rows_4  tr:eq(' + (n-1) +') td .remove_rows_4').attr('id', 'other_income_'+(n-1));

        }
    }


    //remove add
    function remove_4(val) {
        var total_costs = parseInt($('#total_monthly_income').val()) - val;
        $('#total_monthly_income').val(total_costs);
        var totalperson = $('#total_people').val();
        if(totalperson == null || totalperson == ''){
            $('#total_inc_person').val((total_costs/1).toFixed(2));
        }else{
            $('#total_inc_person').val((total_costs/totalperson).toFixed(2));
        }
    }
    $(".new_rows_4").on('click','.remove_rows_4',function(e){
        var result = window.confirm('Are you sure?');
        if (result == false) {
            e.preventDefault();
            return false;
        }
        $('#add_rows_4').show();
        $(this).parent().parent().remove();
        reOrder_other_income();
        step2Row--;
    });


    /*==================================================================
    ===============================new_rows_5===========================
    ================================================================== */
    dataRow_other_income_not=step2Row5;//dataRow;

    $(".new_rows_5").on('click','#add_rows_5',function(){
        dataRow_other_income_not=step2Row5;
        var num_5 = step2Row5-1;//$('.new_rows_4 tr').length;
        var otherIncome1 = '<tr class="myrow_5">' +
            '<td>'+step2Row5+'</td>'+
            '<td>' +
            '<div class="form-group"><input id="income_name_not_'+num_5+'" name="income_name_not['+num_5+']" autocomplete="off" class="form-control income_name_not" type="text"  required="required"></div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group"><input id="income_age_not_'+num_5+'" name="income_age_not['+num_5+']" autocomplete="off" class="form-control income_age_not" type="text" required="required"></div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group add_income_occupation_not">' +
            '<select style="width: 100%" autocomplete="off" class="form-control income_occupation_not" id="income_occupation_not" name="income_occupation_not['+num_5+']" required="required">' +
            '<option></option>' +
            '@foreach($occupation as $keh => $value)' +
            '<option value="{{$value->id}}">{{$value->name_kh}}</option>' +
            '@endforeach' +
            '</select>'+
            '</div>' +
            '</td>' +
            '<td class="hidden">' +
            '<div class="form-group">' +
            '<input name="income_unit_not['+num_5+']" type="text" class="income_unit_not form-control" placeholder="ថ្ងៃ" value="day" autocomplete="off" required="required">' +
            '</div>' +
            '</td>'+

            '<td>'+
            '<div class="form-group input-group">'+
            '<input id="average_amount_not_'+num_5+'" name="average_amount_not['+num_5+']" type="text" class="cal_incom_2 average_amount_not form-control allowNumber otherincome_not" required="required" autocomplete="off">'+
            '<span class="input-group-addon">រៀល</span>'+
            '</div>'+
            '</td>'+

            '<td>' +
            '<div class="form-group input-group">' +
            '<input id="unit_in_month_not_'+num_5+'" name="unit_in_month_not['+num_5+']" type="text" class="form-control allowNumber otherincome_not unit_in_month_not" required="required" autocomplete="off">'+
            '<span class="input-group-addon">ថ្ងៃ</span>' +
            '</div>' +
            '</td>'+

            '<td>' +
            '<div class="form-group input-group">' +
            '<input id="monthly_income_not_'+num_5+'" name="monthly_income_not['+num_5+']" type="text" class="cal_incom_2 monthly_income_not form-control allowNumber monthly_income_total_not" readonly="readonly" autocomplete="off">'+
            '<span class="input-group-addon">រៀល</span>' +
            '</div>' +
            '</td>'+
            '<td><a id="other_income_not_'+num_5+'" class="btn btn-sm btn-danger remove_rows_5"><span class="glyphicon glyphicon-minus"></span></a></td>' +
            '</tr>';
        $('.new_rows_5').append(otherIncome1);
        AllowNumber();
        step2Row5++;
        var num_4_5 = $('.new_rows_5 tr').length+1;
        $('.otherincome_not').change(function () {
            for(var ii=0; ii<num_4_5; ii++) {
                var sum = 0;
                var unit_in_month = $('#unit_in_month_not_'+ii).val();
                var average_amount = $('#average_amount_not_'+ii).val();
                if(unit_in_month > 31){$('#unit_in_month_not_'+ii).val('');}
                sum = Number(unit_in_month * average_amount);
                $("#other_income_not_"+ii).attr({"onclick": "remove_5("+sum+")"});
                $('#monthly_income_not_'+ii).val(sum);
            }
        });
        $(".income_occupation_not").select2({ allowClear:true, placeholder: "មុខរបររកចំណូល"});

        $('.otherincome_not').change(function () {
            var arr = document.getElementsByClassName('monthly_income_total_not');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            $('#total_monthly_income_not').val(tot);
            var totalperson = $('#total_people').val();
            if(totalperson == null || totalperson == ''){
                $('#total_inc_person_not').val((tot/1).toFixed(2));
            }else{
                $('#total_inc_person_not').val((tot/totalperson).toFixed(2));
            }
        });
        $('.cal_incom_2').change(function(){
            var total_per = $('#total_inc_person_not').val();
            var money_score = 0;
            if(total_per < 40000 ){
                money_score = 4;
            }else if(total_per>=40000 && total_per < 70000){
                money_score = 2;
            }else if(total_per>=70000 && total_per< 100000){
                money_score = 0;
            }else if(total_per>=100000 && total_per< 125000){
                money_score = -3;
            }else if(total_per>=125000 && total_per < 1500000){
                money_score = -9;
            }else if(total_per >200000){
                money_score = -12;
            }else{
                money_score = 0;
            }$('#income_out_farmer_score_2').val(money_score);
        });
    });

    function reOrder_other_income_not(){
        for(var n=0;n<(step2Row5-1);n++){
            $('.new_rows_5  tr:eq(' + (n-1) +') td:first-child').html(n);
            $('.new_rows_5  tr:eq(' + (n-1) +') td .income_name_not').attr('name', 'income_name_not['+(n-1)+']');
            $('.new_rows_5  tr:eq(' + (n-1) +') td .income_name_not').attr('id', 'income_name_not_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .income_age_not').attr('name', 'income_age_not['+(n-1)+']');
            $('.new_rows_5  tr:eq(' + (n-1) +') td .income_age_not').attr('id', 'income_age_not_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .income_occupation_not').attr('name', 'income_occupation_not['+(n-1)+']');
            //$('.new_rows_4  tr:eq(' + (n-1) +') td .income_occupation ').attr('id', 'income_age_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .income_unit_not').attr('name', 'income_unit_not['+(n-1)+']');
            // $('.new_rows_4  tr:eq(' + (n-1) +') td .income_age').attr('id', 'income_age_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .unit_in_month_not').attr('name', 'unit_in_month_not['+(n-1)+']');
            $('.new_rows_5  tr:eq(' + (n-1) +') td .unit_in_month_not').attr('id', 'unit_in_month_not_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .average_amount_not').attr('name', 'average_amount_not['+(n-1)+']');
            $('.new_rows_5  tr:eq(' + (n-1) +') td .average_amount_not').attr('id', 'average_amount_not_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .monthly_income_not').attr('name', 'monthly_income_not['+(n-1)+']');
            $('.new_rows_5  tr:eq(' + (n-1) +') td .monthly_income_not').attr('id', 'monthly_income_not_'+(n-1));
            $('.new_rows_5  tr:eq(' + (n-1) +') td .remove_rows_5').attr('id', 'other_income_not_'+(n-1));

        }
    }


    //remove add
    function remove_5(val) {
        var total_costs = parseInt($('#total_monthly_income_not').val()) - val;
        $('#total_monthly_income_not').val(total_costs);
        var totalperson = $('#total_people').val();
        if(totalperson == null || totalperson == ''){
            $('#total_inc_person_not').val((total_costs/1).toFixed(2));
        }else{
            $('#total_inc_person_not').val((total_costs/totalperson).toFixed(2));
        }
    }
    $(".new_rows_5").on('click','.remove_rows_5',function(e){
        var result = window.confirm('Are you sure?');
        if (result == false) {
            e.preventDefault();
            return false;
        }
        $('#add_rows_5').show();
        $(this).parent().parent().remove();
        reOrder_other_income_not();
        step2Row5--;
    });
</script>