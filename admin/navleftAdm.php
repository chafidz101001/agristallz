<?php if(isset($_SESSION['email'])) : ?>

<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-gear"></i> <strong>AGRISTALL</strong></a>
            </div>
            <?php include "database/session.php" ?>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                                if (isset($_SESSION['email'])) : ?>
                                <?php $sql = "SELECT * FROM admin WHERE email = '" . $_SESSION['email'] . "'";
                                        $result = mysqli_query($db,$sql);
                                        //echo $result;
                                        $row = mysqli_fetch_array($result);
                                    ?>
                                <li><a href=#><strong><?php echo $row['nama']; ?></strong></a></li>
                                <li><a href="index.php?logout_user='1'">Logout</a></li>
                            <?php endif ?>

                            <?php if (!isset($_SESSION['email'])) : ?>
                                <li><a href="login.php">Log In Admin</a></li>
                            <?php endif ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Barang<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tableBar.php">Daftar Barang</a>
                            </li>
                            <li>
                                <a href="formBar.php">Tambah Barang</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Toko<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tableTok.php">Daftar Toko</a>
                            </li>
                            <li>
                                <a href="formTok.php">Tambah Toko</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="tableUser.php"><i class="fa fa-fw fa-file"></i> Pengguna</a>
                    </li>
                    <li>
                        <a href="tableBeli.php"><i class="fa fa-fw fa-file"></i> Pembelian</a>
                    </li>
                </ul>

            </div>

        </nav>
<?php endif ?>
<?php if(!isset($_SESSION['email'])) : ?>
    <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><i class="fa fa-gear"></i> <strong>AGRISTALL</strong></a>
            </div>
            <?php include "database/session.php" ?>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <?php
                                if (isset($_SESSION['email'])) : ?>
                                <?php $sql = "SELECT * FROM admin WHERE email = '" . $_SESSION['email'] . "'";
                                        $result = mysqli_query($db,$sql);
                                        //echo $result;
                                        $row = mysqli_fetch_array($result);
                                    ?>
                                <li><a href=#><strong><?php echo $row['nama']; ?></strong></a></li>
                                <li><a href="index.php?logout_user='1'">Logout</a></li>
                            <?php endif ?>

                            <?php if (!isset($_SESSION['email'])) : ?>
                                <li><a href="login.php">Log In Admin</a></li>
                            <?php endif ?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Barang<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tableBar.php">Daftar Barang</a>
                            </li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-sitemap"></i> Toko<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="tableTok.php">Daftar Toko</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>

        </nav>
<?php endif ?>