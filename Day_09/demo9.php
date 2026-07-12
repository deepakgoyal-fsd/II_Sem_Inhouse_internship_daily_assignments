<table border="1" cellpadding="6">
  <tr>
    <th>Name</th>
    <th>Email</th>
  </tr>
<?php $rowNum = 0; while ($record = mysqli_fetch_assoc($result)) { $rowNum++; ?>
  <tr>
    <td><?= $rowNum ?>. <?= $record['name'] ?></td>
    <td><?= $record['email'] ?></td>
  </tr>
<?php } ?>
</table>
