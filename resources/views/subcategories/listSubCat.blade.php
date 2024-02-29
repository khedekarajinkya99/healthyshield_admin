@include('includes/header')

<section class="table-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Sub Categories <a href="{{ url('subCategoriesAdd') }}" class="btn btn-success">Add New</a></h2>
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
									Sub Categories
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
							<table class="table" id="subCatTable">
								<thead>
									<tr>
										<th>
											<h6>Sub Cat Name</h6>
										</th>
										<th>
											<h6>Description</h6>
										</th>
										<th>
											<h6>Image</h6>
										</th>
										<th>
											<h6>Status</h6>
										</th>
										<th>
											<h6>Created At</h6>
										</th>
										<th>
											<h6>Category</h6>
										</th>
										<th>
											<h6>Action</h6>
										</th>
									</tr>
									<!-- end table row-->
								</thead>
								<tbody>
									@foreach ($subCat as $subCatData)
									<tr>
										<td>
											<p>{{ $subCatData->sub_category_name }}</p>
										</td>
										<td>
											<p>{{ $subCatData->sub_category_description }}</p>
										</td>
										<td>
											<p>
												@if (isset($subCatData->sub_category_icon))
												<a href="{{ asset('uploads/subCategories') }}/{{ $subCatData->sub_category_icon }}" target="_blank">
													<img src="{{ asset('uploads/subCategories') }}/{{ $subCatData->sub_category_icon }}" width="50px" height="50px">
												</a>
												@endif
											</p>
										</td>
										<td>
											<p>{{ $subCatData->status }}</p>
										</td>
										<td>
											<p>
												{{ $subCatData->created_at }}
											</p>
										</td>
										<td>
											<p>{{ $subCatData->categories->category_name }}</p>
										</td>
										<td>
											<div class="action">
												<a class="text-warning" href="{{ url('viewSubCategories') }}/{{ $subCatData->id }}">
													<i class="lni lni-eye"></i>
												</a>
												<a class="text-primary" href="{{ url('editSubCategories') }}/{{ $subCatData->id }}">
													<i class="lni lni-pencil"></i>
												</a>
												<a href="{{ url('deleteSubCategories') }}/{{ $subCatData->id }}" class="text-danger deleteBtn">
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