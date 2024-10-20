<?php
include("navbar.php");
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
  $user = $_SESSION['username'];
  $message = $mysqli->real_escape_string($_POST['message']);

  $result = $mysqli->query("SELECT * FROM customers WHERE email='$user' LIMIT 1") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $cid = $row['customer_id'];

  if ($cid == 0) {
    echo "<script>
      alert('Please create an account first');
      window.location.replace('login.php');
    </script>";
    exit;
  }

  $mysqli->query("INSERT INTO feedback (customer_id, message) VALUES ('$cid', '$message')") or die($mysqli->error);
  echo "<script>alert('Feedback submitted successfully!');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Feedback - Inaya Water</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
</head>

<body>

<main class="mt-5 pt-4">
  <div class="container dark-grey-text mt-5">

    <!-- Feedback Form -->
    <div class="row wow fadeIn">
      <div class="col-md-12 mb-4">
        <div class="p-4">
          <h4 class="mb-3">Send us your Feedback</h4>
          <form method="post">
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" name="submit_feedback" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- Feedback Form -->

    <hr>

    <!-- Display Feedback Messages -->
    <div class="row wow fadeIn">
      <div class="col-md-12 mb-4">
        <div class="p-4">
          <h4 class="mb-3">Messages Sent and Replied</h4>
          <?php
          $result = $mysqli->query("SELECT f.message, f.reply, c.firstname, c.lastname FROM feedback f JOIN customers c ON f.customer_id = c.customer_id WHERE c.email = '$user' ORDER BY f.created_at DESC") or die($mysqli->error);
          while ($row = $result->fetch_assoc()) {
            echo "<div class='card mb-4'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>{$row['firstname']} {$row['lastname']}</h5>";
            echo "<p class='card-text'>{$row['message']}</p>";
            if (!empty($row['reply'])) {
              echo "<hr>";
              echo "<p class='card-text'><strong>Reply:</strong> {$row['reply']}</p>";
            }
            echo "</div>";
            echo "</div>";
          }
          ?>
        </div>
      </div>
    </div>
    <!-- Display Feedback Messages -->

  </div>
</main>

<?php
include("footer.php")
?>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
  // Animations initialization
  new WOW().init();
</script>

</body>

</html>
