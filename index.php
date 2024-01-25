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

if (isset($_GET['rating'])) {
  $ratingFilter = $_GET['rating'];
  $hotels = array_filter($hotels, function ($hotel) use ($ratingFilter) {
    return $hotel['vote'] >= $ratingFilter;
  });
}
?>

<?php include './components/header.php'; ?>

<form method="GET">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="parkingFilter">Filtra per Parcheggio</label>
      <select name="parking" id="parkingFilter" class="form-control">
        <option value="all">Mostra Tutti</option>
        <option value="true">Con Parcheggio</option>
        <option value="false">Senza Parcheggio</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label for="parkingFilter">Filtra per Voto</label>
      <input type="number" name="rating" id="ratingFilter" class="form-control" min="1" max="5" placeholder="Inserisci il voto minimo">
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Filtra</button>
</form>

<table class="table table-striped table-bordered mt-4">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">Parcheggio</th>
      <th scope="col">Voto</th>
      <th scope="col">Distanza dal centro</th>
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