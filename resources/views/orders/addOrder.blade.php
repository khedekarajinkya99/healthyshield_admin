@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Add Order</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('orders') }}">List Categories</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Add Order
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
			<form action="{{ url('orderCreate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
							<div class="input-style-1">
								<label>Order Id</label>
								<input type="text" placeholder="Order Id" name="order_id" required autocomplete="off" />
							</div>
							@error('order_id')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Customer Id</label>
								<input type="text" placeholder="Customer Id" name="customer_id" required autocomplete="off" />
							</div>
							@error('customer_id')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Customer Name</label>
								<input type="text" placeholder="Customer Name" name="customer_name" required autocomplete="off" />
							</div>
							@error('customer_name')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Customer Email</label>
								<input type="email" placeholder="Customer Email" name="customer_email" required autocomplete="off" />
							</div>
							@error('customer_email')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Product</label>
			                    <div class="select-position">
			                    	<select name="product" required>
			                        	<option value="">Select Status</option>
			                        	@foreach ($product as $val)
			                        	<option value="{{ $val->id }}">{{ $val->product_name }}</option>
			                        	@endforeach
			                      	</select>
			                    </div>
			                 </div>
			                @error('product')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Product Quantity</label>
								<input type="number" placeholder="Product Quantity" name="product_qty" required autocomplete="off" />
							</div>
							@error('product_qty')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Shipping Charges</label>
								<input type="number" placeholder="Shipping Charges" name="shipping_charges" required autocomplete="off" />
							</div>
							@error('shipping_charges')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Discount</label>
								<input type="number" placeholder="Discount" name="discount" required autocomplete="off" />
							</div>
							@error('discount')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Status</label>
			                    <div class="select-position">
			                    	<select name="status" required>
			                        	<option value="">Select Status</option>
			                        	<option value="New">New</option>
			                        	<option value="Active">Active</option>
			                        	<option value="Block">Block</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('status')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Payment Status</label>
			                    <div class="select-position">
			                    	<select name="payment_status" required>
			                        	<option value="">Select Payment Status</option>
			                        	<option value="success">Success</option>
			                        	<option value="failed">Failed</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('payment_status')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

							<div class="input-style-1">
								<label>Gst Amount</label>
								<input type="number" placeholder="Gst Amount" name="gst_amount" required autocomplete="off" />
							</div>
							@error('gst_amount')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Tax Rate</label>
								<input type="number" placeholder="Tax Rate" name="tax_rate" required autocomplete="off" />
							</div>
							@error('tax_rate')
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