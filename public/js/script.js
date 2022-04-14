import SurveyPage from "./survey.js";

const baseURL = "http://localhost:8080/arkabumisurvey/public/";

const dropBtn = document.querySelectorAll("li.dropbtn");
const article = document.querySelector("#article div.body");
const survey = document.querySelector("#survey div.body");

document.addEventListener("DOMContentLoaded", function () {
	// First View
	setTimeout(splashScreen, 1000);
	ajax(article, "home/getArticle", ["Software"], getDOMArticle);
	getDOMSurvey();
	// ajax(survey, "home/getSurvey");
	// addClickListener to each navbar and run ajax
	dropBtn.forEach((element) => {
		element.addEventListener("click", () => {
			let name = element.dataset.name;
			name = name.split(" ").join("_");
			ajax(article, "home/getArticle", [name], getDOMArticle);
		});
	});
});

function ajax(elm, URL, params = [], callback, pars) {
	// AJAX Object
	let xhr = new XMLHttpRequest();

	// Set newURL
	let newURL = baseURL + URL;
	if (params.length !== 0) {
		params.forEach((param) => {
			newURL += "/" + param;
		});
	}

	// Check
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200) {
			elm.innerHTML = this.responseText;
			if (typeof callback == "function") {
				callback(pars);
			}
		}
	};

	// Excute AJAX
	xhr.open("GET", newURL, true);
	xhr.send();
}

function getDOMArticle() {
	const subJudul = document.querySelectorAll(".subjudul h2");
	subJudul.forEach((element) => {
		element.addEventListener("click", () => {
			let name = element.dataset.name;
			name = name.split(" ").join("_");
			ajax(article, "home/getArticle", [name], getDOMArticle);
		});
	});
}

function getDOMSurvey(pars) {
	// get the div layer 2
	const searchElm = document.querySelector("#survey .body .layer-2").children;

	// set Animation
	const In = (elm) => {
		let posLeft = -100;
		let AnimIn = setInterval(() => {
			try {
				elm.style.left = posLeft + "%";
			} catch (error) {
				clearInterval(AnimIn);
			}

			if (posLeft >= 0) {
				clearInterval(AnimIn);
			}
			posLeft += 2;
		}, 1);
	};
	const Out = (elm, url, params) => {
		let posLeft = 0;
		let AnimIn = setInterval(() => {
			try {
				elm.style.left = posLeft + "%";
			} catch (error) {
				clearInterval(AnimIn);
			}
			if (posLeft >= 100) {
				clearInterval(AnimIn);
				ajax(survey, url, params, getDOMSurvey, In);
			}
			posLeft += 2;
		}, 1);
	};

	// Set element container
	const element = {
		div: [],
		input: [],
		button: [],
	};

	// Push the element depend on the tagName
	for (let i = 0; i < searchElm.length; i++) {
		if (searchElm[i].tagName === "DIV" || searchElm[i].tagName === "FORM") {
			element.div.push(searchElm[i]);
			for (let j = 0; j < searchElm[i].children.length; j++) {
				if (searchElm[i].children[j].tagName === "BUTTON") {
					element.button.push(searchElm[i].children[j]);
				} else if (
					searchElm[i].children[j].tagName === "INPUT" ||
					searchElm[i].children[j].tagName === "TEXTAREA"
				) {
					element.input.push(searchElm[i].children[j]);
				}
			}
		}
	}

	// add click listener for every button
	for (let i = 0; i < element.button.length; i++) {
		let btn = element.button[i];
		btn.addEventListener("click", () => {
			let params = [btn.dataset.nextpage];
			if (btn.hasAttribute("data-value")) {
				params.push(btn.dataset.value);
			}
			if (element.input.length !== 0) {
				element.input.forEach((inp) => {
					if (inp.value === "") {
						alert("Please fill the field!");
					} else {
						params.push(inp.value);
					}
				});
			}

			if (btn.dataset.nextpage == "back") {
				Out(element.div[0], "home/backSurvey", params);
			} else if (params.length >= 2) {
				Out(element.div[0], "home/getSurvey", params);
			}
		});

		// run Animation In
		if (typeof pars == "function") {
			pars(element.div[0]);
		}
	}

	// console.log(element.input[0]);
	// for (let index = 0; index < element.div.length; index++) {
	// 	console.log(element.div[index]);
	// }
	// console.log(element.button[0]);
}

// splash screen
let splashScreenPage = document.querySelector("#splash-screen");

function splashScreen() {
	let punakawan = document.querySelector("#title");
	let pos = 25;
	let posTitle = setInterval(() => {
		punakawan.style.top = pos + "%";
		pos -= 0.1;
		if (pos <= 0) {
			clearInterval(posTitle);
			pos = 0;
		}
	}, 4);
	let opc = 0;
	let titleAnim = setInterval(() => {
		punakawan.style.opacity = opc;
		opc += 0.01;
		if (opc >= 1) {
			clearTimeout(titleAnim);
			punakawan.style.opacity = opc = 1;
			setTimeout(() => {
				let animateOut = setInterval(function () {
					punakawan.style.top = pos + "%";
					splashScreenPage.style.opacity = opc;
					punakawan.style.opacity = opc;
					pos -= 0.3;
					opc -= 0.01;
					if (opc <= 0) {
						splashScreenPage.style.display = "none";
						SurveyPage.run();
						clearInterval(animateOut);
					}
				}, 10);
			}, 2000);
		}
	}, 10);
}
