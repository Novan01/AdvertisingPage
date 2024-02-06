<?php


    if (isset($_POST['submit'])){
        // FORM VARIABLES
        $dateExample = $_POST['dateExample'];
        $typeExample = $_POST['typeExample'];
        $advertismentExample = $_POST['advertismentExample'];
        $totalCostExample = $_POST['totalCostExample'];
        $createdExmaple = $_POST['createdExmaple'];

        //EXISTING UPDATE
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $id = urldecode($id);
            $db_auth = open_auth();
            $db_auth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateExisiting = "UPDATE advertisingTableExample SET dateExample=:dateExample, typeExample=:typeExample, advertismentExample=:advertismentExample, totalCostExample=:totalCostExample, createdExmaple=:createdExmaple WHERE id=:id";
            $stmt = $db_auth->prepare($updateExisiting);
            $stmt->bindParam(':dateExample', $dateExample, PDO::PARAM_STR);
            $stmt->bindParam(':typeExample', $typeExample, PDO::PARAM_STR);
            $stmt->bindParam(':advertismentExample', $advertismentExample, PDO::PARAM_STR);
            $stmt->bindParam(':totalCostExample', $totalCostExample, PDO::PARAM_INT);
            $stmt->bindParam(':createdExmaple', $createdExmaple, PDO::PARAM_INT);
            $stmt->execute();
        }

        else{
            //NEW ENTRY
            if(!isset($_POST['totalCostExample'])) {
                $cost = 0.0;
            }
            $db_auth = open_auth();
            $db_auth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $createNew = "INSERT INTO advertisingTableExample (dateExample, typeExample, ad_type, advertismentExample, totalCostExample, createdExmaple) VALUE (:dateExample, :typeSelect, :typeExample, :advertismentExample, :totalCostExample, :createdExmaple)";
            $stmt = $db_auth->prepare($createNew);
            $stmt->bindParam(':dateExample', $dateExample, PDO::PARAM_STR);
            $stmt->bindParam(':typeExample', $typeExample, PDO::PARAM_STR);
            $stmt->bindParam(':advertismentExample', $advertismentExample, PDO::PARAM_STR);
            $stmt->bindParam(':totalCostExample', $totalCostExample, PDO::PARAM_INT);
            $stmt->bindParam(':createdExmaple', $createdExmaple, PDO::PARAM_INT);
            $stmt->execute();
            $lastID = $db_auth->lastInsertId();
            header('Location: creationExample.php?id=' . $lastID);
        }
    
    }

    if(!isset($_SESSION['email'])){
        session_destroy();
        header('Location: loginExample.php');
    }else{
        $existing = 0;
        $email = $_SESSION['email'];
        if(isset($_GET['id']))
        {
            $existing = 1;
            $id = $_GET['id'];
            $id = htmlentities(urldecode($id));
            $db_auth = open_auth();
            $getClass = "SELECT * FROM advertisingTableExmaple WHERE id = '" . $id . "'";
            $stmt = $db_auth->prepare($getClass);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $advertisingDate = explode(", ", $result['dateSelect']);
        }
    }

    
?>


