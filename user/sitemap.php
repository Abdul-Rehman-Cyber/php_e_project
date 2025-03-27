<!DOCTYPE php>
<php lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FlixGo Stylish Sitemap</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap" rel="stylesheet">
  <style>
    body {
      /* Dark gradient background using provided colors */
      background: linear-gradient(45deg, #2B2B31, #28282D);
      font-family: 'Montserrat', sans-serif;
      color: #ffffff;
      margin: 0;
      padding: 20px;
    }
    .sitemap-container {
      max-width: 800px;
      margin: 50px auto;
      padding: 30px;
      /* Subtle translucent background for contrast */
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
    .sitemap-header {
      text-align: center;
      margin-bottom: 30px;
    }
    /* Gradient text for headings using provided colors */
    .sitemap-header h1, 
    .sitemap-title a {
      background: linear-gradient(45deg, #FF55A3, #FF5861);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 600;
      text-decoration: none;
    }
    .sitemap-header p {
      color: #cccccc;
    }
    .sitemap-list {
      list-style: none;
      padding-left: 0;
    }
    .sitemap-list li {
      margin: 20px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.1);
      padding-bottom: 10px;
    }
    .sitemap-list li:last-child {
      border-bottom: none;
    }
    .sitemap-title {
      font-size: 1.8rem;
      margin-bottom: 10px;
    }
    .sitemap-sublist {
      list-style-type: disc;
      margin-left: 20px;
      margin-top: 10px;
    }
    .sitemap-sublist li {
      font-size: 1.1rem;
      color: #cccccc;
      margin-bottom: 5px;
    }
    .sitemap-sublist li a {
      color: #cccccc;
      text-decoration: none;
    }
    .sitemap-sublist li a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="sitemap-container">
    <div class="sitemap-header">
      <h1><a href="index.php">FlixGo Sitemap</a></h1>
      <p>Explore our website structure</p>
    </div>
    <ul class="sitemap-list">
      <li>
        <div class="sitemap-title"><a href="index.php">Home</a></div>
        <ul class="sitemap-sublist">
          <li><a href="index.php">Upcoming Movies</a></li>
          <li><a href="index.php">Currently Playing in Theaters</a></li>
        </ul>
      </li>
      <li>
        <div class="sitemap-title"><a href="movies.php">Movies</a></div>
        <ul class="sitemap-sublist">
          <li><a href="movies.php">All Movies</a></li>
        </ul>
      </li>
      <li>
        <div class="sitemap-title"><a href="booking.php">Booking</a></div>
        <ul class="sitemap-sublist">
          <li><a href="booking.php">Booking</a></li>
        </ul>
      </li>
      <li>
        <div class="sitemap-title"><a href="faq.php">Help</a></div>
        <ul class="sitemap-sublist">
          <li><a href="faq.php">Help</a></li>
        </ul>
      </li>
      <li>
        <div class="sitemap-title"><a href="about.php">About</a></div>
        <ul class="sitemap-sublist">
          <li><a href="about.php">About</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</php>
