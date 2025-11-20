
# FRONTEND -- PAGINATION IS A MUST! // RESPONSIVE!

# ACCOUNTS FOR VIEWS
- Personnel = lut - Lut3
- Associate = ford - ford3

## DASHBOARD PERSONNEL
### USERS MANAGE
- homepage/dashboard
- table of all rows in database
- add, view, update, remove (forms/buttons)

### EQUIPMENT MANAGE
- homepage/dashboard
- table of all rows in database
- add, view, update, remove (forms/buttons)

## DASHBOARD ASSOCIATES
### BORROW
-- forms
### RETURN
-- forms

# BACKEND ===================================================================
1. Auth - luther
2. Users - luther
3. Equipments - Luther
4. Borrow - CJ
5. Return - KIRK
6. Reservation - PING
7. Dashboard - Luther

## AUTH
### LOGIN / REGISTER / RESET PASS
1. Login
- post method form input user and password
- compare password with the fetched row using username
- try to implement session timer for login. auto logout
- if success = creates session, redirect again to dashboard
- dashboard will check the session role to put correct view 
- 
2. Register
- Post method form, input necessary details.
- form validation(config file) before inserting data to database.
- no creation of session
- redirect to dashboard again for login.

3. Reset pass (does this need database?)
- make use of email service, giving a time limited text for verifying to reset, 

## SESSIONS
1. Checking role for each dashboard / functionality?
2. 

## USER MANAGE
1. Add - need form validation, other details input
2. View -
3. Edit - 
4. Delete - 

## ITEM MANAGE
1. Add - - need form validation, other details input
2. View
3. Edit
4. Delete

## FORM VALIDATIONS
1. Signup
2. eqpAdd
3. 

## FILE UPLOAD
 - Must also have validation for correct file type and size. If your file upload is an image, a thumbnail must also be created.

## BORROWING / RETURNING / RESERVATION
-- CJ , KIRK , PING

# DATABASE - KIRK
=============================================================================
- users model
- equipments model
- borrow model
- reservation
- another borrow