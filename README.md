# connect-group-coding-test
Assessment to choose candidates for UAE Project from JIThpl


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

