<!--<link rel="stylesheet" type="text/css" href="/wp-content/themes/kount/external/style/css/rangeslider.css">-->
<!--<script src="/wp-content/themes/kount/scripts/js/jquery-3.6.0.min.js"></script>-->
<!--<script src="/wp-content/themes/kount/scripts/js/rangeslider.min.js"></script>-->

<section class="py-5">
  <div class="container py-5">
      <label for="transactionByMonth">Average monthly transactions</label>
      <input id="transactionsByMonth" type="range" value="50000" min="5000" max="100000" step="5000">
      <br>
      <br>
      <label for="averageOrderValue">Average order value</label>
      <input id="averageOrderValue" type="range" value="100" min="10" max="10000" step="10">
      <br>
      <br>
      <label for="chargeBackFee">Chargeback fee</label>
      <input id="chargeBackFee" type="range" value="25" min="5" max="50" step="5">
      <br>
      <br>
      <label for="chargeBackFee">Current chargeback rate (%)</label>
      <input id="chargeBackFee" type="range" value="0.3" min="0.1" max="1" step=".05">
      <br>
      <br>
      <label for="chargeBackFee">Current chargeback rate</label>
      <input id="chargeBackFee" type="range" value="5000" min="5000" max="100000" step="5000">
      <output></output>
      <br>
      <br>
      <label><input type="number" name="min" value="0"> <code>min</code></label>
      <br>
      <label><input type="number" name="max" value="100"> <code>max</code></label>
      <br>
      <label><input type="number" name="step" value="10"> <code>step</code></label>
      <br><br>
      <label><input type="number" name="value" value="50"> <code>value</code></label>
      <br><br>
      <button id="js-example-change-attributes">Change attributes</button></section>

<!-- F’in sweet Webflow Hacks -->
<script>
    $(function() {
        var $document = $(document);
        var $r = $('input[type=range]');
        var $min = $('input[name="min"]');
        var $max = $('input[name="max"]');
        var $step = $('input[name="step"]');
        var $value = $('input[name="value"]');
        var output = document.querySelectorAll('output')[0];

        // set initial output value
        output.textContent = $r[0].value;

        // update output value
        $document.on('input', 'input[type="range"]', function(e) {
            output.textContent = e.currentTarget.value;
        });

        // Initialize
        $r.rangeslider({
            polyfill: false
        });

        // Example functionality to demonstrate programmatic attribute/value changes
        $document.on('click', '#js-example-change-attributes', function(e) {
            var value = $value[0].value;
            var attributes = {
                min: $min[0].value,
                max: $max[0].value,
                step: $step[0].value
            };

            $r.attr(attributes);
            $r.val(value).change();
            $r.rangeslider('update', true);

            // update output value
            output.textContent = value;
        });
    });
</script>
