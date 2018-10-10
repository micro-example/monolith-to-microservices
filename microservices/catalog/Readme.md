## Catalog Application


# Steps to run the Catalog application  
--------------------------------------------  
1. Download the code from https://github.com/micro-example/monolith-to-microservices.git and follow the steps.

    ``` cd monolith-to-microservices/microservices/catalog ```

2. Build Docker image

    ``` docker build -t catalog:1.0.0 . ```

3. Getting the ip address of the vm
   ```
   net_name=$(ip -o -4 route show to default | awk '{print $5}')
   listen_addr=$(ifconfig $net_name | grep -E 'inet\W' | grep -o -E [0-9]+.[0-9]+.[0-9]+.[0-9]+ | head -n 1)
   ```

4. Run the docker image. 
 
 Linux
   ```  
      docker run -d -e CSE_REGISTRY_ADDR=http://$listen_addr:30100 catalog:1.0.0 
   ```
   
 Mac 
 ```  
      docker run -d -e CSE_REGISTRY_ADDR=http://docker.for.mac.localhost:30100 catalog:1.0.0 
```
   
4. Open the service center frontend ( localhost:30103 ) and check about catalog application registry.
   
    # Thank you !
