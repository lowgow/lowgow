<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/lowgow.css">
<link rel='stylesheet' href='js/colorpicker/spectrum.css' />
<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script src='js/colorpicker/spectrum.js'></script>
<script src="https://d3js.org/d3.v4.min.js"></script>
<script src='js/download.js'></script>


<script type="text/javascript">

$(document).ready(function() 
    {
    $('#button').click(function(e)
        {
				var idVal = $('#list option:selected').text();
				var value = $("#showAlpha").val();
				$('#cvalue').text(value);
				var newColor = $("#showAlpha").spectrum('get').toHexString();
        var rect = $('#' + idVal);
        rect.css('fill',newColor);
				var txt = $("#nameinput").val();
				$('#name').text(txt); 
				$('#name').css("font-family", $(this).val());
     });  
		 
		  $('#button2').click(function(e)
        {
				var idVal = $('#list option:selected').text();
				var value = $("#showAlpha").val();
				var newColor = $("#showAlpha").spectrum('get').toHexString();
        var rect = $('#' + idVal);
        rect.css('stroke',newColor);
				var weight = $("#weight").val();
				rect.css('stroke-width',weight);
     }); 
		   $('#spacing').change(function() {
        
				$('#name').css("letter-spacing", $("#spacing").val());
     });   
		   $('#wordSpacing').change(function() {
        
				$('#name').css("word-spacing", $("#lineHeight").val());
     });    
    
		 
	
		$('#download').click(function(e)
        {
				var svgHtml = $('#logoCanvas').html();
				var svgHeader = '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg version="1.1" id="logoCanvas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="200px" height="200px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">';
				var svgFooter = '</svg>';
				var svgContent = svgHeader + svgHtml + svgFooter;
				download(svgContent, "logo.svg", "image/svg+xml");
				
     });   

$("#font").change(function() {
    //alert($(this).val());
    $('#name').css("font-family", $(this).val());

});

$("#size").change(function() {
    $('#name').css("font-size", $(this).val() + "px");
});

$("#showAlpha").spectrum({
    showAlpha: true
});

$("#imag > svg [id]").each(function() {
    $("#list").append("<option>" + this.id + "</option>");
});


$(".exportImageButton").on("click", function() {
	
			var svgHtml = $('#logoCanvas').html();
				var svgHeader = '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd"><svg version="1.1" id="logoCanvas" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="200px" height="200px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">';
				var svgFooter = '</svg>';
				var svgContent = svgHeader + svgHtml + svgFooter;
				
  var svgData = svgContent;
  var canvas = document.createElement("canvas");
	canvas.width  = 1600;
	canvas.height = 1200; 
	canvas.style.width  = '3200px';
	canvas.style.height = '2400px';
  var ctx = canvas.getContext("2d");
  ctx.scale(6, 6);
  var img = document.createElement("img");
  img.setAttribute("src", "data:image/svg+xml;base64," + btoa(unescape(encodeURIComponent(svgData))));
  img.onload = function() {
    ctx.drawImage(img, 0, 0);
    var canvasdata = canvas.toDataURL("image/png", 1);

    var pngimg = '<img src="' + canvasdata + '">';
    d3.select("#pngdataurl").html(pngimg);

    var a = document.createElement("a");
    a.download = "download_img" + ".png";
    a.href = canvasdata;
    document.body.appendChild(a);
    a.click();
  };
})

    });
		
		
</Script> 
</head>
<body>

<div id="imag">
<?php echo file_get_contents("images/logo.svg"); ?>
</div>

<!-- list of svg ids -->
<p>Select an item to update</p>
<select name="" id="list"></select>

<p>Enter text</p>
<input type="text" id="nameinput" />

