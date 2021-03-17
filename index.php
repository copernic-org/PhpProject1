<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include_once 'DatabasePDO.php';
        include_once 'EstadistiquesRow.php';
        $db = null;
        try {
            echo "<h1>PHP MySQL</h1>";
            echo "<h2>Inserció</h2>";
            $db = new DatabasePDO("localhost:3306", "root", "admin", "m07uf3");
            $db->connect();
            echo "<p>Connected successfully</p>";
            $last_record = $db->insert(ModalitatEnum::HUMA, 1, 5);
            echo "<p>Registre $last_record inserit correctament</p>";
            echo "<h2>Estadístiques</h2>";
            echo DatabasePDO::TABLE_START;
            $stmt = $db->selectAll();
            foreach (new EstadistiquesRow(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $row) {
                echo $row;
            }
        } catch (Exception $error) {
            echo "connection failed: " . $error->getMessage();
        }
        DatabasePDO::TABLE_END
        ?>

    </body>
</html>
