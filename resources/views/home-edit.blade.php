@section('title','ការធ្វើអត្តសញ្ញាណកម្ម')
@extends('layouts.app')

@section('content')

    <style type="text/css">
        /*use for hide score*/
        .my_hide{
            display: none;
        }
    </style>
    <!------ Include the above in your HEAD tag ---------->
    <div class="container content">
        <div class="col-sm-12">
            <h3 class="hospital_title" align="center">ការធ្វើអត្តសញ្ញាណកម្មគ្រួសារក្រីក្រនៅមន្ទីពេទ្យ</h3>
        </div>

        @include('include.step-patient')
        <form role="form" method="post" class="form-group-post" action="{{ route('updatepatient.update',Crypt::encrypt($ginfo->id)) }}" id="check_validate">
            {{ csrf_field() }}
            @include('include.edit-step-1')
            @include('include.edit-step-2')

            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12" id="div3">
                        <h3> គ) ស្ថានភាពទូទៅរបស់គ្រួសារ</h3>
                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4> គ.១ ផ្ទះសម្បែងរបស់ក្រុមគ្រួសារ</h4>

                            <div class="add_household_family">
                                <p> តើពួកគាត់រស់នៅទីកន្លែងណា? <spand class="text-danger">*</spand> (សូម​ជ្រើរើស នៅចំលើយតែមួយ)</p>
                                <table>
                                    @foreach($household as $key => $h)
                                        <tr><td>@if($h->id == 1) ក​). @elseif($h->id == 2) ខ​). @elseif($h->id == 3) គ). @elseif($h->id == 4) ឃ​). @elseif($h->id == 5) ង​​). @endif</td>
                                            <td style="padding: 5px 10px;">
                                                ​<input @if($gFamily->household_family_id == $h->id) checked @endif class="household_family_id" type="radio" name="household_family_id"  value="{{ $h->id }}">  {{$h->name_kh}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div id="household_family_id" class="col-sm-6">
                                    @if($gFamily->household_family_id == 5)
                                        <table class="tb_grid table table-bordered table-striped"><tr><th>ឈ្មោះស្ថាប័ន <spand class="text-danger">*</spand></th><th>លេខទូរសព្ទបុគ្គលទំនាក់ទំនងនៅស្ថាប័ន <spand class="text-danger">*</spand></th></tr>
                                            <tr>
                                                <td>
                                                    <input  value="{{$institutions->institutions_name ?? ''}}" class="form-control-custome form-control" type="text" placeholder="ឈ្មោះស្ថាប័ន" name="institutions_name" autocomplete="off" required="required">
                                                </td>
                                                <td>
                                                    <input value="{{$institutions->instatutions_phone ?? ''}}" maxlength="10" class="allowNumber form-control-custome form-control" type="text" placeholder="លេខទូរសព្ទ" name="instatutions_phone" autocomplete="off" required="required">
                                                </td>
                                            </tr>
                                        </table>
                                    @endif
                                </div>
                            </div>

                            <script>
                                $('.household_family_id').click(function () {
                                    var houshold = $('input[name=household_family_id]:checked').val();
                                    $('#household_family_id').empty();
                                    $('#home-rent').empty();
                                    $('#home-yourself').empty();
                                    $('#general-status').empty();
                                    $('#home-ke').empty();
                                    $('#building-year').empty();
                                    $('#household_area').empty();
                                    if(houshold == 5){
                                        $('#household_family_id').html(
                                            '<table class="tb_grid table table-bordered table-striped"><tr><th>ឈ្មោះស្ថាប័ន <spand class="text-danger">*</spand></th><th>លេខទូរសព្ទបុគ្គលទំនាក់ទំនងនៅស្ថាប័ន <spand class="text-danger">*</spand></th></tr>' +
                                            '<tr>' +
                                            '<td>' +
                                            '<input value="{{$institutions->institutions_name ?? ''}}" class="form-control-custome form-control" type="text" placeholder="ឈ្មោះស្ថាប័ន" name="institutions_name" autocomplete="off" required="required">'+
                                            '</td>' +
                                            '<td>' +
                                            '<input value="{{$institutions->instatutions_phone ?? ''}}" maxlength="10" class="allowNumber form-control-custome form-control" type="text" placeholder="លេខទូរសព្ទ" name="instatutions_phone" autocomplete="off" required="required">'+
                                            '</td>' +
                                            '</tr>'+
                                            '</table>');
                                        AllowNumber();
                                    }else if(houshold == 2) {
                                        $('#home-rent').append('<h4>គ.៨) សម្រាប់គ្រួសារជួលផ្ទះគេ​ <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="សម្រាប់គ្រួសារមានផ្ទះផ្ទាល់ខ្លួន ឬ ​ នៅជាមួយគេដោយអត់បង់ថ្លៃ មិនបាច់បំពេញចំណុច គ៨ ហើយរំលងទៅ គ៩"></a></h4>' +
                                            '<div class="col-sm-6">' +
                                            '<table width="100%">' +
                                            '<tr>' +
                                            '<td width="50%">' +
                                            '<label class="control-label"> តើថ្លៃជួលប្រចាំខែជាមធ្យមប៉ុន្មាន?: </label>' +
                                            '</td>' +
                                            '<td width="50%">' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$rendPrice->house_rent_price ?? ''}}" autocomplete="off" id="price" type="text" required="required" class="cal form-control allowNumber" name="rent_fee"/><span class="input-group-addon">រៀល</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr class="my_hide">' +
                                            '<td width="50%">' +
                                            '<label class="control-label"> គ្រួសារដែលនៅផ្ទះជួលគេ 3B</label>' +
                                            '</td>' +
                                            '<td width="50%">' +
                                            '<div class="form-group input-group">' +
                                            '@foreach($store_score as $key=>$value)<input autocomplete="off" id="r_score"  type="text" required="required" class="cal form-control allowNumber" name="price_rent_house_score"​​ value={{$value->price_rent_house}} readonly/><span class="input-group-addon">ពិន្ទុ</span>@endforeach' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '</table>' +
                                            '</div>');
                                        //3B គ្រួសារដែលនៅផ្ទះជួលគេតម្លៃជួលផ្ទះ (ប្រើសម្រាប់តែគ្រួសារដែលជួលផ្ទះគេ)
                                        $('.cal').change(function () {
                                            var person = $('#total_people').val();
                                            var price = $('#price').val();
                                            if (((person >= 1 && person <= 3) && (price >= 1 && price <= 80000)) || ((person >= 4 && person <= 6) && (price >= 1 && price <= 120000)) || ((person >= 7 && person <= 10) && (price >= 1 && price <= 180000)) || ((person > 10) && (price >= 1 && price <= 240000))) {
                                                $('#r_score').val(16);
                                            }
                                            else if (((person >= 1 && person <= 3) && (price > 80000 && price <= 160000)) || ((person >= 4 && person <= 6) && (price > 120000 && price <= 200000)) || ((person >= 7 && person <= 10) && (price > 180000 && price <= 280000)) || ((person > 10) && (price > 240000 && price <= 340000))) {
                                                $('#r_score').val(11);
                                            }
                                            else if (((person >= 1 && person <= 3) && (price > 160000 && price <= 200000)) || ((person >= 4 && person <= 6) && (price > 200000 && price <= 240000)) || ((person >= 7 && person <= 10) && (price > 280000 && price <= 340000)) || ((person > 10) && (price > 340000 && price <= 400000))) {
                                                $('#r_score').val(5);
                                            }
                                            else {
                                                $('#r_score').val(0);
                                            }
                                        });
                                    }else if(houshold == 1){
                                        var household_area = '<div class="col-sm-12">' +
                                            '<h4> គ.៣ តើ​ផ្ទៃ​ក្រឡា​ទីលំនៅរបស់ក្រុម​គ្រួសារ ​មាន​ចំនួន​ប៉ុន្មាន​ម៉ែត្រ​ក្រឡា​?​</h4>' +
                                            '<table class="tb_grid table table-bordered table-striped tbl-floor" style="width:100%;">' +
                                            '<tbody>' +
                                            '<tr>' +
                                            '<td><b>ផ្ទះជាន់ក្រោម៖</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->ground_floor_length ?? ''}}" autocomplete="off" id="ground_floor_length" class="calculate form-control allowFlot ground_floor"  placeholder="បណ្តោយ" type="text" name="ground_floor_length">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->ground_floor_width ?? ''}}" autocomplete="off" id="ground_floor_width" class="calculate form-control allowFlot ground_floor"  placeholder="ទទឹង" type="text" name="ground_floor_width">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->ground_floor_area ?? ''}}" autocomplete="off" id="ground_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="ground_floor_area" readonly="readonly">' +
                                            '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                            '<td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->upper_floor_length ?? ''}}" autocomplete="off" id="upper_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text" name="upper_floor_length">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->upper_floor_width ?? ''}}" autocomplete="off" id="upper_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="upper_floor_width">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->upper_floor_area ?? ''}}" autocomplete="off" id="upper_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="upper_floor_area" readonly="readonly">' +
                                            '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                            '<td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->further_floor_length ?? ''}}" autocomplete="off" id="further_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text"  name="further_floor_length">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->further_floor_width ?? ''}}" autocomplete="off" id="further_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="further_floor_width">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->further_floor_area ?? ''}}" autocomplete="off" id="further_floor_area" class="calculate form-control allowFlot" required="required" placeholder="ផ្ទៃ" type="text" name="further_floor_area" readonly="readonly">' +
                                            '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                            '<td colspan="3"><b style="float:right;">ផ្ទៃកម្រាលសរុប :</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_yourself->total_area ?? ''}}" readonly="readonly" autocomplete="off" id="total_area" name="total_area" class="calculate form-control allowFlot"  placeholder="ផ្ម៉ែត្រក្រឡា..." type="text">' +
                                            '<span class="input-group-addon">ម៉ែត្រ​ក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr class="my_hide">' +
                                            '<td colspan="3"><b style="float:right;">1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ :</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '@foreach($store_score as $key=> $value)<input autocomplete="off" type="hidden" id="a_score1" name="size_member_score" class="calculate form-control  allowFlot"​ required="required"  value="{{$value->size_member}}"readonly="readonly">@endforeach' +
                                            '<span class="input-group-addon">ពិន្ទុ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '</tbody>' +
                                            '</table>' +
                                            '</div>' +
                                            '<div class="col-sm-12"><hr></div>';
                                        $('#household_area').append(household_area);
                                        AllowNumber();
                                        AllowFlot();
                                        //family
                                        $('.ground_floor').change(function(){
                                            var g_length = 0;
                                            var g_width = 0;
                                            g_length = parseInt($('#ground_floor_length').val() ? $('#ground_floor_length').val() : 0);
                                            g_width  = parseFloat($('#ground_floor_width').val() ? $('#ground_floor_width').val() : 0);
                                            $('#ground_floor_area').val((g_length * g_width ? g_length * g_width : 0).toFixed(0));
                                        });

                                        $('#upper_floor_length, #upper_floor_width').change(function() {
                                            var u_length = parseInt($('#upper_floor_length').val());
                                            var u_width = parseFloat($('#upper_floor_width').val());
                                            $('#upper_floor_area').val((u_length * u_width ? u_length * u_width : 0).toFixed(0));
                                        });
                                        $('#further_floor_length, #further_floor_width').change(function() {
                                            var f_length = parseInt($('#further_floor_length').val());
                                            var f_width = parseFloat($('#further_floor_width').val());
                                            $('#further_floor_area').val((f_length * f_width ? f_length * f_width : 0).toFixed(0));
                                        });
                                        $('#ground_floor_length, #ground_floor_width, #upper_floor_length, #upper_floor_width,#further_floor_length, #further_floor_width').on('change' ,function() {
                                            var total_g = 0;
                                            var total_u = 0;
                                            var total_f = 0;
                                            var sum = 0;

                                            total_g = Number($('#ground_floor_area').val());
                                            total_u = Number($('#upper_floor_area').val());
                                            total_f = Number($('#further_floor_area').val());
                                            sum = Number(total_g + total_u + total_f);
                                            $('#total_area').val(sum);
                                        });
                                        //family
                                        $('.calculate').change(function(){
                                            var member = parseInt($('#total_people').val());
                                            var land = parseInt($('#total_area').val());
                                            var score = $('#a_score1').val();
                                            // 1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ
                                            if(((member >=1 && member <= 3) && (land>=1 && land <=20)) || ((member >=4 && member <=6) && (land>=1 && land <=30)) || ((member >=7 && member <= 10) && (land>=1 && land <=40)) || ((member>10)&&(land>=1 && land<=50))){
                                                $('#a_score1').val(8);
                                            }
                                            else if(((member >= 1 && member <=3) && (land>20 && land<=30)) || ((member>=4 && member<=6)&&(land>30 && land<=40)) || ((member>=7 && member<=10)&&(land>40 && land<=55)) || ((member>10)&&(land>50 && land<=65)) )
                                            {
                                                $('#a_score1').val(6);
                                            }
                                            else if( ((member >= 1 && member <=3) && (land>30 && land<=40)) || ((member>=4 && member<=6)&&(land>40 && land<=50)) || ((member>=7 && member<=10)&&(land>55 && land<=65)) || ((member>10)&&(land>65 && land<=75)) ){
                                                $('#a_score1').val(3);
                                            }
                                            else{
                                                $('#a_score1').val(0);
                                            }
                                        });



                                        var homeyourselt = '<h4>គ.៥ ដំបូល</h4>' +
                                            '<table width="100%" class="table table-bordered table-striped">' +
                                            '<thead><tr>' +
                                            '<th>ដំបូលធ្វើអំពី <spand class="text-danger">*</spand></th>' +
                                            '<th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>' +
                                            '</tr></thead>'+
                                            '<tr>' +
                                            '<td>' +
                                            '<div class="form-group add_roof_relationship">' +
                                            '<select class="form-control roof_relationship cal_roof" id="roof_relationship" name="roof_made">' +
                                            '<option></option>' +
                                            '@foreach($roof_made as $keh => $value)' +
                                            '<option @if($household_root_yourself != null && $household_root_yourself->roof_made_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>' +
                                            '@endforeach'+
                                            '</select>' +
                                            '</div>' +
                                            '</td>'+
                                            '<td>' +
                                            '<div class="form-group add_r_status">' +
                                            '<select class="cal_roof form-control r_status" id="r_status" name="roof_status">' +
                                            '<option></option>@foreach($house_status as $keh => $value)<option @if($household_root_yourself != null && $household_root_yourself->roof_status_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                            '</select>' +
                                            '</div>' +
                                            '</td>'+
                                            '</tr>'+
                                            // '<tr​ style="display:none;">' +
                                            // '<td>3A 1 : ស្ថានភាពដំបូលផ្ទះ </td>' +
                                            // '<td>' +
                                            '<div class="my_hide form-group input-group" style="width: 300px;">'+
                                            '<input id="roof_score" type="text" name="roof_score" class="cal_roof form-control allowNumber"​ readonly>'+
                                            '<span class="input-group-addon">ពិន្ទុ</span>'+
                                            '</div>'+
                                            '</td>' +
                                            // '</tr>'
                                            '</table>';

                                        var building_year = '<div class="col-sm-6">' +
                                            '<table class="table-home table table-bordered table-striped">' +
                                            '<thead>' +
                                            '<tr>' +
                                            '<th>ផ្ទះសាងសង់នៅឆ្នាំណា? <spand class="text-danger">*</spand></th>' +
                                            '<th>តើធ្លាប់ជួសជុលឬទេ? <spand class="text-danger">*</spand></th>' +
                                            '</tr>' +
                                            '</thead>'+
                                            '<tr>' +
                                            '<td width="50%">' +
                                            '<div class="add_huild_year">' +
                                            '<select name="h_build_year" id="year_select" style="width: 100%;" name="build_in">'+
                                            '<option></option>' +
                                            '@php $currentYear = date('Y'); @endphp  @foreach (range(1950, $currentYear) as $value) <option @if($household_root_yourself != null && $household_root_yourself->h_build_year  == $value) selected @endif value="{{$value}}">{{$value}}</option> @endforeach' +
                                            '</select>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td width="50%">' +
                                            '<div class="add_home_prepare">' +
                                            '<ul class="li-none">' +
                                            '@foreach($homePrepar as $key =>$p)' +
                                            '<li>' +
                                            '<label><input @if($household_root_yourself != null && $household_root_yourself->home_prepare_id == $p->id) checked @endif style="margin-right: 10px;" class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>' +
                                            '@if($p->id == 2)<label id="homeyear">'+
                                                ' <label id="homeyear">' +
                                                '@if($household_root_yourself !=null && $household_root_yourself->home_prepare_id == 2)' +
                                                    '<select name="home_year" style="width: 180px;" id="years"><option></option>' +
                                                        '<?php $currentYear = date('Y'); $editYear = $household_root->h_build_year;?>'+
                                                        '@foreach (range($editYear, $currentYear) as $value)' +
                                                            '<option @if($homePreparLink->home_year ?? '' == $value) selected @endif value="{{$value}}">{{$value}}</option>' +
                                                        '@endforeach' +
                                                    '</select>' +
                                                '@endif'+
                                                '</label>'+
                                            '</label>@endif' +
                                            '</li>' +
                                            '@endforeach'+
                                            '</ul>' +
                                            '</div>'+
                                            '</td>'+
                                            '</tr>' +
                                            '</table>'+
                                            '</div>';

                                        $('#building-year').append(building_year);
                                        $('#home-yourself').append(homeyourselt);
                                        $("#years").select2({allowClear:true, placeholder: "ឆ្នាំ"});

                                        $('.cal_roof').change(function(){
                                            var chose = $('#roof_relationship').val();
                                            var status = $('#r_status').val();
                                            if(chose == 3 || chose ==2 || chose == 6 || (chose == 4 && status == 1) || (chose ==1 && status == 1) || chose== 9){
                                                $('#roof_score').val(6);
                                            }else if( (chose == 4 && status == 2)){
                                                $('#roof_score').val(4);
                                            }else{
                                                $('#roof_score').val(0);
                                            }
                                        });
                                        $("#year_select").select2({allowClear:true, placeholder: "ឆ្នាំ"});
                                        $(".roof_relationship").select2({allowClear:true, placeholder: "ដំបូល"});
                                        $(".r_status").select2({allowClear:true, placeholder: "ស្ថានភាព"});

                                        $('.homeyear').click(function () {
                                            var homeyear = $('input[name=home_prepare]:checked').val();
                                            var year_build = $('#year_select').val();

                                            if(year_build != ''){
                                                year_build = $('#year_select').val();
                                            }else{
                                                year_build = '{{date("Y")+1}}';
                                            }
                                            var cur_year = '{{date("Y")}}';


                                            if(homeyear == 2){
                                                var opt = '';
                                                for(var y=year_build; y<=cur_year;y++){
                                                    opt += '<option value="'+y+'" >'+y+'</option>';
                                                }
                                                $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">'+opt+'</select>');
                                                $("#years").select2({allowClear:true, placeholder: 'ឆ្នាំ...'});
                                                $("#homeyear").css("display", "block");
                                            }else{
                                                $('#homeyear').html('');
                                            }
                                        });

                                        $('#year_select').change(function () {
                                            var year_build = $(this).val();
                                            var cur_year = '{{date("Y")}}';
                                            var opt = '';
                                            for (var y = year_build; y <= cur_year; y++) {
                                                opt += '<option value="' + y + '" >' + y + '</option>';
                                            }
                                            $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">' + opt + '</select>');
                                            $("#homeyear").css("display", "none");
                                            $('input[name=home_prepare]').removeAttr('checked');
                                            $("#years").select2({allowClear: true, placeholder: 'ឆ្នាំ...'});
                                        });


                                        var homeke = '<h4>គ.៦ ​ជញ្ជាំង</h4>' +
                                            '<table width="100%" class="table table-bordered table-striped">' +
                                            '<thead><tr>' +
                                            '<th>​ជញ្ជាំងធ្វើអំពី <spand class="text-danger">*</spand></th>' +
                                            '<th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>' +
                                            '</tr></thead>' +
                                            '<tr>' +
                                            '<td>' +
                                            '<div class="form-group add_wall_relationship">' +
                                            '<select class="cal_wall form-control wall_relationship" id="wall_relationship" name="walls_made">' +
                                            '<option></option>' +
                                            '@foreach($wall_made as $keh => $value)<option @if($household_root_yourself != null && $household_root_yourself->walls_made_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                            '</select>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>'+
                                            '<div class="form-group add_h_status">'+
                                            '<select class="cal_wall form-control h_status" id="h_status" name="walls_status">'+
                                            '<option></option>'+
                                            '@foreach($house_status as $keh => $value)<option @if($household_root_yourself != null && $household_root_yourself->walls_status_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
                                            '</select>'+
                                            '</div>'+
                                            '</td>'+
                                            '</tr>' +
                                            '<tr class="my_hide">' +
                                            '<td>3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group" style="width: 300px;">'+
                                            '<input id="wall_score" type="text" name="wall_score" class="cal_wall form-control allowNumber"​ readonly>'+
                                            '<span class="input-group-addon">ពិន្ទុ</span>'+
                                            '</div>'+
                                            '</td>' +
                                            '</tr>'+
                                            '</table>';

                                        $('#home-ke').append(homeke);
                                        $('.cal_wall').change(function(){
                                            var chose = $('#wall_relationship').val();
                                            var status = $('#h_status').val();
                                            if( (chose >=1 && chose<=3) || chose ==7 ){
                                                $('#wall_score').val(6);
                                            }else if(chose == 5){
                                                $('#wall_score').val(4);
                                            }else{ $('#wall_score').val(0);}
                                        });
                                        $(".wall_relationship").select2({ allowClear:true, placeholder: "ជញ្ជាំង"});
                                        $(".h_status").select2({ allowClear:true, placeholder: "ស្ថានភាព"});
                                        var generalStatus = '<h4>គ.៧) ស្ថានភាពទូទៅផ្ទះសម្បែង</h4>' +
                                            '<div class="add_condition_house"><ul class="li-none">'+
                                            '@foreach($condition_house as $key => $c)' +
                                            '<li>' +
                                            '<label><input @if($household_root_yourself != null && $household_root_yourself->condition_house_id  == $c->id) checked @endif style="margin-right:10px;" class="condition_house" type="radio" name="condition_house" ​ value="{{$c->id}}" > {{$c->name_kh}}</label>' +
                                            '</li>' +
                                            '@endforeach'+
                                            '</ul></div>'+
                                            '<div class="my_hide form-group input-group" style="width: 300px;">'+
                                            '<input id="house_score" type="text" name="house_score" class="house_score form-control allowNumber"​ readonly>'+
                                            '<span class="input-group-addon">ពិន្ទុ</span>'+
                                            '</div>';
                                        $('#general-status').append(generalStatus);

                                        $('.condition_house').click(function(){
                                            var house = $('input[name=condition_house]:checked').val();
                                            if(house ==1){
                                                $('#house_score').val(4);
                                            }else if(house == 2){
                                                $('#house_score').val(2.5);
                                            }else{ $('#house_score').val(0);}
                                        });
                                    }else if(houshold == 3){
                                        var household_area = '<div class="col-sm-12">' +
                                            '<h4> គ.៣ តើ​ផ្ទៃ​ក្រឡា​ទីលំនៅរបស់ក្រុម​គ្រួសារ ​មាន​ចំនួន​ប៉ុន្មាន​ម៉ែត្រ​ក្រឡា​?​</h4>' +
                                            '<table class="tb_grid table table-bordered table-striped tbl-floor" style="width:100%;">' +
                                            '<tbody>' +
                                            '<tr>' +
                                            '<td><b>ផ្ទះជាន់ក្រោម៖</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->ground_floor_length ?? ''}}" autocomplete="off" id="ground_floor_length" class="calculate form-control allowFlot ground_floor"  placeholder="បណ្តោយ" type="text" name="ground_floor_length">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->ground_floor_width ?? ''}}" autocomplete="off" id="ground_floor_width" class="calculate form-control allowFlot ground_floor"  placeholder="ទទឹង" type="text" name="ground_floor_width">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->ground_floor_area ?? ''}}" autocomplete="off" id="ground_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="ground_floor_area" readonly="readonly">' +
                                            '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                            '<td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->upper_floor_length ?? ''}}" autocomplete="off" id="upper_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text" name="upper_floor_length">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->upper_floor_width ?? ''}}" autocomplete="off" id="upper_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="upper_floor_width">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->upper_floor_area ?? ''}}" autocomplete="off" id="upper_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="upper_floor_area" readonly="readonly">' +
                                            '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                            '<td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->further_floor_length ?? ''}}" autocomplete="off" id="further_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text"  name="further_floor_length">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->further_floor_width ?? ''}}" autocomplete="off" id="further_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="further_floor_width">' +
                                            '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->further_floor_area ?? ''}}" autocomplete="off" id="further_floor_area" class="calculate form-control allowFlot" required="required" placeholder="ផ្ទៃ" type="text" name="further_floor_area" readonly="readonly">' +
                                            '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr>' +
                                            '<td colspan="3"><b style="float:right;">ផ្ទៃកម្រាលសរុប :</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '<input value="{{$household_root_rend->total_area ?? ''}}" readonly="readonly" autocomplete="off" id="total_area" name="total_area" class="calculate form-control allowFlot"  placeholder="ផ្ម៉ែត្រក្រឡា..." type="text">' +
                                            '<span class="input-group-addon">ម៉ែត្រ​ក្រឡា</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '<tr class="my_hide">' +
                                            '<td colspan="3"><b style="float:right;">1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ :</b></td>' +
                                            '<td>' +
                                            '<div class="form-group input-group">' +
                                            '@foreach($store_score as $key=>$value)<input autocomplete="off" type="hidden" id="a_score1" name="size_member_score" class="calculate form-control  allowFlot"​ required="required" readonly="readonly" value="{{$value->size_member}}"> @endforeach' +
                                            '<span class="input-group-addon">ពិន្ទុ</span>' +
                                            '</div>' +
                                            '</td>' +
                                            '</tr>' +
                                            '</tbody>' +
                                            '</table>' +
                                            '</div>' +
                                            '<div class="col-sm-12"><hr></div>';
                                        $('#household_area').append(household_area);
                                        AllowFlot();
                                        //family
                                        $('.ground_floor').change(function(){
                                            var g_length = 0;
                                            var g_width = 0;
                                            g_length = parseInt($('#ground_floor_length').val() ? $('#ground_floor_length').val() : 0);
                                            g_width  = parseFloat($('#ground_floor_width').val() ? $('#ground_floor_width').val() : 0);
                                            $('#ground_floor_area').val((g_length * g_width ? g_length * g_width : 0).toFixed(0));
                                        });

                                        $('#upper_floor_length, #upper_floor_width').change(function() {
                                            var u_length = parseInt($('#upper_floor_length').val());
                                            var u_width = parseFloat($('#upper_floor_width').val());
                                            $('#upper_floor_area').val((u_length * u_width ? u_length * u_width : 0).toFixed(0));
                                        });
                                        $('#further_floor_length, #further_floor_width').change(function() {
                                            var f_length = parseInt($('#further_floor_length').val());
                                            var f_width = parseFloat($('#further_floor_width').val());
                                            $('#further_floor_area').val((f_length * f_width ? f_length * f_width : 0).toFixed(0));
                                        });
                                        $('#ground_floor_length, #ground_floor_width, #upper_floor_length, #upper_floor_width,#further_floor_length, #further_floor_width').on('change' ,function() {
                                            var total_g = 0;
                                            var total_u = 0;
                                            var total_f = 0;
                                            var sum = 0;

                                            total_g = Number($('#ground_floor_area').val());
                                            total_u = Number($('#upper_floor_area').val());
                                            total_f = Number($('#further_floor_area').val());
                                            sum = Number(total_g + total_u + total_f);
                                            $('#total_area').val(sum);
                                        });
                                        //family
                                        $('.calculate').change(function(){
                                            var member = parseInt($('#total_people').val());
                                            var land = parseInt($('#total_area').val());
                                            var score = $('#a_score1').val();
                                            // 1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ
                                            if(((member >=1 && member <= 3) && (land>=1 && land <=20)) || ((member >=4 && member <=6) && (land>=1 && land <=30)) || ((member >=7 && member <= 10) && (land>=1 && land <=40)) || ((member>10)&&(land>=1 && land<=50))){
                                                $('#a_score1').val(8);
                                            }
                                            else if(((member >= 1 && member <=3) && (land>20 && land<=30)) || ((member>=4 && member<=6)&&(land>30 && land<=40)) || ((member>=7 && member<=10)&&(land>40 && land<=55)) || ((member>10)&&(land>50 && land<=65)) )
                                            {
                                                $('#a_score1').val(6);
                                            }
                                            else if( ((member >= 1 && member <=3) && (land>30 && land<=40)) || ((member>=4 && member<=6)&&(land>40 && land<=50)) || ((member>=7 && member<=10)&&(land>55 && land<=65)) || ((member>10)&&(land>65 && land<=75)) ){
                                                $('#a_score1').val(3);
                                            }
                                            else{
                                                $('#a_score1').val(0);
                                            }
                                        });

                                        var homeyourselt = '<h4>គ.៥ ដំបូល</h4>' +
                                            '<table width="100%" class="table table-bordered table-striped">' +
                                            '<thead><tr>' +
                                            '<th>ដំបូលធ្វើអំពី <spand class="text-danger">*</spand></th>' +
                                            '<th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>' +
                                            '</tr></thead>'+
                                            '<tr>' +
                                            '<td>' +
                                            '<div class="form-group add_roof_relationship">' +
                                            '<select class="form-control roof_relationship cal_roof" id="roof_relationship" name="roof_made">' +
                                            '<option></option>' +
                                            '@foreach($roof_made as $keh => $value)' +
                                            '<option @if($household_root_rend != null && $household_root_rend->walls_made_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>' +
                                            '@endforeach'+
                                            '</select>' +
                                            '</div>' +
                                            '</td>'+
                                            '<td>' +
                                            '<div class="form-group add_r_status">' +
                                            '<select class="cal_roof form-control r_status" id="r_status" name="roof_status">' +
                                            '<option></option>@foreach($house_status as $keh => $value)<option @if($household_root_rend != null && $household_root_rend->roof_status_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                            '</select>' +
                                            '</div>' +
                                            '</td>'+
                                            '</tr>'+
                                            // '<tr​ style="display:none;">' +
                                            // '<td>3A 1 : ស្ថានភាពដំបូលផ្ទះ </td>' +
                                            // '<td>' +
                                            '<div class="my_hide form-group input-group" style="width: 300px;">'+
                                            '<input id="roof_score" type="text" name="roof_score" class="cal_roof form-control allowNumber"​ readonly>'+
                                            '<span class="input-group-addon">ពិន្ទុ</span>'+
                                            '</div>'+
                                            '</td>' +
                                            // '</tr>'
                                            '</table>';

                                        var building_year = '<div class="col-sm-6">' +
                                            '<table class="table-home table table-bordered table-striped">' +
                                            '<thead>' +
                                            '<tr>' +
                                            '<th>ផ្ទះសាងសង់នៅឆ្នាំណា? <spand class="text-danger">*</spand></th>' +
                                            '<th>តើធ្លាប់ជួសជុលឬទេ? <spand class="text-danger">*</spand></th>' +
                                            '</tr>' +
                                            '</thead>'+
                                            '<tr>' +
                                            '<td width="50%">' +
                                            '<div class="add_huild_year">' +
                                            '<select name="h_build_year" id="year_select" style="width: 100%;" name="build_in">'+
                                            '<option></option>' +
                                            '@php $currentYear = date('Y'); @endphp  @foreach (range(1950, $currentYear) as $value) <option @if($household_root_rend != null && $household_root_rend->h_build_year == $value) selected @endif value="{{$value}}">{{$value}}</option> @endforeach' +
                                            '</select>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td width="50%">' +
                                            '<div class="add_home_prepare">' +
                                            '<ul class="li-none">' +
                                            '@foreach($homePrepar as $key =>$p)' +
                                            '<li>' +
                                            '<label><input @if($household_root_rend != null && $household_root_rend->home_prepare_id  == $p->id) checked @endif style="margin-right: 10px;" class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>' +
                                            '@if($p->id == 2)<label id="homeyear">'+
                                            ' <label id="homeyear">' +
                                            '@if($household_root_rend != null && $household_root_rend->home_prepare_id ==2)' +
                                            '<select name="home_year" style="width: 180px;" id="years"><option></option>' +
                                            '<?php $currentYear = date('Y'); ?>'+
                                            '@foreach (range(1950, $currentYear) as $value)' +
                                            '<option @if($homePreparLink->home_year ?? '' == $value) selected @endif value="{{$value}}">{{$value}}</option>' +
                                            '@endforeach' +
                                            '</select>' +
                                            '@endif'+
                                            '</label>'+
                                            '</label>@endif' +
                                            '</li>' +
                                            '@endforeach'+
                                            '</ul>' +
                                            '</div>'+
                                            '</td>'+
                                            '</tr>' +
                                            '</table>'+
                                            '</div>';

                                        $('#building-year').append(building_year);
                                        $('#home-yourself').append(homeyourselt);
                                        $("#years").select2({allowClear:true, placeholder: "ឆ្នាំ"});

                                        $('.cal_roof').change(function(){
                                            var chose = $('#roof_relationship').val();
                                            var status = $('#r_status').val();
                                            if(chose == 3 || chose ==2 || chose == 6 || (chose == 4 && status == 1) || (chose ==1 && status == 1) || chose== 9){
                                                $('#roof_score').val(6);
                                            }else if( (chose == 4 && status == 2)){
                                                $('#roof_score').val(4);
                                            }else{
                                                $('#roof_score').val(0);
                                            }
                                        });
                                        $("#year_select").select2({allowClear:true, placeholder: "ឆ្នាំ"});
                                        $(".roof_relationship").select2({allowClear:true, placeholder: "ដំបូល"});
                                        $(".r_status").select2({allowClear:true, placeholder: "ស្ថានភាព"});

                                        $('.homeyear').click(function () {
                                            var homeyear = $('input[name=home_prepare]:checked').val();
                                            var year_build = $('#year_select').val();

                                            if(year_build != ''){
                                                year_build = $('#year_select').val();
                                            }else{
                                                year_build = '{{date("Y")+1}}';
                                            }
                                            var cur_year = '{{date("Y")}}';


                                            if(homeyear == 2){
                                                var opt = '';
                                                for(var y=year_build; y<=cur_year;y++){
                                                    opt += '<option value="'+y+'" >'+y+'</option>';
                                                }
                                                $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">'+opt+'</select>');
                                                $("#years").select2({allowClear:true, placeholder: 'ឆ្នាំ...'});
                                                $("#homeyear").css("display", "block");
                                            }else{
                                                $('#homeyear').html('');
                                            }
                                        });

                                        $('#year_select').change(function () {
                                            var year_build = $(this).val();
                                            var cur_year = '{{date("Y")}}';
                                            var opt = '';
                                            for (var y = year_build; y <= cur_year; y++) {
                                                opt += '<option value="' + y + '" >' + y + '</option>';
                                            }
                                            $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">' + opt + '</select>');
                                            $("#homeyear").css("display", "none");
                                            $('input[name=home_prepare]').removeAttr('checked');
                                            $("#years").select2({allowClear: true, placeholder: 'ឆ្នាំ...'});
                                        });


                                        var homeke = '<h4>គ.៦ ​ជញ្ជាំង</h4>' +
                                            '<table width="100%" class="table table-bordered table-striped">' +
                                            '<thead><tr>' +
                                            '<th>​ជញ្ជាំងធ្វើអំពី <spand class="text-danger">*</spand></th>' +
                                            '<th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>' +
                                            '</tr></thead>' +
                                            '<tr>' +
                                            '<td>' +
                                            '<div class="form-group add_wall_relationship">' +
                                            '<select class="cal_wall form-control wall_relationship" id="wall_relationship" name="walls_made">' +
                                            '<option></option>' +
                                            '@foreach($wall_made as $keh => $value)<option @if($household_root_rend != null && $household_root_rend->walls_made_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                            '</select>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>'+
                                            '<div class="form-group add_h_status">'+
                                            '<select class="cal_wall form-control h_status" id="h_status" name="walls_status">'+
                                            '<option></option>'+
                                            '@foreach($house_status as $keh => $value)<option @if($household_root_rend != null && $household_root_rend->walls_status_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
                                            '</select>'+
                                            '</div>'+
                                            '</td>'+
                                            '</tr>' +
                                            '<tr class="my_hide">' +
                                            '<td>3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ</td>' +
                                            '<td>' +
                                            '<div class="form-group input-group" style="width: 300px;">'+
                                            '<input id="wall_score" type="text" name="wall_score" class="cal_wall form-control allowNumber"​ readonly>'+
                                            '<span class="input-group-addon">ពិន្ទុ</span>'+
                                            '</div>'+
                                            '</td>' +
                                            '</tr>'+
                                            '</table>';

                                        $('#home-ke').append(homeke);
                                        $('.cal_wall').change(function(){
                                            var chose = $('#wall_relationship').val();
                                            var status = $('#h_status').val();
                                            if( (chose >=1 && chose<=3) || chose ==7 ){
                                                $('#wall_score').val(6);
                                            }else if(chose == 5){
                                                $('#wall_score').val(4);
                                            }else{ $('#wall_score').val(0);}
                                        });
                                        $(".wall_relationship").select2({ allowClear:true, placeholder: "ជញ្ជាំង"});
                                        $(".h_status").select2({ allowClear:true, placeholder: "ស្ថានភាព"});
                                        var generalStatus = '<h4>គ.៧) ស្ថានភាពទូទៅផ្ទះសម្បែង</h4>' +
                                            '<div class="add_condition_house"><ul class="li-none">'+
                                            '@foreach($condition_house as $key => $c)' +
                                            '<li>' +
                                            '<label><input @if($household_root_rend != null && $household_root_rend->condition_house_id == $c->id) checked @endif style="margin-right:10px;" class="condition_house" type="radio" name="condition_house" ​ value="{{$c->id}}" > {{$c->name_kh}}</label>' +
                                            '</li>' +
                                            '@endforeach'+
                                            '</ul></div>'+
                                            '<div class="my_hide form-group input-group" style="width: 300px;">'+
                                            '<input id="house_score" type="text" name="house_score" class="house_score form-control allowNumber"​ readonly>'+
                                            '<span class="input-group-addon">ពិន្ទុ</span>'+
                                            '</div>';
                                        $('#general-status').append(generalStatus);

                                        $('.condition_house').click(function(){
                                            var house = $('input[name=condition_house]:checked').val();
                                            if(house ==1){
                                                $('#house_score').val(4);
                                            }else if(house == 2){
                                                $('#house_score').val(2.5);
                                            }else{ $('#house_score').val(0);}
                                        });
                                    }
                                });
                            </script>
                        </div>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4>  គ.២ តើ​មាន​មនុស្សសរុប​ចំនួន​ប៉ុន្មាន​នាក់ រស់​នៅក្នុងផ្ទះដែលអ្នកស្នាក់នៅ
                                <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title=" រាប់ទាំង​សមាជិក​គ្រួសារ និង​អ្នកផ្សេង"></a></h4>
                            <div class="col-sm-4">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label">សរុប </label></td>
                                        <td>
                                            <div class="form-group input-group add_total_people">
                                                <input readonly="readonly" id="total_people" type="text" name="total_people" class="calculate cal t_land form-control allowNumber"​>
                                                <span class="input-group-addon">នាក់</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-12"><hr> </div>

                        <div id="household_area">
                            @if($gFamily->household_family_id == 1)
                                <div class="col-sm-12">
                                    <h4> គ.៣ តើ​ផ្ទៃ​ក្រឡា​ទីលំនៅរបស់ក្រុម​គ្រួសារ ​មាន​ចំនួន​ប៉ុន្មាន​ម៉ែត្រ​ក្រឡា​?​</h4>
                                    <table class="tb_grid table table-bordered table-striped tbl-floor" style="width:100%;">
                                        <tbody>
                                        <tr>
                                            <td><b>ផ្ទះជាន់ក្រោម៖</b></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->ground_floor_length}}" autocomplete="off" id="ground_floor_length" class="calculate form-control allowFlot ground_floor"  placeholder="បណ្តោយ" type="text" name="ground_floor_length">
                                                    <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->ground_floor_width}}" autocomplete="off" id="ground_floor_width" class="calculate form-control allowFlot ground_floor"  placeholder="ទទឹង" type="text" name="ground_floor_width">
                                                    <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->ground_floor_area}}" autocomplete="off" id="ground_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="ground_floor_area" readonly="readonly">
                                                    <span class="input-group-addon">ម៉ែត្រក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr>
                                            <td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->upper_floor_length}}" autocomplete="off" id="upper_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text" name="upper_floor_length">
                                                    <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->upper_floor_width}}" autocomplete="off" id="upper_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="upper_floor_width">
                                                    <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->upper_floor_area}}" autocomplete="off" id="upper_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="upper_floor_area" readonly="readonly">
                                                    <span class="input-group-addon">ម៉ែត្រក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr>
                                            <td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->further_floor_length}}" autocomplete="off" id="further_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text"  name="further_floor_length">
                                                    <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->further_floor_width}}" autocomplete="off" id="further_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="further_floor_width">
                                                    <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->further_floor_area}}" autocomplete="off" id="further_floor_area" class="calculate form-control allowFlot" required="required" placeholder="ផ្ទៃ" type="text" name="further_floor_area" readonly="readonly">
                                                    <span class="input-group-addon">ម៉ែត្រក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr>
                                            <td colspan="3"><b style="float:right;">ផ្ទៃកម្រាលសរុប :</b></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    <input value="{{$household_root->total_area}}" readonly="readonly" autocomplete="off" id="total_area" name="total_area" class="calculate form-control allowFlot"  placeholder="ផ្ម៉ែត្រក្រឡា..." type="text">
                                                    <span class="input-group-addon">ម៉ែត្រ​ក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        <tr class="my_hide">
                                            <td colspan="3"><b style="float:right;">1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ :</b></td>
                                            <td>
                                                <div class="form-group input-group">
                                                    @foreach($store_score as $key=>$value)
                                                    <input autocomplete="off" type="hidden" id="a_score1" name="size_member_score" class="calculate form-control  allowFlot"​ required="required" readonly="readonly" value="{{$value->size_member}}">
                                                    <span class="input-group-addon">ពិន្ទុ</span>
                                                    @endforeach
                                                </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                <div class="col-sm-12"><hr></div>
                                <script type="text/javascript">
                                    //family
                                    $('.ground_floor').change(function(){
                                        var g_length = 0;
                                        var g_width = 0;
                                        g_length = parseInt($('#ground_floor_length').val() ? $('#ground_floor_length').val() : 0);
                                        g_width  = parseFloat($('#ground_floor_width').val() ? $('#ground_floor_width').val() : 0);
                                        $('#ground_floor_area').val((g_length * g_width ? g_length * g_width : 0).toFixed(0));
                                    });

                                    $('#upper_floor_length, #upper_floor_width').change(function() {
                                        var u_length = parseInt($('#upper_floor_length').val());
                                        var u_width = parseFloat($('#upper_floor_width').val());
                                        $('#upper_floor_area').val((u_length * u_width ? u_length * u_width : 0).toFixed(0));
                                    });
                                    $('#further_floor_length, #further_floor_width').change(function() {
                                        var f_length = parseInt($('#further_floor_length').val());
                                        var f_width = parseFloat($('#further_floor_width').val());
                                        $('#further_floor_area').val((f_length * f_width ? f_length * f_width : 0).toFixed(0));
                                    });
                                    $('#ground_floor_length, #ground_floor_width, #upper_floor_length, #upper_floor_width,#further_floor_length, #further_floor_width').on('change' ,function() {
                                        var total_g = 0;
                                        var total_u = 0;
                                        var total_f = 0;
                                        var sum = 0;

                                        total_g = Number($('#ground_floor_area').val());
                                        total_u = Number($('#upper_floor_area').val());
                                        total_f = Number($('#further_floor_area').val());
                                        sum = Number(total_g + total_u + total_f);
                                        $('#total_area').val(sum);
                                    });
                                    //family
                                    $('.calculate').change(function(){
                                        var member = parseInt($('#total_people').val());
                                        var land = parseInt($('#total_area').val());
                                        var score = $('#a_score1').val();
                                        // 1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ
                                        if(((member >=1 && member <= 3) && (land>=1 && land <=20)) || ((member >=4 && member <=6) && (land>=1 && land <=30)) || ((member >=7 && member <= 10) && (land>=1 && land <=40)) || ((member>10)&&(land>=1 && land<=50))){
                                            $('#a_score1').val(8);
                                        }
                                        else if(((member >= 1 && member <=3) && (land>20 && land<=30)) || ((member>=4 && member<=6)&&(land>30 && land<=40)) || ((member>=7 && member<=10)&&(land>40 && land<=55)) || ((member>10)&&(land>50 && land<=65)) )
                                        {
                                            $('#a_score1').val(6);
                                        }
                                        else if( ((member >= 1 && member <=3) && (land>30 && land<=40)) || ((member>=4 && member<=6)&&(land>40 && land<=50)) || ((member>=7 && member<=10)&&(land>55 && land<=65)) || ((member>10)&&(land>65 && land<=75)) ){
                                            $('#a_score1').val(3);
                                        }
                                        else{
                                            $('#a_score1').val(0);
                                        }
                                    });
                                </script>
                            @endif


                                @if($gFamily->household_family_id == 3)
                                    <div class="col-sm-12">
                                        <h4> គ.៣ តើ​ផ្ទៃ​ក្រឡា​ទីលំនៅរបស់ក្រុម​គ្រួសារ ​មាន​ចំនួន​ប៉ុន្មាន​ម៉ែត្រ​ក្រឡា​?​</h4>
                                        <table class="tb_grid table table-bordered table-striped tbl-floor" style="width:100%;">
                                            <tbody>
                                            <tr>
                                                <td><b>ផ្ទះជាន់ក្រោម៖</b></td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->ground_floor_length}}" autocomplete="off" id="ground_floor_length" class="calculate form-control allowFlot ground_floor"  placeholder="បណ្តោយ" type="text" name="ground_floor_length">
                                                        <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->ground_floor_width}}" autocomplete="off" id="ground_floor_width" class="calculate form-control allowFlot ground_floor"  placeholder="ទទឹង" type="text" name="ground_floor_width">
                                                        <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->ground_floor_area}}" autocomplete="off" id="ground_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="ground_floor_area" readonly="readonly">
                                                        <span class="input-group-addon">ម៉ែត្រក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->upper_floor_length}}" autocomplete="off" id="upper_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text" name="upper_floor_length">
                                                        <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->upper_floor_width}}" autocomplete="off" id="upper_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="upper_floor_width">
                                                        <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->upper_floor_area}}" autocomplete="off" id="upper_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="upper_floor_area" readonly="readonly">
                                                        <span class="input-group-addon">ម៉ែត្រក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->further_floor_length}}" autocomplete="off" id="further_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text"  name="further_floor_length">
                                                        <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->further_floor_width}}" autocomplete="off" id="further_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="further_floor_width">
                                                        <span class="input-group-addon">ម៉ែត្រ</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->further_floor_area}}" autocomplete="off" id="further_floor_area" class="calculate form-control allowFlot" required="required" placeholder="ផ្ទៃ" type="text" name="further_floor_area" readonly="readonly">
                                                        <span class="input-group-addon">ម៉ែត្រក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><b style="float:right;">ផ្ទៃកម្រាលសរុប :</b></td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input value="{{$household_root_rend->total_area}}" readonly="readonly" autocomplete="off" id="total_area" name="total_area" class="calculate form-control allowFlot"  placeholder="ផ្ម៉ែត្រក្រឡា..." type="text">
                                                        <span class="input-group-addon">ម៉ែត្រ​ក្រឡា</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="my_hide">
                                                <td colspan="3"><b style="float:right;">1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ :</b></td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        @foreach($store_score as $key=>$value)
                                                        <input autocomplete="off" type="hidden" id="a_score1" name="size_member_score" class="calculate form-control  allowFlot"​ required="required" readonly="readonly" value="{{$value->size_member}}">
                                                        <span class="input-group-addon">ពិន្ទុ</span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-sm-12"><hr></div>
                                    <script type="text/javascript">
                                        //family
                                        $('.ground_floor').change(function(){
                                            var g_length = 0;
                                            var g_width = 0;
                                            g_length = parseInt($('#ground_floor_length').val() ? $('#ground_floor_length').val() : 0);
                                            g_width  = parseFloat($('#ground_floor_width').val() ? $('#ground_floor_width').val() : 0);
                                            $('#ground_floor_area').val((g_length * g_width ? g_length * g_width : 0).toFixed(0));
                                        });

                                        $('#upper_floor_length, #upper_floor_width').change(function() {
                                            var u_length = parseInt($('#upper_floor_length').val());
                                            var u_width = parseFloat($('#upper_floor_width').val());
                                            $('#upper_floor_area').val((u_length * u_width ? u_length * u_width : 0).toFixed(0));
                                        });
                                        $('#further_floor_length, #further_floor_width').change(function() {
                                            var f_length = parseInt($('#further_floor_length').val());
                                            var f_width = parseFloat($('#further_floor_width').val());
                                            $('#further_floor_area').val((f_length * f_width ? f_length * f_width : 0).toFixed(0));
                                        });
                                        $('#ground_floor_length, #ground_floor_width, #upper_floor_length, #upper_floor_width,#further_floor_length, #further_floor_width').on('change' ,function() {
                                            var total_g = 0;
                                            var total_u = 0;
                                            var total_f = 0;
                                            var sum = 0;

                                            total_g = Number($('#ground_floor_area').val());
                                            total_u = Number($('#upper_floor_area').val());
                                            total_f = Number($('#further_floor_area').val());
                                            sum = Number(total_g + total_u + total_f);
                                            $('#total_area').val(sum);
                                        });
                                        //family
                                        $('.calculate').change(function(){
                                            var member = parseInt($('#total_people').val());
                                            var land = parseInt($('#total_area').val());
                                            var score = $('#a_score1').val();
                                            // 1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ
                                            if(((member >=1 && member <= 3) && (land>=1 && land <=20)) || ((member >=4 && member <=6) && (land>=1 && land <=30)) || ((member >=7 && member <= 10) && (land>=1 && land <=40)) || ((member>10)&&(land>=1 && land<=50))){
                                                $('#a_score1').val(8);
                                            }
                                            else if(((member >= 1 && member <=3) && (land>20 && land<=30)) || ((member>=4 && member<=6)&&(land>30 && land<=40)) || ((member>=7 && member<=10)&&(land>40 && land<=55)) || ((member>10)&&(land>50 && land<=65)) )
                                            {
                                                $('#a_score1').val(6);
                                            }
                                            else if( ((member >= 1 && member <=3) && (land>30 && land<=40)) || ((member>=4 && member<=6)&&(land>40 && land<=50)) || ((member>=7 && member<=10)&&(land>55 && land<=65)) || ((member>10)&&(land>65 && land<=75)) ){
                                                $('#a_score1').val(3);
                                            }
                                            else{
                                                $('#a_score1').val(0);
                                            }
                                        });
                                    </script>
                                @endif
                        </div>

                        <div class="col-sm-12">
                            <h4> គ.៤ បង្គន់</h4>

                            <div class="add_toilet">
                                <h5>តើគ្រួសាររបស់អ្នកមានបង្គន់ប្រើដែរឬទេ? <spand class="text-danger">*</spand></h5>
                                <ul class="li-none">
                                    @foreach($question_totel as $key =>$val)
                                        <li>
                                            <label><input @if($gFamily->toilet_id == $val->id) checked @endif style="margin-right:10px;" class="tolet" type="radio" name="tolet"  value="{{$val->id}}"> {{$val->name_kh}} </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="tolet">
                                @if($gFamily->toilet_id==1)
                                    <h5>- បើមាន តើជាបង្គន់ចាក់ទឹក ឬ បង្គន់ស្ងួត?</h5>
                                    <div class="add_toilet_1">
                                        <ul class="li-none">
                                            <li>
                                                <label><input @if($toilet->toilet_1 == 'បង្គន់ចាក់ទឹក') checked @endif style="margin-right:10px;" type="radio" name="tolet_1" ​​ value="បង្គន់ចាក់ទឹក"> បង្គន់ចាក់ទឹក</label>
                                            </li>
                                            <li>
                                                <label><input @if($toilet->toilet_1 == 'បង្គន់ស្ងួត') checked @endif style="margin-right:10px;" type="radio" name="tolet_1" value="បង្គន់ស្ងួត">  បង្គន់ស្ងួត</label>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5>- ជាបង្គន់​របស់នរណា?</h5>
                                    <div class="add_toilet_2">
                                        <ul class="li-none">
                                            <li>
                                                <label><input @if($toilet->toilet_2  == 'ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់') checked @endif style="margin-right:10px;" type="radio" name="tolet_2" ​​ value="ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់"> ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់ </label>
                                            </li>
                                            <li>
                                                <label><input @if($toilet->toilet_2 == 'ជាបង្គន់រួមជាមួយគ្រួសារដទៃ') checked @endif style="margin-right:10px;" type="radio" name="tolet_2" value="ជាបង្គន់រួមជាមួយគ្រួសារដទៃ"> ជាបង្គន់រួមជាមួយគ្រួសារដទៃ</label>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <label class="my_hide">បង្គន់អនាម័យ </label>
                            <div class="my_hide form-group input-group add_total_people" style="width: 300px;">
                                @foreach($store_score as $key => $value)
                                <input readonly="readonly" id="toilet_score" type="text" name="toilet_score" class="form-control allowNumber"​ value="{{$value->toilet}}">
                                <span class="input-group-addon">ពិន្ទុ</span>
                                @endforeach
                            </div>
                            <script>

                                $('.tolet').click(function () {
                                    var tolet = $('input[name=tolet]:checked').val();
                                    $('#tolet').empty();
                                    var tott = '<h5>បើមាន តើជាបង្គន់ចាក់ទឹក ឬ បង្គន់ស្ងួត? <spand class="text-danger">*</spand></h5>' +
                                        '<div class="add_toilet_1"><ul class="li-none">' +
                                        '<li>' +
                                        '<label><input style="margin-right:10px;" type="radio" name="tolet_1" ​​ value="បង្គន់ចាក់ទឹក"> បង្គន់ចាក់ទឹក</label>' +
                                        '</li>' +
                                        '<li>' +
                                        '<label><input style="margin-right:10px;" type="radio" name="tolet_1" value="បង្គន់ស្ងួត">  បង្គន់ស្ងួត</label>' +
                                        '</li>' +
                                        '</ul></div>' +
                                        '<h5>ជាបង្គន់​របស់នរណា? <spand class="text-danger">*</spand></h5>' +
                                        '<div class="add_toilet_2"><ul class="li-none">' +
                                        '<li>' +
                                        '<label><input style="margin-right:10px;" type="radio" class="toilet_my" name="tolet_2" ​​ value="ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់"> ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់ </label>' +
                                        '</li>' +
                                        '<li>' +
                                        '<label><input style="margin-right:10px;" type="radio" class="toilet_status" name="tolet_2" value="ជាបង្គន់រួមជាមួយគ្រួសារដទៃ"> ជាបង្គន់រួមជាមួយគ្រួសារដទៃ</label>' +
                                        '</li>' +
                                        '</ul></div>';

                                    if(tolet == 1){$('#tolet').append(tott);}
                                    if(tolet == 2){
                                        $('#toilet_score').val(4);
                                    }else{
                                        $('#toilet_score').val('');
                                    }
                                    $('.toilet_status').click(function(){
                                        $('#toilet_score').val(2.5);
                                    });
                                    $('.toilet_my').click(function(){
                                        $('#toilet_score').val(0);
                                    });
                                });
                            </script>


                            <div class="row" id="building-year">
                                @if($gFamily->household_family_id == 1)
                                <div class="col-sm-12">
                                    <table class="table-home table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ផ្ទះសាងសង់នៅឆ្នាំណា? <spand class="text-danger">*</spand></th>
                                            <th>តើធ្លាប់ជួសជុលឬទេ? <spand class="text-danger">*</spand></th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td width="30%">
                                                <div class="add_huild_year">
                                                    <select name="h_build_year" id="year_select" style="width: 100%;" name="build_in">
                                                        <option></option>
                                                        @php $currentYear = date('Y'); @endphp  @foreach (range(1950, $currentYear) as $value) <option @if($household_root->h_build_year == $value) selected @endif value="{{$value}}">{{$value}}</option> @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                            <td width="70%">
                                                <div class="add_home_prepare">
                                                    <ul class="li-none">
                                                        @foreach($homePrepar as $key =>$p)
                                                        <li>
                                                            <label><input @if($household_root->home_prepare_id == $p->id) checked @endif style="margin-right: 10px;" class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>
                                                                @if($p->id == 2)
                                                                    <label id="homeyear">
                                                                        @if($household_root->home_prepare_id==2)
                                                                            <select name="home_year" style="width: 180px;" id="years"><option></option>
                                                                                <?php $currentYear = date('Y'); $editYear = $household_root->h_build_year;?>
                                                                                @foreach (range($editYear, $currentYear) as $value)
                                                                                    <option @if($homePreparLink->home_year == $value) selected @endif value="{{$value}}">{{$value}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <script type="text/javascript">$("#years").select2({allowClear:true, placeholder: 'ឆ្នាំ...'});</script>
                                                                        @endif
                                                                    </label>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <script>
                                        $("#year_select").select2({allowClear:true, placeholder: "ឆ្នាំ"});
                                        $('.homeyear').click(function () {
                                            var homeyear = $('input[name=home_prepare]:checked').val();
                                            var year_build = $('#year_select').val();

                                            if(year_build != ''){
                                                year_build = $('#year_select').val();
                                            }else{
                                                year_build = '{{date("Y")+1}}';
                                            }
                                            var cur_year = '{{date("Y")}}';


                                            if(homeyear == 2){
                                                var opt = '';
                                                for(var y=year_build; y<=cur_year;y++){
                                                    opt += '<option value="'+y+'" >'+y+'</option>';
                                                }
                                                $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">'+opt+'</select>');
                                                $("#years").select2({allowClear:true, placeholder: 'ឆ្នាំ...'});
                                                $("#homeyear").css("display", "block");
                                            }else{
                                                $('#homeyear').html('');
                                            }
                                        });

                                        $('#year_select').change(function () {
                                            var year_build = $(this).val();
                                            var cur_year = '{{date("Y")}}';
                                            var opt = '';
                                            for (var y = year_build; y <= cur_year; y++) {
                                                opt += '<option value="' + y + '" >' + y + '</option>';
                                            }
                                            $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">' + opt + '</select>');
                                            $("#homeyear").css("display", "none");
                                            $('input[name=home_prepare]').removeAttr('checked');
                                            $("#years").select2({allowClear: true, placeholder: 'ឆ្នាំ...'});
                                        });
                                    </script>
                                @endif
                                    @if($gFamily->household_family_id == 3)
                                        <div class="col-sm-12">
                                            <table class="table-home table table-bordered table-striped">
                                                <thead>
                                                <tr>
                                                    <th>ផ្ទះសាងសង់នៅឆ្នាំណា? <spand class="text-danger">*</spand></th>
                                                    <th>តើធ្លាប់ជួសជុលឬទេ? <spand class="text-danger">*</spand></th>
                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td width="30%">
                                                        <div class="add_huild_year">
                                                            <select name="h_build_year" id="year_select" style="width: 100%;" name="build_in">
                                                                <option></option>
                                                                @php $currentYear = date('Y'); @endphp  @foreach (range(1950, $currentYear) as $value) <option @if($household_root_rend->h_build_year == $value) selected @endif value="{{$value}}">{{$value}}</option> @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td width="70%">
                                                        <div class="add_home_prepare">
                                                            <ul class="li-none">
                                                                @foreach($homePrepar as $key =>$p)
                                                                    <li>
                                                                        <label><input @if($household_root_rend->home_prepare_id == $p->id) checked @endif style="margin-right: 10px;" class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>
                                                                        @if($p->id == 2)
                                                                            <label id="homeyear">
                                                                                @if($household_root_rend->home_prepare_id==2)
                                                                                    <select name="home_year" style="width: 180px;" id="years"><option></option>
                                                                                        <?php $currentYear = date('Y'); $editYear = $household_root->h_build_year;?>
                                                                                        @foreach (range($editYear, $currentYear) as $value)
                                                                                            <option @if($homePreparLink->home_year == $value) selected @endif value="{{$value}}">{{$value}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                    <script type="text/javascript">$("#years").select2({allowClear:true, placeholder: 'ឆ្នាំ...'});</script>
                                                                                @endif
                                                                            </label>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <script>
                                            $("#year_select").select2({allowClear:true, placeholder: "ឆ្នាំ"});
                                            $('.homeyear').click(function () {
                                                var homeyear = $('input[name=home_prepare]:checked').val();
                                                var year_build = $('#year_select').val();

                                                if(year_build != ''){
                                                    year_build = $('#year_select').val();
                                                }else{
                                                    year_build = '{{date("Y")+1}}';
                                                }
                                                var cur_year = '{{date("Y")}}';


                                                if(homeyear == 2){
                                                    var opt = '';
                                                    for(var y=year_build; y<=cur_year;y++){
                                                        opt += '<option value="'+y+'" >'+y+'</option>';
                                                    }
                                                    $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">'+opt+'</select>');
                                                    $("#years").select2({allowClear:true, placeholder: 'ឆ្នាំ...'});
                                                    $("#homeyear").css("display", "block");
                                                }else{
                                                    $('#homeyear').html('');
                                                }
                                            });

                                            $('#year_select').change(function () {
                                                var year_build = $(this).val();
                                                var cur_year = '{{date("Y")}}';
                                                var opt = '';
                                                for (var y = year_build; y <= cur_year; y++) {
                                                    opt += '<option value="' + y + '" >' + y + '</option>';
                                                }
                                                $('#homeyear').html('<select name="home_year" style="width: 180px;" id="years">' + opt + '</select>');
                                                $("#homeyear").css("display", "none");
                                                $('input[name=home_prepare]').removeAttr('checked');
                                                $("#years").select2({allowClear: true, placeholder: 'ឆ្នាំ...'});
                                            });
                                        </script>
                                    @endif
                            </div>

                        </div>



                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6" id="home-yourself">
                                    @if($gFamily->household_family_id == 1)
                                        <h4>គ.៥ ដំបូល</h4>
                                        <table width="100%" class="table table-bordered table-striped">
                                            <thead><tr>
                                                <th>ដំបូលធ្វើអំពី <spand class="text-danger">*</spand></th>
                                                <th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>
                                                </tr></thead>
                                            <tr>
                                                <td>
                                                    <div class="form-group add_roof_relationship">
                                                        <select class="form-control roof_relationship cal_roof" id="roof_relationship" name="roof_made">
                                                            <option></option>
                                                            @foreach($roof_made as $keh => $value)
                                                            <option @if($household_root_yourself->roof_made_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                <td>
                                                    <div class="form-group add_r_status">
                                                        <select class="cal_roof form-control r_status" id="r_status" name="roof_status">
                                                            <option></option>
                                                            @foreach($house_status as $keh => $value)
                                                                <option @if($household_root_yourself->roof_status_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <div class="my_hide form-group input-group" style="width: 300px;">
                                                    @foreach($store_score as $keh => $value)
                                                    <input id="roof_score" type="text" name="roof_score" value="{{$value->roof}}" class="cal_roof form-control allowNumber"​ readonly>
                                                    <span class="input-group-addon">ពិន្ទុ</span>
                                                    @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <script>
                                            $(".roof_relationship").select2({allowClear:true, placeholder: "ដំបូល"});
                                            $(".r_status").select2({allowClear:true, placeholder: "ស្ថានភាព"});

                                              $('.cal_roof').change(function(){
                                                    var chose = $('#roof_relationship').val();
                                                    var status = $('#r_status').val();
                                                    if(chose == 3 || chose ==2 || chose == 6 || (chose == 4 && status == 1) || (chose ==1 && status == 1) || chose== 9){
                                                        $('#roof_score').val(6);
                                                    }else if( (chose == 4 && status == 2)){
                                                        $('#roof_score').val(4);
                                                    }else{
                                                        $('#roof_score').val(0);
                                                    }
                                                });
                                        </script>
                                    @endif
                                        @if($gFamily->household_family_id == 3)
                                            <h4>គ.៥ ដំបូល</h4>
                                            <table width="100%" class="table table-bordered table-striped">
                                                <thead><tr>
                                                    <th>ដំបូលធ្វើអំពី <spand class="text-danger">*</spand></th>
                                                    <th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>
                                                </tr></thead>
                                                <tr>
                                                    <td>
                                                        <div class="form-group add_roof_relationship">
                                                            <select class="form-control roof_relationship cal_roof" id="roof_relationship" name="roof_made">
                                                                <option></option>
                                                                @foreach($roof_made as $keh => $value)
                                                                    <option @if($household_root_rend->roof_made_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group add_r_status">
                                                            <select class="cal_roof form-control r_status" id="r_status" name="roof_status">
                                                                <option></option>
                                                                @foreach($house_status as $keh => $value)
                                                                    <option @if($household_root_rend->roof_status_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @foreach($store_score as $keh => $value)
                                                <div class="my_hide form-group input-group" style="width: 300px;">
                                                    <input id="roof_score" type="text" value="{{$value->roof}}" name="roof_score" class="cal_roof form-control allowNumber"​ readonly>
                                                    <span class="input-group-addon">ពិន្ទុ</span>
                                                </div>
                                                @endforeach
                                                </td>
                                                </tr>
                                            </table>
                                            <script>
                                                $(".roof_relationship").select2({allowClear:true, placeholder: "ដំបូល"});
                                                $(".r_status").select2({allowClear:true, placeholder: "ស្ថានភាព"});

                                                $('.cal_roof').change(function(){
                                                    var chose = $('#roof_relationship').val();
                                                    var status = $('#r_status').val();
                                                    if(chose == 3 || chose ==2 || chose == 6 || (chose == 4 && status == 1) || (chose ==1 && status == 1) || chose== 9){
                                                        $('#roof_score').val(6);
                                                    }else if( (chose == 4 && status == 2)){
                                                        $('#roof_score').val(4);
                                                    }else{
                                                        $('#roof_score').val(0);
                                                    }
                                                });
                                            </script>
                                        @endif
                                </div>

                                <div class="col-sm-6" id="home-ke">
                                    @foreach($store_score as $key=>$value)
                                    @if($gFamily->household_family_id == 1)
                                        <h4>គ.៦ ​ជញ្ជាំង</h4>
                                        <table width="100%" class="table table-bordered table-striped">
                                            <thead><tr>
                                                <th>​ជញ្ជាំងធ្វើអំពី <spand class="text-danger">*</spand></th>
                                                <th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>
                                                </tr></thead>
                                            <tr>
                                                <td>
                                                    <div class="form-group add_wall_relationship">
                                                        <select class="cal_wall form-control wall_relationship" id="wall_relationship" name="walls_made">
                                                            <option></option>
                                                            @foreach($wall_made as $keh => $value)<option @if($household_root_yourself->walls_made_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                <td>
                                                    <div class="form-group add_h_status">
                                                        <select class="cal_wall form-control h_status" id="h_status" name="walls_status">
                                                            <option></option>
                                                            @foreach($house_status as $keh => $value)<option @if($household_root_yourself->walls_status_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <tr class="my_hide">
                                                <td>3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ</td>
                                                <td>
                                                  @foreach($store_score as $keh => $value)
                                                    <div class="form-group input-group" style="width: 300px;">
                                                        <input id="wall_score" type="text" name="wall_score" value="{{$value->wall}}" class="cal_wall form-control allowNumber"​ readonly>
                                                        <span class="input-group-addon">ពិន្ទុ</span>
                                                        </div>
                                                    </td>
                                                   @endforeach
                                                </tr>
                                            </table>
                                        <script>
                                            $(".wall_relationship").select2({ allowClear:true, placeholder: "ជញ្ជាំង"});
                                            $(".h_status").select2({ allowClear:true, placeholder: "ស្ថានភាព"});
                                             $('.cal_wall').change(function(){
                                                    var chose = $('#wall_relationship').val();
                                                    var status = $('#h_status').val();
                                                    if( (chose >=1 && chose<=3) || chose ==7 ){
                                                        $('#wall_score').val(6);
                                                    }else if(chose == 5){
                                                        $('#wall_score').val(4);
                                                    }else{ $('#wall_score').val(0);}
                                                });
                                        </script>
                                    @endif
                                    @endforeach
                                        @if($gFamily->household_family_id == 3)
                                            <h4>គ.៦ ​ជញ្ជាំង</h4>
                                            <table width="100%" class="table table-bordered table-striped">
                                                <thead><tr>
                                                    <th>​ជញ្ជាំងធ្វើអំពី <spand class="text-danger">*</spand></th>
                                                    <th>និង​ស្ថានភាព <spand class="text-danger">*</spand></th>
                                                </tr></thead>
                                                <tr>
                                                    <td>
                                                        <div class="form-group add_wall_relationship">
                                                            <select class="cal_wall form-control wall_relationship" id="wall_relationship" name="walls_made">
                                                                <option></option>
                                                                @foreach($wall_made as $keh => $value)<option @if($household_root_rend->walls_made_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group add_h_status">
                                                            <select class="cal_wall form-control h_status" id="h_status" name="walls_status">
                                                                <option></option>
                                                                @foreach($house_status as $keh => $value)<option @if($household_root_rend->walls_status_id  == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="my_hide">
                                                    <td>3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ</td>
                                                    <td>
                                                        @foreach($store_score as $key=>$value)
                                                        <div class="form-group input-group" style="width: 300px;">
                                                            <input id="wall_score" type="text" value="{{$value->wall}}" name="wall_score" class="cal_wall form-control allowNumber"​ readonly>
                                                            <span class="input-group-addon">ពិន្ទុ</span>
                                                        </div>
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            </table>
                                            <script>
                                                $(".wall_relationship").select2({ allowClear:true, placeholder: "ជញ្ជាំង"});
                                                $(".h_status").select2({ allowClear:true, placeholder: "ស្ថានភាព"});
                                            </script>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" id="general-status">
                            @if($gFamily->household_family_id == 1)
                            <h4>គ.៧) ស្ថានភាពទូទៅផ្ទះសម្បែង</h4>
                                <div class="add_condition_house"><ul class="li-none">
                                        @foreach($condition_house as $key => $c)
                                        <li>
                                            <label><input @if($household_root_yourself->condition_house_id  == $c->id) checked @endif style="margin-right:10px;" class="condition_house" type="radio" name="condition_house" ​ value="{{$c->id}}" > {{$c->name_kh}}</label>
                                            </li>
                                        @endforeach
                                        </ul>
                                </div>
                                @foreach($store_score as $key=>$value)
                                <div class="my_hide form-group input-group" style="width: 300px;">
                                    <input id="house_score" type="text" value="{{$value->house_status}}" name="house_score" class="house_score form-control allowNumber"​ readonly>
                                    <span class="input-group-addon">ពិន្ទុ</span>
                                </div>
                                @endforeach
                            @endif

                                @if($gFamily->household_family_id == 3)
                                    <h4>គ.៧) ស្ថានភាពទូទៅផ្ទះសម្បែង</h4>
                                    <div class="add_condition_house"><ul class="li-none">
                                            @foreach($condition_house as $key => $c)
                                                <li>
                                                    <label><input @if($household_root_rend->condition_house_id  == $c->id) checked @endif style="margin-right:10px;" class="condition_house" type="radio" name="condition_house" ​ value="{{$c->id}}" > {{$c->name_kh}}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="my_hide form-group input-group" style="width: 300px;">
                                        <input id="house_score" type="text" name="house_score" class="house_score form-control allowNumber"​ readonly>
                                        <span class="input-group-addon">ពិន្ទុ</span>
                                    </div>
                                @endif
                                <script type="text/javascript">
                                    $('.condition_house').change(function(){
                                            var house = $('input[name=condition_house]:checked').val();
                                            if(house ==1){
                                                $('#house_score').val(4);
                                            }else if(house == 2){
                                                $('#house_score').val(2.5);
                                            }else{ $('#house_score').val(0);}
                                        });
                                </script>

                        </div>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12" id="home-rent">
                            @if($gFamily->household_family_id == 2)
                            <h4>គ.៨) សម្រាប់គ្រួសារជួលផ្ទះគេ​ <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="សម្រាប់គ្រួសារមានផ្ទះផ្ទាល់ខ្លួន ឬ ​ នៅជាមួយគេដោយអត់បង់ថ្លៃ មិនបាច់បំពេញចំណុច គ៨ ហើយរំលងទៅ គ៩"></a></h4>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td width="50%">
                                            <label class="control-label"> តើថ្លៃជួលប្រចាំខែជាមធ្យមប៉ុន្មាន?: </label>
                                            </td>
                                        <td width="50%">
                                            <div class="form-group input-group">
                                                <input value="{{$rendPrice->house_rent_price ?? ''}}" autocomplete="off" id="price" type="text" required="required" class="cal form-control allowNumber" name="rent_fee"/><span class="input-group-addon">រៀល</span>
                                                </div>
                                            </td>
                                        </tr>
                                    <tr class="my_hide">
                                        <td width="50%">
                                            <label class="control-label"> គ្រួសារដែលនៅផ្ទះជួលគេ 3B</label>
                                            </td>
                                        <td width="50%">
                                            <div class="form-group input-group">
                                                <input autocomplete="off" id="r_score"  type="text" required="required" class="cal form-control allowNumber" name="price_rent_house_score"​​ readonly/><span class="input-group-addon">ពិន្ទុ</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        </div>




                        <div>
                            @include('include.edit-material-household-electronics')
                        </div>

                        <div>
                            @include('include.edit-electronic')
                        </div>

                        <div>
                            @include('include.edit-vehicle')
                        </div>

                        <div>
                            @include('include.edit-income')
                        </div>


                        <div>
                            @include('include.edit-land-agriculture')
                        </div>



                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            @include('include.edit-other-income-agriculture')
                        </div>


                        @include('include.edit-health-and-sability')

                        @include('include.edit-family-debt')

                        <div class="col-sm-12">
                            <h4>គ.១៥) ព័ត៍មានផ្សេងៗបន្ថែម ឬមតិយោបល់របស់អ្នកសម្ភាសន៍ (បើមាន)</h4>
                            <div class="col-sm-12">
                                <textarea class="form-control" name="command">{{$gFamily->command}}</textarea>
                            </div>
                        </div>

                        <hr>
                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-12">
                            <!-- <a  class="pull-left btn btn-default print-link3"><img src="" width="30"></a> -->
                            <button id="nextStep3" class="btn btn-primary pull-right mysubmit nextBtn btnSave" type="button">រក្សាទុក​​ និង បញ្ចប់</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>




    <script type="text/javascript">

        var step2Row5 = 1;
        $(document).ready(function () {

            $("#delete").click(function(){
                if (!confirm("តើអ្នកចង់លុបអ្នកជំងឺដែរឫទេ?")){
                    return false;
                }
            });

            $(".form-control").attr("autocomplete", "off");
            //next next and validate
            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn'),
                step2Next = $('#step2Next'),
                step3Next = $('#nextStep3');
            allWells.hide();
            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);
                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    // $target.find('input:eq(2)').focus();
                }
            });
            //step1
            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],input[type='radio']"),
                    isValid = true;
                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        $('.alert').show();
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        // $('.alert').show();
                    }
                }

                if ($('#current_date').val() == '') {
                    $('.current_date').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                } else {
                    $('.current_date').removeClass("has-error");
                }

                if ($('#expire_date').val() == '') {
                    $('.expire_date').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                } else {
                    $('.expire_date').removeClass("has-error");
                }


                if(isNaN(parseInt($('#hospital').val())) ||
                    isNaN(parseInt($('#province').val())) ||
                    isNaN(parseInt($('#district').val())) ||
                    isNaN(parseInt($('#commune').val())) ||
                    isNaN(parseInt($('#village').val()))
                ){
                    $('.add_hospital').addClass("has-error");
                    $('.g_province').addClass("has-error");
                    $('.g_district').addClass("has-error");
                    $('.g_commune').addClass("has-error");
                    $('.g_village').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                }else{
                    $('.add_hospital').removeClass("has-error");
                    $('.g_province').removeClass("has-error");
                    $('.g_district').removeClass("has-error");
                    $('.g_commune').removeClass("has-error");
                    $('.g_village').removeClass("has-error");
                }

                if ($('#location').val() == '') {
                    $('.location').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                } else {
                    $('.location').removeClass("has-error");
                }

                //check radio
                if (!$("input[name='g_sex']:checked").val()) {
                    $('#g_sex').addClass("error");
                    $('.alert').show();
                    isValid = false;
                }else{
                    $('#g_sex').removeClass("error");
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            // step2
            step2Next.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text']"),
                    isValid = true;
                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        $('.alert').show();
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }
                //in append
                var row_num = $('.new_rows tr').length;
                var plus = '';
                var plus_not = '';
                step2Row = row_num;
                step2Row5 = row_num;

                $('#total_people').val(row_num);
               // $('.new_rows_4').empty();
                //$('.new_rows_5').empty();
                $('#total_monthly_income').empty();
                $('#total_inc_person').empty();
                $('#total_monthly_income_not').empty();
                $('#total_inc_person_not').empty();
                $('#income_out_farmer_score').empty();
                // alert(row_num);
                //$('.family_relationship').trigger('change');

//            var fa1 = $('#family_relationship_1 option:selected').val();
//            var fa2 = $('#family_relationship_2 option:selected').val();
//            var fa3 = $('#family_relationship_3 option:selected').val();
//            var fa4 = $('#family_relationship_4 option:selected').val();
//            var fa5 = $('#family_relationship_5 option:selected').val();
//            var fa6 = $('#family_relationship_6 option:selected').val();
//            var fa7 = $('#family_relationship_7 option:selected').val();
//            var fa8 = $('#family_relationship_8 option:selected').val();
//            var fa9 = $('#family_relationship_9 option:selected').val();
//            var fa10 = $('#family_relationship_10 option:selected').val();
//            console.log(fa1+'-'+fa2+'-'+fa3+'-'+fa4+'-'+fa5+'-'+fa6+'-'+fa7+'-'+fa8+'-'+fa9+'-'+fa10);
//            if (!fa1) {
//                $('.alert').show();
//                $('.add_relationship_1').addClass("has-error");
//                isValid = false;
//            } else {
//                $('.add_relationship_1').removeClass("has-error");
//            }
//
//            if (fa2 == '') {
//                $('.alert').show();
//                $('.add_relationship_2').addClass("has-error");
//                isValid = false;
//            } else {
//                $('.add_relationship_2').removeClass("has-error");
//            }
//            if (fa3 == '') {
//                $('.alert').show();
//                $('.add_relationship_3').addClass("has-error");
//                isValid = false;
//            } else {
//                $('.add_relationship_3').removeClass("has-error");
//            }
//            if (fa4 == '') {
//                $('.alert').show();
//                $('.add_relationship_4').addClass("has-error");
//                isValid = false;
//            } else {
//                $('.add_relationship_4').removeClass("has-error");
//            }
//            if (fa5 == '') {
//                $('.alert').show();
//                $('.add_relationship_5').addClass("has-error");
//                isValid = false;
//            } else {
//                $('.add_relationship_5').removeClass("has-error");
//            }
//            if (fa6 == '') {
//                $('.alert').show();
//                $('.add_relationship_6').addClass("has-error");
//                isValid = false;
//            } else {
//                $('.add_relationship_6').removeClass("has-error");
//            }

                var row_numc4 = $('.new_rows_4 tr.myrow_4').length;
                var row_numc5 = $('.new_rows_5 tr.myrow_5').length;
                var row_numc = $('.new_rows tr').length; //alert(row_numc4);
                if(row_numc == row_numc4){
                    $('#plus-check').empty();
                }
                if(row_numc == row_numc5){
                    $('#plus-check5').empty();
                }

                for(var i=0; i<row_num; i++) {

                    var re = $('#family_relationship_'+i).val();
                    var index= $('.m_sex').attr('index');
                    //console.log(index+'='+re);
                    if ($('#family_relationship_'+i).val() == '') {
                        $('.alert').show();
                        $('.add_relationship_'+i).addClass("has-error");
                        isValid = false;
                    } else {
                        $('.add_relationship_'+i).removeClass("has-error");
                    }

                    if($('#m_sex_'+i).val() == ''){
                        $('.alert').show();
                        $('.add_m_sex_'+i).addClass("has-error");
                        isValid = false;
                    }else{
                        $('.add_m_sex_'+i).removeClass("has-error");
                    }

                    if ($('#occupation_'+i).val() == ''){
                        $('.alert').show();
                        $('.add_occupation_'+i).addClass("has-error");
                        isValid = false;
                    } else {
                        $('.add_occupation_'+i).removeClass("has-error");
                    }
                    if ($('#education_level_'+i).val() == '') {
                        $('.alert').show();
                        $('.add_education_level_'+i).addClass("has-error");
                        isValid = false;
                    } else {
                        $('.add_education_level_'+i).removeClass("has-error");
                    }
                    var nick = $('.nick_name_'+i).val();
                    var m_age = $('.age_'+i).val();
                    // alert(nick);
                    //other income agriculture

                    if(i==0) {
                        plus = '<a class="btn btn-sm btn-primary" id="add_rows_4"><span class="glyphicon glyphicon-plus"></span></a>';
                    } else{
                        plus = '<a id="other_income_'+i+'" class="btn btn-sm btn-danger remove_rows_4"><span class="glyphicon glyphicon-minus"></span></a>';
                    }

                        var otherIncome = '<tr class="myrow_4">' +
                            '<td>'+(i+1)+'</td>'+
                            '<td>' +
                            '<div class="form-group"><input id="income_name_'+i+'" name="income_name['+i+']" autocomplete="off" class="form-control income_name" type="text" value="'+nick+'" readonly="readonly" required="required"></div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group"><input id="income_age_'+i+'" name="income_age['+i+']" autocomplete="off" class="form-control income_age" type="text" value="'+m_age+'" readonly="readonly" required="required"></div>' +
                            '</td>' +
                            '<td>' +
                            '<div class="form-group add_income_occupation">' +
                            '<select style="width: 100%" autocomplete="off" class="form-control income_occupation" id="income_occupation" name="income_occupation['+i+']" required="required">' +
                            '<option></option>' +
                            '@foreach($occupation as $keh => $value)' +
                            '<option value="{{$value->id}}">{{$value->name_kh}}</option>' +
                            '@endforeach' +
                            '</select>'+
                            '</div>' +
                            '</td>' +
                            '<td class="hidden">' +
                            '<div class="form-group add_income_unit"><input name="income_unit[' + i + ']" type="text" class="cal_incom form-control income_unit" placeholder="ថ្ងៃ" value="day" autocomplete="off" readonly="readonly"></div>' +
                            '</td>'+

                            '<td>'+
                            '<div class="cal_incom form-group input-group add_average_amount">'+
                            '<input  id="average_amount_'+i+'" name="average_amount['+i+']" type="text" class="cal_incom average_amount form-control allowNumber otherincome" autocomplete="off">'+
                            '<span class="input-group-addon">រៀល</span>'+
                            '</div>'+
                            '</td>'+

                            '<td>' +
                            '<div class="form-group input-group add_unit_in_month">' +
                            '<input  id="unit_in_month_'+i+'" name="unit_in_month['+i+']" type="text" class="cal_incom unit_in_month form-control allowNumber otherincome"  autocomplete="off">'+
                            '<span class="input-group-addon">ថ្ងៃ</span>' +
                            '</div>' +
                            '</td>'+

                            '<td>' +
                            '<div class="form-group input-group">' +
                            '<input  id="monthly_income_'+i+'" name="monthly_income['+i+']" type="text" class="cal_incom monthly_income form-control allowNumber monthly_income_total" readonly="readonly" autocomplete="off">'+
                            '<span class="input-group-addon">រៀល</span>' +
                            '</div>' +
                            '</td>'+
                            '<td style="text-align:center;">'+plus+'</td>' +
                            '</tr>';




                  //  $('.new_rows_4').append(otherIncome);


                    AllowNumber();
                    var row_num11 = $('.new_rows_4 tr').length;
                    $('.otherincome').change(function () {
                        for(var ii=0; ii<row_num11; ii++) {
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


                    //other income not agriculture
                    if(i==0) {
                        plus_not = '<a class="btn btn-sm btn-primary" id="add_rows_5"><span class="glyphicon glyphicon-plus"></span></a>';
                    } else{
                        plus_not = '<a id="other_income_not_'+i+'" class="btn btn-sm btn-danger remove_rows_5"><span class="glyphicon glyphicon-minus"></span></a>';
                    }
                    var otherIncome_not = '<tr class="myrow_5">' +
                        '<td>'+(i+1)+'</td>'+
                        '<td>' +
                        '<div class="form-group"><input id="income_name_not_'+i+'" name="income_name_not['+i+']" autocomplete="off" class="form-control income_name_not" type="text" value="'+nick+'" readonly="readonly" required="required"></div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="form-group"><input id="income_age_not_'+i+'" name="income_age_not['+i+']" autocomplete="off" class="form-control income_age_not" type="text" value="'+m_age+'" readonly="readonly" required="required"></div>' +
                        '</td>' +
                        '<td>' +
                        '<div class="form-group add_income_occupation_not">' +
                        '<select style="width: 100%" autocomplete="off" class="form-control income_occupation_not" id="income_occupation_not" name="income_occupation_not['+i+']" required="required">' +
                        '<option></option>' +
                        '@foreach($occupation as $keh => $value)' +
                        '<option value="{{$value->id}}">{{$value->name_kh}}</option>' +
                        '@endforeach' +
                        '</select>'+
                        '</div>' +
                        '</td>' +
                        '<td class="hidden">' +
                        '<div class="form-group add_income_unit_not">' +
                        '<input name="income_unit_not['+i+']" type="text" class="form-control income_unit_not" placeholder="ថ្ងៃ" value="day" autocomplete="off" readonly="readonly">' +
                        '</div>' +
                        '</td>'+

                        '<td>'+
                        '<div class="form-group input-group add_average_amount_not">'+
                        '<input id="average_amount_not_'+i+'" name="average_amount_not['+i+']" type="text" class="cal_incom_2 average_amount_not form-control allowNumber otherincome_not"  autocomplete="off">'+
                        '<span class="input-group-addon">រៀល</span>'+
                        '</div>'+
                        '</td>'+

                        '<td>' +
                        '<div class="form-group input-group add_unit_in_month_not">' +
                        '<input id="unit_in_month_not_'+i+'" name="unit_in_month_not['+i+']" type="text" class="cal_incom_2 unit_in_month_not form-control allowNumber otherincome_not" autocomplete="off">'+
                        '<span class="input-group-addon">ថ្ងៃ</span>' +
                        '</div>' +
                        '</td>'+

                        '<td>' +
                        '<div class="form-group input-group">' +
                        '<input id="monthly_income_not_'+i+'" name="monthly_income_not['+i+']" type="text" class="cal_incom_2 monthly_income_not form-control allowNumber monthly_income_total_not" readonly="readonly" autocomplete="off">'+
                        '<span class="input-group-addon">រៀល</span>' +
                        '</div>' +
                        '</td>'+
                        '<td style="text-align:center;">'+plus_not+'</td>' +
                        '</tr>';
                    //$('.new_rows_5').append(otherIncome_not);


                    AllowNumber();
                    var row_num_agric = $('.new_rows_5 tr').length;
                    $('.otherincome_not').change(function () {
                        for(var ii=0; ii<row_num_agric; ii++) {
                            var sum = 0;
                            var unit_in_month = $('#unit_in_month_not_'+ii).val();
                            var average_amount = $('#average_amount_not_'+ii).val();
                            if(unit_in_month > 31){$('#unit_in_month_not_'+ii).val('');}
                            sum = Number(unit_in_month * average_amount);
                            $("#other_income_not_"+ii).attr({"onclick": "remove_5("+sum+")"});
                            $('#monthly_income_not_'+ii).val(sum);
                        }
                    });

                    $(".getdata").click(function(){
                        //alert(1);
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
                }
                step2Row++;
                step2Row5++;


                if($('.family_relationship').val() == ''){
                    $('.alert').show();
                    $('.add_relationship').addClass("has-error");
                    isValid = false;
                }else{
                    $('.add_relationship').removeClass("has-error");
                }
                if($('.m_sex').val() == ''){
                    $('.alert').show();
                    $('.add_m_sex').addClass("has-error");
                    isValid = false;
                }else{
                    $('.add_m_sex').removeClass("has-error");
                }
                if($('.occupation').val() == ''){
                    $('.alert').show();
                    $('.add_occupation').addClass("has-error");
                    isValid = false;
                }else{
                    $('.add_occupation').removeClass("has-error");
                }
                if($('.education_level').val() == ''){
                    $('.alert').show();
                    $('.add_education_level ').addClass("has-error");
                    isValid = false;
                }else{
                    $('.add_education_level').removeClass("has-error");
                }
                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });
            //step3
            step3Next.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text']"),
                    isValid = true;
                $(".form-group").removeClass("has-error");
                $(".form-control-custome").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        $('.alert').show();
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                        $(curInputs[i]).closest(".form-control-custome").addClass("has-error");
                    }
                }
                if (!$("input[name='household_family_id']:checked").val()) {
                    $('.add_household_family').addClass("error");
                    $('.alert').show();
                    isValid = false;
                }else{$('.add_household_family').removeClass("error");}
                if ($("input[name='household_family_id']:checked").val() == 1 ||
                    $("input[name='household_family_id']:checked").val() == 3) {
                    if (!$("input[name='home_prepare']:checked").val()) {
                        $('.add_home_prepare').addClass("error");
                        $('.alert').show();
                        isValid = false;
                    }else{$('.add_home_prepare').removeClass("error");}
                    if (!$("input[name='condition_house']:checked").val()) {
                        $('.add_condition_house').addClass("error");
                        $('.alert').show();
                        isValid = false;
                    }else{$('.add_condition_house').removeClass("error");}
                    if($('#years').val() == ''){
                        $('#homeyear').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('#homeyear').removeClass("has-error");
                    }
                    if($('#year_select').val() == ''){
                        $('.add_huild_year').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_huild_year').removeClass("has-error");
                    }
                    //roof
                    if($('#roof_relationship').val() == ''){
                        $('.add_roof_relationship').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_roof_relationship').removeClass("has-error");
                    }
                    if($('#r_status').val() == ''){
                        $('.add_r_status').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_r_status').removeClass("has-error");
                    }
                    if($('#h_status').val() == ''){
                        $('.add_h_status').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_h_status').removeClass("has-error");
                    }
                    if($('#wall_relationship').val() == ''){
                        $('.add_wall_relationship').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_wall_relationship').removeClass("has-error");
                    }
                }
                //toilet
                if (!$("input[name='tolet']:checked").val()) {
                    $('.add_toilet').addClass("error");
                    $('.alert').show();
                    isValid = false;
                }else{$('.add_toilet').removeClass("error");}
                if($("input[name='tolet']:checked").val() == 1) {
                    if (!$("input[name='tolet_1']:checked").val()) {
                        $('.add_toilet_1').addClass("error");
                        $('.alert').show();
                        isValid = false;
                    } else {
                        $('.add_toilet_1').removeClass("error");
                    }
                    if (!$("input[name='tolet_2']:checked").val()) {
                        $('.add_toilet_2').addClass("error");
                        $('.alert').show();
                        isValid = false;
                    }else{$('.add_toilet_2').removeClass("error");}
                }
                //type_meterial[0]
                if($('.type_meterial').val() == ''){
                    $('.add_type_meterial').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                }else{
                    $('.add_type_meterial').removeClass("has-error");
                }
                //in append
                var row_num = $('.new_rows_1 tr').length;
                for(var i=0; i<row_num; i++) {
                    if($('#type_meterial_'+i).val() == ''){
                        $('.add_type_meterial_'+i).addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_type_meterial_'+i).removeClass("has-error");
                    }
                }
                if (!$("input[name='q_electric']:checked").val()) {
                    $('.add_q_electric').addClass("error");
                    $('.alert').show();
                    isValid = false;
                }else{$('.add_q_electric').removeClass("error");}
                if ($("input[name='q_electric']:checked").val()==2) {
                    if (!$("input[name='electric_grid_id']:checked").val()) {
                        $('.add_electric_grid').addClass("error");
                        $('.alert').show();
                        isValid = false;
                    } else {
                        $('.add_electric_grid').removeClass("error");
                    }
                }
                // go_hospital
//            if($('#go_hospital').val() == ''){
//                $('.go_hospital').addClass("has-error");
//                $('.alert').show();
//                isValid = false;
//            }else{
//                $('.go_hospital').removeClass("has-error");
//            }
                //#type_vehicle in append
                var row_num2 = $('.new_rows_2 tr').length;
                for(var i=0; i<row_num2; i++) {
                    if($('#type_vehicle_'+i).val() == ''){
                        $('.add_type_vehicle_'+i).addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_type_vehicle_'+i).removeClass("has-error");
                    }
                }
                if($('#type_vehicle').val() == ''){
                    $('.add_type_vehicle').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                }else{
                    $('.add_type_vehicle').removeClass("has-error");
                }
                //roof
                if($('#total_people').val() == ''){
                    $('.add_total_people').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                }else{
                    $('.add_total_people').removeClass("has-error");
                }


                if (!$("input[name='income_agricalture_type']:checked").val()) {
                    $('.add_income_agricalture_type').addClass("error");
                    $('.alert').show();
                    isValid = false;
                }else{$('.add_income_agricalture_type').removeClass("error");}

//                if ($("input[name='income_agricalture_type']:checked").val()==1) {
//                    if($('.unit_in_month').val() == '' ||
//                        $('.average_amount').val() == '' ||
//                        $('#income_occupation').val() == ''){
//                        $('.alert').show();
//                        $('.add_unit_in_month').addClass("has-error");
//                        $('.add_average_amount').addClass("has-error");
//                        $('.add_income_occupation').addClass("has-error");
//                        isValid = false;
//                    }else{
//                        $('.add_unit_in_month').removeClass("has-error");
//                        $('.add_average_amount').removeClass("has-error");
//                        $('.add_income_occupation').removeClass("has-error");
//                    }
//                }else{
//                    if($('.unit_in_month_not').val() == '' ||
//                        $('.average_amount_not').val() == '' ||
//                        $('#income_occupation_not').val() == ''){
//                        $('.alert').show();
//                        $('.add_unit_in_month_not').addClass("has-error");
//                        $('.add_average_amount_not').addClass("has-error");
//                        $('.add_income_occupation_not').addClass("has-error");
//                        isValid = false;
//                    }else{
//                        $('.add_unit_in_month_not').removeClass("has-error");
//                        $('.add_average_amount_not').removeClass("has-error");
//                        $('.add_income_occupation_not').removeClass("has-error");
//                    }
//                }



                //debt
                if (!$("input[name='family_debt_id']:checked").val()) {
                    $('.add_family_debt_id').addClass("error");
                    $('.alert').show();
                    isValid = false;
                }else{$('.add_family_debt_id').removeClass("error");}

                if ($("input[name='family_debt_id']:checked").val()==1) {
                    if (!$("input[name='q_debt']:checked").val()) {
                        $('.debt_question').addClass("error");
                        $('.alert').show();
                        isValid = false;
                    }else{$('.debt_question').removeClass("error");}
                }
                if ($("input[name='family_debt_id']:checked").val()==2) {
                    if($('#total_debt').val() == ''){
                        $('.add_total_debt').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_total_debt').removeClass("has-error");
                    }
                    if($('#debt_duration').val() == ''){
                        $('.add_debt_duration').addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_debt_duration').removeClass("has-error");
                    }
                }
                //#type_animals in append
                var row_num3 = $('.new_rows_3 tr').length;
                for(var i=0; i<row_num3; i++) {
                    if($('#type_animals_'+i).val() == ''){
                        $('.add_type_animals_'+i).addClass("has-error");
                        $('.alert').show();
                        isValid = false;
                    }else{
                        $('.add_type_animals_'+i).removeClass("has-error");
                    }
                }
                if($('#type_animals').val() == ''){
                    $('.add_type_animals').addClass("has-error");
                    $('.alert').show();
                    isValid = false;
                }else{
                    $('.add_type_animals').removeClass("has-error");
                }



                //land
//            if (!$("input[name='land']:checked").val()) {
//                $('.add_land').addClass("error");
//                $('.alert').show();
//                isValid = false;
//            }else{$('.add_land').removeClass("error");}
                //if (isValid)
                //  nextStepWizard.removeAttr('disabled').trigger('click');
                if (isValid)
                    $(".form-group-post").submit();
            });
            $('div.setup-panel div a.btn-primary').trigger('click');
        });
        $('#st1').click(function() {
            $('#st2').attr('disabled', 'disabled').trigger('click');
        });
        $('#st2').click(function() {
            $('#st3').attr('disabled', 'disabled').trigger('click');
        });
        /*========================================================================
         ===============// select hospital code append interview code //=================
         ==========================================================================*/

        $("#hospital").select2({
            allowClear:true,
            placeholder: 'មន្ទីរពេទ្យ'
        });
        $("#hospital").change(function () {
            var od_code = $('#hospital').val();
            $.ajax({
                type: 'GET',
                url: "{{ route('getInterviewCode') }}",
                data: {'od_code': od_code},
                beforeSend: function(){
                    $("#loading").fadeIn();
                },
                success: function (data) {
                    // console.log(data);
                    var obj = JSON.parse(data);
                    // console.log(obj);
                    //$("#interview_code").val('');
                    $("#interview_code").val(obj);
                },
                complete: function(){
                    $("#loading").fadeOut(100);
                },
                error: function (report){
                    console.log(report);
                }
            });
        });

        $("#hospital").change(function () {
            var od_code  = $('#hospital').val();
            var hospital = $('#hospital option:selected').text();

            $.ajax({
                type: 'GET',
                url: "{{ route('getHealthFacilitiesCode') }}",
                data: {'od_code': od_code,'hospital': hospital},
                beforeSend: function(){
                    $("#loading").fadeIn();
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    $("#health_facilities_code").val(obj);
                },
                complete: function(){
                    $("#loading").fadeOut(100);
                }
            });
        });
        /*========================================================================
         ===============// select province code append district //=================
         ==========================================================================*/
        $("#province").select2({
            allowClear:true,
            placeholder: 'ខេត្ត'
        });
        $("#province").change(function () {
            var province_id = $('#province').val();
            $.ajax({
                type: 'GET',
                url: "{{ route('getDistrict') }}",
                data: {'province_id': province_id},
                beforeSend: function(){
                    $("#loading").fadeIn();
                },
                success: function (data) {
                    // console.log(data);
                    //console.log(JSON.parse(data));
                    data = JSON.parse(data);
                    var obj = data.odData;
                    //console.log(obj);
                    $("#district").empty();
                    $("#commune").empty();
                    $("#village").empty();
                    $("#expire_date").empty();
                    $("#expire_date").val(data.expiredDate.expired);
                    $("#district").append('<option selected="selected"></option>');
                    $.each(obj, function (index, element) {
                        $("#district").append(new Option(element.name_kh, element.code));
                    });
                },
                complete: function(){
                    $("#loading").fadeOut(100);
                },
                error: function (report){
                    console.log(report);
                }
            });
        });
        /*========================================================================
       ===============// select district code append commune //=================
       ==========================================================================*/
        $("#district").select2({
            allowClear:true,
            placeholder: 'ស្រុក'
        });
        $("#district").change(function () {
            var district_id = $('#district').val();
            $.ajax({
                type: 'GET',
                url: "{{ route('getCommune') }}",
                data: {'district_id': district_id},
                beforeSend: function(){
                    $("#loading").fadeIn();
                },
                success: function (data) {
                    // console.log(data);
                    var obj = JSON.parse(data);
                    $("#commune").empty();
                    $("#village").empty();
                    $("#commune").append('<option selected="selected"></option>');
                    $.each(obj, function (index, element) {
                        $("#commune").append(new Option(element.name_kh, element.code));
                    });
                },
                complete: function(){
                    $("#loading").fadeOut(100);
                },
                error: function (report){
                    console.log(report);
                }
            });
        });
        /*========================================================================
        ===============// select commune code append village //=================
        ==========================================================================*/
        $("#commune").select2({
            allowClear:true,
            placeholder: 'ឃំុ'
        });
        $("#commune").change(function () {
            var commune_id = $('#commune').val();
            $.ajax({
                type: 'GET',
                url: "{{ route('getVillage') }}",
                data: {'commune_id': commune_id},
                beforeSend: function(){
                    $("#loading").fadeIn();
                },
                success: function (data) {
                    var obj = JSON.parse(data);
                    $("#village").empty();
                    $("#village").append('<option ></option>');
                    $.each(obj, function (index, element) {
                        $("#village").append(
                            '<option index="'+element.label+'" value="'+element.code+'">' +element.name_kh+ '</option>'
                            // new Option(element.name_kh, element.code)
                        );
                    });
                },
                complete: function(){
                    $("#loading").fadeOut(100);
                },
                error: function (report){
                    console.log(report);
                }
            });
        });


        /*======================================================
        ===============// select2 in village //=================
        ========================================================*/
        $("#village").change(function () {
            var village_id = $('#village').val();
            var index=$('#village option:selected').attr('index');

            $.ajax({
                type: 'GET',
                url: "{{ route('getPrintCardNo') }}",
                data: {'label':index,'village_id': village_id},
                beforeSend: function(){
                    //$("#loading").fadeIn();
                },
                success: function (data) {
                    // var obj = JSON.parse(data);
                    $("#printcard").empty();
                    $("#hhid").empty();
                    $("#printcard").val(data.result_card);
                    $("#hhid").val(data.hhid);
                },
                complete: function(){
                    //$("#loading").fadeOut(100);
                },
                error: function (report){
                    console.log(report);
                }
            });
        });

        $("#village").select2({
            allowClear:true,
            placeholder: 'ភូមិ'
        });
        //interview relationship
        $("#inter_relationship").select2({
            allowClear:true,
            placeholder: 'ទំនាក់ទំនង'
        });
        //family relationship
        $("#fa_relationship").select2({
            allowClear:true,
            placeholder: 'ទំនាក់ទំនង'
        });

    </script>
    @include('include.function-nummber-flot')
    @include('include.edit-function')
@endsection
