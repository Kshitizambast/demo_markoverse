<!DOCTYPE html>
<html>
<head>
    <title>Markoverse Shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin-top: 50px;
  font-family: Raleway;
  padding: 15px;
  width: 100%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>
  @include('inc.messages')
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Markoverse<span class="text-green" style="font-style: italic; color: green; font-weight: 200px">shop</span></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="https://markoverse.com/about">Help</a>
    <a class="p-2 text-dark" href="https://markoverse.com/about">Contacts</a>
  </nav>
</div>

<div class="container">
<form id="regForm" method="POST" action="{{route('shop.register')}}" class="needs-validation" novalidate>
    {{csrf_field()}}
  <h1>Register your shop here:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
      <h4 class="text-center">General Info About Shop</h4>
      <br>

                   <div class="form-row">
                        <div class="col-md-6 mb-3">
                             <input type="hidden" name="category_id" value="{{$subcategory->id}}">
                             <input type="hidden" name="owner_id" value="{{auth()->user()->id}}">
                            <label for="validationCustom01">Shop Name</label>
                            <input class="form-control" oninput="this.className = ''" id="validationCustom01" name="shop_name" required>
                            <div class="invalid-feedback">
                                Enter your shop name.
                            </div>                        
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Shop Phone</label>
                            <input class="form-control" oninput="this.className = ''" name="shop_phone" required>
                            <div class="invalid-feedback">
                                Enter your shop contact number.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                        <label for="validationCustom23">Shop Email</label>
                        <input class="form-control" oninput="this.className = ''" id="validationCustom23" name="email" required>
                        <div class="invalid-feedback">
                            Please provide a valid Email.
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Choose Password</label>
                            <input type="password" oninput="this.className = ''" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                            <div class="invalid-feedback">
                                Please choose a password.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword5">Confirm Password</label>
                            <input type="password" oninput="this.className = ''" class="form-control" name="password_confirmation" id="inputPassword5" placeholder="Password" required>
                            <input type="checkbox" onclick="showPassword()"> <small>Show Password</small>
                            <div class="invalid-feedback">
                                Password did not match.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">                    
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <select id="state" name="state_name" class="form-control" required>
                            <option value="">Choose...</option>
                                     @foreach($states as $state)
						                <option>{{$state->state_name}}</option>
						             @endforeach
                            </select>
                            <div class="invalid-feedback">
                            Please select a state.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City</label>                    
                            <select class="form-control" id="city" name="city" required>
                                <option value="">Choose...</option>
                                @foreach($cities as $city)
					                <option>{{$city->city}}</option>
					            @endforeach
                            </select>
                            <div class="invalid-feedback">
                            Please select a city.
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" oninput="this.className = ''" id="zip" name="zip_or_pin" required>
                            <div class="invalid-feedback">
                            Zip code required.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
				        <div class="form-group col">
				          <label>Full Address:</label>
				          <input placeholder="Address"  oninput="this.className = ''" id="primaryAddress" class="form-control" name="address" type="text">
				        </div>
				      </div>
                    
                    <div class="form-row">                    
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="opening_time">Opening Time</label>
                            <input type="time" id="opening_time" oninput="this.className = ''" name="opening_time" class="form-control" required>
                            <div class="invalid-feedback">
                            Please enter a valid time.
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="closing_time">Closing Time</label>
                            <input type="time" id="closing_time" oninput="this.className = ''" name="closing_time" class="form-control" required>
                            <div class="invalid-feedback">
                            Please enter a valid time.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="close_on_day">Closing Day</label>
                            <select class="custom-select d-block w-100" id="close_on_day" name="close_on" required>
                            <option value="">Choose...</option>
                            <option>Sunday</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                            <option>Never</option>
                            </select>
                            <div class="invalid-feedback">
                            Please choose a valid option.
                            </div>
                        </div>
                    </div>                                        

                
  </div>
  <div class="tab">
    <h4 class="text-center">Some Sales Info About Shop</h4>
    <br>
    
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="customer_visit_per_week">How Many Customers You Handle Each Week:</label>
                <input placeholder="Number Of Customers" class="form-control" oninput="this.className = ''" id="customer_visit_per_week" name="customer_visit_per_week" type="text" required>
                <div class="invalid-feedback">
                Enter number of customer.
                </div>
            </div>
        </div>
                 <div class="form-row">
                        <div class="col-md-6 mb-3">
                            
                            <label for="revenue_last_week">Revenue Last Week</label>
                            <input class="form-control" name="revenue_last_week" placeholder="In Rs." oninput="this.className = ''" id="revenue_last_week" required>
                            <div class="invalid-feedback">
                                Enter last week revenue.
                            </div>                        
                        </div>
                        <div class="col-md-6 mb-3">
                            
                            <label for="revenue_each_week">Avg. Revenue Each Week</label>
                            <input class="form-control" name="revenue_each_week" placeholder="In Rs." oninput="this.className = ''" id="revenue_each_week" required>
                            <div class="invalid-feedback">
                                Enter average revenue of each week.
                            </div>
                        </div>
                    </div> 
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            
                            <label for="min_range">Price Of Cheapest Product(In Your Shop)</label>
                            <input class="form-control" name="min_range" placeholder="In Rs." oninput="this.className = ''" id="min_range" required>
                            <div class="invalid-feedback">
                                Enter Cheapest Product's price.
                            </div>                        
                        </div>
                        <div class="col-md-6 mb-3">
                            
                            <label for="max_range">Price Of Most Expensive Product(In Your Shop)</label>
                            <input class="form-control" name="max_range" placeholder="In Rs." oninput="this.className = ''" id="max_range" required>
                            <div class="invalid-feedback">
                                Enter most expensive product's price.
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            
                            <label for="expected_margin">Margin You Look For(In Every Sell)</label>
                            <input class="form-control" name="expected_margin_per_item" placeholder="In %" oninput="this.className = ''" id="expected_margin" required>
                            <div class="invalid-feedback">
                                Enter expected margin.
                            </div>                        
                        </div>
                        <div class="col-md-6 mb-3">
                            
                            <label for="usual_margin">Margin You Usually Get(In Every Sell)</label>
                            <input class="form-control" name="usual_margin_per_item" placeholder="In %" oninput="this.className = ''" id="usual_margin" required>
                            <div class="invalid-feedback">
                                Enter usual margin.
                            </div>
                        </div>
                    </div>

    
  </div>
  <div class="tab">
        <h4 class="text-center">Expectation from Us</h4>
            <br>
        
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <label for="expected_customer_visit_from_us">%increment of customers per week:</label>
                    <input placeholder="Number Of customers you expect" class="form-control" oninput="this.className = ''" id="expected_customer_visit_from_us" name="expected_customer_visit_from_us" type="text" required>
                    <div class="invalid-feedback">
                    in %.
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label for="expectation_of_profit_from_covalent">%increment in revenue:</label>
                    <input placeholder="In Rs." class="form-control" oninput="this.className = ''" id="expectation_of_profit_from_covalent" name="expectation_of_profit_from_covalent" type="text" required>
                    <div class="invalid-feedback">
                    in %
                    </div>
                </div>
                    <input placeholder="In Rs." class="form-control" oninput="this.className = ''" id="expectation_of_margin_from_covalent" name="expectation_of_margin_from_covalent" type="hidden" value=5>
            </div>
        

  </div>

  <div style="overflow:auto;">    
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
  
</form>

</div>


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
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

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
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



</body>
</html>
