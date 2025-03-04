<!--
  Este arquivo PHP permite aos utilizadores autenticados criar um novo quarto para um hotel 
  específico, com os detalhes do hotel recuperados do banco de dados. 
--> 

<?php
// Verifica se o utilizador está logado
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // Redireciona o utilizador para a página de login ou outra localização apropriada
  header("Location: login.php");
  exit();
}

require_once("DB/db_connection.php");

// Verifica se o ID do hotel é fornecido na URL
if (!isset($_GET['id'])) {
  // Redireciona o utilizador para uma localização apropriada se o ID do hotel estiver ausente
  header("Location: home.php");
  exit();
}

$hotelId = $_GET['id'];

// Recupera os detalhes do hotel do banco de dados
$query = "SELECT * FROM hotels WHERE id = $hotelId";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  // Busca o registro do hotel
  $hotel = $result->fetch_assoc();

  // Busca os detalhes do hotel
  $hotelName = $hotel['name'];
} else {
  // Redireciona o utilizador para uma localização apropriada se o hotel não for encontrado
  header("Location: home.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="css/styleAddRoom.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <title>Hotels - Create Room</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="home.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="bookings.php">My Bookings</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <?php if ($_SESSION['role'] == 'admin') { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Admin Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="adminMenu">
              <a class="dropdown-item" href="adminView.php">All Bookings</a>
              <a class="dropdown-item" href="allUsers.php">Users</a>
            </div>
          </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link" href="DB/db_logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

    <h1>Create Room</h1>
    <p></p>
    <p></p>

    <h2><?php echo $hotelName; ?></h2>
    <p></p>

    <form action="DB/create_room.php" method="POST">
      <input type="hidden" name="hotel_id" value="<?php echo $hotelId; ?>">
      <label for="room_number">Room Number:</label>
      <input type="text" id="room_number" name="room_number" required><br><br>
      <label for="room_type">Room Type:</label>
      <input type="text" id="room_type" name="room_type" required><br><br>
      <label for="description">Description:</label>
      <textarea id="description" name="description" required></textarea><br><br>
      <label for="price_per_night">Price per Night:</label>
      <input type="number" id="price_per_night" name="price_per_night" required><br><br>
      <p></p>
      <input type="submit" value="Create Room">
    </form>

</body>
</html>
