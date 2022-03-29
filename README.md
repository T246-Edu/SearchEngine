<html>

<body>
    <h1>simple search engine</h1>
    <center>
    <h3>To try it follow the following steps:<br></h1>
        <ol>
  <li> Install XAMP from <a href="https://www.apachefriends.org/download.html"><b>XAMP installation page</b></a></li>
  <li> open the XAMP control panel and start the apache and MySQL.</li> 
  <li> go to the htdocs folder and in xamp installation folder (usually, 'C:\xampp\htdocs') and put the SearchEngine folder inside it.</li> 
  <li> go to "xampp\apache\conf\extra" and open the file "httpd-vhosts.conf" and add a virtual host like this:<br>
   &lt;VirtualHost *:80&gt;<br>
      ##ServerAdmin webmaster@dummy-host2.example.com<br>
      DocumentRoot "C:\xampp\htdocs\SearchEngine"<br>
      ServerName Search-Engine<br>
      ##ErrorLog "logs/dummy-host2.example.com-error.log"<br>
      ##CustomLog "logs/dummy-host2.example.com-access.log" common<br>
      &lt;VirtualHost&gt;<br></li> 
  <li>  go to "C:\Windows\System32\drivers\etc" and open 'hosts' file and at the end of the file 127.0.0.1 Search-Engine.local</li> 
  <li>  open your browser and go to "http://localhost/phpmyadmin" and create a database called "mydb"</li> 
  <li> go to the import section on php myadmin and upload the two files excell data from the data folder.</li> 
  <li> in your browser go to localhost, it will open the search engine, search for the item you added in the DB<br></li> 
            </ol>
    </center>
    <div align="center">
        <h3><p>The bot in the analysis bot folder is for analysing the data that I extracted in the finished folder. I got the data from <a href="http://www.20000-names.com/">20000 Names website.</a></p></h3>
    </div>
    <div align = "center"><img src="https://i.ibb.co/vjbgQ6f/simple-search-engine.png" alt="simple-search-engine" border="0"></div>
</body>

</html>
