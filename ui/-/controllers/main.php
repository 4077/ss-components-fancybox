<?php namespace ss\components\fancybox\ui\controllers;

class Main extends \Controller
{
    public function __create()
    {
        if ($cat = $this->data('cat')) {
            $this->instance_($cat->id);
        } else {
            $this->lock();
        }
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $v->assign([
                       'CONTENT' => $this->data('content')
                   ]);

        $this->c('\plugins\fancybox3~:bind', [
            'selector'      => $this->_selector('|'),
            'item_selector' => 'a'
        ]);

        $this->css();

        return $v;
    }
}
