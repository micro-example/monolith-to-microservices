## Getting Started


##### Step 1
Get Machine IP using ifconfig
```
net_name=$(ip -o -4 route show to default | awk '{print $5}')
listen_addr=$(ifconfig $net_name | grep -E 'inet\W' | grep -o -E [0-9]+.[0-9]+.[0-9]+.[0-9]+ | head -n 1)
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
docker run -d -p 8088:80 -e http_proxy=127.0.0.1:30101 --name PHP frontend:1.0.0
```

##### Step 4
Get PHP container ID

```
PHP_CONTAINER_ID=$(docker ps -aqf "name=PHP")
```


##### Step 5
Run mesher container as sidecar for PHP container using --net=container mode

```
docker run -d -e CSE_REGISTRY_ADDR=http://$listen_addr:30100 -e SERVICE_NAME=FrontEnd -e APP_ID=OSIConference  --net=container:$PHP_CONTAINER_ID thanda/mesher:osi
```

##### Step 6
Open the link in Browser (http://127.0.0.1:8088/test.php).  You should be able to see the items and it's prices with checkbox, select the items and click buy, you will get total as reponse from payment.
