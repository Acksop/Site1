<?php

namespace MVC\Classe;

class Tri{

    public static function cmp($a,$b){
        if ($a == $b) {
            return 0;
        }
        return ($a < $b) ? -1 : 1;
    }

    public static function cmpIp($ip1,$ip2){

        $tab_ip1 = explode(".",$ip1);
        $tab_ip2 = explode(".",$ip2);

        $octet0 = Tri::cmp($tab_ip1[0],$tab_ip2[0]);
        $octet1 = Tri::cmp($tab_ip1[1],$tab_ip2[1]);
        $octet2 = Tri::cmp($tab_ip1[2],$tab_ip2[2]);
        $octet3 = Tri::cmp($tab_ip1[3],$tab_ip2[3]);

        if($octet0 == 0){
            //égal
            if($octet1 == 0){
                //égal
                if($octet2 == 0){
                    //égal
                    if($octet3 == 0){
                        //égal
                        return 0;
                    }elseif($octet3 == 1){
                        //supérieur
                        return 1;
                    }else{
                        //inférieur
                        return -1;
                    }
                }elseif($octet2 == 1){
                    //suppérieur
                    return 1;
                }else{
                    //inférieur
                    return -1;
                }
            }elseif($octet1 == 1){
                //suppérieur
                return 1;
            }else{
                //inférieur
                return -1;
            }
        }elseif($octet0 == 1){
            //suppérieur
            return 1;
        }else{
            //inférieur
            return -1;
        }
    }

    public static function cmpInterval($tab_ip1,$tab_ip2){
        $vlan_test_adresse_ip_debut = $tab_ip1[0];
        $vlan_test_adresse_ip_fin = $tab_ip1[1];

        $vlan_adresse_ip_debut = $tab_ip2[0];
        $vlan_adresse_ip_fin = $tab_ip2[1];

        $ip_debut_cmp = Tri::cmpIp($vlan_test_adresse_ip_debut,$vlan_adresse_ip_debut);
        $ip_debfin_cmp = Tri::cmpIp($vlan_test_adresse_ip_debut,$vlan_adresse_ip_fin);
        $ip_fin_cmp = Tri::cmpIp($vlan_test_adresse_ip_fin,$vlan_adresse_ip_fin);
        $ip_findeb_cmp = Tri::cmpIp($vlan_test_adresse_ip_fin,$vlan_adresse_ip_debut);

        //ip1_debut ? ip2_debut
        if($ip_debut_cmp == 0){
            //égal
            if ($ip_fin_cmp == 0) {
                return 'sont égaux';
            }
            return 'chevauche par le debut (egalité debut)';

        }elseif($ip_debut_cmp == 1){
            //supérieur
            //ip1_debut ? ip2_fin
            if ($ip_debfin_cmp == 0) {
                //égal
                return 'forme une jonction par le debut avec';
            } elseif ($ip_debfin_cmp == 1) {
                //supérieur
                return 'est different (apres)';
            } else {
                //inférieur
                //ip1_fin ? ip2_fin
                if ($ip_fin_cmp == 0) {
                    //égal
                    return 'chevauche par la fin (egalité fin)';
                } elseif ($ip_fin_cmp == 1) {
                    //supérieur
                    return 'chevauche par le debut';
                } else {
                    return 'est inclue dans';
                }
            }
        } else {
            //inférieur
            if($ip_findeb_cmp == 0){
                //égal
                return 'forme une jonction par la fin avec';

            }elseif($ip_findeb_cmp == 1){
                //supérieur
                if($ip_fin_cmp == 0){
                    //égal
                    return 'est inclue dans (egalité fin)';

                }elseif($ip_fin_cmp == 1){
                    //supérieur (3)
                    return 'inclue';

                }else{
                    //inférieur (2)
                    return 'chevauche par la fin';
                }
            }else{
                return 'est different (avant)';
            }
        }
    }
}