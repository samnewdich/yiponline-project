<?php
/* Smarty version 5.4.1, created on 2024-08-30 08:51:09
  from 'file:register.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_66d187fd510e77_57226739',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94327f222556210be42b414e0f72cac53ab5ac8c' => 
    array (
      0 => 'register.tpl',
      1 => 1725005744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_66d187fd510e77_57226739 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Program Files\\Ampps\\www\\sapp\\smarty-master\\templates';
?><!DOCTYPE html>
<head>
<title>Yiponline - Interview Task By Olubusayo Samuel Idebi(Software Engineer)</title>

<style>
header{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    background-color: lightseagreen;
    color: black; 
    text-align: center;
}

section{
    margin-top: 70px;
    margin-left: 15%;
    width: 70%;
    padding: 10px;
    box-shadow: 3px 4px 8px 6px rgba(0,0,0,0.4);
}

fieldset{
    background-color: white;
}

.error_message{
    color: red;
    font-size: 14px;
}

.success_message{
    color: green;
    font-size: 14px;
}

.success{
    padding: 10px;
    margin-bottom: 10px;
    font-size: 18px;
    color: lightseagreen;
}

.filed{
    margin-top: 10px;
}

.label{
    width:100%;
    font-size: 14px;
    color: black;
}

.input{
    width:100%;
    height: 35px;
    color: black;
}

.reg{
    width: 50%;
    height: 40px;
    background-color: black;
    color: white;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    box-shadow: 2px 3px 6px 4px rgba(0,0,0,0.4);
}

b{
    font-size: 22px;
    font-weight: bolder;
}
</style>

</head>
<body>
    <header> <h3>Interview Task By Olubusayo Samuel Idebi(Software Engineer)</h3></header>
    <section>
        <fieldset>
            <legend>Registration Form</legend>
            <form action="" method="POST" enctype="multipart/form-data">
                <span class="error_message"><?php echo $_smarty_tpl->getValue('error_message');?>
</span>
                <span class="success_message"><?php echo $_smarty_tpl->getValue('success_message');?>
</span>

                <div class="success"><?php echo $_smarty_tpl->getValue('output_all');?>
</div>

                <div class="filed">
                    <label class="label">Username</label>
                    <input class="input" type="text" name="username" placeholder="Username" value="<?php echo $_smarty_tpl->getValue('username');?>
" />
                </div>

                <div class="filed">
                    <label class="label">Email</label>
                    <input class="input" type="text" name="email" placeholder="Email" value="<?php echo $_smarty_tpl->getValue('email');?>
" />
                </div>

                <div class="filed">
                    <label class="label">Password</label>
                    <input class="input" type="text" name="password" placeholder="Password" value="<?php echo $_smarty_tpl->getValue('password');?>
" />
                </div>
                
                <div class="filed">
                    <button class="reg">Register</button>
                </div>
            </form>
        </fieldset>
    </section>
    <footer></footer>
</body>
</html><?php }
}
