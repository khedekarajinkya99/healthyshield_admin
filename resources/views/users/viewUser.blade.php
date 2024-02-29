@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>View User <a href="{{ url('listUser') }}" class="btn btn-sm btn-success">Back</a></h2>
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
								<li class="breadcrumb-item"><a href="{{ url('listUser') }}">Users</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									View User
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
			<div class="row">
				<div class="col-lg-6">
					<!-- input style start -->
					<div class="card-style mb-30">
						<div class="input-style-1">
							<label>Name</label>
							<input type="text" value="{{ $user->name }}" disabled />
						</div>
						
						<!-- end input -->
						<div class="input-style-1">
							<label>Email</label>
							<input type="email" value="{{ $user->email }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Role</label>
							<input type="text" value="{{ $user->role->display_name }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Language</label>
							<input type="test" value="{{ $user->language->display_name }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Avatar</label>
							<img src="{{ asset('uploads/avatars') }}/{{ $user->profile }}" width="150px" height="150px">
						</div>
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

@include('includes.footer')