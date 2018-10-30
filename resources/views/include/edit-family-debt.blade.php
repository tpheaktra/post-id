<h4>គ.១៤) បំណុលគ្រួសារ</h4>
<div class="col-sm-12">
    <p>តើ​គ្រួសារ​របស់​អ្នក​នៅមាន​បំណុល/​កម្ចី​មិនទាន់​បាន​សង​ដែរ​ឬ​ទេ? <spand class="text-danger">*</spand></p>
    <ul class="debt_question_group">
        @foreach($loan as $key => $ge)
            <li>
                <label class="add_family_debt_id"><input @if($gFamily->debt_family_id == $ge->id) checked @endif style="margin-right: 10px" class="family_debt" value="{{$ge->id}}" type="radio" name="family_debt_id"??>{{ $ge->name_kh }}</label>
                @if($ge->id == 1)
                    <label id="family_debt">
                        @if($gFamily->debt_family_id == 1)
                            <ol class="debt_question">
                                @foreach($question as $key=>$gg)
                                    <li>
                                        <label>
                                            <input @if($debt_link != null && $debt_link->question_id == $gg->id) checked @endif style="margin-right: 10px;" value="{{$gg->id}}" type="radio" name="q_debt">{{$gg->name_kh}}
                                        </label>
                                    </li>
                                @endforeach
                            </ol>
                        @endif
                    </label>
                @endif
                @if($ge->id == 2)
                    <label id="family_debt1">
                        @if($gFamily->debt_family_id == 2)
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <td> ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="input-group add_total_debt">
                                                    <input value="{{$debt_link->total_debt ?? ''}}" autocomplete="off" class="dept_money form-control allowNumber" type="text" name="total_debt" id="total_debt">
                                                    <span class="input-group-addon">រៀល</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="my_hide">
                                            <td>
                                                @foreach($store_score as $key=>$value)
                                                <div class="input-group add_debt_duration">
                                                    <input autocomplete="off"  class="dept_money form-control allowNumber" type="text" name="debt_score" id="score_money" readonly value="{{$value->debt}}">
                                                    <span class="input-group-addon">ពិន្ទុ</span>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </label>
                @endif
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
            $('#family_debt').append('<ol class="debt_question">@foreach($question as $key=>$gg)<li><label><input @if($debt_link != null && $debt_link->question_id == $gg->id) checked @endif style="margin-right: 10px" value="{{$gg->id}}" type="radio" name="q_debt">{{$gg->name_kh}}</label></li>@endforeach</ol>');
        }else if(family_debt == 2){
            $('#family_debt1').append('<div class="col-sm-12">' +
                '<div class="col-sm-6">' +
                '<table class="table table-bordered table-striped">' +
                '<tbody>' +
                '<tr>' +
                '<td> ចំនួនបំណុលដែលមិនទាន់សងគិតមកដល់បច្ចុប្បន្ន</td>' +
                '</tr>' +
                '<tr>' +
                '<td>' +
                '<div class="input-group add_total_debt">' +
                '<input value="{{$debt_link->total_debt ?? ''}}" autocomplete="off" class="dept_money form-control allowNumber" type="text" name="total_debt" id="total_debt">' +
                '<span class="input-group-addon">រៀល</span>' +
                '</div>' +
                '</td>' +
                '</tr>' +
                '<tr class="my_hide">' +
                '<td>' +
                '<div class="input-group add_debt_duration">' +
                '@foreach($store_score as $key=>$value)<input autocomplete="off" class="dept_money form-control allowNumber" type="text" name="debt_score" value="{{$value->debt}}" id="score_money" readonly>@endforeach' +
                '<span class="input-group-addon">ពិន្ទុ</span>' +
                '</div>'+
                '</td>'+
                '</tr>'+

                '</tbody>'+
                '</table>'+
                '</div>' +
                '</div>');
            AllowNumber();
            
        }
    });
    $('.dept_money').change(function(){
        var total_debt = $('#total_debt').val();
        if( total_debt>1200100){
            $('#score_money').val(3);
        }else if(total_debt>= 600000 && total_debt<=1200000){
            $('#score_money').val(2);
        }else{
            $('#score_money').val(0);
        }
    });
</script>