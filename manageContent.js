// JavaScript Document
ns4 = (document.layers)? true:false
ie4 = (document.all)? true:false

if (ns4) {var images = document.images.document; var maps = document.maps.document;}
else {var images = document.getElementById('images'); var maps = document.getElementById('maps');}


var myList = new Array();
//------------------- SCREENINGS ---------------	
//"Shoes for Europe"
myList[0] = new Array();
myList[0][0] = 'screening1';
myList[0][1] = new Array();
myList[0][1][0] = 'shoes-for-europe';
myList[0][1][1] = '03.jpg';

//"Do you know anything about Polish art?"
myList[1] = new Array();
myList[1][0] = 'screening2';
myList[1][1] = new Array();
myList[1][1][0] = 'Picture-2';
myList[1][1][1] = 'Picture-2.jpg';
myList[1][2] = new Array();
myList[1][2][0] = 'Picture-3';
myList[1][2][1] = 'Picture-3.jpg';
myList[1][3] = new Array();
myList[1][3][0] = 'Picture-6';
myList[1][3][1] = 'Picture-6.jpg';
myList[1][4] = new Array();
myList[1][4][0] = 'Picture-7';
myList[1][4][1] = 'Picture-7.jpg';
myList[1][5] = new Array();
myList[1][5][0] = 'Picture-8';
myList[1][5][1] = 'Picture-8.jpg';
myList[1][6] = new Array();
myList[1][6][0] = 'Picture-9';
myList[1][6][1] = 'Picture-9.jpg';

//"Wood Car"
myList[2] = new Array();
myList[2][0] = 'screening3';

//"Sofia"
myList[3] = new Array();
myList[3][0] = 'screening4';
myList[3][1] = new Array();
myList[3][1][0] = 'Sofia1';
myList[3][1][1] = '01_Sofia.jpg';
myList[3][2] = new Array();
myList[3][2][0] = 'Sofia2';
myList[3][2][1] = '02_Sofia.jpg';
myList[3][3] = new Array();
myList[3][3][0] = 'Sofia5';
myList[3][3][1] = '05_Sofia.jpg';
myList[3][4] = new Array();
myList[3][4][0] = 'Sofia3';
myList[3][4][1] = '03_Sofia.jpg';
myList[3][5] = new Array();
myList[3][5][0] = 'Sofia4';
myList[3][5][1] = '04_Sofia.jpg';

//NOMADI
myList[4] = new Array();
myList[4][0] = 'screening5';
myList[4][1] = new Array();
myList[4][1][0] = 'Four-Images_Hatice-Guleryuz';
myList[4][1][1] = 'Four-Images_Hatice-Guleryuz.jpeg';
myList[4][2] = new Array();
myList[4][2][0] = 'No-or-Bad-Signal_Ali-Demire';
myList[4][2][1] = 'No-or-Bad Signal_Ali-Demirel.jpeg';
myList[4][3] = new Array();
myList[4][3][0] = 'Blattant_Erhan-Muratoglu';
myList[4][3][1] = 'Blattant_Erhan-Muratoglu.jpeg';
myList[4][4] = new Array();
myList[4][4][0] = 'Fox_Dance_Babzula';
myList[4][4][1] = 'Fox_Dance_Babzula.jpeg';
myList[4][5] = new Array();
myList[4][5][0] = 'Vertigo_Tuna';
myList[4][5][1] = 'Vertigo_Tuna.jpeg';

//Kenedi comes back home
myList[5] = new Array();
myList[5][0] = 'screening6';
myList[5][1] = new Array();
myList[5][1][0] = 'Kenedi1';
myList[5][1][1] = '01_Kenedi.jpeg';
myList[5][2] = new Array();
myList[5][2][0] = 'Kenedi2';
myList[5][2][1] = '02_Kenedi.jpeg';

