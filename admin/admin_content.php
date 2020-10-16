<div class="dashboard">
    <div id="right">
        <div class="container">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <h5 class="mt-2 mb-2">Navigate</h5>
                <a class="border-bottom shadow-sm nav-link active d-flex justify-content-between align-items-center" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home <span class="badge badge-warning badge-pill">1</span></a>
                <a class="border-bottom shadow-sm nav-link d-flex justify-content-between align-items-center" id="v-pills-usersList-tab" data-toggle="pill" href="#v-pills-usersList" role="tab" aria-controls="v-pills-usersList" aria-selected="false">Users List <span class="badge badge-warning badge-pill">5</span></a>
                <a class="border-bottom shadow-sm nav-link d-flex justify-content-between align-items-center" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings <span class="badge badge-warning badge-pill">3</span></a>
                <h5 class="mt-4 mb-1">Other</h5>
                <a class="border-bottom shadow-sm nav-link d-flex justify-content-between align-items-center" id="v-pills-developer-tab" data-toggle="pill" href="#v-pills-developer" role="tab" aria-controls="v-pills-developer" aria-selected="false">Developers <span class="badge badge-warning badge-pill">1</span></a>
            </div>
        </div>
    </div>
    <div id="left">
        <div class="container">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    Home
                </div>
                <div class="tab-pane fade" id="v-pills-usersList" role="tabpanel" aria-labelledby="v-pills-usersList-tab">
                    <div class="heading d-flex align-items-center justify-content-around mt-1 mb-3">
                        <h2>Database Users</h2>
                        <form class="form-inline d-flex align-items-center" action="../admin/search.php" method="POST">
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search here..." aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" name="search-submit" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="table-responsive-xl">
                        <table class="table mt-1 table-hover table-striped text-nowrap">
                            <thead>
                                <tr class="bg-info">
                                    <th scope="col">User ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col"><abbr title="YYYY/MM/DD">Date Created</abbr></th>
                                    <th scope="col">Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

                                    $sql = "SELECT user_id, user_privilege, user_fullname, user_name, date_created FROM users";
                                    $result = mysqli_query($conn, $sql);

                                    if(mysqli_num_rows($result) > 0) {

                                        while($row = $result-> fetch_assoc()) {
                                            if($row['user_privilege'] == 'admin') {
                                                $row['privilege'] = 'Admin';
                                            } else {
                                                $row['privilege'] = 'User';
                                            }

                                            $row['date_created'] = substr($row['date_created'], 0, 11);

                                            echo '<tr><th scope="row">'.$row["user_id"].'</th><td>'.$row["user_fullname"].'</td><td>'.$row["user_name"].'</td><td>'.$row["date_created"].'</td><td>'.$row["privilege"].'</td></tr>';
                                        }

                                    } else{
                                        echo 'No results found, please check for errors';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                    Settings
                </div>
                <div class="tab-pane fade developer" id="v-pills-developer" role="tabpanel" aria-labelledby="v-pills-developer-tab">
                    <div class="container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="questions-tab" data-toggle="tab" href="#questions" role="tab" aria-controls="questions" aria-selected="true">Questions</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="code-tab" data-toggle="tab" href="#code" role="tab" aria-controls="code" aria-selected="false">Source Code</a>
                            </li>
                            <li class="nav-item" role="presentation">
                            <a class="nav-link" id="toDoList-tab" data-toggle="tab" href="#toDoList" role="tab" aria-controls="toDoList" aria-selected="false">To do list</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                                ...
                            </div>
                            <div class="tab-pane fade" id="code" role="tabpanel" aria-labelledby="code-tab">
                                <div class="container">
                                    <h4>View Source Codes in GitHub</h4>
                                    <a class="btn btn-outline-dark" href="https://github.com/DeathThreats" target="_blank">Learn More</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="toDoList" role="tabpanel" aria-labelledby="toDoList-tab">
                                ...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>