FROM ubuntu:14.04
RUN mkdir -p /opt/gochassis && \
    mkdir -p /opt/gochassis/conf


COPY ./conf/microservice.yaml  /opt/gochassis/conf
COPY ./conf/chassis.yaml       /opt/gochassis/conf
COPY ./Catalog                 /opt/gochassis
ENV CHASSIS_HOME=/opt/gochassis/
WORKDIR $CHASSIS_HOME
CMD ["/opt/gochassis/Catalog"]
