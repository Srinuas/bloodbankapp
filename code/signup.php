<?php
class script {

    public $con;

    public function __construct() {
        $server = "mysqldb";
        $user = "root";
        $pass = "admin123";
        $db = "customers";

        $this->con = mysqli_connect($server, $user, $pass, $db) or die("unable to connect");
    }

    public function add($username, $name, $password) {
        // 1. Mundu username already database lo undo ledo check chestunnam
        $checkUser = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username'");

        if (mysqli_num_rows($checkUser) > 0) {
            // Okavela username unte, error message chupistundi
            echo "<div style='text-align:center; margin-top:20px; font-weight:bold; color:red;'>";
            echo "Error: Username '$username' already exists! Please try a different one.";
            echo "</div>";
        } else {
            // 2. Username lekapothe, kotha record ni insert chestunnam
            $u = urlencode($username);
            $n = urlencode($name);
            $p = urlencode($password);

            $sql = "INSERT INTO users(username, name, password) VALUES('$u', '$n', '$p')";
            $res = mysqli_query($this->con, $sql);

            if ($res) {
                // 3. Success ayithe, Login link chupistundi
                echo "<div style='text-align:center; margin-top:20px; font-weight:bold; color:green;'>";
                echo "Data Added Successfully! ";
                echo "<br><br><a href='index.php' style='color:blue; text-decoration:underline;'>Click here to Login Now</a>";
                echo "</div>";
            } else {
                echo "<div style='text-align:center; color:red;'>Operational Failure</div>";
            }
        }
    }

    public function getdata() {
        $sql = "select * from users";
        $res = mysqli_query($this->con, $sql) or die("unable to fetch");
        
        if (mysqli_num_rows($res) > 0) {
            echo '
            <table border="1" style="width:100%; border-collapse: collapse; text-align: center;">
                <tr>
                    <th>FName</th>
                    <th>LName</th>
                    <th>Mobileno</th>
                    <th>City</th>
                    <th>Date</th>    
                    <th>DOB</th>
                    <th>Mail</th>
                    <th>BloodGroup</th>                                             
                </tr>';

            while ($row = mysqli_fetch_array($res)) {
                echo '<tr>
                    <td>' . htmlspecialchars($row['fname']) . '</td>
                    <td>' . htmlspecialchars($row['lname']) . '</td>
                    <td>' . htmlspecialchars($row['mobileno']) . '</td>
                    <td>' . htmlspecialchars($row['city']) . '</td>
                    <td>' . htmlspecialchars($row['date']) . '</td>
                    <td>' . htmlspecialchars($row['dob']) . '</td>
                    <td>' . htmlspecialchars($row['mail']) . '</td>
                    <td>' . htmlspecialchars($row['bloodgroup']) . '</td>
                </tr>';
            }
            echo '</table>';
        } else {
            echo "No Data Found";
        }
    }
}
?>
