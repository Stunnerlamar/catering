<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Service</title>
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
       
        <div class="sidebar_container">
            <!-- add sidebar_item for dashboard, profile, statistics, Services, Add Serices, Settings, Settings, Logout -->
            <div class="sidebar_item">
                <a href="index.html">
                   
                </a>
            </div>
            <div class="sidebar_item active">
                <a href="index.php">
                    <i class="fas fa-home"></i>
                    <span>Home</span>
                </a>
            </div>
            <div class="sidebar_item">
                <a href="#">
                    <i class="fas fa-user"></i>
                    <span>My Account</span>
                </a>
            </div>
            <div class="sidebar_item">
                <a href="#">
                    <i class="fas fa-calendar-alt"></i>
                    <span>My Bookings</span>
                </a>
            </div>
            <!-- My Services -->
            <div class="sidebar_item">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>My Services</span>
                </a>
            </div>
            <div class="sidebar_item">
                <a href="#">
                    <i class="fas fa-plus"></i>
                    <span>Add Services</span>
                </a>
            </div>
<!--             
            <div class="sidebar_item">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div> -->
            <div class="sidebar_item logout">
                <a href="#">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </div>
            
        </div>

        <div class="content_area bg-light">
            <p class="text-center">
                <i class="fas fa-cog settings_icon"></i> 
            </p>

            <style>
                 /* Custom CSS */
                .settings_icon {
                    font-size: 150px; /* Increase font size */
                    animation: rotateIcon 5s linear infinite; /* Rotate animation */
                }

                @keyframes rotateIcon {
                    0% { transform: rotate(0deg); }
                    100% { transform: rotate(360deg); }
                }
            </style>
            <div style="height: 100vh; overflow-y: scroll;">
                
                <!-- Service data -->
                <div class="settings_section">
                    <div class="container">
                        <h4>Web Title & Logo</h4>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="web_title">Web Title</label>
                                <input type="text" class="form-control" id="web_title" placeholder="Enter Web Title">
                            </div>
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" class="form-control-file" id="logo">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="settings_section">
                    <div class="container">
                        <h4>Email Settings</h4>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="email_name">Email Name</label>
                                <input type="text" class="form-control" id="email_name" placeholder="Enter Email Name">
                            </div>
                            <div class="form-group">
                                <label for="email_password">Email Password</label>
                                <input type="password" class="form-control" id="email_password" placeholder="Enter Email Password">
                            </div>
                        </form>
    
                    </div>
                </div>
                <div class="settings_section">
                    <div class="container">
    
                        <!-- About Page Settings -->
                        <h4>About Page</h4>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="about_content">About Page Content</label>
                                <textarea class="form-control" id="about_content" rows="10" placeholder="Enter About Page Content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="about_image">About Page Image</label>
                                <input type="file" class="form-control-file" id="about_image">
                            </div>
                        </form>
                    </div>
                </div>
    
                <div class="settings_section">
                    <div class="container">
    
                        <!-- Terms and Conditions Settings -->
                        <h4>Terms and Conditions</h4>
                        <hr>
                        <form>
                            <div class="form-group">
                                <label for="terms_content">Terms and Conditions</label>
                                <textarea class="form-control" id="terms_content" rows="10" placeholder="Enter Terms and Conditions"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
    
                <div class="settings_section">
                    <div class="container">
                        <!-- Media Settings -->
                        <h4>Media Settings</h4>
                        <hr>
                        <form>
                            <!-- YouTube -->
                    <div class="form-group">
                        <label for="youtube">YouTube</label>
                        <input type="text" class="form-control" id="youtube" placeholder="Enter YouTube URL">
                    </div>

                    <!-- Twitter -->
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" class="form-control" id="twitter" placeholder="Enter Twitter URL">
                    </div>

                    <!-- LinkedIn -->
                    <div class="form-group">
                        <label for="linkedin">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" placeholder="Enter LinkedIn URL">
                    </div>

                    <!-- WhatsApp -->
                    <div class="form-group">
                        <label for="whatsapp">WhatsApp</label>
                        <input type="text" class="form-control" id="whatsapp" placeholder="Enter WhatsApp Number">
                    </div>

                        </form>
    
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // JavaScript to toggle rotation class on click
    $(document).ready(function(){
        $('.settings_icon').click(function(){
            $(this).toggleClass('rotate');
        });
    });
</script>
</body>
</html>
