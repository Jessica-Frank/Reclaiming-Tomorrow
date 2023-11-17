<?php
require '../connect.php';

session_start();

// Set the number of rows per page
$rowsPerPage = 10;

// Check if the current page is set in the URL
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($currentPage - 1) * $rowsPerPage;

$from_id = $_SESSION['current'];
$sql = "SELECT *, DATE_FORMAT(date_sent, '%b %e, %Y %H:%i:%s') AS date_sent FROM user_inbox WHERE from_id='$from_id' ORDER BY id DESC LIMIT $offset, $rowsPerPage";
$result = mysqli_query($db, $sql);

// Get the total number of rows for pagination
$totalRows = mysqli_num_rows(mysqli_query($db, "SELECT * FROM user_inbox WHERE from_id='$from_id'"));

// Calculate the total number of pages
$totalPages = ceil($totalRows / $rowsPerPage);
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
    <title>Inbox</title>

    <style>
        form {
            width: 80%;
            margin: 0 auto;
        }

        .form-container {
        width: 80%;
        margin: 10px auto; /* Adjust margin as needed */
        padding: 20px; /* Adjust padding as needed */
        border-radius: 10px;
        background-color: #9DC08B; /* Set the background color of the container */
        box-shadow: 0px 50px 100px -20px rgba(50,50,93,0.25),
            0px 30px 60px -30px rgba(0,0,0,0.3),
            0px -2px 6px 0px rgba(10,37,64,0.35) inset;
        }

        .shadow {
            box-shadow: 0px 3px 7px 0px rgba(0,0,0,0.13), 0px 1px 2px 0px rgba(0,0,0,0.11);
        }

        .btn-no-underline {
        text-decoration: none !important;
        }

        .popup {
            display: none;
            position: absolute;
            top: 5%;
            left: 55%;
            transform: translate(-50%, -50%);
            background-color: #ffffff;
            padding: 10px;
            border: 1px solid #d4d4d4;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<?php include "../admin/header.php"; ?>

<div class="wrapper">
<div class="sidebar">
        <i class=""></i>
        <ul>
            <li><a href="/verify/dashboard"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="/verify/profile"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="/verify/display_reviews"><i class="fas fa-thin fa-comments"></i>Locations reviews</a></li>
            <li><a href="/verify/faq"><i class="fas fa-regular fa-question"></i>FAQ</a></li>
        </ul>
    </div>
    <div class="main_content">
        <div style="text-align:center;">
            <br>
            <?php
            if (!empty($_SESSION['message'])) {
                $message = $_SESSION['message'];
                // Display the message in a popup
                echo '<div class="popup" id="popupMessage" style="color: #000000">' . $message . '</div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div class="info">
            <div class="container my-5" style="text-align: center;">
                <div class="form-container">
                <form action="deleteSentMessage" method="post">
                    <div class="text-start" style="margin: 0; background-color: #212529;border-radius: 10px 10px 0 0;">
                    <h1 style="color: #ffffff;text-align: center;padding: 10px"> Sent Messages</h1>
                    <button class="btn btn-secondary" style="margin-top: 5px;margin-bottom: 5px;margin-left:5px;color: #ffffff;">
                            <a href="inbox" class="link-light btn-no-underline">Inbox</a>
                    </button>
                    <button type="submit" class="btn btn-danger" style="margin-top: 5px;margin-bottom: 5px; margin-left:1px"><i class="fas fa-trash-alt"></i></button>
                        
                    </div>
                        <table class="table table-hover shadow">
                            <thead class="table-dark">
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $from_id = $_SESSION['current'];
                            $rowsPerPage = 10;
                            // Check if the current page is set in the URL
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

                            // Calculate the offset for the SQL query
                            $offset = ($currentPage - 1) * $rowsPerPage;

                            $from_id = $_SESSION['current'];
                            $sql = "SELECT *, DATE_FORMAT(date_sent, '%b %e, %Y %H:%i:%s') AS date_sent FROM user_inbox WHERE from_id='$from_id' ORDER BY id DESC LIMIT $offset, $rowsPerPage";
                            $result = mysqli_query($db, $sql);

                            // Check if there are more rows
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {

                                // Output HTML for each row
                                echo '<tr>';
                                echo '<td width="5%"><input type="checkbox" name="selectedMessages[]" value="' . $row['id'] . '"></td>';
                                echo '<td><a href="openReadOnly.php?id=' . $row['id'] . '" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">' . $row['title'] . '</a></td>';
                                echo '<td>' . $row['date_sent'] . '</td>';
                                echo '</tr>';
                            }
                            } else {
                            // Output a message if no more rows are available
                            echo '<tr><td colspan="5" class="text-danger">No messages found</td></tr>';
                            }
                            ?>
                            </tbody>
                            </table>
                            <ul class="pagination">
                            <?php
                            // Display page numbers
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '">';
                                echo '<a class="page-link ' . ($i == $currentPage ? 'bg-dark text-white' : 'text-dark') . '" href="?page=' . $i . '" style="outline: none;">' . $i . '</a>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#loadMoreBtn').on('click', function () {
            var nextPage = $(this).data('page');

            // Make an AJAX request to fetch additional rows
            $.ajax({
                type: 'GET',
                url: 'inbox.php?page=' + nextPage,
                success: function (data) {
                    // Append the new rows to the table
                    $('.table tbody').append(data);

                    // Update the "Load More" button with the next page
                    $('#loadMoreBtn').data('page', nextPage + 1);

                    // Hide the button if all pages are loaded
                    if (nextPage >= <?php echo $totalPages; ?>) {
                        $('#loadMoreBtn').hide();
                    }
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        // Confirmation dialog for delete button
        $('.btn-danger').on('click', function () {
            return confirm("Are you sure you want to delete the selected message(s)?");
        });

        // Load more button click event
        $('#loadMoreBtn').on('click', function () {
            var nextPage = $(this).data('page');

            // Make an AJAX request to fetch additional rows
            $.ajax({
                type: 'GET',
                url: 'inbox.php?page=' + nextPage,
                success: function (data) {
                    // Append the new rows to the table
                    $('.table tbody').append(data);

                    // Update the "Load More" button with the next page
                    $('#loadMoreBtn').data('page', nextPage + 1);

                    // Hide the button if all pages are loaded
                    if (nextPage >= <?php echo $totalPages; ?>) {
                        $('#loadMoreBtn').hide();
                    }
                }
            });
        });
    });
</script>

<script>
    // Function to show the popup message and hide it after a delay
    function showPopup() {
        var popup = document.getElementById('popupMessage');
        if (popup) {
            popup.style.display = 'block';
            setTimeout(function () {
                popup.style.display = 'none';
            }, 5000); // Adjust the duration in milliseconds (3 seconds in this example)
        }
    }

    // Call the function to show the popup
    showPopup();
</script>
</body>
</html>
