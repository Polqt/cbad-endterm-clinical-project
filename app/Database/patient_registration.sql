-- CREATE TABLE patient_registration (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     first_name VARCHAR(45) NOT NULL,
--     last_name VARCHAR(45) NOT NULL,
--     age INT NOT NULL,
--     gender ENUM('male', 'female') NOT NULL,
--     diagnosis TEXT NOT NULL,
--     prescribed_medication TEXT NOT NULL,
--     checkup_date DATE NOT NULL,
--     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
-- );


-- ADD COLUMN status ENUM('Active', 'Discharged', 'Deceased', 'Transferred') 
-- DEFAULT 'Active' AFTER checkup_date;

-- ALTER TABLE patient_registration
-- ADD COLUMN user_id INT(11) AFTER id,
-- ADD FOREIGN KEY (user_id) REFERENCES user_registration(user_id);




-- SELECT * FROM patient_registration WHERE user_id IS NULL;

-- UPDATE patient_registration 
-- SET user_id = (
--     SELECT user_id 
--     FROM user_registration 
--     WHERE user_registration.first_name = patient_registration.first_name 
--     AND user_registration.last_name = patient_registration.last_name 
--     AND role = 'user' 
--     LIMIT 1
-- )
-- WHERE user_id IS NULL;

-- UPDATE patient_registration pr
-- JOIN user_registration ur 
-- ON pr.first_name = ur.first_name 
-- AND pr.last_name = ur.last_name
-- SET pr.user_id = ur.user_id
-- WHERE pr.user_id IS NULL;
