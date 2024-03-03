@include('includes/header')

<section class="table-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Products <a href="{{ url('productAdd') }}" class="btn btn-success">Add New</a></h2>
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
									Products
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
											<h6>Product Name</h6>
										</th>
										<th>
											<h6>Product Sub Title</h6>
										</th>
										<th>
											<h6>Category</h6>
										</th>
										<th>
											<h6>Sub Category</h6>
										</th>
										<th>
											<h6>Child Category</h6>
										</th>
										<th>
											<h6>Image</h6>
										</th>
										<th>
											<h6>Short Description</h6>
										</th>
										<th>
											<h6>Description</h6>
										</th>
										<th>
											<h6>Ingredients</h6>
										</th>
										<th>
											<h6>How To Use</h6>
										</th>
										<th>
											<h6>Qty</h6>
										</th>
										<th>
											<h6>Price</h6>
										</th>
										<th>
											<h6>Sale Price</h6>
										</th>
										<th>
											<h6>Weight</h6>
										</th>
										<th>
											<h6>Discount</h6>
										</th>
										<th>
											<h6>Size</h6>
										</th>
										<th>
											<h6>Product Tags</h6>
										</th>
										<th>
											<h6>Status</h6>
										</th>
										<th>
											<h6>Slug</h6>
										</th>
										<th>
											<h6>Meta Title</h6>
										</th>
										<th>
											<h6>Meta Description</h6>
										</th>
										<th>
											<h6>Meta Keywords</h6>
										</th>
										<th>
											<h6>Canonical Tags</h6>
										</th>
										<th>
											<h6>Created At</h6>
										</th>
										<th>
											<h6>Recommended</h6>
										</th>
										<th>
											<h6>Brands</h6>
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
									@foreach ($products as $data)
									<tr>
										<td>
											<p>{{ $data->product_name }}</p>
										</td>
										<td>
											<p>{{ $data->product_sub_title }}</p>
										</td>
										<td>
											<p>{{ $data->categories->category_name }}</p>
										</td>
										<td>
											<p>{{ $data->subCategories->sub_category_name }}</p>
										</td>
										<td>
											<p>{{ $data->childCategories->child_category_name }}</p>
										</td>
										<td>
											<p>
												@if (isset($data->images))
												<a href="{{ asset('uploads/products') }}/{{ $data->images }}" target="_blank">
													<img src="{{ asset('uploads/products') }}/{{ $data->images }}" width="50px" height="50px">
												</a>
												@endif
											</p>
										</td>
										<td>
											<p>{{ $data->short_description }}</p>
										</td>
										<td>
											<p>
												{{ $data->description }}
											</p>
										</td>
										<td>
											<p>{{ $data->ingredients }}</p>
										</td>
										<td>
											<p>{{ $data->how_to_use }}</p>
										</td>
										<td>
											<p>{{ $data->quantity }}</p>
										</td>
										<td>
											<p>{{ $data->price }}</p>
										</td>
										<td>
											<p>{{ $data->sale_price }}</p>
										</td>
										<td>
											<p>{{ $data->weight }}</p>
										</td>
										<td>
											<p>{{ $data->discount }}</p>
										</td>
										<td>
											<p>{{ $data->size }}</p>
										</td>
										<td>
											<p>{{ $data->product_tags }}</p>
										</td>
										<td>
											<p>{{ $data->status }}</p>
										</td>
										<td>
											<p>{{ $data->slug }}</p>
										</td>
										<td>
											<p>{{ $data->meta_title }}</p>
										</td>
										<td>
											<p>{{ $data->meta_description }}</p>
										</td>
										<td>
											<p>{{ $data->meta_keyword }}</p>
										</td>
										<td>
											<p>{{ $data->tags }}</p>
										</td>
										<td>
											<p>{{ $data->created_at }}</p>
										</td>
										<td>
											<p>{{ $data->recommedation }}</p>
										</td>
										<td>
											<p>{{ $data->brands->brand_name }}</p>
										</td>
										<td>
											<p>{{ $data->shop_type }}</p>
										</td>
										<td>
											<div class="action">
												<a class="text-warning" href="{{ url('viewProduct') }}/{{ $data->id }}">
													<i class="lni lni-eye"></i>
												</a>
												<a class="text-primary" href="{{ url('editProduct') }}/{{ $data->id }}">
													<i class="lni lni-pencil"></i>
												</a>
												<a href="{{ url('deleteProduct') }}/{{ $data->id }}" class="text-danger deleteBtn">
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