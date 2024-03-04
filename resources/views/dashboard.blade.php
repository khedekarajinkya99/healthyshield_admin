@include('includes/header')
<section class="section">
	<div class="container-fluid">

		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Dashboard</h2>
					</div>
				</div>

				<div class="col-md-6">
					<div class="breadcrumb-wrapper">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">
									<a href="{{ url('dashboard') }}">Dashboard</a>
								</li>

							</ol>
						</nav>
					</div>
				</div>

			</div>

		</div>

		<div class="row">
			<div class="col-xl-2 col-lg-4 col-sm-6">
				<div class="icon-card mb-30">
					<div class="content">
						<h6 class="mb-10">Total Products</h6>
						<h3 class="text-bold mb-10">{{ $dataArr['product'] }}</h3>

					</div>
				</div>

			</div>

			<div class="col-xl-2 col-lg-4 col-sm-6">
				<div class="icon-card mb-30">
					<div class="content">
						<h6 class="mb-10">Total Categories</h6>
						<h3 class="text-bold mb-10">{{ $dataArr['categories'] }}</h3>

					</div>
				</div>

			</div>

			<div class="col-xl-2 col-lg-4 col-sm-6">
				<div class="icon-card mb-30">
					<div class="content">
						<h6 class="mb-10">Total Customers</h6>
						<h3 class="text-bold mb-10">{{ $dataArr['customer'] }}</h3>

					</div>
				</div>

			</div>

			<div class="col-xl-2 col-lg-4 col-sm-6">
				<div class="icon-card mb-30">
					<div class="content">
						<h6 class="mb-10">New Customer Today</h6>
						<h3 class="text-bold mb-10">{{ $dataArr['newCust'] }}</h3>

					</div>
				</div>

			</div>
			<div class="col-xl-2 col-lg-4 col-sm-6">
				<div class="icon-card mb-30">
					<div class="content">
						<h6 class="mb-10">Total Orders</h6>
						<h3 class="text-bold mb-10">{{ $dataArr['order'] }}</h3>

					</div>
				</div>

			</div>
			<div class="col-xl-2 col-lg-4 col-sm-6">
				<div class="icon-card mb-30">
					<div class="content">
						<h6 class="mb-10">New Orders Today</h6>
						<h3 class="text-bold mb-10">{{ $dataArr['newOrder'] }}</h3>

					</div>
				</div>

			</div>

		</div>
		<div class="row">

			<div class="col-lg-12">
				<div class="card-style mb-30">
					<div class="title d-flex flex-wrap align-items-center justify-content-between">
						<div class="left">
							<h6 class="text-medium mb-30">Monthly Total Customer</h6>
						</div>
					</div>

					<div class="chart">
						<canvas id="Chart2" style="width: 100%; height: 400px; margin-left: -45px;"></canvas>
					</div>

				</div>
			</div>

		</div>

		<div class="row">

			<div class="col-lg-12">
				<div class="card-style mb-30">
					<div class="title d-flex flex-wrap justify-content-between align-items-center">
						<div class="left">
							<h6 class="text-medium mb-30">Recent Orders</h6>
						</div>

					</div>

					<div class="table-responsive">
                        <table class="table">
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
                                </tr>
                                <!-- end table row-->
                            </thead>
                            <tbody>
                                @foreach ($dataArr['recent_orders'] as $data)
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
                                </tr>
                                @endforeach
                                <!-- end table row -->
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('includes/footer')
