<?php
namespace EESC;

class Theme
{
    public static function renderNavbar($navbar)
    {
        $tpl = new \raelgc\view\Template('../template/navbar.html');
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
        $tpl = new \raelgc\view\Template('../template/userbar.html');

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
}
