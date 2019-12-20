## This bash is for running yaldaBot that is a telegram Bot
#1
docker stop yaldabot
#2
docker run --name yaldabot -p 8080:80 -e APACHE_LOG_DIR=/etc/apache2 -d sajadsadra/yaldabot 
#3
echo "-----------------------------------DONE-------------------"
echo "open http://IP:8080/yalda in browser"
echo "click on .php file"
