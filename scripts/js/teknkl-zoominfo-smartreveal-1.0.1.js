/*
 * @author Sanford Whiteman
 * @version v1.0.1 2020-07-21
 * @copyright © 2020 Sanford Whiteman
 * @license Hippocratic 2.1: This license must appear with all reproductions of this software.
 *
 * Marketo Forms 2.0 JS behaviors for smooth integration of ZoomInfo full/partial/no data
 *
 * Eric McConnaughay: Added in form id check, recaptcha, and email domain verification
 */
MktoForms2.whenReady(function smartZIReveal(mktoForm) {
  if(mktoForm.getId() == 1362 || mktoForm.getId() == 1429) {
    //Begin recaptcha and email domain verify
    // var userConfig = {
    //   apiKeys: {
    //     recaptcha: "6LeHHwEVAAAAAJLJHz0BUhMOxPDB15sGs-hWw7L2"
    //   },
    //   fields: {
    //     recaptchaFinger: "lastReCAPTCHAUserFingerprint"
    //   },
    //   actions: {
    //     formSubmit: "form"
    //   }
    // };
    //
    // ,
    //     submitButtonEl = formEl.querySelector("button[type='submit']"),
    //     recaptchaLib = document.createElement("script");
    //
    // /* pending widget ready */
    // submitButtonEl.disabled = true;

    const formEl = mktoForm.getFormElem()[0];
    /* pending verify */
    mktoForm.submittable(false);
    // mktoForm.locked = false;

    // var recaptchaListeners = {
    //   ready: function () {
    //     submitButtonEl.disabled = false;
    //   }
    // };
    // Object.keys(recaptchaListeners).forEach(function globalize(fnName) {
    //   window["grecaptchaListeners_" + fnName] = recaptchaListeners[fnName];
    // });

    mktoForm.onValidate(function (native) {
      if (!native) return;

      // grecaptcha.ready(function () {
        //Validate email domain
        var invalidDomains = ["yahoo.com", "gmail.com", "mailinater.com", "live.com", "hotmail.com", "outlook.com", "qq.com", "icloud.com", "comcast.net", "mailinator.com", "earthlink.net", "aol.com"],
            emailExtendedValidationError =
                'Please enter your business email address.',
            emailField = 'Email',
            emailFieldSelector = '#' + emailField;
        var invalidDomainRE = new RegExp('@(' + invalidDomains.join(
            '|') + ')$', 'i');
        if (invalidDomainRE.test(mktoForm.vals()[emailField])) {
          console.log("Email is invalid!");
          mktoForm.submittable(false);
          mktoForm.showErrorMessage(emailExtendedValidationError,
              mktoForm.getFormElem().find(emailFieldSelector)
          );
          return false;
        }
        else {
          form.submittable(true);
        }

        //Run reCAPTCHA
        // grecaptcha.execute(userConfig.apiKeys.recaptcha, {
        //   action: userConfig.actions.formSubmit
        // })
        //     .then(function (recaptchaFinger) {
        //       var mktoFields = {};
        //       if (mktoForm.locked == false) {
        //         console.log("primary recaptcha response resolved");
        //         mktoForm.locked = true;
        //         mktoFields[userConfig.fields.recaptchaFinger] = recaptchaFinger;
        //         mktoForm.addHiddenFields(mktoFields);
        //         mktoForm.submittable(true);
        //         mktoForm.submit();
        //       } else {
        //         console.log("secondary recaptcha response resolved");
        //       }
        //     });
      // });
    });

    /* inject the reCAPTCHA library */
    // recaptchaLib.src = "https://www.google.com/recaptcha/api.js?render=" + userConfig.apiKeys.recaptcha + "&onload=grecaptchaListeners_ready";
    // document.head.appendChild(recaptchaLib);

    //End recaptcha and email domain verify


    const smartZIRevealSystemConfig = {
      ziDeveloperMode: document.location.hash == "#dev",
      eventBindings: {
        simple: true,
        advanced: false
      },
      attrs: {
        behaviorsReady: "data-zi-managed-behaviors-ready",
        mktoErrorReady: "data-mkto-error-ready",
        isZIManaged: "data-zi-managed",
        isZIInteracted: "data-hasusertyped",
        isZIEmpty: "data-zi-empty"
      }
    };

    const lookupEl = getNamedField(formEl, window.smartZIRevealUserConfig.ziLookupField);

    const arrayify = getSelection.call.bind([].slice);

    let lastZIFields;

    let tsLastMatch = 0,
        mktoFieldsRevealed = false;

    const advSealEventBindings = [
      {target: mktoForm, event: "Validate"},
      {target: lookupEl, event: "blur"},
      {target: lookupEl, event: "keydown"}
    ];

    /* mark up managed rows, and also touch managed fields with ZI's internal 'has interacted' flag */
    if (smartZIRevealSystemConfig.eventBindings.simple) {
      let managedFields = window.smartZIRevealUserConfig.ziManagedFields.map(function (fieldName) {
        return getNamedField(formEl, fieldName);
      });

      managedFields.filter(function (el) {
        return el.name != window.smartZIRevealUserConfig.ziLookupField
      })
          .forEach(function (el) {
            const fieldName = el.name,
                wrapperRow = getMktoWrapperFor(formEl, fieldName);

            el.setAttribute(smartZIRevealSystemConfig.attrs.isZIInteracted, true);
            wrapperRow.setAttribute(smartZIRevealSystemConfig.attrs.isZIManaged, true);
          });

      formEl.setAttribute(smartZIRevealSystemConfig.attrs.isZIManaged, true);
    } else {
      formEl.setAttribute(smartZIRevealSystemConfig.attrs.isZIManaged, false);
    }


    function manageEventBindings(listener, bindings, stateEnabled) {
      bindings.forEach(function (binding) {
        if (binding.target == mktoForm) {
          binding.target[(stateEnabled ? "on" : "off") + binding.event](listener);
        } else {
          binding.target[(stateEnabled ? "addEventListener" : "removeEventListener")](binding.event, listener);
        }
      });
    }

    function getMktoWrapperFor(formEl, fieldName) {
      return formEl.querySelector(".mktoFormRow[data-wrapper-for~='" + fieldName + "']");
    }

    function getNamedField(formEl, fieldName) {
      return formEl.querySelector("[name='" + fieldName + "']");
    }

    /* handle ZI response and seal form (remove events)
     * @param context variant - event-based or static call
     */
    function sealZIFields(context) {
      if (typeof context == "undefined") {
        // direct seal
      } else if (typeof context == "boolean") {
        // validation
      } else if (context instanceof FocusEvent && context.type == "blur") {
        // blur
      } else if (context instanceof KeyboardEvent && context.type == "keydown" && "Enter" == (context.key || context.keyIdentifier)) {
        // key
      } else {
        // unrecognized
        return;
      }

      if (!mktoFieldsRevealed && lastZIFields) {
        revealEmptyManagedFields(lastZIFields);
        mktoFieldsRevealed = true;

        if (smartZIRevealSystemConfig.eventBindings.advanced) {
          manageEventBindings(sealZIFields, advSealEventBindings, false);
        }

        return true;
      } else {
        return false;
      }
    }

    /* set Marketo fields from ZI response (including Hidden)
     *   and reveal still-empty ones
     * @param fieldsObj Object - Marketo-mapped fields object
     */
    function revealEmptyManagedFields(fieldsObj) {
      delete fieldsObj.Email; // on no-match, don't accidentally NULL out Email
      mktoForm.setValues(fieldsObj);

      Object.keys(fieldsObj)
          .filter(function (fieldName) {
            return !fieldsObj[fieldName] && !getNamedField(formEl, fieldName).hidden;
          })
          .forEach(function (emptyFieldName) {
            var wrapperRow = getMktoWrapperFor(formEl, emptyFieldName);
            wrapperRow.setAttribute(smartZIRevealSystemConfig.attrs.isZIEmpty, true);
            setTimeout(function () {
              wrapperRow.setAttribute(smartZIRevealSystemConfig.attrs.mktoErrorReady, true);
            }, 200)
          });
    }

    /* ZI script injection routine with added callbacks */
    window._zi = {
      formId: window.smartZIRevealUserConfig.ziFormId,
      development: smartZIRevealSystemConfig.ziDeveloperMode,
      callbacks: {
        onMatch: function (ziFieldsObj) {
          lastZIFields = ziFieldsObj;
          sealZIFields();
        }
      }
    };
    var zi = document.createElement("script");
    zi.type = "text/javascript";
    zi.async = true;
    zi.src = "https://ws-assets.zoominfo.com/formcomplete.js";
    zi.onload = function () {
      if (smartZIRevealSystemConfig.eventBindings.simple) {
        formEl.setAttribute(smartZIRevealSystemConfig.attrs.behaviorsReady, true);
      }

      if (smartZIRevealSystemConfig.eventBindings.advanced) {
        manageEventBindings(sealZIFields, advSealEventBindings, true);
      }
    }
    document.head.appendChild(zi);

    //Show confirmation message
    mktoForm.onSuccess(function (values, followUpUrl) {
      console.log('onSuccess');
      mktoForm.getFormElem().css("display", "none");
      // $('#mktoForm_1097').css("visibility", 'hidden');
      document.getElementById('form-message').style.display = "block";
      return false;
    });
  }


});
