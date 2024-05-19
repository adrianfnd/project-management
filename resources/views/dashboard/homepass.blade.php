{{-- DASHBOARD HOMEPASS --}}

@extends('main')

@section('content')
    {{-- NAVBAR --}}
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Dashboard Homepass</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('ui_dashboard') }}/assets/img/team-2.jpg"
                                                class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('ui_dashboard') }}/assets/img/small-logos/logo-spotify.svg"
                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .container {
            margin-top: 20px
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-bottom: 20px;
        }

        .filter-container select {
            margin-right: 10px;
            margin-bottom: 10px;
            flex: 1;
        }

        .filter-container .filter-button,
        .filter-container .camera-button {
            background-color: #1d3557;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .filter-container .camera-button {
            background-color: #f1faee;
            color: #1d3557;
            border: 1px solid #1d3557;
        }

        .dashboard-stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            text-align: center;
            margin-top: 20px;
        }

        .dashboard-stats .stat {
            margin: 10px;
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }

        .dashboard-stats .stat-number {
            font-size: 2.5em;
            color: #1d3557;
            font-weight: bold;
        }

        .dashboard-stats .stat-label {
            font-size: 1em;
            color: #457b9d;
            margin-top: 5px;
        }

        .dashboard-stats .stat-total {
            font-size: 0.9em;
            color: #8d99ae;
        }

        @media (max-width: 768px) {
            .dashboard-stats .stat {
                flex: 1 1 100%;
            }
        }
    </style>
    {{-- Content --}}
    <div class="container">
        <div class="filter-container">
            <select class="form-select" id="filterDropdown1" name="type" form="filterForm">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ request()->input('type') == $type->id ? 'selected' : '' }}>
                        {{ $type->type_name }}</option>
                @endforeach
            </select>
            <select class="form-select" id="filterDropdown2" name="sbu" form="filterForm">
                @foreach ($sbus as $sbu)
                    <option value="{{ $sbu->id }}" {{ request()->input('sbu') == $sbu->id ? 'selected' : '' }}>
                        {{ $sbu->sbu_name }}</option>
                @endforeach
            </select>

            <form id="filterForm" action="{{ url()->current() }}" method="GET">
            </form>

            <script>
                document.getElementById('filterDropdown1').addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
                document.getElementById('filterDropdown2').addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            </script>

            <button class="filter-button">
                <i class="fas fa-filter"></i>
            </button>
            <button class="camera-button">
                <i class="fas fa-camera"></i>
            </button>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dashboard-stats">
                            <div class="stat">
                                <div class="stat-number">1,147,496</div>
                                <div class="stat-label">HOMEPASS BUILT</div>
                                <div class="stat-total">of total 1,147,488</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number">289,255</div>
                                <div class="stat-label">HOME CONNECTED</div>
                            </div>
                            <div class="stat">
                                <div class="stat-number">25.21%</div>
                                <div class="stat-label">TUR</div>
                            </div>
                        </div>
                        <div class="row gx-3 gy-3">
                            <div id="map" style="height: 600px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var map = L.map('map').setView([-6.200000, 106.816666], 10);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            var projects = @json($projects);

            projects.forEach(function(project) {
                var popupContent = `
                    <b>${project.project_name}</b><br>
                    Progress: ${project.progress}<br>
                    Kendala: ${project.kendala}<br><br>
                    <center><img src="${project.image}" alt="${project.name}" style="width:175px;height:auto;"></center>
                `;
                L.marker([project.latitude, project.longitude])
                    .addTo(map)
                    .bindPopup(popupContent);
            });
        });
    </script>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column">
                            <h5 class="mb-4">PER SBU ACHIEVEMENT</h5>
                            <div class="progress-group">
                                <div class="progress-item" style="background-color: #203A84;">
                                    <span style="margin-left: 20px;">SBU</span>
                                    <span style="margin-right: 20px;">151.544 / 151.552 HP / 224 C / Rp245 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #29438D;">
                                    <span style="margin-left: 20px;">SBT</span>
                                    <span style="margin-left: 20px;">136.192 / 136.192 HP / 266 C / Rp219 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #344DA1;">
                                    <span style="margin-left: 20px;">SBS</span>
                                    <span style="margin-right: 20px;">132.096 / 132.096 HP / 258 C / Rp640 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #4661B4;">
                                    <span style="margin-left: 20px;">JKT</span>
                                    <span style="margin-right: 20px;">24.744 / 24.744 HP / 49 C / Rp38 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #5C75C4;">
                                    <span style="margin-left: 20px;">JBR</span>
                                    <span style="margin-right: 20px;">147.696 / 147.696 HP / 289 C / Rp231 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #6A85CC;">
                                    <span style="margin-left: 20px;">JTG</span>
                                    <span style="margin-right: 20px;">145.856 / 145.856 HP / 285 C / Rp227 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #7B95D5;">
                                    <span style="margin-left: 20px;">JTM</span>
                                    <span style="margin-right: 20px;">100.440 / 100.424 HP / 197 C / Rp156 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #90A6DD;">
                                    <span style="margin-left: 20px;">BALI</span>
                                    <span style="margin-right: 20px;">97.680 / 97.680 HP / 150 C / Rp155 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #A6B8E5;">
                                    <span style="margin-left: 20px;">RIT</span>
                                    <span style="margin-right: 20px;">106.712 / 106.712 HP / 209 C / Rp171 m</span>
                                </div>
                                <div class="progress-item" style="background-color: #BBD2F2;">
                                    <span style="margin-left: 20px;">KAL</span>
                                    <span style="margin-right: 20px;">104.536 / 104.536 HP / 204 C / Rp167 m</span>
                                </div>
                            </div>
                            <div class="budget-summary mt-4">
                                <div>
                                    <span class="budget-label">Anggaran Terserap</span>
                                    <span class="budget-value">Rp2.255.213.904.352</span>
                                    <span class="budget-subvalue">of total 1.147.496 HP</span>
                                </div>
                                <div>
                                    <span class="budget-label">Anggaran HC</span>
                                    <span class="budget-value">Rp-</span>
                                    <span class="budget-subvalue">of total 289.255 HC</span>
                                </div>
                                <div>
                                    <span class="budget-label">Revenue</span>
                                    <span class="budget-value">Rp-</span>
                                    <span class="budget-subvalue">per May 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .progress-group {
            display: flex;
            flex-direction: column;
        }

        .progress-item {

            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
            border-radius: 25px;
            color: white;
        }

        .progress-item span {
            font-size: 1rem;
            font-weight: 500;
        }

        .budget-summary {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .budget-label {
            font-size: 1.2rem;
            font-weight: 700;
            color: #4a4a4a;
        }

        .budget-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #007bff;
        }

        .budget-subvalue {
            font-size: 1rem;
            font-weight: 400;
            color: #6c757d;
        }
    </style>
    {{-- AKHIR CONTENT --}}
@endsection
