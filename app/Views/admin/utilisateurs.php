<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('dist/css/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('dist/css/skins/_all-skins.min.css') ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="javascript::void(0)" class="logo">
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button -->
                <a href="javascript::void(0)" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"> <?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">

                                    <p>
                                    <p><?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' - ' . $_SESSION['role'] ?></p>

                                    <small>Member since <?= ($_SESSION['created_at']) ?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="<?= base_url('admin/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url('dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?></p>
                        <small><?= ucfirst($_SESSION['role']) ?></small>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="<?= base_url('admin/dashboard') ?>">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="treeview active">
                        <a href="javascript::void(0)">
                            <i class="fa fa-table"></i> <span>Lists</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu active">
                            <li><a href="<?= base_url('admin/employees') ?>"><i class="fa fa-circle-o"></i> Listes des employees </a></li>
                            <li class="active"><a href="<?= base_url('admin/utilisateurs') ?>"><i class="fa fa-circle-o"></i> Listes des utilisateurs </a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Liste des utilisateurs
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="javascript::void(0)" class="active">Liste des utilisateurs</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="col-xs-12">
                    <!-- box -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des utilisateurs</h3>

                            <div class="pull-right hidden-xs">
                                <!-- Button trigger modal -->
                                <a href="javascript::void(0)" data-toggle="modal" data-target="#add-utilisateurs">
                                    <i class="fa fa-user-plus"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="add-utilisateurs" tabindex="-1" role="dialog" aria-labelledby="add-employees">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Modifier employee</h4>
                                            </div>
                                            <form action="<?= base_url('admin/utilisateurs') ?>" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nom</label>
                                                        <input type="text" name="nom" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prenom</label>
                                                        <input type="text" name="prenom" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>login</label>
                                                        <input type="email" name="login" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>mot de passe</label>
                                                        <input type="password" name="password" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Role</label>
                                                        <select name="role" class="form-control">
                                                            <option value="admin">admin</option>
                                                            <option value="user">user</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php if (session('success')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> <?= session('success') ?> </h4>
                            </div>
                        <?php endif; ?>

                        <?php if (session('errors')) : ?>
                            <div class="alert alert-error alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php foreach (session('errors') as $error) : ?>
                                    <h4><i class="icon fa fa-check"></i> <?= $error ?> </h4>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Login</th>
                                        <th>Role</th>
                                        <th>Created_at</th>
                                        <th>Updated_at</th>
                                        <th>
                                            <!-- Button trigger modal -->
                                            <a href="javascript::void(0)" data-toggle="modal" data-target="#search-utilisateurs">
                                                <i class="fa fa-search"></i>
                                            </a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="search-utilisateurs" tabindex="-1" role="dialog" aria-labelledby="search-utilisateurs">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Recherche</h4>
                                                        </div>
                                                        <form action="<?= base_url('admin/utilisateurs/search') ?>" method="get">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nom</label>
                                                                    <input type="text" name="nom" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Prenom</label>
                                                                    <input type="text" name="prenom" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>login</label>
                                                                    <input type="email" name="login" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Role</label>
                                                                    <select name="role" class="form-control">
                                                                        <option value=""></option>
                                                                        <option value="admin">admin</option>
                                                                        <option value="user">user</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($users)) : ?>
                                        <?php foreach ($users as $user) : ?>
                                            <tr>
                                                <td><?= esc($user['id']) ?></td>
                                                <td><?= esc($user['nom']) ?></td>
                                                <td><?= esc($user['prenom']) ?></td>
                                                <td><?= esc($user['login']) ?></td>
                                                <td><?= esc($user['role']) ?></td>
                                                <td><?= esc($user['created_at']) ?></td>
                                                <td><?= esc($user['updated_at']) ?></td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <a href="javascript::void(0)" data-toggle="modal" data-target="#update-employees-id-<?= esc($user['id']) ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="javascript::void(0)" data-toggle="modal" data-target="#delete-employees-id-<?= esc($user['id']) ?>">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="update-employees-id-<?= esc($user['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="update-employees-id-<?= esc($user['id']) ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Modifier employee</h4>
                                                                </div>
                                                                <form action="<?= base_url('admin/utilisateurs/' . esc($user['id'])) ?>" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Nom</label>
                                                                            <input type="text" name="nom" value="<?= esc($user['nom']) ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Prenom</label>
                                                                            <input type="text" name="prenom" value="<?= esc($user['prenom']) ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Login</label>
                                                                            <input type="email" name="login" value="<?= esc($user['login']) ?>" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Role</label>
                                                                            <select name="role" class="form-control">
                                                                                <option <?= ($user['role'] === 'admin') ? 'selected' : '' ?> value="admin">admin</option>
                                                                                <option <?= ($user['role'] === 'user') ? 'selected' : '' ?> value="user">User</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="delete-utilisateur-id-<?= esc($user['id']) ?>" tabindex="-1" role="dialog" aria-labelledby="update-employees-id-<?= esc($user['id']) ?>">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel">Supprimer utilisateur</h4>
                                                                </div>
                                                                <form action="<?= base_url('admin/utilisateurs/' . esc($user['id'])) ?>" method="put">

                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Oui</button>
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="5">Aucun utilisateur trouvé.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.8
            </div>
            <strong>Copyright &copy; 2014-2025 reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <script>
        // Automatically dismiss the alert after 3 seconds
        setTimeout(function() {
            // Find the alert element and remove it
            document.querySelector('.alert').remove();
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>

    <!-- jQuery 2.2.3 -->
    <script src="<?= base_url('plugins/jQuery/jquery-2.2.3.min.js') ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?= base_url('bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url('plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url('plugins/fastclick/fastclick.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('dist/js/app.min.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('dist/js/demo.js') ?>"></script>
</body>

</html>