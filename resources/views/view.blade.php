@extends('layouts.app')

@section('content')
	<div class="container content">
		<div class="row setup-content" id="step-1">
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 style="text-align: center;"><b>កាធ្វើអត្តសញ្ញាណកម្មគ្រួសារក្រីក្រនៅមន្ទីរពេទ្យ</b></h3>
                    <p style="text-align: center; font-size: 16px;">តារាងបង្ហាញការវាយតម្លៃ/ដាក់ពិន្ទុលើបញ្ជីសំណួរសម្ភាសន៍នៅមន្ទីរពេទ្យរបស់អ្នកជំងឺ</p>
                    <div class="col-sm-12"><hr> </div>
                    <div class="col-md-12">
                        <h4>- ព័ត៌មានទូទៅ</h4>
                    </div>

                    <div class="col-sm-12">
                    	<div class="col-sm-6"></div>
                    	<div class="col-sm-6">
                    		<table class="pull-right">
	                            <tr>
	                                <td width="35%"><label class="control-label">លេខកូដសម្ភាសន៍:</label></td>
	                                <td width="65%">
	                                    <div class="form-group">    
	                                        <input maxlength="100" name="interview_code" type="text" required="required" class="form-control" />
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
	                                        <input  maxlength="100" name="g_patient" type="text" required="required" class="form-control" />
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label"> ភេទ : </label></td>
	                                <td width="65%">
	                                   <div class="form-group"  id="g_sex">
	                                       @foreach($gender as $key => $g)
	                                        <label>{{$g->name_kh}} <input name="g_sex" value="{{$g->id}}" style="margin-right:10px;" type="radio"></label>
	                                       @endforeach
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
	                                        <input  maxlength="100" name="g_age" type="text" required="required" class="form-control"/>
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">លេខទូរស័ព្ធ :</label></td>
	                                <td width="65%">
	                                   <div class="form-group">
	                                        <input  maxlength="100" name="g_phone" type="text" required="required" class="form-control" />
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
	                                       <input  maxlength="100" name="pro" type="text" required="required" class="form-control" />
	                                    </div>     
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">   ស្រុក : </label></td>
	                                <td width="65%">
	                                   <div class="form-group g_district">
	                                      <input  maxlength="100" name="pro" type="text" required="required" class="form-control" />
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
	                                        <input  maxlength="100" name="pro" type="text" required="required" class="form-control" />
	                                    </div>
	                                </td>
	                            </tr>
	                            <tr>
	                                <td width="35%"><label class="control-label">ភូមិ :</label></td>
	                                <td width="65%">
	                                    <div class="form-group g_village">
	                                        <input  maxlength="100" name="pro" type="text" required="required" class="form-control" />
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
	                                       <textarea class="form-control" id="location" name="g_local_village" required="required"></textarea>
	                                    </div>
	                                </td>
	                            </tr>
	                        </table>
	                    </div>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>1.អំពីទំហំផ្ទះ ធៀបសមាជិកគ្រួសារ</h4>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>2.បង្គន់អនាម័យ (ចាក់ទឹក/ស្ងួត)</h4>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
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
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 3A 2:   ស្ថានភាពជញ្ជាំងផ្ទះ (សម្រាប់គ្រួសារដែលរស់នៅផ្ទាស់ខ្លួនតែប៉ុណ្ណោះ)</p>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 3A 3 : ស្ថានភាពទូទៅរបស់ផ្ទះ </p>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 3B   គ្រួសារដែលនៅផ្ទះជួលគេ     តម្លៃជួលផ្ទះ (ប្រើសម្រាប់តែគ្រួសារដែលជួលផ្ទះគេ)</p>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                    </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>4.ទ្រព្យសម្បត្តិសំភារៈប្រើប្រាស់អេឡិចត្រូនិចរបស់គ្រួសារ </h4>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                    </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>5.អគ្គិសនីប្រើប្រាស់</h4>
	                  	<p>- 5A.  គ្រួសារដែលបានតបណ្តាញអគ្គីសនីប្រើប្រាស់ </p>
	                  	
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  	</p>
	                  	<p>- 5B. គ្រួសារដែលមិនបានតបណ្តាញអគ្គីសនីប្រើប្រាស់</p>
	                  	
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  	</p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>6.អំពីយានជំនិះរបស់គ្រួសារ</h4>
	                  	
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
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
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 7.A. 2A ផ្ទៃដីកសិកម្ម ជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</p>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 7.A.2 B  ផ្ទៃដីកសិកម្ម មិនមែនជាទ្រព្យសម្បត្តិផ្ទាល់ខ្លួន</p>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<P>- 7.B.1   ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមានចំណូលពីសកម្មភាពកសិកម្ម</P>
	                  	<p>(ប្រាក់ចំណូលប្រចាំខែ  ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ)</p>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<P>- 7.B.2  ប្រាក់ចំណូលក្រៅពីកសិកម្ម សំរាប់គ្រួសារមិនមានចំណូលពីសកម្មភាពកសិកម្ម</P>
	                  	<p>(ប្រាក់ចំណូលប្រចាំខែ  ចំណូលមធ្យមប្រចាំខែរបស់សមាជិកគ្រួសារម្នាក់ៗ)</p>
	                  		<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  	<p>- 7. C កុមារ(អាយុក្រោម 1៨ឆ្នាំ )រកចំណូល</p>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>8.ជំងឺ ,របួសនិងពិការភាព</h4>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>9. បំណុលរបស់គ្រួសារ</h4>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>10.  ការអប់រំ (មើលចម្លើយនៅក្នុងតារាងផ្នែក ខ)</h4>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
	                  <div class="col-sm-12"><hr></div>
	                  <div class="col-md-12">
	                  	<h4>11. វ័យពលកម្ម (ចន្លោះពី1៨ឆ្នាំដល់៦៥ឆ្នាំ) </h4>
	                  	<p style="padding: 5px;">
			                  	<table width="30%">
			                  		<tr>
			                  			<td width="20%"><label>ចំនួនពិន្ទុ :</label></td>
			                  			<td width="30%"><input type="text" name="house_size" value="5"​ class="form-control"></td>
			                  			<td><span>ពិន្ទុ</span></td>
			                  		</tr>
			                  	</table>
		                  </p>
	                  </div>
                </div>
            </div>
        </div>
	</div>
@endsection