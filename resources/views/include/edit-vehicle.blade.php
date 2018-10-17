<div class="col-sm-12"><hr> </div>
<div class="col-sm-12">

    <h4>គ.១១) យានជំនិះជាទ្រព្យសម្បត្តិផ្ទាល់របស់​គ្រួសារ</h4>
    <div class="col-sm-6">
        <table class="table-home">
            <tr>
                <td width="50%"><h5>តើអ្នកប្រើមធ្យោបាយអ្វីមកមន្ទីរពេទ្យ?</h5></td>
                <td width="50%">
                    <div class="form-group go_hospital">
                        <select class="form-control" id="go_hospital" name="go_hospital">
                            <option></option>
                            @foreach($typetransport as $keh => $value)
                                <option @if($gFamily != null && $gFamily->transport_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <table class="tb_grid table table-bordered table-striped" width="100%">
        <thead>
        <tr>
            <th rowspan="2">ល.រ</th>
            <th rowspan="2">ប្រភេទសម្ភារប្រើបា្រស់ <spand class="text-danger">*</spand></th>
            <th colspan="2">តម្លៃទីផ្សារ ប្រសិន​លក់​វា​ចេញ</th>
            <th rowspan="2">តម្លៃ​សរុប (រៀល)</th>
            <th rowspan="2">សកម្មភាព</th>
        </tr>
        <tr>
            <th>បរិមាណ <spand class="text-danger">*</spand></th>
            <th>តម្លៃ <spand class="text-danger">*</spand></th>
        </tr>
        </thead>
        <tbody class="new_rows_2">
        @foreach($vehicle as $key => $gg)
            <tr class="myrow_2">
                <td>1</td>
                <td>
                    <div class="form-group add_type_vehicle">
                        <select class="form-control type_vehicle" id="type_vehicle" name="type_vehicle[0]">
                            <option></option>
                            @foreach($typetransport as $keh => $value)
                                <option @if($gg->type_vehicle_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input value="{{$gg->number_vehicle}}" id="number_vehicle" name="number_vehicle[0]" type="text" class="form-control allowNumber vehicle cal_v" required="required" />
                    </div>
                </td>
                <td>
                    <div class="form-group input-group">
                        <input value="{{$gg->market_value_vehicle}}" id="market_value_vehicle" name="market_value_vehicle[0]" type="text" class="form-control allowNumber vehicle cal_v" required="required" />
                        <span class="input-group-addon">រៀល</span>
                    </div>
                </td>
                <td>
                    <div class="form-group input-group">
                        <input value="{{$gg->total_rail_vehicle}}" id="total_rail_vehicle" name="total_rail_vehicle[0]" type="text" required="required" class="form-control totalallowNumber_vehicle" readonly="readonly"/>
                        <span class="input-group-addon">រៀល</span>
                    </div>
                </td>
                <td style="text-align:center;">
                    @if($key==0)
                        <a  class="btn btn-primary btn-sm" id="add_rows_2">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    @else
                        <a id="vehicle_{{$key}}" class="btn remove_rows_2 btn-danger btn-sm">
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
                    <input value="{{$vehicle[0]->total_vehicle_costs}}" id="total_vehicle_costs" name="total_vehicle_costs" type="text" required="required" class="form-control vehicle cal_v" readonly="readonly"/>
                    <span class="input-group-addon">រៀល</span>
                </div>
            </td>
            <td></td>
        </tr>
        <tr class="my_hide">
            <td colspan="4"><b style="float:right">6. អំពីយានជំនិះរបស់គ្រួសារ</b></td>
            <td>
                <div class="form-group input-group">
                    <input id="score_v" name="vehicle_score" type="text" required="required" class="form-control vehicle cal_v" readonly="readonly"/>
                    <span class="input-group-addon">ពិន្ទុ</span>
                </div>
            </td>
            <td></td>
        </tr>
        </tfoot>
    </table>
</div>
<script>
    /*==================================================================
     ===============================new_rows_2===========================
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
</script>