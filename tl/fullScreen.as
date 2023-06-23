
stop();
/* -----BEGIN VERSION CONTROL INFO----
  Name: True fullscreen resize with swf pattern and picture. Version 1.0;
  Author: dSKY
  Last Modified: April 01 2008
  
  Comments:
  -
    ------END VERSION CONTROL INFO-----
*/

import flash.display.BitmapData;
import mx.transitions.Tween;
import mx.transitions.easing.*;

Stage.align="TL"; // this is mandatory

Stage.scaleMode="noScale";
var currentFocus:MovieClip; // variable to hold currently focused clip
var oldFocus:MovieClip; // variable to hold clip that just lost focus 
// we use these ^^ two variables for "jumbing between pattern , picture and external swf.
//--------///
tileHolder_mc._alpha =0; 
picHolder_mc._alpha = 0;
SWFHolder_mc._alpha = 100;
//--------///
center_mc.loader_mc._visible = false; // hide the loader on start.
// this is the code for right click menu
var menu:ContextMenu=new ContextMenu();
menu.hideBuiltInItems();
// first menu item
var menuItem:ContextMenuItem= new ContextMenuItem("fullScreen",goFullScreen,true);

//second  menu item
var menuItem2:ContextMenuItem=new ContextMenuItem("return to normal",normalMode,false,false);

// third menu item
var menuItem3:ContextMenuItem=new ContextMenuItem("developed by: Hybrid Studio",developedBy,true);

// assign new menu items to menu instance
menu.customItems.push(menuItem,menuItem2,menuItem3);

// assign menu istance to the main movie
this.menu=menu;
// reference to the main movie , use this instead of root
var mainTimeline=this;
this._lockroot = true; // we also lock the root of this movie so it can safely be loaded in another movie

// a variable to track if developedBY function is called , that's a function activated on right click.
var developedCalled:Boolean=false;
// initialize all the elements to their positions on start
// explanations for these functions are at the place of their construction , couple of rows down
		moveUpperLeft(buttonUL);
		moveLowerLeft(buttonLL);
		moveUpperRight(buttonUR);
		moveLowerRight(buttonLR);
		//------------------------
		moveMiddleLeft(arrowML);
		moveMiddleRight(arrowMR);
		moveUpperMiddle(arrowUM);
		moveLowerMiddle(arrowLM);
		//------------------------
		moveToCenter(center_mc);
		moveToCenter(center_content);
		moveToCenter(sub_menu);
		
// code for handling Stage.onResize and Stage.onFullScreen events
var stageL:Object=new Object();

stageL.onResize = function() {
	// move  all the elements to their positions when the movie is resized.
		moveUpperLeft(buttonUL);
		moveLowerLeft(buttonLL);
		moveUpperRight(buttonUR);
		moveLowerRight(buttonLR);
		//------------------------
		moveMiddleLeft(arrowML);
		moveMiddleRight(arrowMR);
		moveUpperMiddle(arrowUM);
		moveLowerMiddle(arrowLM);
		//------------------------
		moveToCenter(center_mc);
		moveToCenter(center_content);
		moveToCenter(sub_menu);
		
		// fill in the background with tiles 
		fillBG(tileHolder_mc);
		//--------------------
		
		setBgSize(picHolder_mc); // resize the picture
		setBgSize(SWFHolder_mc);
		setBgSize(transoutLoader);// resize the swf
		setBgSize(transinLoader);
// if developedBy function is called reposition madeBy_mc and redraw black_mc
	if (developedCalled){
		moveToCenter(madeBy_mc);
		with (black_mc){
			black_mc.clear();
			black_mc.beginFill(0x000000);
			black_mc.lineStyle(0,0x000000);
			black_mc.moveTo(0,0);
			black_mc.lineTo(Stage.width,0);
			black_mc.lineTo(Stage.width,Stage.height);
			black_mc.lineTo(0,Stage.height);
			black_mc.lineTo(0,0);
			black_mc.endFill();
		}
	}

}

