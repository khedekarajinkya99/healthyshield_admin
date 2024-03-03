@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>View Products <a href="{{ url('products') }}" class="btn btn-sm btn-danger">Back</a></h2>
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
									View Product
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
							<label>Product Name</label>
							<input type="text" value="{{ $products->product_name }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Product Sub Title</label>
							<input type="text" value="{{ $products->product_sub_title }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Categories</label>
							<input type="text" value="{{ $products->categories->category_name }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Sub Categories</label>
							<input type="text" value="{{ $products->subCategories->sub_category_name }}" disabled />
						</div>

						<div class="input-style-1">
							<label>Child Categories</label>
							<input type="text" value="{{ $products->childCategories->child_category_name }}" disabled />
						</div>

						<div class="input-style-1">
							<label>Brand</label>
							<input type="text" value="{{ $products->brands->brand_name }}" disabled />
						</div>                        

                        <div class="input-style-1">
							<label>Short Description</label>
							<textarea rows="5" disabled>{{ $products->short_description }}</textarea>
						</div>

                        <div class="input-style-1">
							<label>Description</label>
							<textarea rows="5" disabled>{{ $products->description }}</textarea>
						</div>

                        <div class="input-style-1">
							<label>Ingredients</label>
							<textarea rows="5" disabled>{{ $products->ingredients }}</textarea>
						</div>

                        <div class="input-style-1">
							<label>How To Use</label>
							<textarea rows="5" disabled>{{ $products->how_to_use }}</textarea>
						</div>

                        <div class="input-style-1">
							<label>Product Quantity</label>
							<input type="text" value="{{ $products->quantity }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Price</label>
							<input type="text" value="{{ $products->price }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Sale Price</label>
							<input type="text" value="{{ $products->sale_price }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Discount</label>
							<input type="text" value="{{ $products->discount }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Sizes</label>
							<input type="text" value="{{ $products->sizes }}" disabled />
						</div>

						<div class="input-style-1">
							<label>Weight</label>
							<input type="text" value="{{ $products->weight }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Product Image</label>
							<img src="{{ asset('uploads/products') }}/{{ $products->images }}" width="150px" height="150px">
						</div>

                        <div class="input-style-1">
							<label>Status</label>
							<input type="text" value="{{ $products->status }}" disabled />
						</div>

						<div class="input-style-1">
							<label>Meta Title</label>
							<input type="text" value="{{ $products->meta_title }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Meta Description</label>
							<input type="text" value="{{ $products->meta_description }}" disabled /> />
						</div>

                        <div class="input-style-1">
							<label>Meta Keyword</label>
							<input type="text" value="{{ $products->meta_keyword }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Product Tags</label>
							<input type="text" value="{{ $products->products_tags }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Tags</label>
							<input type="text" value="{{ $products->tags }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Recommendation</label>
							<input type="text" value="{{ $products->recommendation }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Slug</label>
							<input type="text" value="{{ $products->slug }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Shop Type</label>
							<input type="text" value="{{ $products->shop_type }}" disabled />
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