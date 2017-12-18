<header class="section-header top-affix" data-spy="affix" data-offset-top="120">
    <div class="container-fluid">
        <div class="container">
            <div class="row flex flex-col-sm">
                <div class="col-xs-12 col-md-4 logo-menu">
                    <div class="logo-image">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?=get_bloginfo('template_url') . '/assets/images/saowapanlogo-2.png'?>">
                        </a>
                    </div>    
                    <div class="logo-text">
                        <a href="<?php echo home_url(); ?>">
                            <h4 class="sub-title">songkhla</h4>
                            <h1 class="main-title">code academy</h1>
                        </a>
                    </div>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-main-navigation">
                    <i class="fa-2x fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="col-md-8 col-xs-12">
                    <?php   
                        if( isset( $_GET['lang'] ) && $_GET['lang'] == 'en' ){
                            $about      = 'About';
                            $courses    = 'Courses';
                            $pricing    = 'Pricing';
                            $articles   = 'Articles';
                            $contact    = 'Contact';
                            $promotions = 'Promotions';
                        }else{
                            $about      = 'เกี่ยวกับเรา';
                            $courses    = 'หลักสูตร';
                            $pricing    = 'ราคา';
                            $articles   = 'บทความ';
                            $contact    = 'ติดต่อเรา';
                            $promotions = 'โปรโมชั่น';
                        } 
                    ?>
                    <div id="menu-main-navigation" class="menu sm-hide collapse navbar-collapse">
                        <ul class="main-menu list-unstyled flex-col-xs">
                            <li><a class="about" href="<?php echo home_url('/about/'); ?>"><?=$about?></a></li>
                            <li><a class="courses" href="<?php echo home_url('/courses/'); ?>"><?=$courses?></a></li>
                            <li><a class="promotions" href="<?php echo home_url('/promotions/'); ?>"><?=$promotions?></a></li>
                            <li><a class="pricing" href="<?php echo home_url('/pricing/'); ?>"><?=$pricing?></a></li>
                            <li><a class="contact" href="<?php echo home_url('/contact/'); ?>"><?=$contact?></a></li>
                            <? if (!is_user_logged_in() ){ ?>
                                <li><a class="login" href="<?php echo home_url('/login/'); ?>">Login</a></li>
                            <? }else{?>
                                <li><a class="article" href="<?php echo home_url('/articles/'); ?>">บทความ</a></li>
                                <li><a class="login" href="<?=wp_logout_url( get_permalink() )?>">Logout</a></li>
                            <? } ?>
                        </ul>
                    </div>
                </div> 
                <?php do_action('wpml_add_language_selector'); ?>   
            </div>
        </div> 
    </div>
</header>
