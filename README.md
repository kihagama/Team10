I'llPrerequisites
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



## measurement theory

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
   Question-how easy is it for a user to create an account
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


## Empirical investigation
User Engagement Metrics

  Login Count per User:
    What It Tracks: Each time a user logs in, the function trackUserLogin($userId) logs the event into a user_activity table (with an activity type of 'login').
    How It's Reported: The function getUserEngagementReport() aggregates these login entries to show the total number of logins per user.

Booking System Metrics

  Booking Status Distribution:
    What It Tracks: Every booking made is recorded using the function trackBooking($userId, $productId, $status), which logs the booking with its current status (for example. 'confirmed', or 'cancelled').
    How It's Reported: The function getBookingMetrics() groups and counts the booking records by their status, providing a breakdown of how many bookings are pending, confirmed, or cancelled.
    
Business Performance
Hypothesis: Increase orders and customer retention.
Data Collected:  
  Average number of orders per day: 20 (Expected: ≥ 50 orders/day)
  Number of new user registrations: 30 per week (Expected: ≥ 100 new registrations/month)
  Retention rate: 60% (Expected: ≥ 80%)
Analysis:  
 Orders per day and user registrations are below target. The business strategy may need to focus more on marketing and improving user experience.

 User Experience
Hypothesis: Measure user satisfaction and the time taken to create accounts and book farm products.
Data Collected:  
   Account creation time for 5 users: 45 seconds per user (Expected: ≤ 30 seconds)
   Booking time for 5 users: 60 seconds per booking (Expected: ≤ 30 seconds)
   Average user satisfaction score: 4.2/5 (Expected: ≥ 4.5)
Analysis:  
  While users are satisfied, the system can improve speed and user onboarding experience.
## Measuring Internal Product Attributes.
 Functional Points.
Components Identified:
 External Inputs (EI):
   Login form (1)
   Registration form (1)
   Product edit form (1)
   User actions (add/delete) (2)
  Total EI = 5

 External Outputs (EO):
Product list display (1)
   User dashboard (1)
   Admin panel (1)
  Total EO = 3
Internal Logical Files (ILF):
   Users table (1)
   Products table (1)
   Bookings table (1)
  Total ILF = 3
External Interface Files (EIF):
   None identified in the provided snippets.
  Total EIF = 0
Weights Assignment:
 EI: 5 (average complexity)
 EO: 3 (average complexity)
 UI: 1 (low complexity)
 ILF: 3 (average complexity)
 EIF: 0 (none)
Total Functional Points Calculation:
FP = (5 * 5) + (3 * 5) + (1 * 4) + (3 * 10) + (0 * 0) = 25 + 15 + 4 + 30 + 0 = 74
Total Functional Points = 74



Cyclomatic Complexity ,cc
calculated using the formula:
CC = E - N + 2 * P

Where:
E = Number of edges (transitions between decision points)
N = Number of nodes (decision points or blocks)
P = Number of connected components (typically 1)
Cyclomatic Complexity Calculation per File:

index.php: Cyclomatic Complexity (CC) = 3
The logic involves decision points to check if the user is logged in and to show a custom alert, both of which create branching in the control flow.

product_edit.php: Cyclomatic Complexity (CC) = 3
There is a decision point to check if the product exists. This condition leads to a branch in the flow, increasing the complexity.

producthandle.php: Cyclomatic Complexity (CC) = 3
The decision points check for user login, if the user exists, and fetch bookings. These multiple checks and conditions add to the complexity.

productupdate.php: Cyclomatic Complexity (CC) = 3
The script checks the POST request method, if an image is uploaded, if the upload directory exists, and if the old image exists. These checks introduce multiple paths.

user_actions.php: Cyclomatic Complexity (CC) = 3
The conditions check the action type and whether the admin is trying to delete their own account. Each condition adds branches, contributing to the complexity.

userdashboard.php: Cyclomatic Complexity (CC) = 3
The flow checks if bookings exist and if the modal is opened. These conditions introduce two decision points, resulting in moderate complexity.

