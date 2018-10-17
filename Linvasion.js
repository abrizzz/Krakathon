var request = require('request');
var express = require('express');
var app = express();

function checkURL(url) {
    return(url.match(/\.(jpeg|jpg|gif|png)$/) != null);
}

app.get('/*', function(req,res) {
  //modify the url in any way you want
  
  console.log(req.url);
  var match = req.url.match(/\.(jpg|png|gif)/);
  if(match != null)
  {
	  console.log('Image redirect');
	  request('https://www.google.mu/search?q=krakathon+logo&tbm=isch&source=iu&ictx=1&fir=Gb_6J49IrgzD3M%253A%252CQa_VvfrLXjkx4M%252C_&usg=AI4_-kRB_cco8WBG9vwmbr4KLbHY34e0Sw&sa=X&ved=2ahUKEwjQhJqR6Y3eAhVMRBoKHeujBm4Q9QEwAnoECAIQCA#imgrc=zhFcSbCfbDVP8M:').pipe(res);
  }
  else{
	  
	var newurl = 'https://www.lexpress.mu/';
	request(newurl).pipe(res)
  }
});

app.listen(process.env.PORT || 3000);