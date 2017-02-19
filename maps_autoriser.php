<?php

function maps_autoriser(){
}

function autoriser_mapsdemoformulaire_dist( $faire , $type = '' , $id , $qui = null , $opt = null ){
    if ($qui['statut'] == '0minirezo') {
	                return true;
	        }
    else{
	        return false;
    }
}
