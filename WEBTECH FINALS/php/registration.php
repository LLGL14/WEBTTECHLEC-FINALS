<!DOCTYPE html>
<meta charset="utf-8" />
<body>
<form method='post' action='registration_success.php'>
    <table>
        <tr>
            <td>FIrstName</td>
            <td><input type='text' name='Person_FirstName' tabindex='1'/></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><input type='text' name='Person_LastName' tabindex='2'/></td>
        </tr>
        <tr>
            <td>ID</td>
            <td><input type="text" name='Useracc_UserID' tabindex='3'/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name='Useracc_PasswordA' tabindex='4'/></td>
        </tr>
        <tr>
            <td>Password Check</td>
            <td><input type="password" name='Useracc_PasswordB' tabindex='5'/></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <td ><input type='submit' tabindex='6' value='go' style='height:50px'/></td>
    </table>
    <p>want to log-in?  </p> <a href = "Login.php">Log In</a>
</form>