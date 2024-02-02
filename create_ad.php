<?php


    if (isset($_POST['submit'])){
        // FORM VARIABLES
        $dateSelect = $_POST['dateSelect'];
        $typeSelect = $_POST['typeSelect'];
        $ad_type = $_POST['ad_type'];
        $round = $_POST['round'];
        $number_sent = $_POST['number_sent'];
        $cost = $_POST['cost'];
        $states = $_POST['states'];
        $date_created = $_POST['date_created'];
        $date_sent = $_POST['date_sent'];
        $partial_states = $_POST['partial_states'];
        $radius = $_POST['radius'];
        $notes = $_POST['notes'];
        
        //var_dump($_POST);

        //EXISTING UPDATE
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            $id = urldecode($id);
            $db_auth = open_auth();
            $db_auth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $updateExisiting = "UPDATE advertising_log SET dateSelect=:dateSelect, typeSelect=:typeSelect, ad_type=:ad_type, round=:round, number_sent=:number_sent, cost=:cost, states=:states, date_created=:date_created, date_sent=:date_sent, partial_states=:partial_states, radius=:radius, notes=:notes WHERE id=:id";
            $stmt = $db_auth->prepare($updateExisiting);
            $stmt->bindParam(':dateSelect', $dateSelect, PDO::PARAM_STR);
            $stmt->bindParam(':typeSelect', $typeSelect, PDO::PARAM_STR);
            $stmt->bindParam(':ad_type', $ad_type, PDO::PARAM_STR);
            $stmt->bindParam(':round', $round, PDO::PARAM_INT);
            $stmt->bindParam(':number_sent', $number_sent, PDO::PARAM_INT);
            $stmt->bindParam(':cost', $cost, PDO::PARAM_STR);
            $stmt->bindParam(':states', $states, PDO::PARAM_STR);
            $stmt->bindParam(':date_created', $date_created, PDO::PARAM_STR);
            $stmt->bindParam(':date_sent', $date_sent, PDO::PARAM_STR);
            $stmt->bindParam(':partial_states', $partial_states, PDO::PARAM_STR);
            $stmt->bindParam(':radius', $radius, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->bindParam(':id',$id, PDO::PARAM_STR);
            $stmt->execute();
        }

        else{
            //NEW ENTRY
            if(!isset($_POST['round'])) {
                $round = 0;
                //$stmt->bindParam(':round', $round)
            }
            if(!isset($_POST['cost'])) {
                $cost = 0.0;
            }
            if(!isset($_POST['number_sent'])) {
                $number_sent = 0;
            }
            $db_auth = open_auth();
            $db_auth->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $createNew = "INSERT INTO advertising_log (dateSelect, typeSelect, ad_type, round, number_sent, cost, states, date_created, date_sent, partial_states, radius, notes) VALUE (:dateSelect, :typeSelect, :ad_type, :round, :number_sent, :cost, :states, :date_created, :date_sent, :partial_states, :radius, :notes)";
            $stmt = $db_auth->prepare($createNew);
            $stmt->bindParam(':dateSelect', $dateSelect, PDO::PARAM_STR);
            $stmt->bindParam(':typeSelect', $typeSelect, PDO::PARAM_STR);
            $stmt->bindParam(':ad_type', $ad_type, PDO::PARAM_STR);
            $stmt->bindParam(':round', $round, PDO::PARAM_INT);
            $stmt->bindParam(':number_sent', $number_sent, PDO::PARAM_INT);
            $stmt->bindParam(':cost', $cost, PDO::PARAM_STR);
            $stmt->bindParam(':states', $states, PDO::PARAM_STR);
            $stmt->bindParam(':date_created', $date_created, PDO::PARAM_STR);
            $stmt->bindParam(':date_sent', $date_sent, PDO::PARAM_STR);
            $stmt->bindParam(':partial_states', $partial_states, PDO::PARAM_STR);
            $stmt->bindParam(':radius', $radius, PDO::PARAM_STR);
            $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
            $stmt->execute();
            // var_dump($stmt->errorInfo());
            $lastID = $db_auth->lastInsertId();
            header('Location: create_ad.php?id=' . $lastID);
        }
    
    }

    if(!isset($_SESSION['email'])){
        session_destroy();
        header('Location: sign-in.php');
    }else{
        $existing = 0;
        $email = $_SESSION['email'];
        if(isset($_GET['id']))
        {
            $existing = 1;
            $id = $_GET['id'];
            $id = htmlentities(urldecode($id));
            $db_auth = open_auth();
            $getClass = "SELECT * FROM advertising_log WHERE id = '" . $id . "'";
            $stmt = $db_auth->prepare($getClass);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $advertisingDate = explode(", ", $result['dateSelect']);
        }
    }

    
?>


