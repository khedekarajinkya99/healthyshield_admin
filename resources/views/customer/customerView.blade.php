@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>View Customer</h2>
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
									View Customer
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
                            <label>Customer Name</label>
                            <input type="text" disabled value="{{ $customer->customer_name }}" />
                        </div>

                        <div class="input-style-1">
                            <label>Customer Email</label>
                            <input type="email" disabled value="{{ $customer->customer_email }}" />
                        </div>

                        <div class="input-style-1">
                            <label>Customer Contact Number</label>
                            <input type="number" disabled value="{{ $customer->customer_contact }}" />
                        </div>

                        <div class="input-style-1">
                            <label>Customer Address</label>
                            <textarea rows=5 name="customer_address" disabled>{{ $customer->customer_address }}</textarea>
                        </div>

                        <div class="input-style-1">
                            <label>Customer Date Of Birth</label>
                            <input type="date" disabled value="{{ $customer->customer_dob }}" />
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
