@section('title','Report')
@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="container content">
        <div class="row">
            <div class="col-xs-12">
                <div class="head-title-add text-center">
                    <h4>ទាញយករបាយការណ៍</h4>
                </div>

                <div class="user-mangement text-center">
                    {!! Form::open(['route' => 'reportbymonth'],['enctype'=>'multipart/form-data']) !!}

                        <div  style="margin: 10px auto 20px; width: 25%;">
                            <select id="year" style="width: 100%;" name="year">
                                <option></option>
                                @php $currentYear = date('Y'); @endphp
                                @foreach (range(2000, $currentYear) as $value)
                                    <option @if($currentYear == $value) selected @endif value="{{$value}}">{{$value}}</option>
                                @endforeach
                            </select>
                            <script>
                                $("#year").select2({allowClear:true, placeholder: "ជ្រើសរើសឆ្នាំ"});
                            </script>
                        </div>

                        <div  style="margin: 10px auto 20px; width: 25%;">
                            <select id="report" style="width: 100%;" name="report">
                                <option value="1">ទាញយករបាយការណ៍ប្រចាំឆ្នាំ</option>
                                <option value="2">ទាញយករបាយការណ៍បញ្ញីកត់ត្រា POST-ID</option>
                            </select>
                            <script>
                                $("#report").select2({allowClear:true, placeholder: "ជ្រើសរើស"});
                            </script>
                        </div>
                        <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary" value="ទាញយករបាយការណ៍">
                                <br>
                                <hr>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
