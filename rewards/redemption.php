<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reclaiming Tomorrow - Rewards</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
</head>

<body style="padding: 1%;">
    <h2>Recycling Rewards</h2>

    <h6>Earn tickets by recycling at supporting locations</h6>
    <h5 style="margin-top: 2rem;">Your current points: 0</h5>
    <div id="ticket_div" style="width: 50%; padding:2%">
        <p>Redeem your tickets to earn points, which you can use to get rewards!</p>
        <div style="display: inline-block;" id="ticket_input_div">
            <form method="POST">
                <input placeholder="Ticket number" name="ticket_num" required></input>
                <button class="btn btn-primary" type="submit">Redeem</button>
            </form>
        </div>
        <div class="alert alert-success" role="alert">
            Ticket 123456 successfully redeemed for 50 points.
        </div>
        <div class="alert alert-danger" role="alert">
            Unable to redeem ticket 123456.
            <br>Please check that the code has been entered correctly.
        </div>
    </div>

</body>

</html>