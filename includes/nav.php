<?php
/**
 * Navigation component
 * 
 * Variables:
 * $navSticky - Whether nav should be sticky (default: false)
 */

$navSticky = $navSticky ?? false;
?>

<div class="page-preloader">
    <div class="preloader-spinner"></div>
</div>

<nav class="header<?= $navSticky ? ' sticky' : '' ?>">
    <div class="navbar-container">
        <a href="/" class="navbar-brand">
            <img src="Assets/HildrStudios_Logo_W.png" alt="HildrStudios">
        </a>
        <button class="navbar-toggle" id="navbarToggle" aria-label="Toggle navigation" aria-expanded="false">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
        <ul class="navbar-links" id="navbarLinks">
            <li><a href="/">Home</a></li>
            <li><a href="/#services">Services</a></li>
            <li><a href="/#portfolio">Projects</a></li>
            <li><a href="/pricing">Pricing</a></li>
        </ul>
    </div>
    <div class="navbar-overlay" id="navbarOverlay"></div>
</nav>
