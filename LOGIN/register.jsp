<%-- 
    Document   : register
    Created on : 05 8, 18, 12:23:34 AM
    Author     : lenovo
--%>
<%@ page import ="java.sql.*" %>
<%@taglib uri="http://java.sun.com/jsp/jstl/sql" prefix="sql" %>
<%@taglib  uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>


<sql:setDataSource driver="com.mysql.jdbc.Driver"
                   url="jdbc:mysql://localhost/car_rental"
                   user="root"
                   password=""/>

<sql:update>
    INSERT INTO customer(firstName,lastName,Bdate,contactNumber,email,address,licenseNumber,licenseExpDate,userName,password)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    <sql:param>${param.fname}</sql:param>
    <sql:param>${param.lname}</sql:param>
    <sql:param>${param.bday}</sql:param>
    <sql:param>${param.contact}</sql:param>
    <sql:param>${param.email}</sql:param>
    <sql:param>${param.address}</sql:param>
    <sql:param>${param.licenseNumber}</sql:param>
    <sql:param>${param.licenseExpDate}</sql:param>
    <sql:param>${param.uname}</sql:param>
    <sql:param>${param.pass}</sql:param>
        
</sql:update>
  
        <form method="post" action="login.jsp">
            <center>
            <table border="1" width="30%" cellpadding="5">
                <thead>
                    <tr>
                        <th colspan="2">Log In Here</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="un" value="" required/></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="pa" value="" required/></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" align="center"><input type="submit" value="Login" />
                            &nbsp;&nbsp;
                            <input type="reset" value="Reset" />
                        </td>  
                    </tr>
                </tbody>
            </table>
            </center>
        </form>