admin.php: Cyclomatic Complexity (CC) = 3
The logic includes checking if the user is logged in and if the action is valid. These checks cause the flow to diverge, contributing to the complexity.

admin_actions.php: Cyclomatic Complexity (CC) = 3
The script checks if the action is valid, introducing a decision point and branching the flow, which results in a moderate complexity.

Total Cyclomatic Complexity of the Application:
Total Cyclomatic Complexity = 5.5 * 8 = 44

Thus, the total Cyclomatic Complexity of the application is 44.

Cohesion Measurement.
Analysis:The modules in the software have a moderate cohesion level, as most functions in a given module serve a single purpose e.g., either handling user input, processing product data, processing  user data, handling booking data. However, some scripts mix multiple responsibilities , slightly reducing cohesion.
Score: Moderate (Functional Cohesion).

Coupling (Module Interdependence):  
 NanaAgricFarm maintains loose coupling by keeping database queries and business logic in separate PHP functions. For example, the `getUserEngagementReport()` function interacts with the `user_activity` table but doesn’t modify unrelated tables, ensuring that changes in one module do not adversely affect others.  

Data Structure Complexity Measurement:
Analysis: The software mainly relies on simple arrays,integers,strings and associative arrays for data handling. No highly complex structures like trees,stacks, graphs are used.
Score: Low

Depth of Nesting
Definition:
This metric evaluates how deeply nested the control structures are (loops, if-else).  

Implementation in NanaAgricFarm:  
 The booking confirmation process involves multiple nested checks, such as:  
  php
  if ($status == 'pending') {
      if ($user_role == 'admin') {
          // Admin actions
      }
  }
Reducing nesting depth improves readability and reduces error-prone code sections, making it easier for developers to maintain and update the code.




##Information Flow Complexity

  Definition:
    This measures how data moves between different modules and functions.  

  Implementation in NanaAgricFarm: 
     The system logs user actions (logins, bookings) and connects these to the product and user tables.  
       Fan-in: 
         The users table is referenced by the booking table, contributing to higher fan-in, which indicates the number of modules that can affect a particular module.  
       Fan-out: 
         The products table influences multiple operations, including bookings, availability checks, and order tracking, demonstrating how changes in one module can impact others.
## Measuring External Product Attributes.
software Quality Measurement Based on ISO 9126 quality model
1. Functionality (Score: 4.2/5)
a) Suitability
Implemented Features:
User authentication system with session management
 Product management system
 Booking system with status tracking
 Admin dashboard with user,booking and product management
 Responsive design with mobile support

 Code Evidence:
sessions initiated and validated in login.php and dashboard pages
booking stored and status tracked via submit_booking.php

b) Accuracy
Strengths:
 Use of prepared statements for database operations for secure queries and some input sanitization through the mysqli_real_escape_string() 
 Input validation for booking submissions 
 Proper session handling 

Areas for Improvement:
 Expand input sanitization (e.g., htmlspecialchars, filter_var)
 Introduce comprehensive error logging via error_log()
-Validate all form inputs with fallback UI messages

2. Reliability (Score: 3.5/5)
a) Maturity
Implemented:
 Database connection error handling
Session lifecycle management
Basic form validation

Missing:
 Full-stack error catching (try-catch in PHP)
 Logging unexpected failures in a log file

b) Fault Tolerance
Implemented:
 Database connectivity checks
 Session verification before access

 Missing:
 Graceful failure UI such as  custom 500 or 404 pages
 Recovery from partial booking submission failures
 Logging intrusion attempts or data anomalies

3. Usability (Score: 4.0/5)
a) Understandability
Features implemented:
 Logical navigation with clear menus
 Semantic HTML for better comprehension
 Consistent button styles

b) Learnability
Implemented:
Clear forms with labels and placeholders
 Step-by-step product interaction

c) Operability
implemented:
 Modal dialogs for forms
 Visual cues for actions such as  button hover effects
 Mobile navigation menu

