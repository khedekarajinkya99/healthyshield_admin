@include('includes/header')

<section class="table-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Orders <a href="{{ url('orderAdd') }}" class="btn btn-success">Add New</a></h2>
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
									Orders
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
											<h6>Order Id</h6>
										</th>
										<th>
											<h6>Customer Id</h6>
										</th>
										<th>
											<h6>Customer Name</h6>
										</th>
										<th>
											<h6>Customer Email</h6>
										</th>
										<th>
											<h6>Product Name</h6>
										</th>
										<th>
											<h6>Product Quantity</h6>
										</th>
										<th>
											<h6>Product Price</h6>
										</th>
										<th>
											<h6>Shipping Charges</h6>
										</th>
										<th>
											<h6>Discount</h6>
										</th>
										<th>
											<h6>Order Date</h6>
										</th>
										<th>
											<h6>Status</h6>
										</th>
										<th>
											<h6>Payment Status</h6>
										</th>
										<th>
											<h6>Gst Amount</h6>
										</th>
										<th>
											<h6>Tax Rate</h6>
										</th>
										<th>
											<h6>Created At</h6>
										</th>
										
										<th>
											<h6>Action</h6>
										</th>
									</tr>
									<!-- end table row-->
								</thead>
								<tbody>
									@foreach ($orders as $data)
									<tr>
										<td>
											<p>{{ $data->order_id }}</p>
										</td>
										<td>
											<p>{{ $data->customer_id }}</p>
										</td>
										<td>
											<p>{{ $data->customer_name }}</p>
										</td>
										<td>
											<p>{{ $data->customer_email }}</p>
										</td>
										<td>
											<p>
												{{ $data->product->product_name }}
											</p>
										</td>
										<td>
											<p>{{ $data->product_quantity }}</p>
										</td>
										<td>
											<p>
												{{ $data->product->price }}
											</p>
										</td>
										<td>
											<p>{{ $data->shipping_charges }}</p>
										</td>
										<td>
											<p>{{ $data->discount }}</p>
										</td>
										<td>
											<p>{{ $data->order_date }}</p>
										</td>
										<td>
											<p>{{ $data->status }}</p>
										</td>
										<td>
											<p>{{ $data->payment_status }}</p>
										</td>
										<td>
											<p>{{ $data->gst_amount }}</p>
										</td>
										<td>
											<p>{{ $data->tax_rate }}</p>
										</td>
										<td>
											<p>{{ $data->created_at }}</p>
										</td>
										<td>
											<div class="action">
												<a class="text-warning" href="{{ url('viewOrder') }}/{{ $data->id }}">
													<i class="lni lni-eye"></i>
												</a>
												<a class="text-primary" href="{{ url('editOrder') }}/{{ $data->id }}">
													<i class="lni lni-pencil"></i>
												</a>
												<a href="{{ url('deleteOrder') }}/{{ $data->id }}" class="text-danger deleteBtn">
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