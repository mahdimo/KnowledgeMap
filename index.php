<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" lang="en" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/Map">

<head>
<title>OII Network Visualisation Example</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,user-scalable=no" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css"/>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" media="screen and (max-height: 770px)" href="css/tablet.css" />
<link rel="stylesheet" href="css/iThing-min.css" type="text/css" />
<!--[if IE]><script type="text/javascript" src="js/excanvas.js"></script><![endif]--> <!-- js/default.js -->
<script src="js/jquery/jquery.min.js" type="text/javascript"></script>
<script src="js/sigma/sigma.min.js" type="text/javascript" language="javascript"></script>
<script src="js/sigma/sigma.parseJson.js" type="text/javascript" language="javascript"></script>
<script src="js/fancybox/jquery.fancybox.pack.js" type="text/javascript" language="javascript"></script>
<script src="js/main.js" type="text/javascript" language="javascript"></script>
<script src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="js/jQRangeSlider-min.js"></script>
<script src="js/scripts.js" type="text/javascript" language="javascript"></script>
</head>


<body>
  <div class="sigma-parent">
	<div id="loading-trans">
	<!-- juni [req REQ_004] - 2014-10-08 - add a nice loading indicator so that the end-user can know that something is loaded -->
		<img id="loading-trans-image" src="images/loader7.gif" alt="Loading..." />
	</div>
	<!-- juni [req REQ_004] - 2014-10-08 - add loading indicator -->
    <div class="sigma-expand" id="sigma-canvas"></div>
  </div>
<div id="mainpanel">
  <div class="col">
	<div id="maintitle"></div>
    <div id="title"></div>
    <div id="titletext"></div>
    <div class="info cf">
      <dl>
        <dt class="moreinformation"></dt>
        <dd class="line"><a href="#information" class="line fb">More about this visualisation</a></dd>
      </dl>
    </div>
<div id="legend">
	<div class="box">
		<h2>Legend:</h2>
		<dl>
		<dt class="node"></dt>
		<dd></dd>
		<dt class="edge"></dt>
		<dd></dd>
		<dt class="colours"></dt>
		<dd></dd>		
		</dl>
	</div>
</div> 
    <div class="b1">
   <!--  <form> -->
   <!-- juni [req REQ_004] - 2014-10-08 - added id to form and added new, needed filters  -->
	<form id="search_form">
	<input type="hidden" name="year_min" id="year_min" value="2005"><!-- dummy filed to hold value on load (so that the slider has a default minum year)-->
	<input type="hidden" name="year_max" id="year_max" value="2014"><!-- dummy filed to hold value on load (so that the slider has a default maximum year)-->
	<input type="hidden" name="year_reg" id="year_reg" value=""> <!-- dummy filed to hold value of year-->
	<div id="year_filter_div" class="cf"><h2>Filter by year:</h2> <!-- div that will hold slider -->
		<div id="year-slider"></div>
		<div class="year_state"></div>
		<div class="year_results"></div>				
	</div>	
	<div id="source_filter" class="cf" style="margin-top:10px;"><h2>Filter by source:</h2><!-- div that will source buttons with default having the image "pressed" -->
		<div id="source_buttons">
			<input type="radio" name="misq" id="misq" value="misq" /><label for="misq"><img src="images/source_buttons/misq_press.png" alt="MIS QUARTERLY" /></label>
			<input type="radio" name="isr" id="isr" value="isr" /><label for="isr"><img src="images/source_buttons/isr_press.png" alt="INFORMATION SYSTEMS RESEARCH" /></label>
			<input type="radio" name="jmis" id="jmis" value="jmis"  /><label for="jmis"><img src="images/source_buttons/jmis_press.png" alt="JOURNAL OF MANAGEMENT INFORMATION SYSTEMS" /></label>
			<input type="radio" name="jais" id="jais" value="jais"  /><label for="jais"><img src="images/source_buttons/jais_press.png" alt="JOURNAL OF THE ASSOCIATION FOR INFORMATION SYSTEMS" style="margin-right:15px;" /></label>
			<input type="radio" name="jsis" id="jsis" value="jsis"  /><label for="jsis"><img src="images/source_buttons/jsis_press.png" alt="JOURNAL OF STRATEGIC INFORMATION SYSTEMS" /></label>
			<input type="radio" name="isj" id="isj" value="isj"  /><label for="isj"><img src="images/source_buttons/isj_press.png" alt="INFORMATION SYSTEMS JOURNAL" /></label>
			<input type="radio" name="jit" id="jit" value="jit" /><label for="jit"><img src="images/source_buttons/jit_press.png" alt="JOURNAL OF INFORMATION TECHNOLOGY" /></label>
			<input type="radio" name="ejis" id="ejis" value="ejis"  /><label for="ejis"><img src="images/source_buttons/ejis_press.png" alt="EUROPEAN JOURNAL OF INFORMATION SYSTEMS" /></label>
		</div>
	</div>
	<!-- juni [req REQ_002] - 2014-10-08  - added needed filters  --> 	
      <div id="search" class="cf"><h2>Search:</h2>
        <input type="text" name="search" placeholder="Search by title" class="empty"/><div id="search_filter_state" class="state"></div><!--the default value changed to placeholder  - so that it is ignored on filter-->
        <div class="results"></div>
      </div>
      <div class="cf" id="attributeselect"><h2>Group Selector:</h2>
        <div class="select">Select Group</div>
	<div class="list cf"></div>
      </div>
    </form>
    </div>
  </div>
  <div id="information">
  </div>
</div>
	<div id="zoom">
  		<div class="z" rel="in"></div> <div class="z" rel="out"></div> <div class="z" rel="center"></div>
	</div>

<div id="attributepane">
<div class="text">
	<div title="Close" class="left-close returntext"><div class="c cf"><span>Return to the full network</span></div></div>	
<div class="headertext">
	<span>Information Pane</span>
</div>	
  <div class="nodeattributes">
    <div class="name"></div>
	<div class="data"></div>
	<div class="mydatabase">
	  <?php
	     echo "<h2> read from the database</h2>";
	     include "includes/connection.php";
	      $query="SELECT * FROM papers";
	      $result=mysql_query($query);
	
	      while ($a=mysql_fetch_array($result)) {
		       echo "<h3>", $a["table"],"</h3>";
	       }
      ?>
    </div>
    <div class="p">Connections:</div>
    <div class="link">
      <table>
      </table>
    </div>
  </div>
	</div>
</div>
<div id="developercontainer">
	<font color="#505050 ">
	* Hover on a node to see the title
	** Mouse scroll to quick zoom
	*** Zoom all the way to see all titles
	</font>
</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21293169-4']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
