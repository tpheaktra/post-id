<div class="col-sm-12"><hr> </div>
<div class="col-sm-12">
    <h4>គ.១៣) សុខភាព និងពិការភាព</h4>
    <ul class="li-none">
        @foreach($healthLink as $key =>$vv)
            <li>
                <label>
                    <input @if($vv->health_id == $vv->id) checked @endif class="health_id_{{$key}} cal_health" style="margin-right: 10px;" type="checkbox" value="{{$vv->id}}" name="health_id[{{$key}}]" multiple/>
                    {{$vv->name_kh}}
                </label>
                @if($vv->id == 1)
                    <label id="health_1">
                        @if($vv->health_id == 1)
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <td>ក្មេង + អ្នក  អាយុ &lt; 65ឆ្នាំ </td>
                                        <td> ចាស អាយុ≥65 ឆ្នាំ</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input value="{{$vv->kids_then65}}" autocomplete="off" name="kids_then65" id="kids_then65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input value="{{$vv->old_bigger65}}" autocomplete="off" name="old_bigger65" id="old_bigger65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <script type="text/javascript">
                                $('.checkNumberPeople').change(function (e) {
                                    var totalPople = $('.new_rows tr.myrow').length;
                                    //alert(totalPople);
                                    //var nn = $(this).val();
                                    var sum = 0;
                                    var a = $('#kids_then65').val() ? $('#kids_then65').val() : 0;
                                    var b = $('#old_bigger65').val() ? $('#old_bigger65').val() : 0;
                                    var c = $('#kids_50_then65').val() ? $('#kids_50_then65').val() : 0;
                                    var d = $('#old_50_bigger65').val() ? $('#old_50_bigger65').val() : 0;
                                    sum = Number(parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d));
                                    if(sum > totalPople) {
                                        $('#kids_then65').val('');
                                        $('#old_bigger65').val('');
                                    }
                                });
                            </script>
                        @endif
                    </label>
                @endif
                @if($vv->id == 2)
                    <label id="health_2">
                        @if($vv->health_id == 2)
                            <div class="col-sm-12">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                    <tr>
                                        <td>ក្មេង + អ្នក  អាយុ &lt; 65ឆ្នាំ </td>
                                        <td> ចាស អាយុ≥65 ឆ្នាំ</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <input value="{{$vv->kids_50_then65}}" autocomplete="off" name="kids_50_then65" id="kids_50_then65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input value="{{$vv->old_50_bigger65}}" autocomplete="off" name="old_50_bigger65" id="old_50_bigger65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <script type="text/javascript">
                                $('.checkNumberPeople').change(function (e) {
                                    var totalPople = $('.new_rows tr.myrow').length;
                                    //alert(totalPople);
                                    //var nn = $(this).val();
                                    var sum = 0;
                                    var a = $('#kids_then65').val() ? $('#kids_then65').val() : 0;
                                    var b = $('#old_bigger65').val() ? $('#old_bigger65').val() : 0;
                                    var c = $('#kids_50_then65').val() ? $('#kids_50_then65').val() : 0;
                                    var d = $('#old_50_bigger65').val() ? $('#old_50_bigger65').val() : 0;
                                    sum = Number(parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d));
                                    if(sum > totalPople) {
//                                        $('#kids_then65').val('');
//                                        $('#old_bigger65').val('');
                                        $('#kids_50_then65').val('');
                                        $('#old_50_bigger65').val('');
                                    }

                                });
                            </script>
                        @endif
                    </label>
                @endif
            </li>
        @endforeach
    </ul>
    <P class="my_hide" >8. ជំងឺ,របួសនិងពិការភាព</P>
    <div class="my_hide form-group input-group" style="width: 300px;">
        @foreach($store_score as $key => $value)
        <input id="score_health" name="disease_score" value="{{$value->disease}}" type="text" required="required" class="cal_health form-control" readonly="readonly"/>
        <span class="input-group-addon">ពិន្ទុ</span>
        @endforeach
    </div>
    <script type="text/javascript">


        $('.health_id_0').click(function () {
            var health_check = $('input[type=checkbox]:checked.health_id_0').val();//$("input[name=health_id]:checked").val();
            // alert(health_check);
            $('#health_1').empty();
            if(health_check == 1){
                var health1 = '<div class="col-sm-12">' +
                    '<table class="table table-bordered table-striped">' +
                    '<tbody>' +
                    '<tr>' +
                    '<td>ក្មេង + អ្នក  អាយុ &lt; 65ឆ្នាំ </td>' +
                    '<td> ចាស អាយុ≥65 ឆ្នាំ</td>' +
                    '</tr>'+
                    '<tr>'+
                    '<td>'+
                    '<div class="form-group">' +
                    '<input value="{{$vv->kids_then65}}" autocomplete="off" name="kids_then65" id="kids_then65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
                    '</div>'+
                    '</td>'+
                    '<td>'+
                    '<div class="form-group">' +
                    '<input value="{{$vv->old_bigger65}}" autocomplete="off" name="old_bigger65" id="old_bigger65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
                    '</div>'+
                    '</td>'+
                    '</tr>'+
                    '</tbody>'+
                    '</table>'+
                    '</div>';
                $('#health_1').append(health1);
                AllowNumber();

                $('.checkNumberPeople').change(function (e) {
                    var totalPople = $('.new_rows tr.myrow').length;
                    //alert(totalPople);
                    //var nn = $(this).val();
                    var sum = 0;
                    var a = $('#kids_then65').val() ? $('#kids_then65').val() : 0;
                    var b = $('#old_bigger65').val() ? $('#old_bigger65').val() : 0;
                    var c = $('#kids_50_then65').val() ? $('#kids_50_then65').val() : 0;
                    var d = $('#old_50_bigger65').val() ? $('#old_50_bigger65').val() : 0;
                    sum = Number(parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d));
                    if(sum > totalPople) {
                        $('#kids_then65').val('');
                        $('#old_bigger65').val('');
//                        $('#kids_50_then65').val('');
//                        $('#old_50_bigger65').val('');
                    }

                });

                $('.cal_health').keyup(function(){
                    var kids_then65 = $('#kids_then65').val();
                    var old_bigger65 = $('#old_bigger65').val();
                    if(kids_then65>=2){
                        $('#score_health').val(10);
                    }else if(kids_then65==1){
                        $('#score_health').val(7);
                    }else if(old_bigger65>=1){
                        $('#score_health').val(4);
                    }else{
                        $('#score_health').val(0);
                    }
                });

            }else{
                $('#health_1').empty();
            }

        });

        $('.health_id_1').click(function () {
            var health_check = $('input[type=checkbox]:checked.health_id_1').val();
            // alert(health_check);
            $('#health_2').empty();
            if (health_check == 2) {
                $('#health_2').empty();
                var health2 = '<div class="col-sm-12">' +
                    '<table class="table table-bordered table-striped">' +
                    '<tbody>' +
                    '<tr>' +
                    '<td>ក្មេង + អ្នក  អាយុ &lt; 65ឆ្នាំ </td>' +
                    '<td> ចាស អាយុ≥65 ឆ្នាំ</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input value="{{$vv->kids_50_then65}}" autocomplete="off" name="kids_50_then65" id="kids_50_then65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input value="{{$vv->old_50_bigger65}}" autocomplete="off" name="old_50_bigger65" id="old_50_bigger65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</div>';
                $('#health_2').append(health2);
                AllowNumber();
                $('.checkNumberPeople').change(function (e) {
                    var totalPople = $('.new_rows tr.myrow').length;
                    //alert(totalPople);
                    //var nn = $(this).val();
                    var sum = 0;
                    var a = $('#kids_then65').val() ? $('#kids_then65').val() : 0;
                    var b = $('#old_bigger65').val() ? $('#old_bigger65').val() : 0;
                    var c = $('#kids_50_then65').val() ? $('#kids_50_then65').val() : 0;
                    var d = $('#old_50_bigger65').val() ? $('#old_50_bigger65').val() : 0;
                    sum = Number(parseInt(a) + parseInt(b) + parseInt(c) + parseInt(d));
                    if(sum > totalPople) {
//                        $('#kids_then65').val('');
//                        $('#old_bigger65').val('');
                        $('#kids_50_then65').val('');
                        $('#old_50_bigger65').val('');
                    }

                });

                $('.cal_health').keyup(function(){
                    var kids_50_then65 = $('#kids_50_then65').val();
                    var old_50_bigger65 = $('#old_50_bigger65').val();
                    if(kids_50_then65>=2){
                        $('#score_health').val(7);
                    }else if(kids_50_then65>0 && kids_50_then65<=1){
                        $('#score_health').val(4);
                    }else{
                        $('#score_health').val(0);
                    }
                });
            }else {
                $('#health_2').empty();
                $('#score_health').val(0);
            }
        });
    </script>