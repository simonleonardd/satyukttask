<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<?php 
    $response = file_get_contents('https://api.covid19india.org/data.json');
    $response = json_decode($response);

    $total_confirmed =  $response->statewise[0]->confirmed;
    $total_recovered = $response->statewise[0]->recovered;
    $total_deaths =  $response->statewise[0]->deaths;

    echo "
    <div class='container'>         
        <table class='table table-bordered'>
        <thead>
            <tr>
                <th>INDIA</th>
                <th>CONFIRMED</th>
                <th>RECOVERED</th>
                <th>DEATHS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total</td>
                <td class = 'bg-danger'>$total_confirmed</td>
                <td class = 'bg-success'>$total_recovered</td>
                <td class = 'text-secondary'>$total_deaths</td>
            </tr>
        </tbody>
        </table>
    </div>";

    echo "<div class='container'>         
        <table class='table table-bordered'>
        <thead>
            <tr>
                <th>STATE</th>
                <th>CONFIRMED</th>
                <th>RECOVERED</th>
                <th>DEATHS</th>
            </tr>
        </thead>
        <tbody>";
for ($i = 0; $i <= 37; $i++) {
    $confirmed =  $response->statewise[$i]->confirmed;
    $recovered = $response->statewise[$i]->recovered;
    $deaths =  $response->statewise[$i]->deaths;
    $state =  $response->statewise[$i]->state;

    echo "
    <tr>
      <td>$state</td>
      <td class = 'bg-danger'>$confirmed</td>
      <td class = 'bg-success'>$recovered</td>
      <td class = 'text-secondary'>$deaths</td>
    </tr>
        ";
}
echo "
        </tbody>
    </table>
</div>";


?>
</body>
</html>