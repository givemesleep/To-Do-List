<?php 
    require_once 'config.php';
    session_start();

    $txtID = $_POST['txtID'];
    $txtTodo = $_POST['txtTodo'];
    $Sdate = $_POST['Sdate'];
    $Edate = $_POST['Edate'];
    $cboType = $_POST['cboType'];

    function InsertMoto($Todo, $Sdat, $Edat, $Type){
        global $conn;
        try{

            $sqlInsert = 'INSERT INTO public.tbtdl("tdDesc", "Sdate", "Edate", "statID", "catID")
            VALUES (?, ?, ?, 2, ?)';
            $insData=array(
                $Todo, $Sdat, $Edat, $Type
            );
            $stmt=$conn->prepare($sqlInsert);
            $stmt->execute($insData);

            if($stmt){
                $_SESSION['todoADDED'] = 'To-Do Added!';
                header('location: ../tdl.php');
            }else{
                $_SESSION['todoFailed'] = "Error Adding New To-Do!";
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    function UpdateMoto($Todo, $Sdat, $Edat, $Type, $txtID){
        global $conn;
        try{

            $sqlInsert = 'UPDATE public.tbtdl
            SET  "tdDesc"=?, "Sdate"=?, "Edate"=?, "catID"=?
            WHERE "tdlID"=?';
            $insData=array(
                $Todo, $Sdat, $Edat, $Type, $txtID
            );
            $stmt=$conn->prepare($sqlInsert);
            $stmt->execute($insData);

            if($stmt){
                $_SESSION['todoUpdated'] = 'To-Do Updated!';
                header('location: ../tdl.php');
            }else{
                $_SESSION['todoFailed'] = "Error Adding New To-Do!";
            }

        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    try{
        if($txtID == 0){
            // InsertMoto($txtTodo, $Sdate, $Edate, $cboType);
            InsertMoto($txtTodo, $Sdate, $Edate, $cboType);
        }else{
            UpdateMoto($txtTodo, $Sdate, $Edate, $cboType, $txtID);
        }
            
          
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>