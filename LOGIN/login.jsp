<%-- 
    Document   : login
    Created on : 05 11, 18, 5:16:34 PM
    Author     : lenovo
--%>
<%@ page import ="java.sql.*" %>
<%@taglib uri="http://java.sun.com/jsp/jstl/sql" prefix="sql" %>
<%@taglib  uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<sql:setDataSource driver="com.mysql.jdbc.Driver"
                   url="jdbc:mysql://localhost/car_rental"
                   user="root"
                   password=""/>

<sql:query var="username">
    SELECT userName FROM customer;
    <sql:param>
                ${param.username}
    </sql:param>
</sql:query>

<sql:query var="password">
    SELECT userName FROM customer;
    <sql:param>
                ${param.password}
    </sql:param>
</sql:query>
    
    <c:choose>
            <c:when test="${param.username} != ${param.un} && ${param.password} != ${param.pa}">
                <h2>You have entered either wrong password or username. <a href="login.jsp">Please login again</a></h2>
            </c:when>

            <c:otherwise>
               response.sendRedirect("home.html");
            </c:otherwise>
        </c:choose>

<h1>Welcome Admin</h1>