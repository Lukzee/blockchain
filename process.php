<?php
require_once 'class.php';

if (isset($_POST['block'])) {
    if ($_POST['block'] == 'exa1') {
        //upload
        if($_FILES["file"]["name"] != '') {
            $test = explode('.', $_FILES["file"]["name"]);
            $ext = end($test);
            $name = rand(100, 999) . '.' . $ext;
            $location = 'upload/' . $name;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                $exT1nounce = rand(100, 999);
                $exT1phash = '000000000000000000000';
                $exT1nhash = md5(md5_file($location). $exT1nounce);
                $exT2nounce = $exT1nounce*2;
                $exT2nhash = md5(md5_file($location). $exT2nounce);

                if (crud::update('examiner', "t1file='$name', t1nonce='$exT1nounce', t1phash='$exT1phash', t1nhash='$exT1nhash', t2file='$name', t2nonce='$exT2nounce', t2phash='$exT1nhash', t2nhash='$exT2nhash'", $conn)) {
                    $auT1nounce = $exT2nounce*2;
                    $auT1nhash = md5(md5_file($location). $auT1nounce);
                    $auT2nounce = $auT1nounce*2;
                    $auT2nhash = md5(md5_file($location). $auT2nounce);

                    if (crud::update('auditor', "t1file='$name', t1nonce='$auT1nounce', t1phash='$exT2nhash', t1nhash='$auT1nhash', t2file='$name', t2nonce='$auT2nounce', t2phash='$auT1nhash', t2nhash='$auT2nhash'", $conn)) {
                        $eoT1nounce = $auT2nounce*2;
                        $eoT1nhash = md5(md5_file($location). $eoT1nounce);
                        $eoT2nounce = $eoT1nounce*2;
                        $eoT2nhash = md5(md5_file($location). $eoT2nounce);

                        if (crud::update('exaoff', "t1file='$name', t1nonce='$eoT1nounce', t1phash='$auT2nhash', t1nhash='$eoT1nhash', t2file='$name', t2nonce='$eoT2nounce', t2phash='$eoT1nhash', t2nhash='$eoT2nhash'", $conn)) {
                            $q1 = crud::select('examiner', '', $conn);
                            $r1 = mysqli_fetch_array($q1);

                            $q2 = crud::select('auditor', '', $conn);
                            $r2 = mysqli_fetch_array($q2);

                            $q3 = crud::select('exaoff', '', $conn);
                            $r3 = mysqli_fetch_array($q3);
                            
                            $resp = array("block1"=> array($r1[0], $r1[1], $r1[2], $r1[3], $r1[4], $r1[5], $r1[6], $r1[7]), "block2"=> array($r2[0], $r2[1], $r2[2], $r2[3], $r2[4], $r2[5], $r2[6], $r2[7]), "block3"=> array($r3[0], $r3[1], $r3[2], $r3[3], $r3[4], $r3[5], $r3[6], $r3[7]));

                            $JSONresp = json_encode($resp);
                            echo $JSONresp;
                        }
                    }
                }
            }
        }
    } else {
        //upload
        if($_FILES["file"]["name"] != '') {
            $test = explode('.', $_FILES["file"]["name"]);
            $ext = end($test);
            $name = rand(100, 999) . '.' . $ext;
            $location = 'upload/' . $name;
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $location)) {
                if ($_POST['block'] == 'exa2') {
                    $tb = 'examiner';
                } elseif ($_POST['block'] == 'aud1' || $_POST['block'] == 'aud2') {
                    $tb = 'auditor';
                } elseif ($_POST['block'] == 'eo1' || $_POST['block'] == 'eo2') {
                    $tb = 'exaoff';
                }

                if (strpos($_POST['block'], '1') !== false) {
                    $col = "t1nhash";
                    $nnc = "t1nonce";
                } else {
                    $col = 't2nhash';
                    $nnc = 't2nonce';
                }

                $q1 = crud::select($tb, '', $conn);
                $r = mysqli_fetch_array($q1);
                $dnounce = $r[$nnc];
                $oldnhash = $r[$col];
                $newnhash = md5(md5_file($location). $dnounce);

                $resp = array("oldnhash"=> $oldnhash, "newnhash"=> $newnhash);
                $JSONresp = json_encode($resp);
                echo $JSONresp;
            }
        }
    }
}

if (isset($_POST['block2'])) {
    $newhash = $_POST['newhash'];
    //upload
    if($_FILES["file2"]["name"] != '') {
        $test = explode('.', $_FILES["file2"]["name"]);
        $ext = end($test);
        $name = rand(100, 999) . '.' . $ext;
        $location = 'upload/' . $name;
        if (move_uploaded_file($_FILES["file2"]["tmp_name"], $location)) {
            if ($_POST['block2'] == 'exa2') {
                $tb = 'examiner';
            } elseif ($_POST['block2'] == 'aud1' || $_POST['block2'] == 'aud2') {
                $tb = 'auditor';
            } elseif ($_POST['block2'] == 'eo1' || $_POST['block2'] == 'eo2') {
                $tb = 'exaoff';
            }

            if (strpos($_POST['block2'], '1') !== false) {
                $col = "t1nhash";
                $nnc = "t1nonce";
                $fn = "t1file";
            } else {
                $col = 't2nhash';
                $nnc = 't2nonce';
                $fn = 't2file';
            }
            if(crud::update($tb, $col . "= '$newhash', ". $fn . "= '$name'", $conn)) {
                $q1 = crud::select($tb, '', $conn);
                $r = mysqli_fetch_array($q1);
                $dnounce = $r[$nnc];

                $q2 = crud::select('examiner', '', $conn);
                $r2 = mysqli_fetch_array($q2);
                $location = 'upload/' . $r2['t1file'];

                $verhash = md5(md5_file($location). $dnounce);
                echo $verhash;
            }
        }
    }
}

?>
