//console.log(navigator.cookieEnables);
//document.cookie = //Access Token From GitHub API;

//console.log(document.cookie);


// <- LOGIN COOKIE -> //
function loginCookie(name, value, daysToLive){
  const date = new Date();
  date.setTime(date.getTime() + daysToLive * 24 * 60 * 60 * 1000);
  let expires = "expires=" + date.toUTCString();
  document.cookie = '${name}=${value}; ${expires}; path=/'
}

function signoutCookie(name){
  loginCookie(name, null, null);
}



// <- LOGIN BUTTON + GET USER TOKEN -> //
function App() {

  useEffect(() => {
    // https://codd.cs.gsu.edu/~hnguyen284/CNproject.github.io/user.php?code=<-USER TOKEN HERE->
    const queryString = window.location.search;
    const urlParams = new URLSearchPArams(queryString);
    const codeParam = urlParams.get("code");
    console.log(codeParam); // Check user code in console

    if(codeParam && (localStorage.getItem("accessToken") === null)) {
      function getAccessToken() {
        // TODO
      }
      getAccessToken();
    }
  }, []);

  function loginWithGithub() {
  window.location.assign("https://github.com/login/oauth/authorize?client_id=Ov23liC4cxEBw5Hgys9Q");
  }

  return (
    <div className="App">
      <header className="App-header">
        <button onClick={loginWithGithub}>
          Login with Github // Button
        </button>
      </header>
    </div>
  );
}


// <- GRAB USER DATA -> //
// TODO


// Testing Cookies
loginCookie('token', 'ExAmPlE_tOkEn', 14);

console.log(document.cookie);

signoutCookie('token');

console.log(document.cookie)
