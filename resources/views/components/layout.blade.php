<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        html,body{
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }
        .header{
            background: rgb(20,24,36);
            margin: 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .text{
            color: rgb(255, 255, 255);
            font-size: 2rem;
            padding: 10px 20px ;
        }
        h2{
            margin: 0
        }
    </style>
</head>
<body>
    <header class="header" >
        <div class="">
            <h2 class="text">Admin</h2>
        </div>
    </header>
    <div style="display: flex" class="">

        {{ $slot }}
    </div>
</body>
</html>