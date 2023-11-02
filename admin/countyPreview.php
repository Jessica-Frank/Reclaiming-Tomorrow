<?php
require '../connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">
    <title>County</title>
    <style>
        .center {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 5px;
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
<?php include "../admin/header.php"; ?>

<div class="wrapper">
        <div class="sidebar"><i class=""></i>
            <ul>
            <li><a href="/admin/dashboard"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="/admin/search"><i class="fas fa-user"></i>Search Users</a></li>
            <li><a href="/admin/modifyContent"><i class="fas fa-recycle"></i>Modify Content</a></li>
            <li><a href="/admin/modifyRewards"><i class="fas fa-ticket-alt"></i>Modify Rewards</a></li>
            <li><a href="/admin/modifyReviews"><i class="fas fa-thin fa-comments"></i>Modify Reviews</a></li>
            <li><a href="/admin/inbox"><i class="fas fa-envelope"></i>Inbox</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="info">
            <?php
    $county_id=$_GET['id'];
    $sql="SELECT * FROM `county_search` WHERE `County`='$county_id'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($result);

    if ($result->num_rows > 0) {
    echo "<div class=\"center\">";
    echo '<h2 style="text-align: center;margin-top: 10px;color: #000000;">'.$row['County'].' County</h2>';
    echo '<a class="btn btn-dark btn" href="modifyTopRow?id='.$row['County'].'" style="margin-left: 10px;margin-top: 10px" role="button">Modify Top Row</a>';
    echo '<a class="btn btn-danger btn" href="deleteEntireCounty?id='.$row['County'].'" style="margin-left: 10px;margin-top: 10px" role="button">Delete Entire County</a>';
    echo '</div>';
    }

    $sql = "SELECT * FROM county_search WHERE `County`='$county_id'";
    $result=mysqli_query($db,$sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"center\">";
        echo "<div class=\"table_widths\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 5px;\">";
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

        echo "<div class=\"center\">";
        echo '<a class="btn btn-dark btn" href="addAssociatedLinks?id='.$county_id.'" style="margin-left: 10px;" role="button">Add Associated Links</a>';
        echo '<a class="btn btn-dark btn" href="addAlternatives?id='.$county_id.'" style="margin-left: 10px;" role="button">Add Alternatives</a>';
        echo '<a class="btn btn-dark btn" href="addBuyBinLinks?id='.$county_id.'" style="margin-left: 10px;" role="button">Add Buy Bins</a>';
        echo '</div>';
    
///////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM county_associated_links WHERE `County`='$county_id'";
    $result=mysqli_query($db,$sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"row_of_tables\">";
        echo "<div class=\"table_row\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th class=\"center_thead\">Associated Links</th>";
        echo "<th></th>";
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td><a href="'.$row['Link'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['Placeholder'].'</a></td>';
            echo '<td><li><a class="link-dark" href="/admin/modifyAssocLinks?id='.$row['id'].'"><i class="fas fa-edit"></i></a></li> <li><a class="link-dark" href="/admin/deleteAssocLinks?id='.$row['id'].'"><i class="fas fa-trash-alt"></i></a></li></td>';
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
    } else {
        echo "";
    }
///////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM county_alternatives WHERE `County`='$county_id'";
    $result=mysqli_query($db,$sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"table_row\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th class=\"center_thead\">Alternatives</th>";
        echo '<th></th>';
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td><a href="'.$row['Link'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['Placeholder'].'</a></td>';
            echo '<td><li><a class="link-dark" href="/admin/modifyAlternative?id='.$row['id'].'"><i class="fas fa-edit"></i></a></li> <li><a class="link-dark" href="/admin/deleteAlternative?id='.$row['id'].'"><i class="fas fa-trash-alt"></i></a></li></td>';
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
    } else {
        echo "";
    }
///////////////////////////////////////////////////////////////////////////////////////
    $sql = "SELECT * FROM county_buy_bins WHERE `County`='$county_id'";
    $result=mysqli_query($db,$sql);

    if ($result->num_rows > 0) {
        echo "<div class=\"table_row\">";
        echo "<table class=\"table table-hover\" style=\"margin-top: 20px;\">";
        echo "<thead class=\"table-dark\">";
        echo "<tr>";
        echo "<th class=\"center_thead\">Buy Bins</th>";
        echo '<th></th>';
        echo "</tr>";
        echo "</thead>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tbody>";
            echo "<tr>";
            echo '<td><a href="'.$row['Link'].'" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">'.$row['Placeholder'].'</a></td>';
            echo '<td><li><a class="link-dark" href="/admin/modifyBuyBins?id='.$row['id'].'"><i class="fas fa-edit"></i></a></li> <li><a class="link-dark" href="/admin/deleteBuyBins?id='.$row['id'].'"><i class="fas fa-trash-alt"></i></a></li></td>';
            echo "</tr>";
            echo "</tbody>";
        }
        
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "";
    }

    } else {
        echo '<h2 style="text-align: center;margin-top: 70px;">County not found or data not available for: "'.$county.'"</h2>';
    }

?>
      </div>
    </div>
</div>
</body>
</html>
