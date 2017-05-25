<html>
<head>
<title>Hiragana Table</title>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;border-color:#F5AD6F;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:15px 40px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#F5AD6F;color:#669;background-color:#F5AD6F; }
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#F5AD6F;color:#039;background-color:#F5AD6F;}
.tg .tg-7un6{background-color:#ffffff;color:#000000;text-align:center;vertical-align:top}
.tg .tg-83xr{background-color:#ffffff;color:#000000;text-align:center;vertical-align:top}
.tg .tg-7tov{background-color:#ffffff;color:#ce6301;text-align:center;vertical-align:top}
.tg .tg-7tog{background-color:#ffffff;color:#ce6301;text-align:center;vertical-align:top}
.tg .tg-quxf{background-color:#ffffff;text-align:center;vertical-align:top}
.tg .tg-8xib{background-color:#ffffb2;text-align:center;vertical-align:top}
.tg .tg-8xic{background-color:#F5AD6F;text-align:center;vertical-align:top}

.tg .tg-romaji{background-color:#ffffb2;text-align:center;vertical-align:top; padding:6px 20px} /*Yellow background for romaji*/


h1 { color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 60px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center; }

h2 { color: #7c795d; font-family: 'Source Sans Pro', sans-serif;
 font-size: 28px; font-weight: 400; line-height: 32px; margin: 0 0 24px; }

h1.blocktext {
    margin-left: auto;
    margin-right: auto;
    width: 6em
}


.button{
  background: #FF7F7F;
  background-image: -webkit-linear-gradient(top, #FF7F7F, #FF7F7F);
  background-image: -moz-linear-gradient(top, #FF7F7F, #FF7F7F);
  background-image: -ms-linear-gradient(top, #FF7F7F, #FF7F7F);
  background-image: -o-linear-gradient(top, #FF7F7F, #FF7F7F);
  background-image: linear-gradient(to bottom, #FF7F7F, #FF7F7F);
  -webkit-border-radius: 15;
  -moz-border-radius: 15;
  border-radius: 15px;
  font-family: Arial;
  color: #ffffff;
  font-size: 15px;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.button:hover {
  background: #F5AD6F;
  background-image: -webkit-linear-gradient(top, #F5AD6F, #F5AD6F);
  background-image: -moz-linear-gradient(top, #F5AD6F, #F5AD6F);
  background-image: -ms-linear-gradient(top, #F5AD6F, #F5AD6F);
  background-image: -o-linear-gradient(top, #F5AD6F, #F5AD6F);
  background-image: linear-gradient(to bottom, #F5AD6F, #F5AD6F);
  text-decoration: none;
}
.q{
position: absolute;
    left: 100px;
    
}
.quizBox{
   background-color: #f6f1ed;
border-style: outset;
 border-color: #F5AD6F;
  padding-top: 50px;
    padding-right: 30px;
    padding-bottom: 50px;
    padding-left: 80px;
}
.quizBox



</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script>

realAnswer = []; //array of size 10. each slot holds answer to question, not user attempt.


var st = []; //holds src of each picture
var countOfQ = 97;
var rangeKeeper=-1;
var countOfClicks = 0;
var correctAnswers = []; //array of length 10, each slot holding an associated letter.
var association = {};
var po = ["a","i","u","e" ,"o" ,"ka" ,"ki" ,"ku" ,"ke" ,"ko" ,"sa" ,"shi" ,"su" ,"se" ,"so" ,"ta" ,"chi" ,"tsu" ,"te" ,"to" ,"na" ,"ni" ,"nu" ,"ne" ,"no" ,"ha" ,"hi" ,"fu", "he", "ho", "ma" ,"mi" ,"mu", "me", "mo", "ya" ,"yu" ,"yo", "ra", "ri", "ru" ,"re" ,"ro", "wa", "o", "n" ];
function addToWorkset(str, associatedLetter) {

rangeKeeper=rangeKeeper+4;

    var how = str ;
	var f = how.children;
	var sa = f[0].src; 
	
//document.getElementById("h").innerHTML = sa; //contains string of url of character clicked

var id = String.fromCharCode(countOfQ);

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			st[countOfClicks] = this.responseText;
			if(countOfQ==104){
				document.getElementById("exc").src = ""+st[countOfClicks];
				countOfQ++;
			}
			else{
				document.getElementById(id).src = ""+st[countOfClicks];
				countOfQ++;
			}
		}
	};
	xmlhttp.open("GET", "lonephp.php?q=" + sa, true);
	xmlhttp.send();
	var assoc = ""+associatedLetter;
	association[assoc] = ""+st[countOfClicks]; //may need to chnage from single quotes to other
	
	var possible = Math.floor((Math.random() * 4)); 
	correctAnswers[countOfClicks] = associatedLetter; // holds slot of right answer for each question
    if(countOfQ==104){
		
		var cho = document.getElementById("exc").parentElement; //div
		var optionElement = cho.children[rangeKeeper].children[possible];
		
		optionElement.innerHTML = associatedLetter;
		//document.getElementById("test").innerHTML = cho.children[rangeKeeper];
		//document.getElementById("testst").innerHTML = rangeKeeper;
		
	
	}
	else{
		
		var cho = document.getElementById(id).parentElement; //div
		var optionElement = cho.children[rangeKeeper].children[possible];
		optionElement.innerHTML = associatedLetter;
		
		//document.getElementById("test").innerHTML = cho.children[rangeKeeper];
		//document.getElementById("testst").innerHTML = rangeKeeper;
		 

	}
	
	//fillRest(id, possible);
	
	var first = Math.floor((Math.random() * po.length)); 
	var second = Math.floor((Math.random() * po.length)); 
	var third = Math.floor((Math.random() * po.length)); 
	while(first==second){
		first = Math.floor((Math.random() * po.length));
	}
	while (first == third){
		first = Math.floor((Math.random() * po.length));	
	}
	while(second == third ){
		second =	Math.floor((Math.random() * po.length));
	}
	
	
	var freeSlots = [];
	for(var k = 0; k<4; k++){
		if(k!=possible){
			freeSlots.push(k);
		}
	}
	/*var first = freeSlots.pop();
	var second = freeSlots.pop();
	var third = freeSlots.pop();
	*/
	
	var optionElement = cho.children[rangeKeeper].children[freeSlots[0]];
	optionElement.text = po[first];
	var optionElement = cho.children[rangeKeeper].children[freeSlots[1]];
	optionElement.text = po[second];
	var optionElement = cho.children[rangeKeeper].children[freeSlots[2]];
	optionElement.text = po[third];
	
	
	
	if(countOfQ>106){
		countOfQ=97;
	}
	
	realAnswer[countOfClicks] = ""+associatedLetter;
	
	
	
	countOfClicks++;
	
	
}
var anotherRangeKeeper = -1;
var record = [];
var usersSubmittedAnswers = [];
var newCu = 1;
var sumCorrect = 0;
function validate(num)
	{




		/*document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*0)+"%";
		var letsIden = "select"+num;
	 var ddl = document.getElementById(letsIden);
	 var selectedValue = ddl.options[ddl.selectedIndex].text;
	 
	 if(num==1)
	 {
		if (selectedValue == realAnswer[0])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*1)+"%";
	   validate(2);
	 }
	 else if(num==2){
		
		 if (selectedValue == realAnswer[1])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*2)+"%";
	   validate(3);
	 }
	 else if(num==3){
		
		 if (selectedValue == realAnswer[2])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*3)+"%";
	   validate(4);
	 }
	 else if(num==4){
		 
		 if (selectedValue == realAnswer[3])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*4)+"%";
	   validate(5);
	 }

		else if(num==5){
		
		 if (selectedValue == realAnswer[4])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*5)+"%";
	   validate(6);
	 }
	 else if(num==6){
		 
		 if (selectedValue == realAnswer[5])
	   {
			sumCorrect++;
		
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*6)+"%";
	   validate(7);
	 }
	 else if(num==7){
		
		 if (selectedValue == realAnswer[6])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*7)+"%";
	   validate(8);
	 }
	  else if(num==8){
		 
		 if (selectedValue == realAnswer[7])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade "+(sumCorrect*8)+"%";
	   validate(9);
	 }
	  else if(num==9){
		 
		 if (selectedValue == realAnswer[8])
	   {
			sumCorrect++;
			
	   }
	   document.getElementById("finalgrade").innerHTML = "Final Grade: "+(sumCorrect*9)+"%";
	   validate(10);
	   
	   
	 }
	  else if(num==10){
		 
		 if (selectedValue == realAnswer[9])
	   {
			sumCorrect++;
			
	   }
	   
	   document.getElementById("finalgrade").innerHTML = "Final Grade: "+(sumCorrect*10)+"%";
	  
	 }

	 */
	 
	 
	   
	}


	$(document).ready(function(){
	   $(".submitButtonToJQuery").click(function() {
	    	
	   })
});

realAnswer[0] //letter

if(document.getElementById("traversingEachSelect[0]").value == realAnswer[0]){
    	//do something
    	sumCorrect++;
    }


/*var sumCorrect= 0;
var countThis=0;
  $(document).ready(function(){
	   $("#submitButtonToJQuery").click(function() {
	    	$('.parent :select').each(function(){     
			      if(parseFloat($(this).val())==realAnswer[countThis]){
			      	sumCorrect++;
			      }
			      countThis++;
			})
			("#finalgrade").html("Final Grade: "+(sumCorrect*10)+"%";); 
	   })
});  */
	
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("helloResponse").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "sendResults.php?q=", true);
  xhttp.send();
}
 </script>

</head>
<body>
<h2 id = "txtHint"></h2>
<audio id ="1" src="sounds/a.ogg"></audio>
<audio id ="2" src="sounds/i.ogg"></audio>
<audio id ="3" src="sounds/u.ogg"></audio>
<audio id ="4" src="sounds/e.ogg"></audio>
<audio id ="5" src="sounds/o.ogg"></audio>
<audio id ="6" src="sounds/ka.ogg"></audio>
<audio id ="7" src="sounds/ki.ogg"></audio>
<audio id ="8" src="sounds/ku.ogg"></audio>
<audio id ="9" src="sounds/ke.ogg"></audio>
<audio id ="10" src="sounds/ko.ogg"></audio>
<audio id ="11" src="sounds/sa.ogg"></audio>
<audio id ="12" src="sounds/shi.ogg"></audio>
<audio id ="13" src="sounds/su.ogg"></audio>
<audio id ="14" src="sounds/se.ogg"></audio>
<audio id ="15" src="sounds/so.ogg"></audio>
<audio id ="16" src="sounds/ta.ogg"></audio>
<audio id ="17" src="sounds/chi.ogg"></audio>
<audio id ="18" src="sounds/tsu.ogg"></audio>
<audio id ="19" src="sounds/te.ogg"></audio>
<audio id ="20" src="sounds/to.ogg"></audio>
<audio id ="21" src="sounds/na.ogg"></audio>
<audio id ="22" src="sounds/ni.ogg"></audio>
<audio id ="23" src="sounds/nu.ogg"></audio>
<audio id ="24" src="sounds/ne.ogg"></audio>
<audio id ="25" src="sounds/no.ogg"></audio>
<audio id ="26" src="sounds/ha.ogg"></audio>
<audio id ="27" src="sounds/hi.ogg"></audio>
<audio id ="28" src="sounds/fu.ogg"></audio>
<audio id ="29" src="sounds/he.ogg"></audio>
<audio id ="30" src="sounds/ho.ogg"></audio>
<audio id ="31" src="sounds/ma.ogg"></audio>
<audio id ="32" src="sounds/mi.ogg"></audio>
<audio id ="33" src="sounds/mu.ogg"></audio>
<audio id ="34" src="sounds/me.ogg"></audio>
<audio id ="35" src="sounds/mo.ogg"></audio>
<audio id ="36" src="sounds/ya.ogg"></audio>
<audio id ="37" src="sounds/yu.ogg"></audio>
<audio id ="38" src="sounds/yo.ogg"></audio>
<audio id ="39" src="sounds/ra.ogg"></audio>
<audio id ="40" src="sounds/ri.ogg"></audio>
<audio id ="41" src="sounds/ru.ogg"></audio>
<audio id ="42" src="sounds/re.ogg"></audio>
<audio id ="43" src="sounds/ro.ogg"></audio>
<audio id ="44" src="sounds/wa.ogg"></audio>
<audio id ="45" src="sounds/o.ogg"></audio>
<audio id ="46" src="sounds/n.ogg"></audio>




<div></div>

<table id = "hiraganaTable" class="tg">
  <tr>
    <th style="font-size:36px;" class="tg-8xic" colspan="20">Gojuon</th>
   
  </tr>
  <tr>
    <th class="tg-8xib" ></th>
    <th class="tg-8xib" >a column</th>
<th class="tg-8xib" >e column</th>
<th class="tg-8xib">i column</th>
<th class="tg-8xib" >o column</th>
<th class="tg-8xib" >u column</th>
   
  </tr>
  <tr >
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">a row</td>
    <td id = "reff" class="tg-quxf"><img onmouseover="bigImg(this, 1)" onmouseout="normalImg(this, 1)" src="static pictures/1.png" onclick = "document.getElementById('1').play()"  alt="Letter" style="width:90px;height:70px;"><div><button onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'a')" class = "button">Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 2)" onmouseout="normalImg(this, 2)" src="static pictures/2.png"  onclick = "document.getElementById('2').play()" alt="Letter" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'i')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 3)" onmouseout="normalImg(this, 3)" src="static pictures/3.png"  onclick = "document.getElementById('3').play()" alt="Letter" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'u')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 4)" onmouseout="normalImg(this, 4)" src="static pictures/4.png"  onclick = "document.getElementById('4').play()" alt="Letter" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'e')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 5)" onmouseout="normalImg(this, 5)" src="static pictures/5.png"  onclick = "document.getElementById('5').play()" alt="Letter" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'o')" >Add to Training Set</button><div><p></p></div></div></td>
   
  </tr>
 <tr >
    
    <td name = "a" class="tg-romaji">a</td>
    <td name = "i" class="tg-romaji">i</td>
    <td name = "u" class="tg-romaji">u</td> 
    <td name = "e" class="tg-romaji">e</td>
    <td name = "o" class="tg-romaji">o</td>
 
  </tr>
  <tr>
    <td rowspan = "2" style = "color:black;" class="tg-7tog">ka row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 6)" onmouseout="normalImg(this, 6)" src="static pictures/6.png" alt="Letter" onclick = "document.getElementById('6').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ka')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 7)" onmouseout="normalImg(this, 7)" src="static pictures/7.png" alt="Letter"  onclick = "document.getElementById('7').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ki')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 8)" onmouseout="normalImg(this, 8)" src="static pictures/8.png" alt="Letter"  onclick = "document.getElementById('8').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ku')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 9)" onmouseout="normalImg(this, 9)" src="static pictures/9.png" alt="Letter"  onclick = "document.getElementById('9').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ke')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 10)" onmouseout="normalImg(this, 10)" src="static pictures/10.png" alt="Letter"  onclick = "document.getElementById('10').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ko')" >Add to Training Set</button><div><p></p></div></div></td>

  </tr>
<tr >
    
    <td class="tg-romaji">ka</td>
    <td class="tg-romaji">ki</td>
    <td class="tg-romaji">ku</td>
    <td class="tg-romaji">ke</td>
    <td class="tg-romaji">ko</td>
   
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">sa row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 11)" onmouseout="normalImg(this, 11)" src="static pictures/11.png" alt="Letter"  onclick = "document.getElementById('11').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'sa')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 12)" onmouseout="normalImg(this, 12)" src="static pictures/12.png" alt="Letter"  onclick = "document.getElementById('12').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'shi')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 13)" onmouseout="normalImg(this, 13)" src="static pictures/13.png" alt="Letter"  onclick = "document.getElementById('13').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'su')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 14)" onmouseout="normalImg(this, 14)" src="static pictures/14.png" alt="Letter"  onclick = "document.getElementById('14').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'se')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 15)" onmouseout="normalImg(this, 15)" src="static pictures/15.png" alt="Letter"  onclick = "document.getElementById('15').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'so')" >Add to Training Set</button><div><p></p></div></div></td>


  </tr>
<tr >
    <td class="tg-romaji">sa</td>
    <td class="tg-romaji">shi</td>
    <td class="tg-romaji">su</td>
    <td class="tg-romaji">se</td>
    <td class="tg-romaji">so</td>

    
  </tr>
  <tr>
    <td  rowspan = "2"  style = "color:black;" class="tg-7tog">ta row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 16)" onmouseout="normalImg(this, 16)" src="static pictures/16.png" alt="Letter"  onclick = "document.getElementById('16').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ta')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 17)" onmouseout="normalImg(this, 17)" src="static pictures/17.png" alt="Letter"  onclick = "document.getElementById('17').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'chi')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 18)" onmouseout="normalImg(this, 18)" src="static pictures/18.png" alt="Letter"  onclick = "document.getElementById('18').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'tsu')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 19)" onmouseout="normalImg(this, 19)" src="static pictures/19.png" alt="Letter"  onclick = "document.getElementById('19').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'te')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 20)" onmouseout="normalImg(this, 20)" src="static pictures/20.png" alt="Letter"  onclick = "document.getElementById('20').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'to')" >Add to Training Set</button><div><p></p></div></div></td>
   
  </tr>
<tr >
    <td class="tg-romaji">ta</td>
    <td class="tg-romaji">chi</td>
    <td class="tg-romaji">tsu</td>
    <td class="tg-romaji">te</td>
    <td class="tg-romaji">to</td>

    
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">na row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 21)" onmouseout="normalImg(this, 21)" src="static pictures/21.png" alt="Letter"  onclick = "document.getElementById('21').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'na')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 22)" onmouseout="normalImg(this, 22)" src="static pictures/22.png" alt="Letter"  onclick = "document.getElementById('22').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ni')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 23)" onmouseout="normalImg(this, 23)" src="static pictures/23.png" alt="Letter"  onclick = "document.getElementById('23').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'nu')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 24)" onmouseout="normalImg(this, 24)" src="static pictures/24.png" alt="Letter"  onclick = "document.getElementById('24').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ne')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 25)" onmouseout="normalImg(this, 25)" src="static pictures/25.png" alt="Letter"  onclick = "document.getElementById('25').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'no')" >Add to Training Set</button><div><p></p></div></div></td>
    
  </tr>
<tr >
    <td class="tg-romaji">na</td>
    <td class="tg-romaji">ni</td>
    <td class="tg-romaji">nu</td>
    <td class="tg-romaji">ne</td>
    <td class="tg-romaji">no</td>
   
    
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">ha row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 26)" onmouseout="normalImg(this, 26)" src="static pictures/26.png" alt="Letter"  onclick = "document.getElementById('26').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ha')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 27)" onmouseout="normalImg(this, 27)" src="static pictures/27.png" alt="Letter"  onclick = "document.getElementById('27').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'hi')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 28)" onmouseout="normalImg(this, 28)" src="static pictures/28.png" alt="Letter"  onclick = "document.getElementById('28').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'fu')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 29)" onmouseout="normalImg(this, 29)" src="static pictures/29.png" alt="Letter"  onclick = "document.getElementById('29').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'he')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 30)" onmouseout="normalImg(this, 30)" src="static pictures/30.png" alt="Letter"  onclick = "document.getElementById('30').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ho')" >Add to Training Set</button><div><p></p></div></div></td>
    
  </tr>
<tr >
    <td class="tg-romaji">ha</td>
    <td class="tg-romaji">hi</td>
    <td class="tg-romaji">fu</td>
    <td class="tg-romaji">he</td>
    <td class="tg-romaji">ho</td>

    
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">ma row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 31)" onmouseout="normalImg(this, 31)" src="static pictures/31.png" alt="Letter"  onclick = "document.getElementById('31').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ma')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 32)" onmouseout="normalImg(this, 32)" src="static pictures/32.png" alt="Letter"  onclick = "document.getElementById('32').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'mi')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 33)" onmouseout="normalImg(this, 33)" src="static pictures/33.png" alt="Letter"  onclick = "document.getElementById('33').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'mu')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 34)" onmouseout="normalImg(this, 34)" src="static pictures/34.png" alt="Letter"  onclick = "document.getElementById('34').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'me')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 35)" onmouseout="normalImg(this, 35)" src="static pictures/35.png" alt="Letter"  onclick = "document.getElementById('35').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'mo')" >Add to Training Set</button><div><p></p></div></div></td>
   
  </tr>
<tr >
    <td class="tg-romaji">ma</td>
    <td class="tg-romaji">mi</td>
    <td class="tg-romaji">mu</td>
    <td class="tg-romaji">me</td>
    <td class="tg-romaji">mo</td>
  
    
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">ya row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 36)" onmouseout="normalImg(this, 36)" src="static pictures/36.png" alt="Letter"  onclick = "document.getElementById('36').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ya')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf" style = background-color:#FFFFFF></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 37)" onmouseout="normalImg(this, 37)" src="static pictures/37.png" alt="Letter"  onclick = "document.getElementById('37').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'yu')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf" style = background-color:#FFFFFF></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 38)" onmouseout="normalImg(this, 38)" src="static pictures/38.png" alt="Letter"  onclick = "document.getElementById('38').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'yo')" >Add to Training Set</button><div><p></p></div></div></td>
  
  </tr>
<tr >
    <td class="tg-romaji">ya</td>
    <td class="tg-romaji" style = background-color:#FFFFFF></td>
    <td class="tg-romaji">yu</td>
    <td class="tg-romaji" style = background-color:#FFFFFF></td>
    <td class="tg-romaji">yo</td>
    
   
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">ra row</td>
   <td class="tg-quxf"><img onmouseover="bigImg(this, 39)" onmouseout="normalImg(this, 39)" src="static pictures/39.png" alt="Letter"  onclick = "document.getElementById('39').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ra')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 40)" onmouseout="normalImg(this, 40)" src="static pictures/40.png" alt="Letter"  onclick = "document.getElementById('40').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ri')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 41)" onmouseout="normalImg(this, 41)" src="static pictures/41.png" alt="Letter"  onclick = "document.getElementById('41').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ru')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 42)" onmouseout="normalImg(this, 42)" src="static pictures/42.png" alt="Letter"  onclick = "document.getElementById('42').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 're')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 43)" onmouseout="normalImg(this, 43)" src="static pictures/43.png" alt="Letter"  onclick = "document.getElementById('43').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'ro')" >Add to Training Set</button><div><p></p></div></div></td>
    
  </tr>
<tr >
    <td class="tg-romaji">ra</td>
    <td class="tg-romaji">ri</td>
    <td class="tg-romaji">ru</td>
    <td class="tg-romaji">re</td>
    <td class="tg-romaji">ro</td>
   
   
  </tr>
  <tr>
    <td rowspan = "2"  style = "color:black;" class="tg-7tog">wa row</td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 44)" onmouseout="normalImg(this, 44)" src="static pictures/44.png" alt="Letter"  onclick = "document.getElementById('44').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'wa')" >Add to Training Set</button><div><p></p></div></div></td>
    <td class="tg-quxf" style = background-color:#FFFFFF></td>
    <td class="tg-quxf" style = background-color:#FFFFFF></td>
    <td class="tg-quxf" style = background-color:#FFFFFF></td>
    <td class="tg-quxf"><img onmouseover="bigImg(this, 45)" onmouseout="normalImg(this, 45)" src="static pictures/45.png" alt="Letter"  onclick = "document.getElementById('45').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'o')" >Add to Training Set</button><div><p></p></div></div></td>
   
  </tr>
<tr >
    <td class="tg-romaji">wa</td>
    <td class="tg-romaji" style = background-color:#FFFFFF></td>
    <td class="tg-romaji" style = background-color:#FFFFFF></td>
    <td class="tg-romaji" style = background-color:#FFFFFF></td>
    <td class="tg-romaji">o</td>

    
  </tr>
  <tr>
    <td rowspan = "1" colspan = "7" class="tg-quxf"><img onmouseover="bigImg(this, 46)" onmouseout="normalImg(this, 46)" src="static pictures/46.png" alt="Letter"  onclick = "document.getElementById('46').play()" style="width:90px;height:70px;"><div><button class = "button" onclick = "tick(this.parentElement), addToWorkset(this.parentElement.parentElement, 'n')" >Add to Training Set</button><div><p></p></div></div></td>
    
   
  </tr>
<tr >
    
    <td  colspan = "7" class="tg-romaji">n</td>
    
  </tr>
</table>


<div  id = "quizboxtest" class = "quizBox">
<h1 class = "blocktext">QUIZ</h1>
<!--<form action="/submitTest.php">-->
<h2 class = "blocktext">Match to the associated character</h2>

<!--<select id="cardtype" name="cards">
    <option value="selectcard">--- Please select ---</option>
    <option value="mastercard">Mastercard</option>
    <option value="maestro">Maestro</option>
    <option value="solo">Solo (UK only)</option>
    <option value="visaelectron">Visa Electron</option>
    <option value="visadebit">Visa Debit</option>
</select><br/>
-->

		<img id = "a" src='' alt='Letter' style='width:90px;height:70px;'><!-- doesn't have children because it is a single tag -->
		  <select id = "select1" name='possibleAnswers'>
			<option class = "valuesToBeSubmitted" value="firstValue"></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "b" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select id = "select2"  name='possibleAnswers'>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "c" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select id = "select3"   name='possibleAnswers'>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "d" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select4"  name='possibleAnswers'>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "e" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select5"  name='possibleAnswers'>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
		  </select>
		  <br></br>
		<img id = "f" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select6"  name='possibleAnswers'>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "g" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select7"  name='possibleAnswers'>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "exc" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select8"  name='possibleAnswers'>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
			<option class = "valuesToBeSubmitted"  value=""></option>
		  </select>
		  <br></br>
		<img id = "i" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select9"  name='possibleAnswers'>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		<img id = "j" src='' alt='Letter' style='width:90px;height:70px;'>
		  <select  id = "select10"  name='possibleAnswers'>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
			<option  class = "valuesToBeSubmitted" value=""></option>
		  </select>
		  <br></br>
		  <button id = "submitButtonToJQuery" onclick = "validate(1)" class = "button">Submit Answers</button>
		  <h1 class = "blocktext" id = "finalgrade">Final Grade: </h1>
		  <form action="sendResults.php" method="get">
			<button onclick = "authenticate()" style = "padding:30px"class = "button" name = "save">Save Progress</button>
			<div id = "signin">
			<!--<form action="signIn.php" method="get"><button  style = "padding:10px; background: #190729" class = "button" name = "signIn">Sign In</button></form>-->
			
			Username: <input id = "usernameInput" type="text" name="username">
			Password: <input id = "passwordInput" type="password" name="password">
			<input  onclick="loadDoc()" type="submit"></input>
			<h2 id = "helloResponse"></h2>
			<div>
		  </form>
<!--</form>-->
<!--<img id = "test" onmouseover="bigImg(this, 2)" onmouseout="normalImg(this, 2)" src=""  onclick = "document.getElementById('2').play()" alt="Letter" style="width:90px;height:70px;">-->
<!--<h1 id = "testst">TEST.</h1>-->
<!--<h1 id = "testagain">TEST.</h1>-->
</div>
<script>

var data = [];


function bigImg(x, f) {
   x.src = "gifs/"+f+".gif"
}

function normalImg(x, f) {

    x.src = "static pictures/"+f+".png"
}
function sound(x, f){
	x.src = "sounds/a.ogg"
	x.play()
}
function divPlay() {


  
} 
function tick(x)
{
var t = "Added &#10004";
var so = x.children;
so[1].innerHTML =t;
so[1].className = "added";

	
	
}

function getAdds(x){ // x holds td of button which was clicked
	
	var how = x ;
	var f = how.children;
	var sa = f[0].src;
	
//document.getElementById("h").innerHTML = sa;

var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET", "workingTable.php?q=" + sa, true);
xmlhttp.send();




}
function authenticate(){
	var bool = "okay";
	var usernameInput = document.getElementById("usernameInput").text;
	var passwordInput = document.getElementById("passwordInput").text;
	if(!(usernameInput.length>0)){
		bool = "notOkay";
	}
	if(!(passwordInput.length>0)){
		bool = "notOkay";
	}
	
	if(bool == "notOkay"){
		alert("Please verify that Username and Password fields are not empty");
	}
}

/*function setPossibleAnswers(qid){
var cho = document.getElementById(qid);


document.getElementById("test").innerHTML = document.getElementById("a").children[0].innerHTML;
var possible = Math.floor((Math.random() * 4) + 1); 
 var str = document.getElementById(qid).src;
 
 "/Assignment4/static pictures/1.png"
 
    var res = str.substring(29, str.length);
	var pl = "";
if(res.length==6){
	pl = res.substring(0,2);
}	
else if(res.length==5){
	pl = res.substring(0,1);
}

aq.innerHTML = ""+pl;

document.getElementById(qid)


}*/

JSON.stringify(data);
</script>
 
</body>


</html>