//Serbia in Trash Can
myList[6] = new Array();
myList[6][0] = 'screening7';
myList[6][1] = new Array();
myList[6][1][0] = 'srbija-u-kontejneru1';
myList[6][1][1] = '01Srbija-u-kontejneru.jpg';
myList[6][2] = new Array();
myList[6][2][0] = 'srbija-u-kontejneru2';
myList[6][2][1] = '02Srbija-u-kontejneru.jpg';
myList[6][3] = new Array();
myList[6][3][0] = 'srbija-u-kontejneru3';
myList[6][3][1] = '03Srbija-u-kontejneru.jpg';
//------------------- PROJECTS ---------------

//FM@dia FORUM 04
myList[7] = new Array();
myList[7][0] = 'project1';

//The Lost Expedition
myList[8] = new Array();
myList[8][0] = 'project2';
myList[8][1] = new Array();
myList[8][1][0] = 'busavu';
myList[8][1][1] = 'busavu.jpg';
myList[8][2] = new Array();
myList[8][2][0] = 'pq';
myList[8][2][1] = 'pq.jpg';

//B04--BORDER 04
myList[9] = new Array();
myList[9][0] = 'project3';
myList[9][1] = new Array();
myList[9][1][0] = 'border04_1';
myList[9][1][1] = 'border04_1.jpg';
myList[9][2] = new Array();
myList[9][2][0] = 'border04_2';
myList[9][2][1] = 'border04_2.jpg';

//maf_media art farm (GE)
myList[10] = new Array();
myList[10][0] = 'project4';

//Money Nations/Atelier Europa
myList[11] = new Array();
myList[11][0] = 'project5';

//Schengen Information Center
myList[12] = new Array();
myList[12][0] = 'project6';
myList[12][1] = new Array();
myList[12][1][0] = 'Shengen-Info-System';
myList[12][1][1] = 'SIS_Joler.jpg';

//GastARTbeiter
myList[13] = new Array();
myList[13][0] = 'project7';
myList[13][1] = new Array();
myList[13][1][0] = '01_Gast_ART';
myList[13][1][1] = '01_Gast_ART.jpg';
myList[13][2] = new Array();
myList[13][2][0] = '02_Gast_ART';
myList[13][2][1] = '02_Gast_ART.jpg';
myList[13][3] = new Array();
myList[13][3][0] = '03_Gast_ART';
myList[13][3][1] = '03_Gast_ART.jpg';
myList[13][4] = new Array();
myList[13][4][0] = '04_Gast_ART';
myList[13][4][1] = '04_Gast_ART.jpg';

//exStream, InterSpace
myList[14] = new Array();
myList[14][0] = 'project8';
myList[14][1] = new Array();
myList[14][1][0] = 'exStream';
myList[14][1][1] = 'exStream.jpg';
myList[14][2] = new Array();
myList[14][2][0] = 'InterSpace';
myList[14][2][1] = 'InterSpace.jpg';

//WORKSHOR--STREAMING
myList[15] = new Array();
myList[15][0] = 'project11';
myList[15][1] = new Array();
myList[15][1][0] = '01_streaming';
myList[15][1][1] = '01_streaming.jpg';
myList[15][2] = new Array();
myList[15][2][0] = '02_streaming';
myList[15][2][1] = '02_streaming.jpg';
myList[15][3] = new Array();
myList[15][3][0] = '03_streaming';
myList[15][3][1] = '03_streaming.jpg';
myList[15][4] = new Array();
myList[15][4][0] = '04_streaming';
myList[15][4][1] = '04_streaming.jpg';

//------------------- PERFORMANCE ---------------
//New Citizenship for Serbians!-State of Sabotage
myList[16] = new Array();
myList[16][0] = 'performance1';
myList[16][1] = new Array();
myList[16][1][0] = 'Sabotage_canal';
myList[16][1][1] = 'Sabotage_canal.jpg';
myList[16][2] = new Array();
myList[16][2][0] = 'SoS_PASSPORT';
myList[16][2][1] = 'SoS_PASSPORT.jpg';
myList[16][3] = new Array();
myList[16][3][0] = 'SoS_PASSPORT_innen';
myList[16][3][1] = 'SoS_PASSPORT_innen.jpg';
myList[16][4] = new Array();
myList[16][4][0] = 'SoS_eisberg';
myList[16][4][1] = 'SoS_eisberg.jpg';

//[Sensor Diet]- inf.act
myList[17] = new Array();
myList[17][0] = 'performance2';

