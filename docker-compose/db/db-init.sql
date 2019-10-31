-- Make sure any changes to these variables in the .env file are reflected here
-- DB_DATABASE
-- DB_USERNAME
-- DB_PASSWORD
GRANT ALL ON hacktober.* TO 'hacktober-user'@'%' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;
