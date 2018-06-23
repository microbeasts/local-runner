FROM mariadb:10.2

LABEL maintainer="me@domain.com"

RUN apt-get update && apt-get upgrade -y
#RUN apt-get install nano

# ENVIRONMENT VARIABLES
ENV MYSQL_ROOT_PASSWORD root
ENV MYSQL_DATABASE test
ENV MYSQL_USER root
ENV MYSQL_PASSWORD root

# UPDATE BIND ADDRESS TO ALLOW REMOTE ACCESS (USE A FIREWALL TO MANAGE TRAFFIC)
RUN sed -Ei 's/#bind-address\s+=\s+127.0.0.1/bind-address=0.0.0.0/g' /etc/mysql/my.cnf

EXPOSE 3306