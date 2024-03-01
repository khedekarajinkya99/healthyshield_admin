@include('includes/header')

<section class="table-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Child Categories <a href="{{ url('childCategoriesAdd') }}" class="btn btn-success">Add New</a></h2>
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
									Child Categories
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
							<table class="table" id="childCatTable">
								<thead>
									<tr>
										<th>
											<h6>Child Category</h6>
										</th>
										<th>
											<h6>Image</h6>
										</th>
										<th>
											<h6>Description</h6>
										</th>
										<th>
											<h6>Status</h6>
										</th>
										<th>
											<h6>Created At</h6>
										</th>
										<th>
											<h6>Categories</h6>
										</th>
                                        <th>
											<h6>Child Categories</h6>
										</th>
                                        <th>
											<h6>Action</h6>
										</th>
									</tr>
									<!-- end table row-->
								</thead>
								<tbody>
									@foreach ($cat as $data)
									<tr>
										<td>
											<p>{{ $data->child_category_name }}</p>
										</td>
                                        <td>
											<p>
												@if (isset($data->child_category_icon))
												<a href="{{ asset('uploads/childCategories') }}/{{ $data->child_category_icon }}" target="_blank">
													<img src="{{ asset('uploads/childCategories') }}/{{ $data->child_category_icon }}" width="50px" height="50px">
												</a>
												@endif
											</p>
										</td>
										<td>
											<p>{{ $data->child_category_description }}</p>
										</td>
										<td>
											<p>{{ $data->status }}</p>
										</td>
										<td>
											<p>
												{{ $data->created_at }}
											</p>
										</td>
										<td>
											<p>{{ $data->category->category_name }}</p>
										</td>
                                        <td>
											<p>{{ $data->subCategory->sub_category_name }}</p>
										</td>
										<td>
											<div class="action">
												<a class="text-warning" href="{{ url('viewChildCategories') }}/{{ $data->id }}">
													<i class="lni lni-eye"></i>
												</a>
												<a class="text-primary" href="{{ url('editChildCategories') }}/{{ $data->id }}">
													<i class="lni lni-pencil"></i>
												</a>
												<a href="{{ url('deleteChildCategories') }}/{{ $data->id }}" class="text-danger deleteBtn">
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
