@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>View Categories <a href="{{ url('subCategories') }}" class="btn btn-sm btn-danger">Back</a></h2>
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
									View Sub Categories
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
							<label>Sub Cat Name</label>
							<input type="text" value="{{ $subCat->sub_category_name }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Description</label>
							<textarea rows="5">{{ $subCat->sub_category_description }}</textarea>
						</div>

                        <div class="input-style-1">
							<label>Image</label>
							<img src="{{ asset('uploads/subCategories') }}/{{ $subCat->sub_category_icon }}" width="150px" height="150px">
						</div>

                        <div class="input-style-1">
							<label>Status</label>
							<input type="text" value="{{ $subCat->status }}" disabled />
						</div>

                        <div class="input-style-1">
							<label>Category</label>
							<input type="text" value="{{ $subCat->categories->category_name }}" disabled />
						</div>
						<!-- end input -->
						
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