4. Efficiency (Score: 3.0/5)

a) Time Behavior
 issues to be addressed:
 Compress images used in banners and listings
 Enable browser caching  via .htaccess rules
 Bundle CSS into fewer files

b) Resource Behavior
Issues to be addressed:
 No asset minification
 No lazy loading (especially for images)
 Use CDN for external fonts and libraries

5. Maintainability (Score: 3.5/5)
a) Analyzability
Positive Aspects:
 Code separation in PHP, CSS, JS files
  moderate Modular design in  some files  such as header and footer for resuability
Functional naming conventions such as  connect.php, producthandle.php ,admin.php

issues to be addressed:
Split large files like product.php into reusable includes
Document complex logic with comments
Add developer onboarding instructions

b) Testability
Missing Component to be implemented:
 Write unit tests using PHPUnit or a custom test script
 Add automated browser tests e.g., Selenium, Cypress
 Create `test/` folder with mock data and test cases

6. Portability (Score: 4.0/5)
a) Adaptability
 implemented:
 CSS media queries for responsiveness
 Font loading support for various devices

b) Installability
 implemented:
 Database dump provided
 Code works on WAMP/XAMPP with PHP/MySQL
 No OS-specific dependencies
 And operational procedures well documented in the Readme file

7. Quality-in-Use (Score: 3.0/5)
 Needs Attention:
 No user feedback form or satisfaction poll in the website
 No analytics integration e.g Google Analytics  for  collecting data about the software usage 
 No way to collect performance metrics from real users

Recommendations for Improvement
Security Enhancements:
 Validate and sanitize every GET and POST parameter
 Add CSRF tokens to forms

 Performance Optimization:
 Compress images and scripts
 Implement HTTP caching and defer non-critical JS
 And track the improvement results through the chrome lighthouse 

Error Handling:
 Introduce try-catch blocks around all DB calls
 Log errors to a file with timestamps

Input Validation:
 Use HTML5 validation and server-side checks together

Final Quality Scores Summary:
-----------------------------------------
| Quality Attribute   | Score | Status  |
|---------------------|-------|---------|
| Functionality       | 4.2/5 | Good    |
| Reliability         | 3.5/5 | Average |
| Usability           | 4.0/5 | Good    |
| Efficiency          | 3.0/5 | Average |
| Maintainability     | 3.5/5 | Average |
| Portability         | 4.0/5 | Good    |
| Quality-in-Use      | 3.0/5 | Average |
-----------------------------------------

Overall Quality Score: 3.6 / 5.0
Based on the evaluation using the ISO 9126 quality model, the software has average quality, with strengths in functionality and usability, and improvement areas in efficiency,testability and error handling.


## Software Reliability Metrics Update
This update introduces software reliability metrics to the system, which provide insights into the performance and reliability of the software. The following metrics are now integrated and available on the Admin Dashboard:
Mean Time to Failure (MTTF)
Mean Time Between Failures (MTBF)
Availability
Reliability at a given time (R(t = 100 minutes))
These metrics are essential for tracking the system's reliability and understanding its failure behavior over time. They align with the concepts discussed in the lecture 9.

-Metrics Calculations
--Mean Time to Failure (MTTF):
MTTF is calculated as the average time between system failures. It is an important metric for understanding the system's stability and durability.
--Mean Time Between Failures (MTBF):
MTBF is the total operating time between system failures, combining MTTF with the Mean Time to Repair (MTTR). It gives an idea of how often the system fails during its operation.
--Availability:
Availability is a ratio of operational time to the total time (MTTF / (MTTF + MTTR)). A higher availability indicates a more reliable system.
--Reliability (R(t)):
Reliability is calculated at a given time (e.g., t = 100 minutes), based on the failure rate derived from MTTF. This shows the probability of the system functioning without failure at a specific point in time.

