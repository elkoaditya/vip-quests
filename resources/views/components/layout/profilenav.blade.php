<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
            <img src="{{asset('material')}}/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a class="dropdown-item" href="#">
                <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                            <img src="{{asset('material')}}/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </div>
                    <div class="flex-grow-1">
                        <span class="fw-semibold d-block">John Doe</span>
                        <small class="text-muted">Admin</small>
                    </div>
                </div>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <i class="mdi mdi-account-outline me-2"></i>
                <span class="align-middle">My Profile</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                <i class="mdi mdi-cog-outline me-2"></i>
                <span class="align-middle">Settings</span>
            </a>
        </li>
        <li>
            <a class="dropdown-item" href="#">
                                        <span class="d-flex align-items-center align-middle">
                                          <i class="flex-shrink-0 mdi mdi-credit-card-outline me-2"></i>
                                          <span class="flex-grow-1 align-middle">Billing</span>
                                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                        </span>
            </a>
        </li>
        <li>
            <div class="dropdown-divider"></div>
        </li>
        <li>

            <x-sweet-alert
                title="Logout"
                text="Apakah anda yakin untuk logout"
                icon="info"
                confirmtext="Logout"
                confirmcolor="success"
                confirmicon="success"
                confirmresult="Anda berhasil logout"
                canceltext="batal"
                cancelcolor="danger"
                cancelicon="warning"
                cancelresult="batal logout"
                redirect="/login"
                url="/logout"
                :body="[]"
            >
                <a class="dropdown-item" >
                    <i class="mdi mdi-power me-2"></i>
                    <span class="align-middle">Log Out</span>
                </a>
            </x-sweet-alert>
        </li>
    </ul>
</li>
