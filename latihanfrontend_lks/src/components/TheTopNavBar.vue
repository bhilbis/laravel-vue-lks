<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Latihan Vue</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <router-link to="/utama" class="nav-link active">Utama</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/kontak" class="nav-link active">Kontak</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/crud" class="nav-link active">Form</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/auth/login" class="nav-link active">Login</router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </template>