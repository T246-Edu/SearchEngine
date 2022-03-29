<html>

<body>
    <h1>simple search engine</h1>
    <center>
    <h3>To try it follow the following steps:<br></h1>
    &nbsp&nbsp&nbsp&nbsp1- Install XAMP from <a href="https://www.apachefriends.org/download.html"><b>XAMP installation page</b></a><br>
    &nbsp&nbsp&nbsp&nbsp2- open the XAMP control panel and start the apache and MySQL.<br>
    &nbsp&nbsp&nbsp&nbsp3-go to the htdocs folder and in xamp installation folder (usually, 'C:\xampp\htdocs') and put the SearchEngine folder inside it.<br>
    &nbsp&nbsp&nbsp&nbsp4-go to "xampp\apache\conf\extra" and open the file "httpd-vhosts.conf" and add a virtual host like this:<br><br>
    &nbsp&nbsp&nbsp&nbsp &lt;VirtualHost *:80&gt;<br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp##ServerAdmin webmaster@dummy-host2.example.com<br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDocumentRoot "C:\xampp\htdocs\SearchEngine"<br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspServerName Search-Engine<br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp##ErrorLog "logs/dummy-host2.example.com-error.log"<br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp##CustomLog "logs/dummy-host2.example.com-access.log" common<br>
        &nbsp&nbsp&nbsp&nbsp&lt;VirtualHost&gt;<br><br>
    &nbsp&nbsp&nbsp&nbsp5- go to "C:\Windows\System32\drivers\etc" and open 'hosts' file and at the end of the file 127.0.0.1 Search-Engine.local<br>
    &nbsp&nbsp&nbsp&nbsp6- open your browser and go to "http://localhost/phpmyadmin" and create a database called "mydb"<br>
    &nbsp&nbsp&nbsp&nbsp7- go to the import section on php myadmin and upload the two files excell data from the data folder.<br>
    &nbsp&nbsp&nbsp&nbsp8- in your browser go to localhost, it will open the search engine, search for the item you added in the DB<br><br>
        <div align = "center"><img src="https://i.ibb.co/vjbgQ6f/simple-search-engine.png" alt="simple-search-engine" border="0"></div>
    </center>
    <div align="center">
        <p>The bot in the analysis bot folder is for analysing the data that I extracted in the finished folder. I got the data from <a href="http://www.20000-names.com/">20000 Names website.</a></p>
    </div>
</body>

</html>
