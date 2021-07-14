<!DOCTYPE html>
<!-- 
Template Name: Travelite - Tours and Travels Online Booking HTML
Version: 1.0.0
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from kamleshyadav.in/html/travelite/travelite-default/Home_01.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 14 Jul 2020 08:39:28 GMT -->

<head>
  <meta charset="utf-8" />
  <title><?= $title ?></title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta name="description" content="Travelite - Tours and Travels Online Booking HTML" />
  <meta name="keywords" content="Travel, html template, Travelite template">
  <meta name="author" content="Kamleshyadav" />
  <meta name="MobileOptimized" content="320">
  <!--srart theme style -->
  <link href="<?= base_url('assets/') ?>css/main.css" rel="stylesheet" type="text/css" />
  <!-- <link href="<?= base_url('assets/') ?>css/bootstrap.css" rel="stylesheet" type="text/css"/> -->
  <!-- end theme style -->
  <!-- favicon links -->
  <link rel="shortcut icon" type="image/ico" href="<?= base_url('assets/') ?>favicon.ico" />
  <link rel="icon" type="image/ico" href="<?= base_url('assets/') ?>favicon.ico" />
</head>
<?php $travel_home = ''; ?>
<?php if ($this->uri->segment(1) == 'x') {
  $travel_home = 'travel_home';
}
?>

