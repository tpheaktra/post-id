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

    <form role="form" method="post" class="form-group-post" action="{{ route('insert.index') }}" id="check_validate">
        {{ csrf_field() }}
        <div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12" id="div1">
                    <div class="col-md-12">
                        <h3> ក) ព័ត៌មានទូទៅ</h3>
                        <div class="col-sm-12" style="padding: 0;"><hr> </div>
                        <h4>ក.១ ព័ត៌មានទូទៅ</h4>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td width="35%"><label class="control-label">ថ្ងៃសម្ភាសន៍ <spand class="text-danger">*</spand></label></td>
                                        <td width="65%">
                                            <div class="form-group">
                                                <div class="input-group date current_date">
                                                    <input type="text" class="form-control"  id="current_date" name="interview_date"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td width="35%"><label class="control-label">ថ្ងៃផុតកំណត់ <spand class="text-danger">*</spand></label></td>
                                        <td width="65%">
                                            <div class="form-group">
                                                <div class="input-group date expire_date">
                                                    <input type="text" class="form-control" readonly id="expire_date" name="expire_date" placeholder="2018-12-31"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </div>

                    <script type="text/javascript">
                        $('#current_date').datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd',
                            todayHighlight: true
                        });
                        $("#current_date").datepicker().datepicker("setDate", new Date());
                        $('#expire_date').datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd',
                            minDate: true
                        });

                    </script>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td width="35%"><label class="control-label">មន្ទីរពេទ្យ <spand class="text-danger">*</spand></label></td>
                                        <td width="65%">
                                            <div class="form-group add_hospital">
                                                <select id="hospital" style="width: 100%" class="getdata form-control" name="hospital">
                                                    <option></option>
                                                    @foreach($hospital as $key =>$h)
                                                        @if (old('hospital') == $h->od_code)
                                                            <option selected value="{{$h->od_code}}">មន្ទីរពេទ្យ - {{$h->name_kh}}</option>
                                                        @else
                                                            <option value="{{$h->od_code}}">មន្ទីរពេទ្យ - {{$h->name_kh}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-6">
                                <table width="100%">
                                    <tr>
                                        <td width="35%"><label class="control-label">លេខកូដសម្ភាសន៍ <spand class="text-danger"> * </spand></label> </td>
                                        <td width="30%">
                                            <div class="form-group">
                                                {{ Form::text('interview_code',null,['class'=>'form-control','required'=>'required','readonly'=>'readonly' ,'placeholder'=>'PNP/18 08 29/01','id'=>'interview_code']) }}
                                                {{ Form::hidden('hf_code',null,['required'=>'required','readonly'=>'readonly','id'=>'health_facilities_code']) }}
                                            </div>
                                        </td>
                                        <td></td>
                                        <td width="30%">
                                            <div class="form-group">
                                                <input id="printcard" name="printcardno" type="text" class="form-control" placeholder="23020101-0001" readonly style="text-align: center; font-size: 18px;  padding: 4px;"/>
                                                <input id="hhid" name="hhid" type="hidden"/>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label">ឈ្មោះអ្នកជំងឺ <spand class="text-danger">*</spand></label></td>
                                <td width="65%">
                                   <div class="form-group">
                                       {{ Form::text('g_patient',null,['class'=>'form-control','required'=>'required']) }}
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label"> ភេទ <spand class="text-danger">*</spand> </label></td>
                                <td width="65%">
                                   <div class="form-group"  id="g_sex">
                                       @foreach($gender as $key => $g)
                                        <label>
                                            {{ Form::radio('g_sex',$g->id,false,['style'=>'margin-right:10px;']) }}  {{$g->name_kh}}
                                        </label>
                                       @endforeach
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label"> អាយុ <spand class="text-danger">*</spand> </label></td>
                                <td width="65%">
                                   <div class="form-group">
                                       {{ Form::text('g_age',null,['class'=>'form-control allowNumber onlyNumber g_age','required'=>'required','maxlength'=>'3']) }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label">លេខទូរស័ព្ធ <spand class="text-danger">*</spand></label></td>
                                <td width="65%">
                                   <div class="form-group">
                                       {{ Form::text('g_phone',null,['class'=>'form-control telephone','required'=>'required','maxlength'=>'10']) }}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label">ខេត្ត <spand class="text-danger">*</spand> </label></td>
                                <td width="65%">
                                   <div class="form-group g_province">
                                       <select id="province" style="width: 100%" class="form-control" name="g_province">
                                           <option value="">...</option>
                                           @foreach($provinces as $key =>$p)
                                               @if(old('g_province') == $p->code)
                                                   <option selected value="{{$p->code}}">{{$p->name_kh}}</option>
                                               @else
                                                   <option value="{{$p->code}}">{{$p->name_kh}}</option>
                                               @endif
                                           @endforeach
                                       </select>
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label"> ស្រុក <spand class="text-danger">*</spand> </label></td>
                                <td width="65%">
                                   <div class="form-group g_district">
                                       <select id="district" style="width: 100%" class="form-control" name="g_district">
                                           <option value=""></option>
                                           @if (!empty(old('g_district')))
                                               <option selected value="{{old('g_district')}}"></option>
                                           @endif
                                       </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>


                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label">ឃំុ <spand class="text-danger">*</spand></label></td>
                                <td width="65%">
                                    <div class="form-group g_commune">
                                        <select id="commune" style="width: 100%" class="form-control" name="g_commune">
                                            <option value=""></option>
                                            @if (!empty(old('g_commune')))
                                                <option selected value="{{old('g_commune')}}"></option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%"><label class="control-label">ភូមិ <spand class="text-danger">*</spand></label></td>
                                <td width="65%">
                                    <div class="form-group g_village">
                                        <select id="village" style="width: 100%" class="form-control" name="g_village">
                                            <option value=""></option>
                                            @if(!empty(old('g_village')))
                                                <option selected value="{{old('g_village')}}"></option>
                                            @endif
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="35%"><label class="control-label"> ទីតាំងនៅក្នុងភូមិ <spand class="text-danger">*</spand> </label></td>
                                <td width="65%">
                                   <div class="form-group location">
                                       {{ Form::textarea('g_local_village',null,['class'=>'form-control','id'=>'location','maxlength'=>'300','style'=>'height: 60px;']) }}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                <div class="step1-section-2">
                   <div class="col-sm-12"><hr> </div>
                   <div class="col-sm-12">
                        <h4> ក.២ ព័ត៌មានអំពីអ្នកដែលផ្តល់ចំលើយ(អ្នកដែលបានសំភាសន៍)</h4>
                   </div>
                   <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ឈ្មោះ </label></td>
                                <td>
                                   <div class="form-group">
                                       {{ Form::text('inter_patient',null,['class'=>'form-control']) }}
                                    </div>     
                                </td>
                            </tr>

                            <tr>
                                <td><label class="control-label"> ភេទ  </label></td>
                                <td>
                                   <div class="form-group" id="inter_sex">
                                       @foreach($gender as $key => $g)
                                          <label>{{ Form::radio('inter_sex',$g->id,false,['style'=>'margin-right:10px;']) }}  {{$g->name_kh}}</label>
                                       @endforeach
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label"> អាយុ  </label></td>
                                <td>
                                   <div class="form-group">
                                       {{ Form::text('inter_age',null,['class'=>'form-control allowNumber inter_age','maxlength'=>'3']) }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ </label></td>
                                <td>
                                   <div class="form-group">
                                       {{ Form::text('inter_phone',null,['class'=>'form-control telephone','maxlength'=>'10']) }}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="50%"><label class="control-label">ត្រូវជា(ទំនាក់ទំនងជាមួយមេគ្រួសារ)  </label></td>
                                <td width="50%">
                                    <div class="form-group inter_relationship">
                                        <select style="width: 100%;" class="form-control" id="inter_relationship" name="inter_relationship">
                                            <option></option>
                                            @foreach($relationship as $keh => $value)
                                                @if (old('inter_relationship') == $value->id)
                                                    <option selected value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @else
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                   <div class="col-sm-12"><hr> </div>
                   <div class="col-sm-12">
                        <h4> ក.៣ ព័ត៌មានអំពី​ អ្នកដែលអាចបញ្ជាក់ពីស្ថានភាពគ្រួសារ (ដែលមិនមែនសមាជិកគ្រួសារ)ដូចជាមេភូមិ អ្នកជិតខាង​ មិត្តភ័ក្រ្ត </h4> 
                   </div>
                   <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label">ឈ្មោះ </label></td>
                                <td>
                                   <div class="form-group">
                                       {{ Form::text('fa_patient',null,['class'=>'form-control']) }}
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label"> ភេទ  </label></td>
                                <td>
                                   <div class="form-group" id="fa_sex">
                                       @foreach($gender as $key => $g)
                                           <label>{{ Form::radio('fa_sex',$g->id,false,['style'=>'margin-right:10px;']) }}  {{$g->name_kh}}</label>
                                       @endforeach
                                    </div>     
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td><label class="control-label"> អាយុ  </label></td>
                                <td>
                                   <div class="form-group">
                                       {{ Form::text('fa_age',null,['class'=>'form-control allowNumber fa_age','maxlength'=>'3']) }}
                                    </div>     
                                </td>
                            </tr>
                            <tr>
                                <td><label class="control-label">លេខទូរស័ព្ធ </label></td>
                                <td>
                                   <div class="form-group">
                                       {{ Form::text('fa_phone',null,['class'=>'form-control telephone','maxlength'=>'10']) }}
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-sm-6">
                        <table width="100%">
                            <tr>
                                <td width="50%"><label class="control-label">ត្រូវជា(ដែលមិនមែនសមាជិកគ្រួសារ)  </label></td>
                                <td width="50%">
                                    <div class="form-group fa_relationship">
                                        <select style="width: 100%;" class="form-control" id="fa_relationship" name="fa_relationship">
                                            <option></option>
                                            @foreach($family as $keh => $value)
                                                @if (old('fa_relationship') == $value->id)
                                                    <option selected value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @else
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-12"><hr> </div>
                    <div class="col-sm-12">
                        <button  class="btn btn-primary nextBtn pull-right" type="button">រក្សាទុកនិងជំហានបន្ទាប់</button>
                    </div>
                </div>
            </div>
        </div>


       <?php /* ===========================================
            ===========================================
            --------------- step2 ---------------------
            ===========================================
            =========================================== */ ?>

        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12" id="div2">
                   <div class="col-sm-12">
                    <h3> ខ) ព័ត៌មានសំខាន់ៗអំពីសមាជិក​គ្រួសារ​ទាំងអស់</h3>
                    <hr>
                    <p>មនុស្ស​ដែល​គេ​ចាត់ទុកថាជាសមាជិក​គ្រួសារលុះ​ត្រាតែ​រស់​នៅជាប្រចាំ​ក្នុង​គ្រួសារ ឬ​អវត្តមាន​តិច​ជាង​ ៦ខែ​​ (ត្រូវមានឯកសារយោងដូចជា សៀវភៅគ្រួសារ សៀវភៅស្នាក់នៅ សំបុត្រកំណើត លិខិតបញ្ជាក់ពីអាជ្ញាធរ)</p>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th rowspan="2">ល.រ</th>
                                    <th width="15%" rowspan="2">ឈ្មោះ</th>
                                    <th width="10%" rowspan="2">ភេទ</th>
                                    <th colspan="2"><p align="center">ឆ្នាំកំណើត ឬ អាយុ</p></th>
                                    <th width="15%" rowspan="2">ទំនាក់ទំនង​ជាមួយ​មេ​គ្រួសារ(1) <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="(1)= មេ​គ្រួសារ ប្តី/​ប្រពន្ធ កូន ឪពុក​ម្តាយ ក្មួយ ផ្សេងៗ"></a>
                                    </th>
                                    <th width="15%" rowspan="2">មុខងារ/​មុខរបរ(2) <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="(2)= ប្រភេទមុខរបរចម្បងរបស់គាត់/នាង ដូចជា កសិករ កម្មករ មន្ត្រីរាជការ រកស៊ី សិស្ស នៅផ្ទះ"></a></th>
                                    <th width="15%" rowspan="2">កម្រិតវប្បធម៌(3) <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="(3)= បើនៅរៀន បញ្ជាក់ពីថ្នាក់ទីប៉ុន្មាន។ បើជាមនុស្សពេញវ័យឬជាកុមារអាយុចាប់ពី៥ឆ្នាំតែឈប់រៀន សូមបញ្ជាក់ពីកម្រិតថ្នាក់នៅពេលឈប់រៀន"></a></th>
                                    <th rowspan="2" class="my_hide">ពិន្ទុតាមសមាជិក</th>
                                    <th width="15%" rowspan="2">សកម្មភាព</th>
                                </tr>
                                <tr>
                                    <th width="15%">ឆ្នាំ​កំណើត</th>
                                    <th width="8%">អាយុ</th>
                                </tr>
                            </thead>
                            <tbody class="new_rows">
                                <tr class="myrow" index="0">
                                    <td>1(មេ)</td>
                                    <td>
                                        <div class="form-group">
                                            {{ Form::text('nick_name[0]',null,['class'=>'form-control nick_name_0','required'=>'required']) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group add_m_sex">
                                            <select style="width: 100%" class="form-control m_sex" name="m_sex[0]" required="required" index="0">
                                                <option></option>
                                                @foreach($gender as $keh => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {{ Form::text('dob[0]',null,['class'=>'form-control allowNumber','required'=>'required','maxlength'=>'4','id'=>'dob']) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            {{ Form::text('age[0]',null,['class'=>'form-control allowNumber age_g cal_edu​​​ cal_age cal_edu​​​ cal_child_0 txt_age age_0','id'=>'age_0','required'=>'required','maxlength'=>'3','id'=>'age']) }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group add_relationship">
                                            <select style="width: 100%" id="family_relationship_0" class="cal_edu form-control family_relationship" name="family_relationship[0]" required="required" readonly="readonly">
                                                <option></option>
                                                @foreach($relationship as $keh => $value)
                                                    <option @if($value->id == 1 || $value->id == 2)  @else disabled @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                     
                                    </td>
                                    <td>
                                        <div class="form-group add_occupation">
                                            <select style="width: 100%;" class="cal_edu form-control occupation" name="occupation[0]" required="required" id="occupation">
                                            <option></option>
                                                @foreach($occupation as $keh => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                       <div class="form-group add_education_level">
                                          <select style="width: 100%" id="education_level_0"  class="cal_edu form-control education_level aa age_g"  name="education_level[0]" required="required">
                                                <option></option>
                                                @foreach($education_level as $keh => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td class="my_hide"><input type="text" class="cal_edu txt_score edu_score_0 form-control" readonly=""></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" id="add_rows">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </a>
                                    </td>
                                       <script type="text/javascript">
                                            function count_small_age(){
                                                var small_age = 0;
                                                var my_id = $('.myrow').attr('index');
                                                   $('.txt_age').each(function(i){
                                                       var age = $(this).val();
                                                       if(age > 0 && (parseFloat(age) < 18)) small_age++;
                                                       // console.log(small_age);
                                                   });
                                                var ptsmall_age = small_age*2;
                                                $('#income_child_score').val(ptsmall_age);
                                            }
                                           $('.m_sex').change(function(){
                                                    var index= $(this).attr('index');
                                                    var val = $(this).val();
                                                    if(index == 0 && val == 1){
                                                        $(".family_relationship option[value='2']").attr('disabled',true);
                                                    }else {
                                                        $(".family_relationship option[value='2']").removeAttr('disabled');
                                                    }
                                                    if(index == 0 && val == 2){
                                                        $(".family_relationship option[value='1']").attr('disabled', true);
                                                    }else{
                                                        $(".family_relationship option[value='1']").removeAttr('disabled');
                                                    }
                                               $("#family_relationship_0").removeAttr("readonly");
                                               $("#family_relationship_0").select2({allowClear:true, placeholder: "ទំនាក់ទំនង"}).trigger('change');
                                               $("#family_relationship_0 > option").removeAttr("selected");
                                               $("#family_relationship_0").trigger("change");
                                           });
                                            var edu_row = 0;
                                           // $('.education_level').change(function(){
                                           //      var edu_level = $('#education_level').val();
                                           //      if( (edu_level>=1 && edu_level<=3) || (edu_level == 14) ){
                                           //         $('#edu_score').val(4);
                                           //      }else{$('#edu_score').val(0);}
                                           // });
                                           // $('.occupation').change(function(){
                                           //      var oc = $('#occupation').val();
                                           //      var level = $('#education_level_0').val();
                                           //      if( oc== 3){
                                           //         var occu = $('.occupation').hide();
                                           //         var dis = '<div class="form-group add_education_level">'+
                                           //                   '<select style="width: 100%" id="education_level_0"  class="cal_edu form-control education_level"  name="education_level[0]" required="required">'+
                                           //                        '<option></option>'+
                                           //                        '@foreach($education_level as $keh => $value)'+
                                           //                            '<option @if($value->id == 1 || $value->id == 2)  @else disabled @endif value="{{$value->id}}">{{$value->name_kh}}</option>'+
                                           //                        '@endforeach'+
                                           //                    '</select>'+
                                           //                '</div>';
                                           //          $('.add_education_level').append(dis);
                                           //      }
                                           //    });

                                           $('.cal_edu').change(function(){



                                               var myrow_ind = $('.myrow').attr('index');
                                               // var child = $('.child').val();
                                               // var edu = $('#education_level_'+myrow_ind).val();
                                               var relation = $('#family_relationship_'+myrow_ind).val();
                                               // var age = $('.age_'+myrow_ind).val();

                                                // if( ((relation == 1 || relation == 2) && (edu ==14 || (edu >=1 && edu <=3) )) || (age>=16 && (edu >=1 && edu <=3))){
                                                //      $('.edu_score_0').val(4);
                                                //  }else if( ((relation == 1 || relation == 2) && (edu ==14 || (edu >=4 && edu <=6)) ) || (age>=16 && (edu >=4 && edu <=6)) || (age<16 && edu==14) ){
                                                //      $('.edu_score_0').val(2.5);
                                                //  }
                                                //  else{ $('.edu_score_0').val(0);}

                                              $('.age_g').each(function (ind) {
                                                   var age = $('.age_'+ind).val();
                                                   var edu = $('#education_level_'+ind).val();
                                                   var relation = $(this).val();
                                                   // var rel = $(this).val();
                                                   var row_score = 0;
                                                    if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) || (age>16 && edu==14)  ){
                                                      row_score = 4;
                                                    }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu==14) ) {
                                                      row_score = 2.5;
                                                    }else{
                                                      row_score = 0;
                                                    }
                                                   $('.edu_score_'+ind).val(row_score);

                                                    var maxScore = $('.edu_score_0').val();
                                                   $('.txt_score').each(function(i){
                                                       var score = $(this).val();
                                                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                   });
                                                   $('#edu_score').val(maxScore);
                                               });

                                               $('.family_relationship').each(function (ind) {
                                                   var age = $('.age_'+ind).val();
                                                   var edu = $('#education_level_'+ind).val();
                                                   var relation = $(this).val();
                                                   // var rel = $(this).val();
                                                   var row_score = 0;
                                                   if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) || (age>16 && edu==14) ){
                                                      row_score = 4;
                                                    }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu==14) ) {
                                                      row_score = 2.5;
                                                    }else{
                                                      row_score = 0;
                                                    }
                                                   $('.edu_score_'+ind).val(row_score);

                                                    var maxScore = $('.edu_score_0').val();
                                                   $('.txt_score').each(function(i){
                                                       var score = $(this).val();
                                                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                   });
                                                   $('#edu_score').val(maxScore);
                                               });

                                               $('.education_level').each(function (ind) {
                                                   var age = $('.age_'+ind).val();
                                                   var edu = $('#education_level_'+ind).val();
                                                   var relation = $(this).val();
                                                   // var rel = $(this).val();
                                                   var row_score = 0;
                                                   if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) || (age>16 && edu==14) ){
                                                      row_score = 4;
                                                    }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu==14) ) {
                                                      row_score = 2.5;
                                                    }else{
                                                      row_score = 0;
                                                    }
                                                   $('.edu_score_'+ind).val(row_score);

                                                    var maxScore = $('.edu_score_0').val();
                                                   $('.txt_score').each(function(i){
                                                       var score = $(this).val();
                                                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                   });
                                                   $('#edu_score').val(maxScore);
                                               });

                                           });



                                           //* ============= step 2 ======================*//
                                           var dataRow = 2;
                                           $('#add_rows').click(function(){ //alert($m_id);
                                               edu_row++;
                                               var row = $('.new_rows tr.myrow').length;
                                               var totalPople = $('.new_rows tr.myrow').length+1;
                                               $('#total_people').val(totalPople);

                                               if(row >= 20){
                                                   // $('#add_rows').hide();
                                                   alert('ព័ត៌មានសំខាន់ៗអំពីសមាជិក​គ្រួសារ​ទាំងអស់មិនអនុញ្ញាតអោយបញ្ចូលលើសពីរការកំណត់ទេ');
                                                   return false;
                                               }

                                               // var rowindex = row+1;
                                               //console.log(dataRow);
                                               reOrder();
                                               var htmlstep2 = '<tr class="myrow" index="' + edu_row + '">' +
                                                   '<td>'+dataRow+'</td>' +
                                                   '<td><div class="form-group"><input autocomplete="off" type="text" required="required" class="hh-member form-control nick_name_'+edu_row+' nickname" name="nick_name[' + edu_row + ']"/></div></td>' +
                                                   '<td>' +
                                                   '<div class="form-group add_m_sex_' + edu_row + '">' +
                                                   '<select style="width: 100%" id="m_sex_' + edu_row + '" class="form-control m_sex"  name="m_sex[' + edu_row + ']" required="required" index="'+edu_row+'">' +
                                                   '<option></option>' +
                                                   '@foreach($gender as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                   '</select>' +
                                                   '</div>' +
                                                   '</td>' +
                                                   '<td><div class="form-group"><input autocomplete="off" maxlength="4" id="dob_' + edu_row + '"  type="text" required="required" class="hh-member dob form-control allowNumber" name="dob[' + edu_row + ']"/></div></td>' +
                                                   '<td><div class="form-group"><input autocomplete="off" maxlength="3" id="age_' + edu_row + '" type="text" required="required" class="cal_edu cal_age cal_child_'+edu_row+' txt_age age_g hh-member age age_'+edu_row+' form-control allowNumber" name="age[' + edu_row + ']"/></div></td>' +
                                                   '<td>' +
                                                   '<div class="form-group add_relationship_' + edu_row + '" id="status">' +
                                                   '<select id="family_relationship_' + edu_row + '" class="cal_edu hh-member form-control family_relationship"  name="family_relationship[' + edu_row + ']" readonly="readonly">' +
                                                   '<option></option>' +
                                                   '@foreach($relationship as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                   '</select>' +
                                                   '</div>' +
                                                   '</td>' +
                                                   '<td>' +
                                                   '<div class="form-group add_occupation_' + edu_row + '">' +
                                                   '<select id="occupation_' + edu_row + '" class="hh-member form-control occupation"  name="occupation[' + edu_row + ']" required="required">' +
                                                   '<option></option>' +
                                                   '@foreach($occupation as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                   '</select>' +
                                                   '</div>' +
                                                   '</td>' +
                                                   '<td>' +
                                                   '<div class="form-group add_education_level_' + edu_row + '">' +
                                                   '<select id="education_level_' + edu_row + '" class="cal_edu hh-member form-control education_level"  name="education_level[' + edu_row + ']" required="required">' +
                                                   '<option></option>' +
                                                   '@foreach($education_level as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                   '</select>' +
                                                   '</div>' +
                                                   '</td>' +
                                                   '<td class="my_hide"><input type="text" class="cal_edu txt_score edu_score_'+edu_row+' form-control" readonly></td>'+
                                                   '<td><a class="btn btn-danger btn-sm remove_rows_kh"><span class="glyphicon glyphicon-minus"></span></a></td>' +
                                                   '</tr>';
                                               $(".new_rows").append(htmlstep2);
                                               //ConfirmDelete();



                                               $('.cal_edu').change(function(){
                                                   var myrow_ind = $('.myrow').attr('index');
                                                   $('.age_g').each(function (ind) {
                                                       var age = $('.age_'+ind).val();
                                                       var edu = $('#education_level_'+ind).val();
                                                       var relation = $(this).val();
                                                       var row_score = 0;
                                                       if( ((relation == 1 || relation == 2) && ((edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) || (age>16 && edu==14) ){
                                                           row_score = 4;
                                                       }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu ==14) ) {
                                                           row_score = 2.5;
                                                       }else{
                                                           row_score = 0;
                                                       }
                                                       $('.edu_score_'+ind).val(row_score);
                                                       var maxScore = $('.score_animal_'+myrow_ind).val();
                                                       $(".txt_score").each(function(i){
                                                           var score = $(this).val();
                                                           if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                       });
                                                       $('#edu_score').val(maxScore);
                                                   });

                                                   $('.family_relationship').each(function (ind) {
                                                       var age = $('.age_'+ind).val();
                                                       var edu = $('#education_level_'+ind).val();
                                                       var relation = $(this).val();
                                                       var row_score = 0;
                                                       if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) || (age>16 && edu==14) ){
                                                           row_score = 4;
                                                       }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu==14) ) {
                                                           row_score = 2.5;
                                                       }else{
                                                           row_score = 0;
                                                       }
                                                       $('.edu_score_'+ind).val(row_score);
                                                       var maxScore = $('.edu_score_'+myrow_ind).val();
                                                       $(".txt_score").each(function(i){
                                                           var score = $(this).val();
                                                           if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                       });
                                                       $('#edu_score').val(maxScore);
                                                   });
                                                   $('.education_level').each(function (ind) {
                                                       var age = $('.age_'+ind).val();
                                                       var edu = $('#education_level_'+ind).val();
                                                       var relation = $(this).val();
                                                       var row_score = 0;
                                                       if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) || (age>16 && edu==14) ){
                                                           row_score = 4;
                                                       }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu==14) ) {
                                                           row_score = 2.5;
                                                       }else{
                                                           row_score = 0;
                                                       }
                                                       $('.edu_score_'+ind).val(row_score);
                                                       var maxScore = $('.edu_score_'+myrow_ind).val();
                                                       $(".txt_score").each(function(i){
                                                           var score = $(this).val();
                                                           if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                       });
                                                       $('#edu_score').val(maxScore);
                                                   });

                                               });

                                               dataRow++;
                                              // $(".family_relationship").select2({allowClear:true, placeholder: "ទំនាក់ទំនង"});
                                               $(".m_sex").select2({allowClear:true, placeholder: 'ភេទ'});
                                               $(".occupation").select2({allowClear:true, placeholder: "មុខរបរ"});
                                               $(".education_level").select2({ allowClear:true, placeholder: "កម្រិតវប្បធម៌"});
                                               AllowNumber();
                                               var row_num = $('.new_rows tr').length;

                                               $('.age').change(function () {
                                                   for(var ii=1; ii<row_num; ii++) {
                                                       var age = Number($('#age_'+ii).val());
                                                       var currentyear = (new Date()).getFullYear();
                                                       var dob = currentyear-age;
                                                       if(age >= 150){
                                                           $('#dob_'+ii).val('');
                                                       }else{
                                                           $('#dob_'+ii).val(dob);
                                                       }
                                                   }
                                               });
                                               $('.dob').change(function () {
                                                   for(var ii=1; ii<row_num; ii++) {
                                                       var dob = Number($('#dob_' + ii).val());
                                                       var currentyear = (new Date()).getFullYear();
                                                       var age = currentyear - dob;
                                                       if (dob >= currentyear || age >= 150) {
                                                           $('#age_' + ii).val('');
                                                       }
                                                       else {
                                                           $('#age_' + ii).val(age);
                                                       }
                                                   }
                                               });

                                               $(".cal_edu").change(function(e){
                                                   for(var ii=1; ii<row_num; ii++) {
                                                       var nic  = $(".nick_name_"+ii).val();
                                                       var msex = $("#m_sex_"+ii).val();
                                                       var ag   = $("#age_"+ii).val();
                                                       var fal  = $("#family_relationship_"+ii).val();
                                                       var op   = $("#occupation_"+ii).val();
                                                       var ed   = $("#education_level_"+ii).val();

                                                       if ((nic != '' && msex != '' && ag != '' && fal != '' && op != '' && ed != '')) {
                                                           $('#add_rows').removeAttr("disabled", true);
                                                       }
                                                   }
                                               });

                                               $('.m_sex').change(function(){
                                                   var index= $(this).attr('index');
                                                   $(".family_relationship").removeAttr("readonly");
                                                   var val = $(this).val();
                                                   for(var ii=1; ii<row_num; ii++) {

                                                       if (index == ii && val == 1) {
                                                           $("#family_relationship_"+ii+" option[value='2']").attr('disabled', true);
                                                       } else {
                                                           $("#family_relationship_" + ii + " > option").removeAttr("disabled");
                                                       }
                                                       if (index == ii && val == 2) {
                                                           $("#family_relationship_"+ii+" option[value='1']").attr('disabled', true);
                                                       } else {
                                                           $("#family_relationship_"+ii+ " option[value='1']").removeAttr('disabled');
                                                       }

                                                       if ((index == ii && val == 1)) {
                                                           $("#family_relationship_"+ii+" > option").removeAttr("selected");
                                                           //console.log(index+'_'+ii);
                                                           $("#family_relationship_"+ii).trigger("change");
                                                           $("#family_relationship_"+ii+" option[value='1']").removeAttr('disabled');
                                                           $("#family_relationship_"+ii).select2({allowClear:true, placeholder: 'ទំនាក់ទំនង'}).trigger('change');
                                                       }
                                                       if ((index == ii && val == 2)) {
                                                           $("#family_relationship_"+ii+" > option").removeAttr("selected");
                                                           //console.log(index+'='+ii+'_'+val+'=2');
                                                           $("#family_relationship_"+ii).trigger("change");
                                                           $("#family_relationship_"+ii+ " option[value='2']").removeAttr('disabled');
                                                           $("#family_relationship_"+ii).select2({allowClear:true, placeholder: 'ទំនាក់ទំនង'}).trigger('change');
                                                       }
                                                   }

                                               });

                                               $('#add_rows').attr("disabled", true);

                                           });



                                           $('#age').change(function(e) {

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

                                                   //if (num[n] == '.') result += '.';
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

                                               var dob = '';
                                               var age = result;
                                               var currentyear = (new Date()).getFullYear();
                                               dob = currentyear-age;

                                               if(age >= 160 || age < 1){
                                                   $('#dob').val('');
                                               }else{
                                                   $('#dob').val(dob);
                                               }
                                           });
                                           $('#dob').change(function(e) {
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

                                                   //if (num[n] == '.') result += '.';
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

                                               var age = '';
                                               var dob = result;
                                               var currentyear = (new Date()).getFullYear();
                                               age = currentyear-dob;
                                               if(dob >= currentyear || age >= 160 || age < 1){
                                                   $('#age').val('');
                                               }
                                               else{
                                                   $('#age').val(age);
                                               }
                                           });


                                           function reOrder(){
                                               for(var n=2;n<(dataRow-1);n++){
                                                   $('.new_rows  tr:eq(' + (n-1) +') td:first-child').html(n);
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .nickname').attr('name', 'nick_name['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .nickname').attr('class', 'hh-member form-control nickname nick_name_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .dob').attr('name', 'dob['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .dob').attr('id', 'dob_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .age').attr('name', 'age['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .age').attr('id', 'age_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .family_relationship').attr('name', 'family_relationship['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .m_sex').attr('name', 'm_sex['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .m_sex').attr('index', (n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .m_sex').attr('id', 'm_sex_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .family_relationship').attr('id', 'family_relationship_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td #status').attr('class', 'form-group add_relationship_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .occupation').attr('name', 'occupation['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .occupation').attr('id', 'occupation_'+(n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .education_level').attr('name', 'education_level['+(n-1)+']');
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .education_level').attr('id', 'education_level_'+(n-1));
                                                   $('.new_rows  tr.myrow:eq(' + (n-1) +')').attr('index', (n-1));
                                                   $('.new_rows  tr:eq(' + (n-1) +') td .txt_score').attr('class', 'txt_score form-control edu_score_'+(n-1));
                                               }
                                           }
                                           //remove add
                                           $(".new_rows").on('click','.remove_rows_kh',function(e){
                                               $('#add_rows').removeAttr("disabled", true);
                                               var result = window.confirm('Are you sure?');
                                               if (result == false) {
                                                   e.preventDefault();
                                                   return false;
                                               }
                                               $('#add_rows').show();
                                               $(this).parent().parent().remove();
                                               // console.log(dataRow);
                                               reOrder();
                                               dataRow--;
                                               edu_row--;
                                           });



                                           //occupation
                                           $(".m_sex").select2({
                                               allowClear:true,
                                               placeholder: 'ភេទ'
                                           });
                                           //occupation
                                           $(".occupation").select2({
                                               allowClear:true,
                                               placeholder: 'មុខរបរ'
                                           });
                                           //education
                                           $(".education_level").select2({
                                               allowClear:true,
                                               placeholder: 'កម្រិតវប្បធម៌'
                                           });
                                        </script>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="my_hide">
                                    <td colspan="7"><b style="float: right;">10.  ការអប់រំ (មើលចម្លើយនៅក្នុងតារាងផ្នែក ខ)</b></td>
                                    <td>
                                        <div class="form-group input-group">
                                           <input autocomplete="off" id="edu_score"  type="text" required="required" class="cal_edu form-control allowNumber" name="edu_score"​​ readonly="readonly" /><span class="input-group-addon">ពិន្ទុ</span>
                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- <div class="col-sm-12"><hr> </div> -->
                    </div>
                    <div class="col-sm-12 form-group">
                        <button id="step2Next" class="btn btn-primary  pull-right" type="button" >រក្សាទុក និង ជំហានបន្ទាប់</button>
                    </div>  
                </div>
                
            </div>
        </div>


        <?php /* ===========================================
            ===========================================
            --------------- step3 ---------------------
            ===========================================
            =========================================== */ ?>

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
                                                 ​<input class="household_family_id" type="radio" name="household_family_id"  value="{{ $h->id }}">  {{$h->name_kh}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                                <div id="household_family_id" class="col-sm-6"></div>
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
                                                        '<input class="form-control-custome form-control" type="text" placeholder="ឈ្មោះស្ថាប័ន" name="institutions_name" autocomplete="off" required="required">'+
                                                    '</td>' +
                                                     '<td>' +
                                                        '<input maxlength="10" class="allowNumber form-control-custome form-control" type="text" placeholder="លេខទូរសព្ទ" name="instatutions_phone" autocomplete="off" required="required">'+
                                                     '</td>' +
                                                 '</tr>'+
                                             '</table>');
                                         AllowNumber();
                                     }else if(houshold == 2){
                                         $('#home-rent').append('<h4>គ.៨) សម្រាប់គ្រួសារជួលផ្ទះគេ​ <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="សម្រាប់គ្រួសារមានផ្ទះផ្ទាល់ខ្លួន ឬ ​ នៅជាមួយគេដោយអត់បង់ថ្លៃ មិនបាច់បំពេញចំណុច គ៨ ហើយរំលងទៅ គ៩"></a></h4>' +
                                             '<div class="col-sm-6">' +
                                                 '<table width="100%">' +
                                                     '<tr>'+
                                                         '<td width="50%">' +
                                                            '<label class="control-label"> តើថ្លៃជួលប្រចាំខែជាមធ្យមប៉ុន្មាន?: </label>' +
                                                         '</td>' +
                                                         '<td width="50%">' +
                                                             '<div class="form-group input-group">' +
                                                                '<input autocomplete="off" id="price" type="text" required="required" class="cal form-control allowNumber" name="rent_fee"/><span class="input-group-addon">រៀល</span>' +
                                                             '</div>' +
                                                         '</td>' +
                                                     '</tr>' +
                                                     '<tr class="my_hide">'+
                                                        '<td width="50%">' +
                                                           '<label class="control-label"> គ្រួសារដែលនៅផ្ទះជួលគេ 3B</label>' +
                                                        '</td>' +
                                                        '<td width="50%">' +
                                                            '<div class="form-group input-group">' +
                                                               '<input autocomplete="off" id="r_score"  type="text" required="required" class="cal form-control allowNumber" name="price_rent_house_score"​​ readonly/><span class="input-group-addon">ពិន្ទុ</span>' +
                                                            '</div>' +
                                                        '</td>' +
                                                    '</tr>' +
                                                 '</table>' +
                                             '</div>');
                                             //3B គ្រួសារដែលនៅផ្ទះជួលគេតម្លៃជួលផ្ទះ (ប្រើសម្រាប់តែគ្រួសារដែលជួលផ្ទះគេ)    
                                                $('.cal').change(function(){
                                                    var person = $('#total_people').val();
                                                    var price = $('#price').val();
                                                    if( ((person>=1 && person <=3) && (price>=1 && price <=80000)) || ((person >=4 && person <=6) && (price>=1 && price <=120000)) || ((person >=7 && person <= 10) && (price>=1 && price <=180000)) || ((person>10)&&(price>=1 && price<=240000)) )
                                                    {
                                                        $('#r_score').val(16);
                                                    }
                                                    else if( ((person>= 1 && person <=3) && (price>80000 && price<=160000)) || ((person>=4 && person<=6)&&(price>120000 && price<=200000)) || ((person>=7 && person<=10)&&(price>180000 && price<=280000)) || ((person>10)&&(price>240000 && price<=340000)) ){
                                                        $('#r_score').val(11);
                                                    }
                                                    else if( ((person>= 1 && person <=3) && (price>160000 && price<=200000)) || ((person>=4 && person<=6)&&(price>200000 && price<=240000)) || ((person>=7 && person<=10)&&(price>280000 && price<=340000)) || ((person>10)&&(price>340000 && price<=400000)) ){
                                                        $('#r_score').val(5);
                                                    }
                                                    else{
                                                        $('#r_score').val(0);
                                                    }
                                                });
                                         AllowNumber();
                                     }else if(houshold == 1 || houshold == 3){

                                         var household_area = '<div class="col-sm-12">' +
                                             '<h4> គ.៣ តើ​ផ្ទៃ​ក្រឡា​ទីលំនៅរបស់ក្រុម​គ្រួសារ ​មាន​ចំនួន​ប៉ុន្មាន​ម៉ែត្រ​ក្រឡា​?​</h4>' +
                                                 '<table class="tb_grid table table-bordered table-striped tbl-floor" style="width:100%;">' +
                                                     '<tbody>' +
                                                         '<tr>' +
                                                            '<td><b>ផ្ទះជាន់ក្រោម៖</b></td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                    '<input autocomplete="off" id="ground_floor_length" class="calculate form-control allowFlot ground_floor"  placeholder="បណ្តោយ" type="text" name="ground_floor_length">' +
                                                                    '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                    '<input autocomplete="off" id="ground_floor_width" class="calculate form-control allowFlot ground_floor"  placeholder="ទទឹង" type="text" name="ground_floor_width">' +
                                                                    '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="ground_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="ground_floor_area" readonly="readonly">' +
                                                                    '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                         '</tr>' +
                                                         '<tr>' +
                                                            '<td><b>ផ្ទះជាន់លើ(បើមាន)៖</b></td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="upper_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text" name="upper_floor_length">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="upper_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="upper_floor_width">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="upper_floor_area" class="calculate form-control allowFlot"  placeholder="ផ្ទៃ" type="text" name="upper_floor_area" readonly="readonly">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                         '</tr>' +
                                                         '<tr>' +
                                                            '<td><b>សំណង់បន្ថែម ឧ. ផ្ទះបាយ... (បើមាន)៖ </b></td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="further_floor_length" class="calculate form-control allowFlot" placeholder="បណ្តោយ" type="text"  name="further_floor_length">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                                                '</div>' +
                                                             '</td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="further_floor_width" class="calculate form-control allowFlot"  placeholder="ទទឹង" type="text" name="further_floor_width">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រ</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" id="further_floor_area" class="calculate form-control allowFlot" required="required" placeholder="ផ្ទៃ" type="text" name="further_floor_area" readonly="readonly">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រក្រឡា</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                         '</tr>' +
                                                         '<tr>' +
                                                            '<td colspan="3"><b style="float:right;">ផ្ទៃកម្រាលសរុប :</b></td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input readonly="readonly" autocomplete="off" id="total_area" name="total_area" class="calculate form-control allowFlot"  placeholder="ផ្ម៉ែត្រក្រឡា..." type="text">' +
                                                                     '<span class="input-group-addon">ម៉ែត្រ​ក្រឡា</span>' +
                                                                 '</div>' +
                                                             '</td>' +
                                                         '</tr>' +
                                                         '<tr class="my_hide">' +
                                                            '<td colspan="3"><b style="float:right;">1. អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ :</b></td>' +
                                                             '<td>' +
                                                                 '<div class="form-group input-group">' +
                                                                     '<input autocomplete="off" type="hidden" id="a_score1" name="size_member_score" class="calculate form-control  allowFlot"​ required="required" readonly="readonly">' +
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
                                                                        '<option value="{{$value->id}}">{{$value->name_kh}}</option>' +
                                                                     '@endforeach'+
                                                                 '</select>' +
                                                             '</div>' +
                                                         '</td>'+
                                                         '<td>' +
                                                             '<div class="form-group add_r_status">' +
                                                                 '<select class="cal_roof form-control r_status" id="r_status" name="roof_status">' +
                                                                    '<option></option>@foreach($house_status as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
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

                                            var building_year = '<div class="col-sm-12">' +
                                                    '<table class="table-home table table-bordered table-striped">' +
                                                    '<thead>' +
                                                        '<tr>' +
                                                            '<th>ផ្ទះសាងសង់នៅឆ្នាំណា? <spand class="text-danger">*</spand></th>' +
                                                            '<th>តើធ្លាប់ជួសជុលឬទេ? <spand class="text-danger">*</spand></th>' +
                                                        '</tr>' +
                                                    '</thead>'+
                                                        '<tr>' +
                                                            '<td width="30%">' +
                                                                '<div class="add_huild_year">' +
                                                                    '<select name="h_build_year" id="year_select" style="width: 100%;" name="build_in">\n'+
                                                                        '<option></option>' +
                                                                        '@php $currentYear = date('Y'); @endphp  @foreach (range(1950, $currentYear) as $value) <option value="{{$value}}">{{$value}}</option> @endforeach' +
                                                                    '</select>' +
                                                                '</div>' +
                                                            '</td>' +
                                                            '<td width="70%">' +
                                                                '<div class="add_home_prepare">' +
                                                                    '<ul class="li-none">' +
                                                                        '@foreach($homePrepar as $key =>$p)' +
                                                                            '<li>' +
                                                                                '<label><input style="margin-right: 10px;" class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>' +
                                                                                '@if($p->id == 2)<label id="homeyear"></label>@endif' +
                                                                            '</li>' +
                                                                        '@endforeach'+
                                                                    '</ul>' +
                                                                '</div>'+
                                                            '</td>'+
                                                        '</tr>' +
                                                    '</table>'+
                                                '</div>';
                                                var home_preparing = '<h5>- តើធ្លាប់ជួសជុលឬទេ?</h5>' +
                                                   '<div class="add_home_prepare"><ul class="li-none">' +
                                                       '@foreach($homePrepar as $key =>$p)'+
                                                            '<li>' +
                                                                '<label><input class="homeyear" type="radio" name="home_prepare" value="{{$p->id}}"> {{$p->name_kh}}</label>' +
                                                                '@if($p->id == 2)<label id="homeyear"></label>@endif' +
                                                            '</li>' +
                                                        '@endforeach'+
                                                    '</ul></div>';

                                        // $('#home-preparing').append(home_preparing);
                                         $('#building-year').append(building_year);
                                         $('#home-yourself').append(homeyourselt);


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
                                                                    '@foreach($wall_made as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach' +
                                                                 '</select>' +
                                                             '</div>' +
                                                         '</td>' +
                                                         '<td>'+
                                                             '<div class="form-group add_h_status">'+
                                                                 '<select class="cal_wall form-control h_status" id="h_status" name="walls_status">'+
                                                                    '<option></option>'+
                                                                    '@foreach($house_status as $keh => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach'+
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
                                                        '<label><input style="margin-right:10px;" class="condition_house" type="radio" name="condition_house" ​ value="{{$c->id}}" > {{$c->name_kh}}</label>' +
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
                        <script type="text/javascript">
                         
                        </script>
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

                        <div id="household_area"></div>

                        <div class="col-sm-12">
                            <h4> គ.៤ បង្គន់</h4>

                            <div class="add_toilet">
                                <h5>តើគ្រួសាររបស់អ្នកមានបង្គន់ប្រើដែរឬទេ? <spand class="text-danger">*</spand></h5>
                                <ul class="li-none">
                                    @foreach($question_totel as $key =>$val)
                                        <li>
                                            <label><input style="margin-right:10px;" class="tolet" type="radio" name="tolet"  value="{{$val->id}}"> {{$val->name_kh}} </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div id="tolet"></div>
                            <label class="my_hide">បង្គន់អនាម័យ </label>
                            <div class="my_hide form-group input-group add_total_people" style="width: 300px;">
                               <input readonly="readonly" id="toilet_score" type="text" name="toilet_score" class="form-control allowNumber"​>
                               <span class="input-group-addon">ពិន្ទុ</span>
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


                            <div class="row" id="building-year"></div>

                        </div>



                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6" id="home-yourself"></div>
                                <div class="col-sm-6" id="home-ke"></div>
                            </div>
                        </div>
                        <div class="col-sm-12" id="general-status"></div>

                        <div class="col-sm-12"><hr> </div>
                            <div class="col-sm-12" id="home-rent"></div>

                            <div>
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
                                            <tr class="myrow_1">
                                                <td>1</td>
                                                <td>
                                                    <div class="form-group add_type_meterial">
                                                        <select class="form-control type_meterial" id="type_meterial" name="type_meterial[0]">
                                                            <option></option>
                                                            @foreach($typemeterial as $keh => $value)
                                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="number_meterial" name="number_meterial[0]" type="text" class="cal_el form-control allowNumber meterial" required="required" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input id="market_value_meterial" name="market_value_meterial[0]" type="text"  class="cal_el form-control allowNumber meterial" required="required" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input id="total_rail_meterial" name="total_rail_meterial[0]" type="text" required="required" class="cal_el form-control totalallowNumber_meterial"  readonly="readonly"/>
                                                        <span class="input-group-addon">រៀល</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a  class="btn btn-primary btn-sm" id="add_rows_1">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td colspan="4"><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
                                                <td>
                                                    <div class="form-group input-group">
                                                        <input id="total_meterial_costs" name="total_meterial_costs" type="text" required="required" class="cal_el form-control" readonly="readonly"/>
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
                            </div>

<script>
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
//        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which > 57)) {
//            event.preventDefault();
//        }
    });
    var dataRow_meterial = 2;
    $('#add_rows_1').click(function(){ //alert($m_id);
        var row_1 = $('.new_rows_1 tr.myrow_1').length;
//        if(row_1 >= 6){
//            // $('#add_rows_1').hide();
//            alert('ប្រភេទសម្ភារប្រើបា្រស់​របស់​គ្រួសារមិនអនុញ្ញាតអោយបញ្ចូលលើសពីរការកំណត់ទេ');
//            return false;
//        }
        reOrder_meterial();
        // var rowindex_1 = row_1+1;
        var tab_rows_1 ='<tr class="myrow_1">'+
            '<td>'+dataRow_meterial+'</td>'+
            '<td>' +
            '<div class="form-group add_type_meterial_'+row_1+'">'+
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
        $(".type_meterial").select2({ allowClear:true, placeholder: "សម្ភារប្រើបា្រស់"});
        AllowNumber();
        var row_num = $('.new_rows_1 tr').length;



        $('.cal_el').change(function(){
            var total = $('#total_meterial_costs').val();
            //  alert(total);
        });
        $('.meterial').change(function () {
            for(var i=1; i<row_num; i++) {
                var sum = 0;
                var number_meterial = $('#number_meterial_'+i).val();
                var market_value_meterial = $('#market_value_meterial_'+i).val();
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
        for(var n=2;n<(dataRow_meterial-1);n++){
            $('.new_rows_1  tr:eq(' + (n-1) +') td:first-child').html(n);
            $('.new_rows_1  tr:eq(' + (n-1) +') td .type_meterial').attr('name', 'type_meterial['+(n-1)+']');
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
    });
    $('.meterial').change(function () {
        var sum = 0;
        var number_meterial = $('#number_meterial').val();
        var market_value_meterial = $('#market_value_meterial').val();
        $('.meterial').each(function() {sum = Number(number_meterial * market_value_meterial);});
        $('#total_rail_meterial').val(sum);

        $('.cal_el').change(function(){
            var total = $('#total_meterial_costs').val();
            if( total>=0 && total <=400000) { $('#el_score').val(6); }
            else if( total>=404000 && total<=800000 ){ $('#el_score').val(4);}
            else if( total>=804000 && total<= 1200000){ $('#el_score').val(2);}
            else{ $('#el_score').val(0); }
        });
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


</script>

                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">

                            <h4>គ.១០) អគ្គិសនី</h4>
                            <p>តើបានតបណ្តាញអគ្គិសនី (រដ្ឋឬឯកជន) ដែរឬទេ? <spand class="text-danger">*</spand></p>
                            <div>
                                <ul class="li-none">
                                    @foreach($question_electric as $key => $qe)
                                        <li class="add_q_electric">
                                            <label><input style="margin-right:10px;"  class="electric" value="{{$qe->id}}" type="radio" name="q_electric" ??> {{$qe->name_kh}}</label>
                                        </li>
                                        @if($qe->id == 1) <li id="electric_yes"></li> @endif
                                        @if($qe->id == 2) <li id="electric_no"></li> @endif
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
                                                '<td><div class="input-group form-group"><input autocomplete="off" class="cal_t form-control allowNumber myelectric" id="costs_in_hour" required="required" type="text" name="costs_in_hour" required="required"><span class="input-group-addon">រៀល</span></div></td>'+
                                                '<td><div class="input-group form-group"><input autocomplete="off" class="cal_t form-control allowNumber myelectric" id="number_in_month" required="required" type="text" name="number_in_month" required="required"><span class="input-group-addon">គីឡូវ៉ាត់</span></div></td>'+
                                                '<td><div class="input-group form-group"><input autocomplete="off" class="cal_t form-control allowNumber" id="costs_per_month" required="required" type="text" name="costs_per_month" readonly="readonly"><span class="input-group-addon">រៀល</span></div></td>'+
                                            '</tr>'+
                                            '<tr class="my_hide">'+
                                                '<td></td>'+
                                                '<td></td>'+
                                                '<td><div class="input-group form-group"><input autocomplete="off" class="cal_t form-control allowNumber" id="cost_score" required="required" type="text" name="use_energy_elect_score" readonly="readonly"><span class="input-group-addon">ពិន្ទុ</span></div></td>'+
                                            '</tr>'+
                                            '</table>');
                                        AllowNumber();
                                        $('.cal_t').change(function(){
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
                                        $('#electric_no').append('<p>ប្រសិនមិនបានតបណ្តាញអគ្គិសនី</p><div class="add_electric_grid"><ul class="li-none">@foreach($electricgrid as $key=>$e)<li><label><input style="margin-right:10px;" class="electric_grid_id" value="{{$e->id}}" type="radio" name="electric_grid_id" ​​> {{$e->name_kh}}</label></li>@endforeach</ul></div>'+'<div class="my_hide form-group input-group" style="width: 300px;">'+
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
                            </script>

                        </div>


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
                                                        <option value="{{$value->id}}">{{$value->name_kh}}</option>
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
                            <tr class="myrow_2">
                                <td>1</td>
                                <td>
                                    <div class="form-group add_type_vehicle">
                                        <select class="form-control type_vehicle" id="type_vehicle" name="type_vehicle[0]">
                                            <option></option>
                                            @foreach($typetransport as $keh => $value)
                                                <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input id="number_vehicle" name="number_vehicle[0]" type="text" class="form-control allowNumber vehicle cal_v" required="required" />
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input id="market_value_vehicle" name="market_value_vehicle[0]" type="text" class="form-control allowNumber vehicle cal_v" required="required" />
                                        <span class="input-group-addon">រៀល</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group input-group">
                                        <input id="total_rail_vehicle" name="total_rail_vehicle[0]" type="text" required="required" class="form-control totalallowNumber_vehicle" readonly="readonly"/>
                                        <span class="input-group-addon">រៀល</span>
                                    </div>
                                </td>
                                <td>
                                    <a  class="btn btn-sm btn-primary" id="add_rows_2"><span class="glyphicon glyphicon-plus"></span></a>
                                </td>
                            </tr>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="4"><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id="total_vehicle_costs" name="total_vehicle_costs" type="text" required="required" class="form-control vehicle cal_v" readonly="readonly"/>
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

                <div class="step3-section-3">
                    <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4>គ.១២) ចំណូល</h4>
                            <h5><b>គ.១២.១) ចំណូល​ ពីសកម្មភាពកសិកម្ម ផ្ទាល់ខ្លួន</b></h5>
                            <h5><b>គ.១២.១.១) ការចិញ្ចឹមសត្វ</b></h5>
                            <table class="tb_grid table table-bordered table-striped" width="100%">
                                <thead>
                                <tr>
                                    <th>ល.រ</th>
                                    <th width="20%">ប្រភេទសត្វ <spand class="text-danger">*</spand></th>
                                    <th></th>
                                    <th width="20%">កំណត់សម្គាល់ <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="បញ្ជាក់ បើសិនជាសត្វប្រវាស់គេ"></a></th>
                                    <th class="my_hide">ពិន្ទុ</th>
                                    <th width="10%">សកម្មភាព</th>
                                </tr>
                                </thead>
                                <tbody class="new_rows_3">
                                <tr class="myrow_3" index="0">
                                    <td class="auto_id">1</td>
                                    <td>
                                        <div class="form-group add_type_animals">
                                            <select style="width: 100%;" class="0 form-control type_animals1" id="type_animals" name="type_animals[0]" required="required" index="0">
                                                <option></option>
                                                @foreach($typeanimals as $key => $value)
                                                    <option value="{{$value->id}}">{{$value->name_kh}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                  
                                    <td id="num_animals_0" class="add_ajust_animals">
                                        <table class="table table-bordered" align="center">
                                            <tr>
                                                <th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>
                                                <th>ចំនួនកូនសត្វ</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <input name="num_animals[0]" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />
                                                        <input name="num_animals_big[0]" id="num_animals_big" type="text" class="cal_animal form-control allowNumber" required="required" />
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input name="num_animals_small[0]" id="num_animals_small" type="text" class="cal_animal form-control allowNumber"  />
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>

                                    <td>
                                        <div class="form-group ng" id="noted_0">
                                            <select style="width: 100%;" class="cal_animal form-control note_animals" id="note_animals" name="note_animals[0]" required="required" index="0">
                                                <option></option>
                                                <option value="ប្រវាស់">ប្រវាស់</option>
                                                <option value="មិនប្រវាស់">មិនប្រវាស់</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="my_hide">
                                      <div class="form-group input-group">
                                            <input id="score_animal_0" name="animal_score" type="text" required="required" class="cal_animal txt_score_animal score_animal_0 form-control" readonly="readonly"/>
                                            <span class="input-group-addon">ពិន្ទុ</span>
                                      </div>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" id="add_rows_3"><span class="glyphicon glyphicon-plus"></span></a>
                                    </td>
                                </tr>
                                  <script type="text/javascript">
                                      var numRow = 0;
                                      $('#type_animals').on("change", function(e){
                                          var type = this.value;
                                          var index= $(this).attr('index');
                                          //$('#num_animals').empty();
                                            if(index == 0 && type == 2){
                                                var duk = '<table class="table table-bordered">' +
                                                        '<tr>' +
                                                            '<th>ចំនួនសត្វ <spand class="text-danger">*</spand></th>' +
                                                        '</tr>' +
                                                        '<tr>'+
                                                            '<td>' +
                                                                '<div class="form-group">'+
                                                                    '<input name="num_animals[0]" id="num_animals" type="text" class="cal_animal form-control allowNumber num_animals" />' +
                                                                    '<input autocomplete="off" name="num_animals_big[0]" id="num_animals_big" type="hidden" class="cal_animal form-control allowNumber" required="required" />' +
                                                                    '<input autocomplete="off" name="num_animals_small[0]" id="num_animals_small" type="hidden" class="cal_animal form-control allowNumber"  />'+
                                                                '</div>' +
                                                            '</td>' +
                                                        '</tr>'+
                                                    '</table>';
                                                var noted = '<input autocomplete="off" name="note_animals[0]" type="text" class="cal_animal form-control" />';
                                                $('#num_animals_0').html(duk);
                                                $('#noted_0').html(noted);
                                                AllowNumber();

                                                $('.cal_animal').change(function(){
                                                  var myrow_ind = $('.myrow_3').attr('index');
                                                  var num = $('#num_animals').val();
                                                  var answer = 0;
                                                  if( num>=0 && num < 3){
                                                    //$('#animal_score').val(4);
                                                     answer = 4;
                                                  }else{
                                                     answer = 0;
                                                  }
                                                  $('.score_animal_0').val(answer);
                                                  var maxScore = $('.score_animal_0').val();
                                                   $(".txt_score_animal").each(function(i){
                                                       var score = $(this).val();
                                                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                   });
                                                   $('#score_animal_total').val(maxScore);
                                                });
                                            }else if(index == 0 && type == 1){
                                                var cow = '<table class="table table-bordered" align="center">' +
                                                          '<tr>' +
                                                              '<th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>' +
                                                              '<th>ចំនួនកូនសត្វ</th>' +
                                                          '</tr>' +
                                                          '<tr>' +
                                                              '<td>' +
                                                                  '<div class="form-group">' +
                                                                      '<input name="num_animals[0]" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"/>' +
                                                                      '<input autocomplete="off" name="num_animals_big[0]" id="num_animals_big" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                                                                  '</div>' +
                                                              '</td>' +
                                                              '<td>' +
                                                                  '<div class="form-group">' +
                                                                      '<input autocomplete="off" name="num_animals_small[0]" id="num_animals_small" type="text" class="cal_animal form-control allowNumber"  />' +
                                                                  '</div>' +
                                                              '</td><input autocomplete="off" name="note_animals[0]" type="hidden" class="cal_animal form-control"  />' +
                                                          '</tr>' +
                                                      '</table>';
                                                var noted = '<select style="width: 100%;" class="cal_animal form-control note_animals" id="note_animals" name="note_animals[0]" required="required">' +
                                                    '<option></option>' +
                                                    '<option value="ប្រវាស់">ប្រវាស់</option>' +
                                                    '<option value="មិនប្រវាស់">មិនប្រវាស់</option>' +
                                                    '</select>';
                                                $('#num_animals_0').html(cow);
                                                $('#noted_0').html(noted);
                                                $(".note_animals").select2({ allowClear:true, placeholder: "កំណត់សម្គាល់"});
                                                AllowNumber();

                                                $(".cal_animal").change(function(){
                                                  var myrow_ind = $('.myrow_3').attr('index');

                                                  var big = parseInt($("#num_animals_big").val());
                                                  var small = parseInt($("#num_animals_small").val());
                                                  var status = $("#note_animals").val();
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

                                                  $('.score_animal_0').val(score);
                                                  var maxScore = $('.score_animal_0').val();
                                                   $(".txt_score_animal").each(function(i){
                                                       var score = $(this).val();
                                                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                   });
                                                   $('#score_animal_total').val(maxScore);
                                                });
                                            }else if(index == 0 && type == 3){
                                              var hend = '<table class="table table-bordered">' +
                                                        '<tr>' +
                                                            '<th>ចំនួនសត្វ <spand class="text-danger">*</spand></th>' +
                                                        '</tr>' +
                                                        '<tr>'+
                                                            '<td>' +
                                                                '<div class="form-group">'+
                                                                    '<input name="num_animals[0]" id="hend" type="text" class="cal_animal form-control allowNumber num_animals" />' +
                                                                '</div>' +
                                                            '</td>' +
                                                        '</tr>'+
                                                    '</table>';
                                                var noted = '<input autocomplete="off" name="note_animals[0]" type="text" class="cal_animal form-control" />';
                                                $('#num_animals_0').html(hend);
                                                $('#noted_0').html(noted);
                                                AllowNumber();

                                                $(".cal_animal").change(function(){
                                                  var myrow_ind = $('.myrow_3').attr('index');

                                                  var hend = $("#hend").val();
                                                  var score = 0;
                                                  if(hend>=0 && hend<30){
                                                     score = 6;
                                                  }else if(hend >=30 && hend<50){
                                                      score=4;
                                                  }else{
                                                      score=0;
                                                  }
                                                  $('.score_animal_0').val(score);
                                                  var maxScore = $('.score_animal_0').val();
                                                   $(".txt_score_animal").each(function(i){
                                                       var score = $(this).val();
                                                       if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                                                   });
                                                   $('#score_animal_total').val(maxScore);
                                                });
                                            }

                                      });
                                    </script>
                            </tbody>
                                <tr class="my_hide">
                                    <td></td>
                                    <td colspan="3"><b style="float:right">7.A.1 ការចិញ្ចឹមសត្វ</b></td>
                                    <td>
                                        <div class="form-group input-group">
                                            <input id="score_animal_total" name="animal_score" type="text" required="required" class="form-control cal_animal" readonly="readonly"/>
                                            <span class="input-group-addon">ពិន្ទុ</span>
                                        </div>
                                    </td>
                                    
                                </tr>
                            </table>
                    </div>
                </div>


                <div class="col-sm-12"><hr></div>
                {{--<div class="col-sm-12">--}}
                    {{--<input class="btn btn-info pull-right" type="button" id="skp" value="skip">--}}
                {{--</div>--}}

                <script>
                    $("#skp").click(function (e) {
                        var str= $(this).val();
                        if(str === 'skip'){
                            $('#skp').val('back');
                        }else{
                            $('#skp').val('skip');
                        }
                        $('.step3-section-3').toggle();
                    });
                </script>


                        <div class="col-sm-12">
                            <h5><b>គ.១២.១.២​)ដីកសិកម្ម <a class="fa fa-question-circle" href="#" data-toggle="tooltip" title="" data-original-title="ប្រសិនបើមានដីផ្ទាល់ខ្លួន ឫជួលគេ សូមបញ្ជាក់ ទំហំដីកសិកម្ម (សុំសរសេរជាទំហំសរុបដោយបូកគ្រប់កន្លែង និងបញ្ជាក់ពីឯកតា) "></a></b></h5>
                            <p>មាន​ដីកសិកម្ម ឬ​ទេ ?</p>
                            <ul class="li-none add_land">
                                @foreach($landAgricultural as $key => $land)
                                    @if($land->id == 1)
                                        <li>
                                            <label><input class="land" style="margin-right:10px;" type="radio" name="land" value="{{$land->id}}">  {{$land->name_kh}}</label>
                                        </li>
                                    @else
                                        <li>
                                            <label class="testing"><input style="margin-right:10px;"  id="land_{{$land->id}}"  class="land_{{$land->id}}" type="checkbox" name="land_{{$land->id}}" value="{{$land->id}}" multiple>  {{$land->name_kh}}</label>
                                            @if($land->id == 2)
                                                <div class="col-sm-12" id="show-land-other"></div>
                                            @else
                                                <div class="col-sm-12" id="show-land-personal"></div>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <script>
                            $(".land").click(function(e){
                                if($(this).hasClass("on")){
                                    $(this).removeAttr('checked');
                                    $('.testing').attr('disable');
                                    //alert(1);
                                }
                                $(this).toggleClass("on");
                                $('#land_2').removeAttr('checked');
                                $('#show-land-other').html('');
                                $('#land_3').removeAttr('checked');
                                $('#show-land-personal').html('');
                                $('.testing').toggleClass("disable");
                                //alert(2);

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

                                    if(land == 2) {
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
                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            @include('include.other-income-agriculture')
                        </div>
                        <div class="col-sm-12"><hr> </div>
                        <div class="col-sm-12">
                            <h4>គ.១៣) សុខភាព និងពិការភាព</h4>
                                <ul class="li-none">
                                    @foreach($health as $key =>$vv)
                                       <li>
                                           <label>
                                               <input class="health_id_{{$key}} cal_health" style="margin-right: 10px;" type="checkbox" value="{{$vv->id}}" name="health_id[{{$key}}]" multiple/>
                                               {{$vv->name_kh}}
                                           </label>
                                           @if($vv->id == 1)<label id="health_1"></label>@endif
                                           @if($vv->id == 2)<label id="health_2"></label>@endif
                                       </li>
                                    @endforeach
                                </ul>
                                <P class="my_hide" >8. ជំងឺ,របួសនិងពិការភាព</P>
                                <div class="my_hide form-group input-group" style="width: 300px;">
                                    <input id="score_health" name="disease_score" type="text" class="cal_health form-control" readonly="readonly"/>
                                    <span class="input-group-addon">ពិន្ទុ</span>
                                </div>
                            <script>

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
                                            '<input autocomplete="off" name="kids_then65" id="kids_then65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
                                            '</div>'+
                                            '</td>'+
                                            '<td>'+
                                            '<div class="form-group">' +
                                            '<input autocomplete="off" name="old_bigger65" id="old_bigger65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
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
                                            '<input autocomplete="off" name="kids_50_then65" id="kids_50_then65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
                                            '</div>' +
                                            '</td>' +
                                            '<td>' +
                                            '<div class="form-group">' +
                                            '<input autocomplete="off" name="old_50_bigger65" id="old_50_bigger65" type="text" class="cal_health form-control allowNumber checkNumberPeople"/>' +
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

                            <h4>គ.១៤) បំណុលគ្រួសារ</h4>
                            <div class="col-sm-12">
                                <p>តើ​គ្រួសារ​របស់​អ្នក​នៅមាន​បំណុល/​កម្ចី​មិនទាន់​បាន​សង​ដែរ​ឬ​ទេ? <spand class="text-danger">*</spand></p>
                                <ul class="debt_question_group">
                                    @foreach($loan as $key => $ge)
                                        <li>
                                             <label class="add_family_debt_id"><input style="margin-right: 10px" class="family_debt" value="{{$ge->id}}" type="radio" name="family_debt_id"??>{{ $ge->name_kh }}</label>
                                            @if($ge->id == 1)<label id="family_debt"></label>@endif
                                            @if($ge->id == 2)<label id="family_debt1"></label>@endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    <script>
                        $('.family_debt').click(function () {
                            var family_debt = $('input[name=family_debt_id]:checked').val();
                            $('#family_debt').empty();
                            $('#family_debt1').empty();
                            if(family_debt == 1){
                                $('#family_debt').append('<ol class="debt_question">@foreach($question as $key=>$gg)<li><label><input style="margin-right: 10px" value="{{$gg->id}}" type="radio" name="q_debt">{{$gg->name_kh}}</label></li>@endforeach</ol>');
                            }else if(family_debt == 2){
                                $('#family_debt1').append('<div class="col-sm-12">' +
                                        '<div class="col-sm-6">' +
                                            '<table class="table table-bordered table-striped">' +
                                                '<tbody>' +
                                                    '<tr>' +
                                                        '<td> ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន</td>' +
//                                                        '<td>រយៈពេលនៃការសងបំណុល</td>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<td>' +
                                                            '<div class="input-group add_total_debt">' +
                                                                '<input autocomplete="off" class="dept_money form-control allowNumber" type="text" name="total_debt" id="total_debt">' +
                                                                '<span class="input-group-addon">រៀល</span>' +
                                                            '</div>' +
                                                        '</td>' +
                                                    '</tr>' +

                                                    '<tr class="my_hide">' +
//                                                        '<td>' +
//                                                        '</td>' +
                                                        '<td>' +
                                                            '<div class="input-group add_debt_duration">' +
                                                                '<input autocomplete="off" onkeyup class="dept_money form-control allowNumber" type="text" name="debt_score" id="score_money" readonly>' +
                                                                '<span class="input-group-addon">ពិន្ទុ</span>' +
                                                            '</div>'+
                                                        '</td>'+
                                                    '</tr>'+

                                                '</tbody>'+
                                            '</table>'+
                                        '</div>' +
                                    '</div>');
                                    AllowNumber();
                                 $('.dept_money').keyup(function(){
                                    var total_debt = $('#total_debt').val();
                                    if( total_debt>1200100){
                                        $('#score_money').val(3); 
                                    }else if(total_debt>= 600000 && total_debt<=1200000){
                                        $('#score_money').val(2); 
                                    }else{
                                        $('#score_money').val(0);
                                    }
                                });
                            }
                        });
                             
                    </script>

                    <!-- <div class="col-sm-12">
                        <p>9. បំណុលរបស់គ្រួសារ</p>
                        <div class="input-group add_debt_duration" style="width: 300px;">
                            <input autocomplete="off" class="dept_money form-control allowNumber" type="text" name="debt_score" id="score_money" readonly="">
                            <span class="input-group-addon">ពិន្ទុ</span>
                        </div>
                    </div><hr> -->

                    <div class="col-sm-12">
                        <h4>គ.១៥) ព័ត៍មានផ្សេងៗបន្ថែម ឬមតិយោបល់របស់អ្នកសម្ភាសន៍ (បើមាន)</h4>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="command"></textarea>
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


    <div class="col-sm-12" style="padding: 0;"><h3>ទិន្នន័យ​អ្នកជំងឺ</h3></div>
    <div class="data-list">
        @include('include.result-interview')
    </div>
</div>




<script type="text/javascript">
    var step2Row = 1;
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
            // var small_age = 0;
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
            count_small_age();
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
            $('.new_rows_4').empty();
            $('.new_rows_5').empty();
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
                            '<div class="form-group add_income_unit">' +
                                '<input name="income_unit['+i+']" type="text" class="cal_incom form-control income_unit" placeholder="ថ្ងៃ" value="day" autocomplete="off" readonly="readonly">' +
                            '</div>' +
                        '</td>'+

                        '<td>'+
                            '<div class="cal_incom form-group input-group add_average_amount">'+
                                '<input id="average_amount_'+i+'" name="average_amount['+i+']" type="text" class="cal_incom average_amount form-control allowNumber otherincome" autocomplete="off">'+
                                '<span class="input-group-addon">រៀល</span>'+
                            '</div>'+
                        '</td>'+

                        '<td>' +
                            '<div class="form-group input-group add_unit_in_month">' +
                                '<input id="unit_in_month_'+i+'" name="unit_in_month['+i+']" type="text" class="cal_incom unit_in_month form-control allowNumber otherincome"  autocomplete="off">'+
                                '<span class="input-group-addon">ថ្ងៃ</span>' +
                            '</div>' +
                        '</td>'+

                        '<td>' +
                            '<div class="form-group input-group">' +
                                '<input id="monthly_income_'+i+'" name="monthly_income['+i+']" type="text" class="cal_incom monthly_income form-control allowNumber monthly_income_total" readonly="readonly" autocomplete="off">'+
                                '<span class="input-group-addon">រៀល</span>' +
                            '</div>' +
                        '</td>'+
                        '<td style="text-align:center;" id="plus-check">'+plus+'</td>' +
                    '</tr>';
                $('.new_rows_4').append(otherIncome);


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
                }else{
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
                    '<td style="text-align:center;" id="plus-check5">'+plus_not+'</td>' +
                    '</tr>';
                $('.new_rows_5').append(otherIncome_not);


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

            if ($("input[name='income_agricalture_type']:checked").val()==1) {
                if($('.unit_in_month').val() == '' ||
                    $('.average_amount').val() == '' ||
                    $('#income_occupation').val() == ''){
                        $('.alert').show();
                        $('.add_unit_in_month').addClass("has-error");
                        $('.add_average_amount').addClass("has-error");
                        $('.add_income_occupation').addClass("has-error");
                        isValid = false;
                }else{
                    $('.add_unit_in_month').removeClass("has-error");
                    $('.add_average_amount').removeClass("has-error");
                    $('.add_income_occupation').removeClass("has-error");
                }
            }else{
                if($('.unit_in_month_not').val() == '' ||
                    $('.average_amount_not').val() == '' ||
                    $('#income_occupation_not').val() == ''){
                    $('.alert').show();
                    $('.add_unit_in_month_not').addClass("has-error");
                    $('.add_average_amount_not').addClass("has-error");
                    $('.add_income_occupation_not').addClass("has-error");
                    isValid = false;
                }else{
                    $('.add_unit_in_month_not').removeClass("has-error");
                    $('.add_average_amount_not').removeClass("has-error");
                    $('.add_income_occupation_not').removeClass("has-error");
                }
            }



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
                $("#health_facilities_code").val(od_code);
            },
            complete: function(){
                $("#loading").fadeOut(100);
            },
            error: function (report){
                console.log(report);
            }
        });
    });

    {{--$("#hospital").change(function () {--}}
        {{--var od_code  = $('#hospital').val();--}}
        {{--var hospital = $('#hospital option:selected').text();--}}

        {{--$.ajax({--}}
            {{--type: 'GET',--}}
            {{--url: "{{ route('getHealthFacilitiesCode') }}",--}}
            {{--data: {'od_code': od_code,'hospital': hospital},--}}
            {{--beforeSend: function(){--}}
                {{--$("#loading").fadeIn();--}}
            {{--},--}}
            {{--success: function (data) {--}}
                {{--var obj = JSON.parse(data);--}}
                {{--$("#health_facilities_code").val(obj);--}}
            {{--},--}}
            {{--complete: function(){--}}
                {{--$("#loading").fadeOut(100);--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
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
    @include('include.function')
@endsection
