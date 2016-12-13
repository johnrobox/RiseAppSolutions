<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Rise App Solutions
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url().'admin/about-us'; ?>">About Us</a>
                </li>
                <li>
                    <a href="#">Team</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Blog</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/AdminFaqController/">FAQS</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/AdminInquiryController/">Inquiry</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/admin/AdminUserController/">Admin User</a>
                </li>
                <hr>
                <li>
                    <a href="#">Sign Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper --> 

        <!-- Page Content -->
<div id="page-content-wrapper">
<a href="#menu-toggle" id="menu-toggle">
    <i class="fa fa-bars fa-3x" aria-hidden="true"></i>
</a>
<!-- Important! Do not Delete -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <h1><?php echo (isset($content_title)) ? $content_title : 'Panel';?></h1>
