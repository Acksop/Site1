<?php

include_once '../application/class/tri.class.php';

class TriTest extends PHPUnit_Framework_TestCase
{

	protected $essai;
	
	function testCompareIp(){
            $test_cmp1 = Tri::cmpIp('192.168.1.200','193.168.1.300');
            $test_cmp2 = Tri::cmpIp('192.168.1.200','191.168.1.200');
            $test_cmp3 = Tri::cmpIp('192.168.1.200','192.169.1.300');
            $test_cmp4 = Tri::cmpIp('192.168.1.200','192.167.1.300');
            $test_cmp5 = Tri::cmpIp('192.168.1.200','192.168.2.300');
            $test_cmp6 = Tri::cmpIp('192.168.1.200','192.168.0.300');
            $test_cmp7 = Tri::cmpIp('192.168.1.200','192.168.1.300');
            $test_cmp8 = Tri::cmpIp('192.168.1.200','192.168.1.100');
            $test_cmp9 = Tri::cmpIp('192.168.1.200','192.168.1.200');

            $this->assertEquals('-1', $test_cmp1);
            $this->assertEquals('1', $test_cmp2);
            $this->assertEquals('-1', $test_cmp3);
            $this->assertEquals('1', $test_cmp4);
            $this->assertEquals('-1', $test_cmp5);
            $this->assertEquals('1', $test_cmp6);
            $this->assertEquals('-1', $test_cmp7);
            $this->assertEquals('1', $test_cmp8);
            $this->assertEquals('0', $test_cmp9);
			//$this->assertNotEquals(10, $essai);
	}

	function testIntervalIp(){

	    $interval = array('192.168.1.0','192.168.1.255');

        $test_interval1 = array('192.168.1.10','192.168.1.25');
        $test_interval2 = array('192.168.0.10','192.168.1.25');
        $test_interval3 = array('192.168.1.25','192.168.2.25');
        $test_interval4 = array('192.168.0.10','192.168.2.25');
        $test_interval5 = array('192.168.0.10','192.168.0.25');
        $test_interval6 = array('192.168.2.10','192.168.2.25');
        $test_interval7 = array('192.168.0.10','192.168.1.0');
        $test_interval8 = array('192.168.1.255','192.168.2.25');
        $test_interval9 = array('192.168.0.10','192.168.1.255');
        $test_interval10 = array('192.168.1.0','192.168.2.25');
        $test_interval11 = array('192.168.1.100','192.168.1.255');
        $test_interval12 = array('192.168.1.0','192.168.1.255');

        $resultatTest_interval1 = Tri::cmpInterval($interval,$test_interval1);
        $resultatTest_interval2 = Tri::cmpInterval($interval,$test_interval2);
        $resultatTest_interval3 = Tri::cmpInterval($interval,$test_interval3);
        $resultatTest_interval4 = Tri::cmpInterval($interval,$test_interval4);
        $resultatTest_interval5 = Tri::cmpInterval($interval,$test_interval5);
        $resultatTest_interval6 = Tri::cmpInterval($interval,$test_interval6);
        $resultatTest_interval7 = Tri::cmpInterval($interval,$test_interval7);
        $resultatTest_interval8 = Tri::cmpInterval($interval,$test_interval8);
        $resultatTest_interval9 = Tri::cmpInterval($interval,$test_interval9);
        $resultatTest_interval10 = Tri::cmpInterval($interval,$test_interval10);
        $resultatTest_interval11 = Tri::cmpInterval($interval,$test_interval11);
        $resultatTest_interval12 = Tri::cmpInterval($interval,$test_interval12);

        $this->assertEquals('inclue', $resultatTest_interval1);
        $this->assertEquals('chevauche par le debut', $resultatTest_interval2);
        $this->assertEquals('chevauche par la fin', $resultatTest_interval3);
        $this->assertEquals('est inclue dans', $resultatTest_interval4);
        $this->assertEquals('est different (apres)', $resultatTest_interval5);
        $this->assertEquals('est different (avant)', $resultatTest_interval6);
        $this->assertEquals('forme une jonction par le debut avec', $resultatTest_interval7);
        $this->assertEquals('forme une jonction par la fin avec', $resultatTest_interval8);
        $this->assertEquals('chevauche par la fin (egalité fin)', $resultatTest_interval9);
        $this->assertEquals('chevauche par le debut (egalité debut)', $resultatTest_interval10);
        $this->assertEquals('est inclue dans (egalité fin)', $resultatTest_interval11);
        $this->assertEquals('sont égaux', $resultatTest_interval12);

    }
	
}

?>