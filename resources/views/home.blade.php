@extends('layouts.app')

@section('content')


<!------ Include the above in your HEAD tag ---------->
<div class="container content">
    <h3 style="text-align: center;"><b>កំរងសំណួរអត្តសញ្ញាណកម្មគ្រួសារក្រីក្រនៅមន្ទីរពេទ្យ</b></h3>
    <hr>
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>ព័ត៌មានទូទៅ</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>ព័ត៌មានសំខាន់ៗអំពីសមាជិក​គ្រួសារ​ទាំងអស់</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>ស្ថានភាពទូទៅរបស់គ្រួសារ</p>
            </div>
        </div>
    </div>



    <form role="form" method="post" class="form-group-post" action="{{ route('insert.index') }}" id="check_validate">
        {{ csrf_field() }}
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12" id="div1">
                    <h3> ក) ព័ត៌មានទូទៅ</h3>
                    <div class="col-sm-12"><hr> </div>
                    <div class="col-md-12">
                        <h4>ក.១ ព័ត៌មានទូទៅ</h4>
                        <table class="pull-right">
                            <tr>
                                <td width="35%"><label class="control-label">លេខកូដសម្ភាសន៍:</label></td>
                                <td width="65%">
                                    <div class="form-group">    
                                        <input name="interview_code" value="{{$interview_code}}" type="text" required="required" class="form-control" readonly="readonly"/>
                                    </div>  
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label">ឈ្មោះអ្នកជំងឺ :</label></td>
                                <td width="65%">
                                   <div class="form-group">
                                        <input  maxlength="100" name="g_patient" type="text" required="required" class="form-control" />
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label"> ភេទ : </label></td>
                                <td width="65%">
                                   <div class="form-group"  id="g_sex">
                                       @foreach($gender as $key => $g)
                                        <label>{{$g->name_kh}} <input name="g_sex" value="{{$g->id}}" style="margin-right:10px;" type="radio"></label>
                                       @endforeach
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label"> អាយុ : </label></td>
                                <td width="65%">
                                   <div class="form-group">
                                        <input  name="g_age" type="text" required="required" class="form-control allowNumber"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label">លេខទូរស័ព្ធ :</label></td>
                                <td width="65%">
                                   <div class="form-group">
                                        <input  maxlength="100" name="g_phone" type="text" required="required" class="form-control allowNumber" />
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label">ខេត្ត : </label></td>
                                <td width="65%">
                                   <div class="form-group g_province">
                                       <select id="province" style="width: 100%" class="form-control" name="g_province">
                                           <option value="">...</option>
                                           @foreach($provinces as $key =>$p)
                                               <option value="{{$p->code}}">{{$p->name_kh}}</option>
                                           @endforeach
                                       </select>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label">   ស្រុក : </label></td>
                                <td width="65%">
                                   <div class="form-group g_district">
                                       <select id="district" style="width: 100%" class="form-control" name="g_district"></select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label">ឃំុ :</label></td>
                                <td width="65%">
                                    <div class="form-group g_commune">
                                        <select id="commune" style="width: 100%" class="form-control" name="g_commune"></select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label">ភូមិ :</label></td>
                                <td width="65%">
                                    <div class="form-group g_village">
                                        <select id="village" style="width: 100%" class="form-control" name="g_village"></select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label"> ទីតាំងនៅក្នុងភូមិ : </label></td>
                                <td width="65%">
                                   <div class="form-group">
                                       <textarea class="form-control" id="location" name="g_local_village"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>


                   <div class="col-sm-12"><hr> </div>
                   <div class="col-sm-12">
                        <h4> ក.២ ព័ត៌មានអំពីអ្នកដែលផ្តល់ចំលើយ(អ្នកដែលបានសំភាសន៏)</h4>
                   </div>
                   <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ឈ្មោះ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input type="text" required="required" class="form-control" name="inter_patient"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label"> ភេទ : </label></td>
                                <td>
                                   <div class="form-group" id="inter_sex">
                                       @foreach($gender as $key => $g)
                                           <label>{{$g->name_kh}} <input name="inter_sex" value="{{$g->id}}" style="margin-right:10px;" type="radio"></label>
                                       @endforeach
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label"> អាយុ : </label></td>
                                <td>
                                   <div class="form-group">
                                        <input type="text" required="required" class="form-control allowNumber"  name="inter_age"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  type="text" required="required" class="form-control allowNumber" name="inter_phone"/>
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="50%"><label class="control-label">ត្រូវជា(ទំនាក់ទំនងជាមួយមេគ្រួសារ) : </label></td>
                                <td width="50%">
                                    <div class="form-group inter_relationship">
                                        <select style="width: 100%;" class="form-control" id="inter_relationship" name="inter_relationship">
                                            <option></option>
                                            @foreach($relationship as $keh => $value)
                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                   <div class="col-sm-12"><hr> </div>
                   <div class="col-sm-12">
                        <h4> ក.៣ ព័ត៌មានអំពី​ អ្នកដែលអាចបញ្ជាក់ពីស្ថានភាពគ្រួសារ <a href="#" data-toggle="tooltip" title="(ដែលមិនមែនសមាជិកគ្រួសារ)ដូចជាមេភូមិ អ្នកជិតខាង​ មិត្តភ័ក្រ្ត">?</a> </h4> 
                   </div>
                   <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ឈ្មោះ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  type="text" required="required" class="form-control" name="fa_patient"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label"> ភេទ : </label></td>
                                <td>
                                   <div class="form-group" id="fa_sex">
                                       @foreach($gender as $key => $g)
                                           <label>{{$g->name_kh}} <input name="fa_sex" value="{{$g->id}}" style="margin-right:10px;" type="radio"></label>
                                       @endforeach
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label"> អាយុ : </label></td>
                                <td>
                                   <div class="form-group">
                                        <input type="text" required="required" class="form-control allowNumber" name="fa_age"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input type="text" required="required" class="form-control allowNumber" name="fa_phone"/>
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="50%"><label class="control-label">ត្រូវជា(ទំនាក់ទំនងត្រូវជា) : </label></td>
                                <td width="50%">
                                    <div class="form-group fa_relationship">
                                        <select style="width: 100%;" class="form-control" id="fa_relationship" name="fa_relationship">
                                            <option></option>
                                            @foreach($family as $keh => $value)
                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12"><hr> </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary nextBtn pull-right" type="button">រក្សាទុកនិងជំហានបន្ទាប់</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- step 2 -->

        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12" id="div2">
                   <div class="col-sm-12">
                    <h3> ខ) ព័ត៌មានសំខាន់ៗអំពីសមាជិក​គ្រួសារ​ទាំងអស់</h3>
                    <hr>
                    <p>មនុស្ស​ដែល​គេ​ចាត់ទុកថាជាសមាជិក​គ្រួសារលុះ​ត្រាតែ​រស់​នៅជាប្រចាំ​ក្នុង​គ្រួសារ ឬ​អវត្តមាន​តិច​ជាង​ ៦ខែ​​ (ត្រូវមានឯកសារយោងដូចជា សៀវភៅគ្រួសារ សៀវភៅស្នាក់នៅ សំបុត្រកំណើត លិខិតបញ្ជាក់ពីអាជ្ញាធរ)</p>


                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">ល.រ</th>
                                    <th rowspan="2">នាមត្រកូល នាមខ្លួន ឈ្មោះហៅក្រៅ</th>
                                    <th colspan="2"><p align="center">ឆ្នាំកំណើត ឬ អាយុ</p></th>
                                    <th width="15%" rowspan="2">ទំនាក់ទំនង​ជាមួយ​មេ​គ្រួសារ(1) <a href="#" data-toggle="tooltip" title="(1)= មេ​គ្រួសារ ប្តី/​ប្រពន្ធ កូន ឪពុក​ម្តាយ ក្មួយ ផ្សេងៗ">?</a>
                                    </th>
                                    <th rowspan="2">មុខងារ/​មុខរបរ(2) <a href="#" data-toggle="tooltip" title="(2)= ប្រភេទមុខរបរចម្បងរបស់គាត់/នាង ដូចជា កសិករ កម្មករ មន្ត្រីរាជការ រកស៊ី សិស្ស នៅផ្ទះ">?</a></th>
                                    <th width="15%" rowspan="2">កម្រិតវប្បធម៌(3) <a href="#" data-toggle="tooltip" title="(3)= បើនៅរៀន បញ្ជាក់ពីថ្នាក់ទីប៉ុន្មាន។ បើជាមនុស្សពេញវ័យឬជាកុមារអាយុចាប់ពី៥ឆ្នាំតែឈប់រៀន សូមបញ្ជាក់ពីកម្រិតថ្នាក់នៅពេលឈប់រៀន">?</a></th>
                                    <th rowspan="2">សកម្មភាព</th>
                                </tr>
                                <tr>
                                    <th width="15%">ឆ្នាំ​កំណើត</th>
                                    <th width="8%">អាយុ</th>
                                </tr>
                            </thead>
                            <tbody class="new_rows">
                                <tr class="myrow">
                                    <td>1(មេ)</td>
                                    <td><div class="form-group"><input type="text" required="required" class="form-control" name="nick_name[0]"/></div></td>
                                    <td><div class="form-group"><input maxlength="4"  type="text" required="required" class="form-control allowNumber" id="dob" name="dob[0]"/></div></td>
                                    <td><div class="form-group"><input maxlength="3" type="text" required="required" class="form-control allowNumber" id="age" name="age[0]"/></div></td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control family_relationship" name="family_relationship[0]" required="required">
                                                <option></option>
                                                @foreach($relationship as $keh => $value)
                                                    <option @if($value->id == 2) checked @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select style="width: 100%;" class="form-control occupation" name="occupation[0]" required="required">
                                                <option></option>
                                                @foreach($occupation as $keh => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select style="width: 100%" class="form-control education_level"  name="education_level[0]" required="required">
                                                <option></option>
                                                @foreach($education_level as $keh => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>
                        <input type="button" class="btn btn-primary" id="add_rows" style="float:right;" value="បញ្ចូលបន្ថែម">
                        </p>
                        <!-- <div class="col-sm-12"><hr> </div> -->
                    </div>
                    <div class="col-sm-12">
                        <hr>
                        <a class="btn btn-default pull-left print-link2"><img src="{{asset('images/Printer.png')}}" width="30" alt="printer"></a>
                        <button id="step2Next" class="btn btn-primary nextBtn pull-right" type="button" >រក្សាទុក និង ជំហានបន្ទាប់</button>
                    </div>  
                </div>
                
            </div>
        </div>


        <!-- step 3 -->

        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12" id="div3">
                    <h3> គ) ស្ថានភាពទូទៅរបស់គ្រួសារ</h3>
                       <div class="col-sm-12"><hr> </div>
                       <div class="col-sm-12">
                            <h4> គ.១ ផ្ទះសម្បែងរបស់ក្រុមគ្រួសារ</h4> 
                            <p>តើពួកគាត់រស់នៅទីកន្លែងណា? (សូម​ជ្រើរើស នៅចំលើយតែមួយ)</p>
                            <ol type="1">
                                @foreach($household as $key => $h)
                                    <li>
                                        <label>
                                            <input class="household_family_id" type="radio" name="household_family_id"  value="{{ $h->id }}"> {{$h->name_kh}}
                                        </label>
                                        @if($h->id == 5)<label id="household_family_id"></label>@endif
                                    </li>
                                @endforeach
                            </ol>
                             <script>
                                 $('.household_family_id').click(function () {
                                     var houshold = $('input[name=household_family_id]:checked').val();
                                     $('#household_family_id').empty();
                                     $('#home-rent').empty();
                                     $('#home-yourself').empty()
                                     $('#general-status').empty();
                                     $('#home-ke').empty();
                                     if(houshold == 5){
                                         $('#household_family_id').append('<input type="text" placeholder="ឈ្មោះស្ថាប័ន" name="institutions_name">លេខទូរសព្ទបុគ្គលទំនាក់ទំនងនៅស្ថាប័ន : <input type="text" placeholder="លេខទូរសព្ទ" name="instatutions_phone">');
                                     }else if(houshold == 2){
                                         $('#home-rent').append('<h4>គ.៨) សម្រាប់គ្រួសារជួលផ្ទះគេ​ (សម្រាប់គ្រួសារមានផ្ទះផ្ទាល់ខ្លួន ឬ ​ នៅជាមួយគេដោយអត់បង់ថ្លៃ មិនបាច់បំពេញចំណុច គ៨ ហើយរំលងទៅ គ៩)</h4>' +
                                             '<div class="col-sm-6">' +
                                                 '<table width="100%">' +
                                                     '<tr>'+
                                                         '<td width="50%">' +
                                                            '<label class="control-label"> តើថ្លៃជួលប្រចាំខែជាមធ្យមប៉ុន្មាន?: </label>' +
                                                         '</td>' +
                                                         '<td width="50%">' +
                                                             '<div class="form-group">' +
                                                                '<input type="text" required="required" class="form-control allowNumber" name="rent_fee"/>' +
                                                             '</div>' +
                                                         '</td>' +
                                                     '</tr>' +
                                                 '</table>' +
                                             '</div>');
                                     }else if(houshold == 1 || houshold == 3){
                                         var homeyourselt = '<h4>គ.៥ ដំបូល</h4>' +
                                             '<div class="col-sm-6">' +
                                                 '<table width="100%">' +
                                                     '<tr>' +
                                                        '<td><label class="control-label"> ដំបូលធ្វើអំពី : </label></td>' +
                                                         '<td>' +
                                                             '<div class="form-group ">' +
                                                                 '<select class="form-control roof_relationship" id="roof_relationship" name="roof_made">' +
                                                                    '<option></option>' +
                                                                     '@foreach($roof_made as $keh => $value)' +
                                                                        '<option value="{{$value->id}}">{{$value->name_kh}}</option>' +
                                                                     '@endforeach'+
                                                                 '</select>' +
                                                             '</div>' +
                                                         '</td>'+
                                                     '</tr>'+
                                                 '</table>' +
                                             '</div>'+
                                             '<div class="col-sm-6">' +
                                                 '<table width="100%">' +
                                                     '<tr>' +
                                                        '<td><label class="control-label">​ និង​ស្ថានភាព : </label></td>' +
                                                         '<td>' +
                                                             '<div class="form-group">' +
                                                                 '<select class="form-control r_status" id="r_status" name="roof_status">' +
                                                                    '<option></option>@foreach($house_status as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                                 '</select>' +
                                                             '</div>' +
                                                         '</td>'+
                                                     '</tr>'+
                                                 '</table>' +
                                             '</div>';
                                         $('#home-yourself').append(homeyourselt);
                                         $(".roof_relationship").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "ដំបូល"});
                                         $(".r_status").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "ស្ថានភាព"});

                                         var homeke = '<h4>គ.៦ ​ជញ្ជាំង</h4>' +
                                             '<div class="col-sm-6">' +
                                                 '<table width="100%">' +
                                                     '<tr>' +
                                                        '<td><label class="control-label"> ​ជញ្ជាំងធ្វើអំពី : </label></td>' +
                                                         '<td>' +
                                                             '<div class="form-group">' +
                                                                 '<select class="form-control wall_relationship" id="wall_relationship" name="walls_made">' +
                                                                    '<option></option>' +
                                                                    '@foreach($wall_made as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                                 '</select>' +
                                                             '</div>' +
                                                         '</td>'+
                                                     '</tr>'+
                                                 '</table>'+
                                             '</div>'+
                                            '<div class="col-sm-6">'+
                                                '<table width="100%">'+
                                                    '<tr>'+
                                                        '<td><label class="control-label">​​ និង​ស្ថានភាព : </label></td>'+
                                                        '<td>'+
                                                            '<div class="form-group">'+
                                                                '<select class="form-control h_status" id="h_status" name="walls_status">'+
                                                                    '<option></option>'+
                                                                    '@foreach($house_status as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
                                                                '</select>'+
                                                                '</div>'+
                                                        '</td>'+
                                                    '</tr>'+
                                                '</table>'+
                                            '</div>';
                                         $('#home-ke').append(homeke);
                                         $(".wall_relationship").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "ជញ្ជាំង"});
                                         $(".h_status").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "ស្ថានភាព"});

                                         var generalStatus = '<h4>គ.៧) ស្ថានភាពទូទៅផ្ទះសម្បែង</h4>' +
                                             '<ul class="li-none">'+
                                                 '@foreach($condition_house as $key => $c)' +
                                                     '<li>' +
                                                        '<label><input type="radio" name="condition_house" ​ value="{{$c->id}}"> {{$c->name_kh}}</label>' +
                                                     '</li>' +
                                                 '@endforeach'+
                                             '</ul>';
                                         $('#general-status').append(generalStatus);
                                     }
                                 });

                             </script>
                       </div>


                      <div class="col-sm-12"><hr> </div>
                       <div class="col-sm-12">
                            <h4>  គ.២ តើ​មាន​មនុស្សសរុប​ចំនួន​ប៉ុន្មាន​នាក់ រស់​នៅក្នុងផ្ទះដែលអ្នកស្នាក់នៅ (រាប់ទាំង​សមាជិក​គ្រួសារ និង​អ្នកផ្សេង)?</h4> 

                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label">សរុប(នាក់) : </label></td>
                                        <td>
                                           <div class="form-group">
                                               <input type="text" name="total_people" class="form-control allowNumber">
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4> គ.៣ តើ​ផ្ទៃ​ក្រឡា​ទីលំនៅរបស់ក្រុម​គ្រួសារ ​មាន​ចំនួន​ប៉ុន្មាន​ម៉ែត្រ​ក្រឡា​?​</h4>

                                <table class="tb_grid" style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td><b>ផ្ទះជាន់ក្រោម៖</b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="ground_floor_length" class="form-control allowNumber" required="required" placeholder="បណ្តោយ(ម៉ែត្រ)​..." type="text" name="ground_floor_length" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="ground_floor_width" class="form-control allowNumber"  required="required" placeholder="ទទឹង(ម៉ែត្រ)..." type="text" name="ground_floor_width" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="ground_floor_area" class="form-control allowNumber" required="required" placeholder="ផ្ទៃ(ម៉ែត្រក្រឡា)..." type="text" name="ground_floor_area" value="0" readonly="readonly">
                                                </div>
                                            </td>                     
                                        </tr>

                                        <tr>
                                            <td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="upper_floor_length" class="form-control allowNumber" required="required" placeholder="បណ្តោយ(ម៉ែត្រ)​..." type="text" name="upper_floor_length" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="upper_floor_width" class="form-control allowNumber" required="required" placeholder="ទទឹង(ម៉ែត្រ)..." type="text" name="upper_floor_width" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="upper_floor_area" class="form-control allowNumber" required="required" placeholder="ផ្ទៃ(ម៉ែត្រក្រឡា)..." type="text" name="upper_floor_area" value="0" readonly="readonly">
                                                </div>
                                            </td>                     
                                        </tr>
                                        <tr>
                                            <td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="further_floor_length" class="form-control allowNumber" required="required" placeholder="បណ្តោយ(ម៉ែត្រ)​..." type="text" value="0" name="further_floor_length">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="further_floor_width" class="form-control allowNumber" required="required" placeholder="ទទឹង(ម៉ែត្រ)..." type="text" value="0" name="further_floor_width">
                                                </div>
                                                </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="further_floor_area" class="form-control allowNumber" required="required" placeholder="ផ្ទៃ(ម៉ែត្រក្រឡា)..." type="text" value="0" name="further_floor_area" readonly="readonly">
                                                </div>
                                            </td>                     
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b style="float:right;">ផ្ទៃកម្រាលសរុប (ម៉ែត្រ​ក្រឡា) :</b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="total_area" name="total_area" class="form-control allowNumber" required="required" placeholder="ផ្ម៉ែត្រក្រឡា..." type="text" value="0" readonly="readonly">
                                                </div>
                                            </td>                     
                                        </tr>

                                        <script>
                                            $('#ground_floor_length, #ground_floor_width').on('input',function() {
                                                var g_length = parseInt($('#ground_floor_length').val());
                                                var g_width = parseFloat($('#ground_floor_width').val());
                                                $('#ground_floor_area').val((g_length * g_width ? g_length * g_width : 0).toFixed(0));
                                            });
                                            $('#upper_floor_length, #upper_floor_width').on('input',function() {
                                                var u_length = parseInt($('#upper_floor_length').val());
                                                var u_width = parseFloat($('#upper_floor_width').val());
                                                $('#upper_floor_area').val((u_length * u_width ? u_length * u_width : 0).toFixed(0));
                                            });
                                            $('#further_floor_length, #further_floor_width').on('input',function() {
                                                var f_length = parseInt($('#further_floor_length').val());
                                                var f_width = parseFloat($('#further_floor_width').val());
                                                $('#further_floor_area').val((f_length * f_width ? f_length * f_width : 0).toFixed(0));
                                            });
                                            $('#ground_floor_length, #ground_floor_width, #upper_floor_length, #upper_floor_width,#further_floor_length, #further_floor_width').on('change',function() {

                                                var total_g = parseInt($('#ground_floor_area').val());
                                                var total_u = parseInt($('#upper_floor_area').val());
                                                var total_f = parseInt($('#further_floor_area').val());

                                                $('#total_area').val((total_g + total_u + total_f ? total_g + total_u + total_f : 0).toFixed(0));
                                            });
                                        </script>
                                </tbody>
                            </table>

                        </div>

                        <div class="col-sm-12"><hr></div>
                        <div class="col-sm-12">
                            <h4> គ.៤ បង្គន់</h4>
                            <h5>- តើគ្រួសាររបស់អ្នកមានបង្គន់ប្រើដែរឬទេ?</h5>
                            <ul class="li-none">
                                <li>
                                     <label><input type="radio" name="tolet" ​​ value="មាន"> មាន </label>
                                </li>
                                <li>
                                     <label><input type="radio" name="tolet" value="គ្មាន"> គ្មាន </label>
                                </li>
                            </ul>

                            <h5>- បើមាន តើជាបង្គន់ចាក់ទឹក ឬ បង្គន់ស្ងួត?</h5>
                            <ul class="li-none">
                                <li>
                                     <label><input type="radio" name="tolet_1" ​​ value="បង្គន់ចាក់ទឹក"> បង្គន់ចាក់ទឹក</label>
                                </li>
                                <li>
                                    <label><input type="radio" name="tolet_1" value="បង្គន់ស្ងួត">  បង្គន់ស្ងួត</label>
                                </li>
                            </ul>


                            <h5>- ជាបង្គន់​របស់នរណា?</h5>
                            <ul class="li-none">
                                <li>
                                     <label><input type="radio" name="tolet_2" ​​ value="ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់"> ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់ </label>
                                </li>
                                <li>
                                    <label><input type="radio" name="tolet_2" value="ជាបង្គន់រួមជាមួយគ្រួសារដទៃ"> ជាបង្គន់រួមជាមួយគ្រួសារដទៃ</label>
                                </li>
                            </ul>

                            <div class="row">
                                <div class="col-sm-6">
                                    <table class="table-home">
                                        <tr>
                                            <td width="30%">- ផ្ទះសាងសង់នៅឆ្នាំណា?</td>
                                            <td width="50%">
                                                <div>
                                                    <select name="h_build_year" id="year_select" style="width: 100%;" name="build_in">
                                                        <option></option>
                                                        <?php
                                                        $currentYear = date('Y');
                                                        foreach (range(1950, $currentYear) as $value) {
                                                            echo "<option>" . $value . "</option > ";
                                                        }?>
                                                    </select>
                                                </div>
                                                <script>
                                                    $("#year_select").select2({
                                                        allowClear:true,
                                                        placeholder: 'ឆ្នាំ...'
                                                    });
                                                </script>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>



                            <h5>- តើធ្លាប់ជួសជុលឬទេ?</h5>
                            <ul class="li-none">
                                @foreach($homePrepar as $key =>$p)
                                <li>
                                     <label><input class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>
                                     @if($p->id == 2)<label id="homeyear"></label>@endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <script>
                            $('.homeyear').click(function () {
                                var homeyear = $('input[name=home_prepare]:checked').val();
                                $('#homeyear').empty();
                                if(homeyear == 2){
                                    $('#homeyear').append('<select name="home_year" style="width: 180px;" id="years"><option></option><?php $currentYear = date('Y');foreach (range(1950, $currentYear) as $value) { echo "<option>" . $value . "</option > ";}?> </select>');
                                      $("#years").select2({
                                         allowClear:true,
                                         placeholder: 'ឆ្នាំ...'
                                     });
                                }
                            });
                            
                        </script>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12" id="home-yourself"> </div>
                        <div class="col-sm-12" id="home-ke"></div>
                        <div class="col-sm-12" id="general-status"></div>

                        <div class="col-sm-12"><hr> </div>
                            <div class="col-sm-12" id="home-rent"></div>
                            <div>
                                <div class="col-sm-12">
                                   <div class="row">
                                       <h4>គ.៩) ទ្រព្យ​សម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិច​របស់​គ្រួសារ</h4>
                                   </div>
                                    <table class="tb_grid table" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ល.រ</th>
                                                <th>ប្រភេទសម្ភារប្រើបា្រស់</th>
                                                <th>ចំនួន</th>
                                                <th>តម្លៃទីផ្សារ ប្រសិន​លក់​វា​ចេញចំនួនតម្លៃឯកត្តា</th>
                                                <th>តម្លៃ​សរុប (រៀល)</th>
                                                <th>សកម្មភាព</th>
                                            </tr>
                                        </thead>
                                        <tbody class="new_rows_1">
                                            <tr class="myrow_1">
                                                <td>1</td>
                                                <td>
                                                    <div class="form-group">
                                                        <select class="form-control type_meterial" id="type_meterial" name="type_meterial[0]" required="required">
                                                            <option></option>
                                                            @foreach($typemeterial as $keh => $value)
                                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="number_meterial" name="number_meterial[0]" type="text" required="required" class="form-control allowNumber meterial"  />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="market_value_meterial" name="market_value_meterial[0]" type="text" required="required" class="form-control allowNumber meterial"  />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="total_rail_meterial" name="total_rail[0]" type="text" required="required" class="form-control totalallowNumber_meterial"  />
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="total_meterial_costs" name="total_meterial_costs" type="text" required="required" class="form-control" readonly="readonly"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                   <input class="btn btn-primary" id="add_rows_1" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>



                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១០) អគ្គិសនី</h4>
                            <p>តើបានតបណ្តាញអគ្គិសនី (រដ្ឋឬឯកជន) ដែរឬទេ?</p>
                            <ul class="li-none">
                                @foreach($question_electric as $key => $qe)
                                <li>
                                     <label><input class="electric" value="{{$qe->id}}" type="radio" name="q_electric" ​​> {{$qe->name_kh}}</label>
                                </li>
                                @if($qe->id == 1) <li id="electric_yes"></li> @endif
                                @if($qe->id == 2) <li id="electric_no"></li> @endif
                                @endforeach
                            </ul>

                            <script>
                                $('.electric').click(function () {
                                    var electric = $('input[name=q_electric]:checked').val();
                                    $('#electric_yes').empty();
                                    $('#electric_no').empty();
                                    if(electric == 1){
                                        $('#electric_yes').append('<p>ប្រសិនបានតបណ្តាញអគ្គិសនី </p>'+
                                            '<table class="table ">'+
                                            '<tr>'+
                                                '<th>តម្លៃក្នុងមួយគីឡូវ៉ាត់/ម៉ោង</th>'+
                                                '<th>ចំនួនគីឡូវ៉ាត់ដែលប្រើជាមធ្យមក្នុងមួយខែ</th>'+
                                                '<th>ចំណាយ​ជា​មធ្យមក្នុងមួយខែ</th>'+
                                            '</tr>'+
                                            '<tr>'+
                                                '<td><input class="form-control allowNumber" required type="text" name="costs_in_hour"></td>'+
                                                '<td><input class="form-control allowNumber" required type="text" name="number_in_month"></td>'+
                                                '<td><input class="form-control allowNumber" required type="text" name="costs_per_month"></td>'+
                                            '</tr>' +
                                            '</table>');
                                        AllowNumber();
                                    }else if(electric == 2){
                                        $('#electric_no').append('<p>ប្រសិនមិនបានតបណ្តាញអគ្គិសនី</p><ul class="li-none">@foreach($electricgrid as $key=>$e)<li><label><input value="{{$e->id}}" type="radio" name="electric_grid_id" ​​> {{$e->name_kh}}</label></li>@endforeach</ul>');
                                    }
                                });
                            </script>

                        </div>


                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១១) យានជំនិះជាទ្រព្យសម្បត្តិផ្ទាល់របស់​គ្រួសារ</h4>
                            <div class="col-sm-6">
                                <table class="table-home">
                                    <tr>
                                        <td width="50%"><h5>តើអ្នកប្រើមធ្យោបាយអ្វីមកមន្ទីរពេទ្យ?</h5> </td>
                                        <td width="50%">
                                            <div class="form-group go_hospital">
                                                <select class="form-control" id="go_hospital" name="go_hospital">
                                                    <option></option>
                                                    @foreach($typemeterial as $keh => $value)
                                                        <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>



                            <table class="tb_grid table" width="100%">
                                <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ប្រភេទសម្ភារប្រើបា្រស់</th>
                                    <th>ចំនួន</th>
                                    <th>តម្លៃទីផ្សារ ប្រសិន​លក់​វា​ចេញចំនួនតម្លៃឯកត្តា</th>
                                    <th>តម្លៃ​សរុប (រៀល)</th>
                                    <th>សកម្មភាព</th>
                                </tr>
                                </thead>
                                <tbody class="new_rows_2">
                                <tr class="myrow_2">
                                    <td>1</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control type_vehicle" id="type_vehicle" name="type_vehicle[0]" required="required">
                                                <option></option>
                                                @foreach($typemeterial as $keh => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="number_vehicle" name="number_vehicle[0]" type="text" required="required" class="form-control allowNumber vehicle"  />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="market_value_vehicle" name="market_value_vehicle[0]" type="text" required="required" class="form-control allowNumber vehicle"  />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input id="total_rail_vehicle" name="total_rail_vehicle[0]" type="text" required="required" class="form-control totalallowNumber_vehicle" readonly="readonly"/>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
                                    <td>
                                        <div class="form-group">
                                            <input id="total_vehicle_costs" name="total_vehicle_costs" type="text" required="required" class="form-control" readonly="readonly"/>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <input class="btn btn-primary" id="add_rows_2" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                            
                    </div>




                    <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១២) ចំណូល</h4>
                            <h5>គ.១២.១) ចំណូល​ ពីសកម្មភាពកសិកម្ម ផ្ទាល់ខ្លួន</h5>
                            <h5>គ.១២.១.១) ការចិញ្ចឹមសត្វ</h5>
                            <table class="tb_grid table" width="100%">
                                <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th>ប្រភេទសត្វ</th>
                                    <th>ចំនួនសត្វធំ</th>
                                    <th>ចំនួនកូនសត្វ</th>
                                    <th>កំណត់សម្គាល់ (បញ្ជាក់ បើសិនជាសត្វប្រវាស់គេ)</th>
                                    <th>សកម្មភាព</th>
                                </tr>
                                </thead>
                                <tbody class="new_rows_3">
                                <tr class="myrow_3">
                                    <td>1</td>
                                    <td>
                                        <div class="form-group">
                                            <select class="form-control type_animals" id="type_animals" name="type_animals[0]" required="required">
                                                <option></option>
                                                @foreach($typeanimals as $key => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input name="num_animals_big[0]" type="text" required="required" class="form-control allowNumber"  />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input name="num_animals_small[0]" type="text" required="required" class="form-control allowNumber"  />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input name="note_animals[0]" type="text" required="required" class="form-control allowNumber"  />
                                        </div>
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <input class="btn btn-primary" id="add_rows_3" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                    </div>



                    <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១២.១.២​)ដីកសិកម្ម</h4>
                            <p>មាន​ដីកសិកម្ម ឬ​ទេ ?</p>
                            <ul class="li-none">
                                @foreach($landAgricultural as $key => $land)
                                    <li>
                                        <label><input class="land" type="radio" name="land" value="{{$land->id}}">  {{$land->name_kh}}</label>
                                    </li>
                                @endforeach
                            </ul>

                            <script>
                                $('.land').click(function () {
                                    var land = $('input[name=land]:checked').val();
                                    $('#show-land').empty();

                                    var landshow = '<div class="col-sm-6">' +
                                            '<table width="100%">' +
                                                '<tr>' +
                                                    '<td><label class="control-label"> -មាន ៖ </label></td>' +
                                                    '<td>' +
                                                        '<div class="form-group">'+
                                                            '<input name="land_name" type="text" required="required" class="form-control"/>' +
                                                        '</div>' +
                                                    '</td>' +
                                                '</tr>' +
                                                '<tr>' +
                                                    '<td><label class="control-label"> កន្លែង. ទំហំសរុប : </label></td>'+
                                                    '<td>' +
                                                        '<div class="form-group">' +
                                                            '<input name="total_land" type="text" required="required" class="form-control"/>'+
                                                        '</div>' +
                                                    '</td>' +
                                                '</tr>' +
                                            '</table>' +
                                        '</div>' +
                                        '<div class="col-sm-6">' +
                                            '<table width="100%">' +
                                                '<tr>'+
                                                    '<td><label class="control-label">​ -ដីចំការ៖ </label></td>'+
                                                    '<td>'+
                                                        '<div class="form-group">'+
                                                            '<input  name="land_farm" type="text" required="required" class="form-control" />'+
                                                        '</div>'+
                                                    '</td>'+
                                                '</tr>'+
                                                '<tr>'+
                                                    '<td><label class="control-label">​ កន្លែង. ទំហំសរុប : </label></td>'+
                                                    '<td>'+
                                                        '<div class="form-group">'+
                                                            '<input name="total_land_farm" type="text" required="required" class="form-control"/>'+
                                                        '</div>'+
                                                    '</td>'+
                                                '</tr>'+
                                            '</table>'+
                                        '</div>';
                                    if(land == 2 || land == 3) {
                                        $('#show-land').append(landshow);
                                    }
                                });
                            </script>

                            {{--<p>ប្រសិនបើមានដីផ្ទាល់ខ្លួន ឫជួលគេ សូមបញ្ជាក់ ទំហំដីកសិកម្ម(សុំសរសេរជាទំហំសរុបដោយបូកគ្រប់កន្លែង និងបញ្ជាក់ពីឯកតា)</p>--}}
                            <div class="col-sm-12" id="show-land"></div>
                        </div>




                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១២.២) ចំណូល ផ្សេងពី សកម្មភាពកសិកម្ម ផ្ទាល់ខ្លួន​ <a href="#" data-toggle="tooltip" title="(បញ្ជាក់ការងារកម្មករផ្នែកកសិកម្មត្រូវបញ្ចូលក្នុងតារាងនេះ) បញ្ជាក់ ៖ ចុះ​តែ​សមាជិក​គ្រួសារ​ដែល​រក​ប្រាក់​ចំណូល​បាន។ ចំពោះសមាជិកដែលមានប្រភពចំណូលលើសពីមួយ សូមសរសេរ​នៅក្នុងជួរដោយឡែកពីគ្នា។">?</a></h4>
                            <p>ប្រសិនបើគ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្មត្រូវផ្ដល់ពិន្ទុតាមឯកសារណែនាំចំណុច 7B.2</p>



                            <table class="tb_grid table" width="100%">
                                <thead>
                                    <tr>
                                        <th>ល.រ</th>
                                        <th>ឈ្មោះសមាជិកគ្រូសាររកប្រាក់ចំណូល</th>
                                        <th>អាយុ​ &lt; 18 </th>
                                        <th>មុខរបររកចំណូល</th>
                                        <th>ឯកតា</th>
                                        <th>ចំនួនឯកតាក្នុងមួខែ</th>
                                        <th>ទឹកប្រាក់មធ្យមក្នុងមួយឯកតា</th>
                                        <th>ចំណូលមធ្យមប្រចាំខែ  (ចំនួន x តម្លៃឯកត្តា)</th>
                                        <th>សកម្មភាព</th>
                                    </tr>
                                </thead>
                                <tbody class="new_rows_4">
                                    <tr class="myrow_4">
                                        <td>1</td>
                                        <td>
                                            <div class="form-group">
                                                <input name="income_name[0]" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="income_age[0]" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="income_occupation[0]" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="income_unit[0]" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="unit_in_month[0]" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="average_amount[0]" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="monthly_income[0]" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input class="btn btn-primary" id="add_rows_4" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><span style="float: right;">សរុបចំណូល ប្រចាំខែ សម្រាប់គ្រួសារទាំងមូល (គិតជារៀល):</span></td>
                                        <td><input class="form-control" id="pl-pro"  type="text" name="total_monthly_income"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><span style="float: right;">ចំណូលក្រៅពីកសិកម្មជាមធ្យមប្រចាំខែសម្រាប់មនុស្សម្នាក់​​ (១) :</span></td>
                                        <td><input class="form-control" id="pl-pro"  type="text" name="total_income_person"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                </tfoot>
                            </table>

                        </div>



                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4>គ.១៣) សុខភាព និងពិការភាព</h4>
                                <table class="table table-bordered table-striped">
                                    <tbody><tr>
                                        <td colspan="2"></td>
                                        <td>ក្មេង + អ្នក  អាយុ &lt; 65ឆ្នាំ </td>
                                        <td> ចាស អាយុ≥65 ឆ្នាំ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ</td>
                                        <td>
                                            <div class="form-group">
                                                <input name="kids_then65" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="old_bigger65" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ</td>
                                        <td>
                                            <div class="form-group">
                                                <input name="kids_50_then65" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input name="old_50_bigger65" type="text" required="required" class="form-control allowNumber"  />
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4>គ.១៤) បំណុលគ្រួសារ</h4>
                            <p>តើ​គ្រួសារ​របស់​អ្នក​នៅមាន​បំណុល/​កម្ចី​មិនទាន់​បាន​សង​ដែរ​ឬ​ទេ?</p>
                            <ul class="debt_question_group">
                                @foreach($loan as $key => $ge)
                                    <li>
                                         <label><input class="family_debt" value="{{$ge->id}}" type="radio" name="family_debt_id"​​>{{ $ge->name_kh }}</label>
                                        @if($ge->id == 1)<label id="family_debt"></label>@endif
                                        @if($ge->id == 2)<label id="family_debt1"></label>@endif
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    <script>
                        $('.family_debt').click(function () {
                            var family_debt = $('input[name=family_debt_id]:checked').val();
                            $('#family_debt').empty();
                            $('#family_debt1').empty();
                            if(family_debt == 1){
                                $('#family_debt').append('<ol class="debt_question">@foreach($question as $key=>$gg)<li><label><input value="{{$gg->id}}" type="radio" name="q_debt">{{$gg->name_kh}}</label></li>@endforeach</ol>');
                            }else if(family_debt == 2){
                                $('#family_debt1').append('<input type="text" placeholder="រៀល" name="total_debt">');
                            }
                        });
                    </script>
                    <div class="col-sm-12"><hr> </div>
                    <div class="col-sm-12">
                        <button class="btn btn-primary pull-right mysubmit nextBtn " type="submit">រក្សាទុក​​ និង បញ្ចប់</button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <br>
    <div class="col-sm-12" style="padding: 0 !important;"><hr></div>
    <h3>ទិន្នន័យ អ្នកជំងឺ</h3>
    <div class="data-list">
        <table class="table">
            <thead>
                <th>ល.រ</th>
                <th>ឈ្មោះអ្នកជំងឺ</th>
                <th>អាយុ</th>
                <th>ភេទ</th>
                <th>លេខទូរស័ព្ធ</th>
                <th>ខេត្ត</th>
                <th>action</th>
            </thead>

            <tbody>
            @foreach($view as $key =>$value)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$value->g_patient}}</td>
                <td>{{$value->g_age}} </td>
                <td>{{$value->name_kh}} </td>
                <td>{{$value->g_phone}}  </td>
                <td>{{$value->interview_code}}  </td>
                <!-- data-toggle="collapse" data-target="#accordion" class="clickable" -->
                <td><a href="{{route('view.data',$value->id)}}"><i class="fa fa-eye"></i></a> | <a href=""><i class="fa fa-edit"></i></a> | <a href="{{route('print.data',$value->id)}}"><i class="fa fa-print"></i></a> | <a href=""><i class="fa fa-trash-o"></i></a></td>
            </tr>
            @endforeach
            <tr>
                <td colspan="7">
                    <div id="accordion" class="collapse">
                        <div  style=" width: 100%; float: left;height: 300px;border: 1px solid #dadada;">
                            <h4>Detail</h4>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>















