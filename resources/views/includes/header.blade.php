<div id="kt_app_header" class="app-header" data-kt-sticky="true" data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize" data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false" style="">
    <div class="app-container container-fluid d-flex align-items-stretch justify-content-between" id="kt_app_header_container">
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
            <div class="btn btn-icon btn-active-color-primary w-35px h-35px" id="kt_app_sidebar_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                <img alt="Logo" src="{{asset('assets/media/logos/default-small.svg')}}" class="h-30px">
            </a>
        </div>
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1" id="kt_app_header_wrapper">
            <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'prepend'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}" style="">
            </div>

            <div class="app-navbar flex-shrink-0">
                <div class="app-navbar-item ms-1 ms-md-4">
                    <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
                        <i class="ki-duotone ki-notification-status fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications" style="">
                        <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url({{asset('assets/media/misc/menu-header-bg.jpg')}})">
                            <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Notifications
                                <span class="fs-8 opacity-75 ps-3">24 reports</span></h3>
                            <ul class="nav nav-line-tabs nav-line-tabs-2x nav-stretch fw-semibold px-9" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_1" aria-selected="false" tabindex="-1" role="tab">Alerts</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4 active" data-bs-toggle="tab" href="#kt_topbar_notifications_2" aria-selected="true" role="tab">Updates</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-white opacity-75 opacity-state-100 pb-4" data-bs-toggle="tab" href="#kt_topbar_notifications_3" aria-selected="false" tabindex="-1" role="tab">Logs</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade" id="kt_topbar_notifications_1" role="tabpanel">
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-primary">
																	<i class="ki-duotone ki-abstract-28 fs-2 text-primary">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Alice</a>
                                                <div class="text-gray-500 fs-7">Phase 1 development</div>
                                            </div>
                                        </div>

                                        <span class="badge badge-light fs-8">1 hr</span>
                                    </div>
                                    <div class="d-flex flex-stack py-4">

                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-danger">
																	<i class="ki-duotone ki-information fs-2 text-danger">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																	</i>
																</span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">HR Confidential</a>
                                                <div class="text-gray-500 fs-7">Confidential staff documents</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">2 hrs</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-warning">
																	<i class="ki-duotone ki-briefcase fs-2 text-warning">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Company HR</a>
                                                <div class="text-gray-500 fs-7">Corporeate staff profiles</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">5 hrs</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-success">
																	<i class="ki-duotone ki-abstract-12 fs-2 text-success">
																		<span class="path1"></span>
																		<span class="path2"></span>
																	</i>
																</span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Redux</a>
                                                <div class="text-gray-500 fs-7">New frontend admin theme</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">2 days</span>

                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-primary">
																	<i class="ki-duotone ki-colors-square fs-2 text-primary">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																	</i>
																</span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Project Breafing</a>
                                                <div class="text-gray-500 fs-7">Product launch status update</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">21 Jan</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-info">
																	<i class="ki-duotone ki-picture fs-2 text-info"></i>
																</span>
                                            </div>
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Banner Assets</a>
                                                <div class="text-gray-500 fs-7">Collection of banner images</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">21 Jan</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-35px me-4">
																<span class="symbol-label bg-light-warning">
																	<i class="ki-duotone ki-color-swatch fs-2 text-warning">
																		<span class="path1"></span>
																		<span class="path2"></span>
																		<span class="path3"></span>
																		<span class="path4"></span>
																		<span class="path5"></span>
																		<span class="path6"></span>
																		<span class="path7"></span>
																		<span class="path8"></span>
																		<span class="path9"></span>
																		<span class="path10"></span>
																		<span class="path11"></span>
																		<span class="path12"></span>
																		<span class="path13"></span>
																		<span class="path14"></span>
																		<span class="path15"></span>
																		<span class="path16"></span>
																		<span class="path17"></span>
																		<span class="path18"></span>
																		<span class="path19"></span>
																		<span class="path20"></span>
																		<span class="path21"></span>
																	</i>
																</span>
                                            </div>

                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold">Icon Assets</a>
                                                <div class="text-gray-500 fs-7">Collection of SVG icons</div>
                                            </div>
                                        </div>
                                        <span class="badge badge-light fs-8">20 March</span>
                                    </div>
                                </div>

                                <div class="py-3 text-center border-top">
                                    <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All
                                        <i class="ki-duotone ki-arrow-right fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i></a>
                                </div>
                            </div>

                            <div class="tab-pane fade show active" id="kt_topbar_notifications_2" role="tabpanel">
                                <div class="d-flex flex-column px-9">
                                    <div class="pt-10 pb-0">
                                        <h3 class="text-gray-900 text-center fw-bold">Get Pro Access</h3>
                                        <div class="text-center text-gray-600 fw-semibold pt-1">Outlines keep you honest. They stoping you from amazing poorly about drive</div>
                                        <div class="text-center mt-5 mb-9">
                                            <a href="#" class="btn btn-sm btn-primary px-6" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade</a>
                                        </div>
                                    </div>

                                    <div class="text-center px-4">
                                        <img class="mw-100 mh-200px" alt="image" src="{{asset('assets/media/illustrations/sketchy-1/1.png')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_topbar_notifications_3" role="tabpanel">
                                <div class="scroll-y mh-325px my-5 px-8">
                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">New order</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Just now</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">New customer</a>
                                        </div>
                                        <span class="badge badge-light fs-8">2 hrs</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Payment process</a>
                                        </div>
                                        <span class="badge badge-light fs-8">5 hrs</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Search query</a>
                                        </div>
                                        <span class="badge badge-light fs-8">2 days</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">API connection</a>
                                        </div>
                                        <span class="badge badge-light fs-8">1 week</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-success me-4">200 OK</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Database restore</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Mar 5</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">System update</a>
                                        </div>
                                        <span class="badge badge-light fs-8">May 15</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Server OS update</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Apr 3</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-warning me-4">300 WRN</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">API rollback</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Jun 30</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Refund process</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Jul 10</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Withdrawal process</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Sep 10</span>
                                    </div>

                                    <div class="d-flex flex-stack py-4">
                                        <div class="d-flex align-items-center me-2">
                                            <span class="w-70px badge badge-light-danger me-4">500 ERR</span>
                                            <a href="#" class="text-gray-800 text-hover-primary fw-semibold">Mail tasks</a>
                                        </div>
                                        <span class="badge badge-light fs-8">Dec 10</span>
                                    </div>
                                </div>

                                <div class="py-3 text-center border-top">
                                    <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">View All
                                        <i class="ki-duotone ki-arrow-right fs-5">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                        </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <img src="{{asset('assets/media/avatars/300-3.jpg')}}" class="rounded-3" alt="user">
                    </div>

                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true" style="">
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{asset('assets/media/avatars/300-3.jpg')}}">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">Robert Fox
                                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span></div>
                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">robert@kt.com</a>
                                </div>
                            </div>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">My Profile</a>
                        </div>

                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">
                                <span class="menu-text">My Projects</span>
                                <span class="menu-badge">
													<span class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
												</span>
                            </a>
                        </div>

                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">My Statements</a>
                        </div>

                        <div class="separator my-2"></div>

                        <div class="menu-item px-5 my-1">
                            <a href="#" class="menu-link px-5">Account Settings</a>
                        </div>

                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5">Sign Out</a>
                        </div>

                    </div>
                </div>

                <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                    <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
                        <i class="ki-duotone ki-element-4 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
