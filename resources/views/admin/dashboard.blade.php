@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <!-- Dashboard Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="mb-4">Admin Dashboard</h1>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="row">
            <!-- Counts Cards -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <i class="fas fa-file-alt fa-4x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <div class="h1 mb-0">{{ $applicationsCount }}</div>
                                <div class="text-uppercase">Applications Count</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa-solid fa-users fa-4x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <div class="h1 mb-0">{{ $candidatesCount }}</div>
                                <div class="text-uppercase">Candidates Count</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa-solid fa-briefcase fa-4x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <div class="h1 mb-0">{{ $jobsCount }}</div>
                                <div class="text-uppercase">Jobs Count</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa-solid fa-layer-group fa-4x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <div class="h1 mb-0">{{ $categoriesCount }}</div>
                                <div class="text-uppercase">Categories Count</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa-solid fa-building-user fa-4x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <div class="h1 mb-0">{{ $employersCount }}</div>
                                <div class="text-uppercase">Employers Count</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card text-white bg-primary shadow mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa-solid fa-map-location-dot fa-4x"></i>
                            </div>
                            <div class="col-9 text-right">
                                <div class="h1 mb-0">{{ $locationsCount }}</div>
                                <div class="text-uppercase">Locations Count</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Charts -->
        <div class="row mb-4">
            <div class="col-md-6 mb-4">
                <!-- Job Postings Over Time Chart -->
                <div class="card">
                    <div class="card-header">
                        <h5>Job Postings Over Time</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="jobPostingsChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Job Statistics</h5>
                    </div>
                    <div class="card-body">
                        <p>Total Job Postings: <strong>{{ $jobStats->total }}</strong></p>
                        <p>Active Job Postings: <strong>{{ $jobStats->active }}</strong></p>
                    </div>
                </div>
            </div>


            <!-- Add more charts as needed -->
        </div>

    </div>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('jobPostingsChart').getContext('2d');
            var jobPostingsChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($dates),
                    datasets: [{
                        label: 'Job Postings',
                        data: @json($counts),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
