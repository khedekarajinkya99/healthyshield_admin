@include('includes.header')

<section class="tab-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>View Categories <a href="{{ url('categories') }}" class="btn btn-sm btn-danger">Back</a></h2>
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
									View Categories
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
							<label>Cat Name</label>
							<input type="text" disabled value="{{ $category->category_name }}" />
						</div>

                        <div class="input-style-1">
							<label>Cat Image</label>
							<img src="{{ asset('uploads/categories') }}/{{ $category->category_icon }}" height="150px" width="150px">
						</div>

                        <div class="input-style-1">
							<label>status</label>
							<input type="text" disabled value="{{ $category->status }}" />
						</div>

						<div class="input-style-1">
							<label>Meta Title</label>
							<input type="text" disabled value="{{ $category->meta_title }}" />
						</div>

                        <div class="input-style-1">
							<label>Meta Description</label>
							<input type="text" disabled value="{{ $category->meta_description }}" />
						</div>

                        <div class="input-style-1">
							<label>Meta Keyword</label>
							<input type="text" disabled value="{{ $category->meta_keyword }}" />
						</div>

                        <div class="input-style-1">
							<label>Canonical Tags</label>
							<input type="text" disabled value="{{ $category->tags }}}"/>
						</div>

                        <div class="input-style-1">
							<label>Slug</label>
							<input type="text" disabled value="{{ $category->slug }}" />
						</div>

                        <div class="input-style-1">
							<label>Seo Description</label>
							<textarea rows="5" disabled>{{ $category->seo_description }}</textarea>
						</div>

		                <div class="input-style-1">
							<label>Shop Type</label>
							<input type="text" disabled value="{{ $category->shop_type }}" />
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