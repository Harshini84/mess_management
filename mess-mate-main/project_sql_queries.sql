DROP DATABASE mess_management;

CREATE
OR REPLACE DATABASE mess_management;

USE mess_management;

CREATE TABLE IF NOT EXISTS stu_info (
    student_id varchar(30) PRIMARY KEY,
    student_name varchar(30) NOT NULL,
    `password` varchar(30),
    date_of_birth date,
    email_id varchar(70) UNIQUE,
    room_no varchar(30)
);

CREATE TABLE IF NOT EXISTS mess_member (
    member_id varchar(30) PRIMARY KEY,
    member_name varchar(30),
    date_of_birth date,
    `password` varchar(30),
    email_id varchar(70) UNIQUE,
    phone_no int(11)
);

CREATE TABLE IF NOT EXISTS messmenu (
    meal_courses_offered varchar(200) PRIMARY KEY,
    cost int (11) NOT NULL,
    monday varchar(200),
    tuesday varchar(200),
    wednesday varchar(200),
    thursday varchar(200),
    friday varchar(200),
    saturday varchar(200),
    sunday varchar(200)
);

CREATE TABLE IF NOT EXISTS new_stock_details (
    item_name varchar(30),
    unit varchar(30),
    cost_per_unit decimal(10, 5),
    quantity_bought int(11),
    date date,
    PRIMARY KEY(item_name, date)
);

CREATE TABLE IF NOT EXISTS used_stock_details (
    item_name varchar(30),
    unit varchar(30),
    quantity_used int(11),
    quantity_left int (11),
    `date` date DEFAULT (curdate()),
    PRIMARY KEY(item_name, date)
);

CREATE TABLE IF NOT EXISTS Feedback (
    feedback_id int AUTO_INCREMENT PRIMARY KEY,
    student_id varchar(30) NOT NULL,
    `message` varchar(255) NOT NULL,
    rating int,
    `date` date DEFAULT (curdate())
);

-- INSERT INTO
--     stu_info (
--         student_id,
--         student_name,
--         `password`,
--         date_of_birth,
--         email_id,
--         room_no
--     )
-- VALUES
--     (
--         '170001013',
--         'ATCHE SRAVYA',
--         '1234',
--         '2000-03-03',
--         'atche@gmail.com',
--         '606'
--     ),
--     (
--         '170001014',
--         'RUSHYA',
--         '123',
--         '2000-06-10',
--         'rushya@gmail.com',
--         '604'
--     ),
--     (
--         '170002013',
--         'SHIRIDI',
--         '234',
--         '1999-07-17',
--         'shirdi@gmail.com',
--         '302'
--     ),
--     (
--         '170001015',
--         'SAMHIT',
--         '657',
--         '1999-11-12',
--         'samhit@gmail.com',
--         '235'
--     ),
--     (
--         '170001017',
--         'DINESH',
--         '286',
--         '2000-04-03',
--         'dinesh@gmail.com',
--         '245'
--     );

-- INSERT INTO
--     mess_member (
--         member_id,
--         member_name,
--         date_of_birth,
--         `password`,
--         email_id,
--         phone_no
--     )
-- VALUES
--     (
--         '100',
--         'karthik gurram',
--         '2000-03-06',
--         '108',
--         'karthik@gmail.com',
--         2
--     ),
--     (
--         '106',
--         'praveen sbhg',
--         '2000-04-06',
--         '109',
--         'praveen@gmail.com',
--         2
--     );

-- INSERT INTO
--     used_stock_details
-- VALUES
--     ('eggs', 'dozen', 10, 2, '2024-04-21'),
--     ('bananas', 'dozen', 15, 6, '2024-04-21');

-- INSERT INTO
--     new_stock_details
-- VALUES
--     ('eggs', 'dozen', 10, 2, '2024-04-21'),
--     ('bananas', 'dozen', 15, 6, '2024-04-21');

-- INSERT INTO
--     messmenu
-- VALUES
--     (
--         'breakfast',
--         40,
--         'poha,milk,bread,jalebi',
--         'vada,sambar,milk,bread',
--         'utappam,chutney,milk,bread',
--         'idli,sambar,milk,bread',
--         'upma,chutney,milk,bread',
--         'dosa,chutney,sambar,milk,bread',
--         'parata,dahi,milk,bread'
--     ),
--     (
--         'lunch',
--         50,
--         'rice,roti,rajma,',
--         'rice,roti,sev tamatar',
--         'rice,roti,paneer masala',
--         'rice,roti,aloo gobhi',
--         'rice,roti,bindi fry',
--         'rice,roti,chilli panner',
--         'rice,roti,dal'
--     ),
--     (
--         'high_tea',
--         30,
--         'samosa,coffee,tea,bread',
--         'maggie,coffee,tea,bread',
--         'pakoda,coffee,tea,bread',
--         'kachori,coffee,tea,bread',
--         'noodles,coffee,tea,bread',
--         'french fries,coffee,tea,bread',
--         'veg fingers,coffee,tea,bread'
--     ),
--     (
--         'dinner',
--         60,
--         'rice,roti,rajma,',
--         'rice,roti,sev tamatar',
--         'rice,roti,paneer masala',
--         'rice,roti,aloo gobhi',
--         'rice,roti,bindi fry',
--         'rice,roti,chilli panner',
--         'rice,roti,dal'
--     );