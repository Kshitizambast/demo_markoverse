 
<div class="card mx-2" style="background-color: lightgoldenrodyellow">

    <div class="card-body ">
        <div class="m-0">
      <table class="table table-hover table-dark" id="investorTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Shop Name</th>
            <th scope="col">Invested Amount</th>
            <th scope="col">Current Rate</th>
            <th scope="col">Predicted Earning</th>
          </tr>
        </thead>
        <tbody>
      
          <tr class="bg-dark">
            <th scope="row">1</th>
            <td>Marko Polo</td>
            <td>$45</td>
            <td><p class="text-success">2.6% &uarr;</p></td>
            <td><p class="text-success">+50%</p></td>
          </tr>
          <tr class="bg-dark">
            <th scope="row">2</th>
            <td>Marko Polo</td>
            <td>$45</td>
            <td><p class="text-danger">3.6% &darr;</p></td>
            <td><p class="text-danger">+50% &darr;</p></td>
          </tr>
          <tr class="bg-dark">
            <th scope="row">3</th>
            <td>Marko Polo</td>
            <td>$45</td>
            <td><p class="text-success">2.6%</p></td>
            <td><p class="text-success">+50%</p></td>
          </tr>
        </tbody>
      </table>
    </div>
      <script>
            $(document).ready(function(){
                "use strict";
                 $('#investorTable').DataTable(); 
              });
        </script>    
    </div>
    
</div>

