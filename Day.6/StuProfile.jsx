import React, { useEffect, useState } from "react";

export default function App() {
  const [posts, setPosts] = useState([]);

  useEffect(() => {
    fetch("https://jsonplaceholder.typicode.com/posts")
      .then((res) => res.json())
      .then((data) => setPosts(data.slice(0, 12)))
      .catch((err) => console.error(err));
  }, []);

  return (
    <div style={styles.container}>
      <h1 style={styles.heading}>Post Cards</h1>

      <div style={styles.grid}>
        {posts.map((post) => (
          <div key={post.id} style={styles.card}>
            <span style={styles.badge}>#{post.id}</span>

            <h2 style={styles.title}>{post.title}</h2>

            <p style={styles.body}>{post.body}</p>

            <button style={styles.button}>
              Read More
            </button>
          </div>
        ))}
      </div>
    </div>
  );
}

const styles = {
  container: {
    minHeight: "100vh",
    padding: "40px",
    background: "#f4f7fb",
    fontFamily: "Arial, sans-serif",
  },

  heading: {
    textAlign: "center",
    marginBottom: "30px",
    color: "#111827",
  },

  grid: {
    display: "grid",
    gridTemplateColumns: "repeat(auto-fit, minmax(280px, 1fr))",
    gap: "24px",
  },

  card: {
    background: "#ffffff",
    borderRadius: "18px",
    padding: "24px",
    boxShadow: "0 10px 25px rgba(0,0,0,0.08)",
    transition: "0.2s",
  },

  badge: {
    display: "inline-block",
    background: "#6366f1",
    color: "#fff",
    padding: "6px 12px",
    borderRadius: "20px",
    fontSize: "12px",
    fontWeight: "bold",
  },

  title: {
    marginTop: "18px",
    fontSize: "20px",
    textTransform: "capitalize",
    color: "#1f2937",
  },

  body: {
    color: "#6b7280",
    lineHeight: "1.6",
    minHeight: "70px",
  },

  button: {
    marginTop: "15px",
    border: "none",
    background: "#111827",
    color: "#fff",
    padding: "10px 18px",
    borderRadius: "10px",
    cursor: "pointer",
  },
};