// code for handling stage onFullScreen event
stageL.onFullScreen=function(bFull:Boolean){

// if in fullscreen
	if (bFull){
//disable go fullscreen menu item
menu.customItems[0].enabled=false;
menu.customItems[1].enabled=true;
	}
	else{
// if in normal mode disable go normal mode
menu.customItems[0].enabled=true;
menu.customItems[1].enabled=false;
	}
}

Stage.addListener(stageL); 
// END Stage onresize code


//-- FUNCTION developedBy------------------------------------------
//attach "made_by mc" from the library and draw black movie across whole //stage
function developedBy(){

	if (developedCalled) { 	// if developed is already called fade it and remove it
		black_mc.onEnterFrame=function(){
			madeBy_mc._alpha-=6;
			this._alpha-=4;
			if (this._alpha<= 0){
				delete this.onEnterFrame;
				madeBy_mc.removeMovieClip();
				this.removeMovieClip();
				developedCalled=false;
			}
		}
		
		return;  // exit the function
	}
	
// if it's not already called draw it on stage
	mainTimeline.createEmptyMovieClip('black_mc',this.getNextHighestDepth());
	mainTimeline.attachMovie("madeBy", "madeBy_mc", mainTimeline.getNextHighestDepth());
	madeBy_mc._x=Stage.width/2-madeBy_mc._width/2;
	madeBy_mc._y = Stage.height/2-madeBy_mc._height/2;
	madeBy_mc._alpha=0;
	with (black_mc){
		clear();
		beginFill(0x000000);
		lineStyle(0,0x000000);
		moveTo(0,0);
		lineTo(Stage.width,0);
		lineTo(Stage.width,Stage.height);
		lineTo(0,Stage.height);
		lineTo(0,0);
		endFill();
		trace('black mc created ');
	}
	
	black_mc._alpha=0;
// assign onMouseDown to black_mc ,so when the user click anywhere on the //stage, black_mc fades
	black_mc.onMouseDown=function(){
		this.onEnterFrame=function(){
			madeBy_mc._alpha-=6;
			this._alpha-=4;
			if (this._alpha<= 0){
				delete this.onEnterFrame;
				madeBy_mc.removeMovieClip();
				this.removeMovieClip();
				trace("movie erased");
				developedCalled=false;
			}
		}
	}

	madeBy_mc.onEnterFrame=function(){
		this._alpha+=6
		black_mc._alpha+=4
		if (black_mc._alpha>=50){
			black_mc._alpha=50;
		}
		if(this._alpha>=100){
			delete this.onEnterFrame; /// ovo promeniti u new Tween
		}
	}
	// handle madeBy_mc on press to go wherever you like
	// this link goes to my portfolio on flash den
	madeBy_mc.onPress=function(){
		this.getURL("http://www.flashden.net/user/dSKY/portfolio?ref=dSKY", "_blank");
		}
	// handle madeBy_mc onRollOver
	madeBy_mc.onRollOver = function() {
		this.gotoAndStop(2);
	}
	// handle madeBy_mc onRollOut
	madeBy_mc.onRollOut = function() {
		this.gotoAndStop(1);
	}
	developedCalled=true; // set the variable to true
}


// function to go fullscreen

function goFullScreen(){
if (Stage["displayState"] =="normal"){
Stage["displayState"]="fullScreen"
}
}

//function to go to normal mode
function normalMode(){
if (Stage["displayState"]=="fullScreen"){
Stage["displayState"]="normal"
}
}

// function for the button on the stage to toggle between fullscreen and normal mode 
center_mc.goFull.onRelease=function(){
if (Stage["displayState"]=="fullScreen"){
Stage["displayState"]="normal";
}
else {
	Stage["displayState"]="fullScreen";
}
}

buttonUR.full_screen_BTN.toggleFS.onRelease=function(){
if (Stage["displayState"]=="fullScreen"){
Stage["displayState"]="normal";
buttonUR.full_screen_BTN.mc_title.roll.titleTXT = "full screen";
}
else {
	Stage["displayState"]="fullScreen";
	buttonUR.full_screen_BTN.mc_title.roll.titleTXT = "exit full screen";
}
}

