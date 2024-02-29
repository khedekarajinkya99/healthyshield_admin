@include('includes/header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Add Role</h2>
					</div>
				</div>
				<!-- end col -->
				<div class="col-md-6">
					<div class="breadcrumb-wrapper">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="{{ url('dashboard') }}">Dashboard</a>
								</li>
								<li class="breadcrumb-item"><a href="{{ url('roles') }}">Role</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Create Role
								</li>
							</ol>
						</nav>
					</div>
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- ========== title-wrapper end ========== -->
		@if (Session::has('error'))
		<div class="alert alert-danger" role="alert">{{ session::get('error') }}</div>
		@endif

		@if (Session::has('success'))
		<div class="alert alert-success" role="alert">{{ session::get('success') }}</div>
		@endif
		<!-- ========== form-elements-wrapper start ========== -->
		<div class="form-elements-wrapper">
			<form action="{{ url('roleCreate') }}" method="POST">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
							<div class="input-style-1">
								<label>Name</label>
								<input type="text" placeholder="Name" name="roleName" required autocomplete="off" />
							</div>
							@error('roleName')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror
							<!-- end input -->
							<div class="input-style-1">
								<label>Display Name</label>
								<input type="text" placeholder="Display Name" name="displayName" required autocomplete="off" />
							</div>
							@error('displayName')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror
							<!-- end input -->
							
							<ul>
								@foreach ($permissions as $key => $value)
									<li>
										{{ $value->name }}

										<div class="form-check radio-style mb-20">
											<input class="form-check-input" type="radio" value="2" name="{{ $value->name }}_{{ $key }}" id="read-{{ $key }}" required />
											<label class="form-check-label" for="read-{{ $key }}">Read</label>
										</div>

										<div class="form-check radio-style mb-20">
											<input class="form-check-input" type="radio" value="3" name="{{ $value->name }}_{{ $key }}" id="write-{{ $key }}" />
											<label class="form-check-label" for="write-{{ $key }}">Read And Write</label>
										</div>
									</li>
								@endforeach
								
							</ul>

							<div class="button-group">
								<button type="submit" class="main-btn primary-btn btn-hover">Submit</button>
							</div>
						</div>
						<!-- end card -->
					</div>
					<!-- end col -->
				</div>
			</form>
			<!-- end row -->
		</div>
		<!-- ========== form-elements-wrapper end ========== -->
	</div>
	<!-- end container -->
</section>

@include('includes/footer')