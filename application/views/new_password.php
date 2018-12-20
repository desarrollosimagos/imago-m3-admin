
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $this->config->item('title_app_login'); ?></title>

    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <style type="text/css">
        .logo-name {
            color: #e6e6e6;
            font-size: 100px !important;
            font-weight: 800;
            letter-spacing: -10px;
            margin-bottom: 0;
        }
    </style>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <!--<img src="<?php echo assets_url('img/logos/'.$this->config->item('logo_login')); ?>">-->

            </div>
            
            <?php echo validation_errors('<div class="error" style="color:#D33333;">','</div>');?>
            <?php if(isset($error)) echo "<div class='error' style='color:#D33333;'>$error</div>";?>
            <p></p>
            <form class="m-t" role="form" action="<?php echo base_url()."users/send_mail_change"?>" method="post">
                <div class="form-group">
                    <input type="text" autofocus="" class="form-control" placeholder="<?php echo $this->lang->line('new_passwd_placeholder_user'); ?>" name="username" id="username" required="" oninvalid="this.setCustomValidity('Ingrese su correo electrónico')" oninput="this.setCustomValidity('')" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">
                    <?php echo $this->lang->line('new_passwd_button_value'); ?>
                </button>

                <p class="text-muted text-center"><small>
                    <?php echo $this->lang->line('new_passwd_question_account'); ?></small>
                </p>
                <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url()."login"?>">
                    <?php echo $this->lang->line('new_passwd_login_account'); ?>
                </a>
            </form>
            <p class="m-t"> <small>
                <?php echo $this->lang->line('name_app'); ?>
                 &copy; 2018</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

</body>

</html>
