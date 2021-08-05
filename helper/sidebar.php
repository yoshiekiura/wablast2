 <?php

function loadHeader($active){
    ?>
 <div class="sidebar-wrapper sidebar-theme">
            
            <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
            
            <nav id="sidebar">
                <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
                    <li class="nav-item d-flex">
                        <a href="index.html" class="navbar-brand">
                            <img src="vendor/assets/img/logo-4.png" class="img-fluid" alt="logo">
                        </a>
                        <p class="border-underline"></p>
                    </li>
                    <li class="nav-item theme-text">
                        <a href="index.html" class="nav-link"> Wa-blash </a>
                    </li>
                </ul>

                <ul class="list-unstyled menu-categories" id="accordionExample">
                    <li class="menu">
                        <a href="index3.html" class="dropdown-toggle" aria-expanded="<?php if($active == "index.php"){ echo "true"; } ?>">
                            <div class="">
                                <i class="flaticon-speedometer-tool ml-3 " ></i>
                                <span> Dashboard</span>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="waweb/index.php" target="_blank" class="dropdown-toggle" aria-expanded="<?php if($active == "waweb/index.php"){ echo "true"; } ?>">
                            <div class="">
                                <i class="flaticon-mail-21"></i>
                                <span>Whatapp Web</span>
                            </div>
                        </a>
                       
                    </li>
                    <li class="menu">
                        <a href="auto_reply.php" class="dropdown-toggle" aria-expanded="<?php if($active == "auto_reply"){ echo "true"; } ?>">
                            <div class="">
                                <i class="flaticon-reply"></i>
                                <span>Auto Reply</span>
                            </div>
                        </a>
                       
                    </li>
                    <li class="menu">
                        <a href="tes_kirim.php" class="dropdown-toggle" aria-expanded="<?php if($active == "tes_kirim"){ echo "true"; } ?>">
                            <div class="">
                                <i class="flaticon-mail-27"></i>
                                <span>Test Kirim</span>
                            </div>
                        </a>
                       
                    </li>
                    <li class="menu">
                        <a href="#nomor" data-toggle="collapse" aria-expanded="<?php if($active == "nomor"){ echo "true"; }else{ echo "fals";} ?>" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-user-group"></i>
                                <span>Nomor</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="nomor" data-parent="#accordionExample">
                            <li>
                                <a href="nomor.php"> Data Nomor </a>
                                <a href="group.php"> Grup Nomor </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#send" data-toggle="collapse" aria-expanded="<?php if($active == "kirim"){ echo "true"; }else{ echo "fals";} ?>" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-send"></i>
                                <span>Kirim</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="send" data-parent="#accordionExample">
                            <li>
                                <a href="kirim.php"> Kirim Masal </a>
                                <a href="kirim_group.php"> Kirim Group </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#settings" data-toggle="collapse" aria-expanded="<?php if($active == "setting"){ echo "true"; }else{ echo "fals";} ?>" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <i class="flaticon-setting-2"></i>
                                <span>Settings</span>
                            </div>
                            <div>
                                <i class="flaticon-right-arrow"></i>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="settings" data-parent="#accordionExample">
                            <li>
                                <a href="pengaturan.php"> Pengaturan </a>
                                <a href="rest_api.php"> RestApi </a>
                            </li>
                           
                        </ul>
                    </li>
                    
                    
                   
                </ul>
            </nav>

        </div>
<?php } ?>