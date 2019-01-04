var add;
var nothing = document.createElement('h2');
nothing.setAttribute('id', 'nothing');
var text = document.createTextNode("Nothing to do !");
nothing.appendChild(text);
add = document.getElementById("ft_list");
add.addEventListener("button", checkCookie);

window.onload = function() {
	checkCookie();
	document.querySelector('#ft_list button').addEventListener('click', function addCookie() {
		event.preventDefault();
		var todo = prompt('What are you going to do ?');
		if (todo) {
			if (todo.length === 0)
				return ;
			addTodo(todo);
		}
	}
	);
	var cookies = getCookie('todo');
	for (var i = 0; i < cookies.length; i++) {
		addTodo(cookies[i]);
	}
};

if (navigator.cookieEnabled) {
} else {
	alert("Activez vos cookies !");
}

function addTodo(value) {
	var list = document.querySelector('#ft_list');
	var todo = document.createElement('div');
	todo.innerHTML = value;
	todo.addEventListener('click', removeCookie);
	list.insertBefore(todo, list.childNodes[4]);
	checkCookie();
	setCookie();
}

function setCookie() {
	var todo = document.querySelectorAll('#ft_list div');
	var newCookie = [];
	for (var i = 0; i < todo.length; i++)
		newCookie.unshift(todo[i].innerHTML);
	document.cookie = "todo=" + JSON.stringify(newCookie);
}


function removeCookie() {
	if (confirm("Do you really want to remove this To do ?")) {
		this.remove();
		checkCookie();
		setCookie();
	}
}


function checkCookie() {
	var cookie = document.querySelector("#ft_list div");
	var testing = document.querySelector("#ft_list h2");
	if (cookie) {
		if (testing) {
			testing.remove();
		}
	}
	else {
		if (!testing) {
			add.insertBefore(nothing, add.childNodes[4]);
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