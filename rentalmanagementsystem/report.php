<?php 
include 'connect.php';	
include 'links.php';
include 'sidebar.php';

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
}

?>
<div class="home">
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-4">
							<div class="card border-primary">
								<div class="card-body bg-light">
									<h4><b>Monthly Payments Report</b></h4>
								</div>
								<div class="card-footer">
									<div class="col-md-12">
										<a href="payment_report.php" class="d-flex justify-content-between"> <span>View Report</span> <span class="fa fa-chevron-circle-right"></span></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card border-primary">
								<div class="card-body bg-light">
									<h4><b>Renter Payment Report</b></h4>
								</div>
								<div class="card-footer">
									<div class="col-md-12">
										<a href="balance_report.php" class="d-flex justify-content-between"> <span>View Report</span> <span class="fa fa-chevron-circle-right"></span></a>
									</div>
								</div>
							</div>
						</div>
                        <div class="col-sm-4">
							<div class="card border-primary">
								<div class="card-body bg-light">
									<h4><b>Maintenance Report</b></h4>
								</div>
								<div class="card-footer">
									<div class="col-md-12">
										<a href="maintenance_report.php" class="d-flex justify-content-between"> <span>View Report</span> <span class="fa fa-chevron-circle-right"></span></a>
									</div>
								</div>
							</div>
						</div>

					</div>	
				
				</div>
				
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<div class="col-md-12">
					<div class="row">

						<div class="col-sm-6">
							<div class="card border-primary">
								<div class="card-body bg-light">
									<h4><b>Logbook Report</b></h4>
								</div>
								<div class="card-footer">
									<div class="col-md-12">
										<a href="logbook.php" class="d-flex justify-content-between"> <span>View Report</span> <span class="fa fa-chevron-circle-right"></span></a>
									</div>
								</div>
							</div>
						</div>
                        <div class="col-sm-6">
							<div class="card border-primary">
								<div class="card-body bg-light">
									<h4><b>Feedback Report</b></h4>
								</div>
								<div class="card-footer">
									<div class="col-md-12">
										<a href="feedback.php" class="d-flex justify-content-between"> <span>View Report</span> <span class="fa fa-chevron-circle-right"></span></a>
									</div>
								</div>
							</div>
						</div>

					</div>
				
				
				
				</div>


				
			</div>
		</div>
	</div>
</div>
</div>  