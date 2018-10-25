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
                    @foreach($memberFamily as $key =>$m)
                        <tr class="myrow" index="{{$key}}">
                            <td>{{$key+1}} @if($key==0)(មេ)@endif <input name="mid[{{$key}}]" type="hidden" value="{{$m->id}}"></td>
                            <td>
                                <div class="form-group">
                                    {{ Form::text('nick_name['.$key.']',$m->nick_name,['class'=>'form-control nick_name_'.$key,'required'=>'required']) }}
                                </div>
                            </td>
                            <td>
                                <div class="form-group add_m_sex_{{$key}}">
                                    <select style="width: 100%" class="form-control m_sex" id="m_sex_{{$key}}" name="m_sex[{{$key}}]" required="required" index="{{$key}}">
                                        <option></option>
                                        @foreach($gender as $keh => $value)
                                            <option @if($m->gender_id == $value->id) selected @endif  value="{{$value->id}}">{{$value->name_kh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ Form::text('dob['.$key.']',$m->dob,['class'=>'form-control allowNumber','required'=>'required','maxlength'=>'4','id'=>'dob']) }}
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    {{ Form::text('age['.$key.']',$m->age,['class'=>'form-control allowNumber age_g cal_edu​​​ cal_child txt_age age_'.$key,'id'=>'age_'.$key,'required'=>'required','maxlength'=>'3','id'=>'age']) }}
                                </div>
                            </td>
                            <td>
                                <div class="form-group add_relationship_{{$key}}" id="status">
                                    <select style="width: 100%" id="family_relationship_{{$key}}" class="cal_edu form-control family_relationship" name="family_relationship[{{$key}}]" required="required" readonly="readonly">
                                        <option></option>
                                        @foreach($relationship as $keh => $value)
                                            <option @if($m->family_relationship_id == $value->id) selected @endif  value="{{$value->id}}">{{$value->name_kh}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </td>
                            <td>
                                <div class="form-group add_occupation">
                                    <select style="width: 100%;" class="cal_edu form-control occupation" name="occupation[{{$key}}]" required="required" id="occupation">
                                        <option></option>
                                        @foreach($occupation as $keh => $value)
                                            <option @if($m->occupation_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group add_education_level">
                                    <select style="width: 100%" id="education_level_{{$key}}"  class="cal_edu form-control education_level aa"  name="education_level[{{$key}}]" required="required">
                                        <option></option>
                                        @foreach($education_level as $keh => $value)
                                            <option @if($m->education_level_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td class="my_hide"><input type="text" class="cal_edu txt_score edu_score_{{$key}} form-control" readonly=""></td>
                            <td>
                                @if($key==0)
                                    <a class="btn btn-primary btn-sm" id="add_rows">
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </a>
                                @else
                                    <a status="0" class="btn remove_rows_kh btn-danger btn-sm">
                                        <span class="glyphicon glyphicon-minus"></span>
                                    </a>
                                @endif
                            </td>
                        </tr>

                    @endforeach

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
<script type="text/javascript">
    var edu_row = $('.new_rows tr.myrow').length-1;

    var dataRow = $('.new_rows tr.myrow').length+1;
    var num_row = $('.new_rows tr.myrow').length;

    $('.m_sex').change(function(){
        var index= $(this).attr('index');
        $(".family_relationship").removeAttr("readonly");
        var val = $(this).val();
        for(var ii=0; ii<num_row; ii++) {

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


    $('.cal_edu').change(function(){
        var myrow_ind = $('.myrow').attr('index');
        // var child = $('.child').val();
        // var edu = $('#education_level_'+myrow_ind).val();
        var relation = $('#family_relationship_'+myrow_ind).val();

        $('.age_g').each(function (ind) {
            var age = $('.age_'+ind).val();
            var edu = $('#education_level_'+ind).val();
            var relation = $(this).val();
            // var rel = $(this).val();
            var row_score = 0;
            if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) ){
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
            if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) ){
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
            if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) ){
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
    // var dataRow = 2;


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
            '<td><div class="form-group"><input autocomplete="off" maxlength="3" id="age_' + edu_row + '" type="text" required="required" class="cal_edu cal_child txt_age age_g hh-member age age_'+edu_row+' form-control allowNumber" name="age[' + edu_row + ']"/></div></td>' +
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
                if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) ){
                    row_score = 4;
                }else if( ((relation == 1 || relation == 2) && (edu >=4 && edu <=6)) || ( (age>=16) && (edu >=4 && edu <=6)) || (age<16 && edu==14) ) {
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
                if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) ){
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
                if( ((relation == 1 || relation == 2) && ( (edu == 14) || (edu >=1 && edu <=3) )) || ( (age>=16) && (edu >=1 && edu <=3)) ){
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
            for(var ii=0; ii<row_num; ii++) {

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