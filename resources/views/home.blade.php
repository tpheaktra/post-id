@extends('layouts.app')

@section('content')


<!------ Include the above in your HEAD tag ---------->

<div class="container content">

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
                <div class="col-md-12">
                    <h3> ក) ព័ត៌មានទូទៅ</h3>
                    <div class="col-sm-12"><hr> </div>
                    <div class="col-md-12">
                        <h4>ក.១ ព័ត៌មានទូទៅ</h4>
                        <table class="pull-right">
                            <tr>
                                <td><label class="control-label">លេខកូដសម្ភាសន៍:</label></td>
                                <td>
                                    <div class="form-group">    
                                        <input  maxlength="100" name="interview_code" type="text" required="required" class="form-control" />
                                    </div>  
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ឈ្មោះអ្នកជំងឺ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" name="g_patient" type="text" required="required" class="form-control" />
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label"> ភេទ : </label></td>
                                <td>
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
                                <td><label class="control-label"> អាយុ : </label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" name="g_age" type="text" required="required" class="form-control"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" name="g_phone" type="text" required="required" class="form-control" />
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ខេត្ត : </label></td>
                                <td>
                                   <div class="form-group g_province">
                                       <select id="province" style="width: 100%" class="form-control" name="g_province">
                                           <option value="">...</option>
                                           @foreach($provinces as $key =>$p)
                                               <option value="{{$p->code}}">{{$p->name_kh}}</option>
                                           @endforeach
                                       </select>

                                       <script>
                                           $("#province").select2({
                                               allowClear:true,
                                               placeholder: 'province'
                                           });
                                           /*========================================================================
                                            ===============// select province code append district //=================
                                            ==========================================================================*/
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

                                       </script>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">ឃំុ :</label></td>
                                <td>
                                    <div class="form-group g_commune">
                                        <select id="commune" style="width: 100%" class="form-control" name="g_commune">

                                        </select>
                                    </div>
                                    <script>
                                        $("#commune").select2({
                                            allowClear:true,
                                            placeholder: 'commune'
                                        });
                                        /*========================================================================
                                       ===============// select district code append commune //=================
                                       ==========================================================================*/
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
                                                    console.log(data);
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
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">   ស្រុក : </label></td>
                                <td>
                                   <div class="form-group g_district">
                                       <select id="district" style="width: 100%" class="form-control" name="g_district">

                                       </select>
                                    </div>
                                    <script>
                                        $("#district").select2({
                                            allowClear:true,
                                            placeholder: 'district'
                                        });
                                        /*========================================================================
                                        ===============// select district code append commune //=================
                                        ==========================================================================*/
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
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">ភូមិ :</label></td>
                                <td>
                                    <div class="form-group g_village">
                                        <select id="village" style="width: 100%" class="form-control" name="g_village">

                                        </select>
                                    </div>
                                    <script>
                                        $("#village").select2({
                                            allowClear:true,
                                            placeholder: 'village'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label"> ទីតាំងនៅក្នុងភូមិ : </label></td>
                                <td>
                                   <div class="form-group">
                                       <textarea class="form-control" id="location" name="g_local_village" required="required">

                                       </textarea>
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
                                <td><label class="control-label">ឈ្មោះអ្នកជំងឺ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" type="text" required="required" class="form-control" name="inter_patient"/>
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
                                        <input  maxlength="100" type="text" required="required" class="form-control"  name="inter_age"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" type="text" required="required" class="form-control" name="inter_phone"/>
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ត្រូវជា(ទំនាក់ទំនងជាមួយមេគ្រួសារ) : </label></td>
                                <td>
                                    <div class="form-group inter_relationship">
                                        <select class="form-control" id="inter_relationship" name="inter_relationship">
                                            <option></option>
                                            @foreach($relationship as $keh => $value)
                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <script>
                                        $("#inter_relationship").select2({
                                            minimumResultsForSearch: -1,
                                            allowClear:true,
                                            placeholder: 'relationship'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </div>

                   <div class="col-sm-12"><hr> </div>
                   <div class="col-sm-12">
                        <h4> ក.៣ ព័ត៌មានអំពី​ អ្នកដែលអាចបញ្ជាក់ពីស្ថានភាពគ្រួសារ (ដែលមិនមែនសមាជិកគ្រួសារ)ដូចជាមេភូមិ អ្នកជិតខាង​ មិត្តភ័ក្រ្ត </h4> 
                   </div>
                   <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ឈ្មោះអ្នកជំងឺ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" type="text" required="required" class="form-control" name="fa_patient"/>
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
                                        <input  maxlength="100" type="text" required="required" class="form-control" name="fa_age"/>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ :</label></td>
                                <td>
                                   <div class="form-group">
                                        <input  maxlength="100" type="text" required="required" class="form-control" name="fa_phone"/>
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ត្រូវជា(ទំនាក់ទំនងជាមួយមេគ្រួសារ) : </label></td>
                                <td>
                                    <div class="form-group fa_relationship">
                                        <select class="form-control" id="fa_relationship" name="fa_relationship">
                                            <option></option>
                                            @foreach($relationship as $keh => $value)
                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <script>
                                        $("#fa_relationship").select2({
                                            minimumResultsForSearch: -1,
                                            allowClear:true,
                                            placeholder: 'family relationship'
                                        });
                                    </script>
                                </td>
                            </tr>
                        </table>
                    </div>

                     <div class="col-sm-12"><hr> </div>
                    <button class="btn btn-primary nextBtn pull-right" type="button" >រក្សាទុកនិងជំហានបន្ទាប់</button>
                </div>
            </div>
        </div>




        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> ខ) ព័ត៌មានសំខាន់ៗអំពីសមាជិក​គ្រួសារ​ទាំងអស់</h3>
                    <div class="col-sm-12"><hr> </div>
                    <p>មនុស្ស​ដែល​គេ​ចាត់ទុកថាជាសមាជិក​គ្រួសារលុះ​ត្រាតែ​រស់​នៅជាប្រចាំ​ក្នុង​គ្រួសារ ឬ​អវត្តមាន​តិច​ជាង​ ៦ខែ​​ (ត្រូវមានឯកសារយោងដូចជា សៀវភៅគ្រួសារ សៀវភៅស្នាក់នៅ សំបុត្រកំណើត លិខិតបញ្ជាក់ពីអាជ្ញាធរ)</p>


                        <table class="table" style="border-color: #B0B0B0;" border="1" bordercolor="#B0B0B0">
                            <thead>
                                <tr>
                                    <th rowspan="2">ល.រ</th>
                                    <th rowspan="2">នាមត្រកូល នាមខ្លួន ឈ្មោះហៅក្រៅ</th>
                                    
                                    <th colspan="2"><p align="center">ឆ្នាំកំណើត ឬ អាយុ</p></th>
                                    <th rowspan="2">ទំនាក់ទំនង​ជាមួយ​មេ​គ្រួសារ (1)</th>
                                    <th rowspan="2">មុខងារ/​មុខរបរ  (2)</th>
                                    <th rowspan="2">កម្រិតវប្បធម៌(3) </th>
                                    <th rowspan="2">Actions</th>
                                </tr>
                                <tr>
                                    <th>ឆ្នាំ​កំណើត</th>
                                    <th>អាយុ</th>
                                </tr>
                            </thead>
                            <tbody class="new_rows">
                                <tr class="myrow">
                                    <td>1</td>
                                    <td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="nick_name[0]"/></div></td>
                                    <td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="dob[0]"/></div></td>
                                    <td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="age[0]"/></div></td>
                                    <td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="family_relationship[0]"/></div></td>
                                    <td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="occupation[0]"/></div></td>
                                    <td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="education_level[0]"/></div></td>
                                </tr>
                            </tbody>
                        </table>

                        <input type="button" class="btn btn-primary" id="add_rows" style="float:right;" value="បញ្ចូលបន្ថែម">
                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <p>(1)= មេ​គ្រួសារ ប្តី/​ប្រពន្ធ កូន ឪពុក​ម្តាយ ក្មួយ ផ្សេងៗ </p>
                            <p>
                            (2)= ប្រភេទមុខរបរចម្បងរបស់គាត់/នាង ដូចជា កសិករ កម្មករ មន្ត្រីរាជការ រកស៊ី សិស្ស នៅផ្ទះ</p>
                            <p>(3)= បើនៅរៀន បញ្ជាក់ពីថ្នាក់ទីប៉ុន្មាន។ បើជាមនុស្សពេញវ័យឬជាកុមារអាយុចាប់ពី៥ឆ្នាំតែឈប់រៀន សូមបញ្ជាក់ពីកម្រិតថ្នាក់នៅពេលឈប់រៀន</p>
                        </div>

                    <div class="col-sm-12"><hr> </div>
                    <button id="step2Next" class="btn btn-primary nextBtn pull-right" type="button" >រក្សាទុក និង ជំហានបន្ទាប់</button>
                </div>
            </div>
        </div>

        <div class="row setup-content" id="step-3">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3> គ) ស្ថានភាពទូទៅរបស់គ្រួសារ</h3>
                       <div class="col-sm-12"><hr> </div>
                       <div class="col-sm-12">
                            <h4> គ.១ ផ្ទះសម្បែងរបស់ក្រុមគ្រួសារ</h4> 
                            <p>តើពួកគាត់រស់នៅទីកន្លែងណា? (សូមគូស ធេក នៅចំលើយតែមួយ)</p>

                         
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
                                     if(houshold == 5){
                                         $('#household_family_id').append('<input type="text" placeholder="ឈ្មោះស្ថាប័ន" name="institutions_name">លេខទូរសព្ទបុគ្គលទំនាក់ទំនងនៅស្ថាប័ន : <input type="text" placeholder="លេខទូរសព្ទ" name="instatutions_phone">');
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
                                               <input type="text" name="total_people" class="form-control">
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
                                                    <input id="ground_floor_length" class="form-control" required="required" placeholder="បណ្តោយ(ម៉ែត្រ)​..." type="text" name="ground_floor_length" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="ground_floor_width" class="form-control"  required="required" placeholder="ទទឹង(ម៉ែត្រ)..." type="text" name="ground_floor_width" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="ground_floor_area" class="form-control" required="required" placeholder="ផ្ទៃ(ម៉ែត្រក្រឡា)..." type="text" name="ground_floor_area" value="0" disabled="disabled">
                                                </div>
                                            </td>                     
                                        </tr>

                                        <tr>
                                            <td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="upper_floor_length" class="form-control" required="required" placeholder="បណ្តោយ(ម៉ែត្រ)​..." type="text" name="upper_floor_length" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="upper_floor_width" class="form-control" required="required" placeholder="ទទឹង(ម៉ែត្រ)..." type="text" name="upper_floor_width" value="0">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="upper_floor_area" class="form-control" required="required" placeholder="ផ្ទៃ(ម៉ែត្រក្រឡា)..." type="text" name="upper_floor_area" value="0" disabled="disabled">
                                                </div>
                                            </td>                     
                                        </tr>
                                        <tr>
                                            <td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="further_floor_length" class="form-control" required="required" laceholder="បណ្តោយ(ម៉ែត្រ)​..." type="text" value="0" name="further_floor_length">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="further_floor_width" class="form-control" required="required" placeholder="ទទឹង(ម៉ែត្រ)..." type="text" value="0" name="further_floor_width">
                                                </div>
                                                </td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="further_floor_area" class="form-control" required="required" placeholder="ផ្ទៃ(ម៉ែត្រក្រឡា)..." type="text" value="0" name="further_floor_area" disabled="disabled">
                                                </div>
                                            </td>                     
                                        </tr>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><b style="float:right;">ផ្ទៃកម្រាលសរុប (ម៉ែត្រ​ក្រឡា) :</b></td>
                                            <td>
                                                <div class="form-group">
                                                    <input id="total_area" name="total_area" class="form-control" required="required" placeholder="ផ្ម៉ែត្រក្រឡា..." type="text" value="0" disabled="disabled">
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

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4> គ.៤ បង្គន់</h4>
                            <h5> តើគ្រួសាររបស់អ្នកមានបង្គន់ប្រើដែរឬទេ?</h5>
                            <ul class="li-none">
                                <li>
                                     <label><input type="radio" name="tolet" ​​ value="មាន"> មាន </label>
                                </li>
                                <li>
                                     <label><input type="radio" name="tolet" value="គ្មាន"> គ្មាន </label>
                                </li>
                            </ul>

                            <h5>  បើមាន តើជាបង្គន់ចាក់ទឹក ឬ បង្គន់ស្ងួត?</h5>
                            <ul class="li-none">
                                <li>
                                     <label><input type="radio" name="tolet_1" ​​ value="បង្គន់ចាក់ទឹក"> បង្គន់ចាក់ទឹក</label>
                                </li>
                                <li>
                                    <label><input type="radio" name="tolet_1" value="បង្គន់ស្ងួត">  បង្គន់ស្ងួត</label>
                                </li>
                            </ul>


                            <h5>  ជាបង្គន់​របស់នរណា?</h5>
                            <ul class="li-none">
                                <li>
                                     <label><input type="radio" name="tolet_2" ​​ value="ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់"> ជាបង្គន់របស់គ្រួសារអ្នកផ្ទាល់ </label>
                                </li>
                                <li>
                                    <label><input type="radio" name="tolet_2" value="ជាបង្គន់រួមជាមួយគ្រួសារដទៃ"> ជាបង្គន់រួមជាមួយគ្រួសារដទៃ</label>
                                </li>
                            </ul>

                            <p class="has-noted">សម្រាប់គ្រួសារមានផ្ទះផ្ទាល់ខ្លួន ឬ ​ នៅជាមួយគេដោយអត់បង់ថ្លៃ (សម្រាប់គ្រួសារជួលផ្ទះគេ​ មិនបាច់បំពេញចំណុច គ៥ គ៦ និង គ៧ ហើយរំលងទៅ គ៨)</p>

                            <h5>ផ្ទះសាងសង់នៅឆ្នាំណា? <input type="text" name="h_build_year"> </h5>

                            <h5>តើធ្លាប់ជួសជុលឬទេ?</h5>
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
                                    $('#homeyear').append('<input type="text" placeholder="ឆ្នាំ" name="home_year">');
                                }
                            });
                        </script>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.៥ ដំបូល</h4>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label"> ដំបូលធ្វើអំពី : </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input type="text" required="required" class="form-control" name="roof_made"/>
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label">​ និង​ស្ថានភាព : </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input type="text" required="required" class="form-control" name="roof_status"/>
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <h4>គ.៦ ​ជញ្ជាំង</h4>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label"> ​ជញ្ជាំងធ្វើអំពី : </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input type="text" required="required" class="form-control" name="walls_made"/>
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label">​​ និង​ស្ថានភាព : </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input type="text" required="required" class="form-control" name="walls_status"/>
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <h4>គ.៧) ស្ថានភាពទូទៅផ្ទះសម្បែង</h4>
                            <ul class="li-none">
                                @foreach($condition_house as $key => $c)
                                <li>
                                     <label><input type="radio" name="condition_house" ​ value="{{$c->id}}"> {{$c->name_kh}}</label>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.៨) សម្រាប់គ្រួសារជួលផ្ទះគេ​ (សម្រាប់គ្រួសារមានផ្ទះផ្ទាល់ខ្លួន ឬ ​ នៅជាមួយគេដោយអត់បង់ថ្លៃ មិនបាច់បំពេញចំណុច គ៨ ហើយរំលងទៅ គ៩)</h4>

                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label"> តើថ្លៃជួលប្រចាំខែជាមធ្យមប៉ុន្មាន?: </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input type="text" required="required" class="form-control" name="rent_fee"/>
                                            </div>     
                                        </td>
                                    </tr>
                                </table>

                                <h4>គ.៩) ទ្រព្យ​សម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិច​របស់​គ្រួសារ</h4>
                                <table class="tb_grid" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ល.រ</th>
                                            <th>ប្រភេទសម្ភារប្រើបា្រស់</th>
                                            <th>ចំនួន</th>
                                            <th>តម្លៃទីផ្សារ ប្រសិន​លក់​វា​ចេញចំនួនតម្លៃឯកត្តា</th>
                                            <th>តម្លៃ​សរុប (រៀល)</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="new_rows_1">
                                        <tr class="myrow_1">
                                            <td>1</td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="type_meterial[0]" type="text" required="required" class="form-control"/>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="number_meterial[0]" type="text" required="required" class="form-control"  />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="market_value_meterial[0]" type="text" required="required" class="form-control"  />
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="total_rail[0]" type="text" required="required" class="form-control"  />
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
                                                    <input name="total_meterial_costs" type="text" required="required" class="form-control" disabled="disabled"/>
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



                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១០) អគ្គិសនី</h4>
                            <p>តើបានតបណ្តាញអគ្គិសនី (រដ្ឋឬឯកជន) ដែរឬទេ?</p>
                            <ul>
                                <li>
                                     <input type="radio" name="elect" ​​> បាន
                                </li>
                                <li>
                                    <input type="radio" name="elect">  មិនបាន
                                </li>
                            </ul>

                            <p>ប្រសិនបានតបណ្តាញអគ្គិសនី </p>
                            <ul>
                                <li>
                                     តម្លៃក្នុងមួយគីឡូវ៉ាត់/ម៉ោង <input type="text">
                                </li>
                                <li>
                                    ចំនួនគីឡូវ៉ាត់ដែលប្រើជាមធ្យមក្នុងមួយខែ <input type="text"> 
                                </li>
                                <li>
                                    ចំណាយ​ជា​មធ្យមក្នុងមួយខែ <input type="text">
                                </li>
                            </ul>

                            <p>ប្រសិនមិនបានតបណ្តាញអគ្គិសនី</p>
                            <ul>
                                <li>
                                     <input type="radio" name="elect" ​​> ប្រើម៉ាស៊ីនភ្លើង
                                </li>
                                <li>
                                    <input type="radio" name="elect">  ប្រើអាគុយ 
                                </li>
                                <li>
                                    <input type="radio" name="elect">  ប្រើចង្កៀងប្រេងកាត
                                </li>
                                <li>
                                    <input type="radio" name="elect">  ថាមពលព្រះអាទិត្យ
                                </li>
                            </ul>

                        </div>


                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១១) យានជំនិះជាទ្រព្យសម្បត្តិផ្ទាល់របស់​គ្រួសារ</h4>
                            <h5>តើអ្នកប្រើមធ្យោបាយអ្វីមកមន្ទីរពេទ្យ? <input type="text" name=""></h5>
                            <table class="tb_grid" width="100%">
                                <thead>
                                    <tr>
                                        <th>ល.រ</th>
                                        <th>ប្រភេទសម្ភារប្រើបា្រស់</th>
                                        <th>ចំនួន</th>
                                        <th>តម្លៃទីផ្សារ ប្រសិន​លក់​វា​ចេញចំនួនតម្លៃឯកត្តា</th>
                                        <th>តម្លៃ​សរុប (រៀល)</th>
                                    </tr>
                                </thead>
                                <tbody class="new_rows_elect">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
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
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           <input class="btn btn-primary" id="add_rows_elect" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
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
                            <table class="tb_grid" width="100%">
                                <thead>
                                    <tr>
                                        <th>ល.រ</th>
                                        <th>ប្រភេទសត្វ</th>
                                        <th>ចំនួនសត្វធំ</th>
                                        <th>ចំនួនកូនសត្វ</th>
                                        <th>កំណត់សម្គាល់ (បញ្ជាក់ បើសិនជាសត្វប្រវាស់គេ)</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="new_rows_elect">
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                        <td>Actions</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
                                        <td>
                                            <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           <input class="btn btn-primary" id="add_rows_elect" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            
                    </div>



                    <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១២.១.២​)មាន​ដីកសិកម្ម ឬ​ទេ ?</h4>
                            <p>តើបានតបណ្តាញអគ្គិសនី (រដ្ឋឬឯកជន) ដែរឬទេ?</p>
                            <ul>
                                <li>
                                     <input type="radio" name="elect" ​​> គ្មាន 
                                </li>
                                <li>
                                    <input type="radio" name="elect">  ដីជួលគេ
                                </li>
                                <li>
                                    <input type="radio" name="elect">  ដីផ្ទាល់ខ្លួន
                                </li>
                            </ul>

                            <p>ប្រសិនបើមានដីផ្ទាល់ខ្លួន ឫជួលគេ សូមបញ្ជាក់ ទំហំដីកសិកម្ម (សុំសរសេរជាទំហំសរុបដោយបូកគ្រប់កន្លែង និងបញ្ជាក់ពីឯកតា)</p>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label"> -មាន ៖ </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>     
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="control-label"> កន្លែង. ទំហំសរុប : </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td><label class="control-label">​ -ដីចំការ៖ </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>     
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="control-label">​ កន្លែង. ទំហំសរុប : </label></td>
                                        <td>
                                           <div class="form-group">
                                                <input  maxlength="100" type="text" required="required" class="form-control"  />
                                            </div>     
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>




                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១២.២) ចំណូល ផ្សេងពី សកម្មភាពកសិកម្ម ផ្ទាល់ខ្លួន​ (បញ្ជាក់ការងារកម្មករផ្នែកកសិកម្មត្រូវបញ្ចូលក្នុងតារាងនេះ) បញ្ជាក់ ៖ ចុះ​តែ​សមាជិក​គ្រួសារ​ដែល​រក​ប្រាក់​ចំណូល​បាន។ ចំពោះសមាជិកដែលមានប្រភពចំណូលលើសពីមួយ សូមសរសេរ​នៅក្នុងជួរដោយឡែកពីគ្នា។</h4>
                            <p>ប្រសិនបើគ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្មត្រូវផ្ដល់ពិន្ទុតាមឯកសារណែនាំចំណុច 7B.2</p>
                            <table class="tb_grid">
                                <thead>
                                    <tr>
                                        <th>ល.រ</th>
                                        <th>ឈ្មោះសមាជិកគ្រូសាររកប្រាក់ចំណូល</th>
                                        <th>អាយុ​&lt; 18 </th>
                                        <th>មុខរបររកចំណូល</th>
                                        <th>ឯកតា
                                        </th><th>ចំនួនឯកតាក្នុងមួខែ
                                        </th><th>ទឹកប្រាក់មធ្យមក្នុងមួយឯកតា
                                        </th><th>ចំណូលមធ្យមប្រចាំខែ  (ចំនួន x តម្លៃឯកត្តា)
                                    </th></tr>
                                </thead>
                                <tbody class="new_rows_income">
                                    <tr>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>
                                        <td><input class="form-control"  type="text"></td>

                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                           <input class="btn btn-primary" id="add_rows_elect" style="float:right;" value="បញ្ចូលបន្ថែម" type="button">
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"><span style="float: right;">សរុបចំណូល ប្រចាំខែ សម្រាប់គ្រួសារទាំងមូល (គិតជារៀល):</span></td>
                                        <td><input class="form-control" id="pl-pro"  type="text"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><span style="float: right;">ចំណូលក្រៅពីកសិកម្មជាមធ្យមប្រចាំខែសម្រាប់មនុស្សម្នាក់​​ (១) :</span></td>
                                        <td><input class="form-control" id="pl-pro"  type="text"></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>



                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4>គ.១៣) សុខភាព និងពិការភាព</h4>
                                <table class="table">
                                    <tbody><tr>
                                        <td colspan="2"></td>
                                        <td>ក្មេង + អ្នក  អាយុ &lt; 65ឆ្នាំ </td>
                                        <td> ចាស អាយុ≥65 ឆ្នាំ</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ</td>
                                        <td>1</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">ចំនួន​សមាជិក​គ្រួសារ ​ដែលបាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ដោយសារមានជម្ងឺធ្ងន់ធ្ងរ/រ៉ាំរ៉ៃ ឬពិការធ្ងន់ធ្ងរ</td>
                                        <td>2</td>
                                        <td>1</td>
                                    </tr>
                                </tbody>
                            </table>

                            <h4>គ.១៤) បំណុលគ្រួសារ</h4>
                            <p>តើ​គ្រួសារ​របស់​អ្នក​នៅមាន​បំណុល/​កម្ចី​មិនទាន់​បាន​សង​ដែរ​ឬ​ទេ?</p>
                            <ul type="1">
                                <li>
                                     <label><input type="radio" name="elect" ​​> មិនមាន​បំណុលទេ​ => បើអ្នកត្រូវការលុយប្រហែល៤០,០០០០រៀល តើអ្នកអាចខ្ចីគេបានទេ? </label>
                                     <ul>
                                         <li><label><input type="radio" name="elect" ​​>  បាន</label></li>
                                         <li><label><input type="radio" name="elect" ​​> មិនបាន </label></li>
                                     </ul>
                                </li>
                                <li>
                                    <label><input type="radio" name="elect">  មាន​បំណុល => ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន</label>
                                    <label><input type="text" name="elect">រៀល</label>
                                </li>
                            </ul>
                        </div>

                        
                    <div class="col-sm-12"><hr> </div>
                    <button class="btn btn-primary pull-right mysubmit nextBtn " type="submit">រក្សាទុក​​ និង បញ្ចប់</button>
                </div>
            </div>
        </div>

    </form>
