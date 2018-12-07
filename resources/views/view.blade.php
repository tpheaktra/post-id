@section('title','ការធ្វើអត្តសញ្ញាណកម្ម')
@extends('layouts.app')

@section('content')
<style type="text/css">
	.my_bg_score{
		background: #ccc;
	}
</style>
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

                    	<div class="col-sm-6"></div>
                    	<div class="col-sm-6">
                    		<table class="pull-right">
	                            <tr>
	                                <td width="35%"><label class="control-label">លេខកូដសម្ភាសន៍:</label></td>
	                                <td width="65%">
	                                    <div class="form-group">
	                                        <input maxlength="100" name="interview_code" type="text" required="required" class="form-control" value="{{$patient->interview_code}}" disabled/>
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
	                                        <input  maxlength="100" name="g_patient" type="text" required="required" class="form-control"​​ value="{{$patient->g_patient}}" disabled />
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label"> ភេទ : </label></td>
	                                <td width="65%">
	                                   <div class="form-group"  id="g_sex">
	                                        <input name="g_sex" value="{{$patient->sex->name_kh}}" style="margin-right:10px;" type="text" class="form-control" disabled>
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
	                                        <input  maxlength="100" name="g_age" type="text" value="{{$patient->g_age}}" required="required" class="form-control" disabled/>
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">លេខទូរស័ព្ធ :</label></td>
	                                <td width="65%">
	                                   <div class="form-group">
	                                        <input  maxlength="100" name="g_phone" type="text" value="{{$patient->g_phone}}" required="required" class="form-control" disabled/>
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
	                                       <input  maxlength="100" name="pro" value="{{$patient->provinces->name_kh}}" type="text" required="required" class="form-control" disabled/>
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">   ស្រុក : </label></td>
	                                <td width="65%">
	                                   <div class="form-group g_district">
	                                      <input  maxlength="100" value="{{$patient->district->name_kh}}" name="pro" type="text" required="required" class="form-control" disabled/>
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
	                                        <input  maxlength="100" value="{{$patient->commune->name_kh}}" name="pro" type="text" required="required" class="form-control" disabled/>
	                                    </div>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">ភូមិ :</label></td>
	                                <td width="65%">
	                                    <div class="form-group g_village">
	                                        <input  maxlength="100" value="{{$patient->village->name_kh}}"name="pro" type="text" required="required" class="form-control" disabled/>
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
	                                       <input type="text" class="form-control" id="location" value="{{$patient->g_local_village}}" name="g_local_village" required="required" disabled>
	                                    </div>
	                                </td>
	                            </tr>
	                        </table>
	                    </div>
	                  </div>

	                  @foreach($score_list as $key=>$value)
	                  	
	            <!--       
	                  	{{$value->size_member}}	,
	                  	{{$value->toilet}}
	                  	{{$value->roof}},
	                  	{{$value->wall}},
	                  	{{$value->house_status}},
	                  	{{$value->price_rent_house}},
	                  	{{$value->price_electronic}},
	                  	{{$value->use_energy_elect}},
	                  	{{$value->no_energy_elect}},
	                  	{{$value->vehicle}},
	                  	{{$value->animal}},
	                  	{{$value->personal_farm}},
	                  	{{$value->other_farm}},
	                  	{{$value->income_out_farmer}},
	                  	{{$value->income_out_not_farmer}},
	                  	{{$value->income_child}},
	                  	{{$value->disease}},
	                  	{{$value->debt}},
	                  	{{$value->edu}},
	                  	{{$value->age_action}}
	                  	{{$value->total}}
	                  	  -->
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>1.អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ</h4>
	                  	<p>ទិន្នន័យបានមកពី :​ តារា  ខ) ចំនួនសមាជិកគ្រួសារ និង គ.៣) ផ្ទៃក្រឡាទីលំនៅ</p>
	                  		<p style="padding: 2px;">
	                  			<input type="hidden" value="{{$value->size_member}}" name="" id="size_member">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="8">
			                  			<td>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ១-៣នាក់              : ផ្ទៃក្រឡា ≤ 20 ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               : ផ្ទៃក្រឡា  ≤ 30 ម៉ែត្រក្រឡា </p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            : ផ្ទៃក្រឡា  ≤ 40 ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សលើសពី១០នាក់         : ផ្ទៃក្រឡា  ≤ 50 ម៉ែត្រក្រឡា </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">8</span></td>
			                  		</tr>
			                  		<tr id="6">
			                  			<td>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ១-៣នាក់               : 20ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 30ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៤-៦នាក់                : 30ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា  ≤ 40ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៧-១០នាក់             : 40ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 55ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សលើសពី១០នាក់         : 50ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 65 ម៉ែត្រក្រឡា</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="3">
			                  			<td>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ១-៣នាក់               : 30ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 40 ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៤-៦នាក់                : 40ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 50 ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៧-១០នាក់             : 55ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 65 ម៉ែត្រក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សលើសពី១០នាក់          : 65ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា ≤ 75 ម៉ែត្រក្រឡា</p>
			                  			</td>
			                  			<td width="30%"><h3 align="center">3</h3></td>
			                  		</tr>
			                  		<tr id="0">
			                  			<td>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ១-៣នាក់                 : 40 ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៤-៦នាក់                  : 50 ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៧-១០នាក់              : 65 ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា</p>
			                  				<p>-ចំពោះចំនួនមនុស្សលើសពី១០នាក់          : 75 ម៉ែត្រក្រឡា < ផ្ទៃក្រឡា</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <script type="text/javascript">
	                  	var size_member = $('#size_member').val();
	                  	if(size_member == 8){
	                  		$('#8').addClass('my_bg_score');
	                  	}else if(size_member == 6){
	                  		$('#6').addClass('my_bg_score');
	                  	}else if(size_member == 3){
	                  		$('#3').addClass('my_bg_score');
	                  	}else{
	                  		$('#0').addClass('my_bg_score');
	                  	}
	                  </script>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>2.បង្គន់អនាម័យ (ចាក់ទឹក/ស្ងួត)</h4>
	                  		<p>ទិន្នន័យបានមកពី :​ តារា</p>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->toilet}}" name="" id="toilet">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="toilet4">
			                  			<td>
			                  				<p>-គ្មានបង្គន់អនាម័យប្រើប្រាស់</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="toilet2">
			                  			<td>
			                  				<p>-មានបង្គន់អនាម័យប្រើរួមជាមួយគ្រួសារដទៃទៀត</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2.5</span></td>
			                  		</tr>
			                  		<tr class="toilet0">
			                  			<td>
			                  				<p>-មានបង្គន់អនាម័យផ្ទាល់ខ្លួន</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  	</p>
	                  </div>
	                  <script type="text/javascript">
	                  	var toilet = $('#toilet').val();
	                  	if(toilet == 4){
	                  		$('#toilet4').addClass('my_bg_score');
	                  	}else if(toilet == 2.5){
	                  		$('#toilet2').addClass('my_bg_score');
	                  	}else{
	                  		$("#toilet0").addClass('my_bg_score');
	                  	}
	                  </script>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4 style="font-weight: bold;">3.ស្ថានភាពផ្ទះ</h4>
	                  	<p style="font-weight: bold;">- 3A   គ្រួសារដែលរស់នៅផ្ទះផ្ទាល់ខ្លួន ឬស្នាក់នៅជាមួយអ្នកដ៏ទៃ</p>
	                  	<p style="font-weight: bold;">- 3A 1 : ស្ថានភាពដំបូលផ្ទះ (តើដំបូលផ្ទះសង់ពីអ្វី?)</p>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->roof}}" id="roof" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="roof6">
			                  			<td>
			                  				<p>- ដំបូលប្រក់ស្បូវ, ស្លឹក, តង់កៅស៊ូពណ៌/ប្លាស្ទីក, ស័ង្កសីចាស់/សំណល់, ឈើចាស់ៗ, សម្ភារស្រាលៗដទៃទៀត ។</p> 
			                  			</td>
			                  			<td width="30%"><h3 align="center">6</h3></td>
			                  		</tr>
			                  		<tr id="roof4">
			                  			<td>
			                  				<p>- ដំបូលប្រក់លាយគ្នាមានស័ង្កសីចាស់/សំណល់ខ្លះនិង មានលាយថ្មីខ្លះៗ </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="roof0">
			                  			<td>
			                  				<p>-  ក្បឿង, ហ្វីប្រូស៊ីម៉ងត៍, បេតុង, ស័ង្កសីថ្មី</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var roof = $('#roof').val();
		                  	if(roof == 6){
		                  		$('#roof6').addClass('my_bg_score');
		                  	}else if(roof == 4){
		                  		$('#roof4').addClass('my_bg_score');
		                  	}else{
		                  		$("#roof0").addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<p style="font-weight: bold;">- 3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ (សម្រាប់គ្រួសារដែលរស់នៅផ្ទាស់ខ្លួនតែប៉ុណ្ណោះ)</p>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->wall}}" id="wall" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="wall6">
			                  			<td>
			                  				<p>- ធ្វើពីស្លឹកត្នោត, ស្បូវ, ឬស្សី, គ្មានជញ្ជាំង</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="wall4">
			                  			<td>
			                  				<p>-ធ្វើពីឈើ</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="wall0">
			                  			<td>
			                  				<p>-ឥដ្ឋ, ស៊ីម៉ង់ </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var wall = $('#wall').val();
		                  	if(wall == 6){
		                  		$('#wall6').addClass('my_bg_score');
		                  	}else if(wall == 4){
		                  		$('#wall4').addClass('my_bg_score');
		                  	}else{
		                  		$('#wall0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<p style="font-weight: bold;">- 3A 3 : ស្ថានភាពទូទៅរបស់ផ្ទះ </p>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->house_status}}" id="house_status" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="house_status4">
			                  			<td>
			                  				<p>- ស្ថានភាពទ្រុឌទ្រោម</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="house_status2">
			                  			<td>
			                  				<p>- ស្ថានភាពមធ្យម, អាចរស់នៅបាន</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2.5</span></td>
			                  		</tr>
			                  		<tr id="house_status0">
			                  			<td>
			                  				<p>- ស្ថានភាពល្អ</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var house_status = $('#house_status').val();
		                  	if(house_status == 4){
		                  		$('#house_status4').addClass('my_bg_score');
		                  	}else if(house_status == 2.5){
		                  		$('#house_status2').addClass('my_bg_score');
		                  	}else{
		                  		$('#house_status0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<p style="font-weight: bold;">- 3B   គ្រួសារដែលនៅផ្ទះជួលគេ     តម្លៃជួលផ្ទះ (ប្រើសម្រាប់តែគ្រួសារដែលជួលផ្ទះគេ)</p>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->price_rent_house}}" id="price_rent_house" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="price_rent_house16">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់              : ថ្លៃជួល  ≤ ៨០០០០ រៀល </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               : ថ្លៃជួល    ≤ ១២០០០០ រៀល</p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            : ថ្លៃជួល  ≤ ១៨០០០០ រៀល</p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់      : ថ្លៃជួល    ≤ ២៤០០០០ រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">16</span></td>
			                  		</tr>
			                  		<tr id="price_rent_house11">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់               : ៨០០០០​​ រៀល < ថ្លៃជួល  ≤ ១៦០០០០​​ រៀល </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់                : ១២០០០០​​ រៀល <ថ្លៃជួល  ≤ ៥០០០០០​​ រៀល </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់             : ១៨០០០០​​ រៀល < ថ្លៃជួល  ≤ ២៨០០០០​​ រៀល</p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់         : ២៤០០០០​​ រៀល < ថ្លៃជួល  ≤ ៣៤០០០០​​ រៀល </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">11</span></td>
			                  		</tr>
			                  		<tr id="price_rent_house5">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់                : ១៦០០០០​​ រៀល <ថ្លៃជួល  ≤ ២០០០០០​​ រៀល </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់                 : ២០០០០០​​ រៀល < ថ្លៃជួល  ≤ ២៤០០០០​​ រៀល </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់             : ២៨០០០០​​ រៀល < ថ្លៃជួល  ≤ ៣៤០០០០​​ រៀល</p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់          : ៣៤០០០០​​ រៀល < ថ្លៃជួល  ≤ ៤០០០០០​​ រៀល</p>
			                  			</td>
			                  			<td width="30%"><h3 align="center">5</h3></td>
			                  		</tr>
			                  		<tr id="price_rent_house0">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់                 : ២០០០០០​​ រៀល < ថ្លៃជួល  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់                  : ២៤០០០០​​ រៀល < ថ្លៃជួល  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់              : ៣៤០០០០​​ រៀល < ថ្លៃជួល  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់          : ៤០០០០០​​ រៀល <ថ្លៃជួល  </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                    </p>
		                    <script type="text/javascript">
		                    	var price_rent_house = $('#price_rent_house').val();
		                    	if(price_rent_house == 16){
		                    		$('#price_rent_house16').addClass('my_bg_score');
		                    	}else if(price_rent_house == 11){
		                    		$('#price_rent_house11').addClass('my_bg_score');
		                    	}else if(price_rent_house == 5){
		                    		$('#price_rent_house5').addClass('my_bg_score');
		                    	}else{
		                    		$('#price_rent_house0').addClass('my_bg_score');
		                    	}
		                    </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>4.ទ្រព្យសម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិចរបស់គ្រួសារ </h4>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->price_electronic}}" id="price_electronic" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="price_electronic6">
			                  			<td>
			                  				<p>- សរុបតម្លៃមុខទំនិញទាំងអស់មានតម្លៃចាប់ពី ០​​ រៀល - ៤០០០០០​​ រៀល</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="price_electronic4">
			                  			<td>
			                  				<p>- សរុបតម្លៃមុខទំនិញទាំងអស់មានតម្លៃចាប់ពី ២០៤០០០​​ រៀល - ៨០០០០០​​ រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="price_electronic2">
			                  			<td>
			                  				<p>- សរុបតម្លៃមុខទំនិញទាំងអស់មានតម្លៃចាប់ពី ៨០៤០០០​​ រៀល – ១២០០០០០​​ រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2</span></td>
			                  		</tr>
			                  		<tr id="price_electronic0">
			                  			<td>
			                  				<p>- សរុបតម្លៃមុខទំនិញទាំងអស់មានតម្លៃចាប់ពី ១២០៤០០០​​ រៀល ឡើង</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                    </p>
		                    <script type="text/javascript">
		                    	var price_electronic = $('#price_electronic').val();
		                    	if(price_electronic == 6){
		                    		$("#price_electronic6").addClass('my_bg_score');
		                    	}else if(price_electronic == 4){
		                    		$("#price_electronic4").addClass('my_bg_score');
		                    	}else if(price_electronic == 2){
		                    		$("#price_electronic2").addClass('my_bg_score');
		                    	}else{
		                    		$("#price_electronic0").addClass('my_bg_score');
		                    	}
		                    </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>5.អគ្គិសនីប្រើប្រាស់</h4>
	                  	<p style="font-weight: bold;">- 5A.  គ្រួសារដែលបានតបណ្តាញអគ្គីសនីប្រើប្រាស់ </p>
	                  	
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->use_energy_elect}}" id="use_energy_elect" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="use_energy_elect8">
			                  			<td>
			                  				<p>- បានចំណាយប្រាក់តិចជាង 15 000រៀល/ខែឬបានប្រើប្រាស់តិចជាង២០គីឡូវ៉ាត់ម៉ោង/ខែ</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">8</span></td>
			                  		</tr>
			                  		<tr id="use_energy_elect5">
			                  			<td>
			                  				<p>- បានចំណាយប្រាក់ចាប់ពី 15 100 – 30 000រៀល/ខែ ឬបានប្រើប្រាស់ចាប់ពី 21-49គីឡូវ៉ាតម៉ោង/ខែ</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">5</span></td>
			                  		</tr>
			                  		<tr id="use_energy_elect0">
			                  			<td>
			                  				<p>- បានចំណាយចាប់ពី30 100រៀលឡើង/ខែ ឬបានប្រើប្រាស់ចាប់ពី50គីឡូវ៉ាត់ម៉ោងឡើង/ខែ </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  	</p>
		                  	<script type="text/javascript">
		                  		var use_energy_elect = $('#use_energy_elect').val();
		                  		if(use_energy_elect == 8){
		                  			$('#use_energy_elect8').addClass('my_bg_score');
		                  		}else if(use_energy_elect == 5){
		                  			$('#use_energy_elect5').addClass('my_bg_score');
		                  		}else{
		                  			$('#use_energy_elect0').addClass('my_bg_score');
		                  		}
		                  	</script>
	                  	<p style="font-weight: bold;">- 5B. គ្រួសារដែលមិនបានតបណ្តាញអគ្គីសនីប្រើប្រាស់</p>
	                  		<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->no_energy_elect}}" id="no_energy_elect" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="no_energy_elect8">
			                  			<td>
			                  				<p>- ប្រើចង្កៀងប្រេងកាត</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">8</span></td>
			                  		</tr>
			                  		<tr id="no_energy_elect5">
			                  			<td>
			                  				<p>- ប្រើអាគុយ  ឬ ថាមពលព្រះអាទិត្យ</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">5</span></td>
			                  		</tr>
			                  		<tr id="no_energy_elect0">
			                  			<td>
			                  				<p>- ប្រើម៉ាស៊ីនភ្លើងផ្ទាល់ខ្លួន</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  	</p>
		                  	<script type="text/javascript">
		                  		var no_energy_elect = $('#no_energy_elect').val();
		                  		if(no_energy_elect == 8){
		                  			$('#no_energy_elect8').addClass('my_bg_score');
		                  		}else if(no_energy_elect == 5){
		                  			$('#no_energy_elect5').addClass('my_bg_score');
		                  		}else{
		                  			$('#no_energy_elect0').addClass('my_bg_score');
		                  		}
		                  	</script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>6.អំពីយានជំនិះរបស់គ្រួសារ</h4>
	                  	
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->vehicle}}" id="vehicle" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="vehicle6">
			                  			<td>
			                  				<p>- សរុបតម្លៃយានជំនិះទាំងអស់មានតម្លៃចាប់ពី ០​​ រៀល - ៦០០០០០​​ រៀល</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="vehicle4">
			                  			<td>
			                  				<p>- សរុបតម្លៃយានជំនិះទាំងអស់មានតម្លៃចាប់ពី ៦០៤០០០​​ រៀល -១២០០០០០​​ រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="vehicle2">
			                  			<td>
			                  				<p>- សរុបតម្លៃយានជំនិះទាំងអស់មានតម្លៃចាប់ពី ១២០៤០០០​​ រៀល – ២០០០០០០​​ រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2</span></td>
			                  		</tr>
			                  		<tr id="vehicle0">
			                  			<td>
			                  				<p>- សរុបតម្លៃយានជំនិះទាំងអស់មានតម្លៃចាប់ពី ២០០៤០០០​​ រៀល ឡើង</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var vehicle = $('#vehicle').val();
		                  	if(vehicle == 6){
		                  		$('#vehicle6').addClass('my_bg_score');
		                  	}else if(vehicle == 4){
		                  		$('#vehicle4').addClass('my_bg_score');
		                  	}else if(vehicle == 2){
		                  		$('#vehicle2').addClass('my_bg_score');
		                  	}else {
		                  		$('#vehicle0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>7.ចំណូលរបស់គ្រួសារ</h4>
	                  	<p style="font-weight: bold;">- 7.A.    ចំណូលសម្រាប់គ្រួសារដែលមានដី ឬ មានចំណូលពីកសិកម្ម</p>
	                  	<p style="font-weight: bold;">- 7.A.1   ការចិញ្ចឹមសត្វ</p>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->animal}}" id="animal" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="animal6">
			                  			<td>
			                  				<p>- គ្មានគោ/ក្របីធំ១ ជ្រូក/ពពែ នឹងមាន់/ទាតិចជាង ៣០</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="animal4">
			                  			<td>
			                  				<p>- មានគោធំ១ ឬគោតូច២ ឬគោប្រវាស់២ និង/ឬ ជ្រូក/ពពែ តិចជាង៣ និង/ឬ មាន់តិចជាង ៥០, ទាតិចជាង៣០</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="animal0">
			                  			<td>
			                  				<p>- មានគោធំច្រើនជាង១ ឬគោតូចច្រើនជាង៣ ឬគោប្រវាស់ច្រើនជាង២  ឬជ្រូក/ពពែ ៣ ឬមាន់ ៥០ </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var animal = $('#animal').val();
		                  	if(animal == 6){
		                  		$('#animal6').addClass('my_bg_score');
		                  	}else if(animal == 4){
		                  		$('#animal4').addClass('my_bg_score');
		                  	}else{
		                  		$('#animal0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<p style="font-weight: bold;">- 7.A. 2A ផ្ទៃដីកសិកម្ម ជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</p>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->personal_farm}}" id="personal_farm" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="personal_farm6">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់              : ផ្ទៃក្រឡា  ≤ 0.6 Ha </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               : ផ្ទៃក្រឡា  ≤ 1Ha</p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            : ផ្ទៃក្រឡា  ≤ 1.5Ha</p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់        : ផ្ទៃក្រឡា  ≤ 2Ha</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="personal_farm4">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់               : 0.60 Ha < ផ្ទៃក្រឡា    ≤ 1.2 Ha  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               : 1 ha < ផ្ទៃក្រឡា  ≤ 2 Ha</p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            : 1.5 Ha <ផ្ទៃក្រឡា    ≤ 3 Ha </p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់        : 2 ha < ផ្ទៃក្រឡា  ≤ 3.5 Ha </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="personal_farm0">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់              : ផ្ទៃក្រឡា  >  1.2 Ha   </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               :  ផ្ទៃក្រឡា    > 2 Ha  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            :  ផ្ទៃក្រឡា    > 3 Ha </p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់        :  ផ្ទៃក្រឡា    > 3.5 Ha </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var personal_farm = $('#personal_farm').val();
		                  	if(personal_farm == 6){
		                  		$('#personal_farm6').addClass('my_bg_score');
		                  	}else if(personal_farm == 4){
		                  		$('#personal_farm4').addClass('my_bg_score');
		                  	}else{
		                  		$('#personal_farm0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<p style="font-weight: bold;">- 7.A.2 B  ផ្ទៃដីកសិកម្ម មិនមែនជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</p>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->other_farm}}" id="other_farm" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="other_farm6">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់              : ផ្ទៃក្រឡា  ≤ 1 Ha </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               : ផ្ទៃក្រឡា  ≤ 1.5Ha</p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            : ផ្ទៃក្រឡា  ≤ 2.2Ha</p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់        : ផ្ទៃក្រឡា  ≤ 3Ha</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">6</span></td>
			                  		</tr>
			                  		<tr id="other_farm4">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់               : 1 Ha < ផ្ទៃក្រឡា    ≤ 2 Ha  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               : 1.5 ha < ផ្ទៃក្រឡា  ≤ 3 Ha</p>
			                  				<p>-ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            : 2.2 Ha <ផ្ទៃក្រឡា    ≤ 4 Ha </p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់        : 3 ha < ផ្ទៃក្រឡា  ≤ 5 Ha </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="other_farm0">
			                  			<td>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ១-៣នាក់              : ផ្ទៃក្រឡា  >  2 Ha  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៤-៦នាក់               :  ផ្ទៃក្រឡា    > 3 Ha</p>
			                  				<p>- ចំពោះចំនួនមនុស្សពី ៧-១០នាក់            :  ផ្ទៃក្រឡា    > 4 Ha  </p>
			                  				<p>- ចំពោះចំនួនមនុស្សលើសពី១០នាក់        :  ផ្ទៃក្រឡា    > 5 Ha </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var other_farm = $('#other_farm').val();
		                  	if(other_farm == 6){
		                  		$('#other_farm6').addClass('my_bg_score');
		                  	}else if(other_farm == 4){
		                  		$('#other_farm4').addClass('my_bg_score');
		                  	}else{
		                  		$('#other_farm0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<P style="font-weight: bold;">- 7.B.1   ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមានចំណូលពីសកម្មភាពកសិកម្ម</P>
	                  	<p style="font-weight: bold;">(ប្រាក់ចំណូលប្រចាំខែ  ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ)</p>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->income_out_farmer}}" id="income_out_farmer" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="income_out_farmer4">
			                  			<td>
			                  				<p>- តិចជាង 40 000 រៀល</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="income_out_farmer2">
			                  			<td>
			                  				<p>- ចន្លោះពី  40 000 រៀល - 70 000រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2</span></td>
			                  		</tr>
			                  		<tr id="income_out_farmer0">
			                  			<td>
			                  				<p>- ចន្លោះពី    70 000 រៀល - 100 000 រៀល </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  		<tr id="income_out_farmer-3">
			                  			<td>
			                  				<p>- ចន្លោះពី  100 000 រៀល - 125 000រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">-3</span></td>
			                  		</tr>
			                  		<tr id="income_out_farmer-6">
			                  			<td>
			                  				<p>- ចន្លោះពី  125 000 រៀល - 150 000 រៀល </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">-6</span></td>
			                  		</tr>
			                  		<tr id="income_out_farmer-9">
			                  			<td>
			                  				<p>- ចន្លោះពី  150 000 រៀល - 175 000 រៀល </p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">-9</span></td>
			                  		</tr>
			                  		<tr id="income_out_farmer-12">
			                  			<td>
			                  				<p>- ច្រើនជាង 200 000 រៀល</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">-12</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var income_out_farmer = $('#income_out_farmer').val();
		                  	if(income_out_farmer == 4){
		                  		$('#income_out_farmer4').addClass('my_bg_score');
		                  	}else if(income_out_farmer == 2){
		                  		$('#income_out_farmer2').addClass('my_bg_score');
		                  	}else if(income_out_farmer == -3){
		                  		$('#income_out_farmer-3').addClass('my_bg_score');
		                  	}else if(income_out_farmer == -6){
		                  		$('#income_out_farmer-6').addClass('my_bg_score');
		                  	}else if(income_out_farmer == -9){
		                  		$('#income_out_farmer-9').addClass('my_bg_score');
		                  	}else if(income_out_farmer == -12){
		                  		$('#income_out_farmer-12').addClass('my_bg_score');
		                  	}else{
		                  		$('#income_out_farmer0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<P style="font-weight: bold;">- 7.B.2  ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្ម</P>
	                  	<p style="font-weight: bold;">(ប្រាក់ចំណូលប្រចាំខែ  ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ)</p>
	                  		<p style="padding: 5px;">
	                  				<input type="text" value="11" id="income_out_not_farmer" name="">
			                  	   	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="income_out_not_farmer16">
			                  			<td>
			                  				<p>-ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ៖
សម្រាប់រាជធានីភ្នំពេញ= តិចជាង165.000 រៀល
,សម្រាប់តំបន់ទីប្រជុំជនដទៃទៀត= តិចជាង138.000 រៀល
,សម្រាប់ទីជនបទ = តិចជាង 110 000 រៀល

</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">16</span></td>
			                  		</tr>
			                  		<tr id="income_out_not_farmer11">
			                  			<td>
			                  				<p>- ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ៖
សម្រាប់រាជធានីភ្នំពេញ= ចន្លោះពី 165.100រៀល- 336 000រៀល
,សម្រាប់តំបន់ទីប្រជុំជនដទៃទៀត= ចន្លោះពី 138.100 រៀល- 231.000រៀល
,សម្រាប់ទីជនបទ =  ចន្លោះពី 110. 100 រៀល-180.000រៀល
</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">11</span></td>
			                  		</tr>
			                  		<tr id="income_out_not_farmer5">
			                  			<td>
			                  				<p>-	ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ៖
សម្រាប់រាជធានីភ្នំពេញ= ចន្លោះពី  336 100រៀល -400.000រៀល
,សម្រាប់តំបន់ទីប្រជុំជនដទៃទៀត= ចន្លោះពី  231.100រៀល - 300.000រៀល
,សម្រាប់ទីជនបទ =  ចន្លោះពី180.100រៀល - 230.000រៀល
</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">5</span></td>
			                  		</tr>
			                  		<tr id="income_out_not_farmer0">
			                  			<td>
			                  				<p>-	ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ៖
សម្រាប់រាជធានីភ្នំពេញ= ច្រើនជាង  400.100រៀល
,សម្រាប់តំបន់ទីប្រជុំជនដទៃទៀត= ច្រើនជាង 300.100រៀល
,សម្រាប់ទីជនបទ =  ច្រើនជាង 230.100រៀល
</p>
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var income_out_not_farmer = $('#income_out_not_farmer').val();

		                  	if(income_out_not_farmer == 16){
		                  		$('#income_out_not_farmer16').addClass('my_bg_score');
		                  	}else if(income_out_not_farmer == 11){
		                  		$('#income_out_not_farmer11').addClass('my_bg_score');
		                  	}else if(income_out_not_farmer == 5){
		                  		$('#income_out_not_farmer5').addClass('my_bg_score');
		                  	}else{
		                  		$('#income_out_not_farmer0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  	<p style="font-weight: bold;">- 7. C កុមារ(អាយុក្រោម 1៨ឆ្នាំ )រកចំណូល</p>
	                  	<p style="padding: 5px;">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr style="background: #ccc;">
			                  			<td>
			                  				<p>សរុបចំនួនកុមារអាយុក្រោម១៨ឆ្នាំរកចំណូលឲ្យគ្រួសារ (ចំនួនកុមាររកចំណូល x 2ពិន្ទុ)</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">{{$value->income_child}}</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>8.ជំងឺ ,របួសនិងពិការភាព</h4>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->disease}}" id="disease" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="disease10">
			                  			<td>
			                  				<p>-	សមាជិកគ្រួសារយ៉ាងតិច២នាក់ អាយុក្រោម៦៥ឆ្នាំ(<65) បាត់បង់លទ្ធភាពពលកម្ម ស្ទើរទាំងស្រុង(មិនអាចរកប្រាក់ចំណូល/មិនអាចរៀនបាន) </p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">10</span></td>
			                  		</tr>
			                  		<tr id="disease7">
			                  			<td>
			                  				<p>-	សមាជិកគ្រួសារ ១នាក់ អាយុក្រោម៦៥ឆ្នាំ (<65) បាត់បង់លទ្ធភាពពលកម្មស្ទើរទាំងស្រុង ឬ   
<br>-	សមាជិកគ្រួសារយ៉ាងតិច ២នាក់ អាយុក្រោម ៦៥ឆ្នាំ(<65)  បាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % 
</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">7</span></td>
			                  		</tr>
			                  		<tr id="disease4">
			                  			<td>
			                  				<p>-	សមាជិកគ្រួសារ ១នាក់ អាយុក្រោម ៦៥ឆ្នាំ(<65) បាត់បង់លទ្ធភាពពលកម្មប្រហែល៥០ % ឬ
<br>-	សមាជិកគ្រួសារយ៉ាងតិច 1នាក់ អាយុ ៦៥ឆ្នាំឡើង បាត់បង់លទ្ធភាពពលកម្ម ស្ទើរទាំងស្រុង
</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="disease0">
			                  			<td>
			                  				<p>-	គ្មានសមាជិកគ្រួសារណាម្នាក់អាយុក្រោម ៦៥ឆ្នាំ(<65) មានជំងឺរ៉ាំរ៉ៃ/ពិការភាពធ្ងន់ធ្ងរឡើយ។ ឬ
<br>-	មានសមាជិកគ្រួសារ អាយុ ៦៥ឆ្នាំឡើង បាត់បង់លទ្ធភាពពលកម្ម ត្រឹមប្រហែល៥០ %ប៉ុណ្ណោះ
</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var disease = $('#disease').val();
		                  	if(disease == 10){
		                  		$('#disease10').addClass('my_bg_score');
		                  	}else if(disease == 7){
		                  		$('#disease7').addClass('my_bg_score');
		                  	}else if(disease == 4){
		                  		$('#disease4').addClass('my_bg_score');
		                  	}else if(disease == 0){
		                  		$('#disease0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>9. បំណុលរបស់គ្រួសារ</h4>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->debt}}" id="debt" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="debt3">
			                  			<td>
			                  				<p>-	គ្រួសារនេះមិនអាចខ្ចីប្រាក់គេសូម្បីតែ​​ ៤០០០០០​​ រៀល ក៏មិនបាន
<br>-	គ្រួសារនេះ មានបំណុល ច្រើនជាង  1.200.100រៀល
 </p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">3</span></td>
			                  		</tr>
			                  		<tr id="debt2">
			                  			<td>
			                  				<p>-	គ្រួសារនេះមិនអាចខ្ចីប្រាក់គេចន្លោះពី ៤០០០០០​​ រៀល - ៨០០០០០​​ រៀល
<br>-	គ្រួសារនេះមានបំណុល ចន្លោះពី  600.000 រៀល- 1.200.000រៀល

</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2</span></td>
			                  		</tr>
			                  		<tr id="debt0">
			                  			<td>
			                  				<p>-	គ្រួសារនេះមិនមានជាប់បំណុលគេ
<br>-	គ្រួសារនេះមានបំណុល តិចជាង  600.000 រៀល

</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var debt = $('#debt').val();
		                  	if(debt == 3){
		                  		$('#debt3').addClass('my_bg_score');
		                  	}else if(debt == 2){
		                  		$('#debt2').addClass('my_bg_score');
		                  	}else{
		                  		$('#debt0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>10.  ការអប់រំ (មើលចម្លើយនៅក្នុងតារាងផ្នែក ខ)</h4>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->edu}}"  id="edu" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="edu4">
			                  			<td>
			                  				<p>គ្រួសារដែលបំពេញតាមលក្ខខណ្ឌវិនិច្ឆ័យ ១ ក្នុងចំណោម ៣ខាងក្រោម៖
<br>-	មេគ្រួសារ ឬ ប្តីប្រពន្ធ មិនបានរៀនសោះ ឬ មានកម្រិតវប្បធម៌ត្រឹមថ្នាក់ទី1 – 3
<br>-	យ៉ាងហោចណាស់មានកុមារម្នាក់(១៦ឆ្នាំឡើង)មានកម្រិតវប្បធម៌ត្រឹមថ្នាក់ទី 1-3 
<br>-	យ៉ាងហោចណាស់មានក្មេង ២នាក់ (ដែលមានអាយុក្រោម16ឆ្នាំ) មិនបានចូលរៀនឬ បោះបង់ចោលសាលា ។

 </p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="edu2">
			                  			<td>
			                  				<p>គ្រួសារដែលបំពេញតាមលក្ខខណ្ឌវិនិច្ឆ័យ ១ ក្នុងចំណោម ៣ខាងក្រោម៖
<br>-	មេគ្រួសារ ឬ ប្តីប្រពន្ធ មិនបានរៀនសោះ ឬ មានកម្រិតវប្បធម៌ត្រឹមថ្នាក់ទី4 – 6
<br>-	យ៉ាងហោចណាស់មានកុមារម្នាក់(១៦ឆ្នាំឡើង)មានកម្រិតវប្បធម៌ត្រឹមថ្នាក់ទី4-6 
<br>-	យ៉ាងហោចណាស់មានក្មេង 1នាក់ (ដែលមានអាយុក្រោម16ឆ្នាំ) មិនបានចូលរៀនឬ បោះបង់ចោលសាលា ។


</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2.5</span></td>
			                  		</tr>
			                  		<tr id="edu0">
			                  			<td>
			                  				<p>- គ្រួសារមិនស្របតាមលក្ខខណ្ឌវិនិច្ឆ័យណាមួយដូចខាងលើ

</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var edu = $('#edu').val();
		                  	if(edu == 4){
		                  		$('#edu4').addClass('my_bg_score');
		                  	}else if(edu == 2.5){
		                  		$('#edu2').addClass('my_bg_score');
		                  	}else{
		                  		$('#edu0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>11. វ័យពលកម្ម (ចន្លោះពី1៨ឆ្នាំដល់៦៥ឆ្នាំ) </h4>
	                  	<p style="padding: 5px;">
	                  			<input type="hidden" value="{{$value->age_action}}" id="age_action" name="">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
	                    				<th>ចំណាត់ថ្នាក់</th>
	                    				<th style="text-align: center;">ពិន្ទុ</th>
			                  		</tr>
			                  		<tr id="age_action4">
			                  			<td>
			                  				<p>លទ្ធផល ≤ 0,33
 </p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">4</span></td>
			                  		</tr>
			                  		<tr id="age_action2">
			                  			<td>
			                  				<p>0,33 <    លទ្ធផល   < 0,66


</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">2.5</span></td>
			                  		</tr>
			                  		<tr id="age_action0">
			                  			<td>
			                  				<p>0,66  ≤ លទ្ធផល   ≥ 0

</p> 
			                  			</td>
			                  			<td width="30%" align="center"><span class="score-num">0</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
		                  <script type="text/javascript">
		                  	var age_action = $('#age_action').val();
		                  	if(age_action == 4){
		                  		$('#age_action4').addClass('my_bg_score');
		                  	}else if(age_action == 2.5){
		                  		$('#age_action2').addClass('my_bg_score');
		                  	}else{
		                  		$('#age_action0').addClass('my_bg_score');
		                  	}
		                  </script>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<p style="padding: 5px;">
			                  	<table id="datatable1" class="table table-bordered">
			                  		<tr style="background: #f9f3f3;">
									    @php $total = $value->total @endphp
							  			@if($total > 85)
											<th style="text-align: center;"><span class="score-num">ពិន្ទុសរុប</span></th>
											<th style="text-align: center;"><span class="score-num">(85)​ ពិន្ទុ</span></th>
										@else
											<th style="text-align: center;"><span class="score-num">ពិន្ទុសរុប</span></th>
											<th style="text-align: center;"><span class="score-num">({{$total}})​ ពិន្ទុ</span></th>
										@endif
			                  		</tr>
			                  		<tr style="background: #f9f3f3;">
	                    				<th style="text-align: center;"><span class="score-num">លទ្ធផល</span></th>
	                    				<td style="text-align: center;">
	                    					<input type="hidden" value="{{$value->total}}" id="result" class="form-control">
	                    					<span class="score-num" id="a">កំរិតក្រីក្រ១</span>
	                    					<span class="score-num" id="b">កំរិតក្រីក្រ២​ ឬ​ ងាយរងគ្រោះ</span>
	                    					<span class="score-num" id ="c">មិនជាប់ជាគ្រួសារក្រីក្រ</span>
	                    				</td>
			                  		</tr>
			                  		<script type="text/javascript">
			                  			var total = $('#result').val();
			                  			if(total > 0 && total < 42){
			                  				$('#a').hide();
				                  			$('#b').hide();
				                  			$('#c').show();
			                  			}else if(total > 41 && total < 59){
			                  				$('#a').hide();
				                  			$('#b').show();
				                  			$('#c').hide();
			                  			}else if(total > 58){
			                  				$('#a').show();
				                  			$('#b').hide();
				                  			$('#c').hide();
			                  			}else{
			                  				$('#a').hide();
				                  			$('#b').hide();
				                  			$('#c').hide();
			                  			}
			                  		</script>
			                  	</table>
		                  </p>
	                  </div>
	            @endforeach
                </div>
            </div>
        </div>
	</div>
@endsection