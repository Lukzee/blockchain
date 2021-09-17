<?php
require_once 'class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blockchain</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="font_awesome/fontawesome-4.3.0.min.css">
    <style>
        body {
            margin-top: 14px;
        }

        .col-md-12 {
            text-align: center;
        }

        .exa1, .exa2, .aud1, .aud2, .eo1, .eo2 {
            background-color: #128a2e;
            padding: 10px;
            margin: 5px;
        }

        .txt {
            height: 18px;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"><p>Examiner</p></div>
            <div class="col-md-1"></div>
            <div class="col-md-5 exa1">
                <input type="file" id="exa1file" onchange="UpldImage('exa1','exa1file');" class="txt" style="width:100%;"><br>
                <label for="nonce">Nonce </label> <input type="text" readonly id="exa1nonce" class="txt" style="width:88%;"><br>
                <label for="">Prev Hash </label> <input type="text" readonly id="exa1phash" class="txt" style="width:82%;"><br>
                <label for="">New Hash </label> <input type="text" readonly id="exa1nhash" class="txt" style="width:82%;"><br>
                <input type="button" onclick="updateRec('exa1','exa1file', 'exa1nhash');" class="btn-primary" value="MINE">
            </div><br>

            <div class="col-md-5 exa2">
                <input type="file" id="exa2file" onchange="UpldImage('exa2','exa2file');" class="txt" style="width:100%;"><br>
                <label for="nonce">Nonce </label> <input type="text" readonly id="exa2nonce" class="txt" style="width:88%;"><br>
                <label for="">Prev Hash </label> <input type="text" readonly id="exa2phash" class="txt" style="width:82%;"><br>
                <label for="">New Hash </label> <input type="text" readonly id="exa2nhash" class="txt" style="width:82%;"><br>
                <input type="button" onclick="updateRec('exa2','exa2file', 'exa2nhash');" class="btn-primary" value="MINE">
            </div><br>
            

            <div class="col-md-12"><p>Auditor</p></div>
            
            <div class="col-md-1"></div>
            <div class="col-md-5 aud1">
                <input type="file" id="aud1file" onchange="UpldImage('aud1','aud1file');" class="txt" style="width:80%;"> &nbsp; &nbsp; &nbsp; 
                <a id="aud1link" href="#"><i style="color:blue;" class="fa fa-download"></i></a><br>
                <label for="nonce">Nonce </label> <input type="text" readonly id="aud1nonce" class="txt" style="width:88%;"><br>
                <label for="">Prev Hash </label> <input type="text" readonly id="aud1phash" class="txt" style="width:82%;"><br>
                <label for="">New Hash </label> <input type="text" readonly id="aud1nhash" class="txt" style="width:82%;"><br>
                <input type="button" onclick="updateRec('aud1','aud1file', 'aud1nhash');" class="btn-primary" value="MINE">
            </div><br>
            
            <div class="col-md-5 aud2">
                <input type="file" id="aud2file" onchange="UpldImage('aud2','aud2file');" class="txt" style="width:80%;"> &nbsp; &nbsp; &nbsp; 
                <a id="aud2link" href="#"><i style="color:blue;" class="fa fa-download"></i></a><br>
                <label for="nonce">Nonce </label> <input type="text" readonly id="aud2nonce" class="txt" style="width:88%;"><br>
                <label for="">Prev Hash </label> <input type="text" readonly id="aud2phash" class="txt" style="width:82%;"><br>
                <label for="">New Hash </label> <input type="text" readonly id="aud2nhash" class="txt" style="width:82%;"><br>
                <input type="button" onclick="updateRec('aud2','aud2file', 'aud2nhash');" class="btn-primary" value="MINE">
            </div><br>
            

            <div class="col-md-12"><p>Exam Officer</p></div>
            
            <div class="col-md-1"></div>
            <div class="col-md-5 eo1">
                <input type="file" id="eo1file" onchange="UpldImage('eo1','eo1file');" class="txt" style="width:80%;"> &nbsp; &nbsp; &nbsp; 
                <a id="eo1link" href="#"><i style="color:blue;" class="fa fa-download"></i></a><br>
                <label for="nonce">Nonce </label> <input type="text" readonly id="eo1nonce" class="txt" style="width:88%;"><br>
                <label for="">Prev Hash </label> <input type="text" readonly id="eo1phash" class="txt" style="width:82%;"><br>
                <label for="">New Hash </label> <input type="text" readonly id="eo1nhash" class="txt" style="width:82%;"><br>
                <input type="button" onclick="updateRec('eo1','eo1file', 'eo1nhash');" class="btn-primary" value="MINE">
            </div><br>
            
            <div class="col-md-5 eo2">
                <input type="file" id="eo2file" onchange="UpldImage('eo2','eo2file');" class="txt" style="width:80%;"> &nbsp; &nbsp; &nbsp; 
                <a id="eo2link" href="#"><i style="color:blue;" class="fa fa-download"></i></a><br>
                <label for="nonce">Nonce </label> <input type="text" readonly id="eo2nonce" class="txt" style="width:88%;"><br>
                <label for="">Prev Hash </label> <input type="text" readonly id="eo2phash" class="txt" style="width:82%;"><br>
                <label for="">New Hash </label> <input type="text" readonly id="eo2nhash" class="txt" style="width:82%;"><br>
                <input type="button" onclick="updateRec('eo2','eo2file', 'eo2nhash');" class="btn-primary" value="MINE">
            </div><br>
            
            <!-- <div class="col-md-12">
                <h4>Record</h4>
                <h4>Examiner: , Auditor: , Exam Officer: </h4>
            </div> -->
        </div>
    </div>

    <script src="jquery.js"></script>
    <script src="main.js"></script>
</body>
</html>