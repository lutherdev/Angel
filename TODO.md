
# FRONTEND -- PAGINATION IS A MUST! // RESPONSIVE!

# ACCOUNTS FOR VIEWS
- Personnel = lut - Lut3 /// CJ
- Associate = ford - ford3 /// PING
- god = god - god // LUTHER KIRK

## NAVBAR
-- fix javascript, highlight button based on url

## DASHBOARD PERSONNEL (CJ)
### USERS MANAGE TODO: 
- homepage/dashboard - table view ng equipments, users = add, view, update, remove (forms/buttons)
- users - change pass, activate account, deact account 
--- then ung view page ng change pass and new password field, 
--- tsaka view page ng activate, deactivate parang form nalang siguro, input sinong user then pili either activate or deactivate, confirm with password

### EQUIPMENT MANAGE  TODO: 
- equipments - add item, activate/deact item
--- view form ng add item (meron na ata), so activate and deact 
- logout

# views needed
1. update dashboard - table for both users and equipment
2. users page - button for change pass, activate/deact
-- view page form for activate, deact and change pass
3. equipment page - button for add item, activate/deact
-- view page form for add and activate/deact

======================================================================================================================

## DASHBOARD ASSOCIATES (PING) TODO:
- homepage/dashboard - table view ng reservations, borrowers = add, view, update, remove (forms/buttons)
- borrow - add equipment id field
- return - 
- reservation - tanggalin valid until sa form

# views needed
1. dashboard - add table view for borrowers
2. borrow - add equipment id field
3. reservation - tangallin valid until sa form


# BACKEND ===================================================================
1. Auth - luther - login, register, logout
2. Users - luther - create, update, read, delete, activate, deactivate
8. PasswordController - luther - forgot, reset, update

3. Equipments - Luther/Kirk - create, update, read, delete

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