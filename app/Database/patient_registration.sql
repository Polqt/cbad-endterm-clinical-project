-- CREATE TABLE patient_registration (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     user_id INT(11) NOT NULL,
--     first_name VARCHAR(45) NOT NULL,
--     last_name VARCHAR(45) NOT NULL,
--     age INT NOT NULL,
--     gender ENUM('male', 'female') NOT NULL,
--     diagnosis TEXT NOT NULL,
--     prescribed_medication TEXT NOT NULL,
--     checkup_date DATE NOT NULL,
--     status ENUM('Active', 'Discharged', 'Deceased', 'Transferred') DEFAULT 'Active',
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--     FOREIGN KEY (user_id) REFERENCES user_registration(user_id)
-- );

-- ALAWS NAGANA YOWT
-- DELIMITER //

-- CREATE TRIGGER validate_patient_user_id
-- BEFORE INSERT ON patient_registration
-- FOR EACH ROW
-- BEGIN
--     DECLARE user_count INT;
    
--     // Check if the user exists and has a 'user' role
--     SELECT COUNT(*) INTO user_count
--     FROM user_registration 
--     WHERE user_id = NEW.user_id AND role = 'user';
    
--     // If no matching user is found, raise an error
--     IF user_count = 0 THEN
--         SIGNAL SQLSTATE '45000' 
--         SET MESSAGE_TEXT = 'Invalid user_id. Patient must be registered with an existing user account with user role.';
--     END IF;
-- END;//

-- DELIMITER ;