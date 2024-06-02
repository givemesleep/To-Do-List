<?php 
    require_once 'includes/config.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Husto | To-Do List</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/goju.jpg" rel="icon">
  <link href="assets/img/goju.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

<main>

<section class="section min-vh-50 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="row ">
    <div class="col-lg-12 ">

      <div class="card mt-5" style="width : 1300px">
        <div class="card-body">
          <h2 class="mt-4" style="color:cadetblue"><b>To-Do Archived / Removed</b></h2>
          <a href="tdl.php"><button type="button" class="btn btn-dark"><i class="bi bi-arrow-left"></i> To-Do List</button></a>
          <br>
          <table class="table datatable table-hover">
            <thead>
              <tr>
                <th width="120px">List #</th>
                <th width="400px">Description</th>
                <th width="200px">Category</th>
                <th width="300px">Date</th>
                <th width="200px">Status</th>
              </tr>
            </thead>
              <tbody>
                <?php 
                try{
                $sqlQuery='SELECT
                            tdl."tdlID" AS IDs, tdl."tdDesc" AS Descs, tdl."Sdate" AS Sdate,
                            tdl."Edate" AS Edate, st."statDesc" AS StatDesc, ct."categDesc" AS Category
                            
                        FROM public."tbtdl" tdl
                        
                        JOIN public."tbstatus" st ON (tdl."statID" = st."statID")
                        JOIN public."tbCateg" ct ON (tdl."catID" = ct."catID")
                        WHERE tdl."statID" = 1 OR tdl."statID" = 3
                        ';
                $stmt=$conn->prepare($sqlQuery);
                $stmt->execute();
                $td='';

                
                    $ID=1;
                    
                    while($rows=$stmt->fetch()){
                     
                      $status = $rows['statdesc'];
                      $badgesmo = '';
                      $icon='';
                      $shii='';
                      if($status == 'Finished'){
                          $badgesmo = 'badge rounded-pill bg-success text-dark';
                          $icon = 'bi bi-clock-history';
                          $shii.='<h4><span class="'.$badgesmo.'"><i class="'.$icon.'"></i> '.$status.'</span></h4>';
                      }else{
                        $badgesmo = 'badge rounded-pill bg-danger text-dark';
                        $icon = 'bi bi-clock-history';
                        $shii.='<h4><span class="'.$badgesmo.'"><i class="'.$icon.'"></i> '.$status.'</span></h4>';
                        }
                          
                      
                        $td.='
                        <tr>
                        <td>' . $ID . '</td>
                        <td>' . $rows['descs'] . '</td>
                        <td>' . $rows['category'] . '</td>
                        <td>' . $rows['sdate'] . ' until ' . $rows['edate']. '</td>
                        <td class="text-middle">' . $shii . '</td>
                        </tr>
                        ';
                        $ID++;
                    }
                    echo $td;
                }catch(PDOException $e){
                    echo $e->getMessage();
                }
                
                ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>

    
  </div>
</section>
</main><!-- End #main -->
<script>

<?php 
if(isset($_SESSION['Archive'])){
    ?>Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'To-Do Archived!',
        text: '<?php echo $_SESSION['Archive'] ?>',
        timer: 1500
    });    

<?php unset($_SESSION['Archive']); } ?>

<?php 
if(isset($_SESSION['todoFailed'])){
    ?>Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'To-Do Failed!',
        text: '<?php echo $_SESSION['todoFailed'] ?>',
        timer: 1500
    });    

<?php unset($_SESSION['todoFailed']); } ?>

<?php 
if(isset($_SESSION['Removed'])){
    ?>Swal.fire({
        position: 'center',
        icon: 'danger',
        title: 'To-Do Removed!',
        text: '<?php echo $_SESSION['Removed'] ?>',
        timer: 1500
    });    

<?php unset($_SESSION['Removed']); } ?>

</script>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script src="jqueryto/jquerymoto.js"></script>
  <script src="jqueryto/poppermoto.js"></script>
  <script src="jqueryto/bootstrapmoto.js"></script>
  <script src="jqueryto/sweetalertmoto.js"></script>

  <script>
    // var today = moment().format('YYYY-MM-DD');
    //   $('.dates').val(today);

    document.getElementById('datePicker').valueAsDate = new Date();
  </script>


</body>
</html>