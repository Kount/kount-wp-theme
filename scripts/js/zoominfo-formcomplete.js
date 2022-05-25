var ziFormId = "";

if(document.getElementById("mktoForm_1429")) {
  // ziFormId = "NZyFlK3OJGMemHp6h7r4";
  ziFormId = "41NI6gYogqR3kqpFXDql"; //updated to new ID from remapping of Demo Request - Blog Pages form
}

if(ziFormId != "") {
  (function () {
    window._zi = {formId: ziFormId};
    var zi = document.createElement('script');
    zi.type = 'text/javascript';
    zi.async = true;
    zi.src = 'https://ws-assets.zoominfo.com/formcomplete.js'
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(zi, s);
  })();

  window.smartZIRevealUserConfig = {
    ziManagedFields: [
      "Email",
      "FirstName",
      "LastName",
      "Phone",
      "Company"
    ],
    ziLookupField: "Email",
    ziFormId: ziFormId
  };
}