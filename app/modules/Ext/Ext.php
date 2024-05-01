<?php

namespace modules;

class Ext extends \core\Module
{
    private $auth;
    private $mm;
    private $theme;
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->getComponent('Auth');
        $this->mm = $this->getComponent('ModuleManager');
        $this->theme = $this->getComponent('Themes');
    }

    public function index()
    {
        $this->auth->getSession('auth_id', function(){
            $this->redirect('login');
        });
        $this->data['list'] = [
            [
                'Profile' => 'Jacob',
                'VatNo' => '53275531',
                'Created' => '12 May 2017',
                'Status' => 'Pending',
            ],
            [
                'Profile' => 'Messsy',
                'VatNo' => '53275532',
                'Created' => '15 May 2017',
                'Status' => 'In progress',
            ],
            [
                'Profile' => 'John',
                'VatNo' => '53275533',
                'Created' => '14 May 2017',
                'Status' => 'Fixed',
            ],
            [
                'Profile' => 'Peter',
                'VatNo' => '53275534',
                'Created' => '16 May 2017',
                'Status' => 'Completed',
            ],
            [
                'Profile' => 'Dave',
                'VatNo' => '53275535',
                'Created' => '20 May 2017',
                'Status' => 'In progress',
            ],
        ];

        if(isset($_GET['module']) && !empty($_GET['module'])){
            $defs = $this->mm->getExt($_GET['module'], 'list');
            if(isset($_GET['action']) && in_array($_GET['action'], ['list', 'detail', 'edit'])){
                $defs = $this->mm->getExt($_GET['module'], $_GET['action']);
            }
            $this->data['listDefs'] = $defs['list'];
            $this->theme->display('Ext', $defs['action'], $this->data);
        }else{
            $this->theme->display('Ext', 'There is no module!', $this->data);
        }
    }
}