//IMPORTANT SECTION !! -- functions for positioning the elements on the stage.
/*
 all movie clips that are going to use these functions need to have registration point in the upper left corner
 that is flash default registration point.
 so , whenever you want to position something on the stage , use one of these functions , for the appropriate corner
 all these functions accept one parameter , that is the mc to be positioned on the stage.
*/
 
// function to position the movie  clip in the upper left corner of the stage 
function moveUpperLeft(mc:MovieClip) {
var x:Number = 0;
var y:Number = 0;
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}
// function to position the movie  clip in the lower left corner of the stage 
function moveLowerLeft(mc:MovieClip) {
var x:Number = 0;
var y:Number = Stage.height-mc._height;
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}
// function to position the movie  clip in the upper right corner of the stage 
function moveUpperRight(mc:MovieClip) {
var x:Number = Stage.width -mc._width;
var y:Number = 0;
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}
// function to position the movie  clip in the lower right corner of the stage 
function moveLowerRight(mc:MovieClip) {
var x:Number =Stage.width -mc._width;
var y:Number =Stage.height-mc._height;
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}
//---------------------
//FUNCITON TO SCALE ANY MOVIE CLIP TO FIT THE WHOLE SCREEN
// scales the mc proportionally to fit full screen 
function setBgSize(mc:MovieClip) { // pass in the mc to be scaled
	var imageRatio:Number = mc._width/mc._height;
	var stageRatio:Number = Stage.width/Stage.height;
	if (stageRatio>=imageRatio) {
		// match image width and adjust height to fit
		mc._width = Stage.width;
		mc._height = Stage.width/imageRatio;
	} else {
		// match image height and adjust width to fit
		mc._height = Stage.height;
		mc._width = Stage.height*imageRatio;
	}
}
//----------------------
// functions for arrows
// function to position the movie  clip in the middle of the stage   horizontaly  on the left side. 
function moveMiddleLeft(mc:MovieClip) {
var x:Number =0;
var y:Number =(Stage.height/2)-(mc._height/2);
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}
// function to position the movie  clip in the middle of the stage  horizontally on the right side.
function moveMiddleRight(mc:MovieClip) {
var x:Number =Stage.width-mc._width;
var y:Number =(Stage.height/2)-(mc._height/2);
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}
// function to position the movie clip in the middle of the stage  horizontally on the top.
function moveUpperMiddle(mc:MovieClip) {
var x:Number = (Stage.width/2)-(mc._width/2);
var y:Number =0
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}

// function to position the movie  clip in the middle of the stage  horizontally on the bottom.
function moveLowerMiddle(mc:MovieClip) {
var x:Number = (Stage.width/2)-(mc._width/2);
var y:Number =(Stage.height)-mc._height;
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.5,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.5,true);
}

// function to position the movie  clip in the middle of the stage  both horizontally and vertically.
// we use this for the menu
function moveToCenter(mc:MovieClip) {
var x:Number = (Stage.width/2)-(mc._width/2);
var y:Number =(Stage.height/2)-(mc._height/2);
new Tween(mc, "_x", Regular.easeOut, mc._x, x, 0.001,true);
new Tween(mc, "_y", Regular.easeOut, mc._y, y,0.001,true);
}

// CODE FOR TILING THE BACKGROUND //////

var tile:BitmapData = BitmapData.loadBitmap('tile'); // load the tile from the library
 // this is the function to fill the movie clip with the pattern across the whole stage
function fillBG(mc:MovieClip) { // pass in the clip to be filled with the tile
	mc.beginBitmapFill(tile);
	mc.moveTo(0,0);
	mc.lineTo(Stage.width,0);
	mc.lineTo(Stage.width,Stage.height);
	mc.lineTo(0,Stage.height);
	mc.lineTo(0,0);
	mc.endFill();
}

