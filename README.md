# KIT502 ASSIGNMENTS 2

### Important Rules for Group Assignment

- The assignment is group-based with 3 members from the same tutorial (No individual work is allowed).
- You need to register in a Group in MyLO in your first tutorial in week 2. (Registration will be available
  by Week 3 ONLY for late enrollment cases.)
- You will receive the individual mark based on the peer and self-evaluation for the assignments.
  Individual mark may vary from the group mark as peer and self-evaluation will be reflected on the
  mark. You **MUST** complete the peer and self-evaluation after the assignment submission if you have
  any issue with your group member **EVEN THOUGH** you have already informed or discussed the issue
  with the unit coordinator.

## Introduction

UTAS Computer Rental Services (UCR) provides computer rental service to staff and students in Hobart and
Launceston at University of Tasmania (UTAS). To provide the timely service, it has been decided to develop a
web site where staff and students can rent a computer on a short-term basis.

## How to use UCR Services

The services purely based on online services, any UTAS staff or student must register to the system first by
providing name, e-mail address, mobile phone number and password. All of information in the registration is
mandatory.

By registering to the system, each user will have an account set-up with a balance of 0 dollar. Users must
deposit funds into the account to rent a computer or any other devices like printer, portable keyboard, etc.
Payment for the rental service will come from a pre-paid account. Depositing fund to an account is similar to
the CAPS printing system.

When a customer searches for available computer or device, they can specify the computer brand. Customer
can rent the computer minimum 1 hour up to 5 hours maximum (30 minutes intervals can be added). Customer
must return the computer within the rental time otherwise the penalty applied.

Different privileges of users:

- Web manager (can do all),
- UCR staff (do some), or
- Customers (note: students get 10 % discount.)

## Our Client: UTAS Computer Rental services (UCR)


## Description of Assignment 2 ( 30 %)

## Homepage

For assignment 2 the login/logout section WILL need to authenticate a user and the search form is active (i.e.
database access IS required). The site now fully functional for assignment 2, so interaction with database as
well as the necessary interaction between the client and the server sides must work.

## Registration page

The registration page WILL need to store the registration data.

## Rental Page

It will display the list of computers stored in the database with their details.

When a user searches for available computers using the search form by specifying a computer brand, it displays
the list of computers with their availability (i.e. if you search for an Apple device, then it only displays the Apple
products with their availability. You might have used a similar system such as the booking of the meeting room
service in the UTAS library.).

The conditions are:

- Only logged in user can rent **(a) computer(s).**
- Customer can rent the computer on **_half an hour basis_** , but each loan period must NOT exceed 5 hours
  at one time. **_(e.g Customer can rent a PC for 1.5 or 2.5 hours, but she can’t rent only for 30 minutes)_**
- It will not allow a user to rent a computer more than their account balance can pay for.
- The total rental price is calculated based on 1) base rental price, 2) deposit, 3) insurance, 4) pending
  payment if any and 5) discount if any.
  o A customer must pay the deposit fee ($50). It will be returned to the customer when they
  return the computer without any damage.
  o The base rental price is calculated based on the number of hours (e.g. one hour rental price
  of computer A is $10 and a customer wants to rent for 3 hours. Then the base rental price is
  10 * 3 = 30). **_If a customer rented for 2.5 hours, you calculate it accordingly._**
  o Customers can add insurance ($10) in case there is a damage no additional charge applied. If
  not, - additional charge applied for minor damage (such as scratch) - $100 or major damage
  (such as broken computer) $500. **_The additional charge will be imposed by staff. So it will be_**
  **_reflected in the balance of each customer. No further action is required in the assignment._**
  o Students can have a 10% discount.

For assignment 2, the rental page needs to store submitted services and update a user’s account based upon
action/request. For example, the balance needs to update upon each request.


## Returning the Rental page

This page is only available to customer. It displays the list of the computer that a customer has rented but not
returned yet. The customer should update in the system whether they have returned the computer or not in
this page. Even though they return the computer, the deposit is still on holding until staff confirms the return.

## Manage Rental Page

This page is only available to staff and web manager.

- It provides the lists of all computers that have been rented to the customer with their status.
- Staff must confirm the return of the computer – if it is not confirmed, customers cannot get the deposit
  back.
- When staff confirms the return, staff should update whether there is any damage on the computer. In
  case of damage, staff should choose whether it is minor damage or major damage with a comment.

## User Account Page

This page can only be accessed while a user is logged in.

- Here a user can view their account balance and deposit more funds.
- For the customer, they can see the rental history.
- For assignment 2 the user account page WILL retrieve and update a user’s account details as required.

## Master Computer List Page

The master computer list page WILL need to modify the list of computers that will be available for selection by
customers. This page is only available to staff and web manager.

When a new computer is added in the list, the below information should be added (All fields are mandatory):

- The image of computer
- Computer manufacturers (Computer brand)
- Computer specification
  o Operating system
  o Display size
  o RAM
  o The number of USB port
  o HDMI port
- Rental price per hour

Staff can modify/edit any information of the computers.

Staff also can remove the computer in the list.

## User Management Page

This page is only available to staff and web manager.


- The staff can
  o See the ‘black customer list’. If the customer damages the rented computer more than 3
  times, they are listed in the blacklist.
  o See all the list of customers
- The web manager can
  o See all the list of staff / customer
  o Add or remove staff
  o Remove the customer from the blacklist

## Manager Dashboard

This page is only available to web manager.

In this page, it provides the overview of the services which includes below information:

- The total number of users in the system with the categorization of customer (staff / student), UCR staff
- The total number of users who are listed as blacklist
- The total number of computers in the systems
- A summary of current rental status (e.g. how many computers have not returned yet)

## Due Date

Assignment 2: Week 1 3 Friday 11:58pm (30%) May 27, 2022
Week 14 Self and Peer assessment (Assignment 2 Group Evaluation)

## Submission Method

Submission will be via MyLO. You will submit a .zip file which must include all the files for your assignment.

**_Readme.txt file will be added with the credentials of Manager and Staff._**

## Marking Environment

**_Your assignment will be marked on the environment of ICTTEACH-USERMIN._**

## Academic Integrity

At the University of Tasmania, academic integrity requires all students to act responsibly, honestly, ethically,
and collegially when using, producing, and communicating information with other students and staff
members. The University community is committed to upholding the Statement on Academic Integrity.

Breaches of academic integrity such as plagiarism, contract cheating, collusion and so on are counter to the
fundamental values of the University. A breach is defined as being when a student:

```
a. fails to meet the expectations of academic integrity; or
```

```
b. seeks to gain, for themselves or for any other person, any academic advantage or advancement to
which they or that other person is not entitled; or
c. improperly disadvantages any other member of the University community.
```
The University and any persons authorised by the University may submit your assessable works to a text
matching service, to obtain a report on possible breaches such as plagiarism or contract cheating.
Substantiated breaches can result in a range of sanctions which are outlined in the Student Academic
Integrity Ordinance.

More information is available from the Academic Integrity site for students on the Student Portal.


