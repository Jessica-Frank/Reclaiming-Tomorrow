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
    <link href="../style.css" rel="stylesheet">
    <link href="maps.css" rel="stylesheet">
</head>

<body>
<?php include '../include/header.php';?>
<div class="container mt-5">
<div class="container mt-5">
        <h1>Recycling Search</h1>
        <form method="post" action="locationator">
            <div class="mb-3">
                <label for="recyclingMaterial" class="form-label">Recycling Material</label>
                <input type="text" class="form-control" id="recyclingMaterial" name="recyclingMaterial" required>
            </div>
            <div class="mb-3">
                <label for="currentLocation" class="form-label">Current Location</label>
                <input type="text" class="form-control" id="currentLocation" name="currentLocation" required>
            </div>
            <div class="mb-3">
                <label for="distance" class="form-label">Distance willing to travel (in miles)</label>
                <input type="number" class="form-control" id="distance" name="distance" required>
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    </div>
</body>

</html>