var ft_list;
var cookie = [];

$(document).ready(function(event) {
	ft_list = $('#first');
	$('#ft_list button').click(function() {
		var todo = prompt('What are you going to do ?');
		if (todo) {
			if (todo == '')
			return;
			aj('ex03/insert.php?todo=' + todo, "GET", null, loadCSV);
		}
	});
	$('#ft_list div').click(deleteTodo);
	loadCSV();
	checkTodo();
});

function loadCSV() {
	var test = $("#ft_list div");
	test.remove();
	aj("ex03/select.php", "GET", null, function(data) {
		data = jQuery.parseJSON(data);
		jQuery.each(data, function(i, val) {
			ft_list.after($('<div data-id="' + i + '">' + val + '</div>').click(deleteTodo));
			checkTodo();
		});
	});
}


function deleteTodo() {
	if (confirm("Do you really want to remove this To do ?")) {
		aj('ex03/delete.php?id=' + $(this).data('id'), "GET", null, null);
		this.remove();
		checkTodo();
	}
}

if (!navigator.cookieEnabled) {
	alert("Activez vos cookies !");
}

function checkTodo() {
	var cookie = $('#ft_list div');
	var testing = $("#ft_list h2");
	if (cookie.length != 0) {
		testing.remove();
	}
	else {
		if (testing.length == 0) {
			ft_list.after($("<h2 id='nothing'>Nothing to do !</div>"));
		}
	}
}

function aj(url, method, data, success) {
	$.get(url, function (data, status) {
		if (status === "success" && success)
			success(data);
		if (status !== "success")
			alert("Error Ajax");		
	})
}