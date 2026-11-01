@extends('layouts.dashboard')

@section('title', 'Transportation')

@section('content')
@php
    /*
     * SCBD 2026 Retreat - Transportation & Participant Distribution Plan
     * Source: "SCBD 2026 Retreat_Transportation and Participant Distribution Plan 3 (1).xlsx"
     *
     * This view is intentionally self-contained. Participant, vehicle, team and
     * support information is hardcoded below from the workbook. No controller,
     * model, migration or database query is required for this page.
     */

    $transportData = [
            'buses' => [
                [
                    'name' => 'Bus 01',
                    'coordinator' => 'Mohammad Nahidul Islam',
                    'outbound_count' => 18,
                    'return_count' => 19,
                    'participants' => [
                        [
                            'name' => 'Mohammed Helal Hussain',
                            'designation' => 'Country Director',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1717 023 844',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Bidowra Tahmin Khan',
                            'designation' => 'Team Leader',
                            'department' => 'InSPIRE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1714 075 475',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Liton Mazumder',
                            'designation' => 'Sr. Officer - ICT',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1674 358 675',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Samira Sifat Swarna',
                            'designation' => 'Officer - Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+88 01625278330',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Anik Saha',
                            'designation' => 'Sr. Officer - Field Operations',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => false,
                            'role' => null,
                            'contact' => '+880 1711 035 005',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Mohammad Nahidul Islam',
                            'designation' => 'Sr. Officer - Finance',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => 'Bus Coordinator',
                            'contact' => '+880 1675 462 948',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Sabrina Alamgir',
                            'designation' => 'Senior Officer - MRM',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1877 316 724',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Nowshin Anjum',
                            'designation' => 'Coordinator, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Advance Team',
                            'contact' => '+880 1741 350 448',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Rukhen Uddin Ahmed',
                            'designation' => 'Senior Adviser for Public Sector Engagement',
                            'department' => 'PRABRIDDHI',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711 161 691',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Syed Abu Sufian',
                            'designation' => 'Senior Manager - Municipalities',
                            'department' => 'PRABRIDDHI',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1726 340 088',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Shohidul Alam',
                            'designation' => 'Manager, Business Administration',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711 392 176',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Mohtahsam Billah',
                            'designation' => 'Sr. Manager, MRM & KCM',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1869 729 697',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Nadira Anzum',
                            'designation' => 'Officer - MRM and KCM',
                            'department' => 'PROGRESS',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Ice-breaking Team',
                            'contact' => '+88 01841986940',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Mahboob Uddin Neon',
                            'designation' => 'Senior Officer, MRM and  KCM',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1703 373 952',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Azmul Huda',
                            'designation' => 'Manager, MRM and KEL',
                            'department' => 'InSPIRE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1619 320 530',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Md. Abir Hossain',
                            'designation' => 'Sr. Officer-Finance',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1740 629 603',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Salmun Nahar Aishi',
                            'designation' => 'Intern (Full-Term)',
                            'department' => 'CBFT_HILTI',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801962549032',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Laila Akther',
                            'designation' => 'Office Assistant',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1687 072 220',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Md Shahidul Islam',
                            'designation' => 'Driver',
                            'department' => 'SMILE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1729 770 962',
                            'bus' => 'Bus 01',
                        ],
                        [
                            'name' => 'Photographer - 1',
                            'designation' => 'Photographer',
                            'department' => '',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '0',
                            'bus' => 'Bus 01',
                        ],
                    ],
                ],
                [
                    'name' => 'Bus 02',
                    'coordinator' => 'Nithora Mehrab',
                    'outbound_count' => 18,
                    'return_count' => 19,
                    'participants' => [
                        [
                            'name' => 'Syeda Ishrat Fatema',
                            'designation' => 'Deputy Country Director',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1717 934 361',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Abul Basar',
                            'designation' => 'Team Leader',
                            'department' => 'SHOMPRITEE',
                            'outbound' => true,
                            'return' => false,
                            'role' => null,
                            'contact' => '+880 1911633450',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Md. Asifur Rahaman',
                            'designation' => 'Coordinator - Procurement & Government Relations',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1733 855 295',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Saika Binte Islam',
                            'designation' => 'Sr. Officer – Portfolio and Communications',
                            'department' => 'CoOf',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Ice-breaking Team',
                            'contact' => '+880 1770 429 452',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Sharmin Akter',
                            'designation' => 'Coordinator, Finance and Accounts',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1620 173 008',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Nithora Mehrab',
                            'designation' => 'Sr. Officer - Public Partnership & Advocacy',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => 'Bus Coordinator',
                            'contact' => '+8801521319102',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Tawhidul Anwar',
                            'designation' => 'Senior Officer - Partnership and Trade',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1521 327 906',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Swopnil Louis Cruze',
                            'designation' => 'Officer - Partnership & Local Implementation',
                            'department' => 'SHOMPRITEE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1980234779',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Nazmul Haque',
                            'designation' => 'Senior Officer - Finance',
                            'department' => 'PRABRIDDHI',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1684 695 778',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Salma Akhtar',
                            'designation' => 'Advisor, Advocacy and KEL',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+88 01781 400 438',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Sabbir Rahman Khan',
                            'designation' => 'Manager - MRM & KCM',
                            'department' => 'PROGRESS',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Advance Team',
                            'contact' => '+880 1964 593 658',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Sabrina Fatema Chowdhury',
                            'designation' => 'Senior Officer, MRM',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1795 817 798',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Nahid Farhana Rahman',
                            'designation' => 'Senior Officer, Business Administration',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1921 290 589',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Md. Tonmoy Hasan',
                            'designation' => 'Senior Officer, Business Administration',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1717 061 941',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Nazim  Reza',
                            'designation' => 'Manager, Programme',
                            'department' => 'InSPIRE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1825573749',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Parmita Ray',
                            'designation' => 'Sr. Officer-Skills & Training Implementation',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1964 954 984',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Mir Rafiat Salman',
                            'designation' => 'Sr. Manager - Partnership & Implementation',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1741 886 844',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Mahafuz Rahman Khandker',
                            'designation' => 'Driver',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1718 141 159',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Md. Hafizur Rahman',
                            'designation' => 'Office Assistant',
                            'department' => 'PRABRIDDHI',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1724 947 230',
                            'bus' => 'Bus 02',
                        ],
                        [
                            'name' => 'Photographer - 2',
                            'designation' => 'Photographer',
                            'department' => '',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '0',
                            'bus' => 'Bus 02',
                        ],
                    ],
                ],
                [
                    'name' => 'Bus 03',
                    'coordinator' => 'Tanzeel Rashid',
                    'outbound_count' => 18,
                    'return_count' => 20,
                    'participants' => [
                        [
                            'name' => 'Tamiz Uddin Mullick',
                            'designation' => 'Head of Business Administration',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1673 685 680',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Md. Makbul Hossain',
                            'designation' => 'Sr. Technical Advisor',
                            'department' => 'EARN',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1741 339 473',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Romana Sanjida Akter',
                            'designation' => 'Sr. Coordinator - HR',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1776 426 033',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Md. Ashikujjaman',
                            'designation' => 'Sr. Coordinator-Implementation',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1717 292 218',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Nahian Iftekhar Alam',
                            'designation' => 'Coordinator - Partnership & Innovation',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1764 195 855',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Noshin Fariha',
                            'designation' => 'Officer - Access to Finance',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1736 277 313',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Ahmed Rifat Kabir Sristy',
                            'designation' => 'Coordinator - Trade Facilitation',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1783 429 171',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Md. Marjad Mir Kameli',
                            'designation' => 'Sr. Manager - MEL',
                            'department' => 'GO4IMPact',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1719 403 277',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'A.S. Nur Ahmed',
                            'designation' => 'Specialist - Field Operations',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711 198 387',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Nahin Ferdous',
                            'designation' => 'Senior Manager - Institutionalization & Advocacy',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1758 387 970',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'T M Abu Saleh',
                            'designation' => 'Manager, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1949 757 437',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Tanzeel Rashid',
                            'designation' => 'Senior Officer, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => 'Bus Coordinator',
                            'contact' => '+880 1819 984 879',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Araf Al Mehedi',
                            'designation' => 'Officer - MRM and KCM',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+88 01783076798',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Rubayet Alam Kusum',
                            'designation' => 'Sr. Officer - Admin & Logistics',
                            'department' => 'CoOf',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Advance Team',
                            'contact' => '+880 1737 609 255',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Nazmur Rashid Tonmoy',
                            'designation' => 'Senior Officer, Programme',
                            'department' => 'InSPIRE',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Ice-breaking Team',
                            'contact' => '+880 1688 238 750',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Rabeya Khatun',
                            'designation' => 'Sr.Officer-Procurement & Logistics',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1714 230 832',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Faisal Mina',
                            'designation' => 'Consultant (Full-Term)',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801724436632',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Md. Monir Hossain',
                            'designation' => 'Driver',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1716 341 953',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Masud Parvez',
                            'designation' => 'Office Assistant',
                            'department' => 'SHOMPRITEE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1718 585 880',
                            'bus' => 'Bus 03',
                        ],
                        [
                            'name' => 'Photographer - 3',
                            'designation' => 'Photographer',
                            'department' => '',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '0',
                            'bus' => 'Bus 03',
                        ],
                    ],
                ],
                [
                    'name' => 'Bus 04',
                    'coordinator' => 'Nayeem Shahriar',
                    'outbound_count' => 17,
                    'return_count' => 19,
                    'participants' => [
                        [
                            'name' => 'Farzana Amin',
                            'designation' => 'Team Leader',
                            'department' => 'PROGRESS & TRACE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1339 563 232',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Nadia Afrin Shams',
                            'designation' => 'Team Leader',
                            'department' => 'BYETS & SMILE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1741 666 244',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Sukanta Saha',
                            'designation' => 'Regional Corporate Project Accountant',
                            'department' => 'Regional Office',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+88 01715168735',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Suraiya Rashed Runa',
                            'designation' => 'Sr. Coordinator - Finance',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1912 111 078',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Sibbir Riyan',
                            'designation' => 'Sr. Officer - Business Development',
                            'department' => 'CoOf',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Advance Team',
                            'contact' => '+880 1736 059 635',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Ali Moahmmad Moyeth',
                            'designation' => 'Sr. Officer - MRM & KCM',
                            'department' => 'SHOMPRITEE',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Ice-breaking Team',
                            'contact' => '+880 1534 569 251',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Moumita A Mallick',
                            'designation' => 'Consultant (Full-Term)',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801797044444',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Saiduzzaman Pulak',
                            'designation' => 'Specialist - Private Sector Engagement',
                            'department' => 'GO4IMPact',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1915 721 015',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Md. Mahfuzul Hauque',
                            'designation' => 'Community Engagement and Socio-Emotional Behavior Expert',
                            'department' => 'EARN',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801717515516',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Md.Tawhidul Islam',
                            'designation' => 'Senior Manager, MRM and KCM',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1673 859 689',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Shakif Ahmed',
                            'designation' => 'Coordinator - KCM & MRM',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1301 984 457',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Seyam Rabbi',
                            'designation' => 'Senior Officer - Product Development',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+88 01837351771',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Ahsan Habib',
                            'designation' => 'Senior Officer, Business Administration',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1730 715 318',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Nayeem Shahriar',
                            'designation' => 'Officer - Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => 'Bus Coordinator',
                            'contact' => '+88 01521392560',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Syed Sabit Tamim',
                            'designation' => 'Sr.Officer-MRM & Communication',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1714 754 103',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Neeladri',
                            'designation' => 'Consultant (Full-Term)',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801798838858',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Jhorna Sangma',
                            'designation' => 'Office Assistant',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1827 699 862',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Sayed Monirul Hossain',
                            'designation' => 'Driver',
                            'department' => 'PRABRIDDHI',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1712 162 856',
                            'bus' => 'Bus 04',
                        ],
                        [
                            'name' => 'Photographer - 4',
                            'designation' => 'Photographer',
                            'department' => '',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '0',
                            'bus' => 'Bus 04',
                        ],
                    ],
                ],
                [
                    'name' => 'Bus 05',
                    'coordinator' => 'Farhana Akter Akhi',
                    'outbound_count' => 18,
                    'return_count' => 18,
                    'participants' => [
                        [
                            'name' => 'Md. Alamgir Kabir',
                            'designation' => 'Business Development Advisor',
                            'department' => 'Global Office',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711 107 909',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Parvez Mohammed Asheque',
                            'designation' => 'Head of Programme',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1715 023 044',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Rabiul Islam',
                            'designation' => 'Manager - Business Administration',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1728 961 052',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Rabeya Sultana',
                            'designation' => 'Corporate Budget Controller',
                            'department' => 'Global Office',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 01713 147812',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Warda Ashraf',
                            'designation' => 'Consultant',
                            'department' => 'CoOf',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Advance Team',
                            'contact' => '+8801712666749',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Khairul Islam',
                            'designation' => 'Manager - Field Operations',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => false,
                            'role' => null,
                            'contact' => '+880 1716 587 278',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Anika Noor',
                            'designation' => 'Manager – Pogramme Implementation',
                            'department' => 'SMILE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1975 691 418',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Farhana Akter Akhi',
                            'designation' => 'Officer - Business Administration',
                            'department' => 'SMILE',
                            'outbound' => true,
                            'return' => true,
                            'role' => 'Bus Coordinator',
                            'contact' => '+880 1947786626',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Fahmid Ahmed Khan',
                            'designation' => 'Coordinator – Communications & Knowledge Management',
                            'department' => 'GO4IMPact',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880-1746-485683',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Rupa Debnath',
                            'designation' => 'MEAL Coordinator',
                            'department' => 'CALL PMU',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 171 9567 273',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Jocky Dewan',
                            'designation' => 'Gender and Social Norm Expert',
                            'department' => 'EARN',
                            'outbound' => true,
                            'return' => false,
                            'role' => null,
                            'contact' => null,
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Md. Marajul Islam',
                            'designation' => 'Coordinator, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711085250',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Sayeda Zeenat Karim',
                            'designation' => 'Senior Officer, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1717 273 849',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Humaira Ferdous Shifa',
                            'designation' => 'Senior Officer, MRM and  KCM',
                            'department' => 'PROGRESS',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Ice-breaking Team',
                            'contact' => '+880 1720 296 014',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Suranjan Chandra Dey',
                            'designation' => 'Manager-BA',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1810 045 656',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Projna Dasgupta',
                            'designation' => 'Sr. Officer-Skills and Training Implementation',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1309 318 485',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'S M Emtiaj Mahmud Mumu',
                            'designation' => 'Consultant (Full-Term)',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801600120506',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Milon Shah',
                            'designation' => 'Driver',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1746 257 055',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Md. Aminur Islam',
                            'designation' => 'Office Assistant',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1719 822 679',
                            'bus' => 'Bus 05',
                        ],
                        [
                            'name' => 'Quazi Shuvro Salamat Rahman',
                            'designation' => 'Intern',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1840 857 349',
                            'bus' => 'Bus 05',
                        ],
                    ],
                ],
                [
                    'name' => 'Bus 06',
                    'coordinator' => 'Sunjida Zaman Ria',
                    'outbound_count' => 18,
                    'return_count' => 19,
                    'participants' => [
                        [
                            'name' => 'Abdul Awal',
                            'designation' => 'Team Leader',
                            'department' => 'ASTHA & SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1714 069 255',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Mohammad Sakib Khaled',
                            'designation' => 'Head of Business Development',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1722 021 811',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Pragati Lahiri',
                            'designation' => 'IT Administrator',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1942 666 888',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Abdullah Al Arafat',
                            'designation' => 'Digitalisation Expert',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711 081 454',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Monoj Kumar Roy',
                            'designation' => 'Consultant',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+88 01711661523',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Md. Rezaul Karim',
                            'designation' => 'Sr. Manager - Interventions Portfolio',
                            'department' => 'ASTHA',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1711 148 918',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Abdul Kader',
                            'designation' => 'Sr. Officer - Program Implementation',
                            'department' => 'SMILE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1716 260 158',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Mehreen Adeeba Choudhury',
                            'designation' => 'Sr. Officer -  MRM & Communication',
                            'department' => 'SMILE',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1914 892 381',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Sunjida Zaman Ria',
                            'designation' => 'Officer - Business Administration',
                            'department' => 'SAFE BD',
                            'outbound' => true,
                            'return' => true,
                            'role' => 'Bus Coordinator',
                            'contact' => '+8801744159803',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Md. Bappy Shahrier',
                            'designation' => 'Sr. Manager - MEAL',
                            'department' => 'CALL PMU',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801716135158',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Naznin Begum',
                            'designation' => 'Gender and Social Norm Expert',
                            'department' => 'EARN',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801712919139',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Mohammad Mizanur Rahman',
                            'designation' => 'Community Engagement and Socio-Emotional Behavior Expert',
                            'department' => 'EARN',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+8801671964197',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'M. D.Tahmeed Chowdhury',
                            'designation' => 'Coordinator, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1799 245 265',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Farian Alam',
                            'designation' => 'Officer - Implementation',
                            'department' => 'SAFE BD',
                            'outbound' => false,
                            'return' => true,
                            'role' => 'Advance Team',
                            'contact' => '+880 1552330072',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Tasmim Sinha',
                            'designation' => 'Senior Officer, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1689 225 672',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Nawar Nasar Khan',
                            'designation' => 'Senior Officer, Programme',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1531 261 564',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Zannatul Ferdous Pushpa',
                            'designation' => 'Officer - HR',
                            'department' => 'CoOf',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1829 231 055',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Abu Thaher Siddik',
                            'designation' => 'Sr. Coordinator-Implementation',
                            'department' => 'BYETS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1685 276 880',
                            'bus' => 'Bus 06',
                        ],
                        [
                            'name' => 'Md. Sydul Islam',
                            'designation' => 'Office Assistant',
                            'department' => 'PROGRESS',
                            'outbound' => true,
                            'return' => true,
                            'role' => null,
                            'contact' => '+880 1727 846 870',
                            'bus' => 'Bus 06',
                        ],
                    ],
                ],
            ],
            'advance_team' => [
                'title' => 'Advance Team',
                'coordinator' => 'Sabbir Rahman Khan',
                'participants' => [
                    [
                        'name' => 'Warda Ashraf',
                        'designation' => 'Consultant',
                        'department' => 'CoOf',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus- 5',
                        'vehicle_assigned' => '1. CoOf\n2. Masud, PROGRESS Rent-A-CAR',
                        'contact' => '+8801712666749',
                    ],
                    [
                        'name' => 'Sabbir Rahman Khan',
                        'designation' => 'Manager - MRM & KCM',
                        'department' => 'PROGRESS',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus- 2',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1964 593 658',
                    ],
                    [
                        'name' => 'Nowshin Anjum',
                        'designation' => 'Coordinator, Programme',
                        'department' => 'PROGRESS',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus-1',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1741 350 448',
                    ],
                    [
                        'name' => 'Sibbir Riyan',
                        'designation' => 'Sr. Officer - Business Development',
                        'department' => 'CoOf',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus- 4',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1736 059 635',
                    ],
                    [
                        'name' => 'Rubayet Alam Kusum',
                        'designation' => 'Sr. Officer - Admin & Logistics',
                        'department' => 'CoOf',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus-3',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1737 609 255',
                    ],
                    [
                        'name' => 'Farian Alam',
                        'designation' => 'Officer - Implementation',
                        'department' => 'SAFE BD',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus-6',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1552330072',
                    ],
                ],
            ],
            'icebreaking_team' => [
                'title' => 'Ice-breaking Team',
                'coordinator' => 'Humaira Ferdous Shifa',
                'participants' => [
                    [
                        'name' => 'Humaira Ferdous Shifa',
                        'designation' => 'Senior Officer, MRM and  KCM',
                        'department' => 'PROGRESS',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus 5',
                        'vehicle_assigned' => '1. Nipu Hazra, SAFE BD/CoOf',
                        'contact' => '+880 1720 296 014',
                    ],
                    [
                        'name' => 'Ali Moahmmad Moyeth',
                        'designation' => 'Sr. Officer - MRM & KCM',
                        'department' => 'SHOMPRITEE',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus 4',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1534 569 251',
                    ],
                    [
                        'name' => 'Saika Binte Islam',
                        'designation' => 'Sr. Officer – Portfolio and Communications',
                        'department' => 'CoOf',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus 2',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1770 429 452',
                    ],
                    [
                        'name' => 'Nadira Anzum',
                        'designation' => 'Officer - MRM and KCM',
                        'department' => 'PROGRESS',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus 1',
                        'vehicle_assigned' => null,
                        'contact' => '+88 01841986940',
                    ],
                    [
                        'name' => 'Nazmur Rashid Tonmoy',
                        'designation' => 'Senior Officer, Programme',
                        'department' => 'InSPIRE',
                        'travel_outbound' => true,
                        'return_vehicle' => 'Bus 3',
                        'vehicle_assigned' => null,
                        'contact' => '+880 1688 238 750',
                    ],
                ],
            ],
            'office_support' => [
                [
                    'name' => 'Saiful Islam Milon',
                    'designation' => 'Driver',
                    'department' => 'CoOf',
                    'nov3' => 'Emergency & Logistics Support',
                    'nov5' => 'Emergency & Logistics Support',
                ],
                [
                    'name' => 'Tutul Roy',
                    'designation' => 'Driver',
                    'department' => 'CoOf',
                    'nov3' => 'Assigned to provide emergency transportation and logistics support during the retreat, with Harun-Ar-Rashid',
                    'nov5' => 'Assigned to provide emergency transportation and logistics support during the retreat, with Harun-Ar-Rashid',
                ],
                [
                    'name' => 'Nipu Hazra',
                    'designation' => 'Driver',
                    'department' => 'SAFE BD/CoOf',
                    'nov3' => 'Office to Sarah Resort\n Assigned to provide transportation support for the Ice-breaking Team and assist with other vehicle-related logistics requirements.',
                    'nov5' => 'Sarah Resort to DHA Airport Drop-off\n1. Khairul Islam, ASTHA\n2. Anik Saha, ASTHA\n3. Jocky Dewan, EARN',
                ],
            ],
        ];

    $buses = $transportData['buses'];
    $advanceTeam = $transportData['advance_team'];
    $icebreakingTeam = $transportData['icebreaking_team'];
    $officeSupport = $transportData['office_support'];

    $totalParticipants = collect($buses)->sum(fn ($bus) => count($bus['participants']));
    $outboundTotal = collect($buses)->sum('outbound_count');
    $returnTotal = collect($buses)->sum('return_count');

    $journeys = [
        '2026-11-03' => [
            'title' => 'Dhaka to Sarah Resort',
            'date' => 'Tuesday, 3 November 2026',
            'short' => '3 November',
        ],
        '2026-11-05' => [
            'title' => 'Sarah Resort to Dhaka',
            'date' => 'Thursday, 5 November 2026',
            'short' => '5 November',
        ],
    ];
