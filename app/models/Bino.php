<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteMicroEngine\App\Models;

/**
 * Description of Bino
 *
 * @author porfirovskiy
 */
class Bino extends Model {
    
    public $aperture = 0;
    public $magnification = 0;
    public $focusAperture = 0;
    public $focusPupil = 0;
    public $fieldOfVisionMet = 0;
    public $fieldOfVisionDec = 0.0;
    public $pupil = 0;
    
    public function __construct() {
        parent::__construct();
        $this->fieldOfVisionMet = 150;
        $this->aperture = 50;
        $this->pupil = 3;
        $this->focusAperture = 250;
    }


    /**
     * 
     * @return float
     */
    public function getFOV() {
        return round($this->fieldOfVisionMet/17.453, 1);
    }
    
    public function getStarValue() {
        $starVal = pow($this->aperture, 2) / pow($this->pupil, 2);
        return round((log($starVal, 2.5) + 5), 1);
    }
    
    public function getApertureRatio() {
        return round($this->aperture/$this->focusAperture, 1);
    }
}
