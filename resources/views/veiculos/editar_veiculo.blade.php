<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Editar veículo</title>
    <!-- CSS -->
    <link href="assets/css/estilo2.css" rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
</head>

<body>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <form action="/veiculos/update/{{ $veiculo->id }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation">
            @csrf
            @method('PUT')
            <div class="col-12">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" name="placa" class="form-control" value="{{ $veiculo->placa }}">
            </div>

            <div class="col-12">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control" value="{{ $veiculo->marca }}">
            </div>

            <div class="col-12">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control" value="{{ $veiculo->modelo }}">
            </div>

            <div class="col-12 pb-2">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button class="btn btn-primary w-100" type="submit">Editar veículo</button>
            </div>
        </form>
    </div>




    <script src="assets/vendor/apexcharts/apexcharts.min.js">
    </script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>