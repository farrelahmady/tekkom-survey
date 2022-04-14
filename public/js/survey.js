const SurveyPage = {
	flag: false,
	item: {
		arrowLeft: document.querySelectorAll("#slideBtn i"),
		page: document.querySelector("#survey .body"),
		black: document.querySelector("#black-bg"),
		slideBtn: document.querySelector("#survey #slideBtn button"),
	},
	open: function (width, opacity) {
		// slideBtn.style.color = "red";
		this.item.black.style.display = "block";
		let pageWidth = width;
		let blackOpc = Number(opacity);
		const anim = setInterval(() => {
			this.item.page.style.width = pageWidth + "vw";
			this.item.black.style.opacity = blackOpc;
			if (pageWidth >= 50) {
				clearInterval(anim);
				this.item.page.style.width = "50vw";
				this.flag = true;
			}
			if (this.item.black.style.opacity >= 0.5) {
				this.item.black.style.opacity = 0.5;
			}
			pageWidth++;
			blackOpc += 0.01;
		}, 10);
	},
	close: function (width, opacity) {
		// slideBtn.style.color = "green";
		let pageWidth = width;
		let blackOpc = Number(opacity);
		const anim = setInterval(() => {
			this.item.page.style.width = pageWidth + "vw";
			this.item.black.style.opacity = blackOpc;
			if (pageWidth <= 0) {
				clearInterval(anim);
				this.item.page.style.width = "0vw";
				this.item.black.style.display = "none";
				this.flag = false;
			}
			if (this.item.black.style.opacity <= 0) {
				this.item.black.style.opacity = 0;
			}
			pageWidth--;
			blackOpc -= 0.01;
		}, 10);
	},
	toggle: function () {
		let width = (this.item.page.offsetWidth * 100) / window.innerWidth;
		let opacity = window
			.getComputedStyle(this.item.black)
			.getPropertyValue("opacity");

		this.item.arrowLeft.forEach((icon) => {
			icon.classList.toggle("show");
		});
		if (this.flag) {
			this.close(width, opacity);
		} else {
			this.open(width, opacity);
		}
		console.log();
	},
	run: function () {
		this.toggle();
		this.item.black.onclick = () => {
			this.toggle();
		};
		this.item.slideBtn.onclick = () => {
			this.toggle();
		};
	},
};

export default SurveyPage;
