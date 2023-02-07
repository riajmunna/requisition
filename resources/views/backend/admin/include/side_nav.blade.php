<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                @if(\Illuminate\Support\Facades\Auth::user()->user_type == 'admin')
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
                            <a class="nav-link" href="{{route('customer')}}">Customer</a>
                            <a class="nav-link" href="{{route('department')}}">Department</a>
                            <a class="nav-link" href="{{route('designation')}}">Designation</a>
                            <a class="nav-link" href="{{route('site')}}">Site</a>
                            <a class="nav-link" href="{{route('item')}}">Item</a>
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
                            <a class="nav-link" href="{{route('employee')}}">Employee List</a>
                            <a class="nav-link" href="{{route('add.employee')}}">Add Employee</a>
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
                            <a class="nav-link" href="{{route('advance.history.list')}}">Advance History List</a>
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
                @elseif(\Illuminate\Support\Facades\Auth::user()->user_type == 'employee')
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdvance"
                       aria-expanded="false" aria-controls="collapseAdvance">
                        <div class="sb-nav-link-icon"><i class="fas fa-history"></i></div>
                        Advance History
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseAdvance" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('add.advance.history')}}">Add Advance History</a>
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
                            <a class="nav-link" href="#">Add Advance Bill</a>
                        </nav>
                    </div>

                    {{--   Requisition   --}}
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                       data-bs-target="#collapseRequisition"
                       aria-expanded="false" aria-controls="collapseBill">
                        <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                        Requisition
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseRequisition" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('requisition')}}">Requisition List </a>
                            <a class="nav-link" href="{{route('add.requisition')}}">Add Requisition</a>
                        </nav>
                    </div>
                @else
                @endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">HS Engineering & Technology Ltd.</div>
        </div>
    </nav>
</div>
