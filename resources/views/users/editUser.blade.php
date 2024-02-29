@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Edit User</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('listUser') }}">List Users</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Edit User
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
			<form action="{{ url('userCreate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
							<div class="input-style-1">
								<label>Name</label>
								<input type="text" placeholder="Name" name="name" required autocomplete="off" value="{{ $user->name }}" />
							</div>
							@error('name')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror
							<!-- end input -->
							<div class="input-style-1">
								<label>Email</label>
								<input type="email" placeholder="Email" name="email" required autocomplete="off" value="{{ $user->email }}" />
							</div>
							@error('email')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Password</label>
								<input type="password" placeholder="Password" name="password" autocomplete="off"/>
							</div>
							@error('password')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Roles</label>
			                    <div class="select-position">
			                    	<select name="role" required>
			                        	<option value="">Select Role</option>
			                        	@foreach ($role as $val)
			                        	<option value="{{ $val->id }}" @if($val->id == $user->role_id) selected @endif>{{ $val->display_name }}</option>
			                        	@endforeach
			                      	</select>
			                    </div>
			                 </div>
			                 @error('role')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Language</label>
			                    <div class="select-position">
			                    	<select name="language" required>
			                        	<option value="">Select Language</option>
			                        	@foreach ($language as $val)
			                        	<option value="{{ $val->id }}" @if($val->id == $user->language_id) selected @endif>{{ $val->display_name }}</option>
			                        	@endforeach
			                      	</select>
			                    </div>
			                 </div>
			                @error('language')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

							<div class="input-style-1">
								<img src="{{ asset('uploads/avatars') }}/{{ $user->profile }}" width="150px" height="150px">
							</div>    

	                        <div class="input-style-1">
								<label>Avatar</label>
								<input type="file" name="avatar" autocomplete="off" />
							</div>
							@error('avatar')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <input type="hidden" name="id" value="{{ $user->id }}">
							<!-- end input -->
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

@include('includes.footer')