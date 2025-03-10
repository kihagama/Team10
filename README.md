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



## MEASUREMENT THEORY

User Behavior Metrics:
  The system gives the user a display of all products in the market, from which the user selects one of their choice to place an order
  The system allows one user to make one order at a time

Lines of code(LOC)
  userdashboard.php              (214 loc)
  updateProfileHandler.php       (62 loc)
  submit_booking.php              (40 loc)
  register.php                     (31 l0c)
  productupdate.php                (42 loc)
  producthandle.php                 (46 loc)
  product_edit.php                (84 loc)
  product_actions.php              (37 loc)
  product.php                      (304 loc)
  produc.css                      (477 loc)
  modal.css                      (160 loc)
  login.php                      (32 loc)
  index.php                      (172 loc)
  index.js                      (61 loc)
  index.css                      (409  loc)
  footer.php                    (41 loc)
  connect.php                    (15 loc)
  admin.php                      (193 loc)
  admin_actions.php              (29 loc)
  admin.js                    (10 loc)
  adm.css                    (166 loc)
  total lines of code,        214 + 62 + 40 + 31 + 42 + 46 + 84 + 37 + 304 + 477 + 160 + 32 + 172 + 61 + 409 + 41 + 15 + 193 + 29 + 10 + 166 
                              = (2523 loc)


defects 
| Defect Type                      | Count |
|----------------------------------|-------|
| SQL Injection Vulnerability      | 2     |
| Insecure Password Storage        | 1     |
| Error Handling                   | 3     |
| File Upload Vulnerability        | 1     |
| Cross-Site Scripting (XSS)       | 2     |
| Session Management               | 1     |
| Missing Input Validation         | 2     |
--------------------------------------------
| Total Defects                    | 12    |


Defect Density= 12/2523 ==4.756 defects per KLOC



## Lighthouse Audit Fixes (Date: 2025-02-15),
we have analyzed the  individual modules of the software using the software metrics of response time (performance) by the help of the lighthouse chrome developer tool and gotten an audit of average  response time being 1.7s thus performance being 67 out of 100.
The issue being caused by the following main delays
FontAwesome , external CSS and js  delayed file loading
Images  which are of large file sizes in ImagesAg folder in the project which take more rendering time


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
  Question-How many new users are signing up?
     metrics-Number of new user registrations per month
  Question-How many orders are placed daily?
     metrics-Number of orders per day
  Question-How many users return to book again?
 Metrics-number of customers with more than 2 oders but on different days


## EMPIRICAL INVESTIGATION
User Engagement Metrics

  Login Count per User:
    What It Tracks: Each time a user logs in, the function trackUserLogin($userId) logs the event into a user_activity table (with an activity type of 'login').
    How It's Reported: The function getUserEngagementReport() aggregates these login entries to show the total number of logins per user.

Booking System Metrics

  Booking Status Distribution:
    What It Tracks: Every booking made is recorded using the function trackBooking($userId, $productId, $status), which logs the booking with its current status (e.g., 'pending', 'confirmed', or 'cancelled').
    How It's Reported: The function getBookingMetrics() groups and counts the booking records by their status, providing a breakdown of how many bookings are pending, confirmed, or cancelled.
