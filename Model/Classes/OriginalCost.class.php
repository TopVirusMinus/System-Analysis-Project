<?php
require_once "PayTuition.abstractclass.php";
class OriginalCost extends PayTuition{
    protected $tuitionFee = 0;

    function __construct()
    {
        $this->tuitionFee = 5000;
    }

    public function setTuitionFees($tuitionFees){
        $this->tuitionFee = $tuitionFees;
    }

    public function getTuitionFees($tuitionFees){
        return $this->tuitionFee;
    }

	public function getCost() {
        return $this->tuitionFee;
	}
}