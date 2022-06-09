/*=========================================================================================
  File Name: form-validation.js
  Description: jquery bootstrap validation js
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';
    var jqForm = $('#unitform');

    // jQuery Validation
    // --------------------------------------------------------------------
    if (jqForm.length) {
      jqForm.validate({
        rules: {
          'title': {
            required: true
          },
          'scale': {
            required: true,
          },
          'description': {
            required: true
          },
          'confirm-password': {
            required: true,
            equalTo: '#basic-default-password'
          },
          'select-country': {
            required: true
          },
          dob: {
            required: true
          },
          customFile: {
            required: true
          },
          validationRadiojq: {
            required: true
          },
          validationBiojq: {
            required: true
          },
          validationCheck: {
            required: true
          }
        }
      });
    }
  });
