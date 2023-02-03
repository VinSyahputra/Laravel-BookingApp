<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Validation - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/loginCSS.css" rel="stylesheet">

</head>

<body>

  <main id="main" class="main">

    <div class="table-responsive">
        <table class="table my-5">
            <thead>
                <tr>
                    <th scope="row">No</th>
                    <td>Date</td>
                    <td>User Booking</td>
                    <td>Room Owner</td>
                    <td>Contact</td>
                    <td>Event Name</td>
                    <td>Time</td>
                    <td>Room</td>
                    <td>Description</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->date }}</td>
                    <td>{{ $d->user->name }}</td>
                    <td>{{ $d->room_owner}}</td>
                    <td>{{ $d->contact }}</td>
                    <td>{{ $d->event_name }}</td>
                    <td>{{ $d->time_start .' - '. $d->time_end }}</td>
                    <td>{{ $d->room->name }}</td>
                    <td>{{ $d->description }}</td>
                </tr>
                @endforeach
            </tbody>
    
        </table>
    </div>

  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/simple-datatables/simple-datatables.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/loginJS.js"></script>

</body>

</html>