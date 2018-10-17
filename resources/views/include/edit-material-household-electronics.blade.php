<div class="col-sm-12">
    <div class="row">
        <h4>គ.៩) ទ្រព្យ​សម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិច​របស់​គ្រួសារ</h4>
    </div>
    <table class="tb_grid table table-bordered table-striped" width="100%">
        <thead>
        <tr>
            <th rowspan="2">ល.រ</th>
            <th rowspan="2">ប្រភេទសម្ភារប្រើបា្រស់ <spand class="text-danger">*</spand></th>
            <th colspan="2">តម្លៃទីផ្សារ ប្រសិន​លក់ ​</th>
            <th rowspan="2">តម្លៃ​សរុប (រៀល)</th>
            <th rowspan="2">សកម្មភាព</th>
        </tr>
        <tr>
            <th>បរិមាណ <spand class="text-danger">*</spand></th>
            <th>តម្លៃ <spand class="text-danger">*</spand></th>
        </tr>
        </thead>
        <tbody class="new_rows_1">
            @foreach($material as $key =>$v)
                <tr class="myrow">
                    <td>{{$key+1}}</td>
                    <td>
                        <div class="form-group add_type_meterial_{{$key}}" id="typeMeterial">
                            <select class="form-control type_meterial" id="type_meterial_{{$key}}" name="type_meterial[{{$key}}]">
                                <option></option>
                                @foreach($typemeterial as $keh => $value)
                                    <option @if($v->type_meterial_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input value="{{$v->number_meterial}}" id="number_meterial_{{$key}}" name="number_meterial[{{$key}}]" type="text" class="cal_el number_meterial form-control allowNumber meterial" required="required" />
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input value="{{$v->market_value_meterial}}" id="market_value_meterial_{{$key}}" name="market_value_meterial[{{$key}}]" type="text"  class="cal_el market_value_meterial form-control allowNumber meterial" required="required" />
                        </div>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input value="{{$v->total_rail}}" id="total_rail_meterial_{{$key}}" name="total_rail_meterial[{{$key}}]" type="text" required="required" class="cal_el total_rail_meterial form-control totalallowNumber_meterial"  readonly="readonly"/>
                            <span class="input-group-addon">រៀល</span>
                        </div>
                    </td>
                    <td style="text-align:center;">
                        @if($key == 0)
                            <a  class="btn btn-primary btn-sm" id="add_rows_1">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        @else
                            <a id="meterial_{{$key}}" class="btn remove_rows_1 btn-danger btn-sm" onclick="remove_1({{$v->total_rail}})">
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="4"><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
            <td>
                <div class="form-group input-group">
                    <input value="{{$material[0]->total_meterial_costs}}" id="total_meterial_costs" name="total_meterial_costs" type="text" required="required" class="cal_el form-control" readonly="readonly"/>
                    <span class="input-group-addon">រៀល</span>
                </div>
            </td>
            <td></td>
        </tr>
        <tr class="my_hide">
            <td colspan="4"><b style="float:right">4. ទ្រព្យសម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិចរបស់គ្រួសារ</b>
            </td>
            <td>
                <div class="form-group input-group">
                    <input id="el_score" name="price_electronic_score" type="text" required="required" class="cal_el form-control" readonly="readonly"/>
                    <span class="input-group-addon">ពិន្ទុ</span>
                </div>
            </td>
            <td></td>
        </tr>
        </tfoot>
    </table>
</div>

<script type="text/javascript">

    /*==================================================================
 ===============================new_rows_1===========================
 ================================================================== */
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
    });

    var dataRow_meterial = $('.new_rows_1 tr.myrow').length-1;
    var dataRow_meterial_add = $('.new_rows_1 tr.myrow').length+1;
    var dataRowMeterial = $('.new_rows_1 tr.myrow').length;

    //var dataRow_meterial = 2;
    $('#add_rows_1').click(function(){ //alert($m_id);
        dataRow_meterial++;
        //alert(dataRow_meterial);
        var row_1 = $('.new_rows_1 tr.myrow').length;
//        if(row_1 >= 6){
//            // $('#add_rows_1').hide();
//            alert('ប្រភេទសម្ភារប្រើបា្រស់​របស់​គ្រួសារមិនអនុញ្ញាតអោយបញ្ចូលលើសពីរការកំណត់ទេ');
//            return false;
//        }
        reOrder_meterial();
        // var rowindex_1 = row_1+1;
        var tab_rows_1 ='<tr class="myrow">'+
            '<td>'+dataRow_meterial_add+'</td>'+
            '<td>' +
            '<div class="form-group add_type_meterial_'+row_1+'" id="typeMeterial">'+
            '<select id="type_meterial_'+row_1+'" class="form-control type_meterial" id="type_meterial" name="type_meterial['+row_1+']"> <option></option>@foreach($typemeterial as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
            '</div>'+
            '</td>'+
            '<td><div class="form-group"><input autocomplete="off" id="number_meterial_'+row_1+'" type="text" class="cal_el number_meterial form-control allowNumber meterial" name="number_meterial['+row_1+']" required="required"/></div></td>'+
            '<td><div class="form-group"><input autocomplete="off" id="market_value_meterial_'+row_1+'" type="text" class="cal_el market_value_meterial form-control allowNumber meterial" name="market_value_meterial['+row_1+']" required="required"/></div></td>'+
            '<td><div class="form-group input-group"><input id="total_rail_meterial_'+row_1+'" type="text" required="required" class="cal_el total_rail_meterial form-control totalallowNumber_meterial" name="total_rail_meterial['+row_1+']" readonly="readonly"/><span class="input-group-addon">រៀល</span></div></div></td>'+
            '<td><a id="meterial_'+row_1+'" class="btn btn-danger btn-sm remove_rows_1"><span class="glyphicon glyphicon-minus"></span></a></td>'+
            '</tr>';
        $(".new_rows_1").append(tab_rows_1);
        dataRow_meterial++;
        dataRow_meterial_add++;
        $(".type_meterial").select2({ allowClear:true, placeholder: "សម្ភារប្រើបា្រស់"});
        AllowNumber();
        var row_num = $('.new_rows_1 tr').length;



        $('.cal_el').change(function(){
            var total = $('#total_meterial_costs').val();
            //  alert(total);
        });
        $('.meterial').change(function () {
            for(var i=0; i<row_num; i++) {
                var sum = 0;
                var number_meterial = 0;
                var market_value_meterial = 0;
                 number_meterial = $('#number_meterial_'+i).val();
                 market_value_meterial = $('#market_value_meterial_'+i).val();
                sum = Number(number_meterial * market_value_meterial);
                $("#meterial_"+i).attr({"onclick": "remove_1("+sum+")"});
                $('#total_rail_meterial_'+i).val(sum);
                $('.cal_el').change(function(){
                    var total = $('#total_meterial_costs').val();
                    if( total>=0 && total <=400000) { $('#el_score').val(6); }
                    else if( total>=404000 && total<=800000 ){ $('#el_score').val(4);}
                    else if( total>=804000 && total<= 1200000){ $('#el_score').val(2);}
                    else{ $('#el_score').val(0); }
                });
            }
        });

        $('.meterial').change(function () {
            var arr = document.getElementsByClassName('totalallowNumber_meterial');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('total_meterial_costs').value = tot;
        });
    });


    function reOrder_meterial(){
        for(var n=2;n<(dataRow_meterial_add-1);n++){
            $('.new_rows_1  tr:eq(' + (n-1) +') td:first-child').html(n);
            $('.new_rows_1  tr:eq(' + (n-1) +') td .type_meterial').attr('name', 'type_meterial['+(n-1)+']');
            $('.new_rows_1  tr:eq(' + (n-1) +') td .type_meterial').attr('id', 'type_meterial_'+(n-1));
            $('.new_rows_1  tr:eq(' + (n-1) +') td #typeMeterial').attr('class', 'form-group add_type_meterial_'+(n-1));
            $('.new_rows_1  tr:eq(' + (n-1) +') td .number_meterial').attr('name', 'number_meterial['+(n-1)+']');
            $('.new_rows_1  tr:eq(' + (n-1) +') td .number_meterial').attr('id', 'number_meterial_'+(n-1));
            $('.new_rows_1  tr:eq(' + (n-1) +') td .market_value_meterial').attr('name', 'market_value_meterial['+(n-1)+']');
            $('.new_rows_1  tr:eq(' + (n-1) +') td .market_value_meterial').attr('id', 'market_value_meterial_'+(n-1));
            $('.new_rows_1  tr:eq(' + (n-1) +') td .total_rail_meterial').attr('name', 'total_rail_meterial['+(n-1)+']');
            $('.new_rows_1  tr:eq(' + (n-1) +') td .total_rail_meterial').attr('id', 'total_rail_meterial_'+(n-1));
            $('.new_rows_1  tr:eq(' + (n-1) +') td .remove_rows_1').attr('id', 'meterial_'+(n-1));

        }
    }
    //remove add
    function remove_1(val) {
        var total_costs = parseInt($('#total_meterial_costs').val()) - val;
        $('#total_meterial_costs').val(total_costs);
    }
    $(".new_rows_1").on('click','.remove_rows_1',function(e){
        var result = window.confirm('Are you sure?');
        if (result == false) {
            e.preventDefault();
            return false;
        }

        $('#add_rows_1').show();
        $(this).parent().parent().remove();
        reOrder_meterial();
        dataRow_meterial--;
        dataRow_meterial_add--;
    });

    $('.meterial').change(function () {

        for(var i=0; i<dataRowMeterial; i++) {
            var sum = 0;
            var number_meterial = 0;
            var market_value_meterial = 0;
             number_meterial = parseInt($('#number_meterial_'+i).val());
             market_value_meterial = parseInt($('#market_value_meterial_'+i).val());

            $('.meterial').each(function () {
                sum = Number(number_meterial * market_value_meterial);
            });
            $("#meterial_"+i).attr({"onclick": "remove_1("+sum+")"});
            $('#total_rail_meterial_'+i).val(sum);

            $('.cal_el').change(function () {
                var total = $('#total_meterial_costs').val();
                if (total >= 0 && total <= 400000) {
                    $('#el_score').val(6);
                }
                else if (total >= 404000 && total <= 800000) {
                    $('#el_score').val(4);
                }
                else if (total >= 804000 && total <= 1200000) {
                    $('#el_score').val(2);
                }
                else {
                    $('#el_score').val(0);
                }
            });
        }

    });

    $('.meterial').change(function () {
        var arr = document.getElementsByClassName('totalallowNumber_meterial');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        $('#total_meterial_costs').val(tot);
    });

    //type_vehicle
    $(".type_meterial").select2({allowClear:true, placeholder: 'សម្ភារប្រើបា្រស់'});
    $("#go_hospital").select2({allowClear:true, placeholder: 'មធ្យោបាយធ្វើដំណើរ'});
    //type_vehicle
    $(".type_vehicle").select2({allowClear:true, placeholder: 'សម្ភារប្រើបា្រស់'});

</script>