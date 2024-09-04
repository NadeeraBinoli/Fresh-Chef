<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="testingmenu.css">
    <title>Fresh Chef</title>
    <link rel="icon" type="image/png" href="A_IMG/favicon.png">
</head>
<body>

 <?php 
    include 'connection.php';
    include 'funtion.php';  // Include functions.php to make getAll function available
    

    ?> 
<table class="table">
                <thead>
                  <tr>
                  <th>Complain ID </th>
                  <th>Custormer ID </th>
                  <th>Complain Date </th>
                  <th>Complain Description </th>
                  <!-- <th>Operations</th> -->
                  </tr>
                </thead>

                <tbody>
                  <?php

                    $complain = getAll('r_compliant');
                    if(mysqli_num_rows($complain) > 0)
                    {
                        foreach($complain as $complainItem)
                        {
                            ?>
                            <tr>
                          <td><?= htmlspecialchars($complainItem['comp_rec_id']); ?></td>
                          <td><?= htmlspecialchars($complainItem['customer_id']); ?></td>
                          <td><?= htmlspecialchars($complainItem['comp_date']); ?></td>
                          <td><?= htmlspecialchars($complainItem['comp_description']); ?></td>
                          <!-- <td>
                          <div class="operation">
                          <a href="delete.php?deletid=<?php echo htmlspecialchars($complainItem['comp_rec_id']); ?>"><img src="A_IMG/remove.png" alt="" class="remove" style="width:2rem; height:2 rem;"></a>
                          <a href="Update.php?updateid=<?= htmlspecialchars($complainItem['comp_rec_id']); ?><?php echo htmlspecialchars($complainItem['comp_rec_id']); ?>"><img src="A_IMG/update.png" alt="" style="width:2rem; height:2 rem;"></a>
                          </div>
                          </td> -->
                      </tr>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                        <tr>
                            <td colspan="5">No record found!</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
              </table>
    
</body>
</html>