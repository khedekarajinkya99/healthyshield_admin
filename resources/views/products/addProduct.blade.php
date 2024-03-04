@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Add Products</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('products') }}">List Products</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Add Product
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
			<form action="{{ url('productCreate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
							<div class="input-style-1">
								<label>Product Name</label>
								<input type="text" placeholder="Product Name" name="product_name" required autocomplete="off" />
							</div>
							@error('product_name')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Product Sub Title</label>
								<input type="text" placeholder="Product Sub Title" name="product_sub_title" required autocomplete="off" />
							</div>
							@error('product_sub_title')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Categories</label>
			                    <div class="select-position">
			                    	<select name="categories" id="categories" required>
			                        	<option value="">Select Categories</option>
			                        	@foreach ($category as $val)
			                        	<option value="{{ $val->id }}">{{ $val->category_name }}</option>
			                        	@endforeach
			                      	</select>
			                    </div>
			                 </div>
			                @error('categories')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Sub Categories</label>
			                    <div class="select-position">
			                    	<select name="sub_categories" id="sub_categories" required>
			                        	<option value="">Select Sub Categories</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('sub_categories')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

							<div class="select-style-1">
			                    <label>Child Categories</label>
			                    <div class="select-position">
			                    	<select name="child_categories" id="child_categories" required>
			                        	<option value="">Select Child Categories</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('child_categories')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Brand</label>
			                    <div class="select-position">
			                    	<select name="brand" id="brand" required>
			                        	<option value="">Select Brand</option>
			                        	@foreach ($brand as $val)
			                        	<option value="{{ $val->id }}">{{ $val->brand_name }}</option>
			                        	@endforeach
			                      	</select>
			                    </div>
			                 </div>
			                @error('brand')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Short Description</label>
								<textarea rows="5" placeholder="Short Description" name="short_description" required></textarea>
							</div>
							@error('short_description')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Description</label>
								<textarea rows="5" placeholder="Description" name="description" required></textarea>
							</div>
							@error('description')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Ingredients</label>
								<textarea rows="5" placeholder="Ingredients" name="ingredients" required></textarea>
							</div>
							@error('ingredients')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>How To Use</label>
								<textarea rows="5" placeholder="How To Use" name="how_to_use" required></textarea>
							</div>
							@error('how_to_use')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Product Quantity</label>
								<input type="number" placeholder="Product Quantity" name="product_quantity" required autocomplete="off" />
							</div>
							@error('product_quantity')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Price</label>
								<input type="number" placeholder="Price" name="price" required autocomplete="off" />
							</div>
							@error('price')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Sale Price</label>
								<input type="number" placeholder="Sale Price" name="sale_price" required autocomplete="off" />
							</div>
							@error('sale_price')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Discount</label>
								<input type="number" placeholder="Discount" name="discount" required autocomplete="off" />
							</div>
							@error('discount')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Sizes</label>
								<input type="text" placeholder="Sizes" name="size" required autocomplete="off" />
							</div>
							@error('size')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

							<div class="input-style-1">
								<label>Weight</label>
								<input type="number" placeholder="Weight" name="weight" required autocomplete="off" />
							</div>
							@error('weight')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Product Image</label>
								<input type="file" name="image" autocomplete="off" />
							</div>
							@error('image')
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

							<div class="input-style-1">
								<label>Meta Title</label>
								<input type="text" placeholder="Meta Title" name="metaTitle" required autocomplete="off" />
							</div>
							@error('metaTitle')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Meta Description</label>
								<input type="text" placeholder="Meta Description" name="meta_description" required autocomplete="off" />
							</div>
							@error('meta_description')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Meta Keyword</label>
								<input type="text" placeholder="Meta Keyword" name="meta_keyword" required autocomplete="off" />
							</div>
							@error('meta_keyword')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Product Tags</label>
								<input type="text" placeholder="Product Tags" name="product_tags" required autocomplete="off" />
							</div>
							@error('product_tags')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Tags</label>
								<input type="text" placeholder="Tags" name="tags" required autocomplete="off" />
							</div>
							@error('tags')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Recommendation</label>
			                    <div class="select-position">
			                    	<select name="recommendation" required>
			                        	<option value="">Select</option>
			                        	<option value="yes">Yes</option>
			                        	<option value="no">No</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('recommendation')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Slug</label>
								<input type="text" placeholder="Slug" name="slug" required autocomplete="off" />
							</div>
							@error('slug')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Shop Type</label>
			                    <div class="select-position">
			                    	<select name="shop_type" required>
			                        	<option value="">Select Shop Type</option>
			                        	<option value="grocery">Grocery</option>
			                        	<option value="foods">Foods</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('shop_type')
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
