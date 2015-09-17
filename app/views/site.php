<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Site</title>
    <!--
    Connect js and css files
    -->
    <script src="/app/js/jquery-1.9.1.js"></script>
    <link rel="stylesheet" type="text/css" href="/app/css/jquery-ui.css">
    <script src="/app/js/jquery-ui.js"></script>
    <!-- select2 connect for tags -->
    <link href="/app/js/select/select2.css" rel="stylesheet" />
    <script src="/app/js/select/select2.min.js"></script>
    
</head>
<body>
    <?php include 'app/views/User/login.php'; ?>
    <?php include 'app/views/'.$className.'/'.$fileView.'.php'; ?>
</body>
</html>
