# 🚕 Laravel Ride Booking API

This project is a **Laravel 10 based Ride Booking backend application** built as part of a Laravel Developer Assessment.
It provides REST APIs for a simple ride-booking flow used by a mobile app and a minimal **Blade-based Admin Panel** to view rides.

---

## 📌 Features

### Passenger APIs

* Create a ride request with pickup & destination coordinates
* Approve a driver who requested the ride
* Mark a ride as completed

### Driver APIs

* Update current latitude & longitude
* Fetch nearby pending ride requests
* Request / claim a ride
* Mark the ride as completed

### Ride Completion Logic

* A ride is marked **completed only when both passenger and driver confirm completion**

### Admin Panel (Blade)

* View all rides
* View ride details:

  * Passenger
  * Driver
  * Pickup & destination coordinates
  * Ride status
  * Timestamps

---

## 🛠 Tech Stack

* **Laravel 10**
* **MySQL**
* Blade Templates (Admin Panel)
* REST APIs (JSON responses)

---

## ⚙️ Installation Steps

### 1️⃣ Clone the Repository

```bash
git clone <your-github-repo-url>
cd ride-booking-api
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Update database credentials in `.env`:

```env
DB_DATABASE=ride_booking
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Create Database

Create a MySQL database named:

```
ride_booking
```

### 5️⃣ Run Migrations

```bash
php artisan migrate
```

### 6️⃣ Start the Server

```bash
php artisan serve
```

Application will run at:

```
http://127.0.0.1:8000
```

---

## 🔗 API Endpoints

### Passenger APIs

| Method | Endpoint                                    | Description    |
| ------ | ------------------------------------------- | -------------- |
| POST   | `/api/passenger/ride`                       | Create ride    |
| POST   | `/api/passenger/ride/{ride}/approve-driver` | Approve driver |
| POST   | `/api/passenger/ride/{ride}/complete`       | Complete ride  |

### Driver APIs

| Method | Endpoint                           | Description       |
| ------ | ---------------------------------- | ----------------- |
| POST   | `/api/driver/location`             | Update location   |
| GET    | `/api/driver/nearby-rides`         | Get pending rides |
| POST   | `/api/driver/ride/{ride}/request`  | Request ride      |
| POST   | `/api/driver/ride/{ride}/complete` | Complete ride     |

---

## 🖥 Admin Panel

Access Admin Panel at:

```
/
```

Features:

* View all rides
* View detailed ride information

---

## 🧠 Notes

* No authentication implemented (as per assessment requirement)
* APIs return JSON responses
* Blade templates used only for admin panel
* Logic-based restriction applied for ride flow

---

## 📬 Author

**Arnab Das**
Laravel Backend Developer

---
