/*!
* Start Bootstrap - Business Casual v7.0.2 (https://startbootstrap.com/theme/business-casual)
* Copyright 2013-2021 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-business-casual/blob/master/LICENSE)
*/
// Highlights current date on contact page

window.addEventListener('DOMContentLoaded', event => {
    const listHoursArray = document.body.querySelectorAll('.list-hours li');
    listHoursArray[new Date().getDay()].classList.add(('today'));
})
function surveyMake() {
	//surveymake.html의 창의 아이디를 survey로 하고 가로 420, 세로 200인 창을 만든다.
	window.open("surveymake.html", "survey", "width=500,height=400,top=300,left=100");
}
function addAnswer() {
	var listDiv = document.getElementById("survey_answer_list");

	var divEl = document.createElement("div");       // <div></div>
	divEl.setAttribute("class", "survey_answer_item"); // <div class="survey_answer_item"></div>
	var inputEl = document.createElement("input");   // <input/>
	inputEl.setAttribute("type", "text");            // <input type="text"/>
	inputEl.setAttribute("name", "answer");          // <input type="text" name="answer"/>
	var buttonEl = document.createElement("button"); // <button></button>
	buttonEl.setAttribute("type", "button");         // <button type="button"></button>
	buttonEl.setAttribute("class", "button");        // <button type="button" class="button"></button>

	//버튼에 click 이벤트 리스너 등록
	buttonEl.addEventListener('click', function(e){
		var parent = this.parentNode;
	    listDiv.removeChild(parent);
	});
	buttonEl.appendChild(document.createTextNode("삭제"));
	divEl.appendChild(inputEl);
	divEl.appendChild(buttonEl);
	listDiv.appendChild(divEl);
}
