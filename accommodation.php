<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accommodation - White Lotus</title>
  <link rel="stylesheet" href="assets/css/main.css"> <!-- stilul tău -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .room-card {
      display: flex;
      flex-direction: column;
      margin-bottom: 2rem;
    }

    .room-card .card {
      height: 100%;
      display: flex;
      flex-direction: column;
    }

    .room-carousel img {
      height: 200px;
      object-fit: cover;
    }

    .card-body {
      flex-grow: 1;
    }

    .card-text {
      max-height: 100px;
      overflow: hidden;
      text-overflow: ellipsis;
    }
  </style>
</head>
<body>
  <header id="header">
    <nav>
    <ul>
					  <li><a href="index.html">Home</a></li>
					  <li><a href="activitati.html">Activities</a></li>
					  <li><a href="zone.html">Mind & Body</a></li>
					  <li><a href="contact.html">Contact</a></li>
					  <li><a href="login.php">Login</a></li>
					</ul>
    </nav>
  </header>

  <main class="container my-5">
    <div class="row">
      <?php
        $conn = new mysqli("mysql_db", "root", "toor", "white_lotus");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM camere";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          $index = 0;
          while($row = $result->fetch_assoc()) {
            $disponibile = $row['total'] - $row['ocupate'];
            echo '<div class="col-md-6 col-lg-4 d-flex room-card">';
            echo '  <div class="card">';
            echo '    <div id="carousel' . $index . '" class="carousel slide room-carousel" data-ride="carousel">';
            echo '      <div class="carousel-inner">';
            echo '        <div class="carousel-item active">';
            echo '          <img src="images/rooms/r1.jpg" class="d-block w-100" alt="Room Image">';
            echo '<form action="book.php" method="GET" style="text-align:center; padding: 1rem;">';
echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
echo '<button type="submit" style="padding: 0.5rem 1rem; background-color: #333; color: white; border: none; border-radius: 5px;">Book</button>';
echo '</form>';

            echo '        </div>';
            echo '        <div class="carousel-item">';
            echo '          <img src="images/rooms/r2.jpg" class="d-block w-100" alt="Room Image">';
            echo '<form action="book.php" method="GET" style="text-align:center; padding: 1rem;">';
echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
echo '<button type="submit" style="padding: 0.5rem 1rem; background-color: #333; color: white; border: none; border-radius: 5px;">Book</button>';
echo '</form>';

            echo '        </div>';
            echo '        <div class="carousel-item">';
            echo '          <img src="images/rooms/r3.jpg" class="d-block w-100" alt="Room Image">';
            echo '<form action="book.php" method="GET" style="text-align:center; padding: 1rem;">';
echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
echo '<button type="submit" style="padding: 0.5rem 1rem; background-color: #333; color: white; border: none; border-radius: 5px;">Book</button>';
echo '</form>';

            echo '        </div>';
            echo '        <div class="carousel-item">';
            echo '          <img src="images/rooms/r4.jpg" class="d-block w-100" alt="Room Image">';
            echo '<form action="book.php" method="GET" style="text-align:center; padding: 1rem;">';
echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
echo '<button type="submit" style="padding: 0.5rem 1rem; background-color: #333; color: white; border: none; border-radius: 5px;">Book</button>';
echo '</form>';

            echo '        </div>';
            echo '        <div class="carousel-item">';
            echo '          <img src="images/rooms/r5.jpg" class="d-block w-100" alt="Room Image">';
            echo '        </div>';
            echo '        <div class="carousel-item">';
            echo '          <img src="images/rooms/r6.jpg" class="d-block w-100" alt="Room Image">';
            echo '        </div>';
            
            echo '      </div>';
            echo '      <a class="carousel-control-prev" href="#carousel' . $index . '" role="button" data-slide="prev">';
            echo '        <span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            echo '        <span class="sr-only">Previous</span>';
            echo '      </a>';
            echo '      <a class="carousel-control-next" href="#carousel' . $index . '" role="button" data-slide="next">';
            echo '        <span class="carousel-control-next-icon" aria-hidden="true"></span>';
            echo '        <span class="sr-only">Next</span>';
            echo '      </a>';
            echo '    </div>';
            echo '    <div class="card-body d-flex flex-column">';
            echo '      <h5 class="card-title">' . htmlspecialchars($row['nume']) . '</h5>';
            echo '      <p class="card-text">' . nl2br(htmlspecialchars($row['descriere'])) . '</p>';
            echo '      <p><strong>Price:</strong> $' . number_format($row['pret_noapte'], 2) . '/night</p>';
    
            echo '    </div>';
            echo '  </div>';
            echo '</div>';
            $index++;
          }
        } else {
          echo '<p>No rooms found.</p>';
        }

        $conn->close();
      ?>
    </div>
  </main>

  <footer class="text-center mt-5">
    <p>&copy; 2025 White Lotus Resort</p>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
