<!DOCTYPE html>
<html lang="en">

<head>
    <title>Recycling Locationator 2000</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="../style.css" rel="stylesheet">
    <link href="maps.css" rel="stylesheet">
</head>

<body>
    <?php include '../include/header.php'; ?>
    <div class="container mt-5">
        <h1>Recycling Search</h1>
        <form method="post" action="locationator">
            <div class="mb-3">
                <label for="recyclingMaterial" class="form-label">Recycling Material</label>
                <input type="text" class="form-control" id="recyclingMaterial" name="recyclingMaterial" required>
            </div>
            <div class="mb-3">
                <label for="currentLocation" class="form-label">Current Location</label>
                <select class="searchselect form-select" data-live-search="true" id="currentLocation" name="currentLocation" required>
                    <option></option>
                    <?php

                    $dbHost = 'localhost';
                    $dbUsername = 'root';
                    $dbPassword = '';
                    $dbName = 'reclaiming_tomorrow_db';

                    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

                    $sql = 'SELECT name FROM user_location';
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option>' . $row['name'] . '</option>';
                        }
                    }
                    ?>

                    <script>
                        $(document).ready(function() {
                            $('.searchselect').select2({
                                placeholder: "Select a Location",
                                allowClear: true
                            });
                        });
                    </script>

                </select>
            </div>

            <div class="mb-3">
                <label for="distance" class="form-label">Distance willing to travel (in miles)</label>
                <input type="number" class="form-control" id="distance" name="distance" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</body>

</html>