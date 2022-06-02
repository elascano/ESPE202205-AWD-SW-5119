<%-- 
    Document   : proceso
    Created on : 01/06/2022, 14:10:54
    Author     : G401
--%>
<%@page import="soccer.SoccerPlayer"%>
<%@page import="webServices.SoccerPlayerResource"%>
<html>
<head>
<title>SOCCER PLAYERS</title>
<style type="text/css" media="screen">
</style>
</head>
<body>
 
<%
 SoccerPlayerResource soccerPlayer=new SoccerPlayerResource();
 int id=Integer.valueOf(request.getParameter("id"));
 String name=new String((request.getParameter("name")).getBytes("ISO-8859-1"),"UTF-8");
 String lastName=new String((request.getParameter("lastName")).getBytes("ISO-8859-1"),"UTF-8");
 String nickName=new String((request.getParameter("nickName")).getBytes("ISO-8859-1"),"UTF-8");
 String position=new String((request.getParameter("position")).getBytes("ISO-8859-1"),"UTF-8");
 int numPlayer=Integer.valueOf(request.getParameter("numPlayer"));
 String soccerTeam=new String((request.getParameter("position")).getBytes("ISO-8859-1"),"UTF-8");
 String nationality=new String((request.getParameter("nationality")).getBytes("ISO-8859-1"),"UTF-8");
 SoccerPlayer player=new SoccerPlayer(id,name,lastName,nickName,position,numPlayer,soccerTeam,nationality);
 soccerPlayer.postJson(player);
 out.print("Jugador añadido a la Base");
 %>

 
</body>
</html>