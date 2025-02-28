import { useEffect, useState } from "react";

function App() {
  const [userData, setUserData] = useState(null);

  useEffect(() => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const codeParam = urlParams.get("code");

    if (codeParam && !localStorage.getItem("userData")) {
      getAccessToken(codeParam);
    } else {
      // Load user data from localStorage if available
      const storedUser = localStorage.getItem("userData");
      if (storedUser) {
        setUserData(JSON.parse(storedUser));
      }
    }
  }, []);

  async function getAccessToken(code) {
    try {
      const response = await fetch("https://codd.cs.gsu.edu/~hnguyen284/CNproject.github.io/user.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ code })
      });

      const data = await response.json();
      if (data.username) {
        localStorage.setItem("userData", JSON.stringify(data));
        setUserData(data);
      } else {
        console.error("Failed to retrieve user data:", data.error);
      }
    } catch (error) {
      console.error("Error fetching access token:", error);
    }
  }

  function loginWithGithub() {
    window.location.assign("https://github.com/login/oauth/authorize?client_id=Ov23liC4cxEBw5Hgys9Q&scope=user");
  }

  function logout() {
    localStorage.removeItem("userData");
    setUserData(null);
    window.location.href = "/";
  }

  return (
    <div className="App">
      <header className="App-header">
        {!userData ? (
          <button onClick={loginWithGithub}>Login with GitHub</button>
        ) : (
          <div>
            <h2>Welcome, {userData.name || userData.username}</h2>
            <img src={userData.avatar_url} alt="User Avatar" width={100} />
            <p><strong>GitHub:</strong> <a href={userData.profile_url} target="_blank" rel="noopener noreferrer">{userData.username}</a></p>
            <button onClick={logout} className="bg-red-500 text-white px-4 py-2 mt-4 rounded">Logout</button>
          </div>
        )}
      </header>
    </div>
  );
}

export default App;
