<?php
include("navbar.php");
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Inaya</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }
  </style>
</head>

<body>



  <!--Carousel Wrapper-->
  <div id="carousel-example-1z" class="carousel slide carousel-fade pt-4" data-ride="carousel">

 

    <!--Slides-->
    <div class="carousel-inner" role="listbox">

      <!--First slide-->
      <div class="carousel-item active">
        <div class="view" style="background-image: url('./img/frag.jpg'); background-repeat: no-repeat; background-size: cover;">
        </div>
      </div>

    </div>
  
  </div>
  <!--/.Carousel Wrapper-->

  <!--Main layout-->
  <main>
    <div class="container">

      <br/>
      <!--Section: Products v.3-->
      <section class="text-center mb-4">

        <!--Grid row-->
        <div class="row wow fadeIn">

          <!--Grid column-->
          <?php
          $i = 0;
          $product_id = array();
          $result = $mysqli->query("SELECT * FROM products where status='instock'");
          if ($result === FALSE) {
            die($mysqli->error);
          }

          if ($result) {

            while ($obj = $result->fetch_object()) {

              echo
              "
          <div class='col-lg-3 col-md-6 mb-4' style='overflow-wrap: break-word;
          word-wrap: break-word;'>
 
            <!--Card-->
            <div class='card'>

              <!--Card image-->
              <div class='view overlay'>
                <img src='./img/perfumes/$obj->product_img_name' class='card-img-top'
                  alt=''>
                <a href='products.php?id=$obj->id'>
                  <div class='mask rgba-white-slight'></div>
                </a>
              </div>
              <!--Card image-->

              <!--Card content-->
              <div class='card-body text-center'>
                <!--Category & Title-->
                <a href='' class='grey-text'>
                  <h5>$obj->category</h5>
                </a>
                <h5>
                  <strong>
                    <a href='' class='dark-grey-text'>$obj->product_name
                      <span class='badge badge-pill danger-color'>NEW</span>
                    </a>
                  </strong>
                </h5>

                <h4 class='font-weight-bold blue-text'>
                  <strong>Ksh $obj->cost_per_item</strong>
                </h4>

              </div>
              <!--Card content-->

            </div>
            <!--Card-->

          </div>
          <!--Grid column-->";
              $i++;
            }
          } ?>

      </section>
      <!--Section: Products v.3-->

      <!--Pagination-->
      <nav class="d-flex justify-content-center wow fadeIn">
        <ul class="pagination pg-blue">

          <!--Arrow left-->
          <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
              <span class="sr-only">Previous</span>
            </a>
          </li>

          <li class="page-item active">
            <a class="page-link" href="#">1
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">2</a>
          </li>

          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
              <span class="sr-only">Next</span>
            </a>
          </li>
        </ul>
      </nav>
      <!--Pagination-->
      <?php
      include("footer.php");
      ?>
    </div>
  </main>
  <!--Main layout-->


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