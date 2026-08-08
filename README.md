<div align="center">

🎓 VP Courses — Academy Admin Training Project

PHP & MySQL Web Development Internship Project

Violet Programming — Software Company | Beirut–Tyre, Lebanon

A small, early-stage web development training project focused on learning how an Admin Panel, MySQL database, and public academy website work together.



Training Focus: Frontend & Backend Web Development PracticeTraining Institution: Violet ProgrammingSupervisor: Ms. Kawthar Muslimani — Full Stack Web DeveloperAcademic Year: 2024–2025

</div>

📖 About This Repository

This repository represents one of my first practical PHP/MySQL projects, completed during my early web development training at Violet Programming.

It should be understood as a training project, not as a complete commercial Learning Management System and not as a full platform developed from zero.

During this stage of my learning, my hands-on work focused mainly on the Admin Panel and on understanding how administrative CRUD operations can update content displayed on a public academy website.

The purpose of the project was to practice and understand concepts such as:

PHP and MySQL integration

Database connections

CRUD operations

Dynamic content retrieval

Admin-side content management

Image handling

Basic authentication and sessions

Connecting backend-managed data to a frontend website

This project is preserved on GitHub to document my learning progression and the practical experience gained during my first web development internship/training period.

🎓 Internship Context

The work was completed during my training at Violet Programming, a software company documented in my internship report as working in web applications, mobile applications, and custom software solutions.

The training covered both frontend and backend development and was supervised by Ms. Kawthar Muslimani, Full Stack Web Developer.

The internship included two main learning stages:

Level 1 — Frontend DevelopmentA tourism website project was used to practice HTML, CSS, Bootstrap, JavaScript, responsive layouts, and page structure.

Level 2 — Backend / Database DevelopmentAcademy-management work was used to practice PHP, MySQL, database integration, CRUD operations, forms, and dynamic data display.

This repository belongs to that early backend/database learning stage.

Important: This repository does not represent a large production system. It is intentionally presented as a small internship training project that helped build the technical foundation used in later, more advanced projects.

👩‍💻 My Contribution

My practical contribution in this project focused primarily on the administrator side and its connection to the public academy interface.

Admin-side work included:

Admin sign in and logout workflow

Admin dashboard access

Banner management

About-section management

Course-card management

Instructor-card management

Student testimonial management

Add / Edit / Update / Delete operations

Image upload/update handling

Reading and writing data through MySQL

Displaying updated database content on the public academy page

The goal was not to build every possible academy role or workflow, but to understand how a basic database-driven web application is structured and managed.

🛡️ Admin Panel

The Admin Panel is the main functional area demonstrated in this repository.

Available management sections

Section

Purpose

Dashboard

Provides access to the administration area and project overview

Banner

Manages the main academy banner / hero content

About

Updates academy information displayed publicly

Courses

Adds, edits, updates, and deletes course cards

Instructors

Manages instructor information shown on the public website

Students

Manages student testimonial content

Client Side

Opens the public-facing academy website

CRUD operations tested

The administrative sections support the core operations practiced during training:

Create → Read → Update → Delete

The related changes are stored in MySQL and reflected on the client-facing website where applicable.

🌐 Client-Side Academy Website

The repository also contains a public academy interface under:

vpCourses/

Its purpose is to display content managed through the administration area.

The public page includes sections such as:

Hero / Banner

About the academy

Popular courses

Instructor cards

Student testimonials

Contact information

This demonstrates the connection between:

Admin Panel
    ↓
MySQL Database
    ↓
Public Academy Website

🗃️ Database

The MySQL database dump is included at:

database/vpcourses1.sql

The database contains both the tables used by the tested Admin/Client workflow and additional academy-management structures preserved from the training project.

Admin / public-content tables include areas for:

About content

Banner content

Courses

Instructors

Student testimonials

Contact information

Additional training structures

The database also contains tables related to broader academy concepts such as:

Students

Instructors

Course types

Courses

Course schedules

Registrations

The complete user interfaces for every extended database workflow are not present in the recovered project files, so this repository does not claim those areas as completed application features.

This distinction is intentional so the repository accurately represents the work that is actually available and testable.

🧰 Technology Stack

Backend

PHP

MySQL

Session-based authentication

Frontend

HTML5

