@include('includes/header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>View Role <a href="{{ url('roles') }}" class="btn btn-sm btn-danger">Back</a></h2>
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
									View Role
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
		<!-- ========== form-elements-wrapper start ========== -->
		<div class="form-elements-wrapper">
			<div class="row">
				<div class="col-lg-6">
					<!-- input style start -->
					<div class="card-style mb-30">
						<div class="input-style-1">
							<label>Name</label>
							<input type="text" name="" disabled value="{{ isset($role->name) ? $role->name : '' }}"/>
						</div>
						<!-- end input -->
						<div class="input-style-1">
							<label>Display Name</label>
							<input type="text" disabled value="{{ isset($role->display_name) ? $role->display_name : '' }}" />
						</div>
						<!-- end input -->
					</div>
					<!-- end card -->
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- ========== form-elements-wrapper end ========== -->
	</div>
	<!-- end container -->
</section>

@include('includes/footer')