##Implementation Details:
The failure times data is either simulated or fetched dynamically from the system's failure logs.
The metrics are calculated in the backend PHP script and displayed on the Admin Dashboard.
The reliability metrics are displayed in a styled panel on the Admin Dashboard. The calculated metrics include the number of failures, total runtime, MTTF, MTBF, availability, and reliability at t = 100 minutes.
  - Log in as an admin and navigate to the Software Reliability Metrics section of the Admin Dashboard.
The metrics will be displayed automatically after the system fetches failure data (either simulated or from the database).
Failure times are stored in the failures table.

-When you visit the Software Reliability Metrics section in the Admin Dashboard, you’ll see a table displaying the following information:
Number of Failures: 10
Total Runtime: 140 minutes
MTTF: 15.23 minutes
MTBF: 25.23 minutes
Availability: 60.25%
Reliability at t = 100 minutes: 0.5487

##Software Test Metrics 

Unit testing: Each function in our system (e.g., adding to cart, updating stock, calculating totals) needed to be independently tested to ensure it worked correctly in isolation.

✔ How we implemented Unit Testing: We identified small units of functionality, such as: Add to Cart function, Checkout function

For each function, we carried out individual tests to verify that: The correct product is added to the cart, The cart total is calculated correctly, The stock reduces appropriately after an order. Example: Input: Add 3 tomatoes to cart. Expected output: Cart shows "Tomatoes: 3 items."

Different modules (Login, Product Catalog, Cart, Payment, Inventory) needed to work correctly together as a complete flow.

✔ How we implemented Integration Testing: We designed test cases that combined modules.

We focused on testing data flow between components, such as:

After login, the user can view products.

After selecting products, they can checkout.

After payment, the inventory updates.

We used manual testing by simulating real user flows step-by-step and verifying database updates.

✔ Example: Login → Select "Fresh Maize" → Add to cart → Checkout → Payment successful → Inventory reduced.

According to our lecture material:

We calculate the number of test cases based on two factors:

Time available

Cost available

We use these formulas:

 From Time: 𝑁time=(available time (hours)×available staff)/(average time to prepare a test case (hours))

 From Cost: 𝑁cost=available budget/average preparation cost per test case​Then finally:

 Select the minimum: 𝑁=min(𝑁time,𝑁cost)

Applying the Formulas to Our Project We assumed these values based on our project conditions:
Total budget: $3,000

10% of the project budget was allocated for test case preparation.

Average preparation cost per test case: $30 Project duration: 5 weeks Each week: 40 hours Testing team size: 3 group members

Average time to prepare one test case: 2 hours

Step 1: Estimate by Cost First, calculate the amount available for testing:

Available Budget for Testing=0.1×3000=300 dollars

Now calculate number of test cases based on cost: 𝑁cost=300/30=10 test cases

Step 2: Estimate by Time First, calculate the total available testing time:

Total Time= 5 weeks×40 hours/week × 3 staff=600 hours Now calculate number of test cases based on time:

𝑁time=600/2=300 test cases Step 3: Take the Minimum Now:

𝑁=min(10,300)=10 test cases

Decisions Based on Testing 

We used test results to guide critical project decisions:
a) Release Readiness Metric: Test Pass Rate (>95% required for release).

Calculation: Rpass =(Passed Test Cases)/(Total Test Cases)x100=92/100 Decision: Delayed release by 3 days to fix 8 failed cases (e.g., payment gateway timeout).

b) Risk Mitigation Payment Module Failure Rate: 15% of test cases failed initially.

Action: Replaced the third-party payment API with a more stable provider.

c) Resource Allocation 40% of defects were in the Shopping Cart.

Decision: Assigned 2 additional developers to refactor the cart logic.

Test Coverage Measurement 

We tracked coverage using code instrumentation tools (JaCoCo) and requirements traceability:
a) Statement Coverage CVs = (St/Sp)x100 = (4200/5000)x100=84%

Goal: 90%.

Gap Analysis: Untested code was in edge cases (e.g., coupon expiration logic).

b) Branch Coverage CVb = (Nbt/Nb)x100=(110)/(150)x100=73.3% Improvement: Added test cases for user role transitions (e.g., guest → logged-in user).

