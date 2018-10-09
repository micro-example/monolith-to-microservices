# Steps to run the monolithic application  
--------------------------------------------  
1. Download the code from https://github.com/micro-example/monolith-to-microservices.git and follow the steps.

   cd monolith-to-microservices/monolith

2. perform "mvn clean install"
it will generate the docker image with name "monolithic 1.4.4.RELEASE".

3. Run the docker image.
   docker run -d -p 8081:8081 monolithic:1.4.4.RELEASE 
   
4. Call the service from frontend.  
   a) we have php script at monolith-to-microservices/monolith/test.php  
   b) install the apache server by following the link:https://www.vultr.com/docs/how-to-install-apache-mysql-and-php-on-ubuntu-16-04  
   c) copy the test.php to /var/www/html/test.php and make sure that you are root user. If any permission problem better to create the file in root user and copy the content and save it.  
   d) open the browser and open the local test.php file. Run "localhost/test.php"
5. We can find items like pizza/ola/movie. Select any item and book we can find the total cost displayed.

6. Here Item service and payment service both combined and developed as a monolithic application.

      # Thank you !
