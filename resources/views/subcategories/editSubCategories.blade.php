@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Edit Categories</h2>
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
								<li class="breadcrumb-item"><a href="{{ url('subCategories') }}">List Sub Categories</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									Edit Sub Categories
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
			<form action="{{ url('subCatCreate') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-lg-6">
						<!-- input style start -->
						<div class="card-style mb-30">
							<div class="input-style-1">
								<label>Sub Cat Name</label>
								<input type="text" placeholder="Sub Cat Name" name="sub_cat_name" required autocomplete="off" value="{{ $subCat->sub_category_name }}" />
							</div>
							@error('sub_cat_name')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Description</label>
								<textarea rows="5" name="description" required placeholder="Description">{{ $subCat->sub_category_description }}</textarea>
							</div>
							@error('description')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="input-style-1">
								<label>Image</label>
								<img src="{{ asset('uploads/subCategories') }}/{{ $subCat->sub_category_icon }}" width="150px" height="150px">
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
			                        	<option value="New" @if ($subCat->status == 'New') selected @endif>New</option>
			                        	<option value="Active" @if ($subCat->status == 'Active') selected @endif>Active</option>
			                        	<option value="Block" @if ($subCat->status == 'Block') selected @endif>Block</option>
			                      	</select>
			                    </div>
			                 </div>
			                @error('status')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror

	                        <div class="select-style-1">
			                    <label>Categories</label>
			                    <div class="select-position">
			                    	<select name="categories" required>
			                        	<option value="">Select Categories</option>
			                        	@foreach ($category as $val)
			                        	<option value="{{ $val->id }}" @if ($subCat->category_id == $val->id) selected @endif>{{ $val->category_name }}</option>
			                        	@endforeach
			                      	</select>
			                    </div>
			                 </div>
			                @error('categories')
	                          <div class="alert alert-danger" role="alert">{{ $message }}</div>
	                        @enderror
	                        <input type="hidden" name="id" value="{{ $subCat->id }}">

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