import { useEffect, useState } from "react";

function App() {
  const [userData, setUserData] = useState(null);

  useEffect(() => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const codeParam = urlParams.get("code");

    if (codeParam && !localStorage.getItem("accessToken")) {
      getAccessToken(codeParam);
    }
  }, []);

  async function getAccessToken(code) {
    try {
      const response = await fetch("https://codd.cs.gsu.edu/~hnguyen284/CNproject.github.io/user.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ code })
      });

      const data = await response.json();
      if (data.access_token) {
        localStorage.setItem("accessToken", data.access_token);
        getUserData(data.access_token);
      }
    } catch (error) {
      console.error("Error fetching access token:", error);
    }
  }

  async function getUserData(token) {
    try {
      const response = await fetch("https://api.github.com/user", {
        headers: { Authorization: `Bearer ${token}` }
      });
      const userData = await response.json();
      setUserData(userData);
    } catch (error) {
      console.error("Error fetching user data:", error);
    }
  }

  function loginWithGithub() {
    window.location.assign("https://github.com/login/oauth/authorize?client_id=Ov23liC4cxEBw5Hgys9Q&scope=user");
  }

  return (
    <div className="App">
      <header className="App-header">
        {!userData ? (
          <button onClick={loginWithGithub}>Login with GitHub</button>
        ) : (
          <div>
            <h2>Welcome, {userData.name}</h2>
            <img src={userData.avatar_url} alt="User Avatar" width={100} />
          </div>
        )}
      </header>
    </div>
  );
}

export default App;
