# connect-group-coding-test
Assessment to choose candidates for UAE Project from JIThpl

Branches are seperatly created for challenges
Checkout to required branch to access challenge data

Challenge 01 - `challenge_1`
Challenge 02 - `challenge_2`


## Challenge 01

### Given Task

Creat a migration to support the below structure

![Alt Text](.ref/challenge_1_img.jpg "Attendance Module")

Create an API endpoint to upload excel attendance and store data in the database.

Create an API endpoint to return attendance information of an employee with total working hours.

### Setup & Run Dev Environment

inside backend folder Run

```
composer install

npm install

php artisan migrate:fresh --seed

php artisan storage:link

php artisan serve

```

use a seperate terminal to setup frontend

```
npm install

npm start
```

#### **API Endpoint for upload attendance**

URL: `api/attendance/upload`   
Eg: `http://127.0.0.1:8000/api/attendance/upload`

API endpoint for uploading excel attendance accepts file with attribute `uploaded_file`.

#### **API Endpoint for attendance of employee**

URL: `api/attendance/employee/{employee_id}`  
Eg: `http://127.0.0.1:8000/api/attendance/employee/1`  

This will return attendance information on the given employee

#### **API Endpoint for all attendance information**  

URL: `api/attendance`  
Eg: `http://127.0.0.1:8000/api/attendance`  

This endpoint returns all the attendance information

#### **View for attendance information**  

URL: `attendance`
Eg: `http://127.0.0.1:3000/attendance`  


## Challenge 02

### Given Task

Given an array a[] of size N which contains elements from 0 to N-1, you need to find all the elements occuring more than once in the given array.  

Example:  

Input:  N = 5  a[] = { 2, 3, 1, 2, 3 };

Output: 2 3

Explanation: 2 and 3 occur more than once in the given array.


### Steps to execute

The `challenge_2/index.js` file is containing the necessary logic.

Run the file by

```
node challenge_2/index
```