<body class="<?= $travel_home ?>">
  <style type="text/css">
    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 1px solid #e3e6f0;
      border-radius: 0.35rem;
    }

    .card>hr {
      margin-right: 0;
      margin-left: 0;
    }

    .card>.list-group {
      border-top: inherit;
      border-bottom: inherit;
    }

    .card>.list-group:first-child {
      border-top-width: 0;
      border-top-left-radius: calc(0.35rem - 1px);
      border-top-right-radius: calc(0.35rem - 1px);
    }

    .card>.list-group:last-child {
      border-bottom-width: 0;
      border-bottom-right-radius: calc(0.35rem - 1px);
      border-bottom-left-radius: calc(0.35rem - 1px);
    }

    .card>.card-header+.list-group,
    .card>.list-group+.card-footer {
      border-top: 0;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1.25rem;
    }

    .card-title {
      margin-bottom: 0.75rem;
    }

    .card-subtitle {
      margin-top: -0.375rem;
      margin-bottom: 0;
    }

    .card-text:last-child {
      margin-bottom: 0;
    }

    .card-link:hover {
      text-decoration: none;
    }

    .card-link+.card-link {
      margin-left: 1.25rem;
    }

    .card-header {
      padding: 0.75rem 1.25rem;
      margin-bottom: 0;
      background-color: #f8f9fc;
      border-bottom: 1px solid #e3e6f0;
    }

    .card-header:first-child {
      border-radius: calc(0.35rem - 1px) calc(0.35rem - 1px) 0 0;
    }

    .card-footer {
      padding: 0.75rem 1.25rem;
      background-color: #f8f9fc;
      border-top: 1px solid #e3e6f0;
    }

    .card-footer:last-child {
      border-radius: 0 0 calc(0.35rem - 1px) calc(0.35rem - 1px);
    }

    .card-header-tabs {
      margin-right: -0.625rem;
      margin-bottom: -0.75rem;
      margin-left: -0.625rem;
      border-bottom: 0;
    }

    .card-header-pills {
      margin-right: -0.625rem;
      margin-left: -0.625rem;
    }

    .card-img-overlay {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      padding: 1.25rem;
      border-radius: calc(0.35rem - 1px);
    }

    .card-img,
    .card-img-top,
    .card-img-bottom {
      flex-shrink: 0;
      width: 100%;
    }

    .card-img,
    .card-img-top {
      border-top-left-radius: calc(0.35rem - 1px);
      border-top-right-radius: calc(0.35rem - 1px);
    }

    .card-img,
    .card-img-bottom {
      border-bottom-right-radius: calc(0.35rem - 1px);
      border-bottom-left-radius: calc(0.35rem - 1px);
    }

    .card-deck .card {
      margin-bottom: 0.75rem;
    }

    @media (min-width: 576px) {
      .card-deck {
        display: flex;
        flex-flow: row wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
      }

      .card-deck .card {
        flex: 1 0 0%;
        margin-right: 0.75rem;
        margin-bottom: 0;
        margin-left: 0.75rem;
      }
    }

    .card-group>.card {
      margin-bottom: 0.75rem;
    }

    @media (min-width: 576px) {
      .card-group {
        display: flex;
        flex-flow: row wrap;
      }

      .card-group>.card {
        flex: 1 0 0%;
        margin-bottom: 0;
      }

      .card-group>.card+.card {
        margin-left: 0;
        border-left: 0;
      }

      .card-group>.card:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
      }

      .card-group>.card:not(:last-child) .card-img-top,
      .card-group>.card:not(:last-child) .card-header {
        border-top-right-radius: 0;
      }

      .card-group>.card:not(:last-child) .card-img-bottom,
      .card-group>.card:not(:last-child) .card-footer {
        border-bottom-right-radius: 0;
      }

      .card-group>.card:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
      }

      .card-group>.card:not(:first-child) .card-img-top,
      .card-group>.card:not(:first-child) .card-header {
        border-top-left-radius: 0;
      }

      .card-group>.card:not(:first-child) .card-img-bottom,
      .card-group>.card:not(:first-child) .card-footer {
        border-bottom-left-radius: 0;
      }
    }

    .card-columns .card {
      margin-bottom: 0.75rem;
    }

    @media (min-width: 576px) {
      .card-columns {
        -moz-column-count: 3;
        column-count: 3;
        -moz-column-gap: 1.25rem;
        column-gap: 1.25rem;
        orphans: 1;
        widows: 1;
      }

      .card-columns .card {
        display: inline-block;
        width: 100%;
      }
    }

    .accordion {
      overflow-anchor: none;
    }

    .accordion>.card {
      overflow: hidden;
    }

    .accordion>.card:not(:last-of-type) {
      border-bottom: 0;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .accordion>.card:not(:first-of-type) {
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    .accordion>.card>.card-header {
      border-radius: 0;
      margin-bottom: -1px;
    }

    .sidebar.toggled .sidebar-card {
      display: none;
    }

    .sidebar .sidebar-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 0.875rem;
      border-radius: 0.35rem;
      color: rgba(255, 255, 255, 0.8);
      margin-left: 1rem;
      margin-right: 1rem;
      margin-bottom: 1rem;
      padding: 1rem;
      background-color: rgba(0, 0, 0, 0.1);
    }

    .sidebar .sidebar-card .sidebar-card-illustration {
      height: 3rem;
      display: block;
    }

    .sidebar .sidebar-card .sidebar-card-title {
      font-weight: bold;
    }

    .sidebar .sidebar-card p {
      font-size: 0.75rem;
      color: rgba(255, 255, 255, 0.5);
    }

    .card .card-header .dropdown {
      line-height: 1;
    }

    .card .card-header .dropdown .dropdown-menu {
      line-height: 1.5;
    }

    .card .card-header[data-toggle="collapse"] {
      text-decoration: none;
      position: relative;
      padding: 0.75rem 3.25rem 0.75rem 1.25rem;
    }

    .card .card-header[data-toggle="collapse"]::after {
      position: absolute;
      right: 0;
      top: 0;
      padding-right: 1.725rem;
      line-height: 51px;
      font-weight: 900;
      content: '\f107';
      font-family: 'Font Awesome 5 Free';
      color: #d1d3e2;
    }

    .card .card-header[data-toggle="collapse"].collapsed {
      border-radius: 0.35rem;
    }

    .card .card-header[data-toggle="collapse"].collapsed::after {
      content: '\f105';
    }

    .w-75 {
      width: 75% !important;
    }

    .glyphicon-credit-card:before {
      content: "\e177";
    }

    .mb-4,
    .my-4 {
      margin-bottom: 1.5rem !important;
    }

    .card-body {
      flex: 1 1 auto;
      min-height: 1px;
      padding: 1.25rem;
    }

    .card-title {
      margin-bottom: 0.75rem;
    }

    .was-validated .custom-file-input:valid~.custom-file-label,
    .custom-file-input.is-valid~.custom-file-label {
      border-color: #1cc88a;
    }

    .was-validated .custom-file-input:valid:focus~.custom-file-label,
    .custom-file-input.is-valid:focus~.custom-file-label {
      border-color: #1cc88a;
      box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
    }

    .was-validated .custom-file-input:invalid~.custom-file-label,
    .custom-file-input.is-invalid~.custom-file-label {
      border-color: #e74a3b;
    }

    .was-validated .custom-file-input:invalid:focus~.custom-file-label,
    .custom-file-input.is-invalid:focus~.custom-file-label {
      border-color: #e74a3b;
      box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
    }


    .input-group {
      position: relative;
      display: flex;
      flex-wrap: wrap;
      align-items: stretch;
      width: 100%;
    }

    .input-group>.form-control,
    .input-group>.form-control-plaintext,
    .input-group>.custom-select,
    .input-group>.custom-file {
      position: relative;
      flex: 1 1 auto;
      width: 1%;
      min-width: 0;
      margin-bottom: 0;
    }

    .input-group>.form-control+.form-control,
    .input-group>.form-control+.custom-select,
    .input-group>.form-control+.custom-file,
    .input-group>.form-control-plaintext+.form-control,
    .input-group>.form-control-plaintext+.custom-select,
    .input-group>.form-control-plaintext+.custom-file,
    .input-group>.custom-select+.form-control,
    .input-group>.custom-select+.custom-select,
    .input-group>.custom-select+.custom-file,
    .input-group>.custom-file+.form-control,
    .input-group>.custom-file+.custom-select,
    .input-group>.custom-file+.custom-file {
      margin-left: -1px;
    }

    .input-group>.form-control:focus,
    .input-group>.custom-select:focus,
    .input-group>.custom-file .custom-file-input:focus~.custom-file-label {
      z-index: 3;
    }

    .input-group>.custom-file .custom-file-input:focus {
      z-index: 4;
    }

    .input-group>.form-control:not(:last-child),
    .input-group>.custom-select:not(:last-child) {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .input-group>.form-control:not(:first-child),
    .input-group>.custom-select:not(:first-child) {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .input-group>.custom-file {
      display: flex;
      align-items: center;
    }

    .input-group>.custom-file:not(:last-child) .custom-file-label,
    .input-group>.custom-file:not(:last-child) .custom-file-label::after {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .input-group>.custom-file:not(:first-child) .custom-file-label {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .input-group-prepend,
    .input-group-append {
      display: flex;
    }

    .input-group-prepend .btn,
    .input-group-append .btn {
      position: relative;
      z-index: 2;
    }

    .input-group-prepend .btn:focus,
    .input-group-append .btn:focus {
      z-index: 3;
    }

    .input-group-prepend .btn+.btn,
    .input-group-prepend .btn+.input-group-text,
    .input-group-prepend .input-group-text+.input-group-text,
    .input-group-prepend .input-group-text+.btn,
    .input-group-append .btn+.btn,
    .input-group-append .btn+.input-group-text,
    .input-group-append .input-group-text+.input-group-text,
    .input-group-append .input-group-text+.btn {
      margin-left: -1px;
    }

    .input-group-prepend {
      margin-right: -1px;
    }

    .input-group-append {
      margin-left: -1px;
    }

    .input-group-text {
      display: flex;
      align-items: center;
      padding: 0.375rem 0.75rem;
      margin-bottom: 0;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #6e707e;
      text-align: center;
      white-space: nowrap;
      background-color: #eaecf4;
      border: 1px solid #d1d3e2;
      border-radius: 0.35rem;
    }

    .input-group-text input[type="radio"],
    .input-group-text input[type="checkbox"] {
      margin-top: 0;
    }

    .input-group-lg>.form-control:not(textarea),
    .input-group-lg>.custom-select {
      height: calc(1.5em + 1rem + 2px);
    }

    .input-group-lg>.form-control,
    .input-group-lg>.custom-select,
    .input-group-lg>.input-group-prepend>.input-group-text,
    .input-group-lg>.input-group-append>.input-group-text,
    .input-group-lg>.input-group-prepend>.btn,
    .input-group-lg>.input-group-append>.btn {
      padding: 0.5rem 1rem;
      font-size: 1.25rem;
      line-height: 1.5;
      border-radius: 0.3rem;
    }

    .input-group-sm>.form-control:not(textarea),
    .input-group-sm>.custom-select {
      height: calc(1.5em + 0.5rem + 2px);
    }

    .input-group-sm>.form-control,
    .input-group-sm>.custom-select,
    .input-group-sm>.input-group-prepend>.input-group-text,
    .input-group-sm>.input-group-append>.input-group-text,
    .input-group-sm>.input-group-prepend>.btn,
    .input-group-sm>.input-group-append>.btn {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
      line-height: 1.5;
      border-radius: 0.2rem;
    }

    .input-group-lg>.custom-select,
    .input-group-sm>.custom-select {
      padding-right: 1.75rem;
    }

    .input-group>.input-group-prepend>.btn,
    .input-group>.input-group-prepend>.input-group-text,
    .input-group>.input-group-append:not(:last-child)>.btn,
    .input-group>.input-group-append:not(:last-child)>.input-group-text,
    .input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle),
    .input-group>.input-group-append:last-child>.input-group-text:not(:last-child) {
      border-top-right-radius: 0;
      border-bottom-right-radius: 0;
    }

    .input-group>.input-group-append>.btn,
    .input-group>.input-group-append>.input-group-text,
    .input-group>.input-group-prepend:not(:first-child)>.btn,
    .input-group>.input-group-prepend:not(:first-child)>.input-group-text,
    .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
    .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
      border-top-left-radius: 0;
      border-bottom-left-radius: 0;
    }

    .custom-file {
      position: relative;
      display: inline-block;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      margin-bottom: 0;
    }

    .custom-file-input {
      position: relative;
      z-index: 2;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      margin: 0;
      opacity: 0;
    }

    .custom-file-input:focus~.custom-file-label {
      border-color: #bac8f3;
      box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .custom-file-input[disabled]~.custom-file-label,
    .custom-file-input:disabled~.custom-file-label {
      background-color: #eaecf4;
    }

    .custom-file-input:lang(en)~.custom-file-label::after {
      content: "Browse";
    }

    .custom-file-input~.custom-file-label[data-browse]::after {
      content: attr(data-browse);
    }

    .custom-file-label {
      position: absolute;
      top: 0;
      right: 0;
      left: 0;
      z-index: 1;
      height: calc(1.5em + 0.75rem + 2px);
      padding: 0.375rem 0.75rem;
      font-weight: 400;
      line-height: 1.5;
      color: #6e707e;
      background-color: #fff;
      border: 1px solid #d1d3e2;
      border-radius: 0.35rem;
    }

    .custom-file-label::after {
      position: absolute;
      top: 0;
      right: 0;
      bottom: 0;
      z-index: 3;
      display: block;
      height: calc(1.5em + 0.75rem);
      padding: 0.375rem 0.75rem;
      line-height: 1.5;
      color: #6e707e;
      content: "Browse";
      background-color: #eaecf4;
      border-left: inherit;
      border-radius: 0 0.35rem 0.35rem 0;
    }

    .custom-control-label::before,
    .custom-file-label,
    .custom-select {
      transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {

      .custom-control-label::before,
      .custom-file-label,
      .custom-select {
        transition: none;
      }
    }

    .badge {
      display: inline-block;
      padding: 0.25em 0.4em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: 0.35rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
      .badge {
        transition: none;
      }
    }

    a.badge:hover,
    a.badge:focus {
      text-decoration: none;
    }

    .badge:empty {
      display: none;
    }

    .btn .badge {
      position: relative;
      top: -1px;
    }

    .badge-pill {
      padding-right: 0.6em;
      padding-left: 0.6em;
      border-radius: 10rem;
    }

    .badge-primary {
      color: #fff;
      background-color: #4e73df;
    }

    a.badge-primary:hover,
    a.badge-primary:focus {
      color: #fff;
      background-color: #2653d4;
    }

    a.badge-primary:focus,
    a.badge-primary.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.5);
    }

    .badge-secondary {
      color: #fff;
      background-color: #858796;
    }

    a.badge-secondary:hover,
    a.badge-secondary:focus {
      color: #fff;
      background-color: #6b6d7d;
    }

    a.badge-secondary:focus,
    a.badge-secondary.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(133, 135, 150, 0.5);
    }

    .badge-success {
      color: #fff;
      background-color: #1cc88a;
    }

    a.badge-success:hover,
    a.badge-success:focus {
      color: #fff;
      background-color: #169b6b;
    }

    a.badge-success:focus,
    a.badge-success.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.5);
    }

    .badge-info {
      color: #fff;
      background-color: #36b9cc;
    }

    a.badge-info:hover,
    a.badge-info:focus {
      color: #fff;
      background-color: #2a96a5;
    }

    a.badge-info:focus,
    a.badge-info.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(54, 185, 204, 0.5);
    }

    .badge-warning {
      color: #fff;
      background-color: #f6c23e;
    }

    a.badge-warning:hover,
    a.badge-warning:focus {
      color: #fff;
      background-color: #f4b30d;
    }

    a.badge-warning:focus,
    a.badge-warning.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(246, 194, 62, 0.5);
    }

    .badge-danger {
      color: #fff;
      background-color: #e74a3b;
    }

    a.badge-danger:hover,
    a.badge-danger:focus {
      color: #fff;
      background-color: #d52a1a;
    }

    a.badge-danger:focus,
    a.badge-danger.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.5);
    }

    .badge-light {
      color: #3a3b45;
      background-color: #f8f9fc;
    }

    a.badge-light:hover,
    a.badge-light:focus {
      color: #3a3b45;
      background-color: #d4daed;
    }

    a.badge-light:focus,
    a.badge-light.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(248, 249, 252, 0.5);
    }

    .badge-dark {
      color: #fff;
      background-color: #5a5c69;
    }

    a.badge-dark:hover,
    a.badge-dark:focus {
      color: #fff;
      background-color: #42444e;
    }

    a.badge-dark:focus,
    a.badge-dark.focus {
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(90, 92, 105, 0.5);
    }

    .badge {
      border: 1px solid #000;
    }

    .sidebar .nav-item .nav-link .badge-counter,
    .topbar .nav-item .nav-link .badge-counter {
      position: absolute;
      transform: scale(0.7);
      transform-origin: top right;
      right: .25rem;
      margin-top: -.25rem;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-inline .form-group {
      display: flex;
      flex: 0 0 auto;
      flex-flow: row wrap;
      align-items: center;
      margin-bottom: 0;
    }

    .form-control {
      display: block;
      width: 100%;
      height: calc(1.5em + 0.75rem + 2px);
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #6e707e;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #d1d3e2;
      border-radius: 0.35rem;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    @media (prefers-reduced-motion: reduce) {
      .form-control {
        transition: none;
      }
    }

    .form-control::-ms-expand {
      background-color: transparent;
      border: 0;
    }

    .form-control:-moz-focusring {
      color: transparent;
      text-shadow: 0 0 0 #6e707e;
    }

    .form-control:focus {
      color: #6e707e;
      background-color: #fff;
      border-color: #bac8f3;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .form-control::-webkit-input-placeholder {
      color: #858796;
      opacity: 1;
    }

    .form-control::-moz-placeholder {
      color: #858796;
      opacity: 1;
    }

    .form-control:-ms-input-placeholder {
      color: #858796;
      opacity: 1;
    }

    .form-control::-ms-input-placeholder {
      color: #858796;
      opacity: 1;
    }

    .form-control::placeholder {
      color: #858796;
      opacity: 1;
    }

    .form-control:disabled,
    .form-control[readonly] {
      background-color: #eaecf4;
      opacity: 1;
    }

    input[type="date"].form-control,
    input[type="time"].form-control,
    input[type="datetime-local"].form-control,
    input[type="month"].form-control {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    select.form-control:focus::-ms-value {
      color: #6e707e;
      background-color: #fff;
    }

    .form-control-file,
    .form-control-range {
      display: block;
      width: 100%;
    }

    .col-form-label {
      padding-top: calc(0.375rem + 1px);
      padding-bottom: calc(0.375rem + 1px);
      margin-bottom: 0;
      font-size: inherit;
      line-height: 1.5;
    }

    .col-form-label-lg {
      padding-top: calc(0.5rem + 1px);
      padding-bottom: calc(0.5rem + 1px);
      font-size: 1.25rem;
      line-height: 1.5;
    }

    .col-form-label-sm {
      padding-top: calc(0.25rem + 1px);
      padding-bottom: calc(0.25rem + 1px);
      font-size: 0.875rem;
      line-height: 1.5;
    }

    .form-control-plaintext {
      display: block;
      width: 100%;
      padding: 0.375rem 0;
      margin-bottom: 0;
      font-size: 1rem;
      line-height: 1.5;
      color: #858796;
      background-color: transparent;
      border: solid transparent;
      border-width: 1px 0;
    }

    .form-control-plaintext.form-control-sm,
    .form-control-plaintext.form-control-lg {
      padding-right: 0;
      padding-left: 0;
    }

    .form-control-sm {
      height: calc(1.5em + 0.5rem + 2px);
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
      line-height: 1.5;
      border-radius: 0.2rem;
    }

    .form-control-lg {
      height: calc(1.5em + 1rem + 2px);
      padding: 0.5rem 1rem;
      font-size: 1.25rem;
      line-height: 1.5;
      border-radius: 0.3rem;
    }

    select.form-control[size],
    select.form-control[multiple] {
      height: auto;
    }

    textarea.form-control {
      height: auto;
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-text {
      display: block;
      margin-top: 0.25rem;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      margin-right: -5px;
      margin-left: -5px;
    }

    .form-row>.col,
    .form-row>[class*="col-"] {
      padding-right: 5px;
      padding-left: 5px;
    }

    .form-check {
      position: relative;
      display: block;
      padding-left: 1.25rem;
    }

    .form-check-input {
      position: absolute;
      margin-top: 0.3rem;
      margin-left: -1.25rem;
    }

    .form-check-input[disabled]~.form-check-label,
    .form-check-input:disabled~.form-check-label {
      color: #858796;
    }

    .form-check-label {
      margin-bottom: 0;
    }

    .form-check-inline {
      display: inline-flex;
      align-items: center;
      padding-left: 0;
      margin-right: 0.75rem;
    }

    .form-check-inline .form-check-input {
      position: static;
      margin-top: 0;
      margin-right: 0.3125rem;
      margin-left: 0;
    }

    .valid-feedback {
      display: none;
      width: 100%;
      margin-top: 0.25rem;
      font-size: 80%;
      color: #1cc88a;
    }

    .valid-tooltip {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 5;
      display: none;
      max-width: 100%;
      padding: 0.25rem 0.5rem;
      margin-top: .1rem;
      font-size: 0.875rem;
      line-height: 1.5;
      color: #fff;
      background-color: rgba(28, 200, 138, 0.9);
      border-radius: 0.35rem;
    }

    .was-validated :valid~.valid-feedback,
    .was-validated :valid~.valid-tooltip,
    .is-valid~.valid-feedback,
    .is-valid~.valid-tooltip {
      display: block;
    }

    .was-validated .form-control:valid,
    .form-control.is-valid {
      border-color: #1cc88a;
      padding-right: calc(1.5em + 0.75rem);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right calc(0.375em + 0.1875rem) center;
      background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .form-control:valid:focus,
    .form-control.is-valid:focus {
      border-color: #1cc88a;
      box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
    }

    .was-validated textarea.form-control:valid,
    textarea.form-control.is-valid {
      padding-right: calc(1.5em + 0.75rem);
      background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
    }

    .was-validated .custom-select:valid,
    .custom-select.is-valid {
      border-color: #1cc88a;
      padding-right: calc(0.75em + 2.3125rem);
      background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%235a5c69' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8' viewBox='0 0 8 8'%3e%3cpath fill='%231cc88a' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e") #fff no-repeat center right 1.75rem/calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .custom-select:valid:focus,
    .custom-select.is-valid:focus {
      border-color: #1cc88a;
      box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
    }

    .was-validated .form-check-input:valid~.form-check-label,
    .form-check-input.is-valid~.form-check-label {
      color: #1cc88a;
    }

    .was-validated .form-check-input:valid~.valid-feedback,
    .was-validated .form-check-input:valid~.valid-tooltip,
    .form-check-input.is-valid~.valid-feedback,
    .form-check-input.is-valid~.valid-tooltip {
      display: block;
    }

    .was-validated .custom-control-input:valid~.custom-control-label,
    .custom-control-input.is-valid~.custom-control-label {
      color: #1cc88a;
    }

    .was-validated .custom-control-input:valid~.custom-control-label::before,
    .custom-control-input.is-valid~.custom-control-label::before {
      border-color: #1cc88a;
    }

    .was-validated .custom-control-input:valid:checked~.custom-control-label::before,
    .custom-control-input.is-valid:checked~.custom-control-label::before {
      border-color: #34e3a4;
      background-color: #34e3a4;
    }

    .was-validated .custom-control-input:valid:focus~.custom-control-label::before,
    .custom-control-input.is-valid:focus~.custom-control-label::before {
      box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
    }

    .was-validated .custom-control-input:valid:focus:not(:checked)~.custom-control-label::before,
    .custom-control-input.is-valid:focus:not(:checked)~.custom-control-label::before {
      border-color: #1cc88a;
    }

    .was-validated .custom-file-input:valid~.custom-file-label,
    .custom-file-input.is-valid~.custom-file-label {
      border-color: #1cc88a;
    }

    .was-validated .custom-file-input:valid:focus~.custom-file-label,
    .custom-file-input.is-valid:focus~.custom-file-label {
      border-color: #1cc88a;
      box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.25);
    }

    .invalid-feedback {
      display: none;
      width: 100%;
      margin-top: 0.25rem;
      font-size: 80%;
      color: #e74a3b;
    }

    .invalid-tooltip {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 5;
      display: none;
      max-width: 100%;
      padding: 0.25rem 0.5rem;
      margin-top: .1rem;
      font-size: 0.875rem;
      line-height: 1.5;
      color: #fff;
      background-color: rgba(231, 74, 59, 0.9);
      border-radius: 0.35rem;
    }

    .was-validated :invalid~.invalid-feedback,
    .was-validated :invalid~.invalid-tooltip,
    .is-invalid~.invalid-feedback,
    .is-invalid~.invalid-tooltip {
      display: block;
    }

    .was-validated .form-control:invalid,
    .form-control.is-invalid {
      border-color: #e74a3b;
      padding-right: calc(1.5em + 0.75rem);
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e74a3b' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right calc(0.375em + 0.1875rem) center;
      background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .form-control:invalid:focus,
    .form-control.is-invalid:focus {
      border-color: #e74a3b;
      box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
    }

    .was-validated textarea.form-control:invalid,
    textarea.form-control.is-invalid {
      padding-right: calc(1.5em + 0.75rem);
      background-position: top calc(0.375em + 0.1875rem) right calc(0.375em + 0.1875rem);
    }

    .was-validated .custom-select:invalid,
    .custom-select.is-invalid {
      border-color: #e74a3b;
      padding-right: calc(0.75em + 2.3125rem);
      background: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%235a5c69' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px, url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='none' stroke='%23e74a3b' viewBox='0 0 12 12'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23e74a3b' stroke='none'/%3e%3c/svg%3e") #fff no-repeat center right 1.75rem/calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
    }

    .was-validated .custom-select:invalid:focus,
    .custom-select.is-invalid:focus {
      border-color: #e74a3b;
      box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
    }

    .was-validated .form-check-input:invalid~.form-check-label,
    .form-check-input.is-invalid~.form-check-label {
      color: #e74a3b;
    }

    .was-validated .form-check-input:invalid~.invalid-feedback,
    .was-validated .form-check-input:invalid~.invalid-tooltip,
    .form-check-input.is-invalid~.invalid-feedback,
    .form-check-input.is-invalid~.invalid-tooltip {
      display: block;
    }

    .was-validated .custom-control-input:invalid~.custom-control-label,
    .custom-control-input.is-invalid~.custom-control-label {
      color: #e74a3b;
    }

    .was-validated .custom-control-input:invalid~.custom-control-label::before,
    .custom-control-input.is-invalid~.custom-control-label::before {
      border-color: #e74a3b;
    }

    .was-validated .custom-control-input:invalid:checked~.custom-control-label::before,
    .custom-control-input.is-invalid:checked~.custom-control-label::before {
      border-color: #ed7468;
      background-color: #ed7468;
    }

    .was-validated .custom-control-input:invalid:focus~.custom-control-label::before,
    .custom-control-input.is-invalid:focus~.custom-control-label::before {
      box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
    }

    .was-validated .custom-control-input:invalid:focus:not(:checked)~.custom-control-label::before,
    .custom-control-input.is-invalid:focus:not(:checked)~.custom-control-label::before {
      border-color: #e74a3b;
    }

    .was-validated .custom-file-input:invalid~.custom-file-label,
    .custom-file-input.is-invalid~.custom-file-label {
      border-color: #e74a3b;
    }

    .was-validated .custom-file-input:invalid:focus~.custom-file-label,
    .custom-file-input.is-invalid:focus~.custom-file-label {
      border-color: #e74a3b;
      box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.25);
    }

    .form-inline {
      display: flex;
      flex-flow: row wrap;
      align-items: center;
    }

    .form-inline .form-check {
      width: 100%;
    }

    @media (min-width: 576px) {
      .form-inline label {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0;
      }

      .form-inline .form-group {
        display: flex;
        flex: 0 0 auto;
        flex-flow: row wrap;
        align-items: center;
        margin-bottom: 0;
      }

      .form-inline .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
      }

      .form-inline .form-control-plaintext {
        display: inline-block;
      }

      .form-inline .input-group,
      .form-inline .custom-select {
        width: auto;
      }

      .form-inline .form-check {
        display: flex;
        align-items: center;
        justify-content: center;
        width: auto;
        padding-left: 0;
      }

      .form-inline .form-check-input {
        position: relative;
        flex-shrink: 0;
        margin-top: 0;
        margin-right: 0.25rem;
        margin-left: 0;
      }

      .form-inline .custom-control {
        align-items: center;
        justify-content: center;
      }

      .form-inline .custom-control-label {
        margin-bottom: 0;
      }
    }

    form.user .form-control-user {
      font-size: 0.8rem;
      border-radius: 10rem;
      padding: 1.5rem 1rem;
    }

    .float-left {
      float: left !important;
    }

    .float-right {
      float: right !important;
    }

    .float-none {
      float: none !important;
    }

    @media (min-width: 576px) {
      .float-sm-left {
        float: left !important;
      }

      .float-sm-right {
        float: right !important;
      }

      .float-sm-none {
        float: none !important;
      }
    }

    @media (min-width: 768px) {
      .float-md-left {
        float: left !important;
      }

      .float-md-right {
        float: right !important;
      }

      .float-md-none {
        float: none !important;
      }
    }

    @media (min-width: 992px) {
      .float-lg-left {
        float: left !important;
      }

      .float-lg-right {
        float: right !important;
      }

      .float-lg-none {
        float: none !important;
      }
    }

    @media (min-width: 1200px) {
      .float-xl-left {
        float: left !important;
      }

      .float-xl-right {
        float: right !important;
      }

      .float-xl-none {
        float: none !important;
      }
    }
  </style>
  <script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery-1.11.3.js"></script>
  <!--Page loading start-->
  <?php if ($this->uri->segment(1) == 'x') : ?>
    <div class="travel_page_loader">
      <div class="travel_loading_bar_wrapper">
        <div class="travel_loading_bar">
          <span class="from"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="49px" viewBox="0 0 30 49" enable-background="new 0 0 30 49" xml:space="preserve">
              <path fill="#86B940" d="M15.053,4.626c6.334,0,11.488,5.166,11.488,11.514c0,6.35-5.153,11.515-11.488,11.515c-6.335,0-11.489-5.166-11.489-11.515C3.564,9.792,8.718,4.626,15.053,4.626 M15.053,1.26c-8.201,0-14.849,6.661-14.849,14.881c0,8.22,14.849,32.359,14.849,32.359s14.849-24.14,14.849-32.359S23.255,1.26,15.053,1.26z M17.197,21.558v1.444h1.701V6.772h-7.69V7.7h6.876v1.186h-6.876v14.115h1.776v-1.443L17.197,21.558L17.197,21.558z M15.718,10.146h2.292v2.298h-2.292V10.146z M15.7,14.108h2.292v2.299H15.7V14.108z M15.7,18.037h2.292v2.295H15.7V18.037z M12.133,10.146h2.292v2.298h-2.292V10.146z M12.114,14.108h2.292v2.299h-2.292V14.108z M12.114,20.333v-2.295h2.292v2.295H12.114z M17.197,23.188v-0.186h-4.213v0.186H8.695v1.631h12.717v-1.631H17.197z" />
            </svg></span>
          <span class="to">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px" height="49px" viewBox="0 0 30 49" enable-background="new 0 0 30 49" xml:space="preserve">
              <path fill="#86B940" d="M15.001,3.636c6.369,0,11.55,5.193,11.55,11.577c0,6.383-5.181,11.58-11.55,11.58c-6.372,0-11.551-5.197-11.551-11.58C3.45,8.829,8.629,3.636,15.001,3.636 M15.001,0.25C6.753,0.25,0.07,6.952,0.07,15.213c0,8.265,14.931,32.537,14.931,32.537s14.93-24.272,14.93-32.537C29.931,6.952,23.244,0.25,15.001,0.25z M13.871,20.894l1.182-0.003V20.88h-0.005l0.005-0.038V20.62c-0.013-0.187,0-1.001,0-1.001c-0.118-1.364-0.671-3.527-2.869-4.981c-0.042-0.025-1.077-0.676-1.439-2.202c-0.355-1.505,0.07-3.29,1.265-5.305c-1.594,1.002-2.658,2.775-2.658,4.803c0,1.745,0.795,3.307,2.034,4.343c0,0,0.39,0.301,0.506,0.378C14.083,18.362,13.871,20.894,13.871,20.894z M17.594,14.451c0.013-0.002,1.19-0.681,1.269-2.161c0.086-1.549-0.23-3.436-1.508-5.498C16.72,6.497,16.02,6.32,15.283,6.283v12.016C15.612,17.022,15.927,15.552,17.594,14.451z M11.364,12.256c0.082,1.476,1.257,2.156,1.27,2.161c1.666,1.102,1.983,2.571,2.312,3.847V6.248c-0.738,0.036-1.436,0.214-2.071,0.508C11.6,8.819,11.282,10.707,11.364,12.256z M17.354,6.787v0.004l0.031,0.012L17.354,6.787z M18.113,7.107c1.295,2.104,1.836,3.727,1.465,5.288c-0.357,1.523-1.395,2.176-1.438,2.201c-2.14,1.412-2.718,3.504-2.856,4.873v1.423h1.237c0,0-0.03-2.824,1.757-4.35c1.617-1.093,2.369-2.708,2.369-4.606C20.646,9.819,19.823,8.08,18.113,7.107z M15.252,20.911h0.032v-0.02h-0.031L15.252,20.911z M13.695,24.404h3.116v-3.116h-3.116V24.404z" />
            </svg>
          </span>
          <div class="travel_loading_bar_overlay" style="width:0%;">
            <span class="pointer"><img src="<?= base_url('assets/') ?>images/icon/loading_plane.svg" alt="" /></span>
            <span class="pointer_val">0%</span>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <!--Page loading end-->
  <!--Page main section start-->
  <div id="travel_wrapper">