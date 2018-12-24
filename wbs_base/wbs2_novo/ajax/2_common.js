function loadXMLDoc(url, readyStateFunction, async)
{
	if (window.XMLHttpRequest)
    {
		request = new XMLHttpRequest();
		request.onreadystatechange = readyStateFunction;
		request.open("GET", url, async);
		request.send(null);
	}
    else if (window.ActiveXObject) 
    {
		request = new ActiveXObject("Microsoft.XMLHTTP");
		if (request)
        {
			if(readyStateFunction) request.onreadystatechange = readyStateFunction;
			request.open("GET", url, async);
			request.send();
		}
	}
}
