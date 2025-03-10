Prerequisites
step 1:
Install XAMPP or WAMP : Ensure you have a local server environment like XAMPP or WAMP installed on your machine.
Start Apache and MySQL : Open the XAMPP/WAMP control panel and start Apache and MySQL.
PHPMyAdmin : Open your browser and go to http://127.0.0.1/phpmyadmin/.

Step 2:
Set Up the Database
Open PHPMyAdmin (http://127.0.0.1/phpmyadmin/).
Click "New" and create a database named farm.
Then import the farm.sql file into your database
step 3:
Set Up the Project Files
Download/Copy the project files to your server directory:
If using XAMPP: Place the project folder inside C:\xampp\htdocs\
If using WAMP: Place the project folder inside C:\wamp64\www\
Ensure the project folder name is farm.
step 4:
Open your browser and go to
http://localhost/farm/
or http://127.0.0.1/farm/

use these for login
########
Admin:
username: admin
Password: 1234
############
User:
username:ismael
Password: 12345

## Goal-Question-Metrics analysis
Admin's perspective
 Goal- Improve Admin Efficiency
  Question- How quickly can the admin add a new  product?  
    Metrics-Time to add a product (seconds)  
  Question-How efficient is order confirmation?  
    metrics-Time to confirm orders (seconds)

Customer's perspective
 Goal-Improve customer Experience
   Question-how easy is it to create and account
     Metric-Account creation time (seconds)
  Question-Are users satisfied with the booking process?  
     metrics-User satisfaction score (1-5) 
Business perspective 
Goal-Increase Sales and Customer Retention
  Qusetion-How many new users are signing up?
     metrics-Number of new user registrations per month
  Question-How many orders are placed daily?
     metrics-Number of orders per day
  Question-How many users return to book again?
 Metrics-number of customers with more than 2 oders but on different days


User Engagement Metrics

  Login Count per User:
    What It Tracks: Each time a user logs in, the function trackUserLogin($userId) logs the event into a user_activity table (with an activity type of 'login').
    How It's Reported: The function getUserEngagementReport() aggregates these login entries to show the total number of logins per user.

Booking System Metrics

  Booking Status Distribution:
    What It Tracks: Every booking made is recorded using the function trackBooking($userId, $productId, $status), which logs the booking with its current status (e.g., 'pending', 'confirmed', or 'cancelled').
    How It's Reported: The function getBookingMetrics() groups and counts the booking records by their status, providing a breakdown of how many bookings are pending, confirmed, or cancelled.