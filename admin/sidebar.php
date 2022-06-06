<?php
//Health Center
if($user_uuid == '0x926a09cc9dec481113888511b69c60f5'){
    echo '
        <ul class="side-menu top">
            <li>
                <a href="/admin">
                    <i class="bx bxs-dashboard" ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/users">
                    <i class="bx bx-user" ></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="/admin/verification">
                    <i class="bx bx-list-check" ></i>
                    <span class="text">Verification</span>
                </a>
            </li>
            <li>
                <a href="/admin/requests">
                    <i class="bx bxs-inbox" ></i>
                    <span class="text">Requests</span>
                </a>
            </li>
            <li>
                <a href="/admin/appeal">
                    <i class="bx bxs-megaphone" ></i>
                    <span class="text">Appeal</span>
                </a>
            </li>
            <li>
                <a href="/admin/logout" class="logout">
                    <i class="bx bxs-log-out-circle" ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    ';
}
//Barangay
else if($user_uuid == '0x833a5adfaa7b527480b2e02db7333e8d'){
    echo '
        <ul class="side-menu top">
            <li>
                <a href="/admin">
                    <i class="bx bxs-dashboard" ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/establishment">
                    <i class="bx bx-building" ></i>
                    <span class="text">Establishment</span>
                </a>
            </li>
            <li>
            <a href="/admin/verification">
                <i class="bx bx-list-check" ></i>
                <span class="text">Verification</span>
            </a>
            </li>
            <li>
                <a href="/admin/logout" class="logout">
                    <i class="bx bxs-log-out-circle" ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    ';
}
//Super Admin
else{
    echo '
        <ul class="side-menu top">
            <li>
                <a href="/admin">
                    <i class="bx bxs-dashboard" ></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/admin/users">
                    <i class="bx bx-user" ></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li>
                <a href="/admin/establishment">
                    <i class="bx bx-building" ></i>
                    <span class="text">Establishment</span>
                </a>
            </li>
            <li>
                <a href="/admin/verification">
                    <i class="bx bx-list-check" ></i>
                    <span class="text">Verification</span>
                </a>
            </li>
            <li>
                <a href="/admin/requests">
                    <i class="bx bxs-inbox" ></i>
                    <span class="text">Requests</span>
                </a>
            </li>
            <li>
                <a href="/admin/appeal">
                    <i class="bx bxs-megaphone" ></i>
                    <span class="text">Appeal</span>
                </a>
            </li>
            <li>
                <a href="/admin/logout" class="logout">
                    <i class="bx bxs-log-out-circle" ></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    ';
}
?>