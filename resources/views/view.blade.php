@section('title','ការធ្វើអត្តសញ្ញាណកម្ម')
@extends('layouts.app')

@section('content')
	<div class="container content">
		<div class="row setup-content" id="step-1">
            <div class="col-xs-12">
            	<h3 style="text-align: center;"><b>កាធ្វើអត្តសញ្ញាណកម្មគ្រួសារក្រីក្រនៅមន្ទីរពេទ្យ</b></h3>
                    <p style="text-align: center; font-size: 16px;">តារាងបង្ហាញការវាយតម្លៃ/ដាក់ពិន្ទុលើបញ្ជីសំណួរសម្ភាសន៍នៅមន្ទីរពេទ្យរបស់អ្នកជំងឺ</p>
                    <div class="col-sm-12" style="padding: 0 !important;"><hr> </div>
                <div class="col-md-12 form-group-post">
                    <div class="col-sm-12"><p>
                    	<div class="col-sm-12" style="padding: 0 !important;"><h4 style="text-decoration: none;">ព័ត៌មានទូទៅ</h4><hr></div>
                    </p>
                    	@foreach($patient as $key=>$value) 
                    	<div class="col-sm-6"></div>
                    	<div class="col-sm-6">
                    		<table class="pull-right">
	                            <tr>
	                                <td width="35%"><label class="control-label">លេខកូដសម្ភាសន៍:</label></td>
	                                <td width="65%">
	                                    <div class="form-group">
	                                        <input maxlength="100" name="interview_code" type="text" required="required" class="form-control" value="{{$value->interview_code}}" disabled/>
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
	                                        <input  maxlength="100" name="g_patient" type="text" required="required" class="form-control"​​ value="{{$value->g_patient}}" disabled />
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label"> ភេទ : </label></td>
	                                <td width="65%">
	                                   <div class="form-group"  id="g_sex">
	                                        <input name="g_sex" value="{{$value->name_kh}}" style="margin-right:10px;" type="text" class="form-control" disabled></
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
	                                        <input  maxlength="100" name="g_age" type="text" value="{{$value->g_age}}" required="required" class="form-control" disabled/>
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">លេខទូរស័ព្ធ :</label></td>
	                                <td width="65%">
	                                   <div class="form-group">
	                                        <input  maxlength="100" name="g_phone" type="text" value="{{$value->g_phone}}" required="required" class="form-control" disabled/>
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
	                                       <input  maxlength="100" name="pro" value="{{$value->province}}" type="text" required="required" class="form-control" disabled/>
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">   ស្រុក : </label></td>
	                                <td width="65%">
	                                   <div class="form-group g_district">
	                                      <input  maxlength="100" value="{{$value->district}}" name="pro" type="text" required="required" class="form-control" disabled/>
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
	                                        <input  maxlength="100" value="{{$value->commune}}" name="pro" type="text" required="required" class="form-control" disabled/>
	                                    </div>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">ភូមិ :</label></td>
	                                <td width="65%">
	                                    <div class="form-group g_village">
	                                        <input  maxlength="100" value="{{$value->village}}"name="pro" type="text" required="required" class="form-control" disabled/>
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
	                                       <input type="text" class="form-control" id="location" value="{{$value->g_local_village}}" name="g_local_village" required="required" disabled>
	                                    </div>
	                                </td>
	                            </tr>
	                        </table>
	                    </div>
	                  </div>
	                  @endforeach
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>1.អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ</h4>
	                  	<p>ទិន្នន័យបានមកពី :​ តារា  ខ) ចំនួនសមាជិកគ្រួសារ និង គ.៣) ផ្ទៃក្រឡាទីលំនៅ</p>
	                  		<p style="padding: 2px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>2.បង្គន់អនាម័យ (ចាក់ទឹក/ស្ងួត)</h4>
	                  		<p>ទិន្នន័យបានមកពី :​ តារា</p>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  	</p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>3.ស្ថានភាពផ្ទះ</h4>
	                  	<p>- 3A   គ្រួសារដែលរស់នៅផ្ទះផ្ទាល់ខ្លួន ឬស្នាក់នៅជាមួយអ្នកដ៏ទៃ</p>
	                  	<p>- 3A 1 : ស្ថានភាពដំបូលផ្ទះ (តើដំបូលផ្ទះសង់ពីអ្វី?)</p>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ (សម្រាប់គ្រួសារដែលរស់នៅផ្ទាស់ខ្លួនតែប៉ុណ្ណោះ)</p>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 3A 3 : ស្ថានភាពទូទៅរបស់ផ្ទះ </p>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 3B   គ្រួសារដែលនៅផ្ទះជួលគេ     តម្លៃជួលផ្ទះ (ប្រើសម្រាប់តែគ្រួសារដែលជួលផ្ទះគេ)</p>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                    </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>4.ទ្រព្យសម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិចរបស់គ្រួសារ </h4>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                    </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>5.អគ្គិសនីប្រើប្រាស់</h4>
	                  	<p>- 5A.  គ្រួសារដែលបានតបណ្តាញអគ្គីសនីប្រើប្រាស់ </p>
	                  	
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  	</p>
	                  	<p>- 5B. គ្រួសារដែលមិនបានតបណ្តាញអគ្គីសនីប្រើប្រាស់</p>
	                  	
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  	</p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>6.អំពីយានជំនិះរបស់គ្រួសារ</h4>
	                  	
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>7.ចំណូលរបស់គ្រួសារ</h4>
	                  	<p>- 7.A.    ចំណូលសម្រាប់គ្រួសារដែលមានដី ឬ មានចំណូលពីកសិកម្ម</p>
	                  	<p>- 7.A.1   ការចិញ្ចឹមសត្វ</p>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 7.A. 2A ផ្ទៃដីកសិកម្ម ជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</p>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 7.A.2 B  ផ្ទៃដីកសិកម្ម មិនមែនជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</p>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<P>- 7.B.1   ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមានចំណូលពីសកម្មភាពកសិកម្ម</P>
	                  	<p>(ប្រាក់ចំណូលប្រចាំខែ  ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ)</p>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<P>- 7.B.2  ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្ម</P>
	                  	<p>(ប្រាក់ចំណូលប្រចាំខែ  ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ)</p>
	                  		<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 7. C កុមារ(អាយុក្រោម 1៨ឆ្នាំ )រកចំណូល</p>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>8.ជំងឺ ,របួសនិងពិការភាព</h4>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>9. បំណុលរបស់គ្រួសារ</h4>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>10.  ការអប់រំ (មើលចម្លើយនៅក្នុងតារាងផ្នែក ខ)</h4>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>11. វ័យពលកម្ម (ចន្លោះពី1៨ឆ្នាំដល់៦៥ឆ្នាំ) </h4>
	                  	<p style="padding: 5px;">
			                  	<table class="table" style="border: 1px solid #ccc !important;">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំពោះចំនួនមនុស្ស</th>
	                    				<th style="text-align: center;">ផ្ទៃក្រឡា</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr>
			                  			<td>ចំពោះចំនួនមនុស្សពី ១-៣នាក់</td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  			<td><input type="text" name="house_size" value="5"​ class="form-control" disabled style="text-align: center;"></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
                </div>
            </div>
        </div>
	</div>
@endsection