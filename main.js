// upload console image
function UpldImage(block, bimg) {
    let imageee = document.getElementById(bimg).files[0].name;
    var form_data = new FormData();
    var ext = imageee.split('.').pop().toLowerCase();

    if (imageee !== '') {
        if(jQuery.inArray(ext, ['xls','xlsx']) == -1) {
            alert("Invalid File");
        }

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(bimg).files[0]);
        
        form_data.append("file", document.getElementById(bimg).files[0]);
        form_data.append("block", block);
        $.ajax({
            url: 'process.php',
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                //$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
            },   
            success:function(data) {
                var myRes = JSON.parse(data);

                if (block == 'exa1') {
                    // # Examiner
                    $('#exa1nonce').val(myRes.block1[1]);
                    $('#exa1phash').val(myRes.block1[2]);
                    $('#exa1nhash').val(myRes.block1[3]);
                    $('#exa2nonce').val(myRes.block1[5]);
                    $('#exa2phash').val(myRes.block1[6]);
                    $('#exa2nhash').val(myRes.block1[7]);

                    // # Auditor
                    $('#aud1link').attr('href', 'upload/'+myRes.block2[0]);
                    $('#aud1nonce').val(myRes.block2[1]);
                    $('#aud1phash').val(myRes.block2[2]);
                    $('#aud1nhash').val(myRes.block2[3]);
                    $('#aud2link').attr('href', 'upload/'+myRes.block2[4]);
                    $('#aud2nonce').val(myRes.block2[5]);
                    $('#aud2phash').val(myRes.block2[6]);
                    $('#aud2nhash').val(myRes.block2[7]);

                    // # Exam Officer
                    $('#eo1link').attr('href', 'upload/'+myRes.block3[0]);
                    $('#eo1nonce').val(myRes.block3[1]);
                    $('#eo1phash').val(myRes.block3[2]);
                    $('#eo1nhash').val(myRes.block3[3]);
                    $('#eo2link').attr('href', 'upload/'+myRes.block3[4]);
                    $('#eo2nonce').val(myRes.block3[5]);
                    $('#eo2phash').val(myRes.block3[6]);
                    $('#eo2nhash').val(myRes.block3[7]);
                } else {
                    $('#'+block+'nhash').val(myRes.newnhash);

                    if (myRes.newnhash != myRes.oldnhash) {
                        $('.'+block).css('background-color', 'red');
                    }
                }
            }
        });
    }
}

function updateRec(block, bimg, nhash) {
    let imageee = document.getElementById(bimg).files[0].name;
    var form_data = new FormData();
    var ext = imageee.split('.').pop().toLowerCase();

    var newhash = $('#'+nhash).val();

    $('.'+block).css('background-color', '#128a2e');

    if (imageee !== '') {
        if(jQuery.inArray(ext, ['xls','xlsx']) == -1) {
            alert("Invalid File");
        }

        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById(bimg).files[0]);
        
        form_data.append("file2", document.getElementById(bimg).files[0]);
        form_data.append("block2", block);
        form_data.append("newhash", newhash);
        $.ajax({
            url: 'process.php',
            method:"POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function(){
                //$('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
            },   
            success:function(data) {
                let a = $('#exa2phash').val(),
                b = $('#exa1nhash').val(),
                c = $('#aud1phash').val(),
                d = $('#exa2nhash').val(),
                e = $('#aud2phash').val(),
                f = $('#aud1nhash').val(),
                g = $('#eo1phash').val(),
                h = $('#aud2nhash').val(),
                i = $('#eo2phash').val(),
                j = $('#eo1nhash').val(),
                k = $('#'+block+'nhash').val();

                if (a != b) {
                    $('.exa2').css('background-color', 'red');
                }

                if (c != d) {
                    $('.aud1').css('background-color', 'red');
                }

                if (e != f) {
                    $('.aud2').css('background-color', 'red');
                }

                if (g != h) {
                    $('eo1.').css('background-color', 'red');
                }

                if (i != j) {
                    $('.eo2').css('background-color', 'red');
                }

                if (data != k) {
                    $('.'+block).css('background-color', 'red');
                }
            }
        });
    }
}