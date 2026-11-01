@extends('layouts.dashboard')

@section('title', 'Games & Team Building Groups')

@section('content')

@php
    $game1Groups = [['title' => 'GAME 1 - GROUP 1', 'members' => [['name' => 'Mohammed Helal Hussain', 'designation' => 'Country Director', 'project' => 'CoOf', 'category' => 'SMT', 'other_group' => 1], ['name' => 'Nadia Afrin Shams', 'designation' => 'Team Leader', 'project' => 'BYETS & SMILE', 'category' => 'SMT', 'other_group' => 2], ['name' => 'Jhorna Sangma', 'designation' => 'Office Assistant', 'project' => 'BYETS', 'category' => 'Office Assistant', 'other_group' => 1], ['name' => 'Mahafuz Rahman Khandker', 'designation' => 'Driver', 'project' => 'ASTHA', 'category' => 'Driver', 'other_group' => 1], ['name' => 'Saiful Islam Milon', 'designation' => 'Driver', 'project' => 'CoOf', 'category' => 'Driver', 'other_group' => 2], ['name' => 'Zannatul Ferdous Pushpa', 'designation' => 'Officer - HR', 'project' => 'CoOf', 'category' => 'Officer / Sr Officer', 'other_group' => 2], ['name' => 'Anik Saha', 'designation' => 'Sr. Officer - Field Operations', 'project' => 'ASTHA', 'category' => 'Officer / Sr Officer', 'other_group' => 2], ['name' => 'Abdul Kader', 'designation' => 'Sr. Officer - Program Implementation', 'project' => 'SMILE', 'category' => 'Officer / Sr Officer', 'other_group' => 1], ['name' => 'Sabrina Alamgir', 'designation' => 'Senior Officer - MRM', 'project' => 'SAFE BD', 'category' => 'Officer / Sr Officer', 'other_group' => 2], ['name' => 'Farian Alam', 'designation' => 'Officer - Implementation', 'project' => 'SAFE BD', 'category' => 'Officer / Sr Officer', 'other_group' => 1], ['name' => 'Nazmul Haque', 'designation' => 'Senior Officer - Finance', 'project' => 'PRABRIDDHI', 'category' => 'Officer / Sr Officer', 'other_group' => 1], ['name' => 'Sabrina Fatema Chowdhury', 'designation' => 'Senior Officer, MRM', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 1], ['name' => 'Ahsan Habib', 'designation' => 'Senior Officer, Business Administration', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 2], ['name' => 'Nawar Nasar Khan', 'designation' => 'Senior Officer, Programme', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 2], ['name' => 'Araf Al Mehedi', 'designation' => 'Officer - MRM and KCM', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 1], ['name' => 'Tamiz Uddin Mullick', 'designation' => 'Head of Business Administration', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'Rabiul Islam', 'designation' => 'Manager - Business Administration', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 1], ['name' => 'Rabeya Sultana', 'designation' => 'Corporate Budget Controller', 'project' => 'Regional Office', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'Khairul Islam', 'designation' => 'Manager - Field Operations', 'project' => 'ASTHA', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'Anika Noor', 'designation' => 'Manager – Pogramme Implementation', 'project' => 'SMILE', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'Md. Bappy Shahrier', 'designation' => 'Sr. Manager - MEAL', 'project' => 'CALL PMU', 'category' => 'Other staff', 'other_group' => 1], ['name' => 'Rukhen Uddin Ahmed', 'designation' => 'Senior Adviser for Public Sector Engagement', 'project' => 'PRABRIDDHI', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'Naznin Begum', 'designation' => 'Gender and Social Norm Expert', 'project' => 'EARN', 'category' => 'Other staff', 'other_group' => 1], ['name' => 'Salma Akhtar', 'designation' => 'Advisor, Advocacy and KEL', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'Sharmin Akter', 'designation' => 'Coordinator, Finance and Accounts', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 1], ['name' => 'Abdullah Al Arafat', 'designation' => 'Digitalisation Expert', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'M. D.Tahmeed Chowdhury', 'designation' => 'Coordinator, Programme', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 1], ['name' => 'Faisal Mina', 'designation' => 'Consultant (Full-Term)', 'project' => 'BYETS', 'category' => 'Other staff', 'other_group' => 2], ['name' => 'S M Emtiaj Mahmud Mumu', 'designation' => 'Consultant (Full-Term)', 'project' => 'BYETS', 'category' => 'Other staff', 'other_group' => 1]]], ['title' => 'GAME 1 - GROUP 2', 'members' => [['name' => 'Syeda Ishrat Fatema', 'designation' => 'Deputy Country Director', 'project' => 'CoOf', 'category' => 'SMT', 'other_group' => 3], ['name' => 'Farzana Amin', 'designation' => 'Team Leader', 'project' => 'PROGRESS & TRACE', 'category' => 'SMT', 'other_group' => 4], ['name' => 'Laila Akther', 'designation' => 'Office Assistant', 'project' => 'ASTHA', 'category' => 'Office Assistant', 'other_group' => 3], ['name' => 'Harun-Ar-Rashid', 'designation' => 'Sr. Office Assistant', 'project' => 'SAFE BD', 'category' => 'Office Assistant', 'other_group' => 4], ['name' => 'Md. Monir Hossain', 'designation' => 'Driver', 'project' => 'ASTHA', 'category' => 'Driver', 'other_group' => 4], ['name' => 'Nipu Hazra', 'designation' => 'Driver', 'project' => 'SAFE BD/CoOf', 'category' => 'Driver', 'other_group' => 3], ['name' => 'Liton Mazumder', 'designation' => 'Sr. Officer - ICT', 'project' => 'CoOf', 'category' => 'Officer / Sr Officer', 'other_group' => 4], ['name' => 'Mehreen Adeeba Choudhury', 'designation' => 'Sr. Officer - Monitoring and Results Measurement & Communication', 'project' => 'SMILE', 'category' => 'Officer / Sr Officer', 'other_group' => 4], ['name' => 'Farhana Akter Akhi', 'designation' => 'Officer - Business Administration', 'project' => 'SMILE', 'category' => 'Officer / Sr Officer', 'other_group' => 3], ['name' => 'Ali Moahmmad Moyeth', 'designation' => 'Sr. Officer - MRM & KCM', 'project' => 'SHOMPRITEE', 'category' => 'Officer / Sr Officer', 'other_group' => 4], ['name' => 'Humaira Ferdous Shifa', 'designation' => 'Senior Officer, MRM and KCM', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 3], ['name' => 'Nayeem Shahriar', 'designation' => 'Officer - Programme', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 4], ['name' => 'Samira Sifat Swarna', 'designation' => 'Officer - Programme', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 3], ['name' => 'Nazmur Rashid Tonmoy', 'designation' => 'Senior Officer, Programme', 'project' => 'InSPIRE', 'category' => 'Officer / Sr Officer', 'other_group' => 3], ['name' => 'Projna Dasgupta', 'designation' => 'Sr. Officer-Skills and Training Implementation', 'project' => 'BYETS', 'category' => 'Officer / Sr Officer', 'other_group' => 4], ['name' => 'Parmita Ray', 'designation' => 'Sr. Officer-Skills & Training Implementation', 'project' => 'BYETS', 'category' => 'Officer / Sr Officer', 'other_group' => 3], ['name' => 'Suraiya Rashed Runa', 'designation' => 'Sr. Coordinator - Finance', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 4], ['name' => 'Romana Sanjida Akter', 'designation' => 'Sr. Coordinator - HR', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 3], ['name' => 'Md. Rezaul Karim', 'designation' => 'Sr. Manager - Interventions Portfolio', 'project' => 'ASTHA', 'category' => 'Other staff', 'other_group' => 4], ['name' => 'Rupa Debnath', 'designation' => 'MEAL Coordinator', 'project' => 'CALL PMU', 'category' => 'Other staff', 'other_group' => 3], ['name' => 'Syed Abu Sufian', 'designation' => 'Senior Manager - Municipalities', 'project' => 'PRABRIDDHI', 'category' => 'Other staff', 'other_group' => 3], ['name' => 'Md. Mahfuzul Hauque', 'designation' => 'Community Engagement and Socio-Emotional Behavior Expert', 'project' => 'EARN', 'category' => 'Other staff', 'other_group' => 4], ['name' => 'Jocky Dewan', 'designation' => 'Gender and Social Norm Expert', 'project' => 'EARN', 'category' => 'Other staff', 'other_group' => 3], ['name' => 'Shohidul Alam', 'designation' => 'Manager, Business Administration', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 3], ['name' => 'T M Abu Saleh', 'designation' => 'Manager, Programme', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 4], ['name' => 'Azmul Huda', 'designation' => 'Manager, MRM and KEL', 'project' => 'InSPIRE', 'category' => 'Other staff', 'other_group' => 4], ['name' => 'Suranjan Chandra Dey', 'designation' => 'Manager-BA', 'project' => 'BYETS', 'category' => 'Other staff', 'other_group' => 3], ['name' => 'Sukanta Saha', 'designation' => 'Regional Corporate Project Accountant', 'project' => 'Regional Office', 'category' => 'Other staff', 'other_group' => 4]]], ['title' => 'GAME 1 - GROUP 3', 'members' => [['name' => 'Abdul Awal', 'designation' => 'Team Leader', 'project' => 'ASTHA & SAFE BD', 'category' => 'SMT', 'other_group' => 5], ['name' => 'Md. Hafizur Rahman', 'designation' => 'Office Assistant', 'project' => 'PRABRIDDHI', 'category' => 'Office Assistant', 'other_group' => 5], ['name' => 'Md. Aminur Islam', 'designation' => 'Office Assistant', 'project' => 'PROGRESS', 'category' => 'Office Assistant', 'other_group' => 6], ['name' => 'Md Shahidul Islam', 'designation' => 'Driver', 'project' => 'SMILE', 'category' => 'Driver', 'other_group' => 5], ['name' => 'Tutul Roy', 'designation' => 'Driver', 'project' => 'CoOf', 'category' => 'Driver', 'other_group' => 6], ['name' => 'Saika Binte Islam', 'designation' => 'Sr. Officer – Portfolio and Communications', 'project' => 'CoOf', 'category' => 'Officer / Sr Officer', 'other_group' => 5], ['name' => 'Mohammad Nahidul Islam', 'designation' => 'Sr. Officer - Finance', 'project' => 'ASTHA', 'category' => 'Officer / Sr Officer', 'other_group' => 6], ['name' => 'Sunjida Zaman Ria', 'designation' => 'Officer - Business Administration', 'project' => 'SAFE BD', 'category' => 'Officer / Sr Officer', 'other_group' => 6], ['name' => 'Swopnil Louis Cruze', 'designation' => 'Officer - Partnership & Local Implementation', 'project' => 'SHOMPRITEE', 'category' => 'Officer / Sr Officer', 'other_group' => 5], ['name' => 'Sayeda Zeenat Karim', 'designation' => 'Senior Officer, Programme', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 5], ['name' => 'Tanzeel Rashid', 'designation' => 'Senior Officer, Programme', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 6], ['name' => 'Mahboob Uddin Neon', 'designation' => 'Senior Officer, MRM and KCM', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 5], ['name' => 'Nadira Anzum', 'designation' => 'Officer - MRM and KCM', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 6], ['name' => 'Rabeya Khatun', 'designation' => 'Sr.Officer-Procurement & Logistics', 'project' => 'BYETS', 'category' => 'Officer / Sr Officer', 'other_group' => 5], ['name' => 'Md. Abir Hossain', 'designation' => 'Sr. Officer-Finance', 'project' => 'BYETS', 'category' => 'Officer / Sr Officer', 'other_group' => 6], ['name' => 'Parvez Mohammed Asheque', 'designation' => 'Head of Programme', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 5], ['name' => 'Md. Alamgir Kabir', 'designation' => 'Business Development Advisor', 'project' => 'Global Office', 'category' => 'Other staff', 'other_group' => 5], ['name' => 'Md. Asifur Rahaman', 'designation' => 'Coordinator - Procurement & Government Relations', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 6], ['name' => 'Nahian Iftekhar Alam', 'designation' => 'Coordinator - Partnership & Innovation', 'project' => 'ASTHA', 'category' => 'Other staff', 'other_group' => 5], ['name' => 'Ahmed Rifat Kabir Sristy', 'designation' => 'Coordinator - Trade Facilitation', 'project' => 'SAFE BD', 'category' => 'Other staff', 'other_group' => 5], ['name' => 'Fahmid Ahmed Khan', 'designation' => 'Coordinator – Communications & Knowledge Management', 'project' => 'GO4IMPact', 'category' => 'Other staff', 'other_group' => 6], ['name' => 'Md. Makbul Hossain', 'designation' => 'Sr. Technical Advisor', 'project' => 'EARN', 'category' => 'Other staff', 'other_group' => 6], ['name' => 'Mohtahsam Billah', 'designation' => 'Sr. Manager, MRM & KCM', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 5], ['name' => 'Nazim Reza', 'designation' => 'Manager, Programme', 'project' => 'InSPIRE', 'category' => 'Other staff', 'other_group' => 5], ['name' => 'Md. Ashikujjaman', 'designation' => 'Sr. Coordinator-Implementation', 'project' => 'BYETS', 'category' => 'Other staff', 'other_group' => 6], ['name' => 'Nirjan Neeladri', 'designation' => 'Consultant (Full-Term)', 'project' => 'ASTHA', 'category' => 'Other staff', 'other_group' => 6], ['name' => 'Warda Ashraf', 'designation' => 'Consultant', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 6], ['name' => 'Quazi Shuvro Salamat Rahman', 'designation' => 'Intern', 'project' => 'SAFEBD', 'category' => null, 'other_group' => null]]], ['title' => 'GAME 1 - GROUP 4', 'members' => [['name' => 'Bidowra Tahmin Khan', 'designation' => 'Team Leader', 'project' => 'InSPIRE', 'category' => 'SMT', 'other_group' => 7], ['name' => 'Md. Sydul Islam', 'designation' => 'Office Assistant', 'project' => 'PROGRESS', 'category' => 'Office Assistant', 'other_group' => 8], ['name' => 'Masud Parvez', 'designation' => 'Office Assistant', 'project' => 'SHOMPRITEE', 'category' => 'Office Assistant', 'other_group' => 7], ['name' => 'Milon Shah', 'designation' => 'Driver', 'project' => 'BYETS', 'category' => 'Driver', 'other_group' => 8], ['name' => 'Sayed Monirul Hossain', 'designation' => 'Driver', 'project' => 'PRABRIDDHI', 'category' => 'Driver', 'other_group' => 7], ['name' => 'Rubayet Alam Kusum', 'designation' => 'Sr. Officer - Admin & Logistics', 'project' => 'CoOf', 'category' => 'Officer / Sr Officer', 'other_group' => 8], ['name' => 'Sibbir Riyan', 'designation' => 'Sr. Officer - Business Development', 'project' => 'CoOf', 'category' => 'Officer / Sr Officer', 'other_group' => 7], ['name' => 'Nithora Mehrab', 'designation' => 'Sr. Officer - Public Partnership & Advocacy', 'project' => 'ASTHA', 'category' => 'Officer / Sr Officer', 'other_group' => 8], ['name' => 'Noshin Fariha', 'designation' => 'Officer - Access to Finance', 'project' => 'ASTHA', 'category' => 'Officer / Sr Officer', 'other_group' => 7], ['name' => 'Tawhidul Anwar', 'designation' => 'Senior Officer - Partnership and Trade', 'project' => 'SAFE BD', 'category' => 'Officer / Sr Officer', 'other_group' => 8], ['name' => 'Nahid Farhana Rahman', 'designation' => 'Senior Officer, Business Administration', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 8], ['name' => 'Md. Tonmoy Hasan', 'designation' => 'Senior Officer, Business Administration', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 7], ['name' => 'Seyam Rabbi', 'designation' => 'Senior Officer - Product Development', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 7], ['name' => 'Tasmim Sinha', 'designation' => 'Senior Officer, Programme', 'project' => 'PROGRESS', 'category' => 'Officer / Sr Officer', 'other_group' => 8], ['name' => 'Syed Sabit Tamim', 'designation' => 'Sr.Officer-MRM & Communication', 'project' => 'BYETS', 'category' => 'Officer / Sr Officer', 'other_group' => 7], ['name' => 'Mohammad Sakib Khaled', 'designation' => 'Head of Business Development', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 8], ['name' => 'Pragati Lahiri', 'designation' => 'IT Administrator', 'project' => 'CoOf', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'A.S. Nur Ahmed', 'designation' => 'Specialist - Field Operations', 'project' => 'ASTHA', 'category' => 'Other staff', 'other_group' => 8], ['name' => 'Shakif Ahmed', 'designation' => 'Coordinator - KCM & MRM', 'project' => 'ASTHA', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'Mir Rafiat Salman', 'designation' => 'Sr. Manager - Partnership & Implementation', 'project' => 'SAFE BD', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'Md. Marjad Mir Kameli', 'designation' => 'Sr. Manager - MEL', 'project' => 'GO4IMPact', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'Saiduzzaman Pulak', 'designation' => 'Specialist - Private Sector Engagement', 'project' => 'GO4IMPact', 'category' => 'Other staff', 'other_group' => 8], ['name' => 'Mohammad Mizanur Rahman', 'designation' => 'Community Engagement and Socio-Emotional Behavior Expert', 'project' => 'EARN', 'category' => 'Other staff', 'other_group' => 8], ['name' => 'Nahin Ferdous', 'designation' => 'Senior Manager - Institutionalization & Advocacy', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'Sabbir Rahman Khan', 'designation' => 'Manager - MRM & KCM', 'project' => 'PROGRESS', 'category' => 'Other staff', 'other_group' => 8], ['name' => 'Abu Thaher Siddik', 'designation' => 'Sr. Coordinator-Implementation', 'project' => 'BYETS', 'category' => 'Other staff', 'other_group' => 8], ['name' => 'Salmun Nahar Aishi', 'designation' => 'Intern (Full-Term)', 'project' => 'CBFT_HILTI', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'Moumita A Mallick', 'designation' => 'Consultant (Full-Term)', 'project' => 'BYETS', 'category' => 'Other staff', 'other_group' => 7], ['name' => 'Monoj Kumar Roy', 'designation' => 'Consultant', 'project' => 'SAFE BD', 'category' => 'Other staff', 'other_group' => 8]]]];

    $game2Groups = [['title' => 'GAME 2 - GROUP 1', 'members' => [['name' => 'Mohammed Helal Hussain', 'designation' => 'Country Director', 'project' => 'CoOf', 'category' => null, 'other_group' => 1], ['name' => 'Jhorna Sangma', 'designation' => 'Office Assistant', 'project' => 'BYETS', 'category' => null, 'other_group' => 1], ['name' => 'Mahafuz Rahman Khandker', 'designation' => 'Driver', 'project' => 'ASTHA', 'category' => null, 'other_group' => 1], ['name' => 'Abdul Kader', 'designation' => 'Sr. Officer - Program Implementation', 'project' => 'SMILE', 'category' => null, 'other_group' => 1], ['name' => 'Farian Alam', 'designation' => 'Officer - Implementation', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 1], ['name' => 'Nazmul Haque', 'designation' => 'Senior Officer - Finance', 'project' => 'PRABRIDDHI', 'category' => null, 'other_group' => 1], ['name' => 'Sabrina Fatema Chowdhury', 'designation' => 'Senior Officer, MRM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'Araf Al Mehedi', 'designation' => 'Officer - MRM and KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'Rabiul Islam', 'designation' => 'Manager - Business Administration', 'project' => 'CoOf', 'category' => null, 'other_group' => 1], ['name' => 'Md. Bappy Shahrier', 'designation' => 'Sr. Manager - MEAL', 'project' => 'CALL PMU', 'category' => null, 'other_group' => 1], ['name' => 'Naznin Begum', 'designation' => 'Gender and Social Norm Expert', 'project' => 'EARN', 'category' => null, 'other_group' => 1], ['name' => 'Sharmin Akter', 'designation' => 'Coordinator, Finance and Accounts', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'M. D.Tahmeed Chowdhury', 'designation' => 'Coordinator, Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'S M Emtiaj Mahmud Mumu', 'designation' => 'Consultant (Full-Term)', 'project' => 'BYETS', 'category' => null, 'other_group' => 1]]], ['title' => 'GAME 2 - GROUP 2', 'members' => [['name' => 'Nadia Afrin Shams', 'designation' => 'Team Leader', 'project' => 'BYETS & SMILE', 'category' => null, 'other_group' => 1], ['name' => 'Saiful Islam Milon', 'designation' => 'Driver', 'project' => 'CoOf', 'category' => null, 'other_group' => 1], ['name' => 'Zannatul Ferdous Pushpa', 'designation' => 'Officer - HR', 'project' => 'CoOf', 'category' => null, 'other_group' => 1], ['name' => 'Anik Saha', 'designation' => 'Sr. Officer - Field Operations', 'project' => 'ASTHA', 'category' => null, 'other_group' => 1], ['name' => 'Sabrina Alamgir', 'designation' => 'Senior Officer - MRM', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 1], ['name' => 'Ahsan Habib', 'designation' => 'Senior Officer, Business Administration', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'Tamiz Uddin Mullick', 'designation' => 'Head of Business Administration', 'project' => 'CoOf', 'category' => null, 'other_group' => 1], ['name' => 'Rabeya Sultana', 'designation' => 'Corporate Budget Controller', 'project' => 'Regional Office', 'category' => null, 'other_group' => 1], ['name' => 'Khairul Islam', 'designation' => 'Manager - Field Operations', 'project' => 'ASTHA', 'category' => null, 'other_group' => 1], ['name' => 'Anika Noor', 'designation' => 'Manager – Pogramme Implementation', 'project' => 'SMILE', 'category' => null, 'other_group' => 1], ['name' => 'Rukhen Uddin Ahmed', 'designation' => 'Senior Adviser for Public Sector Engagement', 'project' => 'PRABRIDDHI', 'category' => null, 'other_group' => 1], ['name' => 'Salma Akhtar', 'designation' => 'Advisor, Advocacy and KEL', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'Abdullah Al Arafat', 'designation' => 'Digitalisation Expert', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 1], ['name' => 'Faisal Mina', 'designation' => 'Consultant (Full-Term)', 'project' => 'BYETS', 'category' => null, 'other_group' => 1]]], ['title' => 'GAME 2 - GROUP 3', 'members' => [['name' => 'Syeda Ishrat Fatema', 'designation' => 'Deputy Country Director', 'project' => 'CoOf', 'category' => null, 'other_group' => 2], ['name' => 'Laila Akther', 'designation' => 'Office Assistant', 'project' => 'ASTHA', 'category' => null, 'other_group' => 2], ['name' => 'Nipu Hazra', 'designation' => 'Driver', 'project' => 'SAFE BD/CoOf', 'category' => null, 'other_group' => 2], ['name' => 'Farhana Akter Akhi', 'designation' => 'Officer - Business Administration', 'project' => 'SMILE', 'category' => null, 'other_group' => 2], ['name' => 'Humaira Ferdous Shifa', 'designation' => 'Senior Officer, MRM and KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'Samira Sifat Swarna', 'designation' => 'Officer - Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'Nazmur Rashid Tonmoy', 'designation' => 'Senior Officer, Programme', 'project' => 'InSPIRE', 'category' => null, 'other_group' => 2], ['name' => 'Parmita Ray', 'designation' => 'Sr. Officer-Skills & Training Implementation', 'project' => 'BYETS', 'category' => null, 'other_group' => 2], ['name' => 'Romana Sanjida Akter', 'designation' => 'Sr. Coordinator - HR', 'project' => 'CoOf', 'category' => null, 'other_group' => 2], ['name' => 'Rupa Debnath', 'designation' => 'MEAL Coordinator', 'project' => 'CALL PMU', 'category' => null, 'other_group' => 2], ['name' => 'Syed Abu Sufian', 'designation' => 'Senior Manager - Municipalities', 'project' => 'PRABRIDDHI', 'category' => null, 'other_group' => 2], ['name' => 'Jocky Dewan', 'designation' => 'Gender and Social Norm Expert', 'project' => 'EARN', 'category' => null, 'other_group' => 2], ['name' => 'Shohidul Alam', 'designation' => 'Manager, Business Administration', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'Md. Marajul Islam', 'designation' => 'Coordinator, Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'Suranjan Chandra Dey', 'designation' => 'Manager-BA', 'project' => 'BYETS', 'category' => null, 'other_group' => 2]]], ['title' => 'GAME 2 - GROUP 4', 'members' => [['name' => 'Farzana Amin', 'designation' => 'Team Leader', 'project' => 'PROGRESS & TRACE', 'category' => null, 'other_group' => 2], ['name' => 'Harun-Ar-Rashid', 'designation' => 'Sr. Office Assistant', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 2], ['name' => 'Md. Monir Hossain', 'designation' => 'Driver', 'project' => 'ASTHA', 'category' => null, 'other_group' => 2], ['name' => 'Liton Mazumder', 'designation' => 'Sr. Officer - ICT', 'project' => 'CoOf', 'category' => null, 'other_group' => 2], ['name' => 'Mehreen Adeeba Choudhury', 'designation' => 'Sr. Officer - Monitoring and Results Measurement & Communication', 'project' => 'SMILE', 'category' => null, 'other_group' => 2], ['name' => 'Ali Moahmmad Moyeth', 'designation' => 'Sr. Officer - MRM & KCM', 'project' => 'SHOMPRITEE', 'category' => null, 'other_group' => 2], ['name' => 'Nayeem Shahriar', 'designation' => 'Officer - Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'Projna Dasgupta', 'designation' => 'Sr. Officer-Skills and Training Implementation', 'project' => 'BYETS', 'category' => null, 'other_group' => 2], ['name' => 'Suraiya Rashed Runa', 'designation' => 'Sr. Coordinator - Finance', 'project' => 'CoOf', 'category' => null, 'other_group' => 2], ['name' => 'Md. Rezaul Karim', 'designation' => 'Sr. Manager - Interventions Portfolio', 'project' => 'ASTHA', 'category' => null, 'other_group' => 2], ['name' => 'Md. Mahfuzul Hauque', 'designation' => 'Community Engagement and Socio-Emotional Behavior Expert', 'project' => 'EARN', 'category' => null, 'other_group' => 2], ['name' => 'Md.Tawhidul Islam', 'designation' => 'Senior Manager, MRM and KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'T M Abu Saleh', 'designation' => 'Manager, Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 2], ['name' => 'Azmul Huda', 'designation' => 'Manager, MRM and KEL', 'project' => 'InSPIRE', 'category' => null, 'other_group' => 2], ['name' => 'Sukanta Saha', 'designation' => 'Regional Corporate Project Accountant', 'project' => 'Regional Office', 'category' => null, 'other_group' => 2]]], ['title' => 'GAME 2 - GROUP 5', 'members' => [['name' => 'Abdul Awal', 'designation' => 'Team Leader', 'project' => 'ASTHA & SAFE BD', 'category' => null, 'other_group' => 3], ['name' => 'Md. Hafizur Rahman', 'designation' => 'Office Assistant', 'project' => 'PRABRIDDHI', 'category' => null, 'other_group' => 3], ['name' => 'Md Shahidul Islam', 'designation' => 'Driver', 'project' => 'SMILE', 'category' => null, 'other_group' => 3], ['name' => 'Saika Binte Islam', 'designation' => 'Sr. Officer – Portfolio and Communications', 'project' => 'CoOf', 'category' => null, 'other_group' => 3], ['name' => 'Swopnil Louis Cruze', 'designation' => 'Officer - Partnership & Local Implementation', 'project' => 'SHOMPRITEE', 'category' => null, 'other_group' => 3], ['name' => 'Sayeda Zeenat Karim', 'designation' => 'Senior Officer, Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Mahboob Uddin Neon', 'designation' => 'Senior Officer, MRM and KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Rabeya Khatun', 'designation' => 'Sr.Officer-Procurement & Logistics', 'project' => 'BYETS', 'category' => null, 'other_group' => 3], ['name' => 'Parvez Mohammed Asheque', 'designation' => 'Head of Programme', 'project' => 'CoOf', 'category' => null, 'other_group' => 3], ['name' => 'Md. Alamgir Kabir', 'designation' => 'Business Development Advisor', 'project' => 'Global Office', 'category' => null, 'other_group' => 3], ['name' => 'Nahian Iftekhar Alam', 'designation' => 'Coordinator - Partnership & Innovation', 'project' => 'ASTHA', 'category' => null, 'other_group' => 3], ['name' => 'Ahmed Rifat Kabir Sristy', 'designation' => 'Coordinator - Trade Facilitation', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 3], ['name' => 'Mohtahsam Billah', 'designation' => 'Sr. Manager, MRM & KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Nazim Reza', 'designation' => 'Manager, Programme', 'project' => 'InSPIRE', 'category' => null, 'other_group' => 3]]], ['title' => 'GAME 2 - GROUP 6', 'members' => [['name' => 'Md. Aminur Islam', 'designation' => 'Office Assistant', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Tutul Roy', 'designation' => 'Driver', 'project' => 'CoOf', 'category' => null, 'other_group' => 3], ['name' => 'Mohammad Nahidul Islam', 'designation' => 'Sr. Officer - Finance', 'project' => 'ASTHA', 'category' => null, 'other_group' => 3], ['name' => 'Sunjida Zaman Ria', 'designation' => 'Officer - Business Administration', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 3], ['name' => 'Tanzeel Rashid', 'designation' => 'Senior Officer, Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Nadira Anzum', 'designation' => 'Officer - MRM and KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Md. Asifur Rahaman', 'designation' => 'Coordinator - Procurement & Government Relations', 'project' => 'CoOf', 'category' => null, 'other_group' => 3], ['name' => 'Fahmid Ahmed Khan', 'designation' => 'Coordinator – Communications & Knowledge Management', 'project' => 'GO4IMPact', 'category' => null, 'other_group' => 3], ['name' => 'Md. Makbul Hossain', 'designation' => 'Sr. Technical Advisor', 'project' => 'EARN', 'category' => null, 'other_group' => 3], ['name' => 'Nowshin Anjum', 'designation' => 'Coordinator, Programme', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 3], ['name' => 'Md. Ashikujjaman', 'designation' => 'Sr. Coordinator-Implementation', 'project' => 'BYETS', 'category' => null, 'other_group' => 3], ['name' => 'Nirjan Neeladri', 'designation' => 'Consultant (Full-Term)', 'project' => 'ASTHA', 'category' => null, 'other_group' => 3], ['name' => 'Warda Ashraf', 'designation' => 'Consultant', 'project' => 'CoOf', 'category' => null, 'other_group' => 3], ['name' => 'Quazi Shuvro Salamat Rahman', 'designation' => 'Intern', 'project' => 'SAFEBD', 'category' => null, 'other_group' => 1]]], ['title' => 'GAME 2 - GROUP 7', 'members' => [['name' => 'Bidowra Tahmin Khan', 'designation' => 'Team Leader', 'project' => 'InSPIRE', 'category' => null, 'other_group' => 4], ['name' => 'Masud Parvez', 'designation' => 'Office Assistant', 'project' => 'SHOMPRITEE', 'category' => null, 'other_group' => 4], ['name' => 'Sayed Monirul Hossain', 'designation' => 'Driver', 'project' => 'PRABRIDDHI', 'category' => null, 'other_group' => 4], ['name' => 'Sibbir Riyan', 'designation' => 'Sr. Officer - Business Development', 'project' => 'CoOf', 'category' => null, 'other_group' => 4], ['name' => 'Noshin Fariha', 'designation' => 'Officer - Access to Finance', 'project' => 'ASTHA', 'category' => null, 'other_group' => 4], ['name' => 'Md. Tonmoy Hasan', 'designation' => 'Senior Officer, Business Administration', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 4], ['name' => 'Seyam Rabbi', 'designation' => 'Senior Officer - Product Development', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 4], ['name' => 'Syed Sabit Tamim', 'designation' => 'Sr.Officer-MRM & Communication', 'project' => 'BYETS', 'category' => null, 'other_group' => 4], ['name' => 'Pragati Lahiri', 'designation' => 'IT Administrator', 'project' => 'CoOf', 'category' => null, 'other_group' => 4], ['name' => 'Shakif Ahmed', 'designation' => 'Coordinator - KCM & MRM', 'project' => 'ASTHA', 'category' => null, 'other_group' => 4], ['name' => 'Mir Rafiat Salman', 'designation' => 'Sr. Manager - Partnership & Implementation', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 4], ['name' => 'Md. Marjad Mir Kameli', 'designation' => 'Sr. Manager - MEL', 'project' => 'GO4IMPact', 'category' => null, 'other_group' => 4], ['name' => 'Nahin Ferdous', 'designation' => 'Senior Manager - Institutionalization & Advocacy', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 4], ['name' => 'Salmun Nahar Aishi', 'designation' => 'Intern (Full-Term)', 'project' => 'CBFT_HILTI', 'category' => null, 'other_group' => 4], ['name' => 'Moumita A Mallick', 'designation' => 'Consultant (Full-Term)', 'project' => 'BYETS', 'category' => null, 'other_group' => 4]]], ['title' => 'GAME 2 - GROUP 8', 'members' => [['name' => 'Md. Sydul Islam', 'designation' => 'Office Assistant', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 4], ['name' => 'Milon Shah', 'designation' => 'Driver', 'project' => 'BYETS', 'category' => null, 'other_group' => 4], ['name' => 'Rubayet Alam Kusum', 'designation' => 'Sr. Officer - Admin & Logistics', 'project' => 'CoOf', 'category' => null, 'other_group' => 4], ['name' => 'Nithora Mehrab', 'designation' => 'Sr. Officer - Public Partnership & Advocacy', 'project' => 'ASTHA', 'category' => null, 'other_group' => 4], ['name' => 'Tawhidul Anwar', 'designation' => 'Senior Officer - Partnership and Trade', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 4], ['name' => 'Nahid Farhana Rahman', 'designation' => 'Senior Officer, Business Administration', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 4], ['name' => 'Mohammad Sakib Khaled', 'designation' => 'Head of Business Development', 'project' => 'CoOf', 'category' => null, 'other_group' => 4], ['name' => 'A.S. Nur Ahmed', 'designation' => 'Specialist - Field Operations', 'project' => 'ASTHA', 'category' => null, 'other_group' => 4], ['name' => 'Saiduzzaman Pulak', 'designation' => 'Specialist - Private Sector Engagement', 'project' => 'GO4IMPact', 'category' => null, 'other_group' => 4], ['name' => 'Mohammad Mizanur Rahman', 'designation' => 'Community Engagement and Socio-Emotional Behavior Expert', 'project' => 'EARN', 'category' => null, 'other_group' => 4], ['name' => 'Sabbir Rahman Khan', 'designation' => 'Manager - MRM & KCM', 'project' => 'PROGRESS', 'category' => null, 'other_group' => 4], ['name' => 'Abu Thaher Siddik', 'designation' => 'Sr. Coordinator-Implementation', 'project' => 'BYETS', 'category' => null, 'other_group' => 4], ['name' => 'Monoj Kumar Roy', 'designation' => 'Consultant', 'project' => 'SAFE BD', 'category' => null, 'other_group' => 4]]]];
