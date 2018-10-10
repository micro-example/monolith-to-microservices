## Payment Application


# Steps to run the payment application  
--------------------------------------------  
1. Download the code from https://github.com/micro-example/monolith-to-microservices.git and follow the steps.

   cd monolith-to-microservices/monolith/payment

2. perform "mvn clean install"
it will generate the docker image with name "payment 1.0.0-SNAPSHOT".

3. Run the docker image.  
   docker run -d -e SC_HOST={ip} -p 8081:8081 payment 1.0.0-SNAPSHOT  
   Here ip need to replace with service center IP where service center is running.  
   
4. Open the service center frontend ( localhost:30103 ) and check about payment application registry.

5. Test the API from service center GUI.
   
      # Thank you !
