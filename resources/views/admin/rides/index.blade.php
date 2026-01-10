<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Rides</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .ride-card {
            border-radius: 16px;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .ride-icon {
            font-size: 40px;
            color: #0d6efd;
        }

        .status-box {
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-completed {
            background: #e6f4ea;
            color: #1e7e34;
        }

        .status-pending {
            background: #fff4e5;
            color: #d39e00;
        }

        .status-cancelled {
            background: #fdecea;
            color: #b02a37;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-4">

    <!-- PAGE HEADING -->
    <div class="text-center mb-4">
        <h2 class="fw-bold">
            <i class="bi bi-bicycle"></i> All Rides
        </h2>
        <p class="text-muted">Manage and track all bike rides</p>
    </div>

    <div class="row g-4">
        @foreach($rides as $ride)
            <div class="col-md-4">
                <div class="ride-card">

                    <!-- TOP -->
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-bicycle ride-icon me-3"></i>
                        <div>
                            <h5 class="mb-0 fw-bold">Ride #{{ $ride->id }}</h5>
                            <small class="text-muted">Bike Ride Request</small>
                        </div>
                    </div>

                    <!-- STATUS -->
                    <div class="mb-3">
                        <strong>Status:</strong><br>

                        @if($ride->status == 'completed')
                            <div class="status-box status-completed mt-1">
                                <i class="bi bi-check-circle-fill"></i> Completed
                            </div>
                        @elseif($ride->status == 'pending')
                            <div class="status-box status-pending mt-1">
                                <i class="bi bi-hourglass-split"></i> Pending Approval
                            </div>
                        @elseif($ride->driver_completed == 1)
                            <div class="status-box status-pending mt-1">
                                <i class="bi bi-x-circle-fill"></i>Only Driver Completed
                            </div>
                        @elseif($ride->passenger_completed == 1)
                            <div class="status-box status-pending mt-1">
                                <i class="bi bi-x-circle-fill"></i>Only Passenger Completed                           
                            </div>
                        @endif
                    </div>

                    <!-- ACTION -->
                    <a href="/admin/rides/{{ $ride->id }}" class="btn btn-primary w-100">
                        View Ride Details
                    </a>

                </div>
            </div>
        @endforeach
    </div>

</div>

</body>
</html>
