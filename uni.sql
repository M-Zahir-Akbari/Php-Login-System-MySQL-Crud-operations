Drop database if exists uni;

CREATE DATABASE uni;

USE uni;

CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO Users (username, password) VALUES ('teacher', '$2y$10$jl6k6hlmV/2ehDYLwUjLSeVuOh1IzV56ODGJxFulViPOqNkqlYdLO');
INSERT INTO Users (username, password) VALUES ('student', '$2y$10$KosYMixc7GQOBJ3Fdh.7EONP9inazVsBp6wP9JACp5NHozsIcMVW6');

CREATE TABLE Teachers (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_name VARCHAR(50) NOT NULL
);

CREATE TABLE Subjects (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(50) NOT NULL,
    teacher_id INT NOT NULL,
    FOREIGN KEY (teacher_id) REFERENCES Teachers(teacher_id)
);

CREATE TABLE Students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL
);

INSERT INTO teachers VALUES (1, "Dr. Hassan Adelyar");
INSERT INTO teachers VALUES ('', "Pohanyar Ahmad Roheed Khaliqyar");
INSERT INTO teachers VALUES ('', "Pohanyar Najmuddin Sadat");
INSERT INTO teachers VALUES ('', "Pohanyar M. Saleem Hamdard");
INSERT INTO teachers VALUES ('', "Akbar Fayez");

INSERT INTO students VALUES ('1', "Abdul Musawer Dinzad");
INSERT INTO students VALUES ('', "Ajmal Zaland");
INSERT INTO students VALUES ('', "Ali Baba Hussaini");
INSERT INTO students VALUES ('', "Ansarullah Quraishi");
INSERT INTO students VALUES ('', "Basir Ahmad Yasin");
INSERT INTO students VALUES ('', "Elias Salimi");
INSERT INTO students VALUES ('', "Farshid Rahman");
INSERT INTO students VALUES ('', "Ghulam Reza Mirzaei");
INSERT INTO students VALUES ('', "Hafizullah Rasa");
INSERT INTO students VALUES ('', "Junaidullah Burhan");
INSERT INTO students VALUES ('', "Khan M. Hasani");
INSERT INTO students VALUES ('', "Lutfullah Ziaei");
INSERT INTO students VALUES ('', "M. Anwar Hussaini");
INSERT INTO students VALUES ('', "M. Asif Shamal");
INSERT INTO students VALUES ('', "M. Daud Moradi");
INSERT INTO students VALUES ('', "M. Hussain Sarwari");
INSERT INTO students VALUES ('', "M. jafar Saberi");
INSERT INTO students VALUES ('', "M. Jalal Ahmadi");
INSERT INTO students VALUES ('', "M. Saber Oyghan");
INSERT INTO students VALUES ('', "M. Zahir Baran");
INSERT INTO students VALUES ('', "Mahram Hussain Nazari");
INSERT INTO students VALUES ('', "Masihullah Mohammadi");
INSERT INTO students VALUES ('', "Nasrullah Yousufi");
INSERT INTO students VALUES ('', "Qurban Ali Safari");
INSERT INTO students VALUES ('', "Rafiullah Rahimi");
INSERT INTO students VALUES ('', "Samiullah Wardak");
INSERT INTO students VALUES ('', "Shahabuddin Safai");
INSERT INTO students VALUES ('', "Solaiman Payendah");
INSERT INTO students VALUES ('', "Zabihullah Noori");
INSERT INTO students VALUES ('', "Zahed Yasin");
INSERT INTO students VALUES ('', "Zekrullah Nazari");

INSERT INTO subjects VALUES (1, "Algorithm Design & Analysis", 1);
INSERT INTO subjects VALUES ('', "Mobile Programming", 2);
INSERT INTO subjects VALUES ('', "Web Development 2", 2);
INSERT INTO subjects VALUES ('', "Cloud Application & Development", 3);
INSERT INTO subjects VALUES ('', "Machine Learning", 4);
INSERT INTO subjects VALUES ('', "Islamic Studies 9", 5);