@endphp

<div class="mx-auto max-w-3xl space-y-8 px-4 pt-6 pb-36 sm:px-6 sm:pb-10">

    {{-- Header --}}
    <div class="flex items-center gap-3">
        <a href="{{ url()->previous() }}"
           class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl text-slate-600 transition hover:bg-slate-100 hover:text-[#00477A]"
           aria-label="Go back">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </a>

        <div>
            <h1 class="text-2xl font-bold text-slate-900 sm:text-3xl">
                Transportation
            </h1>
            <!-- <p class="mt-1 text-sm text-slate-500">
                Swisscontact Bangladesh • Annual Retreat 2026
            </p> -->
        </div>
    </div>

    {{-- Introduction --}}
    <!-- <section class="rounded-2xl border border-blue-100 bg-blue-50 p-5">
        <div class="flex items-start gap-4">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-[#00477A] shadow-sm">
                <i class="fa-solid fa-bus-simple text-xl"></i>
            </div>

            <div>
                <h2 class="text-lg font-bold text-slate-900">
                    Transportation
                </h2>
                <p class="mt-1 text-sm leading-6 text-slate-600">
                    Transportation & Participant Distribution Plan
                </p>
            </div>
        </div>
    </section> -->

    {{-- Quick participant-to-bus lookup --}}
    <section class="space-y-2">
        <div>
            <h2 class="text-base font-bold text-slate-900">Find a participant's bus</h2>
            <p class="text-xs text-slate-500">Search by name to see the assigned bus and coordinator.</p>
        </div>

        <div class="flex w-full items-center gap-3 rounded-xl border border-slate-200 bg-white px-3 py-2 transition">
            <span class="flex h-8 w-5 shrink-0 items-center justify-center text-slate-400" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="7"></circle>
                    <path d="m20 20-4-4"></path>
                </svg>
            </span>

            <input
                id="quick-bus-search"
                type="text"
                autocomplete="off"
                placeholder="Type your name..."
                class="!m-0 !min-w-0 !w-full !flex-1 !border-0 !bg-transparent !p-0 !text-sm !leading-8 !text-slate-900 !shadow-none !outline-none !ring-0 placeholder:!text-slate-400 focus:!border-0 focus:!outline-none focus:!ring-0 focus-visible:!outline-none focus-visible:!ring-0" style="border:0 !important; outline:none !important; box-shadow:none !important;">

            <button
                id="quick-bus-clear"
                type="button"
                class="hidden h-8 w-8 shrink-0 items-center justify-center rounded-full text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                aria-label="Clear search"
                title="Clear search">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    aria-hidden="true">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>

        <div id="quick-bus-results" class="hidden space-y-2" aria-live="polite"></div>
    </section>

    {{-- Header --}}
    <!-- <section class="overflow-hidden rounded-2xl bg-[#00477A] p-5 text-white shadow-sm">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="text-xs font-semibold uppercase tracking-[.16em] text-blue-100">
                    Swisscontact Bangladesh · Retreat 2026
                </p>
                <h1 class="mt-1 text-2xl font-bold">Transportation Plan</h1>
                <p class="mt-1 text-sm text-blue-100">
                    Bus allocation, travel teams and office vehicle support
                </p>
            </div>
            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white/15">
                <i class="fa-solid fa-bus-simple text-xl"></i>
            </span>
        </div>

        <div class="mt-5 grid grid-cols-2 gap-2 sm:grid-cols-4">
            <div class="rounded-xl bg-white/10 p-3">
                <p class="text-2xl font-bold tabular-nums">{{ count($buses) }}</p>
                <p class="text-[11px] text-blue-100">Buses</p>
            </div>
            <div class="rounded-xl bg-white/10 p-3">
                <p class="text-2xl font-bold tabular-nums">{{ $totalParticipants }}</p>
                <p class="text-[11px] text-blue-100">Roster entries</p>
            </div>
            <div class="rounded-xl bg-white/10 p-3">
                <p class="text-2xl font-bold tabular-nums">{{ $outboundTotal }}</p>
                <p class="text-[11px] text-blue-100">Outbound seats</p>
            </div>
            <div class="rounded-xl bg-white/10 p-3">
                <p class="text-2xl font-bold tabular-nums">{{ $returnTotal }}</p>
                <p class="text-[11px] text-blue-100">Return seats</p>
            </div>
        </div>
    </section> -->

    {{-- Journey selector --}}
    <!-- <section class="space-y-3">
        <div>
            <h2 class="text-base font-bold text-slate-900">Select journey</h2>
            <p class="mt-0.5 text-xs text-slate-500">Bus rosters update according to the selected travel date.</p>
        </div>

        <div class="grid grid-cols-2 gap-2">
            @foreach($journeys as $date => $journey)
                <button type="button"
                        @click="selectedDate = '{{ $date }}'"
                        :class="selectedDate === '{{ $date }}'
                            ? 'border-[#00477A] bg-blue-50 text-[#00477A] ring-1 ring-[#00477A]'
                            : 'border-slate-200 bg-white text-slate-600'"
                        class="rounded-xl border p-3 text-left transition">
                    <span class="block text-sm font-bold">{{ $journey['title'] }}</span>
                    <span class="mt-1 block text-[11px] opacity-75">{{ $journey['date'] }}</span>
                </button>
            @endforeach
        </div>
    </section> -->

    {{-- Search --}}
    <!-- <label class="relative block">
        <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
        <input type="search"
               x-model.debounce.150ms="search"
               placeholder="Search participant, designation, department, bus or coordinator..."
               class="w-full rounded-xl border border-slate-200 bg-white py-3 pl-11 pr-4 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">
    </label> -->

    {{-- Bus allocation --}}
    <section class="space-y-3">
        <div class="flex items-center justify-between gap-3">
            <div>
                <h2 class="text-base font-bold text-slate-900">Bus allocation</h2>
                <p class="text-xs text-slate-500" x-text="selectedDate === '2026-11-03' ? 'Outbound · 3 November 2026' : 'Return · 5 November 2026'"></p>
            </div>
        </div>

        @foreach($buses as $bus)
            <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm"
                     data-bus-card
                     data-bus-search="{{ strtolower($bus['name'].' '.$bus['coordinator']) }}">
                <details>
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-3 p-4 [&::-webkit-details-marker]:hidden">
                        <span class="flex min-w-0 items-center gap-3">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#00477A]">
                                <i class="fa-solid fa-bus text-lg"></i>
                            </span>
                            <span class="min-w-0">
                                <span class="block font-bold text-slate-900">{{ $bus['name'] }}</span>
                                <span class="mt-0.5 block truncate text-xs text-slate-500">
                                    Coordinator: {{ $bus['coordinator'] }}
                                </span>
                            </span>
                        </span>
                        <span class="flex shrink-0 items-center gap-2">
                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-bold text-slate-700"
                                  x-text="selectedDate === '2026-11-03' ? '{{ $bus['outbound_count'] }}' : '{{ $bus['return_count'] }}'"></span>
                            <i class="fa-solid fa-chevron-down text-xs text-slate-400"></i>
                        </span>
                    </summary>

                    <div class="border-t border-slate-100">
                        <div class="flex flex-wrap items-center justify-between gap-2 bg-slate-50 px-4 py-2.5">
                            <span class="text-xs text-slate-600">
                                <i class="fa-solid fa-user-tie mr-1 text-slate-400"></i>
                                {{ $bus['coordinator'] }}
                            </span>
                            <span class="text-[11px] text-slate-500">
                                {{ count($bus['participants']) }} allocated in workbook
                            </span>
                        </div>

                        <div class="divide-y divide-slate-100">
                            @foreach($bus['participants'] as $person)
                                <div class="transport-person flex items-start justify-between gap-3 px-4 py-3"
                                     data-person
                                     data-person-name="{{ strtolower($person['name']) }}"
                                     data-bus-name="{{ $bus['name'] }}"
                                     data-bus-coordinator="{{ $bus['coordinator'] }}"
                                     data-outbound="{{ $person['outbound'] ? '1' : '0' }}"
                                     data-return="{{ $person['return'] ? '1' : '0' }}"
                                     data-search="{{ strtolower($person['name'].' '.$person['designation'].' '.$person['department'].' '.$bus['name'].' '.$bus['coordinator'].' '.($person['role'] ?? '')) }}">
                                    <div class="min-w-0">
                                        <p class="text-sm font-semibold text-slate-800">{{ $person['name'] }}</p>
                                        <p class="mt-0.5 text-xs leading-5 text-slate-500">
                                            {{ $person['designation'] ?: 'Designation not provided' }}
                                            @if($person['department'])
                                                <span class="text-slate-300">·</span> {{ $person['department'] }}
                                            @endif
                                        </p>

                                        @if($person['role'])
                                            <span class="mt-1.5 inline-flex rounded-full px-2 py-0.5 text-[10px] font-semibold
                                                {{ $person['role'] === 'Bus Coordinator' ? 'bg-blue-50 text-blue-700' : ($person['role'] === 'Advance Team' ? 'bg-amber-50 text-amber-700' : 'bg-violet-50 text-violet-700') }}">
                                                {{ $person['role'] }}
                                            </span>
                                        @endif
                                    </div>

                                    @if($person['contact'] && $person['contact'] !== '0')
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $person['contact']) }}"
                                           class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700"
                                           aria-label="Call {{ $person['name'] }}">
                                            <i class="fa-solid fa-phone text-xs"></i>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </details>
            </article>
        @endforeach

        <p id="transport-no-results" class="hidden rounded-xl border border-dashed border-slate-300 p-5 text-center text-sm text-slate-500">
            No matching participants found for this journey.
        </p>
    </section>

    {{-- Advance and Ice-breaking teams --}}
    {{-- Advance and Ice-breaking teams --}}
