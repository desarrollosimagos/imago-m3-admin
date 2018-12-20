<?php
class LanguageLoader
{
    function initialize() {
        $ci =& get_instance();
        //~ $ci->session->sess_destroy();
        $ci->load->helper('language');
        $siteLang = $ci->session->userdata('site_lang');
        if ($siteLang) {
            $ci->lang->load('header',$siteLang);
            $ci->lang->load('login',$siteLang);
            $ci->lang->load('footer',$siteLang);
            $ci->lang->load('menus',$siteLang);
            $ci->lang->load('submenus',$siteLang);
            $ci->lang->load('summary',$siteLang);
            $ci->lang->load('transactions',$siteLang);
            $ci->lang->load('coins',$siteLang);
            $ci->lang->load('accounts',$siteLang);
            $ci->lang->load('projects',$siteLang);
            $ci->lang->load('profiles',$siteLang);
            $ci->lang->load('users',$siteLang);
            $ci->lang->load('associations',$siteLang);
            $ci->lang->load('investor_groups',$siteLang);
            $ci->lang->load('menus_module',$siteLang);
            $ci->lang->load('submenus_module',$siteLang);
            $ci->lang->load('actions',$siteLang);
            $ci->lang->load('change_passwd',$siteLang);
            $ci->lang->load('public_projects',$siteLang);
            $ci->lang->load('public_home',$siteLang);
            $ci->lang->load('share_profit',$siteLang);
            $ci->lang->load('import',$siteLang);
            $ci->lang->load('register_public',$siteLang);
            $ci->lang->load('new_password',$siteLang);
            $ci->lang->load('change_password',$siteLang);
            $ci->lang->load('inscription_module',$siteLang);
            $ci->lang->load('profileuser',$siteLang);
            $ci->lang->load('payments',$siteLang);
        } else {
            $ci->lang->load('header','spanish');
            $ci->lang->load('login','spanish');
            $ci->lang->load('footer','spanish');
            $ci->lang->load('menus','spanish');
            $ci->lang->load('submenus','spanish');
            $ci->lang->load('summary','spanish');
            $ci->lang->load('transactions','spanish');
            $ci->lang->load('coins','spanish');
            $ci->lang->load('accounts','spanish');
            $ci->lang->load('projects','spanish');
            $ci->lang->load('profiles','spanish');
            $ci->lang->load('users','spanish');
            $ci->lang->load('associations','spanish');
            $ci->lang->load('investor_groups','spanish');
            $ci->lang->load('menus_module','spanish');
            $ci->lang->load('submenus_module','spanish');
            $ci->lang->load('actions','spanish');
            $ci->lang->load('change_passwd','spanish');
            $ci->lang->load('public_projects','spanish');
            $ci->lang->load('public_home','spanish');
            $ci->lang->load('share_profit','spanish');
            $ci->lang->load('import','spanish');
            $ci->lang->load('register_public','spanish');
            $ci->lang->load('new_password','spanish');
            $ci->lang->load('change_password','spanish');
            $ci->lang->load('inscription_module','spanish');
            $ci->lang->load('profileuser','spanish');
            $ci->lang->load('payments','spanish');
        }
        
    }
}
