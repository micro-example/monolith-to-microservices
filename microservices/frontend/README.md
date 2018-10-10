## Getting Started


##### Step 1
Get Machine IP using ifconfig
```
ifconfig
```


##### Step 2
Build PHP Docker image using the Dockerfile provided
```
cd monolith-to-microservices/microservices/frontend
docker build -t frontend:1.0.0 .
````

##### Step 3
Run PHP Image

```
docker run -p 8088:80 -e http_proxy=127.0.0.1:30101 frontend:1.0.0
```

##### Step 4
Run mesher container as sidecar for PHP container using --net=container mode

```
docker run -e CSE_REGISTRY_ADDR=http://$SC_IP:30100 -e SERVICE_NAME=FrontEnd -e APP_ID=OSIConference  --net=container:$PHP_CONTAINER_ID thanda/mesher:osi
```

##### Step 5
Open the link in Browser (http://127.0.0.1:8088/test.php).  You should be able to see the items and it's prices with checkbox, select the items and click buy, you will get total as reponse from payment.