<button id="button">update</button>
<button id="button2">stroke</button>
<button id="button3">spacing</button>
<div class='example'>
<input type='text' name='showAlpha' id='showAlpha' />
<div id="cvalue">value</div>
</div>



	<select id="font"> 
        <option value="Al Bayan">Al Bayan</option>
        <option value="American Typewriter">American Typewriter</option>
        <option value="Andale Mono">Andale Mono</option>
        <option value="Apple Casual">Apple Casual</option>
        <option value="Apple Chancery">Apple Chancery</option>
        <option value="Apple Garamond">Apple Garamond</option>
        <option value="Apple Gothic">Apple Gothic</option>
        <option value="Apple LiGothic">Apple LiGothic</option>
        <option value="Apple LiSung">Apple LiSung</option>
        <option value="Apple Myungjo">Apple Myungjo</option>
        <option value="Apple Symbols">Apple Symbols</option>
        <option value="AquaKana">AquaKana</option>
        <option value="Arial">Arial</option>
        <option value="Arial Hebrew">Arial Hebrew</option>
        <option value="Ayuthaya">Ayuthaya</option>
        <option value="Baghdad">Baghdad</option>
        <option value="Baskerville">Baskerville</option>
        <option value="Beijing">Beijing</option>
        <option value="BiauKai">BiauKai</option>
        <option value="Big Caslon">Big Caslon</option>
        <option value="Brush Script">Brush Script</option>
        <option value="Chalkboard">Chalkboard</option>
        <option value="Chalkduster">Chalkduster</option>
        <option value="Charcoal">Charcoal</option>
        <option value="Charcoal CY">Charcoal CY</option>
        <option value="Chicago">Chicago</option>
        <option value="Cochin">Cochin</option>
        <option value="Comic Sans">Comic Sans</option>
        <option value="Cooper">Cooper</option>
        <option value="Copperplate">Copperplate</option>
        <option value="Corsiva Hebrew">Corsiva Hebrew</option>
        <option value="Courier">Courier</option>
        <option value="Courier New">Courier New</option>
        <option value="DecoType Naskh">DecoType Naskh</option>
        <option value="Devanagari">Devanagari</option>
        <option value="Didot">Didot</option>
        <option value="Euphemia UCAS">Euphemia UCAS</option>
        <option value="Fang Song">Fang Song</option>
        <option value="Futura">Futura</option>
        <option value="Gadget">Gadget</option>
        <option value="Geeza Pro">Geeza Pro</option>
        <option value="Geezah">Geezah</option>
        <option value="Geneva">Geneva</option>
        <option value="Geneva CY">Geneva CY</option>
        <option value="Georgia">Georgia</option>
        <option value="Gill Sans">Gill Sans</option>
        <option value="Gujarati">Gujarati</option>
        <option value="Gung Seoche">Gung Seoche</option>
        <option value="Gurmukhi">Gurmukhi</option>
        <option value="Hangangche">Hangangche</option>
        <option value="HeadlineA">HeadlineA</option>
        <option value="Hei">Hei</option>
        <option value="Helvetica">Helvetica</option>
        <option value="Helvetica CY">Helvetica CY</option>
        <option value="Helvetica Neue">Helvetica Neue</option>
        <option value="Herculanum">Herculanum</option>
        <option value="Hiragino Kaku Gothic Pro">Hiragino Kaku Gothic Pro</option>
        <option value="Hiragino Kaku Gothic ProN">Hiragino Kaku Gothic ProN</option>
        <option value="Hiragino Kaku Gothic Std">Hiragino Kaku Gothic Std</option>
        <option value="Hiragino Kaku Gothic StdN">Hiragino Kaku Gothic StdN</option>
        <option value="Hiragino Maru Gothic Pro">Hiragino Maru Gothic Pro</option>
        <option value="Hiragino Maru Gothic ProN">Hiragino Maru Gothic ProN</option>
        <option value="Hiragino Mincho Pro">Hiragino Mincho Pro</option>
        <option value="Hiragino Mincho ProN">Hiragino Mincho ProN</option>
        <option value="Hoefler Text">Hoefler Text</option>
        <option value="Inai Mathi">Inai Mathi</option>
        <option value="Impact">Impact</option>
        <option value="Jung Gothic">Jung Gothic</option>
        <option value="Kai">Kai</option>
        <option value="Keyboard">Keyboard</option>
        <option value="Krungthep">Krungthep</option>
        <option value="KufiStandard GK">KufiStandard GK</option>
        <option value="LastResort">LastResort</option>
        <option value="LiHei Pro">LiHei Pro</option>
        <option value="LiSong Pro">LiSong Pro</option>
        <option value="Lucida Grande">Lucida Grande</option>
        <option value="Marker Felt">Marker Felt</option>
        <option value="Menlo">Menlo</option>
        <option value="Monaco">Monaco</option>
        <option value="Monaco CY">Monaco CY</option>
        <option value="Mshtakan">Mshtakan</option>
        <option value="Nadeem">Nadeem</option>
        <option value="New Peninim">New Peninim</option>
        <option value="New York">New York</option>
        <option value="NISC GB18030">NISC GB18030</option>
        <option value="Optima">Optima</option>
        <option value="Osaka">Osaka</option>
        <option value="Palatino">Palatino</option>
        <option value="Papyrus">Papyrus</option>
        <option value="PC Myungjo">PC Myungjo</option>
        <option value="Pilgiche">Pilgiche</option>
        <option value="Plantagenet Cherokee">Plantagenet Cherokee</option>
        <option value="Raanana">Raanana</option>
        <option value="Sand">Sand</option>
        <option value="Sathu">Sathu</option>
        <option value="Seoul">Seoul</option>
        <option value="Shin Myungjo Neue">Shin Myungjo Neue</option>
        <option value="Silom">Silom</option>
        <option value="Skia">Skia</option>
        <option value="Song">Song</option>
        <option value="ST FangSong">ST FangSong</option>
        <option value="ST Heiti">ST Heiti</option>
        <option value="ST Kaiti">ST Kaiti</option>
        <option value="ST Song">ST Song</option>
        <option value="Symbol">Symbol</option>
        <option value="Tae Graphic">Tae Graphic</option>
        <option value="Tahoma">Tahoma</option>
        <option value="Taipei">Taipei</option>
        <option value="Techno">Techno</option>
        <option value="Textile">Textile</option>
        <option value="Thonburi">Thonburi</option>
        <option value="Times">Times</option>
        <option value="Times CY">Times CY</option>
        <option value="Times New Roman">Times New Roman</option>
        <option value="Trebuchet MS">Trebuchet MS</option>
        <option value="Verdana">Verdana</option>
        <option value="Zapf Chancery">Zapf Chancery</option>
        <option value="Zapf Dingbats">Zapf Dingbats</option>
        <option value="Zapfino">Zapfino</option>
		</select>

	<p>Font Size</p>
		<select id="size">
        <option value="7">7</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
    </select>
  <p>Stroke Weight</p>  
    <select id="weight">
    		<option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    
    <p>Letter Spacing</p>
    <select id="spacing">
    		<option value="2px">2</option>
   			<option value="3px">3</option>
    		<option value="5px">5</option>
        <option value="10px">10</option>
        <option value="15px">15</option>
    </select>
    <p>Word Spacing</p>
 		<select id="wordSpacing">
   		 <option value="2">2</option>
    		<option value="3">3</option>
    		<option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
 
    </select>
    
    <p>Get Logo</p>
    <button id="download">download svg</button>
		<button class="exportImageButton">export to png</button>
 
</body>
</html>