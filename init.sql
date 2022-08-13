CREATE USER 'admin'@'172.25.0.6' IDENTIFIED BY 'test';
GRANT ALL ON *.* TO 'admin'@'172.25.0.6';
FLUSH PRIVILEGES;
# CREATE TABLE test (
#                          id int auto_increment primary key,                           col1 datatype,
#                         tile varchar(255) not null
# );
# INSERT INTO test(tile)
#      VALUES
#       ('text1'), ('text2');