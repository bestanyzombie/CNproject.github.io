//console.log(navigator.cookieEnables);
//document.cookie = //Access Token From GitHub API;

//console.log(document.cookie);

function loginCookie(name, value, daysToLive){
  const date = new Date();
  date.setTime(date.getTime() + daysToLive * 24 * 60 * 60 * 1000);
  let expires = "expires=" + date.toUTCString();
  document.cookie = '${name}=${value}; ${expires}; path=/'
}

function signoutCookie(name){
  loginCookie(name, null, null);
}

loginCookie('token', 'ExAmPlE_tOkEn', 14);

console.log(document.cookie);

signoutCookie('token');

console.log(document.cookie)
