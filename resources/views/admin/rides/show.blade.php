<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ride Details</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        .detail-card {
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
            padding: 25px;
            background: #fff;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 15px;
        }

        .info-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .info-row i {
            font-size: 20px;
            color: #0d6efd;
            width: 32px;
        }

        .label {
            font-weight: 600;
            width: 110px;
        }

        .status-badge {
            padding: 8px 14px;
            border-radius: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .completed {
            background: #e6f4ea;
            color: #1e7e34;
        }

        .pending {
            background: #fff4e5;
            color: #d39e00;
        }

        .cancelled {
            background: #fdecea;
            color: #b02a37;
        }

        .map-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            font-family: monospace;
        }
    </style>
</head>

<body class="bg-light">

<div class="container mt-4">

    <!-- HEADER -->
    <div class="mb-4 text-center">
        <h2 class="fw-bold">
            <i class="bi bi-bicycle"></i> Ride Details
        </h2>
        <p class="text-muted">Complete information of the selected ride</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="detail-card">

                <!-- USER INFO -->
                <h5 class="section-title">
                    <i class="bi bi-people-fill"></i> Ride Participants
                </h5>

                <div class="info-row">
                    <i class="bi bi-person-fill"></i>
                    <span class="label">Passenger:</span>
                    <span>{{ $ride->passenger->name }}</span>
                </div>

                <div class="info-row">
                    <i class="bi bi-person-badge-fill"></i>
                    <span class="label">Driver:</span>
                    <span>{{ $ride->driver->name ?? 'Not Assigned' }}</span>
                </div>

                <hr>

                <!-- LOCATION -->
                <h5 class="section-title">
                    <i class="bi bi-geo-alt-fill"></i> Location Details
                </h5>

                <div class="map-box mb-3">
                    <strong>Pickup Location</strong><br>
                    Latitude: {{ $ride->pickup_lat }} <br>
                    Longitude: {{ $ride->pickup_lng }}
                </div>

                <div class="map-box mb-3">
                    <strong>Destination Location</strong><br>
                    Latitude: {{ $ride->dest_lat }} <br>
                    Longitude: {{ $ride->dest_lng }}
                </div>

                <hr>

                <!-- STATUS -->
                <h5 class="section-title">
                    <i class="bi bi-info-circle-fill"></i> Ride Status
                </h5>

                @if($ride->status == 'completed')
                    <div class="status-badge completed">
                        <i class="bi bi-check-circle-fill"></i> Completed
                    </div>
                @elseif($ride->status == 'pending')
                    <div class="status-badge pending">
                        <i class="bi bi-hourglass-split"></i> Pending
                    </div>
                @else
                    <div class="status-badge cancelled">
                        <i class="bi bi-x-circle-fill"></i> Cancelled
                    </div>
                @endif

                <!-- ACTION -->
                <div class="mt-4">
                    <a href="/" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Back to Rides
                    </a>
                </div>

            </div>
        </div>
    </div>

</div>

</body>
</html>
