<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reclaiming Tomorrow - Rewards</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link href="../style.css" rel="stylesheet">

    <script>
        $(document).ready(function() {
            var modalTransitionTime = 150;
            var rowCount = 0;

            //Open and close controls for the modal using buttons
            $("#showTicketModalButton").click(function() {
                $("#newTicketModal").fadeIn(modalTransitionTime);
            });
            $(".ticket-modal-close").click(function() {
                $("#newTicketModal").fadeOut(modalTransitionTime);
            });

            //Hide the modal if esc key is pressed
            $(document).keyup(function(e) {
                if (e.which == 27) {
                    $("#newTicketModal").fadeOut(modalTransitionTime);
                }
            });

            //Add another row when the plus button is pressed
            $(".addFieldsButton").click(function() {
                rowCount++;
                
                var rowStr = `<input placeholder=\"Ticket Code\" name=\"ticket[${rowCount}][ticket_code]\" required=\"true\"></input>\n` +
                    `<input placeholder=\"Points\" name=\"ticket[${rowCount}][ticket_points]\" type=\"number\" required=\"true\"></input>\n`
                    +`<button type="button" class="btn btn-light removeFieldsButton" onclick="return this.parentNode.remove();" style="font-size: 0.75em;">&times;</button>`;
                
                const rowDiv = document.createElement("div");
                rowDiv.setAttribute("style", "white-space: nowrap;");
                $("#ticketFormFieldDiv").append(rowDiv);
                rowDiv.innerHTML = rowStr;
            });
        });
    </script>
</head>

<body>
    <?php include '../include/header.php';
    require "../database/reward_db_access.php";
    ?>

    <div class="container">
        <h1 class="center-heading">Manage Tickets</h1>
        <div style="text-align: center;">
            <button id="showTicketModalButton" class="btn btn-dark" style="margin-bottom: 1.5em;" type="button">Create New Tickets</button>
        </div>
        <?php
        $user_org = "ABC Recycling";
        if (isset($_POST['ticket'])) {
            $successful_tickets = [];
            $failed_tickets =  [];
            foreach ($_POST['ticket'] as $ticket) {
                if (addTicketForOrg($user_org, $ticket['ticket_code'], $ticket['ticket_points'])) {
                    array_push($successful_tickets, $ticket);
                } else {
                    array_push($failed_tickets, $ticket);
                }
            }
            
            if (sizeof($successful_tickets) > 0) { ?>
                <div class="alert alert-success alert-dismissable" role="alert">
                    You have successfully created
                    <span><?php echo sizeof($successful_tickets); ?></span> ticket(s):
                    <span type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    <?php foreach ($successful_tickets as $ticket) {
                        $code = strtoupper($ticket['ticket_code']);
                        $points = $ticket['ticket_points'];
                        echo "<br>Code: $code, Points: $points";
                    }
                    ?>
                </div>
            <?php }
            if (sizeof($failed_tickets) > 0) { ?>
                <div class="alert alert-danger alert-dismissable" role="alert">
                    An error occured when creating the following ticket(s):
                    <span type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                    <?php foreach ($failed_tickets as $ticket) {
                        $code = strtoupper($ticket['ticket_code']);
                        $points = $ticket['ticket_points'];
                        echo "<br>Code: $code, Points: $points";
                    }
                    ?>
                </div>
        <?php }
        }
        $existing_tickets = getTicketsFromOrg($user_org);
        ?>

        <div class="modal" id="newTicketModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-dialog-centered" style="width:auto" role="document">
                <form method="POST">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Tickets</h5>
                            <span type="button" class="ticket-modal-close" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                        </div>
                        <div class="modal-body">
                            <div id="ticketFormFieldDiv">
                                <div style="white-space: nowrap;">
                                    <input placeholder="Ticket Code" name="ticket[0][ticket_code]" required="true"></input>
                                    <input placeholder="Points" name="ticket[0][ticket_points]" type="number" required="true"></input>

                                </div>
                            </div>
                            <button type="button" class="btn btn-light addFieldsButton" id="addFieldsButton1" style="font-size: 0.75em;">+ Add another</button>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary ticket-modal-close">Cancel</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if (isset($existing_tickets)) {?>
        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Code</th>
                    <th>Point Value</th>
                    <th>Date Created</th>
                    <th>Date Redeemed</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($existing_tickets as $ticket) { ?>
                    <tr>
                        <td><?php echo $ticket['id']; ?></td>
                        <td><?php echo $ticket['point_value']; ?></td>
                        <td><?php echo $ticket['date_created']; ?></td>
                        <td><?php echo $ticket['date_redeemed']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else {echo "Error: Unable to load your organization's ticket data. Please make sure you are logged in.";} ?>
    </div>

</body>

</html>