<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta property="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Hello Angular 6</title>
</head>
<body>

<main role="main" class="container">
    <div class="starter-template">
        <my-app>Загрузка...</my-app>
    </div>
</main>

<script src="frontend/public/polyfills.js"></script>
<script src="frontend/public/app.js"></script>
</body>
</html>
