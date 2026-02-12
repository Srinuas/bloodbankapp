#FROM mysql/mysql-server:5.7
#COPY init.sql /docker-entrypoint-initdb.d/
#EXPOSE 3306
#ENV MYSQL_ROOT_PASSWORD=admin123



FROM mysql/mysql-server:5.7

# SQL scripts automatic ga run avvadaniki
COPY init.sql /docker-entrypoint-initdb.d/

# External access allow cheyadaniki idi chala important
ENV MYSQL_ROOT_HOST=%
ENV MYSQL_ROOT_PASSWORD=admin123
ENV MYSQL_DATABASE=customers

EXPOSE 3306
