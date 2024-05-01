<div class="widget widget-3" style="margin-top: 10px;border-top: 1px solid #ddd;">
    <h5 class="sidebar-title">Mortgage Calculator</h5>
    <form action="#" method="GET" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label">Mortgage Size (£)</label>
            <input type="text" name="property_price" class="form-control" placeholder="£350.000">
        </div>
        <div class="form-group">
            <label class="form-label">Interest Rate (% annual)</label>
            <input type="text" name="interest_rate" class="form-control" placeholder="2.5%">
        </div>
        <div class="form-group">
            <label class="form-label">Repayment Period (Years)</label>
            <input type="text" name="payment_period" class="form-control" placeholder="3 years">
        </div>
        <div class="form-group mb-0">
            <button type="button" class="btn btn-4 btn-block btn-color" onclick="getMortgatePrice()">Calculate</button>
        </div>
    </form>
    <div id="result" style="display: none">
        <div class="form-group">
            <label class="form-label">Number of Payments (Monthly)</label>
            <input type="text" readonly class="form-control" name="number_months">
        </div>
        <div class="form-group">
            <label class="form-label">Monthly Payment (£)</label>
            <input type="text" size="10" readonly class="form-control" name="monthly_payment">
            </div>
    </div>

</div>

<script>
    
    
    function getMortgatePrice() {
        var p = $('[name="property_price"]').val(); // Total Amount of Your Loan
        var i = ($('[name="interest_rate"]').val() / 100); // Your Interest Rate, as a monthly percentage
        var n = $('[name="payment_period"]').val(); // Total amount of months in your timeline for paying off your mortgage
        
        //var m = p[i(1+i)^n]/[(1+i)^n-1]; // Total monthly Payment
        //var m = Math.floor(p*((i / 12)*(Math.pow(1+i,n))/(Math.pow(1+(i / 12), n)-1))); // Total monthly Payment
        console.log(p,i,n);
        Compute(p, i, n)
    }


    function Compute(p, i, n) {
        
        intMortgageSize = p;
        dblAnnualInterestRate = i;
        intYears = n * 12;
        
    var m = (Math.floor(  
        (intMortgageSize * (dblAnnualInterestRate / 12)) / 
        (1 - Math.pow((1 + (dblAnnualInterestRate / 12)), (-intYears))
        ) * 100) / 100);
        $('#result').css('display', 'block');
        $('[name="number_months"]').val(n * 12);
        $('[name="monthly_payment"]').val(m);
    }

</script>