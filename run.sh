#Apache 
sudo apt install apache2
sudo ufw app list
sudo ufw allow 'Apache'
sudo ufw status
sudo systemctl status apache2
#sudo systemctl stop apache2
#sudo systemctl start apache2
#sudo systemctl restart apache2
#PHP for apache
sudo apt install php libapache2-mod-php



#mysql :
#$conn = mysqli($servername,$username,$password,$dbname);
# $sql = "select * from table;"
# $result = $conn->query($sql);
# if($result->num_rows>0) {

#     while($row = $result->fetch_assoc()) {
#         echo "<h1>".$row["username"]."</h1>"
#     }
# }
# $conn->close();
