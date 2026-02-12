<?php
session_start();
// Login avvakunda evaraina direct ga dashboard ki ravalante, login page ki redirect chestundi
if(!isset($_SESSION['uname'])){
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dashboard - Srinu BB</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      /* Base Styles from your original index.html */
      html { line-height: 1.15; font-family: Lexend, sans-serif; }
      body { margin: 0; background-color: #f5f5f5; }
      
      /* --- Profile & Logout Dropdown Styles --- */
      .header-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 40px;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      }
      .profile-dropdown { position: relative; display: inline-block; }
      .profile-btn {
        background-color: #31a9b1;
        color: white;
        padding: 10px 18px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: bold;
        border: none;
        display: flex;
        align-items: center;
        gap: 10px;
      }
      .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 180px;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
        border-radius: 8px;
        margin-top: 10px;
        z-index: 1000;
      }
      .dropdown-content p { padding: 12px 16px; margin: 0; border-bottom: 1px solid #eee; color: #333; }
      .dropdown-content a { color: #333; padding: 12px 16px; text-decoration: none; display: block; }
      .dropdown-content a:hover { background-color: #f1f1f1; }
      .show { display: block; }
    </style>
    <link rel="stylesheet" href="./style.css" />
    <link rel="stylesheet" href="./home.css" />
  </head>
  <body>
    <header class="header-container">
      <div style="font-weight: bold; font-size: 20px; color: #31a9b1;">Srinu Blood Bank</div>
      
      <div class="profile-dropdown">
        <button onclick="toggleMenu()" class="profile-btn">
          User: <?php echo htmlspecialchars($_SESSION['uname']); ?> ▼
        </button>
        <div id="myDropdown" class="dropdown-content">
          <p>Logged in as: <b><?php echo htmlspecialchars($_SESSION['uname']); ?></b></p>
          <a href="edit-profile.php">Edit Profile</a>
          <a href="logout.php" style="color: red; font-weight: bold;">Logout</a>
        </div>
      </div>
    </header>

    <div class="home-container">
      <main class="home-main">
        <div class="home-hero section-container">
          <div class="home-max-width max-content-container">
            <div class="home-content-container">
              <h1 class="home-heading">
                <span class="home-text">Welcome to Srinu Blood Bank Dashboard</span>
                <br><br>
                <a href="signup.php"><button style="background-color:blue;color:white;width:150px;height:40px;">Signup New</button></a>
                <a href="/bmi/index.html"><button style="background-color:blue;color:white;width:150px;height:40px;">BMI</button></a>
                <br><br>
                <a href="/weightconverter/index.html"><button style="background-color:blue;color:white;width:300px;height:40px;">Weight Converter</button></a>
                <br><br>
                <span class="home-text06">Blood donation is an extremely noble deed. Save lives today!</span>
              </h1>
              <img alt="image" src="public/playground_assets/blood%20donation%20logo-500w.png" class="home-image" />
            </div>
          </div>
        </div>

        <nav class="home-nav" style="background: #fff; padding: 20px; text-align: center;">
          <a href="donate-blood.php" style="margin-right: 20px; text-decoration: none; color: #31a9b1; font-weight: bold;">Donate Blood</a>
          <a href="find-donor.php" style="text-decoration: none; color: #31a9b1; font-weight: bold;">Find Donor</a>
        </nav>
      </main>
    </div>

    <script>
      /* Toggle between hiding and showing the dropdown content */
      function toggleMenu() {
        document.getElementById("myDropdown").classList.toggle("show");
      }

      /* Close the dropdown if the user clicks outside of it */
      window.onclick = function(event) {
        if (!event.target.matches('.profile-btn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
    </script>
  </body>
</html>
