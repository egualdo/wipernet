@extends('panel.layouts.simple.master')
@section('title', 'Form Wizard 3')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Form Wizard With Icon</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Form Layout</li>
<li class="breadcrumb-item active">Form Wizard With Icon</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>Form Wizard with icon</h5>
				</div>
				<div class="card-body">
					<form class="f1" method="post">
						@csrf
						<div class="f1-steps">
							<div class="f1-progress">
								<div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"></div>
							</div>
							<div class="f1-step active">
								<div class="f1-step-icon"><i class="fa fa-user"></i></div>
								<p>Registration</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-key"></i></div>
								<p>Email</p>
							</div>
							<div class="f1-step">
								<div class="f1-step-icon"><i class="fa fa-twitter"></i></div>
								<p>Birth Date</p>
							</div>
						</div>
						<fieldset>
							<div class="mb-3 mb-2">
								<label for="f1-first-name">First Name</label>
								<input class="form-control" id="f1-first-name" type="text" name="f1-first-name" placeholder="name@example.com" required="">
							</div>
							<div class="mb-3 mb-2">
								<label for="f1-last-name">Last name</label>
								<input class="f1-last-name form-control" id="f1-last-name" type="text" name="f1-last-name" placeholder="Last name..." required="">
							</div>
							<div class="f1-buttons">
								<button class="btn btn-primary btn-next" type="button">Next</button>
							</div>
						</fieldset>
						<fieldset>
							<div class="mb-3 mb-2">
								<label class="sr-only" for="f1-email">Email</label>
								<input class="f1-email form-control" id="f1-email" type="text" name="f1-email" placeholder="Email..." required="">
							</div>
							<div class="mb-3 mb-2">
								<label class="sr-only" for="f1-password">Password</label>
								<input class="f1-password form-control" id="f1-password" type="password" name="f1-password" placeholder="Password..." required="">
							</div>
							<div class="mb-3 mb-2">
								<label class="sr-only" for="f1-repeat-password">Repeat password</label>
								<input class="f1-repeat-password form-control" id="f1-repeat-password" type="password" name="f1-repeat-password" placeholder="Repeat password..." required="">
							</div>
							<div class="f1-buttons">
								<button class="btn btn-primary btn-previous" type="button">Previous</button>
								<button class="btn btn-primary btn-next" type="button">Next</button>
							</div>
						</fieldset>
						<fieldset>
							<div class="mb-3 mb-2">
								<label class="sr-only">DD</label>
								<input class="form-control" id="dd" type="number" placeholder="dd" required="">
							</div>
							<div class="mb-3 mb-2">
								<label class="sr-only">MM</label>
								<input class="form-control" id="mm" type="number" placeholder="mm" required="">
							</div>
							<div class="mb-3 mb-2">
								<label class="sr-only">YYYY</label>
								<input class="form-control" id="yyyy" type="number" placeholder="yyyy" required="">
							</div>
							<div class="f1-buttons">
								<button class="btn btn-primary btn-previous" type="button">Previous</button>
								<button class="btn btn-primary btn-submit" type="submit">Submit</button>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/form-wizard/form-wizard-three.js')}}"></script>
<script src="{{asset('assets/js/form-wizard/jquery.backstretch.min.js')}}"></script>
@endsection