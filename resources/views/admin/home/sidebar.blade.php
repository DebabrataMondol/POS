<nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">

                <ul class="side-menu metismenu">
                    <li>
                        <a class="active" href="{{route('home')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Master Setup</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('company-list')}}">Company</a>
                            </li>
                            <li>
                                <a href="{{route('branch-list')}}">Branch</a>
                            </li>
                              <li>
                                <a href="{{route('user')}}">User</a>
                            </li>
                            <li>
                                <a href="{{route('salesman')}}">Sales Man</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Configration</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                                <li>
                                <a href="{{route('candf-list')}}">Account Head Setup</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Customer Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('customer-list')}}">Customer List</a>
                            </li>



                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Supplier Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{route('supplier-list')}}">Supplier List</a>
                            </li>



                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">C&F Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="{{route('candf-list')}}">C&F List</a>
                            </li>


                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">Product's Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('groupsetup')}}">Group</a>
                            </li>
                            <li>
                                <a href="{{route('brandsetup')}}">Brand</a>
                            </li>
                            <li>
                                <a href="{{route('categorystup')}}">Category</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Purchase Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('local-purchase')}}">Local Purchase</a>
                            </li>
                              <li>
                                <a href="{{route('lc-purchase')}}">Lc Purchase</a>
                            </li>

                            <li>
                                <a href="{{route('return-purchases')}}">Purchase Return</a>
                            </li>
                            <li>
                                <a href="{{route('Bardode')}}">Generate Barcode </a>
                            </li>

                        </ul>
                    </li>
                      <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Sales Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('productsale')}}">Product Sales</a>
                            </li>
                              <li>
                                <a href="{{route('productsaleReturn')}}">Sales Return</a>
                            </li>
                        </ul>
                    </li>
                      <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Inventory Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('headofficestock')}}">Head Office Stock</a>
                            </li>
                              <li>
                                <a href="{{route('lc-purchase')}}">Branch Wize Stock</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Stock Transfer </span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('local-purchase')}}">Stock Out</a>
                            </li>
                              <li>
                                <a href="{{route('lc-purchase')}}">Stock Out Return</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                            <span class="nav-label">Account Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('local-purchase')}}">Collection</a>
                            </li>
                              <li>
                                <a href="{{route('lc-purchase')}}">Payment</a>
                            </li>
                             <li>
                                <a href="{{route('lc-purchase')}}">Voucher</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Report Mangement</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">

                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Purchase Report</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="{{route('localpuchasesreport')}}">Local Purchase Report</a>
                                    </li>
                                    <li>
                                        <a href="{{route('lc_report_generate_page')}}">L/C Purchase Report</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">Purchase Return Report</a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Sale Report</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="{{ route('dateWiseReport') }}">Date Wise Report</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="javascript:;">Sales Return Report</a>
                            </li>
                        </ul>
                    </li>

                    <li class="heading">PAGES</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Mailbox</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="mailbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="mail_view.html">Mail view</a>
                            </li>
                            <li>
                                <a href="mail_compose.html">Compose mail</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendar.html"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Calendar</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
