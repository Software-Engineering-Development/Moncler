<?php
    # Inizializzazione della sessione
    session_start();

    # Inclusione del file per la connessione al database
    include("include/db_conn.php");

    # Inclusione del file che verifica in quale pagina è posizionato l'annuncio
    //include("function_pagination_data.php");
?>


<?php

 $rsPreloadImages = mysqli_query($mysqli, "SELECT * FROM `user_report`");

  if (mysqli_num_rows($rsPreloadImages)>0)
        {
            $strPreload="'images/not_image.png'";

            while ($imagePreload=mysqli_fetch_array($rsPreloadImages, MYSQLI_BOTH))
            {
                //$strPreload.=",'images/prodottiDetail/".$imagePreload['image_product']."'";
                $strPreload.=",'images/".$imagePreload['avatar']."'";
            }
        }
        else
        {
            $strPreload="'images/not_image.png'";
        }


    for ($i=1;$i<=$_SESSION['numColumn'];$i++)
    {

    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta charset="utf-8" />
                <title>User Report</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <link rel="StyleSheet" href="./bootstrap-3.2.0-dist/css/bootstrap.min.css" type="text/css" />
                <script type="text/javascript" src="./js/jquery/jquery.min.js"></script>
                <script type="text/javascript" src="./js/Report.js"></script>
                <style type="text/css">
<!--
body {
        padding-top: 20px;
        padding-bottom: 40px;
}

.containerX {
        width: 420px;
}

div.row {
        border: 1px solid;
}
div.col* {
        border: 1px solid;
}
.span4, .span8, .span12 {
        border: 1px solid;
}
-->
                </style>
        </head>
        <body onload="">
                <h1>User Report</h1>
<table class="table table-condensed table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>First name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img class="imgProduct-profile_ad" src="images/<?php echo $strPreload; ?>"></td>
            <td>John</td>
            <td>Appleseed</td>
            <td>Delete</td>
        </tr>
        <tr>
            <td><img class="imgProduct-profile_ad" src="images/<?php echo $strPreload; ?>"></td>
            <td>Mario</td>
            <td>Rossi</td>
            <td>Delete</td>
        </tr>
    </tbody>
</table>

        </body>
</html>
