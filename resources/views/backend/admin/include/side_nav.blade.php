<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                {{--  Setup  --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSetup"
                   aria-expanded="false" aria-controls="collapseSetup">
                    <div class="sb-nav-link-icon"><i class="fa fa-cogs"></i></div>
                    Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSetup" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Customer</a>
                        <a class="nav-link" href="#">Department</a>
                        <a class="nav-link" href="#">Designation</a>
                        <a class="nav-link" href="#">Site</a>
                    </nav>
                </div>
                {{--  Employees  --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmployee"
                   aria-expanded="false" aria-controls="collapseEmployee">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Employees
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEmployee" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('add.employee')}}">Add Employee</a>
                        <a class="nav-link" href="{{route('employee')}}">Employee List</a>
                    </nav>
                </div>
                {{--   Advance History  --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdvance"
                   aria-expanded="false" aria-controls="collapseAdvance">
                    <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                    Advance History
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdvance" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Advance History List</a>
                        <a class="nav-link" href="#">Advance History Approval List</a>
                    </nav>
                </div>
                {{--   Bill   --}}
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBill"
                   aria-expanded="false" aria-controls="collapseBill">
                    <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                    Bills
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseBill" aria-labelledby="headingOne"
                     data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Advance Bill List</a>
                        <a class="nav-link" href="#">Advance Bill Approval List </a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">HS Engineering & Technology Ltd.</div>
        </div>
    </nav>
</div>
