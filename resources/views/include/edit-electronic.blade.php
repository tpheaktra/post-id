<div class="col-sm-12"><hr> </div>
<div class="col-sm-12">

    <h4>គ.១០) អគ្គិសនី</h4>
    <p>តើបានតបណ្តាញអគ្គិសនី (រដ្ឋឬឯកជន) ដែរឬទេ? <spand class="text-danger">*</spand></p>
    <div>
        <ul class="li-none">
            @foreach($question_electric as $key => $qe)
                <li class="add_q_electric">
                    <label><input @if($gFamily->q_electric_id == $qe->id) checked @endif style="margin-right:10px;"  class="electric" value="{{$qe->id}}" type="radio" name="q_electric"> {{$qe->name_kh}}</label>
                </li>
                @if($qe->id == 1)

                    <li id="electric_yes"> @if($gFamily->q_electric_id ==1)
                            <p>ប្រសិនបានតបណ្តាញអគ្គិសនី </p>
                            <table class="tb_grid table table-bordered table-striped ">
                                <tr>
                                    <th>តម្លៃក្នុងមួយគីឡូវ៉ាត់/ម៉ោង <spand class="text-danger">*</spand></th>
                                    <th>ចំនួនគីឡូវ៉ាត់ដែលប្រើជាមធ្យមក្នុងមួយខែ <spand class="text-danger">*</spand></th>
                                    <th>ចំណាយ​ជា​មធ្យមក្នុងមួយខែ</th>
                                </tr>
                                <tr>
                                    <td><div class="input-group form-group"><input value="{{$yesElectrict->costs_in_hour ?? ''}}" autocomplete="off" class="cal_t form-control allowNumber myelectric" id="costs_in_hour" required="required" type="text" name="costs_in_hour" required="required"><span class="input-group-addon">រៀល</span></div></td>
                                    <td><div class="input-group form-group"><input value="{{$yesElectrict->number_in_month ?? ''}}" autocomplete="off" class="cal_t form-control allowNumber myelectric" id="number_in_month" required="required" type="text" name="number_in_month" required="required"><span class="input-group-addon">គីឡូវ៉ាត់</span></div></td>
                                    <td><div class="input-group form-group"><input value="{{$yesElectrict->costs_per_month ?? ''}}" autocomplete="off" class="cal_t form-control allowNumber" id="costs_per_month" required="required" type="text" name="costs_per_month" readonly="readonly"><span class="input-group-addon">រៀល</span></div></td>
                                </tr>
                                <tr class="my_hide">
                                    <td></td>
                                    <td></td>
                                    <td><div class="input-group form-group"><input autocomplete="off" class="cal_t form-control allowNumber" id="cost_score" required="required" type="text" name="use_energy_elect_score" readonly="readonly"><span class="input-group-addon">ពិន្ទុ</span></div></td>
                                </tr>
                            </table>@endif
                    </li>

                @endif
                @if($qe->id == 2)
                    <li id="electric_no">
                        @if($gFamily->q_electric_id ==2)
                            <p>ប្រសិនមិនបានតបណ្តាញអគ្គិសនី</p>
                            <div class="add_electric_grid">
                                <ul class="li-none">
                                    @foreach($electricgrid as $key=>$e)<li>
                                        <label>
                                            <input @if($noElectrict->electric_grid_id == $e->id) checked @endif style="margin-right:10px;" class="electric_grid_id" value="{{$e->id}}" type="radio" name="electric_grid_id" ​​> {{$e->name_kh}}
                                        </label>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="my_hide form-group input-group" style="width: 300px;">
                                <input id="score_power" type="text" name="no_energy_elect_score" class="score_power form-control allowNumber"​ readonly>
                                <span class="input-group-addon">ពិន្ទុ</span>
                            </div>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>
    </div>


    <script>
        $('.electric').click(function () {
            var electric = $('input[name=q_electric]:checked').val();
            $('#electric_yes').empty();
            $('#electric_no').empty();
            if(electric == 1){
                $('#electric_yes').append('<p>ប្រសិនបានតបណ្តាញអគ្គិសនី </p>'+
                    '<table class="tb_grid table table-bordered table-striped ">'+
                    '<tr>'+
                    '<th>តម្លៃក្នុងមួយគីឡូវ៉ាត់/ម៉ោង <spand class="text-danger">*</spand></th>'+
                    '<th>ចំនួនគីឡូវ៉ាត់ដែលប្រើជាមធ្យមក្នុងមួយខែ <spand class="text-danger">*</spand></th>'+
                    '<th>ចំណាយ​ជា​មធ្យមក្នុងមួយខែ</th>'+
                    '</tr>'+
                    '<tr>'+
                    '<td><div class="input-group form-group"><input value="{{$yesElectrict->costs_in_hour ?? ''}}" autocomplete="off" class="cal_t form-control allowNumber myelectric" id="costs_in_hour" required="required" type="text" name="costs_in_hour" required="required"><span class="input-group-addon">រៀល</span></div></td>'+
                    '<td><div class="input-group form-group"><input value="{{$yesElectrict->number_in_month ?? ''}}" autocomplete="off" class="cal_t form-control allowNumber myelectric" id="number_in_month" required="required" type="text" name="number_in_month" required="required"><span class="input-group-addon">គីឡូវ៉ាត់</span></div></td>'+
                    '<td><div class="input-group form-group"><input value="{{$yesElectrict->costs_per_month ?? ''}}" autocomplete="off" class="cal_t form-control allowNumber" id="costs_per_month" required="required" type="text" name="costs_per_month" readonly="readonly"><span class="input-group-addon">រៀល</span></div></td>'+
                    '</tr>'+
                    '<tr class="my_hide">'+
                    '<td></td>'+
                    '<td></td>'+
                    '<td><div class="input-group form-group"><input autocomplete="off" class="cal_t form-control allowNumber" id="cost_score" required="required" type="text" name="use_energy_elect_score" readonly="readonly"><span class="input-group-addon">ពិន្ទុ</span></div></td>'+
                    '</tr>'+
                    '</table>');
                AllowNumber();
                $('.cal_t').keyup(function(){
                    var cost    = $('#costs_per_month').val();
                    var number  = $('#number_in_month').val();
                    if( (cost < 15000) || (number < 20) ){
                        $('#cost_score').val(8);
                    }else if( (cost>=15100 && cost<=30000) || (number>=21 && number<=49) ){
                        $('#cost_score').val(5);
                    }else{
                        $('#cost_score').val(0);
                    }
                });
                $('.myelectric').change(function(){
                    var costs_in_hour = 0;
                    var number_in_month = 0;
                    costs_in_hour = parseInt($('#costs_in_hour').val());
                    number_in_month = parseInt($('#number_in_month').val());
                    var re = costs_in_hour * number_in_month ? costs_in_hour * number_in_month : 0;
                    $('#costs_per_month').val(re);
                });

            }else if(electric == 2){
                $('#electric_no').append('<p>ប្រសិនមិនបានតបណ្តាញអគ្គិសនី</p><div class="add_electric_grid"><ul class="li-none">@foreach($electricgrid as $key=>$e)<li><label><input @if($noElectrict->electric_grid_id == $e->id) checked @endif style="margin-right:10px;" class="electric_grid_id" value="{{$e->id}}" type="radio" name="electric_grid_id" ​​> {{$e->name_kh}}</label></li>@endforeach</ul></div>'+'<div class="my_hide form-group input-group" style="width: 300px;">'+
                    '<input id="score_power" type="text" name="no_energy_elect_score" class="score_power form-control allowNumber"​ readonly>'+
                    '<span class="input-group-addon">ពិន្ទុ</span>'+
                    '</div>');

                $('.electric_grid_id').click(function(){
                    var power = $('input[name=electric_grid_id]:checked').val();
                    if(power == 3){
                        $('#score_power').val(8);
                    }else if( power == 2 || power == 4){
                        $('#score_power').val(5);
                    }else{$('#score_power').val(0);}
                });
            }
        });

        $('.myelectric').change(function(){
            var costs_in_hour = 0;
            var number_in_month = 0;
            costs_in_hour = parseInt($('#costs_in_hour').val());
            number_in_month = parseInt($('#number_in_month').val());
            var re = costs_in_hour * number_in_month ? costs_in_hour * number_in_month : 0;
            $('#costs_per_month').val(re);
        });
    </script>

</div>