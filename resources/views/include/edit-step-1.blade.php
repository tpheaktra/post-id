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
                                            <input type="text" class="form-control"  id="current_date" name="interview_date" value="{{$ginfo->interview_date}}"/>
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
                                            <input type="text" class="form-control" readonly id="expire_date" name="expire_date" value="{{$ginfo->interview_date}}"/>
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
                //$("#current_date").datepicker().datepicker("setDate", new Date());
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
                                                    <option @if($ginfo->od_code==$h->od_code) selected @endif value="{{$h->od_code}}">មន្ទីរពេទ្យ - {{$h->name_kh}}</option>
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
                                        {{ Form::text('interview_code',$ginfo->interview_code,['class'=>'form-control','required'=>'required','readonly'=>'readonly' ,'placeholder'=>'PNP/18 08 29/01','id'=>'interview_code']) }}
                                        {{ Form::hidden('hf_code',$ginfo->hf_code,['required'=>'required','readonly'=>'readonly','id'=>'health_facilities_code']) }}
                                    </div>
                                </td>
                                <td></td>
                                <td width="30%">
                                    <div class="form-group">
                                        <input id="printcard" value="{{ $ginfo->printcardno }}" name="printcardno" type="text" class="form-control" placeholder="23020101-0001" readonly style="text-align: center; font-size: 18px;  padding: 4px;"/>
                                        <input id="hhid" name="hhid" type="hidden" value="{{ $ginfo->hhid }}"/>
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
                                {{ Form::text('g_patient',$ginfo->g_patient,['class'=>'form-control','required'=>'required']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%"><label class="control-label"> ភេទ <spand class="text-danger">*</spand> </label></td>
                        <td width="65%">
                            <div class="form-group"  id="g_sex">
                                @foreach($gender as $key => $g)
                                    <label>
                                        {{ Form::radio('g_sex',$g->id,$ginfo->g_sex == $g->id,['style'=>'margin-right:10px;']) }}  {{$g->name_kh}}
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
                                {{ Form::text('g_age',$ginfo->g_age,['class'=>'form-control allowNumber onlyNumber g_age','required'=>'required','maxlength'=>'3']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="35%"><label class="control-label">លេខទូរស័ព្ធ <spand class="text-danger">*</spand></label></td>
                        <td width="65%">
                            <div class="form-group">
                                {{ Form::text('g_phone',$ginfo->g_phone,['class'=>'form-control telephone','required'=>'required','maxlength'=>'10']) }}
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
                                            <option @if($ginfo->g_province_id == $p->code) selected @endif value="{{$p->code}}">{{$p->name_kh}}</option>
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
                                    <option value="{{$ginfo->g_district_id}}"> {{$ginfo['district'][0]->name_kh}} </option>
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
                                    <option value="{{$ginfo->g_commune_id}}">{{$ginfo['commune'][0]->name_kh}}</option>
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
                                    <option value="{{$ginfo->g_village_id}}">{{$ginfo['village'][0]->name_kh}}</option>
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
                                {{ Form::textarea('g_local_village',$ginfo->g_local_village,['class'=>'form-control','id'=>'location','maxlength'=>'300','style'=>'height: 60px;']) }}
                            </div>
                        </td>
                    </tr>
                </table>
            </div>


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
                                {{ Form::text('inter_patient',$ginfo->inter_patient,['class'=>'form-control']) }}
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><label class="control-label"> ភេទ  </label></td>
                        <td>
                            <div class="form-group" id="inter_sex">
                                @foreach($gender as $key => $g)
                                    <label>{{ Form::radio('inter_sex',$g->id,$ginfo->inter_sex == $g->id,['style'=>'margin-right:10px;']) }}  {{$g->name_kh}}</label>
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
                                {{ Form::text('inter_age',$ginfo->inter_age,['class'=>'form-control allowNumber inter_age','maxlength'=>'3']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label">លេខទូរស័ព្ធ </label></td>
                        <td>
                            <div class="form-group">
                                {{ Form::text('inter_phone',$ginfo->inter_phone,['class'=>'form-control telephone','maxlength'=>'10']) }}
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
                                            <option @if($ginfo->inter_relationship_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
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
                <h4> ក.៣ ព័ត៌មានអំពី​ អ្នកដែលអាចបញ្ជាក់ពីស្ថានភាពគ្រួសារ (ដែលមិនមែនសមាជិកគ្រួសារ)ដូចជាមេភូមិ អ្នកជិតខាង​ មិត្តភ័ក្រ្ត </h4>
            </div>
            <div class="col-sm-6">
                <table width="100%">
                    <tr>
                        <td><label class="control-label">ឈ្មោះ </label></td>
                        <td>
                            <div class="form-group">
                                {{ Form::text('fa_patient',$ginfo->fa_patient,['class'=>'form-control']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label"> ភេទ  </label></td>
                        <td>
                            <div class="form-group" id="fa_sex">
                                @foreach($gender as $key => $g)
                                    <label>{{ Form::radio('fa_sex',$g->id,$ginfo->fa_sex == $g->id,['style'=>'margin-right:10px;']) }}  {{$g->name_kh}}</label>
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
                                {{ Form::text('fa_age',$ginfo->fa_age,['class'=>'form-control allowNumber fa_age','maxlength'=>'3']) }}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="control-label">លេខទូរស័ព្ធ </label></td>
                        <td>
                            <div class="form-group">
                                {{ Form::text('fa_phone',$ginfo->fa_phone,['class'=>'form-control telephone','maxlength'=>'10']) }}
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
                                            <option  @if($ginfo->fa_relationship_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
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