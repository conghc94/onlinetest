<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CauHoi
 *
 * @author ds_mu
 */
class CauHoi {
    private $cauhoi = '';
    private $cautraloi = '';
    private $dapan = '';
    
    public function CauHoi($cauhoi, $cautraloi, $dapan) {
        $this->cauhoi = $cauhoi;
        $this->cautraloi = $cautraloi;
        $this->dapan = $dapan;
    }

    public function setCauHoi($cauhoi) {
        $this->cauhoi = $cauhoi;
    }
    
    public function setCauTraLoi($cautraloi) {
        $this->cautraloi = $cautraloi;
    }
    
    public function setDapAn($dapan) {
        $this->dapan = $dapan;
    }
    
}
