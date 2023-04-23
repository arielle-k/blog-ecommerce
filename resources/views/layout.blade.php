<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <title>post - @yield('title')</title>
    <style>
        @import url(https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;800;900&display=swap);

        *{
            margin: 0;
            padding: 0;
        }
        a:hover,
        a{
            text-decoration: none;
            color:white;
        }
        body {
          font-family: 'Poppins', sans-serif;
          font-size: 1rem;
          min-height: 100vh;
        }
        .logo{
            font-size: 2rem;
            font-weight: 800;
            text-transform: uppercase;
        }
        nav .logo span{
            color: rgb(1, 238, 206);
        }

    </style>
</head>
<body>



    <div class="container mt-4">
        @yield('body')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</body>
</html>

