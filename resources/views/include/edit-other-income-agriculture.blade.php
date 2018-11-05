<h5><b>គ.១២.២) ចំណូល ផ្សេងពី សកម្មភាពកសិកម្ម ផ្ទាល់ខ្លួន
        <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title=" (បញ្ជាក់ការងារកម្មករផ្នែកកសិកម្មត្រូវបញ្ចូលក្នុងតារាងនេះ) បញ្ជាក់ ៖ ចុះ​តែ​សមាជិក​គ្រួសារ​ដែល​រក​ប្រាក់​ចំណូល​បាន។ ចំពោះសមាជិកដែលមានប្រភពចំណូលលើសពីមួយ សូមសរសេរ​នៅក្នុងជួរដោយឡែកពីគ្នា"></a>
        ​  </b></h5>

<ul class="li-none add_land">
    @if($gFamily->other_income == 1)
    <li>
        <label class="add_income_agricalture_type">
            <input id="income_agriculture" @if($gFamily->other_income == 1) checked @endif index="1" class="income_agriculture" style="margin-right: 10px;" type="radio" value="1" name="income_agricalture_type"/>
            ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមានចំណូលពីសកម្មភាពកសិកម្ម <spand class="text-danger">*</spand>
        </label>


            <div class="col-sm-12">
                <table class="tb_grid table table-bordered table-striped" width="100%" id="income_agriculture_table">
                    <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th width="12%">ឈ្មោះសមាជិក</th>
                        <th width="9%">អាយុ​</th>
                        <th width="15%">មុខរបររកចំណូល <spand class="text-danger">*</spand></th>
                        <th width="9%" class="hidden">ឯកត្តា</th>
                        <th width="18%"​​>ចំណូលជាមធ្យមប្រចាំថ្ងៃ <spand class="text-danger">*</spand></th>
                        <th width="18%"​​>ចំនួនថ្ងៃជាមធ្យមប្រចាំខែ <spand class="text-danger">*</spand></th>
                        <th>ចំណូលមធ្យមប្រចាំខែ</th>
                        <th>សកម្មភាព</th>
                    </tr>
                    </thead>
                    <tbody class="new_rows_4">
                    @foreach($otherIncome as $kk =>$incom)
                        <tr class="myrow_4">
                            <td>{{$kk+1}}</td>
                            <td>
                                <div class="form-group">
                                    <input value="{{$incom->income_name}}" id="income_name_{{$kk}}" name="income_name[{{$kk}}]" autocomplete="off" class="form-control income_name" type="text"  required="required">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input value="{{$incom->income_age}}" id="income_age_{{$kk}}" name="income_age[{{$kk}}]" autocomplete="off" class="form-control income_age allowNumber" type="text" required="required">
                                </div>
                            </td>
                            <td>
                                <div class="form-group add_income_occupation">
                                    <select style="width: 100%" autocomplete="off" class="form-control income_occupation" id="income_occupation" name="income_occupation[{{$kk}}]" required="required">
                                        <option></option>
                                        @foreach($occupation as $keh => $value)
                                            <option @if($incom->income_occupation == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td class="hidden">
                                <div class="form-group">
                                    <input value="{{$incom->income_unit}}" name="income_unit[{{$kk}}]" type="text" class="income_unit form-control" placeholder="ថ្ងៃ" autocomplete="off" required="required" readonly="readonly">
                                </div>
                            </td>

                            <td>
                                <div class="form-group input-group">
                                    <input value="{{$incom->average_amount}}" id="average_amount_{{$kk}}" name="average_amount[{{$kk}}]" type="text" class="cal_incom average_amount form-control allowNumber otherincome" required="required" autocomplete="off">
                                    <span class="input-group-addon">រៀល</span>
                                </div>
                            </td>

                            <td>
                                <div class="form-group input-group">
                                    <input value="{{$incom->unit_in_month}}" id="unit_in_month_{{$kk}}" name="unit_in_month[{{$kk}}]" type="text" class="form-control allowNumber otherincome unit_in_month" required="required" autocomplete="off">
                                    <span class="input-group-addon">ថ្ងៃ</span>
                                </div>
                            </td>

                            <td>
                                <div class="form-group input-group">
                                    <input value="{{$incom->monthly_income}}" id="monthly_income_{{$kk}}" name="monthly_income[{{$kk}}]" type="text" class="cal_incom monthly_income form-control allowNumber monthly_income_total" readonly="readonly" autocomplete="off">
                                    <span class="input-group-addon">រៀល</span>
                                </div>
                            </td>
                            <td>
                                @if($kk==0)
                                    <a class="btn btn-sm btn-primary" id="add_rows_4">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                @else
                                    <a id="other_income_{{$kk}}" class="btn btn-sm btn-danger remove_rows_4" onclick="remove_4({{$incom->monthly_income}})">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"><span style="float: right;">សរុបចំណូល ប្រចាំខែ សម្រាប់គ្រួសារទាំងមូល (គិតជារៀល):</span></td>
                        <td colspan="2">
                            <div class="input-group">
                                <input value="{{$otherIncome[0]->total_mon_income}}" id="total_monthly_income" class="cal_incom form-control"  type="text" name="total_mon_income" readonly="readonly">
                                <span class="input-group-addon">រៀល</span>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="6"><span style="float: right;">ចំណូលក្រៅពីកសិកម្មជាមធ្យមប្រចាំខែសម្រាប់មនុស្សម្នាក់​​ (១) :</span></td>
                        <td colspan="2">
                            <div class="input-group">
                                <input value="{{$otherIncome[0]->total_inc_person}}" class="cal_incom form-control" id="total_inc_person"  type="text" name="total_inc_person" readonly="readonly">
                                <span class="input-group-addon">រៀល</span>
                            </div>
                        </td>

                    </tr>
                    <tr class="my_hide">
                        <td colspan="6"><span style="float: right;"> 7.B.1  ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមានចំណូលពីសកម្មភាពកសិកម្ម</span></td>
                        <td colspan="2">
                            <div class="input-group">
                                <input class="cal_incom otherincome form-control" id="income_out_farmer_score"  type="text" name="income_out_farmer_score" readonly>
                                <span class="input-group-addon">ពិន្ទុ</span>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>



            <script type="text/javascript">

                /*==================================================================
             ===============================new_rows_4===========================
             ================================================================== */
                //  var step2Row = 1;
                //dataRow_other_income=step2Row;//dataRow;

                var dataRow_other_income = $('.new_rows_4 tr.myrow_4').length-1;
                var dataRowOtherIncome = $('.new_rows_4 tr.myrow_4').length+1;
                //var dataRowOtherIncome = $('.new_rows_4 tr.myrow_4').length;

                $(".new_rows_4").on('click','#add_rows_4',function(){
                    // dataRow_other_income=step2Row;
                    var num_4 = $('.new_rows_4 tr.myrow_4').length;//$('.new_rows_4 tr').length;
                    var otherIncome1 = '<tr class="myrow_4">' +
                        '<td>'+dataRowOtherIncome+'</td>'+
                        '<td>' +
                        '<div class="form-group"><input id="income_name_'+num_4+'" name="income_name['+num_4+']" autocomplete="off" class="form-control income_name" type="text"  required="required"></div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="form-group"><input id="income_age_'+num_4+'" name="income_age['+num_4+']" autocomplete="off" class="form-control income_age allowNumber" type="text" required="required"></div>' +
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
                    dataRowOtherIncome++;
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
                    for(var n=0;n<(dataRowOtherIncome-1);n++){
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
                    $('#add_rows_4').show();
                    $(this).parent().parent().remove();
                    reOrder_other_income();
                    dataRowOtherIncome--;
                });


            </script>

    </li>
    @endif


    @if($gFamily->other_income == 2)
    <li>
        <label class="add_income_agricalture_type">
            <input @if($gFamily->other_income == 2) checked @endif index="2" class="income_agriculture income_not_agriculture" style="margin-right: 10px;" type="radio" value="2" name="income_agricalture_type" id="income_not_agriculture"/>
            ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្ម <spand class="text-danger">*</spand>
        </label>

            <div class="col-sm-12">
                <table class="tb_grid table table-bordered table-striped" width="100%" id="income_not_agriculture_table">
                    <thead>
                    <tr>
                        <th>ល.រ</th>
                        <th width="12%">ឈ្មោះសមាជិក</th>
                        <th width="9%">អាយុ​</th>
                        <th width="15%">មុខរបររកចំណូល <spand class="text-danger">*</spand></th>
                        <th width="9%" class="hidden">ឯកត្តា</th>
                        <th width="18%"​​>ចំណូលជាមធ្យមប្រចាំថ្ងៃ <spand class="text-danger">*</spand></th>
                        <th width="18%"​​>ចំនួនថ្ងៃជាមធ្យមប្រចាំខែ <spand class="text-danger">*</spand></th>
                        <th>ចំណូលមធ្យមប្រចាំខែ</th>
                        <th>សកម្មភាព</th>
                    </tr>
                    </thead>
                    <tbody class="new_rows_5">
                    @foreach($otherIncomeNot as $not => $vl)
                        <tr class="myrow_5">
                            <td>{{$not+1}}</td>
                            <td>
                                <div class="form-group">
                                    <input id="income_name_not_{{$not}}" name="income_name_not[{{$not}}]" autocomplete="off" class="form-control income_name_not" type="text" value="{{$vl->income_name_not}}" required="required">
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input id="income_age_not_{{$not}}" name="income_age_not[{{$not}}]" autocomplete="off" class="form-control income_age_not allowNumber" type="text" value="{{$vl->income_age_not}}" required="required">
                                </div>
                            </td>
                            <td>
                                <div class="form-group add_income_occupation_not">
                                    <select style="width: 100%" autocomplete="off" class="form-control income_occupation_not" id="income_occupation_not" name="income_occupation_not[{{$not}}]" required="required">
                                        <option></option>
                                        @foreach($occupation as $keh => $value)
                                            <option @if($vl->income_occupation_not == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td class="hidden">
                                <div class="form-group add_income_unit_not">
                                    <input name="income_unit_not[{{$not}}]" type="text" class="form-control income_unit_not" placeholder="ថ្ងៃ" value="{{$vl->income_unit_not}}" autocomplete="off" readonly="readonly">
                                </div>
                            </td>
                            <td>
                                <div class="form-group input-group add_average_amount_not">
                                    <input value="{{$vl->average_amount_not}}" id="average_amount_not_{{$not}}" name="average_amount_not[{{$not}}]" type="text" class="cal_incom_2 average_amount_not form-control allowNumber otherincome_not"  autocomplete="off">
                                    <span class="input-group-addon">រៀល</span>
                                </div>
                            </td>

                            <td>
                                <div class="form-group input-group add_unit_in_month_not">
                                    <input value="{{$vl->unit_in_month_not}}" id="unit_in_month_not_{{$not}}" name="unit_in_month_not[{{$not}}]" type="text" class="cal_incom_2 unit_in_month_not form-control allowNumber otherincome_not" autocomplete="off">
                                    <span class="input-group-addon">ថ្ងៃ</span>
                                </div>
                            </td>

                            <td>
                                <div class="form-group input-group">
                                    <input value="{{$vl->monthly_income_not}}" id="monthly_income_not_{{$not}}" name="monthly_income_not[{{$not}}]" type="text" class="cal_incom_2 monthly_income_not form-control allowNumber monthly_income_total_not" readonly="readonly" autocomplete="off">
                                    <span class="input-group-addon">រៀល</span>
                                </div>
                            </td>
                            <td style="text-align:center;">
                                @if($not==0)
                                    <a class="btn btn-sm btn-primary" id="add_rows_5">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                @else
                                    <a id="other_income_{{$not}}" class="btn btn-sm btn-danger remove_rows_5" onclick="remove_5({{$vl->monthly_income_not}})">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="6"><span style="float: right;">សរុបចំណូល ប្រចាំខែ សម្រាប់គ្រួសារទាំងមូល (គិតជារៀល):</span></td>
                        <td colspan="2">
                            <div class="input-group">
                                <input value="{{$otherIncomeNot[0]->total_mon_income_not ?? ''}}" id="total_monthly_income_not" class="cal_incom_2 form-control"  type="text" name="total_mon_income_not" readonly="readonly">
                                <span class="input-group-addon">រៀល</span>
                            </div>
                        </td>

                    </tr>
                    <tr>
                        <td colspan="6"><span style="float: right;">ចំណូលក្រៅពីកសិកម្មជាមធ្យមប្រចាំខែសម្រាប់មនុស្សម្នាក់​​ (១) :</span></td>
                        <td colspan="2">
                            <div class="input-group">
                                <input value="{{$otherIncomeNot[0]->total_inc_person_not ?? ''}}" class="cal_incom_2 form-control" id="total_inc_person_not"  type="text" name="total_inc_person_not" readonly="readonly">
                                <span class="input-group-addon">រៀល</span>
                            </div>
                        </td>

                    </tr>
                    <tr class="my_hide">
                        <td colspan="6"><span style="float: right;">7.B.2 ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្ម</span></td>
                        <td colspan="2">
                            <div class="input-group">
                                <input class="cal_incom form-control" id="income_out_farmer_score_2"  type="text" name="income_out_not_farmer_score" readonly>
                                <span class="input-group-addon">ពិន្ទុ</span>
                            </div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
               
            </div>
            <script type="text/javascript">

                /*==================================================================
                ===============================new_rows_5===========================
                ================================================================== */
                //dataRow_other_income_not=step2Row5;//dataRow;
                var dataRowOtherIncomeNot = $('.new_rows_5 tr.myrow_5').length+1;

                $(".new_rows_5").on('click','#add_rows_5',function(){
                    //dataRow_other_income_not=step2Row5;
                    var num_5 = $('.new_rows_5 tr.myrow_5').length;
                    //var num_5 = step2Row5-1;//$('.new_rows_4 tr').length;
                    var otherIncome1 = '<tr class="myrow_5">' +
                        '<td>'+dataRowOtherIncomeNot+'</td>'+
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
                    dataRowOtherIncomeNot++;
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
                    for(var n=0;n<(dataRowOtherIncomeNot-1);n++){
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
                    $('#add_rows_5').show();
                    $(this).parent().parent().remove();
                    reOrder_other_income_not();
                    dataRowOtherIncomeNot--;
                });
            </script>

    </li>@endif
</ul>
<table class="">
    <tr style="line-height: 50px;" class="my_hide">
        <td><b style="float: right;"> 7. C កុមារ(អាយុក្រោម ១៨ឆ្នាំ )រកចំណូល</b> </td>
        <td>
            <div class="input-group">
                @foreach($store_score as $key => $value)
                <input class="cal_child cal_age form-control" id="income_child_score"  type="text" value="{{$value->income_child}}" name="income_child_score" readonly="readonly">
                <span class="input-group-addon">ពិន្ទុ</span>
                @endforeach
            </div>
        </td>
    </tr>
    <tr class="">
        <td><b style="float: right;">11. វ័យពលកម្ម (ចន្លោះពី១៨ឆ្នាំដល់៦៥ឆ្នាំ) </b>
        </td>
        <td>
            <div class="input-group add_debt_duration" style="width: 300px;">
                @foreach($store_score as $key => $value)
                <input autocomplete="off" class="form-control allowNumber" type="text" name="age_action_score" id="age_action_score" readonly value="{{$value->age_action}}">
                <span class="input-group-addon">ពិន្ទុ</span>
                @endforeach
            </div>
        </td>
    </tr>
</table>


<script>

    {{--$('#income_not_agriculture').click(function (e) {--}}
        {{--var val = $(this).val();--}}
        {{--$('#new_rows_5').empty();--}}
        {{--var header5 = '<table class="tb_grid table table-bordered table-striped" width="100%" id="income_not_agriculture_table">' +--}}
            {{--'<thead>' +--}}
            {{--'<tr>' +--}}
            {{--'<th>ល.រ</th>' +--}}
            {{--'<th width="12%">ឈ្មោះសមាជិក</th>' +--}}
            {{--'<th width="9%">អាយុ​</th>' +--}}
            {{--'<th width="15%">មុខរបររកចំណូល <spand class="text-danger">*</spand></th>' +--}}
            {{--'<th width="9%" class="hidden">ឯកត្តា</th>' +--}}
            {{--'<th width="18%"​​>ចំណូលជាមធ្យមប្រចាំថ្ងៃ <spand class="text-danger">*</spand></th>' +--}}
            {{--'<th width="18%"​​>ចំនួនថ្ងៃជាមធ្យមប្រចាំខែ <spand class="text-danger">*</spand></th>' +--}}
            {{--'<th>ចំណូលមធ្យមប្រចាំខែ</th>' +--}}
            {{--'<th>សកម្មភាព</th>' +--}}
            {{--'</tr>' +--}}
            {{--'</thead>' +--}}
            {{--'<tbody class="newRows5">'+--}}
            {{--'</tbody>' +--}}
            {{--'<tfoot>' +--}}
            {{--'<tr>' +--}}
            {{--'<td colspan="6"><span style="float: right;">សរុបចំណូល ប្រចាំខែ សម្រាប់គ្រួសារទាំងមូល (គិតជារៀល):</span></td>' +--}}
            {{--'<td colspan="2">' +--}}
            {{--'<div class="input-group">' +--}}
            {{--'<input  id="total_monthly_income_not" class="cal_incom_2 form-control"  type="text" name="total_mon_income_not" readonly="readonly">' +--}}
            {{--'<span class="input-group-addon">រៀល</span>' +--}}
            {{--'</div>' +--}}
            {{--'</td>' +--}}
            {{--'</tr>' +--}}
            {{--'<tr>' +--}}
            {{--'<td colspan="6"><span style="float: right;">ចំណូលក្រៅពីកសិកម្មជាមធ្យមប្រចាំខែសម្រាប់មនុស្សម្នាក់​​ (១) :</span></td>' +--}}
            {{--'<td colspan="2">' +--}}
            {{--'<div class="input-group">' +--}}
            {{--'<input class="cal_incom_2 form-control" id="total_inc_person_not"  type="text" name="total_inc_person_not" readonly="readonly">' +--}}
            {{--'<span class="input-group-addon">រៀល</span>' +--}}
            {{--'</div>' +--}}
            {{--'</td>' +--}}
            {{--'</tr>' +--}}
            {{--'<tr class="my_hide">' +--}}
            {{--'<td colspan="6"><span style="float: right;">7.B.2 ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្ម</span></td>' +--}}
            {{--'<td colspan="2">' +--}}
            {{--'<div class="input-group">' +--}}
            {{--'<input class="cal_incom form-control" id="income_out_farmer_score_2"  type="text" name="income_out_not_farmer_score" readonly>' +--}}
            {{--'<span class="input-group-addon">ពិន្ទុ</span>' +--}}
            {{--'</div>' +--}}
            {{--'</td>' +--}}
            {{--'</tr>' +--}}
            {{--'</tfoot>' +--}}
            {{--'</table>' +--}}
            {{--'<table class="my_hide">' +--}}
            {{--'<tr style="line-height: 50px;" class="my_hide">' +--}}
            {{--'<td><b style="float: right;"> 7. C កុមារ(អាយុក្រោម ១៨ឆ្នាំ )រកចំណូល</b> </td>' +--}}
            {{--'<td>' +--}}
            {{--'<div class="input-group">' +--}}
            {{--'<input class="cal_child cal_age form-control" id="income_child_score"  type="text" name="income_child_score">' +--}}
            {{--'<span class="input-group-addon">ពិន្ទុ</span>' +--}}
            {{--'</div>' +--}}
            {{--'</td>' +--}}
            {{--'</tr>' +--}}
            {{--'<tr class="my_hide">' +--}}
            {{--'<td><b style="float: right;">11. វ័យពលកម្ម (ចន្លោះពី១៨ឆ្នាំដល់៦៥ឆ្នាំ) </b>' +--}}
            {{--'</td>' +--}}
            {{--'<td>' +--}}
            {{--'<div class="input-group add_debt_duration" style="width: 300px;">' +--}}
            {{--'<input autocomplete="off" class="form-control allowNumber" type="text" name="age_action_score" id="age_action_score" readonly value="2.5">' +--}}
            {{--'<span class="input-group-addon">ពិន្ទុ</span>' +--}}
            {{--'</div>' +--}}
            {{--'</td>' +--}}
            {{--'</tr>' +--}}
            {{--'</table>';--}}

        {{--if(val == 2){--}}
            {{--var row_num5 = $('.new_rows tr').length;--}}
            {{--$('#new_rows_5').append(header5);--}}

            {{--for(i=0;i<row_num5;i++) {--}}

                {{--if (i == 0) {--}}
                    {{--plus_not = '<a class="btn btn-sm btn-primary" id="add_rows_5"><span class="glyphicon glyphicon-plus"></span></a>';--}}
                {{--} else {--}}
                    {{--plus_not = '<a id="other_income_not_' + i + '" class="btn btn-sm btn-danger remove_rows_5"><span class="glyphicon glyphicon-minus"></span></a>';--}}
                {{--}--}}
                {{--var nick = $('.nick_name_'+i).val();--}}
                {{--var m_age = $('.age_'+i).val();--}}


                {{--var otherIncome_not = '<tr class="myrow_5">' +--}}
                    {{--'<td>'+(i+1)+'</td>'+--}}
                    {{--'<td>' +--}}
                    {{--'<div class="form-group"><input id="income_name_not_'+i+'" name="income_name_not['+i+']" autocomplete="off" class="form-control income_name_not" type="text" value="'+nick+'" readonly="readonly" required="required"></div>' +--}}
                    {{--'</td>' +--}}
                    {{--'<td>' +--}}
                    {{--'<div class="form-group"><input id="income_age_not_'+i+'" name="income_age_not['+i+']" autocomplete="off" class="form-control income_age_not" type="text" value="'+m_age+'" readonly="readonly" required="required"></div>' +--}}
                    {{--'</td>' +--}}
                    {{--'<td>' +--}}
                    {{--'<div class="form-group add_income_occupation_not">' +--}}
                    {{--'<select style="width: 100%" autocomplete="off" class="form-control income_occupation_not" id="income_occupation_not" name="income_occupation_not['+i+']" required="required">' +--}}
                    {{--'<option></option>' +--}}
                    {{--'@foreach($occupation as $keh => $value)' +--}}
                    {{--'<option value="{{$value->id}}">{{$value->name_kh}}</option>' +--}}
                    {{--'@endforeach' +--}}
                    {{--'</select>'+--}}
                    {{--'</div>' +--}}
                    {{--'</td>' +--}}
                    {{--'<td class="hidden">' +--}}
                    {{--'<div class="form-group add_income_unit_not">' +--}}
                    {{--'<input name="income_unit_not['+i+']" type="text" class="form-control income_unit_not" placeholder="ថ្ងៃ" value="day" autocomplete="off" readonly="readonly">' +--}}
                    {{--'</div>' +--}}
                    {{--'</td>'+--}}

                    {{--'<td>'+--}}
                    {{--'<div class="form-group input-group add_average_amount_not">'+--}}
                    {{--'<input id="average_amount_not_'+i+'" name="average_amount_not['+i+']" type="text" class="cal_incom_2 average_amount_not form-control allowNumber otherincome_not"  autocomplete="off">'+--}}
                    {{--'<span class="input-group-addon">រៀល</span>'+--}}
                    {{--'</div>'+--}}
                    {{--'</td>'+--}}

                    {{--'<td>' +--}}
                    {{--'<div class="form-group input-group add_unit_in_month_not">' +--}}
                    {{--'<input id="unit_in_month_not_'+i+'" name="unit_in_month_not['+i+']" type="text" class="cal_incom_2 unit_in_month_not form-control allowNumber otherincome_not" autocomplete="off">'+--}}
                    {{--'<span class="input-group-addon">ថ្ងៃ</span>' +--}}
                    {{--'</div>' +--}}
                    {{--'</td>'+--}}

                    {{--'<td>' +--}}
                    {{--'<div class="form-group input-group">' +--}}
                    {{--'<input id="monthly_income_not_'+i+'" name="monthly_income_not['+i+']" type="text" class="cal_incom_2 monthly_income_not form-control allowNumber monthly_income_total_not" readonly="readonly" autocomplete="off">'+--}}
                    {{--'<span class="input-group-addon">រៀល</span>' +--}}
                    {{--'</div>' +--}}
                    {{--'</td>'+--}}
                    {{--'<td style="text-align:center;">'+plus_not+'</td>' +--}}
                    {{--'</tr>';--}}
                {{--$('.newRows5').append(otherIncome_not);--}}
            {{--}--}}

            {{--AllowNumber();--}}

        {{--}--}}



        {{--AllowNumber();--}}
        {{--var num_4_1 = $('.newRows4 tr').length+1;--}}
        {{--$('.otherincome').change(function () {--}}
            {{--for(var ii=0; ii<num_4_1; ii++) {--}}
                {{--var sum = 0;--}}
                {{--var unit_in_month = $('#unit_in_month_'+ii).val();--}}

                {{--var average_amount = $('#average_amount_'+ii).val();--}}
                {{--if(unit_in_month > 31){$('#unit_in_month_'+ii).val('');}--}}
                {{--sum = Number(unit_in_month * average_amount);--}}
                {{--$("#other_income_"+ii).attr({"onclick": "remove_4("+sum+")"});--}}
                {{--$('#monthly_income_'+ii).val(sum);--}}
            {{--}--}}
        {{--});--}}
        {{--$(".income_occupation").select2({ allowClear:true, placeholder: "មុខរបររកចំណូល"});--}}

        {{--$('.otherincome').change(function () {--}}
            {{--var arr = document.getElementsByClassName('monthly_income_total');--}}
            {{--var tot=0;--}}
            {{--for(var i=0;i<arr.length;i++){--}}
                {{--if(parseInt(arr[i].value))--}}
                    {{--tot += parseInt(arr[i].value);--}}
            {{--}--}}
            {{--$('#total_monthly_income').val(tot);--}}
            {{--var totalperson = $('#total_people').val();--}}
            {{--if(totalperson == null || totalperson == ''){--}}
                {{--$('#total_inc_person').val((tot/1).toFixed(2));--}}
            {{--}else{--}}
                {{--$('#total_inc_person').val((tot/totalperson).toFixed(2));--}}
            {{--}--}}
        {{--});--}}



    {{--});--}}

    $('.cal_age').change(function(){
        var my_id = $('.myrow').attr('index');
        var small_age = $('.cal_child_'+my_id).val();
        $('.txt_age').each(function(i){
            var age = $(this).val();
            if(i > 0 && (parseFloat(age) == 10)) small_age = age;
        });
        $('#income_child_score').val(small_age);
    });
    $('.income_agriculture').click(function () {
        var index = $(this).attr('index');
        // console.log(index);
        if(index == 1){ alert(1);
            $("#income_agriculture_table").removeClass('hidden');
            $("#income_not_agriculture_table").addClass('hidden');
        }else{ alert(2);
            $("#income_not_agriculture_table").removeClass('hidden');
            $("#income_agriculture_table").addClass('hidden');

            $(".getdata").change(function (){
                var od_code = $('.getdata').val();
                $.ajax({
                    type: 'GET',
                    url: "",
                    data: {'od_code': od_code},
                    beforeSend: function(){
                        $("#loading").fadeIn();
                    },
                    success: function (data) {
                        // console.log(data);
                        var obj = JSON.parse(data);
                        // console.log(obj);
                        //$("#interview_code").val('');
                        $("#showtype").val(obj);
                    },
                    complete: function(){
                        $("#loading").fadeOut(100);
                    },
                    error: function (report){
                        console.log(report);
                    }
                });
            });
        }
    });
</script>