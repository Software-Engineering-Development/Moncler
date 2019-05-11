<?php
    # Inizializzazione della sessione
    session_start();

    # Inclusione del file per la connessione al database
    include("include/db_conn.php");

    //include("function_pagination_data.php");
?>

<?php

    if (isset($_POST["idUserReport"]))
    {
        $idUserReport = $_POST["idUserReport"];
    }
    else
    {
       // header("location: User Report.php");
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
        <head>
                <meta charset="utf-8" />
                <title>User Report</title>

                <meta name="viewport" content="width=device-width, initial-scale=1.0" />

                <link rel="StyleSheet" href="./bootstrap-3.2.0-dist/css/bootstrap.min.css" type="text/css" />
                <link rel="Stylesheet" type="text/css" href="styles.css">

                <script type="text/javascript" src="js/jquery/jquery.min.js"></script>
                <script type="text/javascript" src="js/Report.js"></script>
                <script type="text/javascript" src="js/jquery.js"></script>

                <style type="text/css">

                /*
                body
                {
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
                */
                </style>
        </head>
        <body onload="">
                <h1>User Report</h1>
    <thead>
        <tr>
            <th>Avatar</th>
            <th>First name</th>
            <th>Last Name</th>
            <th>Action</th>
        </tr>
    </thead>


    <script type="text/javascript" src="js/jquery.js"></script>

    <!-- AJAX | JQUERY (Start) -->
    <script type="text/javascript">

        //JQuery --> Ajax
        $(document).ready
        (
        function()
        {
            //Button
        	$("#yes").click
            (
            function()
        	{
                var idUserReport = $("#idUserReport").val();

                var request = $.ajax
                ({
                    type:   'post',                       // Tipo di richiesta HTTP
                  //method: 'post',
                    url :   'cancel.php', // Percorso allo script lato server
                    data: {
                                idUserReport:idUserReport
                          },                              // Parametri opzionali, per impostare la query string da inviare
                    dataType : 'html',                    // Parametro opzionale, formato dei dati (xml, json, script, o html)
                    success: function (data)              // Istruzioni richiamate al termine della richiesta
                    {
                        $("#latest-topic").html(data);    // Inserisco i dati restituiti nel DIV
                    }
                });

                //Test
                //alert("Si");
            });

        	$("#no").click
            (
            function()
        	{
        	    //Test
        	    //alert("No");
                window.open("");
        		return false;
        	});
        });

    </script>
    <!-- AJAX | JQUERY (End) -->


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

    // Numero righe selezionate dalla query nelle tabelle
    $numRows = mysqli_num_rows($rsPreloadImages);

    //echo "Ci sono ".$numRows. " righe nel database.";
    $_SESSION['numColumn'] = $numRows;

    for ($i=1;$i<=$_SESSION['numColumn'];$i++)
    {
                $rs_user_report = mysqli_query($mysqli, "SELECT * FROM `user_report`");

        if (mysqli_num_rows($rs_user_report)>0)
        {
            $user_report= mysqli_fetch_array($rs_user_report, MYSQLI_BOTH);

            $id     = $user_report['id'];
            $avatar     = $user_report['avatar'];
            $first_name = $user_report['first_name'];
            $last_name  = $user_report['last_name'];
        }
    ?>
        <table class="table table-condensed table-bordered table-hover table-striped">
            <thead>
                <tbody>
                <tr>
                     <td><img id="" class="" src="image/<?php echo $avatar; ?>"></td>
                     <td><?php echo $first_name; ?></td>
                     <td><?php echo $last_name;  ?></td>
                     <td>

                        <!-- -->
                        <div class='div-profile_ad'>
                            <a align="center">

                                <!--|-----------------------------------------------------------------------------------------------------------------------|-->
                                <!--|--------------------------------------------------[ FORM ]-------------------------------------------------------------|-->
                                <!--|-----------------------------------------------------------------------------------------------------------------------|-->
                                <!--|--------------------------------------------------(Start)--------------------------------------------------------------|-->
                                <!--|-----------------------------------------------------------------------------------------------------------------------|-->

                                <!-- FORM -->
                                <form action="cancel.php"
                                    method="POST">

                                    <div id="box-button-cancel" class="box-button-canceld">
                                        <!-- <a class="box_text5"> -->
                                            <!-- Cancella -->
                                            <input type="submit" id="botton" value="Cancella" name="idUserReport" class="button_canceled">
                                            <div class="cancel"></div>
                                        <!-- </a> -->
                                    </div>
                                </form>

                                <!--|-----------------------------------------------------------------------------------------------------------------------|-->
                                <!--|--------------------------------------------------[ FORM ]-------------------------------------------------------------|-->
                                <!--|-----------------------------------------------------------------------------------------------------------------------|-->
                                <!--|---------------------------------------------------(End)---------------------------------------------------------------|-->
                                <!--|-----------------------------------------------------------------------------------------------------------------------|-->

                            </a>
                        </div>

                     </td>
                </tr>
                </tbody>
            </thead>
        </table>


        <!-- FORM -->
        <!-- JQuery  -->

        <!--
        <div class="">
        <form  method="post" id="data_module" name="data_module">

                <div id"select_box">
                        <div class="msg-warning">
                                Cancellazione <br>
                        </div>

                        <div class="form_cancel">
                                Stai per cancellare il nominatvo"<?php if (isset($_POST["idUserReport"])) { echo $title; } ?>".<br>Vuoi cancellarlo definitivamente ?
                        </div>

                        <!-- Sì ->
                        <div id="button_yes" class="button_yes">
                                <input type="button" id="yes" value="Si">
                        </div>

                        <!-- No ->
                        <div id="button_no" class="button_no">
                                <input type="button" id="no" value="No">
                        </div>
                </div>

                <div class="box_text_ad_cancel">
                        <!-- ID ->
                        <input type="text" name="idUserReport" id="idUserReport"  value="<?php if (isset($_POST["idUserReport"])) {  echo $id; } ?>">
                        <div id="result"></div>
                </div>
        </form>
        </div>
        -->

    <?php
    }

    ?>

        </body>
</html>
