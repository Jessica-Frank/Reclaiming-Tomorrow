<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
    <style>
        .center {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        }

        .table_widths {
        width: 55%;
        }

        .row_of_tables {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        }

        .table_row {
        width: 300px;
        }

        .center_thead{
        text-align: center;
        }
    </style>   
</head>
<body>
<?php include '../include/header.php'; ?>

    <h2 style="text-align: center;">County Search</h2>
    <form method="post" action="search_results" style="text-align: center;">
        <label for="County">Search for County:</label>
        <input type="text" name="County" id="County" required pattern=".*\S+.*">
        <input type="submit" value="Search" class="btn btn-dark btn-sm">
    </form>

<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'reclaiming_tomorrow_db';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['County'])) {
    $county = $_POST['County'];

    $sql = "SELECT * FROM county_search WHERE County LIKE '%$county%'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($result->num_rows > 0) {
    echo '<h3 style="text-align: center;margin-top: 20px;">Showing Results For: '.$row['County'].' County</h3>';
    }

    $sql = "SELECT * FROM county_search WHERE County LIKE '%$county%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"center\">";
        echo "<div class=\"table_widths\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th>Accepted Materials</th>";
        echo "<th>Local Events</th>";
        echo "<th>Pick-up Schedule</th>";
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo "<td>" . $row['Accepted Materials'] . "</td>";
            echo "<td>" . $row['Local Events'] . "</td>";
            echo "<td width=\"25%\">" . $row['Pick-up Schedule'] . "</td>";
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
        echo "</div>";
    
///////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM county_associated_links WHERE County LIKE '%$county%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"row_of_tables\">";
        echo "<div class=\"table_row\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th class=\"center_thead\">Associated Links</th>";
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td><a href="'.$row['Link'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['Placeholder'].'</a></td>';
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
    } else {
        echo "No associated links";
    }
///////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM county_alternatives WHERE County LIKE '%$county%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"table_row\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th class=\"center_thead\">Alternatives</th>";
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td><a href="'.$row['Link'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['Placeholder'].'</a></td>';
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
    } else {
        echo "No alternatives available";
    }
///////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM county_buy_bins WHERE County LIKE '%$county%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"table_row\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th class=\"center_thead\">Buy Bins</th>";
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td><a href="'.$row['Link'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['Placeholder'].'</a></td>';
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "No info available for buying bins";
    }

    } else {
        echo '<h2 style="text-align: center;margin-top: 70px;">County not found or data not available for: "'.$county.'"</h2>';
    }
}

?>

</body>
</html>