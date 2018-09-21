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
            @foreach($material as $key =>$v)
                <tr class="myrow_{{$key+1}}">
                    <td>{{$key+1}}</td>
                    <td>
                        <div class="form-group add_type_meterial">
                            <select class="form-control type_meterial" id="type_meterial" name="type_meterial[{{$key}}]">
                                <option></option>
                                @foreach($typemeterial as $keh => $value)
                                    <option @if($v->type_meterial_id == $value->id) selected @endif value="{{$value->id}}">{{$value->name_kh}}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input value="{{$v->number_meterial}}" id="number_meterial" name="number_meterial[{{$key}}]" type="text" class="cal_el form-control allowNumber meterial" required="required" />
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input value="{{$v->market_value_meterial}}" id="market_value_meterial" name="market_value_meterial[{{$key}}]" type="text"  class="cal_el form-control allowNumber meterial" required="required" />
                        </div>
                    </td>
                    <td>
                        <div class="form-group input-group">
                            <input value="{{$v->total_rail}}" id="total_rail_meterial" name="total_rail_meterial[{{$key}}]" type="text" required="required" class="cal_el form-control totalallowNumber_meterial"  readonly="readonly"/>
                            <span class="input-group-addon">រៀល</span>
                        </div>
                    </td>
                    <td style="text-align:center;">
                        @if($key == 0)
                            <a  class="btn btn-primary btn-sm" id="add_rows_1">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        @else
                            <a id="meterial_{{$key}}" class="btn remove_rows_1 btn-danger btn-sm">
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot>
        <tr>
            <td colspan="4"><b style="float:right">សរុប​តម្លៃ​សម្ភារ</b></td>
            <td>
                <div class="form-group input-group">
                    <input value="{{$material[0]->total_meterial_costs}}" id="total_meterial_costs" name="total_meterial_costs" type="text" required="required" class="cal_el form-control" readonly="readonly"/>
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