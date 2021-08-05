<?php

function loadHeader($active){
    ?>
<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Wa Blast</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php if($active == "index"){ echo "active"; } ?>">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<li class="nav-item <?php if($active == "whatsapp_web"){ echo "active"; } ?>">
    <a class="nav-link" href="waweb/index.php" target="_blank">
        <i class="fab fa-whatsapp"></i>
        Whatsapp Web <span class="badge badge-success" style="font-size:50%">NEW</span></a>
</li>

<li class="nav-item <?php if($active == "auto_reply"){ echo "active"; } ?>">
    <a class="nav-link" href="auto_reply.php">
        <i class="fas fa-reply-all"></i>
        Auto-reply <span class="badge badge-success" style="font-size:50%">NEW</span></a>
</li>

<li class="nav-item <?php if($active == "nomor"){ echo "active"; } ?>">
    <a class="nav-link" href="nomor.php">
        <i class="fas fa-fw fa-phone-alt"></i>
        <span>Data Nomor</span></a>
</li>

<li class="nav-item  <?php if($active == "group"){ echo "active"; } ?>">
    <a class="nav-link" href="group.php">
        <i class="fas fa-users"></i>
        Group Nomor <span class="badge badge-success" style="font-size:50%">NEW</span></a>
</li>

<li class="nav-item  <?php if($active == "kirim"){ echo "active"; } ?>">
    <a class="nav-link" href="kirim.php">
        <i class="fas fa-fw fa-comments"></i>
        <span>Kirim Masal</span></a>
</li>

<li class="nav-item  <?php if($active == "kirim_group"){ echo "active"; } ?>">
    <a class="nav-link" href="kirim_group.php">
        <i class="fas fa-fw fa-users"></i>
        Kirim Group <span class="badge badge-success" style="font-size:50%">NEW</span></a>
</li>

<li class="nav-item  <?php if($active == "tes_kirim"){ echo "active"; } ?>">
    <a class="nav-link" href="tes_kirim.php">
        <i class="fas fa-fw fa-comment-alt"></i>
        <span>Tes Kirim</span></a>
</li>

<li class="nav-item  <?php if($active == "rest_api"){ echo "active"; } ?>">
    <a class="nav-link" href="rest_api.php">
        <i class="fas fa-fw fa-code"></i>
        <span>Rest API</span></a>
</li>

<li class="nav-item  <?php if($active == "pengaturan"){ echo "active"; } ?>">
    <a class="nav-link" href="pengaturan.php">
        <i class="fas fa-fw fa-cogs"></i>
        <span>Pengaturan</span></a>
</li>

<?php } ?>