-- DATABASED PHP PROJECT HAVING LOGIN SYSTEM --

Database:
	- It has four tables:
		-users - (user_id [auto increment PK], username [unique- not nul], password [not nul])
		-teachers - (teacher_id [auto increment PK], name [not nul])
		-subjects - (subject_id [auto increment PK], name [not nul], teacher_id [FK])
		-students - (student_id [auto increment PK], name [not nul])

Login Page:
	- You can log in as either student or teacher.
	- Both username & password for teacher is "teacher".
	- Both username & password for student is "student".

Teacher_Dashboard Page:
	- Teachers can add, update & delete students.
	- Teachers can update subject names.
	- Log out
	
Student_dashboard Page:
	- Students can view teachers list, subjects list & students(classmates) list.
	- Log out
	
Log out Page:
	- Developer name
	- Return to login page.
