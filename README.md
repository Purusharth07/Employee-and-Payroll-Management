# Employee and Payroll Management System
An easy to use Employee Management System Website which help Administrator to manage and keep track of Employees. It also has inbuilt Payroll Management System which is used to calculate the net salary of an Employees.

# SYSTEM DESIGN:


# ADMIN END:

At any time in any page, the admin can log out by clicking the link in top corner that will prompt a modal for the same.
1.	ADMIN LOGIN:

The default username and password exists for admin to log in. It is implemented using HTML and CSS. The routes and authentication have been done by PHP and MYSQL.

2.	EMPLOYEE HOME:

This page displays the list of employees and their details like name, department and employee type along with their action which is viewing their account and deleting it. This page also contains a modal that adds a new employee with a complete validated form. Upon clicking a row in a home page, employee details can be changed (employee type, basic pay and department).Upon clicking account button, overtime and bonus for an employee can be added and updated. A search bar has been added for the ease of admin to search employee on the basis of name, gender, department or employee type. 

3.	DEDUCTIONS:

This page includes the deduction factors while calculating the net pay of an employee. I have included dearness allowance, house rent allowance, provident fund, travelling allowance, loans and employee leave rate. The rate of these factors can be updated by clicking on the update button which opens up a modal.

4.	INCOME:

This page includes the net pay of each employee. The table displays the basic pay, deductions, overtime, bonus and net pay of each employee. The container of this table contains two buttons mainly overtime rate and salary whose respective modals can change their rate. A search bar and a drop down for number of entries has been provided for easy navigation of admin. The total income is determined by the sum of basic pay, overtime and bonus and net deductions is determined by the sum of deduction factors and total number of leaves of an employee which have been approved by the admin. The difference of the two gives the net pay of the employee.
 
5.	LEAVE(S):

This page displays the leave details of all employees in the form of a table. It includes the unique leave ID which auto increments, leave reason, address, and leave type and a button for the admin to approve it. If already 20 days of leave are approved then admin cannot approve it further if already a leave application of employee exists prior to approval of leave of 20th day. Upon the action of button the leave status changes from ‘pending’ to ‘approved’ in employee end. A search bar is provided along with a drop down for number of entries per page.


# EMPLOYEE END:

At any time in any page, the employee can end its session by clicking on its username which will prompt a modal for log out.
1.	EMPLOYEE LOGIN:

An employee can login by using their username and password provided by the admin at the time of adding an employee. The routes and authentication have been done using PHP and MYSQL

2.	EMPLOYEE:

This page displays the details of the employee in form of a table. It has been developed using Bootstrap and queries have been executed by using PHP and MYSQL. Upon clicking on any employee information, Employee can update his basic details like contact, email address, home address, city and zip.

3.	LEAVE(S):

This page displays the leave history of the employee. Employee can also apply for the leave. By default I have set the limit to maximum 20 days for leave per employee.Employee is not eligible for applying leave once all the leaves of 20 days have been approved, nor the admin will be able to approve a leave if a leave has been applied by the employee prior to the approval of leave of 20th day.On application at Employee end the ‘pending’ status will appear untill the Admin through admin login approves it(leave).
 

4.	INCOME:

The employee can view his salary details in form of table which includes the basic pay, name, deduction, overtime, bonus and net pay.This feature will help in providing transperancy in terms of salary as Employee will be able to see clear and detailed information.
