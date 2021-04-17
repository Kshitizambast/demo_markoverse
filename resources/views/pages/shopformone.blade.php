@extends('layouts.app')

@section('content')
<form id="regForm" action="/action_page.php">
  <h1>Register:</h1>
  <!-- One "tab" for each step in the form: -->
 <div class="tab">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label class="text-muted">Shop Name</label>
          <input  oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label class="text-muted">Shop Phone</label>
          <input oninput="this.className = ''" name="fname">
        </div>
      </div>

      <!---Password-->
      <div class="row mt-4">
        <div class="col">
          <label class="text-muted">Password:</label>
          <input  oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label class="text-muted">Confirm Password:</label>
          <input oninput="this.className = ''" name="fname">
        </div>
      </div>
      <!---Full Address-->
      <div class="row mt-4">
        <div class="col">
          <label class="text-muted">Full Address:</label>
          <input placeholder="Address" oninput="this.className = ''" name="fname">
        </div>
      </div>


       <!---Landmarks-->
      <div class="row mt-4">
        <div class="col">
          <label class="text-muted">Near Landmarks</label>
          <input placeholder="Beside" oninput="this.className = ''" name="lname">
        </div>
      </div>
      
      <!---Opening And Closing Time-->
      <div class="row mt-4">
        <div class="col">
          <label class="text-muted">Opening Time:</label>
          <input placeholder="time" oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label class="text-muted">Closing Time:</label>
          <input placeholder="time" oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label class="text-muted">We Are Close On:</label>
          <input placeholder="Day" oninput="this.className = ''" name="fname">
        </div>
      </div>
      </div>
  </div>
  </div>



  <div class="tab">Commerce Info: Everything In Avg. Try To Be As Accurate As You Can
    <div class="card">
    <div class="card-body">

      <div class="row">
        <div class="col">
          <label class="text-muted">How Many Products You Sell Each Week:</label>
          <input placeholder="Number Of Products" oninput="this.className = ''" name="fname">
        </div>
      </div>

      <!---Profit Details-->
      <div class="row mt-4">
        <div class="col">
          <label>Profit Last Week:</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label>Avg. Profit Each Week</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
      </div>

      <!--General Details--->
      <div class="row mt-4">
        <div class="col">
          <label>Price Of Cheapest Product(In Your Shop)</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label>Price Of Most Expensive Product(In Your Shop)</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
      </div>  

      <div class="row mt-4">
        <div class="col">
          <label>Margin You Look For(In Every Sell)</label>
          <input placeholder="In %" oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label>Margin You Usually Get(In Every Sell)</label>
          <input placeholder="In %" oninput="this.className = ''" name="fname">
        </div>
      </div> 

      </div>
  </div>
  </div>


  <div class="tab">Billing Address
    <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col">
          <label class="text-mited">How Many Products You Sell Each Week:</label>
          <input placeholder="Number Of Products" oninput="this.className = ''" name="fname">
        </div>
      </div>

      <!---Profit Details-->
      <div class="row mt-4">
        <div class="col">
          <label>Profit Last Week:</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label>Avg. Profit Each Week</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
      </div>

      <!--General Details--->
      <div class="row mt-4">
        <div class="col">
          <label>Price Of Cheapest Product(In Your Shop)</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label>Price Of Most Expensive Product(In Your Shop)</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
      </div>  

      <!--Loss Details--->
      <div class="row mt-4">
        <div class="col">
          <label>Loss In Last Week(If Any)</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
        <div class="col">
          <label>Loss In Each Week(If Any)</label>
          <input placeholder="In Rs." oninput="this.className = ''" name="fname">
        </div>
      </div>  

      </div>
  </div>
  </div>
  <div class="tab">Birthday:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
  </div>
  <div class="tab">Login Info:
    <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p>
  </div>
  <div style="overflow:auto;" class="mt-4">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-danger mb-2 mr-1">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary mb-2 mr-1">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script type="text/javascript">
  var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
@endsection