<?php 
    session_start();
    if (!$_SESSION['admin_id']){
        header("Location: login.php?next=index");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaturant Web</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<section>
    <div class="admin_pages">
        <?php include "Inc/sidebar.php" ?>


        <div class="content_area bg-light">
            <div class="d-flex justify-content-end" style="text-align: right; padding-right: 10%; gap: 30px">
                <a href="../" class="text-right">View site</a>
                <a href="./Logout.php" class="text-right">Logout</a>

            </div>
            <!-- header section -->
            <div class="header">
                <div>
                    <p>Primary</p>
                    <h3 class="purple"><b>Dashboard</b></h3>
                </div>

                <div class="d-flex " style="gap: 30px;">
                    <!-- bootsrap search with search icon on the left  -->
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>

                    <!-- user icon image rounded -->
                    <div class="user_icon">
                        <img src="images/user.png" alt="user icon">
                    </div>
                </div>
            </div>

            <!-- dashboard cards in row col-3 services, bookings, users, transaction -->
            <div class="dashboard_section">
                <h4><b>Today's data</b></h4>
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6>Orders</h6>
                                    <h3>3</h3>
                                </div>
                                <div>
                                    <i class="fas fa-cog fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6>Restaurants</h6>
                                    <h3>3</h3>
                                </div>
                                <div>
                                    <i class="fas fa-calendar-alt fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6>Users</h6>
                                    <h3>2</h3>
                                </div>
                                <div>
                                    <i class="fas fa-user fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h6>Transactions</h6>
                                    <h3>0</h3>
                                </div>
                                <div>
                                    <i class="fas fa-money-check-alt fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Trabsaction data -->
            <div class="transaction_section">
                <h4><b>Finance data</b></h4>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Owner</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2024-02-27</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Total</th> <th></th> <th></th> <th></th> <th></th> <th></th><th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
