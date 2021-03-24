<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Mòdul 07 UF's 3 i 4</title>
        <link rel="stylesheet" href="css/mystyle.css" >
        <script src="js/my_functions.js"></script>
    </head>
    <body onload="showEstadistiques(1)">
        <?php
        include_once 'classes/Config.php';
        $config = new Config("xml/config.xml");
        echo "<h5 align='right'>Avui és " . date("Y/m/d") . "</h5>";
        echo $config->getTitle();
        echo $config->getSubtitle();
        $cookie_name = "last_time";
        if (isset($_COOKIE[$cookie_name])) {
            echo "<p>Hola, no ens veiem des de: " . $_COOKIE[$cookie_name] . "</p>";
        }
        $cookie_value = date("d/m/Y");
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        ?>
        <form>
            <label>Modalitats:</label>
            <select class="dropdown-content" name="modalitats" onchange="showEstadistiques(this.value)">
                <option value="1">Totes</option>
                <option value="2">Humà</option>
                <option value="3">Màquina</option>
            </select>
        </form>
        <br>
        <div id="taula_estadistiques_id"></div>
    </body>
</html>
