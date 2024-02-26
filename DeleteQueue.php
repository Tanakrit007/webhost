<?php

require('conn.php');

if(isset($_GET["QNumber"])) {
    $strQNumber = $_GET["QNumber"];
    $sql = "DELETE FROM queue WHERE QNumber = ?";
    $params = array($strQNumber); 
    $stml = $conn->prepare($sql);

    if ($stml->execute($params)) {
        $message = "Successfully delete queue ".$_GET['QNumber'].".";
    } else {
        $message = "Fail to delete queue information.";
    }
} else {
    $message = "QNumber not provided.";
}

$conn = null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Customer</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>

<script>
    $(document).ready(function(){
        swal({
            title: "<?php echo $message; ?>",
            icon: "info",
            buttons: false,
            timer: 2000
        });
        <?php echo $_GET['QNumber']; ?>
    });
</script>

</body>
</html>
