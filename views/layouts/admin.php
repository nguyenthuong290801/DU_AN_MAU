<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
    <?php
	if($_SERVER['REQUEST_URI'] == '/') {
		echo "Home";
	} else {
		echo ucwords(substr($_SERVER['REQUEST_URI'], 1)) ;
		
	}
	?>
    </title>
    <?php include dirname(__DIR__)."/admin/components/style.php"; ?>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include dirname(__DIR__)."/admin/components/navbar.php"; ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php include dirname(__DIR__)."/admin/components/navhead.php"; ?>
        <!-- partial -->
        <div class="main-panel">
        <?php include dirname(__DIR__)."/admin/components/breadcrumb.php"; ?>
        {{content}}
          <!-- content-wrapper ends -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <?php include dirname(__DIR__)."/admin/components/script.php"; ?>
  </body>
</html>