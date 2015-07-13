<?php
$isHome = (in_array($this->router->fetch_class(), array("welcome", "search")) && $this->router->fetch_method() === 'index') ? true : false;
?>
<a name="top" id="top"></a>
<div class="row border-bottom white-bg">
    <nav class="navbar navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <i class="fa fa-reorder"></i>
            </button>
            <a href="<?php echo base_url() ?>" class="navbar-brand"><img src="<?php echo base_url("static/img/logo.jpg") ?>" />
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Việc làm<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php
                            if (($this->session->userdata("link_search")))
                                echo site_url($this->session->userdata("link_search"));
                            else
                                echo site_url('kw');
                            ?>"> Tìm kiếm công việc</a></li>
                        <li><a href="<?php echo site_url('japanese/newjobs'); ?>"></span> Việc làm tiếng Nhật mới nhất</a></li>
                        <li><a href="<?php echo site_url('japanese/n1level'); ?>"></span> Việc làm với trình độ tiếng Nhật N1</a></li>
                        <li><a href="<?php echo site_url('japanese/n2level'); ?>"></span> Việc làm với trình độ tiếng Nhật N2</a></li>
                        <li><a href="<?php echo site_url('japanese/n3level'); ?>"></span> Việc làm với trình độ tiếng Nhật N3</a></li>
                        <li><a href="<?php echo site_url('Japanesebeginner'); ?>"></span> Việc làm cho người mới biết tiếng Nhật</a></li>
                    </ul>
                </li>
                <li> <a aria-expanded="true" role="button" href="<?php echo site_url('tips'); ?>"> Tư vấn 2 phút</a> </li>
           
<li> <a aria-expanded="true" role="button" href="<?php echo site_url('translation'); ?>"> Cuộc thi dịch thuật</a> </li>
                <!-- login -->
                <?php if (isset($this->_userInfo->login_token)) {
                    ?>
                    <li class="dropdown"> <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->_userInfo->first_name . ' ' . $this->_userInfo->last_name; ?> <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo site_url('account'); ?>">Quản lý nghề nghiệp</a></li>
                            <li><a href="<?php echo site_url('logout'); ?>">Đăng xuất</a></li>

                        </ul>
                    </li>
                <?php } else { ?>
                    <li class="dropdown"> <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Đăng nhập <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="<?php echo site_url('login'); ?>">Đăng nhập</a></li>
                            <li><a href="<?php echo site_url('register'); ?>">Đăng ký</a></li>
                        </ul>
                    </li>
                <?php } ?>
                <!-- end login -->
            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo(MAIN_SITE); ?>">
                        <img src="<?php echo base_url("static/img/power_vnw.png") ?>" height="46" />
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
