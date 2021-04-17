<hr>
<h3>Edit Details as appear on your Markoverse Shop Panel.</h3>
<div class="card">
    <div class="card-body">
        
        <!--Auth fluid left content -->
           {{--  <div class="auth-fluid-form-box" style="max-width: fit-content; padding: 0px;">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body" id="loginCard" style="margin: 3rem 2rem;"> --}}
                       

                        <!-- form -->
                        <form id="regForm" method="POST" action="{{route('shop.register')}}" class="needs-validation">
                                 {{csrf_field()}}

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                   
                                    <label for="validationCustom01">Shop Name</label>
                                    <input class="form-control"   id="validationCustom01" name="shop_name" value="{{auth()->user()->shop_name}}" required>
                                    <div class="invalid-feedback">
                                        Enter your shop name.
                                    </div>                        
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Shop Phone</label>
                                    <input class="form-control" value="{{auth()->user()->shop_phone}}"   name="shop_phone" required>
                                    <div class="invalid-feedback">
                                        Enter your shop contact number.
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                <label for="validationCustom23">Shop Email</label>
                                <input class="form-control"   id="validationCustom23" name="email"  value= "{{auth()->user()->email}}"  required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                                </div>
                            </div>

                            <div class="form-row">
                                
                             <div class="form-group col-md-6">
                                <label for="inputPassword4">Choose Password</label>
                                <input type="password"   class="form-control" name="password" id="inputPassword4" placeholder="Password" value= "{{auth()->user()->password}}" required>
                                <div class="invalid-feedback">
                                    Please choose a password.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword5">Confirm Password</label>
                                <input type="password"   class="form-control" name="password_confirmation" id="inputPassword5" value= "{{auth()->user()->password}}" placeholder="Password" required>
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
                                    {{--  @foreach($states as $state)
                                        <option>{{$state->state_name}}</option>
                                     @endforeach --}}
                            </select>
                            <div class="invalid-feedback">
                            Please select a state.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="city">City</label>                    
                            <select class="form-control" id="city" name="city" required>
                                <option value="">Choose...</option>
                              {{--   @foreach($cities as $city)
                                    <option>{{$city->city}}</option>
                                @endforeach --}}
                            </select>
                            <div class="invalid-feedback">
                            Please select a city.
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="zip">Pin</label>
                            <input type="text" class="form-control"   id="zip" name="zip_or_pin" required>
                            <div class="invalid-feedback">
                            Zip code required.
                            </div>
                        </div>

                    </div>


                       <div class="form-row">
                        <div class="form-group col">
                          <label>Full Address:</label>
                          <input placeholder="Address" value= "{{auth()->user()->address}}"   id="primaryAddress" class="form-control" name="address" type="text">
                        </div>
                      </div>


                      <div class="form-row">                    
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="opening_time">Opening Time</label>
                            <input type="time" id="opening_time"  value= "{{auth()->user()->opening_time}}"  name="opening_time" class="form-control" required>
                            <div class="invalid-feedback">
                            Please enter a valid time.
                            </div>
                        </div>
                        <div class="form-group col-sm-6 col-md-3">
                            <label for="closing_time">Closing Time</label>
                            <input type="time" id="closing_time" value= "{{auth()->user()->closing_time}}"   name="closing_time" class="form-control" required>
                            <div class="invalid-feedback">
                            Please enter a valid time.
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="close_on_day">Closing Day</label>
                            <select class="custom-select d-block w-100" id="close_on_day" name="close_on"  required>
                            <option value= "{{auth()->user()->close_on}}">Choose...</option>
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

                            <div class="form-group w-100 mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-login"></i>Submit</button>
                            </div>                            
                        </form>
                        <!-- end form-->
                      
{{-- 
                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->

                </div> --}}
             </div>
</div>
       
            <!-- end auth-fluid-form-box-->
            <!-- end Auth fluid right content -->