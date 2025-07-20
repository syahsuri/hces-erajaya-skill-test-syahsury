@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        {{-- Cards Data --}}
        <div class="row">
            {{-- Total Employees --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="card-body pt-3 px-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-4">Total Employees</h6>
                                <h6 class="fw-semibold fs-4 mb-0">{{ $totalEmployees ?? '-' }}</h6>
                            </div>
                            <span class="bg-primary rounded-circle p-3 text-white d-inline-flex">
                                <i class="ti ti-users fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Total Companies --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="card-body pt-3 px-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-4">Total Companies</h6>
                                <h6 class="fw-semibold fs-4 mb-0">{{ $totalCompanies ?? '-' }}</h6>
                            </div>
                            <span class="bg-success rounded-circle p-3 text-white d-inline-flex">
                                <i class="ti ti-building fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Total Divisions --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="card-body pt-3 px-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-4">Total Divisions</h6>
                                <h6 class="fw-semibold fs-4 mb-0">{{ $totalDivisions ?? '-' }}</h6>
                            </div>
                            <span class="bg-warning rounded-circle p-3 text-white d-inline-flex">
                                <i class="ti ti-grid-dots fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Total Levels --}}
            <div class="col-sm-6 col-xl-3">
                <div class="card overflow-hidden rounded-2">
                    <div class="card-body pt-3 px-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h6 class="fw-semibold fs-4">Total Levels</h6>
                                <h6 class="fw-semibold fs-4 mb-0">{{ $totalLevels ?? '-' }}</h6>
                            </div>
                            <span class="bg-info rounded-circle p-3 text-white d-inline-flex">
                                <i class="ti ti-stairs fs-5"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart Data --}}
    <div class="row">
        <div class="col d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h5 class="card-title fw-semibold">Jumlah Karyawan per Periode</h5>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <div class="d-flex gap-2">
                                <select id="companyFilter" class="form-select w-auto">
                                    <option value="">All Companies</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                    @endforeach
                                </select>
                                <select id="divisionFilter" class="form-select w-auto">
                                    <option value="">All Divisions</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                                <select id="levelFilter" class="form-select w-auto">
                                    <option value="">All Levels</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->level_name }}</option>
                                    @endforeach
                                </select>
                                <select id="genderFilter" class="form-select w-auto">
                                    <option value="">All Genders</option>
                                    @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}">{{ $gender->gender_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <canvas id="employeeChart" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const ctx = document.getElementById('employeeChart').getContext('2d');
        let chart;

        function fetchChartData() {
            const params = {
                company_id: document.getElementById('companyFilter').value,
                division_id: document.getElementById('divisionFilter').value,
                level_id: document.getElementById('levelFilter').value,
                gender_id: document.getElementById('genderFilter').value
            };

            fetch(`/api/employee-chart?${new URLSearchParams(params)}`)
                .then(res => res.json())
                .then(data => {
                    const labels = data.map(item => item.period);
                    const values = data.map(item => item.total);

                    if (chart) chart.destroy();

                    chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Karyawan',
                                data: values,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });
                });
        }

        document.querySelectorAll('select').forEach(select => {
            select.addEventListener('change', fetchChartData);
        });

        fetchChartData(); 
    </script>
@endsection
