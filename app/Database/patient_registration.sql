CREATE TABLE patient_registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(45) NOT NULL,
    last_name VARCHAR(45) NOT NULL,
    age INT NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    diagnosis TEXT NOT NULL,
    prescribed_medication TEXT NOT NULL,
    checkup_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

ADD COLUMN status ENUM('Active', 'Discharged', 'Deceased', 'Transferred') 
DEFAULT 'Active' AFTER checkup_date;
