# magento_container
git clone https://github.com/nilesh2718/magento_container.git
cd /magento_container/magento2
docker build -t magento .
cd /magento_container/mysql
docker build -t mysql .
docker run --name=testsql -e MYSQL_ROOT_PASSWORD=root -d mysql 
docker run --name Magento -d --link testsql:db -p 8080:80 magento
  