//Transistan- Anabala
myList[18] = new Array();
myList[18][0] = 'performance3';
myList[18][1] = new Array();
myList[18][1][0] = 'Anabala';
myList[18][1][1] = 'Anabala.jpeg';

//Kingdom of Forest
myList[19] = new Array();
myList[19][0] = 'performance4';

//Belgrade Yard Sound System
myList[20] = new Array();
myList[20][0] = 'performance5';
myList[20][1] = new Array();
myList[20][1][0] = 'belgradeyard3';
myList[20][1][1] = '01_belgradeyard.jpg';
myList[20][2] = new Array();
myList[20][2][0] = 'belgradeyard2';
myList[20][2][1] = '02_belgradeyard.jpg';
myList[20][3] = new Array();
myList[20][3][0] = 'belgradeyard1';
myList[20][3][1] = '03_belgradeyard.jpg';

//Monoton
myList[21] = new Array();
myList[21][0] = 'performance6';
myList[21][1] = new Array();
myList[21][1][0] = 'Monoton';
myList[21][1][1] = 'Monoton.jpeg';

//---------------------- TEXTS -----------------------
//Brian Holmes
myList[22] = new Array();
myList[22][0] = 'text1';

//Luchezar Boyadjiev
myList[23] = new Array();
myList[23][0] = 'text2';

//Milos Vojtehovsky
myList[24] = new Array();
myList[24][0] = 'text3';

//Basak Senova
myList[25] = new Array();
myList[25][0] = 'text4';

//Edit Andras
myList[26] = new Array();
myList[26][0] = 'text5';
myList[26][1] = new Array();
myList[26][1][0] = 'Edit-Andras_standard01w';
myList[26][1][1] = 'standard01.jpg';
myList[26][2] = new Array();
myList[26][2][0] = 'Edit-Andras_standard02w';
myList[26][2][1] = 'standard02.jpg';
myList[26][3] = new Array();
myList[26][3][0] = 'Edit-Andras_standard03w';
myList[26][3][1] = 'standard03.jpg';
myList[26][4] = new Array();
myList[26][4][0] = 'kisspal_grey1';
myList[26][4][1] = 'kisspal_grey1.jpg';
myList[26][5] = new Array();
myList[26][5][0] = 'kisspal_grey2';
myList[26][5][1] = 'kisspal_grey2.jpg';
myList[26][6] = new Array();
myList[26][6][0] = 'kisspal_grey3';
myList[26][6][1] = 'kisspal_grey3.jpg';
myList[26][7] = new Array();
myList[26][7][0] = 'kisspal_grey4';
myList[26][7][1] = 'kisspal_grey4.jpg';
myList[26][8] = new Array();
myList[26][8][0] = 'kisspal_grey5';
myList[26][8][1] = 'kisspal_grey5.jpg';


//Guy van Belle
myList[27] = new Array();
myList[27][0] = 'text6';

//Nina Czegledy
myList[28] = new Array();
myList[28][0] = 'text7';

//Vajs Katherine
myList[29] = new Array();
myList[29][0] = 'text8';

//-----------dodaci------------

//=====Projects-===========

//BORDERLINE CASES
myList[30] = new Array();
myList[30][0] = 'project9';
//past.forward
myList[31] = new Array();
myList[31][0] = 'project10';

//=====Texts-===========
//Stephen Kovats
myList[32] = new Array();
myList[32][0] = 'text12';
myList[32][1] = new Array();
myList[32][1][0] = 'Stephen_Kovats';
myList[32][1][1] = 'Stephen_Kovats.jpg';
myList[32][1][2] = 'Site of the Pan-European Picnic: the fleeting appearance of a unicorn<br><br>J. Szöke-Kiss, 2003, Hungary-Austria border at Fertörakos';
myList[32][1][3] =  'Mesto odrzavanja Pan-Evropskog Piknika<br><br>J. Szöke-Kiss, 2003, Maðarsko-austrijska granica kod Fertorakosa';

//reader
myList[33] = new Array();
myList[33][0] = 'reader';
myList[33][1] = new Array();
myList[33][1][0] = 'reader2';
myList[33][1][1] = 'reader2.jpg';

