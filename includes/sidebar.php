<?php

echo '
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-color-sidenav" id="sidenavAccordion">    
            <div class="sb-sidenav-menu">
                <div class="text-color text-center mt-3 ">
                    <h6>Hello, '.$_SESSION['role'].'</h6>
                    <hr>
                </div>
                
                ';

                if($_SESSION['role'] == "Administrator")
                {
                    echo '
                    <div class="nav">
                    <li>
                        <a class="nav-link '.($page == 'dashboard.php' ? 'active':'').'" href="../dashboard/dashboard.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="nav-link '.($page == 'staff.php' ? 'active':'').'" href="../staff/staff.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                            Staff
                        </a>
                    </li>
                    <li>
                        <a class="nav-link '.($page == 'resident.php' ? 'active':'').'" href="../resident/resident.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Resident
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed '.($page == 'barangay_clearance.php' || $page == 'business_permit.php' || $page == 'indigency.php' || $page == 'residency.php' || $page == 'solo_parent.php' || $page == 'goodmoral.php' || $page == 'building_permit.php' || $page == 'business_closure.php' || $page == 'late_registration.php' || $page == 'deceased_person.php' || $page == 'living_together.php' || $page == 'same_person.php' || $page == 'patunay_sa_kuryente.php' || $page == 'proof_of_income.php' ? 'active':'').'" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTransaction" aria-expanded="false" aria-controls="collapseTransaction">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Transactions
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        
                        <div class="collapse '.($page == 'barangay_clearance.php' || $page == 'business_permit.php' || $page == 'indigency.php' || $page == 'residency.php' || $page == 'solo_parent.php' || $page == 'goodmoral.php' || $page == 'building_permit.php' || $page == 'business_closure.php' || $page == 'late_registration.php' || $page == 'deceased_person.php' || $page == 'living_together.php' || $page == 'same_person.php' || $page == 'patunay_sa_kuryente.php' || $page == 'proof_of_income.php' ? 'show':'').'" id="collapseTransaction" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link '.($page == 'barangay_clearance.php' ? 'active':'').'" href="../clearances/barangay_clearance.php">Barangay Clearance</a>
                                <a class="nav-link '.($page == 'business_permit.php' ? 'active':'').'" href="../clearances/business_permit.php">Business Permit</a>
                                <a class="nav-link '.($page == 'indigency.php' ? 'active':'').'" href="../clearances/indigency.php">Certificate of Indigency</a>
                                <a class="nav-link '.($page == 'residency.php' ? 'active':'').'" href="../clearances/residency.php">Certificate of Residency</a>
                                <a class="nav-link '.($page == 'solo_parent.php' ? 'active':'').'" href="../clearances/solo_parent.php">Certificate of Solo Parent</a>
                                <a class="nav-link '.($page == 'goodmoral.php' ? 'active':'').'" href="../clearances/goodmoral.php">Certificate of Good Moral</a>
                                <a class="nav-link '.($page == 'building_permit.php' ? 'active':'').'" href="../clearances/building_permit.php">Certificate of Building Permit</a>
                                <a class="nav-link '.($page == 'business_closure.php' ? 'active':'').'" href="../clearances/business_closure.php">Certificate of Business Closure</a>
                                <a class="nav-link '.($page == 'late_registration.php' ? 'active':'').'" href="../clearances/late_registration.php">Certificate of Late Registration</a>
                                <a class="nav-link '.($page == 'deceased_person.php' ? 'active':'').'" href="../clearances/deceased_person.php">Certifcate of Deceased Person</a>
                                <a class="nav-link '.($page == 'living_together.php' ? 'active':'').'" href="../clearances/living_together.php">Certificate of Living Together</a>
                                <a class="nav-link '.($page == 'same_person.php' ? 'active':'').'" href="../clearances/same_person.php">Certifcate of Same Person</a>
                                <a class="nav-link '.($page == 'patunay_sa_kuryente.php' ? 'active':'').'" href="../clearances/patunay_sa_kuryente.php">Patunay sa Kuryente</a>
                                <a class="nav-link '.($page == 'proof_of_income.php' ? 'active':'').'" href="../clearances/proof_of_income.php">Proof of Income</a>
                            </nav>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link '.($page == 'report.php' ? 'active':'').'" href="../report/report.php">
                            <div class="sb-nav-link-icon"><i class="bi bi-flag-fill"></i></div>
                            Reports
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed '.($page == 'userAccount.php' || $page == 'log-history.php' || $page == 'officials.php' || $page == 'maintenance.php' || $page == 'archive.php' ? 'active':'').'" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSetting" aria-expanded="false" aria-controls="collapseSetting">
                            <div class="sb-nav-link-icon"><i class="bi bi-gear"></i></div>
                            Settings
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                    </li>
                    <li>
                        <div class="collapse '.($page == 'userAccount.php' || $page == 'log-history.php' || $page == 'officials.php' || $page == 'maintenance.php' || $page == 'archive.php' ? 'show':'').'" id="collapseSetting" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link '.($page == 'userAccount.php' ? 'active':'').' " href="../settings/userAccount.php">User Account</a>
                                <a class="nav-link '.($page == 'log-history.php' ? 'active':'').' " href="../settings/log-history.php">Log History</a>
                                <a class="nav-link '.($page == 'officials.php' ? 'active':'').' " href="../officials/officials.php">Barangay Officials</a>
                                <a class="nav-link '.($page == 'maintenance.php' ? 'active':'').' " href="../settings/maintenance.php">Maintenace</a>
                                <a class="nav-link '.($page == 'archive.php' ? 'active':'').' " href="../officials/archive.php">Officials Archive</a>
                            </nav>
                        </div>
                    </li>
                </div>';
                }

                elseif(isset($_SESSION['staff']))
                {
                    echo '
                    <div class="nav">
                    <li>
                        <a class="nav-link '.($page == 'dashboard.php' ? 'active':'').'" href="../dashboard/dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="nav-link '.($page == 'resident.php' ? 'active':'').'" href="../resident/resident.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Resident
                        </a>
                    </li>
                    <li>
                        <a class="nav-link collapsed '.($page == 'barangay_clearance.php' || $page == 'business_permit.php' || $page == 'indigency.php' || $page == 'residency.php' || $page == 'solo_parent.php' || $page == 'goodmoral.php' || $page == 'building_permit.php' || $page == 'business_closure.php' || $page == 'late_registration.php' || $page == 'deceased_person.php' || $page == 'living_together.php' || $page == 'same_person.php' || $page == 'patunay_sa_kuryente.php' || $page == 'proof_of_income.php' ? 'active':'').'" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTransaction" aria-expanded="false" aria-controls="collapseTransaction">
                            <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                            Transactions
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse '.($page == 'barangay_clearance.php' || $page == 'business_permit.php' || $page == 'indigency.php' || $page == 'residency.php' || $page == 'solo_parent.php' || $page == 'goodmoral.php' || $page == 'building_permit.php' || $page == 'business_closure.php' || $page == 'late_registration.php' || $page == 'deceased_person.php' || $page == 'living_together.php' || $page == 'same_person.php' || $page == 'patunay_sa_kuryente.php' || $page == 'proof_of_income.php' ? 'show':'').'" id="collapseTransaction" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link '.($page == 'barangay_clearance.php' ? 'active':'').'" href="../clearances/barangay_clearance.php">Barangay Clearance</a>
                                <a class="nav-link '.($page == 'business_permit.php' ? 'active':'').'" href="../clearances/business_permit.php">Business Permit</a>
                                <a class="nav-link '.($page == 'indigency.php' ? 'active':'').'" href="../clearances/indigency.php">Certificate of Indigency</a>
                                <a class="nav-link '.($page == 'residency.php' ? 'active':'').'" href="../clearances/residency.php">Certificate of Residency</a>
                                <a class="nav-link '.($page == 'solo_parent.php' ? 'active':'').'" href="../clearances/solo_parent.php">Certificate of Solo Parent</a>
                                <a class="nav-link '.($page == 'goodmoral.php' ? 'active':'').'" href="../clearances/goodmoral.php">Certificate of Good Moral</a>
                                <a class="nav-link '.($page == 'building_permit.php' ? 'active':'').'" href="../clearances/building_permit.php">Certificate of Building Permit</a>
                                <a class="nav-link '.($page == 'business_closure.php' ? 'active':'').'" href="../clearances/business_closure.php">Certificate of Business Closure</a>
                                <a class="nav-link '.($page == 'late_registration.php' ? 'active':'').'" href="../clearances/late_registration.php">Certificate of Late Registration</a>
                                <a class="nav-link '.($page == 'deceased_person.php' ? 'active':'').'" href="../clearances/deceased_person.php">Certifcate of Deceased Person</a>
                                <a class="nav-link '.($page == 'living_together.php' ? 'active':'').'" href="../clearances/living_together.php">Certificate of Living Together</a>
                                <a class="nav-link '.($page == 'same_person.php' ? 'active':'').'" href="../clearances/same_person.php">Certifcate of Same Person</a>
                                <a class="nav-link '.($page == 'patunay_sa_kuryente.php' ? 'active':'').'" href="../clearances/patunay_sa_kuryente.php">Patunay sa Kuryente</a>
                                <a class="nav-link '.($page == 'proof_of_income.php' ? 'active':'').'" href="../clearances/proof_of_income.php">Proof of Income</a>
                            </nav>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link '.($page == 'report.php' ? 'active':'').'" href="../report/report.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-circle"></i></div>
                            Reports
                        </a>
                    </li>
                </div>';
                }
 
            echo '           
            </div>
        </nav>
    </div>';
?>