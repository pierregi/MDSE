<div onmouseover="mafunction()">bonjour</div>
<div id="dwv" style="position:'center'; visibility: hidden; " >
    <div class="layerContainer">
        <canvas class="imageLayer"></canvas>
    </div>
    <input type="range" id="sliceRange" value="0" style="width:150px">

</div>
<script src="<?php echo base_url();?>dwv/dist/dwv.js"></script>
<!--<script src="https://github.com/ivmartel/dwv/releases/download/v0.25.2/dwv-0.25.2.min.js"></script>-->
<script type="text/javascript">
function mafunction(){
    dwv.gui.getElement = dwv.gui.base.getElement;
    dwv.gui.displayProgress = function (percent) {};

    // create the dwv app
    var app = new dwv.App();
    dwv.image.decoderScripts = {
        "jpeg2000": "<?php echo base_url();?>dwv/decoders/pdfjs/decode-jpeg2000.js",
        "jpeg-lossless": "<?php echo base_url();?>dwv/decoders/rii-mango/decode-jpegloss.js",
        "jpeg-baseline": "<?php echo base_url();?>dwv/decoders/pdfjs/decode-jpegbaseline.js"
    };
    // initialise with the id of the container div
    app.init({
        "containerDivId": "dwv",
        "tools": ["Scroll"]
    });
    // load dicom data
    app.loadURLs([<?php 
        for($i=1;$i<$fin;$i++){
            echo "'{$file}image-";
            if($i<10){
                echo "00000";
            }else if($i<100){
                echo "0000";
            }else if($i<1000){
                echo "000";
            }else if($i<10000){
                echo "00";
            }else if($i<100000){
                echo "0";
            }
            echo "{$i}.dcm',";
        }
        echo "'{$file}image-";
        if($i<10){
            echo "00000";
        }else if($i<100){
            echo "0000";
        }else if($i<1000){
            echo "000";
        }else if($i<10000){
            echo "00";
        }else if($i<100000){
            echo "0";
        }
        echo "{$i}.dcm'";
    ?>]);

    var range = document.getElementById("sliceRange");
    range.min = 0;
    app.addEventListener("load-end", function () {
        range.max = app.getImage().getGeometry().getSize().getNumberOfSlices() - 1;
    });
    app.addEventListener("slice-change", function () {
        range.value = app.getViewController().getCurrentPosition().k;
    });
    range.oninput = function () {
        var pos = app.getViewController().getCurrentPosition();
        pos.k = this.value;
        app.getViewController().setCurrentPosition(pos);
    }
    document.getElementById("dwv").style.visibility="visible";
    }
    // base function to get elements
    
</script>
