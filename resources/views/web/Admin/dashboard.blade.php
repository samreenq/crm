@extends("web/Admin/layout")


@section ('body_container')
<div class="card m-b-20">
    <div class="card-body">
        @include('include.es_msg')

        <div class="row">

            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Users</h5>
                                <h2 class="card-text">1500</h2>
                            </div>
                            <div class="icon">
                                <i class="bi bi-people-fill" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Users Count Widget -->
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Contacts</h5>
                                <h2 class="card-text">250</h2>
                            </div>
                            <div class="icon">
                                <i class="bi bi-people-fill" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Count Widget -->
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Leads</h5>
                                <h2 class="card-text">567</h2>
                            </div>
                            <div class="icon">
                                <i class="bi bi-basket-fill" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Revenue Count Widget -->
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title">Revenue</h5>
                                <h2 class="card-text">$12,345</h2>
                            </div>
                            <div class="icon">
                                <i class="bi bi-currency-dollar" style="font-size: 2rem;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


            <!-- Status Widgets Row -->

            <div class="row">
                <div class="col-md-12">
                <div class="card-header">
                    <h5 class="my-0">Leads Progress</h5>
                </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="card text-white bg-muted mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Pending</h5>
                                    <h2 class="card-text">20%</h2>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-hourglass-split" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 20%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">20%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- In Progress Status Widget -->
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">In Progress</h5>
                                    <h2 class="card-text">45%</h2>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-hourglass-split" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Completed Status Widget -->
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">Completed</h5>
                                    <h2 class="card-text">80%</h2>
                                </div>
                                <div class="icon">
                                    <i class="bi bi-check-circle-fill" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="progress mt-3">
                                <div class="progress-bar bg-dark" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">80%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Charts Row -->
        <div class="row">
            <!-- Line Chart -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="my-0">Sales Over Time</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
            </div>
            <!-- Bar Chart -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="my-0">Orders by Category</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="row" style="display: none">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="my-0">Revenue Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>



</div>
</div>
<!-- Chart.js (Make sure it's the correct version) -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <!-- Bootstrap JS and dependencies -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

 <!-- Chart.js Scripts -->
 <script>
     // Line Chart
     const lineCtx = document.getElementById('lineChart').getContext('2d');
     const lineChart = new Chart(lineCtx, {
         type: 'line',
         data: {
             labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
             datasets: [{
                 label: 'Sales',
                 data: [65, 59, 80, 81, 56, 55, 40],
                 borderColor: 'rgba(75, 192, 192, 1)',
                 backgroundColor: 'rgba(75, 192, 192, 0.2)',
             }]
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
         }
     });

     // Bar Chart
     const barCtx = document.getElementById('barChart').getContext('2d');
     const barChart = new Chart(barCtx, {
         type: 'bar',
         data: {
             labels: ['Electronics', 'Clothing', 'Home & Kitchen', 'Beauty', 'Sports'],
             datasets: [{
                 label: 'Orders',
                 data: [12, 19, 3, 5, 2],
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                     'rgba(153, 102, 255, 0.2)',
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                     'rgba(153, 102, 255, 1)',
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
             scales: {
                 y: {
                     beginAtZero: true
                 }
             }
         }
     });

     // Pie Chart
     const pieCtx = document.getElementById('pieChart').getContext('2d');
     const pieChart = new Chart(pieCtx, {
         type: 'pie',
         data: {
             labels: ['Direct', 'Referral', 'Social', 'Email'],
             datasets: [{
                 label: 'Revenue Sources',
                 data: [300, 50, 100, 40],
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.2)',
                     'rgba(54, 162, 235, 0.2)',
                     'rgba(255, 206, 86, 0.2)',
                     'rgba(75, 192, 192, 0.2)',
                 ],
                 borderColor: [
                     'rgba(255, 99, 132, 1)',
                     'rgba(54, 162, 235, 1)',
                     'rgba(255, 206, 86, 1)',
                     'rgba(75, 192, 192, 1)',
                 ],
                 borderWidth: 1
             }]
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
         }
     });
 </script>




@endsection
