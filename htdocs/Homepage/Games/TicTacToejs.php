<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" media="screen" href="./Beispiel:SELFHTML-Beispiel-Grundlayout.css" />
		<title>Tic-Tac-Toe</title>
		<style>
.tic-tac-toe table {
	border: 2px solid black;
	border-collapse: collapse;
}

.tic-tac-toe td {
	border: 1px solid black;
	height: 5em;
	position: relative;
	text-align: center;
	width: 5em;
}

.tic-tac-toe table:not(.game-over) td {
	cursor: pointer;
}

.tic-tac-toe td button {
	position: absolute;
	left: -100vw;
}

.tic-tac-toe .o {
	background: #8f8;
	color: #8f8;
}

.tic-tac-toe .x {
	background: #f88;
	color: #f88;
}

.tic-tac-toe .o,
.tic-tac-toe .x {
	z-index: -1;
}

.tic-tac-toe .o::after,
.tic-tac-toe .x::after {
	color: black;
	display: block;
	font-size: 5em;
	position: absolute;
	width: 100%;
}

.tic-tac-toe .o::after {
	content: "○";
	top: -0.2em;
}

.tic-tac-toe .x::after {
	content: "×";
	top: -0.125em;
}

.tic-tac-toe .o.highlighted::after,
.tic-tac-toe .x.highlighted::after {
	text-shadow:
		0 0 1px #fff,
		0 0 2px #fff,
		0 0 3px #fff,
		0 0 4px white,
		0 0 5px white,
		0 0 6px white,
		0 0 7px white;
}

.tic-tac-toe .game-over {
	border-color: red;
}
		</style>
		<script>
