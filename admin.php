<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header("Location: login.php");
  exit();
}

$conn = new mysqli("mysql_db", "root", "toor", "white_lotus");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM rezervari";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Rezervări</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Rezervări</h2>
    <a href="logout.php" class="btn btn-danger mb-3">Deconectează-te</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nume</th>
          <th>Telefon</th>
          <th>Metodă Plată</th>
          <th>Detalii Plată</th>
          <th>Camera</th>
          <th>Data Rezervării</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result->num_rows > 0): ?>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['nume']; ?></td>
              <td><?php echo $row['telefon']; ?></td>
              <td><?php echo $row['metoda_plata']; ?></td>
              <td><?php echo $row['detalii_plata']; ?></td>
              <td><?php echo $row['camera_id']; ?></td>
              <td><?php echo $row['data_rezervare']; ?></td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center">Nu există rezervări</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>

<?php
$conn->close();
?>
