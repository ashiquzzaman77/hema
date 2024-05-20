<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Ecommerce</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class='bx bx-radio-circle'></i>Email</a>
                </li>
                <li> <a href="app-chat-box.html"><i class='bx bx-radio-circle'></i>Chat Box</a>
                </li>
                <li> <a href="app-file-manager.html"><i class='bx bx-radio-circle'></i>File Manager</a>
                </li>
                <li> <a href="app-contact-list.html"><i class='bx bx-radio-circle'></i>Contatcs</a>
                </li>
                <li> <a href="app-to-do.html"><i class='bx bx-radio-circle'></i>Todo List</a>
                </li>
                <li> <a href="app-invoice.html"><i class='bx bx-radio-circle'></i>Invoice</a>
                </li>
                <li> <a href="app-fullcalender.html"><i class='bx bx-radio-circle'></i>Calendar</a>
                </li>
            </ul>
        </li> --}}

        <li class="menu-label">Backend Section</li>

        {{-- Coupon Section  --}}
        @if (Auth::user()->can('coupon.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Coupon</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('all.coupon') }}"><i class='bx bx-radio-circle'></i>All Coupon</a>
                    </li>

                </ul>
            </li>
        @endif
        {{-- Coupon Section  --}}

        {{-- Product Section  --}}
        @if (Auth::user()->can('product.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Product</div>
                </a>
                <ul>

                    @if (Auth::user()->can('all.product'))
                        <li>
                            <a href="{{ route('all.product') }}"><i class='bx bx-radio-circle'></i>All Product</a>
                        </li>
                    @endif

                </ul>
            </li>

        @endif
        {{-- Product Section  --}}

        {{-- Brand Section  --}}
        @if (Auth::user()->can('brand.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Brand</div>
                </a>
                <ul>

                    @if (Auth::user()->can('all.brand'))
                        <li>
                            <a href="{{ route('all.brand') }}"><i class='bx bx-radio-circle'></i>All Brand</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Brand Section  --}}

        {{-- Category Section  --}}
        @if (Auth::user()->can('category.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Category</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.category'))
                        <li>
                            <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Category Section  --}}

        {{-- SubCategory Section  --}}
        @if (Auth::user()->can('subcategory.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">SubCategory</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.subcategory'))
                        <li>
                            <a href="{{ route('all.subcategory') }}"><i class='bx bx-radio-circle'></i>All
                                SubCategory</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- SubCategory Section  --}}

        {{-- Slider Section  --}}
        @if (Auth::user()->can('slider.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Slider</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.slider'))
                        <li>
                            <a href="{{ route('all.slider') }}"><i class='bx bx-radio-circle'></i>All Slider</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Slider Section  --}}

        {{-- Banner Section  --}}
        @if (Auth::user()->can('banner.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Banner</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.banner'))
                        <li>
                            <a href="{{ route('all.banner') }}"><i class='bx bx-radio-circle'></i>All Banner</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Banner Section  --}}

        {{-- Testimonial Section  --}}
        @if (Auth::user()->can('testimonial.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Testimonial</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.testimonial'))
                        <li>
                            <a href="{{ route('all.testimonial') }}"><i class='bx bx-radio-circle'></i>All
                                Testimonial</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Testimonial Section  --}}

        {{-- Sitting Section  --}}
        @if (Auth::user()->can('sitting.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Sitting</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.sitting'))
                        <li>
                            <a href="{{ route('all.sitting') }}"><i class='bx bx-radio-circle'></i>All Sitting</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Sitting Section  --}}


        <li class="menu-label">Managed Section</li>

        {{-- Product Stock  --}}
        @if (Auth::user()->can('stock.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Stock</div>
                </a>
                <ul>

                    @if (Auth::user()->can('all.stock'))
                        <li>
                            <a href="{{ route('all.product.stock') }}"><i class='bx bx-radio-circle'></i>Stock
                                Product</a>
                        </li>
                    @endif

                </ul>
            </li>

        @endif
        {{-- Product Stock  --}}

        {{-- SMTP Section  --}}
        @if (Auth::user()->can('smtp.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">SMTP</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.smtp'))
                        <li>
                            <a href="{{ route('all.smtp') }}"><i class='bx bx-radio-circle'></i>SMTP</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- SMTP Section  --}}

        {{-- Order Section  --}}
        @if (Auth::user()->can('order.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Order</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('all.order') }}"><i class='bx bx-radio-circle'></i>All Order</a>
                    </li>

                    <li>
                        <a href="{{ route('confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Order</a>
                    </li>

                    <li>
                        <a href="{{ route('processing.order') }}"><i class='bx bx-radio-circle'></i>Processing
                            Order</a>
                    </li>

                    <li>
                        <a href="{{ route('deliver.order') }}"><i class='bx bx-radio-circle'></i>Deliver Order</a>
                    </li>

                    <li>
                        <a href="{{ route('admin.return.order') }}"><i class='bx bx-radio-circle'></i>Return
                            Order</a>
                    </li>

                </ul>
            </li>
        @endif
        {{-- Order Section  --}}

        {{-- Report Section  --}}
        @if (Auth::user()->can('report.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Report</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.report'))
                        <li>
                            <a href="{{ route('all.report') }}"><i class='bx bx-radio-circle'></i>Report</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Report Section  --}}

        {{-- Client Section  --}}
        @if (Auth::user()->can('client.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Client</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('all.vendor') }}"><i class='bx bx-radio-circle'></i>Vendor</a>
                    </li>

                    <li>
                        <a href="{{ route('all.user') }}"><i class='bx bx-radio-circle'></i>User</a>
                    </li>
                </ul>
            </li>
        @endif
        {{-- Client Section  --}}

        {{-- Shipping Section  --}}
        @if (Auth::user()->can('shiping.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Shipping</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('all.division') }}"><i class='bx bx-radio-circle'></i>All Division</a>
                    </li>

                    <li>
                        <a href="{{ route('all.district') }}"><i class='bx bx-radio-circle'></i>All Division</a>
                    </li>

                    <li>
                        <a href="{{ route('all.state') }}"><i class='bx bx-radio-circle'></i>All State</a>
                    </li>

                </ul>
            </li>
        @endif
        {{-- Shipping Section  --}}

        {{-- Review Section  --}}
        @if (Auth::user()->can('review.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Review</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.review'))
                        <li>
                            <a href="{{ route('all.review') }}"><i class='bx bx-radio-circle'></i>Review</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Review Section  --}}

        {{-- Contact Section  --}}
        @if (Auth::user()->can('contact.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Contact</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.contact'))
                        <li>
                            <a href="{{ route('all.contact') }}"><i class='bx bx-radio-circle'></i>Contact</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Contact Section  --}}

        {{-- Subscribe Section  --}}
        @if (Auth::user()->can('subscribe.menu'))

            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Subscribe</div>
                </a>
                <ul>
                    @if (Auth::user()->can('all.subscribe'))
                        <li>
                            <a href="{{ route('all.subscribe') }}"><i class='bx bx-radio-circle'></i>Subscribe</a>
                        </li>
                    @endif
                </ul>
            </li>

        @endif
        {{-- Subscribe Section  --}}

        <li class="menu-label">Admin Manage</li>

        {{-- Admin Manage Section  --}}
        @if (Auth::user()->can('admin.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Admin</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a>
                    </li>

                </ul>
            </li>
        @endif
        {{-- Admin Manage Section  --}}

        <li class="menu-label">Role & Permission</li>

        {{-- Role & Permission Section  --}}
        @if (Auth::user()->can('role.menu'))
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class='bx bx-message-square-edit'></i>
                    </div>
                    <div class="menu-title">Role & Permission</div>
                </a>
                <ul>

                    <li>
                        <a href="{{ route('all.permission') }}"><i class='bx bx-radio-circle'></i>All Permission</a>
                    </li>

                    <li>
                        <a href="{{ route('all.role') }}"><i class='bx bx-radio-circle'></i>All Role</a>
                    </li>

                    <li>
                        <a href="{{ route('all.roles.permission') }}"><i class='bx bx-radio-circle'></i>Roles In
                            Permission</a>
                    </li>

                </ul>
            </li>
        @endif
        {{-- Role & Permission Section  --}}


        <li class="menu-label">Others</li>

        <li>
            <a href="javascript:;" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>

    </ul>
    <!--end navigation-->
</div>