document.addEventListener("DOMContentLoaded", function () {

	function TicTacToe (element) {
		var current = 0,
			players = [ "x", "o" ],
			field = document.createElement("table"),
			caption = document.createElement("caption"),
			labels = [
				["oben links", "oben mittig", "oben rechts"],
				["Mitte links", "Mitte mittig", "Mitte rechts"],
				["unten links", "unten mittig", "unten rechts"]
			],
			messages = {
				"o's-turn": "Spieler O ist am Zug.",
				"x's-turn": "Spieler X ist am Zug.",
				"o-wins": "Spieler O gewinnt.",
				"x-wins": "Spieler X gewinnt.",
				"draw": "Das Spiel endet unentschieden.",
				"instructions": "Zum Spielen bitte abwechselnd in die Spielfelder klicken/tappen!",
				"select": "wählen",
				"new game?": "Neues Spiel?"
			},
			finished, games, b, c, i, r, tr;

		function check () {
			var tds = field.getElementsByTagName("td"),
				full = true,
				buttons, i, winner;

			tds = field.getElementsByTagName("td");

			// alle Felder markiert?
			for (i = 0; i < tds.length; i++) {

				if (tds[i].className == "") {
					full = false;
				}
			}

			// Gewinner ermitteln
			for (i = 0; i < 3; i++) {

				// senkrecht
				if (tds[0 + i].className != ""
					&& tds[0 + i].className == tds[3 + i].className
					&& tds[3 + i].className == tds[6 + i].className
				) {
					// we have a winner!
					winner = tds[0 + i].className;

					highlightCells([
						tds[i], tds[3 + i], tds[6 + i]
					]);
				}

				// waagrecht
				if (tds[i*3 + 0].className != ""
					&& tds[i*3 + 0].className == tds[i*3 + 1].className
					&& tds[i*3 + 1].className == tds[i*3 + 2].className
				) {
					// we have a winner!
					winner = tds[i*3].className;

					highlightCells([
						tds[i*3], tds[i*3 + 1], tds[i*3 + 2]
					]);
				}
			}

			// diagonal links oben nach rechts unten
			if (tds[0].className != ""
				&& tds[0].className == tds[4].className
				&& tds[4].className == tds[8].className
			) {
				winner = tds[0].className;

				highlightCells([
					tds[0], tds[4], tds[8]
				]);
			}

			// diagonal rechts oben nach links unten
			if (tds[2].className != ""
				&& tds[2].className == tds[4].className
				&& tds[4].className == tds[6].className
			) {
				winner = tds[2].className;

				highlightCells([
					tds[2], tds[4], tds[6]
				]);
			}

			// game over?
			if (full || winner) {

				finished = true;

				field.className = "game-over";

				if (winner) {

					caption.innerHTML = messages[
						players[current] + "-wins"
					];

				} else {

					caption.innerHTML = messages["draw"];
				}

				// restliche Buttons entfernen
				buttons = field.getElementsByTagName("button");

				while (buttons.length) {
					buttons[0].parentNode.removeChild(buttons[0]);
				}

				// new game?
				buttons = document.createElement("button");
				buttons.innerHTML = messages["new game?"];

				caption.appendChild(document.createTextNode(" "));
				caption.appendChild(buttons);

				buttons.addEventListener("click", function (event) {
					var cells = field.getElementsByTagName("td"),
						button, cell;

					// reset game
					current = 0;
					finished = false;
					field.removeAttribute("class");

					for (r = 0; r < 3; r++) {
						for (c = 0; c < 3; c++) {
							// reset cell
							cell = cells[r * 3 + c];
							cell.removeAttribute("class");
							cell.innerHTML = "";

							// re-insert button
							button = document.createElement("button");
							button.innerHTML = labels[r][c] + " " + messages["select"];

							cell.appendChild(button);
						}
					}

					// Hinweis einrichten
					caption.innerHTML = messages[
						players[current] + "'s-turn"
					];
				});
			}
		}

		function highlightCells (cells) {
			cells.forEach(function (node) {
				var el = document.createElement("strong");

				el.innerHTML = node.innerHTML;

				node.innerHTML = "";
				node.appendChild(el);
				node.classList.add("highlighted");
			});
		}

		// click / tap verarbeiten
		function mark (event) {
			// Tabellenzelle bestimmen
			var td = event.target;

			// Button oder Zelle?
			while (td.tagName.toLowerCase() != "td"
				&& td != field
			) {
				td = td.parentNode;
			}

			// Zelle bei Bedarf markieren
			if (!finished
				&& td.tagName.toLowerCase() == "td"
				&& td.className.length < 1
			) {

				td.className = players[current]; // Klassennamen vergeben
				td.innerHTML = players[current];

				check(); // Spiel zuende?

				if (!finished) {

					current = 1 - current; // zwischen 0 und 1 hin- und herschalten

					// Hinweis aktualisieren
					caption.innerHTML = messages[
						players[current] + "'s-turn"
					];
				}
			}
		}

		// Spielanleitung ins Dokument einfügen
		b = document.createElement("p");
		b.innerHTML = messages["instructions"];
		element.appendChild(b);

		// Tabelle ins Dokument einfügen
		element.appendChild(field);

		// Tabelle aufbauen
		field.appendChild(caption); // Beschriftung
		field.appendChild(document.createElement("tbody"));

		// Hinweis einrichten
		caption.innerHTML = messages[
			players[current] + "'s-turn"
		];

		for (r = 0; r < 3; r++) {
			// neue Tabellenzeile
			tr = document.createElement("tr");

			field.lastChild.appendChild(tr);

			for (c = 0; c < 3; c++) {
				// neue Tabellenzelle
				tr.appendChild(document.createElement("td"));

				// Klickbutton
				b = document.createElement("button");
				b.innerHTML = labels[r][c] + " " + messages["select"];

				tr.lastChild.appendChild(b);
			}
		}

		// Ereignis bei Tabelle überwachen
		field.addEventListener("click", mark);
	}

	// finde alle Spiel-Platzhalter
	games = document.querySelectorAll(".tic-tac-toe");

	for (i = 0; i < games.length; i++) {
		TicTacToe(games[i]); // aktuelles Fundstück steht in games[i]
	}
});
		</script>
	</head>
	<body>
		<h1>Tic-Tac-Toe</h1>
		<div class="tic-tac-toe"></div>
	</body>
</html>
