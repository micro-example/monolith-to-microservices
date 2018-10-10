## Payment Application


# Steps to run the payment application  
--------------------------------------------  
1. Download the code from https://github.com/micro-example/monolith-to-microservices.git and follow the below steps.

   ``` cd monolith-to-microservices/monolith/payment```

2. Perform  ```mvn clean install```
it will generate the docker image with name ```payment:1.0.0-SNAPSHOT```

3. Get the ip address and run the docker image. 

```
   net_name=$(ip -o -4 route show to default | awk '{print $5}')
   listen_addr=$(ifconfig $net_name | grep -E 'inet\W' | grep -o -E [0-9]+.[0-9]+.[0-9]+.[0-9]+ | head -n 1)
```

```
   docker run -d -e SC_HOST=$listen_addr -p 8081:8081 payment:1.0.0-SNAPSHOT
```  
   
4. Open the service center frontend ( ```localhost:30103``` ) and check about payment application registry.

5. Test the API from service center GUI.
   
      # Thank you !
