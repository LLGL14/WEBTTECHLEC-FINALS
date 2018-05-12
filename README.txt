start wamp server

click the wamp icon on the lower right of the screen then click on www

remove the files inside the directory

transfer or copy the files from the website folder and paste it in the directory

type 'localhost' in your browser then the your website should appear

if you want to add a domain name

go to the 'httpd.conf' which is found in the wampserver menu

remove the comment "Include conf/extra/httpd-vhosts.conf" on the file

Now add a text file in "C:\wamp\bin\apache\Apache-VERSION\conf\extra\" with the following content

ServerAdmin admin@website.com
DocumentRoot "C:\wamp\www" -where your html files are located
ServerName  coursewebsite.com
ErrorLog "logs/website.com.log"
CustomLog "logs/website.com-access.log"

edit the hosts file and change it your ip address and to the domain name that you want