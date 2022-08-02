<template>
  <div>
    <b-navbar class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <b-navbar-brand href="/">Catalog</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

        <b-collapse id="nav-collapse" is-nav>
          <b-navbar-nav>
            <b-nav-item href="/material">Материалы</b-nav-item>
            <b-nav-item href="/login">Войти</b-nav-item>
            <b-nav-item href="/secret">Секрет</b-nav-item>
          </b-navbar-nav>
        </b-collapse>
      </div>
    </b-navbar>
  </div>
</template>