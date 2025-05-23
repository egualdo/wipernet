@extends('panel.layouts.simple.master')
@section('title', 'Select2')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Select2</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Form Widgets</li>
<li class="breadcrumb-item active">Select2</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="select2-drpdwn">
		<div class="row">
			<!-- Default Textbox start-->
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Select-2</h5>
					</div>
					<div class="card-body o-hidden">
						<div class="mb-2">
							<div class="col-form-label">Default Placeholder</div>
							<select class="js-example-placeholder-multiple col-sm-12" multiple="multiple">
								<option value="AL">Alabama</option>
								<option value="WY">Wyoming</option>
								<option value="WY">Coming</option>
								<option value="WY">Hanry Die</option>
								<option value="WY">John Doe</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Select2 single select</div>
							<select class="js-example-basic-single col-sm-12">
								<optgroup label="Developer">
									<option value="AL">Alabama</option>
									<option value="WY">Wyoming</option>
								</optgroup>
								<optgroup label="Designer">
									<option value="WY">Peter</option>
									<option value="WY">Hanry Die</option>
									<option value="WY">John Doe</option>
								</optgroup>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Select2 multi select</div>
							<select class="js-example-basic-multiple col-sm-12" multiple="multiple">
								<option value="AL">Alabama</option>
								<option value="WY">Wyoming</option>
								<option value="WY">Coming</option>
								<option value="WY">Hanry Die</option>
								<option value="WY">John Doe</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">RTL support</div>
							<select class="js-example-rtl col-sm-12" multiple="multiple">
								<option value="AL">Alabama</option>
								<option value="WY">Wyoming</option>
								<option value="WY">Coming</option>
								<option value="WY">Hanry Die</option>
								<option value="WY">John Doe</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Limiting The Number Of Selections</div>
							<select class="js-example-basic-multiple-limit col-sm-12" multiple="multiple">
								<option value="AL">Alabama</option>
								<option value="WY">Wyoming</option>
								<option value="WY">Coming</option>
								<option value="WY">Hanry Die</option>
								<option value="WY">John Doe</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Disabled Results</div>
							<select class="js-example-disabled-results col-sm-12">
								<option value="one">First</option>
								<option value="two" disabled="disabled">
									Second
									(disabled)
								</option>
								<option value="three">Third</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Hiding The Search Box</div>
							<select class="js-example-basic-hide-search col-sm-12" multiple="multiple">
								<optgroup label="Developer">
									<option value="AL">Smith</option>
									<option value="WY">Peter</option>
									<option value="WY">James</option>
									<option value="WY">Hanry Die</option>
									<option value="WY">John Doe</option>
									<option value="WY">Harry Poter</option>
								</optgroup>
							</select>
						</div>
						<div>
							<div class="col-form-label">Enable-Disable</div>
							<select class="js-example-disabled col-sm-10">
								<option value="AL">Smith</option>
								<option value="WY">Peter</option>
								<option value="WY">James</option>
								<option value="WY">Hanry Die</option>
								<option value="WY">John Doe</option>
								<option value="WY">Harry Poter</option>
							</select>
							<button class="btn btn-primary js-programmatic-enable p-2 mt-2">Enable</button>
							<button class="btn btn-danger js-programmatic-disable p-2 mt-2">Disable</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Default Textbox end-->
			<!-- Input Groups start-->
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Outline Color Variant</h5>
					</div>
					<div class="card-body">
						<div class="mb-2">
							<div class="col-form-label">Primary Select</div>
							<select class="form-select form-control-primary" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Secondary Select</div>
							<select class="form-select form-control-secondary" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Success Select</div>
							<select class="form-select form-control-success" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Info Select</div>
							<select class="form-select form-control-info" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Warning Select</div>
							<select class="form-select form-control-warning" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Danger Select</div>
							<select class="form-select form-control-danger" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div>
							<div class="col-form-label">Inverse Select</div>
							<select class="form-select form-control-inverse" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Full Colored Variant</h5>
					</div>
					<div class="card-body">
						<div class="mb-2">
							<div class="col-form-label">Primary Select</div>
							<select class="form-select form-control-primary-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Secondary Select</div>
							<select class="form-select form-control-secondary-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Success Select</div>
							<select class="form-select form-control-success-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Info Select</div>
							<select class="form-select form-control-info-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Warning Select</div>
							<select class="form-select form-control-warning-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div class="mb-2">
							<div class="col-form-label">Danger Select</div>
							<select class="form-select form-control-danger-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
						<div>
							<div class="col-form-label">Inverse Select</div>
							<select class="form-select form-control-inverse-fill" name="select">
								<option value="opt1">Select One Value Only</option>
								<option value="opt2">Type 2</option>
								<option value="opt3">Type 3</option>
								<option value="opt4">Type 4</option>
								<option value="opt5">Type 5</option>
								<option value="opt6">Type 6</option>
								<option value="opt7">Type 7</option>
								<option value="opt8">Type 8</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- Input Groups end-->
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection