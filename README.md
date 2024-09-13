# Healthcare Appointment System

## Overview
This PHP project facilitates the management and booking of healthcare appointments, supporting distinct functionalities for admin, doctors, and patients through dedicated interfaces.

## Features
- **Admin Functions**: Manage doctors, patients, and appointments. Capabilities include adding, editing, and deleting user and doctor profiles, along with managing their schedules.
- **Doctor Functions**: Doctors can manage their profiles, view and manage their appointment schedules, and delete appointments or sessions.
- **Patient Functions**: Patients can book appointments, view their booking details, and cancel appointments.

## Key Directories
- **`admin/`**: Contains functionalities for administrators to manage doctors, sessions, and patient appointments.
- **`doctor/`**: Includes operations specific to doctors, such as appointment and session management.
- **`patient/`**: Manages patient interactions with the system, allowing appointment bookings and management.

## Database Structure
- **Tables**:
  - `Admin`: Stores admin credentials and details.
  - `Doctor`: Contains doctor profiles, specialties, and contact information.
  - `Patient`: Holds patient demographics, contact details, and authentication information.
  - `Appointment`: Manages details about appointments, linking patients to specific schedules with doctors.
  - `Schedule`: Stores scheduling details for doctor appointments.
- **Relationships**:
  - Patients book appointments linked to doctor schedules.
  - Admins manage doctor and patient information, influencing appointments and schedules.


## Technologies
- **Frontend**: HTML, CSS
- **Backend**: PHP
- **Database**: MySQL

## Contributors
• Raj Dhirajlal Vora n01597884
• Mandeep Kaur n01638449
• Januben Bharatbhai Diyora n01597519
• Chioma Kamalu n01600998

