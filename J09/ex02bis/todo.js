var ft_list;
var cookie = [];

$(document).ready(function(event) {
	ft_list = $('#first');
	checkTodo();
	$('#ft_list button').click(function() {
		var todo = prompt('What are you going to do ?');
		if (todo) {
			if (todo == '')
				return;
			addTodo(todo);
		}
	});
	$('#ft_list div').click(deleteTodo);
	var tmp = getCookie("todo");
	for (var i = 0; i < tmp.length; i++) {
		addTodo(tmp[i]);
	}
	});
	
function setCookie() {
	var todo = $('#ft_list div');
	var newCookie = [];
	for (var i = 0; i < todo.length; i++)
		newCookie.unshift(todo[i].innerHTML);
	document.cookie = "todo=" + JSON.stringify(newCookie);
}

function addTodo(todo) {
	ft_list.after($('<div>' + todo + '</div>').click(deleteTodo));
	checkTodo();
	setCookie();
}
	
function deleteTodo() {
	if (confirm("Do you really want to remove this To do ?")) {
		$(this).remove();
		checkTodo();
		setCookie();
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

function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) === ' ')
			c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) === 0)
			return JSON.parse(c.substring(nameEQ.length, c.length));
	}
	return [];
}