<section class="space-y-3">
    <div>
        <h2 class="text-base font-bold text-slate-900">Special travel teams</h2>
        <p class="text-xs text-slate-500">Separate team allocations as listed in the workbook.</p>
    </div>

    @foreach([$advanceTeam, $icebreakingTeam] as $team)
        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <details class="group">
                <summary class="flex cursor-pointer list-none items-center gap-3 p-4 [&::-webkit-details-marker]:hidden">

                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl {{ $team['title'] === 'Advance Team' ? 'bg-amber-50 text-amber-700' : 'bg-violet-50 text-violet-700' }}">
                        <i class="fa-solid {{ $team['title'] === 'Advance Team' ? 'fa-people-arrows-left-right' : 'fa-people-group' }}"></i>
                    </span>

                    <div class="min-w-0 flex-1">
                        <h3 class="text-sm font-bold text-slate-900">{{ $team['title'] }}</h3>
                        <p class="mt-0.5 text-xs text-slate-500">
                            Coordinator: {{ $team['coordinator'] }}
                        </p>
                    </div>

                    <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-semibold text-slate-600">
                        {{ count($team['participants']) }}
                    </span>

                    <i class="fa-solid fa-chevron-down text-xs text-slate-400 transition-transform duration-200 group-open:rotate-180"></i>

                </summary>

                <div class="border-t border-slate-100 divide-y divide-slate-100">

                    @foreach($team['participants'] as $person)
                        <div class="px-4 py-3">

                            <div class="flex items-start justify-between gap-3">
                                <div class="min-w-0">
                                    <p class="text-sm font-semibold text-slate-800">
                                        {{ $person['name'] }}
                                    </p>

                                    <p class="mt-0.5 text-xs leading-5 text-slate-500">
                                        {{ $person['designation'] }}

                                        @if($person['department'])
                                            <span class="text-slate-300">·</span>
                                            {{ $person['department'] }}
                                        @endif
                                    </p>
                                </div>

                                @if($person['contact'])
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $person['contact']) }}"
                                       class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-emerald-50 text-emerald-700"
                                       aria-label="Call {{ $person['name'] }}">
                                        <i class="fa-solid fa-phone text-xs"></i>
                                    </a>
                                @endif
                            </div>

                            <div class="mt-2 grid gap-2 text-xs sm:grid-cols-2">

                                <div class="rounded-lg bg-slate-50 p-2.5">
                                    <p class="mb-1 font-semibold text-slate-600">
                                        {{ $team['title'] === 'Advance Team' ? '2 November travel' : '3 November travel' }}
                                    </p>

                                    <span class="text-slate-700">
                                        {{ $person['travel_outbound'] ? 'Travelling' : 'Not travelling' }}
                                    </span>

                                    @if($person['vehicle_assigned'])
                                        <p class="mt-1 whitespace-pre-line leading-5 text-slate-500">
                                            {{ $person['vehicle_assigned'] }}
                                        </p>
                                    @endif
                                </div>

                                <div class="rounded-lg bg-slate-50 p-2.5">
                                    <p class="mb-1 font-semibold text-slate-600">
                                        5 November return
                                    </p>

                                    <span class="whitespace-pre-line leading-5 text-slate-700">
                                        {{ $person['return_vehicle'] ?: 'No return vehicle specified' }}
                                    </span>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </details>
        </article>
    @endforeach