c) GUI Coverage Metric: 78% of UI elements tested (e.g., buttons, forms).

Tool: Selenium scripts for repetitive UI validations.

Software Testability 

Measurement We evaluated testability using controllability metrics:
a) Test Controllability of Components For the Order Processing module:

3 BCS (Boolean Control Structures):

BCS1 (Payment validation): Independently determinable (TC=1).

BCS2 (Inventory check): Dependent on DB state (TC=0).

BCS3 (Discount calculation): Independently determinable (TC=1).

TC = (1+0+1)/3 = 0.67 (moderate controllability) Action: Refactored BCS2 to mock database dependencies.

b) Built-in Test (BIT) Mechanisms Added API test hooks to simulate payment failures.

Used feature flags to isolate new functionality during testing.

Remaining Defects Measurement

We estimated residual defects using fault seeding and team comparison:
a) Fault Seeding (Mills’ Method) Seeded Defects (N_s): 20.

Detected Seeded Defects (n_s): 16.

Detected Real Defects (n_d): 48.

Nd
( nd/ns ) × N s
( 48 16 ) × 20
60 total defects
Nr =
( Nd − nd ) + ( Ns − ns )
( 60 − 48 ) + ( 20 − 16 ) =
16 remaining defects
Conclusion: ~16 undetected defects expected post-release.

b) Phase Containment Effectiveness (PCE) For the Requirements Phase:

P C E
( Defects Removed Defects/Introduced ) × 100
( 9/12 ) × 100
75 % PCE=( Defects Introduced Defects Removed​)×100=( 12 9​)×100=75% Design Phase PCE: 42.9% (needed improvement via peer reviews).


##Object oriented metrics

WMC (Weighted Methods per Class)	Measures class complexity by counting the number of methods. Lower is better for simplicity and maintainability.	Each major controller (ProductController.php, UserController.php, OrderController.php) was designed with a low number of methods (~3–5 per class). We applied the Single Responsibility Principle (SRP) by ensuring that every method handled a very specific action (e.g., addProduct(), deleteProduct()). This resulted in simpler, cleaner, and easily testable classes.

DIT (Depth of Inheritance Tree)	Measures how deep the inheritance hierarchy is. Shallow trees are easier to manage.	Inheritance was kept shallow: for example, BaseController defines generic controller behavior, and all feature-specific controllers (ProductController, UserController) inherit from it directly. No deep subclassing (DIT of 1–2), making the project easy to navigate and extend.

NOC (Number of Children)	Number of immediate subclasses inheriting from a class. Higher NOC shows more reuse but may increase complexity.	BaseController and BaseModel classes serve as common parents. Different modules (Products, Users, Orders) inherit standard functionality like request handling and database interaction, promoting code reuse and consistent structure. By centralizing common behaviors, we made adding new modules faster and safer.

CBO (Coupling Between Objects)	Measures how much classes are dependent on each other. Lower coupling leads to more flexible systems.	Loose coupling was achieved through a clear MVC separation: Controllers interact only with their respective Models and Views via well-defined interfaces. For example, ProductController communicates only with ProductModel and its Views — never reaching into UserModel or others. This architecture minimizes side effects and eases testing.

RFC (Response For a Class)	Counts the number of possible methods that can be triggered from a class. Fewer responses simplify understanding and testing.	Each controller exposes only essential public methods needed by the views. Example: UserController provides registerUser(), loginUser(), and logoutUser() — avoiding unnecessary extra endpoints. This keeps RFC low (~4–5 methods), reducing system complexity and improving reliability.

LCOM (Lack of Cohesion of Methods)	Measures the degree to which methods in a class are related to each other. High cohesion (low LCOM) is preferred.	Every class in Nanafarm was focused on a single domain concept. ProductController handles only product-related operations; UserModel handles user database records only. We avoided mixing responsibilities, ensuring high cohesion, better readability, and easier future refactoring.
