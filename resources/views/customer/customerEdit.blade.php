@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Edit Customer</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('customers') }}">List Categories</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Edit Customer
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
			<form action="{{ url('customerCreate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
	                        <div class="input-style-1">
								<label>Customer Name</label>
								<input type="text" placeholder="Customer Name" name="customer_name" required autocomplete="off" value="{{ $customer->customer_name }}" />
							</div>
							@error('customer_name')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

                            <input type="hidden" name="id" value="{{ $customer->id }}">

	                        <div class="input-style-1">
								<label>Customer Email</label>
								<input type="email" placeholder="Customer Email" name="customer_email" required autocomplete="off" value="{{ $customer->customer_email }}" />
							</div>
							@error('customer_email')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

                            <div class="input-style-1">
								<label>Customer Contact Number</label>
								<input type="number" placeholder="Customer Number" name="customer_contact" required autocomplete="off" value="{{ $customer->customer_contact }}" />
							</div>
							@error('customer_contact')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

                            <div class="input-style-1">
								<label>Customer Address</label>
								<textarea rows=5 name="customer_address" required>{{ $customer->customer_address }}</textarea>
							</div>
							@error('customer_address')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

                            <div class="input-style-1">
								<label>Customer Date Of Birth</label>
								<input type="date" placeholder="Customer Date Of Birth" name="customer_dob" required autocomplete="off" value="{{ $customer->customer_dob }}" />
							</div>
							@error('customer_dob')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

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
