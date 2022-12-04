import './App.css';
import React, { Component } from 'react';
import "bootstrap/dist/css/bootstrap.min.css";
import { Link, Routes, Route } from 'react-router-dom';

function App() {
  return (
    <div>
      <nav className="navbar navbar-expand navbar-dark bg-dark">
        <a href="/attendance" className="navbar-brand">
          Challenge 1
        </a>
        <div className="navbar-nav mr-auto">
          <li className="nav-item">
            <Link to={"/attendance"} className="nav-link">
              Attendance
            </Link>
          </li>
        </div>
      </nav>

      <div className="container mt-3">
        <Routes>
        </Routes>
      </div>
    </div>
  );
}

export default App;
