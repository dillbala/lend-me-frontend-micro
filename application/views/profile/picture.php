<?php if (!empty($error))
{
    echo $error;
}?>


<div class="container-fluid">
<video id="video" width="240" height="200" autoplay></video>
<canvas id="canvas" width="240" height="200"></canvas>
<hr>
<button id="snap">Capture Photo</button>


<button id="upload">upload</button>
</div>
<script>





var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
// Not adding `{ audio: true }` since we only want video now
navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
video.src = window.URL.createObjectURL(stream);
video.play();
});
}




var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');


document.getElementById("upload").addEventListener("click", function() {
    var image = new Image();

    image.src = canvas.toDataURL("image/jpg");
    console.log(image);
    $.post("<?php echo base_url().'profile/upload'?>", { file:canvas.toDataURL("image/jpg"), username:1, password:2} ,function(data){
        if (data==='success'){
            alert("Successfully uploaded");
            window.location.href = '<?php echo base_url()."profile/"?>';
            return false;

        }
        else {
            alert(data);
        }
    });




});



// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
    context.drawImage(video, 0, 0, 240, 200);

});

</script>
