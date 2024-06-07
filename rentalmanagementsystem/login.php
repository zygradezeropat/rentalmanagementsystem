<?php
include 'connect.php';
include 'links.php';
session_start();

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is Required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is Required");
        exit();
    } else {
        
        $stmt = $conn->prepare("SELECT * FROM user WHERE user_name = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
          $num = $row['id'];

        if ($result->num_rows > 0) {
            
            if (password_verify($pass, $row["pass"])) {
              
                if ($row["type"] == "admin") {
                    $_SESSION['admin'] = $num;
                    header("Location: dashboard.php");
                } else if ($row["type"] == "renter") {
                    $_SESSION['user'] = $num;
                    header("Location: userui.php");
                }
            } else {
                header("Location: index.php?error=Wrong Password");
            }
        } else {
            header("Location: index.php?error=Wrong User Name");
        }
    }
} else {
    header("location: index.php");
    exit();
}
$conn->close();
?>
