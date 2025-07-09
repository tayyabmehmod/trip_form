# 🎓 UOL CS Trip Registration Form

This project is a web-based **trip registration form** built using **PHP**, **MySQL**, **JavaScript**, and **SweetAlert2**. It allows university students to submit their personal and academic details for confirming participation in a university-organized trip.

---

## ✨ Features

- ✅ Clean HTML form with CSS styling
- ✅ Real-time **JavaScript validation** for input fields
- ✅ Stores form data in a **MySQL database**
- ✅ Shows a **SweetAlert2 popup** after successful submission
- ✅ Prevents resubmission on page refresh using **PHP sessions**
- ✅ Responsive and beginner-friendly code structure

---

## 🛠️ Technologies Used

- HTML5 & CSS3
- JavaScript (form validation)
- PHP (backend form handling)
- MySQL (data storage)
- SweetAlert2 (for success popup)


---

## 🔧 Database Setup

Create a MySQL database named `form` and run the following SQL to create the table:

```sql
CREATE TABLE trip (
    ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Email VARCHAR(100),
    Phone_number VARCHAR(15),
    Department VARCHAR(50),
    Semester VARCHAR(10),
    Section VARCHAR(10),
    Roll_number VARCHAR(50),
    Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


