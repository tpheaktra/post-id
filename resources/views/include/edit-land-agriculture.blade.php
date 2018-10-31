<div class="col-sm-12"><hr></div>
<div class="col-sm-12">
    <h5><b>គ.១២.១.២​)ដីកសិកម្ម <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="" data-original-title="ប្រសិនបើមានដីផ្ទាល់ខ្លួន ឫជួលគេ សូមបញ្ជាក់ ទំហំដីកសិកម្ម (សុំសរសេរជាទំហំសរុបដោយបូកគ្រប់កន្លែង និងបញ្ជាក់ពីឯកតា) "></a></b></h5>
    <p>មាន​ដីកសិកម្ម ឬ​ទេ ?</p>
    <ul class="li-none add_land">
        @foreach($landAgricultural as $key => $land)
            @if($land->id == 1)
                <li>
                    <label><input @if($gFamily->land_agricultural_id == 1) checked @endif class="land @if($gFamily->land_agricultural_id == 1) on @endif" style="margin-right:10px;" type="radio" name="land" value="{{$land->id}}">  {{$land->name_kh}}</label>
                </li>
            @elseif($land->id == 2)
                <li>
                    <label class="testing">
                        <input style="margin-right:10px;" @if($land_2 !=null && $land_2->land_agricultural_id == 2) checked @endif id="land_{{$land->id}}"  class="land_{{$land->id}}" type="checkbox" name="land_{{$land->id}}" value="{{$land->id}}" multiple>
                        {{$land->name_kh}} <spand class="text-danger">*</spand>
                    </label>

                    @if($land->id == 2)
                        <div class="col-sm-12" id="show-land-other">
                            @if($land_2 != null && $land_2->land_agricultural_id == 2)
                                <div class="col-sm-12">
                                    <table width="100%" class="table table-bordered table-striped tbl-land">
                                        <tr>
                                            <td><label class="control-label"> ដីស្រែមាន </label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_2->land_name ?? ''}}" autocomplete="off" name="land_name_other_2" type="text" class="allowFlot form-control"/><span class="input-group-addon">កន្លែង</span>
                                                </div>
                                            </td>
                                            <td><label class="control-label"> ទំហំសរុប : </label></td>
                                            <td>
                                                <div class="form-group ​​input-group input-group">
                                                    <input value="{{$land_2->total_land ?? ''}}" autocomplete="off" id="total_land_2" name="total_land_other_2" type="text" class="t_land_2 form-control allowFlot"/><span class="input-group-addon">ហិចតា</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label">​ ដីចំការមាន </label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_2->land_farm ?? ''}}" id="land_farm_2" autocomplete="off" name="land_farm_other_2" type="text"  class="allowFlot form-control" /><span class="input-group-addon">កន្លែង</span>
                                                </div>
                                            </td>
                                            <td><label class="control-label"> ទំហំសរុប : </label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_2->total_land_farm ?? ''}}" autocomplete="off" id="total_land_farm_2" name="total_land_farm_other_2" type="text"  class="t_land_2 form-control allowFlot" /><span class="input-group-addon">ហិចតា</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td><label class="control-label">ដីសរុប:</label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_2->sum_land_farm ?? ''}}" autocomplete="off" id="total_land_and_land_farm_2" name="sum_land_farm_other_2" type="text" required="required" class="t_land_2 form-control allowFlot" readonly="readonly" /><span class="input-group-addon">ហិចតា</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="my_hide">
                                            <td></td>
                                            <td>
                                            </td>
                                            <td><label class="control-label">7.A.2 B  ផ្ទៃដីកសិកម្ម មិនមែនជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</label></td>
                                            <td>
                                                @foreach($store_score as $key => $value)
                                                <div class="form-group input-group">
                                                    <input autocomplete="off" id="l_score_2" value="{{$value->other_farm}}" name="other_farm_score" type="text" required="required" class="t_land_2 form-control allowFlot"  readonly/><span class="input-group-addon">ពិន្ទុ</span>
                                                @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </li>
                    @endif

                    @else
                        <li>
                            <label class="testing">
                                <input style="margin-right:10px;" @if($land_3 != null && $land_3->land_agricultural_id == 3) checked @endif id="land_{{$land->id}}"  class="land_{{$land->id}}" type="checkbox" name="land_{{$land->id}}" value="{{$land->id}}" multiple>
                                {{$land->name_kh}} <spand class="text-danger">*</spand>
                            </label>
                        <div class="col-sm-12" id="show-land-personal">
                            @if($land_3 != null && $land_3->land_agricultural_id == 3)
                                <div class="col-sm-12">
                                    <table width="100%" class="table table-bordered table-striped tbl-land">
                                        <tr>
                                            <td><label class="control-label"> ដីស្រែមាន </label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_3->p_land_name ?? ''}}" autocomplete="off" name="p_land_name" type="text" class="allowFlot form-control"/><span class="input-group-addon">កន្លែង</span>
                                                </div>
                                            </td>
                                            <td><label class="control-label"> ទំហំសរុប : </label></td>
                                            <td>
                                                <div class="form-group ​​input-group input-group">
                                                    <input value="{{$land_3->p_total_land ?? ''}}" autocomplete="off" id="total_land" name="p_total_land" type="text" class="t_land form-control allowFlot"/><span class="input-group-addon">ហិចតា</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label class="control-label">​ ដីចំការមាន </label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_3->p_land_farm ?? ''}}" id="land_farm" autocomplete="off" name="p_land_farm" type="text" required="required" class="allowFlot form-control" /><span class="input-group-addon">កន្លែង</span>
                                                </div>
                                            </td>
                                            <td><label class="control-label"> ទំហំសរុប : </label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_3->p_total_land_farm ?? ''}}" autocomplete="off" id="total_land_farm" name="p_total_land_farm" type="text" required="required" class="t_land form-control allowFlot" /><span class="input-group-addon">ហិចតា</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                            </td>
                                            <td><label class="control-label">ដីសរុប:</label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$land_3->p_sum_land_farm ?? ''}}" autocomplete="off" id="total_land_and_land_farm" name="p_sum_land_farm" type="text" required="required" class="t_land form-control allowFlot" readonly="readonly" /><span class="input-group-addon">ហិចតា</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="my_hide">
                                            <td></td>
                                            <td>
                                            </td>
                                            <td><label class="control-label">7.A. 2A ផ្ទៃដីកសិកម្ម ជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</label></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    @foreach($store_score as $key => $value)
                                                    <input autocomplete="off" id="l_score" value="{{$value->personal_farm}}" name="personal_farm_score" type="text" required="required" class="t_land form-control allowFlot" readonly/><span class="input-group-addon">ពិន្ទុ</span>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        </div>

                </li>
            @endif
        @endforeach
    </ul>
    <script type="text/javascript">
        $(document).ready(function(){
            if($('.land').hasClass("on")){
                $('.testing').addClass('testing disable');
            }
        });


        $('.t_land_2').change(function(){
            var field = 0;
            var farm = 0;
            field = Number($('#total_land_2').val());
            farm  = Number($('#total_land_farm_2').val());
            var people = parseInt($('#total_people').val());
            // alert(people);
            var sum = field + farm;
            // $('#total_land_and_land_farm').val(sum);

            if(farm == null || farm == ''){
                $('#total_land_and_land_farm_2').val(field);
            }else if(field == null || field == ''){
                $('#total_land_and_land_farm_2').val(farm);
            }else{
                $('#total_land_and_land_farm_2').val((field + farm).toFixed(2));
            }



            if( ((people>=1 && people <=3) && (sum>=0 && sum <=1)) || ((people >=4 && people <=6) && (sum>=0 && sum <=1.5)) || ((people >=7 && people <= 10) && (sum>=0 && sum <=2.2)) || ((people>10) && (sum>=0 && sum<=3)) ){
                $('#l_score_2').val(6);
            }
            else if( ((people>=1 && people <=3) && (sum>1 && sum <=2)) || ((people >=4 && people <=6) && (sum>1.5 && sum <=3)) || ((people >=7 && people <= 10) && (sum>2.2 && sum <=4)) || ((people>10)&&(sum>3 && sum<=5.5)) ){
                $('#l_score_2').val(4);
            }else{
                $('#l_score_2').val(0);
            }
        });


        $('.t_land').change(function(){
            var field = 0;
            var farm = 0;
            field = Number($('#total_land').val());
            farm  = Number($('#total_land_farm').val());
            var people = parseInt($('#total_people').val());
            // alert(people);
            var sum = field + farm;
            // $('#total_land_and_land_farm').val(sum);

            if(farm == null || farm == ''){
                $('#total_land_and_land_farm').val(field);
            }else if(field == null || field == ''){
                $('#total_land_and_land_farm').val(farm);
            }else{
                $('#total_land_and_land_farm').val((field + farm).toFixed(2));
            }



            if( ((people>=1 && people <=3) && (sum>=0 && sum <=0.6)) || ((people >=4 && people <=6) && (sum>=0 && sum <=1)) || ((people >=7 && people <= 10) && (sum>=0 && sum <=1.5)) || ((people>10) && (sum>=0 && sum<=2)) ){
                $('#l_score').val(6);
                // alert(people);
            }
            else if( ((people>=1 && people <=3) && (sum>0.6 && sum <=1.2)) || ((people >=4 && people <=6) && (sum>1 && sum <=2)) || ((people >=7 && people <= 10) && (sum>1.5 && sum <=3)) || ((people>10)&&(sum>2 && sum<=3.5)) ){
                $('#l_score').val(4);
                // alert(people);
            }else{
                $('#l_score').val(0);
                // alert(people);
            }
        });






        $(".land").click( function(e){

            if($(this).hasClass("on")){
                $(this).removeAttr('checked');
                $('.testing').attr('disable');
            }
            $(this).toggleClass("on");
            $('#land_2').removeAttr('checked');
            $('#show-land-other').html('');
            $('#land_3').removeAttr('checked');
            $('#show-land-personal').html('');
            $('.testing').toggleClass("disable");

        }).find(":checked").addClass("on");

        $('#land_2').click(function () {
            var land = $('input[name=land_2]:checked').val();
            var otherland = '<div class="col-sm-12">' +
                '<table width="100%" class="table table-bordered table-striped tbl-land">' +
                '<tr>' +
                '<td><label class="control-label"> ដីស្រែមាន </label></td>' +
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" name="land_name_other_2" type="text" class="allowFlot form-control"/><span class="input-group-addon">កន្លែង</span>' +
                '</div>' +
                '</td>' +
                '<td><label class="control-label"> ទំហំសរុប : </label></td>'+
                '<td>' +
                '<div class="form-group ​​input-group input-group">' +
                '<input autocomplete="off" id="total_land_2" name="total_land_other_2" type="text" class="t_land_2 form-control allowFlot"/><span class="input-group-addon">ហិចតា</span>'+
                '</div>' +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><label class="control-label">​ ដីចំការមាន </label></td>'+
                '<td>'+
                '<div class="form-group input-group">'+
                '<input id="land_farm_2" autocomplete="off" name="land_farm_other_2" type="text"  class="allowFlot form-control" /><span class="input-group-addon">កន្លែង</span>'+
                '</div>'+
                '</td>'+
                '<td><label class="control-label"> ទំហំសរុប : </label></td>'+
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" id="total_land_farm_2" name="total_land_farm_other_2" type="text"  class="t_land_2 form-control allowFlot" /><span class="input-group-addon">ហិចតា</span>'+
                '</div>'+
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td></td>'+
                '<td>'+
                '</td>'+
                '<td><label class="control-label">ដីសរុប:</label></td>'+
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" id="total_land_and_land_farm_2" name="sum_land_farm_other_2" type="text" required="required" class="t_land_2 form-control allowFlot" readonly="readonly" /><span class="input-group-addon">ហិចតា</span>'+
                '</div>'+
                '</td>' +
                '</tr>' +
                '<tr class="my_hide">' +
                '<td></td>'+
                '<td>'+
                '</td>'+
                '<td><label class="control-label">7.A.2 B  ផ្ទៃដីកសិកម្ម មិនមែនជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</label></td>'+
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" id="l_score_2" name="other_farm_score" type="text" required="required" class="t_land_2 form-control allowFlot"  readonly/><span class="input-group-addon">ពិន្ទុ</span>'+
                '</div>'+
                '</td>' +
                '</tr>' +
                '</table>'+
                '</div>';

            if (land == 2) {
                $('#show-land-other').html(otherland);
            }else{$('#show-land-other').html('');}

            AllowFlot();
            $('.t_land_2').change(function(){
                var field = 0;
                var farm = 0;
                field = Number($('#total_land_2').val());
                farm  = Number($('#total_land_farm_2').val());
                var people = parseInt($('#total_people').val());
                // alert(people);
                var sum = field + farm;
                // $('#total_land_and_land_farm').val(sum);

                if(farm == null || farm == ''){
                    $('#total_land_and_land_farm_2').val(field);
                }else if(field == null || field == ''){
                    $('#total_land_and_land_farm_2').val(farm);
                }else{
                    $('#total_land_and_land_farm_2').val((field + farm).toFixed(2));
                }



                if( ((people>=1 && people <=3) && (sum>=0 && sum <=1)) || ((people >=4 && people <=6) && (sum>=0 && sum <=1.5)) || ((people >=7 && people <= 10) && (sum>=0 && sum <=2.2)) || ((people>10) && (sum>=0 && sum<=3)) ){
                    $('#l_score_2').val(6);
                }
                else if( ((people>=1 && people <=3) && (sum>1 && sum <=2)) || ((people >=4 && people <=6) && (sum>1.5 && sum <=3)) || ((people >=7 && people <= 10) && (sum>2.2 && sum <=4)) || ((people>10)&&(sum>3 && sum<=5.5)) ){
                    $('#l_score_2').val(4);
                }else{
                    $('#l_score_2').val(0);
                }
            });
        });

        $('#land_3').click(function () {
            var land = $('input[name=land_3]:checked.land_3').val();
            var landshow = '<div class="col-sm-12">' +
                '<table width="100%" class="table table-bordered table-striped tbl-land">' +
                '<tr>' +
                '<td><label class="control-label"> ដីស្រែមាន </label></td>' +
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" name="p_land_name" type="text" class="allowFlot form-control"/><span class="input-group-addon">កន្លែង</span>' +
                '</div>' +
                '</td>' +
                '<td><label class="control-label"> ទំហំសរុប : </label></td>'+
                '<td>' +
                '<div class="form-group ​​input-group input-group">' +
                '<input autocomplete="off" id="total_land" name="p_total_land" type="text" class="t_land form-control allowFlot"/><span class="input-group-addon">ហិចតា</span>'+
                '</div>' +
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td><label class="control-label">​ ដីចំការមាន </label></td>'+
                '<td>'+
                '<div class="form-group input-group">'+
                '<input id="land_farm" autocomplete="off" name="p_land_farm" type="text" required="required" class="allowFlot form-control" /><span class="input-group-addon">កន្លែង</span>'+
                '</div>'+
                '</td>'+
                '<td><label class="control-label"> ទំហំសរុប : </label></td>'+
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" id="total_land_farm" name="p_total_land_farm" type="text" required="required" class="t_land form-control allowFlot" /><span class="input-group-addon">ហិចតា</span>'+
                '</div>'+
                '</td>' +
                '</tr>' +
                '<tr>' +
                '<td></td>'+
                '<td>'+
                '</td>'+
                '<td><label class="control-label">ដីសរុប:</label></td>'+
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" id="total_land_and_land_farm" name="p_sum_land_farm" type="text" required="required" class="t_land form-control allowFlot" readonly="readonly" /><span class="input-group-addon">ហិចតា</span>'+
                '</div>'+
                '</td>' +
                '</tr>' +
                '<tr class="my_hide">' +
                '<td></td>'+
                '<td>'+
                '</td>'+
                '<td><label class="control-label">7.A. 2A ផ្ទៃដីកសិកម្ម ជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</label></td>'+
                '<td>' +
                '<div class="form-group input-group">'+
                '<input autocomplete="off" id="l_score" name="personal_farm_score" type="text" required="required" class="t_land form-control allowFlot" readonly/><span class="input-group-addon">ពិន្ទុ</span>'+
                '</div>'+
                '</td>' +
                '</tr>' +
                '</table>'+
                '</div>';

            if(land == 3) {
                $('#show-land-personal').html(landshow);
            }else{$('#show-land-personal').html('');}


            AllowFlot();
            $('.t_land').change(function(){
                var field = 0;
                var farm = 0;
                field = Number($('#total_land').val());
                farm  = Number($('#total_land_farm').val());
                var people = parseInt($('#total_people').val());
                // alert(people);
                var sum = field + farm;
                // $('#total_land_and_land_farm').val(sum);

                if(farm == null || farm == ''){
                    $('#total_land_and_land_farm').val(field);
                }else if(field == null || field == ''){
                    $('#total_land_and_land_farm').val(farm);
                }else{
                    $('#total_land_and_land_farm').val((field + farm).toFixed(2));
                }



                if( ((people>=1 && people <=3) && (sum>=0 && sum <=0.6)) || ((people >=4 && people <=6) && (sum>=0 && sum <=1)) || ((people >=7 && people <= 10) && (sum>=0 && sum <=1.5)) || ((people>10) && (sum>=0 && sum<=2)) ){
                    $('#l_score').val(6);
                    // alert(people);
                }
                else if( ((people>=1 && people <=3) && (sum>0.6 && sum <=1.2)) || ((people >=4 && people <=6) && (sum>1 && sum <=2)) || ((people >=7 && people <= 10) && (sum>1.5 && sum <=3)) || ((people>10)&&(sum>2 && sum<=3.5)) ){
                    $('#l_score').val(4);
                    // alert(people);
                }else{
                    $('#l_score').val(0);
                    // alert(people);
                }
            });
        });
    </script>
</div>