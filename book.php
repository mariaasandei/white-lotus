<?php
$conn = new mysqli("mysql_db", "root", "toor", "white_lotus");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$room_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nume = $conn->real_escape_string($_POST['nume']);
  $telefon = $conn->real_escape_string($_POST['telefon']);
  $plata = $conn->real_escape_string($_POST['plata']);
  $detalii_plata = isset($_POST['detalii_plata']) ? $conn->real_escape_string($_POST['detalii_plata']) : '';
  $camera_id = intval($_POST['camera_id']);

  $sql = "INSERT INTO rezervari (nume, telefon, metoda_plata, detalii_plata, camera_id, data_rezervare) 
          VALUES ('$nume', '$telefon', '$plata', '$detalii_plata', $camera_id, NOW())";

  if ($conn->query($sql) === TRUE) {
    header("Location: confirmare.html");
    exit();
  } else {
    echo "Error: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book a Room - White Lotus</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script>
    function toggleDetalii() {
      const metoda = document.getElementById("plata").value;
      const detaliiDiv = document.getElementById("detaliiPlata");
      const label = document.getElementById("detaliiLabel");

      if (metoda === "Card") {
        label.innerText = "Numele băncii *";
        detaliiDiv.innerHTML = '<input type="text" name="detalii_plata" class="form-control" maxlength="50" required>';
      } else if (metoda === "Tichete vacanță") {
        label.innerText = "Detalii tichete vacanță *";
        detaliiDiv.innerHTML = '<textarea name="detalii_plata" class="form-control"  maxlength="50"  required></textarea>';
      } else {
        detaliiDiv.innerHTML = '';
      }
    }
  </script>
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">Completează datele pentru rezervare</h2>
    <form method="POST" action="book.php">
      <input type="hidden" name="camera_id" value="<?= $room_id ?>">
      <div class="form-group">
        <label for="nume">Nume complet *</label>
        <input type="text" class="form-control" id="nume" name="nume" required>
      </div>
      <div class="form-group">
        <label for="telefon">Număr de telefon *</label>
        <input type="tel" class="form-control" id="telefon" name="telefon" pattern="[0-9]{10}" title="Exact 10 cifre" required>
      </div>
      <div class="form-group">
        <label for="plata">Metodă de plată *</label>
        <select class="form-control" id="plata" name="plata" onchange="toggleDetalii()" required>
          <option value="">Alege o metodă</option>
          <option value="Card">Card</option>
          <option value="Tichete vacanță">Tichete vacanță</option>
        </select>
      </div>
      <div class="form-group">
        <label id="detaliiLabel" for="detalii_plata"></label>
        <div id="detaliiPlata"></div>
      </div>
      <button type="submit" class="btn btn-primary">Trimite rezervarea</button>
    </form>
  </div>
</body>
</html>
