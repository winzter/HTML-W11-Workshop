<?php

    $keyword = "%".$_GET['keyword']."%";
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=blueshop","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT name , address , mobile , email FROM member WHERE name like ?");
        $stmt->bindParam(1,$keyword);
        $stmt->execute();

        if($stmt->rowCount() > 0){ ?>
            <br>
            <table border="1">
                <tr>
                    <th style="padding: 10px;">ชื่อ-สกุล</th>
                    <th style="padding: 10px;">ที่อยู่</th>
                    <th style="padding: 10px;">เบอร์โทร</th>
                </tr>
           <?php while($row = $stmt->fetch()){?>
                <tr>
                    <td style="padding: 10px;"><?=$row['name']?></td>
                    <td style="padding: 10px;"><?=$row['address']?></td>
                    <td style="padding: 10px;"><?=$row['mobile']?></td>
                </tr>
            <?php } ?>
            </table>
        <?php } 
    } 
    catch(PDOException $e){
        echo "Connection fail ".$e->getMessage();
    }
    ?>