/*
myList[][] = new Array();
myList[][][0] = '';
myList[][][1] = '';
*/
//---------------- END OF myList ----------------------

function switchText(theNewDiv, theType){
//alert(document.getElementById("CONTAINER").document.getElementsByTagName("DIV").length);
var noDiv = document.getElementsByTagName("DIV").length;
 // alert(noDiv);
//window.scrollTo(0, 250);

for(myIndex=0;myIndex<noDiv;myIndex++){
 // alert(document.getElementsByTagName("DIV")[myIndex].id);
  if (document.getElementsByTagName("DIV")[myIndex].id.substring(0, theType.length) == theType) 
  	{if (ns4) {hide = "hide";}
	 else hide = "hidden";
	 document.getElementsByTagName("DIV")[myIndex].style.visibility = hide;
	}
 }
 if (ns4) {show = "show";}
 else {show = "visible";}

 document.getElementById(theNewDiv).style.visibility = show;
 document.getElementById(theType+'s').style.visibility = show;
 fillImage(theNewDiv);
 window.scrollTo(0,0);
}

function display(theDesc, theVisible){
if (theVisible)
	{if (ns4) {show = "show";}
 	 else {show = "visible";}
	 document.getElementById(theDesc).style.visibility = show;
 	}
else
	{if (ns4) {hide = "hide";}
 	 else {hide = "hidden";}
	 document.getElementById(theDesc).style.visibility = hide;
	}

}
// skriva sve tekstove
function switchMenu(theNewDiv){
//alert(document.getElementById("CONTAINER").document.getElementsByTagName("DIV").length);
var noDiv = document.getElementsByTagName("DIV").length;

var Items = new Array("reader","reviews","support","locations","themes","participant","program","project","main","performance","screening","contact","travel","credits","text", "map");
 // alert(noDiv);
//alert(document.getElementById(theNewDiv).style.height);
//window.outherHeight=document.getElementById(theNewDiv).style.height;
//window.screenY = 500;

for(myIndex=0;myIndex<noDiv;myIndex++){
 // alert(document.getElementsByTagName("DIV")[myIndex].id);
 for (myIndex1=0;myIndex1<Items.length;myIndex1++){
   if (document.getElementsByTagName("DIV")[myIndex].id.substring(0, Items[myIndex1].length) == Items[myIndex1]) 
   	 {if (ns4) {hide = "hide";}
	  else hide = "hidden";
	  document.getElementsByTagName("DIV")[myIndex].style.visibility = hide;
	 }
 }	 
}
 if (ns4) {show = "show";}
 else {show = "visible";}

 document.getElementById(theNewDiv).style.visibility = show;
 fillImage(theNewDiv);
 if (ns4) {hide = "hide";}
	  else hide = "hidden";
	  document.getElementById('home').style.visibility = hide;
 window.scrollTo(0,0);

}

function IndexOf(myArray, myName){
var i = 0;

while ((myArray[i][0] != myName)&&(i<myArray.length-1)) {
i++;
}
if ((i==myArray.length-1)&&(myArray[i][0]!=myName)) return -1
else return i;

}

function fillImage(myLyr){
var txt = new String();

if (IndexOf(myList,myLyr)!= -1){
	if (myList[IndexOf(myList,myLyr)].length != 1){
		if (ns4) {document.fruska.visibility = 'visible'; document.fruska1.visibility = 'hidden'}
		else {document.getElementById('fruska').style.visibility = 'visible'; document.getElementById('fruska1').style.visibility = 'hidden';}
		for(i=1;i<myList[IndexOf(myList,myLyr)].length ; i++){
			txt+= "<img class='img_link' src='images/"+myList[IndexOf(myList,myLyr)][i][0]+".gif' border='0' onClick=\" window.open('Imgsrc/"+myList[IndexOf(myList,myLyr)][i][1]+"');\"><br><br>";
			if (IndexOf(myList,myLyr) == 32) {
				myString = window.location.href;
   				myResult = myString.search('e_event.htm');
   				if (myResult == -1) {txt += "<label lang='sr' class='text'>"+myList[IndexOf(myList,myLyr)][i][3]+"</label>";}
				else {txt += "<label class='text'>"+myList[IndexOf(myList,myLyr)][i][2]+"</label>";};
			}
		}
	} else {txt = "<br>";
			if (ns4) {document.fruska.visibility = 'hidden'; document.fruska1.visibility = 'visible'}
			else {document.getElementById('fruska').style.visibility = 'hidden'; document.getElementById('fruska1').style.visibility = 'visible';}
			}
} else {txt = "<br>";
		if (ns4) {document.fruska.visibility = 'hidden'; document.fruska1.visibility = 'visible'}
		else {document.getElementById('fruska').style.visibility = 'hidden'; document.getElementById('fruska1').style.visibility = 'visible';}
		}
//alert("images: "+images);
writeToLayer(txt, images);
}

