<script>

    $('.g_age').on('change', function (e) {
        var InterAge = $('.g_age').val();
        if(InterAge < 16){$('.g_age').val('');}
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
 ===============================new_rows_2===========================
 ================================================================== */
    $("#go_hospital").select2({allowClear:true, placeholder: 'មធ្យោបាយធ្វើដំណើរ'});
    //type_vehicle
    $(".type_vehicle").select2({allowClear:true, placeholder: 'សម្ភារប្រើបា្រស់'});
    dataRow_vehicle=2;
    $('#add_rows_2').click(function(){ //alert($m_id);
        var row_2 = $('.new_rows_2 tr.myrow_2').length;
//        if(row_2 >= 7){
//            alert('ប្រភេទយានជំនិះ​របស់​គ្រួសារមិនអនុញ្ញាតអោយបញ្ចូលលើសពីរការកំណត់ទេ');
//            return false;
//        }
        reOrder_vehicle();
        //   var rowindex_2 = row_2+1;
        var html = '<tr class="myrow_2">'+
            '<td>'+dataRow_vehicle+'</td>'+
            '<td>' +
            '<div class="form-group add_type_vehicle_'+row_2+'">'+
            '<select class="form-control type_vehicle" id="type_vehicle_'+row_2+'" name="type_vehicle['+row_2+']"> <option></option>@foreach($typetransport as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
            '</div>'+
            '</td>'+
            '<td><div class="form-group"><input autocomplete="off" id="number_vehicle_'+row_2+'" type="text" class="number_vehicle form-control allowNumber vehicle cal_v" name="number_vehicle['+row_2+']" required="required"/></div></td>'+
            '<td><div class="form-group input-group"><input autocomplete="off" id="market_value_vehicle_'+row_2+'" type="text"  class="market_value_vehicle form-control allowNumber vehicle cal_v" name="market_value_vehicle['+row_2+']" required="required"/><span class="input-group-addon">រៀល</span></div></td>'+
            '<td><div class="form-group input-group"><input autocomplete="off" id="total_rail_vehicle_'+row_2+'" type="text"  class="total_rail_vehicle form-control totalallowNumber_vehicle cal_v" name="total_rail_vehicle['+row_2+']"/ readonly="readonly"><span class="input-group-addon">រៀល</span></div></td>'+
            '<td><a id="vehicle_'+row_2+'" class="btn btn-danger btn-sm remove_rows_2"><span class="glyphicon glyphicon-minus"></span></a></td>'+
            '</tr>';
        $(".new_rows_2").append(html);
        dataRow_vehicle++;
        $(".type_vehicle").select2({allowClear:true, placeholder: "សម្ភារប្រើបា្រស់"});
        AllowNumber();
        var row_num = $('.new_rows_2 tr').length;

        $('.vehicle').change(function () {
            for(var i=1; i<row_num; i++) {
                var sum = 0;
                var number_vehicle_1 = $('#number_vehicle_'+i).val();
                var market_value_vehicle_1 = $('#market_value_vehicle_'+i).val();
                sum = Number(number_vehicle_1 * market_value_vehicle_1);
                $("#vehicle_"+i).attr({"onclick": "remove_2("+sum+")"});
                $('#total_rail_vehicle_'+i).val(sum);
            }
            $('.cal_v').change(function(){
                var tot = $('#total_vehicle_costs').val();
                if(tot>=0 && tot<=600000) {
                    $('#score_v').val(6);
                }else if(tot>=604000 && tot <= 1200000){
                    $('#score_v').val(4);
                }else if(tot>=1204000 && tot <= 2000000){
                    $('#score_v').val(2);
                }else{
                    $('#score_v').val(0);
                }
            });
        });

        $('.vehicle').change(function () {
            var arr = document.getElementsByClassName('totalallowNumber_vehicle');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            $('#total_vehicle_costs').val(tot);
        });
    });
    function reOrder_vehicle(){
        for(var n=2;n<(dataRow_vehicle-1);n++){
            $('.new_rows_2  tr:eq(' + (n-1) +') td:first-child').html(n);
            $('.new_rows_2  tr:eq(' + (n-1) +') td .type_vehicle').attr('name', 'type_vehicle['+(n-1)+']');
            $('.new_rows_2  tr:eq(' + (n-1) +') td .number_vehicle').attr('name', 'number_vehicle['+(n-1)+']');
            $('.new_rows_2  tr:eq(' + (n-1) +') td .number_vehicle').attr('id', 'number_vehicle_'+(n-1));
            $('.new_rows_2  tr:eq(' + (n-1) +') td .market_value_vehicle').attr('name', 'market_value_vehicle['+(n-1)+']');
            $('.new_rows_2  tr:eq(' + (n-1) +') td .market_value_vehicle').attr('id', 'market_value_vehicle_'+(n-1));
            $('.new_rows_2  tr:eq(' + (n-1) +') td .total_rail_vehicle').attr('name', 'total_rail_vehicle['+(n-1)+']');
            $('.new_rows_2  tr:eq(' + (n-1) +') td .total_rail_vehicle').attr('id', 'total_rail_vehicle_'+(n-1));
            $('.new_rows_2  tr:eq(' + (n-1) +') td .remove_rows_2').attr('id', 'vehicle_'+(n-1));

        }
    }
    //remove add
    function remove_2(val) {
        var total_costs = parseInt($('#total_vehicle_costs').val()) - val;
        // $(this).parent().parent().remove();
        $('#total_vehicle_costs').val(total_costs);
    }
    $(".new_rows_2").on('click','.remove_rows_2',function(e){
        var result = window.confirm('Are you sure?');
        if (result == false) {
            e.preventDefault();
            return false;
        }
        $('#add_rows_2').show();
        $(this).parent().parent().remove();
        reOrder_vehicle();
        dataRow_vehicle--;
    });
    $('.vehicle').change(function () {
        var sum = 0;
        var number_vehicle = $('#number_vehicle').val();
        var market_value_vehicle = $('#market_value_vehicle').val();
        $('.vehicle').each(function() {
            sum = Number(number_vehicle * market_value_vehicle);
        });
        $('#total_rail_vehicle').val(sum);

        $('.cal_v').change(function(){
            var tot = $('#total_vehicle_costs').val();
            if(tot>=0 && tot<=600000) {
                $('#score_v').val(6);
            }else if(tot>=604000 && tot <= 1200000){
                $('#score_v').val(4);
            }else if(tot>=1204000 && tot <= 2000000){
                $('#score_v').val(2);
            }else{
                $('#score_v').val(0);
            }
        });
    });
    
    $('.vehicle').change(function () {
        var arr = document.getElementsByClassName('totalallowNumber_vehicle');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        $('#total_vehicle_costs').val(tot);
    });

/*==================================================================
 ===============================new_rows_3===========================
 ================================================================== */
    dataRow_income = 2;
    var animal_ind = 0;
    $('#add_rows_3').click(function(){ //alert($m_id);
        numRow++;
       // console.log(numRow);
        var row_3 = $('.new_rows_3 tr.myrow_3').length;
        animal_ind = row_3;
//        if(row_3 >= 3){
//            alert('ប្រភេទចំណូលមិនអនុញ្ញាតអោយបញ្ចូលលើសពីរការកំណត់ទេ');
//            return false;
//        }
        // var rowindex_3 = row_3+1;
        var tab_rows_3 ='<tr class="myrow_3">'+
            '<td class="auto_id">'+dataRow_income+'</td>'+
            '<td>'+
            '<div class="form-group add_type_animals_'+numRow+'">'+
            '<select required="required" style="width: 100%;" class="cal_animal form-control type_animals" id="type_animals_'+numRow+'" name="type_animals['+numRow+']" index="'+(numRow)+'">' +
            '<option></option>@foreach($typeanimals as $key => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
            '</div>'+
            '</td>'+
            '<td id="num_animals_'+numRow+'" class="add_ajust_animals">'+
            '<table class="table table-bordered" align="center">' +
            '<tr>' +
            '<th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>' +
            '<th>ចំនួនកូនសត្វ</th>' +
            '</tr>' +
            '<tr>' +
            '<td>' +
            '<div class="form-group">' +
            '<input name="num_animals['+numRow+']" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />' +
            '<input autocomplete="off" name="num_animals_big['+numRow+']" type="text" class="cal_animal num_animals_big form-control allowNumber" required="required" />' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group">' +
            '<input autocomplete="off" name="num_animals_small['+numRow+']" type="text" class="cal_animal num_animals_small form-control allowNumber"/>' +
            '</div>' +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</td>'+
            '<td>' +
                '<div class="form-group ng" id="noted_'+numRow+'">' +
                '<select style="width: 100%;" class="form-control note_animals" id="note_animals" name="note_animals['+row_3+']" required="required" index="0">' +
                '<option></option>' +
                '<option value="ប្រវាស់">ប្រវាស់</option>' +
                '<option value="មិនប្រវាស់">មិនប្រវាស់</option>' +
                '</select>'+
                '</div>' +
            '</td>'+
            '<td​​ class="my_hide">'+
                 '<div class="form-group input-group">'+
                    '<input id="score_animal" name="animal_score['+row_3+']" type="text" required="required" class="cal_animal txt_score_animal score_animal_'+numRow+' form-control" readonly="readonly"/>'+
                    '<span class="input-group-addon">ពិន្ទុ</span>'+
                  '</div>'+
            '</td>'+
            '<td><a class="btn btn-danger btn-sm remove_rows_3"> <span class="glyphicon glyphicon-minus"></span></a></td>'+
            '</tr>';
        $(".new_rows_3").append(tab_rows_3);
        AllowNumber();
        dataRow_income++;
        reOrder_income();
        $(".type_animals").select2({ allowClear:true, placeholder: "ប្រភេទសត្វ"});
        $(".note_animals").select2({ allowClear:true, placeholder: "កំណត់សម្គាល់"});

        $('.type_animals').on('change', function (e) {
            // console.log(dataRow_income);

            var type = this.value;
            var index= $(this).attr('index');
            // console.log(numRow + '==' + index + ' ---- ' + type);
            if (type == 2) {
                var sheep = '<table class="table table-bordered">' +
                    '<tr>' +
                    '<th>ចំនួនសត្វ</th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input name="num_animals['+numRow+']" id="num_sheep_'+numRow+'" type="text" class="cal_animal form-control allowNumber num_animals"  />' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
                var noted = '<input autocomplete="off" name="note_animals['+numRow+']" type="text" class="cal_animal form-control"  />';
                $('#noted_'+index).html(noted);
                $('#num_animals_'+(index)).html(sheep);
                AllowNumber();
                $('.cal_animal').change(function(){
                  var myrow_ind = $('.myrow_3').attr('index');
                  var num = $('#num_sheep_'+index).val();
                  var answer = 0;
                  if( num>=0 && num < 3){
                    //$('#animal_score').val(4);
                     answer = 4;
                  }else{
                     answer = 0;
                  }
                  $(".score_animal_"+index).val(answer);
                  var maxScore = $('.score_animal_'+myrow_ind).val();
                   $(".txt_score_animal").each(function(i){
                       var score = $(this).val();
                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                   });
                   $('#score_animal_total').val(maxScore);
                });

            }else if( type == 3 ){
                var duk = '<table class="table table-bordered">' +
                    '<tr>' +
                    '<th>ចំនួនសត្វ <spand class="text-danger">*</spand></th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input autocomplete="off" name="num_animals_big['+numRow+']" id="hend_'+numRow+'" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
                var noted = '<input autocomplete="off" name="note_animals['+numRow+']" type="text" class="cal_animal form-control"  />';
                $('#noted_'+index).html(noted);
                $('#num_animals_'+(index)).html(duk);
                AllowNumber();
                $(".cal_animal").change(function(){
                  var myrow_ind = $('.myrow_3').attr('index');
                  var hend = $("#hend_"+index).val();
                  var score = 0;
                  if(hend>=0 && hend<30){
                     score = 6;
                  }else if(hend >=30 && hend<50){
                      score=4;
                  }else{
                      score=0;
                  }
                  $('.score_animal_'+index).val(score);

                   var maxScore = $('.score_animal_'+myrow_ind).val();
                   $(".txt_score_animal").each(function(i){
                       var score = $(this).val();
                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                   });
                   $('#score_animal_total').val(maxScore);
                });
            }else if (type == 1) {//$('#num_animals_'+ty).empty();
                var cow = '<table class="table table-bordered" align="center">' +
                    '<tr>' +
                    '<th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>' +
                    '<th>ចំនួនកូនសត្វ</th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input name="num_animals['+numRow+']" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />' +
                    '<input autocomplete="off" name="num_animals_big['+numRow+']" id="num_animals_big_'+numRow+'" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input autocomplete="off" name="num_animals_small['+numRow+']" id="num_animals_small_'+numRow+'" type="text" class="cal_animal form-control allowNumber"  />' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
                var noted = '<select style="width: 100%;" class="cal_animal form-control note_animals" id="note_animals_'+numRow+'" name="note_animals['+numRow+']" required="required">' +
                    '<option></option>' +
                    '<option value="ប្រវាស់">ប្រវាស់</option>' +
                    '<option value="មិនប្រវាស់">មិនប្រវាស់</option>' +
                    '</select>';

                $('#noted_'+index).html(noted);
                $('#num_animals_'+(index)).html(cow);
                AllowNumber();
                $(".note_animals").select2({ allowClear:true, placeholder: "កំណត់សម្គាល់"});

                $(".cal_animal").change(function(){
                  var myrow_ind = $('.myrow_3').attr('index');
                  var big = parseInt($("#num_animals_big_"+index).val());
                  var small = parseInt($("#num_animals_small_"+index).val());
                  var status = $("#note_animals_"+index).val();
                  var bigsmall = big+small;
                  var score = 0;
                  if(big == 0 && small == 0){
                    score = 6;
                  }else if( ((big <=1 && small == 0) || (big == 0 && small <=2 )) || (bigsmall == 2 && status =="ប្រវាស់") ){
                      score = 4;
                  }
                  else{
                    score = 0;
                  }
                  $(".score_animal_"+index).val(score);

                  var maxScore = $('.score_animal_'+myrow_ind).val();
                   $(".txt_score_animal").each(function(i){
                       var score = $(this).val();
                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                   });
                   $('#score_animal_total').val(maxScore);
                });
            }
        });


        //score
        // $('.cal_animal').change(function(){
        //     $('#score_animal').empty();
        //     var animal = $('.type_animals').val();
        //     var num_animals_big     = $('.num_animals_big').val();
        //     var num_animals_small   = $('.num_animals_small').val();
        //     var note_animals        = $('.note_animals').val();
        //     if(animal == 1){
        //         $('#score_animal').empty();
        //         if((num_animals_big == 0 && num_animals_small == 0 && note_animals == 0)){
        //             $('#score_animal').val(6);
        //         }else if( (num_animals_big == 1 || num_animals_small <= 2) || (note_animals == 2) ){
        //             $('#score_animal').val(4);
        //         }else if(num_animals_big>1 || num_animals_small>3 || note_animals>2){
        //             $('#score_animal').val(0);
        //         }else{$('#score_animal').val(0);}

        //     }else if(animal == 2){
        //         $('#score_animal').empty();
        //         if( (num_animals_big == 0 && num_animals_small == 0 && note_animals == 0) ){
        //             $('#score_animal').val(6);
        //         }else if(num_animals_big<3 || num_animals_small < 3){
        //             $('#score_animal').val(4);
        //         }else if(num_animals_big==3 || num_animals_small==3 ){
        //             $('#score_animal').val(0);
        //         }else{$('#score_animal').val(0);}

        //     }else{
        //         $('#score_animal').empty();
        //         if(num_animals_small < 30 || num_animals_big < 30){
        //             $('#score_animal').val(6);
        //         }else if( (num_animals_big>30 && num_animals_big<50) || (num_animals_big>30 && num_animals_big<50) ){
        //             $('#score_animal').val(4);
        //         }else if(num_animals_big == 50 || num_animals_small == 50){
        //             $('#score_animal').val(0);
        //         }else{$('#score_animal').val(0);}

        //     }
        // });
    });


    //remove add
    $(".new_rows_3").on('click','.remove_rows_3',function(e){
        var result = window.confirm('Are you sure?');
        if (result == false) {
            e.preventDefault();
            return false;
        }
        $('#add_rows_3').show();
        $(this).parent().parent().remove();
        reOrder_income();
        dataRow_income--;
        numRow--;
    });
    //type_animals
    $(".type_animals").select2({allowClear:true, placeholder: 'ប្រភេទសត្វ' });
    $(".type_animals1").select2({allowClear:true, placeholder: 'ប្រភេទសត្វ' });
    $(".note_animals").select2({allowClear:true, placeholder: 'កំណត់សម្គាល់' });

    function reOrder_income(){
        for(var n=1;n<(dataRow_income);n++){
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td.auto_id:first-child').html(n);
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .type_animals').attr('name', 'type_animals['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .type_animals').attr('index', (n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td.add_ajust_animals').attr('id', 'num_animals_'+(n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .num_animals').attr('name', 'num_animals['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .num_animals_big').attr('name', 'num_animals_big['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .num_animals_small').attr('name', 'num_animals_small['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .note_animals').attr('name', 'note_animals['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .ng').attr('id', 'noted_'+(n-1));
        }
    }


/*==================================================================
===============================new_rows_4===========================
================================================================== */
    dataRow_other_income=step2Row;//dataRow;

    $(".new_rows_4").on('click','#add_rows_4',function(){
        var row_numc4 = $('.new_rows_4 tr.myrow_4').length+1;
        var row_numc = $('.new_rows tr').length;
        if(row_numc <= row_numc4){
            $('#plus-check').empty();
        }

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
        var row_numc4 = $('.new_rows_4 tr.myrow_4').length;
        var row_numc = $('.new_rows tr').length;
        if(row_numc <= row_numc4){
            $('#plus-check').html('<a class="btn btn-sm btn-primary" id="add_rows_4"><span class="glyphicon glyphicon-plus"></span></a>');
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
        var row_numc5 = $('.new_rows_5 tr.myrow_5').length+1;
        var row_numc = $('.new_rows tr').length;
        if(row_numc <= row_numc5){
            $('#plus-check5').empty();
        }

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
        var row_numc5 = $('.new_rows_5 tr.myrow_5').length;
        var row_numc = $('.new_rows tr').length;
        if(row_numc <= row_numc5){
            $('#plus-check5').html('<a class="btn btn-sm btn-primary" id="add_rows_5"><span class="glyphicon glyphicon-plus"></span></a>');
        }

        $('#add_rows_5').show();
        $(this).parent().parent().remove();
        reOrder_other_income_not();
        step2Row5--;
    });
</script>