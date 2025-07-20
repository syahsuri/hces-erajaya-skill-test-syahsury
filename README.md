# 📊 Employee Dashboard – Erajaya Technical Test

This repository contains the completed solution for the **Erajaya Group Technical Test**. The project is a web-based dashboard built using **Laravel 8** and **MySQL**, which displays employee data per period using interactive charts and dynamic filtering.

---

## ✅ Summary

I have completed all tasks as outlined in the test instructions, including:

- Displaying a chart (bar chart) to show **number of employees per period**
- Enabling dynamic filtering by:
  - Company
  - Division
  - Level
  - Gender  
- Implementing **filter combinations** (e.g., Company + Level)
- Using **AJAX (Fetch API)** to update the chart without page reload
- Using provided **dummy data**, migrations, and seeders

All functionalities were built as requested using Laravel 8 and are fully functional and test-ready.

---

## 📌 Goals

- Develop a dashboard with charts (bar, pie, etc.) showing the **number of employees per period**
- Allow filtering by:
  - Company  
  - Division  
  - Level  
  - Gender  
- Filters can be combined. For example, selecting both Company and Level will return employee data that matches **both** criteria.
- The chart data should update based on selected filters using **AJAX or API call**

---

## 🛠 Tech Stack

- Laravel 8 
- MySQL
- Chart.js
- Bootstrap 5
- Vanilla JavaScript (Fetch API)

---

## 🚀 Setup Instructions

1. **Clone the starter repository**:

   ```bash
   git clone https://github.com/syahsuri/hces-erajaya-skill-test-syahsury
   cd hces-erajaya-skill-test-syahsury

   ```

2. **Install dependencies**:

   ```bash
   composer install
   ```

3. **Setup environment**:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Run migrations and seed data**:

   ```bash
   php artisan migrate
   php artisan db:seed
   ```

5. **Start the server**:

   ```bash
   php artisan serve
   ```

---

## 📈 Features

- Summary Cards: Total Employees, Companies, Divisions, Levels
- Interactive Bar Chart showing Employee count per period
- Dynamic filters (company, division, level, gender)
- Realtime data updates using Fetch API (AJAX)
- Data pulled from seeded test data

---

## 📤 Submission Guide (as requested)

- ✅ Repository has been made **public**