/*function writeToLayer(txt){
if (ns4){
	var lyr = document.images.document
	lyr.open();
	lyr.write(txt);
	lyr.close();
	}
else {document.getElementById('images').innerHTML = txt}
}*/

function ShowImage(name,map){
//alert(name+"  "+map);
var txt = "<div align=\"left\"><img src='images/"+name+".gif' border='0' usemap='#"+map+"'></div>";
//alert(maps);
writeToLayer(txt, maps);
}

function writeToLayer(txt, lyr){
//alert("lyr.id: "+lyr.id);
if (ns4){
	//var lyr = document.maps.document
	lyr.open();
	lyr.write(txt);
	lyr.close();
	}
else {//document.getElementById('images').innerHTML = txt
	lyr.innerHTML = txt;
}
}
//-------------------------------- DODATO -------------------------------------
// Width of the popups in pixels
// 100-300 pixels is typical
	if (typeof width == 'undefined') { var width = "220";}
	
// How thick the border should be in pixels
// 1-3 pixels is typical
	if (typeof border == 'undefined') { var border = "2";}
	
	
// How many pixels to the right/left of the cursor to show the popup
// Values between 3 and 12 are best
	if (typeof offsetx == 'undefined') { var offsetx = 10;}
	
// How many pixels to the below the cursor to show the popup
// Values between 3 and 12 are best
	if (typeof offsety == 'undefined') { var offsety = 10;}

// Make an object visible
function showObject(obj) {
	if (ns4) obj.visibility = "show"
	else obj.visibility = "visible"
}

// Hides an object
function hideObject(obj) {
	if (ns4) obj.visibility = "hide"
	else if (ie4) obj.visibility = "hidden"
}	

// Common calls
function disp() {
	if ( (ns4) || (ie4) ) {
		if (snow == 0)  {
			if (dir == 2) { // Center
				moveTo(over,x-(width/2)-document.getElementById("DIV2").offsetLeft,y-document.getElementById("DIV2").offsetTop+offsety);
			}
			if (dir == 1) { // Right
				moveTo(over,x-document.getElementById("DIV2").offsetLeft,y-document.getElementById("DIV2").offsetTop+offsety);
			}
			if (dir == 0) { // Left
				moveTo(over,x-document.getElementById("DIV2").offsetLeft-width,y-document.getElementById("DIV2").offsetTop+offsety);
			}
			showObject(over);
			snow = 1;
		}
	}
// Here you can make the text goto the statusbar.

}

// Moves the layer
function mouseMove(e) {
	if (ns4) {x=e.pageX; y=e.pageY;}
	if (ie4) {x=event.x; y=event.y;}
	if (ie5) {x=event.x; y=event.y;}
	if (snow) {
		if (dir == 2) { // Center
			moveTo(over,x-(width/2)-document.all["DIV2"].offsetLeft,y-document.all["DIV2"].offsetTop+offsety);
		}
		if (dir == 1) { // Right
			moveTo(over,x-document.all["DIV2"].offsetLeft,y-document.all["DIV2"].offsetTop+offsety);
		}
		if (dir == 0) { // Left
			moveTo(over,x-width-document.all["DIV2"].offsetLeft,y-document.all["DIV2"].offsetTop+offsety);
		}
	}
}	