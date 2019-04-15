<?php
  session_start();
  if (!isset($_SESSION['logged']) || $_SESSION['logged'] == FALSE) {
    header('Location: login.php');
    exit();
  } else if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] == "client") {
    header('Location: home_clients.php');
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
    <a class="navbar-brand" href="home_providers.php">
      <img src="res/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Project
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home_providers.php"><i class="fas fa-home"></i> Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile_providers.php"><i class="fas fa-user"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-book"></i> Orders</a>
        </li>
      </ul>
      <ul class="navbar-nav navbar-right">
        <li class="nav-item">
          <div class="navbar-text">Welcome, <?php echo $_SESSION['user_name']; ?>. Bon appétit!</div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  </nav>

  <div class="container">
    <div class="card main-card">
      <h1 class="mb-0">
        <button class="btn btn-secondary btn-lg btn-block active" data-toggle="collapse" data-target="#collapseIncomingOrders" aria-expanded="true" aria-controls="collapseIncomingOrders">
          Incoming Orders
        </button>
      </h1>
      <div id="collapseIncomingOrders" class="collapse show" aria-labelledby="headingIncomingOrders">
        <div class="card-body">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Order title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Order subtitle</h6>
              <p class="card-text">This is an example of an order text</p>
              <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-primary inline">Accept</a>
                <a href="#" class="btn btn-primary inline">Reject</a>
                <a href="#" class="btn btn-primary inline">Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card main-card">
      <h1 class="mb-0">
        <button class="btn btn-secondary btn-lg btn-block active" data-toggle="collapse" data-target="#collapsePreparedOrders" aria-expanded="false" aria-controls="collapsePreparedOrders">
          Prepared Orders
        </button>
      </h1>
      <div id="collapsePreparedOrders" class="collapse" aria-labelledby="headingPreparedOrders">
        <div class="card-body">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Order title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Order subtitle</h6>
              <p class="card-text">This is an example of an order text</p>
              <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-primary inline">Accept</a>
                <a href="#" class="btn btn-primary inline">Reject</a>
                <a href="#" class="btn btn-primary inline">Details</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card main-card">
      <h1 class="mb-0">
        <button class="btn btn-secondary btn-lg btn-block active" data-toggle="collapse" data-target="#collapseCompletedOrders" aria-expanded="false" aria-controls="collapseCompletedOrders">
          Completed Orders
        </button>
      </h1>
      <div id="collapseCompletedOrders" class="collapse" aria-labelledby="headingCompletedOrders">
        <div class="card-body">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Order title</h5>
              <h6 class="card-subtitle mb-2 text-muted">Order subtitle</h6>
              <p class="card-text">This is an example of an order text</p>
              <div class="btn-group btn-group-justified">
                <a href="#" class="btn btn-primary inline">Details</a>
              </div>
            </div>
          </div>
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
