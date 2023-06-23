function applyHandlers() {

	// Dodavanje dogadjaja na tabelu

	// podrazumevam da samo prvi (i verovatno jedini) tbody sadrzi potrebne nam informacije

	tableBody = document.getElementById("contentTable").tBodies[0];

	for (var i = 0; i  < tableBody.rows.length; i++) {

		tableBody.rows[i].className = "row";

		tableBody.rows[i].onmouseover = function() {

			this.className = "rowOver";

		}

		tableBody.rows[i].onmouseout = function() {

			this.className = "row";

		}

		/*for (a in tableBody.rows[i]) {

			//alert(a + " " + tableBody.rows[i][a]);

		}*/

	}

}



function toggleMenu(menuID, imgRef) {

	var menu = document.getElementById(menuID);

	if (menu.style.display == 'none') {

		menu.style.display = 'block';

		imgRef.src = 'images/iminus.gif';

	} else {

		menu.style.display = 'none';

		imgRef.src = 'images/iplus.gif';

	}

}