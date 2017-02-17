<?php 

function formulaires_maps_demo_config_charger_dist() {
    $existing_key = get_existing_key();
    if(!empty($existing_key)){
        $key = $existing_key[0];
    }

	$saisies = array(
		'api_key' => $key
	);

	return $saisies;
}

function formulaires_maps_demo_config_verifier_dist() {
    
}


function formulaires_maps_demo_config_traiter_dist() {
    $new_key = _request('api_key');
    
    $existing_key = get_existing_key();
    if(!empty($existing_key)){
        $key = $existing_key[0];
    }

    if(isset($key) && !empty($key)){
       sql_updateq('spip_meta',array('valeur' => $new_key),"nom = 'maps_demo_key'");
    }
    else{    
        sql_insertq(
            'spip_meta', array(
                'nom' => 'maps_demo_key',
                'valeur' => $new_key
            )    
        );
    }
}

function get_existing_key(){
    $keys_request = sql_select('*', 'spip_meta',"nom = 'maps_demo_key'");
    $keys = array();
    while($keys_result = sql_fetch($keys_request)){
        $keys[] = $keys_result['valeur'];
    }
    return $keys;
}