CSS3

JavaScript

Bootstrap

DataTables / supporting frontend libraries used by the project

Development Environment

XAMPP

Apache

phpMyAdmin

Visual Studio Code

📁 Project Structure

vp-courses-training-project/
│
├── common/                   # Shared admin components and authentication guard
├── css/                      # Admin-side styles
├── database/
│   └── vpcourses1.sql        # MySQL database
├── img/                      # Admin images and local assets
├── js/                       # JavaScript and admin UI scripts
├── lib/                      # Supporting frontend libraries
├── vpCourses/                # Public academy/client-side website
│
├── signin.php                # Admin sign in
├── logout.php                # Logout
├── index.php                 # Admin dashboard
├── banner.php                # Banner management
├── about.php                 # About management
├── adminCourse.php           # Course management
├── adminInstructor.php       # Instructor management
├── adminStudent.php          # Student testimonial management
│
├── addAdminCourse.php
├── updateAdminCourse.php
├── deleteAdminCourse.php
│
├── addAdminInstructor.php
├── updateAdminInstructor.php
├── deleteAdminInstructor.php
│
├── addAdminStudent.php
├── updateAdminStudent.php
├── deleteAdminStudent.php
│
├── .gitignore
└── README.md

✅ Tested Functionality

Before preparing this repository for GitHub, the recovered project was reviewed and the main available workflow was tested.

Confirmed working areas

✅ Admin sign in

✅ Admin dashboard

✅ Banner page

✅ About page

✅ Course management page

✅ Instructor management page

✅ Student testimonial management page

✅ Public client-side academy page

✅ Add operations

✅ Edit / Update operations

✅ Delete operations

✅ Database-driven content updates

🧹 Repository Preparation

The recovered training files were prepared for public portfolio use without changing the original project into a different or more advanced application.

Cleanup focused on:

Preserving the original training scope

Removing clearly orphaned files that referenced unavailable pages/actions

Removing unused duplicate assets where safe

Adding consistent Admin session protection

Improving login/database query safety

Improving logout/session handling

Fixing broken local paths and case-sensitive links

Fixing broken demo image references

Organizing the database dump under database/

Adding .gitignore

Adding professional project documentation

What was intentionally not added

To keep this repository honest to the original internship scope, no new large LMS functionality was invented.

The repository does not claim implementation of:

Student dashboards

Teacher dashboards

Online course video learning

Payments

Certificates

Full student self-registration

Full teacher onboarding workflows

Advanced LMS progress tracking

⚙️ Local Installation

Prerequisites

Install:

XAMPP

PHP / Apache

MySQL

phpMyAdmin

A modern web browser

1. Clone or download the repository

git clone YOUR_REPOSITORY_URL

2. Place the project inside XAMPP

Example:

C:\xampp\htdocs\vp-courses-training-project

3. Start the local services

Open the XAMPP Control Panel and start:

Apache
MySQL

4. Import the database

Open phpMyAdmin and import:

database/vpcourses1.sql

5. Run the project

Open:

http://localhost/vp-courses-training-project/signin.php

Local demo credentials

Username: admin
Password: admin

These credentials are provided only for local demonstration of this training project. They are not production credentials.

🌱 What I Learned

This project was important because it was one of my first opportunities to move beyond static frontend pages and work with a real backend/database workflow.

Through this training, I strengthened my understanding of:

How PHP connects to MySQL

How relational application data is stored and retrieved

How CRUD operations work in practice

How forms communicate with backend logic

How Admin actions affect frontend content

How images and database records are managed together

How authentication sessions control access to administrative pages

How frontend and backend components combine into one web application

Debugging and problem solving in an unfamiliar development environment

The value of this repository is therefore not its size, but the learning progression it represents.

📌 Project Status

Status: Completed training project / portfolio archiveScope: Small internship learning projectPrimary Demonstrated Area: Admin Panel + database-driven client-side contentEnvironment: Local development with XAMPP

👩‍💻 Author

Fatima Hammoud

Computer & Communication Network Engineering — Lebanese University

This repository documents an early stage of my web development journey and the practical foundation that preceded my later full-stack internship and software projects.

<div align="center">

Developed during Web Development Training at Violet Programming

Learning by building, testing, and connecting frontend interfaces with backend data.

</div>