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
        @foreach($income as $key3 =>$v)
            <tr class="myrow_3" index="{{$key3}}">
                <td class="auto_id">{{$key3+1}}</td>
                <td>
                    <div class="form-group add_type_animals">
                        <select style="width: 100%;" class="0 form-control type_animals1" id="type_animals" name="type_animals[0]" required="required" index="0">
                            <option></option>
                            @foreach($typeanimals as $key => $value)
                                <option @if($v->type_animals_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
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
                                    <input value="{{$v->num_animals}}" name="num_animals[0]" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />
                                    <input value="{{$v->num_animals_big}}" name="num_animals_big[0]" id="num_animals_big" type="text" class="cal_animal form-control allowNumber" required="required" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input value="{{$v->num_animals_small}}" name="num_animals_small[0]" id="num_animals_small" type="text" class="cal_animal form-control allowNumber"  />
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <td>
                    <div class="form-group ng" id="noted_0">
                        <select style="width: 100%;" class="cal_animal form-control note_animals" id="note_animals" name="note_animals[0]" required="required" index="0">
                            <option></option>
                            <option @if($v->note_animals == 'ប្រវាស់') selected @endif value="ប្រវាស់">ប្រវាស់</option>
                            <option @if($v->note_animals == 'មិនប្រវាស់') selected @endif value="មិនប្រវាស់">មិនប្រវាស់</option>
                        </select>
                    </div>
                </td>
                <td class="my_hide">
                    <div class="form-group input-group">
                        <input id="score_animal_0" name="animal_score" type="text" required="required" class="cal_animal txt_score_animal score_animal_0 form-control" readonly="readonly"/>
                        <span class="input-group-addon">ពិន្ទុ</span>
                    </div>
                </td>
                <td style="text-align:center;">
                    @if($key3==0)
                        <a  class="btn btn-primary btn-sm" id="add_rows_3">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                    @else
                        <a status="0" class="btn remove_rows_3 btn-sm btn-danger">
                            <span class="glyphicon glyphicon-minus"></span>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
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