window.onload = function () {
	loadNotes();
	$("#create-form").submit((e) => {
		createNote(e);
	});
};

function loadNotes() {
	// $.ajax({
	// 	url: "mynotes",
	// 	context: document.body,
	// }).done(function (res) {
	// 	$("#notes").html(res);
	// assignNotes();
	// });
	const request = new XMLHttpRequest();
	request.open("GET", "../notes/mynotes");
	request.send();
	request.onreadystatechange = function () {
		if (this.readyState == 4) {
			const response = this.responseText;
			$("#notes").html(response);
			assignNotes();
		}
	};
}

function createNote(form) {
	form.preventDefault();
	const content = $("#content").val();
	const creationDate = $("#creation-date").val();
	const request = new XMLHttpRequest();
	request.open("POST", "../notes/createnote");
	request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	request.send("content=" + content + "&creationdate=" + creationDate);
	request.onreadystatechange = function () {
		if (this.readyState == 4) {
			const response = this.responseText;
			form.target.reset();
			form.target.content.focus();
			if (Number(response) == 1) {
				$("#message-success").removeClass("d-none");
				$("#message-success").html("Nota creada correctamente");
				setTimeout(() => {
					$("#message-success").addClass("d-none");
					loadNotes();
				}, 2000);
			} else {
				$("#message-error").removeClass("d-none");
				$("#message-error").html("Ha ocurrido un error al registrar");
				setTimeout(() => {
					$("#message-error").addClass("d-none");
					loadNotes();
				}, 2000);
			}
		}
	};
}

function assignNotes() {
	const conteo = $("#countnotes").val();
	for (let i = 0; i <= conteo; i++) {
		$("#btn-editar" + i).click(viewUpdateNote);
		$("#btn-delete" + i).click(deleteNote);
	}
}

function viewUpdateNote() {
	const request = new XMLHttpRequest();
	request.open("GET", "../notes/viewupdatenote/" + this.value);
	request.send();
	request.onreadystatechange = function () {
		if (this.readyState == 4) {
			$("#form-view").html(this.responseText);
			$("#update-form").submit((e) => {
				updateNote(e);
			});
		}
	};
}

function updateNote(form) {
	form.preventDefault();
	const datos = new FormData(form.target);

	fetch("../notes/updatenote", {
		method: "POST",
		body: datos,
		// headers: {
		// 	"Content-type": "application/x-www-form-urlencoded",
		// },
	})
		.then((res) => res.json())
		.then((res) => {
			if (Number(res) === 1) {
				$("#message-success").removeClass("d-none");
				$("#message-success").html("Nota editada correctamente");
				setTimeout(() => {
					$("#message-success").addClass("d-none");
					loadNotes();
					location.href = "home";
				}, 2000);
			} else {
				$("#message-error").removeClass("d-none");
				$("#message-error").html("Ha ocurrido un error al editar");
				setTimeout(() => {
					$("#message-error").addClass("d-none");
					loadNotes();
				}, 2000);
			}
		})
		.catch((err) => console.log(err));
	// const idnote = $("#idnote").val();
	// const content = $("#content").val();
	// const creationdate = $("#creation-date").val();
	// const request = new XMLHttpRequest();
	// request.open("POST", "../notes/updatenote");
	// request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	// request.send(
	// 	"id=" + idnote + "&content=" + content + "&creationdate=" + creationdate
	// );
	// request.onreadystatechange = function () {
	// 	if (request.readyState == 4) {
	// 		if (Number(this.responseText) == 1) {
	// 			$("#message-success").removeClass("d-none");
	// 			$("#message-success").html("Nota editada correctamente");
	// 			setTimeout(() => {
	// 				$("#message-success").addClass("d-none");
	// 				loadNotes();
	// 				location.href = "home";
	// 			}, 2000);
	// 		} else {
	// 			$("#message-error").removeClass("d-none");
	// 			$("#message-error").html("Ha ocurrido un error al editar");
	// 			setTimeout(() => {
	// 				$("#message-error").addClass("d-none");
	// 				loadNotes();
	// 			}, 2000);
	// 		}
	// 	}
	// };
}

function deleteNote() {
	const id = Number(this.value);
	const request = new XMLHttpRequest();
	request.open("GET", "../notes/deletenote/" + id);
	request.send();
	request.onreadystatechange = function () {
		if (request.readyState == 4) {
			if (Number(this.responseText) == 1) {
				$("#message-success").removeClass("d-none");
				$("#message-success").html("Nota eliminada correctamente");
				setTimeout(() => {
					$("#message-success").addClass("d-none");
					$("#item" + id).remove();
				}, 2000);
			} else {
				$("#message-error").removeClass("d-none");
				$("#message-error").html("Ha ocurrido un error al eliminar");
				setTimeout(() => {
					$("#message-error").addClass("d-none");
				}, 2000);
			}
		}
	};
}
