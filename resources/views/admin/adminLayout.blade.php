<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <!-- Font Awesome icons (free version)-->
          <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <link href="/css/styles.css" rel="stylesheet" />
  <title>@yield('title') | Administration</title>
</head>
<body>
  <div class="container mt-5">
    @if(session('success'))
      <div class="alert alert-success">
        {{session('success')}}
      </div>
    @endif
    <!--@if($errors->any)
      <div class="alert alert-danger">
        <ul class="my-0">
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        </ul>
          @endforeach
      </div>  
    @endif
-->
    @yield('content')
  </div>
</body>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
<script src="/js/scripts.js"></script>
</html>