<script type="text/javascript">
    $(document).ready(function () {
        
        $(".form-control").attr("autocomplete", "off");
        // Printing page content
        jQuery(function($) {
            $("#div1").find('.print-link1').on('click', function() {
                $('.print-link1').hide();
                $('.btn-primary').hide();
                $("#div1").print({
                    globalStyles : true,
                    mediaPrint : false,
                    // stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    iframe : false,
                    // noPrintSelector : "#div1",
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
                $('.print-link1').show();
                $('.btn-primary').show();
            });
             $("#div2").find('.print-link2').on('click', function() {
                $('.print-link2').hide();
                $('.btn-primary').hide();
                $("#div2").print({
                    globalStyles : true,
                    mediaPrint : false,
                    // stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    iframe : false,
                    // noPrintSelector : "#div1",
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
                $('.print-link2').show();
                $('.btn-primary').show();
            });
              $("#div3").find('.print-link3').on('click', function() {
                $('.print-link3').hide();
                $('.btn-primary').hide();
                $("#div3").print({
                    globalStyles : true,
                    mediaPrint : false,
                    // stylesheet : "http://fonts.googleapis.com/css?family=Inconsolata",
                    iframe : false,
                    // noPrintSelector : "#div1",
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
                $('.print-link3').show();
                $('.btn-primary').show();
            });
        });

        //next next and validate
        var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

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
                $target.find('input:eq(0)').focus();
            }
        });

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


            if($('#province').val() == ''){
                isValid = false;
                $('.g_province').addClass("has-error");
                $('.alert').show();
            }else{
                $('.g_province').removeClass("has-error");
            }

            if($('#district').val() == ''){ alert($('#district').val());
                isValid = false;
                $('.g_district').addClass("has-error");
                $('.alert').show();
            }else{
                $('.g_district').removeClass("has-error");
            }

            if($('#commune').val() == ''){
                isValid = false;
                $('.g_commune').addClass("has-error");
                $('.alert').show();
            }else{
                $('.g_commune').removeClass("has-error");
            }

            if($('#village').val() == ''){
                isValid = false;
                $('.g_village').addClass("has-error");
                $('.alert').show();
            }else{
                $('.g_village').removeClass("has-error");
            }

            if($('#inter_relationship').val() == ''){
                isValid = false;
                $('.inter_relationship').addClass("has-error");
                $('.alert').show();
            }else{
                $('.inter_relationship').removeClass("has-error");
            }

            if($('#fa_relationship').val() == ''){
                isValid = false;
                $('.fa_relationship').addClass("has-error");
                $('.alert').show();
            }else{
                $('.fa_relationship').removeClass("has-error");
            }




            //check radio
            if (!$("input[name='g_sex']:checked").val()) {
                $('#g_sex').addClass("error");
                isValid = false;
            }else{$('#g_sex').removeClass("error");}

            if (!$("input[name='inter_sex']:checked").val()) {
                $('#inter_sex').addClass("error");
                isValid = false;
            }else{$('#inter_sex').removeClass("error");}

            if (!$("input[name='fa_sex']:checked").val()) {
                $('#fa_sex').addClass("error");
                isValid = false;
            }else{$('#fa_sex').removeClass("error");}


            if (isValid)
                nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-primary').trigger('click');

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
                var obj = JSON.parse(data);

                $("#district").empty();
                $("#district").append('<option selected="selected"></option>');
                $.each(obj, function (index, element) {
                    $("#district").append(new Option(element.name_kh, element.code));
                });
            },
            complete: function(){
                $("#loading").fadeOut(1000);
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
                $("#commune").append('<option selected="selected"></option>');
                $.each(obj, function (index, element) {
                    $("#commune").append(new Option(element.name_kh, element.code));
                });
            },
            complete: function(){
                $("#loading").fadeOut(1000);
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
                $("#village").append('<option selected="selected"></option>');
                $.each(obj, function (index, element) {
                    $("#village").append(new Option(element.name_kh, element.code));
                });
            },
            complete: function(){
                $("#loading").fadeOut(1000);
            },
            error: function (report){
                console.log(report);
            }
        });
    });

    /*======================================================
    ===============// select2 in village //=================
    ========================================================*/
    $("#village").select2({
        allowClear:true,
        placeholder: 'ភូមិ'
    });
    //interview relationship
    $("#inter_relationship").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'ទំនាក់ទំនង'
    });
    //family relationship
    $("#fa_relationship").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'ទំនាក់ទំនង'
    });
    //* ============= step 2 ======================*//
    $('#add_rows').click(function(){ //alert($m_id);
        var row = $('.new_rows tr.myrow').length;
        var rowindex = row+1;

        $(".new_rows").append('<tr class="myrow">'+
            '<td>'+rowindex+'</td>'+
            '<td><div class="form-group"><input  type="text" required="required" class="form-control" name="nick_name['+row+']"/></div></td>'+
            '<td><div class="form-group"><input maxlength="4" id="dob_'+row+'"  type="text" required="required" class="dob form-control allowNumber" name="dob['+row+']"/></div></td>'+
            '<td><div class="form-group"><input maxlength="3" id="age_'+row+'" type="text" required="required" class="age form-control allowNumber" name="age['+row+']"/></div></td>'+
            '<td>'+
                '<div class="form-group">'+
                    '<select class="form-control family_relationship"  name="family_relationship['+row+']" required="required">'+
                        '<option></option>'+
                        '@foreach($relationship as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
                    '</select>'+
                '</div>'+
            '</td>'+
            '<td>'+
                '<div class="form-group">'+
                    '<select class="form-control occupation"  name="occupation['+row+']" required="required">'+
                        '<option></option>'+
                        '@foreach($occupation as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
                    '</select>'+
                '</div>'+
            '</td>'+
            '<td>'+
                '<div class="form-group">'+
                    '<select class="form-control education_level"  name="education_level['+row+']" required="required">'+
                        '<option></option>'+
                        '@foreach($education_level as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
                    '</select>'+
                '</div>'+
            '</td>'+
            '<td style="text-align:center;"><a status="0" class="remove_rows_kh" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
            '</tr>');
        $(".family_relationship").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "ទំនាក់ទំនង"});
        $(".occupation").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "មុខរបរ"});
        $(".education_level").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "កម្រិតវប្បធម៌"});
        AllowNumber();
        var row_num = $('.new_rows tr').length-1;
        for(var i=0; i<row_num; i++) {
            $('.age').keyup(function () {
                var age = Number($('#age_'+i).val());
                var currentyear = (new Date()).getFullYear();
                var dob = currentyear-age;
                if(age >= 150){
                    $('#dob_'+i).val('');
                }else{
                    $('#dob_'+i).val(dob);
                }
            });

            $('.dob').keyup(function () {
                var dob = Number($('#dob_'+i).val());
                var currentyear = (new Date()).getFullYear();
                var age = currentyear-dob;
                if(dob >= currentyear || age >= 150){
                    $('#age_'+i).val('');
                }
                else{
                    $('#age_'+i).val(age);
                }
            });
        }
    });


    $('#age').on('input', function() {
        var age = Number($('#age').val());
        var currentyear = (new Date()).getFullYear();
        var dob = currentyear-age;
        if(age >= 150){
            $('#dob').val('');
        }else{
            $('#dob').val(dob);
        }
    });

    $('#dob').on('input', function() {
        var dob = Number($('#dob').val());
        var currentyear = (new Date()).getFullYear();
        var age = currentyear-dob;
        if(dob >= currentyear || age >= 150){
            $('#age').val('');
        }
        else{
            $('#age').val(age);
        }
    });

    //remove add
    $(".new_rows").on('click','.remove_rows_kh',function(){
        $(this).parent().parent().remove();
    });

    //family_relationship
    $(".family_relationship").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'ទំនាក់ទំនង'
    });
    //occupation
    $(".occupation").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'មុខរបរ'
    });
    //education
    $(".education_level").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'កម្រិតវប្បធម៌'
    });




    //* ============= step 3 ======================*//



    $('#add_rows_1').click(function(){ //alert($m_id);
        var row_1 = $('.new_rows_1 tr.myrow_1').length;

        var rowindex_1 = row_1+1;
        var tab_rows_1 ='<tr class="myrow_1">'+
            '<td>'+rowindex_1+'</td>'+
            '<td>' +
                '<div class="form-group">'+
                    '<select class="form-control type_meterial" id="type_meterial" name="type_meterial['+row_1+']" required="required"> <option></option>@foreach($typemeterial as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
                '</div>'+
            '</td>'+
            '<td><div class="form-group"><input id="number_meterial_'+row_1+'" type="text" required="required" class="form-control allowNumber meterial" name="number_meterial['+row_1+']"/></div></td>'+
            '<td><div class="form-group"><input id="market_value_meterial_'+row_1+'" type="text" required="required" class="form-control allowNumber meterial" name="market_value_meterial['+row_1+']"/></div></td>'+
            '<td><div class="form-group"><input id="total_rail_meterial_'+row_1+'" type="text" required="required" class="form-control totalallowNumber_meterial" name="total_rail_meterial['+row_1+']" readonly="readonly"/></div></td>'+
            '<td style="text-align:center;"><a id="meterial_'+row_1+'" class="remove_rows_1" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
            '</tr>';
        $(".new_rows_1").append(tab_rows_1);
        $(".type_meterial").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "សម្ភារប្រើបា្រស់"});
        AllowNumber();
        var row_num = $('.new_rows_1 tr').length-1;
        for(var i=0; i<row_num; i++) {
            $('.meterial').keyup(function () {
                var sum = 0;
                var number_meterial = $('#number_meterial_'+i).val();
                var market_value_meterial = $('#market_value_meterial_'+i).val();
                sum = Number(number_meterial * market_value_meterial);
                $("#meterial_"+i).attr({"onclick": "remove_1("+sum+")"});
                $('#total_rail_meterial_'+i).val(sum);
            });
        }

        $('.meterial').keyup(function () {
            var arr = document.getElementsByClassName('totalallowNumber_meterial');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('total_meterial_costs').value = tot;
        });

    });

    //remove add
    function remove_1(val) {
        var total_costs = parseInt($('#total_meterial_costs').val()) - val;
        document.getElementById('total_meterial_costs').value = total_costs;
    }
    $(".new_rows_1").on('click','.remove_rows_1',function(){
        $(this).parent().parent().remove();
    });

    $('.meterial').keyup(function () {
        var sum = 0;
        var number_meterial = $('#number_meterial').val();
        var market_value_meterial = $('#market_value_meterial').val();
        $('.vehicle').each(function() {
            sum = Number(number_meterial * market_value_meterial);
        });
        $('#total_rail_meterial').val(sum);
    });


    //type_vehicle
    $(".type_meterial").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'សម្ភារប្រើបា្រស់'
    });

    $("#go_hospital").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'មធ្យោបាយធ្វើដំណើរ'
    });
    //type_vehicle
    $(".type_vehicle").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'សម្ភារប្រើបា្រស់'
    });

    $('#add_rows_2').click(function(){ //alert($m_id);
        var row_2 = $('.new_rows_2 tr.myrow_2').length;
        var rowindex_2 = row_2+1;
        var html = '<tr class="myrow_2">'+
            '<td>'+rowindex_2+'</td>'+
            '<td>' +
                '<div class="form-group">'+
                    '<select class="form-control type_vehicle" id="type_vehicle" name="type_vehicle['+row_2+']" required="required"> <option></option>@foreach($typemeterial as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
                '</div>'+
            '</td>'+
            '<td><div class="form-group"><input id="number_vehicle_'+row_2+'" type="text" required="required" class="form-control allowNumber vehicle" name="number_vehicle['+row_2+']"/></div></td>'+
            '<td><div class="form-group"><input id="market_value_vehicle_'+row_2+'" type="text" required="required" class="form-control allowNumber vehicle" name="market_value_vehicle['+row_2+']"/></div></td>'+
            '<td><div class="form-group"><input id="total_rail_vehicle_'+row_2+'" type="text" required="required" class="form-control totalallowNumber_vehicle" name="total_rail_vehicle['+row_2+']"/ readonly="readonly"></div></td>'+
            '<td style="text-align:center;"><a id="vehicle_'+row_2+'" class="remove_rows_2" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
            '</tr>';

        $(".new_rows_2").append(html);

        $(".type_vehicle").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "សម្ភារប្រើបា្រស់"});
        AllowNumber();

        var row_num = $('.new_rows_2 tr').length-1;
        for(var i=0; i<row_num; i++) {
            $('.vehicle').keyup(function () {
                var sum = 0;
                var number_vehicle_1 = $('#number_vehicle_'+i).val();
                var market_value_vehicle_1 = $('#market_value_vehicle_'+i).val();
                sum = Number(number_vehicle_1 * market_value_vehicle_1);
                $("#vehicle_"+i).attr({"onclick": "remove_2("+sum+")"});

                $('#total_rail_vehicle_'+i).val(sum);
            });
        }

        $('.vehicle').keyup(function () {
            var arr = document.getElementsByClassName('totalallowNumber_vehicle');
            var tot=0;
            for(var i=0;i<arr.length;i++){
                if(parseInt(arr[i].value))
                    tot += parseInt(arr[i].value);
            }
            document.getElementById('total_vehicle_costs').value = tot;
        });

    });
    //remove add
    function remove_2(val) {
       var total_costs = parseInt($('#total_vehicle_costs').val()) - val;
       // $(this).parent().parent().remove();
        document.getElementById('total_vehicle_costs').value = total_costs;
    }
    $(".new_rows_2").on('click','.remove_rows_2',function(){
       $(this).parent().parent().remove();
    });

    $('.vehicle').keyup(function () {
        var sum = 0;
        var number_vehicle = $('#number_vehicle').val();
        var market_value_vehicle = $('#market_value_vehicle').val();
        $('.vehicle').each(function() {
            sum = Number(number_vehicle * market_value_vehicle);
        });
        $('#total_rail_vehicle').val(sum);
    });



    $('#add_rows_3').click(function(){ //alert($m_id);
        var row_3 = $('.new_rows_3 tr.myrow_3').length;

        var rowindex_3 = row_3+1;
        var tab_rows_3 ='<tr class="myrow_3">'+
            '<td>'+rowindex_3+'</td>'+
            '<td>' +
                '<div class="form-group">'+
                    '<select class="form-control type_animals" id="type_animals" name="type_animals['+row_3+']" required="required"> <option></option>@foreach($typeanimals as $key => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
                '</div>'+
            '</td>'+
            '<td><div class="form-group"><input type="text" required="required" class="form-control allowNumber" name="num_animals_big['+row_3+']"/></div></td>'+
            '<td><div class="form-group"><input type="text" required="required" class="form-control allowNumber" name="num_animals_small['+row_3+']"/></div></td>'+
            '<td><div class="form-group"><input type="text" required="required" class="form-control allowNumber" name="note_animals['+row_3+']"/></div></td>'+
            '<td style="text-align:center;"><a status="0" class="remove_rows_3" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
            '</tr>';
        $(".new_rows_3").append(tab_rows_3);
        AllowNumber();
        $(".type_animals").select2({minimumResultsForSearch: -1, allowClear:true, placeholder: "ប្រភេទសត្វ"});
    });
    //remove add
    $(".new_rows_3").on('click','.remove_rows_3',function(){
        $(this).parent().parent().remove();
    });
    //type_animals
    $(".type_animals").select2({
        minimumResultsForSearch: -1,
        allowClear:true,
        placeholder: 'ប្រភេទសត្វ'
    });













    $('#add_rows_4').click(function(){ //alert($m_id);
        var row_4 = $('.new_rows_4 tr.myrow_4').length;

        var rowindex_4 = row_4+1;
        var tab_rows_4 ='<tr class="myrow_4">'+
                '<td>'+rowindex_4+'</td>'+
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="income_name['+row_4+']" type="text" required="required" class="form-control"  />' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="income_age['+row_4+']" type="text" required="required" class="form-control allowNumber"  />' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="income_occupation['+row_4+']" type="text" required="required" class="form-control"  />' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="income_unit['+row_4+']" type="text" required="required" class="form-control allowNumber"  />' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="unit_in_month['+row_4+']" type="text" required="required" class="form-control allowNumber"  />' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="average_amount['+row_4+']" type="text" required="required" class="form-control allowNumber"  />' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="form-group">' +
                        '<input name="monthly_income['+row_4+']" type="text" required="required" class="form-control allowNumber"  />' +
                    '</div>' +
                '</td>'+
                '<td style="text-align:center;"><a status="0" class="remove_rows_4" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
            '</tr>';
        $(".new_rows_4").append(tab_rows_4);
        AllowNumber();
    });
    //remove add
    $(".new_rows_4").on('click','.remove_rows_4',function(){
        $(this).parent().parent().remove();
    });








    function AllowNumber() {
        $(".allowNumber").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
    }
    //when load
    $(".allowNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
            // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    //validation alert
    $('.nextBtn').click(function(){
         setTimeout(function() {
            $(".add_hide").addClass("autho-hide");
            $('.autho-hide').fadeOut();
        },9000);
    });

   


</script>
@endsection
