<div class="position-absolute m-2" style="bottom: 0; right: 0;">
<?php
if (isset($_GET['newProduct'])) {
  $message = $_GET['newProduct'];
  if ($message == "success") {
       ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    New Product is added!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
       <?php
  } else {
       echo "Error";
  }
}
?>
</div>