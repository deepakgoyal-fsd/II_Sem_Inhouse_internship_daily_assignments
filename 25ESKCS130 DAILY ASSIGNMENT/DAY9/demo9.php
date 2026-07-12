<table border="1">
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?= $row['name'] ?></td>
  <td><?= $row['email'] ?></td>
</tr>
<?php } ?>
</table>