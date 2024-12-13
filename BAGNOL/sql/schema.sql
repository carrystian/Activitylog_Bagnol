CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE, -- Unique username for login
    email VARCHAR(100) NOT NULL UNIQUE, -- User's email for communication/login
    password_hash VARCHAR(255) NOT NULL, -- Password stored as a secure hash
    role ENUM('Admin', 'User') DEFAULT 'User', -- Role-based access control
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone_number VARCHAR(20), -- Optional phone number for contact
    birthdate DATE, -- Storing birthdate rather than age for flexibility
    gender ENUM('Male', 'Female', 'Other', 'Prefer not to say'), -- Optional gender field
    location VARCHAR(100), -- City or country for remote or onsite work preferences
    years_of_experience INT NOT NULL, -- Total years of work experience
    education_level ENUM('High School', 'Bachelor', 'Master', 'PhD', 'Other'), -- Highest educational qualification
    field_of_study VARCHAR(100), -- Degree specialization (e.g., Computer Science)
    job_title VARCHAR(100), -- Current or desired job title (e.g., Software Engineer)
    tech_stack TEXT, -- List of technical skills, languages, frameworks, etc.
    portfolio_url VARCHAR(255), -- URL to personal portfolio or website
    bio TEXT, -- A short summary or bio of the user
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE activity_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT, -- Foreign key linking to the users table
    action_type ENUM('INSERT', 'UPDATE', 'DELETE', 'SEARCH') NOT NULL, -- Type of activity
    table_name VARCHAR(50), -- The name of the affected table
    record_id INT, -- ID of the record that was affected
    search_keywords TEXT, -- If action_type is SEARCH, store the searched keywords
    action_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- When the action occurred
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