</div>



<script type="text/javascript">




    $(document).ready(function () {



        $('#add_rows').click(function(){ //alert($m_id);
            var row = $('.new_rows tr.myrow').length;
           // alert(row);
            var rowindex = row+1;
            var tab_rows ='<tr class="myrow">'+
                '<td>'+rowindex+'</td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="nick_name['+row+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="dob['+row+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="age['+row+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="family_relationship['+row+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="occupation['+row+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="education_level['+row+']"/></div></td>'+
                '<td style="text-align:center;"><a status="0" class="remove_rows_kh" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
            '</tr>';
            $(".new_rows").append(tab_rows);
        });

        //remove add
        $(".new_rows").on('click','.remove_rows_kh',function(){
            $(this).parent().parent().remove();
        });


        $('#add_rows_1').click(function(){ //alert($m_id);
            var row_1 = $('.new_rows_1 tr.myrow_1').length;

            var rowindex_1 = row_1+1;
            var tab_rows_1 ='<tr class="myrow_1">'+
                '<td>'+rowindex_1+'</td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="type_meterial['+row_1+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="number_meterial['+row_1+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="market_value_meterial['+row_1+']"/></div></td>'+
                '<td><div class="form-group"><input  maxlength="100" type="text" required="required" class="form-control" name="total_rail['+row_1+']"/></div></td>'+
                '<td style="text-align:center;"><a status="0" class="remove_rows_1" style="color:red; cursor: pointer;"><img src="{{asset('images/remove.png')}}"  style="width: 30px;"></a></td>'+
                '</tr>';
            $(".new_rows_1").append(tab_rows_1);
        });
        //remove add
        $(".new_rows_1").on('click','.remove_rows_1',function(){
            $(this).parent().parent().remove();
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

</script>
@endsection
