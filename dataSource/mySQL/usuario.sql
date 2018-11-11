CREATE USER 'adminDB'@'localhost' IDENTIFIED BY 'eFashion';
GRANT USAGE ON *.* TO 'adminDB'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE, EXECUTE ON `eFashion`.* TO 'adminDB'@'localhost';