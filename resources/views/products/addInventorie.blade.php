@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Add Product Inventorie</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('productInventories') }}">List Products</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Add Product Inventorie
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
			<form action="{{ url('createInventorie') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">

							<div class="select-style-1">
			                    <label>Product</label>
			                    <div class="select-position">
			                    	<select name="product" required>
			                        	<option value="">Select Product</option>
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
								<label>Available Stock</label>
								<input type="number" placeholder="Available Stock" name="available_stock" required autocomplete="off" />
							</div>
							@error('available_stock')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Total Stock</label>
								<input type="number" placeholder="Total Stock" name="total_stock" required autocomplete="off" />
							</div>
							@error('total_stock')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Sold Stock</label>
								<input type="number" placeholder="Sold Stock" name="sold_stock" required autocomplete="off" />
							</div>
							@error('sold_stock')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>New Stock</label>
								<input type="number" placeholder="New Stock" name="new_stock" required autocomplete="off" />
							</div>
							@error('new_stock')
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