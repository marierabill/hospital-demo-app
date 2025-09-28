# Hospital Demo App 🏥

A mock **hospital management web app** built with **CodeIgniter (HMVC)**.  
Designed for demonstration & learning purposes.

## Features
- 👨‍⚕️ Patient Management (CRUD)
- 📅 Appointment Scheduling
- 📊 Reporting Dashboard
- 🧪 Lab Integration (Mock API)

## Setup
1. Clone repo  
2. Import `database/migrations.sql`  
3. Configure DB in `application/config/database.php`  
4. Run via `php spark serve` or Apache/Nginx  

## Example Lab API Response
```json
{
  "patient_id": 1,
  "lab_tests": [
    {"test": "Blood Sugar", "result": "Normal"},
    {"test": "Malaria", "result": "Negative"}
  ]
}
