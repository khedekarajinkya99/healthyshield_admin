@include('includes/header')

<section class="table-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Categories <a href="{{ url('categoriesAdd') }}" class="btn btn-success">Add New</a></h2>
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
								<li class="breadcrumb-item active" aria-current="page">
									Categories
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

		<!-- ========== tables-wrapper start ========== -->
		<div class="tables-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<div class="card-style mb-30">
						<div class="table-wrapper table-responsive">
							<table class="table" id="categoryTable">
								<thead>
									<tr>
										<th>
											<h6>Cat Name</h6>
										</th>
										<th>
											<h6>Cat Image</h6>
										</th>
										<th>
											<h6>Status</h6>
										</th>
										<th>
											<h6>Created At</h6>
										</th>
										<th>
											<h6>Meta Title</h6>
										</th>
										<th>
											<h6>Meta Description</h6>
										</th>
										<th>
											<h6>Meta Keyword</h6>
										</th>
										<th>
											<h6>Canonical Tag</h6>
										</th>
										<th>
											<h6>Slug</h6>
										</th>
										<th>
											<h6>Seo Description</h6>
										</th>
										<th>
											<h6>Shop Type</h6>
										</th>
										<th>
											<h6>Action</h6>
										</th>
									</tr>
									<!-- end table row-->
								</thead>
								<tbody>
									@foreach ($categories as $catData)
									<tr>
										<td>
											<p>{{ $catData->category_name }}</p>
										</td>
										<td>
											<p>
												@if (isset($catData->category_icon))
												<a href="{{ asset('uploads/categories') }}/{{ $catData->category_icon }}" target="_blank">
													<img src="{{ asset('uploads/categories') }}/{{ $catData->category_icon }}" width="50px" height="50px">
												</a>
												@endif
											</p>
										</td>
										<td>
											<p>{{ $catData->status }}</p>
										</td>
										<td>
											<p>
												{{ $catData->created_at }}
											</p>
										</td>
										<td>
											<p>{{ $catData->meta_title }}</p>
										</td>
										<td>
											<p>{{ $catData->meta_description }}</p>
										</td>
										<td>
											<p>{{ $catData->meta_keyword }}</p>
										</td>
										<td>
											<p>{{ $catData->tags }}</p>
										</td>
										<td>
											<p>{{ $catData->slug }}</p>
										</td>
										<td>
											<p>{{ $catData->seo_description }}</p>
										</td>
										<td>
											<p>{{ $catData->shop_type }}</p>
										</td>
										<td>
											<div class="action">
												<a class="text-warning" href="{{ url('viewCategories') }}/{{ $catData->id }}">
													<i class="lni lni-eye"></i>
												</a>
												<a class="text-primary" href="{{ url('editCategories') }}/{{ $catData->id }}">
													<i class="lni lni-pencil"></i>
												</a>
												<a href="{{ url('deleteCategories') }}/{{ $catData->id }}" class="text-danger deleteBtn">
													<i class="lni lni-trash-can"></i>
												</a>
											</div>
										</td>
									</tr>
									@endforeach
									<!-- end table row -->
								</tbody>
							</table>
							<!-- end table -->
						</div>
					</div>
					<!-- end card -->
				</div>
				<!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- ========== tables-wrapper end ========== -->
	</div>
	<!-- end container -->
</section>

@include('includes/footer')