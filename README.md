# magento_container
git clone https://github.com/nilesh2718/magento_container.git
cd /magento_container/magento2
docker build -t magento .
cd /magento_container/mysql
docker build -t mysql .
docker run --name=testsql -e MYSQL_ROOT_PASSWORD=root -d mysql 
//**to check ip and service is running or not*//
docker inspect testsql
//**update bas url**//
update core_config_data set value = 'http://localhost:8081/magentome/' where path = 'web/unsecure/base_url';
update core_config_data set value = 'https://localhost:8081/magentome/' where path = 'web/secure/base_url';

set env.php file of magento to mysql connection

docker run --name Magento -d --link testsql:db -p 8081:80 magento
  magento upgrade and chenge owner of var and genrated folder
