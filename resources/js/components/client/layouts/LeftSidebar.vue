<template>
    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="index.html"><img src="https://wrraptheme.com/templates/hexabit/html/assets/images/icon-dark.svg" alt="HexaBit Logo" class="img-fluid logo"><span>HexaBit</span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm btn-default float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                        <li class="divider"></li>
                        <li><a href=""><i class="icon-power"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li :class="{ active: $route.name == 'home' }"><a :href="`/`"><i class="icon-home"></i><span>Dashboard</span></a></li>
                    <li :class="{ active: $route.name == 'notes' }"><a :href="`/notes`"><i class="icon-tag"></i><span>Notes</span></a></li>
                    <li><a href="app-taskboard.html"><i class="icon-list"></i><span>Stations</span></a></li>
                    <li :class="{ active: $route.name == 'tables' }"><a :href="`/tables`"><i class="icon-tag"></i><span>Tables</span></a></li>
                    <li>
                        <a href="#Widgets" class="has-arrow"><i class="icon-puzzle"></i><span>Config</span></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
import {defineComponent} from "vue";

export default defineComponent({
    mounted() {
    console.log('footer');
}
})
</script>