</section>


{{-- Office vehicle support --}}
<section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

    <details class="group">

        <summary class="flex cursor-pointer list-none items-center gap-3 bg-slate-50/70 p-4 [&::-webkit-details-marker]:hidden">

            <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-orange-50 text-orange-700">
                <i class="fa-solid fa-car-side"></i>
            </span>

            <div class="min-w-0 flex-1">
                <h2 class="text-sm font-bold text-slate-900">
                    Office Vehicle Support
                </h2>
                <p class="text-xs text-slate-500">
                    Emergency and logistics support
                </p>
            </div>

            <span class="rounded-full bg-white px-2.5 py-1 text-xs font-semibold text-slate-600">
                {{ count($officeSupport) }}
            </span>

            <i class="fa-solid fa-chevron-down text-xs text-slate-400 transition-transform duration-200 group-open:rotate-180"></i>

        </summary>

        <div class="border-t border-slate-100 divide-y divide-slate-100">

            @foreach($officeSupport as $driver)
                <div class="px-4 py-3">

                    <p class="text-sm font-semibold text-slate-800">
                        {{ $driver['name'] }}
                    </p>

                    <p class="mt-0.5 text-xs text-slate-500">
                        {{ $driver['designation'] }}
                        @if($driver['department'])
                            <span class="text-slate-300">·</span>
                            {{ $driver['department'] }}
                        @endif
                    </p>

                    <div class="mt-2 grid gap-2 sm:grid-cols-2">

                        <div class="rounded-lg bg-slate-50 p-3">
                            <p class="mb-1 text-xs font-semibold text-slate-600">
                                3 November 2026
                            </p>

                            <p class="whitespace-pre-line text-xs leading-5 text-slate-700">
                                {{ $driver['nov3'] }}
                            </p>
                        </div>

                        <div class="rounded-lg bg-slate-50 p-3">
                            <p class="mb-1 text-xs font-semibold text-slate-600">
                                5 November 2026
                            </p>

                            <p class="whitespace-pre-line text-xs leading-5 text-slate-700">
                                {{ $driver['nov5'] }}
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </details>
</section>
</div>

