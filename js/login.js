
function login()
{
	var x = new XMLHttpRequest();
	x.open("POST",'http://localhost:8080/Estadias/api/getlogin.php',true);
	x.send(new FormData(document.getElementById('frmlogin')));
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{
			var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.Status == 0) 
			{

				sessionStorage['user'] = x.responseText;
				window.location = sessionStorage['previouspage'];

			}
			else
			{
				alert(JSONdata.errorMessage);
			}
		}
		console.log(x);
	}
}