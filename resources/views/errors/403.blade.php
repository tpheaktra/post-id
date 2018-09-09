@section('title','Error 403')
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
			margin-top: 180px;
			margin-bottom: 180px;
		}
		p {
			margin: 12px 15px 12px 15px;
		}
	</style>
	<div class="container">
		<div id="container">
			<h1> សូមទោសអ្នកមិនមានការអនុញ្ញាតចូលប្រព័ន្ធ </h1>
			<p>you can't requested the url. <a href="{{url('/')}}">Click Go Back</a></p>
		</div>
	</div>





@endsection