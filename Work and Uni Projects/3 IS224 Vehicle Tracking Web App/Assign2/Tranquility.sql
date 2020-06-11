/* Database Creation */
// CREATE DATABASE TRANQUILITY;
// USE Tranquility;

/* Create Tables */

DROP TABLE IF EXISTS user_type;
CREATE TABLE user_type (
    usertype_id INT(3) NOT NULL AUTO_INCREMENT,
    usertype_desc VARCHAR(15) NOT NULL,
    CONSTRAINT usertype_pk_usertypeid PRIMARY KEY (usertype_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO user_type (usertype_desc) VALUES 
("Admin"),
("Mechanic"),
("Employee");


DROP TABLE IF EXISTS users;
CREATE TABLE users (
    user_id INT(5) ZEROFILL NOT NULL AUTO_INCREMENT, 
    username VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    usertype_id INT(3) DEFAULT 3,
    CONSTRAINT users_pk_userid PRIMARY KEY (user_id),
    CONSTRAINT users_fk_usertypeid FOREIGN KEY (usertype_id) REFERENCES user_type(usertype_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO users (username, password, usertype_id) VALUES 
("Shahil", "asdf", "1"), 
("Yash", "asdf", "2"), 
("Arnesh", "asdf", "3");


DROP TABLE IF EXISTS vehicle_type;
CREATE TABLE vehicle_type (
    type_num INT(6) ZEROFILL NOT NULL AUTO_INCREMENT,
    veh_type VARCHAR(50),
    CONSTRAINT vehicle_type_pk_typenum PRIMARY KEY (type_num)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO vehicle_type (veh_type) VALUES 
("Sedan"), 
("Station Wagon"), 
("Panel Truck"), 
("Minivan"), 
("Minibus");


DROP TABLE IF EXISTS vehicle;
CREATE TABLE vehicle (
    veh_num CHAR(6) NOT NULL,
    veh_description VARCHAR(255),
    veh_miles DOUBLE(10, 3),
    veh_available ENUM('Y', 'N'),
    CONSTRAINT vehicle_pk_veh_num PRIMARY KEY (veh_num)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO vehicle VALUES
('FN-583', 'Minibus', 45567.591, 'Y'),
('HI-224', 'Sedan', 66786.542, 'N'),
('IA-113', 'Station Wagon' ,55467.876, 'N'),
('IJ-555', 'Minivan', 77862.287, 'Y'),
('FZ-987', 'Panel Truck', 64569.458, 'Y'),
('IC-999', 'Sedan', 45690.304, 'Y'),
('JB-745', 'Minivan', 85674.458, 'N'),
('IY-786', 'Station Wagon', 59234.587, 'Y'),
('IM-123', 'Panel Truck', 71257.721, 'N'),
('JD-396', 'Minibus', 62234.754, 'N');


DROP TABLE IF EXISTS employee;
CREATE TABLE employee (
    emp_id CHAR(5) NOT NULL,
    emp_lname VARCHAR(20),
    emp_fname VARCHAR(20),
    CONSTRAINT employee_pk_empid PRIMARY KEY (emp_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO employee VALUES
('E0000', 'Kumar', 'Yogesh'),
('E0001', 'Patel', 'Sonam'),
('E0002', 'Lal', 'Ashna'),
('E0003', 'Narayan', 'Rahul'),
('E0004', 'Bryce', 'Jope'),
('E0005', 'Naka', 'William'),
('E0006', 'Chand', 'Neha'),
('E0007', 'Ali', 'Sohail'),
('E0008', 'Maharaj', 'Shivam'),
('E0009', 'Parmar', 'Jaineel');


DROP TABLE IF EXISTS log_details;
CREATE TABLE log_details (
    log_num CHAR(7) NOT NULL,
    veh_num CHAR(6) NOT NULL,
    log_date VARCHAR(12),
    log_complaint VARCHAR(255),
    CONSTRAINT log_pk_log_num PRIMARY KEY (log_num),
    CONSTRAINT log_fk_vehnum FOREIGN KEY (veh_num) REFERENCES vehicle(veh_num) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO log_details VALUES  -- 2nd param from vehicle table
('LG00000', 'FN-583', '2016-08-04', 'Wiper is not working'),
('LG00795', 'HI-224', '2017-02-02', 'Vehicle is dirty'),
('LG00334', 'IA-113', '2016-12-12', 'Engine oil needs replacement'),
('LG00534', 'IJ-555', '2017-01-21', 'Brake oil needs replacement'),
('LG00198', 'FZ-987', '2016-11-03', 'Seat cover is torn'),
('LG00012', 'IC-999', '2016-08-11', 'Car battery is malfunctioned'),
('LG01136', 'JB-745', '2017-07-28', 'Vehicle is dirty'),
('LG00221', 'IY-786', '2016-11-12', 'Seat cover is torn'),
('LG00938', 'IM-123', '2017-05-25', 'Engine oil needs replacement'),
('LG01023', 'JD-396', '2017-06-23', 'Wiper is not working');


DROP TABLE IF EXISTS mechanic;
CREATE TABLE mechanic (
    emp_id CHAR(5) NOT NULL,
    mech_inspect VARCHAR(255),
    mech_date_chk VARCHAR(12),
    CONSTRAINT mechanic_pk_emp_id PRIMARY KEY (emp_id),
    CONSTRAINT mechanic_fk_empid FOREIGN KEY (emp_id) REFERENCES employee(emp_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO mechanic VALUES  -- emp_id i.e. 1st param from employee table
('E0005', 'Y', '2017-02-21'),
('E0009', 'Y', '2017-04-12'),
('E0001', 'N', '2016-12-12'),
('E0008', 'Y', '2017-03-22'),
('E0003', 'N', '2017-07-17'),
('E0006', 'N', '2017-08-26'),
('E0004', 'N', '2017-01-19'),
('E0007', 'Y', '2016-11-03'),
('E0000', 'N', '2016-12-18'),
('E0002', 'Y', '2017-01-22');


DROP TABLE IF EXISTS log_action;
CREATE TABLE log_action (
    logact_num CHAR(8) NOT NULL,
    log_num CHAR(7) NOT NULL,
    emp_id CHAR(5) NOT NULL,
    logact_type VARCHAR(100),
    logact_date VARCHAR(12),
    CONSTRAINT log_action_pk_logactnum PRIMARY KEY (logact_num),
    CONSTRAINT log_action_fk_lognum FOREIGN KEY (log_num) REFERENCES log_details(log_num) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT lo_action_fk_empid FOREIGN KEY (emp_id) REFERENCES mechanic(emp_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO log_action VALUES  -- 2nd param - log table, 3rd - mechanic
('LGA00000', 'LG00000', 'E0005', 'Fixed ', '2016-08-10'),
('LGA00012', 'LG00012', 'E0009', 'Replaced', '2016-11-13'),
('LGA00094', 'LG00795', 'E0001', 'Replaced', '2016-11-22'),
('LGA00225', 'LG00221', 'E0008', 'Replaced', '2016-12-22'),
('LGA00746', 'LG00938', 'E0003', 'Replaced', '2017-02-01'),
('LGA01123', 'LG00334', 'E0006', 'Replaced', '2017-02-04'),
('LGA01021', 'LG01023', 'E0004', 'Cleaned', '2017-05-30'),
('LGA00328', 'LG00198', 'E0007', 'Replaced', '2017-06-29'),
('LGA00976', 'LG00012', 'E0000', 'Fixed', '2017-08-02'),
('LGA00672', 'LG00795', 'E0002', 'Repaired', '2017-09-13');


DROP TABLE IF EXISTS log_line;
CREATE TABLE log_line (
    logline_num CHAR(8) NOT NULL,
    log_num CHAR(7) NOT NULL,
    emp_id CHAR(5),
    logline_date VARCHAR(12),
    logline_time TIME,
    logline_action VARCHAR(100),
    logline_units TINYINT UNSIGNED,
    CONSTRAINT log_line_pk_logline_num PRIMARY KEY (logline_num),
    CONSTRAINT log_line_fk_lognum FOREIGN KEY (log_num) REFERENCES log_details(log_num) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT log_line_fk_empid FOREIGN KEY (emp_id) REFERENCES mechanic(emp_id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO log_line VALUES  -- 2nd param from log table, 3rd param from mechanic table
('LGl00000', 'LG00000', 'E0005', '2017-01-12', '09:11:11', 'Attended', 3),
('LGl00011', 'LG00795', 'E0009', '2017-01-22', '10:10:56', 'Unattended', 2),
('LGl00052', 'LG00012', 'E0001', '2017-02-02', '11:11:34', 'Inspected', 3),
('LGl00123', 'LG00221', 'E0008', '2017-03-11', '09:30:12', 'Parts Replaced', 4),
('LGl00153', 'LG00938', 'E0003', '2017-04-05', '08:49:23', 'Attended', 5),
('LGl00225', 'LG01023', 'E0006', '2017-05-28', '10:18:45', 'Inspected', 2),
('LGl00327', 'LG01136', 'E0004', '2017-06-08', '11:54:13', 'Unattended', 2),
('LGl00468', 'LG00534', 'E0007', '2017-06-18', '10:29:34', 'Parts Replaced', 4),
('LGl00578', 'LG00334', 'E0000', '2017-07-27', '10:04:20', 'Attended', 3),
('LGl00662', 'LG01023', 'E0002', '2017-08-26', '08:44:54', 'Inspected', 5);


DROP TABLE IF EXISTS part;
CREATE TABLE part (
    part_code CHAR(7) NOT NULL,
    log_num CHAR(7),
    logline_num CHAR(8) NOT NULL,
    part_description VARCHAR(255),
    part_cost DOUBLE(10, 2),
    part_qoh SMALLINT UNSIGNED,
    CONSTRAINT part_pk_part_code PRIMARY KEY (part_code),
    CONSTRAINT part_fk_lognum FOREIGN KEY (log_num) REFERENCES log_line(log_num) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT part_fk_loglinenum FOREIGN KEY (logline_num) REFERENCES log_line(logline_num) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO part VALUES  -- 2nd param from log table, 3rd from log_line table
('PT00000', 'LG00000', 'LGL00000', 'Engine', 3999.95, 2),
('PT00001', 'LG00795', 'LGL00011', 'Air filter', 495.50, 2 ),
('PT00002', 'LG00012', 'LGL00052', 'Belt', 100.00, 4),
('PT00003', 'LG00221', 'LGL00123', 'Car battery', 200.00, 3),
('PT00004', 'LG00938', 'LGL00153', 'Window', 150.00, 1),
('PT00005', 'LG01023', 'LGL00225', 'Door', 700.00, 1),
('PT00006', 'LG01136', 'LGL00327', 'Headlight', 200.00, 2),
('PT00007', 'LG00534', 'LGL00468', 'Oil filter', 50.00, 1),
('PT00008', 'LG00334', 'LGL00578', 'Muffler', 400.00, 1),
('PT00009', 'LG01023', 'LGL00662', 'Windscreen Wiper', 100.00, 2);



DROP TABLE IF EXISTS sign_out;
CREATE TABLE sign_out (
    signout_num CHAR(7) NOT NULL,
    emp_id CHAR(5),
    part_code CHAR(7),
    log_num CHAR(7),
    signout_date VARCHAR(12),
    signout_units SMALLINT,
    CONSTRAINT sign_out_pk_signoutnum PRIMARY KEY (signout_num),
    CONSTRAINT sign_out_fk_empid FOREIGN KEY (emp_id) REFERENCES mechanic(emp_id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT sign_out_fk_partcode FOREIGN KEY (part_code) REFERENCES part(part_code) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT sign_out_fk_lognum FOREIGN KEY (log_num) REFERENCES log_details(log_num) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO sign_out VALUES  -- 2nd param from mechanic, 3rd from part, 4th from log
('SG00000', 'E0005', 'PT00000', 'LG00000', '2017-02-12', 2),
('SG00001', 'E0009', 'PT00001', 'LG00334', '2017-04-15', 1),
('SG00002', 'E0001', 'PT00002', 'LG00795', '2017-01-12', 3),
('SG00003', 'E0008', 'PT00003', 'LG00198', '2017-06-12', 2),
('SG00004', 'E0003', 'PT00004', 'LG00534', '2017-02-26', 1),
('SG00005', 'E0006', 'PT00005', 'LG00534', '2017-03-03', 1),
('SG00006', 'E0004', 'PT00006', 'LG01136', '2017-06-12', 1),
('SG00007', 'E0007', 'PT00007', 'LG00938', '2017-05-05', 1),
('SG00008', 'E0000', 'PT00008', 'LG01023', '2017-01-13', 1),
('SG00009', 'E0002', 'PT00009', 'LG00012', '2017-08-22', 2);
