var myHeaders = new Headers();
myHeaders.append("Cookie", "nektia_session=JxF5NZc5iaGmZVESwrqMCHnkjPb8B8n2jXTJ0664");

var requestOptions = {
  method: 'GET',
  headers: myHeaders,
  redirect: 'follow'
};

fetch("https://dev.nikteaworld.com/api/account/info", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
  .catch(error => console.log('error', error));

