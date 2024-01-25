<?php

$hotels = [
  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],
];

if (isset($_GET['parking'])) {
  $parkingFilter = $_GET['parking'];

  if ($parkingFilter === 'true') {
    $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'] === true;
    });
  } elseif ($parkingFilter === 'false') {
    $hotels = array_filter($hotels, function ($hotel) {
      return $hotel['parking'] === false;
    });
  }
}
?>

<?php include './components/header.php'; ?>

<form method="GET">
  <div class="form-group">
    <label for="parkingFilter">Filtra per Parcheggio</label>
    <select name="parking" id="parkingFilter" class="form-control">
      <option value="all">Mostra Tutti</option>
      <option value="true">Con Parcheggio</option>
      <option value="false">Senza Parcheggio</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary">Filtra</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Descrizione</th>
      <th>Parcheggio</th>
      <th>Voto</th>
      <th>Distanza dal centro</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($hotels as $hotel) { ?>
      <tr>
        <td><?php echo $hotel['name'] ?></td>
        <td><?php echo $hotel['description'] ?></td>
        <td><?php echo $hotel['parking'] ? 'Disponibile' : 'Non disponibile' ?></td>
        <td><?php echo $hotel['vote'] ?></td>
        <td><?php echo $hotel['distance_to_center'] ?> km</td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<?php include './components/footer.php'; ?>