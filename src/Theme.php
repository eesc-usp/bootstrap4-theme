<?php
namespace EESC;

class Theme
{
    public static function renderNavbar($navbar)
    {
        $tpl = new \raelgc\view\Template(__DIR__ . '/../template/navbar.html');
        foreach ($navbar['navbar_left'] as $nb) {
            $tpl->nb_url = $nb['url'];
            $tpl->nb_text = $nb['text'];
            $tpl->nb_title = !empty($nb['title']) ?: '';
            $tpl->block('NAVBAR_ITEM');
        }

        foreach ($navbar['navbar_right'] as $nb) {
            $tpl->nb_url = $nb['url'];
            $tpl->nb_text = $nb['text'];
            $tpl->nb_title = $nb['title'] ?: '';
            $tpl->block('NAVBAR_ITEM_RIGHT');
        }

        return $tpl->parse();
    }

    public static function renderUserbar($userbar)
    {
        $tpl = new \raelgc\view\Template(__DIR__ . '/../template/userbar.html');

        if ($userbar['login']) {
            $tpl->user = $userbar['username'];
            if (!empty($userbar['role'])) {
                $tpl->role = $userbar['role'];
                $tpl->block('ROLE');
            }
            $tpl->logout_url = $userbar['logout_url'];
            $tpl->logout_method = $userbar['logout_method'];
            $tpl->block('LOGGED_IN');

        } else {
            $tpl->login_url = $userbar['login_url'];
            $tpl->block('LOGGED_OUT');

        };

        return $tpl->parse();
    }

    public static function postInstall () {
        //$vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');
        //echo $vendorDir;
        exec('rm -rf ./www/eesc-theme');
        exec('cp -r '.__DIR__.'/../asset/eesc-theme ./www/');
    }
}
