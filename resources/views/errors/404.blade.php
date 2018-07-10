@section('title','Error 404')
@extends('layouts.app')
@section('content')


	<style type="text/css">
		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }
		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}
		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}
		#container {
			margin: 0 auto;
			text-align: center;
			margin-top: 30px;
		}
		p {
			margin: 12px 15px 12px 15px;
		}
	</style>
	<div class="container">
		<div id="container">
			<h1>404 ទំព័ររកមិនឃើញ</h1>
			<p>ទំព័រដែលអ្នកបានស្នើមិនត្រូវបានរកឃើញ។<a href="{{url('/')}}">Click Go Back</a></p>
		</div>
	</div>

@endsection




