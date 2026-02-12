#FROM mysql/mysql-server:5.7
#COPY init.sql /docker-entrypoint-initdb.d/
#EXPOSE 3306
#ENV MYSQL_ROOT_PASSWORD=admin123

FROM mysql/mysql-server:5.7
# 1. Environment variables ikkade set chestunnam
ENV MYSQL_ROOT_PASSWORD=admin123
# 2. SQL scripts ni copy chestunnam
# Idi container start ayyetappudu automatic ga execute avtundi
COPY init.sql /docker-entrypoint-initdb.d/
# 3. MySQL default port
EXPOSE 3306
