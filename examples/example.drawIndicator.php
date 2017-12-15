<?php   
/* CAT:Labels */

/* pChart library inclusions */
require_once("bootstrap.php");

use pChart\{
	pDraw,
	pIndicator
};

/* Create the pChart object */
$myPicture = new pDraw(700,230);

/* Populate the pData object */
$myPicture->myData->addPoints([4,12,15,8,5,-5],"Probe 1");
$myPicture->myData->addPoints([7,2,4,14,8,3],"Probe 2");
$myPicture->myData->setAxisName(0,"Temperatures");
$myPicture->myData->setAxisUnit(0,"�C");
$myPicture->myData->addPoints(["Jan","Feb","Mar","Apr","May","Jun"],"Labels");
$myPicture->myData->setSerieDescription("Labels","Months");
$myPicture->myData->setAbscissa("Labels");

/* Draw the background */
$Settings = array("R"=>170, "G"=>183, "B"=>87, "Dash"=>1, "DashR"=>190, "DashG"=>203, "DashB"=>107);
$myPicture->drawFilledRectangle(0,0,700,230,$Settings);

/* Overlay with a gradient */
$Settings = array("StartR"=>219, "StartG"=>231, "StartB"=>139, "EndR"=>1, "EndG"=>138, "EndB"=>68, "Alpha"=>50);
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL,$Settings);
$myPicture->drawGradientArea(0,0,700,20,DIRECTION_VERTICAL,["StartR"=>0,"StartG"=>0,"StartB"=>0,"EndR"=>50,"EndG"=>50,"EndB"=>50,"Alpha"=>80]);

/* Add a border to the picture */
$myPicture->drawRectangle(0,0,699,229,["R"=>0,"G"=>0,"B"=>0]);

/* Write the picture title */ 
$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/Silkscreen.ttf","FontSize"=>6));
$myPicture->drawText(10,13,"drawIndicator() - Create nice looking indicators",["R"=>255,"G"=>255,"B"=>255]);

/* Create the pIndicator object */ 
$Indicator = new pIndicator($myPicture);

$myPicture->setFontProperties(array("FontName"=>"pChart/fonts/pf_arma_five.ttf","FontSize"=>6));

/* Define the indicator sections */
$IndicatorSections = [
	array("Start"=>0,"End"=>199,"Caption"=>"Low","R"=>0,"G"=>142,"B"=>176),
	array("Start"=>200,"End"=>239,"Caption"=>"Moderate","R"=>108,"G"=>157,"B"=>49),
	array("Start"=>240,"End"=>300,"Caption"=>"High","R"=>157,"G"=>140,"B"=>49)
];
/* Draw the 1st indicator */
$IndicatorSettings = array("Values"=>[20,230],"ValueFontName"=>"pChart/fonts/Forgotte.ttf","ValueFontSize"=>15,"IndicatorSections"=>$IndicatorSections,"SubCaptionColorFactor"=>-40);
$Indicator->draw(80,50,550,50,$IndicatorSettings);

/* Define the indicator sections */
$IndicatorSections = [
	array("Start"=>0,"End"=>99,"Caption"=>"Low","R"=>135,"G"=>49,"B"=>15),
	array("Start"=>100,"End"=>119,"Caption"=>"Borderline","R"=>183,"G"=>62,"B"=>15),
	array("Start"=>120,"End"=>220,"Caption"=>"High","R"=>226,"G"=>74,"B"=>14)
];
/* Draw the 2nd indicator */
$IndicatorSettings = array("Values"=>[100,201],"CaptionPosition"=>INDICATOR_CAPTION_BOTTOM,"CaptionR"=>0,"CaptionG"=>0,"CaptionB"=>0,"DrawLeftHead"=>FALSE,"ValueDisplay"=>INDICATOR_VALUE_LABEL,"ValueFontName"=>"pChart/fonts/Forgotte.ttf","ValueFontSize"=>15,"IndicatorSections"=>$IndicatorSections);
$Indicator->draw(80,160,550,30,$IndicatorSettings);

/* Render the picture (choose the best way) */
$myPicture->autoOutput("temp/example.drawIndicator.png");

?>