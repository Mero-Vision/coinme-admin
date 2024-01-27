 <div class="sidebar" id="sidebar">
     <div class="sidebar-inner slimscroll">
         <div id="sidebar-menu" class="sidebar-menu">
             <ul>
                 <li class="menu-title">Main</li>
                 <li class="{{ request()->is('admin/dashboard') ? 'active' : null }}">
                     <a href="{{ url('admin/dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                 </li>

                 @if (auth()->user()->status == 'admin')
                     <li class="submenu {{ request()->is('admin/users*') ? 'active' : null }}">
                         <a href="#"><i class="fa fa-user"></i> <span> Clients </span> <span
                                 class="menu-arrow"></span></a>
                         <ul style="display: none;">
                             <li><a href="{{ url('admin/users') }}">Client List</a></li>
                             <li><a href="{{ url('admin/users/view-recharge-pending') }}">Recharge Pending</a></li>
                             <li><a href="{{ url('admin/users/recharge-history') }}">Recharge History</a></li>

                         </ul>
                     </li>
                 @endif

                 @if (auth()->user()->status == 'admin')
                     <li class="submenu {{ request()->is('admin/crypto-currency*') ? 'active' : null }}">
                         <a href="#"><i class="fa fa-btc"></i> <span> Crypto Currency</span> <span
                                 class="menu-arrow"></span></a>
                         <ul style="display: none;">
                             {{-- <li class="{{ request()->is('admin/crypto-currency/create') ? 'active' : null }}"><a
                                     href="{{ url('admin/crypto-currency/create') }}">Create Currency</a></li> --}}
                             <li class="{{ request()->is('admin/crypto-currency/view') ? 'active' : null }}"><a
                                     href="{{ url('admin/crypto-currency/view') }}">View Currency List</a></li>


                         </ul>
                     </li>
                 @endif




                 <li class="{{ request()->is('admin/contact_us') ? 'active' : null }}">
                     <a href="{{ url('admin/contact_us') }}"><i class='bx bxs-phone-call'></i> <span>Contact
                             Us</span></a>
                 </li>




                 <li class="submenu {{ request()->is('admin/trading*') ? 'active' : null }}">
                     <a href="#"><i class='bx bxl-bitcoin'></i> <span> Trading Market</span> <span
                             class="menu-arrow"></span></a>
                     <ul style="display: none;">
                         <li class="{{ request()->is('admin/delivery-time') ? 'active' : null }}"><a
                                 href="{{ url('admin/delivery-time') }}">Delivery Time</a></li>
                         <li class="{{ request()->is('admin/trading/margin-percent') ? 'active' : null }}"><a
                                 href="{{ url('admin/trading/margin-percent') }}">Margin Percent</a></li>


                     </ul>
                 </li>

                 <li class="submenu {{ request()->is('admin/order*') ? 'active' : null }}">
                     <a href="#"><i class='bx bxs-receipt'></i> <span> Order Management</span> <span
                             class="menu-arrow"></span></a>
                     <ul style="display: none;">
                         <li class="{{ request()->is('admin/order/withdrawal-records') ? 'active' : null }}"><a
                                 href="{{ url('admin/order/withdrawal-records') }}">Withdrawal Records</a></li>

                     </ul>
                 </li>



                 <li>
                     <a href="{{ url('admin/chat') }}"><i class="fa fa-comments"></i> <span>Chat</span> <span
                             class="badge badge-pill bg-primary float-right">5</span></a>
                 </li>

                 @if (auth()->user()->status == 'admin')
                     <li class="submenu">
                         <a href="#"><i class="fa fa-envelope"></i> <span> Email</span> <span
                                 class="menu-arrow"></span></a>
                         <ul style="display: none;">
                             <li><a href="{{ url('admin/email/compose') }}">Compose Mail</a></li>
                             <li><a href="{{ url('admin/email/send-email') }}">View Send Email</a></li>
                             <li><a href="{{ url('admin/email/trash') }}">View Trash</a></li>

                         </ul>
                     </li>
                 @endif

                 @if (auth()->user()->status == 'admin')
                     <li class="{{ request()->is('admin/settings*') ? 'active' : null }}">
                         <a href="{{ url('admin/settings') }}"><i class="fa fa-cog"></i> <span>Settings</span></a>
                     </li>
                 @endif








             </ul>
         </div>
     </div>
 </div>