<script>
(() => {
    function initializeQuickBusSearch() {
        const input = document.getElementById('quick-bus-search');
        const clearButton = document.getElementById('quick-bus-clear');
        const results = document.getElementById('quick-bus-results');

        if (!input || !results || input.dataset.searchInitialized === '1') return;
        input.dataset.searchInitialized = '1';

        const normalize = (value) => String(value || '')
            .toLocaleLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/\s+/g, ' ')
            .trim();

        // Read participant information from the bus roster already rendered on the page.
        const people = Array.from(document.querySelectorAll('[data-person]'))
            .map((row) => ({
                name: row.querySelector('p.text-sm.font-semibold')?.textContent.trim() || '',
                searchName: normalize(row.dataset.personName || row.querySelector('p.text-sm.font-semibold')?.textContent),
                bus: row.dataset.busName || '',
                coordinator: row.dataset.busCoordinator || '',
                outbound: row.dataset.outbound === '1',
                returning: row.dataset.return === '1',
            }))
            .filter((person) => person.name && person.searchName);

        const escapeHtml = (value) => String(value).replace(/[&<>"']/g, (char) => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[char]));

        function renderResults() {
            const query = normalize(input.value);
            const hasQuery = query.length > 0;

            if (clearButton) {
                clearButton.classList.toggle('hidden', !hasQuery);
                clearButton.classList.toggle('flex', hasQuery);
            }

            if (query.length < 3) {
                results.innerHTML = query.length
                    ? `<p class="rounded-xl border border-slate-200 bg-white px-4 py-3 text-xs text-slate-500">Type at least 3 characters to search.</p>`
                    : '';
                results.classList.toggle('hidden', !query.length);
                return;
            }

            const matches = people
                .filter((person) => person.searchName.includes(query))
                .sort((a, b) => {
                    const aStarts = a.searchName.startsWith(query) ? 0 : 1;
                    const bStarts = b.searchName.startsWith(query) ? 0 : 1;

                    if (aStarts !== bStarts) return aStarts - bStarts;
                    return a.name.localeCompare(b.name, undefined, { sensitivity: 'base' });
                });

            results.classList.remove('hidden');

            if (!matches.length) {
                results.innerHTML = `
                    <div class="rounded-xl border border-dashed border-slate-300 bg-white p-4 text-center text-sm text-slate-500">
                        No participant found matching "${escapeHtml(input.value.trim())}".
                    </div>`;
                return;
            }

            results.innerHTML = `
                <p class="px-1 text-xs font-semibold text-slate-500">
                    ${matches.length} matching participant${matches.length === 1 ? '' : 's'}
                </p>
                ${matches.map((person) => `
                    <article class="rounded-xl border border-blue-100 bg-blue-50/70 p-3">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-slate-900">${escapeHtml(person.name)}</p>
                                <p class="mt-1 text-xs text-slate-500">Coordinator: ${escapeHtml(person.coordinator)}</p>
                            </div>
                            <span class="shrink-0 rounded-lg bg-white px-3 py-1.5 text-sm font-bold text-[#00477A]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 inline-block h-4 w-4 align-[-3px]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 6v6m8-6v6M4 12h16M6 18h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"/><path d="M7 18v2m10-2v2M7 15h.01M17 15h.01"/></svg>${escapeHtml(person.bus)}
                            </span>
                        </div>
                        <div class="mt-2 flex flex-wrap gap-2 text-[11px]">
                            <span class="rounded-full px-2.5 py-1 ${person.outbound ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'}">
                                3 Nov: ${person.outbound ? 'Travelling' : 'Not travelling'}
                            </span>
                            <span class="rounded-full px-2.5 py-1 ${person.returning ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500'}">
                                5 Nov: ${person.returning ? 'Travelling' : 'Not travelling'}
                            </span>
                        </div>
                    </article>
                `).join('')}
            `;
        }

        input.addEventListener('input', renderResults);

        clearButton?.addEventListener('click', () => {
            input.value = '';
            renderResults();
            input.focus();
        });
    }

    // Works whether this script loads before or after DOMContentLoaded.
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeQuickBusSearch);
    } else {
        initializeQuickBusSearch();
    }
})();
</script>

@include('components.bottom-nav')
@endsection