<?php
require_once realpath(__DIR__ . '/vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$host = $_ENV['SERVER'];
$UserName = $_ENV['DB_USER_NAME_LOGIN'];
$PassName = $_ENV['DB_USER_PASSWORD'];
$DbName = $_ENV['DB_USER_DATA'];
$servername = $host;
$username = $UserName;
$password = $PassName;
$dbname = $DbName;
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST['Naam'];
    $email = $_POST['Email'];
    $function = $_POST['Function'];
    $telefoon = $_POST['Telefoon'];
    $standplaats_organisatie = $_POST['Standplaats_Organisatie'];
    $contactpersoon = $_POST['Contactpersoon'];
    $sectoren = $_POST['Sectoren'];

    // Kijkt naar de opties
    $sectoren = ($sectoren == 'Other') ? $_POST['Other'] : $sectoren;

    // Insert data into database
    $sql = "INSERT INTO algemeen (Naam, Email, Function, Telefoon, Standplaats_Organisatie, Contactpersoon, Sectoren, Invuldatum)
    VALUES ('$naam', '$email', '$function', '$telefoon', '$standplaats_organisatie', '$contactpersoon', '$sectoren', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Oke kan verder";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<form action="Index.php" method="post" id="myForm">
    <label for="Naam">Naam:</label>
    <input type="text" id="Naam" name="Naam" required><br>
    <label for="Email">Email:</label>
    <input type="email" id="Email" name="Email" required><br>
    <label for="Function">Function:</label>
    <input type="text" id="Function" name="Function" required><br>
    <label for="Telefoon">Telefoon:</label>
    <input type="tel" id="Telefoon" name="Telefoon" required><br>
    <label for="Standplaats_Organisatie">Standplaats Organisatie:</label>
    <input type="text" id="Standplaats_Organisatie" name="Standplaats_Organisatie" required><br>
    <label for="Contactpersoon">Contactpersoon:</label>
    <input type="text" id="Contactpersoon" name="Contactpersoon" required><br>
    <label for="Sectoren">Sectoren:</label>
    <select id="Sectoren" name="Sectoren" required onchange="checkOther(this.value)">
        <option value="Agraisch_Groen">Agraisch en Groen</option>
        <option value="Autos">Auto branche</option>
        <option value="Beveiliging">Beveiliging</option>
        <option value="Bouw">Bouw</option>
        <option value="Cultuur_sport_recreatie">Cultuur, sport en recreatie</option>
        <option value="Detalhandel">Detalhandel</option>
        <option value="Economish-Administratief">Economish-Administratief</option>
        <option value="Financiele_Dienstverlening">Financiele Dienstverlening</option>
        <option value="Groothandel">Groothandel</option>
        <option value="Horeca">Horeca</option>
        <option value="ICT">ICT Beroepen</option>
        <option value="Industrie">Industrie</option>
        <option value="Klantcontact">Klantcontact</option>
        <option value="Onderwijs">Onderwijs</option>
        <option value="Overheid">Overheid</option>
        <option value="Schoonmaak">Schoonmaak</option>
        <option value="Social_werk_Jeugdzorg_Kinderopvang">Social werk, Jeugdzorg en Kinderopvang</option>
        <option value="Transport_Logistiek">Transport en Logistiek</option>
        <option value="Zorg">Zorg</option>
        <option value="Other">Andere</option>
    </select><br>
    <div id="otherInput">
        <label for="Other">Andere Optie:</label>
        <input type="text" id="Other" name="Other">
    </div>
    <input type="submit" value="Submit">
</form>




    <link rel="stylesheet" type="text/css" href="src/style/index.css">
    <link rel="stylesheet" type="text/css" href="src/style/reset.css">
    <script src="src/script/index.js"></script>