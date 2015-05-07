<?php
$isHome = (in_array($this->router->fetch_class(), array("welcome", "search")) && $this->router->fetch_method() === 'index') ? true : false;
?>
<a name="top" id="top"></a>

<div id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div align="right" class="head_right">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a href="<?php echo base_url() ?>" class="logo">
                                    <img src="<?php echo base_url("static/img/logo.jpg") ?>" class="img-responsive-logo" alt="JapanWorks">
                                </a>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav navbar-left">
                                    <li <?php if ($this->uri->segment(1) == '') echo "class ='active'"; ?>><a href="<?php echo site_url(); ?>">Trang chủ</a></li>
                                    <li <?php if ($this->uri->segment(1) == 'kw') echo "class ='active'"; ?>><a href="<?php
                                        if (($this->session->userdata("link_search")))
                                            echo site_url($this->session->userdata("link_search"));
                                        else
                                            echo site_url('kw');
                                        ?>">Tìm kiếm</a></li>
                                    <li  <?php if ($this->uri->segment(1) == 'tips') echo "class ='active'"; ?>><a href="<?php echo site_url('tips'); ?>">Tư vấn 2 phút<img src="<?php echo base_url("static/img/icon-new.png") ?>" alt="new" class="icon-new"></a></li>
                                    <li <?php if ($this->uri->segment(1) == 'questions' || $this->uri->segment(1) == 'tags') echo "class ='active'"; ?>><a href="<?php echo site_url('questions'); ?>">Hỏi đáp tiếng Nhật</a></li>
                                    <li <?php if ($this->uri->segment(1) == 'event') echo "class ='active'"; ?> ><a href="<?php echo site_url('event'); ?>">Events</a></li>
                                </ul>

                            </div><!-- /.navbar-collapse -->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-left">

                                    <li <?php if ($this->uri->segment(1) == '') echo "class ='active'"; ?>><a href="<?php echo site_url(); ?>">Trang chủ</a></li>
                                    <li <?php if ($this->uri->segment(1) == 'kw') echo "class ='active'"; ?>><a href="<?php echo site_url('kw'); ?>">Tìm kiếm</a></li>
                                    <li  <?php if ($this->uri->segment(1) == 'tips') echo "class ='active'"; ?>><a href="<?php echo site_url('tips'); ?>">Tư vấn 2 phút<img src="<?php echo base_url("static/img/icon-new.png") ?>" alt="new" class="icon-new"></a></li>
                                    <li <?php if ($this->uri->segment(1) == 'questions' || $this->uri->segment(1) == 'tags') echo "class ='active'"; ?>><a href="<?php echo site_url('questions'); ?>">Hỏi đáp tiếng Nhật</a></li>
                                    <li <?php if ($this->uri->segment(1) == 'event') echo "class ='active'"; ?> ><a href="<?php echo site_url('event'); ?>">Events</a></li>
                                    <?php
                                    if (($this->session->userdata('userInfo'))) {

                                        $user = $this->session->userdata('userInfo');
                                        ?>
                                        <li class="sub user">
                                            <a href="#">
                                                <span class="glyphicon glyphicon-user"></span>
                                                <strong><?php echo $user->profile->first_name . ' ' . $user->profile->last_name; ?></strong>
                                                <span class="arrow glyphicon glyphicon-chevron-down"></span>
                                            </a>
                                        </li>
                                        <li class="sub logout"><a href="<?php echo site_url('account'); ?>">Career Center</a></li>
                                        <li class="sub logout"><a href="<?php echo site_url('logout'); ?>">Đăng xuất</a></li>


                                    <?php } else { ?>
                                        <li class="sub "><a href="<?php echo site_url('login'); ?>">Đăng nhập</a></li>
                                        <li class="sub "><a href="<?php echo site_url('register'); ?>">Đăng ký</a></li>

                                    <?php } ?>

                                </ul>
                            </div>

                            <a href="<?php echo(MAIN_SITE); ?>" class="logo-vnw">
                                <img src="<?php echo base_url("static/img/power_vnw.png") ?>" class="img-responsive-logo" alt="VietnamWorks">
                            </a>



                            <div class="sub-header">
                                <?php
                                if (($this->session->userdata('userInfo'))) {

                                    $user = $this->session->userdata('userInfo');
                                    ?>
                                    <a href="#" class="user-menu"><strong><?php echo $user->profile->first_name . ' ' . $user->profile->last_name; ?></strong> <span class="arrow glyphicon glyphicon-chevron-down"></span></a>
                                <?php } else { ?>

                                    <a href="<?php echo site_url('login'); ?>">Đăng nhập</a>  &nbsp;|&nbsp;
                                    <a href="<?php echo site_url('register'); ?>">Đăng ký</a>
                                <?php }
                                ?>
                            </div>
                        </div><!-- /.container-fluid -->
                        <?php if (($this->session->userdata('userInfo'))) { ?>
                            <ul class="user-dropdown-block">
                                <li>
                                    <a href="<?php echo site_url('account'); ?>">Career Center</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('logout'); ?>">Đăng xuất</a>
                                </li>
                            </ul>
                        <?php } ?>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>
