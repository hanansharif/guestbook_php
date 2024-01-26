-- Create 'cmnts' table with foreign keys referencing 'users'
CREATE TABLE cmnts (
    cmnt_id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255),
    user_name VARCHAR(50),
    cmnt_body VARCHAR(1000),
    cmnt_date DATE,
    FOREIGN KEY (user_email) REFERENCES users(user_email)
);;
-- Create 'users' table
CREATE TABLE users (
    user_email VARCHAR(255) PRIMARY KEY,
    user_name VARCHAR(50),
    user_password VARCHAR(255)
);