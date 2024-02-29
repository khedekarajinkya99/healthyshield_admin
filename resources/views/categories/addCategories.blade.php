@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Add Categories</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('categories') }}">List Categories</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Add Categories
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
			<form action="{{ url('catCreate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
							<div class="input-style-1">
								<label>Cat Name</label>
								<input type="text" placeholder="Cat Name" name="cat_name" required autocomplete="off" />
							</div>
							@error('cat_name')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Cat Image</label>
								<input type="file" name="cat_image" autocomplete="off" />
							</div>
							@error('cat_image')
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
								<label>Canonical Tags</label>
								<input type="text" placeholder="Canonical Tags" name="canonical_tags" required autocomplete="off" />
							</div>
							@error('canonical_tags')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Slug</label>
								<input type="text" placeholder="Slug" name="slug" required autocomplete="off" />
							</div>
							@error('slug')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Seo Description</label>
								<textarea rows="5" name="seo_description" required placeholder="Seo Description"></textarea>
							</div>
							@error('seo_description')
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