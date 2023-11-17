<?php
require '../connect.php';

session_start();

$rowsPerPage = 10;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($currentPage - 1) * $rowsPerPage;

// Check if the search form is submitted
if (isset($_POST['submit'])) {
    // Store the search query in a session variable
    $_SESSION['search_query'] = $_POST['search'];
}

// Retrieve the search query from the session
$search = isset($_SESSION['search_query']) ? $_SESSION['search_query'] : '';

// Fetch results based on the search query and pagination
$sql = "SELECT * FROM users WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'";
$sqlTotal = "SELECT COUNT(*) as count FROM users WHERE id LIKE '%$search%' OR name LIKE '%$search%' OR email LIKE '%$search%'";
$result = mysqli_query($db, $sql);
$totalRows = mysqli_fetch_assoc(mysqli_query($db, $sqlTotal))['count'];
$totalPages = ceil($totalRows / $rowsPerPage);

$sql .= " LIMIT $offset, $rowsPerPage";
$result = mysqli_query($db, $sql);
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
    <title>Search Users</title>

    <style>
        .search_bar {
            width: fit-content;
            background-color: #212529;
            border-radius: 10px 10px 10px 10px;
            padding: 13px;
            margin: auto;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
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

        .custom-table {
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            <div class="container my-5" style="text-align: center;">
            <div class="form-container">
            <form method="post">
                <div class="search_bar">
                    <input type="text" placeholder="Search Users" name="search" size="30" style="border-radius: 5px;"/>
                    <button class="btn btn-dark btn-sm" name="submit"> <i class="fa fa-search"></i></button>
                </div>
            </form>
                <table class="table table-hover custom-table">
                    <?php
                    if ($totalRows > 0) {
                        echo '<thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>';

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tbody>
                                    <tr>
                                        <td><a href="userProfile.php?id=' . $row['id'] . '" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">' . $row['id'] . '</a></td>
                                        <td>' . $row['name'] . '</td>
                                        <td>' . $row['email'] . '</td>
                                    </tr>
                                </tbody>';
                        }
                    } else {
                        echo '<h2 class="text-danger">No users found</h2>';
                    }
                    ?>
                </table>
                <?php
                if ($totalPages > 0) {
                    echo '<ul class="pagination">';
                    // Display page numbers
                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="page-item ' . ($i == $currentPage ? 'active' : '') . '">';
                        echo '<a class="page-link ' . ($i == $currentPage ? 'bg-dark text-white' : 'text-dark') . '" href="?page=' . $i . '" style="outline: none;">' . $i . '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                ?>
            </div>
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
                url: 'search.php?page=' + nextPage,
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
</body>
</html>