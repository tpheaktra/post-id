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
                    <div class="form-group add_type_animals_{{$key3}}" id="typeAnimals">
                        <select style="width: 100%;" class="0 form-control type_animals1 typeAnimals" id="type_animals_{{$key3}}" name="type_animals[{{$key3}}]" required="required" index="{{$key3}}">
                            <option></option>
                            @foreach($typeanimals as $key => $value)
                                <option @if($v->type_animals_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                            @endforeach
                        </select>
                    </div>
                </td>

                <td id="num_animals_{{$key3}}" class="add_ajust_animals">
                    @if($v->type_animals_id == 1)
                    <table class="table table-bordered" align="center">
                        <tr>
                            <th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>
                            <th>ចំនួនកូនសត្វ</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <input value="{{$v->num_animals}}" name="num_animals[{{$key3}}]" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />
                                    <input value="{{$v->num_animals_big}}" name="num_animals_big[{{$key3}}]" id="num_animals_big" type="text" class="cal_animal form-control allowNumber" required="required" />
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input value="{{$v->num_animals_small}}" name="num_animals_small[{{$key3}}]" id="num_animals_small" type="text" class="cal_animal form-control allowNumber"  />
                                </div>
                            </td>
                        </tr>
                    </table>
                    @elseif($v->type_animals_id == 2)
                        <table class="table table-bordered">
                            <tr>
                                <th>ចំនួនសត្វ</th>
                            </tr>
                            <tr>
                            <td>
                                <div class="form-group">
                                    <input value="{{$v->num_animals ?? ''}}" name="num_animals[{{$key3}}]" id="num_sheep_{{$key3}}" type="text" class="cal_animal form-control allowNumber num_animals"  />
                                    </div>
                                </td>
                            </tr>
                        </table>
                    @else
                        <table class="table table-bordered">
                            <tr>
                                <th>ចំនួនសត្វ <spand class="text-danger">*</spand></th>
                                </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input value="{{$v->num_animals_big ?? ''}}" autocomplete="off" name="num_animals_big[{{$key3}}]" id="hend_{{$key3}}" type="text" class="cal_animal form-control allowNumber" required="required" />
                                        </div>
                                    </td>
                                </tr>
                            </table>
                    @endif
                </td>

                <td>
                    <div class="form-group ng" id="noted_{{$key3}}">
                    @if($v->type_animals_id == 1)
                        <select style="width: 100%;" class="cal_animal form-control note_animals" id="note_animals" name="note_animals[{{$key3}}]" required="required" index="{{$key3}}">
                            <option></option>
                            <option @if($v->note_animals == 'ប្រវាស់') selected @endif value="ប្រវាស់">ប្រវាស់</option>
                            <option @if($v->note_animals == 'មិនប្រវាស់') selected @endif value="មិនប្រវាស់">មិនប្រវាស់</option>
                        </select>
                    @else
                        <input value="{{$v->note_animals ?? ''}}" autocomplete="off" name="note_animals[{{$key3}}]" type="text" class="cal_animal form-control noteAnimals"  />
                    @endif
                    </div>

                </td>
                <td class="my_hide">
                    <div class="form-group input-group">
                        <input id="score_animal_{{$key3}}" name="animal_score" type="text" required="required" class="cal_animal txt_score_animal score_animal_{{$key3}} form-control" readonly="readonly"/>
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

        </tbody>
        <tr class="my_hide">
            <td></td>
            <td colspan="3"><b style="float:right">7.A.1 ការចិញ្ចឹមសត្វ</b></td>
            <td>
                <div class="form-group input-group">
                    @foreach($store_score as $key => $value)
                    <input id="score_animal_total" name="animal_score" type="text" value="{{$value->animal}}" required="required" class="form-control cal_animal" readonly="readonly"/>
                    <span class="input-group-addon">ពិន្ទុ</span>
                    @endforeach
                </div>
            </td>

        </tr>
    </table>
</div>



<script>
    /*==================================================================
     ===============================new_rows_3===========================
     ================================================================== */


    $('.type_animals1').on('change', function (e) {
        // console.log(dataRow_income);
       // var numRow=dataRow_income;
       // numRow++;
        var type = this.value;
        var index= $(this).attr('index');

        // console.log('==' + index + ' ---- ' + type);
        if (type == 2) {
            var sheep = '<table class="table table-bordered">' +
                '<tr>' +
                '<th>ចំនួនសត្វ</th>' +
                '</tr>' +
                '<tr>' +
                '<td>' +
                '<div class="form-group">' +
                '<input name="num_animals['+index+']" id="num_sheep_'+index+'" type="text" class="cal_animal form-control allowNumber num_animals"  />' +
                '</div>' +
                '</td>' +
                '</tr>' +
                '</table>';
            var noted = '<input autocomplete="off" name="note_animals['+index+']" type="text" class="cal_animal form-control noteAnimals"  />';
            $('#noted_'+index).html(noted);
            $('#num_animals_'+(index)).html(sheep);
            AllowNumber();
            $('.cal_animal').change(function(){
                var myrow_ind = $('.myrow_3').attr('index');
                var num = $('#num_sheep_'+index).val();
                var answer = 0;
                if( num>=0 && num < 3){
                    //$('#animal_score').val(4);
                    answer = 4;
                }else{
                    answer = 0;
                }
                $(".score_animal_"+index).val(answer);
                var maxScore = $('.score_animal_'+myrow_ind).val();
                $(".txt_score_animal").each(function(i){
                    var score = $(this).val();
                    if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                });
                $('#score_animal_total').val(maxScore);
            });

        }else if( type == 3 ){
            var duk = '<table class="table table-bordered">' +
                '<tr>' +
                '<th>ចំនួនសត្វ <spand class="text-danger">*</spand></th>' +
                '</tr>' +
                '<tr>' +
                '<td>' +
                '<div class="form-group">' +
                '<input autocomplete="off" name="num_animals_big['+index+']" id="hend_'+index+'" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                '</div>' +
                '</td>' +
                '</tr>' +
                '</table>';
            var noted = '<input autocomplete="off" name="note_animals['+index+']" type="text" class="cal_animal form-control noteAnimals"  />';
            $('#noted_'+index).html(noted);
            $('#num_animals_'+(index)).html(duk);
            AllowNumber();
            $(".cal_animal").change(function(){
                var myrow_ind = $('.myrow_3').attr('index');
                var hend = $("#hend_"+index).val();
                var score = 0;
                if(hend>=0 && hend<30){
                    score = 6;
                }else if(hend >=30 && hend<50){
                    score=4;
                }else{
                    score=0;
                }
                $('.score_animal_'+index).val(score);

                var maxScore = $('.score_animal_'+myrow_ind).val();
                $(".txt_score_animal").each(function(i){
                    var score = $(this).val();
                    if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                });
                $('#score_animal_total').val(maxScore);
            });
        }else if (type == 1) {//$('#num_animals_'+ty).empty();
            var cow = '<table class="table table-bordered" align="center">' +
                '<tr>' +
                '<th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>' +
                '<th>ចំនួនកូនសត្វ</th>' +
                '</tr>' +
                '<tr>' +
                '<td>' +
                '<div class="form-group">' +
                '<input name="num_animals['+index+']" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />' +
                '<input autocomplete="off" name="num_animals_big['+index+']" id="num_animals_big_'+index+'" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="form-group">' +
                '<input autocomplete="off" name="num_animals_small['+index+']" id="num_animals_small_'+index+'" type="text" class="cal_animal form-control allowNumber"  />' +
                '</div>' +
                '</td>' +
                '</tr>' +
                '</table>';
            var noted = '<select style="width: 100%;" class="cal_animal form-control note_animals noteAnimals" id="note_animals_'+index+'" name="note_animals['+index+']" required="required" index="'+index+'">' +
                '<option></option>' +
                '<option value="ប្រវាស់">ប្រវាស់</option>' +
                '<option value="មិនប្រវាស់">មិនប្រវាស់</option>' +
                '</select>';

            $('#noted_'+index).html(noted);
            $('#num_animals_'+(index)).html(cow);
            AllowNumber();
            $(".note_animals").select2({ allowClear:true, placeholder: "កំណត់សម្គាល់"});

            $(".cal_animal").change(function(){
                var myrow_ind = $('.myrow_3').attr('index');
                var big = parseInt($("#num_animals_big_"+index).val());
                var small = parseInt($("#num_animals_small_"+index).val());
                var status = $("#note_animals_"+index).val();
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
                $(".score_animal_"+index).val(score);

                var maxScore = $('.score_animal_'+myrow_ind).val();
                $(".txt_score_animal").each(function(i){
                    var score = $(this).val();
                    if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                });
                $('#score_animal_total').val(maxScore);
            });
        }
    });









    var dataRow_income = $('.new_rows_3 tr.myrow_3').length-1;
    var dataRow_income_add = $('.new_rows_3 tr.myrow_3').length+1;
    // var numRow = $('.new_rows_3 tr.myrow_3').length;
    //dataRow_income = 2;
    var animal_ind = 0;


    $('#add_rows_3').click(function(){ //alert($m_id);
       var numRow=dataRow_income;
        numRow++;
        // console.log(numRow);
        var row_3 = $('.new_rows_3 tr.myrow_3').length;
        animal_ind = row_3;
//        if(row_3 >= 3){
//            alert('ប្រភេទចំណូលមិនអនុញ្ញាតអោយបញ្ចូលលើសពីរការកំណត់ទេ');
//            return false;
//        }
        // var rowindex_3 = row_3+1;
        var tab_rows_3 ='<tr class="myrow_3">'+
            '<td class="auto_id">'+dataRow_income_add+'</td>'+
            '<td>'+
            '<div class="form-group add_type_animals_'+numRow+'" id="typeAnimals">'+
            '<select required="required" style="width: 100%;" class="cal_animal form-control type_animals typeAnimals" id="type_animals_'+numRow+'" name="type_animals['+numRow+']" index="'+(numRow)+'">' +
            '<option></option>@foreach($typeanimals as $key => $value)<option value="{{$value->id}}">{{$value->name_kh}}</option>@endforeach</select>'+
            '</div>'+
            '</td>'+
            '<td id="num_animals_'+numRow+'" class="add_ajust_animals">'+
            '<table class="table table-bordered" align="center">' +
            '<tr>' +
            '<th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>' +
            '<th>ចំនួនកូនសត្វ</th>' +
            '</tr>' +
            '<tr>' +
            '<td>' +
            '<div class="form-group">' +
            '<input name="num_animals['+numRow+']" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />' +
            '<input autocomplete="off" name="num_animals_big['+numRow+']" type="text" class="cal_animal num_animals_big form-control allowNumber" required="required" />' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group">' +
            '<input autocomplete="off" name="num_animals_small['+numRow+']" type="text" class="cal_animal num_animals_small form-control allowNumber"/>' +
            '</div>' +
            '</td>' +
            '</tr>' +
            '</table>' +
            '</td>'+
            '<td>' +
            '<div class="form-group ng" id="noted_'+numRow+'">' +
            '<select style="width: 100%;" class="form-control note_animals noteAnimals" id="note_animals" name="note_animals['+numRow+']" required="required" index="'+numRow+'">' +
            '<option></option>' +
            '<option value="ប្រវាស់">ប្រវាស់</option>' +
            '<option value="មិនប្រវាស់">មិនប្រវាស់</option>' +
            '</select>'+
            '</div>' +
            '</td>'+
            '<td​​ class="my_hide">'+
            '<div class="form-group input-group">'+
            '<input id="score_animal" name="animal_score['+numRow+']" type="text" required="required" class="cal_animal txt_score_animal score_animal_'+numRow+' form-control" readonly="readonly"/>'+
            '<span class="input-group-addon">ពិន្ទុ</span>'+
            '</div>'+
            '</td>'+
            '<td><a class="btn btn-danger btn-sm remove_rows_3"> <span class="glyphicon glyphicon-minus"></span></a></td>'+
            '</tr>';
        $(".new_rows_3").append(tab_rows_3);
        AllowNumber();
        dataRow_income++;
        dataRow_income_add++;
        reOrder_income();
        $(".type_animals").select2({ allowClear:true, placeholder: "ប្រភេទសត្វ"});
        $(".note_animals").select2({ allowClear:true, placeholder: "កំណត់សម្គាល់"});

        $('.type_animals').on('change', function (e) {
            // console.log(dataRow_income);

            var type = this.value;
            var index= $(this).attr('index');
             //console.log(numRow + '==' + index + ' ---- ' + type);
            if (type == 2) {
                var sheep = '<table class="table table-bordered">' +
                    '<tr>' +
                    '<th>ចំនួនសត្វ</th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input name="num_animals['+numRow+']" id="num_sheep_'+numRow+'" type="text" class="cal_animal form-control allowNumber num_animals"  />' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
                var noted = '<input autocomplete="off" name="note_animals['+numRow+']" type="text" class="cal_animal form-control noteAnimals"  />';
                $('#noted_'+index).html(noted);
                $('#num_animals_'+(index)).html(sheep);
                AllowNumber();
                $('.cal_animal').change(function(){
                    var myrow_ind = $('.myrow_3').attr('index');
                    var num = $('#num_sheep_'+index).val();
                    var answer = 0;
                    if( num>=0 && num < 3){
                        //$('#animal_score').val(4);
                        answer = 4;
                    }else{
                        answer = 0;
                    }
                    $(".score_animal_"+index).val(answer);
                    var maxScore = $('.score_animal_'+myrow_ind).val();
                    $(".txt_score_animal").each(function(i){
                        var score = $(this).val();
                        if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                    });
                    $('#score_animal_total').val(maxScore);
                });

            }else if( type == 3 ){
                var duk = '<table class="table table-bordered">' +
                    '<tr>' +
                    '<th>ចំនួនសត្វ <spand class="text-danger">*</spand></th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input autocomplete="off" name="num_animals_big['+numRow+']" id="hend_'+numRow+'" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
                var noted = '<input autocomplete="off" name="note_animals['+numRow+']" type="text" class="cal_animal form-control noteAnimals"  />';
                $('#noted_'+index).html(noted);
                $('#num_animals_'+(index)).html(duk);
                AllowNumber();
                $(".cal_animal").change(function(){
                    var myrow_ind = $('.myrow_3').attr('index');
                    var hend = $("#hend_"+index).val();
                    var score = 0;
                    if(hend>=0 && hend<30){
                        score = 6;
                    }else if(hend >=30 && hend<50){
                        score=4;
                    }else{
                        score=0;
                    }
                    $('.score_animal_'+index).val(score);

                    var maxScore = $('.score_animal_'+myrow_ind).val();
                    $(".txt_score_animal").each(function(i){
                        var score = $(this).val();
                        if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                    });
                    $('#score_animal_total').val(maxScore);
                });
            }else if (type == 1) {//$('#num_animals_'+ty).empty();
                var cow = '<table class="table table-bordered" align="center">' +
                    '<tr>' +
                    '<th>ចំនួនសត្វធំ <spand class="text-danger">*</spand></th>' +
                    '<th>ចំនួនកូនសត្វ</th>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input name="num_animals['+numRow+']" id="num_animals" type="hidden" class="cal_animal form-control allowNumber num_animals"  />' +
                    '<input autocomplete="off" name="num_animals_big['+numRow+']" id="num_animals_big_'+numRow+'" type="text" class="cal_animal form-control allowNumber" required="required" />' +
                    '</div>' +
                    '</td>' +
                    '<td>' +
                    '<div class="form-group">' +
                    '<input autocomplete="off" name="num_animals_small['+numRow+']" id="num_animals_small_'+numRow+'" type="text" class="cal_animal form-control allowNumber"  />' +
                    '</div>' +
                    '</td>' +
                    '</tr>' +
                    '</table>';
                var noted = '<select style="width: 100%;" class="cal_animal form-control note_animals noteAnimals" id="note_animals_'+numRow+'" name="note_animals['+numRow+']" required="required" index="'+numRow+'">' +
                    '<option></option>' +
                    '<option value="ប្រវាស់">ប្រវាស់</option>' +
                    '<option value="មិនប្រវាស់">មិនប្រវាស់</option>' +
                    '</select>';

                $('#noted_'+index).html(noted);
                $('#num_animals_'+(index)).html(cow);
                AllowNumber();
                $(".note_animals").select2({ allowClear:true, placeholder: "កំណត់សម្គាល់"});

                $(".cal_animal").change(function(){
                    var myrow_ind = $('.myrow_3').attr('index');
                    var big = parseInt($("#num_animals_big_"+index).val());
                    var small = parseInt($("#num_animals_small_"+index).val());
                    var status = $("#note_animals_"+index).val();
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
                    $(".score_animal_"+index).val(score);

                    var maxScore = $('.score_animal_'+myrow_ind).val();
                    $(".txt_score_animal").each(function(i){
                        var score = $(this).val();
                        if(i>0 && (parseFloat(score) > parseFloat(maxScore))) maxScore = score;
                    });
                    $('#score_animal_total').val(maxScore);
                });
            }
        });


        //score
        // $('.cal_animal').change(function(){
        //     $('#score_animal').empty();
        //     var animal = $('.type_animals').val();
        //     var num_animals_big     = $('.num_animals_big').val();
        //     var num_animals_small   = $('.num_animals_small').val();
        //     var note_animals        = $('.note_animals').val();
        //     if(animal == 1){
        //         $('#score_animal').empty();
        //         if((num_animals_big == 0 && num_animals_small == 0 && note_animals == 0)){
        //             $('#score_animal').val(6);
        //         }else if( (num_animals_big == 1 || num_animals_small <= 2) || (note_animals == 2) ){
        //             $('#score_animal').val(4);
        //         }else if(num_animals_big>1 || num_animals_small>3 || note_animals>2){
        //             $('#score_animal').val(0);
        //         }else{$('#score_animal').val(0);}

        //     }else if(animal == 2){
        //         $('#score_animal').empty();
        //         if( (num_animals_big == 0 && num_animals_small == 0 && note_animals == 0) ){
        //             $('#score_animal').val(6);
        //         }else if(num_animals_big<3 || num_animals_small < 3){
        //             $('#score_animal').val(4);
        //         }else if(num_animals_big==3 || num_animals_small==3 ){
        //             $('#score_animal').val(0);
        //         }else{$('#score_animal').val(0);}

        //     }else{
        //         $('#score_animal').empty();
        //         if(num_animals_small < 30 || num_animals_big < 30){
        //             $('#score_animal').val(6);
        //         }else if( (num_animals_big>30 && num_animals_big<50) || (num_animals_big>30 && num_animals_big<50) ){
        //             $('#score_animal').val(4);
        //         }else if(num_animals_big == 50 || num_animals_small == 50){
        //             $('#score_animal').val(0);
        //         }else{$('#score_animal').val(0);}

        //     }
        // });

    });


    //remove add
    $(".new_rows_3").on('click','.remove_rows_3',function(e){
        var result = window.confirm('Are you sure?');
        if (result == false) {
            e.preventDefault();
            return false;
        }
        $('#add_rows_3').show();
        $(this).parent().parent().remove();
        reOrder_income();
        dataRow_income--;
        dataRow_income_add--;
        numRow--;
    });
    //type_animals
    $(".type_animals").select2({allowClear:true, placeholder: 'ប្រភេទសត្វ' });
    $(".type_animals1").select2({allowClear:true, placeholder: 'ប្រភេទសត្វ' });
    $(".note_animals").select2({allowClear:true, placeholder: 'កំណត់សម្គាល់' });

    function reOrder_income(){
        for(var n=1;n<(dataRow_income_add);n++){
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td.auto_id:first-child').html(n);
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .typeAnimals').attr('name', 'type_animals['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .typeAnimals').attr('index', (n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td #typeAnimals').attr('class', 'form-group add_type_animals_'+(n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .typeAnimals').attr('id', 'type_animals_'+(n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td.add_ajust_animals').attr('id', 'num_animals_'+(n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .num_animals').attr('name', 'num_animals['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .num_animals_big').attr('name', 'num_animals_big['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .num_animals_small').attr('name', 'num_animals_small['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .noteAnimals').attr('name', 'note_animals['+(n-1)+']');
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .ng').attr('id', 'noted_'+(n-1));
            $('.new_rows_3  tr.myrow_3:eq(' + (n-1) +') td .note_animals').attr('index', (n-1));
        }
    }

</script>