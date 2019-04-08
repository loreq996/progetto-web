<?php
  session_start();
  if (!isset($_SESSION['logged']) || $_SESSION['logged'] == FALSE) {
    header('Location: login.php');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Project</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="home_clients.php">
      <img src="res/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Project
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home_clients.php"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile_clients.php"><i class="fas fa-user"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="orders_clients.php"><i class="fas fa-book"></i> Orders</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right">
        <li class="nav-item">
          <div class="navbar-text">Welcome, <?php echo $_SESSION['client_name']; ?>. Bon appétit!</div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="card main-card">
      <h1 class="mb-0 form-group form-inline">
        <button class="btn btn-secondary btn-lg btn-block active" data-toggle="collapse" data-target="#collapseFavouriteRestaurants" aria-expanded="true" aria-controls="collapseFavouriteRestaurants">
          Your Favourite Restaurants
        </button>
      </h1>
      <div id="collapseFavouriteRestaurants" class="collapse show" aria-labelledby="headingFavouriteRestaurants">
        <div class="card-body">
          <form class="form-inline card-searchbar">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <div class="card-body">
            <h5 class="card-title">Restaurant title</h5>
            <h6 class="card-subtitle mb-2 text-muted">Restaurant subtitle</h6>
            <p class="card-text">This is an example of a restaurant text. This is one of your favourite restaurants!</p>
            <div class="btn-group btn-group-justified">
              <a href="#" class="btn btn-primary inline">Show</a>
              <a href="#" class="btn btn-primary inline">Details</a>
              <a href="#" class="btn btn-primary inline">Remove Favourite</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card main-card">
      <h1 class="mb-0 form-group form-inline">
        <button class="btn btn-secondary btn-lg btn-block active" data-toggle="collapse" data-target="#collapsePreparedOrders" aria-expanded="true" aria-controls="collapsePreparedOrders">
          Restaurants
        </button>
      </h1>
      <div id="collapsePreparedOrders" class="collapse show" aria-labelledby="headingRestaurants">
        <div class="card-body">
          <form class="form-inline card-searchbar">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <div class="row">
            <?php
              $servername = "localhost";
              $username = "root";
              $password="";
              $db = "uni_web_prod";
              $conn = new mysqli($servername, $username,$password,$db);
              if($conn->connect_error) {
                die("Connection failed: ".$conn->connect_error);
              }
              if ($allProviders = $conn->query("SELECT p.provider_id, p.provider_name, t.type_name
                                          FROM provider p
                                          LEFT JOIN type t
                                          ON p.type_id = t.type_id")) {
              while ($providerRow = $allProviders->fetch_assoc()) {
            ?>
            <div class="card col-sm-4" style="width: 18rem; margin: 2px">
              <div class="card-body">
                <h5 class="card-title"><?php echo $providerRow['provider_name'] ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $providerRow['type_name'] ?></h6>
                <p class="card-text">
                  <?php
                    if ($providerCategories = $conn->query("SELECT c.category_name
                                          FROM provider p
                                          LEFT JOIN provider_category pc
                                          ON p.provider_id = pc.provider_id
                                          LEFT JOIN category c
                                          ON c.category_id = pc.category_id
                                          WHERE p.provider_id = '".$providerRow['provider_id']."'")) {
                      while ($categoryRow = $providerCategories->fetch_assoc()) {
                        echo "<span class=\"badge badge-pill badge-info\">".$categoryRow['category_name']."</span> ";
                      }
                      $providerCategories->close();
                    }
                  ?>
                </p>
                <div class="btn-group btn-group-justified">
                  <a href="#" class="btn btn-primary inline">Show</a>
                  <a href="#" class="btn btn-primary inline">Details</a>
                  <a href="#" class="btn btn-primary inline">Add Favourite</a>
                </div>
              </div>
            </div>
            <?php
                }
                $allProviders->close();
              } else {
                echo "Query failed";
              }
             ?>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <p class="text-muted">Dummy Copyrights</p>
      </div>
    </footer>
</body>

</html>