center_mc.createTiles_btn.onPress = function() {
	// chech to see if the tile is already created
	// if true exit the function
	if (currentFocus == mainTimeline.tileHolder_mc) { 
		return; 
		};
	tileHolder_mc._visible = true;
	tileHolder_mc._alpha = 0;
	new Tween(mainTimeline.tileHolder_mc, "_alpha", Regular.easeOut, 0, 100, 0.5, true);
	new Tween(oldFocus,'_alpha',Regular.easeOut, 100, 0, 0.5, true);
	fillBG(tileHolder_mc);
	currentFocus = mainTimeline.tileHolder_mc;
	oldFocus = mainTimeline.tileHolder_mc;
	trace('currentFocus ' + currentFocus);
	}


// CODE FOR LOADING PICTURE /////

center_mc.loadPic_btn.onRelease = function() {
	if (currentFocus == mainTimeline.picHolder_mc) { 
		trace('pic already focused return ')
		return; 
		};
	var loader:MovieClipLoader = new MovieClipLoader(); // create the MovieClipLoader to load the clip
	mainTimeline.center_mc.loader_mc.loadBar_mc._xscale = 0; //
	mainTimeline.center_mc.loader_mc._visible = true;
	var loaderL:Object = new Object();
	// on progress event fired by the MovieClipLoader
	loaderL.onLoadProgress = function(target:MovieClip, loaded:Number, total:Number):Void {
		var percent:Number = Math.ceil((loaded / total)*100);
		mainTimeline.center_mc.loader_mc.loaderBar_mc._xscale = percent;
		trace('percent '+percent);
	}
	// fired when the picture loads
	loaderL.onLoadInit = function(target:MovieClip) {
		
		setBgSize(target);
		new Tween(oldFocus,'_alpha',Regular.easeOut, 100, 0, 0.5, true);
		new Tween(target, "_alpha", Regular.easeOut, 0, 100,0.5,true);
		trace('load completed');
		mainTimeline.center_mc.loader_mc._visible = false;
		currentFocus = target;
		oldFocus = target;
		trace('currentFocus ' + currentFocus);
	}
	// fired when loading starts
	loaderL.onLoadStart = function(target:MovieClip):Void {
	mainTimeline.center_mc.loader_mc.loaderBar_mc._xscale = 0;
	mainTimeline.picHolder_mc._alpha = 0;
	}
	
	loader.addListener(loaderL);
	// clip to load
	loader.loadClip('picture.jpg', picHolder_mc);
	}



// LOADING EXTERNAL SWF THAT ACTUALLY PLAYS VIDEO... emebeded in that swf timeline....
/*
center_mc.loadSWF_btn.onPress = function() {
	if (currentFocus == mainTimeline.SWFHolder_mc) { 
		trace('SWF already focused return ')
		return; 
		};
	mainTimeline.center_mc.loader_mc._visible = true;
	var loader:MovieClipLoader = new MovieClipLoader();
	var loaderL:Object = new Object();
	
	loaderL.onLoadProgress = function(target:MovieClip, loaded:Number, total:Number):Void {
		var percent:Number = Math.ceil((loaded / total)*100);
		mainTimeline.center_mc.loader_mc.loaderBar_mc._xscale = percent;
		trace('percent '+percent);
	}
	loaderL.onLoadInit = function(target:MovieClip) {
		setBgSize(target);
		new Tween(oldFocus,'_alpha',Regular.easeOut, 100, 0, 0.5, true);
		new Tween(target, "_alpha", Regular.easeOut, 0, 100,0.5,true);
		trace('load completed');
		mainTimeline.center_mc.loader_mc._visible = false;
		currentFocus = target;
		oldFocus = target;
	}
	loaderL.onLoadStart = function(target:MovieClip):Void {
		target._alpha = 0;
	}
	loader.addListener(loaderL);
	loader.loadClip('external.swf', SWFHolder_mc);
}
*/
//END SCRIPT
// Enjoy :)
