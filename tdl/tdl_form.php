<?php 
    require_once 'includes/config.php';
    session_start();

    $desc='';
    $sdate='';
    $edate='';
    $cat='';
    if(isset($_GET['EditID'])){
    $id=$_GET['EditID'];
    $sqlQuery='SELECT "tdlID", "tdDesc", "Sdate", "Edate", "statID", "catID" FROM public.tbtdl
            WHERE "tdlID" = ?';
    $dataQ=array( $id );
    $stmtQ=$conn->prepare($sqlQuery);
    $stmtQ->execute($dataQ);

    $rows=$stmtQ->fetch();
    //rows
    $desc=$rows['tdDesc'];
    $sdate=$rows['Sdate'];
    $edate=$rows['Edate'];
    // $stat=$rows['statID'];
    $cat=$rows['catID'];
        
    $newSdate = date("d-m-Y", strtotime($sdate));
    $newEdate = date("d-m-Y", strtotime($edate));
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Husto | Add To-Do</title>
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

            <div class="card mt-5" style="width : 750px">
                <div class="card-body">
                    <h2 class="mt-4" style="color:cadetblue"><b>Add To-Do</b></h2>
                    <div class="text-start mt-3">
                        <a href="tdl.php"><button type="button" class="btn btn-dark"><i class="bi bi-arrow-left"></i> To-Do List</button></a>
                    </div>
                      <br>
                    <form action="includes/ins_td.php" method="post" class="row g-3 needs-validation" novalidate>
                        
                        <input type="hidden" value="<?php echo $id; ?>" name="txtID">
                        
                        <div class="col-12">
                            <label for="yourUsername" class="form-label">To-Do :</label>
                            <div class="input-group has-validation">
                                <textarea name="txtTodo" id="yourUsername" required class="form-control" placeholder="<?php echo $desc; ?>"></textarea>
                                <div class="invalid-feedback">Please enter your To-Do for today.</div>
                            </div>
                        </div>

                        <div class="col-6">
                            <label for="yourPassword" class="form-label">Start Date :</label>
                            <input type="date" name="Sdate" class="form-control" id="datePicker1" required value="<?php echo $newSdate; ?>">
                            <div class="invalid-feedback">Please enter your STARTING DATE!</div>
                        </div>

                        <div class="col-6">
                            <label for="yourPassword" class="form-label">End Date :</label>
                            <input type="date" name="Edate" class="form-control" id="datePicker2" required value="<?php echo $newEdate; ?>">
                            <div class="invalid-feedback">Please enter your END DATE!</div>
                        </div>

                        <div class="col-6">
                            <label for="yourPassword" class="form-label">To-Do Type :</label>
                            <select name="cboType" id="" class="form-select">
                                <option value="<?= $cat ?>">Choose Type</option>
                                <?php 
                                    $sqlType='SELECT * FROM public."tbCateg"';
                                    $stmt=$conn->prepare($sqlType);
                                    $stmt->execute();

                                    while($rows=$stmt->fetch()){
                                        echo "<option value='".$rows['catID']."'>".$rows['categDesc']."</option>";
                                    }
                                
                                ?>
                            </select>
                            <div class="invalid-feedback">Please select TO-DO TYPE!</div>
                        </div>

                        <div class="text-end">
                            <button class="btn btn-secondary" type="reset">Reset</button>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
            </form>
        </div>
      </div>
    </div>

    
  </div>
</section>

</main><!-- End #main -->

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
  <script>
    // var today = moment().format('YYYY-MM-DD');
    //   $('.dates').val(today);
    document.getElementById('datePicker1').valueAsDate = new Date();
    document.getElementById('datePicker2').valueAsDate = new Date();
  </script>


</body>
</html>