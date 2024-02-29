@include('includes/header')

<section class="table-components">
	<div class="container-fluid">
		<!-- ========== title-wrapper start ========== -->
		<div class="title-wrapper pt-30">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="title">
						<h2>Users <a href="{{ url('usersAdd') }}" class="btn btn-success">Add New</a></h2>
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
									Users
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
							<table class="table" id="userTable">
								<thead>
									<tr>
										<th>
											<h6>Name</h6>
										</th>
										<th>
											<h6>Email</h6>
										</th>
										<th>
											<h6>Created At</h6>
										</th>
										<th>
											<h6>Avatar</h6>
										</th>
										<th>
											<h6>Language</h6>
										</th>
										<th>
											<h6>Role</h6>
										</th>
										<th>
											<h6>Action</h6>
										</th>
									</tr>
									<!-- end table row-->
								</thead>
								<tbody>
									@foreach ($user as $userData)
									<tr>
										<td>
											<p>{{ $userData->name }}</p>
										</td>
										<td>
											<p>{{ $userData->email }}</p>
										</td>
										<td>
											<p>{{ $userData->created_at }}</p>
										</td>
										<td>
											<p>
												@if (isset($userData->profile))
												<a href="{{ asset('uploads/avatars') }}/{{ $userData->profile }}" target="_blank">
													<img src="{{ asset('uploads/avatars') }}/{{ $userData->profile }}" width="50px" height="50px">
												</a>
												@endif
											</p>
										</td>
										<td>
											<p>{{ $userData->language->name }}</p>
										</td>
										<td>
											<p>{{ $userData->role->name }}</p>
										</td>
										<td>
											<div class="action">
												<a class="text-warning" href="{{ url('viewUser') }}/{{ $userData->id }}">
													<i class="lni lni-eye"></i>
												</a>
												<a class="text-primary" href="{{ url('editUser') }}/{{ $userData->id }}">
													<i class="lni lni-pencil"></i>
												</a>
												<a href="{{ url('deleteUser') }}/{{ $userData->id }}" class="text-danger deleteBtn">
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