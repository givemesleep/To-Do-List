<?php 
    require_once 'config.php';

    if(isset($_GET['ApprovedID'])){
        $id=$_GET['ApprovedID'];
        $sqlApp='UPDATE public.tbtdl SET "statID"=1 WHERE "tdlID"=?';
        $dataApp=array(
            $id
        );
        $stmt=$conn->prepare($sqlApp);
        $stmt->execute($dataApp);
        
        if ($stmt) {
            $_SESSION['Archive'] = 'To-Do Archive';
            header('location: ../tdl_table.php');
        } else {
            $_SESSION['err_app'] = 'Error in AJAX Approve';
        }
    }

    if(isset($_GET['RemovedID'])){
        $id=$_GET['RemovedID'];
        $sqlApp='UPDATE public.tbtdl SET "statID"=3 WHERE "tdlID"=?';
        $dataApp=array(
            $id
        );
        $stmt=$conn->prepare($sqlApp);
        $stmt->execute($dataApp);
        
        if ($stmt) {
            $_SESSION['Removed'] = 'To-Do Removed';
            header('location: ../tdl_table.php');
        } else {
            $_SESSION['err_app'] = 'Error in AJAX Approve';
        }
    }
   
?>