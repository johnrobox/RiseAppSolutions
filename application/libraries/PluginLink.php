<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class PluginLink {
    
    public function __construct() {
        $this->dt_js = 'datatables/js/';
        $this->dt_css = 'datatables/css/';
    }
    
    public function dataTable(){
        $links = array(
            'css' => array(
                $this->dt_css.'dataTables.bootstrap',
                $this->dt_css.'dataTables.responsive'
            ),
            'js' => array(
                $this->dt_js.'jquery.dataTables.min',
                $this->dt_js.'dataTables.bootstrap.min',
                $this->dt_js.'dataTables.responsive'
            )
        );
        return $links;
    }
    
}
