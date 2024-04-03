<!DOCTYPE html>
<html lang="en">
<head>
  <title>Web-Based ID Entry System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/favicons/favicon.ico">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 20px Montserrat, sans-serif;
    line-height: 1.8;
    color: #ffffff; /* Updated text color to white */
    background-color: #2f2f2f;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  
  .bg-1 { 
    background-color: #1abc9c; /* Green */
    color: #ffffff;
  }
  .bg-2 { 
    background-color: #474e5d; /* Dark Blue */
    color: #ffffff;
  }
  .bg-3 { 
    background-color: #2f2f2f;
    color: #ffffff; /* Updated text color to white */
  }
  .bg-4 { 
    background-color: #2f2f2f; /* Black Gray */
    color: #fff;
  }
  .container-fluid {
    padding-top: 70px;
    padding-bottom: 70px;
  }
  .navbar {
    padding-top: 15px;
    padding-bottom: 15px;
    border: 0;
    border-radius: 0;
    margin-bottom: 0;
    font-size: 12px;
    letter-spacing: 5px;
    background-color: rgba(5, 5, 5, 0.8);
    color: #ffffff ;
  }
  .navbar-nav  li a:hover {
    color: #1abc9c !important;
  }

  .footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: rgba(5, 5, 5, 0.8); /* Black Gray */
    color: #fff;
    text-align: center;
    padding: 25px;
  }

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">Entry System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Home</a></li>
        <li><a href="/about-us">About</a></li>
        <li><a href="/contact-us">Contact us</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- Third Container (Grid) -->
<div class="container bg-3">    
  <p></p>
  @yield('pageContent')
</div>

<!-- Footer -->
<div class="footer">
  <p> Copyright &copy; 2024.<a href="https://www.w3schools.com">Researcher.Sanagustin</a></p> 
</div>

</body>
</html>