@endphp

<div class="mx-auto max-w-3xl space-y-8 px-4 py-6 sm:px-6">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ url()->previous() }}"
           class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-[#00477A]"
           aria-label="Go back">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">Games &amp; Team Building</h1>
            <!-- <p class="mt-1 text-sm text-slate-500">Retreat 2026 • Group assignments</p> -->
        </div>
    </div>

    {{-- Introduction --}}
    <!-- <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
        <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-[#00477A] shadow-sm">
                <i class="fa-solid fa-people-group text-xl"></i>
            </div>
            <div>
                <h2 class="font-semibold text-slate-900">Find your game group</h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">
                    View the participant lists for both activities. Game 1 groups are split into two groups for Game 2. Search by name to find both assignments.
                </p>
            </div>
        </div>
    </section> -->

    {{-- Quick participant search --}}
    <section class="space-y-3">
        <div>
            <h2 class="text-lg font-bold text-slate-900">Quick participant search</h2>
            <p class="mt-1 text-sm text-slate-500">Enter at least 3 letters of a name.</p>
        </div>

        <div class="flex w-full items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2">
            <span class="flex h-8 w-5 shrink-0 items-center justify-center text-slate-400" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="7"></circle><path d="m20 20-4-4"></path>
                </svg>
            </span>
            <input id="game-search" type="text" autocomplete="off"
                   placeholder="Search participant name..."
                   class="!m-0 !min-w-0 !w-full !flex-1 !border-0 !bg-transparent !p-0 !text-sm !leading-8 !text-slate-900 !shadow-none !outline-none !ring-0 placeholder:!text-slate-400 focus:!border-0 focus:!outline-none focus:!ring-0"
                   style="border:0 !important; outline:none !important; box-shadow:none !important;">
            <button id="game-search-clear" type="button"
                    class="hidden h-8 w-8 shrink-0 items-center justify-center rounded-full text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                    aria-label="Clear search" title="Clear search">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18"></path><path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>

        <div id="game-search-results" class="hidden space-y-2" aria-live="polite"></div>
        <p id="game-search-hint" class="text-xs text-slate-400">Search results will show your group in both games.</p>
    </section>

    {{-- Game selection --}}
    <section class="space-y-4">
        <div class="grid grid-cols-2 gap-3">
            <button type="button" data-game-tab="1"
                    class="rounded-xl bg-[#00477A] px-3 py-3 text-sm font-semibold text-white shadow-sm">
                <span class="block">Game 1</span>
                <span class="mt-1 block text-xs font-normal text-blue-100">হই হই রই রই</span>
            </button>
            <button type="button" data-game-tab="2"
                    class="rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                <span class="block">Game 2</span>
                <span class="mt-1 block text-xs font-normal text-slate-500">Tic Tac Toe Relay</span>
            </button>
        </div>

        <div id="game-panel-1" data-game-panel="1" class="space-y-3">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">হই হই রই রই</h2>
                    <p class="text-sm text-slate-500">4 groups • Team assignments</p>
                </div>
                <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-semibold text-[#00477A]">Game 1</span>
            </div>

            @foreach ($game1Groups as $groupIndex => $group)
                <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" {{ $groupIndex === 0 ? 'open' : '' }}>
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 font-bold text-[#00477A]">
                                {{ $groupIndex + 1 }}
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Group {{ $groupIndex + 1 }}</h3>
                                <p class="mt-1 text-xs text-slate-500">{{ count($group['members']) }} participants</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="space-y-2 border-t border-slate-100 p-4 sm:p-5">
                        @foreach ($group['members'] as $member)
                            <div class="rounded-xl bg-slate-50 p-3"
                                 data-game-member
                                 data-game="1"
                                 data-name="{{ $member['name'] }}"
                                 data-group="Group {{ $groupIndex + 1 }}"
                                 data-other-group="{{ $member['other_group'] ? 'Group '.$member['other_group'] : 'Not assigned' }}"
                                 data-designation="{{ $member['designation'] }}"
                                 data-project="{{ $member['project'] }}">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <p class="font-medium text-slate-800">{{ $member['name'] }}</p>
                                        <p class="mt-1 text-xs leading-5 text-slate-500">{{ $member['designation'] }}</p>
                                        <p class="mt-1 text-xs text-slate-400">{{ $member['project'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </div>

        <div id="game-panel-2" data-game-panel="2" class="hidden space-y-3">
            <div class="flex items-center justify-between gap-3">
                <div>
                    <h2 class="text-xl font-bold text-slate-900">Tic Tac Toe Relay</h2>
                    <p class="text-sm text-slate-500">8 groups • Team assignments</p>
                </div>
                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">Game 2</span>
            </div>

            @foreach ($game2Groups as $groupIndex => $group)
                <details class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm" {{ $groupIndex === 0 ? 'open' : '' }}>
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-5 hover:bg-slate-50 [&::-webkit-details-marker]:hidden">
                        <div class="flex items-center gap-3">
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-50 font-bold text-emerald-700">
                                {{ $groupIndex + 1 }}
                            </div>
                            <div>
                                <h3 class="font-semibold text-slate-900">Group {{ $groupIndex + 1 }}</h3>
                                <p class="mt-1 text-xs text-slate-500">{{ count($group['members']) }} participants</p>
                            </div>
                        </div>
                        <i class="fa-solid fa-chevron-down text-sm text-slate-400 transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="space-y-2 border-t border-slate-100 p-4 sm:p-5">
                        @foreach ($group['members'] as $member)
                            <div class="rounded-xl bg-slate-50 p-3"
                                 data-game-member
                                 data-game="2"
                                 data-name="{{ $member['name'] }}"
                                 data-group="Group {{ $groupIndex + 1 }}"
                                 data-other-group="Group {{ $member['other_group'] }}"
                                 data-designation="{{ $member['designation'] }}"
                                 data-project="{{ $member['project'] }}">
                                <p class="font-medium text-slate-800">{{ $member['name'] }}</p>
                                <p class="mt-1 text-xs leading-5 text-slate-500">{{ $member['designation'] }}</p>
                                <p class="mt-1 text-xs text-slate-400">{{ $member['project'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </details>
            @endforeach
        </div>
    </section>

</div>

<script>
(() => {
    const searchInput = document.getElementById('game-search');
    const clearButton = document.getElementById('game-search-clear');
    const results = document.getElementById('game-search-results');
    const hint = document.getElementById('game-search-hint');
    const tabs = document.querySelectorAll('[data-game-tab]');
    const panels = document.querySelectorAll('[data-game-panel]');
    const members = [...document.querySelectorAll('[data-game-member]')];

    if (!searchInput || !results || !clearButton) return;

    const normalize = value => (value || '').toLocaleLowerCase().trim().replace(/\s+/g, ' ');

    function renderSearch() {
        const query = normalize(searchInput.value);
        clearButton.classList.toggle('hidden', !query);

        if (query.length < 3) {
            results.innerHTML = '';
            results.classList.add('hidden');
            hint.textContent = query ? 'Please type at least 3 characters.' : 'Search results will show your group in both games.';
            return;
        }

        const matched = members.filter(member => normalize(member.dataset.name).includes(query));
        const unique = new Map();

        matched.forEach(member => {
            const key = normalize(member.dataset.name);
            if (!unique.has(key)) {
                unique.set(key, {
                    name: member.dataset.name,
                    designation: member.dataset.designation,
                    project: member.dataset.project,
                    game1: '',
                    game2: ''
                });
            }
            const person = unique.get(key);
            if (member.dataset.game === '1') person.game1 = member.dataset.group;
            if (member.dataset.game === '2') person.game2 = member.dataset.group;
        });

        const people = [...unique.values()].sort((a, b) => {
            const aStarts = normalize(a.name).startsWith(query);
            const bStarts = normalize(b.name).startsWith(query);
            return Number(bStarts) - Number(aStarts) || a.name.localeCompare(b.name);
        });

        if (!people.length) {
            results.innerHTML = '<div class="rounded-xl border border-amber-100 bg-amber-50 p-4 text-sm text-amber-800">No matching participant found.</div>';
        } else {
            results.innerHTML = people.slice(0, 10).map(person => `
                <div class="rounded-xl border border-slate-200 bg-white p-4 shadow-sm">
                    <p class="font-semibold text-slate-900">${escapeHtml(person.name)}</p>
                    <p class="mt-1 text-xs text-slate-500">${escapeHtml(person.designation || '')}</p>
                    <p class="mt-1 text-xs text-slate-400">${escapeHtml(person.project || '')}</p>
                    <div class="mt-3 grid grid-cols-2 gap-2">
                        <div class="rounded-lg bg-blue-50 p-2">
                            <p class="text-[10px] font-semibold uppercase tracking-wide text-blue-600">Game 1</p>
                            <p class="mt-1 text-sm font-bold text-blue-900">${escapeHtml(person.game1 || 'Not listed')}</p>
                        </div>
                        <div class="rounded-lg bg-emerald-50 p-2">
                            <p class="text-[10px] font-semibold uppercase tracking-wide text-emerald-600">Game 2</p>
                            <p class="mt-1 text-sm font-bold text-emerald-900">${escapeHtml(person.game2 || 'Not listed')}</p>
                        </div>
                    </div>
                </div>
            `).join('');
            if (people.length > 10) {
                results.innerHTML += '<p class="px-1 text-xs text-slate-500">Showing the first 10 matches. Refine your search for more specific results.</p>';
            }
        }

        results.classList.remove('hidden');
        hint.textContent = `${people.length} matching participant${people.length === 1 ? '' : 's'}.`;
    }

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, char => ({
            '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;'
        })[char]);
    }

    searchInput.addEventListener('input', renderSearch);
    clearButton.addEventListener('click', () => {
        searchInput.value = '';
        renderSearch();
        searchInput.focus();
    });

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const selected = tab.dataset.gameTab;
            tabs.forEach(item => {
                const active = item.dataset.gameTab === selected;
                item.className = active
                    ? 'rounded-xl bg-[#00477A] px-3 py-3 text-sm font-semibold text-white shadow-sm'
                    : 'rounded-xl border border-slate-200 bg-white px-3 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50';
            });
            panels.forEach(panel => panel.classList.toggle('hidden', panel.dataset.gamePanel !== selected));
        });
    });
})();
</script>

@include('components.bottom-nav')

@endsection
